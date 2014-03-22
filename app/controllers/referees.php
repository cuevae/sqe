<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 20/03/14
 * Time: 20:46
 */

class Referees extends MY_Controller
{

    /** @var  Referees_Model */
    public $referees;

    public function __construct()
    {
        parent::__construct();
        $this->load->model( 'referees' );
    }

    public function index()
    {
        $idUser = $this->getIdUser();
        $tmpData['_idUser'] = $idUser;
        $tmpData['_referees'] = $this->referees->getUserReferees( $idUser );
        $tmpData['_error'] = $this->session->flashdata( 'error' );
        $tmpData['_success'] = $this->session->flashdata( 'success' );
        $this->viewData['main_content_view'] = $this->load->view( 'referees/view-add', $tmpData, TRUE );
        $this->viewData['title'] = 'Referees';
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
                    $referee = new Referee( $data );
                    $result = $this->referees->addReferee( $this->getIdUser(), $referee );
                } catch ( Exception $e ) {
                    $this->session->set_flashdata( array( 'error' => 'There was a problem adding the referee.' ) );
                }

                switch ( $result ) {
                    case -1:
                        $this->session->set_flashdata( array( 'error' => 'There was a problem adding the referee.' ) );
                        break;
                    case -2:
                        $this->session->set_flashdata( array( 'error' => 'The referee '
                            . $referee->getFullName() . ' already exists.' ) );
                        break;
                    default:
                        /*$this->session->set_flashdata( array( 'success' => 'New skill "' . $skill->getSkillName()
                            . ' [' . $skill->getSkillLevel() . ']' . '" added.' ) );*/
                }
            }
        }
        redirect( 'referees' );
    }

    public function delete( $id )
    {
        $referee = $this->referees->getReferee( $id );
        $idUser = $this->getIdUser();
        if ( ( !$referee instanceof Referee ) || ( $referee->getPersonsidUser() != $idUser ) ) {
            $this->session->set_flashdata( array( 'error' => 'Referee not found.' ) );
        } else {
            $this->referees->deleleReferee( $id );
            $this->session->set_flashdata( array( 'success' => 'Referee ' . $referee->getFullName() . ' deleted.' ) );
        }

        redirect( 'referees' );
    }

    public function setFormRules()
    {
        $this->form_validation->set_rules( 'forename', 'Forename', 'trim|required|xss_clean' );
        $this->form_validation->set_rules( 'surname', 'Surname', 'trim|required|xss_clean' );
        $this->form_validation->set_rules( 'email', 'Email', 'trim|valid_email|xss_clean' );
    }

} 