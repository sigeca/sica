<?php
class Contrasenia_model extends CI_model {

	function lista_contrasenias(){
		 $contrasenia= $this->db->get('contrasenia');
		 return $contrasenia;
	}


	function lista_contrasenias1(){
		 $contrasenia= $this->db->get('contrasenia1');
		 return $contrasenia;
	}


	function lista_contraseniasxpersona($idpersona){
         $contrasenia =  $this->db->query('SELECT * FROM contrasenia WHERE idcontrasenia IN (SELECT idcontrasenia FROM portafolio  WHERE idpersona = ? ) ', [$idpersona]);
		 return $contrasenia;
	}





 	function contrasenia( $id){
 		$contrasenia = $this->db->query('select * from contrasenia where idcontrasenia="'. $id.'"');
		 
 		return $contrasenia;
 	}

 	function save($array)
 	{
		$this->db->insert("contrasenia", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idcontrasenia',$id);
 		$this->db->update('contrasenia',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idcontrasenia',$id);
		$this->db->delete('contrasenia');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


public function get_contrasenia($id){
	$condition = "idcontrasenia =" .  $id ;
	$this->db->select('*');
	$this->db->from('contrasenia');
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
		$query=$this->db->order_by("idcontrasenia")->get('contrasenia');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idcontrasenia")->get('contrasenia');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$contrasenia = $this->db->select("idcontrasenia")->order_by("idcontrasenia")->get('contrasenia')->result_array();
		$arr=array("idcontrasenia"=>$id);
		$clave=array_search($arr,$contrasenia);
	   if(array_key_exists($clave+1,$contrasenia))
		 {

 		$contrasenia = $this->db->query('select * from contrasenia where idcontrasenia="'. $contrasenia[$clave+1]["idcontrasenia"].'"');
		 }else{

 		$contrasenia = $this->db->query('select * from contrasenia where idcontrasenia="'. $id.'"');
		 }
		 	
 		return $contrasenia;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$contrasenia = $this->db->select("idcontrasenia")->order_by("idcontrasenia")->get('contrasenia')->result_array();
		$arr=array("idcontrasenia"=>$id);
		$clave=array_search($arr,$contrasenia);
	   if(array_key_exists($clave-1,$contrasenia))
		 {

 		$contrasenia = $this->db->query('select * from contrasenia where idcontrasenia="'. $contrasenia[$clave-1]["idcontrasenia"].'"');
		 }else{

 		$contrasenia = $this->db->query('select * from contrasenia where idcontrasenia="'. $id.'"');
		 }
		 	
 		return $contrasenia;
 	}



	function lista_contraseniaes_con_inscripciones(){
		 $this->db->select('contrasenia.*');
		 $this->db->from('contrasenia,evento');
		 $this->db->where('evento.idcontrasenia=contrasenia.idcontrasenia and evento.idevento_estado=2');
		 $contrasenia= $this->db->get();
		 return $contrasenia;
	}




}
