<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 20/03/14
 * Time: 20:25
 */

class Professionalqualifications extends MY_Controller
{

    /** @var  Professionalqualifications_Model */
    public $pqs;

    public function __construct()
    {
        parent::__construct();
        $this->load->model( 'professionalqualifications', 'pqs' );
    }

    public function index()
    {
        $idUser = $this->getIdUser();
        $tmpData['_idUser'] = $idUser;
        $tmpData['_pqs'] = $this->pqs->getUserProfessionalQualifications( $idUser );
        $tmpData['_error'] = $this->session->flashdata( 'error' );
        $tmpData['_success'] = $this->session->flashdata( 'success' );
        $this->viewData['main_content_view'] = $this->load->view( 'professionalqualifications/view-add', $tmpData, TRUE );
        $this->viewData['title'] = 'Prof. Qualifications';
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
                    $pq = new ProfessionalQualification( $data );
                    $result = $this->pqs->addProfessionalQualification( $this->getIdUser(), $pq );
                } catch ( Exception $e ) {
                    $this->session->set_flashdata( array( 'error' => 'There was a problem adding the professional qualification.' ) );
                }

                switch ( $result ) {
                    case -1:
                        $this->session->set_flashdata( array( 'error' => 'There was a problem adding the professional qualification.' ) );
                        break;
                    case -2:
                        $this->session->set_flashdata( array( 'error' => 'The professional qualification '
                            . $pq->getQualificationName() . ' already exists.' ) );
                        break;
                    default:
                        /*$this->session->set_flashdata( array( 'success' => 'New skill "' . $skill->getSkillName()
                            . ' [' . $skill->getSkillLevel() . ']' . '" added.' ) );*/
                }
            }
        }
        redirect( 'professionalqualifications' );
    }

    public function delete( $id )
    {
        $pq = $this->pqs->getProfessionalQualification( $id );
        $idUser = $this->getIdUser();
        if ( ( !$pq instanceof ProfessionalQualification ) || ( $pq->getPersonsidUser() != $idUser ) ) {
            $this->session->set_flashdata( array( 'error' => 'Professional qualification not found.' ) );
        } else {
            $this->pq->deleleProfessionalQualification( $id );
            $this->session->set_flashdata( array( 'success' => 'Professional qualification ' . $pq->getQualificationName() . ' deleted.' ) );
        }

        redirect( 'professionalQualifications' );
    }

    public function setFormRules()
    {
        $this->form_validation->set_rules( 'qualificationName', 'Qualification Name', 'trim|required|xss_clean' );
    }

} 