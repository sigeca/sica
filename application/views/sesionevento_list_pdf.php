<?php

    // Incluye tu clase PDF personalizada que extiende FPDF
    include 'plantilla2.php';

    $pdf = new PDF();
    // Establece los márgenes del documento: izquierda, arriba, derecha
    $pdf->SetMargins(23, 10, 11.7);
    // Configura el salto de página automático: habilitado, y margen inferior antes del salto
    $pdf->SetAutoPageBreak(true, 40);

    // Asignación de datos de cabecera al objeto PDF
    $pdf->institucion = 'UNIVERSIDAD TÉCNICA LUIS VARGAS TORRES DE ESMERALDAS';
    $pdf->unidad = 'UNIDAD DE NIVELACION';
    $pdf->departamento = 'PERIODO: 2023-1S';
    $pdf->titulo = "CONTROL ACADÉMICO - LECCIONARIO";

    // Asignar datos de evento, instructor y mes de forma segura
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

    // Alias para el número total de páginas ({nb}) en el pie de página
    $pdf->AliasNbPages();
    // Añadir la primera página en orientación Horizontal (L)
    $pdf->AddPage('L');

    // --- Cabecera de la tabla ---
    $pdf->SetFillColor(232, 232, 232); // Color de fondo para la cabecera (gris claro)
    $pdf->SetFont('Arial', 'B', 8); // Fuente en negrita para la cabecera

    // Definición de las celdas de la cabecera de la tabla
    $pdf->Cell(10, 5, '#sesion', 1, 0, 'C', 1);
    $pdf->Cell(15, 5, 'Dia', 1, 0, 'C', 1);
    $pdf->Cell(15, 5, 'Fecha', 1, 0, 'C', 1);
    $pdf->Cell(15, 5, 'Inicio', 1, 0, 'C', 1);
    $pdf->Cell(15, 5, 'Termino', 1, 0, 'C', 1);
    $pdf->Cell(15, 5, 'Conect', 1, 0, 'C', 1);
    $pdf->Cell(15, 5, 'NoConect', 1, 0, 'C', 1);
    $pdf->Cell(120, 5, 'Tema', 1, 0, 'C', 1);
    $pdf->Cell(18, 5, 'Control', 1, 1, 'C', 1); // El '1' al final indica salto de línea

    // --- Contenido de la tabla ---
    $pdf->SetFont('Arial', '', 7); // Fuente normal para el contenido de la tabla
    $line_height = 5; // Altura base para las filas de la tabla

    $table_body_start_x = $pdf->GetX(); // Posición X inicial de la tabla (margen izquierdo)
    $current_row_y_start = $pdf->GetY(); // Posición Y inicial para la primera fila de datos

    $page_break_bottom_margin = 40; // Margen inferior para el salto de página automático

    if (isset($sesioneventos) && is_array($sesioneventos)) {
        foreach ($sesioneventos as $idx => $row) {
            $fecha_actual_row = isset($row->fecha) ? $row->fecha : null;
            if (!$fecha_actual_row) {
                continue; // Saltar la fila si la fecha no está definida
            }
            $nmes_actual = date('m', strtotime($fecha_actual_row));

            // Filtra por mes si $mesnumero está definido y no es 0 (todos los meses)
            if ((isset($mesnumero) && ($nmes_actual == $mesnumero || $mesnumero == 0)) || !isset($mesnumero) ) {

                // 1. Prepara el texto del campo 'tema' para FPDF (eliminar \r, mantener \n, decodificar)
                $tema_original = isset($row->tema) ? (string)$row->tema : '';
                // Eliminar el retorno de carro (\r) para que solo quede \n como salto de línea
                $tema_formateado_fpdf = str_replace("\r", "", $tema_original);
                // Decodificar a ISO-8859-1 para FPDF
                $tema_formateado_fpdf = utf8_decode($tema_formateado_fpdf);

                // 2. Calcular la altura de la fila basándose en el campo 'tema'
                $num_lines_tema = $pdf->NbLines(120, $tema_formateado_fpdf);
                $row_height = $num_lines_tema * $line_height;

                // Asegurar que la altura mínima de la fila sea la altura de línea base
                if ($row_height < $line_height) {
                    $row_height = $line_height;
                }

                // *** AJUSTE CLAVE: Añadir un pequeño padding vertical extra para evitar recortes
                // Esto es especialmente útil si el texto del tema ocupa múltiples líneas
                if ($num_lines_tema > 1) {
                    $row_height += ($num_lines_tema * 0.5); // Añade 0.5mm por cada línea adicional
                                                           // Puedes ajustar este valor (ej. 0.7, 1)
                }

                // Comprobar si la fila actual excederá el límite de la página
                if ($current_row_y_start + $row_height > ($pdf->GetPageHeight() - $page_break_bottom_margin)) {
                    $pdf->AddPage('L'); // Añadir una nueva página en orientación horizontal

                    // Redibujar la cabecera de la tabla en la nueva página
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

                    // Restablecer las posiciones de inicio para la nueva página
                    $current_row_y_start = $pdf->GetY();
                    $table_body_start_x = $pdf->GetX();
                }

                // 3. Determinar el color de fondo de la fila
                $idmodoevaluacion = isset($row->idmodoevaluacion) ? (int)$row->idmodoevaluacion : 0;
                $fill_color_r = 255;
                $fill_color_g = 255;
                $fill_color_b = 255; // Por defecto, blanco

                if ($idmodoevaluacion > 1) {
                    $fill_color_r = 255; // Amarillo claro
                    $fill_color_g = 255;
                    $fill_color_b = 204;
                }

                // *** SOLUCIÓN CLAVE PARA EL COLOR DE FONDO: Dibuja un rectángulo para toda la fila
                $pdf->SetFillColor($fill_color_r, $fill_color_g, $fill_color_b);
                $pdf->Rect($table_body_start_x, $current_row_y_start, 10 + (15 * 6) + 120 + 18, $row_height, 'F');
                
                // Restablece el color de relleno a blanco para las próximas celdas individuales
                // Esto es importante para que el borde se dibuje sobre el fondo y no se vea extraño.
                $pdf->SetFillColor(255, 255, 255);

                $current_x_pos = $table_body_start_x; // Reiniciar la posición X para la fila actual

                // 4. Dibujar las celdas de la fila
                // Nota: El último parámetro `fill` en MultiCell ahora es `false`,
                // porque el fondo ya lo pintamos con el Rect anterior.

                // Celda 1: #sesion
                $pdf->SetXY($current_x_pos, $current_row_y_start);
                $pdf->MultiCell(10, $row_height, utf8_decode(isset($row->numerosesion) ? (string)$row->numerosesion : ''), 1, 'R', false);
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

                // Celda 8: Tema
                $pdf->SetXY($current_x_pos, $current_row_y_start);
                $pdf->MultiCell(120, $row_height, $tema_formateado_fpdf, 1, 'L', false);
                $current_x_pos += 120;

                // Celda 9: Control
                $pdf->SetXY($current_x_pos, $current_row_y_start);
                $pdf->MultiCell(18, $row_height, utf8_decode("X SISTEMA"), 1, 'C', false);

                // Actualizar la posición Y para la siguiente fila
                $current_row_y_start = $current_row_y_start + $row_height;
                // Volver a la posición X inicial de la tabla para la próxima fila
                $pdf->SetX($table_body_start_x);
            }
        }
    }

    // Generar la salida del PDF
    $pdf->Output();
?>
