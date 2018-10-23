<!-- MULAI : DATA TABEL -->
<!-- ============================================================== -->
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Manajemen Modul Anda</h4><br>
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
            <div class="table-responsive">
                <table id="multi_col_order" class="table table-striped table-bordered display" style="width:100%">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Fitur</th>
                            <th>Status</th>
                            <th>Tanggal Aktif</th>
                            <th>Tanggal Berakhir</th>
                            <th>Akses</th>
                            <th style="width:10px;">Status Tagihan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                                // print_r($manajemen_fitur);
                        $i=0;
                        foreach ($manajemen_fitur as $macam_fitur) {
                            if($macam_fitur->status != "menunggu"){
                                $i++;
                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $i;?></td>
                                    <td><?php echo $macam_fitur->nama_fitur;?></td>
                                    <td class="text-center">
                                        <?php 

                                        if($macam_fitur->status == "aktif"){
                                            ?>
                                            <span style="color: white;" class="label label-sm label-success" title="aktif"><?php echo $macam_fitur->status;?></span>
                                            <?php
                                        }elseif ($macam_fitur->status == "non-aktif") {
                                            ?>
                                            <span style="color: white;" class="label label-sm label-danger" title="non-aktif"><?php echo $macam_fitur->status;?></span>
                                            <?php
                                        }elseif ($macam_fitur->status == "suspend"){
                                            ?>
                                            <span style="color: white;" class="label label-sm label-default" title="dalam proses"><?php echo $macam_fitur->status;?></span>
                                            <?php  
                                        }elseif ($macam_fitur->status == "proses") {
                                            ?>
                                            <span style="color: white;" class="label label-sm label-info" title="dalam proses"><?php echo $macam_fitur->status;?></span>
                                            <?php  
                                        }elseif ($macam_fitur->status == "pending") {
                                            ?>
                                            <span style="color: white;" class="label label-sm label-warning" title="dalam proses"><?php echo $macam_fitur->status;?></span>
                                            <?php  
                                        }
                                        ?>
                                    </td>
                                    <?php
                                    $tagihan = $LoginM->get_tagihan_by_fitur_group($macam_fitur->id_detail_fitur)->row();

                                    $tgl_start      = $tagihan->start_date;
                                    $new_tgl_start  = date('d-m-Y', strtotime($tgl_start));
                                    $tgl_end        = $tagihan->end_date;
                                    $new_tgl_end    = date('d-m-Y', strtotime($tgl_end));
                                    ?>
                                    <td><?php echo $new_tgl_start;?></td>
                                    <td><?php echo $new_tgl_end;?></td>
                                    <td class="text-center">
                                        <?php
                                        if($macam_fitur->link_app != ""){
                                            ?>
                                            <a class="label btn-default label-sm" href="<?php echo $macam_fitur->link_app;?>" title="klik untuk menuju halaman">Link</a>
                                            <?php
                                        }else{
                                            ?>
                                            <span class="label btn-warning label-sm" title="klik untuk menuju halaman">Link belum tersedia</span>
                                            <?php
                                        }
                                        ?>
                                    </td>
                                    <td class="text-center">
                                        <?php
                                        if($tagihan->status_tagihan == "Paid"){
                                            ?>
                                            <span class="label btn-success label-sm" title="paid"><? echo $tagihan->status_tagihan;?></span>
                                            <?php
                                        }elseif ($tagihan->status_tagihan == "Suspend") {
                                            ?>
                                            <span class="label btn-default label-sm" title="suspend"><? echo $tagihan->status_tagihan;?></span>
                                            <?php
                                        }elseif ($tagihan->status_tagihan == "Pending") {
                                            ?>
                                            <span class="label btn-warning label-sm" title="pending"><? echo $tagihan->status_tagihan;?></span>
                                            <?php
                                        }
                                        ?>
                                    </td>
                                    <td class="text-center">
                                        <a style="color: white;" class="btn btn-info btn-sm" data-toggle="modal" data-target="#lihat-<?php echo $macam_fitur->id_detail_fitur?>" title="lihat riwayat tagihan"><i class="fa fa-eye"></i></a>
                                        <?php
                                        if($macam_fitur->status == "aktif"){
                                            ?>
                                            <a href="<?php echo base_url('KoperasiC/update_menunggu/'.$macam_fitur->id_detail_fitur)?>" class="btn btn-danger btn-sm"  title="aktifkan kembali/ajukan ulang"><i class="ti-reload"></i></a>
                                            <?php
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>


        <?php
        $status = $LoginM->get_fitur_by_akun_setuju($dataDiri['id_akun'])->num_rows();
        if($status != 0){

            ?>
            <div class="card-body">
                <h4 class="card-title">Manajemen Pengajuan Modul</h4>
                <br>
                <div class="table-responsive">
                    <table id="my_table"  class="table table-striped table-bordered display" style="width:100%">
                        <thead>
                            <tr class="text-center">
                                <th style="width: 10px;">No.</th>
                                <th>Fitur</th>
                                <th style="width: 100px;">Tanggal Pengajuan</th>
                                <th style="width: 50px;">Status</th>
                                <th style="width: 150px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        // print_r($fitur);
                            $i=0;
                            foreach ($fitur as $fit) {
                                if($fit->status == "menunggu" || $fit->status == "proses"){
                                    $i++;
                                    ?>
                                    <tr>
                                        <td class="text-center"><?php echo $i;?></td>
                                        <td><?php echo $fit->nama_fitur?></td>
                                        <?php
                                        $tgl_pengajuan      = $fit->created_at_f;
                                        $new_tgl_pengajuan  = date('d-m-Y', strtotime($tgl_pengajuan));
                                        ?>
                                        <td><?php echo $new_tgl_pengajuan;?></td>
                                        <td class="text-center">
                                            <?php
                                            if($fit->status == "menunggu"){
                                                ?>
                                                <span style="color: white;" class="label label-sm label-primary" title="menunggu persetujuan"><?php echo $fit->status;?></span>
                                                <?php
                                            }else{
                                                ?>
                                                <span style="color: white;" class="label label-sm label-info" title="dalam proses persetujuan"><?php echo $fit->status;?></span>
                                                <?php
                                            }
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <a href="<?php echo base_url('KoperasiC/hapus_detail_fitur/').$fit->id_detail_fitur?>"  onClick="return confirm('Anda yakin akan membatalkan pengajuan fitur <?php echo $fit->nama_fitur?>?')" style="color: white;" class="btn btn-danger btn-sm" title="hapus pengajuan fitur"><i class="ti-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php
        }
        ?>

    </div>
</div>


<div>
    <?php
    foreach ($manajemen_fitur as $macam_fitur) {
        $i++;
        $data = $LoginM->get_tagihan_by_id($macam_fitur->id_detail_fitur)->result();
            // print_r($data);
        ?>
        <!-- start edit data skpa -->
        <div class="modal fade" id="lihat-<?php echo $macam_fitur->id_detail_fitur?>" tabindex="-1" role="dialog" aria-labelledby="lihat">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">History Tagihan Fitur <?php echo $macam_fitur->nama_fitur;?></h4>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="history-<?php echo $macam_fitur->id_detail_fitur?>" class="table table-striped table-bordered display" style="width:100%">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No.</th>
                                            <th>Tanggal Aktif</th>
                                            <th>Tanggal Berakhir</th>
                                            <th>Jumlah Tagihan</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i=0;
                                        foreach ($data as $d) {
                                            $i++;
                                            ?>
                                            <tr>
                                                <td class="text-center"><?php echo $i;?></td>
                                                <?php
                                                $tgl_start      = $d->start_date;;
                                                $new_tgl_start  = date('d-m-Y', strtotime($tgl_start));
                                                $tgl_end        = $d->end_date;;
                                                $new_tgl_end    = date('d-m-Y', strtotime($tgl_end));
                                                ?>
                                                <td><?php echo $new_tgl_start;?></td>
                                                <td><?php echo $new_tgl_end;?></td>
                                                <td>Rp<?php echo number_format($d->harga, 0,',','.');?>,-</td>
                                                <td class="text-center">
                                                    <?php 
                                                    if($d->status_tagihan == "Paid"){
                                                        ?>
                                                        <span class="label btn-success label-sm" title="Tagihan berjalan"><?php echo $d->status_tagihan?></span>
                                                        <?php
                                                    }elseif ($d->status_tagihan == "Suspend") {
                                                        ?>
                                                        <span class="label btn-default label-sm" title="Tagihan berjalan"><?php echo $d->status_tagihan?></span>
                                                        <?php
                                                    }elseif ($d->status_tagihan == "Pending") {
                                                        ?>
                                                        <span class="label btn-warning label-sm" title="Tagihan berjalan"><?php echo $d->status_tagihan?></span>
                                                        <?php
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-danger" data-dismiss="modal" value="Tutup">
                    </div>
                </div>
            </div>
        </div>
        <!-- end edit skpa -->
        <?php
    }
    ?>
</div>