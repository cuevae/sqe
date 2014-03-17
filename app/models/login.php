<?php
if (!defined('BASEPATH'))
    exit ('No direct script access allowed');

class Login_Model extends CI_Model
{

    public function get_user($name, $password)
    {
        $query = $this->db->get_where('persons', array('username' => $name));
        if ($query->num_rows() > 0) {
            $query = $query->row_array();
            $username = $query['username'];
            $password = $query['password'];
            if ($name === $username) {
                $userdata = array('username' => $username);
                $this->session->set_userdata($userdata);
                return true;
            } else {
                return false;


            }

        }

    }

}

