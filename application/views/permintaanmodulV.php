
<!--Tambahan CSS-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/style.css">
<!-- ============================================================== -->
<!-- MULAI : DATA TABEL -->
<!-- ============================================================== -->
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <form class="form p-t-20" action="<?php echo base_url('KoperasiC/input_fitur')?>" method="post" onSubmit="return validate()">
                <div class="row">
                    <input type="hidden" class="form-control form-control-lg" placeholder="Nama Koperasi" name="id" id="id"  value="<?php echo $dataDiri['id_akun']?>">
                    <div class="col-md-6">
                        <input type="checkbox" name="fitur[]" id="shopping" class="checkbox-input" value="shopping" />
                        <label for="shopping" class="checkbox-label">
                            <div class="checkbox-text">
                                <p class="checkbox-text--title">Shopping</p>
                                <p class="checkbox-text--description">Klik untuk <span class="un">Tidak</span> Memilih ini!</p>
                            </div>
                        </label>

                        <input type="checkbox" name="fitur[]" id="ppob" class="checkbox-input" value="ppob" />
                        <label for="ppob" class="checkbox-label">
                            <div class="checkbox-text">
                                <p class="checkbox-text--title">PPOB</p>
                                <p class="checkbox-text--description">Klik untuk <span class="un">Tidak</span> Memilih ini!</p>
                            </div>
                        </label>
                        <input type="checkbox" name="fitur[]" id="travel" class="checkbox-input" value="travel" />
                        <label for="travel" class="checkbox-label">
                            <div class="checkbox-text">
                                <p class="checkbox-text--title">Travel</p>
                                <p class="checkbox-text--description">Klik untuk <span class="un">Tidak</span> Memilih ini!</p>
                            </div>
                        </label>
                    </div>

                    <div class="col-md-6">
                        <input type="checkbox" name="fitur[]" id="forum" class="checkbox-input" value="forum" />
                        <label for="forum" class="checkbox-label">
                            <div class="checkbox-text">
                                <p class="checkbox-text--title">Forum</p>
                                <p class="checkbox-text--description">Klik untuk <span class="un">Tidak</span> Memilih ini!</p>
                            </div>
                        </label>

                        <input type="checkbox" name="fitur[]" id="event" class="checkbox-input" value="event" />
                        <label for="event" class="checkbox-label">
                            <div class="checkbox-text">
                                <p class="checkbox-text--title">Event</p>
                                <p class="checkbox-text--description">Klik untuk <span class="un">Tidak</span> Memilih ini!</p>
                            </div>
                        </label>

                        <input type="checkbox" name="fitur[]" id="pos" class="checkbox-input" value="pos" />
                        <label for="pos" class="checkbox-label">
                            <div class="checkbox-text">
                                <p class="checkbox-text--title">Point of Sales</p>
                                <p class="checkbox-text--description">Klik untuk <span class="un">Tidak</span> Memilih ini!</p>
                            </div>
                        </label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <input type="checkbox" name="fitur[]" id="news" class="checkbox-input" value="news" />
                        <label for="news" class="checkbox-label">
                            <div class="checkbox-text">
                                <p class="checkbox-text--title">News</p>
                                <p class="checkbox-text--description">Klik untuk <span class="un">Tidak</span> Memilih ini!</p>
                            </div>
                        </label>
                    </div>
                    <div class="col-md-3"></div>
                </div>

                <div class="row m-t-20">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <input type="submit" class="btn btn-lg btn-default btn-block" name="submit" id="simpan" value="Simpan">
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