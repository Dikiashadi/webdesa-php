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
?>
</div>
<div id="page-wrapper">
<div class="row" id="contentInput" >
          <div class="col-lg-12">
            <h1>Laporan SKTM Kesehatan</h1>
            <ol class="breadcrumb">
              <li class="active">Surat Keterangan Tidak Mampu Untuk Kesehatan</li>
              
            </ol>
          </div>
      </div>
       
 <a   href="laporan_sktmKsemua.php" type="button" class="btn btn-danger"  style="align:center;"><i class="fa fa-print"></i> CETAK SEMUA DATA SKTM KESEHATAN</a>
       <hr>  
                 
 <div class="panel panel-info">
          <div class="panel-heading-none">
          </div>
          <div class="panel-body">
          <form method="POST" action="" id="cariKtp">
          <div class="form-group form-group-sm">
                 
               <div class="form-group form-group-sm">
                  <label class=" control-label col-sm-2" for="cbkelurahan">Jenis Filter</label>
                   <div class="col-sm-3">
                    <select name="cbjenis" class="form-control" id="jenis"required>
                    <option value="">--Pilih--</option>
                    <option value="NIK/No Permohonan/Nama">NIK/No SKTM/Nama</option>
                    <option value="Tempat Lahir">Tempat Lahir</option>
                    <option value="Tanggal Lahir">Tanggal Lahir</option>
                    <option value="Alamat">Alamat</option>
                    <option value="Desa/Kelurahan">Desa/Kelurahan</option>
                    <option value="Tanggal Permohonan">Tanggal Permohonan</option>
                    <option value="Nomor KK">Nomor KK</option>
                    </select >
                  </div>
                 </div> 
                 <!--<div class="col-sm-4">
                    <input type="text" class="form-control" name="txtcari" id="txtcari" placeholder="Masukan Pencarian Anda"  required >
                </div>-->
                    <input type="submit" align="right" class="btn btn-success"  value="Pilih" name="pilih" id="pilih">
                    
                </div>
              </div>
</div>

</form>
 
