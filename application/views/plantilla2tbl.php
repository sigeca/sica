<?php
//$v='"'.$_SERVER["DOCUMENT_ROOT"].'/sica/FPDI/vendor/autoload.php'.'"';
require 'fpdf/fpdf.php';
//require_once($v);
require_once('sector.php');

class PDF extends PDF_Sector
{
	public $institucion = "";
	public $unidad  = "";
	public $departamento ="";
	public $titulo="";
	public $asignatura="";
	public $docente="";
	public $mes="";

	var $legends;
	var $wLegend;
	var $sum;
	var $NbVal;

 



	function Header()
	{

//		$i=base_url().'images/logo.jpg';
		$i=base_url().'images/headutlvte.jpg';
//		$j=base_url().'images/MTI-UTLVTE.jpg';
		$this->Image($i,30,7,200);
//		$this->Image($j,170,5,20);
		$this->SetFont('Arial','B',8);
		$this->Cell(25);
		$this->Cell(100,5,"",0,1,'C');
//		$this->Cell(100,5,utf8_decode($this->institucion),0,1,'C');
		$this->Cell(25);
		$this->Cell(180,18,utf8_decode($this->unidad),0,1,'C');
		$this->SetFont('Arial','B',8);
		$this->Cell(25);
		$this->Cell(180,3,utf8_decode($this->departamento),0,1,'C');
		$this->Cell(25);
		$this->Cell(180,5,utf8_decode($this->titulo),0,1,'C');

		$this->Cell(10);
		$this->Cell(10,5,utf8_decode($this->asignatura),0,1,'L');
		$this->Cell(10);
		$this->Cell(10,5,utf8_decode($this->docente),0,1,'L');
		$this->Cell(10);
		$this->Cell(10,5,utf8_decode($this->mes),0,1,'L');

		$this->Ln(1);
//		$this->Cell(40,5,utf8_decode('CÁTEDRA:'),0,0,'L');
//		$this->Cell(40,5,utf8_decode($evento->titulo),0,1,'L');
//		$this->Cell(40,5,utf8_decode('PARALELO:'),0,0,'L');
//		$this->Cell(40,5,utf8_decode('B'),0,1,'L');
//		$this->Cell(40,5,utf8_decode('DOCENTE:'),0,0,'L');
//		$this->Cell(40,5,utf8_decode('Ing. Stalin Francis Q. M.Sc.'),0,1,'L');
		$this->Ln(5);

// --- Table Header ---
        // Only draw the table header if sesionEventos and sesionTotal are set
        if (!empty($this->sesionEventos) && !empty($this->sesionTotal)) { 
            $this->SetFillColor(232, 232, 232);
            $this->SetFont('Arial', 'B', 8);

            $this->Cell(5, 5, '#', 1, 0, 'C', 1);
            $this->Cell(55, 5, 'Participante', 1, 0, 'C', 1);
            $this->Cell(5, 5, 'GE', 1, 0, 'C', 1); // Género
            $this->Cell(5, 5, 'CO', 1, 0, 'C', 1); // Colegio

            foreach ($this->sesionEventos as $row) {
                $this->Cell(8, 5, $row->temacorto, 1, 0, 'C', 1);
            }

            $this->Cell(10, 5, 'P1', 1, 0, 'C', 1);
            $this->Cell(12, 5, 'As1(' . ($this->sesionTotal[0] ?? 0) . ')', 1, 0, 'C', 1);
            $this->Cell(10, 5, 'P2', 1, 0, 'C', 1);
            $this->Cell(12, 5, 'As2(' . ($this->sesionTotal[1] ?? 0) . ')', 1, 0, 'C', 1);
            $this->Cell(10, 5, 'Prom', 1, 0, 'C', 1);
            $asT = ($this->sesionTotal[0] ?? 0) + ($this->sesionTotal[1] ?? 0);
            $this->Cell(12, 5, 'AsT(' . $asT . ')', 1, 1, 'C', 1);
        }



	}
	function Footer()
	{

		$this->SetY(-30);

		$this->SetFont('Arial','I',8);
		$this->Cell(0,5,'-------------------------------------',0,1,'L');
		$this->Cell(0,5,'Firma docente',0,0,'L');

		$this->Cell(0,5,'-----------------------------------------------------',0,1,'R');
		$this->Cell(0,5,'Firma Jefe Unidad  '.utf8_decode("Académica"),0,0,'R');




		$this->SetY(-15);
		$this->SetFont('Arial','I',8);
		$this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
	}


/*
    * Calcula el número de líneas que ocupará un MultiCell de ancho $w.
     * Esto es necesario para determinar la altura de la fila antes de dibujarla.
     *
     * @param float $w Ancho del MultiCell.
     * @param string $txt Texto a evaluar. (Ya debe estar en ISO-8859-1 o compatible con FPDF)
     * @return int El número de líneas que ocupará el texto.
     */
    function NbLines($w, $txt)
    {
        // Obtiene el ancho de los caracteres de la fuente actual
        $cw = &$this->CurrentFont['cw'];
        if($w==0) // Si el ancho es 0, usa el ancho restante de la página
            $w = $this->w-$this->rMargin-$this->x;
        // Calcula el ancho máximo de texto que cabe en una línea (en unidades de fuente)
        $wmax = ($w-2*$this->cMargin)*1000/$this->FontSize;
        // Reemplaza retornos de carro para un conteo consistente
        $s = str_replace("\r",'',$txt);
        $nb = strlen($s); // Longitud del texto
        if($nb==0) // Si el texto está vacío, 0 líneas
            return 0;
        $sep = -1; // Índice del último espacio encontrado
        $i = 0;    // Puntero actual en el texto
        $j = 0;    // Puntero del inicio de la línea actual
        $l = 0;    // Ancho acumulado de la línea actual
        $nl = 1;   // Contador de líneas (empieza en 1)

        while($i<$nb)
        {
            $c = $s[$i]; // Carácter actual
            if($c=="\n") // Si encuentra un salto de línea explícito
            {
                $i++;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++; // Incrementa el contador de líneas
                continue;
            }
            if($c==' ') // Si encuentra un espacio, lo marca como posible punto de corte
                $sep = $i;
            // Suma el ancho del carácter actual al ancho de la línea
            if (isset($cw[$c])) {
                $l += $cw[$c];
            } else {
                // Si el carácter no está en el mapa de anchos de la fuente,
                // podría ser un carácter no imprimible o no soportado.
                // Podrías asignarle un ancho predeterminado o ignorarlo.
                // Para UTF-8, asegúrate de que la fuente soporte los caracteres.
                // Por ahora, lo ignoramos si no está definido para evitar errores.
            }

            if($l>$wmax) // Si el ancho de la línea excede el máximo permitido
            {
                if($sep==-1) // No hay espacios, la palabra es demasiado larga
                {
                    if($i==$j) // Si no se ha movido desde el inicio de la línea (palabra muy larga)
                        $i++;
                }
                else // Hay un espacio, corta la línea en el último espacio
                    $i = $sep+1;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++; // Incrementa el contador de líneas
            }
            else
                $i++; // Continúa al siguiente carácter
        }
        return $nl; // Devuelve el número total de líneas
    }
























