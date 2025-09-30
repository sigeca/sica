<?php

// Incluimos la plantilla de la clase PDF
require_once 'plantilla2tbl.php';

/**
 * Clase para generar el reporte de participación y asistencias en PDF.
 */
class ReporteParticipacionPDF
{
    private $pdf;
    private $db;
    private $idParticipanteEstado;
    private $idPersona;
    private $eventoData;
    private $asignaturaData;
    private $distributivoDocenteData;
    private $calendarioAcademicoData;

    /**
     * Constructor de la clase.
     *
     * @param object $db Conexión a la base de datos (por ejemplo, CodeIgniter DB object).
     */
    public function __construct(
        $db,
        array $evento,
        array $asignatura,
        array $distributivodocente,
        array $calendarioacademico
    )
    {
        $this->db = $db;
        $this->eventoData = $evento;
        $this->asignaturaData = $asignatura;
        $this->distributivoDocenteData = $distributivodocente;
        $this->calendarioAcademicoData = $calendarioacademico;

        // **Ajuste:** Aquí solo inicializamos la instancia de PDF y propiedades básicas
        $this->pdf = new PDF();
        $this->pdf->SetMargins(23, 10, 11.7);
        $this->pdf->SetAutoPageBreak(true, 40);
        $this->pdf->AliasNbPages(); // Necesario para {nb} en el footer

        // Asignar propiedades generales del encabezado institucional
        $this->pdf->institucion = 'UNIVERSIDAD TÉCNICA LUIS VARGAS TORRES DE ESMERALDAS';
        $this->pdf->unidad = 'FACULTAD DE INGENIERIAS (FACI)';
        $this->pdf->departamento = 'CARRERA EN TECNOLOGÍA DE LA INFORMACIÓN';
        $this->pdf->titulo = $this->eventoData['titulo'] ?? 'Título del Evento No Disponible';
        $this->pdf->asignatura = "Asignatura: " . ($this->asignaturaData[0]->nombre ?? 'N/A');
        $this->pdf->docente = "Docente: " . ($this->distributivoDocenteData[0]->eldocente ?? 'N/A');
        $this->pdf->mes = "Periodo: " . ($this->calendarioAcademicoData[0]->nombre ?? 'N/A');
        
        $this->loadInputParameters();
    }

    /**
     * Carga los parámetros de entrada desde $_GET.
     * (No changes needed here)
     */
    private function loadInputParameters()
    {
        $this->idParticipanteEstado = $_GET["idparticipanteestado"] ?? 0;
        $this->idPersona = $_GET["idpersona"] ?? 0;
    }

    /**
     * Calcula la cantidad de sesiones totales hasta cada fecha de corte.
     * (No changes needed here)
     */
    private function calculateTotalSessions(array $fechacorte, array $jornadadocente, array $evento, array $calendarioacademico): array
    {
        $dias = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
        date_default_timezone_set('America/Guayaquil');

        $sesiontotal = [];

        $fechaSesion = $evento['fechainicia'] ?? ($calendarioacademico[0]->fechadesde ?? null);
        $fechaHasta = $evento['fechafinaliza'] ?? ($calendarioacademico[0]->fechahasta ?? null);

        if (!$fechaSesion || !$fechaHasta) {
            error_log('Fechas de inicio o fin no definidas para el cálculo de sesiones.');
            return [];
        }
        
            $currentDate = $fechaSesion;
        foreach ($fechacorte as $p => $fc) {
            $count = 0;
            while (strtotime($currentDate) <= strtotime($fc)) {
                $dia = $dias[date('w', strtotime($currentDate))];
                foreach ($jornadadocente as $row) {
                    if ($row->nombre == $dia) {
                        $count++;
                        break;
                    }
                }
                $currentDate = date("Y-m-d", strtotime($currentDate . "+ 1 days"));
            }
            $sesiontotal[$p] = $count;
        }

        if (!isset($sesiontotal[1])) {
            $sesiontotal[1] = 0;
        }

        return $sesiontotal;
    }

