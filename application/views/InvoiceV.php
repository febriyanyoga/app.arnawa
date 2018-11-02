<!DOCTYPE html>
<!--
  Invoice template by invoicebus.com
  To customize this template consider following this guide https://invoicebus.com/how-to-create-invoice-template/
  This template is under Invoicebus Template License, see https://invoicebus.com/templates/license/
-->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Io (third)</title>
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="description" content="Invoicebus Invoice Template">
    <meta name="author" content="Invoicebus">

    <meta name="template-hash" content="f3142bbb0a1696d5caa932ecab0fc530">

    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/template.css">
    <link href="<?php echo base_url();?>assets/dist/css/style.min.css" rel="stylesheet">
  </head>
  <body>
    <div id="container">
      <section id="memo">
        <div class="company-name">
          <img src="<?php echo base_url()?>assets/images/Arnawa_Apps Logo.png" style="width: 20%">
          <div class="right-arrow"></div>
        </div>
        
        <div class="company-info">
          <div>
            <span class="bold" style="color: #000000d1; font-size: 24px;">Invoice</span><br><br>
          </div>
        </div>

      </section>
      
      <section id="invoice-info">
        <div>
          <span>Diterbitkan atas nama : </span>
          <span class="bold" style="color: #000000d1; ">Koperasi</span>
          <span class="bold" style="color: #000000d1; ">Nomor</span>
          <span class="bold" style="color: #000000d1; ">Tanggal Terbit</span>
          <span class="bold" style="color: #000000d1; ">Jatuh Tempo</span>
          <span class="bold" style="color: #000000d1; ">Pembayaran</span>
        </div>
        
      </section>

      <div class="clearfix"></div>
      
     <section id="invoice-title-number">
      
        <span id="title">Invoice</span>
        <span id="number">#0001</span>
        
      </section>
      
      <div class="clearfix"></div>
      <hr style="border-top: 45px solid; margin-bottom: -65px; color: #e6e7e7;">
      
      <section id="items">
        
        <table cellpadding="0" cellspacing="0" >
        
          <tr>
            <th>no</th> <!-- Dummy cell for the row number and row commands -->
            <th>Fitur</th>
            <th>Masa Aktif</th>
            <th>Tagihan</th>
            <th>Total</th>
          </tr>
          
          <tr data-iterate="item">
            <td>1</td> <!-- Don't remove this column as it's needed for the row commands -->
            <td>Shopping</td>
            <td>3 Bulan</td>
            <td>Rp. 35.000,00</td>
            <td>Rp. 35.000,00</td>
          </tr>
          
        </table>
        
      </section>
      <hr style="border-top: 5px solid; margin-top: -30px; margin-bottom: 0px; color: #1175bbbf;">
      <hr style="border-top: 224px solid;border-color:#fff;width: 355px;margin-right: 0px;margin-bottom: -215px; margin-top: 0px;align-content: left;" class="text-right">
      
      <section id="sums">
      
        <table cellpadding="0" cellspacing="0" style="" >
          <tr >
            <th>Sub-Total :</th>
            <td>Rp. 35.000,00</td>
          </tr>
          
          <tr data-iterate="tax">
            <th>Pajak :</th>
            <td>25%</td>
          </tr>
          
          <tr class="amount-total">
            <th>TOTAL :</th>
            <td>Rp. 35.000,00</td>
          </tr>
          
          <!-- You can use attribute data-hide-on-quote="true" to hide specific information on quotes.
               For example Invoicebus doesn't need amount paid and amount due on quotes  -->
          <tr data-hide-on-quote="true">
            <th>Dibayar :</th>
            <td>Rp. 25.000,00</td>
          </tr>
          
          <tr data-hide-on-quote="true">
            <th>Sisa Tagihan :</th>
            <td>Rp. 10.000,00</td>
          </tr>
          
        </table>
        
      </section>
      
      <div class="clearfix"></div>
      
      <section id="terms">
      
        <span>PT. Arnawa Teknologi Informasi</span>
        <div>Graha KAS. lantai. 3, Suite 1 <br>Kompleks Perkantoran<br>
        Kebayoran Baru Mall No. 88<br>
        Jl. Raya Kebayoran Baru <br>
        Jakarta Selatan 12120, Indonesia<br> <br>
        info@arnintech.co.id<br>+62 21 2751 4023</div>
        
      </section>

    </div>

  </body>
</html>