	function PieChart($w, $h, $data, $format, $colors=null)
	{
		$this->SetFont('Courier', '', 10);
		$this->SetLegends($data,$format);

		$XPage = $this->GetX();
		$YPage = $this->GetY();
		$margin = 2;
		$hLegend = 5;
		$radius = min($w - $margin * 4 - $hLegend - $this->wLegend, $h - $margin * 2);
		$radius = floor($radius / 2);
		$XDiag = $XPage + $margin + $radius;
		$YDiag = $YPage + $margin + $radius;
		if($colors == null) {
			for($i = 0; $i < $this->NbVal; $i++) {
				$gray = $i * intval(255 / $this->NbVal);
				$colors[$i] = array($gray,$gray,$gray);
			}
		}

		//Sectors
		$this->SetLineWidth(0.2);
		$angleStart = 0;
		$angleEnd = 0;
		$i = 0;
		foreach($data as $val) {
			$angle = ($val * 360) / doubleval($this->sum);
			if ($angle != 0) {
				$angleEnd = $angleStart + $angle;
				$this->SetFillColor($colors[$i][0],$colors[$i][1],$colors[$i][2]);
				$this->Sector($XDiag, $YDiag, $radius, $angleStart, $angleEnd);
				$angleStart += $angle;
			}
			$i++;
		}

		//Legends
		$this->SetFont('Courier', '', 10);
		$x1 = $XPage + 2 * $radius + 4 * $margin;
		$x2 = $x1 + $hLegend + $margin;
		$y1 = $YDiag - $radius + (2 * $radius - $this->NbVal*($hLegend + $margin)) / 2;
		for($i=0; $i<$this->NbVal; $i++) {
			$this->SetFillColor($colors[$i][0],$colors[$i][1],$colors[$i][2]);
			$this->Rect($x1, $y1, $hLegend, $hLegend, 'DF');
			$this->SetXY($x2,$y1);
			$this->Cell(0,$hLegend,$this->legends[$i]);
			$y1+=$hLegend + $margin;
		}
	}

