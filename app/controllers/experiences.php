<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 18/03/14
 * Time: 23:37
 */

class Experiences extends MY_Controller
{

    /** @var  Experiences_Model */
    public $model;

    public function __construct()
    {
        parent::__construct();
        $this->load->model( 'experiences', 'model' );
        $this->load->model( 'jobtitles' );
        $this->load->model( 'sectors' );
        $this->load->model( 'employmentlevels', 'el' );
    }

    public function index()
    {
        $idUser = $this->getIdUser();
        $tmpData['_idUser'] = $idUser;
        $tmpData['_experiences'] = $this->model->getUserExperiences( $idUser );
        $tmpData['_jobTitleOptions'] = $this->jobtitles->getAvailableJobTitles();
        $tmpData['_employmentLevelOptions'] = $this->el->getAvailableEmploymentLevels();
        $tmpData['_error'] = $this->session->flashdata( 'error' );
        $tmpData['_success'] = $this->session->flashdata( 'success' );
        $this->viewData['main_content_view'] = $this->load->view( 'experiences/view-add', $tmpData, TRUE );
        $this->viewData['title'] = 'Working Experience';
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
                    $data['Persons_idUser'] = $this->getIdUser();
                    $jobtitle = $this->jobtitles->getJobTitle( $data['JobTitles_idJobTitles'] );
                    $data['jobtitle'] = $jobtitle;
                    $data['sector'] = $jobtitle->getSector();
                    $data['employmentlevel'] = $this->el->getEmploymentLevel( $data['EmploymentLevels_idLevelsOfEmployment'] );
                    $obj = new Experience( $data );
                    $result = $this->model->addExperience( $this->getIdUser(), $obj );
                } catch ( Exception $e ) {
                    $this->session->set_flashdata( array( 'error' => 'There was a problem adding the working experience.' ) );
                }

                switch ( $result ) {
                    case -1:
                        $this->session->set_flashdata( array( 'error' => 'There was a problem adding the working experience.' ) );
                        break;
                    case -2:
                        $this->session->set_flashdata( array( 'error' => 'The working experience '
                            . $obj->getExperienceName() . ' already exists.' ) );
                        break;
                    default:
                        /*$this->session->set_flashdata( array( 'success' => 'New skill "' . $skill->getSkillName()
                            . ' [' . $skill->getSkillLevel() . ']' . '" added.' ) );*/
                }
            }
        }
        redirect( 'experiences' );
    }

    public function delete( $id )
    {
        $obj = $this->model->getExperience( $id );
        $idUser = $this->getIdUser();
        if ( ( !$obj instanceof Experience ) || ( $obj->getIdUser() != $idUser ) ) {
            $this->session->set_flashdata( array( 'error' => 'Working experience not found.' ) );
        } else {
            $this->model->deleteExperience( $id );
            $this->session->set_flashdata( array( 'success' => 'Experience "' . $obj->getExperienceName() . '" deleted.' ) );
        }

        redirect( 'experiences' );
    }

    private function setFormRules()
    {
        $this->form_validation->set_rules( 'dateStarted', 'Date started', 'trim|required|xss_clean' );
        $this->form_validation->set_rules( 'JobTitles_idJobTitles', 'Job title', 'trim|required|xss_clean' );
    }


} 
