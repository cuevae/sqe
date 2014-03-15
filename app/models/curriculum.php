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
    }

    public function saveJobseekerDetails( Jobseeker $jobseeker )
    {
        if ( $jobseeker->getId() == false ) {
            return -1;
        }

        try {
            $this->db->where( 'idUser', $jobseeker->getId() );
            $result = $this->db->update( $this->personsTable, $jobseeker );
            return 1;
        } catch ( Exception $e ) {
            return -2;
        }
    }

    public function getJobseekerDetails( $idUser )
    {
        $query = $this->db->get_where( $this->personsTable, array( 'idUser' => $idUser ) );
        $result = $query->row_array();
        try{
            $jobseeker = new Jobseeker( $result );
            return $jobseeker;
        } catch( Exception $e ){
            return -1;
        }
    }


} 