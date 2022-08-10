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
            <h1>Laporan Penduduk</h1>
            <ol class="breadcrumb">
              <li class="active"></li>
              
            </ol>
          </div>
      </div>
       
                    <a   href="laporan_pendudukSemua.php" type="button" class="btn btn-danger"  style="align:center;"><i class="fa fa-print"></i> CETAK SEMUA DATA PENDUDUK</a>
       <hr>  
                 
 <div class="panel panel-info">
          <div class="panel-heading-none">
          </div>
          <div class="panel-body">
          <form method="POST" action="" id="cariPenduduk">
          <div class="form-group form-group-sm">
                 
               <div class="form-group form-group-sm">
                  <label class=" control-label col-sm-2" for="cbkelurahan">Jenis Filter</label>
                   <div class="col-sm-3">
                    <select name="cbjenis" class="form-control" id="jenis"required>
                    <option value="">--Pilih--</option>
                    <option value="NIK">NIK/Nama</option>
                    <option value="Tempat Lahir">Tempat Lahir</option>
                    <option value="Tanggal Lahir">Tanggal Lahir</option>
                    <option value="Jenis Kelamin">Jenis Kelamin</option>
                    <option value="Alamat">Alamat</option>
                    <option value="Desa/Kelurahan">Desa/Kelurahan</option>
                    <option value="Agama">Agama</option>
                    <option value="Status Perkawinan">Status Perkawinan</option>
                    <option value="Pekerjaan">Pekerjaan</option>
                    <option value="Pendidikan">Pendidikan</option>
                    <option value="Gol Darah">Gol Darah</option>
                    <option value="Nomor Telphone">Nomor Telphone</option>
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
        

