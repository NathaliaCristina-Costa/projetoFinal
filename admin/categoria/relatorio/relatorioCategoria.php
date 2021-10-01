<?php
    require_once "../../../classe/fpdf/fpdf.php";
    require_once "../../../classe/Categoria.php";

    $cat = new Categoria();
    //Documento PDF com orientação P - retrato
    $pdf = new FPDF("P");

    $pdf->AddPage();

    $arquivo  = "relatorioCategoira.pdf";
    $fonte   = "Arial";      
    $estilo  = "B";
    $border  = "1";
    $alinhaC = "C";

    //Envia o arquivo para o navegador
    $tipo_pdf = "I";
    //$pdf->
    // Begin with regular font
    $pdf->SetFont('Arial','',14);
    $pdf->Write(5,'Visit ');
// Then put a blue underlined link
    $pdf->SetTextColor(0,0,255);
    $pdf->SetFont('','U');
    $pdf->Write(5, 'www.fpdf.org', 'http://www.fpdf.org');
    foreach ($cat->buscarDados() as $rstCat) {
        
        $pdf->SetFont($fonte, $estilo, 15);      
        $pdf->Cell(190, 10, $rstCat['nomeCategoria'], $border, 1, $alinhaC);
    }

    $pdf->Output($arquivo, $tipo_pdf);
?>