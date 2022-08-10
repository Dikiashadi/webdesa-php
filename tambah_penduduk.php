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
            <h1>Penduduk</h1>
            <ol class="breadcrumb">
              <li class="active"> Master Data</li>
              <li class="active">Penduduk</li>
              <li class="active">Tambah Data Penduduk</li>
            </ol>
          </div>
      </div>

<form  action="" class="form-horizontal" method="POST" enctype="multipart/form-data">
                  <div class="form-group form-group-sm">

                    <label class=" control-label col-sm-3" for="txtnik" control-label">NIK</label>
                    <div class="col-sm-2">
                    <input type="text" class="form-control" name="txtnik" id="txtnik" required>
                </div>
              </div>
                 <div class="form-group form-group-sm">
                    <label class="control-label col-sm-3">Nama Penduduk</label>
                    <div class="col-sm-4">
                    <input type="text" class="form-control" name="txtnama" id="txtnama" required >
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
                    <label class="control-label col-sm-3">Jenis Kelamin</label>
                    <div class="col-sm-7">
                    <input type="radio"  name="rbjk" class="form control" id="laki" value="Laki-Laki">Laki-Laki
                    <input type="radio"  name="rbjk" class="form control" id="perempuan" value="Perempuan">Perempuan
                </div>
              </div>
               <div class="form-group form-group-sm">
                    <label class="control-label col-sm-3">Alamat</label>
                    <div class="col-sm-4">
                    <textarea class="form-control" name="txtalamat" id="txtalamat" required></textarea>
                </div>
              </div>
               <div class="form-group form-group-sm">
                    <label class="control-label col-sm-3">RT</label>
                    <div class="col-sm-4">
                    <input type="text" class="form-control" name="txtrt" id="txtrt"  required >
                </div>
              </div>
               <div class="form-group form-group-sm">
                    <label class="control-label col-sm-3">RW</label>
                    <div class="col-sm-4">
                    <input type="text" class="form-control" name="txtrw" id="txtrw"  required >
                </div>
              </div>
                <div class="form-group form-group-sm">
                  <label class=" control-label col-sm-3" for="cbkelurahan">Kelurahaan</label>
                   <div class="col-sm-3">
                    <select name="cbkelurahan" class="form-control" id="jabatan"required>
                    <option value="">--Pilih--</option>
                    <option value="Bumigora">Bumigora</option>
                    <option value="Mataram">Mataram</option>
                    <option value="Gerung">Gerung</option>
                    <option value="Lembar">Lembar</option>
                    </select >
                  </div>
                 </div>             
               <div class="form-group form-group-sm">
                  <label class=" control-label col-sm-3" for="cbagama">Agama</label>
                   <div class="col-sm-3">
                    <select name="cbagama" class="form-control" id="jabatan"required>
                    <option value="">--Pilih--</option>
                    <option value="Islam">Islam</option>
                    <option value="Protestan">Protestan</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Buddha">Buddha</option>
                    <option value="Khonghucu">Khonghucu</option>
                    </select >
                  </div>
                 </div>
                 <div class="form-group form-group-sm">
                  <label class=" control-label col-sm-3" for="cbpendidikan">Pendidikan</label>
                   <div class="col-sm-3">
                    <select name="cbpendidikan" class="form-control" id="cbpendidikan"required>
                    <option value="">--Pilih--</option>
                    <option value="Tidak/Belum Sekolah">Tidak/Belum Sekolah</option>
                    <option value="Belum Tamat SD/Sederajat">Belum Tamat SD/Sederajat</option>
                    <option value="Tamat SD/Sederajat">Tamat SD/Sederajat</option>
                    <option value="SLTP/Sederajat">SLTP/Sederajat</option>
                    <option value="SLTA/Sederajat">SLTA/Sederajat</option>
                    <option value="Diploma I/II">Diploma I/II</option>
                    <option value="Akademi/Diploma III/S.Muda">Akademi/Diploma III/S.Muda</option>
                    <option value="Diploma IV/Strata I">Diploma IV/Strata I</option>
                    <option value="Strata II">Strata II</option>
                    <option value="Strata III">Strata III</option>
                    </select >
                  </div>
                 </div>
                 <div class="form-group form-group-sm">
                  <label class=" control-label col-sm-3" for="cbastatus">Status Perkawinan</label>
                   <div class="col-sm-3">
                    <select name="cbstatus" class="form-control" id="jabatan"required>
                    <option value="">--Pilih--</option>
                    <option value="Belum Kawin">Belum Kawin</option>
                    <option value="Kawin">Kawin</option>
                    <option value="Cerai Hidup">Cerai Hidup</option>
                    <option value="Cerai Mati">Cerai Mati</option> 
                    </select>
                  </div>
                 </div>
                 <div class="form-group form-group-sm">
                    <label class="control-label col-sm-3">Pekerjaan</label>
                    <div class="col-sm-4">
                    <input type="text" class="form-control" name="txtpekerjaan" id="txtpekerjaan"  required >
                </div>
              </div>
              <div class="form-group form-group-sm">
               <label class=" control-label col-sm-3" for="cbgol">Golongan Darah</label>
                   <div class="col-sm-3">
                    <select name="cbgol" class="form-control" id="cbgol"required>
                    <option value="">--Pilih--</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="AB">AB</option>
                    <option value="O">O</option> 
                    </select>
                  </div>
                 </div>
              <div class="form-group form-group-sm">
                    <label class="control-label col-sm-3">Nomor Telpon</label>
                    <div class="col-sm-4">
                    <input type="text" class="form-control" name="txtnotlp" id="txtnotlp"  required >
                </div>
              </div>
              	 <div class="form-group form-group-sm">
                    <label class="control-label col-sm-3">Foto</label>
                    <div class="col-sm-4">
                    <input type="file" class="form-control" name="fotopenduduk" id="fotopenduduk" required>
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
        $nik=mysqli_real_escape_string($koneksi,$_POST['txtnik']);
       	$nama=mysqli_real_escape_string($koneksi,$_POST['txtnama']);
       	$tempat=mysqli_real_escape_string($koneksi,$_POST['txttempat']);
       	$tanggal=mysqli_real_escape_string($koneksi,$_POST['txttanggal']);
       	$jk=mysqli_real_escape_string($koneksi,$_POST['rbjk']);
       	$alamat=mysqli_real_escape_string($koneksi,$_POST['txtalamat']);
       	$rt=mysqli_real_escape_string($koneksi,$_POST['txtrt']);
       	$rw=mysqli_real_escape_string($koneksi,$_POST['txtrw']);
       	$kel=mysqli_real_escape_string($koneksi,$_POST['cbkelurahan']);
       	$agama=mysqli_real_escape_string($koneksi,$_POST['cbagama']);
        $pendidikan=mysqli_real_escape_string($koneksi,$_POST['cbpendidikan']);
       	$status=mysqli_real_escape_string($koneksi,$_POST['cbstatus']);
       	$pekerjaan=mysqli_real_escape_string($koneksi,$_POST['txtpekerjaan']);
       	$gol=mysqli_real_escape_string($koneksi,$_POST['cbgol']);
       	$telp=mysqli_real_escape_string($koneksi,$_POST['txtnotlp']);
       
       /*UPLOAD PHOTO*/
        $extensi=explode(".",$_FILES['fotopenduduk']['name']);
        $fotopenduduk="penduduk-".$nik.".".end($extensi);
        $sumber=$_FILES['fotopenduduk']['tmp_name'];
        $upload=move_uploaded_file($sumber,"assets/foto/penduduk/".$fotopenduduk);


        if($upload){

	$perintah="INSERT INTO tb_penduduk (id_penduduk,nik,nama,tempatLahir,tanggalLahir,jenisKelamin, alamat, rt,rw,kelurahan, agama,pendidikan,statusPerkawinan,pekerjaan,golDarah, nomorTlp, foto) VALUES ('','$nik','$nama','$tempat','$tanggal', '$jk', '$alamat', '$rt', '$rw', '$kel', '$agama','$pendidikan', '$status', '$pekerjaan', '$gol', '$telp','$fotopenduduk')";

       	$aksi=mysqli_query($koneksi,$perintah) or die (mysqli_error($koneksi));

    
	if(!$aksi){
		
		
		echo "Error:".$perintah."<br>".mysqli_error($koneksi);

	} else{
    
   
    echo"<script>alert('Berhasil disimpan')</script>";

  echo"<script>location='penduduk.php';</script>";

	}
}
  else{
    echo"Maaf , gambar gagal di upload ".$fotopenduduk;
    echo"<br><a href='tambah_penduduk.php'>Kembali</a>";
  }


}
?>

                
               
                
                
            