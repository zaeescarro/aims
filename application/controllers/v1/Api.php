<?php

class Api extends CI_Controller
{
    var $message_model;

    var $input;

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('message');
        $this->load->model('message_model');
        header('Content-Type: application/json');
    }

    public function queue()
    {
        $messages = $this->message_model->find_pending();
        echo json_encode(array('status' => 'OK', 'data' => trim_messages($messages)));
    }

    public function message_sent()
    {
        $message_id = $this->input->post('message_id');
        $this->message_model->update(array('status' => MESSAGE_STATUS_SENT), $message_id);
        echo json_encode(array('status' => 'OK'));
    }
}
