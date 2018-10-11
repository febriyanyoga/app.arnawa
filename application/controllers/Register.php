<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Register extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Registrasi_m');
	}
	
	public function index()
	{
		$this->load->view('Register_akun_V');
	}

	public function register() {
		$this->form_validation->set_rules('nama_akun', 'Nama Akun', 'required');  
		$this->form_validation->set_rules('jenis_usaha', 'Jenis Usaha', 'required');  
		$this->form_validation->set_rules('no_hp', 'Nomor Handphone', 'required');  
		$this->form_validation->set_rules('email_akun', 'Email', 'required|valid_email|is_unique[tbl_register.email_akun]');  
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[50]|matches[confirm_password]');
		$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|min_length[6]|max_length[10]'); 
		$this->form_validation->set_message('is_unique', 'Data %s sudah dipakai'); 

		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('error','Data anda tidak berhasil disimpan karena email sudah dipakai');
			redirect_back();
		}else{
			$data = array(
				'nama_akun' 		=> $this->input->post('nama_akun'), 
				'email_akun' 		=> $this->input->post('email_akun'),
				'email_encryption' 	=> md5($this->input->post('email_akun')),
				'no_hp' 			=> $this->input->post('no_hp'),
				'jenis_usaha' 		=> $this->input->post('jenis_usaha'),
				'password' 			=> $this->input->post('password'),
			);
    
            $email_akun 		= $this->input->post('email_akun');
			$email_encryption 	= md5($this->input->post('email_akun'));

			if($this->Registrasi_m->register($data)){
				$this->send($email_akun, $email_encryption);
				$this->session->set_flashdata('sukses','Data anda berhasil disimpan, cek email konfirmasi untuk mengaktifkan akun. Jika email tidak ada dikotak masuk, silahkan cek folder spam Anda.');
				redirect("LoginC/");

			}else{
				$this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
				redirect_back();
			}
		}
	}

	public function send($email_akun,$email_encryption){
		$from_email = 'info@arnawa.co.id';
		$to      	= $email_akun;
		$subject 	= 'Email Konfirmasi';

		$data       = array(
			'email'=> $email_encryption,
		);

		$message    = $this->load->view('Konfirmasi_email.php',$data,TRUE);


		$headers    = 'MIME-Version: 1.0' . "\r\n";
		$headers    .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers    .= 'To:  <'.$to.'>' . "\r\n";
		$headers    .= 'From: Arnawa.co.id <'.$from_mail.'>' . "\r\n";

		mail($to, $subject, $message, $headers);
	}
	
	public function kirim(){
        ini_set( 'display_errors', 1 );   
        error_reporting( E_ALL );    
        $from = "testing@domainanda.com";    
        $to = "febriyanyoga@domain.com";    
        $subject = "Checking PHP mail";    
        $message = "PHP mail berjalan dengan baik";   
        $headers = "From:" . $from;    
        mail($to,$subject,$message, $headers);    
        echo "Pesan email sudah terkirim.";
	}
}
