<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 20/03/14
 * Time: 19:47
 */

class EducationalQualifications_Model extends CI_Model
{

    protected $table;
    protected $objectClass;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->table = 'educational_qualifications';
        $this->objectClass = 'EdQualification';
        $this->objectIdField = 'idEducationalQualifications';
    }

    public function addQualification( $idUser, EdQualification $obj )
    {
        try {
            //Check the skill does not exist already
            if ( $this->alreadyExists( $idUser, $obj->getQualificationType( false ), $obj->getCourseName( false ) ) ) {
                return -2;
            }
            $this->db->insert( $this->table, $obj );
        } catch ( Exception $e ) {
            return -1;
        }

        return $this->db->insert_id();
    }

    public function deleteQualification( $idQualification )
    {
        $this->db->where( $this->objectIdField, $idQualification );
        $this->db->delete( $this->table );
    }

    public function getAvailableEducationalQualifications( $reduced = true )
    {
        $this->db->select( array( 'idEducationalQualifications', 'qualificationType', 'courseName' ) );
        $this->db->from( 'educational_qualifications' );
        $result = $this->db->get()->result_array();

        if ( $reduced ) {
            $result = array_reduce( $result, function ( $res, $item ) {
                $res[$item['idEducationalQualifications']] = $item['qualificationType'] . ' ' . $item['courseName'];
                return $res;
            }, array() );
        }

        return $result;
    }

    public function getUserEdQualifications( $idUser )
    {
        $this->db->select( '*' );
        $this->db->from( 'educational_qualifications eq' );
        $this->db->join( 'education_levels as el', 'el.idEducationLevel = eq.EducationLevels_idEducationLevel' );
        $this->db->where( 'Persons_idUser', $idUser );
        $results = $this->db->get()->result_array();

        $objects = array();
        foreach ( $results as $result ) {
            $result['edLevel'] = new Edlevel( $result );
            $obj = new $this->objectClass( $result );
            $objects[] = $obj;
        }

        return $objects;
    }

    public function alreadyExists( $idUser, $qualificationType, $courseName )
    {
        $this->db->select( '*' );
        $this->db->from( $this->table );
        $this->db->where( 'qualificationType', $qualificationType );
        $this->db->where( 'courseName', $courseName );
        $this->db->where( 'Persons_idUser', $idUser );
        return $this->db->get()->num_rows();
    }

    public function getEducationalQualification( $id )
    {
        $this->db->select( '*' );
        $this->db->from( $this->table );
        $this->db->where( $this->objectIdField, $id );
        $data = $this->db->get()->row_array();
        if ( !empty( $data ) ) {
            return new $this->objectClass( $data );
        } else {
            return -1;
        }
    }

}