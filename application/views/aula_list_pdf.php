<?php

//	include 'plantilla.php';
	include 'plantilla2023-1.php';
//	require 'conexion.php';
	
//	$query = "SELECT e.estado, m.id_municipio, m.municipio FROM t_municipio AS m INNER JOIN t_estado AS e ON m.id_estado=e.id_estado";
//	$resultado = $mysqli->query($query);



	if(isset($_GET["idparticipanteestado"]))
	{
		$idparticipanteestado=$_GET["idparticipanteestado"];
	}else{
		$idparticipanteestado=0;
	}
        


	if(isset($_GET["idpersona"]))
	{
		$idpersona=$_GET["idpersona"];
	}else{
		$idpersona=0;
	}
      
	$pdf = new PDF();
	$pdf->SetMargins(23, 10, 11.7);
	$pdf->institucion='UNIVERSIDAD TÉCNICA LUIS VARGAS TORRES DE ESMERALDAS';
	$pdf->unidad='FACULTAD DE INGENIERIAS (FACI)';
	$pdf->departamento='CARRERA EN TECNOLOGÍA DE LA INFORMACIÓN';
	$pdf->titulo="Entornos de Aprendizaje"; 
	


	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',8);


	$pdf->Cell(5,5,'#',1,0,'C',1);
	$pdf->Cell(15,5,'Id',1,0,'C',1);
	$pdf->Cell(30,5,'nombre',1,0,'C',1);
	$pdf->Cell(80,5,'detalle',1,0,'C',1);
	$pdf->Cell(40,5,'codigo',1,1,'C',1);
 
	 


	$pdf->SetFont('Arial','',7);

	$autor='';
	$persona="";
	$h=5;
	$i=0;
	foreach ($aulas as $row){  //Recorre todas la participaciones realiadas por los participantes
		$l=strlen($row->detalle);
	//	echo $l;
	//	die();
		   if($l>68){
		   	$h=10;
     		   }else{
		   	$h=5;
		   }			   

		    $i=$i+1;
		    $pdf->Cell(5,$h,$i,1,0,'R',0); 
		    $pdf->Cell(15,$h,utf8_decode($row->idaula),1,0,'R',0);
		    $pdf->Cell(30,$h,utf8_decode($row->nombre),1,0,'L',0);
		 $current_x = $pdf->GetX();
		 $current_y = $pdf->GetY();

		 //$pdf->Cell(80,5,utf8_decode($row->nombre),1,0,'L',0);
		 $pdf->MultiCell(80,5,utf8_decode($row->detalle),1,'L',1);
		 $pdf->SetXY($current_x+80, $current_y);
         $url_base = "https://repositorioutlvte.org/Repositorio/aulas/";

		 $pdf->Cell(40,$h,utf8_decode($row->nombre),1,1,'L',0,$url_base."aula".$row->idaula.".jpg");


   }




//	header('Content-type: application/pdf');


	$pdf->Output();
?>
