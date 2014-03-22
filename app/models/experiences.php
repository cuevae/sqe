<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 18/03/14
 * Time: 23:38
 */

class Experiences_Model extends CI_Model
{

    protected $objectIdField;
    protected $table;
    protected $objectClass;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->table = 'experiences';
        $this->objectIdField = 'idExperiences';
        $this->objectClass = 'Experience';
    }

    public function getUserExperiences( $idUser )
    {
        $this->db->select( '*' );
        $this->db->from( 'experiences as e' );
        $this->db->join( 'job_titles as jt', 'jt.idJobTitles = e.JobTitles_idJobTitles' );
        $this->db->join( 'sectors as s', 's.idSectors = jt.Sectors_idSectors' );
        $this->db->join( 'employment_levels as el', 'el.idLevelsOfEmployment = e.EmploymentLevels_idLevelsOfEmployment' );
        $this->db->where( 'Persons_idUser', $idUser );
        $results = $this->db->get()->result_array();

        $objects = array();
        foreach ( $results as $result ) {
            $result['jobtitle'] = new Jobtitle( $result );
            $result['sector'] = new Sector( $result );
            $result['employmentlevel'] = new EmploymentLevel( $result );
            $experience = new Experience( $result );
            $objects[] = $experience;
        }

        return $objects;
    }

    public function searchExperiences( $dateStarted, $jobTitle, $employmentLevel, $dateFinished = null, $otherJobTitle = null )
    {

    }

    public function getExperience( $id )
    {
        $this->db->select( '*' );
        $this->db->from( 'experiences as e' );
        $this->db->join( 'job_titles as jt', 'jt.idJobTitles = e.JobTitles_idJobTitles' );
        $this->db->join( 'sectors as s', 's.idSectors = jt.Sectors_idSectors' );
        $this->db->join( 'employment_levels as el', 'el.idLevelsOfEmployment = e.EmploymentLevels_idLevelsOfEmployment' );
        $this->db->where( $this->objectIdField, $id );
        $data = $this->db->get()->row_array();
        $data['jobtitle'] = new Jobtitle( $data );
        $data['sector'] = new Sector( $data );
        $data['employmentlevel'] = new EmploymentLevel( $data );
        if ( !empty( $data ) ) {
            return new $this->objectClass( $data );
        } else {
            return -1;
        }
    }

    public function addExperience( $idUser, Experience $obj )
    {
        try {
            //Check the skill does not exist already
            if ( $this->alreadyExists( $idUser, $obj ) ) {
                return -2;
            }
            $this->db->insert( $this->table, $obj );
        } catch ( Exception $e ) {
            return -1;
        }

        return $this->db->insert_id();
    }

    public function deleteExperience( $id )
    {
        $this->db->where( $this->objectIdField, $id );
        $this->db->delete( $this->table );
    }

    public function setVerified()
    {

    }

    public function unsetVerified()
    {

    }

    public function alreadyExists( $idUser, Experience $experience )
    {
        $this->db->select( '*' );
        $this->db->from( $this->table );
        $this->db->where( 'JobTitles_idJobTitles', $experience->getJobTitleId() );
        if ( $employerName = $experience->getExperienceName( false ) ) {
            $this->db->where( 'employerName', $employerName );
        }
        if ( $dateStarted = $experience->getDateStarted() ) {
            $this->db->where( 'dateStarted', $dateStarted );
        }
        if ( $dateFinished = $experience->getDateFinished() ) {
            $this->db->where( 'dateFinished', $dateStarted );
        }
        $this->db->where( 'Persons_idUser', $idUser );
        return $this->db->get()->num_rows();
    }

} 