    /**
     * Procesa y genera las filas de datos para cada participante.
     * (No significant changes here)
     */
    private function processParticipantData(
        array $participacion,
        array $sesionEventos,
        array $fechacorte,
        array $sesionTotal,
        array $asistencias,
        int $nivelRpt,
        array $calendarioAcademico
    ): array {
        $aprobados = 0;
        $reprobados = 0;
        $desertores = 0;
        $datag = [];
        $datac = [];

        $arrAsistencia = $this->calculateParticipantAttendance($asistencias, $fechacorte);

        $id = 0;
        $i = 0;
        $currentParticipantData = [];

        foreach ($participacion as $row) {
            if (($this->idParticipanteEstado == $row->idparticipanteestado || $this->idParticipanteEstado == 0) &&
                ($this->idPersona == $row->idpersona || $this->idPersona == 0)
            ) {
                if ($id != $row->idpersona) {
                    if ($id > 0) {
                        $this->printParticipantRow($currentParticipantData, $sesionEventos, $fechacorte, $sesionTotal, $arrAsistencia, $nivelRpt, $calendarioAcademico, $i, $aprobados, $reprobados, $desertores);
                    }
                    $id = $row->idpersona;
                    $currentParticipantData = [
                        'idpersona' => $row->idpersona,
                        'nombres' => $row->nombres,
                        'idsexo' => $row->idsexo,
                        'sexo' => $row->sexo,
                        'idinstitucion' => $row->idinstitucion,
                        'colegio' => $row->colegio,
                        'participaciones' => [],
                        'ayudas' => [],
                        'xparti' => []
                    ];
                    
                    $datag[$row->sexo] = ($datag[$row->sexo] ?? 0) + 1;
                    $datac[$row->colegio] = ($datac[$row->colegio] ?? 0) + 1;

                }
                $currentParticipantData['participaciones'][$row->fecha] = $row->porcentaje;
                $currentParticipantData['ayudas'][$row->fecha] = ($nivelRpt == 2) ? 0 : $row->ayuda;
                $currentParticipantData['xparti'][$row->fecha] = 0;
            }
        }

        if ($id > 0) {
            $this->printParticipantRow($currentParticipantData, $sesionEventos, $fechacorte, $sesionTotal, $arrAsistencia, $nivelRpt, $calendarioAcademico, $i, $aprobados, $reprobados, $desertores);
        }

        return [
            'aprobados' => $aprobados,
            'reprobados' => $reprobados,
            'desertores' => $desertores,
            'generos' => $datag,
            'colegios' => $datac
        ];
    }

    /**
     * Calcula la asistencia de cada participante por parcial.
     * (No changes needed here)
     */
    private function calculateParticipantAttendance(array $asistencias, array $fechacorte): array
    {
        $arrAsistencia = [];

        foreach ($asistencias as $row) {
            foreach ($fechacorte as $p => $fc) {
                if (strtotime($row->fecha) <= strtotime($fc)) {
                    switch($row->idtipoasistencia){
                        case 1:
                    $arrAsistencia[$row->idpersona][$p] = ($arrAsistencia[$row->idpersona][$p] ?? 0) + 1;
                    break;
                        case 2:
                    $arrAsistencia[$row->idpersona][$p] = ($arrAsistencia[$row->idpersona][$p] ?? 0) + 0.5;
                    break;
                        case 3:
                    $arrAsistencia[$row->idpersona][$p] = ($arrAsistencia[$row->idpersona][$p] ?? 0) + 0.25;
                    break;
                        case 4:
                    $arrAsistencia[$row->idpersona][$p] = ($arrAsistencia[$row->idpersona][$p] ?? 0) + 0;
                    break;
                        default:
                    $arrAsistencia[$row->idpersona][$p] = ($arrAsistencia[$row->idpersona][$p] ?? 0) + 0;
                    break;

                    }


                    break;
                }
            }
        }
        return $arrAsistencia;
    }

