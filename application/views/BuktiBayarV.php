<!DOCTYPE html>
<!--
  Invoice template by invoicebus.com
  To customize this template consider following this guide https://invoicebus.com/how-to-create-invoice-template/
  This template is under Invoicebus Template License, see https://invoicebus.com/templates/license/
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo $title;?></title>

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
  <link rel="icon" type="image/png" sizes="192x192" href="/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url()?>assets/images/icon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url()?>assets/images/icon/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url()?>assets/images/icon/favicon-16x16.png">
  <link rel="manifest" href="<?php echo base_url()?>assets/images/icon/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">

  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/template.css">
  <link href="<?php echo base_url();?>assets/dist/css/style.min.css" rel="stylesheet">
</head>
<body>
  <?php
// print_r($data_tagihan);
  ?>
  <div id="container">
    <section id="memo">
      <div class="company-name">
        <img src="<?php echo base_url()?>assets/images/Arnawa_Apps Logo.png" style="width: 20%">
        <div style="padding: 0px 1090px; margin-bottom: -10px; margin-top: -50px;">
          <span class="bold" style="color: #000000d1; font-size: 24pt;">#INVOICE</span><br><br>
          <div style="position: absolute;">
            <button class="btn btn-sm btn-white" onClick='window.print();' style="font-size: 12pt; color: black;"><img style="max-height: 20px;" src="<?php echo base_url()?>assets/images/printer.png"> Cetak</button>
          </div>
          <br><br>
        </div>
      </div>

      <div class="company-info" style="padding: 0px 1060px;">
      </div>

    </section>

    <section id="invoice-info">
      <div>
        <span>Diterbitkan untuk &nbsp;:</span><br>
        <table id="atas" style="font-size: 13pt;">
          <tr>
            <th><span class="bold" style="color: #000000d1; ">Nomor Invoice</span></th>
            <th style="text-align: right; padding-left: 20px;">:</th>
            <?php
            $created = date('dmY', strtotime($data_tagihan->created_atTag));
            ?>
            <th style="text-align: left; padding-left: 20px;"><?php echo 'INV/'.$created.'/'.$data_tagihan->id_tagihan;?></th>
          </tr>
          <tr>
            <th><span class="bold" style="color: #000000d1; ">Nama <?php echo $data_tagihan->jenis_usaha;?></span></th>
            <th style="text-align: right; padding-left: 20px;">:</th>
            <th style="text-align: left; padding-left: 20px;"><?php echo $data_tagihan->nama_usaha?></th>
          </tr>
          <tr>
            <th><span class="bold" style="color: #000000d1; ">Tanggal Terbit</span></th>
            <th style="text-align: right; padding-left: 20px;">:</th>
            <th style="text-align: left; padding-left: 20px;"><?php echo date('d/m/Y', strtotime($data_tagihan->created_atTag))?></th>
          </tr>
          <tr>
            <th><span class="bold" style="color: #000000d1; ">Jatuh Tempo</span></th>
            <th style="text-align: right; padding-left: 20px;">:</th>
            <?php
            $t = date('Y-m-d', strtotime($data_tagihan->start_date));
            $jatuh_tempo = date('Y-m-d', strtotime('+7 days', strtotime($t))); //operasi 
            ?>
            <th style="text-align: left; padding-left: 20px;"><?php echo date('d/m/Y', strtotime($jatuh_tempo));?></th>
          </tr>
        </table>
        <table>
          <?php 
          if($data_tagihan->jml_transfer == 0){
            echo "";
          }else{
           ?>   
           <tr>
            <th> <span class="bold" style="color: #000000d1; margin-left: 800px;">Metode Pembayaran</span></th>
            <th style="text-align: right; padding-left: 10px;">:</th>
            <th><img style="max-height: 18px; margin-left: 10px; margin-right: -15px;" src="<?php echo base_url()?>assets/images/icon_bank/<?php echo $data_tagihan->nama_bank_pengirim?>.png"></th>
            <th style="text-align: left; padding-left: 20px;">Transfer <?php echo $data_tagihan->nama_bank_pengirim?></th>
          </tr>
          <?php
        }
        ?>
      </table>  
    </div>

  </section>

  <div class="clearfix"></div>

  <section id="invoice-title-number">

    <span id="title">INVOICE</span>
    <span id="number">#<?php echo 'INV/'.$created.'/'.$data_tagihan->id_tagihan;?></span>

  </section>

  <div class="clearfix"></div>
  <hr style="border-top: 45px solid; margin-bottom: -65px; color: #e6e7e7;">

  <section id="items">

    <table cellpadding="0" cellspacing="0" >

      <tr style="font-size: 14pt;" >
        <th style="text-align: center;">No.</th> <!-- Dummy cell for the row number and row commands -->
        <th style="text-align: center;">Fitur</th>
        <th style="text-align: center;">Masa Aktif</th>
        <th style="text-align: center;">Tagihan</th>
        <th style="text-align: center;">Total</th>
      </tr>

      <tr data-iterate="item" style="font-size: 14pt;">
        <td style="text-align: center;">1</td> <!-- Don't remove this column as it's needed for the row commands -->
        <td><?php echo $data_tagihan->nama_fitur;?></td>
        <?php
        $start_date    = new DateTime($data_tagihan->start_date);
        $end_date      = new DateTime($data_tagihan->end_date);
        $masa_aktif    = $start_date->diff($end_date);
        ?>
        <td style="text-align: center;">
          <?php  
          if($masa_aktif->y != 0){
            echo $masa_aktif->y." Tahun ";
          }
          if ($masa_aktif->m != 0) {
            echo $masa_aktif->m." Bulan ";
          }
          if ($masa_aktif->d != 0) {
            echo $masa_aktif->d." Hari";
          }
          ?>
        </td>
        <td><?php echo "Rp".number_format($data_tagihan->harga, 0,',','.').",-";?></td>
        <td><?php echo "Rp".number_format($data_tagihan->harga, 0,',','.').",-";?></td>
      </tr>

    </table>

  </section>
  <hr style="border-top: 5px solid; margin-top: -30px; margin-bottom: 0px; color: #1175bbbf;">
  <hr style="border-top: 224px solid;border-color:#fff;width: 355px;margin-right: 0px;margin-bottom: -215px; margin-top: 0px;align-content: left;" class="text-right">

  <section id="sums">

    <table cellpadding="0" cellspacing="0" style="" >
      <tr style="font-size: 18pt;">
        <th >Sub-Total </th>
        <td style="text-align: left; width: 2px;">:</td>
        <td><?php echo "Rp".number_format($data_tagihan->harga, 0,',','.').",-";?></td>

      </tr>

      <tr data-iterate="tax" style="font-size: 16pt;">
        <th>Pajak </th>
        <td style="text-align: left; width: 2px;">:</td>
        <td>0%</td>
      </tr>

      <tr class="amount-total" style="font-size: 18pt;">
        <th>TOTAL </th>
        <td style="text-align: left; width: 2px;">:</td>
        <td><?php echo "Rp".number_format($data_tagihan->harga, 0,',','.').",-";?></td>
      </tr>

          <!-- You can use attribute data-hide-on-quote="true" to hide specific information on quotes.
           For example Invoicebus doesn't need amount paid and amount due on quotes  -->
           <tr data-hide-on-quote="true" style="font-size: 16pt;">
            <th>Dibayar </th>
            <td style="text-align: left; width: 2px;">:</td>
            <td><?php echo "Rp".number_format($data_tagihan->harga, 0,',','.').",-";?></td>
          </tr>
          
          <tr data-hide-on-quote="true" style="font-size: 18pt;">
            <th>Sisa Tagihan </th>
            <td style="text-align: left; width: 2px;">:</td>
            <td><?php echo "Rp".number_format(0, 0,',','.').",-";?></td>
          </tr>

          
        </table>
        <img style="max-width: 265px; margin-top: -282px; margin-left: 145px;"  src="<?php echo base_url()?>assets/images/lunas.png">
        
      </section>
      
      <div class="clearfix"></div>
      
      <section id="terms">

        <span>PT. Arnawa Teknologi Informasi</span>
        <div style="font-size: 13pt;">Graha KAS. Lt. 3, Suite 1. <br>
          Kompleks Perkantoran Kebayoran Baru Mall No. 88.<br>
          Jl. Raya Kebayoran Baru.<br>
          Jakarta Selatan 12120.<br>
          DKI Jakarta, Indonesia.<br> <br>
          Email&nbsp;:&nbsp;info@arnintech.co.id<br>
          Website&nbsp;:&nbsp;www.arnintech.co.id<br>
          Telp.&nbsp;:&nbsp;+62 21 2751 4023/22
        </div>

      </section>

    </div>
    <div class="footer" style="margin-top: -70px; text-align: center;">
      <h4>~ Terima Kasih ~</h4>
    </div>

    <script>
      window.print();
    </script>

  </body>
  </html>