	function BarDiagram($w, $h, $data, $format, $color=null, $maxVal=0, $nbDiv=4)
	{
		$this->SetFont('Courier', '', 10);
		$this->SetLegends($data,$format);

		$XPage = $this->GetX();
		$YPage = $this->GetY();
		$margin = 2;
		$YDiag = $YPage + $margin;
		$hDiag = floor($h - $margin * 2);
		$XDiag = $XPage + $margin * 2 + $this->wLegend;
		$lDiag = floor($w - $margin * 3 - $this->wLegend);
		if($color == null)
			$color=array(155,155,155);
		if ($maxVal == 0) {
			$maxVal = max($data);
		}
		$valIndRepere = ceil($maxVal / $nbDiv);
		$maxVal = $valIndRepere * $nbDiv;
		$lRepere = floor($lDiag / $nbDiv);
		$lDiag = $lRepere * $nbDiv;
		$unit = $lDiag / $maxVal;
		$hBar = floor($hDiag / ($this->NbVal + 1));
		$hDiag = $hBar * ($this->NbVal + 1);
		$eBaton = floor($hBar * 80 / 100);

		$this->SetLineWidth(0.2);
		$this->Rect($XDiag, $YDiag, $lDiag, $hDiag);

		$this->SetFont('Courier', '', 10);
		$this->SetFillColor($color[0],$color[1],$color[2]);
		$i=0;
		foreach($data as $val) {
			//Bar
			$xval = $XDiag;
			$lval = (int)($val * $unit);
			$yval = $YDiag + ($i + 1) * $hBar - $eBaton / 2;
			$hval = $eBaton;
			$this->Rect($xval, $yval, $lval, $hval, 'DF');
			//Legend
			$this->SetXY(0, $yval);
			$this->Cell($xval - $margin, $hval, $this->legends[$i],0,0,'R');
			$i++;
		}

		//Scales
		for ($i = 0; $i <= $nbDiv; $i++) {
			$xpos = $XDiag + $lRepere * $i;
			$this->Line($xpos, $YDiag, $xpos, $YDiag + $hDiag);
			$val = $i * $valIndRepere;
			$xpos = $XDiag + $lRepere * $i - $this->GetStringWidth($val) / 2;
			$ypos = $YDiag + $hDiag - $margin;
			$this->Text($xpos, $ypos, $val);
		}
	}

	function SetLegends($data, $format)
	{
		$this->legends=array();
		$this->wLegend=0;
		$this->sum=array_sum($data);
		$this->NbVal=count($data);
		foreach($data as $l=>$val)
		{
			$p=sprintf('%.2f',$val/$this->sum*100).'%';
			$legend=str_replace(array('%l','%v','%p'),array($l,$val,$p),$format);
			$this->legends[]=$legend;
			$this->wLegend=max($this->GetStringWidth($legend),$this->wLegend);
		}
	}

function TextWithRotation($x, $y, $txt, $txt_angle, $font_angle=0)
{
    $font_angle+=90+$txt_angle;
    $txt_angle*=M_PI/180;
    $font_angle*=M_PI/180;

    $txt_dx=cos($txt_angle);
    $txt_dy=sin($txt_angle);
    $font_dx=cos($font_angle);
    $font_dy=sin($font_angle);

    $s=sprintf('BT %.2F %.2F %.2F %.2F %.2F %.2F Tm (%s) Tj ET',$txt_dx,$txt_dy,$font_dx,$font_dy,$x*$this->k,($this->h-$y)*$this->k,$this->_escape($txt));
    if ($this->ColorFlag)
        $s='q '.$this->TextColor.' '.$s.' Q';
    $this->_out($s);
}





	}
?>
