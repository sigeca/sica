<?php
class Carritoproducto_model extends CI_model {

	function listar_carritoproducto(){
		 $carritoproducto= $this->db->get('carritoproducto');
		 return $carritoproducto;
	}

	function listar_carritoproducto1(){
		 $carritoproducto= $this->db->get('carritoproducto1');
		 return $carritoproducto;
	}

 	function carritoproducto( $id){
 		$carritoproducto = $this->db->query('select * from carritoproducto where idcarritoproducto="'. $id.'"');
 		return $carritoproducto;
 	}



 	function carritoproductos( $id){
 		$carritoproducto = $this->db->query('select * from carritoproducto1 where idcarrito="'. $id.'" ');
 		return $carritoproducto;
 	}


 	function carritoproductosA( $id){
 		$carritoproducto = $this->db->query('select * from carritoproducto1 where idcarrito="'. $id.'" ORDER BY date(idcarritoproducto) ASC');
 		return $carritoproducto;
 	}



	function carritoproducto_activo($id){
 		$carritoproducto = $this->db->query('select * from carritoproducto where idevento='. $id.' and fecha in (select fecha from participacion p where  p.idevento='.$id.' and p.idtipoparticipacion=1) order by fecha');
 		return $carritoproducto;
 	}


	function carritoproducto_activo2($id){
 		$carritoproducto = $this->db->query('select * from carritoproducto where idevento='. $id.' and fecha in (select fecha from participacion p where  p.idevento='.$id.' and p.idtipoparticipacion!=1) order by fecha');
 		return $carritoproducto;
 	}





	function carritoproducto_asistencia($id){
 		$carritoproducto = $this->db->query('select * from carritoproducto where idevento='. $id.' and fecha in (select fecha from asistencia a where  a.idevento='.$id.') order by fecha');
 		return $carritoproducto;
 	}



	function carritoproductos_AsisPart($idevento,$idpersona){
		$carritoproducto =$this->db->query('select fev.idevento,fev.fecha,fev.temacorto,fev.tema,(select idtipoasistencia from asistencia asi where asi.fecha=fev.fecha and  asi.idpersona='.$idpersona.' limit 1  ) as asistencia, (select longitud from asistencia asi where asi.fecha=fev.fecha and  asi.idpersona='.$idpersona.' limit 1 ) as longitud,  (select latitud from asistencia asi where asi.fecha=fev.fecha and  asi.idpersona='.$idpersona.' limit 1 ) as latitud, (select porcentaje from participacion par where par.fecha=fev.fecha and par.idpersona='.$idpersona.' limit 1  ) as participacion, (select valor from pagoevento pev where pev.fecha=fev.fecha and pev.idpersona='.$idpersona.' limit 1) as pagos   from carritoproducto fev where fev.idevento='.$idevento.' order by fecha');

 		return $carritoproducto;
 	}









 	function save($array)
	{	
		$condition ="idproducto="."'". $array['idproducto']."' and  idcarrito=". "'".$array['idcarrito']."'";
		$this->db->select('*');
		$this->db->from('carritoproducto');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if($query->num_rows()==0)
		{	
			$this->db->insert("carritoproducto", $array);
			if($this->db->affected_rows()>0)
			{
				return true;
			}else{
				return false;
			}
		}else{
			$this->db->where('idcarrito',$array['idcarrito']);
			$this->db->where('idproducto',$array['idproducto']);
			$this->db->update('carritoproducto',$array);

			if($this->db->affected_rows()>0)
			{
				return true;
			}else{
				return false;
			}
		}
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idcarritoproducto',$id);
 		$this->db->update('carritoproducto',$array_item);
	}
 



  public function delete($id)
	{
 		$this->db->where('idcarritoproducto',$id);
		$this->db->delete('carritoproducto');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idcarritoproducto")->get('carritoproducto');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idcarritoproducto")->get('carritoproducto');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$carritoproducto = $this->db->select("idcarritoproducto")->order_by("idcarritoproducto")->get('carritoproducto')->result_array();
		$arr=array("idcarritoproducto"=>$id);
		$clave=array_search($arr,$carritoproducto);
	   if(array_key_exists($clave+1,$carritoproducto))
		 {

 		$carritoproducto = $this->db->query('select * from carritoproducto where idcarritoproducto="'. $carritoproducto[$clave+1]["idcarritoproducto"].'"');
		 }else{

 		$carritoproducto = $this->db->query('select * from carritoproducto where idcarritoproducto="'. $id.'"');
		 }
		 	
 		return $carritoproducto;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$carritoproducto = $this->db->select("idcarritoproducto")->order_by("idcarritoproducto")->get('carritoproducto')->result_array();
		$arr=array("idcarritoproducto"=>$id);
		$clave=array_search($arr,$carritoproducto);
	   if(array_key_exists($clave-1,$carritoproducto))
		 {

 		$carritoproducto = $this->db->query('select * from carritoproducto where idcarritoproducto="'. $carritoproducto[$clave-1]["idcarritoproducto"].'"');
		 }else{

 		$carritoproducto = $this->db->query('select * from carritoproducto where idcarritoproducto="'. $id.'"');
		 }
		 	
 		return $carritoproducto;
 	}














}
