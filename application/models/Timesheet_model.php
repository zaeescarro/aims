<?php

class Timesheet_model extends CI_Model
{

  function __construct()
  {
    $this->load->database();
  }

  function find_recent()
  {
    // TODO:
    $this->db->select('t.*');
    $this->db->select('s.last_name, s.first_name,  s.middle_name');
    $this->db->join('students s', 's.id = t.student_id');
    $this->db->order_by('t.date',  'desc');
    return $this->db->get('timesheets t')->result();
  }

  function find_today()
  {
    $this->db->select('t.*');
    $this->db->select('s.last_name, s.first_name, s.middle_name, s.image_url student_image_url');
    $this->db->join('students s', 's.id = t.student_id');
    $this->db->where('DATE(t.date)', date('Y-m-d'));
    $this->db->order_by('t.date',  'desc');
    return $this->db->get('timesheets t')->result();
  }

  function find_all()
  {
    $this->db->select('t.*');
    $this->db->select('s.last_name, s.first_name, s.middle_name');
    $this->db->join('students s', 's.id = t.student_id');
    $this->db->order_by('t.date',  'desc');
    return $this->db->get('timesheets t')->result();
  }

  function read($id)
  {
    $this->db->select('t.*');
    $this->db->select('s.last_name, s.first_name,  s.middle_name, s.parent_contact_number');
    $this->db->join('students s', 's.id = t.student_id');
    return $this->db->get_where('timesheets t', array('t.id' => $id))->row();
  }

  function read_by_student($student_id)
  {
    $this->db->select('t.*');
    $this->db->select('s.last_name, s.first_name, s.middle_name, s.parent_contact_number');
    $this->db->join('students s', 's.id = t.student_id');
    $this->db->where('t.student_id', $student_id);
    $this->db->where('DATE(t.date)', date('Y-m-d'));
    $this->db->order_by('t.date', 'desc');
    return $this->db->get('timesheets t')->row();
  }

  function save($timesheet)
  {
    $this->db->insert('timesheets', $timesheet);
    return $this->db->insert_id();
  }

  function update($timesheet, $id)
  {
    $this->db->update('timesheets', $timesheet, array('id' => $id));
  }

  function delete($id)
  {
    $this->db->delete('timesheets', array('id' => $id));
  }
}
