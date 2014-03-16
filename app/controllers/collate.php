<?php

/**
 * Created by PhpStorm.
 * User: Adeyeni
 * Date: 05/03/14
 * Time: 11:08
 */
class Collate extends MY_Controller
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
        $data = array();
        $this->load->view('collate/collater', $data);
    }

    public function collatelist()
    {
        $post = $this->input->post();
        $data['results'] = $this->collate->getOne($post);
        $this->load->view('collate/collatelist', $data);
    }

} 
