<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'plantilla2.php'; // Asumiendo que plantilla2.php está en application/libraries/

class Reporte_Notas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('form');
        // También puedes cargar modelos aquí si los usas para obtener datos
        // $this->load->model('evento_model');
        // $this->load->model('participacion_model');
    }

    public function generar_reporte() {
        // 1. Obtención de datos (idealmente desde modelos, NO consultas directas aquí)
        $idparticipanteestado = $this->input->get('idparticipanteestado', TRUE) ? $this->input->get('idparticipanteestado', TRUE) : 0;
        $idpersona = $this->input->get('idpersona', TRUE) ? $this->input->get('idpersona', TRUE) : 0;

        // ** Asume que estas variables ya están cargadas con datos **
        // ** (Aquí deberías llamar a tus modelos para obtenerlas) **
        $evento = ['titulo' => 'Reporte de Notas del Curso XYZ', 'fechainicia' => '2024-01-15', 'fechafinaliza' => '2024-05-15']; // Ejemplo
        $asignatura = [(object)['nombre' => 'Programación Web I']]; // Ejemplo
        $distributivodocente = [(object)['eldocente' => 'Ing. Juan Pérez']]; // Ejemplo
        $calendarioacademico = [(object)['nombre' => 'Periodo Académico 2024-2025', 'fechadesde' => '2024-01-01', 'fechahasta' => '2024-12-31']]; // Ejemplo
        $fechacorte = ['2024-03-31', '2024-06-30']; // Ejemplo, debería ser un array de objetos o solo fechas
        $asistencias = []; // Rellenar con tus datos reales
        $jornadadocente = []; // Rellenar con tus datos reales
        $sesiondictada = []; // Rellenar con tus datos reales
        $sesioneventos = []; // Rellenar con tus datos reales
        $participacion = []; // Rellenar con tus datos reales
        $nivelrpt = 0; // Ejemplo

        // --- PRE-CARGA DE DATOS PARA EVITAR MÚLTIPLES CONSULTAS EN BUCLUES ---
        $participacion2_data_sum = []; // Para sum(porcentaje)
        $participacion2_data_count = []; // Para count(porcentaje)

        // Ajusta esta consulta para que sea lo más eficiente posible
        $query_p2 = $this->db->query("SELECT idpersona, idevento, fecha, porcentaje FROM participacion2 WHERE idmodoevaluacion=1");
        foreach ($query_p2->result() as $p2_row) {
            $key = $p2_row->idpersona . '_' . $p2_row->idevento . '_' . $p2_row->fecha;
            if (!isset($participacion2_data_sum[$key])) {
                $participacion2_data_sum[$key] = 0;
                $participacion2_data_count[$key] = 0;
            }
            $participacion2_data_sum[$key] += $p2_row->porcentaje;
            $participacion2_data_count[$key]++;
        }
        // --- FIN PRE-CARGA ---

        // Inicializar PDF
        $pdf = new PDF();
        $pdf->SetMargins(23, 10, 11.7);
        $pdf->SetAutoPageBreak(true, 40);

        // Set header information
        $pdf->institucion = 'UNIVERSIDAD TÉCNICA LUIS VARGAS TORRES DE ESMERALDAS';
        $pdf->unidad = 'FACULTAD DE INGENIERIAS (FACI)';
        $pdf->departamento = 'CARRERA EN TECNOLOGÍA DE LA INFORMACIÓN';
        $pdf->titulo = $evento['titulo'];
        $pdf->asignatura = "Asignatura: " . $asignatura[0]->nombre;
        $pdf->docente = "Docente: " . $distributivodocente[0]->eldocente;
        $pdf->mes = "Periodo: " . $calendarioacademico[0]->nombre;

        $pdf->AliasNbPages();
        $pdf->AddPage('L'); // Horizontal orientation

        // --- Impresión del Encabezado (dentro de la página, si no lo manejas en Header() de plantilla2.php) ---
        // Si tu plantilla2.php ya tiene un Header() personalizado que usa estas variables, no dupliques esto aquí.
        // Esto es un ejemplo de cómo lo harías si no estuviera en Header()
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(0,6,utf8_decode($pdf->institucion),0,1,'C');
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(0,5,utf8_decode($pdf->unidad),0,1,'C');
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(0,5,utf8_decode($pdf->departamento),0,1,'C');
        $pdf->Ln(5);
        $pdf->SetFont('Arial','B',11);
        $pdf->Cell(0,5,utf8_decode($pdf->titulo),0,1,'C');
        $pdf->Ln(3);
        $pdf->SetFont('Arial','',8);
        $pdf->Cell(0,4,utf8_decode($pdf->asignatura),0,1,'L');
        $pdf->Cell(0,4,utf8_decode($pdf->docente),0,1,'L');
        $pdf->Cell(0,4,utf8_decode($pdf->mes),0,1,'L');
        $pdf->Ln(5);
        // --- Fin Impresión Encabezado ---


        // ... (resto de tus inicializaciones) ...
        $aprobados = 0;
        $reprobados = 0;
        $desertores = 0;
        $parcial = array();
        $nnotas = array();
        foreach ($fechacorte as $p => $fc) {
            $parcial[$p] = 0;
            $nnotas[$p] = 0;
        }
        $nparcial = 0;
        $pdf->SetFont('Arial', '', 7);
        $id = 0;
        $i = 0;

        // ... (Lógica para calcular $arrasistencia y $sesiontotal) ...
        // Esta parte es compleja y se mantiene como está, asumiendo que funciona.

        // Encabezado de la tabla
        $pdf->SetFillColor(232, 232, 232);
        $pdf->SetFont('Arial', 'B', 8);

        // Define anchos de columna para mejor control visual
        $col_num = 5;
        $col_participante = 55;
        $col_ge = 5;
        $col_co = 5;
        $col_sesion = 8; // Para temacorto
        $col_parcial = 10;
        $col_asistencia = 12;
        $col_promedio = 10;
        $col_as_total = 12;


        $pdf->Cell($col_num, 5, '#', 1, 0, 'C', 1);
        $pdf->Cell($col_participante, 5, 'Participante', 1, 0, 'C', 1);
        $pdf->Cell($col_ge, 5, 'GE', 1, 0, 'C', 1);
        $pdf->Cell($col_co, 5, 'CO', 1, 0, 'C', 1);
        foreach ($sesioneventos as $row) {
            $pdf->Cell($col_sesion, 5, $row->temacorto, 1, 0, 'C', 1);
        }
        $pdf->Cell($col_parcial, 5, 'P1', 1, 0, 'C', 1);
        $pdf->Cell($col_asistencia, 5, 'As1('. ($sesiontotal[0] ?? 0) .')', 0, 'C', 1);
        $pdf->Cell($col_parcial, 5, 'P2', 1, 0, 'C', 1);
        $pdf->Cell($col_asistencia, 5, 'As2('. ($sesiontotal[1] ?? 0) .')', 0, 'C', 1);
        $pdf->Cell($col_promedio, 5, 'Prom', 1, 0, 'C', 1);
        $asT = ($sesiontotal[0] ?? 0) + ($sesiontotal[1] ?? 0);
        $pdf->Cell($col_as_total, 5, 'AsT('. $asT .')', 1, 1, 'C', 1);

        // Data processing and table rows
        $arrparticipacion = array();
        $arrgenero1 = array(); $arrgenero2 = array();
        $arrcolegio1 = array(); $arrcolegio2 = array();
        $arrayuda = array();
        $xparti = array();
        $datag = array();
        $datac = array();
        $fill = false; // Para alternar colores de fila

        foreach ($participacion as $row) {
            if (($idparticipanteestado == $row->idparticipanteestado || $idparticipanteestado == 0) && ($idpersona == $row->idpersona || $idpersona == 0)) {
                if ($id != $row->idpersona) {
                    if ($id > 0) { // Si no es el primer participante, imprime el anterior
                        $i++;
                        $pdf->SetFillColor($fill ? 240 : 255, $fill ? 240 : 255, $fill ? 240 : 255); // Gris claro/Blanco
                        $pdf->Cell($col_num,5,$i,1,0,'R',1);
                        $pdf->Cell($col_participante,5,utf8_decode($arrparticipacion[$id]),1,0,'L',1);
                        $pdf->Cell($col_ge,5,utf8_decode($arrgenero1[$id]),1,0,'L',1);
                        $pdf->Cell($col_co,5,utf8_decode($arrcolegio1[$id]),1,0,'L',1);

                        $fecha1_loop = $calendarioacademico[0]->fechadesde;
                        foreach ($sesioneventos as $row1) {
                            $key_p2 = $id . '_' . $row1->idevento . '_' . $row1->fecha;
                            $vp = $participacion2_data_sum[$key_p2] ?? 0;
                            $cmp = $participacion2_data_count[$key_p2] ?? 1;

                            $ponderacion = ($nivelrpt == 2 || $nivelrpt == 1) ? 1 : $row1->ponderacion;
                            $current_participacion = $arrparticipacion[$row1->fecha] ?? 0;
                            $current_ayuda = $arrayuda[$row1->fecha] ?? 0;

                            if ($current_ayuda > 0) {
                                $pdf->SetTextColor(3,18,249); // Azul para ayuda
                                $xparti_val = (100 - ($current_participacion + $current_ayuda)) * ($vp / (100 * $cmp));
                                $pdf->Cell($col_sesion,5,round(($current_participacion + $current_ayuda + $xparti_val) * $ponderacion,2),1,0,'R',1);
                            } else {
                                $xparti_val = (100 - ($current_participacion + $current_ayuda)) * ($vp / (100 * $cmp));
                                $pdf->Cell($col_sesion,5,round(($current_participacion + $current_ayuda + $xparti_val) * $ponderacion,2),1,0,'R',1);
                            }
                            $pdf->SetTextColor(0,0,0); // Restaura el color
                            $fecha1_loop = $row1->fecha;

                            $salir_inner = 0;
                            foreach ($fechacorte as $p_inner => $fc_inner) {
                                if (strtotime($row1->fecha) <= strtotime($fc_inner)) {
                                    $parcial[$p_inner] += round(($current_participacion + $current_ayuda + $xparti_val) * $ponderacion, 2);
                                    $nnotas[$p_inner]++;
                                    $nparcial = $p_inner;
                                    $salir_inner = 1;
                                }
                                if ($salir_inner == 1) { break; }
                            }
                        }

                        // ... (Impresión de parciales, promedios y asistencia, manteniendo la lógica existente) ...
                        // Asegúrate de usar $fill para el color de fondo de estas celdas también
                        // Example for partials:
                        $k=0; $sum=0;
                        foreach($parcial as $sp) {
                            if (isset($nnotas[$k]) && $nnotas[$k] >= 1) {
                                $sum += round($sp,0);
                                $pdf->Cell($col_parcial,5,round($sp,0),1,0,'R',1); // With fill
                                $pdf->Cell($col_asistencia,5,round((100*($arrasistencia[$id][$k] ?? 0)/($sesiontotal[$k] ?? 1)),0).'%',1,0,'R',1); // With fill
                                $k++;
                            } elseif ($sp > 0) {
                                $sum += round($sp,0);
                                $k++;
                            }
                        }
                        // ... (logic for $k==1 and $resu calculation) ...
                        // Apply fill color to average cell
                        if ($resu < 7) {
                            if ($resu < 5) {
                                $pdf->setFillColor(253,194,224); $pdf->Cell($col_promedio,5,$resu,1,0,'R',1);
                                $desertores++;
                            } else {
                                $pdf->setFillColor(245,249,3); $pdf->Cell($col_promedio,5,$resu,1,0,'R',1);
                                $reprobados++;
                            }
                        } else {
                            $pdf->setFillColor(7,195,250); $pdf->Cell($col_promedio,5,$resu,1,0,'R',1);
                            $aprobados++;
                        }
                        $pdf->Cell($col_as_total,5,round(100*((($arrasistencia[$id][0] ?? 0)+($arrasistencia[$id][1] ?? 0))/(($sesiontotal[0] ?? 1)+($sesiontotal[1] ?? 1))),0).'%',1,1,'R',1);


                        // Reiniciar para el próximo participante
                        foreach ($fechacorte as $p_reset => $fc_reset) {
                            $parcial[$p_reset] = 0;
                            $nnotas[$p_reset] = 0;
                        }
                        $nparcial = 0;
                        $sum = 0;
                        $fill = !$fill; // Alternar color para la próxima fila
                    }
                    // ... (almacenamiento de datos del nuevo participante) ...
                } else {
                    // ... (actualización de datos para el mismo participante) ...
                }
            }
        }
        // ... (lógica para imprimir el último participante, similar a la de arriba, usando $fill) ...

        // ... (Sección de Estadísticas, se mantiene similar, asegurando uso de utf8_decode() en labels si es necesario) ...
        $pdf->AddPage('L');
        $pdf->SetFont("Arial", "", 12);
        $pdf->Cell(0, 5, utf8_decode('Estadísticas de promovidos y no promovidos'), 0, 1);
        $pdf->Ln(8);

        $data_promovidos = array('Aprobados' => $aprobados, "Reprobados" => $reprobados, "Desertores" => $desertores);
        $pdf->SetFont('Arial', '', 10);
        $valX = $pdf->GetX();
        $valY = $pdf->GetY();
        foreach ($data_promovidos as $label => $value) {
            $pdf->Cell(30, 5, utf8_decode($label)); // Decode label
            $pdf->Cell(15, 5, $value, 0, 0, 'R');
            $pdf->Ln();
        }
        $pdf->Ln(8);

        $pdf->SetXY(90, $valY);
        $col1 = array(7, 195, 250); // celeste
        $col2 = array(245, 249, 3); // amarillo
        $col3 = array(253, 194, 224); // rosado
        $pdf->PieChart(100, 35, $data_promovidos, '%l : %v (%p)', array($col1, $col2, $col3));
        $pdf->SetXY($valX, $valY + 40);

        // ... (resto de gráficos) ...

        // Buffer clean y Output al final
        ob_clean();
        $pdf->Output();
    }
}
