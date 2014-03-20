<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 20/03/14
 * Time: 20:25
 */

class Professionalqualifications extends MY_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('');
    }

    public function index()
    {
        $idUser = $this->getIdUser();
        $tmpData['_idUser'] = $idUser;
        $tmpData['_sectors'] = $this->educationlevels->getAvailableSectors;
        $this->viewData['main_content_view'] = $this->load->view( 'professionalqualifications/view-add', $tmpData, TRUE );
        $this->viewData['title'] = 'Professional Qualifications';
        $this->load->view( 'default', $this->viewData );
    }

    public function add()
    {

    }

    public function delete( $id )
    {

    }

} 