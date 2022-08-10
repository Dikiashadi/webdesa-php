<?php
  require_once('koneksi.php');

       if(@$_POST['simpan']){

       //Mengambil data dari form tambah staff
       	$no=mysqli_real_escape_string($koneksi,$_POST['txtno']);
        $nik=mysqli_real_escape_string($koneksi,$_POST['txtnik']);
       	$nokk=mysqli_real_escape_string($koneksi,$_POST['txtnokk']);
        $tgl=mysqli_real_escape_string($koneksi,$_POST['txt_tglpermohonan']);
       	
       	
       	
       	$perintah="INSERT INTO tb_sktmkesehatan (no_sktmkesehatan,nik,nomor_kk,tgl) VALUES('$no','$nik','$nokk','$tgl')";
	$aksi=mysqli_query($koneksi,$perintah) or die (mysqli_error($koneksi));

	if($aksi){
		echo"<script>alert('Berhasil disimpan')</script>";
		echo"<script>location='tampil_sktmkesehatan.php';</script>";
	
	}else{
		echo "Error:".$perintah."<br>".mysqli_error($koneksi);
	}
}