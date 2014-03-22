<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 12/03/14
 * Time: 22:19
 */

class MY_Controller extends CI_Controller
{

    protected $viewData;

    public function __construct()
    {
        parent::__construct();

        $this->checkLoggedIn();

        $this->viewData = array();

        $tmp_data['_isAdmin'] = $this->isAdmin();

        $this->viewData['main_menu_view'] = $this->load->view( 'common/create_table_main_menu', $tmp_data, TRUE );
        $this->viewData['top_bar_view'] = $this->load->view( 'common/create_top_bar', $tmp_data, TRUE );

    }

    private function checkLoggedIn()
    {
        $userData = $this->session->userdata;
        $controller = $this->router->class;
        if ( !isset( $userData['logged_in'] ) || $userData['logged_in'] !== true ) {
            if ( !in_array( $controller, array( 'login', 'signup' ) ) ) {
                redirect( 'login' );
            }
        }
    }

    protected function checkPermissions( $idUser )
    {
        $userData = $this->session->userdata;
        if ( $userData['idUser'] != $idUser && $userData['isAdmin'] !== true ) {
            show_error( 'Unauthorized', 401, 'Unauthorized' );
        }
    }

    protected function getIdUser()
    {
        return $this->session->userdata( 'idUser' );
    }

    protected function isAdmin()
    {
        return $this->session->userdata( 'isAdmin' ) == true;
    }

} 