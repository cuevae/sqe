<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 05/03/14
 * Time: 12:17
 */

class Employme extends CI_Controller
{

    /**
     * Load the needed models, helpers and libraries
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->helper( array( 'form' ) );
        $this->load->library( 'form_validation' );
    }


    /**
     * Handles the log in request.
     * View: employme/login
     * Models used: Employme_Model (for user and password verification)
     * If log in successful it should redirect to curriculum/view/{user_id}
     */
    public function login()
    {

    }


    /**
     * Handles the sign up request
     * View: employme/signup
     * Models used: jobSeeker (for new user creation)
     * It will call the JobSeeker model to insert a new user in the system and
     * on success it will redirect to curriculum/edit/{new_user_id}
     */
    public function signup()
    {
        $this->form_validation->set_rules( 'username', 'Username', 'required' );
        if ( $this->form_validation->run() == FALSE ) {
            $this->load->view( 'employme/signup' );

        } else {


            //Access model
            $result = '';

            $data['defaultName'] = $result;

            if ( isset( $_POST['username'] ) ) {
                $data['var'] = $_POST['username'];
            } else {
                $data['var'] = 'Nothing sent';
            }

            $this->load->view( 'curriculum/add', $data );
        }
    }

    /**
     * Logs the current user out of the system
     * On success it will destroy the current session and load the logout view: employme/logout
     */
    public function logout()
    {

    }

} 