<?php

class Admins extends MY_AdminController
{
  var $admin_model;

  var $layout;

  function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('admin_model');
    $this->load->helper('admin');
    $this->load->model('admin_model');
    $this->load->library('layout');
    $this->layout->set_layout('admin_layout');
  }

  function index()
  {
    $data['admins'] = $this->admin_model->find_all();
    $this->layout->view('admins/index', $data);
  }

  function add()
  {
    if ($this->input->post()) {
      $admin = admin_form();
      admin_form_validate();
      if ($this->form_validation->run() != FALSE) {
        $this->admin_model->save($admin);
        redirect('admins');
      }
    }
    $this->layout->view('admins/add');
  }

  function edit($id)
  {
    if ($this->input->post()) {
      $admin = admin_form();
      admin_form_validate();
      if ($this->form_validation->run() != FALSE) {
        $this->admin_model->update($admin, $id);
        redirect('admins');
      }
    }
    $data['admin'] = $this->admin_model->read($id);
    $this->layout->view('admins/edit', $data);
  }

  function delete($id)
  {
    $this->admin_model->delete($id);
    redirect('admins');
  }
}
