<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 20/03/14
 * Time: 00:05
 */

class Employmentlevels_Model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getEmploymentLevel( $idLevel )
    {
        $this->db->select( '*' )->from( 'employment_levels' )->where( 'idLevelsOfEmployment', $idLevel );
        $result = $this->db->get()->row_array();
        if ( !empty( $result ) ) {
            $result = new EmploymentLevel( $result );
        }

        return $result;
    }

    public function getEmploymentLevels()
    {
        $this->db->select( '*' )->from( 'employment_levels' );
        $results = $this->db->get()->result_array();

        $objects = [ ];
        foreach ( $results as $result ) {
            $level = new EmploymentLevel( $result );
            $objects[] = $level;
        }

        return $objects;
    }

    public function getAvailableEmploymentLevels( $reduced = true )
    {
        $this->db->select( '*' );
        $this->db->from( 'employment_levels' );
        $result = $this->db->get()->result_array();

        if ( $reduced ) {
            $result = array_reduce( $result, function ( $res, $item ) {
                $res[$item['idLevelsOfEmployment']] = $item['employmentLevel'];
                return $res;
            }, array() );
        }

        return $result;
    }


    public function searchLevels( $query )
    {
        $this->db->select()->from( 'employment_levels' )->like( 'employmentLevel', $query );
        $result = $this->db->get()->result_array();

        return $result;
    }

    public function addEmploymentLevel( EmploymentLevel $level )
    {
        $this->db->insert( 'employment_levels', $level );
        return $this->db->insert_id();
    }

    public function deleteLevel( $idLevel )
    {
        $this->db->where( 'idLevelsOfEmployment', $idLevel );
        return $this->db->delete( 'employment_levels' );
    }

}