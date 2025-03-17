<?php

class Student extends CI_Controller
{
    var $student_model;

    var $session;
    var $layout;

    function __construct()
    {
        parent::__construct();
        $this->load->model('student_model');
        $this->layout->set_layout('student_layout');
    }

    function profile()
    {
        $student = $this->student_model->read($this->session->userdata('student_id'));
        $data['student'] = $student;
        $this->layout->view('student/profile', $data);
    }
}
