$x=$pdf->GetX();
$y=$pdf->GetY();

$col1="NO";
$pdf->Multicell(20,20,'No',1,1);
$pdf->SETXY($x+20,$y);
$pdf->MultiCell(30,10,"No Permohonan KTP",1,1);
$pdf->SETXY($x+50,$y);
$pdf->MultiCell(30,20,"NIK",1,1);