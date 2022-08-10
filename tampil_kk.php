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
require'koneksi.php';

?>
 <div id="wrapper">
<?php 
include"header.php";
?>
</div>
<div id="page-wrapper">
<div class="row" id="contentInput" >
          <div class="col-lg-12">
            <h1>Permohonan Kartu Keluarga</h1>
            <ol class="breadcrumb">
              <li class="active">Permohonan Kartu Keluarga</li>
            </ol>
          </div>
      </div>
       <div class="panel panel-info">
          <div class="panel-heading-none">
          </div>
          <div class="panel-body">
          <form method="POST" action="" id="cariKK">
          <div class="form-group form-group-sm">
                 
                <div class="form-group form-group-sm">
                   
                    <div class="col-sm-6">
                    <input type="text" class="form-control" name="txtcari" id="txtcari" placeholder="silahkan cari berdasarakan No Permohonan atau NIK atau Nama Penduduk">
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
                  <th>NO Permohonan KK</th>
                  <th>NIK</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>Jenis Permohonan</th>
                  <th>Tanggal Permohonan</th>

                  <th>Nomor KK</th>
                  <th>Tanggal Cetak</th>
                  <th>Tanggal Pengambilan</th>
                   <th>Nama Pengambil</th>
                  <th>Status</th>
                 <th><a href="kk.php" type="button" align="right" class="btn btn-success">Tambah Data</a></th>
                </tr>
 <?php
     if(!ISSET($_POST['cari'])){
        $no= 1;
       $query="SELECT * FROM tb_permohonankk as p JOIN tb_penduduk as d ON p.nik=d.nik";
        $data=mysqli_query($koneksi,$query);
        if(mysqli_num_rows($data) > 0){

          while($row=mysqli_fetch_assoc($data)){
      ?>
                <tr>
                  <td align="center"><?php echo $no++; ?></td>
                  <td><?php echo $row['no_permohonankk']; ?></td>
                  <td><?php echo $row['nik']; ?></td>
                  <td><?php echo $row['nama']; ?></td>
                  <td><?php echo $row['alamat']." RT.".$row['rt']." RW.".$row['rw']." Kelurahan ".$row['kelurahan']." Kecamatan Bumigora Kota Bumigora"; ?></td>
                  <td><?php echo $row['jenisPermohonan']; ?></td>
                  <td><?php echo $row['tglPermohonan']; ?></td>
                  <td><?php echo $row['nomor_kk']; ?></td>
                  <td><?php echo $row['tgl_cetak']; ?></td>
                  <td><?php echo $row['tgl_pengambilan']; ?></td>
                  <td><?php echo $row['nama_pengambil']; ?></td>
                  <td><?php echo $row['status']; ?></td>
                   <td colspan="2" style="text-align: center;">
                    <a   href="print_ResiKk.php?id=<?php echo $row['no_permohonankk'];?>" type="button" class="btn btn-danger"><i class="fa fa-print"></i> Print Resi</a>
                    <a   href="register_kk.php?id=<?php echo $row['no_permohonankk'];?>" type="button" class="btn btn-info"><i class="fa fa-edit"></i>Register KK</a>
                    <a   href="pengambilan_kk.php?id=<?php echo $row['no_permohonankk'];?>" type="button" class="btn btn-warning"><i class="fa fa-edit"></i>Diambil</a>

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
        $perintah="SELECT * FROM tb_permohonankk as k JOIN tb_penduduk as d ON k.nik=d.nik WHERE no_permohonankk LIKE '%$cari%' OR nama LIKE '%$cari%'  OR k.nik LIKE '%$cari%' "   ;
         $da=mysqli_query($koneksi,$perintah)or die (mysqli_error($koneksi));;
        
          if(mysqli_num_rows($da) > 0){
           while($r=mysqli_fetch_assoc($da)){
        ?>
        
         <tr>
                  <td align="center"><?php echo $no++; ?></td>
                  <td><?php echo $r['no_permohonankk']; ?></td>
                  <td><?php echo $r['nik']; ?></td>
                  <td><?php echo $r['nama']; ?></td>
                  <td><?php echo $r['alamat']." RT.".$r['rt']." RW.".$r['rw']." Kelurahan ".$r['kelurahan']." Kecamatan Bumigora Kota Bumigora"; ?></td>
                  <td><?php echo $r['jenisPermohonan']; ?></td>
                  <td><?php echo $r['tglPermohonan']; ?></td>      
                  <td><?php echo $r['nomor_kk']; ?></td>
                  <td><?php echo $r['tgl_cetak']; ?></td>
                  <td><?php echo $r['tgl_pengambilan']; ?></td>
                  <td><?php echo $r['nama_pengambil']; ?></td>
                  <td><?php echo $r['status']; ?></td>
                   <td colspan="2" style="text-align: center;">
                    <a   href="print_ResiKk.php?id=<?php echo $r['no_permohonanKtp'];?>" type="button" class="btn btn-danger "><i class="fa fa-print"></i> Print Resi</a>
                    <a   href="register_kk.php?id=<?php echo $row['no_permohonankk'];?>" type="button" class="btn btn-info"><i class="fa fa-edit"></i>Register KK</a>
                    <a   href="pengambilan_ktp.php?id=<?php echo $r['no_permohonanKtp'];?>" type="button" class="btn btn-warning "><i class="fa fa-edit"></i>Diambil</a>
                    </tr>
       <?php
       }
       ?>   
           </table>  
        </div> 
          <?php
    

  }else{
    
     echo"<script>alert('Maaf data tidak ditemukan!')</script>";
     echo"<script>location='tampil_kk.php';</script>";
   }
  }


  ?>