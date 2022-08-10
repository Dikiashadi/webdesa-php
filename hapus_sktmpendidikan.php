<?php
require_once('koneksi.php');

$id=mysqli_real_escape_string($koneksi,$_GET['id']);



$aksi=mysqli_query($koneksi,"delete from tb_sktmpendidikan where no_sktmPendidikan='$id'");



header("location:tampil_sktmpendidikan.php");

?>