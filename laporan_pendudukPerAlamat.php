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


       if(@$_POST['cetak']){

       //Mengambil data dari form tambah staff
        $filter=mysqli_real_escape_string($koneksi,$_POST['txtfilter']);
        $pencarian=mysqli_real_escape_string($koneksi,$_POST['txtpencarian']);

  $pdf->SetFont('Arial','B','16');
      $pdf->Cell(270,7,'Laporan Penduduk Berdasarkan',0,1,'C');
      $pdf->Cell(270,7,$filter.' / '.$pencarian,0,1,'C');
//-------------Select data di database------------------------------
$no=1;
$pdf->SetFont('Arial','','10');

$kasus=mysqli_query($koneksi,"SELECT * FROM tb_penduduk WHERE alamat LIKE '%$pencarian%'  ORDER BY tanggalLahir ASC") or die (mysqli_error($koneksi)) ;





while($row=mysqli_fetch_array($kasus)){
$t=date('d F Y',strtotime($row['tanggalLahir']));


$pdf->Cell(270,1,'','B',1,'L');
$pdf->Cell(30);
$pdf->Cell(10,8,$no++.'.',0);

$pdf->Cell(36,8,'NIK',0);
$pdf->Cell(10,8,':',0);
$pdf->Cell(30,8,$row['nik'],0,0);

$pdf->Cell(35);
$pdf->Cell(30,8,'Agama',0);
$pdf->Cell(10,8,' :',0);
$pdf->Cell(30,8,$row['agama'],0,1);
 
$pdf->Cell(40);
$pdf->Cell(35,8,'Nama',0);
$pdf->Cell(10,8,' :',0);
$pdf->Cell(30,8,$row['nama'],0,0);

$pdf->Cell(35);
$pdf->Cell(31,8,'Pendidikan',0);
$pdf->Cell(10,8,' :',0);
$pdf->Cell(30,8,$row['pendidikan'],0,1);

$pdf->Cell(40);
$pdf->Cell(35,8,'Jenis Kelamin',0);
$pdf->Cell(10,8,' :',0);
$pdf->Cell(30,8,$row['jenisKelamin'],0,0);

$pdf->Cell(35);
$pdf->Cell(31,8,'Pekerjaan',0);
$pdf->Cell(10,8,' :',0);
$pdf->Cell(30,8,$row['pekerjaan'],0,1);

$pdf->Cell(40);
$pdf->Cell(35,8,'Tempat/Tanggal Lahir',0);
$pdf->Cell(10,8,' :',0);
$pdf->Cell(35,8,$row['tempatLahir'].', '.$t,0,0);

$pdf->Cell(30);
$pdf->Cell(31,8,'Status Perkawinan',0);
$pdf->Cell(10,8,' :',0);
$pdf->Cell(30,8,$row['statusPerkawinan'],0,1);

$pdf->Cell(40);
$pdf->Cell(35,8,'Golongan Darah',0);
$pdf->Cell(10,8,' :',0);
$pdf->Cell(30,8,$row['golDarah'],0,0);

$pdf->Cell(35);
$pdf->Cell(31,8,'Nomor Telpon',0);
$pdf->Cell(10,8,' :',0);
$pdf->Cell(30,8,$row['nomorTlp'],0,1);
  

$pdf->Cell(40);
$pdf->Cell(35,8,'Alamat',0);
$pdf->Cell(10,8,' :',0);
$pdf->MultiCell(50,8,$row['alamat']." RT.".$row['rt']." RW.".$row['rw']." Kelurahan ".$row['kelurahan']." Kecamatan Bumigora Kota Bumigora",0,1);

}
}

//tanda tangan
$tgl=date("d F Y");
$pdf->Ln(10);
      $pdf->SetFont('Arial','B',9);
      $pdf->Cell(220);
     $pdf->Cell(30,5,'Bumigora, '.$tgl,0,1,'C');
     $pdf->SetFont('Arial','B',9);
     $pdf->Cell(220);
     $pdf->Cell(30,7,'Camat BUMIGORA,',0,1,'C');
     $pdf->Ln(15);
     $pdf->SetFont('Arial','B',9);
     $pdf->Cell(220);
     $pdf->Cell(30,4,'bumigora',0,1,'C');
     $pdf->Cell(220);
     $pdf->Cell(38,0.5,'','B',1,'L');
     $pdf->Cell(220);
      $pdf->SetFont('Arial','B',9);
       $pdf->Cell(30,4,'NIP.19600131189738838',0,1,'C');  

$pdf->Output();

?>