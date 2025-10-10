<?php
class Prestamoproducto_model extends CI_model {

	function listar_prestamoproducto(){
		 $prestamoproducto= $this->db->get('prestamoproducto');
		 return $prestamoproducto;
	}

	function listar_prestamoproducto1(){
		 $prestamoproducto= $this->db->get('prestamoproducto1');
		 return $prestamoproducto;
	}

 	function prestamoproducto( $id){
 		$prestamoproducto = $this->db->query('select * from prestamoproducto where idprestamoproducto="'. $id.'"');
 		return $prestamoproducto;
 	}



 	function prestamoproductos( $id){
 		$prestamoproducto = $this->db->query('select * from prestamoproducto where idarticulo="'. $id.'" order by fechaprestamo');
 		return $prestamoproducto;
 	}


 	function prestamoproductosA( $id){
 		$prestamoproducto = $this->db->query('select * from prestamoproducto1 where idarticulo="'. $id.'" ORDER BY date(fechaprestamo) ASC');
 		return $prestamoproducto;
 	}



	function prestamoproducto_activo($id){
 		$prestamoproducto = $this->db->query('select * from prestamoproducto where idevento='. $id.' and fecha in (select fecha from participacion p where  p.idevento='.$id.' and p.idtipoparticipacion=1) order by fecha');
 		return $prestamoproducto;
 	}


	function prestamoproducto_activo2($id){
 		$prestamoproducto = $this->db->query('select * from prestamoproducto where idevento='. $id.' and fecha in (select fecha from participacion p where  p.idevento='.$id.' and p.idtipoparticipacion!=1) order by fecha');
 		return $prestamoproducto;
 	}





	function prestamoproducto_asistencia($id){
 		$prestamoproducto = $this->db->query('select * from prestamoproducto where idevento='. $id.' and fecha in (select fecha from asistencia a where  a.idevento='.$id.') order by fecha');
 		return $prestamoproducto;
 	}



	function prestamoproductos_AsisPart($idevento,$idpersona){
		$prestamoproducto =$this->db->query('select fev.idevento,fev.fecha,fev.temacorto,fev.tema,(select idtipoasistencia from asistencia asi where asi.fecha=fev.fecha and  asi.idpersona='.$idpersona.' limit 1  ) as asistencia, (select longitud from asistencia asi where asi.fecha=fev.fecha and  asi.idpersona='.$idpersona.' limit 1 ) as longitud,  (select latitud from asistencia asi where asi.fecha=fev.fecha and  asi.idpersona='.$idpersona.' limit 1 ) as latitud, (select porcentaje from participacion par where par.fecha=fev.fecha and par.idpersona='.$idpersona.' limit 1  ) as participacion, (select valor from pagoevento pev where pev.fecha=fev.fecha and pev.idpersona='.$idpersona.' limit 1) as pagos   from prestamoproducto fev where fev.idevento='.$idevento.' order by fecha');

 		return $prestamoproducto;
 	}









 	function save($array)
	{	
		$condition ="idarticulo="."'". $array['idarticulo']."' and  fechaprestamo=". "'".$array['fechaprestamo']."' and  horaprestamo=". "'".$array['horaprestamo']."'";
		$this->db->select('*');
		$this->db->from('prestamoproducto');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if($query->num_rows()==0)
		{	
			$this->db->insert("prestamoproducto", $array);
			if($this->db->affected_rows()>0)
			{
				return true;
			}else{
				return false;
			}
		}else{
			$this->db->where('fechaprestamo',$array['fechaprestamo']);
			$this->db->where('horaprestamo',$array['horaprestamo']);
			$this->db->where('idarticulo',$array['idarticulo']);
			$this->db->update('prestamoproducto',$array);

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
 		$this->db->where('idprestamoproducto',$id);
 		$this->db->update('prestamoproducto',$array_item);
	}
 



  public function delete($id)
	{
 		$this->db->where('idprestamoproducto',$id);
		$this->db->delete('prestamoproducto');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idprestamoproducto")->get('prestamoproducto');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idprestamoproducto")->get('prestamoproducto');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$prestamoproducto = $this->db->select("idprestamoproducto")->order_by("idprestamoproducto")->get('prestamoproducto')->result_array();
		$arr=array("idprestamoproducto"=>$id);
		$clave=array_search($arr,$prestamoproducto);
	   if(array_key_exists($clave+1,$prestamoproducto))
		 {

 		$prestamoproducto = $this->db->query('select * from prestamoproducto where idprestamoproducto="'. $prestamoproducto[$clave+1]["idprestamoproducto"].'"');
		 }else{

 		$prestamoproducto = $this->db->query('select * from prestamoproducto where idprestamoproducto="'. $id.'"');
		 }
		 	
 		return $prestamoproducto;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$prestamoproducto = $this->db->select("idprestamoproducto")->order_by("idprestamoproducto")->get('prestamoproducto')->result_array();
		$arr=array("idprestamoproducto"=>$id);
		$clave=array_search($arr,$prestamoproducto);
	   if(array_key_exists($clave-1,$prestamoproducto))
		 {

 		$prestamoproducto = $this->db->query('select * from prestamoproducto where idprestamoproducto="'. $prestamoproducto[$clave-1]["idprestamoproducto"].'"');
		 }else{

 		$prestamoproducto = $this->db->query('select * from prestamoproducto where idprestamoproducto="'. $id.'"');
		 }
		 	
 		return $prestamoproducto;
 	}














}
