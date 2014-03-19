<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 19/03/14
 * Time: 22:01
 */

class Jobtitles extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        /*if( !$this->isAdmin() ){
            show_404();
        }*/
        $this->load->model( 'jobtitles' );
        $this->load->model( 'sectors' );
    }

    public function index()
    {
        $tmpData['_error'] = $this->session->flashdata( 'error' );
        $tmpData['_jobtitles'] = $this->jobtitles->getJobtitles();
        $tmpData['_jobtitlesBySector'] = $this->jobtitles->getJobtitlesBySector();
        $tmpData['_sectors'] = $this->sectors->getAvailableSectors();
        $this->viewData['main_content_view'] = $this->load->view( 'jobtitles/view-add', $tmpData, TRUE );
        $this->viewData['title'] = 'Job Titles';
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
                    $jobtitle = new JobTitle( $data );
                    $result = $this->jobtitles->addJobTitle( $jobtitle );
                } catch ( Exception $e ) {
                    $this->session->set_flashdata( array( 'error' => 'Jobtitle could not be added,
                    please ensure you are providing all the needed data.' ) );
                }
                redirect( 'jobtitles' );
            }
        } else {
            redirect( 'jobtitles' );
        }
    }


    public function delete( $idJobTitles )
    {
        $jobtitle = $this->jobtitles->getJobTitle( $idJobTitles );
        if ( !$jobtitle instanceof Jobtitle ) {
            show_404();
        }

        $this->jobtitles->deleteJobTitle( $idJobTitles );

        redirect( 'jobtitles' );
    }

    private function setFormRules()
    {
        $this->form_validation->set_rules( 'jobTitle', 'Job Title', 'trim|required|xss_clean' );
        $this->form_validation->set_rules( 'Sectors_idSectors', 'Sector Title', 'trim|required|xss_clean' );
    }

} 