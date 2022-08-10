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
            <h1>Permohonan E-KTP</h1>
            <ol class="breadcrumb">
              <li class="active">Permohonan E-KTP</li>
            </ol>
          </div>
      </div>
       <div class="panel panel-info">
          <div class="panel-heading-none">
          </div>
          <div class="panel-body">
          <form method="POST" action="" id="cariEKTP">
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
                  <th>NO Permohonan E-KTP</th>
                  <th>NIK</th>
                  <th>Nama</th>
                  <th>Tempat,Tanggal Lahir</th>
                  <th>Alamat</th>
                  <th>Jenis Permohonan</th>
                  <th>Tanggal Penyerahan Berkas</th>
                  <th>Tanggal Rekam</th>
                  <th>Foto</th>
                  <th>Tanggal Pengambilan</th>
                  <th>Status</th>
                 <th><a href="ektp.php" type="button" align="right" class="btn btn-success">Tambah Data</a></th>
                </tr>
 <?php
     if(!ISSET($_POST['cari'])){
        $no= 1;
       $query="SELECT * FROM tb_permohonanKtp as p JOIN tb_penduduk as d ON p.nik=d.nik";
        $data=mysqli_query($koneksi,$query);
        if(mysqli_num_rows($data) > 0){

          while($row=mysqli_fetch_assoc($data)){
      ?>
                <tr>
                  <td align="center"><?php echo $no++; ?></td>
                  <td><?php echo $row['no_permohonanKtp']; ?></td>
                  <td><?php echo $row['nik']; ?></td>
                  <td><?php echo $row['nama']; ?></td>
                  <td><?php echo $row['tempatLahir'].", ".$row['tanggalLahir']; ?></td>
                  <td><?php echo $row['alamat']." RT.".$row['rt']." RW.".$row['rw']." Kelurahan ".$row['kelurahan']." Kecamatan Bumigora Kota Bumigora"; ?></td>
                  <td><?php echo $row['jenisPermohonan']; ?></td>
                  <td><?php echo $row['tgl_penyerahanBerkas']; ?></td>
                  <td><?php echo $row['tglRekam']; ?></td>
                  
                   <?php echo"<td><img src='assets/foto/penduduk/".$row['foto']."' width='50' height='50'></td>";?>
                    <td><?php echo $row['tgl_pengambilan']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                   <td colspan="2" style="text-align: center;">
                    <a   href="print_ResiKtp.php?id=<?php echo $row['no_permohonanKtp'];?>" type="button" class="btn btn-info"><i class="fa fa-print"></i> Print Resi</a>
                    <a   href="print_SuketEktp.php?id=<?php echo $row['no_permohonanKtp'];?>" type="button" class="btn btn-danger"><i class="fa fa-print"></i> Print Suket</a>
                    <a   href="pengambilan_ktp.php?id=<?php echo $row['no_permohonanKtp'];?>" type="button" class="btn btn-warning"><i class="fa fa-edit"></i>Diambil</a>

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
        $perintah="SELECT * FROM tb_permohonanKtp as k JOIN tb_penduduk as d ON k.nik=d.nik WHERE no_permohonanKtp LIKE '%$cari%' OR nama LIKE '%$cari%'  OR k.nik LIKE '%$cari%' "   ;
         $da=mysqli_query($koneksi,$perintah)or die (mysqli_error($koneksi));;
        
          if(mysqli_num_rows($da) > 0){
           while($r=mysqli_fetch_assoc($da)){
        ?>
        
         <tr>
                  <td align="center"><?php echo $no++; ?></td>
                  <td><?php echo $r['no_permohonanKtp']; ?></td>
                  <td><?php echo $r['nik']; ?></td>
                  <td><?php echo $r['nama']; ?></td>
                  <td><?php echo $r['tempatLahir'].", ".$r['tanggalLahir']; ?></td>
                  <td><?php echo $r['alamat']." RT.".$r['rt']." RW.".$r['rw']." Kelurahan ".$r['kelurahan']." Kecamatan Lengkong Kota Bandung"; ?></td>
                  <td><?php echo $r['jenisPermohonan']; ?></td>
                  <td><?php echo $r['tgl_penyerahanBerkas']; ?></td>
                  <td><?php echo $r['tglRekam']; ?></td>
                  
                   <?php echo"<td><img src='assets/foto/penduduk/".$r['foto']."' width='50' height='50'></td>";?>
                    <td><?php echo $r['tgl_pengambilan']; ?></td>
                    <td><?php echo $r['status']; ?></td>
                   <td colspan="2" style="text-align: center;">
                    <a   href="print_ResiEktp.php?id=<?php echo $r['no_permohonanKtp'];?>" type="button" class="btn btn-danger "><i class="fa fa-print"></i> Print</a>
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
     echo"<script>location='tampil_Ektp.php';</script>";
   }
  }


  ?>