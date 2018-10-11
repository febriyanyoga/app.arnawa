<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class LoginC extends CI_Controller {

	var $data = array();

	public function __construct(){
		parent::__construct();
		$this->load->model('LoginM');
		// in_access2();
	}

	public function index(){
		$this->load->view('LoginV');
	}

	public function log_in(){
		$this->input->post('submit');
		$email_akun	=$this->input->post('email_akun');
		$password	=$this->input->post('password');
		$ceknum		=$this->LoginM->ceknum($email_akun,$password)->num_rows();
		$query		=$this->LoginM->ceknum($email_akun,$password)->row();
		if($ceknum>0){
			$userData 	= array(
				'email_akun' 		=> $query->email_akun,
				'nama_akun'			=> $query->nama_akun,
				'no_hp' 			=> $query->no_hp,
				'jenis_usaha' 		=> $query->jenis_usaha,
				'id' 				=> $query->id,
				'logged_in' 		=> TRUE
			);
			$this->session->set_userdata($userData);
			if($query->email_akun == "admin@gmail.com"){
				redirect('KoperasiC/admin');
			}else{
				if($query->nama_koperasi != ""){
					if($userData['jenis_usaha'] == "koperasi"){
						redirect('KoperasiC/pilih_fitur_koperasi');
					}else{	
						redirect('KoperasiC/pilih_fitur_umkm');
					}	
				}else{
					if($query->fitur != ""){
						redirect('KoperasiC/dashboard');
					}else{
						if($userData['jenis_usaha'] == "koperasi"){
							redirect('KoperasiC/koperasi');
						}else{	
							redirect('KoperasiC/umkm');
						}	
					}
				}	
			}		
		}else{
			$this->session->set_flashdata('error','Email atau kata sandi salah');
			redirect('LoginC');
		}
	}

	public function log_out(){
		$this->session->sess_destroy();	
		redirect(base_url().'LoginC/');	
	}

	public function konfirmasi($email_encryption){
		if($this->LoginM->verifyemail($email_encryption)){  
			$this->session->set_flashdata('sukses','Email anda berhasil dikonfirmasi. Silahkan masuk...');
			redirect('LoginC');
		}else{  
			$this->session->set_flashdata('error','Email anda belum berhasil dikonfirmasi. Silahkan mencoba kembali...');
			redirect('LoginC');
		}  
	}
}



