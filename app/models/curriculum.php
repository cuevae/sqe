<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 03/03/14
 * Time: 17:56
 */

class Curriculum_Model extends CI_Model
{


    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get( $id = null )
    {
        if ( isset( $id ) ){
            $query = $this->db->get_where( 'persons', array( 'idUser' => $id ) );
            return $query->row_array();
        }

        //Not id, retrieve all
        $query = $this->db->get('persons');
        return $query->result_array();
    }


} 