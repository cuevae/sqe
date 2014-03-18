
<?php

class Signup_Model extends CI_Model
{

    public function __construct()
    {
        $this->load->library( 'SimpleLoginSecure' );
        $this->load->database();
    }

    public function signup( $forename1, $surname, $userEmail, $password )
    {
        return $this->simpleloginsecure->create( $forename1, $surname, $userEmail, $password, true );
    }

}

/**
 * Created by PhpStorm.
 * User: mypc
 * Date: 15/03/14
 * Time: 21:05
 */ 