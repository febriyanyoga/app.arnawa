<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url()?>assets/images/icon/-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url()?>assets/images/icon/-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url()?>assets/images/icon/-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url()?>assets/images/icon/-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url()?>assets/images/icon/-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url()?>assets/images/icon/-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url()?>assets/images/icon/-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url()?>assets/images/icon/-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url()?>assets/images/icon/-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url()?>assets/images/icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url()?>assets/images/icon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url()?>assets/images/icon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo base_url()?>assets/images/icon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <title>Admin - Arnawasys</title>
    <!-- Custom CSS -->
    <!-- Custom CSS -->
    <link href="<?php echo base_url()?>assets/libs/raty-js/lib/jquery.raty.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url()?>assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/libs/morris.js/morris.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url()?>assets/dist/css/style.min.css" rel="stylesheet">
    <!-- This Page CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/libs/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css">


    <!-- This page plugin CSS -->
    <link href="<?php echo base_url()?>assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom CSS -->

</head>

<body>
    <br>
    <br>
    <div class="col-md-12 mt-30">
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
    <?php echo validation_errors(); ?>
    </div>
   


    <div class="col-md-12">
        <div class="row">
            <center>
                <div class="logo m-t-20 col-md-12">
                    <span class="db"><img src="<?php echo base_url()?>assets/images/Arnawa_Apps Logo.png" alt="logo" style="width: 20%;" /></span><br><br>
                    <h2 class="font-medium m-b-10" style="color: #4798e8;">Data Pengajuan Fitur</h2>
                </div>
            </center>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="mytable" class="table table-striped table-bordered">
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
                                <th>Status</th>
                                <th>Update Terakhir</th>
                                <th style="width:25px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // print_r($data_akun);
                            $i=0;
                            foreach ($data_akun as $data) {
                                $i++;
                                ?>
                                <tr>
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $data->nama_usaha?></td>
                                    <td><?php echo $data->jenis_usaha?></td>
                                    <td><?php echo $data->alamat_usaha."<br>".$data->nama_kelurahan.", <br>".$data->nama_kecamatan.", <br>".$data->nama_kabupaten_kota.", <br>".$data->nama_propinsi;?></td>
                                    <?php 
                                    if($data->jenis_usaha == "koperasi"){
                                        ?>
                                        <td><?php echo "Nama Akun :&nbsp;<b>".$data->nama_akun."</b><br>"."Nama Koperasi :&nbsp;<b>".$data->nama_usaha."</b>";?></td>
                                        <?php
                                    }else{
                                        ?>
                                        <td><?php echo "Nama Akun :&nbsp;<b>".$data->nama_akun."</b><br>"."Nama Usaha :&nbsp;<b>".$data->nama_usaha."</b>";?></td>
                                        <?php
                                    }
                                    ?>
                                    <td><?php echo "Email Akun :&nbsp;<b>".$data->email_akun."</b><br>"."Email Usaha  :&nbsp;<b>".$data->email_usaha."</b><br>Password : &nbsp<b>".$data->password."</b>";?></td>
                                    <td><?php echo "No. HP Akun :&nbsp;<b>".$data->no_hp."</b><br>"."Telepon Usaha  :&nbsp;<b>".$data->tlp_usaha."</b>";?></td>
                                    <td>
                                        <?php 
                                        echo "fitur";

                                        ?>
                                    </td>
                                   <!--  <td>
                                    <?php
                                        if($data->status == "waiting"){
                                            ?>
                                            <a href="" class="label label-warning" title="klik untuk melihat detail" data-toggle="modal" data-target="#myModal2-<?php echo $data->id?>">
                                                 <?php echo $data->status;?>
                                            </a>
                                            <?php
                                        }else{
                                             ?>
                                            <a href="" class="label label-info" title="klik untuk melihat detail" data-toggle="modal" data-target="#myModal2-<?php echo $data->id?>">
                                               <?php echo $data->status;?>
                                            </a>
                                            <?php
                                        }
                                    ?>
                                    </td> -->
                                    <td><?php echo $data->updated_at?></td>
                                   <!--  <td>
                                        <?php 
                                            if($data->status == "waiting"){
                                                ?>
                                                    <a href="<?php echo base_url('KoperasiC/update_verified/').$data->id?>" title="Verified" class="btn btn-info btn-sm"><span class="ti-check"></span></a>
                                    
                                                <?php
                                            }else{
                                                ?>
                                                    <a href="<?php echo base_url('KoperasiC/update_waiting/').$data->id?>" title="waiting" class="btn btn-light btn-sm"><span class="ti-reload" ></span></a>
                                    
                                                <?php
                                            }
                                        ?>
                                    </td> -->
                                </tr>
                                
                                <?php  
                                // $history = $LoginM->get_history_status($data->id_detail_fitur)->result();
                                    ?>
                                        <div class="modal" id="myModal2-<?php echo $data->id?>">
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
                                                                            <div class="col-md-4"><?php echo $h->tanggal_berubah?></div>
                                                                            <div class="col-md-4"><?php echo $h->status_lama;?></div>
                                                                            <div class="col-md-4"><?php echo $h->status_baru?></div>
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
                                ?>
                               
                                
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <center>
                <div class="logo m-t-20 col-md-12">
                    <h5 class="font-medium m-b-10" style="color: #4798e8;">--<a href="<?php echo base_url('LoginC/log_out')?>">Logout</a>--</h5>
                </div>
            </center>
        </div>
    </div>
   

    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url()?>assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url()?>assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?php echo base_url()?>assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="<?php echo base_url()?>assets/dist/js/app.min.js"></script>
    <script src="<?php echo base_url()?>assets/dist/js/app.init.horizontal-fullwidth.js"></script>
    <script src="<?php echo base_url()?>assets/dist/js/app-style-switcher.horizontal.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url()?>assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url()?>assets/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url()?>assets/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url()?>assets/dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="<?php echo base_url()?>assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="<?php echo base_url()?>assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <!--c3 charts -->
    <script src="<?php echo base_url()?>assets/extra-libs/c3/d3.min.js"></script>
    <script src="<?php echo base_url()?>assets/extra-libs/c3/c3.min.js"></script>
    <!--chartjs -->
    <script src="<?php echo base_url()?>assets/libs/raphael/raphael.min.js"></script>
    <script src="<?php echo base_url()?>assets/libs/morris.js/morris.min.js"></script>

    <script src="<?php echo base_url()?>assets/libs/raty-js/lib/jquery.raty.js"></script>

    <script src="<?php echo base_url()?>assets/dist/js/pages/dashboards/dashboard1.js"></script>
    <!-- This Page JS -->
    <script src="<?php echo base_url()?>assets/libs/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
    <script src="<?php echo base_url()?>assets/libs/nestable/jquery.nestable.js"></script>
    <script src="<?php echo base_url()?>assets/extra-libs/DataTables/datatables.min.js"></script>

    <script src="<?php echo base_url()?>assets/dist/js/pages/datatable/datatable-basic.init.js"></script>
    <script src="<?php echo base_url()?>assets/libs/ckeditor/ckeditor.js"></script>
    <script src="<?php echo base_url()?>assets/libs/ckeditor/samples/js/sample.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#mytable').DataTable();
        });
    </script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
</body>

</html>