<?php
class Carrito_model extends CI_model {

    // Obtiene todos los carritos
	function lista_carritos(){
		 $carrito = $this->db->get('carrito');
		 return $carrito;
	}

    // Obtiene los datos de un carrito por su ID
 	function carrito( $id){
 		$carrito = $this->db->query('select * from carrito where idcarrito="'. $id.'"');
 		return $carrito;
 	}

    // Guarda un nuevo registro de carrito
 	function save($array)
 	{
		$this->db->insert("carrito", $array);
        return $this->db->insert_id(); // Opcional: retorna el ID insertado
 	}

    // Actualiza un registro de carrito
 	function update($id,$array_item)
 	{
 		$this->db->where('idcarrito',$id);
 		$this->db->update('carrito',$array_item);
	}
 
    // Elimina un registro de carrito
 	public function delete($id)
	{
 		$this->db->where('idcarrito',$id);
		$this->db->delete('carrito');
    	if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}

    // Obtiene el primer registro
	function elprimero()
	{
		$query = $this->db->order_by("idcarrito", "asc")->get('carrito');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();
	}

    // Obtiene el último registro
	function elultimo()
	{
		$query = $this->db->order_by("idcarrito", "desc")->get('carrito');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();
	}

    // Obtiene el siguiente registro
 	function siguiente($id){
 		$carrito = $this->db->select("idcarrito")->order_by("idcarrito")->get('carrito')->result_array();
		$arr=array("idcarrito"=>$id);
		$clave=array_search($arr,$carrito);
	    if(array_key_exists($clave+1,$carrito))
		 {
 		    $carrito = $this->db->query('select * from carrito where idcarrito="'. $carrito[$clave+1]["idcarrito"].'"');
		 }else{
 		    $carrito = $this->db->query('select * from carrito where idcarrito="'. $id.'"');
		 }
 		return $carrito;
 	}

    // Obtiene el registro anterior
 	function anterior($id){
 		$carrito = $this->db->select("idcarrito")->order_by("idcarrito")->get('carrito')->result_array();
		$arr=array("idcarrito"=>$id);
		$clave=array_search($arr,$carrito);
	    if(array_key_exists($clave-1,$carrito))
		 {
 		    $carrito = $this->db->query('select * from carrito where idcarrito="'. $carrito[$clave-1]["idcarrito"].'"');
		 }else{
 		    $carrito = $this->db->query('select * from carrito where idcarrito="'. $id.'"');
		 }
 		return $carrito;
 	}

    // Listar carritos para tabla
    function lista_carritos1(){
        $query=$this->db->order_by("idcarrito","asc")->get('carrito');
        return $query;
    }

}
?>
