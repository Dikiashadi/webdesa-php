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
            </ol>
          </div>
      </div>
       <div class="panel panel-info">
          <div class="panel-heading-none">
          </div>
          <div class="panel-body">
          <form method="POST" action="" id="cariPenduduk">
          <div class="form-group form-group-sm">
                 
                <div class="form-group form-group-sm">
                   
                    <div class="col-sm-5">
                    <input type="text" class="form-control" name="txtcari" id="txtcari" placeholder="silahkan cari berdasarakan NIK atau Nama Penduduk">
                </div>
         
         
                    <input type="submit" align="right" class="btn btn-success"  value="Cari" name="cari" id="cari">
                    
                </div>
              </div>
</div>
</form>
 </div>
          

            <div class="table-responsive-sm">
              <table class="table table-bordered table-hover table-striped">
                <tr>
                  <th>NO</th>
                  <th>NIK</th>
                  <th>Nama</th>
                  <th>Tempat, Tanggal Lahir</th>
                  <th>Jenis Kelamin</th>
                  <th>Alamat</th>
                  <th>Foto</th>
                 <th><a href="tambah_penduduk.php" type="button" align="right" class="btn btn-success">Tambah Data</a></th>
                </tr>
 <?php
      if(!ISSET($_POST['cari'])){
        $no= 1;
       $query="SELECT * FROM tb_penduduk";
        $data=mysqli_query($koneksi,$query);
        if(mysqli_num_rows($data) > 0){

          while($row=mysqli_fetch_assoc($data)){
        
      ?>
                <tr>
                  <td align="center"><?php echo $no++; ?></td>
                  <td><?php echo $row['nik']; ?></td>
                  <td><?php echo $row['nama']; ?></td>
                  <td><?php echo $row['tempatLahir'].", ".$row['tanggalLahir']; ?></td>
                  <td><?php echo $row['jenisKelamin']; ?></td>
                  <td><?php echo $row['alamat']." RT.".$row['rt']." RW.".$row['rw']." Kelurahan ".$row['kelurahan']." Kecamatan Bumigora Kota Bumigora"; ?></td>
                 
                  <?php echo"<td><img src='assets/foto/penduduk/".$row['foto']."' width='50' height='50'></td>";?>
  
                   <td colspan="2" style="text-align: center;">
                    <a   href="edit_penduduk.php?id=<?php echo $row['id_penduduk'];?>" type="button" class="btn btn-info btn-xs"><i class="fa fa-edit"></i>Edit</a>
                     <a   href="detail_penduduk.php?id=<?php echo $row['id_penduduk'];?>" type="button" class="btn btn-warning btn-xs">Detail</a>
                      
                    <a onclick="return confirm('Anda Yakin akan menghapus data?')" href="hapus_penduduk.php?id=<?php echo $row['id_penduduk'];?>" type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>Hapus</a>
                    </td>
                </tr>
               
          <?php
          }
        }
      }
       ?>  
                  
        <?php
       if(ISSET($_POST['cari'])){
         $no= 1;
        $cari=mysqli_real_escape_string($koneksi,$_POST['txtcari']);
        $perintah="SELECT * FROM tb_penduduk WHERE nik LIKE '%$cari%' OR nama LIKE '%$cari%' "   ;
         $da=mysqli_query($koneksi,$perintah)or die (mysqli_error($koneksi));;
        
          if(mysqli_num_rows($da) > 0){
           while($r=mysqli_fetch_assoc($da)){
        ?>
        
         <tr>
                  <td align="center"><?php echo $no++; ?></td>
                  <td><?php echo $r['nik']; ?></td>
                  <td><?php echo $r['nama']; ?></td>
                 <td><?php echo $r['tempatLahir'].", ".$r['tanggalLahir']; ?></td>
                  <td><?php echo $r['jenisKelamin']; ?></td>
                  <td><?php echo $r['alamat']." RT.".$r['rt']." RW.".$r['rw']." Kelurahan ".$r['kelurahan']." Kecamatan Lengkong Kota Bandung"; ?></td>
                
                   <?php echo"<td><img src='assets/foto/penduduk/".$r['foto']."' width='50' height='50'></td>";?>
  
                   <td colspan="2" style="text-align: center;">
                    <a   href="edit_penduduk.php?id=<?php echo $r['id_penduduk'];?>" type="button" class="btn btn-info btn-xs"><i class="fa fa-edit"></i>Edit</a>
                     <a   href="detail_penduduk.php?id=<?php echo $r['id_penduduk'];?>" type="button" class="btn btn-warning btn-xs">Detail</a>
                      
                    <a onclick="return confirm('Anda Yakin akan menghapus data?')" href="hapus_penduduk.php?id=<?php echo $r['id_penduduk'];?>" type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>Hapus</a>
                    </td>
                </tr>
       <?php
       }
       ?>   
           </table>  
        </div> 
          <?php
    

  }else{
    
     echo"<script>alert('Maaf data tidak ditemukan!')</script>";
     echo"<script>location='penduduk.php';</script>";
   }
  }


  ?>




