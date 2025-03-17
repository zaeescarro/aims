<?php

class Message_model extends CI_Model
{

  function __construct()
  {
    $this->load->database();
  }

  function find_pending()
  {
    $pending = MESSAGE_STATUS_PENDING;
    $this->db->where("ifnull(status, $pending) = $pending");
    return $this->db->get('messages')->result();
  }

  function find_all()
  {
    $this->db->order_by('id', 'desc');
    return $this->db->get('messages')->result();
  }

  function read($id)
  {
    return $this->db->get_where('messages', array('id' => $id))->row();
  }

  function save($message)
  {
    $this->db->insert('messages', $message);
  }

  function update($message, $id)
  {
    $this->db->update('messages', $message, array('id' => $id));
  }

  function delete($id)
  {
    $this->db->delete('messages', array('id' => $id));
  }
}
