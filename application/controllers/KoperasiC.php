<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class KoperasiC extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model(['Registrasi_m','LoginM']);
		$email_akun = $this->session->userdata('email_akun');
		$password 	= $this->session->userdata('password');
		$this->data['jenis_usaha'] 	= $this->LoginM->ceknum($email_akun, $password)->row()->jenis_usaha;
		$this->data['dataDiri'] 	= $this->session->userdata();

		in_access(); //helper buat batasi akses login/session
	}
	
	public function isi_data()
	{
		$id_akun 	= $this->session->userdata('id_akun');
		$this->data['data_akun'] 	= $this->LoginM->get_all_data($id_akun)->result()[0];
		$this->data['provinsi'] 	= $this->LoginM->get_all_provinsi();
		$this->load->view('Isi_data_usaha',$this->data);

	}

	public function pilih_fitur(){
		$this->data['fitur']	= $this->LoginM->get_all_fitur();
		$this->data['dataDiri'] = $this->session->userdata();
		$this->load->view('Pilih_fiturV',$this->data);

	}

	public function dashboard(){
		$id  = $this->session->userdata('id_akun');
		$this->data['data_akun'] = $this->LoginM->get_all_data($id)->result()[0];
		$this->data['dataDiri'] = $this->session->userdata();
		$this->load->view('DashboardV',$this->data);
	}

	 // alamat
	public function get_kabupaten_kota(){
		$postData = $this->input->post();
		$data = $this->LoginM->get_kabupaten_kota($postData);
		echo json_encode($data);
	}

	public function get_kecamatan(){
		$postData = $this->input->post();
		$data = $this->LoginM->get_kecamatan($postData);
		echo json_encode($data);
	}

	public function get_kelurahan(){
		$postData = $this->input->post();
		$data = $this->LoginM->get_kelurahan($postData);
		echo json_encode($data);
	}

	public function input_data(){
		$this->form_validation->set_rules('nama_usaha', 'Nama Usaha', 'required');  
		$this->form_validation->set_rules('nama_pimpinan', 'Nama Pimpinan', 'required');  
		$this->form_validation->set_rules('no_hp', 'Nomor HP', 'required');
		$this->form_validation->set_rules('tlp_usaha', 'Telpon Usaha');  
		$this->form_validation->set_rules('alamat_usaha', 'Alamat Usaha','required');  
		$this->form_validation->set_rules('id_kelurahan', 'ID Kelurahan','required');  
		$this->form_validation->set_rules('kode_pos', 'Kode Pos','required');  
		$this->form_validation->set_rules('email_usaha', 'Email Usaha');  
		$this->form_validation->set_rules('web_usaha', 'Website Usaha');  
		$this->form_validation->set_rules('jumlah_anggota', 'Jumlah Anggota Usaha');  
		$this->form_validation->set_rules('id_akun', 'ID Akun','required');  

		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
			redirect_back();
		}else{
			$data = array(
				'nama_usaha' 			=> $this->input->post('nama_usaha'), 
				'nama_pimpinan' 		=> $this->input->post('nama_pimpinan'), 
				'no_hp' 				=> $this->input->post('no_hp'), 
				'tlp_usaha' 			=> $this->input->post('tlp_usaha'), 
				'alamat_usaha' 			=> $this->input->post('alamat_usaha'), 
				'id_kelurahan' 			=> $this->input->post('id_kelurahan'), 
				'kode_pos' 				=> $this->input->post('kode_pos'), 
				'email_usaha' 			=> $this->input->post('email_usaha'), 
				'web_usaha' 			=> $this->input->post('web_usaha'), 
				'jumlah_anggota' 		=> $this->input->post('jumlah_anggota'), 
			);
			$id_akun = $this->input->post('id_akun');

			if($this->Registrasi_m->update_data($id_akun, $data)){
				$this->session->set_flashdata('sukses','Data anda berhasil disimpan');
				redirect('KoperasiC/pilih_fitur');
			}else{
				$this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
				redirect_back();
			}
		} 
	}

	public function input_fitur(){
		$this->form_validation->set_rules('fitur', 'Fitur');
		$this->form_validation->set_rules('id_akun', 'ID Akun','required');  

		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
			redirect_back();
		}else{
			$fitur = $this->input->post('fitur');
			foreach ($fitur as $key) {
				$id_akun 	= $this->input->post('id_akun');
				$status 	= 'non-aktif';
				$data 		= array(
					'id_akun' 	=> $id_akun, 
					'id_fitur' 	=> $key, 
					'status' 	=> $status, 
				);
				$this->LoginM->insert_fitur($data);
			}
			$this->session->set_flashdata('sukses','Data anda berhasil disimpan');
			redirect('KoperasiC/dashboard');
		}
	}
	
	
// 	admin
	public function update_verified($id){
		$data = array('status' => 'verified');
		if($this->LoginM->update($id, $data)){
			$this->session->set_flashdata('sukses','Data anda berhasil diubah');
			redirect_back();
		}else{
			$this->session->set_flashdata('error','Data anda tidak berhasil diubah');
			redirect_back();
		}
	}

	public function update_waiting($id){
		$data = array('status' => 'waiting');
		if($this->LoginM->update($id, $data)){
			$this->session->set_flashdata('sukses','Data anda berhasil diubah');
			redirect_back();
		}else{
			$this->session->set_flashdata('error','Data anda tidak berhasil diubah');
			redirect_back();
		}
	}



}