<?php
   if(@$_POST['pilih']){

       //Mengambil data dari form Cari
        $jenis=mysqli_real_escape_string($koneksi,$_POST['cbjenis']);
        

if($jenis=="NIK/No Permohonan/Nama"){
  ?><div class="panel panel-info">
          <div class="panel-heading-none">
          </div>
          <div class="panel-body">
          <form method="POST" action="laporan_sktmKperNik.php" id="nik">
          <div class="form-group form-group-sm">
                  <div class="form-group form-group-sm">
                    <label class=" control-label col-sm-3" for="txtcari">NIK/No Permohonan/Nama</label>
                    <div class="col-sm-4">
                    <input type="text" class="form-control" name="txtcari" id="txtcari" required placeholder='NIK/No Permohonan/Nama'>
                </div>
              </div>
              <input type="hidden" class="form-control" name="txtfilter" id="txtfilter" value="PerNIK">
              <div class="col-sm-3">
                <input type="submit" align="right" class="btn btn-danger"  value="Cetak" name="cetak" id="cetak">
</div>
</div>
</form>
<?php
}if($jenis=="Tempat Lahir"){
  ?><div class="panel panel-info">
          <div class="panel-heading-none">
          </div>
          <div class="panel-body">
          <form method="POST" action="filter_sktmKperTempat.php" id="tempat">
          <div class="form-group form-group-sm">
                   <div class="form-group form-group-sm">
                    <label class="control-label col-sm-2">Tempat Lahir</label>
                     <div class="col-sm-3">
                    <input type="text" class="form-control" name="txtcari" id="txtcari" required placeholder='Tempat Lahir'>
                </div>
              </div>
              <div class="col-sm-3">
              <input type="hidden" class="form-control" name="txtfilter" id="txtfilter" value="Tempat Lahir">
              <div class="col-sm-3">
                <input type="submit" align="right" class="btn btn-danger"  value="Cari" name="cari" id="cari">
</div>
</div>
</form>
<?php
} if($jenis=="Tanggal Lahir"){
  ?>
  <div class="panel panel">
          <div class="panel-heading">
            <label for="tgl_akhir">Tanggal Lahir</label>
          </div>
          <div class="panel-body">
          <form method="POST" action="filter_sktmKperTanggalLahir.php" id="tempat">
            <form class="form-inline">
              <div class="form-group col-sm-3">
                <label for="tgl_awal">Dari Tanggal</label>
                <input type="date" class="form-control" name="tgl_awal">
              </div>
              <div class="form-group col-sm-3">
              <label for="tgl_akhir">Sampai Tanggal</label>
               <input type="date" class="form-control" name="tgl_akhir">
             </div>
              <input type="hidden" class="form-control" name="txtfilter" id="txtfilter" value="Tanggal Lahir">
              <div class="col-sm-3">
             <div class="form-group">  
                <input type="submit" align="right" class="btn btn-danger"  value="Cari" name="cari" id="cari">
</div>
</div>
</form>


<?php
}if($jenis=="Alamat"){
  ?><div class="panel panel-info">
          <div class="panel-heading-none">
          </div>
          <div class="panel-body">
          <form method="POST" action="filter_sktmKperAlamat.php" id="tempat">
          <div class="form-group form-group-sm">
                   <div class="form-group form-group-sm">
                    <label class="control-label col-sm-2">Alamat</label>
                    <div class="col-sm-4">
                    <textarea class="form-control" name="txtcari" id="txtcari" required></textarea>
                </div>
              </div>
              <div class="col-sm-3">
              <input type="hidden" class="form-control" name="txtfilter" id="txtfilter" value="Alamat">
              <div class="col-sm-3">
                <input type="submit" align="right" class="btn btn-danger"  value="Cari" name="cari" id="cari">
</div>
</div>
</form>

<?php
}if($jenis=="Desa/Kelurahan"){
  ?><div class="panel panel-info">
          <div class="panel-heading-none">
          </div>
          <div class="panel-body">
          <form method="POST" action="filter_sktmKperKelurahan.php" id="tempat">
           <div class="form-group form-group-sm">
                  <label class=" control-label col-sm-2" for="txtcari">Kelurahaan</label>
                   <div class="col-sm-3">
                    <select name="txtcari" class="form-control" id="txtcari"required>
                    <option value="">--Pilih--</option>
                    <option value="Bumigora">Bumigora</option>
                    <option value="Mataram">Mataram</option>
                    <option value="Gerung">Gerung</option>
                    <option value="Lembar">Lembar</option>
                    </select >
                  </div>
                 </div>
                 <div class="col-sm-3">
              <input type="hidden" class="form-control" name="txtfilter" id="txtfilter" value="Desa/Kelurahan">  
              <div class="col-sm-3">
                <input type="submit" align="right" class="btn btn-danger"  value="Cari" name="cari" id="cari">
</div>
</div>
</form>

<?php
} if($jenis=="Tanggal Permohonan"){
  ?>
  <div class="panel panel">
          <div class="panel-heading">
            <label for="tgl_akhir">Tanggal Permohonan</label>
          </div>
          <div class="panel-body">
          <form method="POST" action="filter_sktmKperTanggalPermohonan.php" id="tempat">
            <form class="form-inline">
              <div class="form-group col-sm-3">
                <label for="tgl_awal">Dari Tanggal</label>
                <input type="date" class="form-control" name="tgl_awal">
              </div>
              <div class="form-group col-sm-3">
              <label for="tgl_akhir">Sampai Tanggal</label>
               <input type="date" class="form-control" name="tgl_akhir">
             </div>
              <input type="hidden" class="form-control" name="txtfilter" id="txtfilter" value="Tanggal Permohonan">
              <div class="col-sm-3">
             <div class="form-group">  
                <input type="submit" align="right" class="btn btn-danger"  value="Cari" name="cari" id="cari">
</div>
</div>
</form>
<?php
}if($jenis=="Nomor KK"){
  ?><div class="panel panel-info">
          <div class="panel-heading-none">
          </div>
          <div class="panel-body">
          <form method="POST" action="filter_sktmKperNomorkk.php" id="tempat">
          <div class="form-group form-group-sm">
                   <div class="form-group form-group-sm">
                    <label class="control-label col-sm-2">Nomor KK</label>
                     <div class="col-sm-3">
                    <input type="text" class="form-control" name="txtcari" id="txtcari" required>
                </div>
              </div>
              <div class="col-sm-3">
              <input type="hidden" class="form-control" name="txtfilter" id="txtfilter" value="Nomor KK">
              <div class="col-sm-3">
                <input type="submit" align="right" class="btn btn-danger"  value="Cari" name="cari" id="cari">
</div>
</div>
</form>

  
<?php
}
    }
        ?>