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

        $this->viewData = array();

        $tmp_data['menu_data'] = $this->_generate_menu_data();

        $this->viewData['main_menu_view'] = $this->load->view( 'common/create_table_main_menu', $tmp_data, TRUE );

    }

    private function  _generate_menu_data()
    {
        $menu_data_array = array(
            "Lobby" => array(
                "Front page" => "meta/lobby",
                "About this site" => "meta/about",
            ),
            "Messaging" => array(
                "Public Forums" => "forum",
                "Private Mail" => "mail/inbox",
            ) );

        $admin_menu_data_array = array(
            "Admin Stuff" => array(
                "Log analysis" => "admin/activity",
                "Recent changes" => "admin/changes",
                "User management" => "admin/users",
            ),
        );

        /// If we're logged in, we get an extra menu item under People
        if ( $this->session->userdata( 'login_name' ) )
            $menu_data_array["People"]["My details"] = "people/view/" .
                $this->session->userdata( 'login_name' );

        /// If we're admin, we get the special menu additions!
        /// (We merge, rather than a straight insert, as one day the admin menu
        /// additions may interweave with the user ones above.)
        if ( $this->session->userdata( 'admin' ) ) {
            $admin_menu_array = array_merge_recursive( $admin_menu_data_array, $menu_data_array );
            return ( $admin_menu_array );
        }

        /// Otherwise, the boring ol' menu gets delivered.
        return ( $menu_data_array );
    }

} 