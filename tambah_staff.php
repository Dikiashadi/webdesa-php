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
            <h1>Staff</h1>
            <ol class="breadcrumb">
              <li class="active"> Master Data</li>
              <li class="active">Staff</li>
              <li class="active">Tambah Data Staff</li>
            </ol>
          </div>
      </div>

<form  action="" class="form-horizontal" method="POST" enctype="multipart/form-data">
                  <div class="form-group form-group-sm">

                    <label class=" control-label col-sm-3" for="txtnip" control-label">NIP</label>
                    <div class="col-sm-2">
                    <input type="text" class="form-control" name="txtnip" id="txtnis" required>
                </div>
              </div>
                 <div class="form-group form-group-sm">
                    <label class="control-label col-sm-3">Nama Staff</label>
                    <div class="col-sm-4">
                    <input type="text" class="form-control" name="txtnama" id="txtnama" required >
                </div>
              </div>
              <div class="form-group form-group-sm">
                    <label class="control-label col-sm-3">Jenis Kelamin</label>
                    <div class="col-sm-7">
                    <input type="radio"  name="rbjk" class="form control" id="laki" value="Laki-Laki">Laki-Laki
                    <input type="radio"  name="rbjk" class="form control" id="perempuan" value="Perempuan">Perempuan
                </div>
              </div>
              <div class="form-group form-group-sm">
                    <label class="control-label col-sm-3">Tempat Lahir</label>
                    <div class="col-sm-4">
                    <input type="text" class="form-control" name="txttempat" id="txttempat"  required >
                </div>
              </div>
                 <div class="form-group form-group-sm">
                    <label class="control-label col-sm-3">Tanggal Lahir</label>
                    <div class="col-sm-4">
                    <input type="date" class="form-control" name="txttanggal" id="txttanggal" placeholder="yyyy-mm-dd"  required >
                </div>
              </div>
               <div class="form-group form-group-sm">
                    <label class="control-label col-sm-3">Alamat</label>
                    <div class="col-sm-4">
                    <textarea class="form-control" name="txtalamat" id="txtalamat" required></textarea>
                </div>
              </div>
                <div class="form-group form-group-sm">
                  <label class=" control-label col-sm-3" for="cbjabatan">Jabatan</label>
                   <div class="col-sm-3">
                    <select name="cbjabatan" class="form-control" id="jabatan"required>
                    <option value="">--Pilih--</option>
                    <option value="Bagian Pelayanan">Bagian Pelayanan</option>
                    <option value="Kasi Pelayanan">Kasi Pelayanan</option>
                    <option value="Camat">Camat</option>
                    </select>
                  </div>
                 </div>
                 <div class="form-group form-group-sm">
                    <label class="control-label col-sm-3">Nomor Telpon</label>
                    <div class="col-sm-4">
                    <input type="number" class="form-control" name="txtnotlp" id="txtnotlp"  required >
                </div>
              </div>
              	 <div class="form-group form-group-sm">
                    <label class="control-label col-sm-3">Foto</label>
                    <div class="col-sm-4">
                    <input type="file" class="form-control" name="fotostaff" id="fotostaff" required>
                </div>
              </div>
              
                 <div class="form-group form-group-sm">
                    <label class="control-label col-sm-3">Password</label>
                    <div class="col-sm-3">
                    <input type="text" class="form-control" name="txtpass" id="txtpass" required >
                </div>
              </div>
              	<div class="form-group form-group=sm">
                    <center><button type="reset" align="right" class="btn btn-danger">Reset</button>
                    <input type="submit" align="right" class="btn btn-success"  value="Simpan" name="simpan"></center>
                </div>
                
                </form>

<!---------------------------------------MENYIMPAN KE DATABASE------------------------------------------------>

 <?php
  require_once('koneksi.php');

       if(@$_POST['simpan']){

       //Mengambil data dari form tambah staff
        $nip=mysqli_real_escape_string($koneksi,$_POST['txtnip']);
       	$nama=mysqli_real_escape_string($koneksi,$_POST['txtnama']);
        $tempat=mysqli_real_escape_string($koneksi,$_POST['txttempat']);
        $tanggal=mysqli_real_escape_string($koneksi,$_POST['txttanggal']);
        $jk=mysqli_real_escape_string($koneksi,$_POST['rbjk']);
        $alamat=mysqli_real_escape_string($koneksi,$_POST['txtalamat']);
       	$jabatan=mysqli_real_escape_string($koneksi,$_POST['cbjabatan']);
        $telp=mysqli_real_escape_string($koneksi,$_POST['txtnotlp']);
       	$pass=mysqli_real_escape_string($koneksi,md5($_POST['txtpass']));
       

       /*UPLOAD PHOTO*/
        $extensi=explode(".",$_FILES['fotostaff']['name']);
        $fotostaff="staff-".$nip.".".end($extensi);
        $sumber=$_FILES['fotostaff']['tmp_name'];
        $upload=move_uploaded_file($sumber,"assets/foto/staff/".$fotostaff);

        if($upload){

	$perintah="INSERT INTO tb_staff (id,nip,nama,jenis_kelamin,tempat_lahir,tgl_lahir,alamat,jabatan,no_tlp,foto,password) VALUES ('','$nip','$nama','$jk','$tempat','$tanggal','$alamat','$jabatan','$telp','$fotostaff','$pass')";

       	$aksi=mysqli_query($koneksi,$perintah) or die (mysqli_error($koneksi));

    
	if(!$aksi){
		
		
		echo "Error:".$perintah."<br>".mysqli_error($koneksi);
      
	} else{
    
   
    echo"<script>alert('Berhasil disimpan')</script>";

  echo"<script>location='staff.php';</script>";

	}
}
  else{
    echo"Maaf , gambar gagal di upload.";
    echo"<br><a href='tambah_staff.php'>Kembali</a>";
  }


}
?>

                
               
                
                
            