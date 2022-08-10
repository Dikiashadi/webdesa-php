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

 
                      $query="SELECT * FROM tb_staff where id='$id'";
                      $result=mysqli_query($koneksi,$query);
                      if(!$result){
                        die("query error:".mysqli_errno($koneksi)."-".mysqli_error($koneksi));
                      }


                      $data=mysqli_fetch_assoc($result);
                      $jabatan=$data["jabatan"];
                     
                  }else{
                    //apabila tidak ada GET id akan di redirect ke jurusan.php
                    header("location:staff.php");
                  }
                  

include"header.php";
?>

<div id="page-wrapper">

<div class="row" id="contentInput" >
          <div class="col-lg-12">
            <h1>Staff</h1>
            <ol class="breadcrumb">
              <li class="active"> Master Data</li>
              <li class="active">Staff</li>
              <li class="active">Edit Data Staff</li>
            </ol>
          </div>
      </div>
<form  action="" class="form-horizontal" method="POST" enctype="multipart/form-data">
                  <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $data['id'];?>">
                  <div class="form-group form-group-sm">

                    <label class=" control-label col-sm-3" for="txtnip" control-label">NIP</label>
                    <div class="col-sm-2">
                    <input type="text" class="form-control" name="txtnip" id="txtnip" value="<?php echo $data['nip'];?>" required >
                </div>
              </div>
                 <div class="form-group form-group-sm">
                    <label class="control-label col-sm-3">Nama Staff</label>
                    <div class="col-sm-4">
                    <input type="text" class="form-control" name="txtnama" id="txtnama" value="<?php echo $data['nama'];?>" required >
                </div>
              </div>
               <div class="form-group form-group-sm">
                    <label class="control-label col-sm-3">Jenis Kelamin</label>
                    <div class="col-sm-7">
                     <?php if($data['jenis_kelamin']=="Laki-Laki"){
                    echo"<input type='radio'  name='rbjk' class='form control' id='rbjk' value='Laki-Laki' checked='checked'>Laki-Laki";
                    echo"  <input type='radio'  name='rbjk' class='form control' id='perempuan' value='Perempuan'>Perempuan";}
                    else{
                      echo"<input type='radio'  name='rbjk' class='form control' id='rbjk' value='Laki-Laki'>Laki-Laki";
                    echo"  <input type='radio'  name='rbjk' class='form control' id='rbjk' value='Perempuan' checked='checked'>Perempuan";
                    }
                    ?>
                </div>
              </div>
              <div class="form-group form-group-sm">
                    <label class="control-label col-sm-3">Tempat Lahir</label>
                    <div class="col-sm-4">
                    <input type="text" class="form-control" name="txttempat" id="txttempat"   value="<?php echo $data['tempat_lahir'];?>" required>
                </div>
              </div>
                <div class="form-group form-group-sm">
                    <label class="control-label col-sm-3">Tanggal Lahir</label>
                    <div class="col-sm-4">
                    <input type="text" class="form-control" name="txttanggal" id="txttanggal" placeholder="yyyy-mm-dd" value="<?php echo $data['tgl_lahir'];?>"  required >
                </div>
              </div>
                <div class="form-group form-group-sm">
                    <label class="control-label col-sm-3">Alamat</label>
                    <div class="col-sm-4">
                    <textarea class="form-control" name="txtalamat" id="txtalamat"  required><?php echo $data['alamat'];?></textarea>
                </div>
              </div>
                <div class="form-group form-group-sm">
                  <label class=" control-label col-sm-3" for="cbjabatan">Jabatan</label>
                   <div class="col-sm-3">
                    <select name="cbjabatan" class="form-control" id="jabatan"required>
                     <option value="">Pilih</option>
                    <option value="Bagian Pelayanan"<?php if($jabatan=='Bagian Pelayanan'){echo 'selected';}?>>Bagian Pelayanan</option>
                    <option value="Kasi Pelayanan"<?php if($jabatan=='Kasi Pelayanan'){echo 'selected';}?>>Kasi Pelayanan</option>
                    <option value="Camat"<?php if($jabatan=='Camat'){echo 'selected';}?>>Camat</option>
                    </select>
                  </div>
                 </div>
                  <div class="form-group form-group-sm">
                    <label class="control-label col-sm-3">Nomor Telpon</label>
                    <div class="col-sm-4">
                    <input type="text" class="form-control" name="txtnotlp" id="txtnotlp" value="<?php echo $data['no_tlp'];?>"  required >
                </div>
              </div>
                 
              <div class="form-group form-group-sm">
                    <label class="control-label col-sm-3">Foto</label>
                    <div class="col-sm-5">
                       <h5 class="text-danger"> <input type="checkbox" name="ubah_foto" value="true" >Ceklis jika ingin merubah Foto</h4>
                    <input type="file" class="form-control" name="fotostaff" id="fotostaff">
                </div>
              </div>
                  
                <div class="form-group form-group=sm">
                    <center><button type="reset" align="right" class="btn btn-danger">Reset</button>
                    <input type="submit" align="right" class="btn btn-success"  value="Simpan" name="edit"></center>
                </div>
                
                </form>
