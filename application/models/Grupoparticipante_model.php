<?php
class Grupoparticipante_model extends CI_model {

	function lista_grupoparticipantes(){
		 $grupoparticipante= $this->db->get('grupoparticipante');
		 return $grupoparticipante;
	}


	function lista_grupoparticipantesA(){
		 $grupoparticipante= $this->db->get('grupoparticipante1');
		 return $grupoparticipante;
	}



 	function grupoparticipante( $id){
 		$grupoparticipante = $this->db->query('select * from grupoparticipante where idgrupoparticipante="'. $id.'"');
 		return $grupoparticipante;
 	}


 	function grupoparticipantesA( $idevento){
 		$grupoparticipante = $this->db->query('select * from grupoparticipante1 where idevento="'. $idevento.'"');
 		return $grupoparticipante;
 	}


 	function grupoparticipantesxparticipante( $idparticipante){
 		$grupoparticipante = $this->db->query('select * from grupoparticipante1 where idparticipante="'. $idparticipante.'"');
 		return $grupoparticipante;
 	}






 	function save($array)
 	{
		$this->db->insert("grupoparticipante", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idgrupoparticipante',$id);
 		$this->db->update('grupoparticipante',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idgrupoparticipante',$id);
		$this->db->delete('grupoparticipante');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idgrupoparticipante")->get('grupoparticipante');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idgrupoparticipante")->get('grupoparticipante');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$grupoparticipante = $this->db->select("idgrupoparticipante")->order_by("idgrupoparticipante")->get('grupoparticipante')->result_array();
		$arr=array("idgrupoparticipante"=>$id);
		$clave=array_search($arr,$grupoparticipante);
	   if(array_key_exists($clave+1,$grupoparticipante))
		 {

 		$grupoparticipante = $this->db->query('select * from grupoparticipante where idgrupoparticipante="'. $grupoparticipante[$clave+1]["idgrupoparticipante"].'"');
		 }else{

 		$grupoparticipante = $this->db->query('select * from grupoparticipante where idgrupoparticipante="'. $id.'"');
		 }
		 	
 		return $grupoparticipante;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$grupoparticipante = $this->db->select("idgrupoparticipante")->order_by("idgrupoparticipante")->get('grupoparticipante')->result_array();
		$arr=array("idgrupoparticipante"=>$id);
		$clave=array_search($arr,$grupoparticipante);
	   if(array_key_exists($clave-1,$grupoparticipante))
		 {

 		$grupoparticipante = $this->db->query('select * from grupoparticipante where idgrupoparticipante="'. $grupoparticipante[$clave-1]["idgrupoparticipante"].'"');
		 }else{

 		$grupoparticipante = $this->db->query('select * from grupoparticipante where idgrupoparticipante="'. $id.'"');
		 }
		 	
 		return $grupoparticipante;
 	}






}
