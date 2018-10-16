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
		// $this->data['email'] = $this->LoginM->getByEmail("ffpjos@gmail.com")->num_rows();

		$this->load->view('LoginV', $this->data);
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
				'password'			=> $query->password,
				'no_hp' 			=> $query->no_hp,
				'jenis_usaha' 		=> $query->jenis_usaha,
				'id_akun' 			=> $query->id_akun,
				'jenis_akun' 		=> $query->jenis_akun,
				'logged_in' 		=> TRUE
			);
			$this->session->set_userdata($userData);
			if($query->status_email == "aktif"){
				if($query->jenis_akun == "user"){
					if($query->nama_usaha == "" && $query->nama_pimpinan == ""){
						redirect('KoperasiC/');
					}else{
						if($this->LoginM->cek_fitur($query->id_akun)->num_rows() > 1){
							redirect('KoperasiC/dashboard');
						}else{
							redirect('KoperasiC/pilih_fitur');
						}
					}
				}elseif ($query->jenis_akun == "admin") {
					redirect('AdminC/');
				}elseif ($query->jenis_akun == "operator") {
					redirect('OperatorC');
				}
			}else{
				$this->session->set_flashdata('error','Email belum dikonfirmasi. Silahkan konfirmasi email anda. Periksa kotak masuk/folder spam email anda dan klik tombol konfirmasi yang kami kirimkan melalui email.');
				redirect('LoginC');
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

	public function reset_password(){
		$this->input->post('submit');
		$email = $this->input->post('email');

		$rs = $this->LoginM->getByEmail($email);

  		// cek email ada atau engga
		if ($rs->num_rows() < 1){
			$this->session->set_flashdata('error','Cek kembali email yang terdaftar.');
			redirect('LoginC');
		}else{

			$user = $rs->row();

	 		// get id user
			$user_token = $user->id_akun;

	  		//create valid dan expire token
			$date_create_token = date("Y-m-d H:i");
			$date_expired_token = date('Y-m-d H:i',strtotime('+2 hour',strtotime($date_create_token)));

	  		// create token string
			$tokenstring = md5(sha1($user_token.$date_create_token));

			$data = array('token'=>$tokenstring,'id_akun'=>$user_token,'created'=>$date_create_token,'expired'=>$date_expired_token);
			$simpan = $this->LoginM->simpanToken($data);

			if ($simpan > 0){
				if($this->send($email, $tokenstring)){
					$this->session->set_flashdata('sukses','Silahkan cek email anda. jika email tidak terdapat di kotak masuk silahkan cek di folder spam anda');
					redirect_back();
				}else{
					$this->session->set_flashdata('error','Cek kembali email yang terdaftar.');
					redirect('LoginC');
				}
			}
		}
	}

	public function reset($token){
		date_default_timezone_set("Asia/jakarta");
		$token = $token;

  		// get token ke nodel user
		$cekToken = $this->LoginM->cekToken($token);
		$rs = $cekToken->num_rows();

  		// cek token ada atau engga
		if ($rs > 0){

			$data = $cekToken->row();
			$tokenExpired = $data->expired;
			$timenow = date("Y-m-d H:i:s");

   			 // cek token expired atau engga
			if ($timenow < $tokenExpired){

      			// tampilkan form reset
				$datatoken['token'] = $token;
				$this->load->view('Reset_password_email',$datatoken);

			}else{

      			// redirect form forgot
				$this->session->set_flashdata('error','Maaf, Token Anda Sudah Expired!. Coba masukkan email anda kembali');
				redirect('LoginC');
			}
		}else{
			$this->session->set_flashdata('error','Maaf, Token Anda Tidak Ditemukan!. Coba masukkan email anda kembali');
			redirect('LoginC');
		}
	}	

	public function post_reset(){
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[50]|matches[confirmpswd]');
		$this->form_validation->set_rules('confirmpswd', 'Password Confirmation', 'trim|required|min_length[6]|max_length[50]'); 
		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('error','Maaf, Kata sandi tidak Berhasil Dirubah!. Cek kembali yang anda masukkan');
			redirect_back();
		}else{
			$password 	= $this->input->post('password');
			$token 		= $this->input->post('token');
			$cekToken 	= $this->LoginM->cekToken($token);
			$data 		= $cekToken->row();
			$id_akun 	= $data->id_akun;

  			// ubah password
			$data = array ('password'=> $password);
			$simpan = $this->LoginM->ubahData($data,$id_akun);

			if ($simpan > 0){
				$this->session->set_flashdata('sukses','Selamat, Kata sandi Berhasil Dirubah!. Silahkan login kembali');
			}else{
				$this->session->set_flashdata('error','Maaf, Kata sandi Gagal Dirubah. Silahkan Cek kembali yang anda masukkan');
			}
			redirect('LoginC/');
		}

	}

	public function send($email_akun,$tokenstring){
		$from_email = 'info@arnawa.co.id';
		$to      	= $email_akun;
		$subject 	= 'Atur ulang kata sandi';

		$data       = array(
			'token'=> $tokenstring,
		);

		$message    = $this->load->view('Konfirmasi_email.php',$data,TRUE);


		$headers    = 'MIME-Version: 1.0' . "\r\n";
		$headers    .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers    .= 'To:  <'.$to.'>' . "\r\n";
		$headers    .= 'From: info@arnawa.co.id <'.$from_mail.'>' . "\r\n";

		if(mail($to, $subject, $message, $headers)){
			return TRUE;
		}
	}
}