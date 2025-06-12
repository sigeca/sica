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
        
        foreach ($fechacorte as $p => $fc) {
            $currentDate = $fechaSesion;
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
                        'idpersona' => $row->idpersona
