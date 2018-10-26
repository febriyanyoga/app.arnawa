
<!--Tambahan CSS-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/style.css">
<!-- ============================================================== -->
<!-- MULAI : DATA TABEL -->
<!-- ============================================================== -->
<div class="col-12">
    <div class="card">
        <div class="card-body">
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
            <form class="form p-t-20" action="<?php echo base_url('KoperasiC/input_fitur/').'oke'?>" method="post" onSubmit="return validate()">
                <div class="row">
                    <input type="hidden" class="form-control form-control-lg" placeholder="Nama Koperasi" name="id_akun" id="id_akun"  value="<?php echo $dataDiri['id_akun']?>">
                    <?php
                    $data_fitur_akun = $macam_fitur_akun->result();
                    $data_array_fitur_akun = array();
                    foreach ($data_fitur_akun as $fit_ak) {
                        array_push($data_array_fitur_akun, $fit_ak->id_fitur);
                    }
                    $data_fitur = $data_array_fitur_akun;

                    $jumlah    = $macam_fitur->num_rows();
                    $kiri      = ceil($jumlah/2);
                    $kanan     = floor($jumlah/2);

                    ?>
                    <div class="col-md-6">
                        <?php
                        $macam_fitur_ = $macam_fitur->result();
                        $i=0;
                        foreach ($macam_fitur_ as $key) {
                            $i++;
                            if(!in_array($key->id_fitur, $data_fitur)){
                                if($i <= $kiri){
                                    if($key->nama_fitur == "Simpan Pinjam" && $jenis_usaha == "UMKM"){
                                        echo "";
                                    }else{

                                        ?>
                                        <input type="checkbox" name="fitur[]" id="<?php echo $key->id_fitur;?>" class="checkbox-input" value="<?php echo $key->id_fitur?>" />
                                        <label for="<?php echo $key->id_fitur;?>" class="checkbox-label">
                                            <div class="checkbox-text">
                                                <p class="checkbox-text--title"><?php echo $key->nama_fitur;?></p>
                                                <p class="checkbox-text--description">Klik untuk <span class="un">Tidak</span> Memilih ini!</p>
                                            </div>
                                        </label>
                                        <?php
                                    }
                                }
                            }
                        }
                        ?>
                    </div>
                    <div class="col-md-6">
                        <?php
                        $macam_fitur_ = $macam_fitur->result();
                        $i=0;
                        foreach ($macam_fitur_ as $key) {
                            $i++;
                            if(!in_array($key->id_fitur, $data_fitur)){
                                if($i > $kanan){
                                    ?>
                                    <input type="checkbox" name="fitur[]" id="<?php echo $key->id_fitur;?>" class="checkbox-input" value="<?php echo $key->id_fitur?>" />
                                    <label for="<?php echo $key->id_fitur;?>" class="checkbox-label">
                                        <div class="checkbox-text">
                                            <p class="checkbox-text--title"><?php echo $key->nama_fitur;?></p>
                                            <p class="checkbox-text--description">Klik untuk <span class="un">Tidak</span> Memilih ini!</p>
                                        </div>
                                    </label>
                                    <?php
                                }
                            }
                        }
                        ?>
                    </div>
                </div>

                <div class="row m-t-20">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <?php
                        if($this->session->userdata('jenis_usaha') == "Koperasi"){
                            if($macam_fitur->num_rows()==$macam_fitur_akun->num_rows()){
                                echo "Semua Fitur Sudah diajukan/dimiliki";
                            }else{
                                ?>
                                <input type="submit" class="btn btn-lg btn-default btn-block" name="submit" id="simpan" value="Simpan">
                                <?php
                            }
                        }else{
                            if(($macam_fitur->num_rows())-1 == $macam_fitur_akun->num_rows()){
                                echo "<h2>Semua Fitur Sudah diajukan/dimiliki</h2>";
                            }else{
                                ?>
                                <input type="submit" class="btn btn-lg btn-default btn-block" name="submit" id="simpan" value="Simpan">
                                <?php
                            }
                        }
                        ?>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- END : DATA TABEL -->
<!-- ============================================================== -->

<script src="<?php echo base_url()?>assets/dist/js/app.init.js"></script>
<script src="<?php echo base_url()?>assets/dist/js/app-style-switcher.js"></script>