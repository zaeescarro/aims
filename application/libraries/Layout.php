<?php

class Layout
{
    var $layout;

    function __construct($layout = 'layout')
    {
        $this->layout = $layout;
    }

    function set_layout($layout = 'layout')
    {
        $this->layout = $layout;
    }
    function view($view, $data = array())
    {
        $CI = &get_instance();
        $data['content'] = $CI->load->view($view, $data, true);
        $CI->load->view($this->layout, $data);
    }
}
