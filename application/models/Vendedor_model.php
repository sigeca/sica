<?php
class Vendedor_model extends CI_model {

	function lista_vendedors(){
		 $vendedor= $this->db->get('vendedor1');
		 return $vendedor;
	}


	function lista_vendedorsA($idvendedor){
		if($idvendedor>0){
		$this->db->where('idvendedor',$idvendedor);
		}

		 $this->db->order_by("elvendedor","asc");
		 $vendedor= $this->db->get('vendedor1');
		 return $vendedor;
	}

	function lista_vendedorsB(){
		 $this->db->order_by("elvendedor","asc");
		 $vendedor= $this->db->get('vendedor2');
		 return $vendedor;
	}


 	function vendedor( $id){
 		$vendedor = $this->db->query('select * from vendedor1 where idvendedor="'. $id.'"');
 		return $vendedor;
 	}


 	function vendedor1( $id){
 		$vendedor = $this->db->query('select * from vendedor1 where idvendedor="'. $id.'"');
 		return $vendedor;
 	}



 	function vendedorspersona( $id){
 		$vendedor = $this->db->query('select * from vendedor0 where idpersona="'. $id.'"');
 		return $vendedor;
 	}



 	function esvendedor( $id){
 		$query = $this->db->query('select * from vendedor0 where idpersona="'. $id.'"');
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
		$this->db->from('vendedor0');
		$this->db->where($condition1);
		$this->db->where($condition2);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
			$this->db->insert("vendedor", $array);
			return true;
		   }else{
			return false;
		   }




 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idvendedor',$id);
 		$this->db->update('vendedor0',$array_item);
	}
 


 	public function delete($idvendedor)
	{

		$condition = "idvendedor =" . $idvendedor ;
		$this->db->select('*');
		$this->db->from('vendedor');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() != 0) {
	 		  	$this->db->where('idvendedor',$idp);
				$this->db->update('vendedor', array('eliminado'=>1));
			$result=true;
		}else{
			$result=false;
		}
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idvendedor")->get('vendedor1');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idvendedor")->get('vendedor1');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$vendedor = $this->db->select("idvendedor")->order_by("idvendedor")->get('vendedor1')->result_array();
		$arr=array("idvendedor"=>$id);
		$clave=array_search($arr,$vendedor);
	   if(array_key_exists($clave+1,$vendedor))
		 {

 		$vendedor = $this->db->query('select * from vendedor1 where idvendedor="'. $vendedor[$clave+1]["idvendedor"].'"');
		 }else{

 		$vendedor = $this->db->query('select * from vendedor1 where idvendedor="'. $id.'"');
		 }
		 	
 		return $vendedor;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$vendedor = $this->db->select("idvendedor")->order_by("idvendedor")->get('vendedor1')->result_array();
		$arr=array("idvendedor"=>$id);
		$clave=array_search($arr,$vendedor);
	   if(array_key_exists($clave-1,$vendedor))
		 {

 		$vendedor = $this->db->query('select * from vendedor1 where idvendedor="'. $vendedor[$clave-1]["idvendedor"].'"');
		 }else{

 		$vendedor = $this->db->query('select * from vendedor1 where idvendedor="'. $id.'"');
		 }
		 	
 		return $vendedor;
 	}






}
