<div class="col-md-12">
    <div class="card">
        <div class="card-body p-b-0">
            <h4 class="card-title">Tagihan</h4><br>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs customtab" role="tablist">
            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#paid" role="tab"><span class="hidden-sm-up"><i class="fas fa-donate"></i></span> <span class="hidden-xs-down">Paid</span> &nbsp; <span class="label label-success label-rounded label-sm badge">1</span></a> </li>
            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#suspend" role="tab"><span class="hidden-sm-up"><i class="fas fa-ban"></i></span> <span class="hidden-xs-down">Suspend</span>&nbsp; <span class="label label-danger label-rounded label-sm badge">1</span></a> </li>
            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#pending" role="tab"><span class="hidden-sm-up"><i class="fas fa-exclamation-triangle"></i></span> <span class="hidden-xs-down">Pending</span>&nbsp; <span class="label label-warning label-rounded label-sm badge">1</span></a> </li>
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
                                <tr>
                                    <td class="text-center">1</td>
                                    <td class="text-center">Simpan Pinjam</td>
                                    <td class="text-center">3 Bulan</td>
                                    <td class="text-center">30 Januari 2019</td>
                                    <td class="text-center"><a style="color: white;" class="btn btn-info btn-sm" data-toggle="modal" data-target="#perpanjang" title="Perpanjang"> Perpanjang</a></td>
                                </tr>
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
                                    <th class="text-center">Tanggal Berakhir</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td class="text-center">Simpan Pinjam</td>
                                    <td class="text-center">0</td>
                                    <td class="text-center">-</td>
                                    <td class="text-center"><a style="color: white;" class="btn btn-info btn-sm" data-toggle="modal" data-target="#perpanjang" title="Perpanjang"> Perpanjang</a></td>
                                </tr>
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
                                <tr>
                                    <td class="text-center">1</td>
                                    <td class="text-center">Simpan Pinjam</td>
                                    <td class="text-center">3 Bulan</td>
                                    <td class="text-center">Rp. 30.000</td>
                                    <td class="text-center">03 April 2019</td>
                                    <td class="text-center"><a style="color: white;" class="btn btn-info btn-sm" data-toggle="modal" data-target="#konfirmasi" title="Konfirmasi"> Konfirmasi Pembayaran</a></td>
                                </tr>
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
                    <label class="control-label">Tagihan</label>
                    <input type="text" class="form-control"  name="" id="" >
                </div>
                
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-danger" data-dismiss="modal" value="Simpan">
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

