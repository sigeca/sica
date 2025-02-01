<?php
class Articuloreglamento_model extends CI_model {

	function lista_articuloreglamentos(){
		 $articuloreglamento= $this->db->get('articuloreglamento');
		 return $articuloreglamento;
	}


	function lista_articuloreglamentosA(){

        $this->db->order_by('idproceso', 'asc');
        $this->db->order_by('orden', 'asc');
        $query = $this->db->get('articuloreglamento1');
		 return $query;
	}




 	function articuloreglamento( $id){
 		$articuloreglamento = $this->db->query('select * from articuloreglamento where idarticuloreglamento="'. $id.'"');
 		return $articuloreglamento;
 	}

 	function articuloreglamentoA( $idreglamento){
 		$articuloreglamento = $this->db->query('select * from articuloreglamento1 where idreglamento="'. $idreglamento.'" order by idreglamento,numero');
 		return $articuloreglamento;
 	}




 	function save($array)
 	{
		$this->db->insert("articuloreglamento", $array);
		   if( $this->db->affected_rows()>0){
			    return true;
		   }else{
			    return false;
		   }

 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idarticuloreglamento',$id);
 		$this->db->update('articuloreglamento',$array_item);
	}


 	public function delete($id)
	{
 		$this->db->where('idarticuloreglamento',$id);
		$this->db->delete('articuloreglamento');
    if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idarticuloreglamento")->get('articuloreglamento');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idarticuloreglamento")->get('articuloreglamento');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$articuloreglamento = $this->db->select("idarticuloreglamento")->order_by("idarticuloreglamento")->get('articuloreglamento')->result_array();
		$arr=array("idarticuloreglamento"=>$id);
		$clave=array_search($arr,$articuloreglamento);
	   if(array_key_exists($clave+1,$articuloreglamento))
		 {

 		$articuloreglamento = $this->db->query('select * from articuloreglamento where idarticuloreglamento="'. $articuloreglamento[$clave+1]["idarticuloreglamento"].'"');
		 }else{

 		$articuloreglamento = $this->db->query('select * from articuloreglamento where idarticuloreglamento="'. $id.'"');
		 }
		 	
 		return $articuloreglamento;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$articuloreglamento = $this->db->select("idarticuloreglamento")->order_by("idarticuloreglamento")->get('articuloreglamento')->result_array();
		$arr=array("idarticuloreglamento"=>$id);
		$clave=array_search($arr,$articuloreglamento);
	   if(array_key_exists($clave-1,$articuloreglamento))
		 {

 		$articuloreglamento = $this->db->query('select * from articuloreglamento where idarticuloreglamento="'. $articuloreglamento[$clave-1]["idarticuloreglamento"].'"');
		 }else{

 		$articuloreglamento = $this->db->query('select * from articuloreglamento where idarticuloreglamento="'. $id.'"');
		 }
		 	
 		return $articuloreglamento;
 	}






 

}
