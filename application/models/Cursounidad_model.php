<?php
class Cursounidad_model extends CI_model {

	function listar_cursounidad(){
		 $cursounidad= $this->db->get('cursounidad');
		 return $cursounidad;
	}

	function listar_cursounidad1(){
		 $cursounidad= $this->db->get('cursounidad1');
		 return $cursounidad;
	}

 	function cursounidad( $id){
 		$cursounidad = $this->db->query('select * from cursounidad where idcursounidad="'. $id.'"');
 		return $cursounidad;
 	}
 	function lista_unidades( $id){
		$cursounidad = $this->db->query('select * from cursounidad1 where idcurso="'. $id.'"');
 		return $cursounidad;
 	}




 	function cursounidads( $id){
 		$cursounidad = $this->db->query('select * from cursounidad1 where idevento="'. $id.'"');
 		return $cursounidad;
 	}

 	function save($array)
 	{
		$this->db->insert("cursounidad", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idcursounidad',$id);
 		$this->db->update('cursounidad',$array_item);
	}
 



  public function delete($id)
	{
 		$this->db->where('idcursounidad',$id);
		$this->db->delete('cursounidad');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idcursounidad")->get('cursounidad');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idcursounidad")->get('cursounidad');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$cursounidad = $this->db->select("idcursounidad")->order_by("idcursounidad")->get('cursounidad')->result_array();
		$arr=array("idcursounidad"=>$id);
		$clave=array_search($arr,$cursounidad);
	   if(array_key_exists($clave+1,$cursounidad))
		 {

 		$cursounidad = $this->db->query('select * from cursounidad where idcursounidad="'. $cursounidad[$clave+1]["idcursounidad"].'"');
		 }else{

 		$cursounidad = $this->db->query('select * from cursounidad where idcursounidad="'. $id.'"');
		 }
		 	
 		return $cursounidad;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$cursounidad = $this->db->select("idcursounidad")->order_by("idcursounidad")->get('cursounidad')->result_array();
		$arr=array("idcursounidad"=>$id);
		$clave=array_search($arr,$cursounidad);
	   if(array_key_exists($clave-1,$cursounidad))
		 {

 		$cursounidad = $this->db->query('select * from cursounidad where idcursounidad="'. $cursounidad[$clave-1]["idcursounidad"].'"');
		 }else{

 		$cursounidad = $this->db->query('select * from cursounidad where idcursounidad="'. $id.'"');
		 }
		 	
 		return $cursounidad;
 	}














}
