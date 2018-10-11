<?php 
if ( ! function_exists('in_access')){
    function in_access(){
        $ci=& get_instance();
        if($ci->session->userdata('logged_in') != TRUE){
            $ci->session->set_flashdata('error','Anda harus Login terlebih dahulu');
            redirect('LoginC/log_out');
        }
    }
}

if ( ! function_exists('in_access2')){
    function in_access2(){
        $ci=& get_instance();
        if($ci->session->userdata('logged_in') == TRUE){
            $ci->session->set_flashdata('error','Anda harus Login terlebih dahulu');
            redirect('KoperasiC/');
        }
    }
}

if ( ! function_exists('redirect_back')){ //untuk redirect kembali ke halaman sebelumnya
    function redirect_back(){
        if(isset($_SERVER['HTTP_REFERER']))
        {
            header('Location: '.$_SERVER['HTTP_REFERER']);
        }
        else
        {
            header('Location: http://'.$_SERVER['SERVER_NAME']);
        }
        exit;
    }
}
