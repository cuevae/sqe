<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 20/03/14
 * Time: 20:34
 */

class Professionalqualifications_Model extends CI_Model
{

    protected $table;
    protected $objectClass;
    protected $objectIdField;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->table = 'professional_qualifications';
        $this->objectClass = 'Professionalqualification';
        $this->objectIdField = 'idProfessionalQualifications';
    }

    public function addProfessionalQualification( $idUser, ProfessionalQualification $obj )
    {
        try {
            //Check the skill does not exist already
            if ( $this->alreadyExists( $idUser, $obj->getQualificationName( false ) ) ) {
                return -2;
            }
            $this->db->insert( $this->table, $obj );
        } catch ( Exception $e ) {
            return -1;
        }

        return $this->db->insert_id();
    }

    public function getProfessionalQualification( $id )
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

    public function getAvailableProfessionalQualifications( $reduced = true )
    {
        $this->db->select( array( 'idProfessionalQualifications', 'qualificationName' ) );
        $this->db->from( 'professional_qualifications' );
        $result = $this->db->get()->result_array();

        if ( $reduced ) {
            $result = array_reduce( $result, function ( $res, $item ) {
                $res[$item['idProfessionalQualifications']] = $item['qualificationName'];
                return $res;
            }, array() );
        }

        return $result;
    }

    public function deleteProfessionalQualification( $id )
    {
        $this->db->where( $this->objectIdField, $id );
        $this->db->delete( $this->table );
    }

    public function getUserProfessionalQualifications( $idUser )
    {
        $this->db->select( '*' );
        $this->db->from( $this->table );
        $this->db->where( 'Persons_idUser', $idUser );
        $results = $this->db->get()->result_array();

        $objects = array();
        foreach ( $results as $result ) {
            if ( !empty( $result['yearObtained'] ) ) {
                $result['yearObtained'] = date( 'Y', strtotime( $result['yearObtained'] ) );
            }
            $obj = new $this->objectClass( $result );
            $objects[] = $obj;
        }

        return $objects;
    }

    public function getProfessionalQualifications()
    {

    }

    public function alreadyExists( $idUser, $qualificationName )
    {
        $this->db->select( '*' );
        $this->db->from( $this->table );
        $this->db->where( 'qualificationName', $qualificationName );
        $this->db->where( 'Persons_idUser', $idUser );
        return $this->db->get()->num_rows();
    }


}