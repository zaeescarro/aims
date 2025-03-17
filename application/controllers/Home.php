<?php
class Home extends CI_Controller
{
    var $admin_model;
    var $student_model;
    var $timesheet_model;
    var $student_service;

    var $session;
    var $input;
    var $output;

    function __construct()
    {
        parent::__construct();
        $this->load->helper(['html', 'form', 'url', 'date', 'admin', 'timesheet', 'message', 'support']);
        $this->load->model('admin_model');
        $this->load->model('student_model');
        $this->load->model('timesheet_model');
        $this->load->library('student_service');
        // $this->output->enable_profiler(true);
    }

    function dtr()
    {
        $data = array();
        if ($this->input->post()) {
            $student = $this->student_model->read_by_code($this->input->post('code'));
            if ($student) {
                $timesheet = timesheet_form($student->id);
                $this->student_service->save_timesheet($timesheet);
                // TODO:  Set flash data here!
                redirect('home/dtr');
            }
        }
        $data['recent_timesheets'] = $this->timesheet_model->find_today();
        $this->load->view('home/dtr', $data);
    }

    function student_register()
    {
        $secret_key = $this->input->get('key');
        $student = $this->student_model->read_by_secret_key($secret_key);
        $data['student'] = $student;

        if ($this->input->post()) {
            $password = $this->input->post('password');
            if ($password) {
                $encrypted_password = password_hash($password, PASSWORD_BCRYPT);
                $this->student_model->update(array('password' => $encrypted_password), $student->id);
                redirect('student/login');
            }
        }

        $this->load->view('home/student_register', $data);
    }

    function student_login()
    {
        if ($this->session->userdata('student_id')) redirect('student/profile');
        $data['error'] = '';
        if ($this->input->post()) {
            list($code, $password) = student_login_form();
            $student = $this->student_model->read_by_code_and_password($code, $password);
            if ($student) {
                $this->session->set_userdata('student_id', $student->id);
                redirect('student/profile');
            } else {
                $data['error'] = 'Invalid username or password.Please try again!';
            }
        }
        $this->load->view('home/student_login', $data);
    }

    function admin_login()
    {
        $data['error'] = '';
        if ($this->input->post()) {
            list($username, $password) = admin_login_form();
            $admin = $this->admin_model->read_by_username_and_password($username, $password);
            if ($admin) {
                $this->session->set_userdata('admin_id', $admin->id);
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
