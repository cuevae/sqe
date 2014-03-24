<?php
/**
 * Created by PhpStorm.
 * User: Adeyeni
 * Date: 05/03/14
 * Time: 12:36
 */

class Collate_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();

    }

    public function run( $data )
    {
        $this->db->select( 'p.username, p.forename1, p.surname, eq.qualificationType, p.idUser, eq.result, eq.courseName, pq.*' );
        $this->db->from( 'persons as p' );
        $this->db->join( 'educational_qualifications as eq', 'eq.Persons_idUser = p.idUser', 'left' );
        $this->db->join( 'professional_qualifications as pq', 'pq.Persons_idUser = p.idUser', 'left' );
        $this->db->join( 'education_levels as el', 'el.idEducationLevel = p.EducationLevels_idEducationLevel', 'left' );
        $this->db->join( 'experiences as exp', 'exp.Persons_idUser = p.idUser', 'left' );
        $this->db->join( 'skills as sk', 'sk.Persons_idUser = p.idUser', 'left' );
        $this->db->join( 'sectors as s', 's.idSectors = pq.Sectors_idSectors', 'left' );
        if ( isset( $data['sector'] ) && $data['sector'] != -1 ) {
            $this->db->where( 's.idSectors', $data['sector'] );
        }
        if ( isset( $data['skillName'] ) && $data['skillName'] != -1 ) {
            $this->db->where( 'sk.idSkills', $data['skillName'] );
        }
        if ( isset( $data['educationLevel'] ) && $data['educationLevel'] != -1 ) {
            $this->db->where( 'el.idEducationLevel', $data['educationLevel'] );
        }
        if ( isset( $data['noGcsePass'] ) && $data['noGcsePass'] != -1 ) {
            $this->db->where( 'p.noOfGcses >=', $data['noGcsePass'] );
        }
        if ( isset( $data['educationalQualification'] ) && $data['educationalQualification'] != -1 ) {
            $this->db->where( 'eq.idEducationalQualifications', $data['educationalQualification'] );
        }
        if ( isset( $data['professionalQualification'] ) && $data['professionalQualification'] != -1 ) {
            $this->db->where( 'pq.idProfessionalQualifications >=', $data['professionalQualification'] );
        }
        if ( isset( $data['experience'] ) && $data['experience'] != -1 ) {
            switch ( $data['experience'] ) {
                case '1 year':
                    $this->db->where( 'TIMESTAMPDIFF( YEAR, exp.dateStarted, IF( exp.dateFinished IS NOT NULL, exp.dateFinished, CURDATE() ) ) >=', '1' );
                    break;
                case '2 years':
                    $this->db->where( 'TIMESTAMPDIFF( YEAR, exp.dateStarted, IF(exp.dateFinished IS NOT NULL, exp.dateFinished, CURDATE() ) ) >=', '2' );
                    break;
                case '5 years':
                    $this->db->where( 'TIMESTAMPDIFF( YEAR, exp.dateStarted, IF(exp.dateFinished IS NOT NULL, exp.dateFinished, CURDATE() ) ) >=', '5' );
                    break;
                case 'over 10 years':
                    $this->db->where( 'TIMESTAMPDIFF( YEAR, exp.dateStarted, IF(exp.dateFinished IS NOT NULL, exp.dateFinished, CURDATE() ) ) >=', '10' );
                    break;
                default:
                    break;
            }
        }
        $result = $this->db->get()->result_array();

        $test = $this->db->last_query();

        return $result;
    }
}
