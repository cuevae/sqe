<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 19/03/14
 * Time: 23:58
 */

class Employmentlevels extends MY_Controller
{

    /** @var  Employmentlevels_Model */
    public $em;

    public function __construct()
    {
        parent::__construct();
        if ( !$this->isAdmin() ) {
            show_error( 'Admin access only', 401, 'Not Authorized' );
        }
        $this->load->model( 'employmentlevels', 'em' );
    }

    public function index()
    {
        $tmpData['_levels'] = $this->em->getEmploymentLevels();
        $tmpData['_error'] = $this->session->flashdata( 'error' );
        $tmpData['_success'] = $this->session->flashdata( 'success' );
        $this->viewData['main_content_view'] = $this->load->view( 'employmentlevels/view-add', $tmpData, TRUE );
        $this->viewData['title'] = 'Employment Levels';
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
                    $obj = new EmploymentLevel( $data );
                    $result = $this->em->addEmploymentLevel( $obj );
                } catch ( Exception $e ) {
                    $this->session->set_flashdata( array( 'error' => 'There was a problem adding the job title.' ) );
                }

                switch ( $result ) {
                    case -1:
                        $this->session->set_flashdata( array( 'error' => 'There was a problem adding the title.' ) );
                        break;
                    case -2:
                        $this->session->set_flashdata( array( 'error' => 'The employment level "'
                            . $obj->getEmploymentLevel() . '" already exists.' ) );
                        break;
                    default:
                        /*$this->session->set_flashdata( array( 'success' => 'New skill "' . $skill->getSkillName()
                            . ' [' . $skill->getSkillLevel() . ']' . '" added.' ) );*/
                }
            }
        }
        redirect( 'employmentlevels' );
    }


    public function delete( $idLevel )
    {
        $level = $this->em->getEmploymentLevel( $idLevel );
        if ( !$level instanceof EmploymentLevel ) {
            $this->session->set_flashdata( array( 'error' => 'Employment level not found.' ) );
        } else {
            $canBeDeleted = $this->em->canBeDeleted( $idLevel );
            if ( $canBeDeleted < 1 ) {
                switch ( $canBeDeleted ) {
                    case -1:
                        $this->session->set_flashdata( array( 'error' => 'Employment level cannot be deleted, experiences linked.' ) );
                        break;
                    default:
                        $this->session->set_flashdata( array( 'error' => 'Sector cannot be deleted, it has existing resources linked.' ) );
                        break;
                }
            } else {
                $result = $this->em->deleteLevel( $idLevel );
            }
        }
        redirect( 'employmentlevels' );
    }

    private function setFormRules()
    {
        $this->form_validation->set_rules( 'employmentLevel', 'Employment Level', 'trim|required|xss_clean' );
    }

} 