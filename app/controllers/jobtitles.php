<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 19/03/14
 * Time: 22:01
 */

class Jobtitles extends MY_Controller
{

    /** @var  Jobtitles_Model */
    public $model;

    public function __construct()
    {
        parent::__construct();
        if ( !$this->isAdmin() ) {
            show_error( 'Admin access only', 401, 'Not Authorized' );
        }
        $this->load->model( 'jobtitles', 'model' );
        $this->load->model( 'sectors' );
    }

    public function index()
    {
        $tmpData['_jobtitlesBySector'] = $this->model->getJobtitlesBySector();
        $tmpData['_sectors'] = $this->sectors->getAvailableSectors();
        $tmpData['_error'] = $this->session->flashdata( 'error' );
        $tmpData['_success'] = $this->session->flashdata( 'success' );
        $this->viewData['main_content_view'] = $this->load->view( 'jobtitles/view-add', $tmpData, TRUE );
        $this->viewData['title'] = 'Job Titles';
        $this->load->view( 'default', $this->viewData );
    }

    public function add()
    {
        if ( $this->input->server( 'REQUEST_METHOD' ) === 'POST' ) {
            $this->setFormRules();
            if ( $this->form_validation->run() === false ) {
                $this->session->set_flashdata( array( 'error' => validation_errors() ) );
            } else {
                try {
                    $data = $this->input->post();
                    $obj = new JobTitle( $data );
                    $result = $this->model->addJobTitle( $obj );
                } catch ( Exception $e ) {
                    $this->session->set_flashdata( array( 'error' => 'There was a problem adding the job title.' ) );
                }

                switch ( $result ) {
                    case -1:
                        $this->session->set_flashdata( array( 'error' => 'There was a problem adding the job title.' ) );
                        break;
                    case -2:
                        $this->session->set_flashdata( array( 'error' => 'The job title "'
                            . $obj->getJobTitle() . '" already exists.' ) );
                        break;
                    default:
                        /*$this->session->set_flashdata( array( 'success' => 'New skill "' . $skill->getSkillName()
                            . ' [' . $skill->getSkillLevel() . ']' . '" added.' ) );*/
                }
            }
        }
        redirect( 'jobtitles' );
    }


    public function delete( $id )
    {
        $obj = $this->model->getJobTitle( $id );
        if ( !$obj instanceof Jobtitle ) {
            $this->session->set_flashdata( array( 'error' => 'Job title not found.' ) );
        } else {
            $canBeDeleted = $this->model->canBeDeleted( $id );
            if ( $canBeDeleted < 1 ) {
                switch ( $canBeDeleted ) {
                    case -1:
                        $this->session->set_flashdata( array( 'error' => 'Job title cannot be deleted, job preferences and experiences linked.' ) );
                        break;
                    case -2:
                        $this->session->set_flashdata( array( 'error' => 'Job title cannot be deleted, experiences linked.' ) );
                        break;
                    case -3:
                        $this->session->set_flashdata( array( 'error' => 'Job title cannot be deleted, job preferences linked.' ) );
                        break;
                    default:
                        $this->session->set_flashdata( array( 'error' => 'Job title cannot be deleted, it has existing resources linked.' ) );
                        break;
                }
            } else {
                $result = $this->model->deleteJobTitle( $id );
            }
        }
        redirect( 'jobtitles' );
    }

    private function setFormRules()
    {
        $this->form_validation->set_rules( 'jobTitle', 'Job Title', 'trim|required|xss_clean' );
        $this->form_validation->set_rules( 'Sectors_idSectors', 'Sector Title', 'trim|required|xss_clean' );
    }

} 