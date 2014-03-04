<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 03/03/14
 * Time: 17:41
 */

class Curriculum extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model( 'curriculum' );
        //$this->load->database();
        $this->load->library('form_validation');
        $this->load->helper('form');
    }


    public function add()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|md5');
        $this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
        $this->form_validation->set_rules('forename1', 'Forename', 'trim|required|xss_clean');
        $this->form_validation->set_rules('surname', 'Surname', 'trim|required|xss_clean');

        $result = $this->curriculum->get();

        if ($this->form_validation->run() == FALSE) // validation hasn't been passed
        {
            $this->load->view( 'curriculum/add' );
        }
        else // passed validation proceed to post success logic
        {
            $this->load->view( 'curriculum/add', array('success' => 'Form is correct!') );
        }
    }

    public function view( $id )
    {

    }

} 