if($jenis=="NIK"){
  ?><div class="panel panel-info">
          <div class="panel-heading-none">
          </div>
          <div class="panel-body">
          <form method="POST" action="laporan_pendudukPernama.php" id="nik">
          <div class="form-group form-group-sm">
                  <div class="form-group form-group-sm">
                    <label class=" control-label col-sm-2" for="txtnik">NIK</label>
                    <div class="col-sm-3">
                    <input type="text" class="form-control" name="txtnik" id="txtnik" required>
                </div>
              </div>
              <div class="col-sm-3">
                <input type="submit" align="right" class="btn btn-danger"  value="Cetak" name="cetak" id="cetak">
</div>
</div>
</form>
<?php
      }
      if($jenis=="Tempat Lahir"){
  ?><div class="panel panel-info">
          <div class="panel-heading-none">
          </div>
          <div class="panel-body">
          <form method="POST" action="filter_pendudukPerTempatlahir.php" id="tempat">
          <div class="form-group form-group-sm">
                  <div class="form-group form-group-sm">
                    <label class=" control-label col-sm-2" for="txttempat">Tempat Lahir</label>
                    <div class="col-sm-3">
                    <input type="text" class="form-control" name="txtcari" id="txtcari" placeholder="Masukan Kota Kelahiran" required>
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
          <form method="POST" action="filter_pendudukTanggal.php" id="tempat">
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
}if($jenis=="Jenis Kelamin"){
  ?><div class="panel panel-info">
          <div class="panel-heading-none">
          </div>
          <div class="panel-body">
          <form method="POST" action="filter_pendudukJk.php" id="nik">
          <div class="form-group form-group-sm">
             <input type="hidden" class="form-control" name="txtfilter" id="txtfilter" value="Jenis Kelamin">
                  <div class="form-group form-group-sm">
                    <label class="control-label col-sm-2">Jenis Kelamin</label>
                    <div class="col-sm-7">
                    <input type="radio"  name="rbjk" class="form control" id="laki" value="Laki-Laki">Laki-Laki
                    <input type="radio"  name="rbjk" class="form control" id="perempuan" value="Perempuan">Perempuan
                
              
                
             
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
          <form method="POST" action="filter_pendudukPerAlamat.php" id="tempat">
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
          <form method="POST" action="filter_pendudukPerKelurahan.php" id="tempat">
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
}if($jenis=="Agama"){
  ?><div class="panel panel-info">
          <div class="panel-heading-none">
          </div>
          <div class="panel-body">
          <form method="POST" action="filter_pendudukPerAgama.php" id="agama">
           <div class="form-group form-group-sm">
                  <label class=" control-label col-sm-2" for="txtcari">Agama</label>
                   <div class="col-sm-3">
                    <select name="txtcari" class="form-control" id="txtcari" required>
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
                 <div class="col-sm-3">
              <input type="hidden" class="form-control" name="txtfilter" id="txtfilter" value="Agama">
              <div class="col-sm-3">
                <input type="submit" align="right" class="btn btn-danger"  value="Cari" name="cari" id="cari">
</div>
</div>
</form>
<?php
}if($jenis=="Status Perkawinan"){
  ?><div class="panel panel-info">
          <div class="panel-heading-none">
          </div>
          <div class="panel-body">
          <form method="POST" action="filter_pendudukPerStatus.php" id="status">
            <div class="form-group form-group-sm">
                  <label class=" control-label col-sm-2" for="txtcari">Status Perkawinan</label>
                   <div class="col-sm-3">
                    <select name="txtcari" class="form-control" id="txtcari" required>
                    <option value="">--Pilih--</option>
                    <option value="Belum Kawin">Belum Kawin</option>
                    <option value="Kawin">Kawin</option>
                    <option value="Cerai Hidup">Cerai Hidup</option>
                    <option value="Cerai Mati">Cerai Mati</option> 
                    </select>
                  </div>
                 </div>
                 <input type="hidden" class="form-control" name="txtfilter" id="txtfilter" value="Status Perkawinan">
              <div class="col-sm-3">
                <input type="submit" align="right" class="btn btn-danger"  value="Cari" name="cari" id="cari">
</div>
</div>
</form>
<?php
}if($jenis=="Pekerjaan"){
  ?><div class="panel panel-info">
          <div class="panel-heading-none">
          </div>
          <div class="panel-body">
          <form method="POST" action="filter_pendudukPerPekerjaan.php" id="tempat">
          <div class="form-group form-group-sm">
                  <div class="form-group form-group-sm">
                    <label class=" control-label col-sm-2" for="txtcari">Pekerjaan</label>
                    <div class="col-sm-3">
                    <input type="text" class="form-control" name="txtcari" id="txtpekerjaan" placeholder="Masukan Pekerjaan" required>
                </div>
              </div>
              <input type="hidden" class="form-control" name="txtfilter" id="txtfilter" value="Pekerjaan">
              <div class="col-sm-3">
                <input type="submit" align="right" class="btn btn-danger"  value="Cari" name="cari" id="cari">
</div>
</div>
</form>
<?php
}if($jenis=="Pendidikan"){
  ?><div class="panel panel-info">
          <div class="panel-heading-none">
          </div>
          <div class="panel-body">
          <form method="POST" action="filter_pendudukPerPendidikan.php" id="txtcari">
          <div class="form-group form-group-sm">
                  <label class=" control-label col-sm-2" for="txtcari">Pendidikan</label>
                   <div class="col-sm-3">
                    <select name="txtcari" class="form-control" id="txtcari"required>
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
                  <input type="hidden" class="form-control" name="txtfilter" id="txtfilter" value="Pendidikan">
                <div class="col-sm-3">
                <input type="submit" align="right" class="btn btn-danger"  value="Cari" name="cari" id="cari">
</div>
</div>
</form>            
<?php
}if($jenis=="Gol Darah"){
  ?><div class="panel panel-info">
          <div class="panel-heading-none">
          </div>
          <div class="panel-body">
          <form method="POST" action="filter_pendudukPerGol.php" id="txtcari">
          <div class="form-group form-group-sm">
               <label class=" control-label col-sm-2" for="txtcari">Golongan Darah</label>
                   <div class="col-sm-3">
                    <select name="txtcari" class="form-control" id="txtcari"required>
                    <option value="">--Pilih--</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="AB">AB</option>
                    <option value="O">O</option> 
                    </select>
                  </div>
                 </div>
                 <input type="hidden" class="form-control" name="txtfilter" id="txtfilter" value="Golongan Darah">
                <div class="col-sm-3">
                <input type="submit" align="right" class="btn btn-danger"  value="Cari" name="cari" id="cari">
</div>
</div>
</form>
<?php
}if($jenis=="Nomor Telphone"){
  ?><div class="panel panel-info">
          <div class="panel-heading-none">
          </div>
          <div class="panel-body">
          <form method="POST" action="filter_pendudukPerTelp.php" id="tempat">
          <div class="form-group form-group-sm">
                  <div class="form-group form-group-sm">
                    <label class=" control-label col-sm-2" for="txtcari">Nomor Telphone</label>
                    <div class="col-sm-3">
                    <input type="number" class="form-control" name="txtcari" id="txtcari" required>
                </div>
              </div>
              <input type="hidden" class="form-control" name="txtfilter" id="txtfilter" value="Nomor Telphone">
              <div class="col-sm-3">
                <input type="submit" align="right" class="btn btn-danger"  value="Cari" name="cari" id="cari">
</div>
</div>
</form>
<?php
}
    }
        ?>