<?php
class Precioproducto_model extends CI_model {

	function listar_precioproducto(){
		 $precioproducto= $this->db->get('precioproducto');
		 return $precioproducto;
	}

	function listar_precioproducto1(){
		 $precioproducto= $this->db->get('precioproducto1');
		 return $precioproducto;
	}

 	function precioproducto( $id){
 		$precioproducto = $this->db->query('select * from precioproducto where idprecioproducto="'. $id.'"');
 		return $precioproducto;
 	}



 	function precioproductos( $id){
 		$precioproducto = $this->db->query('select * from precioproducto where idarticulo="'. $id.'" order by fechadesde');
 		return $precioproducto;
 	}


 	function precioproductosA( $id){
 		$precioproducto = $this->db->query('select * from precioproducto1 where idarticulo="'. $id.'" ORDER BY date(fechadesde) ASC');
 		return $precioproducto;
 	}



	function precioproducto_activo($id){
 		$precioproducto = $this->db->query('select * from precioproducto where idevento='. $id.' and fecha in (select fecha from participacion p where  p.idevento='.$id.' and p.idtipoparticipacion=1) order by fecha');
 		return $precioproducto;
 	}


	function precioproducto_activo2($id){
 		$precioproducto = $this->db->query('select * from precioproducto where idevento='. $id.' and fecha in (select fecha from participacion p where  p.idevento='.$id.' and p.idtipoparticipacion!=1) order by fecha');
 		return $precioproducto;
 	}





	function precioproducto_asistencia($id){
 		$precioproducto = $this->db->query('select * from precioproducto where idevento='. $id.' and fecha in (select fecha from asistencia a where  a.idevento='.$id.') order by fecha');
 		return $precioproducto;
 	}



	function precioproductos_AsisPart($idevento,$idpersona){
		$precioproducto =$this->db->query('select fev.idevento,fev.fecha,fev.temacorto,fev.tema,(select idtipoasistencia from asistencia asi where asi.fecha=fev.fecha and  asi.idpersona='.$idpersona.' limit 1  ) as asistencia, (select longitud from asistencia asi where asi.fecha=fev.fecha and  asi.idpersona='.$idpersona.' limit 1 ) as longitud,  (select latitud from asistencia asi where asi.fecha=fev.fecha and  asi.idpersona='.$idpersona.' limit 1 ) as latitud, (select porcentaje from participacion par where par.fecha=fev.fecha and par.idpersona='.$idpersona.' limit 1  ) as participacion, (select valor from pagoevento pev where pev.fecha=fev.fecha and pev.idpersona='.$idpersona.' limit 1) as pagos   from precioproducto fev where fev.idevento='.$idevento.' order by fecha');

 		return $precioproducto;
 	}









 	function save($array)
	{	
		$condition ="idarticulo="."'". $array['idarticulo']."' and  fechadesde=". "'".$array['fechadesde']."'";
		$this->db->select('*');
		$this->db->from('precioproducto');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if($query->num_rows()==0)
		{	
			$this->db->insert("precioproducto", $array);
			if($this->db->affected_rows()>0)
			{
				return true;
			}else{
				return false;
			}
		}else{
			$this->db->where('fechadesde',$array['fechadesde']);
			$this->db->where('idarticulo',$array['idarticulo']);
			$this->db->update('precioproducto',$array);

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
 		$this->db->where('idprecioproducto',$id);
 		$this->db->update('precioproducto',$array_item);
	}
 



  public function delete($id)
	{
 		$this->db->where('idprecioproducto',$id);
		$this->db->delete('precioproducto');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idprecioproducto")->get('precioproducto');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idprecioproducto")->get('precioproducto');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$precioproducto = $this->db->select("idprecioproducto")->order_by("idprecioproducto")->get('precioproducto')->result_array();
		$arr=array("idprecioproducto"=>$id);
		$clave=array_search($arr,$precioproducto);
	   if(array_key_exists($clave+1,$precioproducto))
		 {

 		$precioproducto = $this->db->query('select * from precioproducto where idprecioproducto="'. $precioproducto[$clave+1]["idprecioproducto"].'"');
		 }else{

 		$precioproducto = $this->db->query('select * from precioproducto where idprecioproducto="'. $id.'"');
		 }
		 	
 		return $precioproducto;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$precioproducto = $this->db->select("idprecioproducto")->order_by("idprecioproducto")->get('precioproducto')->result_array();
		$arr=array("idprecioproducto"=>$id);
		$clave=array_search($arr,$precioproducto);
	   if(array_key_exists($clave-1,$precioproducto))
		 {

 		$precioproducto = $this->db->query('select * from precioproducto where idprecioproducto="'. $precioproducto[$clave-1]["idprecioproducto"].'"');
		 }else{

 		$precioproducto = $this->db->query('select * from precioproducto where idprecioproducto="'. $id.'"');
		 }
		 	
 		return $precioproducto;
 	}














}
