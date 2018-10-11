<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi_m extends CI_Model {


	function register($data){
		$this->db->insert('akun',$data);
		return TRUE;
	}

	public function update_data($id, $data){
		$this->db->where('id_akun', $id);
		$this->db->update('akun',$data);
		return TRUE;
	}
}
