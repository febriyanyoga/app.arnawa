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
                                                <td class="text-center"><a style="color: white;" class="btn btn-info btn-sm" data-toggle="modal" data-target="#perpanjang" title="Perpanjang"> Perpanjang</a></td>
                                            </tr>
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
                                            <td class="text-center"><a style="color: white;" class="btn btn-info btn-sm" data-toggle="modal" data-target="#perpanjang" title="Perpanjang"> Perpanjang</a> &nbsp; <a style="color: white;" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#nonaktifkan" title="nonaktifkan"> Tidak</a></td>
                                        </tr>
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
                                            $tgl_end        = $tag->end_date;
                                            $new_tgl_end    = date('d-m-Y', strtotime($tgl_end));
                                            $tgl_start      = $tag->start_date;
                                            $new_tgl_start  = date('Y-m-d', strtotime($tgl_start));

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
                                            </td>
                                            <td class="text-center"><?php echo $tagP->jml_transfer;?></td>
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
                                            <td class="text-center"><a style="color: white;" class="btn btn-info btn-sm" data-toggle="modal" data-target="#konfirmasi" title="Konfirmasi"> Konfirmasi Pembayaran</a></td>
                                        </tr>
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
                                    <tr>
                                        <td class="text-center"></td>
                                        <td class="text-center"></td>
                                        <td class="text-center"></td>
                                        <td class="text-center"></td>
                                    </tr>
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



    <!-- start modal perpanjangan -->
    <div class="modal fade" id="perpanjang" tabindex="-1" role="dialog" aria-labelledby="perpanjang">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel1">Perpanjangan Fitur</h4>
                </div>
                <div class="modal-body">
                    <p>Silakan lakukan perpanjangan masa aktif fitur anda</p><br>
                    <div class="form-group">
                        <label class="control-label">Pilih Waktu Perpanjangan</label>
                        <select class="form-control" name="" id="" required>
                            <option selected value="1bulan">1 Bulan</option>
                            <option selected value="3bulan">3 Bulan</option>
                            <option selected value="6bulan">6 Bulan</option>
                            <option selected value="12bulan">12 Bulan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Jumlah Tagihan</label>
                        <input type="text" class="form-control"  name="" id="" >
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-info"  value="Simpan">
                </div>
            </div>
        </div>
    </div>
    <!-- end modal perpanjangan -->




    <!-- start modal konfirmasi pembayaran -->
    <div class="modal fade" id="konfirmasi" tabindex="-1" role="dialog" aria-labelledby="konfirmasi">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel1">Konfirmasi Pembayaran</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <p>Pastikan anda telah melakukan transfer sebelum mengisi form</p><br>
                        <div class="form-group">
                            <label class="control-label">Bank Tujuan</label>
                            <select class="form-control" name="" id="" required>
                                <option selected value="BCA">BCA 01234567 a/n PT. Arnawa Teknologi Informasi</option>
                                <option selected value="BNI">BNI 09876543 a/n PT. Arnawa Teknologi Informasi</option>
                                <option selected value="BRI">BRI 56789012 a/n PT. Arnawa Teknologi Informasi</option>
                                <option selected value="MANDIRI">Mandiri 34980765 a/n PT. Arnawa Teknologi Informasi</option>
                            </select>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Bank Pengirim</label>
                                        <select class="form-control" name="" id="" required>
                                            <option selected value="BCA">BCA</option>
                                            <option selected value="BNI">BNI</option>
                                            <option selected value="BRI">BRI</option>
                                            <option selected value="MANDIRI">Mandiri</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">No. Rekening</label>
                                        <input type="text" class="form-control"  name="" id="" >
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Nama Pengirim</label>
                                        <input type="text" class="form-control"  name="" id="" >
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Tanggal Transfer</label>
                                        <input type="date" class="form-control"  name="" id="" >
                                    </div>
                                </div><div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Jumlah Transfer</label>
                                        <input type="text" class="form-control"  name="" id="" >
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Upload Bukti</label>
                                        <input type="file" class="form-control"  name="" id="" >
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Catatan</label>
                                        <textarea class="form-control"  name="" id="" ></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-danger" data-dismiss="modal" value="Simpan">
                </div>
            </div>
        </div>
    </div>
    <!-- end modal konfirmasi pembayaran -->

