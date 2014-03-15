<?php

/**
 * Created by PhpStorm.
 * User: Adeyeni
 * Date: 05/03/14
 * Time: 11:08
 */
class Collate extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        //Models
        $this->load->model('collate');

        //Form helpers
        $this->load->helper('form_helper');
        $this->load->library('form_validation');

    }

    public function collater()
    {
        $this->load->view('collate/collater');
    }

    public function collatelist()
    {
       $this->load->model('collate');
        $data['result'] = $this->collate->getOne();
        $this->load->view('collate/collatelist', $data);
    }

} 
