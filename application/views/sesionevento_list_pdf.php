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
        $pdf->asignatura = "Evento(Clase):  " . $sesioneventos[0]->elevento;
    } else {
        $pdf->asignatura = "Evento(Clase):  (No definido)";
    }
    if (isset($instructor) && !empty($instructor) && isset($instructor[0]->nombres)) {
        $pdf->docente = "Docente:  " . $instructor[0]->nombres;
    } else {
        $pdf->docente = "Docente:  (No definido)";
    }

    if (isset($mesnumero) && $mesnumero > 0 && isset($mesletra) && isset($mesletra[$mesnumero])) {
        $pdf->mes = "Mes:  " . $mesletra[$mesnumero];
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
    $line_height = 5; // Altura de línea base para las celdas

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

                // Calcula el número de líneas para la celda "Tema"
                $tema_limpio = isset($row->tema) ? (string)$row->tema : '';
                $tema_limpio = preg_replace('/[\r\n]+/', ' ', $tema_limpio); // Limpiar saltos de línea adicionales
                $num_lines_tema = $pdf->NbLines(120, utf8_decode($tema_limpio)); // 120 es el ancho de la celda Tema

                // Calcula la altura total de la fila basada en el número de líneas del tema
                $row_height = $num_lines_tema * $line_height;

                // Asegúrate de que la altura mínima sea $line_height si el tema es corto
                if ($row_height < $line_height) {
                    $row_height = $line_height;
                }

                if ($current_row_y_start + $row_height > ($pdf->GetPageHeight() - $page_break_bottom_margin)) {
                    // Add a new page with the same Landscape orientation
                    $pdf->AddPage('L');
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

                // Determinar el color de fondo de la fila
                $idmodoevaluacion = isset($row->idmodoevaluacion) ? (int)$row->idmodoevaluacion : 0;
                if ($idmodoevaluacion > 1) {
                    $pdf->SetFillColor(255, 255, 204); // Amarillo claro
                    $fill = true;
                } else {
                    $pdf->SetFillColor(255, 255, 255); // Blanco
                    $fill = false;
                }

                // Guardar la posición Y inicial de la fila
                $start_y_for_row = $pdf->GetY();

                // Dibuja el fondo de la fila completa antes de las celdas
                // Asegúrate de que la fila se rellene con el color correcto
                $pdf->Rect($table_body_start_x, $current_row_y_start, 23 + 15*6 + 120 + 18, $row_height, 'F'); // Ancho total de la tabla (10+15*6+120+18 = 258)
                // Restablecer el color de relleno si no hay relleno específico para la celda individual
                $pdf->SetFillColor(255, 255, 255); // Restablecer a blanco para las celdas si no se rellenan individualmente


                // Celda 1: #sesion
                $pdf->SetXY($current_x_pos, $current_row_y_start);
                $pdf->MultiCell(10, $row_height, utf8_decode(isset($row->numerosesion) ? (string)$row->numerosesion : ''), 1, 'R', $fill); // $fill para el borde y el relleno
                $current_x_pos += 10;

                // Celda 2: Dia
                $pdf->SetXY($current_x_pos, $current_row_y_start);
                $dias = array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado');
                $dia_semana = $dias[date('w', strtotime($fecha_actual_row))];
                $pdf->MultiCell(15, $row_height, utf8_decode($dia_semana), 1, 'L', $fill);
                $current_x_pos += 15;

                // Celda 3: Fecha
                $pdf->SetXY($current_x_pos, $current_row_y_start);
                $pdf->MultiCell(15, $row_height, utf8_decode($fecha_actual_row), 1, 'L', $fill);
                $current_x_pos += 15;

                // Celda 4: Inicio
                $pdf->SetXY($current_x_pos, $current_row_y_start);
                $pdf->MultiCell(15, $row_height, utf8_decode(isset($row->horainicio) ? (string)$row->horainicio : ''), 1, 'L', $fill);
                $current_x_pos += 15;

                // Celda 5: Termino
                $pdf->SetXY($current_x_pos, $current_row_y_start);
                $pdf->MultiCell(15, $row_height, utf8_decode(isset($row->horafin) ? (string)$row->horafin : ''), 1, 'L', $fill);
                $current_x_pos += 15;

                // Celda 6: Conect
                $pdf->SetXY($current_x_pos, $current_row_y_start);
                $numeasis = isset($row->numeasis) ? (int)$row->numeasis : 0;
                $conect_val = ($numeasis > 0) ? (string)$numeasis : " ";
                $pdf->MultiCell(15, $row_height, utf8_decode($conect_val), 1, 'C', $fill);
                $current_x_pos += 15;

                // Celda 7: NoConect
                $pdf->SetXY($current_x_pos, $current_row_y_start);
                $numalum = isset($row->numalum) ? (int)$row->numalum : 0;
                $no_conect_val = ($numeasis > 0) ? (string)($numalum - $numeasis) : " ";
                $pdf->MultiCell(15, $row_height, utf8_decode($no_conect_val), 1, 'C', $fill);
                $current_x_pos += 15;

                // Celda 8: Tema (tema)
                $pdf->SetXY($current_x_pos, $current_row_y_start);
                $pdf->MultiCell(120, $row_height, utf8_decode($tema_limpio), 1, 'L', $fill);
                $current_x_pos += 120;

                // Celda 9: Control
                $pdf->SetXY($current_x_pos, $current_row_y_start);
                $pdf->MultiCell(18, $row_height, utf8_decode("X SISTEMA"), 1, 'C', $fill);

                // Actualizar la posición Y para la siguiente fila
                $current_row_y_start = $start_y_for_row + $row_height; // Mueve la posición Y por la altura calculada de la fila
                $pdf->SetX($table_body_start_x); // Vuelve al inicio de la tabla para la siguiente fila
            }
        }
    }

    $pdf->Output();
?>
