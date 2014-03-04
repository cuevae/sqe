<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 03/03/14
 * Time: 17:41
 */

class Cv extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //$this->load->model( 'cv' );
        //$this->load->database();
        $this->load->library('form_validation');
        $this->load->helper('form');
    }


    public function add()
    {
        //Form validation
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|md5');
        $this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
        $this->form_validation->set_rules('forename1', 'Forename1', 'trim|required|xss_clean');
        $this->form_validation->set_rules('surname', 'Surname', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) // validation hasn't been passed
        {
            $this->load->view( 'cv/add' );
        }
        else // passed validation proceed to post success logic
        {
            $this->load->view( 'cv/add', array('success' => 'Form is correct!') );
        }
    }

    public function view( $id )
    {

    }

} 