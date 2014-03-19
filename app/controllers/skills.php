<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 18/03/14
 * Time: 19:40
 */

class Skills extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model( 'skills' );
    }

    /**
     * Handles a user's skills view/edit
     */
    public function index()
    {
        $idUser = $this->getIdUser();
        $userSkills = $this->skills->getUserSkills( $idUser );

        $tmpData['_idUser'] = $idUser;
        $tmpData['_skills'] = $userSkills;
        $this->viewData['main_content_view'] = $this->load->view( 'skills/view-edit', $tmpData, TRUE );
        $this->viewData['title'] = 'Skills';
        $this->load->view( 'default', $this->viewData );
    }

    public function add()
    {
        if ( $this->input->server( 'REQUEST_METHOD' ) === 'POST' ) {
            $this->setSkillFormRules();
            if ( $this->form_validation->run() === false ) {
                $this->index();
            } else {
                try {
                    $data = $this->input->post();
                    $data['Persons_idUser'] = $this->getIdUser();
                    $skill = new Skill( $data );
                } catch ( Exception $e ) {
                    $tmpData['errors'][] = [ 'bad_data' => 'Error in the given data.' ];
                    $this->load->view( 'curriculum/skills', $tmpData );
                }

                $result = $this->skills->addSkill( $skill );

                $this->session->set_flashdata( array( 'message' => 'Skill successfully added.' ) );
            }
        }

        redirect( 'skills' );
    }

    private function setSkillFormRules()
    {
        $this->form_validation->set_rules( 'skillName', 'Skill Name', 'trim|required|xss_clean' );
        $this->form_validation->set_rules( 'skillLevel', 'Skill Level', 'trim|required|xss_clean' );
    }

} 