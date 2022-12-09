<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Template { 
    var $template_data = array(); 
    
    function set($name, $value) { 
        $this->template_data[$name] = $value;
    }
        
    function load($template = '', $view = '', $footer = '', $view_data = array(), $return = FALSE)
    {               
        $this->CI =& get_instance();
        if(!empty($header)){
            $this->set('header', $this->CI->load->view($header, $view_data, TRUE));
        }

        $this->set('content', $this->CI->load->view($view, $view_data, TRUE));
        $this->set('namauser', $this->CI->session->userdata('nama'));
        $this->set('permission', $this->CI->session->userdata('permission'));

        if(!empty($footer)){
            $this->set('footer', $this->CI->load->view($footer, $view_data, TRUE));
        }

        return $this->CI->load->view($template, $this->template_data, $return);
    }
}