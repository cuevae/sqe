<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 19/03/14
 * Time: 20:31
 */

class Jobtitles_Model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }


    public function getJobTitles()
    {
        $this->db->select();
        $this->db->from( 'job_titles as jt' );
        $this->db->join( 'sectors as s', 's.idSectors = jt.Sectors_idSectors' );
        $results = $this->db->get()->result_array();

        $objects = [ ];
        foreach ( $results as $result ) {
            $sector = new Sector( $result );
            $result['sector'] = $sector;
            $objects[] = new Jobtitle( $result );
        }

        return $objects;
    }

    public function getAvailableJobTitles( $reduced = true )
    {
        $this->db->select( 'jt.*' );
        $this->db->from( 'job_titles as jt' );
        $result = $this->db->get()->result_array();

        if ( $reduced ) {
            $result = array_reduce( $result, function ( $res, $item ) {
                $res[$item['idJobTitles']] = $item['jobTitle'];
                return $res;
            }, array() );
        }

        return $result;
    }

    public function getJobTitlesBySector()
    {
        $this->db->select();
        $this->db->from( 'job_titles as jt' );
        $this->db->join( 'sectors as s', 's.idSectors = jt.Sectors_idSectors' );
        $results = $this->db->get()->result_array();

        $objects = [ ];
        foreach ( $results as $result ) {
            $sector = new Sector( $result );
            $result['sector'] = $sector;
            $objects[$sector->getSectorTitle()][] = new Jobtitle( $result );
        }

        return $objects;
    }


    public function getJobTitle( $id )
    {
        $this->db->select();
        $this->db->from( 'job_titles as jt' );
        $this->db->join( 'sectors as s', 's.idSectors = jt.Sectors_idSectors' );
        $this->db->where( 'idJobTitles', $id );

        $result = $this->db->get()->row_array();
        $sector = new Sector( $result );
        $result['sector'] = $sector;

        return new Jobtitle( $result );
    }

    public function addJobTitle( Jobtitle $jobtitle )
    {
        try {
            //Check the skill does not exist already
            if ( $this->alreadyExists( $jobtitle->getJobTitle( false ), $jobtitle->getSectorId() ) ) {
                return -2;
            }
            $this->db->insert( 'job_titles', $jobtitle );
        } catch ( Exception $e ) {
            return -1;
        }

        return $this->db->insert_id();
    }

    public function searchJobTitles()
    {
        $this->db->select( '*' );
    }

    public function deleteJobTitle( $id )
    {
        try {
            if ( $this->canBeDeleted( $id ) < 1 ) {
                return -2;
            } else {
                $this->db->where( 'idJobTitles', $id );
                $this->db->delete( 'job_titles' );
            }
        } catch ( Exception $e ) {
            return -1;
        }
        return 1;
    }

    public function canBeDeleted( $id )
    {
        $this->db->select( array( 'jt.idJobTitles', 'jp.JobTitles_idJobTitles', 'e.idExperiences' ) );
        $this->db->from( 'job_titles as jt' );
        $this->db->join( 'job_preferences as jp', 'jp.JobTitles_idJobTitles = jt.idJobTitles', 'left' );
        $this->db->join( 'experiences e', 'e.JobTitles_idJobTitles = jt.idJobTitles', 'left' );
        $this->db->where( 'jt.idJobTitles', $id );
        $res = $this->db->get()->row_array();
        if ( empty( $res['JobTitles_idJobTitles'] ) && empty( $res['idExperiences'] ) ) {
            return 1;
        } elseif ( !empty( $res['JobTitles_idJobTitles'] ) && !empty( $res['idExperiences'] ) ) {
            return -1;
        } elseif ( !empty( $res['idExperiences'] ) ) {
            return -2;
        } else {
            return -3;
        }
    }

    public function alreadyExists( $jobtitle, $idSectors )
    {
        $this->db->select( '*' );
        $this->db->from( 'job_titles' );
        $this->db->where( 'jobTitle', $jobtitle );
        $this->db->where( 'Sectors_idSectors', $idSectors );
        return $this->db->get()->num_rows();
    }

} 