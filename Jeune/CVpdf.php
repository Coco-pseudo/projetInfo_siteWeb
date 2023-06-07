<?php 
require '../fpdf.php';
/*
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',16);
$pdf->Cell(40,10,'Hello debut creation du pdf !');
$pdf->Output();
*/
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Hello World !');
$pdf->Output();
?>