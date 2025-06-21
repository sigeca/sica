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
$documentos = [
    (object)[
        'lapersona' => 'JOHN DOE',
        'elperiodo' => '2024-2025',
        'orden' => 1,
        'elchklstdocumento' => 'Acta de Aprobación',
        'asunto' => 'Acta de aprobación del proyecto final de grado "Desarrollo de un sistema de gestión académica para la Universidad Técnica Luis Vargas Torres de Esmeraldas". Este es un texto de ejemplo bastante largo para probar el ajuste de texto.',
        'archivopdf' => 'documentos/acta_aprobacion_john_doe.pdf'
    ],
    (object)[
        'lapersona' => 'JOHN DOE',
        'elperiodo' => '2024-2025',
        'orden' => 2,
        'elchklstdocumento' => 'Informe de Seguimiento',
        'asunto' => 'Primer informe de seguimiento del avance del proyecto durante el mes de Octubre de 2024.',
        'archivopdf' => 'documentos/informe_seguimiento_octubre.pdf'
    ],
    (object)[
        'lapersona' => 'JOHN DOE',
        'elperiodo' => '2024-2025',
        'orden' => 3,
        'elchklstdocumento' => 'Informe de Seguimiento', // Same category to test your logic
        'asunto' => 'Segundo informe de seguimiento del avance del proyecto durante el mes de Noviembre de 2024.',
        'archivopdf' => 'documentos/informe_seguimiento_noviembre.pdf'
    ],
    (object)[
        'lapersona' => 'JOHN DOE',
        'elperiodo' => '2024-2025',
        'orden' => 4,
        'elchklstdocumento' => 'Certificado de Culminación',
        'asunto' => 'Certificado de culminación de prácticas pre-profesionales en la empresa XYZ S.A. durante 160 horas.',
        'archivopdf' => 'documentos/certificado_culminacion_john_doe.pdf'
    ],
];
// End of Mock Data

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

// Base URL for documents
$url_base = "https://repositorioutlvte.org/Repositorio/";

foreach ($documentos as $row) {
    // Calculate the height required for the 'asunto' MultiCell
    // This is crucial for preventing text cutoff and ensuring row height adjusts dynamically.
    // Temporarily set font to calculate height without affecting current drawing.
    $pdf->SetFont('Arial', '', 7);
    $asunto_height = $pdf->MultiCell($colWidth_document, 5, utf8_decode($row->asunto), 0, 'L', 0, true); // true for calculate height only
    $pdf->SetFont('Arial', '', 7); // Reset font after calculation

    // Ensure a minimum height for the row
    $rowHeight = max($asunto_height, 6); // Minimum height of 6mm per row

    // Check if the current category is different from the previous one
    if ($elchklstdocumento != $row->elchklstdocumento) {
        $pdf->Cell($colWidth_num, $rowHeight, $row->orden, 1, 0, 'R', 0);
        $pdf->Cell($colWidth_category, $rowHeight, utf8_decode($row->elchklstdocumento), 1, 0, 'L', 0);
        $elchklstdocumento = $row->elchklstdocumento;
    } else {
        $pdf->Cell($colWidth_num, $rowHeight, "", 1, 0, 'R', 0);
        $pdf->Cell($colWidth_category, $rowHeight, utf8_decode(""), 1, 0, 'L', 0);
    }

    // Store current X and Y positions before MultiCell
    $current_x = $pdf->GetX();
    $current_y = $pdf->GetY();

    // MultiCell for 'asunto' to handle long text and wrap it
    $pdf->MultiCell($colWidth_document, 5, utf8_decode($row->asunto), 1, 'L', 0); // Changed fill to 0 as it's part of the row

    // Set position back after MultiCell for the next cell
    $pdf->SetXY($current_x + $colWidth_document, $current_y);

    // Link Column
    $link = $url_base . $row->archivopdf;

    $pdf->SetTextColor(0, 0, 255); // Blue color for the link
    $pdf->SetFont('Arial', 'U', 7); // Underline font for the link

    // Display "Ver Documento" or a small icon for the link
    // For a simple text link:
    $pdf->Cell($colWidth_code, $rowHeight, 'Ver Documento', 1, 1, 'C', 0, $link);

    // If you want to use an icon, you'd need to extend your PDF class
    // to include an image method or use FPDF's Image method directly
    // and potentially layer it. For simplicity, "Ver Documento" is used.
    // Example for an icon (requires an image file and proper positioning):
    // $icon_path = 'path/to/your/icon.png';
    // $pdf->Cell($colWidth_code, $rowHeight, '', 1, 0, 'C', 0); // Empty cell
    // $pdf->Image($icon_path, $pdf->GetX() - $colWidth_code + ($colWidth_code / 2) - 2.5, $pdf->GetY() + ($rowHeight / 2) - 2.5, 5, 5, '', $link); // Adjust x, y, width, height
    // $pdf->Ln($rowHeight); // Move to next line

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
