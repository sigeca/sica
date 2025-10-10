<?php
class Producto_model extends CI_model {

	function lista_productos(){
		 $producto= $this->db->get('producto');
		 return $producto;
	}


	function lista_productosA(){
		 $producto= $this->db->get('producto1');
		 return $producto;
	}




 	function producto( $id){
 		$producto = $this->db->query('select * from producto where idproducto="'. $id.'"');
 		return $producto;
 	}

 	function productoA( $id){
 		$producto = $this->db->query('select * from producto1 where idinstitucion="'. $id.'"');
 		return $producto;
 	}

 	function productopers( $id){
 		$producto = $this->db->query('select * from producto1 where idpersona="'. $id.'"');
 		return $producto;
 	}




 	function save($array)
 	{
		$this->db->insert("producto", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idproducto',$id);
 		$this->db->update('producto',$array_item);
	}


 	public function delete($id)
	{
 		$this->db->where('idproducto',$id);
		$this->db->delete('producto');
    if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idproducto")->get('producto');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idproducto")->get('producto');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$producto = $this->db->select("idproducto")->order_by("idproducto")->get('producto')->result_array();
		$arr=array("idproducto"=>$id);
		$clave=array_search($arr,$producto);
	   if(array_key_exists($clave+1,$producto))
		 {

 		$producto = $this->db->query('select * from producto where idproducto="'. $producto[$clave+1]["idproducto"].'"');
		 }else{

 		$producto = $this->db->query('select * from producto where idproducto="'. $id.'"');
		 }
		 	
 		return $producto;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$producto = $this->db->select("idproducto")->order_by("idproducto")->get('producto')->result_array();
		$arr=array("idproducto"=>$id);
		$clave=array_search($arr,$producto);
	   if(array_key_exists($clave-1,$producto))
		 {

 		$producto = $this->db->query('select * from producto where idproducto="'. $producto[$clave-1]["idproducto"].'"');
		 }else{

 		$producto = $this->db->query('select * from producto where idproducto="'. $id.'"');
		 }
		 	
 		return $producto;
 	}






 

}
