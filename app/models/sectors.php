<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 19/03/14
 * Time: 20:35
 */

class Sectors_Model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getSector( $idSectors )
    {
        $this->db->select( '*' )->from( 'sectors' )->where( 'idSectors', $idSectors );
        $result = $this->db->get()->row_array();
        if ( !empty( $result ) ) {
            $result = new Sector( $result );
        }

        return $result;
    }

    public function getSectors()
    {
        $this->db->select( '*' )->from( 'sectors' );
        $results = $this->db->get()->result_array();

        $objects = [ ];
        foreach ( $results as $result ) {
            $sector = new Sector( $result );
            $objects[] = $sector;
        }

        return $objects;
    }

    public function getAvailableSectors( $reduced = true )
    {
        $this->db->select( 's.*' );
        $this->db->from( 'sectors as s' );
        $result = $this->db->get()->result_array();

        if ( $reduced ) {
            $result = array_reduce( $result, function ( $res, $item ) {
                $res[$item['idSectors']] = $item['sectorTitle'];
                return $res;
            }, array() );
        }

        return $result;
    }


    public function searchSectors( $query )
    {
        $this->db->select()->from( 'sectors' )->like( 'sectorTitle', $query );
        $result = $this->db->get()->result_array();

        return $result;
    }

    public function addSector( Sector $sector )
    {
        $this->db->insert( 'sectors', $sector );
        return $this->db->insert_id();
    }

    public function deleteSector( $idSectors )
    {
        $this->db->where( 'idSectors', $idSectors );
        return $this->db->delete( 'sectors' );
    }

}