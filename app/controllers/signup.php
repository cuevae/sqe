<?php

/**
 * Created by PhpStorm.
 * User: mypc
 * Date: 04/03/14
 * Time: 12:35
 */
class Signup extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form'));
        $this->load->library('form_validation');
    }


    public function newuser()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('signup/signup');

        } else {


            //Access model
            $result = '';

            $data['defaultName'] = $result;

            if (isset($_POST['username'])) {
                $data['var'] = $_POST['username'];
            } else {
                $data['var'] = 'Nothing sent';
            }

            $this->load->view('curriculum/add', $data);
        }

    }


} 