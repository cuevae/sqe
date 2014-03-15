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
        $this->db->select( 'p.*, e.educationLevel' );
        $this->db->from( 'persons as p' );
        $this->db->join( 'education_levels as e', 'e.idEducationLevel = p.EducationLevels_idEducationLevel', 'left' );
        $this->db->where( 'idUser', $idUser );
        $result = $this->db->get()->row_array();
        try {
            $jobseeker = new Jobseeker( $result );
            return $jobseeker;
        } catch ( Exception $e ) {
            return -1;
        }
    }

    public function getAvailableEducationLevels( $reduced = true )
    {
        $this->db->select( 'e.*' );
        $this->db->from( 'education_levels as e' );
        $result = $this->db->get()->result_array();

        if ( $reduced ) {
            $result = array_reduce( $result, function ( $res, $item ) {
                $res[$item['idEducationLevel']] = $item['educationLevel'];
                return $res;
            }, array() );
        }

        return $result;
    }


} 