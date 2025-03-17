<?php

class Students extends MY_AdminController
{
  var $student_model;

  var $student_service;

  var $form_validation;
  var $input;
  var $layout;
  var $upload;
  var $session;

  function __construct()
  {
    parent::__construct();
    $this->load->model('student_model');
    $this->load->model('student_model');
    $this->load->library('student_service');
    $this->layout->set_layout('admin_layout');
  }

  function index()
  {
    $data['info'] = $this->session->flashdata('info');
    $data['students'] = $this->student_model->find_all();
    $this->layout->view('students/index', $data);
  }

  function reset_secret_key($id)
  {
    $this->student_model->update(array('secret_key' => guid()), $id);
    redirect('students/edit/' . $id);
  }

  function invite($id)
  {
    $this->student_service->invite($id);
    $this->session->set_flashdata('info', 'Registration invite sent!');
    redirect('students');
  }

  function add()
  {
    if ($this->input->post()) {
      $student = student_form();
      student_form_validate();
      if ($this->form_validation->run() != FALSE) {
        // Handle file upload
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2048;
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('student_image')) {
          $upload_data = $this->upload->data();
          $student['image'] = $upload_data['file_name'];
        } else {
          $error = $this->upload->display_errors();
          // Handle the error accordingly
        }
        $this->student_model->save($student);
        redirect('students');
      }
    }
    $this->layout->view('students/add');
  }

  function edit($id)
  {
    if ($this->input->post()) {
      $student = student_form();
      student_form_validate();
      if ($this->form_validation->run() != FALSE) {
        // Handle file upload
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2048;
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('student_image')) {
          $upload_data = $this->upload->data();
          $student['image_url'] = $upload_data['file_name'];
        } else {
          $error = $this->upload->display_errors();
          // Handle the error accordingly
        }
        $this->student_model->update($student, $id);
        redirect('students');
      }
    }
    $data['student'] = $this->student_model->read($id);
    $this->layout->view('students/edit', $data);
  }

  function delete($id)
  {
    $this->student_model->delete($id);
    redirect('students');
  }
}
