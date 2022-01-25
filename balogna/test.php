<?php
require_once "functions.php";
$data2 = $database->select("bon","*");
    require('fpdf/fpdf.php');

    class PDF extends FPDF
    {

// Page header
        function Header()
        {
            $taffelnummer = 1;


// Set font family to Arial bold
            $this->SetFont('Arial', 'B', 20);

// Move to the right
            $this->Cell(20);

// Header
            $this->Cell(50, 10, 'Tafel '.$taffelnummer, 1, 0, 'C');

// Line break
            $this->Ln(20);
        }

// Page footer
        function Footer()
        {

// Position at 1.5 cm from bottom
            $this->SetY(-15);

// Arial italic 8
            $this->SetFont('Arial', 'I', 8);

// Page number
            $this->Cell(0, 10, 'Page ' .
                $this->PageNo() . '/{nb}', 0, 0, 'C');
        }
    }

// Instantiation of FPDF class
    $pdf = new PDF();

// Define alias for number of pages
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Times', '', 14);

$width_cell=array(40,30,30,30,90);
$pdf->SetFillColor(193,229,252); // Background color of header
// Header starts ///
$pdf->Cell($width_cell[1],10,'Drankje',1,0,'C',true); // Second header column
$pdf->Cell($width_cell[2],10,'Hoeveelheid',1,0,'C',true); // Third header column
$pdf->Cell($width_cell[3],10,'Prijs',1,1,'C',true); // Fourth header column
//// header is over ///////
foreach($data2 as $item2) {
    //taffel nummer
    $pdf->Cell($width_cell[1],10,$item2['drank'],1,0,'C',false); // Second column of row 1
    $pdf->Cell($width_cell[2],10,$item2['drankhvl'],1,0,'C',false); // Third column of row 1
    $pdf->Cell($width_cell[3],10,$item2['prijs'],1,1,'C',false); // Fourth column of row 1
}
$total = $database->sum("bon", "prijs");
$pdf->Cell($width_cell[4],10,'Totaal '.$total."$",1,1,'C',false); // Fourth column of row 1
$pdf->Output();
?>