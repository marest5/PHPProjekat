<?php
require('fpdf.php');

class PDF extends FPDF
{

   
// Page header
function Header()
{
    // Logo
    $this->Image('dw.jpg',10,6,30);
    // Arial bold 15
    $this->SetFont('helvetica','B',20);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,10,'Breweriana collectors skup pravila',2,2,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,8,'Page '.$this->PageNo().'/{nb}',0,1,'C');
    $this->Cell(0,0,'Autori MD i SD',0,1,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF();

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('helvetica','',14);
$pdf->Cell(0,10,'I: Zabranjeno je manipulisati korisnicima ove aplikacije.',0,10);
$pdf->Cell(0,10,'II: Zabranjeno je vredjanje i omalozavanje drugih korisnika sajta putem email poruka.',0,10);
$pdf->Cell(0,10,'III: Sajt je iskljucivo namanjen za ponudu i trazenje pivskih kolekcionarskih stvari.',0,10);
$pdf->Cell(0,10,'IV: Svako nepostovanje pravila 1,2,3 bice disciplinski i pravedno sankcionisano!!!',0,10);   
$pdf->Cell(0,10,'Veliki pozdrav! :D',0,10);   


$pdf->Output();

?>