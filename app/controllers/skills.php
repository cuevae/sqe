<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 18/03/14
 * Time: 19:40
 */

class Skills extends MY_Controller
{

    /** @var $skills Skills_Model */
    public $skills;

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
        $tmpData['_error'] = $this->session->flashdata( 'error' );
        $tmpData['_success'] = $this->session->flashdata( 'success' );
        $this->viewData['main_content_view'] = $this->load->view( 'skills/view-add', $tmpData, TRUE );
        $this->viewData['title'] = 'Skills';
        $this->load->view( 'default', $this->viewData );
    }

    public function add()
    {
        if ( $this->input->server( 'REQUEST_METHOD' ) === 'POST' ) {
            $this->setSkillFormRules();
            if ( $this->form_validation->run() === false ) {
                $this->session->set_flashdata( array( 'error' => validation_errors() ) );
            } else {
                try {
                    $data = $this->input->post();
                    $data['Persons_idUser'] = $this->getIdUser();
                    $skill = new Skill( $data );
                } catch ( Exception $e ) {
                    $tmpData['errors'][] = [ 'bad_data' => 'Error in the given data.' ];
                    $this->load->view( 'curriculum/skills', $tmpData );
                }

                $result = $this->skills->addSkill( $this->getIdUser(), $skill );
                switch ( $result ) {
                    case -1:
                        $this->session->set_flashdata( array( 'error' => 'There was a problem adding the skill.' ) );
                        break;
                    case -2:
                        $this->session->set_flashdata( array( 'error' => 'The skill '
                            . $skill->getSkillName() . ' already exists.' ) );
                        break;
                    default:
                        /*$this->session->set_flashdata( array( 'success' => 'New skill "' . $skill->getSkillName()
                            . ' [' . $skill->getSkillLevel() . ']' . '" added.' ) );*/
                }
            }
        }
        redirect( 'skills' );
    }

    public function delete( $id )
    {
        $skill = $this->skills->getSkill( $id );
        $idUser = $this->getIdUser();
        if ( ( !$skill instanceof Skill ) || ( $skill->getPersonsidUser() != $idUser ) ) {
            $this->session->set_flashdata( array( 'error' => 'Skill not found.' ) );
        } else {
            $this->skills->deleteSkill( $id );
            $this->session->set_flashdata( array( 'success' => 'Skill ' . $skill->getSkillName() . ' deleted.' ) );
        }

        redirect( 'skills' );
    }

    private function setSkillFormRules()
    {
        $this->form_validation->set_rules( 'skillName', 'Skill Name', 'trim|required|xss_clean' );
        $this->form_validation->set_rules( 'skillLevel', 'Skill Level', 'trim|required|xss_clean' );
    }

} 