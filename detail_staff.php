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
              <li class="active"> Detail Staff</li>
            </ol>
          </div>
      </div>
 <?php
          if(isset($_GET['id'])){

          $id=($_GET['id']);

          
         $s="SELECT * FROM tb_staff WHERE id='$id'";
           
          $da=mysqli_query($koneksi,$s)or die (mysqli_error($s));
        
           $data=mysqli_fetch_assoc($da);
        ?>
      </div>
      <div class="container">
        <div class="row row-table">
          <div class="col-md-3 col-table">
          <div class="panel panel-info">
            <div class="panel-heading" style="align:center;">
              Foto
            </div>
            <div class="panel-body">
               <?php echo"<img src='assets/foto/staff/".$data['foto']."' float='right' width='200' height='250'>";?>
              <div></div>

         </div>
       </div>
     </div>
      
          <div class="container">
        <div class="row row-table">
          <div class="col-md-5 col-table">
          <div class="panel panel-info">
					<div class="panel-heading">
            Detail Staff
					</div>
					<div class="panel-body">
          
       
              <table class="table table-hover" >
          <tr >
           
            <td>NIP</td>
            <td> : </td>
            <td><?php echo $data['nip']?></td>
          </tr>
          <tr>
            <td>Nama Staff </td>
            <td> : </td>
            <td><?php echo $data['nama']?></td>
          </tr>
          <tr>
            <td>Jenis Kelamin</td>
            <td> : </td>
            <td><?php echo $data['jenis_kelamin']?></td>
          </tr>
          <tr>
            <tr>
            <td>Tempat, Tanggal lahir</td>
            <td> : </td>
            <td><?php echo $data['tempat_lahir'].", ". $data['tgl_lahir']?></td>
          </tr>
          <tr>
            <td>Alamat</td>
            <td> : </td>
            <td><?php echo $data['alamat']?></td>
          </tr>
           <td>Nomor Telpon</td>
            <td> : </td>
            <td><?php echo $data['no_tlp']?></td>
          </tr>
            <td>Jabatan</td>
            <td> : </td>
            <td><?php echo $data['jabatan']?></td>
          </tr>
             
        </table>
       

     </div>
     </div>
     </div>
<?php
}

?>