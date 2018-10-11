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
    <title>Lengkapi Data UMKM - Arnawa</title>
    <!-- Custom CSS -->
    <link href="<?php echo base_url()?>assets/dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url(<?php echo base_url()?>assets/images/big/auth-bg.jpg) no-repeat center center;">
            <div class="auth-box" style="max-width: 650px;">
                <div>
                    <div class="logo">
                        <span class="db"><img src="<?php echo base_url()?>assets/images/Arnawa_Apps Logo.png" alt="logo" style="width: 50%;" /></span><br><br><br>
                        <h2 class="font-medium m-b-20" style="color: #4798e8;">Lengkapi Data UMKM Anda</h2>
                    </div>
                    <!-- Form -->
                    <div class="row">
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
                        <form class="form p-t-20" action="<?php echo base_url('KoperasiC/input_data_umkm')?>" method="post" onSubmit="return validate()">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control form-control-lg" placeholder="Nama Usaha" name="nama_koperasi" id="nama_koperasi" required>
                                            <input type="hidden" class="form-control form-control-lg" placeholder="Nama Koperasi" name="id" id="id"  value="<?php echo $dataDiri['id']?>">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="ti-home"></i></span>
                                            </div>
                                        </div>
                                        <p style="color: red; margin-top: -17px; font-size: 9pt; margin-left: 10px;">*Harus diisi</p>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control form-control-lg" placeholder="Nama Pimpinan" name="nama_pimpinan" id="nama_pimpinan" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="ti-user"></i></span>
                                            </div>
                                        </div>
                                        <p style="color: red; margin-top: -17px; font-size: 9pt; margin-left: 10px;">*Harus diisi</p>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control form-control-lg" onkeypress="return hanyaAngka(event)" required=" " placeholder="No. HP" name="no_hp" id="no_hp" value="<?php echo $data_akun->no_hp?>">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="ti-mobile"></i></span>
                                            </div>
                                        </div>
                                        <p style="color: red; margin-top: -17px; font-size: 9pt; margin-left: 10px;">*Harus diisi</p>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control form-control-lg" onkeypress="return hanyaAngka(event)" placeholder="No. Telepon UMKM" name="tlp_koperasi" id="tlp_koperasi" >
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="ti-mobile"></i></span>
                                            </div>
                                        </div>
                                        <!-- <p style="color: red; margin-top: -17px; font-size: 9pt; margin-left: 10px;">*Harus diisi</p> -->
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <textarea name="alamat_koperasi" style="height: 100px;" class="form-control form-control-lg" placeholder="Alamat UMKM" required></textarea>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="ti-location-pin"></i></span>
                                            </div>
                                        </div>
                                        <p style="color: red; margin-top: -17px; font-size: 9pt; margin-left: 10px;">*Harus diisi</p>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <select class="form-control form-control-lg" id="propinsi" name="propinsi" required>
                                                <option>-----Pilih Provinsi-----</option>
                                                <?php
                                                foreach ($provinsi as $prov) {
                                                    ?>
                                                    <option value="<?php echo $prov['id_propinsi']?>"><?php echo $prov['nama_propinsi'];?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="ti-location-pin"></i></span>
                                            </div>
                                        </div>
                                            <p style="color: red; margin-top: -17px; font-size: 9pt; margin-left: 10px;">*Harus diisi</p>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <select class="form-control form-control-lg" id="kota" name="kota" required>
                                                <option>-----Pilih Kota-----</option>
                                            </select>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="ti-location-pin"></i></span>
                                            </div>
                                        </div>
                                        <p style="color: red; margin-top: -17px; font-size: 9pt; margin-left: 10px;">*Harus diisi</p>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <select class="form-control form-control-lg" id="kecamatan" name="kecamatan" required>
                                                <option>-----Pilih Kecamatan-----</option>
                                            </select>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="ti-location-pin"></i></span>
                                            </div>
                                        </div>
                                        <p style="color: red; margin-top: -17px; font-size: 9pt; margin-left: 10px;">*Harus diisi</p>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <select class="form-control form-control-lg" id="kelurahan" name="id_kelurahan" required>
                                                <option>-----Pilih Kelurahan-----</option>
                                            </select>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="ti-location-pin"></i></span>
                                            </div>
                                        </div>
                                        <p style="color: red; margin-top: -17px; font-size: 9pt; margin-left: 10px;">*Harus diisi</p>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control form-control-lg" required=" " placeholder="Kode Pos" name="kode_pos" id="kode_pos" >
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="ti-location-pin"></i></span>
                                            </div>
                                        </div>
                                        <p style="color: red; margin-top: -17px; font-size: 9pt; margin-left: 10px;">*Harus diisi</p>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <input type="email" class="form-control form-control-lg" placeholder="Email UMKM" name="email_koperasi" id="email_koperasi">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="ti-email"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control form-control-lg" placeholder="Website UMKM" name="web_koperasi" id="web_koperasi" >
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="ti-world"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group m-r-20 m-l-20" >
                                        <p>Dengan klik daftar, kamu telah menyetujui &nbsp<a href="#">Aturan Penggunaan</a>&nbsp dan &nbsp<a href="#">Kebijakan Privasi</a>&nbsp dari koperasi</p>
                                    </div>

                                    <div class="form-group ">
                                        <button class="btn btn-block btn-lg btn-info" type="submit" name="simpan" id="simpan"  onClick="return confirm('Anda yakin data yang anda isikan sudah benar?')">Simpan</button>
                                    </div>

                                    <div class="form-group m-r-20 m-l-20 text-right">
                                        <p>--<a href="<?php echo site_url('LoginC/log_out')?>"> Logout </a></p>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">SELAMAT !</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <p>Anda Berhasil Mendaftarkan Koperasi Anda.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>



        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
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
    <script src="<?php echo base_url()?>assets/libs/bootstrap/dist/js/bootstrap.min.js "></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
        $('[data-toggle="tooltip "]').tooltip();
        $(".preloader ").fadeOut();
    </script>

    <script type="text/javascript">
       function hanyaAngka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }

    $(function () {
      $("#simpan").click(function () {
         var password = $("#password").val();
         var confirmPassword = $("#confirmpass").val();
         var pass_length = password.length;
         if (password != confirmPassword) {
            alert("Kata sandi tidak sama.");
                    // document.getElementById("demo").innerHTML = "Kata sandi tidak sama.";
                    return false;
                }else{
                	if(pass_length < 6){
                		alert("Panjang Kata sandi minimal 6 karakter");
                		return false;
                	}else{
                		if(pass_length > 50){
                			alert("Panjang Kata sandi maksimal 50 karakter");
                			return false;
                		}else{
                			return true;
                		}
                	}
                }
            });
  });
