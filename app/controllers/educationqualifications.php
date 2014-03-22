<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 20/03/14
 * Time: 19:38
 */

class Educationqualifications extends MY_Controller
{

    /** @var  Educationqualifications_Model */
    public $model;
    /** @var  Educationlevels_Model */
    public $el;

    public function __construct()
    {
        parent::__construct();
        $this->load->model( 'educationlevels', 'el' );
        $this->load->model( 'educationqualifications', 'model' );
    }

    public function index()
    {
        $idUser = $this->getIdUser();
        $tmpData['_idUser'] = $idUser;
        $tmpData['_edLevels'] = $this->el->getEducationLevels();
        $this->viewData['main_content_view'] = $this->load->view( 'educationqualifications/view-add', $tmpData, TRUE );
        $this->viewData['title'] = 'Ed Qualifications';
        $this->load->view( 'default', $this->viewData );
    }

    public function add()
    {

    }

    public function delete( $id )
    {

    }

} 