<?php

class Messages extends MY_AdminController
{
  var $message_model;

  var $layout;
  var $input;
  var $form_validation;

  function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->library('layout');
    $this->load->model('message_model');
    $this->load->helper('message');
    $this->load->model('message_model');
    $this->layout->set_layout('admin_layout');
  }

  function index()
  {
    $data['messages'] = $this->message_model->find_all();
    $this->layout->view('messages/index', $data);
  }

  function add()
  {
    if ($this->input->post()) {
      $message = message_form();
      message_form_validate();
      if ($this->form_validation->run() != FALSE) {
        $this->message_model->save($message);
        redirect('messages');
      }
    }
    $this->layout->view('messages/add');
  }

  function edit($id)
  {
    if ($this->input->post()) {
      $message = message_form();
      message_form_validate();
      if ($this->form_validation->run() != FALSE) {
        $this->message_model->update($message, $id);
        redirect('messages');
      }
    }
    $data['message'] = $this->message_model->read($id);
    $this->layout->view('messages/edit', $data);
  }

  function delete($id)
  {
    $this->message_model->delete($id);
    redirect('messages');
  }
}
