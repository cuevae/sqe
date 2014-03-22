<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 20/03/14
 * Time: 20:57
 */

class Referees_Model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function addReferee( $idUser, Referee $referee )
    {
        try {
            //Check the skill does not exist already
            if ( $this->refereeAlreadyExists( $idUser, $referee->getForename( false ), $referee->getSurname( false ) ) ) {
                return -2;
            }
            $this->db->insert( 'referees', $referee );
        } catch ( Exception $e ) {
            return -1;
        }

        return $this->db->insert_id();
    }

    public function deleleReferee( $id )
    {
        $this->db->where( 'idReferees', $id );
        $this->db->delete( 'referees' );
    }

    public function getUserReferees( $idUser )
    {
        $this->db->select( '*' );
        $this->db->from( 'referees' );
        $this->db->where( 'Persons_idUser', $idUser );
        $results = $this->db->get()->result_array();

        $objects = array();
        foreach ( $results as $result ) {
            $referee = new Referee( $result );
            $objects[] = $referee;
        }

        return $objects;
    }

    public function getReferee( $id )
    {
        $this->db->select( '*' );
        $this->db->from( 'referees' );
        $this->db->where( 'idReferees', $id );
        $data = $this->db->get()->row_array();
        if ( !empty( $data ) ) {
            return new Referee( $data );
        } else {
            return -1;
        }
    }

    public function getReferees()
    {
        $this->db->select( '*' );
        $this->db->from( 'referees' );
        $results = $this->db->get()->result_array();

        $objects = array();
        foreach ( $results as $result ) {
            $referee = new Referee( $result );
            $objects[] = $referee;
        }

        return $objects;
    }

    public function refereeAlreadyExists( $idUser, $forename, $surname )
    {
        $this->db->select( '*' );
        $this->db->from( 'referees' );
        $this->db->where( 'forename', $forename );
        $this->db->where( 'surname', $surname );
        $this->db->where( 'Persons_idUser', $idUser );
        return $this->db->get()->num_rows();
    }

    public function setVerified( $id, $howVerified = '' )
    {
        $data = [ 'verified' => 1, 'howVerified' => $howVerified ];
        $this->db->where( 'idReferees', $id );
        $this->db->update( 'referees', $data );
    }

    public function unsetVerified( $id )
    {
        $data = [ 'verified' => 0, 'howVerified' => null ];
        $this->db->where( 'idReferees', $id );
        $this->db->update( 'skills', $data );
    }

} 