<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 22/03/14
 * Time: 16:54
 */

class JobPreferences extends MY_Controller
{


    /** @var  JobTitles_Model */
    public $jobtitles;

    /** @var  JobPreferences_Model */
    public $model;


    public function __construct()
    {
        parent::__construct();
        $this->load->model( 'jobtitles' );
        $this->load->model( 'jobpreferences', 'model' );
    }

    public function index()
    {
        $idUser = $this->getIdUser();
        $tmpData['_idUser'] = $idUser;
        $userPreferences = $this->model->getUserJobPreferences( $idUser );
        $tmpData['_jobTitleOptions'] = $this->jobtitles->getAvailableJobTitlesOutOfUserPreferences( $idUser );
        $tmpData['_preferences'] = $userPreferences;
        $tmpData['_error'] = $this->session->flashdata( 'error' );
        $tmpData['_success'] = $this->session->flashdata( 'success' );
        $this->viewData['main_content_view'] = $this->load->view( 'jobpreferences/view-add', $tmpData, TRUE );
        $this->viewData['title'] = 'Job Preferences';
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
                    $data['person_idUser'] = $this->getIdUser();
                    $obj = new JobPreference( $data );
                    $result = $this->model->addJobPreference( $this->getIdUser(), $obj );
                } catch ( Exception $e ) {
                    $this->session->set_flashdata( array( 'error' => 'There was a problem adding the job preference.' ) );
                }

                switch ( $result ) {
                    case -1:
                        $this->session->set_flashdata( array( 'error' => 'There was a problem adding the job preference.' ) );
                        break;
                    case -2:
                        $this->session->set_flashdata( array( 'error' => 'The job preference '
                            . $obj->getJobtitle() . ' already exists.' ) );
                        break;
                    default:
                        /*$this->session->set_flashdata( array( 'success' => 'New skill "' . $skill->getSkillName()
                            . ' [' . $skill->getSkillLevel() . ']' . '" added.' ) );*/
                }
            }
        }
        redirect( 'jobpreferences' );
    }

    public function setFormRules()
    {
        $this->form_validation->set_rules( 'JobTitles_idJobTitles', 'Job Title', 'trim|required|xss_clean' );
    }

} 