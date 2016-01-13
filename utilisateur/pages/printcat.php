<?php
require './lib/php/fpdf/fpdf.php';
require '../admin/lib/php/db_pg.php';
//require '../admin/lib/php/classes/connexion.class.php';
require '../admin/lib/php/classes/cat.class.php';
require '../admin/lib/php/classes/catManager.class.php';
$buffer=  ob_get_clean();

$db = Connexion::getInstance($dsn,$user,$pass);


$mg = new catManager($db);
$data = $mg->getCat();

$pdf=new FPDF('L','cm','A4');
$pdf->AddPage();
//$pdf->SetX(3);
//$pdf->cell(3.5,1,'SmartGames',0,0,'L');	
//header premier
//$pdf->SetFillColor(200,10,10);
//$pdf->SetDrawColor(0,0,255);
//$pdf->SetTextColor(255,255,255); 
//$pdf->SetXY(3,2); // coordonnées bord supérieur gauche
//$pdf->cell(15,.7,'SmartGames',0,0,'L',1);

//$pdf->SetFont('Arial','',12);
$pdf->SetFillColor(255,255,255);
$pdf->SetDrawColor(0,0,0);
$pdf->SetTextColor(0,0,0); 
$pdf->SetFont('Arial','B',15);
$pdf->cell(3,10,$pdf->Image('../admin/images/print2.png',0,0),0,0,'L');
$pdf->Ln();
$pdf->cell(3.5,1,'Catalogue de DVD en folie',0,0,'L');
$pdf->SetFont('Arial','B',9);
$pdf->Ln();
/*$x=3; $y=3;
$pdf->SetXY($x, $y);
$pdf->SetFont('Arial','B',12);
$den = utf8_decode('Colonnes');
$pdf->cell(5,.7,$den,0,'C',1,1);
$pdf->SetXY($x+5,$y);*/
$pdf->cell(10,.7,'Titre',1,0,'C');
$pdf->cell(3,.7,'Prix',1,0,'C');
$pdf->cell(3,.7,'Genre',1,0,'C');
$pdf->cell(3,.7,'Realisateur',1,0,'C');
$pdf->cell(3,.7,'Support',1,0,'C');
$pdf->Ln();
//$pdf->SetFont('Arial','',12);
//$y++;
for($i=0;$i<count($data);$i++) {
        $titre=$data[$i]->titre;
        $prix=$data[$i]->prix;
        $genre=$data[$i]->genre;
        $realisateur=$data[$i]->realisateur;
        $support=$data[$i]->support;
   // $pdf->SetXY($x, $y);
    $pdf->cell(10,.7,utf8_decode($titre),1,0,'C');
    //$pdf->SetXY($x+5,$y);
    $pdf->cell(3,.7,utf8_decode($prix),1,0,'C');
    //$pdf->SetXY($x+5,$y);
        $pdf->cell(3,.7,utf8_decode($genre),1,0,'C');
    //$pdf->SetXY($x+5,$y);
        $pdf->cell(3,.7,utf8_decode($realisateur),1,0,'C');
    //$pdf->SetXY($x+5,$y);
        $pdf->cell(3,.7,utf8_decode($support),1,0,'C');
    //$pdf->SetXY($x+5,$y);
        $pdf->Ln();
    //$pdf->SetXY($x+5,$y);
    
}

$pdf->output();
?>