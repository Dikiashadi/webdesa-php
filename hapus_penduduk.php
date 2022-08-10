<?php
require_once('koneksi.php');

$id=mysqli_real_escape_string($koneksi,$_GET['id']);

$caripoto="SELECT * FROM tb_penduduk where id_penduduk='$id'";
$sql=mysqli_query($koneksi,$caripoto);
$data=mysqli_fetch_array($sql);

unlink("assets/foto/penduduk/".$data['foto']);

$aksi=mysqli_query($koneksi,"delete from tb_penduduk where id_penduduk='$id'") or die (mysqli_error($koneksi));



header("location:penduduk.php");

?>