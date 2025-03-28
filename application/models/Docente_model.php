<?php
class Docente_model extends CI_model {

	function lista_docentes(){
		 $docente= $this->db->get('docente1');
		 return $docente;
	}


	function lista_docentesA($iddocente){
		if($iddocente>0){
		$this->db->where('iddocente',$iddocente);
		}

		 $this->db->order_by("eldocente","asc");
		 $docente= $this->db->get('docente1');
		 return $docente;
	}

	function lista_docentesB(){
		 $this->db->order_by("eldocente","asc");
		 $docente= $this->db->get('docente2');
		 return $docente;
	}


 	function docente( $id){
 		$docente = $this->db->query('select * from docente1 where iddocente="'. $id.'"');
 		return $docente;
 	}


 	function docente1( $id){
 		$docente = $this->db->query('select * from docente1 where iddocente="'. $id.'"');
 		return $docente;
 	}



 	function docentespersona( $id){
 		$docente = $this->db->query('select * from docente0 where idpersona="'. $id.'"');
 		return $docente;
 	}



 	function esdocente( $id){
 		$query = $this->db->query('select * from docente0 where idpersona="'. $id.'"');
		if ($query->num_rows() == 0) {
			return false;
		   }else{
			return true;
		   }
 	}



 	function save($array)
 	{
		$condition1 = "iddepartamento =" . "'" . $array['iddepartamento'] . "'";
		$condition2 = "idpersona =" . "'" . $array['idpersona'] . "'";
		$this->db->select('*');
		$this->db->from('docente0');
		$this->db->where($condition1);
		$this->db->where($condition2);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
			$this->db->insert("docente", $array);
			return true;
		   }else{
			return false;
		   }




 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('iddocente',$id);
 		$this->db->update('docente0',$array_item);
	}
 


 	public function delete($iddocente)
	{

		$condition = "iddocente =" . $iddocente ;
		$this->db->select('*');
		$this->db->from('docente');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() != 0) {
	 		  	$this->db->where('iddocente',$idp);
				$this->db->update('docente', array('eliminado'=>1));
			$result=true;
		}else{
			$result=false;
		}
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("iddocente")->get('docente0');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("iddocente")->get('docente1');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$docente = $this->db->select("iddocente")->order_by("iddocente")->get('docente1')->result_array();
		$arr=array("iddocente"=>$id);
		$clave=array_search($arr,$docente);
	   if(array_key_exists($clave+1,$docente))
		 {

 		$docente = $this->db->query('select * from docente0 where iddocente="'. $docente[$clave+1]["iddocente"].'"');
		 }else{

 		$docente = $this->db->query('select * from docente0 where iddocente="'. $id.'"');
		 }
		 	
 		return $docente;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$docente = $this->db->select("iddocente")->order_by("iddocente")->get('docente1')->result_array();
		$arr=array("iddocente"=>$id);
		$clave=array_search($arr,$docente);
	   if(array_key_exists($clave-1,$docente))
		 {

 		$docente = $this->db->query('select * from docente0 where iddocente="'. $docente[$clave-1]["iddocente"].'"');
		 }else{

 		$docente = $this->db->query('select * from docente0 where iddocente="'. $id.'"');
		 }
		 	
 		return $docente;
 	}






}
