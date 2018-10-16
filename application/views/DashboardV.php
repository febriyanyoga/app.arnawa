<!-- ============================================================== -->
<!-- MULAI : DATA TABEL -->
<!-- ============================================================== -->
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Manajemen Modul Anda</h4><br>
            <div class="table-responsive">
                <table id="multi_col_order" class="table table-striped table-bordered display" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Fitur</th>
                            <th>Status</th>
                            <th>Tanggal Aktif</th>
                            <th>Tanggal Berakhir</th>
                            <th>Akses</th>
                            <th>Tagihan</th>
                            <th>History</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                                // print_r($manajemen_fitur);
                        $i=0;
                        foreach ($manajemen_fitur as $macam_fitur) {
                            $i++;
                            ?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $macam_fitur->nama_fitur;?></td>
                                <td><?php echo $macam_fitur->status;?></td>
                                <td><?php echo $macam_fitur->start_date;?></td>
                                <td><?php echo $macam_fitur->end_date;?></td>
                                <td><?php echo $macam_fitur->link_app;?></td>
                                <td>Rp<?php echo number_format($macam_fitur->harga, 0,',','.');?>,-</td>
                                <td><?php echo $macam_fitur->id_detail_fitur;?></td>
                            </tr>
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
<!-- END : DATA TABEL -->
                    <!-- ============================================================== -->