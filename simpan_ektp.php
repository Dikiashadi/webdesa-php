 <?php
  require_once('koneksi.php');

       if(@$_POST['simpan']){

       //Mengambil data dari form tambah staff
       	$no=mysqli_real_escape_string($koneksi,$_POST['txtno']);
        $nik=mysqli_real_escape_string($koneksi,$_POST['txtnik']);
       	$jenis=mysqli_real_escape_string($koneksi,$_POST['cbjenis']);
       	$penyerahan=mysqli_real_escape_string($koneksi,$_POST['txt_tglpenyerahan']);
       	$rekam=mysqli_real_escape_string($koneksi,$_POST['txt_tglrekam']);
       	
       	$perintah="INSERT INTO tb_permohonanktp (no_permohonanKtp,nik,jenisPermohonan,tgl_penyerahanBerkas,tglRekam,tgl_pengambilan,status) VALUES('$no','$nik','$jenis','$penyerahan','$rekam','','Belum Diambil')";
	$aksi=mysqli_query($koneksi,$perintah) or die (mysqli_error($koneksi));

	if($aksi){
		echo"<script>alert('Berhasil disimpan')</script>";
		echo"<script>location='tampil_ektp.php';</script>";
	
	}else{
		echo "Error:".$perintah."<br>".mysqli_error($koneksi);
	}
}