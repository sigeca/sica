<?php
class Paispersona_model extends CI_model {

	function lista_paispersonas(){
		 $paispersona= $this->db->get('paispersona');
		 return $paispersona;
	}


	function lista_paispersonas1($idpersona){

 		$this->db->where('idpersona',$idpersona);
		 $paispersona= $this->db->get('paispersona1');
		 return $paispersona;
	}




	function lista_paispersonasA(){
		 $paispersona= $this->db->get('paispersona1');
		 return $paispersona;
	}



 	function paispersona( $id){
 		$paispersona = $this->db->query('select * from paispersona where idpaispersona="'. $id.'"');
 		return $paispersona;
 	}



 	function paispersonas( $idpersona){
 		$paispersona = $this->db->query('select * from paispersona1 where idpersona="'. $idpersona.'"');
 		return $paispersona;
 	}


 	function paispersonaspersona( $id){
 		$paispersona = $this->db->query('select * from paispersona where idpersona="'. $id.'"');
 		return $paispersona;
 	}



 	function save($array)
 	{
		$this->db->insert("paispersona", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idpaispersona',$id);
 		$this->db->update('paispersona',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idpaispersona',$id);
		$this->db->delete('paispersona');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idpaispersona")->get('paispersona');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idpaispersona")->get('paispersona');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$paispersona = $this->db->select("idpaispersona")->order_by("idpaispersona")->get('paispersona')->result_array();
		$arr=array("idpaispersona"=>$id);
		$clave=array_search($arr,$paispersona);
	   if(array_key_exists($clave+1,$paispersona))
		 {

 		$paispersona = $this->db->query('select * from paispersona where idpaispersona="'. $paispersona[$clave+1]["idpaispersona"].'"');
		 }else{

 		$paispersona = $this->db->query('select * from paispersona where idpaispersona="'. $id.'"');
		 }
		 	
 		return $paispersona;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$paispersona = $this->db->select("idpaispersona")->order_by("idpaispersona")->get('paispersona')->result_array();
		$arr=array("idpaispersona"=>$id);
		$clave=array_search($arr,$paispersona);
	   if(array_key_exists($clave-1,$paispersona))
		 {

 		$paispersona = $this->db->query('select * from paispersona where idpaispersona="'. $paispersona[$clave-1]["idpaispersona"].'"');
		 }else{

 		$paispersona = $this->db->query('select * from paispersona where idpaispersona="'. $id.'"');
		 }
		 	
 		return $paispersona;
 	}






}
