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
            $fecha_actual_row = isset($row->fecha) ? $row->fecha : null;
            if (!$fecha_actual_row) {
                continue;
            }
            $nmes_actual = date('m', strtotime($fecha_actual_row));

            if ((isset($mesnumero) && ($nmes_actual == $mesnumero || $mesnumero == 0)) || !isset($mesnumero) ) {

                // Preparar el texto del tema y decodificarlo para FPDF
                $tema_limpio = isset($row->tema) ? (string)$row->tema : '';
                $tema_limpio_decoded = utf8_decode(preg_replace('/[\r\n]+/', ' ', $tema_limpio));

                // Calcular el número de líneas para la celda "Tema"
                // Añadimos un pequeño margen extra a la altura calculada para evitar recortes
                $num_lines_tema = $pdf->NbLines(120, $tema_limpio_decoded);
                $row_height = $num_lines_tema * $line_height;

                // Asegurar que la altura mínima de la fila sea la altura de línea base
                if ($row_height < $line_height) {
                    $row_height = $line_height;
                }
                
                // *** Ajuste clave aquí: Añade un pequeño padding vertical si el texto es multilinea
                // Esto ayuda a que el texto no quede "pegado" al borde y evita recortes
                if ($num_lines_tema > 1) {
                    $row_height += 1; // Añade 1mm extra por cada línea adicional
                }


                if ($current_row_y_start + $row_height > ($pdf->GetPageHeight() - $page_break_bottom_margin)) {
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

                // Determinar el color de fondo de la fila
                $idmodoevaluacion = isset($row->idmodoevaluacion) ? (int)$row->idmodoevaluacion : 0;
                $fill_color_r = 255;
                $fill_color_g = 255;
                $fill_color_b = 255;
                $apply_fill = false; // Bandera para controlar si se aplica el color de fondo

                if ($idmodoevaluacion > 1) {
                    $fill_color_r = 255; // Amarillo claro
                    $fill_color_g = 255;
                    $fill_color_b = 204;
                    $apply_fill = true;
                }
                
                // *** Solución para el color de fondo: Dibuja un rectángulo para toda la fila
                // Esto asegura que el color de fondo cubra toda la fila de manera consistente
                $pdf->SetFillColor($fill_color_r, $fill_color_g, $fill_color_b);
                $pdf->Rect($table_body_start_x, $current_row_y_start, 10 + (15 * 6) + 120 + 18, $row_height, 'F'); // Ancho total de la tabla (258)
                
                // Restablece el color de relleno a blanco y no uses $fill en MultiCell para evitar superposiciones
                $pdf->SetFillColor(255, 255, 255); 


                $current_x_pos = $table_body_start_x;

                // Ahora dibuja las celdas SIN el parámetro $fill (o con false)
                // El relleno ya lo hicimos con el Rect anterior.
                // MultiCell(width, height, text, border, align, fill_flag)
                
                // Celda 1: #sesion
                $pdf->SetXY($current_x_pos, $current_row_y_start);
                $pdf->MultiCell(10, $row_height, utf8_decode(isset($row->numerosesion) ? (string)$row->numerosesion : ''), 1, 'R', false); // false para no rellenar aquí
                $current_x_pos += 10;

                // Celda 2: Dia
                $pdf->SetXY($current_x_pos, $current_row_y_start);
                $dias = array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado');
                $dia_semana = $dias[date('w', strtotime($fecha_actual_row))];
                $pdf->MultiCell(15, $row_height, utf8_decode($dia_semana), 1, 'L', false);
                $current_x_pos += 15;

                // Celda 3: Fecha
                $pdf->SetXY($current_x_pos, $current_row_y_start);
                $pdf->MultiCell(15, $row_height, utf8_decode($fecha_actual_row), 1, 'L', false);
                $current_x_pos += 15;

                // Celda 4: Inicio
                $pdf->SetXY($current_x_pos, $current_row_y_start);
                $pdf->MultiCell(15, $row_height, utf8_decode(isset($row->horainicio) ? (string)$row->horainicio : ''), 1, 'L', false);
                $current_x_pos += 15;

                // Celda 5: Termino
                $pdf->SetXY($current_x_pos, $current_row_y_start);
                $pdf->MultiCell(15, $row_height, utf8_decode(isset($row->horafin) ? (string)$row->horafin : ''), 1, 'L', false);
                $current_x_pos += 15;

                // Celda 6: Conect
                $pdf->SetXY($current_x_pos, $current_row_y_start);
                $numeasis = isset($row->numeasis) ? (int)$row->numeasis : 0;
                $conect_val = ($numeasis > 0) ? (string)$numeasis : " ";
                $pdf->MultiCell(15, $row_height, utf8_decode($conect_val), 1, 'C', false);
                $current_x_pos += 15;

                // Celda 7: NoConect
                $pdf->SetXY($current_x_pos, $current_row_y_start);
                $numalum = isset($row->numalum) ? (int)$row->numalum : 0;
                $no_conect_val = ($numeasis > 0) ? (string)($numalum - $numeasis) : " ";
                $pdf->MultiCell(15, $row_height, utf8_decode($no_conect_val), 1, 'C', false);
                $current_x_pos += 15;

                // Celda 8: Tema (tema)
                $pdf->SetXY($current_x_pos, $current_row_y_start);
                $pdf->MultiCell(120, $row_height, $tema_limpio_decoded, 1, 'L', false); // Usa la versión decodificada
                $current_x_pos += 120;

                // Celda 9: Control
                $pdf->SetXY($current_x_pos, $current_row_y_start);
                $pdf->MultiCell(18, $row_height, utf8_decode("X SISTEMA"), 1, 'C', false);

                // Actualizar la posición Y para la siguiente fila
                $current_row_y_start = $current_row_y_start + $row_height;
                $pdf->SetX($table_body_start_x);
            }
        }
    }

    $pdf->Output();
?>
