<div class="col-md-12">
    <div class="card">
        <div class="card-body p-b-0">
            <h4 class="card-title">Master Data</h4><br>
            <ul class="nav nav-tabs customtab" role="tablist">
                <li class="nav-item"> 
                    <a class="nav-link active" data-toggle="tab" href="#DataAnggota" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down"> Data Anggota</span> &nbsp; 
                    </a>
                </li>
                <li class="nav-item"> 
                    <a class="nav-link" data-toggle="tab" href="#DataSimpanan" role="tab"><span class="hidden-sm-up"></span><span class="hidden-xs-down"> Data Simpanan</span>&nbsp;
                    </a> 
                </li>
                <li class="nav-item"> 
                    <a class="nav-link" data-toggle="tab" href="#DataPinjaman" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down"> Data Pinjaman Anggota</span>&nbsp; 
                    </a> 
                </li>
                <li class="nav-item"> 
                    <a class="nav-link" data-toggle="tab" href="#DataAlokasi" role="tab"><span class="hidden-sm-up"></span><span class="hidden-xs-down"> Alokasi Pembagian SHU</span>&nbsp;
                    </a> 
                </li>
                <li class="nav-item"> 
                    <a class="nav-link" data-toggle="tab" href="#DataNeraca" role="tab"><span class="hidden-sm-up"></span><span class="hidden-xs-down"> Neraca</span>&nbsp;
                    </a> 
                </li>
                <li class="nav-item"> 
                    <a class="nav-link" data-toggle="tab" href="#DataLabaRugi" role="tab"><span class="hidden-sm-up"></span><span class="hidden-xs-down"> Laba Rugi</span>&nbsp;
                    </a> 
                </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <!-- data anggota -->
                <div class="tab-pane active  p-20" id="DataAnggota" role="tabpanel">
                    <div class="">
                        <h4>Template Data Anggota</h4><br>
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
                        <a href="<?php echo base_url()?>assets/download/template-data-anggota.csv" target="_blank" class="btn btn-info" target="blank"><i class="ti ti-download"></i> Unduh Template</a>
                        <a style="color: white;" class="btn btn-success" data-toggle="modal" data-target="#dataanggota"><i class="ti ti-plus"></i>&nbsp; Unggah Data Anggota</a>
                    </div><br><br>
                    
                    <div class="table-responsive">
                        <table id="tabel_anggota" class="table table-striped table-bordered display" >
                            <thead>
                                <?php
                                foreach ($manajemen_fitur as $key) {
                                    if ($key->id_fitur == 1) {
                                        $simpin = $key->id_detail_fitur;
                                    }
                                }
                                $data_lampiran = $LoginM->get_lampiran($simpin, 'data_anggota')->result();
                                ?>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Nama File</th>
                                    <th>Ukuran File</th>
                                    <th>Tanggal Upload</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $o=0;
                                foreach ($data_lampiran as $lamp) {
                                    $o++;
                                    ?>
                                    <tr>
                                        <td class="text-center"><?php echo $o;?></td>
                                        <td class="text-center"><?php echo $lamp->nama_file;?></td>
                                        <td class="text-center"><?php echo $lamp->ukuran_file;?></td>
                                        <td class="text-center"><?php echo date('d/m/Y', strtotime($lamp->created_at))?></td>
                                        <td class="text-center"><?php echo $lamp->catatan;?></td>
                                        <td class="text-center"></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                    
                </div>

                <!-- data simpanan -->
                <div class="tab-pane p-20" id="DataSimpanan" role="tabpanel">
                    <div class="">
                        <h4>Template Data Simpanan</h4><br>
                        <a href="<?php echo base_url()?>assets/download/template-simpanan.xlsx" class="btn btn-info" target="blank"><i class="ti ti-download"></i> Unduh Template</a>
                        <a style="color: white;" class="btn btn-success" data-toggle="modal" data-target="#datasimpanan"><i class="ti ti-plus"></i>&nbsp; Tambah Data Simpanan</a>
                    </div> <br><br>
                    
                    <div class="table-responsive">
                        <table id="tabel_simpanan" class="table table-striped table-bordered display" >
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Nama File</th>
                                    <th>Ukuran File</th>
                                    <th>Tanggal Upload</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>

                <!-- data pinjaman -->
                <div class="tab-pane p-20" id="DataPinjaman" role="tabpanel">
                    <div class="">
                        <h4>Template Data Pinjaman Anggota</h4><br>
                        <a href="<?php echo base_url()?>assets/download/template-pinjaman.xlsx" class="btn btn-info" target="blank"><i class="ti ti-download"></i> Unduh Template</a>
                        <a style="color: white;" class="btn btn-success" data-toggle="modal" data-target="#datapinjaman"><i class="ti ti-plus"></i>&nbsp; Tambah Data Pinjaman</a>
                    </div><br><br>
                    
                    <div class="table-responsive">
                        <table id="tabel_pinjaman" class="table table-striped table-bordered display" >
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Nama File</th>
                                    <th>Ukuran File</th>
                                    <th>Tanggal Upload</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- data alokasi -->
                <div class="tab-pane p-20" id="DataAlokasi" role="tabpanel">
                    <div class="">
                        <h4>Template Alokasi Pembagian SHU</h4><br>
                        <a href="" class="btn btn-info" target="blank"><i class="ti ti-download"></i> Unduh Template</a>
                        <a style="color: white;" class="btn btn-success" data-toggle="modal" data-target="#datashu"><i class="ti ti-plus"></i>&nbsp; Tambah Data Alokasi Pembagian SHU</a>
                    </div><br><br>
                    
                    <div class="table-responsive">
                        <table id="tabel_shu" class="table table-striped table-bordered display" >
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Nama File</th>
                                    <th>Ukuran File</th>
                                    <th>Tanggal Upload</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- data neraca -->
                <div class="tab-pane p-20" id="DataNeraca" role="tabpanel">
                    <div class="">
                        <h4>Template Neraca</h4><br>
                        <a href="" class="btn btn-info" target="blank"><i class="ti ti-download"></i> Unduh Template</a>
                        <a style="color: white;" class="btn btn-success" data-toggle="modal" data-target="#dataneraca"><i class="ti ti-plus"></i>&nbsp; Tambah Data Neraca</a>
                    </div><br><br>
                    
                    <div class="table-responsive">
                        <table id="tabel_neraca" class="table table-striped table-bordered display" >
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Nama File</th>
                                    <th>Ukuran File</th>
                                    <th>Tanggal Upload</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- data laba rugi -->
                <div class="tab-pane p-20" id="DataLabaRugi" role="tabpanel">
                    <div class="">
                        <h4>Template Laba Rugi</h4><br>
                        <a href="" class="btn btn-info" target="blank"><i class="ti ti-download"></i> Unduh Template</a>
                        <a style="color: white;" class="btn btn-success" data-toggle="modal" data-target="#datalabarugi"><i class="ti ti-plus"></i>&nbsp; Tambah Data Laba Rugi</a>
                    </div><br><br>
                    
                    <div class="table-responsive">
                        <table id="tabel_labarugi" class="table table-striped table-bordered display" >
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Nama File</th>
                                    <th>Ukuran File</th>
                                    <th>Tanggal Upload</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- start modal data anggota -->
    <div class="modal fade" id="dataanggota" tabindex="-1" role="dialog" aria-labelledby="lihat">
        <div class="modal-dialog modal-lg" role="document">
            <form action="<?php echo base_url('KoperasiC/unggah_data')?>" enctype="multipart/form-data" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Tambah Data Anggota</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="card">
                                <div class="card-body">
                                    <div class="p-20">
                                        <label class="control-label">Upload Data Anggota</label><br>
                                        <input type="file" class="form-control"  name="file_transfer" id="file_transfer" required> <br>
                                        <input type="hidden" class="form-control"  name="id_detail_fitur" id="id_detail_fitur" required value="<?php echo $simpin?>"> <br>
                                        <input type="hidden" class="form-control"  name="jenis_file" id="jenis_file" required value="data_anggota"> <br>
                                        <label class="control-label">Catatan</label>
                                        <textarea class="form-control"  name="catatan" id="catatan" ></textarea><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-info" name="submit" value="Simpan">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- end modal data anggota -->



    <!-- start modal data simpanan -->
    <div class="modal fade" id="datasimpanan" tabindex="-1" role="dialog" aria-labelledby="lihat">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel1">Tambah Data Simpanan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-body">
                                <form>
                                    <div class="p-20">
                                        <label class="control-label">Upload Data Simpanan</label><br>
                                        <input type="file" class="form-control"  name="" id="" > <br>
                                        <label class="control-label">Catatan</label>
                                        <textarea class="form-control"  name="" id="" ></textarea><br>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-danger" data-dismiss="modal" value="Simpan">
                </div>
            </div>
        </div>
    </div>
    <!-- end modal data simpanan -->

    <!-- start modal data pinjaman -->
    <div class="modal fade" id="datapinjaman" tabindex="-1" role="dialog" aria-labelledby="lihat">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel1">Tambah Data Pinjaman</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-body">
                                <form>
                                    <div class="p-20">
                                        <label class="control-label">Upload Data Pinjaman</label><br>
                                        <input type="file" class="form-control"  name="" id="" > <br>
                                        <label class="control-label">Catatan</label>
                                        <textarea class="form-control"  name="" id="" ></textarea><br>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-danger" data-dismiss="modal" value="Simpan">
                </div>
            </div>
        </div>
    </div>
    <!-- end modal data pinjaman -->

    <!-- start modal data SHU -->
    <div class="modal fade" id="datashu" tabindex="-1" role="dialog" aria-labelledby="lihat">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel1">Tambah Data Alokasi Pembagian SHU</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-body">
                                <form>
                                    <div class="p-20">
                                        <label class="control-label">Upload Data Alokasi Pembagian SHU</label><br>
                                        <input type="file" class="form-control"  name="" id="" > <br>
                                        <label class="control-label">Catatan</label>
                                        <textarea class="form-control"  name="" id="" ></textarea><br>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-danger" data-dismiss="modal" value="Simpan">
                </div>
            </div>
        </div>
    </div>
    <!-- end modal data SHU -->

    <!-- start modal data Neraca -->
    <div class="modal fade" id="dataneraca" tabindex="-1" role="dialog" aria-labelledby="lihat">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel1">Tambah Data Neraca</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-body">
                                <form>
                                    <div class="p-20">
                                        <label class="control-label">Upload Data Neraca</label><br>
                                        <input type="file" class="form-control"  name="" id="" > <br>
                                        <label class="control-label">Catatan</label>
                                        <textarea class="form-control"  name="" id="" ></textarea><br>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-danger" data-dismiss="modal" value="Simpan">
                </div>
            </div>
        </div>
    </div>
    <!-- end modal data Neraca -->

    <!-- start modal data labarugi -->
    <div class="modal fade" id="datalabarugi" tabindex="-1" role="dialog" aria-labelledby="lihat">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel1">Tambah Data Laba Rugi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-body">
                                <form>
                                    <div class="p-20">
                                        <label class="control-label">Upload Data Laba Rugi</label><br>
                                        <input type="file" class="form-control"  name="" id="" > <br>
                                        <label class="control-label">Catatan</label>
                                        <textarea class="form-control"  name="" id="" ></textarea><br>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-danger" data-dismiss="modal" value="Simpan">
                </div>
            </div>
        </div>
    </div>
    <!-- end modal data labarugi -->
