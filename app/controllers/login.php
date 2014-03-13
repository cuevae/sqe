<?php

if (!defined('BASEPATH'))
    exit ('No direct script access allowed');


/**
 * Created by PhpStorm.
 * User: mypc
 * Date: 11/03/14
 * Time: 16:04
 */
class Login extends CI_Controller
{

    public function index()

    {
        $user_name = $this->input->post('user_name');
        $password = $this->input->post('password');
        $this->form_validation->set_rules('user_name', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() === false) {
            $data['error_message'] = "Please enter our username and password";
            $data['title'] = "Admin Login Page";
            $this->load->view('templates/header', $data);
            $this->load->view('login/login');
        } else {
            $this->session->set_userdata('user_name', $user_name);
            $this->session->set_userdata('password', $password);
            $this->load->helper('url');
            redirect(base_url().'index.php/admin');

        }


    }


}