    /**
     * Imprime una fila de datos de un participante en el PDF.
     * (No changes needed here)
     */
    private function printParticipantRow(
        array &$participantData,
        array $sesionEventos,
        array $fechacorte,
        array $sesionTotal,
        array $arrAsistencia,
        int $nivelRpt,
        array $calendarioAcademico,
        int &$i,
        int &$aprobados,
        int &$reprobados,
        int &$desertores
    ) {
        $i++;
        $this->pdf->SetFont('Arial', '', 7);
        $this->pdf->Cell(5, 5, $i, 1, 0, 'R', 0);
        $this->pdf->Cell(55, 5, utf8_decode($participantData['nombres']), 1, 0, 'L', 0);
        $this->pdf->Cell(5, 5, utf8_decode($participantData['idsexo']), 1, 0, 'L', 0);
        $idinstitucion = isset($participantData['idinstitucion']) ? $participantData['idinstitucion'] : '';
        $this->pdf->Cell(5, 5, utf8_decode($idinstitucion), 1, 0, 'L', 0);

        $parcialScores = array_fill(0, count($fechacorte), 0);
        $numNotes = array_fill(0, count($fechacorte), 0);
        $fecha1 = $calendarioAcademico[0]->fechahasta ?? null;
        $fecha1 = $calendarioAcademico[0]->fechadesde ?? null;

        foreach ($sesionEventos as $row1) {
            if (isset($participantData['participaciones'][$row1->fecha])) {
                $fecha2 = $row1->fecha;

                $q1 = $this->db->query("select idpersona, count(porcentaje) as cantidad from participacion2 where idevento=" . $row1->idevento . " and idmodoevaluacion=1 and (fecha between '" . $fecha1 . "' and '" . $fecha2 . "') group by idpersona order by cantidad desc limit 1");
                $cmp = ($q1->num_rows() > 0) ? $q1->result()[0]->cantidad : 1;

                $q2 = $this->db->query("select idpersona, sum(porcentaje) as total from participacion2 where idpersona=" . $participantData['idpersona'] . " and idmodoevaluacion=1 and idevento=" . $row1->idevento . " and (fecha between '" . $fecha1 . "' and '" . $fecha2 . "') group by idpersona limit 1");
                $vp = ($q2->num_rows() > 0) ? $q2->result()[0]->total : 0;

                $ponderacion = ($nivelRpt == 2 || $nivelRpt == 1) ? 1 : $row1->ponderacion;

                if ($participantData['ayudas'][$row1->fecha] > 0) {
                    $this->pdf->SetTextColor(3, 18, 249);
                } else {
                    $this->pdf->SetTextColor(0, 0, 0);
                }
                $scmp=($scmp ??0)+$cmp;
                $svp=($svp ??0)+$svp;


                
                       if($row1->idmodoevaluacion==2||$row1->idmodoevaluacion== 6){   //si son las participaciones A1 O A2

                $xparti = (100 - ($participantData['participaciones'][$row1->fecha] + $participantData['ayudas'][$row1->fecha])) * ($svp / (100 * $scmp));

                
                $scmp=0;
                $svp=0;

        //        $xpartiacu=($xpartiacu ?? 0) +$xparti;
                $score = round(($participantData['participaciones'][$row1->fecha] + $participantData['ayudas'][$row1->fecha] + $xparti) * $ponderacion, 2);
                $xpartiacu=0;
                        }else{
    

                $score = round(($participantData['participaciones'][$row1->fecha] + $participantData['ayudas'][$row1->fecha] + 0) * $ponderacion, 2);
                        }


                if(($nivelRpt==2 || $nivelRpt==1) and $score<=70)
                {
                    $this->pdf->setFillColor(255, 165,0);  //Color naranja de poner cuidado
                }else{
                    $this->pdf->setFillColor(255, 255,255);  //Color naranja de poner cuidado
                }


                $this->pdf->Cell(8, 5, $score, 1, 0, 'R',true);
                $this->pdf->SetTextColor(0, 0, 0);

                if(($nivelRpt==2 || $nivelRpt==1) and $score<=70)
                {
                    $this->pdf->setFillColor(255, 255,255);  //Color naranja de poner cuidado
                }

                foreach ($fechacorte as $p => $fc) {
                    if (strtotime($row1->fecha) <= strtotime($fc)) {
                       if($row1->idmodoevaluacion==5||$row1->idmodoevaluacion== 9){ 
                           $parcialScores[$p] += $score;     //Examen del primero o del segundo
                       }else{
                           $parcialScores[$p] += $score/2;
                       }
                        $numNotes[$p]++;
                        break;
                    }
                }
                $fecha1 = $row1->fecha;
            } else {

                $this->pdf->setFillColor(255, 165,0);  //Color naranja de poner cuidado
                $this->pdf->Cell(8, 5, '0', 1, 0, 'R', true);
                $this->pdf->setFillColor(255, 255,255);  // volver al fondo blanco
                foreach ($fechacorte as $p => $fc) {
                    if (strtotime($row1->fecha) <= strtotime($fc)) {
                        $numNotes[$p]++;
                        break;
                    }
                }
            }
        }

        $totalSum = 0;
        $actualPartials = 0;
        $overallAttendancePercentage = 0;
        foreach ($parcialScores as $k => $score) {
            if (($numNotes[$k] ?? 0) >= 1) {
                $totalSum += round($score, 0);
                $this->pdf->Cell(10, 5, round($score, 0), 1, 0, 'R', 0);
                $attendancePercentage = ($sesionTotal[$k] > 0) ? round((100 * ($arrAsistencia[$participantData['idpersona']][$k] ?? 0) / $sesionTotal[$k]), 0) . '%' : '0%';
                $this->pdf->Cell(12, 5, $attendancePercentage, 1, 0, 'R', 0);
                $overallAttendancePercentage += $attendancePercentage;
                $actualPartials++;
            } else {
                if ($score > 0) {
                    $totalSum += round($score, 0);
                    $actualPartials++;
                }
            }
        }

        if ($actualPartials == 1 && count($fechacorte) > 1) {
            $this->pdf->Cell(10, 5, 0, 1, 0, 'R', 0);
            $attendancePercentage = ($sesionTotal[1] > 0) ? round((100 * ($arrAsistencia[$participantData['idpersona']][1] ?? 0) / $sesionTotal[1]), 0) . '%' : '0%';
            $this->pdf->Cell(12, 5, $attendancePercentage, 1, 0, 'R', 0);
            $actualPartials++;
        }

        $finalResult = ($actualPartials > 0) ? round($totalSum / $actualPartials, 0) : 0;

        if ($finalResult < 7) {
            if ($finalResult < 5) {
                $this->pdf->setFillColor(253, 194, 224);
                $desertores++;
            } else {
                $this->pdf->setFillColor(245, 249, 3);
                $reprobados++;
            }
        } else {
            $this->pdf->setFillColor(7, 195, 250);
            $aprobados++;
        }
        $this->pdf->Cell(10, 5, $finalResult, 1, 0, 'R', 1);
            $this->pdf->setFillColor(255, 255, 255);

        
  //      $totalSessionsCombined = ($sesionTotal[0] ?? 0) + ($sesionTotal[1] ?? 0);
   //     $totalAttendanceCombined = ($arrAsistencia[$participantData['idpersona']][0] ?? 0) + ($arrAsistencia[$participantData['idpersona'][1] ?? 0]);


      //  $overallAttendancePercentage = ($totalSessionsCombined > 0) ? round(100 * ($totalAttendanceCombined / $totalSessionsCombined), 0) . '%' : '0%';
        $overallAttendancePercentage = ($overallAttendancePercentage > 0) ? $overallAttendancePercentage . '%' : '0%';
        $this->pdf->Cell(12, 5, $overallAttendancePercentage, 1, 1, 'R', 0);
    }

