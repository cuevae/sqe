<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 18/03/14
 * Time: 23:38
 */

class Experiences_Model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getUserExperiences( $idUser )
    {
        $this->db->select( '*' );
        $this->db->from( 'experiences' );
        $this->db->where( 'Persons_idUser', $idUser );
        $results = $this->db->get()->result_array();

        $objects = array();
        foreach( $results as $result ){
            $experience = new Experience($result);
            $objects[] = $experience;
        }

        return $objects;
    }

    public function searchExperiences( $dateStarted, $jobTitle, $employmentLevel, $dateFinished = null, $otherJobTitle = null )
    {

    }

    public function addExperience( Experience $experience )
    {

    }

    public function deleteExperience()
    {

    }

    public function setVerified()
    {

    }

    public function unsetVerified()
    {

    }

} 
