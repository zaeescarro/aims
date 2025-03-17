<?php
class Test extends CI_Controller
{
    var $admin_model;

    function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->library('php_mailer');
    }

    function email()
    {
        $settings = array(
            'smtp_host' => 'smtp.hostinger.com',
            'smtp_username' => 'noreply@zimhq.com',
            'smtp_password' => 'Start123!!!',
            'smtp_port' => 465
        );

        $this->php_mailer->send($settings, 'noreply@zimhq.com', 'ian.escarro@gmail.com', 'hello', 'hello world');
    }

    function login()
    {
        $this->load->view('home/login');
    }

    function admin_login()
    {
        if ($this->input->post()) {
            list($username, $password) = login_form();
            $admin = $this->admin_model->read_by_username_and_password($username, $password);
            if ($admin) {
                redirect('students');
            } else {
                $data['error'] = 'Invalid username or password.Please try again!';
            }
        }
        $this->load->view('home/admin_login', $data);
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect('home/admin_login');
    }
}
