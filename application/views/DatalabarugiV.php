<div class="col-md-12">
    <div class="card">
        <div class="card-body p-b-0">
            <h4 class="card-title">Master Data</h4><br>
            <ul class="nav nav-tabs customtab" role="tablist">
                <li class="nav-item"> 
                    <a class="nav-link " data-toggle="link" href="<?php echo base_url()?>CobaC/Dataanggota" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down"> Data Anggota</span> &nbsp; 
                    </a>
                </li>
                <li class="nav-item"> 
                    <a class="nav-link" data-toggle="link" href="<?php echo base_url()?>CobaC/Datasimpanan" role="tab"><span class="hidden-sm-up"></span><span class="hidden-xs-down"> Data Simpanan</span>&nbsp;
                    </a> 
                </li>
                <li class="nav-item"> 
                    <a class="nav-link " data-toggle="link" href="<?php echo base_url()?>CobaC/Datapinjaman" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down"> Data Pinjaman Anggota</span>&nbsp; 
                    </a> 
                </li>
                <li class="nav-item"> 
                    <a class="nav-link " data-toggle="link" href="<?php echo base_url()?>CobaC/Dataalokasi" role="tab"><span class="hidden-sm-up"></span><span class="hidden-xs-down"> Alokasi Pembagian SHU</span>&nbsp;
                    </a> 
                </li>
                <li class="nav-item"> 
                    <a class="nav-link " data-toggle="link" href="<?php echo base_url()?>CobaC/Dataneraca" role="tab"><span class="hidden-sm-up"></span><span class="hidden-xs-down"> Neraca</span>&nbsp;
                    </a> 
                </li>
                <li class="nav-item"> 
                    <a class="nav-link active" data-toggle="link" href="<?php echo base_url()?>CobaC/Datalabarugi" role="tab"><span class="hidden-sm-up"></span><span class="hidden-xs-down"> Laba Rugi</span>&nbsp;
                    </a> 
                </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active  p-20" id="Dataanggota" role="tabpanel">
                    <div class="">
                        <h4>Template Laba Rugi</h4><br>
                        <button type="button" class="btn btn-info">Download</button>
                    </div><br><br>

                    <div class="card">
                        <div class="card-body">
                            <form>
                                <div class="p-20">
                                    <label class="control-label">Upload Laba Rugi</label><br>
                                    <input type="file" class="form-control"  name="" id="" > <br>
                                    <label class="control-label">Catatan</label>
                                    <textarea class="form-control"  name="" id="" ></textarea><br>
                                    
                                    <button type="button" class="btn btn-info">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


