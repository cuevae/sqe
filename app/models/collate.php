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

    public function search( $queryData )
    {
        $this->db->where('studentStatus', $queryData['studentStatus'] );
        $result = $this->db->get( 'persons' )->row_array();

        return $result;
    }

    public function getOne()
    {
        $query = $this->db->query('SELECT Persons_idUser FROM educational_qualifications WHERE qualificationType = "bsc"');
        return $query->result();


    }
}
