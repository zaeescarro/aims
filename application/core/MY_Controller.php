<?php

class MY_Controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }
}

class MY_AdminController extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('admin_id')) {
            redirect('home/admin_login');
        }
    }
}
