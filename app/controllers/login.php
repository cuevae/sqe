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
        $this->form_validation->set_rules('username', 'Username', 'valid_email|trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() === false) {
            $data['title'] = "Login Page";
            $this->load->view('templates/header', $data);
            $this->load->view('login/login', $data);

        } else {
            $name = $this->input->post('username');
            $password = $this->input->post('password');
            $this->load->model('login');
            $idUser = $this->login->get_user($name, $password);
            if ($idUser !== false ) {
                redirect(base_url() . 'index.php/curriculum/view/' . $idUser);
            } else {
                $data['error message'] = "Invalid Username and Password";
                $data ['title'] = "Login Page";
                $this->load->view('templates/header', $data);
                $this->load->view('login/login', $data);

            }

        }

    }

}





