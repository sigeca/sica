<?php
class Tipogrupoparticipante_model extends CI_model {

	function lista_tipogrupoparticipantes(){
		 $tipogrupoparticipante= $this->db->get('tipogrupoparticipante0');
		 return $tipogrupoparticipante;
	}

	function lista_tipogrupoparticipantesA(){
		 $tipogrupoparticipante= $this->db->get('tipogrupoparticipante1');
		 return $tipogrupoparticipante;
	}




 	function tipogrupoparticipante( $id){
 		$tipogrupoparticipante = $this->db->query('select * from tipogrupoparticipante0 where idtipogrupoparticipante="'. $id.'"');
 		return $tipogrupoparticipante;
 	}

 	function save($array)
 	{
		$condition = "idtipogrupoparticipante =" . "'" . $array['idtipogrupoparticipante'] . "'";
		$this->db->select('*');
		$this->db->from('tipogrupoparticipante');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
		   $this->db->insert("tipogrupoparticipante", $array);
		   if( $this->db->affected_rows()>0){
			    return true;
		   }else{
			    return false;
		   }
	   }else{
		    return false;
		   }
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idtipogrupoparticipante',$id);
 		$this->db->update('tipogrupoparticipante',$array_item);
	}
 

 	 function delete($id)
	{
 		$this->db->where('idtipogrupoparticipante',$id);
		$this->db->delete('tipogrupoparticipante');
    	if($this->db->affected_rows()==1){
			$result=true;
        }else{
			$result=false;
    }
		return $result;
 	}



 	function quitar($id)
	{

        $this->db->select('*');
		$this->db->from('tipogrupoparticipante0');
 		$this->db->where('idtipogrupoparticipante',$id);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() != 0) {
	 	  	$this->db->where('idtipogrupoparticipante',$id);
			$this->db->update('tipogrupoparticipante', array('eliminado'=>1));
			$result=true;
        }else{
            $result=false;
        }
		return $result;
 	}






	function elprimero()
	{
		$query=$this->db->order_by("idtipogrupoparticipante")->get('tipogrupoparticipante');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idtipogrupoparticipante")->get('tipogrupoparticipante');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$tipogrupoparticipante = $this->db->select("idtipogrupoparticipante")->order_by("idtipogrupoparticipante")->get('tipogrupoparticipante')->result_array();
		$arr=array("idtipogrupoparticipante"=>$id);
		$clave=array_search($arr,$tipogrupoparticipante);
	   if(array_key_exists($clave+1,$tipogrupoparticipante))
		 {

 		$tipogrupoparticipante = $this->db->query('select * from tipogrupoparticipante where idtipogrupoparticipante="'. $tipogrupoparticipante[$clave+1]["idtipogrupoparticipante"].'"');
		 }else{

 		$tipogrupoparticipante = $this->db->query('select * from tipogrupoparticipante where idtipogrupoparticipante="'. $id.'"');
		 }
		 	
 		return $tipogrupoparticipante;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$tipogrupoparticipante = $this->db->select("idtipogrupoparticipante")->order_by("idtipogrupoparticipante")->get('tipogrupoparticipante')->result_array();
		$arr=array("idtipogrupoparticipante"=>$id);
		$clave=array_search($arr,$tipogrupoparticipante);
	   if(array_key_exists($clave-1,$tipogrupoparticipante))
		 {

 		$tipogrupoparticipante = $this->db->query('select * from tipogrupoparticipante where idtipogrupoparticipante="'. $tipogrupoparticipante[$clave-1]["idtipogrupoparticipante"].'"');
		 }else{

 		$tipogrupoparticipante = $this->db->query('select * from tipogrupoparticipante where idtipogrupoparticipante="'. $id.'"');
		 }
		 	
 		return $tipogrupoparticipante;
 	}








}
