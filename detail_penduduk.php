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
              <li class="active"> Detail Penduduk</li>
            </ol>
          </div>
      </div>
 <?php
          if(isset($_GET['id'])){

          $id=($_GET['id']);

          
         $s="SELECT * FROM tb_penduduk WHERE id_penduduk='$id'";
           
          $da=mysqli_query($koneksi,$s)or die (mysqli_error($s));
        
           $data=mysqli_fetch_assoc($da);
        ?>
      </div>
      <div class="container">
        <div class="row row-table">
          <div class="col-md-3 col-table">
          <div class="panel panel-info">
            <div class="panel-heading" style="align:center;">
              
            </div>
            <div class="panel-body">
               <?php echo"<img src='assets/foto/penduduk/".$data['foto']."' float='right' width='200' height='250'>";?>
              <div></div>

         </div>
       </div>
     </div>
      
          <div class="container">
        <div class="row row-table">
          <div class="col-md-4 col-table">
          <div class="panel panel-info">
					<div class="panel-heading ">
            Data Pribadi Penduduk
					</div>
					<div class="panel-body">
          
       
              <table class="table table-striped" >
          <tr >
           
            <td>NIK</td>
            <td> : </td>
            <td><?php echo $data['nik']?></td>
          </tr>
            <td>Nama Penduduk </td>
            <td> : </td>
            <td><?php echo $data['nama']?></td>
          </tr>
          <tr>
            <td>Tempat, Tanggal Lahir</td>
            <td> : </td>
            <td><?php echo $data['tempatLahir']?> , <?php echo $data['tanggalLahir']?> </td>
          </tr>
          <tr>
            <td>Jenis Kelamin </td>
            <td> : </td>
            <td><?php echo $data['jenisKelamin']?></td>
          </tr>
          <tr>
            <td>Alamat </td>
            <td> : </td>
            <td><?php echo $data['alamat']." RT.".$data['rt']." RW.".$data['rw']." Kelurahan ".$data['kelurahan']." Kecamatan Bumigora Kota Bumigora" ?></td>
          </tr>
             
        </table>

     </div>
     </div>
     </div>

          <div class="container">
        <div class="row row-table">
          <div class="col-md-4 col-table">
          <div class="panel panel-info">
          <div class="panel-heading-none">
            
          </div>
          <div class="panel-body">
          
       
              <table class="table table-striped" >
          <tr >
            <td>Agama</td>
            <td> : </td>
            <td><?php echo $data['agama']?></td>
          </tr>
          <tr >
            <td>Pendidikan</td>
            <td> : </td>
            <td><?php echo $data['pendidikan']?></td>
          </tr>
          <tr >
            <td>Pekerjaan</td>
            <td> : </td>
            <td><?php echo $data['pekerjaan']?></td>
          </tr>
          <tr >
            <td>Status Perkawinan</td>
            <td> : </td>
            <td><?php echo $data['statusPerkawinan']?></td>
          </tr>
           <td>Golongan Darah</td>
            <td> : </td>
            <td><?php echo $data['golDarah']?></td>
          </tr>
          <tr >
            <td>Nomor Telphone</td>
            <td> : </td>
            <td><?php echo $data['nomorTlp']?></td>
          </tr>
       

     </div>
     </div>
     </div>
<?php
}
?>