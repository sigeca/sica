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

	var $legends;
	var $wLegend;
	var $sum;
	var $NbVal;


	function Header()
	{

//		$i=base_url().'images/logo.jpg';
		$i=base_url().'images/headutlvte.jpg';
//		$j=base_url().'images/MTI-UTLVTE.jpg';
		$this->Image($i,30,10,150);
//		$this->Image($j,170,5,20);
		$this->SetFont('Arial','B',8);
		$this->Cell(100,5,"",0,1,'C');
//		$this->Cell(100,5,utf8_decode($this->institucion),0,1,'C');
		$this->Cell(180,15,utf8_decode($this->unidad),0,1,'C');
		$this->Cell(180,2,utf8_decode($this->departamento),0,1,'C');
		$this->Cell(180,5,utf8_decode($this->titulo),0,1,'C');
		$this->Ln(5);
//		$this->Cell(40,5,utf8_decode('CÁTEDRA:'),0,0,'L');
//		$this->Cell(40,5,utf8_decode($evento->titulo),0,1,'L');
//		$this->Cell(40,5,utf8_decode('PARALELO:'),0,0,'L');
//		$this->Cell(40,5,utf8_decode('B'),0,1,'L');
//		$this->Cell(40,5,utf8_decode('DOCENTE:'),0,0,'L');
//		$this->Cell(40,5,utf8_decode('Ing. Stalin Francis Q. M.Sc.'),0,1,'L');
	}
	function Footer()
	{

		$this->SetY(-30);

		$this->SetFont('Arial','I',8);
		$this->Cell(0,5,'--------------------------------',0,0,'L');
		$this->Cell(0,5,'--------------------------------',0,1,'R');
		$this->Cell(0,5,'Firma docente',0,0,'L');

		$this->Cell(0,5,'Firma Jefe Unidad de Académica',0,1,'R');




		$this->SetY(-15);
		$this->SetFont('Arial','I',8);
		$this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
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


 // Método para calcular la altura de un MultiCell sin dibujarlo
    function calculateMultiCellHeight($width, $text, $line_height) {
        // Guarda la posición actual
        $x_backup = $this->GetX();
        $y_backup = $this->GetY();

        // Obtener el tamaño de fuente actual.
        // FPDF usa $this->FontSizePt para el tamaño de la fuente en puntos.
        // Pero no lo necesitamos directamente si usamos WordWrap que ya maneja las unidades.

        // Usa WordWrap para dividir el texto en líneas
        $lines = $this->WordWrap($text, $width);
        $num_lines = count($lines);
        
        // Restaura la posición
        $this->SetXY($x_backup, $y_backup);

        return $num_lines * $line_height;
    }

 // Método WordWrap (Si no lo tienes, agrégalo. Es necesario para calculateMultiCellHeight)
    function WordWrap($text, $width) {
        $text = str_replace("\r", "", $text); // Eliminar retornos de carro
        $arr = explode("\n", $text); // Dividir por saltos de línea explícitos
        $res = array();
        foreach ($arr as $line) {
            $words = explode(" ", $line);
            $buf = "";
            for ($i = 0; $i < count($words); $i++) {
                $word = $words[$i];
                // Si la palabra actual (o la frase actual más la palabra) excede el ancho
                // Se agrega la frase actual a $res y se inicia una nueva frase con la palabra actual
                if ($this->GetStringWidth($buf . ($buf == "" ? "" : " ") . $word) > $width) {
                    if ($buf != "") { // Solo agrega si el buffer no está vacío
                        $res[] = $buf;
                    }
                    $buf = $word;
                } else {
                    $buf .= ($buf == "" ? "" : " ") . $word;
                }
            }
            if ($buf != "") { // Asegurarse de agregar la última parte
                $res[] = $buf;
            }
        }
        return $res;
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







	}
?>
