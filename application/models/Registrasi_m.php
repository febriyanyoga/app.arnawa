<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi_m extends CI_Model {


	function register($data){
		$this->db->insert('tbl_register',$data);
		return TRUE;
	}

	public function update_data($id, $data){
		$this->db->where('id', $id);
		$this->db->update('tbl_register',$data);
		return TRUE;
	}
}
