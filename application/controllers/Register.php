<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Register extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model(['Registrasi_m','LoginM']);
	}
	
	public function index()
	{
		$this->data['kadaluwarsa'] = $this->LoginM->get_tagihan_kadaluwarsa()->result();
		$this->load->view('Register_akun_V', $this->data);
	}

	public function register() {
		$this->form_validation->set_rules('nama_akun', 'Nama Akun', 'required');  
		$this->form_validation->set_rules('jenis_usaha', 'Jenis Usaha', 'required');  
		$this->form_validation->set_rules('no_hp', 'Nomor Handphone', 'required');  
		$this->form_validation->set_rules('email_akun', 'Email', 'required|valid_email|is_unique[akun.email_akun]');  
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
		$headers    .= 'From: "info@arnawa.co.id" <'.$from_mail.'>' . "\r\n";

		mail($to, $subject, $message, $headers);
	}

	public function send_mail($email_akun, $email_encryption) { 

		$from_email = "info@arnawa.co.id"; 
		$to_email 	= $email_akun;
		$config 	= Array(
			'protocol' 	=> 'smtp',
			'smtp_host' => 'ssl://mail.arnawa.co.id',
			'smtp_port' => 465,
			'smtp_user' => $from_email,
			'smtp_pass' => 'Kosong?123',
			'mailtype'  => 'html', 
			'charset'   => 'iso-8859-1'
		);

		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");   

		$this->email->from($from_email, 'info@arnawa.co.id'); 
		$this->email->to($to_email);
		$this->email->subject('Konfirmasi Email'); 
		$data       = array(
			'email'=> $email_encryption,
		);
		$message    = $this->load->view('Konfirmasi_email.php', $data, TRUE);
		$this->email->message($message); 

        //Send mail 
		$this->email->send();
	}
}