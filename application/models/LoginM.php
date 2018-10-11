<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class LoginM extends CI_Model{
	function __construct(){
		parent:: __construct();
		$this->load->database();
	}
	public function ceknum($email_akun, $password){ //cek akun di db pengguna jabatan (berapa rows)
		$this->db->where('email_akun', $email_akun);
		$this->db->where('password', $password);
		return $this->db->get('tbl_register');
	}

	// alamat
	public function get_all_provinsi(){
		$response = array();
		$this->db->select('*');
		$this->db->from('propinsi');
		$this->db->order_by('nama_propinsi');
		$query = $this->db->get();
		$response = $query->result_array();
		return $response;
	}

	public function get_kabupaten_kota($postData){
		$response = array();
		$this->db->select('*');
		$this->db->from('kabupaten_kota');
		$this->db->where('id_propinsi', $postData['id_propinsi']);
		$this->db->order_by('nama_kabupaten_kota');
		$query = $this->db->get();
		$response = $query->result_array();
		return $response;
	}

	public function get_kecamatan($postData){
		$response = array();
		$this->db->select('*');
		$this->db->from('kecamatan');
		$this->db->where('id_kabupaten_kota', $postData['id_kabupaten_kota']);
		$this->db->order_by('nama_kecamatan');
		$query = $this->db->get();
		$response = $query->result_array();
		return $response;
	}

	public function get_kelurahan($postData){
		$response = array();
		$this->db->select('*');
		$this->db->from('kelurahan');
		$this->db->where('id_kecamatan', $postData['id_kecamatan']);
		$this->db->order_by('nama_kelurahan');
		$query = $this->db->get();
		$response = $query->result_array();
		return $response;
	}

	public function get_all_data($id){
		$this->db->select('*');
		$this->db->from('tbl_register R');
		// $this->db->join('kelurahan L', 'R.id_kelurahan = L.id_kelurahan');
		// $this->db->join('kecamatan C', 'L.id_kecamatan = C.id_kecamatan');
		// $this->db->join('kabupaten_kota K', 'C.id_kabupaten_kota = K.id_kabupaten_kota');
		// $this->db->join('propinsi P', 'K.id_propinsi = P.id_propinsi');
		$this->db->where('R.id', $id);
		$query = $this->db->get();
		if($query){
			return $query;
		}else{
			echo "tidak ditemukan";
		}
	}

	public function get_all_data2(){
		$this->db->select('*');
		$this->db->from('tbl_register R');
		$this->db->join('kelurahan L', 'R.id_kelurahan = L.id_kelurahan');
		$this->db->join('kecamatan C', 'L.id_kecamatan = C.id_kecamatan');
		$this->db->join('kabupaten_kota K', 'C.id_kabupaten_kota = K.id_kabupaten_kota');
		$this->db->join('propinsi P', 'K.id_propinsi = P.id_propinsi');
		$query = $this->db->get();
		if($query){
			return $query;
		}else{
			echo "tidak ditemukan";
		}
	}
	
	public function verifyemail($key){  //post konfirmasi email ubah value status_email jadi 1 (aktif)
 		$data = array(
 			'status_email' => 'aktif',
 		);  
 		$this->db->where('email_encryption', $key);
 		return $this->db->update('tbl_register', $data);  
 	}
 	
 	public function update($id, $data){
 	    $this->db->where('id', $id);
 	    $this->db->update('tbl_register', $data);
 	    return TRUE;
 	}
 	
 	public function get_history_status($id_register){
 	    $this->db->select('*');
 	    $this->db->from('log_status');
 	    $this->db->where('id_register', $id_register);
 	    $query = $this->db->get();
 	    if($query){
			return $query;
		}else{
			echo "tidak ditemukan";
		}
 	}
}