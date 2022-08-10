<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>SIPA</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="assets/css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
     <!-- JavaScript -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
  </head>
<body>
<?php
require_once('koneksi.php');

?>
 <div id="wrapper">
<?php 
include"header.php";


     if(ISSET($_POST['cari'])){
        $no= 1;
        $tglawal=mysqli_real_escape_string($koneksi,$_POST['tgl_awal']);
        $tglakhir=mysqli_real_escape_string($koneksi,$_POST['tgl_akhir']);
       $filter=mysqli_real_escape_string($koneksi,$_POST['txtfilter']);
?>
</div>
<div id="page-wrapper">
<div class="row" id="contentInput" >
          <div class="col-lg-12">
            <h1>Laporan Permohonan SKTM  Pendidikan</h1>
            <ol class="breadcrumb">
              <li class="active"> Laporan SKTM Pendidikan</li>
            <?php echo"<li class='active'>Berdasarkan $filter</li>"?>
            <?php echo"<li class='active'>Dari Tanggal $tglawal Sampai $tglakhir</li>"?>
            </ol>
          </div>
      </div>
      <form  action="laporan_sktmPperTanggalPermohonan.php" class="form-horizontal" method="POST" enctype="multipart/form-data">
         <input type="submit" align="right" class="btn btn-danger"  value="Cetak PDF" name="cetak"style="align:center;">
     <div class="table-responsive-sm">
              <table class="table table-bordered table-hover table-striped">
                <tr>
                  <th>NO</th>
                  <th>NO SKTM</th>
                  <th>NIK</th>
                  <th>Nama</th>
                  <th>Tempat,Tanggal Lahir</th>
                  <th>Alamat</th>
                  <th>No KK</th>
                  <th>Tanggal Permohonan</th>
                  <th>Sekolah Tujuan</th>
                  <th>Keterangan</th>
                 
                </tr>
      <?php
      

      
        echo"<input type='hidden' class='form-control' name='txtfilter' id='txtfilter' value='$filter'>";
         echo"<input type='hidden' class='form-control' name='txttglawal' id='txttglawal' value='$tglawal'>";
         echo"<input type='hidden' class='form-control' name='txttglakhir' id='txttglakhir' value='$tglakhir'>";

        $perintah="SELECT * FROM tb_sktmpendidikan as k JOIN tb_penduduk as p ON k.nik=p.nik WHERE tgl_sktmPendidikan between '$tglawal' and '$tglakhir' ORDER BY tanggalLahir ASC";
         $da=mysqli_query($koneksi,$perintah)or die (mysqli_error($koneksi));
        
          if(mysqli_num_rows($da) > 0){
           while($row=mysqli_fetch_assoc($da)){
            
        ?>
              <tr>
                  <td align="center"><?php echo $no++; ?></td>
                  <td><?php echo $row['no_sktmPendidikan']; ?></td>
                  <td><?php echo $row['nik']; ?></td>
                  <td><?php echo $row['nama']; ?></td>
                   <td><?php echo $row['tempatLahir'].", ".$row['tanggalLahir']; ?></td>
                  <td><?php echo $row['alamat']." RT.".$row['rt']." RW.".$row['rw']." Kelurahan ".$row['kelurahan']." Kecamatan Bumigora Kota Bumigora"; ?></td>
                  <td><?php echo $row['no_kk']; ?></td>
                  <td><?php echo $row['tgl_sktmPendidikan']; ?></td>
                  <td><?php echo $row['sekolah_tujuan']; ?></td>
                  <td><?php echo $row['keterangan']; ?></td>
                </tr>
               
          <?php
          }
        }else{
    
     echo"<script>alert('Maaf data tidak ditemukan!')</script>";
     echo"<script>location='formlaporan_sktmPend.php';</script>";
      }
      }
       ?>  