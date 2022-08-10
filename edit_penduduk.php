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

 
                      $query="SELECT * FROM tb_penduduk where id_penduduk='$id'";
                      $result=mysqli_query($koneksi,$query);
                      if(!$result){
                        die("query error:".mysqli_errno($koneksi)."-".mysqli_error($koneksi));
                      }


                      $data=mysqli_fetch_assoc($result);
                      $kelurahan=$data["kelurahan"];
                      $agama=$data["agama"];
                      $status=$data["statusPerkawinan"];
                      $gol=$data["golDarah"];
                      $notlp=$data["nomorTlp"];
                      
                     
                  }else{
                    //apabila tidak ada GET id akan di redirect ke jurusan.php
                    header("location:penduduk.php");
                  }
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
              <li class="active">Edit Data Penduduk</li>
            </ol>
          </div>
      </div>
<form  action="" class="form-horizontal" method="POST" enctype="multipart/form-data">
                  <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $data['id_penduduk'];?>">
                  <div class="form-group form-group-sm">
                    <label class=" control-label col-sm-3" for="txtnik" control-label">NIK</label>
                    <div class="col-sm-2">
                    <input type="text" class="form-control" name="txtnik" id="txtnik" value="<?php echo $data['nik'];?>" required>
                </div>
              </div>
                 <div class="form-group form-group-sm">
                    <label class="control-label col-sm-3">Nama Penduduk</label>
                    <div class="col-sm-4">
                    <input type="text" class="form-control" name="txtnama" id="txtnama" value="<?php echo $data['nama'];?>" required >
                </div>
              </div>
              <div class="form-group form-group-sm">
                    <label class="control-label col-sm-3">Tempat Lahir</label>
                    <div class="col-sm-4">
                    <input type="text" class="form-control" name="txttempat" id="txttempat" value="<?php echo $data['tempatLahir'];?>"  required >
                </div>
              </div>
              <div class="form-group form-group-sm">
                    <label class="control-label col-sm-3">Tanggal Lahir</label>
                    <div class="col-sm-4">
                    <input type="text" class="form-control" name="txttanggal" id="txttanggal" placeholder="yyyy-mm-dd" value="<?php echo $data['tanggalLahir'];?>"  required >
                </div>
              </div>
               <div class="form-group form-group-sm">
                    <label class="control-label col-sm-3">Jenis Kelamin</label>
                    <div class="col-sm-7">
                     <?php if($data['jenisKelamin']=="Laki-Laki"){
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
                    <label class="control-label col-sm-3">Alamat</label>
                    <div class="col-sm-4">
                    <textarea class="form-control" name="txtalamat" id="txtalamat"  required><?php echo $data['alamat'];?></textarea>
                </div>
              </div>
               <div class="form-group form-group-sm">
                    <label class="control-label col-sm-3">RT</label>
                    <div class="col-sm-4">
                    <input type="text" class="form-control" name="txtrt" id="txtrt" value="<?php echo $data['rt'];?>"  required >
                </div>
              </div>
               <div class="form-group form-group-sm">
                    <label class="control-label col-sm-3">RW</label>
                    <div class="col-sm-4">
                    <input type="text" class="form-control" name="txtrw" id="txtrw" value="<?php echo $data['rw'];?>"  required >
                </div>
              </div>
                <div class="form-group form-group-sm">
                  <label class=" control-label col-sm-3" for="cbkelurahan">Kelurahaan</label>
                   <div class="col-sm-3">
                    <select name="cbkelurahan" class="form-control" id="jabatan"required>
                    <option value="">--Pilih--</option>
                    <option value="Bumigora" <?php if($kelurahan=='Bumigora'){echo 'selected';}?>>Bumigora</option>
                    <option value="Mataram" <?php if($kelurahan=='Mataram'){echo 'selected';}?>>Mataram</option>
                    <option value="Gerung" <?php if($kelurahan=='Gerung'){echo 'selected';}?>>Gerung</option>
                    <option value="Lembar" <?php if($kelurahan=='Lembar'){echo 'selected';}?>>Lembar</option>
                    </select >
                  </div>
                 </div>             
               <div class="form-group form-group-sm">
                  <label class=" control-label col-sm-3" for="cbagama">Agama</label>
                   <div class="col-sm-3">
                    <select name="cbagama" class="form-control" id="jabatan"required>
                    <option value="">--Pilih--</option>
                    <option value="Islam" <?php if($agama=='Islam'){echo 'selected';}?>>Islam</option>
                    <option value="Protestan" <?php if($agama=='Protestan'){echo 'selected';}?>>Protestan</option>
                    <option value="Katolik" <?php if($agama=='Katolik'){echo 'selected';}?>>Katolik</option>
                    <option value="Hindu" <?php if($agama=='Hindu'){echo 'selected';}?>>Hindu</option>
                    <option value="Buddha" <?php if($agama=='Buddha'){echo 'selected';}?>>Buddha</option>
                    <option value="Khonghucu" <?php if($agama=='Khonghucu'){echo 'selected';}?>>Khonghucu</option>
                    </select >
                  </div>
                 </div>
                 <div class="form-group form-group-sm">
                  <label class=" control-label col-sm-3" for="cbastatus">Status Perkawinan</label>
                   <div class="col-sm-3">
                    <select name="cbstatus" class="form-control" id="jabatan"required>
                    <option value="">--Pilih--</option>
                    <option value="Belum Kawin" <?php if($status=='Belum Kawin'){echo 'selected';}?>>Belum Kawin</option>
                    <option value="Kawin"<?php if($status=='Kawin'){echo 'selected';}?>>Kawin</option>
                    <option value="Cerai Hidup" <?php if($status=='Cerai Hidup'){echo 'selected';}?>>Cerai Hidup</option>
                    <option value="Cerai Mati" <?php if($status=='Cerai Mati'){echo 'selected';}?>>Cerai Mati</option> 
                    </select>
                  </div>
                 </div>
                 <div class="form-group form-group-sm">
                    <label class="control-label col-sm-3">Pekerjaan</label>
                    <div class="col-sm-4">
                    <input type="text" class="form-control" name="txtpekerjaan" id="txtpekerjaan" value="<?php echo $data['pekerjaan'];?>" required >
                </div>
              </div>
              <div class="form-group form-group-sm">
               <label class=" control-label col-sm-3" for="cbgol">Golongan Darah</label>
                   <div class="col-sm-3">
                    <select name="cbgol" class="form-control" id="cbgol"required>
                    <option value="">--Pilih--</option>
                    <option value="A" <?php if($gol=='A'){echo 'selected';}?>>A</option>
                    <option value="B" <?php if($gol=='B'){echo 'selected';}?>>B</option>
                    <option value="AB" <?php if($gol=='AB'){echo 'selected';}?>>AB</option>
                    <option value="O" <?php if($gol=='O'){echo 'selected';}?>>O</option> 
                    </select>
                  </div>
                 </div>
              <div class="form-group form-group-sm">
                    <label class="control-label col-sm-3">Nomor Telpon</label>
                    <div class="col-sm-4">
                    <input type="text" class="form-control" name="txtnotlp" id="txtnotlp" value="<?php echo $data['nomorTlp'];?>"  required >
                </div>
              </div>
                  <div class="form-group form-group-sm">
                    <label class="control-label col-sm-3">Foto</label>
                    <div class="col-sm-5">
                      <h5 class="text-danger"> <input type="checkbox" name="ubah_foto" value="true" >Ceklis jika ingin merubah Foto</h4>
                    <input type="file" class="form-control" name="fotopenduduk" id="fotopenduduk">
                </div>
              </div>
              
            <div class="form-group form-group=sm">
                    <center><button type="reset" align="right" class="btn btn-danger">Reset</button>
                    <input type="submit" align="right" class="btn btn-success"  value="Update" name="edit"></center>
                </div>
                
                </form>
<!-------------------------------------------UPDATE DI DATABASE--------------------------------------------->
<?php
  require_once('koneksi.php');

       if(@$_POST['edit']){

       //Mengambil data dari form tambah staff
        $nik=mysqli_real_escape_string($koneksi,$_POST['txtnik']);
        $nama=mysqli_real_escape_string($koneksi,$_POST['txtnama']);
        $tempat=mysqli_real_escape_string($koneksi,$_POST['txttempat']);
        $tanggal=mysqli_real_escape_string($koneksi,$_POST['txttanggal']);
        $jenisKel=mysqli_real_escape_string($koneksi,$_POST['rbjk']);
        $alamat=mysqli_real_escape_string($koneksi,$_POST['txtalamat']);
        $rt=mysqli_real_escape_string($koneksi,$_POST['txtrt']);
        $rw=mysqli_real_escape_string($koneksi,$_POST['txtrw']);
        $kelur=mysqli_real_escape_string($koneksi,$_POST['cbkelurahan']);
        $aga=mysqli_real_escape_string($koneksi,$_POST['cbagama']);
        $statusPer=mysqli_real_escape_string($koneksi,$_POST['cbstatus']);
        $peker=mysqli_real_escape_string($koneksi,$_POST['txtpekerjaan']);
        $golD=mysqli_real_escape_string($koneksi,$_POST['cbgol']);
        $notlp=mysqli_real_escape_string($koneksi,$_POST['txtnotlp']);

//cek apakah user ingin merubah foto nya atau tidak
  if(@$_POST['ubah_foto']){

    $extensi=explode(".",$_FILES['fotopenduduk']['name']);
        $fotopenduduk="pendudukEdit-".$nik.".".end($extensi);
        $sumber=$_FILES['fotopenduduk']['tmp_name'];
        $upload=move_uploaded_file($sumber,"assets/foto/penduduk/".$fotopenduduk);


    if($upload){
          $caripoto="SELECT * FROM tb_penduduk where id_penduduk='$id'";
          $sql=mysqli_query($koneksi,$caripoto);
          $data=mysqli_fetch_array($sql);
          unlink("assets/foto/penduduk/".$data['foto']);

          $perintah="UPDATE tb_penduduk SET nik='$nik', nama='$nama', tempatLahir='$tempat', tanggalLahir='$tanggal',jenisKelamin='$jenisKel', alamat='$alamat', rt='$rt', rw='$rw', kelurahan='$kelur', agama='$aga', statusPerkawinan='$statusPer', golDarah='$golD', nomorTlp='$notlp', foto='$fotopenduduk' WHERE id_penduduk='$id'";

      $aksi=mysqli_query($koneksi,$perintah);

      if($aksi){
        echo"<script>alert('Berhasil dirubah')</script>";
          echo"<script>location='penduduk.php';</script>";
      }else{
        echo"Maaf, terjadi kesalahan saat mencoba menyimpan data ke database";
        echo "Error:".$perintah."<br>".mysqli_error($koneksi);
        echo"<br><a href='edit_penduduk.php'>Kembali</a>";
      }
    } else{
      echo"Maaf gambar gagal di upload.";
      echo"<br><a href='edit_penduduk.php'>Kembali</a>";
    }
  }else{
    $perintah="UPDATE tb_penduduk SET nik='$nik', nama='$nama', tempatLahir='$tempat', tanggalLahir='$tanggal',jenisKelamin='$jenisKel', alamat='$alamat', rt='$rt', rw='$rw', kelurahan='$kelur', agama='$aga', statusPerkawinan='$statusPer', golDarah='$golD', nomorTlp='$notlp' WHERE id_penduduk='$id'";

      $aksi=mysqli_query($koneksi,$perintah);
      if($aksi){
        echo"<script>alert('Berhasil dirubah')</script>";
          echo"<script>location='penduduk.php';</script>";
          
      }else{
        die("Query gagal dijalankan:".mysqli_errno($koneksi)."-".mysqli_error($koneksi));
        echo"Maaf, terjadi kesalahan saat mencoba menyimpan data ke database";
        echo"<br><a href='edit_penduduk.php'>Kembali</a>";
      }
  }
}

