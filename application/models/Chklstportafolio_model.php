<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;




class Chklstportafolio_model extends CI_model {

	function lista_chklstportafolios(){
		 $chklstportafolio= $this->db->get('chklstportafolio');
		 return $chklstportafolio;
	}


	function lista_chklstportafoliosA(){
		$query=$this->db->order_by("elchklstportafolio")->get('chklstportafolio1');
		 return $query;
	}




 	function chklstportafolio( $id){
 		$chklstportafolio = $this->db->query('select * from chklstportafolio where idchklstportafolio="'. $id.'"');
 		return $chklstportafolio;
 	}


 	function chklstportafolio1( $id){
 		$chklstportafolio = $this->db->query('select * from chklstportafolio1 where idchklstportafolio="'. $id.'"');
 		return $chklstportafolio;
 	}



 	function chklstportafolio2( $iddocente,$idasignatura,$idevento){
 		$chklstportafolio = $this->db->query('select * from chklstportafolio2 where  iddocente="'. $iddocente.'" and idasignatura="'.$idasignatura.'"   and idevento="'.$idevento.'" order by idperiodoacademico desc  limit 1');
 		return $chklstportafolio;
 	}






 	function chklstportafolioss( $iddocente){
 		$chklstportafolio = $this->db->query('select * from chklstportafolio1 where iddocente="'. $iddocente.'"');
 		return $chklstportafolio;
 	}


 	function chklstportafoliosp( $idperiodoacademico){
 		$chklstportafolio = $this->db->query('select * from chklstportafolio1 where idperiodoacademico="'. $idperiodoacademico.'" order by iddocente');
 		return $chklstportafolio;
 	}


 	function chklstportafoliosdp( $iddocente,$idperiodoacademico){
 		$chklstportafolio = $this->db->query('select * from chklstportafolio1 where iddocente="'. $iddocente.'" and  idperiodoacademico="'. $idperiodoacademico.'"');
 		return $chklstportafolio;
 	}








 	function chklstportafoliosa( $idasignatura,$iddocente){
		if($iddocente>0){
 		$chklstportafolio = $this->db->query('select * from chklstportafolio1 where idasignatura="'. $idasignatura.'" and iddocente='.$iddocente);
		}else{
 		$chklstportafolio = $this->db->query('select * from chklstportafolio1 where idasignatura='. $idasignatura);
		}
 		return $chklstportafolio;
 	}




 	function save($array)
 	{
	   	$this->db->trans_begin();
		$condition1 = "idasignatura =" . "'" . $array['idasignatura'] . "'";
		$condition2 = "idperiodoacademico =" . "'" . $array['idperiodoacademico'] . "'";
		$condition3 = "iddocente =" . "'" . $array['iddocente'] . "'";
		$this->db->select('*');
		$this->db->from('chklstportafolio');
		$this->db->where($condition1);
		$this->db->where($condition2);
		$this->db->where($condition3);
		$this->db->order_by('idchklstportafolio',"DESC");
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
			$this->db->insert("chklstportafolio", $array);
  			if( $this->db->affected_rows()>0){
				$idchklstportafolio=$this->db->insert_id();
				// Se crea las unidades del chklstportafolio
				for($i=1;$i<=4;$i++){
					$arrayunidad=array();
					$arrayunidad['idchklstportafolio']=$idchklstportafolio;
					$arrayunidad['unidad']=$i;
					$arrayunidad['nombre']="Unidad #".$i ;
					$this->db->insert('unidadchklstportafolio',$arrayunidad);
				}	
				//Se busca la asignacion del docente a esta asignatura
	   		}else{
			   $this->db->trans_rollback();
			   $idchklstportafolio=0;
		//	return false;
		   }
		}else{
			$idchklstportafolio=$query->result()[0]->idchklstportafolio;
			$this->db->trans_rollback();
			//return false;
 	}


