<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 04/03/14
 * Time: 14:43
 */

class Jobtitle extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        //Models
        $this->load->model( 'jobtitle' );
        $this->load->model( 'curriculum' );

        //Form helpers
        $this->load->helper( 'form_helper' );
        $this->load->library( 'form_validation' );

    }


    public function view()
    {
        $data['jobTitles'] = $this->jobtitle->getAll();
        $this->load->view( 'jobtitle/view', $data );
    }

    public function viewone()
    {

        $userQuery = $_POST['query'];

        $data['item'] = $this->jobtitle->getOne( $userQuery );
        $this->load->view( 'jobtitle/viewone', $data );
    }

} 