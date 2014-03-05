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

        $this->jobseekerTable = 'persons';
    }

    public function add( Jobseeker_Object $jobseeker )
    {
        #TODO: check if the jobseeker already exists
        $this->db->insert( $this->personsTable , $jobseeker );
    }

    public function getFromId( $id ){

    }

    public function getFromEmail( $email )
    {

    }


} 