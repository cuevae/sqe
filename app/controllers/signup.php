<?php
/**
 * Created by PhpStorm.
 * User: mypc
 * Date: 15/03/14
 * Time: 18:19
 */

class Signup extends MY_Controller
{


    public function __construct()
    {
        parent:: __construct();
        $this->load->helper( 'url' );
        $this->load->model( 'signup' );
    }

    public function index()
    {

        $this->data['title'] = "Signup User";

        //validate form input

        $this->form_validation->set_rules( 'username', 'Username', 'valid_email|required|xss_clean' );
        $this->form_validation->set_rules( 'password', 'Password', 'required' );
        $this->form_validation->set_rules( 'forename1', 'First Name', 'required|xss_clean' );
        $this->form_validation->set_rules( 'surname', 'Surname', 'required|xss_clean' );

        if ( $this->input->server( 'REQUEST_METHOD' ) == 'POST' ) {
            if ( $this->form_validation->run() === true ) {

                $forename1 = $this->input->post( 'forename1' );
                $surname = $this->input->post( 'surname' );
                $userEmail = strtolower( $this->input->post( 'username' ) );
                $password = $this->input->post( 'password' );
                $isAdmin = $this->input->post( 'isAdmin' );

                $result = $this->signup->signup( $forename1, $surname, $userEmail, $password, $isAdmin );

                if ( $result !== false ) {
                    redirect( 'curriculum/edit/' );
                }

            }
        }

        //display the create user form
        //set the flash data error message if there is one
        $this->data['_error'] = ( validation_errors() ? validation_errors() : ( $this->session->flashdata( 'message' ) ) );

        $this->data['forename1'] = array(
            'name' => 'forename1',
            'id' => 'forename1',
            'type' => 'text',
            'size' => 32,
            'maxlength' => 32,
            'value' => $this->form_validation->set_value( 'forename1' ),
        );

        $this->data['surname'] = array(
            'name' => 'surname',
            'id' => 'surname',
            'type' => 'text',
            'size' => 32,
            'maxlength' => 32,
            'value' => $this->form_validation->set_value( 'surname' ),
        );


        $this->data['username'] = array(
            'name' => 'username',
            'id' => 'username',
            'type' => 'username',
            'size' => 32,
            'maxlength' => 32,
            'value' => $this->form_validation->set_value( 'username' ),
        );
        $this->data['password'] = array(
            'name' => 'password',
            'id' => 'password',
            'type' => 'password',
            'size' => 32,
            'maxlength' => 32,
            'value' => $this->form_validation->set_value( 'password' ),
        );
        $this->data['admin'] = array(
            'name' => 'isAdmin',
            'id' => 'isAdmin',
            'value' => 1,
            'checked' => FALSE
        );

        $this->load->view( 'signup/signup', $this->data );

    }

}
