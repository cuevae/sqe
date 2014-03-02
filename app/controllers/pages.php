<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 12/02/14
 * Time: 17:45
 */

class Pages extends \CI_Controller
{

    /**
     * @param string $page
     */
    public function view( $page = 'about' )
    {
        if ( !file_exists( 'app/views/pages/' . $page . '.php' ) )
        {
            show_404();
        }

        $data['title'] = ucfirst( $page );

        $this->load->view( 'templates/header', $data );
        $this->load->view( 'pages/' . $page, $data );
        $this->load->view( 'templates/footer', $data );
    }
}