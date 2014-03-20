<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 19/03/14
 * Time: 23:58
 */

class Employmentlevels extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        /*if( !$this->isAdmin() ){
            show_404();
        }*/
        $this->load->model( 'employmentlevels', 'em' );
    }

    public function index()
    {
        $employmentLevels = $this->em->getEmploymentLevels();
        $tmpData['_error'] = $this->session->flashdata( 'error' );
        $tmpData['_levels'] = $employmentLevels;
        $this->viewData['main_content_view'] = $this->load->view( 'employmentlevels/view-add', $tmpData, TRUE );
        $this->viewData['title'] = 'Employment Levels';
        $this->load->view( 'default', $this->viewData );
    }

    public function add()
    {
        if ( $this->input->server( 'REQUEST_METHOD' ) === 'POST' ) {
            $this->setFormRules();
            if ( $this->form_validation->run() === false ) {
                $this->index();
            } else {
                try {
                    $data = $this->input->post();
                    $level = new EmploymentLevel( $data );
                    $result = $this->em->addEmploymentLevel( $level );
                    $this->session->set_flashdata( array( 'message' => 'Skill successfully added.' ) );
                } catch ( Exception $e ) {
                    $this->session->set_flashdata( array( 'error' => 'Sector could not be added,
                    please ensure you are providing all the needed data.' ) );
                }
                redirect( 'employmentlevels' );
            }
        } else {
            redirect( 'employmentlevels' );
        }
    }


    public function delete( $idLevel )
    {
        $level = $this->em->getLevel( $idLevel );
        if ( !$level instanceof EmploymentLevel ) {
            show_404();
        }

        $this->em->deleteLevel( $idLevel );

        redirect( 'employmentlevels' );
    }

    private function setFormRules()
    {
        $this->form_validation->set_rules( 'employmentLevel', 'Employment Level', 'trim|required|xss_clean' );
    }

} 