<?php

// Ensure this file is accessed via the CodeIgniter framework
defined('BASEPATH') OR exit('No direct script access allowed');

// Load the PDF library (assuming 'plantilla2.php' is a custom FPDF/TCPDF extension)
require_once 'plantilla2.php';

class Reporte_Notas extends CI_Controller { // Assuming this is a CI controller

    public function __construct() {
        parent::__construct();
        // Load necessary libraries and helpers in the constructor
        $this->load->database();
        $this->load->helper('form');
    }

    public function generar_reporte() { // Renamed for clarity and to follow CI conventions
        // Sanitize and validate input
        $idparticipanteestado = $this->input->get('idparticipanteestado', TRUE) ? $this->input->get('idparticipanteestado', TRUE) : 0;
        $idpersona = $this->input->get('idpersona', TRUE) ? $this->input->get('idpersona', TRUE) : 0;

        // Initialize PDF object
        $pdf = new PDF();
        $pdf->SetMargins(23, 10, 11.7);
        $pdf->SetAutoPageBreak(true, 40);

        // Set header information for the PDF
        $pdf->institucion = 'UNIVERSIDAD TÉCNICA LUIS VARGAS TORRES DE ESMERALDAS';
        $pdf->unidad = 'FACULTAD DE INGENIERIAS (FACI)';
        $pdf->departamento = 'CARRERA EN TECNOLOGÍA DE LA INFORMACIÓN';

        // Data from external sources (assuming these are passed to the method or retrieved from models)
        // It's highly recommended to pass these as arguments or retrieve them from a model.
        // For demonstration, I'm assuming they are available in the current scope.
        $evento = $this->db->get_where('t_evento', ['some_id' => 1])->row_array(); // Example
        $asignatura = $this->db->get_where('t_asignatura', ['some_id' => 1])->result(); // Example
        $distributivodocente = $this->db->get_where('t_distributivodocente', ['some_id' => 1])->result(); // Example
        $calendarioacademico = $this->db->get_where('t_calendarioacademico', ['some_id' => 1])->result(); // Example
        $fechacorte = $this->db->get_where('t_fechacorte', ['some_id' => 1])->result_array(); // Example
        $asistencias = $this->db->get_where('t_asistencias', ['some_id' => 1])->result(); // Example
        $jornadadocente = $this->db->get_where('t_jornadadocente', ['some_id' => 1])->result(); // Example
        $sesiondictada = []; // Assuming this is populated elsewhere
        $sesioneventos = $this->db->get_where('t_sesioneventos', ['some_id' => 1])->result(); // Example
        $participacion = $this->db->get_where('t_participacion', ['some_id' => 1])->result(); // Example
        $nivelrpt = 0; // Assuming this is defined elsewhere

        $pdf->titulo = $evento['titulo'];
        $pdf->asignatura = "Asignatura: " . $asignatura[0]->nombre;
        $pdf->docente = "Docente: " . $distributivodocente[0]->eldocente;
        $pdf->mes = "Periodo: " . $calendarioacademico[0]->nombre;

        $pdf->AliasNbPages();
        $pdf->AddPage('L');

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

        $arrasistencia = array();
        foreach ($asistencias as $row) {
            $salir = 0;
            foreach ($fechacorte as $p => $fc) {
                if (strtotime($row->fecha) <= strtotime($fc)) {
                    if (isset($arrasistencia[$row->idpersona][$p])) {
                        $arrasistencia[$row->idpersona][$p]++;
                    } else {
                        $arrasistencia[$row->idpersona][$p] = 1;
                    }
                    $salir = 1;
                }
                if ($salir == 1) {
                    break;
                }
            }
        }

        $dias = array('Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado');
        date_default_timezone_set('America/Guayaquil');
        $fecha_actual = date("Y-m-d"); // Renamed to avoid conflict with $fecha in loop
        $horai_actual = date("H:i:s"); // Renamed

        $sesionactual = 0;
        $sesiontotal = array();

        $fechasesion_start = $evento['fechainicia'];
        $fechasesion_end = $evento['fechafinaliza'];

        // Determine effective start and end dates
        if (!empty($fechasesion_start) && !empty($fechasesion_end) && checkdate(date("n", strtotime($fechasesion_start)), date("j", strtotime($fechasesion_start)), date("Y", strtotime($fechasesion_start))) && checkdate(date("n", strtotime($fechasesion_end)), date("j", strtotime($fechasesion_end)), date("Y", strtotime($fechasesion_end)))) {
            // Event dates are valid
        } else {
            // Use academic calendar dates if event dates are invalid or missing
            $fechasesion_start = $calendarioacademico[0]->fechadesde;
            $fechasesion_end = $calendarioacademico[0]->fechahasta;
        }

        foreach ($fechacorte as $p => $fc) {
            $sesiones = array();
            $i_sesion = 1; // Renamed to avoid conflict with outer $i

            $current_fechasesion = $fechasesion_start; // Use a temporary variable for iteration
            while (strtotime($current_fechasesion) <= strtotime($fc)) {
                foreach ($jornadadocente as $row_jornada) {
                    $dia = $dias[date('w', strtotime($current_fechasesion))];
                    if ($row_jornada->nombre == $dia) {
                        $lahorai = $row_jornada->horainicio;
                        $lahoraf = date("H:i:s", strtotime('+2 hours', strtotime($lahorai)));
                        array_push($sesiones, array("sesion" => $i_sesion, "fecha" => $current_fechasesion, "dia" => $dia, "horainicio" => $lahorai, "horafin" => $lahoraf));

                        if ($sesionactual == 0) {
                            if (!isset($sesiondictada[$current_fechasesion])) {
                                $fecha_actual = $current_fechasesion; // This overwrites the current date, might be intended
                            }
                        }

                        if (strtotime($current_fechasesion) == strtotime($fecha_actual)) {
                            $sesionactual = $i_sesion;
                        }

                        if (isset($sesiontotal[$p])) {
                            $sesiontotal[$p]++;
                        } else {
                            $sesiontotal[$p] = 1;
                        }
                        $i_sesion++;
                    }
                }
                $current_fechasesion = date("Y-m-d", strtotime($current_fechasesion . " +1 day"));
            }
        }

        if (!isset($sesiontotal[1])) {
            $sesiontotal[1] = 0;
        }

        // Table Header
        $pdf->SetFillColor(232, 232, 232);
        $pdf->SetFont('Arial', 'B', 8);

        $pdf->Cell(5, 5, '#', 1, 0, 'C', 1);
        $pdf->Cell(55, 5, 'Participante', 1, 0, 'C', 1);
        $pdf->Cell(5, 5, 'GE', 1, 0, 'C', 1);
        $pdf->Cell(5, 5, 'CO', 1, 0, 'C', 1);
        foreach ($sesioneventos as $row) {
            $pdf->Cell(8, 5, $row->temacorto, 1, 0, 'C', 1);
        }
        $pdf->Cell(10, 5, 'P1', 1, 0, 'C', 1);
        $pdf->Cell(12, 5, 'As1(' . ($sesiontotal[0] ?? 0) . ')', 0, 'C', 1); // Use null coalescing operator
        $pdf->Cell(10, 5, 'P2', 1, 0, 'C', 1);
        $pdf->Cell(12, 5, 'As2(' . ($sesiontotal[1] ?? 0) . ')', 0, 'C', 1);
        $pdf->Cell(10, 5, 'Prom', 1, 0, 'C', 1);
        $asT = ($sesiontotal[0] ?? 0) + ($sesiontotal[1] ?? 0);
        $pdf->Cell(12, 5, 'AsT(' . $asT . ')', 1, 1, 'C', 1);

        // Data processing and table rows
        $arrparticipacion = array();
        $arrgenero1 = array();
        $arrgenero2 = array();
        $arrcolegio1 = array();
        $arrcolegio2 = array();
        $arrayuda = array();
        $xparti = array();
        $datag = array(); // Data for gender statistics
        $datac = array(); // Data for college statistics

        foreach ($participacion as $row) {
            if (($idparticipanteestado == $row->idparticipanteestado || $idparticipanteestado == 0) && ($idpersona == $row->idpersona || $idpersona == 0)) {
                if ($id != $row->idpersona) {
                    if ($id > 0) { // If it's not the first participant, print the previous one's data
                        $i++;
                        $pdf->Cell(5, 5, $i, 1, 0, 'R', 0);
                        $pdf->Cell(55, 5, utf8_decode($arrparticipacion[$id]), 1, 0, 'L', 0);
                        $pdf->Cell(5, 5, utf8_decode($arrgenero1[$id]), 1, 0, 'L', 0);
                        $pdf->Cell(5, 5, utf8_decode($arrcolegio1[$id]), 1, 0, 'L', 0);

                        $fecha1_loop = $calendarioacademico[0]->fechadesde; // Reset for each participant
                        foreach ($sesioneventos as $row1) {
                            if (isset($arrparticipacion[$row1->fecha])) {
                                $fecha2_loop = $row1->fecha;

                                // Query 1: Max percentage count for event and mode
                                $q1 = $this->db->query("SELECT idpersona, COUNT(porcentaje) AS cantidad FROM participacion2 WHERE idevento=" . $row1->idevento . " AND idmodoevaluacion=1 AND (fecha BETWEEN '" . $fecha1_loop . "' AND '" . $fecha2_loop . "') GROUP BY idpersona ORDER BY cantidad DESC LIMIT 1");
                                $cmp = ($q1->num_rows() > 0) ? $q1->result()[0]->cantidad : 1;

                                // Query 2: Sum of percentages for current person, event, and mode
                                $q2 = $this->db->query("SELECT idpersona, SUM(porcentaje) AS total FROM participacion2 WHERE idpersona=" . $id . " AND idmodoevaluacion=1 AND idevento=" . $row1->idevento . " AND (fecha BETWEEN '" . $fecha1_loop . "' AND '" . $fecha2_loop . "') GROUP BY idpersona LIMIT 1");
                                $vp = ($q2->num_rows() > 0) ? $q2->result()[0]->total : 0;

                                $ponderacion = ($nivelrpt == 2 || $nivelrpt == 1) ? 1 : $row1->ponderacion;

                                if (isset($arrayuda[$row1->fecha]) && $arrayuda[$row1->fecha] > 0) {
                                    $pdf->SetTextColor(3, 18, 249);
                                    $xparti[$row1->fecha] = (100 - ($arrparticipacion[$row1->fecha] + $arrayuda[$row1->fecha])) * ($vp / (100 * $cmp));
                                    $pdf->Cell(8, 5, round(($arrparticipacion[$row1->fecha] + $arrayuda[$row1->fecha] + $xparti[$row1->fecha]) * $ponderacion, 2), 1, 0, 'R', 0);
                                } else {
                                    $xparti[$row1->fecha] = (100 - ($arrparticipacion[$row1->fecha] + ($arrayuda[$row1->fecha] ?? 0))) * ($vp / (100 * $cmp));
                                    $pdf->Cell(8, 5, round(($arrparticipacion[$row1->fecha] + ($arrayuda[$row1->fecha] ?? 0) + $xparti[$row1->fecha]) * $ponderacion, 2), 1, 0, 'R', 0);
                                }
                                $fecha1_loop = $row1->fecha;
                                $pdf->SetTextColor(0, 0, 0);

                                $salir_inner = 0;
                                foreach ($fechacorte as $p_inner => $fc_inner) {
                                    if (strtotime($row1->fecha) <= strtotime($fc_inner)) {
                                        $parcial[$p_inner] += round(($arrparticipacion[$row1->fecha] + ($arrayuda[$row1->fecha] ?? 0) + $xparti[$row1->fecha]) * $ponderacion, 2);
                                        $nnotas[$p_inner]++;
                                        $nparcial = $p_inner;
                                        $salir_inner = 1;
                                    }
                                    if ($salir_inner == 1) {
                                        break;
                                    }
                                }
                            } else {
                                $pdf->Cell(8, 5, '0', 1, 0, 'R', 0);
                                foreach ($fechacorte as $p_inner => $fc_inner) {
                                    if (strtotime($row1->fecha) <= strtotime($fc_inner)) {
                                        $parcial[$p_inner] += 0;
                                        $nnotas[$p_inner]++;
                                        $nparcial = $p_inner;
                                        break;
                                    }
                                }
                            }
                        }

                        // Print partials and attendance
                        $k = 0;
                        $sum = 0;
                        foreach ($parcial as $sp) {
                            if (isset($nnotas[$k]) && $nnotas[$k] >= 1) {
                                $sum += round($sp, 0);
                                $pdf->Cell(10, 5, round($sp, 0), 1, 0, 'R', 0);
                                $pdf->Cell(12, 5, round((100 * ($arrasistencia[$id][$k] ?? 0) / ($sesiontotal[$k] ?? 1)), 0) . '%', 1, 0, 'R', 0);
                                $k++;
                            } elseif ($sp > 0) {
                                $sum += round($sp, 0);
                                $k++;
                            }
                        }

                        if ($k == 1 && !isset($parcial[1])) { // Handle case for only one partial
                             $pdf->Cell(10, 5, 0, 1, 0, 'R', 0);
                             $pdf->Cell(12, 5, round((100 * ($arrasistencia[$id][1] ?? 0) / ($sesiontotal[1] ?? 1)), 0) . '%', 1, 0, 'R', 0);
                        }


                        // Print average and color-code
                        $resu = ($k > 0) ? round($sum / $k, 0) : 0; // Avoid division by zero
                        if ($resu < 7) {
                            if ($resu < 5) {
                                $pdf->setFillColor(253, 194, 224);
                                $pdf->Cell(10, 5, $resu, 1, 0, 'R', 1);
                                $desertores++;
                            } else {
                                $pdf->setFillColor(245, 249, 3);
                                $pdf->Cell(10, 5, $resu, 1, 0, 'R', 1);
                                $reprobados++;
                            }
                        } else {
                            $pdf->setFillColor(7, 195, 250);
                            $pdf->Cell(10, 5, $resu, 1, 0, 'R', 1);
                            $aprobados++;
                        }

                        // Print total attendance
                        $pdf->Cell(12, 5, round(100 * ((($arrasistencia[$id][0] ?? 0) + ($arrasistencia[$id][1] ?? 0)) / (($sesiontotal[0] ?? 1) + ($sesiontotal[1] ?? 1))), 0) . '%', 1, 1, 'R', 0);

                        // Reset for next participant
                        foreach ($fechacorte as $p_reset => $fc_reset) {
                            $parcial[$p_reset] = 0;
                            $nnotas[$p_reset] = 0;
                        }
                        $nparcial = 0;
                        $sum = 0;
                    }

                    // Store current participant's data
                    $arrparticipacion = array();
                    $arrgenero1 = array();
                    $arrgenero2 = array();
                    $arrcolegio1 = array();
                    $arrcolegio2 = array();
                    $arrayuda = array();
                    $xparti = array();

                    $id = $row->idpersona;
                    $arrparticipacion[$row->idpersona] = $row->nombres;
                    $arrgenero1[$row->idpersona] = $row->idsexo;
                    $arrgenero2[$row->idpersona] = $row->sexo;
                    $arrcolegio1[$row->idpersona] = $row->idinstitucion;
                    $arrcolegio2[$row->idpersona] = $row->colegio;
                    $arrparticipacion[$row->fecha] = $row->porcentaje;
                    $xparti[$row->fecha] = 0;

                    $arrayuda[$row->fecha] = ($nivelrpt == 2) ? 0 : $row->ayuda;

                    if (isset($datag[$row->sexo])) {
                        $datag[$row->sexo]++;
                    } else {
                        $datag[$row->sexo] = 1;
                    }

                    if (isset($datac[$row->colegio])) {
                        $datac[$row->colegio]++;
                    } else {
                        $datac[$row->colegio] = 1;
                    }
                } else { // If it's the same participant, just update their data for the current date
                    $arrparticipacion[$row->fecha] = $row->porcentaje;
                    $xparti[$row->fecha] = 0;
                    $arrayuda[$row->fecha] = ($nivelrpt == 2) ? 0 : $row->ayuda;
                }
            }
        }

        // Print the last participant's data (after the loop finishes)
        $i++;
        $pdf->Cell(5, 5, $i, 1, 0, 'R', 0);
        $pdf->Cell(55, 5, utf8_decode($arrparticipacion[$id]), 1, 0, 'L', 0);
        $pdf->Cell(5, 5, utf8_decode($arrgenero1[$id]), 1, 0, 'L', 0);
        $pdf->Cell(5, 5, utf8_decode($arrcolegio1[$id]), 1, 0, 'L', 0);

        $fecha1_loop = $calendarioacademico[0]->fechadesde; // Reset for the last participant
        foreach ($sesioneventos as $row1) {
            if (isset($arrparticipacion[$row1->fecha])) {
                $fecha2_loop = $row1->fecha;

                $q1 = $this->db->query("SELECT idpersona, COUNT(porcentaje) AS cantidad FROM participacion2 WHERE idevento=" . $row1->idevento . " AND idmodoevaluacion=1 AND (fecha BETWEEN '" . $fecha1_loop . "' AND '" . $fecha2_loop . "') GROUP BY idpersona ORDER BY cantidad DESC LIMIT 1");
                $cmp = ($q1->num_rows() > 0) ? $q1->result()[0]->cantidad : 1;

                $q2 = $this->db->query("SELECT idpersona, SUM(porcentaje) AS total FROM participacion2 WHERE idpersona=" . $id . " AND idmodoevaluacion=1 AND idevento=" . $row1->idevento . " AND (fecha BETWEEN '" . $fecha1_loop . "' AND '" . $fecha2_loop . "') GROUP BY idpersona LIMIT 1");
                $vp = ($q2->num_rows() > 0) ? $q2->result()[0]->total : 0;

                $ponderacion = ($nivelrpt == 2 || $nivelrpt == 1) ? 1 : $row1->ponderacion;

                if (isset($arrayuda[$row1->fecha]) && $arrayuda[$row1->fecha] > 0) {
                    $pdf->SetTextColor(3, 18, 249);
                    $xparti[$row1->fecha] = (100 - ($arrparticipacion[$row1->fecha] + $arrayuda[$row1->fecha])) * ($vp / (100 * $cmp));
                    $pdf->Cell(8, 5, round(($arrparticipacion[$row1->fecha] + $arrayuda[$row1->fecha] + $xparti[$row1->fecha]) * $ponderacion, 2), 1, 0, 'R', 0);
                } else {
                    $xparti[$row1->fecha] = (100 - ($arrparticipacion[$row1->fecha] + ($arrayuda[$row1->fecha] ?? 0))) * ($vp / (100 * $cmp));
                    $pdf->Cell(8, 5, round(($arrparticipacion[$row1->fecha] + ($arrayuda[$row1->fecha] ?? 0) + $xparti[$row1->fecha]) * $ponderacion, 2), 1, 0, 'R', 0);
                }
                $fecha1_loop = $row1->fecha;
                $pdf->SetTextColor(0, 0, 0);

                $salir_inner = 0;
                foreach ($fechacorte as $p_inner => $fc_inner) {
                    if (strtotime($row1->fecha) <= strtotime($fc_inner)) {
                        $parcial[$p_inner] += round(($arrparticipacion[$row1->fecha] + ($arrayuda[$row1->fecha] ?? 0) + $xparti[$row1->fecha]) * $ponderacion, 2);
                        $nnotas[$p_inner]++;
                        $nparcial = $p_inner;
                        $salir_inner = 1;
                    }
                    if ($salir_inner == 1) {
                        break;
                    }
                }
            } else {
                $pdf->Cell(8, 5, '0', 1, 0, 'R', 0);
                foreach ($fechacorte as $p_inner => $fc_inner) {
                    if (strtotime($row1->fecha) <= strtotime($fc_inner)) {
                        $parcial[$p_inner] += 0;
                        $nnotas[$p_inner]++;
                        $nparcial = $p_inner;
                        break;
                    }
                }
            }
        }

        $k = 0;
        $sum = 0;
        foreach ($parcial as $sp) {
            if (isset($nnotas[$k]) && $nnotas[$k] >= 1) {
                $sum += round($sp, 0);
                $pdf->Cell(10, 5, round($sp, 0), 1, 0, 'R', 0);
                $pdf->Cell(12, 5, round((100 * ($arrasistencia[$id][$k] ?? 0) / ($sesiontotal[$k] ?? 1)), 0) . '%', 1, 0, 'R', 0);
                $k++;
            } elseif ($sp > 0) {
                $sum += round($sp, 0);
                $k++;
            }
        }

        if ($k == 1 && !isset($parcial[1])) {
             $pdf->Cell(10, 5, 0, 1, 0, 'R', 0);
             $pdf->Cell(12, 5, round((100 * ($arrasistencia[$id][1] ?? 0) / ($sesiontotal[1] ?? 1)), 0) . '%', 1, 0, 'R', 0);
        }

        $resu = ($k > 0) ? round($sum / $k, 0) : 0;

        if ($resu < 7) {
            if ($resu < 5) {
                $pdf->setFillColor(255, 194, 224);
                $pdf->Cell(10, 5, $resu, 1, 0, 'R', 1);
                $desertores++;
            } else {
                $pdf->setFillColor(245, 249, 3);
                $pdf->Cell(10, 5, $resu, 1, 0, 'R', 1);
                $reprobados++;
            }
        } else {
            $pdf->setFillColor(7, 195, 250);
            $pdf->Cell(10, 5, $resu, 1, 0, 'R', 1);
            $aprobados++;
        }

        $pdf->Cell(12, 5, round(100 * ((($arrasistencia[$id][0] ?? 0) + ($arrasistencia[$id][1] ?? 0)) / (($sesiontotal[0] ?? 1) + ($sesiontotal[1] ?? 1))), 0) . '%', 1, 1, 'R', 0);

        // Reset parcials for the last time, though not strictly needed after the final participant
        foreach ($fechacorte as $p => $fc) {
            $parcial[$p] = 0;
        }
        $nparcial = 0;
        $sum = 0;

        // Statistics Pages
        $pdf->AddPage('L');
        $pdf->SetFont("Arial", "", 12);
        $pdf->Cell(0, 5, utf8_decode('Estadísticas de promovidos y no promovidos'), 0, 1);
        $pdf->Ln(8);

        $data_promovidos = array('Aprobados' => $aprobados, "Reprobados" => $reprobados, "Desertores" => $desertores);
        $pdf->SetFont('Arial', '', 10);
        $valX = $pdf->GetX();
        $valY = $pdf->GetY();
        foreach ($data_promovidos as $label => $value) { // Use $label and $value for clarity
            $pdf->Cell(30, 5, utf8_decode($label));
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

        $pdf->SetFont("Arial", "BIU", 12);
        $pdf->Cell(0, 5, utf8_decode('Estadísticas de Géneros'), 0, 1);
        $pdf->Ln(8);

        $pdf->SetFont('Arial', '', 10);
        $valX = $pdf->GetX();
        $valY = $pdf->GetY();

        foreach ($datag as $label => $value) {
            $pdf->Cell(30, 5, utf8_decode($label));
            $pdf->Cell(15, 5, $value, 0, 0, 'R');
            $pdf->Ln();
        }

        $pdf->Ln(8);

        $pdf->SetXY(90, $valY);
        // Assuming two genders, otherwise this color array will need more colors
        $col1 = array(7, 195, 250);
        $col2 = array(245, 249, 3);
        $pdf->PieChart(100, 35, $datag, '%l : %v (%p)', array($col1, $col2));
        $pdf->SetXY($valX, $valY + 40);

        $pdf->AddPage('L');
        $pdf->SetFont("Courier", "BIU", 8);
        $pdf->Cell(0, 5, utf8_decode('Estadísticas de Colegios'), 0, 1);
        $pdf->Ln(8);

        $valX = $pdf->GetX();
        $valY = $pdf->GetY();

        // BarDiagram assumes specific data structure, ensure $datac is compatible
        $pdf->BarDiagram(200, 100, $datac, '%l : %v (%p)', array(255, 175, 100));
        $pdf->SetXY($valX, $valY + 80);

        $pdf->Output();
    }
}
?>
