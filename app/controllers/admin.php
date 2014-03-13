<?php

/**
 * Created by PhpStorm.
 * User: manei
 * Date: 05/03/14
 * Time: 12:38
 */
class Admin extends CI_Controller
{
    public function index()
    {
        $this->session->set_userdata('username', 'Fathi');
        //$this->session->set_userdata('user_email', 'koosaar@gmail.com');
        //$this->session->set_userdata('login_attempts', '3');
        print_r($this->session->all_userdata());
        if (!$this->session->userdata('username')) {
            // echo "You are not logged in";
            redirect(base_url() . 'login');


        } else {
            $data['title'] = "Admin Page";
            $this->load->view('pages/about', $data);
            // %this->load->view('pages/about', $data);


        }


    }

    /**
     * Load models, helpers and libraries
     *
     * We also need to check here id the current user has permission to access the admin area,
     * ie. user type is admin. If it doesn't have the required permission a show_404() needs to be called
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Handles the admin search requests
     */
    public function search()
    {



}
} 