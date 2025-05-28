<?php

    include 'plantilla2.php'; 

    $pdf = new PDF();
    $pdf->SetMargins(23, 10, 11.7);
    $pdf->SetAutoPageBreak(true, 40); 

    $pdf->institucion = 'UNIVERSIDAD TÉCNICA LUIS VARGAS TORRES DE ESMERALDAS';
    $pdf->unidad = 'UNIDAD DE NIVELACION';
    $pdf->departamento = 'PERIODO: 2023-1S';
    $pdf->titulo = "CONTROL ACADÉMICO - LECCIONARIO";

    // Safely set properties, checking if source variables/arrays are defined
    if (isset($sesioneventos) && !empty($sesioneventos) && isset($sesioneventos[0]->elevento)) {
        $pdf->asignatura = "Evento(Clase):  " . $sesioneventos[0]->elevento;
    } else {
        $pdf->asignatura = "Evento(Clase):  (No definido)";
    }
    if (isset($instructor) && !empty($instructor) && isset($instructor[0]->nombres)) {
        $pdf->docente = "Docente:  " . $instructor[0]->nombres;
    } else {
        $pdf->docente = "Docente:  (No definido)";
    }

    if (isset($mesnumero) && $mesnumero > 0 && isset($mesletra) && isset($mesletra[$mesnumero])) {
        $pdf->mes = "Mes:  " . $mesletra[$mesnumero];
    } else {
        // Consider if $mesnumero === 0 means "all months" or if it should also be handled as "(Todos)"
        $pdf->mes = "Mes: (Todos)"; 
    }

    $pdf->AliasNbPages();
    $pdf->AddPage('L'); // Initial page is Landscape

    // Cabecera de la tabla
    $pdf->SetFillColor(232, 232, 232);
    $pdf->SetFont('Arial', 'B', 8);

    $pdf->Cell(10, 5, '#sesion', 1, 0, 'C', 1);
    $pdf->Cell(15, 5, 'Dia', 1, 0, 'C', 1);
    $pdf->Cell(15, 5, 'Fecha', 1, 0, 'C', 1);
    $pdf->Cell(15, 5, 'Inicio', 1, 0, 'C', 1);
    $pdf->Cell(15, 5, 'Termino', 1, 0, 'C', 1);
    $pdf->Cell(15, 5, 'Conect', 1, 0, 'C', 1);
    $pdf->Cell(15, 5, 'NoConect', 1, 0, 'C', 1);
    $pdf->Cell(120, 5, 'Tema', 1, 0, 'C', 1);
    $pdf->Cell(18, 5, 'Control', 1, 1, 'C', 1); 

    $pdf->SetFont('Arial', '', 7);
    $line_height = 5; 

    $table_body_start_x = $pdf->GetX();
    $current_row_y_start = $pdf->GetY(); 

    $page_break_bottom_margin = 40;

    if (isset($sesioneventos) && is_array($sesioneventos)) {
        foreach ($sesioneventos as $idx => $row) {
            // Ensure $row is an object and properties exist before accessing
            $fecha_actual_row = isset($row->fecha) ? $row->fecha : null;
            if (!$fecha_actual_row) {
                // Skip this row or handle error if date is missing
                continue; 
            }
            $nmes_actual = date('m', strtotime($fecha_actual_row));

            if ((isset($mesnumero) && ($nmes_actual == $mesnumero || $mesnumero == 0)) || !isset($mesnumero) ) {

                if ($current_row_y_start + $line_height > ($pdf->GetPageHeight() - $page_break_bottom_margin)) {
                    // Add a new page with the same Landscape orientation
                    $pdf->AddPage('L'); // MODIFIED HERE
                    
                    $pdf->SetFillColor(232,232,232);
                    $pdf->SetFont('Arial','B',8);
                    $pdf->Cell(10,5,'#sesion',1,0,'C',1);
                    $pdf->Cell(15,5,'Dia',1,0,'C',1);
                    $pdf->Cell(15,5,'Fecha',1,0,'C',1);
                    $pdf->Cell(15,5,'Inicio',1,0,'C',1);
                    $pdf->Cell(15,5,'Termino',1,0,'C',1);
                    $pdf->Cell(15,5,'Conect',1,0,'C',1);
                    $pdf->Cell(15,5,'NoConect',1,0,'C',1);
                    $pdf->Cell(120,5,'Tema',1,0,'C',1);
                    $pdf->Cell(18,5,'Control',1,1,'C',1);
                    $pdf->SetFont('Arial','',7);
                    
                    $current_row_y_start = $pdf->GetY(); 
                    $table_body_start_x = $pdf->GetX();  
                }

                $current_x_pos = $table_body_start_x; 
                $y_positions_after_cells = []; 

                // Ensure $row properties are accessed safely
                $numerosesion = isset($row->numerosesion) ? (string)$row->numerosesion : '';
                $horainicio = isset($row->horainicio) ? (string)$row->horainicio : '';
                $horafin = isset($row->horafin) ? (string)$row->horafin : '';
                $numeasis = isset($row->numeasis) ? (int)$row->numeasis : 0;
                $numalum = isset($row->numalum) ? (int)$row->numalum : 0;
                $temacorto = isset($row->temacorto) ? (string)$row->temacorto : '';

                // Celda 1: #sesion
                $pdf->SetXY($current_x_pos, $current_row_y_start);
                $pdf->MultiCell(10, $line_height, utf8_decode($numerosesion), 1, 'R');
                $y_positions_after_cells[] = $pdf->GetY();
                $current_x_pos += 10;

                // Celda 2: Dia
                $pdf->SetXY($current_x_pos, $current_row_y_start);
                $dias = array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado');
                $dia_semana = $dias[date('w', strtotime($fecha_actual_row))];
                $pdf->MultiCell(15, $line_height, utf8_decode($dia_semana), 1, 'L');
                $y_positions_after_cells[] = $pdf->GetY();
                $current_x_pos += 15;

                // Celda 3: Fecha
                $pdf->SetXY($current_x_pos, $current_row_y_start);
                $pdf->MultiCell(15, $line_height, utf8_decode($fecha_actual_row), 1, 'L');
                $y_positions_after_cells[] = $pdf->GetY();
                $current_x_pos += 15;

                // Celda 4: Inicio
                $pdf->SetXY($current_x_pos, $current_row_y_start);
                $pdf->MultiCell(15, $line_height, utf8_decode($horainicio), 1, 'L');
                $y_positions_after_cells[] = $pdf->GetY();
                $current_x_pos += 15;

                // Celda 5: Termino
                $pdf->SetXY($current_x_pos, $current_row_y_start);
                $pdf->MultiCell(15, $line_height, utf8_decode($horafin), 1, 'L');
                $y_positions_after_cells[] = $pdf->GetY();
                $current_x_pos += 15;

                // Celda 6: Conect
                $pdf->SetXY($current_x_pos, $current_row_y_start);
                $conect_val = ($numeasis > 0) ? (string)$numeasis : " ";
                $pdf->MultiCell(15, $line_height, utf8_decode($conect_val), 1, 'C');
                $y_positions_after_cells[] = $pdf->GetY();
                $current_x_pos += 15;

                // Celda 7: NoConect
                $pdf->SetXY($current_x_pos, $current_row_y_start);
                $no_conect_val = ($numeasis > 0) ? (string)($numalum - $numeasis) : " ";
                $pdf->MultiCell(15, $line_height, utf8_decode($no_conect_val), 1, 'C');
                $y_positions_after_cells[] = $pdf->GetY();
                $current_x_pos += 15;

                // Celda 8: Tema (temacorto)
                $pdf->SetXY($current_x_pos, $current_row_y_start);
                $tema_corto_limpio = preg_replace('/[\r\n]+/', ' ', $temacorto);
                $pdf->MultiCell(120, $line_height, utf8_decode($tema_corto_limpio), 1, 'L');
                $y_positions_after_cells[] = $pdf->GetY();
                $current_x_pos += 120;

                // Celda 9: Control
                $pdf->SetXY($current_x_pos, $current_row_y_start);
                $pdf->MultiCell(18, $line_height, utf8_decode("X SISTEMA"), 1, 'C');
                $y_positions_after_cells[] = $pdf->GetY();

                $max_y_for_row = $current_row_y_start; 
                if (!empty($y_positions_after_cells)) {
                    $max_y_for_row = max($y_positions_after_cells);
                }
                
                $current_row_y_start = $max_y_for_row;
                $pdf->SetX($table_body_start_x); 
            }
        }
    }

    $pdf->Output();
?>
