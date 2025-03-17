<?php

function admin_login_form()
{
  $obj = &get_instance();
  return array(
    $obj->input->post('username'),
    $obj->input->post('password'),
  );
}

function admin_form()
{
  $obj = &get_instance();
  $admin = array(
    'username' => $obj->input->post('username'),
    'email' => $obj->input->post('email'),
  );
  $password = $obj->input->post('password');
  if ($password) {
    $encrypted_password = password_hash($password, PASSWORD_BCRYPT);
    $admin['password'] = $encrypted_password;
  }
  return $admin;
}

function admin_form_validate()
{
  $obj = &get_instance();
  $obj->form_validation->set_rules('username', 'Username', 'required');
  $obj->form_validation->set_rules('password', 'Password', 'required');
  $obj->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
  $obj->form_validation->set_rules('email', 'Email', 'required');
}
