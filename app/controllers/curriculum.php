<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 03/03/14
 * Time: 17:41
 */

class Curriculum extends MY_Controller
{

    /**
     *
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model( 'curriculum' );
    }


    public function edit( $userId )
    {
        $this->form_validation->set_rules( 'title', 'Title', 'trim|required|xss_clean' );
        $this->form_validation->set_rules( 'forename1', 'Forename', 'trim|required|xss_clean' );
        $this->form_validation->set_rules( 'surname', 'Surname', 'trim|required|xss_clean' );

        $tmpData['_educationLevelOptions'] = array( 1, 2, 3, 4, 5 );
        $this->viewData['main_content_view'] = $this->load->view( 'curriculum/edit', $tmpData, TRUE );
        $this->load->view( 'default', $this->viewData );
    }


    public function view( $userId )
    {
        $this->load->view( 'curriculum/view' );
    }

} 