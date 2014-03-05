<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 05/03/14
 * Time: 12:52
 */

class Person_Model extends CI_Model {



    protected $personsTable;

    public function __construct()
    {
        parent::__construct();

        //Database loading
        $this->load->database();

        //Tables used
        $this->personsTable = 'persons';
    }

    public function add( Person_Object $person )
    {
        #TODO: check if the person already exists
        $this->db->insert( $this->personsTable , $person );
    }

}