<?php
require '../lib/php/fpdf/fpdf.php';
require '../lib/php/db_pg.php';
require '../lib/php/classes/connexion.class.php';
require '../lib/php/classes/chenil.class.php';
require '../lib/php/classes/chenilManager.class.php';
$db = Connexion::getInstance($dsn,$user,$pass);


$mg = new ChenilManager($db);
$data = $mg->getListeConfort();

$pdf=new FPDF('P','cm','A4');
$pdf->SetFont('Arial','B',14);
$pdf->AddPage();
$pdf->SetX(3);
$pdf->cell(3.5,1,'Pension Pets-Sitting',0,0,'L');	
//header premier
$pdf->SetFillColor(200,10,10);
$pdf->SetDrawColor(0,0,255);
$pdf->SetTextColor(255,255,255); 
$pdf->SetXY(3,2); // coordonnées bord supérieur gauche
$pdf->cell(15,.7,'Inventaire',0,0,'L',1);

$pdf->SetFont('Arial','',12);
$pdf->SetFillColor(255,255,255);
$pdf->SetDrawColor(0,0,0);
$pdf->SetTextColor(0,0,0); 

$x=3; $y=3;
$pdf->SetXY($x, $y);
$pdf->SetFont('Arial','B',12);
$den = utf8_decode('Dénomination');
$pdf->cell(5,.7,$den,0,'C',1,1);
$pdf->SetXY($x+5,$y);
$pdf->cell(5,.7,'Pour',0,'C',1,1);
$pdf->cell(5,.7,'Image',0,'C',1,1);
$pdf->SetFont('Arial','',12);
$y++;
for($i=0;$i<count($data);$i++) {
    $pdf->SetXY($x, $y);
    $pdf->cell(5,.7,utf8_decode($data[$i]->denomination),1,'C',1,1);
    $pdf->SetXY($x+5,$y);
    if($data[$i]->type_animal==''){
        $pdf->Cell(5,.7,'s.o.',1,'C',1,1);
    }
    else {
        $pdf->Cell(5,.7,$data[$i]->type_animal,1,'C',1,1);
    }
    $pdf->SetXY($x+10,$y);
    $pdf->Cell(5,.7,$data[$i]->image,1,'C',1,1);
    $y+=0.7;
    
}

$pdf->output();
