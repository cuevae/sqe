<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 19/03/14
 * Time: 20:31
 */

class Jobtitle_Model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }


    public function getJobTitles()
    {
        $this->db->select( '*' );
        $this->db->join( 'sectors as s', '');
        $this->db->from( 'job_titles' );
        $result = $this->db->get()->result_array();

        return $result;
    }

    public function searchJobTitles()
    {
        $this->db->select( '*' );
    }

} 