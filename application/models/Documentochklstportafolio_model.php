<?php
class Documentochklstportafolio_model extends CI_model {

	function listar_documentochklstportafolio(){
		 $documentochklstportafolio= $this->db->get('documentochklstportafolio');
		 return $documentochklstportafolio;
	}




	function listar_documentochklstportafolio1($versesiones){
		 $documentochklstportafolio= $this->db->get('documentochklstportafolio1');
		 return $documentochklstportafolio;
	}

 
	function documentochklstportafolioss( $idchklstportafolio){
 		$documentochklstportafolio = $this->db->query('select * from documentochklstportafolio where idchklstportafolio="'. $idchklstportafolio.'"');
 		return $documentochklstportafolio;
 	}


	function documentochklstportafolio( $id){
 		$documentochklstportafolio = $this->db->query('select * from documentochklstportafolio where iddocumentochklstportafolio="'. $id.'"');
 		return $documentochklstportafolio;
 	}

 	function lista_unidades( $id){
		$documentochklstportafolio = $this->db->query('select * from documentochklstportafolio1 where idchklstportafolio="'. $id.'"');
 		return $documentochklstportafolio;
 	}




 	function documentochklstportafolios( $id){
 		$documentochklstportafolio = $this->db->query('select * from documentochklstportafolio1 where idevento="'. $id.'"');
 		return $documentochklstportafolio;
 	}

 	function save($array)
 	{
		$this->db->insert("documentochklstportafolio", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('iddocumentochklstportafolio',$id);
 		$this->db->update('documentochklstportafolio',$array_item);
	}
 



  public function delete($id)
	{
 		$this->db->where('iddocumentochklstportafolio',$id);
		$this->db->delete('documentochklstportafolio');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("iddocumentochklstportafolio")->get('documentochklstportafolio');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("iddocumentochklstportafolio")->get('documentochklstportafolio');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$documentochklstportafolio = $this->db->select("iddocumentochklstportafolio")->order_by("iddocumentochklstportafolio")->get('documentochklstportafolio')->result_array();
		$arr=array("iddocumentochklstportafolio"=>$id);
		$clave=array_search($arr,$documentochklstportafolio);
	   if(array_key_exists($clave+1,$documentochklstportafolio))
		 {

 		$documentochklstportafolio = $this->db->query('select * from documentochklstportafolio where iddocumentochklstportafolio="'. $documentochklstportafolio[$clave+1]["iddocumentochklstportafolio"].'"');
		 }else{

 		$documentochklstportafolio = $this->db->query('select * from documentochklstportafolio where iddocumentochklstportafolio="'. $id.'"');
		 }
		 	
 		return $documentochklstportafolio;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$documentochklstportafolio = $this->db->select("iddocumentochklstportafolio")->order_by("iddocumentochklstportafolio")->get('documentochklstportafolio')->result_array();
		$arr=array("iddocumentochklstportafolio"=>$id);
		$clave=array_search($arr,$documentochklstportafolio);
	   if(array_key_exists($clave-1,$documentochklstportafolio))
		 {

 		$documentochklstportafolio = $this->db->query('select * from documentochklstportafolio where iddocumentochklstportafolio="'. $documentochklstportafolio[$clave-1]["iddocumentochklstportafolio"].'"');
		 }else{

 		$documentochklstportafolio = $this->db->query('select * from documentochklstportafolio where iddocumentochklstportafolio="'. $id.'"');
		 }
		 	
 		return $documentochklstportafolio;
 	}














}
