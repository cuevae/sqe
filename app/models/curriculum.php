<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 03/03/14
 * Time: 17:56
 */

class Curriculum_Model extends CI_Model
{

    protected $personsTable;
    protected $educationLevelsTable;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        //Tables init
        $this->personsTable = 'persons';
        $this->educationLevelsTable = 'education_levels';
    }

    public function saveJobseekerDetails( Jobseeker $jobseeker )
    {
        if($jobseeker->getId() == false ){
            return -1;
        }

        try {
            $this->db->where('idUser', $jobseeker->getId() );
            $result = $this->db->update( $this->personsTable, $jobseeker );
            return 1;
        } catch ( Exception $e ) {
            return -2;
        }
    }

    public function get( $id = null )
    {
        //I've changed this

        if ( isset( $id ) ) {
            $query = $this->db->get_where( $this->personsTable, array( 'idUser' => $id ) );
            return $query->row_array();
        }

        //Not id, retrieve all
        $query = $this->db->get( 'persons' );
        return $query->result_array();
    }


} 