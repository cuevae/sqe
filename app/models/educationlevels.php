<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 20/03/14
 * Time: 20:15
 */

class Educationlevels_Model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function addEducationLevel( Edlevel $edlevel )
    {

    }

    public function deleteEducationLevel( $id ){

    }

    public function getEducationLevels()
    {

    }

} 