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
    $line_height = 6; // <-- AJUSTE AQUÍ: Aumenta ligeramente la altura base de línea, por ejemplo a 5.2 o 5.5

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

                $tema_original = isset($row->tema) ? (string)$row->tema : '';
                $tema_formateado_fpdf = str_replace("\r", "", $tema_original);
                $tema_formateado_fpdf = utf8_decode($tema_formateado_fpdf);

                $num_lines_tema = $pdf->NbLines(120, $tema_formateado_fpdf);
                $row_height = $num_lines_tema * $line_height;

                if ($row_height < $line_height) {
                    $row_height = $line_height;
                }

                if ($num_lines_tema > 1) {
                    $row_height += ($num_lines_tema * 0.7); // Ajusta el padding si es necesario
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

                if ($idmodoevaluacion > 1) {
                    $fill_color_r = 255;
                    $fill_color_g = 255;
                    $fill_color_b = 204;
                }
                
                $pdf->SetFillColor($fill_color_r, $fill_color_g, $fill_color_b);
                // Dibuja el fondo de la fila completa
                $pdf->Rect($table_body_start_x, $current_row_y_start, 10 + (15 * 6) + 120 + 18, $row_height, 'F');
                
                $pdf->SetFillColor(255, 255, 255); // Reset a blanco


                $current_x_pos = $table_body_start_x;
                
                // Celda 1: #sesion (MultiCell con altura de fila completa, alineación vertical al centro por defecto)
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

                // --- CAMBIO CLAVE AQUÍ PARA LA CELDA 'TEMA' ---
                // Para alinear verticalmente arriba:
                // 1. Dibuja el borde de la celda con la altura total de la fila.
                $pdf->Rect($current_x_pos, $current_row_y_start, 120, $row_height, 'D'); // 'D' para dibujar solo el borde
                
                // 2. Reposiciona el cursor a la esquina superior izquierda de esta celda
                // con un pequeño padding vertical (ej. 0.5mm) para que el texto no quede pegado al borde.
                $pdf->SetXY($current_x_pos + 0.5, $current_row_y_start + 0.5); // Ajusta 0.5 según necesites

                // 3. Imprime el texto del tema usando MultiCell con una altura de línea (line_height),
                // y sin bordes ni relleno, ya que el Rect ya dibujó el borde y el fondo.
                // El `MultiCell` avanzará el cursor `Y` por sí mismo.
                $pdf->MultiCell(120 - 1, $line_height, $tema_formateado_fpdf, 0, 'L', false); // Resta 1 a width para el padding X

                // 4. Mueve el cursor X a la posición final de esta celda para la siguiente columna.
                // La posición Y debe volver al inicio de la fila actual para la última celda.
                $current_x_pos += 120; // Ancho de la celda Tema
                $pdf->SetXY($current_x_pos, $current_row_y_start); // Vuelve a la Y de inicio de la fila para la siguiente celda

                // Celda 9: Control (MultiCell con altura de fila completa, alineación vertical al centro por defecto)
                $pdf->MultiCell(18, $row_height, utf8_decode("X SISTEMA"), 1, 'C', false);

                // Actualizar la posición Y para la siguiente fila
                $current_row_y_start = $current_row_y_start + $row_height;
                $pdf->SetX($table_body_start_x);
            }
        }
    }

    $pdf->Output();
?>
