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
            </ol>
          </div>
      </div>
       <div class="panel panel-info">
          <div class="panel-heading-none">
          </div>
          <div class="panel-body">
          <form method="POST" action="" id="cariStaff">
          <div class="form-group form-group-sm">
                 
                <div class="form-group form-group-sm">
                   
                    <div class="col-sm-4">
                    <input type="text" class="form-control" name="txtcari" id="txtcari" placeholder=" NIP atau Nama Staff atau Jabatan">
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
                  <th>NIP</th>
                  <th>Nama Staff</th>
                  <th>Jenis Kelamin</th>
                   <th>Tanggal Lahir</th>
                  <th>Alamat</th>
                  <th>Jabatan</th>
                   <th>Nomor Telphone</th>
                  <th>Foto</th>
                 <th><a href="tambah_staff.php" type="button" align="right" class="btn btn-success">Tambah Data</a></th>
                </tr>
 <?php
      if(!ISSET($_POST['cari'])){
        $no= 1;
       $query="SELECT * FROM tb_staff";
        $data=mysqli_query($koneksi,$query);
        if(mysqli_num_rows($data) > 0){

          while($row=mysqli_fetch_assoc($data)){
        
      ?>
                <tr>
                  <td align="center"><?php echo $no++; ?></td>
                  <td><?php echo $row['nip']; ?></td>
                  <td><?php echo $row['nama']; ?></td>
                  <td><?php echo $row['jenis_kelamin']; ?></td>
                  <td><?php echo $row['tgl_lahir']; ?></td>
                  <td><?php echo $row['alamat']; ?></td>
                  <td><?php echo $row['jabatan']; ?></td>
                  <td><?php echo $row['no_tlp']; ?></td>
                   <?php echo"<td><img src='assets/foto/staff/".$row['foto']."' width='50' height='50'></td>";?>
  
                   <td colspan="2" style="text-align: center;">
                    <a   href="edit_staff.php?id=<?php echo $row['id'];?>" type="button" class="btn btn-info btn-xs"><i class="fa fa-edit"></i>Edit</a>
                     <a   href="detail_staff.php?id=<?php echo $row['id'];?>" type="button" class="btn btn-warning btn-xs">Detail</a>
                      
                    <a onclick="return confirm('Anda Yakin akan menghapus data?')" href="hapus_staff.php?id=<?php echo $row['id'];?>" type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>Hapus</a>
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
        $perintah="SELECT * FROM tb_staff WHERE nip LIKE '%$cari%' OR nama LIKE '%$cari%' OR jabatan LIKE '%$cari%'" ;
         $da=mysqli_query($koneksi,$perintah)or die (mysqli_error($koneksi));;
        
          if(mysqli_num_rows($da) > 0){
           while($r=mysqli_fetch_assoc($da)){
        ?>
        
         <tr>
                  <td align="center"><?php echo $no++; ?></td>
                  <td><?php echo $r['nip']; ?></td>
                  <td><?php echo $r['nama']; ?></td>
                  <td><?php echo $r['jabatan']; ?></td>
                   <?php echo"<td><img src='assets/img/siswa/".$r['foto']."' width='50' height='50'></td>";?>

  
                   <td colspan="2" style="text-align: center;">
                    <a   href="edit_staff.php?id=<?php echo $r['nip'];?>" type="button" class="btn btn-info btn-xs"><i class="fa fa-edit"></i>Edit</a>
                    <a   href="detail_staff.php?id=<?php echo $row['nip'];?>" type="button" class="btn btn-warning btn-xs">Detail</a>
                      
                    <a onclick="return confirm('Anda Yakin akan menghapus data?')" href="hapus_staff.php?id=<?php echo $r['nip'];?>" type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>Hapus</a>
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
     echo"<script>location='staff.php';</script>";
   }
  }


  ?>




