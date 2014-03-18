<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 18/03/14
 * Time: 19:40
 */

class Skills extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model( 'curriculum' );
    }

    /**
     * Handles a user's skills view/edit
     */
    public function index()
    {
        $idUser = $this->getIdUser();
        $tmpData['_idUser'] = $idUser;

        try {
            $jobseeker = $this->curriculum->getJobseekerDetails( $idUser );
        } catch ( Exception $e ) {
            show_404();
        }
        $tmpData['_jobseeker'] = $jobseeker;

        if ( $this->input->server( 'REQUEST_METHOD' ) === 'POST' ) {
            $this->setSkillFormRules();
            if ( $this->form_validation->run() === false ) {
                $this->load->view( 'curriculum/skills', $tmpData );
            } else {
                try {
                    $data = $this->input->post();
                    $skill = new Skill( $data );
                } catch ( Exception $e ) {
                    $tmpData['errors'][] = [ 'bad_data' => 'Error in the given data.' ];
                    $this->load->view( 'curriculum/skills', $tmpData );
                }

                $result = $this->curriculum->saveJobseekerSkills( $jobseeker, $skill );

                if ( $data['save-and-add-more'] ) {
                    redirect( 'curriculum/skills' . $idUser );
                } else {
                    redirect( 'curriculum/view/' . $idUser );
                }
            }
        }

        $this->viewData['main_content_view'] = $this->load->view( 'skills/view-edit', $tmpData, TRUE );
        $this->viewData['title'] = 'Skills';
        $this->load->view( 'default', $this->viewData );
    }

    private function setSkillFormRules()
    {
        $this->form_validation->set_rules( 'title', 'Title', 'trim|required|xss_clean' );
        $this->form_validation->set_rules( 'forename1', 'Forename', 'trim|required|xss_clean' );
        $this->form_validation->set_rules( 'surname', 'Surname', 'trim|required|xss_clean' );
    }

} 