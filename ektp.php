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
            <h1>Buat Permohonan E-KTP</h1>
            <ol class="breadcrumb">
              <li class="active">Pelayanan</li>
              <li class="active"> Buat Permohonan E-KTP</li>
            </ol>
          </div>
      </div>
<div class="container">
        <div class="row row-table">
          <div class="col-sm-9 col-table">
          <div class="panel panel-default">
            <div class="panel-heading" style="align:center;">
              <h5>Cari NIK Penduduk</h5>
            </div>
          <div class="panel-body">
          <form method="POST" action="" id="cariPenduduk">
                <div class="form-group form-group-sm">
                    <div class="col-sm-8">
                    <input type="text" class="form-control" name="txtcari" id="txtcari" placeholder=" Masukan NIK Penduduk">
                </div>
                    <input type="submit" align="right" class="btn btn-success"  value="Cari" name="cari" id="cari">
                    
                </div>
              </div>
</div>
</form>
 </div>

 <div class="row" id="contentJurusan">
                    <div class="col-lg-12">
                  <?php
                    $q="SELECT max(no_permohonanKtp) as maxKode from tb_permohonanktp";   
                    $ha=mysqli_query($koneksi,$q);
                     $data=mysqli_fetch_array($ha);

                    $kode=$data['maxKode'];
                    $noUrut=(int)substr($kode,1,5);
                    $char="P";
                    $noUrut++;

                   
                    $kode=$char.sprintf("%05s",$noUrut);
           

                 
                    //-----cari nis-----------
                    if(ISSET($_POST['cari'])){
               $no= 1;
              $cari=mysqli_real_escape_string($koneksi,$_POST['txtcari']);
              $perintah="SELECT * FROM tb_penduduk   WHERE  nik  LIKE '%$cari%' " ;
               $da=mysqli_query($koneksi,$perintah)or die (mysqli_error($koneksi));
             if(mysqli_num_rows($da)>0){
                while($r=mysqli_fetch_array($da)){
                    
        ?>
       <form  action="simpan_ektp.php" class="form-horizontal" method="POST" enctype="multipart/form-data">
                  <div class="form-group form-group-sm">
                    <label class=" control-label col-sm-3" for="txtno" control-label">No Permohonan E-KTP</label>
                    <div class="col-sm-3">
                    <input type="text" class="form-control" name="txtno" id="txtno" value="<?php echo $kode; ?>" readonly>
                </div>
              </div>
               <div class="form-group form-group-sm">
                    <label class=" control-label col-sm-3" for="txtnik" control-label">NIK</label>
                    <div class="col-sm-4">
                    <input type="text" class="form-control" name="txtnik" id="txtnik" readonly value="<?php echo $r['nik']; ?>">
                </div>
              </div>
              <div class="form-group form-group-sm">
                    <label class=" control-label col-sm-3" for="txtnama" control-label">Nama Penduduk</label>
                    <div class="col-sm-4">
                    <input type="text" class="form-control" name="txtnama" id="txtnama" readonly value="<?php echo $r['nama']; ?>">
                </div>
              </div>
              <div class="form-group form-group-sm">
                    <label class=" control-label col-sm-3" for="txt_ttl" control-label">Tempat, Tanggal Lahir</label>
                    <div class="col-sm-4">
                    <input type="text" class="form-control" name="txt_ttl" id="txt_ttl" readonly value="<?php echo $r['tempatLahir'].",". $r['tanggalLahir'] ; ?>">
                </div>
              </div>

              <div class="form-group form-group-sm">
                    <label class="control-label col-sm-3">Alamat</label>
                    <div class="col-sm-4">
                    <textarea class="form-control" name="txtalamat" cols="40" rows="5" id="txtalamat" readonly ><?php echo $r['alamat']." RT.". $r['rt']." RW.".$r['rw']." Kelurahan ".$r['kelurahan']." Kecamatan Bumigora Kota Bumigora" ; ?></textarea>
                </div>
              </div>
               <div class="form-group form-group-sm">
                  <label class=" control-label col-sm-3" for="cbjenis">Jenis Permohonan</label>
                   <div class="col-sm-3">
                    <select name="cbjenis" class="form-control" id="cbjenis"required>
                    <option value="">--Pilih--</option>
                    <option value="Permohonan Baru">Baru</option>
                    <option value="Pindah Datang">Pindah Datang</option>
                    <option value="Cetak Ulang">Cetak Ulang</option>
                    </select >
                  </div>
                 </div> 

              <div class="form-group form-group-sm">
                    <label class=" control-label col-sm-3" for="txt_tglpenyerahan" control-label">Tanggal Penyerahan Berkas</label>
                    <div class="col-sm-3">
                    <input type="date" class="form-control" name="txt_tglpenyerahan" id="txt_tglpenyerahan" placeholder="yyyy-mm-dd" required>
                </div>
              </div>
              <div class="form-group form-group-sm">
                    <label class=" control-label col-sm-3" for="txt_tglrekam" control-label">Tanggal Rekam</label>
                    <div class="col-sm-3">
                    <input type="date" class="form-control" name="txt_tglrekam" id="txt_tglrekam" placeholder="yyyy-mm-dd" required>
                </div>
              </div>
               <div class="form-group form-group=sm">
                    <center><button type="reset" align="right" class="btn btn-danger">Reset</button>
                    <input type="submit" align="right" class="btn btn-success"  value="Simpan" name="simpan"></center>
                </div>
 <?php
  } 

}else
    {
     echo"<script>alert('Maaf data penduduk tidak ditemukan!')</script>";
     echo"<a href='tambah_penduduk.php'><h4>Silahkan Daftarkan Data Penduduk</h4></a>";

  }
} 
if(!ISSET($_POST['cari'])){
  ?>
  
<?php
}
?>