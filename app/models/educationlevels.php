<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 20/03/14
 * Time: 20:15
 */

class Educationlevels_Model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->table = 'education_levels';
    }

    public function addEducationLevel( Edlevel $edlevel )
    {
        try {
            //Check the skill does not exist already
            if ( $this->alreadyExists( $edlevel->getEducationLevel( false ) ) ) {
                return -2;
            }
            $this->db->insert( 'education_levels', $edlevel );
        } catch ( Exception $e ) {
            return -1;
        }

        return $this->db->insert_id();
    }

    public function canBeDeleted( $id )
    {
        $this->db->select( array( 'el.idEducationLevel', 'p.EducationLevels_idEducationLevel as p_idEducationLevel', 'eq.EducationLevels_idEducationLevel as eq_idEducationLevel' ) );
        $this->db->from( 'education_levels as el' );
        $this->db->join( 'persons as p', 'p.EducationLevels_idEducationLevel = el.idEducationLevel', 'left' );
        $this->db->join( 'educational_qualifications eq', 'eq.EducationLevels_idEducationLevel = el.idEducationLevel', 'left' );
        $this->db->where( 'el.idEducationLevel', $id );
        $res = $this->db->get()->row_array();
        if ( empty( $res['p_idEducationLevel'] ) && empty( $res['eq_idEducationLevel'] ) ) {
            return 1;
        } elseif ( !empty( $res['p_idEducationLevel'] ) && !empty( $res['eq_idEducationLevel'] ) ) {
            return -1;
        } elseif ( !empty( $res['p_idEducationLevel'] ) ) {
            return -2;
        } else {
            return -3;
        }
    }

    public function deleteEducationLevel( $id )
    {
        try {
            if ( $this->canBeDeleted( $id ) < 1 ) {
                return -2;
            } else {
                $this->db->where( 'idEducationLevel', $id );
                $this->db->delete( 'education_levels' );
            }
        } catch ( Exception $e ) {
            return -1;
        }
        return 1;
    }

    public function getEducationLevels()
    {
        $this->db->select();
        $this->db->from( $this->table );
        $results = $this->db->get()->result_array();

        $objects = [ ];
        foreach ( $results as $result ) {
            $objects[] = new Edlevel( $result );
        }

        return $objects;
    }

    public function getEducationLevel( $id )
    {
        $this->db->select();
        $this->db->from( $this->table );
        $this->db->where( 'idEducationLevel', $id );
        $data = $this->db->get()->row_array();
        if ( !empty( $data ) ) {
            return new Edlevel( $data );
        }
        return -1;
    }

    public function getAvailableEducationLevels( $reduced = true )
    {
        $this->db->select( 's.*' );
        $this->db->from( 'education_levels as el' );
        $result = $this->db->get()->result_array();

        if ( $reduced ) {
            $result = array_reduce( $result, function ( $res, $item ) {
                $res[$item['idEducationLevel']] = $item['educationLevel'];
                return $res;
            }, array() );
        }

        return $result;
    }


    public function alreadyExists( $edLevel )
    {
        $this->db->select( '*' );
        $this->db->from( 'education_levels' );
        $this->db->where( 'educationLevel', $edLevel );
        return $this->db->get()->num_rows();
    }

} 