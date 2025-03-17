<?php

define('TIMESHEET_IN', 1);
define('TIMESHEET_OUT', 2);

function is_timesheet_in($timesheet)
{
  return $timesheet->in_out == TIMESHEET_IN;
}

function is_timesheet_out($timesheet)
{
  return $timesheet->in_out == TIMESHEET_OUT;
}

function timesheet_to_log($timesheet)
{
  $name =  "$timesheet->last_name, $timesheet->first_name $timesheet->middle_name";
  $inout = $timesheet->in_out == 1
    ? " logged in to "
    : " logged  out from ";
  $date = date('h:i:s A, F j, Y', strtotime($timesheet->date));
  $log = "$name has $inout the school premise at {$date}";
  return $log;
}

function timesheet_form($student_id = null)
{
  $obj = &get_instance();
  return array(
    'student_id' => $student_id ?? $obj->input->post('student_id'),
    'date' => now(),
  );
}

function timesheet_form_validate()
{
  $obj = &get_instance();
  $obj->form_validation->set_rules('student_id', 'Student_id', 'required');
  $obj->form_validation->set_rules('inout', 'Inout', 'required');
  $obj->form_validation->set_rules('date', 'Date', 'required');
}
