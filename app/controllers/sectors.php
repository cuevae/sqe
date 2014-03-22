<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 19/03/14
 * Time: 20:30
 */

class Sectors extends MY_Controller
{

    /** @var  $sectors Sectors_Model */
    public $sectors;

    public function __construct()
    {
        parent::__construct();
        if ( !$this->isAdmin() ) {
            show_error( 'Admin access only', 401, 'Not Authorized' );
        }
        $this->load->model( 'sectors' );
    }

    public function index()
    {
        $sectors = $this->sectors->getSectors();
        $tmpData['_error'] = $this->session->flashdata( 'error' );
        $tmpData['_success'] = $this->session->flashdata( 'success' );
        $tmpData['_sectors'] = $sectors;
        $this->viewData['main_content_view'] = $this->load->view( 'sectors/view-add', $tmpData, TRUE );
        $this->viewData['title'] = 'Sectors';
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
                    $sector = new Sector( $data );
                    $result = $this->sectors->addSector( $sector );
                    $this->session->set_flashdata( array( 'success' => 'Sector successfully added.' ) );
                } catch ( Exception $e ) {
                    $this->session->set_flashdata( array( 'error' => 'There was a problem adding the sector.' ) );
                }

                switch ( $result ) {
                    case -1:
                        $this->session->set_flashdata( array( 'error' => 'There was a problem adding the sector.' ) );
                        break;
                    case -2:
                        $this->session->set_flashdata( array( 'error' => 'The sector '
                            . $sector->getSectorTitle() . ' already exists.' ) );
                        break;
                    default:
                        /*$this->session->set_flashdata( array( 'success' => 'New skill "' . $skill->getSkillName()
                            . ' [' . $skill->getSkillLevel() . ']' . '" added.' ) );*/
                }

            }
        }
        redirect( 'sectors' );
    }


    public function delete( $idSectors )
    {
        $sector = $this->sectors->getSector( $idSectors );
        if ( !$sector instanceof Sector ) {
            $this->session->set_flashdata( array( 'error' => 'Sector not found.' ) );
        } else {
            $canBeDeleted = $this->sectors->sectorCanBeDeleted( $idSectors );
            if ( $canBeDeleted < 1 ) {
                switch ( $canBeDeleted ) {
                    case -1:
                        $this->session->set_flashdata( array( 'error' => 'Sector cannot be deleted, professional qualifications and job titles linked.' ) );
                        break;
                    case -2:
                        $this->session->set_flashdata( array( 'error' => 'Sector cannot be deleted, job titles linked.' ) );
                        break;
                    case -3:
                        $this->session->set_flashdata( array( 'error' => 'Sector cannot be deleted, professional qualifications linked.' ) );
                        break;
                    default:
                        $this->session->set_flashdata( array( 'error' => 'Sector cannot be deleted, it has existing resources linked.' ) );
                        break;
                }
            } else {
                $result = $this->sectors->deleteSector( $idSectors );
            }
        }
        redirect( 'sectors' );
    }

    private function setFormRules()
    {
        $this->form_validation->set_rules( 'sectorTitle', 'Sector Title', 'trim|required|xss_clean' );
    }

} 