<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 05/03/14
 * Time: 12:38
 */

class Admin extends CI_Controller
{

    /**
     * Load models, helpers and libraries
     *
     * We also need to check here id the current user has permission to access the admin area,
     * ie. user type is admin. If it doesn't have the required permission a show_404() needs to be called
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Handles the admin search requests
     */
    public function search()
    {

    }

} 