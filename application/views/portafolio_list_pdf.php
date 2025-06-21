<?php

// Include the necessary PDF library. Assuming 'plantilla2023-1.php' contains the PDF class definition.
include 'plantilla2023-1.php';

// It's good practice to include database connection if you plan to fetch data
// require 'conexion.php'; 

// --- Input Variables (unchanged, as they are likely passed via GET) ---
$idparticipanteestado = isset($_GET["idparticipanteestado"]) ? $_GET["idparticipanteestado"] : 0;
$idpersona = isset($_GET["idpersona"]) ? $_GET["idpersona"] : 0;

// --- Data for the PDF (Mock Data for demonstration, replace with your actual data fetching) ---
// You would typically fetch $documentos from a database here.
// For this example, let's create some dummy data to make the PDF generation runnable.
// --- PDF Initialization ---
$pdf = new PDF();
$pdf->SetMargins(23, 10, 11.7);
$pdf->institucion = 'UNIVERSIDAD TÉCNICA LUIS VARGAS TORRES DE ESMERALDAS';
$pdf->unidad = 'FACULTAD DE INGENIERIAS (FACI)';
$pdf->departamento = 'CARRERA EN TECNOLOGÍA DE LA INFORMACIÓN';
$pdf->titulo = "PORTAFOLIO DE " . $documentos[0]->lapersona . " Periodo: " . $documentos[0]->elperiodo;

$pdf->AliasNbPages();
$pdf->AddPage();

// --- Table Header ---
$pdf->SetFillColor(232, 232, 232);
$pdf->SetFont('Arial', 'B', 8);

// Define column widths for better control
$colWidth_num = 10; // Increased from 5 for better spacing
$colWidth_category = 50; // Increased from 45
$colWidth_document = 90; // Increased from 80
$colWidth_code = 30; // Reduced from 40, as we will use an icon/short text

$pdf->Cell($colWidth_num, 7, '#', 1, 0, 'C', 1); // Increased height for header cells
$pdf->Cell($colWidth_category, 7, utf8_decode('Categoría de documento'), 1, 0, 'C', 1);
$pdf->Cell($colWidth_document, 7, 'Documento subido', 1, 0, 'C', 1);
$pdf->Cell($colWidth_code, 7, 'Enlace', 1, 1, 'C', 1); // Changed 'codigo' to 'Enlace'

// --- Table Content ---
$pdf->SetFont('Arial', '', 7);
$elchklstdocumento = '';
$url_base = "https://repositorioutlvte.org/Repositorio/";

foreach ($documentos as $row) {
    // 1. Calculate the required height for the 'asunto' MultiCell
    //    We temporarily use MultiCell with the 'true' parameter as the last argument
    //    This tells FPDF to calculate the height without actually printing anything.
    $pdf->SetFont('Arial', '', 7); // Ensure font is set for correct calculation
    $asunto_content = utf8_decode($row->asunto);
    $asunto_height = $pdf->MultiCell($colWidth_document, 5, $asunto_content, 0, 'L', 0, true);
    // The '5' here is the line height for the MultiCell, not the total cell height.
    // The 'true' parameter is crucial for height calculation only.

    // 2. Determine the maximum height needed for the current row
    //    Ensure a minimum height for visually consistent rows, e.g., 6mm.
    $rowHeight = max($asunto_height, 6); // Set a minimum height for the row

    // --- Draw the cells for the current row using the calculated $rowHeight ---

    // Category Column: Only print if different from the previous row
    if ($elchklstdocumento != $row->elchklstdocumento) {
        $pdf->Cell($colWidth_num, $rowHeight, $row->orden, 1, 0, 'R', 0);
        $pdf->Cell($colWidth_category, $rowHeight, utf8_decode($row->elchklstdocumento), 1, 0, 'L', 0);
        $elchklstdocumento = $row->elchklstdocumento;
    } else {
        $pdf->Cell($colWidth_num, $rowHeight, "", 1, 0, 'R', 0);
        $pdf->Cell($colWidth_category, $rowHeight, utf8_decode(""), 1, 0, 'L', 0);
    }

    // Store current X and Y positions before MultiCell
    // This is vital because MultiCell advances the Y pointer to the next line.
    $current_x = $pdf->GetX();
    $current_y = $pdf->GetY();

    // Document Subido (Asunto) Column: Use MultiCell to wrap long text
    // The '1' for border will draw the border around the MultiCell content.
    $pdf->MultiCell($colWidth_document, 5, $asunto_content, 1, 'L', 0);

    // After MultiCell, the Y pointer is on a new line.
    // To draw the 'Enlace' cell on the same "row", we need to reset the position.
    $pdf->SetXY($current_x + $colWidth_document, $current_y);

    // Link Column
    $link = $url_base . $row->archivopdf;
    $pdf->SetTextColor(0, 0, 255); // Blue color for the link
    $pdf->SetFont('Arial', 'U', 7); // Underline font for the link
    $pdf->Cell($colWidth_code, $rowHeight, 'Ver Documento', 1, 1, 'C', 0, $link);
    $pdf->SetTextColor(0, 0, 0); // Restore black color
    $pdf->SetFont('Arial', '', 7); // Restore normal font
}


// --- Signature Section (Improved Presentation) ---
$pdf->Ln(20); // Add some space before signatures

// Define column widths for signatures
$signatureColWidth = ($pdf->GetPageWidth() - $pdf->GetX() * 2) / 3; // Distribute evenly

// Assuming a structure for signatures, e.g., an array of objects
$signatures = [
    (object)['name' => 'Ing. Juan Perez', 'title' => 'DIRECTOR DE CARRERA'],
    (object)['name' => 'Mgs. Maria Garcia', 'title' => 'COORDINADOR ACADÉMICO'],
    (object)['name' => 'Dr. Carlos Sanchez', 'title' => 'DECANO FACI'],
];

// Loop through signatures to create individual signature blocks
foreach ($signatures as $sig) {
    $pdf->SetX(($pdf->GetPageWidth() - ($signatureColWidth * count($signatures))) / 2 + (array_search($sig, $signatures) * $signatureColWidth)); // Center the blocks
    $pdf->Cell($signatureColWidth, 0, '', 'T', 0, 'C'); // Line for signature
}
$pdf->Ln(5); // Space after lines

foreach ($signatures as $sig) {
    $pdf->SetX(($pdf->GetPageWidth() - ($signatureColWidth * count($signatures))) / 2 + (array_search($sig, $signatures) * $signatureColWidth)); // Center the blocks
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->Cell($signatureColWidth, 5, utf8_decode($sig->name), 0, 0, 'C');
}
$pdf->Ln(); // Move to next line

foreach ($signatures as $sig) {
    $pdf->SetX(($pdf->GetPageWidth() - ($signatureColWidth * count($signatures))) / 2 + (array_search($sig, $signatures) * $signatureColWidth)); // Center the blocks
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell($signatureColWidth, 5, utf8_decode($sig->title), 0, 0, 'C');
}
$pdf->Ln(10); // Space after signatures

// --- Output PDF ---
$pdf->Output();

?>
