<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 12/02/14
 * Time: 17:45
 */

namespace Controllers;

class Pages extends \CI_Controller
{

    /**
     * @param string $page
     */
    public function view( $page = 'home' )
    {
        if ( !file_exists( 'app/views/pages/' . $page . 'php' ) ) ;
        {
            show_404();
        }


        $this->load->library( 'unit_test' );
        echo $this->unit_test->report();


        $data['title'] = ucfirst( $page );

        $this->load->view( 'templates/header', $data );
        $this->load->view( 'pages/' . $page, $data );
        $this->load->view( 'templates/footer', $data );
    }
}