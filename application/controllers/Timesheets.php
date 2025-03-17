<?php

class Timesheets extends MY_AdminController
{
  var $timesheet_model;

  var $layout;
  var $input;
  var $form_validation;

  function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('timesheet_model');
    $this->load->helper(['timesheet', 'student']);
    $this->load->model('timesheet_model');
    $this->load->library('layout');
    $this->layout->set_layout('admin_layout');
  }

  function index()
  {
    $data['timesheets'] = $this->timesheet_model->find_all();
    $this->layout->view('timesheets/index', $data);
  }

  function add()
  {
    if ($this->input->post()) {
      $timesheet = timesheet_form();
      timesheet_form_validate();
      if ($this->form_validation->run() != FALSE) {
        $this->timesheet_model->save($timesheet);
        redirect('timesheets');
      }
    }
    $this->layout->view('timesheets/add');
  }

  function edit($id)
  {
    if ($this->input->post()) {
      $timesheet = timesheet_form();
      timesheet_form_validate();
      if ($this->form_validation->run() != FALSE) {
        $this->timesheet_model->update($timesheet, $id);
        redirect('timesheets');
      }
    }
    $data['timesheet'] = $this->timesheet_model->read($id);
    $this->layout->view('timesheets/edit', $data);
  }

  function delete($id)
  {
    $this->timesheet_model->delete($id);
    redirect('timesheets');
  }
}
