<?php
  require_once('koneksi.php');

       if(@$_POST['simpan']){

       //Mengambil data dari form tambah staff
       	$no=mysqli_real_escape_string($koneksi,$_POST['txtno']);
        $nik=mysqli_real_escape_string($koneksi,$_POST['txtnik']);
       	$nokk=mysqli_real_escape_string($koneksi,$_POST['txtnokk']);
        $tgl=mysqli_real_escape_string($koneksi,$_POST['txt_tglpermohonan']);
       	$sekolah=mysqli_real_escape_string($koneksi,$_POST['txtsekolah']);
       	$ket=mysqli_real_escape_string($koneksi,$_POST['txtketerangan']);
       	
       	$perintah="INSERT INTO tb_sktmpendidikan (no_sktmPendidikan,tgl_sktmPendidikan,nik,sekolah_tujuan,no_kk,keterangan) VALUES('$no','$tgl','$nik','$sekolah','$nokk','$ket')";
	$aksi=mysqli_query($koneksi,$perintah) or die (mysqli_error($koneksi));

	if($aksi){
		echo"<script>alert('Berhasil disimpan')</script>";
		echo"<script>location='tampil_sktmpendidikan.php';</script>";
	
	}else{
		echo "Error:".$perintah."<br>".mysqli_error($koneksi);
	}
}