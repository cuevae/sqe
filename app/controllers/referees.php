<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 20/03/14
 * Time: 20:46
 */

class Referees extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('referees');
    }

    public function index()
    {
        $idUser = $this->getIdUser();
        $tmpData['_idUser'] = $idUser;
        $tmpData['_referees'] = $this->referees->getRefereesForUser( $idUser );
        $this->viewData['main_content_view'] = $this->load->view( 'referees/view-add', $tmpData, TRUE );
        $this->viewData['title'] = 'Referees';
        $this->load->view( 'default', $this->viewData );
    }

    public function add()
    {

    }

    public function delete( $id )
    {

    }

} 