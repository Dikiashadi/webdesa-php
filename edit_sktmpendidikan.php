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
            <h1>Edit SKTM</h1>
            <ol class="breadcrumb">
              <li class="active">Pelayanan</li>
              <li class="active"> Edit SKTM Pendidikan</li>
            </ol>
          </div>
      </div>
<?php
require_once('koneksi.php');

if(isset($_GET['id'])){

  $id=($_GET['id']);

 
                      $query="SELECT * FROM tb_sktmpendidikan as p JOIN tb_penduduk as d ON p.nik=d.nik where no_sktmPendidikan='$id'";
                      $result=mysqli_query($koneksi,$query);
                      if(!$result){
                        die("query error:".mysqli_errno($koneksi)."-".mysqli_error($koneksi));
                      }


                      $data=mysqli_fetch_assoc($result);
                      $noper=$data["no_sktmPendidikan"];
                      $nik=$data["nik"];
                      $nama=$data["nama"];
                      $tgl_permohonan=$data["tgl_sktmPendidikan"];   
                  }
                    
                  ?>
<form  action="" class="form-horizontal" method="POST" enctype="multipart/form-data">
                  <div class="form-group form-group-sm">
                    <label class=" control-label col-sm-3" for="txtno" control-label">No SKTM</label>
                    <div class="col-sm-3">
                    <input type="text" class="form-control" name="txtno" id="txtno" value="<?php echo $noper; ?>" readonly>
                </div>
              </div>
               <div class="form-group form-group-sm">
                    <label class=" control-label col-sm-3" for="txtnik" control-label">NIK</label>
                    <div class="col-sm-4">
                    <input type="text" class="form-control" name="txtnik" id="txtnik" readonly value="<?php echo $nik; ?>">
                </div>
              </div>
              <div class="form-group form-group-sm">
                    <label class=" control-label col-sm-3" for="txtnama" control-label">Nama Pemohon</label>
                    <div class="col-sm-4">
                    <input type="text" class="form-control" name="txtnama" id="txtnama" readonly value="<?php echo $nama; ?>">
                </div>
              </div>
              <div class="form-group form-group-sm">
                    
                    <label class=" control-label col-sm-3" for="txt_ttl" control-label">Tempat, Tanggal Lahir</label>
                    <div class="col-sm-4">
                    <input type="text" class="form-control" name="txt_ttl" id="txt_ttl" readonly value="<?php echo $data['tempatLahir'].",". $data['tanggalLahir'] ; ?>">
                </div>
              </div>

              <div class="form-group form-group-sm">
                    <label class="control-label col-sm-3">Alamat</label>
                    <div class="col-sm-4">
                    <textarea class="form-control" name="txtalamat" cols="40" rows="5" id="txtalamat" readonly ><?php echo $data['alamat']." RT.". $data['rt']." RW.".$data['rw']." Kelurahan ".$data['kelurahan']." Kecamatan Bumigora Kota Bumigora" ; ?></textarea>
                </div>
              </div>
              <div class="form-group form-group-sm">
                    <label class=" control-label col-sm-3" for="txtnokk" control-label">Nomor Kartu Keluarga</label>
                    <div class="col-sm-4">
                    <input type="text" class="form-control" name="txtnokk" id="txtnokk" required  value="<?php echo $data['no_kk']; ?>">
                </div>
              </div>
               <div class="form-group form-group-sm">
                    <label class=" control-label col-sm-3" for="txt_tglpermohonan" control-label">Tanggal Permohonan</label>
                    <div class="col-sm-3">
                    <input type="date" class="form-control" name="txt_tglpermohonan" id="txt_tglpermohonan" placeholder="yyyy-mm-dd" value="<?php echo $tgl_permohonan; ?>" required>
                </div>
              </div>
               <div class="form-group form-group-sm">
                    <label class=" control-label col-sm-3" for="txtsekolah" control-label">Sekolah Tujuan</label>
                    <div class="col-sm-4">
                    <input type="text" class="form-control" name="txtsekolah" id="txtsekolah" value="<?php echo $data['sekolah_tujuan']; ?>" required>
                </div>
              </div>
               <div class="form-group form-group-sm">
                    <label class="control-label col-sm-3">Keterangan</label>
                    <div class="col-sm-4">
                    <textarea class="form-control" name="txtketerangan" cols="40" rows="5" id="txtketerangan" required ><?php echo $data['keterangan']; ?></textarea>
                </div>
              </div>
              
               <div class="form-group form-group=sm">
                    <center><button type="reset" align="right" class="btn btn-danger">Reset</button>
                    <input type="submit" align="right" class="btn btn-success"  value="Simpan" name="simpan"></center>
                </div>
<?php
  require_once('koneksi.php');

       if(@$_POST['simpan']){

       //Mengambil data dari form register kk
         $nop=mysqli_real_escape_string($koneksi,$_POST['txtno']);
       	 $nokk=mysqli_real_escape_string($koneksi,$_POST['txtnokk']);
         $tgl_per=mysqli_real_escape_string($koneksi,$_POST['txt_tglpermohonan']);
         $sekolah=mysqli_real_escape_string($koneksi,$_POST['txtsekolah']);
         $ket=mysqli_real_escape_string($koneksi,$_POST['txtketerangan']);
        

 
          $perintah="UPDATE tb_sktmpendidikan SET no_kk='$nokk',tgl_sktmPendidikan='$tgl_per', sekolah_tujuan='$sekolah', keterangan='$ket' WHERE no_sktmPendidikan='$nop'";

      $aksi=mysqli_query($koneksi,$perintah);

      if($aksi){
        echo"<script>alert('Berhasil disimpan')</script>";
          echo"<script>location='tampil_sktmpendidikan.php';</script>";
      }else{
        echo"Maaf, terjadi kesalahan saat mencoba menyimpan data ke database";
        echo "Error:".$perintah."<br>".mysqli_error($koneksi);
        echo"<br><a href='edit_sktmpendidikan	.php'>Kembali</a>";
    
  }
}

 