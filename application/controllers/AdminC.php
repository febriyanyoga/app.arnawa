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
		$this->data['fitur2'] 		= $this->LoginM->get_fitur_by_akun($id_akun)->result();
		$this->data['isi'] = $this->load->view('Detail_fitur', $this->data, TRUE);
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

	public function update_proses($id){
		$data = array('status' => 'proses');
		if($this->LoginM->update($id, $data)){
			$this->session->set_flashdata('sukses','Data anda berhasil diubah');
			redirect_back();
		}else{
			$this->session->set_flashdata('error','Data anda tidak berhasil diubah');
			redirect_back();
		}
	}

	public function update_suspend($id){
		$data 	= array('status' => 'suspend');
		$now	= date('Y-m-d');
		$end  	= date('Y-m-d', strtotime('+1 month', strtotime($now)));
		$sekarang = date('Y-m-d');
		$harga = $this->LoginM->get_harga($id)->result()[0]->per_bulan;

		$dataTagihan 	= array(
			'id_detail_fitur' 	=> $id,
			'status_call' 		=> 'Suspend', 
			'status_tagihan' 	=> 'Suspend',
			'start_date'		=> $sekarang,
			'end_date'			=> $end,
			'harga'				=> $harga,
		);

		if($this->LoginM->update($id, $data)){
			if($this->LoginM->insert_tagihan($dataTagihan)){
				$this->session->set_flashdata('sukses','Data anda berhasil diubah');
				redirect_back();
			}else{
				$this->session->set_flashdata('error','Data anda tidak berhasil diubah');
				redirect_back();
			}
		}else{
			$this->session->set_flashdata('error','Data anda tidak berhasil diubah');
			redirect_back();
		}
	}

	public function update_paid($id_tagihan, $id_detail_fitur){
		$data = array('status' => 'aktif');
		$data_tagihan = array(
			'status_tagihan' 		=> 'Paid',
			'konfirmasi_pembayaran' => 'Telah Diverifikasi',
		);
		if($this->LoginM->update($id_detail_fitur, $data)){
			if($this->LoginM->updateTagihan($id_tagihan, $data_tagihan)){
				$this->session->set_flashdata('sukses','Tagihan Terverifikasi');
				redirect_back();
			}else{
				$this->session->set_flashdata('error','Data anda tidak berhasil diubah');
				redirect_back();
			}
		}else{
			$this->session->set_flashdata('error','Data anda tidak berhasil diubah');
			redirect_back();
		}
	}

	function post_aktif(){
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_rules('link_app', 'Link Aplikasi', 'required');
		$this->form_validation->set_rules('id_detail_fitur', 'id detail fitur', 'required');
		$this->form_validation->set_rules('start_date', 'Tanggal mulai', 'required');
		$this->form_validation->set_rules('end_date', 'Tanggal berakhir', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required');
		$this->form_validation->set_rules('status_tagihan', 'Status Tagihan', 'required');
		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('error','Data anda tidak berhasil ditambahkan, periksa kembali data yang anda masukkan');
			redirect_back();
		}else{
			$data_detail_fitur = array(
				'status' 	=> $this->input->post('status'), 
				'link_app' 	=> $this->input->post('link_app'), 
			);

			$data_insert_tagihan = array(
				'id_detail_fitur' 	=> $this->input->post('id_detail_fitur'), 
				'start_date' 		=> $this->input->post('start_date'), 
				'end_date' 			=> $this->input->post('end_date'), 
				'harga' 			=> $this->input->post('harga'), 
				'status_tagihan' 	=> $this->input->post('status_tagihan'), 
			);

			$id_detail_fitur = $this->input->post('id_detail_fitur');


			if($this->LoginM->update($id_detail_fitur, $data_detail_fitur)){
				if($this->LoginM->insert_tagihan($data_insert_tagihan)){
					$this->session->set_flashdata('sukses','Data anda berhasil ditambahkan');
					redirect_back();
				}else{
					$this->session->set_flashdata('error','Data anda tidak berhasil ditambahkan');
					redirect_back();
				}
			}else{
				$this->session->set_flashdata('error','Data anda tidak berhasil ditambahkan');
				redirect_back();
			}
		}
	}

	// call
	public function update_tagihan($id){
		$data = array('status_call' => 'Call 1');
		if($this->LoginM->updateTagihan($id, $data)){
			$this->session->set_flashdata('sukses','Call 1');
			redirect_back();
		}else{
			$this->session->set_flashdata('error','Data anda tidak berhasil diubah');
			redirect_back();
		}
	}
	public function update_tagihan2($id){
		$data = array('status_call' => 'Call 2');
		if($this->LoginM->updateTagihan($id, $data)){
			$this->session->set_flashdata('sukses','Call 1');
			redirect_back();
		}else{
			$this->session->set_flashdata('error','Data anda tidak berhasil diubah');
			redirect_back();
		}
	}
	public function update_tagihan3($id){
		$data = array('status_call' => 'Call 3');
		if($this->LoginM->updateTagihan($id, $data)){
			$this->session->set_flashdata('sukses','Call 1');
			redirect_back();
		}else{
			$this->session->set_flashdata('error','Data anda tidak berhasil diubah');
			redirect_back();
		}
	}
}