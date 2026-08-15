<?php
require('fpdf/fpdf.php');
include "modelo/conexion.php";

$pdf = new FPDF('L','mm','A4'); // L = horizontal, más espacio
$pdf->AddPage();

// Logo
$pdf->Image('img/logo_empresa.png', 10, 8, 30);

// Título
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,10,'Reporte de Inventario de Equipos',0,1,'C');
$pdf->Ln(5);

// Fecha
$pdf->SetFont('Arial','I',10);
$pdf->Cell(0,10,'Generado el: '.date('d/m/Y H:i:s'),0,1,'R');
$pdf->Ln(5);

// Encabezados con más espacio
$pdf->SetFont('Arial','B',12);
$pdf->SetFillColor(200,220,255);
$pdf->Cell(20,10,'ID',1,0,'C',true);
$pdf->Cell(40,10,'Activos',1,0,'C',true);
$pdf->Cell(40,10,'Modelo',1,0,'C',true);
$pdf->Cell(40,10,'Marca',1,0,'C',true);
$pdf->Cell(40,10,'Apartado',1,0,'C',true);
$pdf->Cell(50,10,'No Serie',1,0,'C',true);
$pdf->Cell(50,10,'No Inventario',1,0,'C',true);
$pdf->Cell(40,10,'Mantenimiento',1,1,'C',true);

// Datos con ajuste de ancho
$pdf->SetFont('Arial','',10);
$sql = $conexion->query("SELECT * FROM invent ORDER BY id ASC");

while($row = $sql->fetch_assoc()){
    $pdf->Cell(20,10,$row['id'],1,0,'C');
    $pdf->Cell(40,10,$row['activos'],1,0,'C');
    $pdf->Cell(40,10,$row['modelo'],1,0,'C');
    $pdf->Cell(40,10,$row['marca'],1,0,'C');
    $pdf->Cell(40,10,$row['apartado'],1,0,'C');
    $pdf->Cell(50,10,$row['No_Serie'],1,0,'C');
    $pdf->Cell(50,10,$row['No_Inventario'],1,0,'C');
    $pdf->Cell(40,10,$row['Mantenimiento'],1,1,'C');
}

// Pie
$pdf->Ln(10);
$pdf->SetFont('Arial','I',10);
$pdf->Cell(0,10,'Sistema Integral de Registro y Control de Equipos',0,1,'C');

$pdf->Output();
?>
