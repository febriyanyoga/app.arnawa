<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class KoperasiC extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model(['Registrasi_m','LoginM']);
		in_access(); //helper buat batasi akses login/session
		user_access();

		$email_akun = $this->session->userdata('email_akun');
		$password 	= $this->session->userdata('password');
		$id_akun 	= $this->session->userdata('id_akun');
        $this->data['manajemen_fitur']      = $this->LoginM->get_detail_fitur_by_akun($id_akun)->result();
        $this->data['jenis_usaha'] 	= $this->LoginM->ceknum($email_akun, $password)->row()->jenis_usaha;
        $this->data['dataDiri'] 	= $this->session->userdata();
        $this->data['fitur'] 		= $this->LoginM->get_fitur_by_akun($id_akun)->result();
        $this->data['activeD'] = '';
        $this->data['activeM'] = '';
        $this->data['activeT'] = '';
        $this->data['activeF'] = '';
        $this->data['activeS'] = '';
        $this->data['in']       = '';
    }

    public function index(){
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
        $this->data['LoginM'] = $this->LoginM;
        $this->data['data_akun'] = $this->LoginM->get_all_data($id)->result()[0];
        $this->data['dataDiri'] = $this->session->userdata();


        $this->data['activeD'] = 'active';
        $this->data['select'] = '';
        $this->data['manajemen_fitur'] 		= $this->LoginM->get_detail_fitur_by_akun($id)->result();
        $this->data['isi'] = $this->load->view('DashboardV', $this->data, TRUE);
        $this->load->view('LayoutV', $this->data);
    }

	// Permintaan modul
    public function mintamodul(){
        $id  = $this->session->userdata('id_akun');
		$this->data['macam_fitur']	= $this->LoginM->get_all_fitur(); //semua fitur
		$this->data['macam_fitur_akun']	= $this->LoginM->get_fitur_by_akun($id); //fitur by akun
		$this->data['data_akun'] = $this->LoginM->get_all_data($id)->result()[0];
		$this->data['dataDiri'] = $this->session->userdata();       
        $this->data['activeM'] = 'active';

        $this->data['select'] = '';
        $this->data['isi'] = $this->load->view('PermintaanmodulV', $this->data, TRUE);
        $this->load->view('LayoutV', $this->data);
    }

	// tagihan
    public function tagihan(){
        $id  = $this->session->userdata('id_akun');
        $this->data['data_akun'] = $this->LoginM->get_all_data($id)->result()[0];
        $this->data['dataDiri'] = $this->session->userdata();
        $this->data['tagihan'] = $this->LoginM->get_tagihan_by_akun_paid($id);
        $this->data['tagihan_suspend'] 	= $this->LoginM->get_tagihan_by_akun_suspend($id);
        $this->data['tagihan_pending'] 	= $this->LoginM->get_tagihan_by_akun_pending($id);
        $this->data['tagihan_unpaid']	= $this->LoginM->get_tagihan_by_akun_unpaid($id);
        $this->data['tagihan_terakhir'] = $this->LoginM->get_tagihan_kadaluwarsa()->result();

        $this->data['activeT'] = 'active';
        $this->data['select'] = '';
        $this->data['LoginM'] = $this->LoginM;
        $this->data['isi'] = $this->load->view('TagihanV', $this->data, TRUE);
        $this->load->view('LayoutV', $this->data);
    }

    public function post_perpanjang(){
        $this->form_validation->set_rules('id_harga_fitur','ID Harga Fitur','required');
        $this->form_validation->set_rules('id_detail_fitur','ID Detail Fitur','required');
        $this->form_validation->set_rules('end_date','End Date','required');
        if($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('error','Data anda tidak berhasil disimpan. Silahkan cek kembali data yang anda masukkan');
            redirect_back();
        }else{

            $id_harga_fitur 	= $this->input->post('id_harga_fitur');
            $old_end_date		= $this->input->post('end_date');
            $id_detail_fitur	= $this->input->post('id_detail_fitur');

            $detail = $this->LoginM->get_harga_fitur_by_id($id_harga_fitur)->result()[0];
            if($detail->jenis == '1 Bulan'){
                $interval = 1;
            }elseif ($detail->jenis == '3 Bulan') {
                $interval = 3;
            }elseif ($detail->jenis == '6 Bulan') {
                $interval = 6;
            }elseif ($detail->jenis == '12 Bulan') {
                $interval = 12;
            }

			$new_old_end_date  	= date('Y-m-d', strtotime($old_end_date)); //format start date
            $start_date 		= date('Y-m-d', strtotime('+1 days', strtotime($new_old_end_date))); //start date + 7 hari 

            $end_date 			= date('Y-m-d', strtotime('+'.$interval.'months', strtotime($start_date))); //start date + 7 hari 


            $data_insert_tagihan = array(
            	'start_date'		=> $start_date,
            	'end_date'			=> $end_date,
            	'harga'				=> $detail->harga_fitur,
            	'id_detail_fitur'	=> $id_detail_fitur,
            	'status_call' 		=> 'aktif', 
            	'status_tagihan' 	=> 'Pending', 
            );
            if($this->LoginM->insert_tagihan($data_insert_tagihan)){
            	$this->session->set_flashdata('sukses','Tagihan berhasil diperpanjang. Silahkan klik tab Pending');
            	redirect_back();
            }else{
            	$this->session->set_flashdata('sukses','Tagihan tidak berhasil diperpanjang');
            	redirect_back();
            }
        }

    }

    public function post_update_perpanjang(){
        $this->form_validation->set_rules('id_tagihan','ID Tagihan','required');
        $this->form_validation->set_rules('id_harga_fitur','ID Harga Fitur','required');
        $this->form_validation->set_rules('id_detail_fitur','ID Detail Fitur','required');
        $this->form_validation->set_rules('start_date','Start Date','required');
        if($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('error','Data anda tidak berhasil disimpan. Silahkan cek kembali data yang anda masukkan');
            redirect_back();
        }else{

            $id_tagihan 		= $this->input->post('id_tagihan');
            $id_harga_fitur 	= $this->input->post('id_harga_fitur');
            $old_start_date		= $this->input->post('start_date');
            $id_detail_fitur	= $this->input->post('id_detail_fitur');

            $detail = $this->LoginM->get_harga_fitur_by_id($id_harga_fitur)->result()[0];
            if($detail->jenis == '1 Bulan'){
                $interval = 1;
            }elseif ($detail->jenis == '3 Bulan') {
                $interval = 3;
            }elseif ($detail->jenis == '6 Bulan') {
                $interval = 6;
            }elseif ($detail->jenis == '12 Bulan') {
                $interval = 12;
            }

			$new_old_start_date	= date('Y-m-d', strtotime($old_start_date)); //format start date
            $end_date 			= date('Y-m-d', strtotime('+'.$interval.'months', strtotime($new_old_start_date))); //start date + 7 hari 


            $data_insert_tagihan = array(
            	'end_date'			=> $end_date,
            	'harga'				=> $detail->harga_fitur,
            	'id_detail_fitur'	=> $id_detail_fitur,
            	'status_call' 		=> 'aktif', 
            	'status_tagihan' 	=> 'Pending', 
            );
            if($this->LoginM->updateTagihan($id_tagihan, $data_insert_tagihan)){
            	$this->session->set_flashdata('sukses','Tagihan berhasil diperpanjang. Silahkan klik tab Pending');
            	redirect_back();
            }else{
            	$this->session->set_flashdata('sukses','Tagihan tidak berhasil diperpanjang');
            	redirect_back();
            }
        }

    }

    public function update_unpaid($id_tagihan, $id_detail_fitur){
    	$data = array('status' => 'non-aktif');
    	$data_tagihan = array('status_tagihan' => 'Unpaid');
    	if($this->LoginM->update($id_detail_fitur, $data)){
    		if($this->LoginM->updateTagihan($id_tagihan, $data_tagihan)){
    			$this->session->set_flashdata('sukses','Tagihan tidak diperpanjang');
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

    public function konfirmasi_pembayaran(){
        $this->form_validation->set_rules('id_tagihan','ID Tagihan','required');
        $this->form_validation->set_rules('bank_tujuan','Bank Tujuan','required');
        $this->form_validation->set_rules('nama_bank_pengirim','Nama Bank Pengirim','required');
        $this->form_validation->set_rules('jml_transfer','Jumlah Transfer', 'required');
        $this->form_validation->set_rules('nama_pengirim', 'Nama Pengirim','required');
        // $this->form_validation->set_rules('file_transfer','File Transfer', 'required');
        $this->form_validation->set_rules('no_rekening_pengirim', 'No Rekening Pengirim','required');
        $this->form_validation->set_rules('tgl_transfer','Tanggal Transfer','required');
        $this->form_validation->set_rules('catatan','Catatan');
        if($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('error','Data Konfrimasi pembayaran tidak berhasil diunggah. Cek kembali data yang anda masukkan');
            redirect_back();
        }else{
            $config['upload_path'] = './assets/images/bukti_trf/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload

            $this->upload->initialize($config);
            if(!empty($_FILES['file_transfer']['name'])){

                if ($this->upload->do_upload('file_transfer')){
                    $gbr = $this->upload->data();
                    //Compress Image
                    $config['image_library']='gd2';
                    $config['source_image']='./assets/images/bukti_trf/'.$gbr['file_name'];
                    $config['create_thumb']= FALSE;
                    $config['maintain_ratio']= FALSE;
                    $config['quality']= '50%';
                    $config['width']= 600;
                    $config['height']= 400;
                    $config['new_image']= './assets/images/bukti_trf/'.$gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $gambar=$gbr['file_name'];

                    $bank_tujuan            = $this->input->post('bank_tujuan');
                    $nama_bank_pengirim     = $this->input->post('nama_bank_pengirim');
                    $jml_transfer           = $this->input->post('jml_transfer');
                    $nama_pengirim          = $this->input->post('nama_pengirim');
                    $file_transfer          = $this->input->post('file_transfer');
                    $no_rekening_pengirim   = $this->input->post('no_rekening_pengirim');
                    $tgl_transfer           = $this->input->post('tgl_transfer');
                    $catatan                = $this->input->post('catatan');
                    $id_tagihan             = $this->input->post('id_tagihan');

                    $data_update_tagihan = array(
                        'bank_tujuan'           => $bank_tujuan, 
                        'nama_bank_pengirim'    => $nama_bank_pengirim, 
                        'jml_transfer'          => $jml_transfer, 
                        'nama_pengirim'         => $nama_pengirim, 
                        'file_transfer'         => $gambar, 
                        'no_rekening_pengirim'  => $no_rekening_pengirim, 
                        'tgl_transfer'          => $tgl_transfer, 
                        'catatan'               => $catatan, 
                        'konfirmasi_pembayaran' => 'Terkonfirmasi'
                    );

                    if($this->LoginM->updateTagihan($id_tagihan, $data_update_tagihan)){
                        $this->session->set_flashdata('sukses','Data Konfrimasi berhasil dikirim. Silahkan tunggu admin kami untuk verifikasi');
                        redirect_back();
                    }else{
                        $this->session->set_flashdata('error','Data Konfrimasi tidak berhasil dikirim. Silahkan coba beberapa saat lagi');
                        redirect_back();
                    }
                }
            }else{
                echo "Image yang diupload kosong";
            }

        }
    }

    // upload bukti transfer konfirmasi pembayaran
    public function upload_image(){
        $config['upload_path'] = './assets/images/bukti_trf/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload

        $this->upload->initialize($config);
        if(!empty($_FILES['file_transfer']['name'])){

            if ($this->upload->do_upload('file_transfer')){
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./assets/images/bukti_trf/'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['quality']= '50%';
                $config['width']= 600;
                $config['height']= 400;
                $config['new_image']= './assets/images/bukti_trf/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $gambar=$gbr['file_name'];
                $judul=$this->input->post('xjudul');
                $this->m_upload->simpan_upload($judul,$gambar);
                echo "Image berhasil diupload";
            }

        }else{
            echo "Image yang diupload kosong";
        }

    }

    public function save_download(){  //save as pdf
        //load mPDF library
        $this->load->library('m_pdf');
        //load mPDF library


        //now pass the data//
        $this->data['title']="MY PDF TITLE 1.";
        $this->data['description']="";
        $this->data['description']=$this->official_copies;
         //now pass the data //

        
        $html=$this->load->view('LoginV',$this->data, true); //load the pdf_output.php by passing our data and get all data in $html varriable.

        //this the the PDF filename that user will get to download
        $pdfFilePath ="mypdfName-".time()."-download.pdf";

        
        //actually, you can pass mPDF parameter on this load() function
        $pdf = $this->m_pdf->load();
        //generate the PDF!
        $pdf->WriteHTML($html,2);
        //offer it to user via browser download! (The PDF won't be saved on your server HDD)
        $pdf->Output($pdfFilePath, "D");

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

    public function input_fitur($kemana){
    	$this->form_validation->set_rules('fitur', 'Fitur');
    	$this->form_validation->set_rules('id_akun', 'ID Akun','required');  

    	if($this->form_validation->run() == FALSE){
    		$this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
    		redirect_back();
    	}else{
    		$fitur = $this->input->post('fitur');
    		foreach ($fitur as $key) {
    			$id_akun 	= $this->input->post('id_akun');
    			$status 	= 'menunggu';
    			$data 		= array(
    				'id_akun' 	=> $id_akun, 
    				'id_fitur' 	=> $key, 
    				'status' 	=> $status, 
    			);
    			$this->LoginM->insert_fitur($data);
    		}
    		$this->session->set_flashdata('sukses','Data anda berhasil disimpan');
    		if($kemana == ""){
    			redirect('KoperasiC/dashboard');
    		}else{
    			redirect_back();
    		}
    	}
    }





	// user
	// ===========fitur============
    public function hapus_detail_fitur($id_detail_fitur){
    	if($this->LoginM->hapus_detail_fitur($id_detail_fitur)){
    		$this->session->set_flashdata('sukses','Data anda berhasil dihapus');
    		redirect_back();
    	}else{
    		$this->session->set_flashdata('error','Data anda tidak berhasil dihapus');
    		redirect_back();
    	}
    }

    public function update_menunggu($id){
    	$data = array('status' => 'menunggu');
    	if($this->LoginM->update($id, $data)){
    		$this->session->set_flashdata('sukses','Data anda berhasil diubah');
    		redirect_back();
    	}else{
    		$this->session->set_flashdata('error','Data anda tidak berhasil diubah');
    		redirect_back();
    	}
    }

    // master data
    public function MasterData(){
        $id  = $this->session->userdata('id_akun');
        $this->data['macam_fitur']  = $this->LoginM->get_all_fitur(); //semua fitur
        $this->data['macam_fitur_akun'] = $this->LoginM->get_fitur_by_akun($id); //fitur by akun
        $this->data['data_akun'] = $this->LoginM->get_all_data($id)->result()[0];
        $this->data['dataDiri'] = $this->session->userdata();

        $this->data['activeF'] = 'active';
        $this->data['activeS'] = 'active';
        $this->data['in']     = 'in';

        $this->data['select'] = 'selected';
        $this->data['manajemen_fitur']      = $this->LoginM->get_detail_fitur_by_akun($id)->result();
        $this->data['isi'] = $this->load->view('MasterDataV', $this->data, TRUE);
        $this->load->view('LayoutV', $this->data);
    }

}
