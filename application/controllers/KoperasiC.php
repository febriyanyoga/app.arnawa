<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class KoperasiC extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model(['Registrasi_m','LoginM']);
		in_access(); //helper buat batasi akses login/session
	}
	
	public function koperasi()
	{
		$this->data['dataDiri'] = $this->session->userdata();
		$id  = $this->session->userdata('id');
		$this->data['data_akun'] = $this->LoginM->get_all_data($id)->result()[0];
		$this->data['provinsi'] = $this->LoginM->get_all_provinsi();
		$this->load->view('Register_koperasi_V',$this->data);

	}

	public function umkm()
	{
		$this->data['dataDiri'] = $this->session->userdata();
		$id  = $this->session->userdata('id');
		$this->data['data_akun'] = $this->LoginM->get_all_data($id)->result()[0];
		$this->data['provinsi'] = $this->LoginM->get_all_provinsi();
		$this->load->view('Register_umkm_V',$this->data);

	}

	public function pilih_fitur_koperasi(){
		$this->data['dataDiri'] = $this->session->userdata();
		$this->load->view('Pilih_fiturV',$this->data);

	}

	public function admin(){
		$this->data['data_akun'] = $this->LoginM->get_all_data2()->result();
		$this->data['dataDiri'] = $this->session->userdata();
// 		$id_register= $this->session->userdata('id');
// 		$this->data['log_status'] = $this->LoginM->get_history_status($id_register)->result();
        $this->data['LoginM'] = $this->LoginM;
		$this->load->view('Admin_V',$this->data);

	}

	public function dashboard(){
		$id  = $this->session->userdata('id');
		$this->data['data_akun'] = $this->LoginM->get_all_data($id)->result()[0];
		$this->data['dataDiri'] = $this->session->userdata();
		$this->load->view('DashboardV',$this->data);

	}

	public function pilih_fitur_umkm(){
		$this->data['dataDiri'] = $this->session->userdata();
		$this->load->view('Pilih_fitur_umkmV',$this->data);

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

	public function input_data_koperasi(){
		$this->form_validation->set_rules('nama_koperasi', 'Nama Koperasi', 'required');  
		$this->form_validation->set_rules('nama_pimpinan', 'Nama Pimpinan', 'required');  
		$this->form_validation->set_rules('no_hp', 'Nomor HP', 'required');  
		$this->form_validation->set_rules('tlp_koperasi', 'Telpon Koperasi');  
		$this->form_validation->set_rules('alamat_koperasi', 'Alamat Koperasi','required');  
		$this->form_validation->set_rules('id_kelurahan', 'ID Kelurahan','required');  
		$this->form_validation->set_rules('kode_pos', 'Kode Pos','required');  
		$this->form_validation->set_rules('email_koperasi', 'Email Koperasi');  
		$this->form_validation->set_rules('web_koperasi', 'Website Koperasi');  
		$this->form_validation->set_rules('jumlah_anggota', 'Jumlah Anggota Koperasi');  
		$this->form_validation->set_rules('id', 'ID','required');  
		$this->form_validation->set_message('is_unique', 'Data %s sudah dipakai'); 

		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('error','Data anda tidak berhasil disimpan karena email sudah dipakai');
			redirect_back();
		}else{
			$data = array(
				'nama_koperasi' 		=> $this->input->post('nama_koperasi'), 
				'nama_pimpinan' 		=> $this->input->post('nama_pimpinan'), 
				'no_hp' 				=> $this->input->post('no_hp'), 
				'tlp_koperasi' 			=> $this->input->post('tlp_koperasi'), 
				'alamat_koperasi' 		=> $this->input->post('alamat_koperasi'), 
				'id_kelurahan' 			=> $this->input->post('id_kelurahan'), 
				'kode_pos' 				=> $this->input->post('kode_pos'), 
				'email_koperasi' 		=> $this->input->post('email_koperasi'), 
				'web_koperasi' 			=> $this->input->post('web_koperasi'), 
				'jumlah_anggota' 		=> $this->input->post('jumlah_anggota'), 
			);
			$id = $this->input->post('id');

			if($this->Registrasi_m->update_data($id, $data)){
				$this->session->set_flashdata('sukses','Data anda berhasil disimpan');
				redirect('KoperasiC/pilih_fitur_koperasi');
			}else{
				$this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
				redirect_back();
			}
		} 
	}
	public function input_data_umkm(){
		$this->form_validation->set_rules('nama_koperasi', 'Nama Koperasi', 'required');  
		$this->form_validation->set_rules('nama_pimpinan', 'Nama Pimpinan', 'required');  
		$this->form_validation->set_rules('no_hp', 'Nomor HP', 'required');  
		$this->form_validation->set_rules('tlp_koperasi', 'Telpon Koperasi');  
		$this->form_validation->set_rules('alamat_koperasi', 'Alamat Koperasi','required');  
		$this->form_validation->set_rules('id_kelurahan', 'ID Kelurahan','required');  
		$this->form_validation->set_rules('kode_pos', 'Kode Pos','required');  
		$this->form_validation->set_rules('email_koperasi', 'Email Koperasi');  
		$this->form_validation->set_rules('web_koperasi', 'Website Koperasi');  
		$this->form_validation->set_rules('id', 'ID','required');  
		$this->form_validation->set_message('is_unique', 'Data %s sudah dipakai'); 

		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('error','Data anda tidak berhasil disimpan karena email sudah dipakai');
			redirect_back();
		}else{
			$data = array(
				'nama_koperasi' 		=> $this->input->post('nama_koperasi'), 
				'nama_pimpinan' 		=> $this->input->post('nama_pimpinan'), 
				'no_hp' 				=> $this->input->post('no_hp'), 
				'tlp_koperasi' 			=> $this->input->post('tlp_koperasi'), 
				'alamat_koperasi' 		=> $this->input->post('alamat_koperasi'), 
				'id_kelurahan' 			=> $this->input->post('id_kelurahan'), 
				'kode_pos' 				=> $this->input->post('kode_pos'), 
				'email_koperasi' 		=> $this->input->post('email_koperasi'), 
				'web_koperasi' 			=> $this->input->post('web_koperasi'), 
				'jumlah_anggota' 		=> $this->input->post('jumlah_anggota'), 
			);
			$id = $this->input->post('id');

			if($this->Registrasi_m->update_data($id, $data)){
				$this->session->set_flashdata('sukses','Data anda berhasil disimpan');
				redirect('KoperasiC/pilih_fitur_umkm');
			}else{
				$this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
				redirect_back();
			}
		} 
	}

	public function input_fitur(){
		$this->form_validation->set_rules('fitur', 'Fitur');
		$this->form_validation->set_rules('id', 'ID','required');  

		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
			redirect_back();
		}else{
			$data = array(
				'fitur' => implode(", ",$this->input->post('fitur',TRUE)),
			);
			$id = $this->input->post('id');

			if($this->Registrasi_m->update_data($id, $data)){
				$this->session->set_flashdata('sukses','Data anda berhasil disimpan');
				redirect('KoperasiC/dashboard');
			}else{
				$this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
				redirect_back();
			}
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
