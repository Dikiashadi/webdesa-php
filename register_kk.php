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

if(isset($_GET['id'])){

  $id=($_GET['id']);

 
                      $query="SELECT * FROM tb_permohonankk as p JOIN tb_penduduk as d ON p.nik=d.nik where no_permohonankk='$id'";
                      $result=mysqli_query($koneksi,$query);
                      if(!$result){
                        die("query error:".mysqli_errno($koneksi)."-".mysqli_error($koneksi));
                      }


                      $data=mysqli_fetch_assoc($result);
                      $noper=$data["no_permohonankk"];
                      $nik=$data["nik"];
                      $nama=$data["nama"];
                      $tgl_permohonan=$data["tglPermohonan"];
                     
                      
                     
                  }
                    
                  
                  ?>
 <div id="wrapper">
<?php 
include"header.php";
?>
</div>
<div id="page-wrapper">
<div class="row" id="contentInput" >
          <div class="col-lg-12">
            <h1>Register Kartu Keluarga</h1>
            <ol class="breadcrumb">
              <li class="active">Pelayanan</li>
              <li class="active">Register Kartu Keluarga</li>
            </ol>
          </div>
      </div>
<div class="container">
        <div class="row row-table">
          <div class="col-sm-9 col-table">
          <div class="panel panel-info">
            <div class="panel-heading-none" style="align:center;">
              
            </div>
          <div class="panel-body">
         <form  action="" class="form-horizontal" method="POST" enctype="multipart/form-data">
                  <div class="form-group form-group-sm">
                    <label class=" control-label col-sm-3" for="txtno" control-label">No Permohonan KK</label>
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
                    <label class=" control-label col-sm-3" for="txtnama" control-label">Nama Penduduk</label>
                    <div class="col-sm-4">
                    <input type="text" class="form-control" name="txtnama" id="txtnama" readonly value="<?php echo $nama; ?>">
                </div>
              </div>
               <div class="form-group form-group-sm">
                    <label class=" control-label col-sm-3" for="txt_tglrekam" control-label">Tanggal Permohonan</label>
                    <div class="col-sm-3">
                    <input type="date" class="form-control" name="txt_permo" id="txt_permo" readonly value="<?php echo $tgl_permohonan; ?>">
                </div>
              </div>
              <div class="form-group form-group-sm">
                    <label class=" control-label col-sm-3" for="txtnama" control-label">Nomor KK</label>
                    <div class="col-sm-4">
                    <input type="text" class="form-control" name="txtnokk" id="txtnokk" required>
                </div>
              </div>
               <div class="form-group form-group-sm">
                    <label class=" control-label col-sm-3" for="txt_tglcetak" control-label">Tanggal Cetak</label>
                    <div class="col-sm-3">
                    <input type="date" class="form-control" name="txt_tglcetak" id="txt_tglambil" placeholder="yyyy-mm-dd" required>
                </div>
              </div>
               <div class="form-group form-group=sm">
                    <center><button type="reset" align="right" class="btn btn-danger">Reset</button>
                    <input type="submit" align="right" class="btn btn-success"  value="Simpan" name="simpan"></center>
                </div>
</div>
</form>
 </div>

<?php
  require_once('koneksi.php');

       if(@$_POST['simpan']){

       //Mengambil data dari form register kk
         $nop=mysqli_real_escape_string($koneksi,$_POST['txtno']);
       	 $nokk=mysqli_real_escape_string($koneksi,$_POST['txtnokk']);
         $tgl_cetak=mysqli_real_escape_string($koneksi,$_POST['txt_tglcetak']);
        

 
          $perintah="UPDATE tb_permohonankk SET nomor_kk='$nokk',tgl_cetak='$tgl_cetak' WHERE no_permohonankk='$nop'";

      $aksi=mysqli_query($koneksi,$perintah);

      if($aksi){
        echo"<script>alert('Berhasil disimpan')</script>";
          echo"<script>location='tampil_kk.php';</script>";
      }else{
        echo"Maaf, terjadi kesalahan saat mencoba menyimpan data ke database";
        echo "Error:".$perintah."<br>".mysqli_error($koneksi);
        echo"<br><a href='register_kk.php'>Kembali</a>";
    
  }
}
