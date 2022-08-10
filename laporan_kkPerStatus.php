<?php
require('assets/phpfpdf/fpdf.php');
include'koneksi.php';

class PDF extends FPDF
{
  function Header(){
    //logo
    $this->Image('assets/logo/logo.png',80,12,27);
     
     //geser kanan 35 mm
     $this->Cell(95);
     //judul
     $this->SetFont('Arial','B',16);
     $this->Cell(100,7,'PEMERINTAH KOTA BUMIGORA',0,1,'L');
      $this->Cell(102);
     $this->SetFont('Arial','B',16);
     $this->Cell(100,7,'KECAMATAN BUMIGORA',0,1,'L');
     
     $this->Cell(94);
     $this->SetFont('Arial','i',10  );
     $this->Cell(90,7,'Jl.BUMIGORA',0,1,'L');
     //garis bawah double
     $this->Cell(270,1,'','B',1,'L');
     $this->Cell(270,1,'','B',0,'L');

     //line break 5mm
     
      //memberikan jarak agar tidak rapat
        $this->Cell(10,7,'',0,1);
        

  }
  function Footer(){
    
    $this->SetY(-15);
    $this->SetFont('Arial','I',8);
    //page number
    $this->Cell(0,10,'Page'.$this->PageNo().'/{nb}',0,0,'C');
  } 
  
}
//instance objek dan memberikan pengaturan halaman pdf
$pdf=new PDF('L','mm','A4');
$pdf->AliasNbPages();
$pdf->SetMargins(15,15,15);
$pdf->AddPage();
  $pdf->SetFont('Arial','B','16');

       if(@$_POST['cetak']){

       //Mengambil data dari form tambah staff
        $filter=mysqli_real_escape_string($koneksi,$_POST['txtfilter']);
        $pencarian=mysqli_real_escape_string($koneksi,$_POST['txtpencarian']);

  $pdf->SetFont('Arial','B','16');
      $pdf->Cell(270,7,'Laporan Permohonan KK Berdasarkan',0,1,'C');
      $pdf->Cell(270,7,$filter.' / '.$pencarian,0,1,'C');
       
       
        
//-------------Select data di database------------------------------
$no=1;
$pdf->SetFont('Arial','B','10');

$kasus=mysqli_query($koneksi,"SELECT * FROM tb_permohonankk as k JOIN tb_penduduk as p ON k.nik=p.nik WHERE status='$pencarian' ORDER BY no_permohonankk ASC") or die (mysqli_error($koneksi)) ;

while($row=mysqli_fetch_array($kasus)){

$pdf->Cell(270,1,'','B',1,'L');
$pdf->SetFont('Arial','','10');
$pdf->Cell(20);
$pdf->Cell(10,8,$no++.'.',0);

$pdf->Cell(40,8,'No Permohonan KK',0);
$pdf->Cell(10,8,':',0);
$pdf->Cell(30,8,$row['no_permohonankk'],0,0);

$pdf->Cell(45);
$pdf->Cell(40,8,'Tanggal Permohonan',0);
$pdf->Cell(10,8,' :',0);
$pdf->Cell(30,8,$row['tglPermohonan'],0,1);
$pdf->Cell(270,0.5,'','B',1,'L');

$pdf->Cell(30);
$pdf->Cell(40,8,'NIK',0);
$pdf->Cell(10,8,':',0);
$pdf->Cell(30,8,$row['nik'],0,0);

$pdf->Cell(45);
$pdf->Cell(40,8,'Jenis Permohonan',0);
$pdf->Cell(10,8,' :',0);
$pdf->Cell(30,8,$row['jenisPermohonan'],0,1);


$pdf->Cell(30);
$pdf->Cell(39,8,'Nama',0);
$pdf->Cell(10,8,' :',0);
$pdf->Cell(30,8,$row['nama'],0,0);

$pdf->Cell(46);
$pdf->Cell(41,8,'Tanggal Cetak',0);
$pdf->Cell(10,8,':',0);
$pdf->Cell(30,8,$row['tgl_cetak'],0,1);

$pdf->Cell(30);
$pdf->Cell(39,8,'Alamat',0);
$pdf->Cell(10,8,' :',0);
$pdf->Cell(50,8,$row['alamat'],0,0);

$pdf->Cell(26);
$pdf->Cell(40,8,'Nomor KK',0);
$pdf->Cell(10,8,' :',0);
$pdf->Cell(30,8,$row['nomor_kk'],0,1);

$pdf->Cell(79);
$pdf->Cell(39,8, 'RT. '.$row['rt']." RW. ".$row['rw'],0,0);

$pdf->Cell(37);
$pdf->Cell(40,8,'Status',0);
$pdf->Cell(10,8,' :',0);
$pdf->Cell(80,8,$row['status'],0,1);

$pdf->Cell(79);
$pdf->Cell(39,8,'Kelurahan '.$row['kelurahan'],0,0);

$pdf->Cell(37);
$pdf->Cell(40,8,'Tanggal Pengambilan',0);
$pdf->Cell(10,8,' :',0);
$pdf->Cell(35,8,$row['tgl_pengambilan'],0,1);

$pdf->Cell(79);
$pdf->Cell(39,8,'Kecamatan Bumigora',0,0);

$pdf->Cell(37);
$pdf->Cell(40,8,'Nama Pengambilan',0);
$pdf->Cell(10,8,' :',0);
$pdf->Cell(30,8,$row['nama_pengambil'],0,1);


$pdf->Cell(79);
$pdf->Cell(39,8,'Kota Bumigora',0,1);


}
}
$pdf->Cell(270,0.5,'','B',1,'L');
//tanda tangan
$tgl=date("d F Y");
$pdf->Ln(20);
      $pdf->SetFont('Arial','B',9);
      $pdf->Cell(220);
     $pdf->Cell(30,5,'Bumigora, '.$tgl,0,1,'C');
     $pdf->SetFont('Arial','B',9);
     $pdf->Cell(220);
     $pdf->Cell(30,7,'Camat Bumigora,',0,1,'C');
     $pdf->Ln(15);
     $pdf->SetFont('Arial','B',9);
     $pdf->Cell(220);
     $pdf->Cell(30,4,'Bumigora',0,1,'C');
     $pdf->Cell(220);
     $pdf->Cell(38,0.5,'','B',1,'L');
     $pdf->Cell(220);
      $pdf->SetFont('Arial','B',9);
       $pdf->Cell(30,4,'NIP.19600131189738838',0,1,'C');  

$pdf->Output();

?>