    /**
     * Genera las estadísticas de aprobación/reprobación/deserción en el PDF.
     * (No changes needed here)
     */
    public function generatePromotionStats(array $stats)
    {
        $this->pdf->AddPage('L');
        $this->pdf->SetFont("Arial", "B", 16);
        $this->pdf->SetTextColor(30, 70, 120);
        $this->pdf->Cell(0, 10, utf8_decode('Estadísticas de Promoción Académica'), 0, 1, 'C');
        $this->pdf->Ln(10);

        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->SetTextColor(50, 50, 50);

        $data = [
            'Aprobados'  => $stats['aprobados'],
            'Reprobados' => $stats['reprobados'],
            'Desertores' => $stats['desertores']
        ];

        $colors = [
            'Aprobados'  => [102, 194, 165],
            'Reprobados' => [252, 141, 98],
            'Desertores' => [141, 160, 203]
        ];

        $this->pdf->SetFont('Arial', 'BU', 12);
        $this->pdf->Cell(0, 7, utf8_decode('Detalle Numérico:'), 0, 1);
        $this->pdf->Ln(2);

        $this->pdf->SetFont('Arial', '', 11);
        foreach ($data as $label => $value) {
            $this->pdf->Cell(60, 7, utf8_decode($label), 0);
            $this->pdf->Cell(20, 7, $value, 0, 0, 'R');
            $this->pdf->Ln();
        }
        $this->pdf->Ln(28);

        $chartX = 150;
        $chartY = 100;
        $chartWidth = 100;
        $chartHeight = 45;

        $this->pdf->SetXY($chartX, $chartY);
        $this->pdf->SetFont('Arial', 'B', 10);
        $this->pdf->Cell(0, 5, utf8_decode('Distribución de Resultados'), 0, 1, 'C');
        $this->pdf->SetXY($chartX, $chartY + 7);

        $pieColors = array_values($colors);
        $this->pdf->PieChart($chartWidth, $chartHeight, $data, '%l : %v (%p)', $pieColors, $chartX, $chartY + 12);

        $this->pdf->SetY(max($this->pdf->GetY(), $chartY + $chartHeight + 20));
    }

