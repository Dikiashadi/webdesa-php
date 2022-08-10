<?php
require_once('koneksi.php');

$id=mysqli_real_escape_string($koneksi,$_GET['id']);



$aksi=mysqli_query($koneksi,"delete from tb_sktmkesehatan where no_sktmkesehatan='$id'");



header("location:tampil_sktmkesehatan.php");

?>