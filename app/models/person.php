<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 05/03/14
 * Time: 12:52
 */

class Person_Model extends CI_Model
{

    protected $personsTable;

    public function __construct()
    {
        parent::__construct();

        //Database loading
        $this->load->database();

        //Tables used
        $this->personsTable = 'persons';
    }

    /**
     * Adds a person to our collection of persons
     *
     * @param Person_Object $person
     * @param $password
     */
    public function add( Person_Object $person, $password )
    {
        #TODO: Handle errors such as what would happen if the person already exists
        $this->simpleloginsecure->create( $person->getForename1(), $person->getSurname(), $person->getUsername(), $password );
    }

}