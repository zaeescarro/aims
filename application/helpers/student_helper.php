<?php

function student_login_form()
{
  $obj = &get_instance();
  return array(
    $obj->input->post('code'),
    $obj->input->post('password'),
  );
}

function to_name($student)
{
  return "$student->last_name, $student->first_name $student->middle_name";
}

function student_form()
{
  $obj = &get_instance();
  return array(
    'code' => $obj->input->post('code'),
    'last_name' => $obj->input->post('last_name'),
    'first_name' => $obj->input->post('first_name'),
    'middle_name' => $obj->input->post('middle_name'),
    'address' => $obj->input->post('address'),
    'phone' => $obj->input->post('phone'),
    'email' => $obj->input->post('email'),
    'parent_contact_number' => $obj->input->post('parent_contact_number'),
    'secret_key' => guid(),
  );
}

function student_form_validate()
{
  $obj = &get_instance();
  $obj->form_validation->set_rules('code', 'Code', 'required');
  $obj->form_validation->set_rules('last_name', 'Last_name', 'required');
  $obj->form_validation->set_rules('first_name', 'First_name', 'required');
  $obj->form_validation->set_rules('email', 'Email', 'required');
  $obj->form_validation->set_rules('parent_contact_number', 'Parent_contact_number', 'required');
}
