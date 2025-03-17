<?php

class Admin_model extends CI_Model
{

  function __construct()
  {
    $this->load->database();
  }

  function find_all()
  {
    return $this->db->get('admins')->result();
  }

  function read($id)
  {
    return $this->db->get_where('admins', array('id' => $id))->row();
  }

  function read_by_username_and_password($username, $password)
  {
    $admin =  $this->db->get_where('admins', array('username' => $username))->row();
    if ($admin && password_verify($password,  $admin->password)) {
      return $admin;
    }
    return null;
  }

  function save($admin)
  {
    $this->db->insert('admins', $admin);
  }

  function update($admin, $id)
  {
    $this->db->update('admins', $admin, array('id' => $id));
  }

  function delete($id)
  {
    $this->db->delete('admins', array('id' => $id));
  }
}
