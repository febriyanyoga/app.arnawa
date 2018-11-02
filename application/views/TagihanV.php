<div class="col-md-12">
    <div class="card">
        <div class="card-body p-b-0">
            <h4 class="card-title">Tagihan</h4><br>
            <?php
            $data=$this->session->flashdata('sukses');
            if($data!=""){ 
                ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                    <h3 class="text-success"><i class="fa fa-check-circle"></i> Sukses!</h3> <?=$data;?>
                </div>
                <?php 
            } 
            ?>
            <?php 
            $data2=$this->session->flashdata('error');
            if($data2!=""){ 
                ?>
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                    <h3 class="text-danger"><i class="fa fa-check-circle"></i> Gagal!</h3> <?=$data2;?>
                </div>
                <?php 
            } 
            ?>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs customtab" role="tablist">
                <li class="nav-item"> 
                    <a class="nav-link active" data-toggle="tab" href="#paid" role="tab"><span class="hidden-sm-up"><i class="fas fa-donate"></i></span> <span class="hidden-xs-down"> Paid</span> &nbsp; 
                        <?php
                        if($tagihan->num_rows() != '0'){
                            echo '<span class="label label-success label-rounded label-sm badge">'.$tagihan->num_rows().'</span>';
                        }
                        ?>
                    </a>
                </li>
                <li class="nav-item"> 
                    <a class="nav-link" data-toggle="tab" href="#suspend" role="tab"><span class="hidden-sm-up"><i class="fas fa-ban"></i></span><span class="hidden-xs-down"> Suspend</span>&nbsp; 
                        <?php
                        if($tagihan_suspend->num_rows() != 0){
                            echo '<span class="label label-default label-rounded label-sm badge">'.$tagihan_suspend->num_rows().'</span>';
                        }
                        ?>
                    </a> 
                </li>
                <li class="nav-item"> 
                    <a class="nav-link" data-toggle="tab" href="#pending" role="tab"><span class="hidden-sm-up"><i class="fas fa-exclamation-triangle"></i></span> <span class="hidden-xs-down"> Pending</span>&nbsp; 
                        <?php
                        if($tagihan_pending->num_rows() != 0){
                            echo '<span class="label label-warning label-rounded label-sm badge">'.$tagihan_pending->num_rows().'</span>';
                        }
                        ?>
                    </a> 
                </li>
                <li class="nav-item"> 
                    <a class="nav-link" data-toggle="tab" href="#unpaid" role="tab"><span class="hidden-sm-up"><i class="fas fa-minus-circle"></i></span><span class="hidden-xs-down"> Unpaid</span>&nbsp; 
                        <?php
                        if($tagihan_unpaid->num_rows() != 0){
                            echo '<span class="label label-danger label-rounded label-sm badge">'.$tagihan_unpaid->num_rows().'</span>';
                        }
                        ?>
                    </a> 
                </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active  p-20" id="paid" role="tabpanel">
                    <div class="p-20">
                        <h4>Fitur anda saat ini</h4><br>
                        <div class="table-responsive">
                            <table id="tabel_paid" class="table table-striped table-bordered display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Fitur</th>
                                        <th class="text-center">Masa Aktif</th>
                                        <th class="text-center">Tanggal Berakhir</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // array tagihan yang terakhir (butuh perpanjang)
                                    $array_tag = array();
                                    foreach ($tagihan_terakhir as $t) {
                                        array_push($array_tag, $t->id_tagihan);
                                    }
                                    //end

                                    $i=0;
                                    foreach ($tagihan->result() as $tag) {
                                        if($tag->status_tagihan == 'Paid'){
                                            $i++;

                                            ?>
                                            <tr>
                                                <td class="text-center"><?php echo $i;?></td>
                                                <td class="text-center"><?php echo $tag->nama_fitur?></td>
                                                <?php
                                                $tgl_end        = $tag->end_date;
                                                $new_tgl_end    = date('d-m-Y', strtotime($tgl_end));

                                                $tanggal        = $tag->end_date;
                                                $tanggal        = new DateTime($tanggal); 
                                                $sekarang       = new DateTime($tag->start_date);
                                                $perbedaan      = $tanggal->diff($sekarang);
                                                $now            = new DateTime();
                                                $beda           = $tanggal->diff($now);
                                                ?>
                                                <td class="text-center">
                                                    <div>
                                                        <?php 
                                                        if($perbedaan->y != 0){
                                                            echo $perbedaan->y." Tahun ";
                                                        }
                                                        if ($perbedaan->m != 0) {
                                                            echo $perbedaan->m." Bulan ";
                                                        }
                                                        if ($perbedaan->d != 0) {
                                                            echo $perbedaan->d." Hari";
                                                        }
                                                        ?>
                                                    </div>
                                                    <div>
                                                        <?php 
                                                        if($now>$tanggal){
                                                            echo "Masa aktif habis";
                                                        }else{

                                                            if($beda->y != 0){
                                                                echo $beda->y." Tahun ";
                                                            }
                                                            if ($beda->m != 0) {
                                                                echo $beda->m." Bulan ";
                                                            }
                                                            if ($beda->d != 0) {
                                                                echo $beda->d." Hari";
                                                            }
                                                            if($beda->y != 0 || $beda->m != 0 || $beda->d != 0){
                                                                echo " lagi";
                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                </td>
                                                <td class="text-center"><?php echo $new_tgl_end;?></td>

                                                <td class="text-center">
                                                    <?php
                                                    if(in_array($tag->id_tagihan, $array_tag)){ //jika id tagihan termasuk didalam array tagihan terakhir yang butuh perpanjangan
                                                        ?>
                                                        <a style="color: white;" class="btn btn-success btn-sm btn" data-toggle="modal" data-target="#fileKonfirmasi-<?php echo $tag->id_tagihan?>" title="file konfirmasi"><i class="ti ti-image"></i></a>
                                                        <a style="color: white;" class="btn btn-info btn-sm btn" data-toggle="modal" data-target="#perpanjangPaid-<?php echo $tag->id_tagihan?>" title="Perpanjang"> Perpanjang</a>
                                                        <?php
                                                    }else{
                                                        ?>
                                                        <a style="color: white;" class="btn btn-success btn-sm btn" data-toggle="modal" data-target="#fileKonfirmasi-<?php echo $tag->id_tagihan?>" title="file konfirmasi"><i class="ti ti-image"></i></a>
                                                        <?php
                                                    }
                                                    ?>
                                                </td>
                                            </tr>

                                            <!-- start modal perpanjangan -->
                                            <div class="modal fade" id="perpanjangPaid-<?php echo $tag->id_tagihan?>" tabindex="-1" role="dialog" aria-labelledby="perpanjang">
                                                <div class="modal-dialog modal-md" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="exampleModalLabel1">Perpanjangan Fitur <?php echo $tag->nama_fitur?></h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        </div>
                                                        <form action="<?php echo base_url('KoperasiC/post_perpanjang')?>" method="post">
                                                            <div class="modal-body">
                                                                <p>Silakan lakukan perpanjangan masa aktif fitur anda</p><br>
                                                                <div class="form-group">
                                                                    <label class="control-label">Pilih Waktu Perpanjangan</label>
                                                                    <input type="hidden" name="end_date" value="<?php echo $tag->end_date?>">
                                                                    <input type="hidden" name="id_detail_fitur" value="<?php echo $tag->id_detail_fitur?>">
                                                                    <select class="form-control" name="id_harga_fitur" id="id_harga_fitur" required>
                                                                        <?php

                                                                        $select_fitur = $LoginM->get_harga_by_fitur($tag->id_fitur)->result();
                                                                        foreach ($select_fitur as $sP) {
                                                                            ?>
                                                                            <option value="<?php echo $sP->id_harga_fitur?>"><?php echo $sP->jenis." - "."Rp".number_format($sP->harga_fitur, 0,',','.').",-";?></option>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <input type="submit" class="btn btn-info" value="Simpan">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end modal perpanjangan -->

                                            <!-- start modal konfirmasi -->
                                            <div class="modal fade" id="fileKonfirmasi-<?php echo $tag->id_tagihan?>" tabindex="-1" role="dialog" aria-labelledby="fileKonfirmasi">
                                                <div class="modal-dialog modal-md" role="document">
                                                    <div class="modal-content">
                                                        <?php
                                                        if($tag->file_transfer == ""){
                                                            echo "<h5 class='text-center m-t-5'> File Konfirmasi Pembayaran tidak ditemukan</h5>";
                                                        }else{
                                                            ?>
                                                            <img src="<?php echo base_url().'assets/images/bukti_trf/'.$tag->file_transfer;?>">
                                                            <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end modal konfirmasi -->
                                            <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="tab-pane  p-20" id="suspend" role="tabpanel">
                    <div class="p-20">
                        <h4>Perpanjangan Fitur</h4>
                        <p>Silahkan lakukan perpanjangan masa aktif untuk fitur anda</p><br>
                        <div class="table-responsive">
                            <table id="tabel_suspend" class="table table-striped table-bordered display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Fitur</th>
                                        <th class="text-center">Masa Aktif</th>
                                        <th class="text-center">Mulai di Non-aktifkan</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $j=0;
                                    foreach ($tagihan_suspend->result() as $tagS) {
                                        $j++;
                                        ?>
                                        <tr>
                                            <td class="text-center"><?php echo $j;?></td>
                                            <td class="text-center"><?php echo $tagS->nama_fitur?></td>
                                            <?php
                                            $tgl_start      = $tagS->start_date;
                                            $new_tgl_start  = date('Y-m-d', strtotime($tgl_start));

                                            $tgl_end        = $tagS->end_date;
                                            $new_tgl_end    = date('d-m-Y', strtotime($tgl_end));

                                            $tanggal        = $tagS->end_date;
                                            $tanggal        = new DateTime($tanggal); 
                                            $sekarang       = new DateTime($tagS->start_date);
                                            $perbedaan      = $tanggal->diff($sekarang);
                                            $now            = new DateTime();
                                            $beda           = $tanggal->diff($now);
                                            ?>
                                            <td class="text-center">
                                                <div>
                                                    <?php 
                                                    if($perbedaan->y != 0){
                                                        echo $perbedaan->y." Tahun ";
                                                    }
                                                    if ($perbedaan->m != 0) {
                                                        echo $perbedaan->m." Bulan ";
                                                    }
                                                    if ($perbedaan->d != 0) {
                                                        echo $perbedaan->d." Hari";
                                                    }
                                                    ?>
                                                </div>
                                                <div>
                                                    <?php 
                                                    if($now>$tanggal){
                                                        echo "Masa aktif habis";
                                                    }else{

                                                        if($beda->y != 0){
                                                            echo $beda->y." Tahun ";
                                                        }
                                                        if ($beda->m != 0) {
                                                            echo $beda->m." Bulan ";
                                                        }
                                                        if ($beda->d != 0) {
                                                            echo $beda->d." Hari";
                                                        }
                                                        if($beda->y != 0 || $beda->m != 0 || $beda->d != 0){
                                                            echo " lagi";
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </td>
                                            <?php
                                            $tgl2           = date('Y-m-d', strtotime('+7 days', strtotime($new_tgl_start))); //operasi 
                                            $jatuh_tempo    = new DateTime($tgl2);
                                            $nonaktif       = $jatuh_tempo->diff($now);

                                            ?>
                                            <td class="text-center">
                                                <div>
                                                    <?php echo date('d-m-Y', strtotime($tgl2));?>
                                                </div>
                                                <div>
                                                    <div>
                                                        <?php 
                                                        if($now>$jatuh_tempo){
                                                            echo "sudah jatuh tempo";
                                                        }else{

                                                            if($nonaktif->y != 0){
                                                                echo $beda_tempo->y." Tahun ";
                                                            }
                                                            if ($nonaktif->m != 0) {
                                                                echo $nonaktif->m." Bulan ";
                                                            }
                                                            if ($nonaktif->d != 0) {
                                                                echo $nonaktif->d." Hari";
                                                            }
                                                            if($nonaktif->y != 0 || $nonaktif->m != 0 || $nonaktif->d != 0){
                                                                echo " lagi";
                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <a style="color: white;" class="btn btn-info btn-sm" data-toggle="modal" data-target="#perpanjang-<?php echo $tagS->id_tagihan?>" title="Perpanjang"> Perpanjang</a> &nbsp; 
                                                <a href="<?php echo base_url('KoperasiC/update_unpaid/'.$tagS->id_tagihan.'/'.$tagS->id_detail_fitur)?>" class="btn btn-danger btn-sm" title="tidak perpanjang" onClick="return confirm('Anda yakin tidak akan memperpanjang fitur <?php echo $tagS->nama_fitur?>?')"> Tidak</a>
                                            </td>
                                        </tr>


                                        <!-- start modal perpanjangan -->
                                        <div class="modal fade" id="perpanjang-<?php echo $tagS->id_tagihan?>" tabindex="-1" role="dialog" aria-labelledby="perpanjang">
                                            <div class="modal-dialog modal-md" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="exampleModalLabel1">Perpanjangan Fitur <?php echo $tagS->nama_fitur?></h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    </div>
                                                    <form action="<?php echo base_url('KoperasiC/post_update_perpanjang')?>" method="post">
                                                        <div class="modal-body">
                                                            <p>Silakan lakukan perpanjangan masa aktif fitur anda</p><br>
                                                            <div class="form-group">
                                                                <label class="control-label">Pilih Waktu Perpanjangan</label>
                                                                <input type="hidden" name="start_date" value="<?php echo $tagS->start_date?>">
                                                                <input type="hidden" name="id_detail_fitur" value="<?php echo $tagS->id_detail_fitur?>">
                                                                <input type="hidden" name="id_tagihan" value="<?php echo $tagS->id_tagihan?>">
                                                                <select class="form-control" name="id_harga_fitur" id="id_harga_fitur" required>
                                                                    <?php

                                                                    $select_fitur = $LoginM->get_harga_by_fitur($tagS->id_fitur)->result();
                                                                    foreach ($select_fitur as $sP) {
                                                                        ?>
                                                                        <option value="<?php echo $sP->id_harga_fitur?>"><?php echo $sP->jenis." - "."Rp".number_format($sP->harga_fitur, 0,',','.').",-";?></option>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="submit" class="btn btn-info" value="Simpan">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end modal perpanjangan -->
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane p-20" id="pending" role="tabpanel">
                    <div class="p-20">
                        <h4>Pembayaran Fitur</h4>
                        <p>Silahkan lakukan pembayaran untuk perpanjangan masa aktif fitur anda</p><br>
                        <div class="table-responsive">
                            <table id="tabel_pending" class="table table-striped table-bordered display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Fitur</th>
                                        <th class="text-center">Masa Aktif</th>
                                        <th class="text-center">Tagihan</th>
                                        <th class="text-center">Jatuh Tempo</th>
                                        <th class="text-center">Status Konfirmasi</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $j=0;
                                    foreach ($tagihan_pending->result() as $tagP) {
                                        $j++;
                                        ?>
                                        <tr>
                                            <td class="text-center"><?php echo $j;?></td>
                                            <td class="text-center"><?php echo $tagP->nama_fitur?></td>
                                            <?php
                                            $tgl_end        = $tagP->end_date;
                                            $new_tgl_end    = date('d-m-Y', strtotime($tgl_end));
                                            $tgl_start      = $tagP->start_date;
                                            $new_tgl_start  = date('Y-m-d', strtotime($tgl_start));

                                            $tanggal        = $tagP->end_date;
                                            $tanggal        = new DateTime($tanggal); 
                                            $sekarang       = new DateTime($tagP->start_date);
                                            $perbedaan      = $tanggal->diff($sekarang);
                                            $now            = new DateTime();
                                            $beda           = $tanggal->diff($now);
                                            ?>
                                            <td class="text-center">
                                                <div>
                                                    <?php 
                                                    if($perbedaan->y != 0){
                                                        echo $perbedaan->y." Tahun ";
                                                    }
                                                    if ($perbedaan->m != 0) {
                                                        echo $perbedaan->m." Bulan ";
                                                    }
                                                    if ($perbedaan->d != 0) {
                                                        echo $perbedaan->d." Hari";
                                                    }
                                                    ?>
                                                </div>
                                            </td>
                                            <td>Rp<?php echo number_format($tagP->harga, 0,',','.');?>,-</td>
                                            <?php
                                            $tgl2           = date('Y-m-d', strtotime('+7 days', strtotime($new_tgl_start))); //operasi 
                                            $jatuh_tempo    = new DateTime($tgl2);
                                            $beda_tempo     = $jatuh_tempo->diff($now);

                                            ?>
                                            <td class="text-center">
                                                <div>
                                                    <?php echo date('d-m-Y', strtotime($tgl2));?>
                                                </div>
                                                <div>
                                                    <div>
                                                        <?php 
                                                        if($now>$jatuh_tempo){
                                                            echo "sudah jatuh tempo";
                                                        }else{

                                                            if($beda_tempo->y != 0){
                                                                echo $beda_tempo->y." Tahun ";
                                                            }
                                                            if ($beda_tempo->m != 0) {
                                                                echo $beda_tempo->m." Bulan ";
                                                            }
                                                            if ($beda_tempo->d != 0) {
                                                                echo $beda_tempo->d." Hari";
                                                            }
                                                            if($beda_tempo->y != 0 || $beda_tempo->m != 0 || $beda_tempo->d != 0){
                                                                echo " lagi";
                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php
                                                if($tagP->konfirmasi_pembayaran == "Terkonfirmasi"){
                                                    echo $tagP->konfirmasi_pembayaran;
                                                    echo '<br><small>sedang menunggu verifikasi</small>';

                                                }else{
                                                    echo $tagP->konfirmasi_pembayaran;
                                                }
                                                ?>
                                            </td>
                                            <td class="text-center">
                                                <?php
                                                if($tagP->jml_transfer != 0){
                                                    ?>
                                                    <a style="color: white;" class="btn btn-info btn-sm" data-toggle="modal" data-target="#konfirmasi-<?php echo $tagP->id_tagihan;?>" title="Konfirmasi Ulang"><span class="ti-reload"></span></a>
                                                    <?php                                                    
                                                }elseif ($tagP->jml_transfer == 0) {
                                                    ?>
                                                    <a style="color: white;" class="btn btn-info btn-sm" data-toggle="modal" data-target="#konfirmasi-<?php echo $tagP->id_tagihan;?>" title="Konfirmasi"> Konfirmasi Pembayaran</a>
                                                    <?php
                                                }
                                                ?>
                                            </td>
                                        </tr>

                                        <!-- start modal konfirmasi pembayaran -->
                                        <div class="modal fade" id="konfirmasi-<?php echo $tagP->id_tagihan;?>" tabindex="-1" role="dialog" aria-labelledby="konfirmasi">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <form action="<?php echo base_url('KoperasiC/konfirmasi_pembayaran')?>" method="post" enctype="multipart/form-data">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="exampleModalLabel1">Konfirmasi Pembayaran Fitur <?php echo $tagP->nama_fitur;?></h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Pastikan anda telah melakukan transfer sebelum mengisi form</p><br>
                                                            <div class="form-group">
                                                                <input type="hidden" name="id_tagihan" value="<?php echo $tagP->id_tagihan?>">
                                                                <label class="control-label">Bank Tujuan</label>
                                                                <select class="form-control" name="bank_tujuan" id="bank_tujuan" required>
                                                                    <option selected value="BCA 01234567 a/n PT. Arnawa Teknologi Informasi">BCA 01234567 a/n PT. Arnawa Teknologi Informasi</option>
                                                                    <option selected value="BNI 09876543 a/n PT. Arnawa Teknologi Informasi">BNI 09876543 a/n PT. Arnawa Teknologi Informasi</option>
                                                                    <option selected value="BRI 56789012 a/n PT. Arnawa Teknologi Informasi">BRI 56789012 a/n PT. Arnawa Teknologi Informasi</option>
                                                                    <option selected value="Mandiri 34980765 a/n PT. Arnawa Teknologi Informasi">Mandiri 34980765 a/n PT. Arnawa Teknologi Informasi</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label">Bank Pengirim</label>
                                                                            <select class="form-control" name="nama_bank_pengirim" id="nama_bank_pengirim" required>
                                                                                <option selected value="BCA">BCA</option>
                                                                                <option selected value="BNI">BNI</option>
                                                                                <option selected value="BRI">BRI</option>
                                                                                <option selected value="MANDIRI">Mandiri</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="control-label">No. Rekening</label>
                                                                            <input type="number" class="form-control"  name="no_rekening_pengirim" id="no_rekening_pengirim" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="control-label">Nama Pengirim</label>
                                                                            <input type="text" class="form-control"  name="nama_pengirim" id="nama_pengirim" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="control-label">Tanggal Transfer</label>
                                                                            <input type="date" class="form-control"  name="tgl_transfer" id="tgl_transfer" required>
                                                                        </div>
                                                                    </div><div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label">Jumlah Transfer</label>
                                                                            <input type="number" class="form-control"  name="jml_transfer" id="jml_transfer" placeholder="hanya angka" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="control-label">Upload Bukti</label>
                                                                            <input type="file" class="form-control"  name="file_transfer" id="file_transfer" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="control-label">Catatan</label>
                                                                            <textarea class="form-control"  name="catatan" id="catatan" required></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="submit" class="btn btn-success" name="submit" value="Simpan">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- end modal konfirmasi pembayaran -->

                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div><br><br><br>

                        <div class="card">
                            <div class="card-body" style="background-color: #f2f2f23b;">
                                <h5>Info Pembayaran</h5><br>
                                <p>Pembayaran dapat dilakukan melalui salah satu rekening a/n PT. Arnawa Teknologi Informasi berikut ini :</p>
                                <p>BCA 01234567 a/n PT. Arnawa Teknologi Informasi </p>
                                <p>BNI 09876543 a/n PT. Arnawa Teknologi Informasi </p>
                                <p>BRI 56789012 a/n PT. Arnawa Teknologi Informasi </p>
                                <p>Mandiri 34980765 a/n PT. Arnawa Teknologi Informasi </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane p-20" id="unpaid" role="tabpanel">
                    <div class="p-20">
                        <h4>Fitur Unpaid</h4>
                        <p>Silahkan aktifkan ulang ftur anda</p><br>
                        <div class="table-responsive">
                            <table id="tabel_unpaid" class="table table-striped table-bordered display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Fitur</th>
                                        <th class="text-center">Masa Aktif</th>
                                        <th class="text-center">Tagihan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $k=0;
                                    foreach ($tagihan_unpaid->result() as $tagU) {
                                        $k++;
                                        ?>
                                        <tr>
                                            <td class="text-center"><?php echo $k?></td>
                                            <td class=><?php echo $tagU->nama_fitur?></td>
                                            <?php
                                            $tgl_end        = $tagU->end_date;
                                            $new_tgl_end    = date('d-m-Y', strtotime($tgl_end));
                                            $tgl_start      = $tagU->start_date;
                                            $new_tgl_start  = date('Y-m-d', strtotime($tgl_start));

                                            $tanggal        = $tagU->end_date;
                                            $tanggal        = new DateTime($tanggal); 
                                            $sekarang       = new DateTime($tagU->start_date);
                                            $perbedaan      = $tanggal->diff($sekarang);
                                            $now            = new DateTime();
                                            $beda           = $tanggal->diff($now);
                                            ?>
                                            <td class="text-center">
                                                <div>
                                                    <?php 
                                                    if($perbedaan->y != 0){
                                                        echo $perbedaan->y." Tahun ";
                                                    }
                                                    if ($perbedaan->m != 0) {
                                                        echo $perbedaan->m." Bulan ";
                                                    }
                                                    if ($perbedaan->d != 0) {
                                                        echo $perbedaan->d." Hari";
                                                    }
                                                    ?>
                                                </div>
                                            </td>
                                            <td>Rp<?php echo number_format($tagU->harga, 0,',','.');?>,-</td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div><br><br><br>
                    </div>
                </div>
            </div>
            <div class="card-body p-t-0">
                <pre class="language-html scrollable">

                </pre>
            </div>
        </div>
    </div>