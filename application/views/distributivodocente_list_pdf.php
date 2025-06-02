<?php
require('fpdf.php'); // Asegúrate de que esta línea exista y apunte a tu archivo fpdf.php

class PDF extends FPDF
{
    public $institucion;
    public $unidad;
    public $departamento;
    public $titulo;

    // Cabecera de página
    function Header()
    {
        // Logo
        // $this->Image('logo.png',10,8,33); // Descomenta y ajusta si tienes un logo
        // Arial bold 15
        $this->SetFont('Arial','B',10);
        // Movernos a la derecha
        $this->Cell(80);
        // Título
        $this->Cell(30,5,utf8_decode($this->institucion),0,1,'C');
        $this->Cell(190,5,utf8_decode($this->unidad),0,1,'C');
        $this->Cell(190,5,utf8_decode($this->departamento),0,1,'C');
        $this->Ln(5); // Espacio después de los datos de la institución
        $this->SetFont('Arial','B',12);
        $this->Cell(190,10,utf8_decode($this->titulo),0,0,'C');
        // Salto de línea
        $this->Ln(20);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1.5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Número de página
        $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
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