    /**
     * Genera las estadísticas por género en el PDF.
     * (No changes needed here)
     */
    public function generateGenderStats(array $datag)
    {
        $this->pdf->AddPage('L');
        $this->pdf->SetFont("Arial", "B", 16);
        $this->pdf->SetTextColor(30, 70, 120);
        $this->pdf->Cell(0, 10, utf8_decode('Estadísticas por Género'), 0, 1, 'C');
        $this->pdf->Ln(10);

        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->SetTextColor(50, 50, 50);

        $colors = [
            'Hombres' => [93, 165, 218],
            'Mujeres' => [255, 172, 206]
        ];

        $this->pdf->SetFont('Arial', 'BU', 12);
        $this->pdf->Cell(0, 7, utf8_decode('Detalle Numérico:'), 0, 1);
        $this->pdf->Ln(2);

        $this->pdf->SetFont('Arial', '', 11);
        foreach ($datag as $label => $value) {
            $this->pdf->Cell(60, 7, utf8_decode($label), 0);
            $this->pdf->Cell(20, 7, $value, 0, 0, 'R');
            $this->pdf->Ln();
        }
        $this->pdf->Ln(8);

        $chartX = 150;
        $chartY = 100;
        $chartWidth = 100;
        $chartHeight = 45;

        $this->pdf->SetXY($chartX, $chartY);
        $this->pdf->SetFont('Arial', 'B', 10);
        $this->pdf->Cell(0, 5, utf8_decode('Distribución de Géneros'), 0, 1, 'C');
        $this->pdf->SetXY($chartX, $chartY + 7);

        $pieColors = array_values($colors);
        $this->pdf->PieChart($chartWidth, $chartHeight, $datag, '%l : %v (%p)', $pieColors, $chartX, $chartY + 12);

        $this->pdf->SetY(max($this->pdf->GetY(), $chartY + $chartHeight + 20));
    }

    /**
     * Genera las estadísticas por colegio en el PDF.
     * (No changes needed here)
     */
    public function generateCollegeStats(array $datac)
    {
        $this->pdf->AddPage('L');
        $this->pdf->SetFont("Arial", "B", 16);
        $this->pdf->SetTextColor(30, 70, 120);
        $this->pdf->Cell(0, 10, utf8_decode('Estadísticas por Colegio'), 0, 1, 'C');
        $this->pdf->Ln(10);

        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->SetTextColor(50, 50, 50);

        $chartX = 100;
        $chartY = 150;

        $chartWidth = 100;
        $chartHeight = 80;

        $this->pdf->SetXY($chartX, $chartY);
        $this->pdf->SetFont('Arial', 'B', 10);

        $colors = [];
        $hue = 0;
        foreach ($datac as $label => $value) {
            $r = (int)(sin(0.024 * $hue + 0) * 127 + 128);
            $g = (int)(sin(0.024 * $hue + 2) * 127 + 128);
            $b = (int)(sin(0.024 * $hue + 4) * 127 + 128);
            $colors[] = [$r, $g, $b];
            $hue += 60;
        }

        $this->pdf->PieChart($chartWidth, $chartHeight, $datac, '%l : %v (%p)', $colors);

        $this->pdf->SetY(max($this->pdf->GetY(), $chartY + $chartHeight + 100));
    }

    /**
     * Ejecuta la generación del reporte.
     */
    public function generateReport(
        array $participacion,
        array $sesionEventos,
        array $fechacorte,
        array $jornadadocente,
        array $evento,
        array $asignatura,
        array $distributivodocente,
        array $calendarioacademico,
        array $asistencias,
        int $nivelRpt
    ) {
        $sesionTotal = $this->calculateTotalSessions($fechacorte, $jornadadocente, $evento, $calendarioacademico);

        // **Paso clave:** Asignar sesionEventos y sesionTotal *antes* de la primera llamada a AddPage()
        $this->pdf->sesionEventos = $sesionEventos;
        $this->pdf->sesionTotal = $sesionTotal;
        
        // Ahora, y solo ahora, agregamos la primera página.
        // Esto garantiza que Header() se llame con los datos de sesionEventos y sesionTotal ya cargados.
        $this->pdf->AddPage('L'); 

        $stats = $this->processParticipantData($participacion, $sesionEventos, $fechacorte, $sesionTotal, $asistencias, $nivelRpt, $calendarioacademico);

        // Generar estadísticas
        $this->generatePromotionStats($stats);
        $this->generateGenderStats($stats['generos']);
        $this->generateCollegeStats($stats['colegios']);

        $this->pdf->Output();
    }
}

// --- Uso del código refactorizado ---
// ... (tu código actual de CodeIgniter para cargar modelos y datos)
$this->load->database();
$this->load->helper('form');

$reportGenerator = new ReporteParticipacionPDF(
    $this->db,
    $evento,
    $asignatura,
    $distributivodocente,
    $calendarioacademico
);
$reportGenerator->generateReport(
    $participacion,
    $sesioneventos,
    $fechacorte,
    $jornadadocente,
    $evento,
    $asignatura,
    $distributivodocente,
    $calendarioacademico,
    $asistencias,
    $nivelrpt
);

?>
