<?php

// Incluimos la plantilla de la clase PDF
require_once 'plantilla2.php';

/**
 * Clase para generar el reporte de participación y asistencias en PDF.
 */
class ReporteParticipacionPDF
{
    private $pdf;
    private $db; // Asumimos que $this->load->database() te da acceso a una conexión de base de datos.
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
        array $evento, // <-- Aquí recibes el array $evento
        array $asignatura,
        array $distributivodocente,
        array $calendarioacademico
    
    )
    {
        $this->db = $db; // Asignamos la conexión a la base de datos
 // Almacenas los datos como propiedades de la instancia de la clase
        $this->eventoData = $evento;
        $this->asignaturaData = $asignatura;
        $this->distributivoDocenteData = $distributivodocente;
        $this->calendarioAcademicoData = $calendarioacademico;


        $this->initializePdf();
        $this->loadInputParameters();
    }

    /**
     * Inicializa la instancia de FPDF y sus propiedades.
     */
    private function initializePdf()
    {
        $this->pdf = new PDF();
        $this->pdf->SetMargins(23, 10, 11.7);
        $this->pdf->SetAutoPageBreak(true, 40);
        
        // Cargar datos de la universidad y evento (asumiendo que $evento, $asignatura, etc., son pasados o cargados previamente)
        // Por la forma en que accedes a estas variables ($evento['titulo'], $asignatura[0]->nombre),
        // asumo que estas son variables globales o propiedades de una clase controladora
        // que las hace disponibles aquí. Si no es así, deberían pasarse al constructor.
//        global $evento, $asignatura, $distributivodocente, $calendarioacademico;


 //       print_r($evento);
 //       die();

        $this->pdf->institucion = 'UNIVERSIDAD TÉCNICA LUIS VARGAS TORRES DE ESMERALDAS';
        $this->pdf->unidad = 'FACULTAD DE INGENIERIAS (FACI)';
        $this->pdf->departamento = 'CARRERA EN TECNOLOGÍA DE LA INFORMACIÓN';

 $this->pdf->titulo = $this->eventoData['titulo'] ?? 'Título del Evento No Disponible';
        $this->pdf->asignatura = "Asignatura: " . ($this->asignaturaData[0]->nombre ?? 'N/A');
        $this->pdf->docente = "Docente: " . ($this->distributivoDocenteData[0]->eldocente ?? 'N/A');
        $this->pdf->mes = "Periodo: " . ($this->calendarioAcademicoData[0]->nombre ?? 'N/A');


        $this->pdf->AliasNbPages();
        $this->pdf->AddPage('L');
    }

    /**
     * Carga los parámetros de entrada desde $_GET.
     */
    private function loadInputParameters()
    {
        $this->idParticipanteEstado = $_GET["idparticipanteestado"] ?? 0;
        $this->idPersona = $_GET["idpersona"] ?? 0;
    }

    /**
     * Calcula la cantidad de sesiones totales hasta cada fecha de corte.
     *
     * @param array $fechacorte Array de fechas de corte.
     * @param array $jornadadocente Array de jornada docente.
     * @param array $evento Datos del evento.
     * @param array $calendarioacademico Datos del calendario académico.
     * @return array Array con el total de sesiones por cada fecha de corte.
     */
    private function calculateTotalSessions(array $fechacorte, array $jornadadocente, array $evento, array $calendarioacademico): array
    {
        $dias = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
        date_default_timezone_set('America/Guayaquil');

        $sesiontotal = [];

        // Determinar fecha de inicio y fin del periodo
        $fechaSesion = $evento['fechainicia'] ?? ($calendarioacademico[0]->fechadesde ?? null);
        $fechaHasta = $evento['fechafinaliza'] ?? ($calendarioacademico[0]->fechahasta ?? null);

        if (!$fechaSesion || !$fechaHasta) {
            // Manejar error si las fechas no están disponibles
            error_log('Fechas de inicio o fin no definidas para el cálculo de sesiones.');
            return [];
        }
        
        foreach ($fechacorte as $p => $fc) {
            $currentDate = $fechaSesion;
            $count = 0;
            while (strtotime($currentDate) <= strtotime($fc)) {
                $dia = $dias[date('w', strtotime($currentDate))];
                foreach ($jornadadocente as $row) {
                    if ($row->nombre == $dia) {
                        $count++;
                        break; // Se encontró una jornada para este día, pasar al siguiente día
                    }
                }
                $currentDate = date("Y-m-d", strtotime($currentDate . "+ 1 days"));
            }
            $sesiontotal[$p] = $count;
        }

        // Asegurarse de que el índice 1 exista si solo hay uno
        if (!isset($sesiontotal[1])) {
            $sesiontotal[1] = 0;
        }

        return $sesiontotal;
    }

    /**
     * Procesa y genera las filas de datos para cada participante.
     *
     * @param array $participacion Datos de participación.
     * @param array $sesionEventos Sesiones de eventos.
     * @param array $fechacorte Fechas de corte.
     * @param array $sesionTotal Total de sesiones por parcial.
     * @param array $asistencias Datos de asistencias.
     * @param int $nivelRpt Nivel del reporte.
     * @param array $calendarioAcademico Datos del calendario académico.
     * @return array Estadísticas de aprobados, reprobados y desertores, géneros y colegios.
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
        $datag = []; // Estadísticas por género
        $datac = []; // Estadísticas por colegio

        $arrAsistencia = $this->calculateParticipantAttendance($asistencias, $fechacorte);

        $id = 0;
        $i = 0;
        $currentParticipantData = []; // Para almacenar los datos del participante actual antes de imprimir

        foreach ($participacion as $row) {
            // Filtro por idparticipanteestado o idpersona si se especifican
            if (($this->idParticipanteEstado == $row->idparticipanteestado || $this->idParticipanteEstado == 0) &&
                ($this->idPersona == $row->idpersona || $this->idPersona == 0)
            ) {
                if ($id != $row->idpersona) {
                    // Si es un nuevo participante y ya hemos procesado el anterior, imprimir
                    if ($id > 0) {
                        $this->printParticipantRow($currentParticipantData, $sesionEventos, $fechacorte, $sesionTotal, $arrAsistencia, $nivelRpt, $calendarioAcademico, $i, $aprobados, $reprobados, $desertores);
                    }
                    // Reiniciar datos para el nuevo participante
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
                    
                    // Actualizar estadísticas de género y colegio para el nuevo participante
                    $datag[$row->sexo] = ($datag[$row->sexo] ?? 0) + 1;
                    $datac[$row->colegio] = ($datac[$row->colegio] ?? 0) + 1;

                }
                // Almacenar participación para el participante actual
                $currentParticipantData['participaciones'][$row->fecha] = $row->porcentaje;
                $currentParticipantData['ayudas'][$row->fecha] = ($nivelRpt == 2) ? 0 : $row->ayuda;
                $currentParticipantData['xparti'][$row->fecha] = 0; // Se calculará después
            }
        }

        // Imprimir la última fila después del bucle
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
     *
     * @param array $asistencias Todas las asistencias registradas.
     * @param array $fechacorte Fechas de corte para los parciales.
     * @return array Array multidimensional con asistencias por persona y por parcial.
     */
    private function calculateParticipantAttendance(array $asistencias, array $fechacorte): array
    {
        $arrAsistencia = [];
        foreach ($asistencias as $row) {
            foreach ($fechacorte as $p => $fc) {
                if (strtotime($row->fecha) <= strtotime($fc)) {
                    $arrAsistencia[$row->idpersona][$p] = ($arrAsistencia[$row->idpersona][$p] ?? 0) + 1;
                    break; // Solo cuenta en el primer parcial que cumpla la fecha
                }
            }
        }
        return $arrAsistencia;
    }

    /**
     * Imprime una fila de datos de un participante en el PDF.
     *
     * @param array $participantData Datos del participante.
     * @param array $sesionEventos Sesiones de eventos.
     * @param array $fechacorte Fechas de corte.
     * @param array $sesionTotal Total de sesiones por parcial.
     * @param array $arrAsistencia Asistencias por participante y parcial.
     * @param int $nivelRpt Nivel del reporte.
     * @param array $calendarioAcademico Datos del calendario académico.
     * @param int $i Contador de fila.
     * @param int $aprobados Referencia para actualizar el conteo de aprobados.
     * @param int $reprobados Referencia para actualizar el conteo de reprobados.
     * @param int $desertores Referencia para actualizar el conteo de desertores.
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
       // $this->pdf->Cell(5, 5, utf8_decode($participantData['idinstitucion']), 1, 0, 'L', 0);

        $parcialScores = array_fill(0, count($fechacorte), 0);
        $numNotes = array_fill(0, count($fechacorte), 0);
        $fecha1 = $calendarioAcademico[0]->fechahasta ?? null; // Reiniciar fecha para cada participante

        foreach ($sesionEventos as $row1) {
            if (isset($participantData['participaciones'][$row1->fecha])) {
                $fecha2 = $row1->fecha;

                // Consulta para la cantidad de participaciones máximas
                $q1 = $this->db->query("select idpersona, count(porcentaje) as cantidad from participacion2 where idevento=" . $row1->idevento . " and idmodoevaluacion=1 and (fecha between '" . $fecha1 . "' and '" . $fecha2 . "') group by idpersona order by cantidad desc limit 1");
                $cmp = ($q1->num_rows() > 0) ? $q1->result()[0]->cantidad : 1;

                // Consulta para el total de porcentaje de participación del participante
                $q2 = $this->db->query("select idpersona, sum(porcentaje) as total from participacion2 where idpersona=" . $participantData['idpersona'] . " and idmodoevaluacion=1 and idevento=" . $row1->idevento . " and (fecha between '" . $fecha1 . "' and '" . $fecha2 . "') group by idpersona limit 1");
                $vp = ($q2->num_rows() > 0) ? $q2->result()[0]->total : 0;

                $ponderacion = ($nivelRpt == 2 || $nivelRpt == 1) ? 1 : $row1->ponderacion;

                if ($participantData['ayudas'][$row1->fecha] > 0) {
                    $this->pdf->SetTextColor(3, 18, 249);
                } else {
                    $this->pdf->SetTextColor(0, 0, 0); // Restaurar color por defecto
                }

                $xparti = (100 - ($participantData['participaciones'][$row1->fecha] + $participantData['ayudas'][$row1->fecha])) * ($vp / (100 * $cmp));
                $score = round(($participantData['participaciones'][$row1->fecha] + $participantData['ayudas'][$row1->fecha] + $xparti) * $ponderacion, 2);
                $this->pdf->Cell(8, 5, $score, 1, 0, 'R', 0);
                $this->pdf->SetTextColor(0, 0, 0); // Siempre restaurar el color después de imprimir una celda


                foreach ($fechacorte as $p => $fc) {
                    if (strtotime($row1->fecha) <= strtotime($fc)) {
                       if($row1->idmodoevaluacion==5||$row1->idmodoevaluacion== 9){ 
                           $parcialScores[$p] += $score;
                       }else{

                           $parcialScores[$p] += $score/2;
                       }
                        $numNotes[$p]++;
                        break;
                    }
                }
                $fecha1 = $row1->fecha; // Actualizar fecha de inicio para el siguiente cálculo de rango
            } else {
                $this->pdf->Cell(8, 5, '0', 1, 0, 'R', 0);
                foreach ($fechacorte as $p => $fc) {
                    if (strtotime($row1->fecha) <= strtotime($fc)) {
                        $numNotes[$p]++;
                        break;
                    }
                }
            }
        }

        // Imprimir totales de cada parcial y asistencias
        $totalSum = 0;
        $actualPartials = 0;
        foreach ($parcialScores as $k => $score) {
            if (($numNotes[$k] ?? 0) >= 1) { // Usamos null coalescing para asegurar que el índice exista
                $totalSum += round($score, 0);
                $this->pdf->Cell(10, 5, round($score, 0), 1, 0, 'R', 0);
                $attendancePercentage = ($sesionTotal[$k] > 0) ? round((100 * ($arrAsistencia[$participantData['idpersona']][$k] ?? 0) / $sesionTotal[$k]), 0) . '%' : '0%';
                $this->pdf->Cell(12, 5, $attendancePercentage, 1, 0, 'R', 0);
                $actualPartials++;
            } else {
                if ($score > 0) { // Si hay score pero no notas (quizás por un error de lógica, pero lo mantenemos)
                    $totalSum += round($score, 0);
                    $actualPartials++;
                }
            }
        }

        // Si solo se imprimió un parcial y hay un segundo, imprimir 0 para el segundo.
        // Esto es para asegurar que las columnas P1 y P2 siempre se impriman.
        if ($actualPartials == 1 && count($fechacorte) > 1) {
            $this->pdf->Cell(10, 5, 0, 1, 0, 'R', 0);
            $attendancePercentage = ($sesionTotal[1] > 0) ? round((100 * ($arrAsistencia[$participantData['idpersona']][1] ?? 0) / $sesionTotal[1]), 0) . '%' : '0%';
            $this->pdf->Cell(12, 5, $attendancePercentage, 1, 0, 'R', 0);
            $actualPartials++; // Para el cálculo del promedio final
        }

        // Imprimir promedio final y actualizar contadores de estado
        $finalResult = ($actualPartials > 0) ? round($totalSum / $actualPartials, 0) : 0;

        if ($finalResult < 7) {
            if ($finalResult < 5) {
                $this->pdf->setFillColor(253, 194, 224); // Rosado
                $desertores++;
            } else {
                $this->pdf->setFillColor(245, 249, 3); // Amarillo
                $reprobados++;
            }
        } else {
            $this->pdf->setFillColor(7, 195, 250); // Celeste
            $aprobados++;
        }
        $this->pdf->Cell(10, 5, $finalResult, 1, 0, 'R', 1); // Imprimir el promedio final

        // Imprimir asistencia total
        $totalSessionsCombined = ($sesionTotal[0] ?? 0) + ($sesionTotal[1] ?? 0);
        $totalAttendanceCombined = ($arrAsistencia[$participantData['idpersona']][0] ?? 0) + ($arrAsistencia[$participantData['idpersona']][1] ?? 0);
        $overallAttendancePercentage = ($totalSessionsCombined > 0) ? round(100 * ($totalAttendanceCombined / $totalSessionsCombined), 0) . '%' : '0%';
        $this->pdf->Cell(12, 5, $overallAttendancePercentage, 1, 1, 'R', 0);
    }


    /**
     * Genera las estadísticas de aprobación/reprobación/deserción en el PDF.
     *
     * @param array $stats Estadísticas de aprobados, reprobados y desertores.
     */
 public function generatePromotionStats(array $stats)
    {
      
        $this->pdf->AddPage('L'); // Página en orientación horizontal
        $this->pdf->SetFont("Arial", "B", 16);
        $this->pdf->SetTextColor(30, 70, 120); // Color azul oscuro para el título
        $this->pdf->Cell(0, 10, utf8_decode('Estadísticas de Promoción Académica'), 0, 1, 'C');
        $this->pdf->Ln(10);

        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->SetTextColor(50, 50, 50); // Color gris oscuro para el texto

        $data = [
            'Aprobados'  => $stats['aprobados'],
            'Reprobados' => $stats['reprobados'],
            'Desertores' => $stats['desertores']
        ];

        // Definir colores más modernos y distintivos
        $colors = [
            'Aprobados'  => [102, 194, 165], // Verde esmeralda
            'Reprobados' => [252, 141, 98],  // Naranja quemado
            'Desertores' => [141, 160, 203]  // Azul grisáceo
        ];

        // Título de la sección de datos
        $this->pdf->SetFont('Arial', 'BU', 12);
        $this->pdf->Cell(0, 7, utf8_decode('Detalle Numérico:'), 0, 1);
        $this->pdf->Ln(2);

        // Mostrar los datos en formato de tabla simple
        $this->pdf->SetFont('Arial', '', 11);
        foreach ($data as $label => $value) {
            $this->pdf->Cell(60, 7, utf8_decode($label), 0);
            $this->pdf->Cell(20, 7, $value, 0, 0, 'R');
            $this->pdf->Ln();
        }
        $this->pdf->Ln(28);

        // Posicionar el gráfico
        $chartX = 150; // Ajusta según el diseño de tu página
        $chartY = 100;  // Ajusta según el diseño de tu página
        $chartWidth = 100;
        $chartHeight = 45;

        $this->pdf->SetXY($chartX, $chartY);
        $this->pdf->SetFont('Arial', 'B', 10);
        $this->pdf->Cell(0, 5, utf8_decode('Distribución de Resultados'), 0, 1, 'C'); // Título del gráfico
        $this->pdf->SetXY($chartX, $chartY + 7); // Posiciona debajo del título del gráfico

        // Convertir el array de colores asociativo a indexado para el PieChart si tu método lo requiere
        $pieColors = array_values($colors);
        $this->pdf->PieChart($chartWidth, $chartHeight, $data, '%l : %v (%p)', $pieColors, $chartX, $chartY + 12); // Pasa los colores al método

        $this->pdf->SetY(max($this->pdf->GetY(), $chartY + $chartHeight + 20)); // Asegura que el siguiente contenido esté debajo del gráfico
    }






