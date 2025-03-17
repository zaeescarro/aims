<?php

define('MESSAGE_STATUS_PENDING', 1);
define('MESSAGE_STATUS_SENT', 2);

function trim_messages($messages)
{
  $data = array();
  foreach ($messages as $message) {
    $data[] = array(
      'id' => $message->id,
      'recipient' => $message->message_to,
      'body' => $message->body,
    );
  }
  return $data;
}

function message_from_timesheet($message_to, $body)
{
  $message_from = ''; // TODO:
  $subject = '';
  return array(
    'message_to' => $message_to,
    'message_from' => $message_from,
    'subject' => $subject,
    'body' => $body,
  );
}

function message_form()
{
  $obj = &get_instance();
  return array(
    'message_to' => $obj->input->post('message_to'),
    'message_from' => $obj->input->post('message_from'),
    'subject' => $obj->input->post('subject'),
    'body' => $obj->input->post('body'),
  );
}

function message_form_validate()
{
  $obj = &get_instance();
  $obj->form_validation->set_rules('message_to', 'To', 'required');
  $obj->form_validation->set_rules('body', 'Body', 'required');
}
