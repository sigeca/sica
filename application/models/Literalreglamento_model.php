<?php
class Literalreglamento_model extends CI_model {

	function lista_literalreglamentos(){
		 $literalreglamento= $this->db->get('literalreglamento');
		 return $literalreglamento;
	}


	function lista_literalreglamentosA(){

$this->db->order_by('idproceso', 'asc');
$this->db->order_by('orden', 'asc');

$query = $this->db->get('literalreglamento1');



		 return $query;
	}




 	function literalreglamento( $id){
 		$literalreglamento = $this->db->query('select * from literalreglamento where idliteralreglamento="'. $id.'"');
 		return $literalreglamento;
 	}

 	function literalreglamentoA( $idreglamento){
 		$literalreglamento = $this->db->query('select * from literalreglamento1 where idreglamento="'. $idreglamento.'" order by idreglamento,numero');
 		return $literalreglamento;
 	}




 	function save($array)
 	{
		$this->db->insert("literalreglamento", $array);
		   if( $this->db->affected_rows()>0){
			    return true;
		   }else{
			    return false;
		   }

 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idliteralreglamento',$id);
 		$this->db->update('literalreglamento',$array_item);
	}


 	public function delete($id)
	{
 		$this->db->where('idliteralreglamento',$id);
		$this->db->delete('literalreglamento');
    if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idliteralreglamento")->get('literalreglamento');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idliteralreglamento")->get('literalreglamento');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$literalreglamento = $this->db->select("idliteralreglamento")->order_by("idliteralreglamento")->get('literalreglamento')->result_array();
		$arr=array("idliteralreglamento"=>$id);
		$clave=array_search($arr,$literalreglamento);
	   if(array_key_exists($clave+1,$literalreglamento))
		 {

 		$literalreglamento = $this->db->query('select * from literalreglamento where idliteralreglamento="'. $literalreglamento[$clave+1]["idliteralreglamento"].'"');
		 }else{

 		$literalreglamento = $this->db->query('select * from literalreglamento where idliteralreglamento="'. $id.'"');
		 }
		 	
 		return $literalreglamento;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$literalreglamento = $this->db->select("idliteralreglamento")->order_by("idliteralreglamento")->get('literalreglamento')->result_array();
		$arr=array("idliteralreglamento"=>$id);
		$clave=array_search($arr,$literalreglamento);
	   if(array_key_exists($clave-1,$literalreglamento))
		 {

 		$literalreglamento = $this->db->query('select * from literalreglamento where idliteralreglamento="'. $literalreglamento[$clave-1]["idliteralreglamento"].'"');
		 }else{

 		$literalreglamento = $this->db->query('select * from literalreglamento where idliteralreglamento="'. $id.'"');
		 }
		 	
 		return $literalreglamento;
 	}






 

}
