<?php
/**
 * Created by PhpStorm.
 * User: mypc
 * Date: 11/03/14
 * Time: 22:16
 */
if ( !defined( 'BASEPATH' ) ) exit ( 'No direct script access allowed' );

class Logout extends MY_Controller
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->library( 'SimpleLoginSecure' );
        $this->load->database();
    }

    public function index()
    {
        $this->simpleloginsecure->logout();
        $tmpData['_error'] = $this->session->flashdata( 'error' );
        $tmpData['_success'] = $this->session->flashdata( 'success' );
        $this->load->view( 'logout/view', $tmpData );
    }
} 