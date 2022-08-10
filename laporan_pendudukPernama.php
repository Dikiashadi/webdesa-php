<?php
require('assets/phpfpdf/fpdf.php');
include'koneksi.php';

class PDF extends FPDF
{
  function Header(){
    //logo
    $this->Image('assets/logo/logo.png',45,12,27);
     
     //geser kanan 35 mm
     $this->Cell(60);
     //judul
     $this->SetFont('Arial','B',16);
     $this->Cell(30,7,'PEMERINTAH KOTA BUMIGORA',0,1,'L');
      $this->Cell(67);
     $this->SetFont('Arial','B',16);
     $this->Cell(30,7,'KECAMATAN BUMIGORA',0,1,'L');
     
     $this->Cell(60);
     $this->SetFont('Arial','i',10  );
     $this->Cell(30,7,'Jl.Bumigora',0,1,'L');
     //garis bawah double
     $this->Cell(185,1,'','B',1,'L');
     $this->Cell(185,1,'','B',0,'L');

     //line break 5mm
      $this->Ln(5);
  } 
  
}
//instance objek dan memberikan pengaturan halaman pdf
$pdf=new PDF('P','mm','A4');
$pdf->AliasNbPages();
$pdf->SetMargins(15,15,15);
$pdf->AddPage();

if(@$_POST['cetak']){
        $id=mysqli_real_escape_string($koneksi,$_POST['txtnik']);
        $perin="SELECT * FROM tb_penduduk where nik LIKE'%$id%' or nama LIKE '%$id%'  ";
         $maha=mysqli_query($koneksi,$perin);
        if(mysqli_num_rows($maha)>0){
        while($data=mysqli_fetch_array($maha)){
$fo=$data['foto'];


$foto='assets/foto/penduduk/'.$fo;


$pdf->SetFont('Arial','B',14);
$pdf->Cell(180,7,' DATA PENDUDUK ',0,1,'C');
$pdf->Cell(60);
$pdf->SetFont('Arial','','11');
$pdf->Ln(3);
//=====Baris==================
$pdf->SetFont('Arial','','11');
$pdf->Cell(10,8,'NIK  ',0,0);

$pdf->Image($foto,150,50,40,55);
$pdf->Cell(42);
$pdf->Cell(5,8,' : ',0,0);
$pdf->Cell(10,8,$data['nik'],0,1);
//=====Baris==================
$pdf->Cell(10,8,'Nama Lengkap  ',0,0);
$pdf->Cell(42);
$pdf->Cell(5,8,' : ',0,0);
$pdf->Cell(10,8,$data['nama'],0,1);
//=====Baris==================
$pdf->Cell(10,8,'Tempat, Tanggal Lahir  ',0,0);
$pdf->Cell(42);
$pdf->Cell(5,8,' : ',0,0);
$pdf->Cell(10,8,$data['tempatLahir'].', '.$data['tanggalLahir'],0,1);
//=====Baris==================
$pdf->Cell(10,8,'Jenis Kelamin  ',0,0);
$pdf->Cell(42);
$pdf->Cell(5,8,' : ',0,0);
$pdf->Cell(10,8,$data['jenisKelamin'],0,1);
//=====Baris==================
$pdf->Cell(10,8,'Alamat  ',0,0);
$pdf->Cell(42);
$pdf->Cell(5,8,' : ',0,0);
$pdf->Cell(10,8,$data['alamat'],0,1);
//=====Baris==================
$pdf->Cell(10);
$pdf->Cell(10,8,'RT/RW ',0,0);
$pdf->Cell(32);
$pdf->Cell(5,8,' : ',0,0);
$pdf->Cell(10,8,$data['rt'].'/'.$data['rw'],0,1);
//=====Baris==================
$pdf->Cell(10);
$pdf->Cell(10,8,'Kelurahan/Desa',0,0);
$pdf->Cell(32);
$pdf->Cell(5,8,' : ',0,0);
$pdf->Cell(10,8,$data['kelurahan'],0,1);
//=====Baris==================
$pdf->Cell(10);
$pdf->Cell(10,8,'Kecamatan',0,0);
$pdf->Cell(32);
$pdf->Cell(5,8,' : ',0,0);
$pdf->Cell(10,8,'Bumigora',0,1);
//=====Baris==================
$pdf->Cell(10,8,'Agama ',0,0);
$pdf->Cell(42);
$pdf->Cell(5,8,' : ',0,0);
$pdf->Cell(10,8,$data['agama'],0,1);
//=====Baris==================
$pdf->Cell(10,8,'Status Perkawinan ',0,0);
$pdf->Cell(42);
$pdf->Cell(5,8,' : ',0,0);
$pdf->Cell(10,8,$data['statusPerkawinan'],0,1);
//=====Baris==================
$pdf->Cell(10,8,'Pekerjaan ',0,0);
$pdf->Cell(42);
$pdf->Cell(5,8,' : ',0,0);
$pdf->Cell(10,8,$data['pekerjaan'],0,1);
//=====Baris==================
$pdf->Cell(10,8,'Kewarganegaraan ',0,0);
$pdf->Cell(42);
$pdf->Cell(5,8,' : ',0,0);
$pdf->Cell(10,8,'Indonesia',0,1);
//=====Baris==================
$pdf->Cell(10,8,'Golongan Darah ',0,0);
$pdf->Cell(42);
$pdf->Cell(5,8,' : ',0,0);
$pdf->Cell(10,8,$data['golDarah'],0,1);
//=====Baris==================
$pdf->Cell(10,8,'Nomor Telphone ',0,0);
$pdf->Cell(42);
$pdf->Cell(5,8,' : ',0,0);
$pdf->Cell(10,8,$data['nomorTlp'],0,1);



}
}else{
 echo"<script>alert('Maaf data penduduk tidak ditemukan')</script>";
 echo"<script>location='formlaporan_penduduk.php';</script>";
  
}
} 

//tanda tangan
$tgl=date("d F Y");
$pdf->Ln(10);
      $pdf->SetFont('Arial','B',9);
      $pdf->Cell(140);
     $pdf->Cell(30,5,'Bumigora, '.$tgl,0,1,'C');
     $pdf->SetFont('Arial','B',9);
     
     
     $pdf->Cell(140);
     $pdf->Cell(30,7,'Camat Bumigora,',0,1,'C');
     $pdf->Ln(15);
     $pdf->SetFont('Arial','B',9);
     
     $pdf->Cell(140);
     $pdf->Cell(30,4,'Bumigora',0,1,'C');
     $pdf->Cell(135);
     $pdf->Cell(38,0.5,'','B',1,'L');
     $pdf->Cell(140);
      $pdf->SetFont('Arial','B',9);
      $pdf->Cell(30,4,'NIP.19600131189738838',0,1,'C');

$pdf->Output();


?>