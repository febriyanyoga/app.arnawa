<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class LoginM extends CI_Model{
	function __construct(){
		parent:: __construct();
		$this->load->database();
	}
	public function ceknum($email_akun, $password){ //cek akun di db pengguna jabatan (berapa rows)
		$this->db->where('email_akun', $email_akun);
		$this->db->where('password', $password);
		return $this->db->get('akun');
	}

	public function cek_fitur($id_akun){ //cek akun di db pengguna jabatan (berapa rows)
		$this->db->where('id_akun', $id_akun);
		return $this->db->get('detail_fitur');
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

	public function get_all_data($id_akun){
		$this->db->select('*');
		$this->db->from('akun R');
		// $this->db->join('kelurahan L', 'R.id_kelurahan = L.id_kelurahan');
		// $this->db->join('kecamatan C', 'L.id_kecamatan = C.id_kecamatan');
		// $this->db->join('kabupaten_kota K', 'C.id_kabupaten_kota = K.id_kabupaten_kota');
		// $this->db->join('propinsi P', 'K.id_propinsi = P.id_propinsi');
		$this->db->where('R.id_akun', $id_akun);
		$query = $this->db->get();
		if($query){
			return $query;
		}else{
			echo "tidak ditemukan";
		}
	}

	public function get_all_data2(){
		$this->db->select('*');
		$this->db->from('akun R');
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
		$this->db->where('md5(email_akun)', $key);
		return $this->db->update('akun', $data);  
	}

	public function update($id, $data){
		$this->db->where('id_detail_fitur', $id);
		if($this->db->update('detail_fitur', $data)){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function updateTagihan($id_tagihan, $data){
		$this->db->where('id_tagihan', $id_tagihan);
		if($this->db->update('tagihan', $data)){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function get_history_status($id_detail_fitur){
		$this->db->select('*');
		$this->db->from('log_status L');
		$this->db->join('detail_fitur D','D.id_detail_fitur = L.id_detail_fitur');
		$this->db->where('D.id_detail_fitur', $id_detail_fitur);
		$query = $this->db->get();
		if($query){
			return $query;
		}else{
			echo "tidak ditemukan";
		}
	}

	public function insert_fitur($data){
		$this->db->insert('detail_fitur', $data);
		return TRUE;
	}

	public function get_all_fitur(){
		$query = $this->db->get('fitur');
		return $query;
	}

	public function get_fitur_by_akun($id_akun){
		$this->db->select('*');
		$this->db->from('detail_fitur D');
		$this->db->join('akun A', 'D.id_akun = A.id_akun');
		$this->db->join('fitur F', 'D.id_fitur = F.id_fitur');
		$this->db->where('D.id_akun',$id_akun);
		// $this->db->where('D.approval = "diterima"');
		$query = $this->db->get();
		if($query){
			return $query;
		}else{
			echo "tidak ditemukan";
		}
	}

	public function get_fitur_by_akun_setuju($id_akun){
		$this->db->select('*');
		$this->db->from('detail_fitur D');
		$this->db->join('akun A', 'D.id_akun = A.id_akun');
		$this->db->join('fitur F', 'D.id_fitur = F.id_fitur');
		$this->db->where('D.id_akun',$id_akun);
		$this->db->where('D.status = "menunggu"');
		$query = $this->db->get();
		if($query){
			return $query;
		}else{
			echo "tidak ditemukan";
		}
	}

	public function get_detail_fitur($id_fitur){
		$this->db->where('id_fitur', $id_fitur);
		return $this->db->get('fitur');
	}

	public function get_detail_fitur_by_akun($id_akun){
		$this->db->select('*');
		$this->db->from('detail_fitur D');
		$this->db->join('akun A', 'D.id_akun = A.id_akun');
		$this->db->join('fitur F', 'D.id_fitur = F.id_fitur');
		$this->db->join('tagihan T', 'D.id_detail_fitur = T.id_detail_fitur');
		$this->db->where('D.id_akun', $id_akun);
		$this->db->order_by('D.id_detail_fitur');
		$this->db->group_by('D.id_detail_fitur');
		$query = $this->db->get();
		if($query){
			return $query;
		}else{
			echo "tidak ditemukan";
		}
	}

	public function update_detail_fitur($id_detail_fitur){
		$data = array('status_notifikasi' => 'sudah_dibaca');
		$this->db->where('id_detail_fitur', $id_detail_fitur);
		$this->db->update('detail_fitur', $data);
		return TRUE;
	}

	//belum dibaca
	public function get_detail_fitur_all(){
		$this->db->select('*');
		$this->db->from('detail_fitur D');
		$this->db->join('akun A', 'D.id_akun = A.id_akun');
		$this->db->join('fitur F', 'D.id_fitur = F.id_fitur');
		$this->db->where('D.status_notifikasi = "belum_dibaca"');
		$this->db->order_by('D.id_detail_fitur');
		$this->db->group_by('D.id_detail_fitur');
		$query = $this->db->get();
		if($query){
			return $query;
		}else{
			echo "tidak ditemukan";
		}
	}


	public function get_tagihan_by_fitur($id_detail_fitur){
		$this->db->select('*');
		$this->db->from('tagihan T');
		$this->db->join('detail_fitur D','T.id_detail_fitur = D.id_detail_fitur');
		$this->db->join('akun A','A.id_akun = D.id_akun');
		$this->db->join('fitur F','D.id_fitur = F.id_fitur');
		$this->db->where('D.id_detail_fitur', $id_detail_fitur);
		$this->db->order_by('T.id_tagihan','DESC');
		$query = $this->db->get();
		if($query){
			return $query;
		}else{
			echo "tidak ditemukan";
		}

		
	}

	public function get_tagihan_by_fitur_group($id_detail_fitur){
		$this->db->select('*');
		$this->db->from('tagihan T');
		$this->db->where('T.id_detail_fitur', $id_detail_fitur);
		$this->db->order_by('T.id_tagihan','DESC');
		$query = $this->db->get();
		if($query){
			return $query;
		}else{
			echo "tidak ditemukan";
		}

		
	}

	// reset_password
	public function getByEmail($email){
		$this->db->where('email_akun',$email);
		$result = $this->db->get('akun');
		return $result;
	}

	public function simpanToken($data){
		$this->db->insert('forget_password', $data);
		return $this->db->affected_rows();
	}

	public function cekToken($token){
		$this->db->where('token',$token);
		$result = $this->db->get('forget_password');
		return $result;
	}

	public function ubahData($data, $id_akun){
		$this->db->where('id_akun', $id_akun);
		$this->db->update('akun', $data);
		return TRUE;
	}

	// user
	// fitur
	public function hapus_detail_fitur($id_detail_fitur){
		$this->db->where('id_detail_fitur', $id_detail_fitur);
		$this->db->delete('detail_fitur');
		return TRUE;
	}

	public function hapus_lampiran($id_lampiran){
		$this->db->where('id_lampiran', $id_lampiran);
		$this->db->delete('lampiran');
		return TRUE;
	}

	public function get_harga($id_detail_fitur){
		$this->db->select('*');
		$this->db->from('detail_fitur D');
		$this->db->join('fitur F','D.id_fitur = F.id_fitur');
		$this->db->join('harga_fitur H', 'F.id_fitur = H.id_fitur');
		$this->db->where('D.id_detail_fitur', $id_detail_fitur);
		$this->db->where('H.jenis = "1 Bulan"');
		return $this->db->get();
	}

	// tagihan
	public function get_tagihan_by_id($id_detail_fitur){
		$this->db->where('id_detail_fitur', $id_detail_fitur);
		$this->db->order_by('id_tagihan','DESC');
		return $this->db->get('tagihan');
	}

	public function insert_tagihan($data){
		$this->db->insert('tagihan', $data);
		return TRUE;
	}

	public function status_call($id_tagihan){
		$this->db->where('id_tagihan', $id_tagihan);
		$this->db->order_by('id_tagihan','DESC');
		return $this->db->get('log_call');
	}

	public function get_tagihan_kadaluwarsa(){
		$query = $this->db->query('SELECT * FROM tagihan T, detail_fitur D, fitur F WHERE T.id_detail_fitur = D.id_detail_fitur AND D.id_fitur = F.id_fitur AND T.id_tagihan IN(SELECT MAX(id_tagihan) AS id_tagihan FROM tagihan GROUP BY id_detail_fitur)');
		return $query;
	}

	public function get_tagihan_by_akun_paid($id_akun){
		$this->db->select('*');
		$this->db->from('tagihan T');
		$this->db->join('detail_fitur D', 'T.id_detail_fitur = D.id_detail_fitur');
		$this->db->join('fitur F', 'D.id_fitur = F.id_fitur');
		$this->db->join('akun A', 'D.id_akun = A.id_akun');
		$this->db->where('A.id_akun', $id_akun);
		$this->db->where('T.status_tagihan = "Paid"');
		$this->db->order_by('T.id_tagihan','ASC');
		return $this->db->get();
	}

	public function get_tagihan_by_akun_suspend($id_akun){
		$this->db->select('*');
		$this->db->from('tagihan T');
		$this->db->join('detail_fitur D', 'T.id_detail_fitur = D.id_detail_fitur');
		$this->db->join('fitur F', 'D.id_fitur = F.id_fitur');
		$this->db->join('akun A', 'D.id_akun = A.id_akun');
		$this->db->where('A.id_akun', $id_akun);
		$this->db->where('T.status_tagihan = "Suspend"');
		$this->db->order_by('T.end_date','ASC');
		return $this->db->get();
	}

	public function get_tagihan_by_akun_pending($id_akun){
		$this->db->select('*');
		$this->db->from('tagihan T');
		$this->db->join('detail_fitur D', 'T.id_detail_fitur = D.id_detail_fitur');
		$this->db->join('fitur F', 'D.id_fitur = F.id_fitur');
		$this->db->join('akun A', 'D.id_akun = A.id_akun');
		$this->db->where('A.id_akun', $id_akun);
		$this->db->where('T.status_tagihan = "Pending"');
		$this->db->order_by('T.end_date','ASC');
		return $this->db->get();
	}

	public function get_tagihan_by_akun_unpaid($id_akun){
		$this->db->select('*');
		$this->db->from('tagihan T');
		$this->db->join('detail_fitur D', 'T.id_detail_fitur = D.id_detail_fitur');
		$this->db->join('fitur F', 'D.id_fitur = F.id_fitur');
		$this->db->join('akun A', 'D.id_akun = A.id_akun');
		$this->db->where('A.id_akun', $id_akun);
		$this->db->where('T.status_tagihan = "Unpaid"');
		$this->db->order_by('T.end_date','ASC');
		return $this->db->get();
	}

	public function get_tagihan($id_tagihan){
		$this->db->select('*');
		$this->db->from('tagihan T');
		$this->db->join('detail_fitur D','T.id_detail_fitur = D.id_detail_fitur');
		$this->db->join('fitur F', 'D.id_fitur = F.id_fitur');
		$this->db->join('akun A', 'D.id_akun = A.id_akun');
		// $this->db->join('harga_fitur H', 'F.id_fitur = H.id_fitur');
		$this->db->where('T.id_tagihan', $id_tagihan);
		return $this->db->get();
	}
	// get harga by id fitur
	public function get_harga_by_fitur($id_fitur){
		$this->db->where('id_fitur', $id_fitur);
		$this->db->order_by('id_harga_fitur','ASC');
		return $this->db->get('harga_fitur');
	}

	public function get_harga_fitur_by_id($id_harga_fitur){
		$this->db->where('id_harga_fitur', $id_harga_fitur);
		return $this->db->get('harga_fitur');
	}


	// fitur
	public function insert_lampiran($data){
		$this->db->insert('lampiran', $data);
		return TRUE;
	}

	public function get_lampiran($id_detail_fitur, $jenis_lampiran){
		$this->db->where('id_detail_fitur', $id_detail_fitur);
		$this->db->where('jenis_file', $jenis_lampiran);
		return $this->db->get('lampiran');
	}
}