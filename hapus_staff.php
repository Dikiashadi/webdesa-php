<?php
require_once('koneksi.php');

$id=mysqli_real_escape_string($koneksi,$_GET['id']);

$caripoto="SELECT * FROM tb_staff where id='$id'";
$sql=mysqli_query($koneksi,$caripoto);
$data=mysqli_fetch_array($sql);

unlink("assets/foto/staff/".$data['foto']);

$aksi=mysqli_query($koneksi,"delete from tb_staff where id='$id'");



header("location:staff.php");

?>