<?php
class Portafolio_model extends CI_model {

	function lista_portafolios(){
		 $portafolio= $this->db->get('portafolio');
		 return $portafolio;
	}


	function lista_portafolios1($idportafolio){
		if($idportafolio>0){
		  $this->db->where('idportafolio',$idportafolio);
		}
		 $portafolio= $this->db->get('portafolio1');
		 return $portafolio;
	}


	function lista_portafolio2($idpersona,$idperiodoacademico){
		if($idpersona>0){
		  $this->db->where('idpersona',$idpersona);
		}

		if($idperiodoacademico>0){
		  $this->db->where('idperiodoacademico',$idperiodoacademico);
		}

		 $portafolio= $this->db->order_by("idpersona","idperiodoacademico")->get('portafolio2');
		 return $portafolio;
	}


	function lista_portafolio3($idpersona,$idperiodoacademico){
		if($idpersona>0){
		  $this->db->where('idpersona',$idpersona);
		}

		if($idperiodoacademico>0){
		  $this->db->where('idperiodoacademico',$idperiodoacademico);
		}

		 $portafolio= $this->db->order_by("idpersona","idperiodoacademico")->get('portafolio1');
		 return $portafolio;
	}


	function portafolioxpersonayperiodo($idpersona,$idperiodoacademico){
	 //	if($idpersona>0){
	//	  $this->db->where('idpersona',$idpersona);
	//	}

	//	if($idperiodoacademico>0){
	//	  $this->db->where('idperiodoacademico',$idperiodoacademico);
	//	}

	//	 $portafolio= $this->db->order_by("idpersona","idperiodoacademico")->get('portafolio2');


 		$portafolio = $this->db->query('select port.idportafolio,pele.idperiodoacademico, port.idpersona,pele.nombrecorto as elperiodo,concat(COALESCE(pers.apellidos,\'\'),"  ",COALESCE(pers.nombres,\'\')) as lapersona,dopo.iddocumentoportafolio,docu.iddocumento,docu.asunto,docu.fechaelaboracion,docu.archivopdf,dire.iddirectorio, dire.ruta,orde.idordenador, orde.nombre as elordenador, dclp.nombre as elchklstdocumento  from portafolio port, periodoacademico pele, persona pers, documento docu, documentoportafolio dopo,  directorio dire,ordenador orde, documentochklstportafolio dclp  where port.idperiodoacademico=pele.idperiodoacademico and port.idpersona=pers.idpersona and port.idportafolio=dopo.idportafolio and dopo.iddocumento=docu.iddocumento  and docu.iddirectorio=dire.iddirectorio and docu.idordenador=orde.idordenador and dopo.iddocumentochklstportafolio=dclp.iddocumentochklstportafolio and pers.idpersona="'.$idpersona.'" and pele.idperiodoacademico="'.$idperiodoacademico.'"'); 

		 return $portafolio;
	}









 	function get_portafolio_flutter($idpersona)
 	{
		 if($idpersona>0)
                {
                $this->db->where('idpersona='.$idpersona);
                $query = $this->db->get('portafolio1'); // Suponiendo que la tabla se llama 'documentos'
        return $query->result_array(); // Devolver array de documentos
         }else{

        return 0;

         }




	}
 




	function lista_portafoliosA($idportafolio){
		 if($idportafolio>0){
			$this->db->where("idportafolio",$idportafolio);
		 }
		 	$portafolio= $this->db->get('portafolio1');
		 return $portafolio;
	}




	function lista_portafoliosxpersona($idpersona){
		 if($idpersona>0){
			$this->db->where("idpersona",$idpersona);
		 }
		 	$portafolio= $this->db->get('portafolio1');
		 return $portafolio;
	}



 	function portafolio( $id){
 		$portafolio = $this->db->query('select * from portafolio where idportafolio="'. $id.'"');
 		return $portafolio;
 	}


 	function portafoliospersona( $id){
 		$portafolio = $this->db->query('select * from portafolio where idpersona="'. $id.'"');
 		return $portafolio;
 	}



 	function save($array)
 	{
		$this->db->insert("portafolio", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idportafolio',$id);
 		$this->db->update('portafolio',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idportafolio',$id);
		$this->db->delete('portafolio');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idportafolio")->get('portafolio');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idportafolio")->get('portafolio');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$portafolio = $this->db->select("idportafolio")->order_by("idportafolio")->get('portafolio')->result_array();
		$arr=array("idportafolio"=>$id);
		$clave=array_search($arr,$portafolio);
	   if(array_key_exists($clave+1,$portafolio))
		 {

 		$portafolio = $this->db->query('select * from portafolio where idportafolio="'. $portafolio[$clave+1]["idportafolio"].'"');
		 }else{

 		$portafolio = $this->db->query('select * from portafolio where idportafolio="'. $id.'"');
		 }
		 	
 		return $portafolio;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$portafolio = $this->db->select("idportafolio")->order_by("idportafolio")->get('portafolio')->result_array();
		$arr=array("idportafolio"=>$id);
		$clave=array_search($arr,$portafolio);
	   if(array_key_exists($clave-1,$portafolio))
		 {

 		$portafolio = $this->db->query('select * from portafolio where idportafolio="'. $portafolio[$clave-1]["idportafolio"].'"');
		 }else{

 		$portafolio = $this->db->query('select * from portafolio where idportafolio="'. $id.'"');
		 }
		 	
 		return $portafolio;
 	}






}
