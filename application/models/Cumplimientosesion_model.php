<?php
class Cumplimientosesion_model extends CI_model {

	function lista_cumplimientosesiones(){
		 $cumplimientosesion= $this->db->get('cumplimientosesion');
		 return $cumplimientosesion;
	}

 	function cumplimientosesion( $id){
 		$cumplimientosesion = $this->db->query('select * from cumplimientosesion where idcumplimientosesion="'. $id.'"');
 		return $cumplimientosesion;
 	}

 	function save($array)
 	{
		$this->db->insert("cumplimientosesion", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idcumplimientosesion',$id);
 		$this->db->update('cumplimientosesion',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idcumplimientosesion',$id);
		$this->db->delete('cumplimientosesion');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idcumplimientosesion")->get('cumplimientosesion');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idcumplimientosesion")->get('cumplimientosesion');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$cumplimientosesion = $this->db->select("idcumplimientosesion")->order_by("idcumplimientosesion")->get('cumplimientosesion')->result_array();
		$arr=array("idcumplimientosesion"=>$id);
		$clave=array_search($arr,$cumplimientosesion);
	   if(array_key_exists($clave+1,$cumplimientosesion))
		 {

 		$cumplimientosesion = $this->db->query('select * from cumplimientosesion where idcumplimientosesion="'. $cumplimientosesion[$clave+1]["idcumplimientosesion"].'"');
		 }else{

 		$cumplimientosesion = $this->db->query('select * from cumplimientosesion where idcumplimientosesion="'. $id.'"');
		 }
		 	
 		return $cumplimientosesion;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$cumplimientosesion = $this->db->select("idcumplimientosesion")->order_by("idcumplimientosesion")->get('cumplimientosesion')->result_array();
		$arr=array("idcumplimientosesion"=>$id);
		$clave=array_search($arr,$cumplimientosesion);
	   if(array_key_exists($clave-1,$cumplimientosesion))
		 {

 		$cumplimientosesion = $this->db->query('select * from cumplimientosesion where idcumplimientosesion="'. $cumplimientosesion[$clave-1]["idcumplimientosesion"].'"');
		 }else{

 		$cumplimientosesion = $this->db->query('select * from cumplimientosesion where idcumplimientosesion="'. $id.'"');
		 }
		 	
 		return $cumplimientosesion;
 	}






}
