<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 20/03/14
 * Time: 20:08
 */

class Educationlevels extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        /*if( !$this->isAdmin() ){
            show_404();
        }*/
        $this->load->model('educationlevels');
    }

    public function index()
    {
        $tmpData['_edLevels'] = $this->educationlevels->getEducationLevels();
        $this->viewData['main_content_view'] = $this->load->view( 'educationlevels/view-add', $tmpData, TRUE );
        $this->viewData['title'] = 'Education Levels';
        $this->load->view( 'default', $this->viewData );
    }

    public function add()
    {

    }

    public function delete()
    {

    }

} 