<?php

class Student_model extends CI_Model
{
  function __construct()
  {
    $this->load->database();
  }

  function find_all()
  {
    return $this->db->get('students')->result();
  }

  function read($id)
  {
    return $this->db->get_where('students', array('id' => $id))->row();
  }

  function read_by_secret_key($secret_key)
  {
    return $this->db->get_where('students', array('secret_key' => $secret_key))->row();
  }

  function read_by_code($code)
  {
    $this->db->where('code', $code);
    $this->db->or_where('secret_key', $code);
    return $this->db->get('students')->row();
  }

  function read_by_code_and_password($code, $password)
  {
    $student = $this->db->get_where('students', array('code' => $code))->row();
    if ($student && password_verify($password, $student->password)) {
      return $student;
    }
    return null;
  }

  function save($student)
  {
    $this->db->insert('students', $student);
  }

  function update($student, $id)
  {
    $this->db->update('students', $student, array('id' => $id));
  }

  function delete($id)
  {
    $this->db->delete('students', array('id' => $id));
  }
}
