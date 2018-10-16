<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class AdminC extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model(['Registrasi_m','LoginM']);
		$email_akun = $this->session->userdata('email_akun');
		$password 	= $this->session->userdata('password');
		$this->data['jenis_usaha'] 	= $this->LoginM->ceknum($email_akun, $password)->row()->jenis_usaha;
		$this->data['dataDiri'] 	= $this->session->userdata();

		in_access2(); //helper buat batasi akses login/session
	}

	public function index(){
		$this->data['data_akun'] = $this->LoginM->get_all_data2()->result();
		$this->data['dataDiri'] = $this->session->userdata();
// 		$id_register= $this->session->userdata('id');
// 		$this->data['log_status'] = $this->LoginM->get_history_status($id_register)->result();
		$this->data['LoginM'] = $this->LoginM;
		$this->data['isi'] = $this->load->view('Admin_V', $this->data, TRUE);
		$this->load->view('LayoutV', $this->data);

	}
}