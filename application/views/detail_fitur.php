<div class="main-wrapper">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="page-breadcrumb">
                    <div class="row">
                        <div class="col-5 align-self-center">
                            <h4 class="page-title">Detail Fitur</h4>
                            <div class="d-flex align-items-center">

                            </div>
                        </div>
                        <div class="col-7 align-self-center">
                            <div class="d-flex no-block justify-content-end align-items-center">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="<?php echo base_url('AdminC/manajemen_koperasi')?>">Daftar Koperasi</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">Detail Fitur</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="col-md-12 mt-30">
                    <?php
                    $data=$this->session->flashdata('sukses');
                    if($data!=""){ 
                        ?>
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                            <h3 class="text-success"><i class="fa fa-check-circle"></i> Sukses!</h3>
                            <?=$data;?>
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
                            <h3 class="text-danger"><i class="fa fa-check-circle"></i> Gagal!</h3>
                            <?=$data2;?>
                        </div>
                        <?php 
                    } 
                    $today=date("Y-m-d"); 
                    $tgl_agenda = strtotime('2018-10-24'); 
                    $tgl_today = strtotime($today); 
                    if ($tgl_today > $tgl_agenda){ 
                        echo "kadaluwarsa";
                    }
                    ?>
                    <?php echo validation_errors(); ?>
                </div>

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-lg-12">
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
                                            <th>Tagihan</th>
                                            <th>Status Call</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i=0;
                                        foreach ($manajemen_fitur as $macam_fitur) {
                                            $i++;
                                            ?>
                                            <tr>
                                                <td style="width:20px;" class="text-center"><?php echo $i;?></td>
                                                <td><?php echo $macam_fitur->nama_fitur;?></td>
                                                <td class="text-center">
                                                    <?php
                                                    if($macam_fitur->status == "non-aktif"){
                                                        ?>
                                                        <a style="color: white;" href="" class="label label-sm label-danger" data-toggle="modal" data-target="#myModal2-<?php echo $macam_fitur->id_detail_fitur;?>" title="klik untuk melihat riwayat status"><?php echo $macam_fitur->status;?></a>
                                                        <?php
                                                    }elseif($macam_fitur->status == "aktif"){
                                                        ?>
                                                        <a style="color: white;" href="" class="label label-sm label-success" data-toggle="modal" data-target="#myModal2-<?php echo $macam_fitur->id_detail_fitur;?>" title="klik untuk melihat riwayat status"><?php echo $macam_fitur->status;?></a>
                                                        <?php
                                                    }elseif ($macam_fitur->status == "pending"){
                                                        ?>
                                                        <a style="color: white;" href="" class="label label-sm label-warning" data-toggle="modal" data-target="#myModal2-<?php echo $macam_fitur->id_detail_fitur;?>" title="klik untuk melihat riwayat status"><?php echo $macam_fitur->status;?></a>
                                                        <?php
                                                    }elseif ($macam_fitur->status == "suspend"){
                                                        ?>
                                                        <a style="color: white;" href="" class="label label-sm label-default" data-toggle="modal" data-target="#myModal2-<?php echo $macam_fitur->id_detail_fitur;?>" title="klik untuk melihat riwayat status"><?php echo $macam_fitur->status;?></a>
                                                        <?php
                                                    }elseif ($macam_fitur->status == "proses"){
                                                        ?>
                                                        <a style="color: white;" href="" class="label label-sm label-info" data-toggle="modal" data-target="#myModal2-<?php echo $macam_fitur->id_detail_fitur;?>" title="klik untuk melihat riwayat status"><?php echo $macam_fitur->status;?></a>
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
                                                <td style="width:50px;"><?php echo $new_tgl_start;?></td>
                                                <td style="width:50px;"><?php echo $new_tgl_end;?></td>
                                                <td style="width:130px;"class="text-center">
                                                    <?php
                                                    if($macam_fitur->link_app != ""){
                                                        ?>
                                                        <a class="label btn-default label-sm" href="<?php echo $macam_fitur->link_app;?>" title="klik untuk menuju halaman">Link</a>
                                                        <?php
                                                    }else{
                                                        ?>
                                                        <span class="label btn-warning label-sm" title="link belum tersedia">Link belum tersedia</span>
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
                                                    <?php
                                                    $tagihan = $LoginM->get_tagihan_by_fitur_group($macam_fitur->id_detail_fitur)->row();
                                                    $call = $this->LoginM->status_call($tagihan->id_tagihan)->result();
                                                    if(sizeof($call)==0){
                                                        echo $macam_fitur->status_call;
                                                        echo "id tagihan".$tagihan->id_tagihan;
                                                    }else{
                                                        ?>
                                                        <div>
                                                            <?php
                                                            $status_c = $call[0]->created_at_log;
                                                            echo $status_c;
                                                            ?>
                                                        </div>
                                                        <div>
                                                            <?php
                                                            if($macam_fitur->status_call == "aktif"){
                                                                ?>
                                                                <a href="<?php echo base_url('AdminC/update_tagihan/'.$macam_fitur->id_detail_fitur)?>" style="color: white;" class="label label-danger label-sm" title="Call 1"><i class="ti-headphone-alt"></i></a>
                                                                <?php
                                                            }elseif ($macam_fitur->status_call == "Call 1") {
                                                                ?>
                                                                <a style="color: white;" class="label label-default label-md" title="Call 1"><i class="ti-headphone-alt"></i></a>
                                                                <a href="<?php echo base_url('AdminC/update_tagihan/'.$macam_fitur->id_detail_fitur)?>" style="color: white;" class="label label-danger label-sm" title="Call 2"><i class="ti-headphone-alt"></i></a>
                                                                
                                                                <?php
                                                            }elseif ($macam_fitur->status_call == "Call 2") {
                                                                ?>
                                                                <a style="color: white;" class="label label-default label-md" title="Call 1"><i class="ti-headphone-alt"></i></a>
                                                                <a style="color: white;" class="label label-default label-md" title="Call 2"><i class="ti-headphone-alt"></i></a>
                                                                <a href="<?php echo base_url('AdminC/update_tagihan/'.$macam_fitur->id_detail_fitur)?>" style="color: white;" class="label label-danger label-sm" title="Call 3"><i class="ti-headphone-alt"></i></a>
                                                                <?php
                                                            }elseif ($macam_fitur->status_call == "Call 3") {
                                                                ?>
                                                                <a style="color: white;" class="label label-default label-md" title="Call 1"><i class="ti-headphone-alt"></i></a>
                                                                <a style="color: white;" class="label label-default label-md" title="Call 2"><i class="ti-headphone-alt"></i></a>
                                                                <a style="color: white;" class="label label-default label-md" title="Call 3"><i class="ti-headphone-alt"></i></a>
                                                                <?php
                                                            }
                                                            ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    if($macam_fitur->status == 'non-aktif'){
                                                        ?>
                                                        <a href="<?php echo base_url('AdminC/update_aktif/'.$macam_fitur->id_detail_fitur)?>" style="color: white;" class="btn btn-info btn-sm" title="aktifkan"><i class="ti-check"></i></a>
                                                        <?php
                                                    }
                                                    if($macam_fitur->status == 'aktif'){
                                                        ?>
                                                        <!-- <a href="<?php echo base_url('AdminC/update_non_aktif/'.$macam_fitur->id_detail_fitur)?>" style="color: white;" class="btn btn-danger btn-sm"  title="non-aktifkan"><i class="ti-close"></i></a> -->
                                                        <a href="<?php echo base_url('AdminC/update_suspend/'.$macam_fitur->id_detail_fitur)?>" style="color: white;" class="btn btn-warning btn-sm"  title="suspend"><i class="ti-na"></i></a>
                                                        <?php
                                                    }
                                                    if($macam_fitur->status == 'suspend'){
                                                        ?>
                                                        <a href="<?php echo base_url('AdminC/update_aktif/'.$macam_fitur->id_detail_fitur)?>" style="color: white;" class="btn btn-info btn-sm" title="aktifkan"><i class="ti-check"></i></a>
                                                        <a href="<?php echo base_url('AdminC/update_non_aktif/'.$macam_fitur->id_detail_fitur)?>" style="color: white;" class="btn btn-danger btn-sm"  title="non-aktifkan"><i class="ti-close"></i></a>
                                                        <?php
                                                    }
                                                    ?>
                                                </td>
                                            </tr>

                                            <!-- start modal history status -->
                                            <?php  
                                            $history = $LoginM->get_history_status($macam_fitur->id_detail_fitur)->result();
                                            ?>
                                            <div class="modal" id="myModal2-<?php echo $macam_fitur->id_detail_fitur?>">
                                                <div class="modal-dialog modal-md">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Detail Status</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <div class="row text-center">
                                                                <hr>
                                                                <div class="col-md-4">Tanggal Perubahan</div>
                                                                <div class="col-md-4">Satus lama</div>
                                                                <div class="col-md-4">Status baru</div>
                                                            </div>
                                                            <?php 
                                                            foreach ($history as $h){
                                                                ?>
                                                                <div class="row text-center">
                                                                    <hr size="30">
                                                                    <div class="col-md-4">
                                                                        <?php
                                                                        $tanggal_berubah        = $h->tanggal_berubah;
                                                                        $new_tanggal_berubah    = date('d-m-Y', strtotime($tanggal_berubah));
                                                                        echo $new_tanggal_berubah;
                                                                        ?>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <?php echo $h->status_lama;?>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <?php echo $h->status_baru?>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end modal history status -->

                                            

                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <br>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-5 align-self-center">
                            <h4 class="page-title">Pengajuan Fitur</h4>
                            <div class="d-flex align-items-center">

                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table id="tabel_fitur" class="table table-striped table-bordered display" style="width:100%">
                                    <thead class="text-center">
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Fitur</th>
                                            <th>Tanggal Pengajuan</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $j=0;
                                        foreach ($fitur2 as $fit) {
                                            if($fit->status == "menunggu" || $fit->status == "proses"){
                                                $j++;
                                                ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $j;?></td>
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
                                                        <?php
                                                        if($fit->status == "menunggu"){
                                                            ?>
                                                            <a href="<?php echo base_url('AdminC/update_proses/').$fit->id_detail_fitur?>" style="color: white;" class="btn btn-info btn-sm"  title="proses fitur"><i class="ti-import"></i></a>
                                                            <?php
                                                        }elseif($fit->status == "proses"){
                                                            ?>
                                                            <a style="color: white;" class="btn btn-success btn-sm" data-toggle="modal" data-target="#aktif-<?php echo $fit->id_detail_fitur?>" title="Aktifkan"><i class="ti-check"></i></a>
                                                            <?php
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>


                                                <!-- start modal aktif -->
                                                <div class="modal fade" id="aktif-<?php echo $fit->id_detail_fitur?>" tabindex="-1" role="dialog" aria-labelledby="aktif">
                                                    <div class="modal-dialog" role="document">
                                                        <form action="<?php echo base_url('AdminC/post_aktif')?>" method="post">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="exampleModalLabel1">Aktifkan Fitur <?php echo $fit->nama_fitur?></h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="recipient-name" class="control-label">Status:</label>
                                                                        <select class="form-control" name="status" id="status" required>
                                                                            <option selected value="aktif">Aktif</option>
                                                                        </select>
                                                                        <input type="hidden" class="form-control"  name="id_detail_fitur" value="<?php echo $fit->id_detail_fitur?>">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="recipient-name" class="control-label">Link aplikasi:</label>
                                                                        <input type="text" class="form-control"  name="link_app" id="link_app" required>
                                                                    </div>
                                                                    <br>
                                                                    <hr>
                                                                    <div class="form-group">
                                                                        <h5> Masukkan Tagihan</h5>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="recipient-name" class="control-label">Tanggal aktif:</label>
                                                                        <input type="date" class="form-control"  name="start_date" id="start_date" required="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="recipient-name" class="control-label">Tanggal berakhir:</label>
                                                                        <input type="date" class="form-control"  name="end_date" id="end_date" required="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="recipient-name" class="control-label">Harga:</label>
                                                                        <input type="number" class="form-control"  name="harga" id="harga" value="" required="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="recipient-name" class="control-label">Status tagihan:</label>
                                                                        <select class="form-control" name="status_tagihan" id="status_tagihan">
                                                                            <option selected="" value="Paid">Paid</option>
                                                                            <option selected="" value="Pending">Pending</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <input type="submit" class="btn btn-danger" data-dismiss="modal" value="Batal">
                                                                    <input type="submit" class="btn btn-default" name="submit" value="Aktifkan">
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <!-- end modal aktif -->
                                                <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>