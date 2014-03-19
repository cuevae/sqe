<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 19/03/14
 * Time: 20:30
 */

class Sectors extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        /*if( !$this->isAdmin() ){
            show_404();
        }*/
        $this->load->model( 'sectors' );
    }

    public function index()
    {
        $sectors = $this->sectors->getSectors();
        $tmpData['_error'] = $this->session->flashdata( 'error' );
        $tmpData['_sectors'] = $sectors;
        $this->viewData['main_content_view'] = $this->load->view( 'sectors/view-add', $tmpData, TRUE );
        $this->viewData['title'] = 'Skills';
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
                    $sector = new Sector( $data );
                    $result = $this->sectors->addSector( $sector );
                    $this->session->set_flashdata( array( 'message' => 'Skill successfully added.' ) );
                } catch ( Exception $e ) {
                    $this->session->set_flashdata( array( 'error' => 'Sector could not be added,
                    please ensure you are providing all the needed data.' ) );
                }
                redirect( 'sectors' );
            }
        } else {
            redirect( 'sectors' );
        }
    }


    public function delete( $idSectors )
    {
        $sector = $this->sectors->getSector( $idSectors );
        if ( !$sector instanceof Sector ) {
            show_404();
        }

        $this->sectors->deleteSector( $idSectors );

        redirect( 'sectors' );
    }

    private function setFormRules()
    {
        $this->form_validation->set_rules( 'sectorTitle', 'Sector Title', 'trim|required|xss_clean' );
    }

} 