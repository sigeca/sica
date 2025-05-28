<?php

    include 'plantilla2.php'; // Asumo que aquí está la definición de tu clase PDF

    $pdf = new PDF();
    $pdf->SetMargins(23, 10, 11.7);
    // El valor de '40' en SetAutoPageBreak es el margen inferior.
    // AutoPageBreak se activará si el contenido intenta escribirse dentro de estos 40mm del final de la página.
    $pdf->SetAutoPageBreak(true, 40); 

    $pdf->institucion = 'UNIVERSIDAD TÉCNICA LUIS VARGAS TORRES DE ESMERALDAS';
    $pdf->unidad = 'UNIDAD DE NIVELACION';
    $pdf->departamento = 'PERIODO: 2023-1S';
    $pdf->titulo = "CONTROL ACADÉMICO - LECCIONARIO";

    // Asumiendo que $sesioneventos, $instructor, $mesnumero, $mesletra están definidos previamente
    if (!empty($sesioneventos) && isset($sesioneventos[0])) {
        $pdf->asignatura = "Evento(Clase):  " . $sesioneventos[0]->elevento;
    } else {
        $pdf->asignatura = "Evento(Clase):  (No definido)";
    }
    if (!empty($instructor) && isset($instructor[0])) {
        $pdf->docente = "Docente:  " . $instructor[0]->nombres;
    } else {
        $pdf->docente = "Docente:  (No definido)";
    }

    if (isset($mesnumero) && $mesnumero > 0 && isset($mesletra) && isset($mesletra[$mesnumero])) {
        $pdf->mes = "Mes:  " . $mesletra[$mesnumero];
    } else {
        $pdf->mes = "Mes: (Todos)"; // O algún valor por defecto
    }

    $pdf->AliasNbPages();
    $pdf->AddPage('L'); // Orientación Horizontal

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
    $pdf->Cell(18, 5, 'Control', 1, 1, 'C', 1); // El '1' al final indica un salto de línea

    $pdf->SetFont('Arial', '', 7);
    $line_height = 5; // Altura de línea base para MultiCell

    // Posición X inicial para la primera celda de datos (después del margen izquierdo)
    // Usamos $pdf->lMargin como referencia si las celdas comienzan justo en el margen.
    // O $pdf->GetX() después de la cabecera si esta define la posición inicial.
    $table_body_start_x = $pdf->lMargin; // Margen izquierdo definido por SetMargins o por defecto
                                         // Si las celdas de cabecera no empiezan en lMargin, ajustar.
                                         // Dado que usaste Cell(..., ..., ..., ..., 0, ...) para la mayoría de cabeceras,
                                         // la posición X se mantiene. El último Cell(...,1,...) hace un Ln().
                                         // Por lo tanto, GetX() después de las cabeceras debería ser el margen izquierdo.
    $table_body_start_x = $pdf->GetX();


    $current_row_y_start = $pdf->GetY(); // Posición Y para el inicio de la fila de datos actual

    if (isset($sesioneventos) && is_array($sesioneventos)) {
        foreach ($sesioneventos as $idx => $row) {
            $nmes_actual = date('m', strtotime($row->fecha));
            if ((isset($mesnumero) && ($nmes_actual == $mesnumero || $mesnumero == 0)) || !isset($mesnumero) ) {

                // Comprobar si se necesita una nueva página ANTES de dibujar la fila.
                // Estimamos una altura mínima. AutoPageBreak se encargará si una celda es muy alta.
                if ($current_row_y_start + $line_height > ($pdf->GetPageHeight() - $pdf->bMargin)) {
                    $pdf->AddPage($pdf->CurOrientation);
                    // Redibujar cabeceras si es necesario (plantilla2.php podría hacerlo en su método Header())
                    // Si no, debes redibujarlas manualmente aquí:
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
                    
                    $current_row_y_start = $pdf->GetY(); // Nueva Y después de AddPage y cabeceras
                    $table_body_start_x = $pdf->GetX();  // Reiniciar X por si acaso
                }

                $current_x_pos = $table_body_start_x; // X actual para dibujar celdas
                $y_positions_after_cells = []; // Almacenará las posiciones Y después de cada celda de esta fila

                // Celda 1: #sesion
                $pdf->SetXY($current_x_pos, $current_row_y_start);
                $pdf->MultiCell(10, $line_height, utf8_decode((string)$row->numerosesion), 1, 'R');
                $y_positions_after_cells[] = $pdf->GetY();
                $current_x_pos += 10;

                // Celda 2: Dia
                $pdf->SetXY($current_x_pos, $current_row_y_start);
                $dias = array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado');
                $dia_semana = $dias[date('w', strtotime($row->fecha))];
                $pdf->MultiCell(15, $line_height, utf8_decode($dia_semana), 1, 'L');
                $y_positions_after_cells[] = $pdf->GetY();
                $current_x_pos += 15;

                // Celda 3: Fecha
                $pdf->SetXY($current_x_pos, $current_row_y_start);
                $pdf->MultiCell(15, $line_height, utf8_decode($row->fecha), 1, 'L');
                $y_positions_after_cells[] = $pdf->GetY();
                $current_x_pos += 15;

                // Celda 4: Inicio
                $pdf->SetXY($current_x_pos, $current_row_y_start);
                $pdf->MultiCell(15, $line_height, utf8_decode($row->horainicio), 1, 'L');
                $y_positions_after_cells[] = $pdf->GetY();
                $current_x_pos += 15;

                // Celda 5: Termino
                $pdf->SetXY($current_x_pos, $current_row_y_start);
                $pdf->MultiCell(15, $line_height, utf8_decode($row->horafin), 1, 'L');
                $y_positions_after_cells[] = $pdf->GetY();
                $current_x_pos += 15;

                // Celda 6: Conect
                $pdf->SetXY($current_x_pos, $current_row_y_start);
                $conect_val = ($row->numeasis > 0) ? (string)$row->numeasis : " ";
                $pdf->MultiCell(15, $line_height, utf8_decode($conect_val), 1, 'C');
                $y_positions_after_cells[] = $pdf->GetY();
                $current_x_pos += 15;

                // Celda 7: NoConect
                $pdf->SetXY($current_x_pos, $current_row_y_start);
                $no_conect_val = ($row->numeasis > 0) ? (string)($row->numalum - $row->numeasis) : " ";
                $pdf->MultiCell(15, $line_height, utf8_decode($no_conect_val), 1, 'C');
                $y_positions_after_cells[] = $pdf->GetY();
                $current_x_pos += 15;

                // Celda 8: Tema (temacorto) - Celda Crítica
                $pdf->SetXY($current_x_pos, $current_row_y_start);
                // Reemplazar saltos de línea múltiples con un espacio para un mejor flujo en MultiCell.
                // Si los saltos de línea originales son intencionales y deben mantenerse, no uses preg_replace.
                $tema_corto_limpio = preg_replace('/[\r\n]+/', ' ', $row->temacorto);
                $pdf->MultiCell(120, $line_height, utf8_decode($tema_corto_limpio), 1, 'L');
                $y_positions_after_cells[] = $pdf->GetY();
                $current_x_pos += 120;

                // Celda 9: Control
                $pdf->SetXY($current_x_pos, $current_row_y_start);
                $pdf->MultiCell(18, $line_height, utf8_decode("X SISTEMA"), 1, 'C');
                $y_positions_after_cells[] = $pdf->GetY();
                // $current_x_pos += 18; // No es necesario para la última celda

                // Determinar la posición Y máxima después de dibujar todas las celdas de esta fila
                $max_y_for_row = $current_row_y_start; // Iniciar con la Y de inicio de fila
                if (!empty($y_positions_after_cells)) {
                    $max_y_for_row = max($y_positions_after_cells);
                }
                
                // La siguiente fila comenzará en esta Y máxima
                $current_row_y_start = $max_y_for_row;
                
                // Establecer X al inicio de la línea para la siguiente iteración (simula un Ln())
                $pdf->SetX($table_body_start_x); 
            }
        }
    }

    $pdf->Output();
?>
