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

    public function getAll()
    {
        $query = $this->db->get('educational_qualifications');
        return $query->result_array();
    }

    public function getOne( $userQuery )
    {
        $query = $this->db->get_where( 'educational_qualifications', array( 'qualificationType' => $userQuery ) );
        return $query->row_array();
    }
}