/**
     * Genera las estadísticas por género en el PDF.
     * Utiliza un gráfico de pastel para mostrar la distribución.
     *
     * @param array $datag Estadísticas por género (Ej: ['Hombres' => 100, 'Mujeres' => 120]).
     */
    public function generateGenderStats(array $datag)
    {
        $this->pdf->AddPage('L'); // Nueva página para este gráfico si lo deseas
        $this->pdf->SetFont("Arial", "B", 16);
        $this->pdf->SetTextColor(30, 70, 120);
        $this->pdf->Cell(0, 10, utf8_decode('Estadísticas por Género'), 0, 1, 'C');
        $this->pdf->Ln(10);

        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->SetTextColor(50, 50, 50);

        // Definir colores más adecuados para género
        $colors = [
            'Hombres' => [93, 165, 218], // Azul claro
            'Mujeres' => [255, 172, 206]  // Rosa suave
        ];

        // Título de la sección de datos
        $this->pdf->SetFont('Arial', 'BU', 12);
        $this->pdf->Cell(0, 7, utf8_decode('Detalle Numérico:'), 0, 1);
        $this->pdf->Ln(2);

        // Mostrar los datos en formato de tabla simple
        $this->pdf->SetFont('Arial', '', 11);
        foreach ($datag as $label => $value) {
            $this->pdf->Cell(60, 7, utf8_decode($label), 0);
            $this->pdf->Cell(20, 7, $value, 0, 0, 'R');
            $this->pdf->Ln();
        }
        $this->pdf->Ln(8);

        // Posicionar el gráfico
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
     *
     * @param array $datac Estadísticas por colegio.
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

    // Título de la sección de datos
/*    $this->pdf->SetFont('Arial', 'BU', 12);
    $this->pdf->Cell(0, 7, utf8_decode('Detalle Numérico:'), 0, 1);
    $this->pdf->Ln(2);

    // Mostrar los datos en formato de tabla para los colegios
    $this->pdf->SetFont('Arial', '', 11);
    foreach ($datac as $label => $value) {
        $this->pdf->Cell(100, 7, utf8_decode($label), 0);
        $this->pdf->Cell(20, 7, $value, 0, 0, 'R');
        $this->pdf->Ln();
    }
 
    $this->pdf->Ln(8);
 */
 

        // Posicionar el gráfico
        $chartX = 100;
        $chartY = 150;

    // ---
    // Configuración para el gráfico de pastel
    // ---

    // Posicionar el gráfico de pastel
    // Para PieChart, especificas el ancho y alto del "área" del gráfico.
    // La posición X e Y se definen por SetX() y SetY() antes de la llamada.
    $chartWidth = 100; // Ancho del área del gráfico
    $chartHeight = 80; // Alto del área del gráfico

    // Mueve el cursor a donde quieres que inicie el gráfico


        $this->pdf->SetXY($chartX, $chartY);
        $this->pdf->SetFont('Arial', 'B', 10);
//        $this->pdf->Cell(0, 5, utf8_decode('Distribución de Géneros'), 0, 1, 'C');
 //       $this->pdf->SetXY($chartX, $chartY + 7);

 




    // Generar colores dinámicamente para cada sección del pastel
    $colors = [];
    $hue = 0;
    foreach ($datac as $label => $value) {
        // Generar un color RGB basado en un matiz que cambia
        $r = (int)(sin(0.024 * $hue + 0) * 127 + 128);
        $g = (int)(sin(0.024 * $hue + 2) * 127 + 128);
        $b = (int)(sin(0.024 * $hue + 4) * 127 + 128);
        $colors[] = [$r, $g, $b];
        $hue += 60; // Incrementar el matiz para el siguiente color
    }


    // La función PieChart usa las coordenadas actuales (GetX(), GetY())
    // para dibujar el gráfico. Por eso es importante el SetX/SetY anterior.
//    $this->pdf->PieChart($chartWidth, $chartHeight, $datac, '%l: %v (%p%%)', $colors);


    $this->pdf->PieChart($chartWidth, $chartHeight, $datac, '%l : %v (%p)', $colors);

    // Ajusta la posición Y para el contenido siguiente, asegurándote de que no se superponga
//   $this->pdf->SetY(max($this->pdf->GetY(), $this->pdf->GetY() + $chartHeight + 20));


   $this->pdf->SetY(max($this->pdf->GetY(), $chartY + $chartHeight + 100));
}
 
 
    /**
     * Ejecuta la generación del reporte.
     *
     * @param array $participacion Datos de participación.
     * @param array $sesionEventos Sesiones de eventos.
     * @param array $fechacorte Fechas de corte.
     * @param array $jornadadocente Jornada docente.
     * @param array $evento Datos del evento.
     * @param array $asignatura Datos de la asignatura.
     * @param array $distributivodocente Datos del docente.
     * @param array $calendarioacademico Datos del calendario académico.
     * @param array $asistencias Datos de asistencias.
     * @param int $nivelRpt Nivel del reporte.
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
        // Estas variables se asumen globales o pasadas de alguna manera a la clase.
        // Si no son globales, deberías pasarlas al constructor o a este método.
        // Las he puesto aquí para que el ejemplo sea autocontenido, pero lo ideal es pasarlas.

        $sesionTotal = $this->calculateTotalSessions($fechacorte, $jornadadocente, $evento, $calendarioacademico);
        $this->generateTableHeader($sesionEventos, $sesionTotal);
        $stats = $this->processParticipantData($participacion, $sesionEventos, $fechacorte, $sesionTotal, $asistencias, $nivelRpt, $calendarioacademico);

        // Generar estadísticas
        $this->generatePromotionStats($stats);
        $this->generateGenderStats($stats['generos']);
        $this->generateCollegeStats($stats['colegios']);

        $this->pdf->Output();
    }
}

// --- Uso del código refactorizado ---

// Supongamos que estas variables se cargan desde un controlador o modelo
// (simulación de carga de datos)
$this->load->database(); // Carga la conexión a la base de datos (asumiendo CodeIgniter)
$this->load->helper('form'); // El helper 'form' no parece usarse en la lógica principal del PDF.


// Datos de ejemplo (reemplaza con tus datos reales)
//$evento = ['titulo' => 'Reporte de Prácticas', 'fechainicia' => '2024-01-01', 'fechafinaliza' => '2024-06-30'];
//$asignatura = [ (object)['nombre' => 'Programación Web'] ];
//$distributivodocente = [ (object)['eldocente' => 'Dr. Juan Pérez'] ];
//$calendarioacademico = [ (object)['fechadesde' => '2024-01-01', 'fechahasta' => '2024-06-30', 'nombre' => 'Periodo 2024-1'] ];

// Ejemplo de datos de participación, asistencias, etc.
// En un entorno real, estos vendrían de tus modelos de CodeIgniter.
//$participacion = []; // Carga tus datos de participación aquí
//$sesionEventos = []; // Carga tus datos de sesiones de eventos aquí
//$fechacorte = ['2024-03-31', '2024-06-30']; // Ejemplo de fechas de corte
//$jornadadocente = []; // Carga tus datos de jornada docente aquí
//$asistencias = []; // Carga tus datos de asistencias aquí
//$nivelRpt = 1; // Define el nivel de reporte (1, 2, etc.)


// Instanciar y generar el reporte
$reportGenerator = new ReporteParticipacionPDF(
    $this->db,
  $evento, // Pasa la variable $evento que cargaste en el controlador
  $asignatura,
  $distributivodocente,
  $calendarioacademico


); // Pasamos la conexión a la base de datos
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
