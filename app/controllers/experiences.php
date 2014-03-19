<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 18/03/14
 * Time: 23:37
 */

class Experiences extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model( 'experiences' );
    }

    public function index()
    {
        $idUser = $this->getIdUser();
        $userExperiences = $this->experiences->getUserExperiences( $idUser );

        $tmpData['_idUser'] = $idUser;
        $tmpData['_experiences'] = $userExperiences;
        $this->viewData['main_content_view'] = $this->load->view( 'experiences/view-edit', $tmpData, TRUE );
        $this->viewData['title'] = 'Experiences';
        $this->load->view( 'default', $this->viewData );
    }

    public function add()
    {
        if ( $this->input->server( 'REQUEST_METHOD' ) === 'POST' ) {
            $this->setExperiencesFormRules();
            if ( $this->form_validation->run() === false ) {
                $this->index();
            } else {
                try {
                    $data = $this->input->post();
                    $data['Persons_idUser'] = $this->getIdUser();
                    $experience = new Experience( $data );
                } catch ( Exception $e ) {
                    $tmpData['errors'][] = [ 'bad_data' => 'Error in the given data.' ];
                    $this->load->view( 'curriculum/skills', $tmpData );
                }

                $result = $this->experiences->addExperience( $experience );

                $this->session->set_flashdata( array( 'message' => 'Experience successfully added.' ) );
            }
        }

        redirect('experiences');
    }

    private function setExperiencesFormRules()
    {
        $this->form_validation->set_rules( 'dateStarted', 'Date started', 'trim|required|xss_clean' );
        $this->form_validation->set_rules( 'JobTitles_idJobTitle', 'Job title', 'trim|required|xss_clean' );
    }


} 