<!-------------------------------------------UPDATE DI DATABASE--------------------------------------------->
<?php 
if(@$_POST['edit']){
  $id=mysqli_real_escape_string($koneksi,$_POST['id']);
  $nip=mysqli_real_escape_string($koneksi,$_POST['txtnip']);
  $nama=mysqli_real_escape_string($koneksi,$_POST['txtnama']);
  $tempat=mysqli_real_escape_string($koneksi,$_POST['txttempat']);
  $tanggal=mysqli_real_escape_string($koneksi,$_POST['txttanggal']);
  $jenisKel=mysqli_real_escape_string($koneksi,$_POST['rbjk']);
  $alamat=mysqli_real_escape_string($koneksi,$_POST['txtalamat']);
  $notlp=mysqli_real_escape_string($koneksi,$_POST['txtnotlp']);
  $jabatan=mysqli_real_escape_string($koneksi,$_POST['cbjabatan']);
 

//cek apakah user ingin merubah foto nya atau tidak
  if(@$_POST['ubah_foto']){

    $extensi=explode(".",$_FILES['fotostaff']['name']);
        $fotostaff="staffEdit-".$nip.".".end($extensi);
        $sumber=$_FILES['fotostaff']['tmp_name'];
        $upload=move_uploaded_file($sumber,"assets/foto/staff/".$fotostaff);

        if($upload){
          $caripoto="SELECT * FROM tb_staff where id='$id'";
          $sql=mysqli_query($koneksi,$caripoto);
          $data=mysqli_fetch_array($sql);
          unlink("assets/foto/staff/".$data['foto']);

          $perintah="UPDATE tb_staff SET nip='$nip', nama='$nama', jenis_kelamin='$jenisKel',tempat_lahir='$tempat',tgl_lahir='$tanggal',alamat='$alamat',no_tlp='$notlp', jabatan='$jabatan', foto='$fotostaff' WHERE id='$id'";

      $aksi=mysqli_query($koneksi,$perintah);

      if($aksi){
        echo"<script>alert('Berhasil dirubah')</script>";
          echo"<script>location='staff.php';</script>";
      }else{
        echo"Maaf, terjadi kesalahan saat mencoba menyimpan data ke database";
        echo"<br><a href='edit_staff.php'>Kembali</a>";
      }
    } else{
      echo"Maaf gambar gagal di upload.";
      echo"<br><a href='edit_staff.php'>Kembali</a>";
    }
  }else{
    $perintah="UPDATE tb_staff SET nip='$nip', nama='$nama',jenis_kelamin='$jenisKel',tempat_lahir='$tempat',tgl_lahir='$tanggal',alamat='$alamat',no_tlp='$notlp', jabatan='$jabatan' WHERE id='$id'";

      $aksi=mysqli_query($koneksi,$perintah);
      if($aksi){
        echo"<script>alert('Berhasil dirubah')</script>";
          echo"<script>location='staff.php';</script>";
          
      }else{
        die("Query gagal dijalankan:".mysqli_errno($koneksi)."-".mysqli_error($koneksi));
        echo"Maaf, terjadi kesalahan saat mencoba menyimpan data ke database";
        echo"<br><a href='edit_staff.php'>Kembali</a>";
      }
  }
}


?>




