<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 22/03/14
 * Time: 17:18
 */

class JobPreferences_Model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getUserJobPreferences( $idUser )
    {
        $this->db->select( '*' );
        $this->db->from( 'job_preferences as jp' );
        $this->db->join( 'job_titles as jt', 'jt.idJobTitles = jp.JobTitles_idJobTitles' );
        $this->db->join( 'sectors as s', 's.idSectors = jt.Sectors_idSectors' );
        $this->db->where( 'person_idUser', $idUser );
        $results = $this->db->get()->result_array();

        $objects = array();
        foreach ( $results as $result ) {
            $result['sector'] = new Sector( $result );
            $result['jobtitle'] = new Jobtitle( $result );
            $obj = new JobPreference( $result );
            $objects[] = $obj;
        }

        return $objects;
    }

    public function addJobPreference( $idUser, JobPreference $obj )
    {
        try {
            //Check the skill does not exist already
            if ( $this->alreadyExists( $idUser, $obj->getJobTitleId() ) ) {
                return -2;
            }
            $this->db->insert( 'job_preferences', $obj );
        } catch ( Exception $e ) {
            return -1;
        }

        return $this->db->insert_id();
    }

    public function delete( $idUser, $jobTitleId )
    {
        $this->db->where( 'JobTitles_idJobTitles', $jobTitleId );
        $this->db->where( 'person_idUser', $idUser );
        $this->db->delete( 'job_preferences' );
    }

    public function alreadyExists( $idUser, $idJobTitle )
    {
        $this->db->select( '*' );
        $this->db->from( 'job_preferences' );
        $this->db->where( 'JobTitles_idJobTitles', $idJobTitle );
        $this->db->where( 'person_idUser', $idUser );
        return $this->db->get()->num_rows();
    }

} 