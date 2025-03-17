<?php

class Student_service
{
    var $timesheet_model;
    var $message_model;
    var $student_model;

    var $php_mailer;

    function __construct()
    {
        $CI = &get_instance();
        $CI->load->model('timesheet_model');
        $CI->load->model('message_model');
        $CI->load->model('student_model');
        $this->student_model =  $CI->student_model;
        $this->timesheet_model =  $CI->timesheet_model;
        $this->message_model =  $CI->message_model;

        $CI->load->library('php_mailer');
        $this->php_mailer = $CI->php_mailer;
    }

    function invite($student_id)
    {
        $settings = array(
            'smtp_host' => 'smtp.hostinger.com',
            'smtp_username' => 'noreply@zimhq.com',
            'smtp_password' => 'Start123!!!',
            'smtp_port' => 465
        );

        $student = $this->student_model->read($student_id);

        $from = 'noreply@zimhq.com';
        $to = $student->email;
        $subject = 'Registation invite';

        $url = base_url('student/register?key=' . $student->secret_key);
        $message = "You are invited to register to AIMS. Please click the link below to complete your registration.
        
$url

Thank you,
AIMS Team";

        $this->php_mailer->send($settings, $from, $to, $subject, $message);
    }

    function save_timesheet($timesheet)
    {
        $timesheet_today = $this->timesheet_model->read_by_student($timesheet['student_id']);
        // print_pre($timesheet_today);
        if (!$timesheet_today) {
            $timesheet['in_out'] = TIMESHEET_IN;
        } else {
            $in_out = $timesheet_today->in_out == TIMESHEET_IN ? TIMESHEET_OUT : TIMESHEET_IN;
            $timesheet['in_out'] = $in_out;
        }

        $new_timesheet_id = $this->timesheet_model->save($timesheet);
        // $student = $this->student_model->read($timesheet['student_id']);
        // $to = $student->parent_contact_number;
        $new_timesheet = $this->timesheet_model->read($new_timesheet_id);
        $to = $new_timesheet->parent_contact_number;
        $body = timesheet_to_log($new_timesheet);
        $message = message_from_timesheet($to, $body);
        $this->message_model->save($message);
    }
}
