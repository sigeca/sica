<?php

    include 'plantilla2.php'; // Asegúrate de que esta línea esté presente y correcta

    $pdf = new PDF();
    $pdf->SetMargins(23, 10, 11.7);
    $pdf->SetAutoPageBreak(true, 40); // Margen inferior para el pie de página y un buffer

    $pdf->institucion = 'UNIVERSIDAD TÉCNICA LUIS VARGAS TORRES DE ESMERALDAS';
    $pdf->unidad = 'UNIDAD DE NIVELACION';
    $pdf->departamento = 'PERIODO: 2023-1S';
    $pdf->titulo = "CONTROL ACADÉMICO - LECCIONARIO";

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

    // --- Cabecera de la tabla ---
    $pdf->SetFillColor(232, 232, 232); // Gris claro para la cabecera
    $pdf->SetFont('Arial', 'B', 8); // Fuente en negrita

    // Establecer el ancho de la línea para los bordes de la tabla
    $pdf->SetLineWidth(0.2); // Borde más fino para un look profesional (puedes probar 0.1 también)

    // Celdas de la cabecera de la tabla
    $pdf->Cell(10, 7, '#sesion', 1, 0, 'C', 1); // Aumentamos la altura de la cabecera a 7mm
    $pdf->Cell(15, 7, 'Dia', 1, 0, 'C', 1);
    $pdf->Cell(15, 7, 'Fecha', 1, 0, 'C', 1);
    $pdf->Cell(15, 7, 'Inicio', 1, 0, 'C', 1);
    $pdf->Cell(15, 7, 'Termino', 1, 0, 'C', 1);
    $pdf->Cell(15, 7, 'Conect', 1, 0, 'C', 1);
    $pdf->Cell(15, 7, 'NoConect', 1, 0, 'C', 1);
    $pdf->Cell(120, 7, 'Tema', 1, 0, 'C', 1);
    $pdf->Cell(18, 7, 'Control', 1, 1, 'C', 1); // Salto de línea al final

    // --- Contenido de la tabla ---
    $pdf->SetFont('Arial', '', 7); // Fuente normal para el contenido
    $base_cell_height = 5; // Altura base de línea para celdas de una sola línea
    $cell_padding_y = 0.5; // Pequeño padding vertical para el texto dentro de la celda
    $cell_padding_x = 0.5; // Pequeño padding horizontal para el texto dentro de la celda

    $table_body_start_x = $pdf->GetX();
    $current_row_y_start = $pdf->GetY();
    $row_count = 0; // Contador para filas alternas

    $page_break_bottom_margin = 40;

    if (isset($sesioneventos) && is_array($sesioneventos)) {
        foreach ($sesioneventos as $idx => $row) {
            $fecha_actual_row = isset($row->fecha) ? $row->fecha : null;
            if (!$fecha_actual_row) {
                continue;
            }
            $nmes_actual = date('m', strtotime($fecha_actual_row));

            if ((isset($mesnumero) && ($nmes_actual == $mesnumero || $mesnumero == 0)) || !isset($mesnumero) ) {
                $row_count++; // Incrementar el contador de filas

                // Preparar el texto del campo 'tema'
                $tema_original = isset($row->tema) ? (string)$row->tema : '';
                $tema_formateado_fpdf = str_replace("\r", "", $tema_original); // Eliminar \r
                $tema_formateado_fpdf = utf8_decode($tema_formateado_fpdf); // Decodificar a ISO-8859-1

                // Calcular la altura de la fila basándose en el campo 'tema'
                $num_lines_tema = $pdf->NbLines(120 - (2 * $cell_padding_x), $tema_formateado_fpdf); // Ancho para el texto real
                
                // Calculamos la altura necesaria para el MultiCell.
                // Multiplicamos por GetFontSize() y un factor para espacio de línea.
                $calculated_tema_height = $num_lines_tema * $pdf->GetFontSize() * 1.2; // AQUI el cambio
                
                // Asegurar que la altura mínima de la fila sea la altura base_cell_height
                $row_height = max($base_cell_height, $calculated_tema_height + (2 * $cell_padding_y)); // Altura mínima + padding

                // Si la altura calculada es mayor que la base_cell_height, añade un pequeño buffer adicional
                if ($num_lines_tema > 1) {
                    $row_height += ($num_lines_tema * 0.5); // Ajuste fino para texto multilinea
                }


                // Comprobar si la fila actual excederá el límite de la página
                if ($current_row_y_start + $row_height > ($pdf->GetPageHeight() - $page_break_bottom_margin)) {
                    $pdf->AddPage('L'); // Añadir nueva página
                    // Redibujar la cabecera de la tabla en la nueva página
                    $pdf->SetFillColor(232,232,232);
                    $pdf->SetFont('Arial','B',8);
                    $pdf->SetLineWidth(0.2); // Restablecer el ancho de línea
                    $pdf->Cell(10, 7, '#sesion', 1, 0, 'C', 1);
                    $pdf->Cell(15, 7, 'Dia', 1, 0, 'C', 1);
                    $pdf->Cell(15, 7, 'Fecha', 1, 0, 'C', 1);
                    $pdf->Cell(15, 7, 'Inicio', 1, 0, 'C', 1);
                    $pdf->Cell(15, 7, 'Termino', 1, 0, 'C', 1);
                    $pdf->Cell(15, 7, 'Conect', 1, 0, 'C', 1);
                    $pdf->Cell(15, 7, 'NoConect', 1, 0, 'C', 1);
                    $pdf->Cell(120, 7, 'Tema', 1, 0, 'C', 1);
                    $pdf->Cell(18, 7, 'Control', 1, 1, 'C', 1);
                    $pdf->SetFont('Arial','',7);
                    $current_row_y_start = $pdf->GetY(); // Reiniciar Y
                    $table_body_start_x = $pdf->GetX(); // Reiniciar X
                }

                // --- Fondo de fila y alineación vertical superior ---
                $idmodoevaluacion = isset($row->idmodoevaluacion) ? (int)$row->idmodoevaluacion : 0;
                $fill_color_r = 255;
                $fill_color_g = 255;
                $fill_color_b = 255; // Por defecto: Blanco

                // Color de fila alterna (Gris muy claro)
                if ($row_count % 2 == 0) {
                    $fill_color_r = 245; $fill_color_g = 245; $fill_color_b = 245; // Gris muy claro
                }

                // Color especial si idmodoevaluacion > 1
                if ($idmodoevaluacion > 1) {
                    $fill_color_r = 255; $fill_color_g = 255; $fill_color_b = 204; // Amarillo claro
                }
                
                // Establecer el color de relleno y dibujar el fondo de toda la fila
                $pdf->SetFillColor($fill_color_r, $fill_color_g, $fill_color_b);
                $total_row_width = 10 + (15 * 6) + 120 + 18;
                $pdf->Rect($table_body_start_x, $current_row_y_start, $total_row_width, $row_height, 'F');
                
                // Restablecer el color de relleno a blanco (o el color del texto)
                $pdf->SetFillColor(255, 255, 255); 


                $current_x_pos = $table_body_start_x;
                
                // Dibujar cada celda individualmente con borde y texto, alineado arriba
                $cols = [
                    ['width' => 10, 'text' => utf8_decode(isset($row->numerosesion) ? (string)$row->numerosesion : ''), 'align' => 'R'],
                    ['width' => 15, 'text' => utf8_decode($dias[date('w', strtotime($fecha_actual_row))]), 'align' => 'L'],
                    ['width' => 15, 'text' => utf8_decode($fecha_actual_row), 'align' => 'L'],
                    ['width' => 15, 'text' => utf8_decode(isset($row->horainicio) ? (string)$row->horainicio : ''), 'align' => 'L'],
                    ['width' => 15, 'text' => utf8_decode(isset($row->horafin) ? (string)$row->horafin : ''), 'align' => 'L'],
                    ['width' => 15, 'text' => utf8_decode((isset($row->numeasis) ? (int)$row->numeasis : 0) > 0 ? (string)(isset($row->numeasis) ? (int)$row->numeasis : 0) : " "), 'align' => 'C'],
                    ['width' => 15, 'text' => utf8_decode((isset($row->numeasis) ? (int)$row->numeasis : 0) > 0 ? (string)((isset($row->numalum) ? (int)$row->numalum : 0) - (isset($row->numeasis) ? (int)$row->numeasis : 0)) : " "), 'align' => 'C'],
                    ['width' => 120, 'text' => $tema_formateado_fpdf, 'align' => 'L'], // Tema ya está decodificado
                    ['width' => 18, 'text' => utf8_decode("X SISTEMA"), 'align' => 'C'],
                ];

                foreach ($cols as $col) {
                    // Dibuja el borde de la celda individual
                    $pdf->Rect($current_x_pos, $current_row_y_start, $col['width'], $row_height, 'D'); // 'D' para dibujar solo el borde

                    // Establece la posición para el texto (arriba-izquierda con padding)
                    $pdf->SetXY($current_x_pos + $cell_padding_x, $current_row_y_start + $cell_padding_y);
                    
                    // Imprime el texto con MultiCell, sin borde y sin relleno (ya dibujados)
                    // La altura del MultiCell es ahora GetFontSize() * 1.2 para el espaciado de línea.
                    $pdf->MultiCell($col['width'] - (2 * $cell_padding_x), $pdf->GetFontSize() * 1.2, $col['text'], 0, $col['align'], false); // AQUI el cambio
                    
                    // Mueve el cursor X a la siguiente columna, Y sigue en la posición actual de la fila
                    $current_x_pos += $col['width'];
                }

                // Actualizar la posición Y para la siguiente fila
                $current_row_y_start = $current_row_y_start + $row_height;
                $pdf->SetX($table_body_start_x); // Volver al inicio de la tabla para la próxima fila
            }
        }
    }

    $pdf->Output();
?>
