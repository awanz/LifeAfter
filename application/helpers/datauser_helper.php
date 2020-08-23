<?php

if (!function_exists('dataSession')) {

    function dataSession(){
        $CI =& get_instance();

        $CI->load->library('session');
        $data = $CI->session->userdata('user_data');
        if (empty($data)) {
            $CI->load->helper('url');
            redirect('/');
        }else{
            return $data;
        }      
    }

}