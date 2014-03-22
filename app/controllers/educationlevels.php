<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 20/03/14
 * Time: 20:08
 */

class Educationlevels extends MY_Controller
{

    /** @var  Educationlevels_Model */
    public $model;

    public function __construct()
    {
        parent::__construct();
        if ( !$this->isAdmin() ) {
            show_error( 'Admin access only', 401, 'Not Authorized' );
        }
        $this->load->model( 'educationlevels', 'model' );
    }

    public function index()
    {
        $tmpData['_edLevels'] = $this->model->getEducationLevels();
        $tmpData['_error'] = $this->session->flashdata( 'error' );
        $tmpData['_success'] = $this->session->flashdata( 'success' );
        $this->viewData['main_content_view'] = $this->load->view( 'educationlevels/view-add', $tmpData, TRUE );
        $this->viewData['title'] = 'Education Levels';
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
                    $obj = new Edlevel( $data );
                    $result = $this->model->addEducationLevel( $obj );
                } catch ( Exception $e ) {
                    $this->session->set_flashdata( array( 'error' => 'There was a problem adding the education level.' ) );
                }

                switch ( $result ) {
                    case -1:
                        $this->session->set_flashdata( array( 'error' => 'There was a problem adding the education level.' ) );
                        break;
                    case -2:
                        $this->session->set_flashdata( array( 'error' => 'The education level "'
                            . $obj->getEducationLevel() . '" already exists.' ) );
                        break;
                    default:
                        /*$this->session->set_flashdata( array( 'success' => 'New skill "' . $skill->getSkillName()
                            . ' [' . $skill->getSkillLevel() . ']' . '" added.' ) );*/
                }
            }
        }
        redirect( 'educationlevels' );
    }

    public function delete( $id )
    {
        $obj = $this->model->getEducationLevel( $id );
        if ( !$obj instanceof Edlevel ) {
            $this->session->set_flashdata( array( 'error' => 'Education level not found.' ) );
        } else {
            $canBeDeleted = $this->model->canBeDeleted( $id );
            if ( $canBeDeleted < 1 ) {
                switch ( $canBeDeleted ) {
                    case -1:
                        $this->session->set_flashdata( array( 'error' => 'Education level cannot be deleted, persons and educational qualifications linked.' ) );
                        break;
                    case -2:
                        $this->session->set_flashdata( array( 'error' => 'Education level cannot be deleted, persons linked.' ) );
                        break;
                    case -3:
                        $this->session->set_flashdata( array( 'error' => 'Education level cannot be deleted, educational qualifiacations linked.' ) );
                        break;
                    default:
                        $this->session->set_flashdata( array( 'error' => 'Education level cannot be deleted, it has existing resources linked.' ) );
                        break;
                }
            } else {
                $result = $this->model->deleteEducationLevel( $id );
            }
        }
        redirect( 'educationlevels' );
    }

    public function setFormRules()
    {
        $this->form_validation->set_rules( 'educationLevel', 'Education Level', 'trim|required|xss_clean' );
    }

} 