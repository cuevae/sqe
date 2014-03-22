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
        try {
            if ( $this->sectorAlreadyExists( $sector->getSectorTitle( false ) ) ) {
                return -2;
            }
            $this->db->insert( 'sectors', $sector );
        } catch ( Exception $e ) {
            return -1;
        }

        return $this->db->insert_id();
    }

    public function deleteSector( $idSectors )
    {
        try {
            if ( !$this->sectorCanBeDeleted( $idSectors ) ) {
                return -2;
            }
            $this->db->where( 'idSectors', $idSectors );
            $this->db->delete( 'sectors' );
        } catch ( Exception $e ) {
            return -1;
        }
        return 1;

    }

    public function sectorAlreadyExists( $name )
    {
        $this->db->select( '*' );
        $this->db->from( 'sectors' );
        $this->db->where( 'sectorTitle', $name );
        return $this->db->get()->num_rows();
    }


    public function sectorCanBeDeleted( $id )
    {
        $this->db->select( array( 's.idSectors', 'jt.idJobTitles', 'pq.idProfessionalQualifications' ) );
        $this->db->from( 'sectors as s' );
        $this->db->join( 'job_titles as jt', 'jt.Sectors_idSectors = s.idSectors', 'left' );
        $this->db->join( 'professional_qualifications pq', 'pq.idProfessionalQualifications = s.idSectors', 'left' );
        $this->db->where( 's.idSectors', $id );
        $res = $this->db->get()->row_array();
        if ( empty( $res['idJobTitles'] ) && empty( $res['idProfessionalQualifications'] ) ) {
            return 1;
        } elseif ( !empty( $res['idJobTitles'] ) && !empty( $res['idProfessionalQualifications'] ) ) {
            return -1;
        } elseif ( !empty( $res['idJobTitles'] ) ) {
            return -2;
        } else {
            return -3;
        }
    }

}