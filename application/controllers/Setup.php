<?php

class Setup extends CI_Controller
{
    var $admin_model;

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('admin_model');
    }

    function index()
    {
        $this->reset_data();
        $this->create_admin();

        echo 'Setup... OK';
    }

    function reset_data()
    {
        // $this->db->truncate('admins');
        // $this->db->truncate('students');
        // $this->db->truncate('timesheets');
        // $this->db->truncate('messages');
    }

    function create_admin()
    {
        $admin = array(
            'username' => 'admin',
            'password' => password_hash('password', PASSWORD_BCRYPT),
        );
        $this->admin_model->save($admin);
    }
}
