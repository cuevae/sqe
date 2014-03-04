<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 04/03/14
 * Time: 16:00
 */

class Jobtitle_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getOne( $userQuery )
    {
        $query = $this->db->get_where( 'job_titles', array( 'jobTitle' => $userQuery ) );
        return $query->row_array();
    }

    public function getAll()
    {
        $query = $this->db->get('job_titles');
        return $query->result_array();
    }


} 