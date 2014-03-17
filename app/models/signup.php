
<?php

class Signup_Model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function signup($data)
    {
        $this->db->insert('persons', $data);

        $id = $this->db->insert_id();

        return (isset($id)) ? $id : FALSE;
    }

}

/**
 * Created by PhpStorm.
 * User: mypc
 * Date: 15/03/14
 * Time: 21:05
 */ 