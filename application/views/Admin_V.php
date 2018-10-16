<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="main-wrapper">

    <!-- ============================================================== -->
    <!-- MULAI : DATA TABEL -->
    <!-- ============================================================== -->
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Pengajuan Fitur</h4><br>
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
                    ?>
                    <?php echo validation_errors(); ?>
                </div>

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table id="multi_col_order" class="table table-striped table-bordered">
                                    <thead>
                                        <tr style="text-align:center;">
                                            <th>No.</th>
                                            <th>Nama Usaha</th>
                                            <th>Jenis Usaha</th>
                                            <th>Alamat</th>
                                            <th>Nama</th>
                                            <th>Email dan Password</th>
                                            <th>Telepon</th>
                                            <th>Fitur</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            // print_r($data_akun);
                                            $i=0;
                                            foreach ($data_akun as $data) {
                                            // $row = $LoginM->get_fitur_by_akun($data->id_akun)->num_rows();
                                            // echo $row;
                                            $i++;
                                        ?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $data->nama_usaha?></td>
                                                <td><?php echo $data->jenis_usaha?></td>
                                                <td><?php echo $data->alamat_usaha?></td>
                                                <td>1</td>
                                                <td>1</td>
                                                <td>1</td>
                                                <td class="text-center">
                                                    <button class="btn  btn-info btn-outline btn-rounded" data-toggle="modal" data-target="#fitur" style="padding: 5px 15px; border-radius: 20px;">Detail</button>
                                                </td>
                                            </tr>

                                        <?php  
                                            $history = $LoginM->get_history_status($data->id_akun)->result();
                                            // echo $data->id_akun;
                                        ?>
                                            <div class="modal" id="myModal2-<?php echo $data->id_akun?>">
                                                <div class="modal-dialog modal-md">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Detail Status</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <div class="modal-body">
                                                            <div class="row text-center">
                                                                <hr>
                                                                <!--<div class="col-md-12">-->
                                                                <div class="col-md-4">Tanggal Perubahan</div>
                                                                <div class="col-md-4">Satus lama</div>
                                                                <div class="col-md-4">Status baru</div>
                                                                <!--</div>-->
                                                            </div>
                                                            <?php 
                                                                foreach ($history as $h){
                                                            ?>
                                                            <div class="row text-center">
                                                                <hr size="30">
                                                                <!--<div class="col-md-12">-->
                                                                <div class="col-md-4">
                                                                    <?php echo $h->tanggal_berubah?>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <?php echo $h->status_lama;?>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <?php echo $h->status_baru?>
                                                                </div>
                                                                <!--</div>-->
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
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ============================================================== -->
                <!-- MULAI MODAL -->
                <!-- ============================================================== -->

                <div class="modal" id="fitur">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Detail Fitur</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <form action="#">
                                    <div class="form-body">

                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="table-wrap">
                                                    <div class="table-responsive">
                                                        <table id="" class="table table-hover display  pb-30">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center">Fitur</th>
                                                                    <th class="text-center">Status</th>
                                                                    <th class="text-center">Update Terakhir</th>
                                                                    <th class="text-center">Aksi </th>
                                                                </tr>
                                                            </thead>
                                                            <tfoot>
                                                                <tr>

                                                                </tr>
                                                            </tfoot>
                                                            <tbody>
                                                                <tr>
                                                                    <td></td>
                                                                    <td class="text-center">
                                                                        <button class="btn  btn-info btn-outline btn-rounded" data-toggle="modal" data-target="#status" style="padding: 0px 10px; border-radius: 20px;">Detail</button>
                                                                    </td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Row -->


                                        <div class="panel-wrapper collapse in">
                                            <div class="panel-body">
                                                <div class="panel-group accordion-struct" id="accordion_2" role="tablist" aria-multiselectable="true">
                                                    <div class="panel panel-default">
                                                        <hr class="light-grey-hr" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="modal" id="status">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Detail Status</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="row text-center">
                                    <hr>
                                    <!--<div class="col-md-12">-->
                                    <div class="col-md-4">Tanggal Perubahan</div>
                                    <div class="col-md-4">Satus lama</div>
                                    <div class="col-md-4">Status baru</div>
                                    <!--</div>-->
                                </div>

                                <div class="row text-center">

                                    <hr size="30">
                                    <!--<div class="col-md-12">-->
                                    <div class="col-md-4">
                                    </div>
                                    <div class="col-md-4">
                                    </div>
                                    <div class="col-md-4">
                                    </div>
                                    <!--</div>-->
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ============================================================== -->
                <!-- END MODAL -->
                <!-- ============================================================== -->

            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- END : DATA TABEL -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Container fluid -->
<!-- ============================================================== -->