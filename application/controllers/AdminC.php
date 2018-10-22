<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class AdminC extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model(['Registrasi_m','LoginM']);
		in_access(); //helper buat batasi akses login/session
		admin_access(); //helper buat batasi akses login/session
		// 
		$email_akun = $this->session->userdata('email_akun');
		$password 	= $this->session->userdata('password');
		$id_akun 	= $this->session->userdata('id_akun');

		$this->data['jenis_usaha'] 	= $this->LoginM->ceknum($email_akun, $password)->row()->jenis_usaha;
		$this->data['dataDiri'] 	= $this->session->userdata();
		$this->data['fitur'] 		= $this->LoginM->get_fitur_by_akun($id_akun)->result();

	}
	public function index(){
		$this->data['isi'] = $this->load->view('Dashboard_adminV', $this->data, TRUE);
		$this->load->view('LayoutV', $this->data);
	}

	public function manajemen_koperasi(){
		$this->data['data_akun'] 	= $this->LoginM->get_all_data2()->result();
		$this->data['dataDiri'] 	= $this->session->userdata();
		$id= $this->session->userdata('id_akun');
		$this->data['fitur'] 		= $this->LoginM->get_fitur_by_akun($id)->result();
// 		$this->data['log_status'] = $this->LoginM->get_history_status($id_register)->result();
		$this->data['manajemen_fitur'] 		= $this->LoginM->get_detail_fitur_by_akun($id)->result();
		$this->data['LoginM'] = $this->LoginM;
		$this->data['isi'] = $this->load->view('Daftar_usaha', $this->data, TRUE);
		$this->load->view('LayoutV', $this->data);

	}

	public function detail_fitur($id_akun){
		$this->data['LoginM'] = $this->LoginM;
		$this->data['manajemen_fitur'] 		= $this->LoginM->get_detail_fitur_by_akun($id_akun)->result();
		// $this->data['fitur'] 		= $this->LoginM->get_fitur_by_akun($id_akun)->result();
		$this->data['isi'] = $this->load->view('detail_fitur', $this->data, TRUE);
		$this->load->view('LayoutV', $this->data);
	}

	// 	admin
	public function update_aktif($id){
		$data = array('status' => 'aktif');
		if($this->LoginM->update($id, $data)){
			$this->session->set_flashdata('sukses','Data anda berhasil diubah');
			redirect_back();
		}else{
			$this->session->set_flashdata('error','Data anda tidak berhasil diubah');
			redirect_back();
		}
	}

	public function update_non_aktif($id){
		$data = array('status' => 'non-aktif');
		if($this->LoginM->update($id, $data)){
			$this->session->set_flashdata('sukses','Data anda berhasil diubah');
			redirect_back();
		}else{
			$this->session->set_flashdata('error','Data anda tidak berhasil diubah');
			redirect_back();
		}
	}
}