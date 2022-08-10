<?php
  require_once('koneksi.php');

       if(@$_POST['simpan']){

       //Mengambil data dari form tambah staff
       	$no=mysqli_real_escape_string($koneksi,$_POST['txtno']);
        $nik=mysqli_real_escape_string($koneksi,$_POST['txtnik']);
       	$jenis=mysqli_real_escape_string($koneksi,$_POST['cbjenis']);
       	$permo=mysqli_real_escape_string($koneksi,$_POST['txt_permo']);
       
       	
       	$perintah="INSERT INTO tb_permohonankk (no_permohonankk,nik,jenisPermohonan,tglPermohonan,nomor_kk,tgl_cetak,tgl_pengambilan, nama_pengambil,status) VALUES('$no','$nik','$jenis','$permo','-','','','-','Belum Diambil')";
	$aksi=mysqli_query($koneksi,$perintah) or die (mysqli_error($koneksi));

	if($aksi){
		echo"<script>alert('Berhasil disimpan')</script>";
		echo"<script>location='tampil_kk.php';</script>";
	
	}else{
		echo "Error:".$perintah."<br>".mysqli_error($koneksi);
	}
}