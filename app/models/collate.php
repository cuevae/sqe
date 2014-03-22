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
        $this->db->join( 'skills as sk', 'sk.Persons_idUser = p.idUser', 'left' );
        $this->db->join( 'sectors as s', 's.Persons_idUser = p.idUser', 'left' );
        if ( isset( $data['sector'] ) && $data['sector'] != -1 ) {

        }
        $this->db->where( 'eq.qualificationType', $data['qualificationType'] );
        $this->db->where( 'pq.qualificationName', $data['qualificationName'] );
        $this->db->where( 'sk.skillName', $data['skillName'] );
        $this->db->where( 'sk.skillLevel', $data['skillLevel'] );

        $result = $this->db->get()->result_array();

        return $result;
    }
}
