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
     $this->Cell(30,7,'Jl.BUMIGORA',0,1,'L');
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

if(isset($_GET['id'])){

  $id=($_GET['id']);

 
                      $query="SELECT * FROM tb_sktmpendidikan  as p JOIN tb_penduduk as d ON p.nik=d.nik where no_sktmPendidikan='$id'";
                      $result=mysqli_query($koneksi,$query);
                      if(!$result){
                        die("query error:".mysqli_errno($koneksi)."-".mysqli_error($koneksi));
                      }
                      $data=mysqli_fetch_assoc($result);   


$pdf->SetFont('Arial','B',14);
$pdf->Cell(180,7,'SURAT KETERANGAN TIDAK MAMPU',0,1,'C');
$pdf->Cell(45);
$pdf->Cell(89,0,'','B',1,'C');
$pdf->SetFont('Arial','','11');
$pdf->Cell(180,7,'Nomor: '.$data['no_sktmPendidikan'].'/'.$data['tgl_sktmPendidikan'],0,1,'C');
$pdf->Ln(4);

//=====Baris==================
$pdf->SetFont('Arial','','11');
$pdf->Cell(10,8,'Nomor KK',0,0);
$pdf->Cell(42);
$pdf->Cell(5,8,' : ',0,0);
$pdf->Cell(10,8,$data['no_kk'],0,1);    
//=====Baris==================
$pdf->SetFont('Arial','','11');
$pdf->Cell(10,8,'NIK',0,0);
$pdf->Cell(42);
$pdf->Cell(5,8,' : ',0,0);
$pdf->Cell(10,8,$data['nik'],0,1);    
//=====Baris==================
$pdf->SetFont('Arial','','11');
$pdf->Cell(10,8,'Nama',0,0);
$pdf->Cell(42);
$pdf->Cell(5,8,' : ',0,0);
$pdf->Cell(10,8,$data['nama'],0,1);
//=====Baris==================
$pdf->SetFont('Arial','','11');
$pdf->Cell(10,8,'Tempat, tanggal lahir',0,0);
$pdf->Cell(42);
$pdf->Cell(5,8,' : ',0,0);
$pdf->Cell(10,8,$data['tempatLahir'].','.$data['tanggalLahir'],0,1);
//=====Baris==================
$pdf->SetFont('Arial','','11');
$pdf->Cell(10,8,'Jenis Kelamin',0,0);
$pdf->Cell(42);
$pdf->Cell(5,8,' : ',0,0);
$pdf->Cell(10,8,$data['jenisKelamin'],0,1);
//=====Baris==================
$pdf->SetFont('Arial','','11');
$pdf->Cell(10,8,'Agama',0,0);
$pdf->Cell(42);
$pdf->Cell(5,8,' : ',0,0);
$pdf->Cell(10,8,$data['agama'],0,1);
//=====Baris==================
$pdf->SetFont('Arial','','11');
$pdf->Cell(10,8,'Pekerjaan',0,0);
$pdf->Cell(42);
$pdf->Cell(5,8,' : ',0,0);
$pdf->Cell(10,8,$data['pekerjaan'],0,1);
//=====Baris==================
$pdf->Cell(10,8,'Alamat  ',0,0);
$pdf->Cell(42); 
$pdf->Cell(5,8,' : ',0,0);
$pdf->Cell(10,8,$data['alamat'].' RT/RW '.$data['rt'].'/'.$data['rw'].' Kelurahan ',0,1);
$pdf->Cell(56);
$pdf->Cell(10,8,$data['kelurahan'].' Kecamatan Bumigora Kota Bumigora',0,1);
//=====Baris==================
$pdf->Cell(10,8,'Sekolah Tujuan  ',0,0);
$pdf->Cell(42); 
$pdf->Cell(5,8,' : ',0,0);
$pdf->Cell(10,8,$data['sekolah_tujuan'],0,1);
//=====Baris==================
$pdf->Cell(10,8,'Keterangan ',0,0);
$pdf->Cell(42); 
$pdf->Cell(5,8,' : ',0,0);
$pdf->Cell(10,8,$data['keterangan'],0,1);

$pdf->Ln(3);
$pdf->Cell(180,5,'Penduduk tersebut diatas benar-benar adalah warga Kelurahan '.$data['kelurahan'].' Kecamatan Bumigora' ,0,1,'L');
$pdf->Cell(180,5,'Kota Bumigora. Dengan sepengetahuan kami dan sesuai data yang ada di kantor desa, penduduk',0,1,'L');
$pdf->Cell(180,5,'tersebut diatas benar keluarga kurang mampu (KELUARGA BERPENGHASILAN RENDAH).',0,1,'L');

$pdf->Ln(4);
$pdf->Cell(180,4,'Demikian Surat Keterangan ini dibuat dengan sebenarnya untuk yang bersangkutan dan',0,1,'L');
$pdf->Cell(180,4,'kiranya dapat digunakan seperlunya',0,1,'L');

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
}
?>