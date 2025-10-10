<?php
class Ubicacionproducto_model extends CI_model {

	function listar_ubicacionproducto(){
		 $ubicacionproducto= $this->db->get('ubicacionproducto');
		 return $ubicacionproducto;
	}

	function listar_ubicacionproducto1(){
		 $ubicacionproducto= $this->db->get('ubicacionproducto1');
		 return $ubicacionproducto;
	}

 	function ubicacionproducto( $id){
 		$ubicacionproducto = $this->db->query('select * from ubicacionproducto where idubicacionproducto="'. $id.'"');
 		return $ubicacionproducto;
 	}



 	function ubicacionproductos( $id){
 		$ubicacionproducto = $this->db->query('select * from ubicacionproducto where idarticulo="'. $id.'" order by fecha');
 		return $ubicacionproducto;
 	}


 	function ubicacionproductosA( $id){
 		$ubicacionproducto = $this->db->query('select * from ubicacionproducto1 where idarticulo="'. $id.'" ORDER BY date(fecha) ASC');
 		return $ubicacionproducto;
 	}



	function ubicacionproducto_activo($id){
 		$ubicacionproducto = $this->db->query('select * from ubicacionproducto where idevento='. $id.' and fecha in (select fecha from participacion p where  p.idevento='.$id.' and p.idtipoparticipacion=1) order by fecha');
 		return $ubicacionproducto;
 	}


	function ubicacionproducto_activo2($id){
 		$ubicacionproducto = $this->db->query('select * from ubicacionproducto where idevento='. $id.' and fecha in (select fecha from participacion p where  p.idevento='.$id.' and p.idtipoparticipacion!=1) order by fecha');
 		return $ubicacionproducto;
 	}





	function ubicacionproducto_asistencia($id){
 		$ubicacionproducto = $this->db->query('select * from ubicacionproducto where idevento='. $id.' and fecha in (select fecha from asistencia a where  a.idevento='.$id.') order by fecha');
 		return $ubicacionproducto;
 	}



	function ubicacionproductos_AsisPart($idevento,$idpersona){
		$ubicacionproducto =$this->db->query('select fev.idevento,fev.fecha,fev.temacorto,fev.tema,(select idtipoasistencia from asistencia asi where asi.fecha=fev.fecha and  asi.idpersona='.$idpersona.' limit 1  ) as asistencia, (select longitud from asistencia asi where asi.fecha=fev.fecha and  asi.idpersona='.$idpersona.' limit 1 ) as longitud,  (select latitud from asistencia asi where asi.fecha=fev.fecha and  asi.idpersona='.$idpersona.' limit 1 ) as latitud, (select porcentaje from participacion par where par.fecha=fev.fecha and par.idpersona='.$idpersona.' limit 1  ) as participacion, (select valor from pagoevento pev where pev.fecha=fev.fecha and pev.idpersona='.$idpersona.' limit 1) as pagos   from ubicacionproducto fev where fev.idevento='.$idevento.' order by fecha');

 		return $ubicacionproducto;
 	}









 	function save($array)
	{	
		$condition ="idarticulo="."'". $array['idarticulo']."' and  fecha=". "'".$array['fecha']."'";
		$this->db->select('*');
		$this->db->from('ubicacionproducto');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if($query->num_rows()==0)
		{	
			$this->db->insert("ubicacionproducto", $array);
			if($this->db->affected_rows()>0)
			{
				return true;
			}else{
				return false;
			}
		}else{
			$this->db->where('fecha',$array['fecha']);
			$this->db->where('idarticulo',$array['idarticulo']);
			$this->db->update('ubicacionproducto',$array);

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
 		$this->db->where('idubicacionproducto',$id);
 		$this->db->update('ubicacionproducto',$array_item);
	}
 



  public function delete($id)
	{
 		$this->db->where('idubicacionproducto',$id);
		$this->db->delete('ubicacionproducto');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idubicacionproducto")->get('ubicacionproducto');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idubicacionproducto")->get('ubicacionproducto');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$ubicacionproducto = $this->db->select("idubicacionproducto")->order_by("idubicacionproducto")->get('ubicacionproducto')->result_array();
		$arr=array("idubicacionproducto"=>$id);
		$clave=array_search($arr,$ubicacionproducto);
	   if(array_key_exists($clave+1,$ubicacionproducto))
		 {

 		$ubicacionproducto = $this->db->query('select * from ubicacionproducto where idubicacionproducto="'. $ubicacionproducto[$clave+1]["idubicacionproducto"].'"');
		 }else{

 		$ubicacionproducto = $this->db->query('select * from ubicacionproducto where idubicacionproducto="'. $id.'"');
		 }
		 	
 		return $ubicacionproducto;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$ubicacionproducto = $this->db->select("idubicacionproducto")->order_by("idubicacionproducto")->get('ubicacionproducto')->result_array();
		$arr=array("idubicacionproducto"=>$id);
		$clave=array_search($arr,$ubicacionproducto);
	   if(array_key_exists($clave-1,$ubicacionproducto))
		 {

 		$ubicacionproducto = $this->db->query('select * from ubicacionproducto where idubicacionproducto="'. $ubicacionproducto[$clave-1]["idubicacionproducto"].'"');
		 }else{

 		$ubicacionproducto = $this->db->query('select * from ubicacionproducto where idubicacionproducto="'. $id.'"');
		 }
		 	
 		return $ubicacionproducto;
 	}














}