	if($idchklstportafolio>0){

		$condition1 = "idperiodoacademico =" . $array['idperiodoacademico'] ;
		$this->db->select('*');
		$this->db->from('periodoacademico');
		$this->db->where($condition1);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$fechainicio=$query->result()[0]->fechainicio;
			$fechafin=$query->result()[0]->fechafin;
		}else{
			$fechainicio="";
			$fechafin="";
		}
		$condition1 = "idperiodoacademico =" . $array['idperiodoacademico'] ;
		$this->db->select('*');
		$this->db->from('calendarioacademico');
		$this->db->where($condition1);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$idcalendarioacademico=$query->result()[0]->idcalendarioacademico;
		}else{
			$idcalendarioacademico=0;
		}
		$condition1 = "idperiodoacademico =" .  $array['idperiodoacademico'] ;
		$this->db->select('*');
		$this->db->from('distributivo');
		$this->db->where($condition1);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$iddistributivo=$query->result()[0]->iddistributivo;
		}else{
			$iddistributivo=0;
		}
		$condition1 = "iddistributivo =" . $iddistributivo ;
		$condition2 = "iddocente =" . $array['iddocente'] ;
		$this->db->select('*');
		$this->db->from('distributivodocente');
		$this->db->where($condition1);
		$this->db->where($condition2);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$iddistributivodocente=$query->result()[0]->iddistributivodocente;
		}else{
			$iddistributivodocente=0;
		}	

		$condition1 = "iddistributivodocente =" .  $iddistributivodocente ;
		$condition2 = "idasignatura =" .  $array['idasignatura'] ;
		$this->db->select('*');
		$this->db->from('asignaturadocente');
		$this->db->where($condition1);
		$this->db->where($condition2);
		$this->db->limit(1);
		$query= $this->db->get();
		if ($query->num_rows() > 0) {
			$idasignaturadocente=$query->result()[0]->idasignaturadocente;
		}else{
			$idasignaturadocente=0;
		}

 

			$this->db->trans_commit();
	//	return $query->first_row('array');
		$data = array("idchklstportafolio"=>$idchklstportafolio,"idcalendarioacademico"=>$idcalendarioacademico,"idasignaturadocente"=>$idasignaturadocente,"fechainicio"=>$fechainicio,"fechafin"=>$fechafin,"successfull"=>true);

	}else{

		$data = array("successfull"=>false);

	}


		return $data;


 	}













 	function update($id,$array_item)
 	{
 		$this->db->where('idchklstportafolio',$id);
 		$this->db->update('chklstportafolio',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idchklstportafolio',$id);
		$this->db->delete('chklstportafolio');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


public function get_chklstportafolio($id){
	$condition = "idchklstportafolio =" .  $id ;
	$this->db->select('*');
	$this->db->from('chklstportafolio');
	$this->db->where($condition);
	$this->db->limit(1);
	$query = $this->db->get();

	if ($query->num_rows() == 1) {
		return $query->result();
	} else {
		return false;
	}

}





	function elprimero()
	{
		$query=$this->db->order_by("idchklstportafolio")->get('chklstportafolio');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idchklstportafolio")->get('chklstportafolio');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$chklstportafolio = $this->db->select("idchklstportafolio")->order_by("idchklstportafolio")->get('chklstportafolio')->result_array();
		$arr=array("idchklstportafolio"=>$id);
		$clave=array_search($arr,$chklstportafolio);
	   if(array_key_exists($clave+1,$chklstportafolio))
		 {

 		$chklstportafolio = $this->db->query('select * from chklstportafolio where idchklstportafolio="'. $chklstportafolio[$clave+1]["idchklstportafolio"].'"');
		 }else{

 		$chklstportafolio = $this->db->query('select * from chklstportafolio where idchklstportafolio="'. $id.'"');
		 }
		 	
 		return $chklstportafolio;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$chklstportafolio = $this->db->select("idchklstportafolio")->order_by("idchklstportafolio")->get('chklstportafolio')->result_array();
		$arr=array("idchklstportafolio"=>$id);
		$clave=array_search($arr,$chklstportafolio);
	   if(array_key_exists($clave-1,$chklstportafolio))
		 {

 		$chklstportafolio = $this->db->query('select * from chklstportafolio where idchklstportafolio="'. $chklstportafolio[$clave-1]["idchklstportafolio"].'"');
		 }else{

 		$chklstportafolio = $this->db->query('select * from chklstportafolio where idchklstportafolio="'. $id.'"');
		 }
		 	
 		return $chklstportafolio;
 	}



	function lista_chklstportafolioes_con_inscripciones(){
		 $this->db->select('chklstportafolio.*');
		 $this->db->from('chklstportafolio,evento');
		 $this->db->where('evento.idchklstportafolio=chklstportafolio.idchklstportafolio and evento.idevento_estado=2');
		 $chklstportafolio= $this->db->get();
		 return $chklstportafolio;
	}




    public function exportToExcel($data, $filename) {
        // Crear un nuevo objeto Spreadsheet
        $spreadsheet = new Spreadsheet();

        // Obtener la hoja activa
        $sheet = $spreadsheet->getActiveSheet();

        // Escribir los datos en la hoja de cálculo
        $sheet->fromArray($data, null, 'A1');

// Aplicar estilo a la primera fila
$styleArray = [
    'font' => [
        'bold' => true,
        'color' => ['argb' => Color::COLOR_WHITE],
    ],
    'alignment' => [
        'horizontal' => Alignment::HORIZONTAL_CENTER,
        'vertical' => Alignment::VERTICAL_CENTER,
    ],
    'fill' => [
        'fillType' => Fill::FILL_SOLID,
        'startColor' => [
            'argb' => '00000000', // Color de fondo negro
        ],
    ],
];


// Aplicar el estilo a la primera fila
$sheet->getStyle('A1:P1')->applyFromArray($styleArray);


// Cambiar el ancho de las celdas
    $sheet->getColumnDimension('A')->setWidth(5); // Ancho de la columna A
    $sheet->getStyle('A')->getAlignment()->setWrapText(true); // Ajuste de texto en la columna A
    $sheet->getColumnDimension('B')->setWidth(40); // Ancho de la columna B
    $sheet->getStyle('B')->getAlignment()->setWrapText(true); // Ajuste de texto en la columna A
    $sheet->getColumnDimension('C')->setWidth(10); // Ancho de la columna B
    $sheet->getStyle('C')->getAlignment()->setWrapText(true); // Ajuste de texto en la columna A
    $sheet->getColumnDimension('D')->setWidth(40); // Ancho de la columna C
    $sheet->getStyle('D')->getAlignment()->setWrapText(true); // Ajuste de texto en la columna A
    $sheet->getColumnDimension('E')->setWidth(15); // Ancho de la columna C
    $sheet->getStyle('E')->getAlignment()->setWrapText(true); // Ajuste de texto en la columna A
    $sheet->getColumnDimension('F')->setWidth(15); // Ancho de la columna C
    $sheet->getStyle('F')->getAlignment()->setWrapText(true); // Ajuste de texto en la columna A
    $sheet->getColumnDimension('G')->setWidth(15); // Ancho de la columna C
    $sheet->getStyle('G')->getAlignment()->setWrapText(true); // Ajuste de texto en la columna A
    $sheet->getColumnDimension('H')->setWidth(15); // Ancho de la columna C
    $sheet->getStyle('H')->getAlignment()->setWrapText(true); // Ajuste de texto en la columna A
    $sheet->getColumnDimension('I')->setWidth(15); // Ancho de la columna C
    $sheet->getStyle('I')->getAlignment()->setWrapText(true); // Ajuste de texto en la columna A
    $sheet->getColumnDimension('J')->setWidth(15); // Ancho de la columna C
    $sheet->getStyle('J')->getAlignment()->setWrapText(true); // Ajuste de texto en la columna A
    $sheet->getColumnDimension('K')->setWidth(15); // Ancho de la columna C
    $sheet->getStyle('K')->getAlignment()->setWrapText(true); // Ajuste de texto en la columna A
    $sheet->getColumnDimension('L')->setWidth(15); // Ancho de la columna C
    $sheet->getStyle('L')->getAlignment()->setWrapText(true); // Ajuste de texto en la columna A
    $sheet->getColumnDimension('M')->setWidth(15); // Ancho de la columna C
    $sheet->getStyle('M')->getAlignment()->setWrapText(true); // Ajuste de texto en la columna A
    $sheet->getColumnDimension('N')->setWidth(15); // Ancho de la columna C
    $sheet->getStyle('N')->getAlignment()->setWrapText(true); // Ajuste de texto en la columna A
    $sheet->getColumnDimension('O')->setWidth(15); // Ancho de la columna C
    $sheet->getStyle('O')->getAlignment()->setWrapText(true); // Ajuste de texto en la columna A
    $sheet->getColumnDimension('P')->setWidth(15); // Ancho de la columna C
    $sheet->getStyle('P')->getAlignment()->setWrapText(true); // Ajuste de texto en la columna A
 


// Enviar el archivo al navegador para descarga

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="' . $filename . '"');
    header('Cache-Control: max-age=0');
    header('Cache-Control: max-age=1');
    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Fecha en el pasado
    header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // Siempre modificado
    header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
    header('Pragma: public'); // HTTP/1.0


        // Crear un objeto Writer para guardar la hoja de cálculo
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);

        // Enviar el archivo al navegador para su descarga
       $writer->save('php://output');

        // Salir para asegurarse de que no se envíe nada más
        exit;
    }











}
