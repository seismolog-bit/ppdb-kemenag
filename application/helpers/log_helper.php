<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function helper_log($tipe = "", $str = ""){
    $CI =& get_instance();
 
    if (strtolower($tipe) == "login"){
        $log_tipe  = 0;
    }
    elseif(strtolower($tipe) == "logout")
    {
        $log_tipe  = 1;
    }
    elseif(strtolower($tipe) == "add"){
        $log_tipe  = 2;
    }
    elseif(strtolower($tipe) == "edit"){
        $log_tipe  = 3;
    }
    elseif(strtolower($tipe) == "delete"){
        $log_tipe  = 4;
    }
    elseif(strtolower($tipe) == "print"){
        $log_tipe  = 5;
    }
    elseif(strtolower($tipe) == "backup"){
        $log_tipe  = 6;
    }  
    elseif(strtolower($tipe) == "restore"){
        $log_tipe  = 7;
    }       

    // paramter
    $param['log_user']      = $CI->session->userdata('identity');
    $param['log_tipe']      = $log_tipe;
    $param['log_ket']      = $str;
 
    //load model log
    $CI->load->model('Log_model');
    $CI->Log_model->save_log($param);
 
}