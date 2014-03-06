<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 05/03/14
 * Time: 12:44
 */

class Jobseeker_Model extends CI_Model {

    protected $jobseekerTable;

    public function __construct()
    {
        parent::__construct();

        $this->load->database();

        $this->jobseekerTable = 'persons';
    }

    public function add( Jobseeker_Object $jobseeker )
    {
        $result = $this->simpleloginsecure->create('Enmanuel', 'Cueva', 'cuevaec@gmail.com', 'helloDarling');
    }

    public function getFromId( $id ){

    }

    public function getFromEmail( $email )
    {

    }

    public function test()
    {

    }


} 