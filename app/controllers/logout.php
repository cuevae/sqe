<?php
/**
 * Created by PhpStorm.
 * User: mypc
 * Date: 11/03/14
 * Time: 22:16
 */
if (!defined('BASEPATH')) exit ('No direct script access allowed');

class Logout extends CI_Controller
{
    public function index()
    {
        $this->session->sess_destroy();
        $this->load->helper('url');
        redirect(base_url() . 'index.php/login');

    }
} 