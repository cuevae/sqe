<?php

class Signup_Model extends CI_Model
{

    public function __construct()
    {
        $this->load->library( 'SimpleLoginSecure' );
        $this->load->database();
    }

    public function signup( $forename1, $surname, $userEmail, $password, $isAdmin )
    {
        return $this->simpleloginsecure->create( $forename1, $surname, $userEmail, $password, $isAdmin, true );
    }

}