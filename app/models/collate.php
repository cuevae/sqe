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

    public function getOne($post)
    {
        $this->db->select( 'p.username, p.forename1, p.surname, eq.qualificationType, eq.result, eq.courseName, pq.*' );
        $this->db->from( 'persons as p' );
        $this->db->join( 'educational_qualifications as eq', 'eq.Persons_idUser = p.idUser', 'left' );
        $this->db->join( 'professional_qualifications as pq', 'pq.Persons_idUser = p.idUser', 'left' );
        $this->db->join( 'skills as sk', 'sk.Persons_idUser = p.idUser', 'left' );
        $this->db->where( 'eq.qualificationType', $post['qualificationType'] );
        $this->db->where( 'pq.qualificationName', $post['qualificationName'] );
        $this->db->where( 'sk.skillName', $post['skillName'] );
        $this->db->where( 'sk.skillLevel', $post['skillLevel'] );

        $result = $this->db->get()->result_array();

        /*$query = $this->db->query('SELECT Persons_idUser FROM educational_qualifications WHERE qualificationType = "bsc"');
        return $query->result();*/

        return $result;
    }
}