</script>


<script language="javascript">
   $(document).ready(function(){
        // City change
        $('#propinsi').change(function(){
            var propinsi = $(this).val(); //ambil value dr kode_unit
            // window.alert(unit);

            // AJAX request
            $.ajax({
                url:'<?=base_url()?>KoperasiC/get_kabupaten_kota',
                method: 'post',
                data: {id_propinsi: propinsi}, // data post ke controller 
                dataType: 'json',
                success: function(response){
                    // Remove options
                    $('#kota').find('option').not(':first').remove();

                    // Add options
                    $.each(response,function(daftar,data){
                        $('#kota').append('<option value="'+data['id_kabupaten_kota']+'">'+data['nama_kabupaten_kota']+'</option>');
                    });
                }
            });
        });

        $('#kota').change(function(){
            var kota = $(this).val(); //ambil value dr kode_unit
            // window.alert(unit);

            // AJAX request
            $.ajax({
                url:'<?=base_url()?>KoperasiC/get_kecamatan',
                method: 'post',
                data: {id_kabupaten_kota: kota}, // data post ke controller 
                dataType: 'json',
                success: function(response){
                    // Remove options
                    $('#kecamatan').find('option').not(':first').remove();

                    // Add options
                    $.each(response,function(daftar,data){
                        $('#kecamatan').append('<option value="'+data['id_kecamatan']+'">'+data['nama_kecamatan']+'</option>');
                    });
                }
            });
        });

        $('#kecamatan').change(function(){
            var kecamatan = $(this).val(); //ambil value dr kode_unit
            // window.alert(unit);

            // AJAX request
            $.ajax({
                url:'<?=base_url()?>KoperasiC/get_kelurahan',
                method: 'post',
                data: {id_kecamatan : kecamatan}, // data post ke controller 
                dataType: 'json',
                success: function(response){
                    // Remove options
                    $('#kelurahan').find('option').not(':first').remove();

                    // Add options
                    $.each(response,function(daftar,data){
                        $('#kelurahan').append('<option value="'+data['id_kelurahan']+'">'+data['nama_kelurahan']+'</option>');
                    });
                }
            });
        });
    });
</script>


</body>

</html>