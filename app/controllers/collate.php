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

        if( $this->input->server('REQUEST_METHOD') == 'POST' ){

            $post = $this->input->post();
            //Now you can use the post data to perform the query with the data above by calling the model

            $result = $this->collate->search( $post );

            $jobseeker = new Jobseeker( $result );

            $data['_jobseeker'] = $jobseeker;
        }

        $this->load->view('collate/collater', $data);
    }

    public function collatelist()
    {
        $post = $this->input->post();
        $data['results'] = $this->collate->getOne();
        $this->load->view('collate/collatelist', $data);
    }

} 
