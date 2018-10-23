<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class CobaC extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct() {
		parent::__construct();
		$this->load->model(['Registrasi_m','LoginM']);
		$email_akun = $this->session->userdata('email_akun');
		$password 	= $this->session->userdata('password');
		$id_akun 	= $this->session->userdata('id_akun');

		$this->data['jenis_usaha'] 	= $this->LoginM->ceknum($email_akun, $password)->row()->jenis_usaha;
		$this->data['dataDiri'] 	= $this->session->userdata();
		$this->data['fitur'] 		= $this->LoginM->get_fitur_by_akun($id_akun)->result();
		in_access(); //helper buat batasi akses login/session
	}

	public function mintamodul(){
		$id  = $this->session->userdata('id_akun');
		$this->data['macam_fitur']	= $this->LoginM->get_all_fitur(); //semua fitur
		$this->data['macam_fitur_akun']	= $this->LoginM->get_fitur_by_akun($id); //fitur by akun
		$this->data['data_akun'] = $this->LoginM->get_all_data($id)->result()[0];
		$this->data['dataDiri'] = $this->session->userdata();
		$this->data['active'] = 'active';
		$this->data['manajemen_fitur'] 		= $this->LoginM->get_detail_fitur_by_akun($id)->result();
		$this->data['isi'] = $this->load->view('PermintaanmodulV', $this->data, TRUE);
		$this->load->view('LayoutV', $this->data);

	}
	
	public function tagihan(){
		$id  = $this->session->userdata('id_akun');
		$this->data['macam_fitur']	= $this->LoginM->get_all_fitur(); //semua fitur
		$this->data['macam_fitur_akun']	= $this->LoginM->get_fitur_by_akun($id); //fitur by akun
		$this->data['data_akun'] = $this->LoginM->get_all_data($id)->result()[0];
		$this->data['dataDiri'] = $this->session->userdata();
		$this->data['active'] = 'active';
		$this->data['manajemen_fitur'] 		= $this->LoginM->get_detail_fitur_by_akun($id)->result();
		$this->data['isi'] = $this->load->view('TagihanV', $this->data, TRUE);
		$this->load->view('LayoutV', $this->data);

	}
}
