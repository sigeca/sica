<?php

    include 'plantilla.php';

    $pdf = new PDF();
    $pdf->SetMargins(23, 10, 11.7);

    $pdf->institucion='UNIVERSIDAD TÉCNICA LUIS VARGAS TORRES DE ESMERALDAS';
    $pdf->unidad='FACULTAD DE INGENIERIAS (FACI)';
    $pdf->departamento='CARRERA EN TECNOLOGÍA DE LA INFORMACIÓN';
    $pdf->titulo="Horario individual del docente";

    $pdf->AliasNbPages();
    $pdf->AddPage();

    $pdf->SetFont('Arial','',12);
    $pdf->SetTextColor(0, 0,0);
    $pdf->Text(20,40,"Docente: ".utf8_decode($distributivodocente['eldistributivodocente']));

    $pdf->SetFillColor(232,232,232);
    $pdf->SetFont('Arial','B',8);

    $pdf->Cell(12,10,'HORA',1,0,'C',1);
    $pdf->Cell(30,10,'Lunes',1,0,'C',1);
    $pdf->Cell(30,10,'Martes',1,0,'C',1);
    $pdf->Cell(30,10,'Miercoles',1,0,'C',1);
    $pdf->Cell(30,10,'Jueves',1,0,'C',1);
    $pdf->Cell(30,10,'Viernes',1,1,'C',1);

    $pdf->SetFont('Arial','',7);
    $id=0;
    $persona="";
    $i=0;
    $horario1=array("07:00:00","07:30:00","08:00:00","08:30:00","09:00:00","09:30:00","10:00:00","10:30:00","11:00:00","11:30:00","12:00:00","12:30:00","13:00:00","13:30:00","14:00:00","14:30:00","15:00:00","15:30:00","16:00:00","16:30:00","17:00:00","17:30:00","18:00:00","18:30:00");
    $horario2=array();
    foreach ($horario1 as $hora){
        foreach ($jornadadocente as $row){
            if($row->horainicio==$hora){
                $horario2[$row->horainicio][$row->nombre]=$row->laasignatura."-".$row->nivel."-".$row->paralelo." (".$row->duracionminutos." min )";
            }
        }
    }

    $cell_width = 30; // Ancho de las celdas de los días
    $line_height = 5; // Altura de línea para MultiCell

    foreach ($horario2 as $hora => $dia){
        // 1. Calcular la altura máxima de la fila
        $max_height = 10; // Altura mínima inicial para la fila (para el campo HORA y celdas vacías)

        // Para calcular la altura de un MultiCell de forma precisa, necesitamos una función
        // que simule el comportamiento de MultiCell sin dibujarlo.
        // FPDF no tiene GetStringHeight() directamente para MultiCell.
        // Podemos usar una aproximación o extender la clase FPDF.
        // Aquí vamos a usar un método auxiliar para calcular la altura necesaria.
        
        // Función auxiliar para calcular la altura de un texto en MultiCell
        // Esta función podría ser un método en tu clase PDF (plantilla.php)
        // o una función auxiliar definida en este archivo.
        function calculateMultiCellHeight($pdf_instance, $width, $text, $line_height) {
            $current_font_size = $pdf_instance->FontSizePt; // Obtener el tamaño de fuente actual
            $width_in_points = $width * (72 / 25.4); // Convertir mm a puntos (1 pulgada = 25.4 mm = 72 puntos)
            
            // Simular el cálculo de líneas
            $lines = $pdf_instance->WordWrap($text, $width);
            $num_lines = count($lines);
            return $num_lines * $line_height;
        }

        $lunes_height = isset($dia['Lunes']) ? calculateMultiCellHeight($pdf, $cell_width, utf8_decode($dia['Lunes']), $line_height) : $line_height;
        $martes_height = isset($dia['Martes']) ? calculateMultiCellHeight($pdf, $cell_width, utf8_decode($dia['Martes']), $line_height) : $line_height;
        $miercoles_height = isset($dia['Miercoles']) ? calculateMultiCellHeight($pdf, $cell_width, utf8_decode($dia['Miercoles']), $line_height) : $line_height;
        $jueves_height = isset($dia['Jueves']) ? calculateMultiCellHeight($pdf, $cell_width, utf8_decode($dia['Jueves']), $line_height) : $line_height;
        $viernes_height = isset($dia['Viernes']) ? calculateMultiCellHeight($pdf, $cell_width, utf8_decode($dia['Viernes']), $line_height) : $line_height;
        
        // Obtiene la altura máxima entre todas las celdas
        $max_height = max($max_height, $lunes_height, $martes_height, $miercoles_height, $jueves_height, $viernes_height);
        
        $start_x = $pdf->GetX(); // Posición X inicial para la fila actual
        $current_y = $pdf->GetY(); // Posición Y inicial para la fila actual

        // 2. Dibuja las celdas con la altura calculada
        $pdf->Cell(12, $max_height, $hora, 1, 0, 'R', 1); // Celda de la hora

        // Mover el cursor a la posición correcta para la siguiente celda
        $pdf->SetXY($start_x + 12, $current_y);

        if(isset($dia['Lunes'])){
            // Para asegurar que MultiCell se ajusta a la altura máxima,
            // si el texto es corto, la celda seguirá teniendo la altura max_height
            // El truco es que MultiCell avanzará el Y, luego SetXY lo ajusta.
            $pdf->MultiCell($cell_width, $line_height, utf8_decode($dia['Lunes']), 1, 'L', 0);
            $pdf->SetXY($start_x + 12 + $cell_width, $current_y); // Mover X para la siguiente celda
        } else {
            $pdf->Cell($cell_width, $max_height, "", 1, 0, 'L', 0);
            $pdf->SetXY($start_x + 12 + $cell_width, $current_y); // Mover X para la siguiente celda
        }

        if(isset($dia['Martes'])){
            $pdf->MultiCell($cell_width, $line_height, utf8_decode($dia['Martes']), 1, 'L', 0);
            $pdf->SetXY($start_x + 12 + ($cell_width * 2), $current_y);
        } else {
            $pdf->Cell($cell_width, $max_height, "", 1, 0, 'L', 0);
            $pdf->SetXY($start_x + 12 + ($cell_width * 2), $current_y);
        }

        if(isset($dia['Miercoles'])){
            $pdf->MultiCell($cell_width, $line_height, utf8_decode($dia['Miercoles']), 1, 'L', 0);
            $pdf->SetXY($start_x + 12 + ($cell_width * 3), $current_y);
        } else {
            $pdf->Cell($cell_width, $max_height, "", 1, 0, 'L', 0);
            $pdf->SetXY($start_x + 12 + ($cell_width * 3), $current_y);
        }

        if(isset($dia['Jueves'])){
            $pdf->MultiCell($cell_width, $line_height, utf8_decode($dia['Jueves']), 1, 'L', 0);
            $pdf->SetXY($start_x + 12 + ($cell_width * 4), $current_y);
        } else {
            $pdf->Cell($cell_width, $max_height, "", 1, 0, 'L', 0);
            $pdf->SetXY($start_x + 12 + ($cell_width * 4), $current_y);
        }

        if(isset($dia['Viernes'])){
            $pdf->MultiCell($cell_width, $line_height, utf8_decode($dia['Viernes']), 1, 'L', 0);
            // No SetXY aquí porque es la última celda de la fila y queremos que el cursor avance automáticamente
            // o lo ajustamos manualmente en la siguiente línea.
        } else {
            $pdf->Cell($cell_width, $max_height, "", 1, 0, 'L', 0);
        }

        // Mover el cursor a la siguiente línea después de dibujar todas las celdas de la fila
        $pdf->SetY($current_y + $max_height);
        $pdf->SetX($start_x); // Restablecer X al inicio de la fila
    }

    $pdf->Output();
?>
