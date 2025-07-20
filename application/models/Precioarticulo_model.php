<?php
class Precioarticulo_model extends CI_model {

	function listar_precioarticulo(){
		 $precioarticulo= $this->db->get('precioarticulo');
		 return $precioarticulo;
	}

	function listar_precioarticulo1(){
		 $precioarticulo= $this->db->get('precioarticulo1');
		 return $precioarticulo;
	}

 	function precioarticulo( $id){
 		$precioarticulo = $this->db->query('select * from precioarticulo where idprecioarticulo="'. $id.'"');
 		return $precioarticulo;
 	}



 	function precioarticulos( $id){
 		$precioarticulo = $this->db->query('select * from precioarticulo where idarticulo="'. $id.'" order by fechadesde');
 		return $precioarticulo;
 	}


 	function precioarticulosA( $id){
 		$precioarticulo = $this->db->query('select * from precioarticulo1 where idarticulo="'. $id.'" ORDER BY date(fechadesde) ASC');
 		return $precioarticulo;
 	}



	function precioarticulo_activo($id){
 		$precioarticulo = $this->db->query('select * from precioarticulo where idevento='. $id.' and fecha in (select fecha from participacion p where  p.idevento='.$id.' and p.idtipoparticipacion=1) order by fecha');
 		return $precioarticulo;
 	}


	function precioarticulo_activo2($id){
 		$precioarticulo = $this->db->query('select * from precioarticulo where idevento='. $id.' and fecha in (select fecha from participacion p where  p.idevento='.$id.' and p.idtipoparticipacion!=1) order by fecha');
 		return $precioarticulo;
 	}





	function precioarticulo_asistencia($id){
 		$precioarticulo = $this->db->query('select * from precioarticulo where idevento='. $id.' and fecha in (select fecha from asistencia a where  a.idevento='.$id.') order by fecha');
 		return $precioarticulo;
 	}



	function precioarticulos_AsisPart($idevento,$idpersona){
		$precioarticulo =$this->db->query('select fev.idevento,fev.fecha,fev.temacorto,fev.tema,(select idtipoasistencia from asistencia asi where asi.fecha=fev.fecha and  asi.idpersona='.$idpersona.' limit 1  ) as asistencia, (select longitud from asistencia asi where asi.fecha=fev.fecha and  asi.idpersona='.$idpersona.' limit 1 ) as longitud,  (select latitud from asistencia asi where asi.fecha=fev.fecha and  asi.idpersona='.$idpersona.' limit 1 ) as latitud, (select porcentaje from participacion par where par.fecha=fev.fecha and par.idpersona='.$idpersona.' limit 1  ) as participacion, (select valor from pagoevento pev where pev.fecha=fev.fecha and pev.idpersona='.$idpersona.' limit 1) as pagos   from precioarticulo fev where fev.idevento='.$idevento.' order by fecha');

 		return $precioarticulo;
 	}









 	function save($array)
	{	
		$condition ="idarticulo="."'". $array['idarticulo']."' and  fechadesde=". "'".$array['fechadesde']."' and  horaprestamo=". "'".$array['horaprestamo']."'";
		$this->db->select('*');
		$this->db->from('precioarticulo');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if($query->num_rows()==0)
		{	
			$this->db->insert("precioarticulo", $array);
			if($this->db->affected_rows()>0)
			{
				return true;
			}else{
				return false;
			}
		}else{
			$this->db->where('fechadesde',$array['fechadesde']);
			$this->db->where('horaprestamo',$array['horaprestamo']);
			$this->db->where('idarticulo',$array['idarticulo']);
			$this->db->update('precioarticulo',$array);

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
 		$this->db->where('idprecioarticulo',$id);
 		$this->db->update('precioarticulo',$array_item);
	}
 



  public function delete($id)
	{
 		$this->db->where('idprecioarticulo',$id);
		$this->db->delete('precioarticulo');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idprecioarticulo")->get('precioarticulo');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idprecioarticulo")->get('precioarticulo');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$precioarticulo = $this->db->select("idprecioarticulo")->order_by("idprecioarticulo")->get('precioarticulo')->result_array();
		$arr=array("idprecioarticulo"=>$id);
		$clave=array_search($arr,$precioarticulo);
	   if(array_key_exists($clave+1,$precioarticulo))
		 {

 		$precioarticulo = $this->db->query('select * from precioarticulo where idprecioarticulo="'. $precioarticulo[$clave+1]["idprecioarticulo"].'"');
		 }else{

 		$precioarticulo = $this->db->query('select * from precioarticulo where idprecioarticulo="'. $id.'"');
		 }
		 	
 		return $precioarticulo;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$precioarticulo = $this->db->select("idprecioarticulo")->order_by("idprecioarticulo")->get('precioarticulo')->result_array();
		$arr=array("idprecioarticulo"=>$id);
		$clave=array_search($arr,$precioarticulo);
	   if(array_key_exists($clave-1,$precioarticulo))
		 {

 		$precioarticulo = $this->db->query('select * from precioarticulo where idprecioarticulo="'. $precioarticulo[$clave-1]["idprecioarticulo"].'"');
		 }else{

 		$precioarticulo = $this->db->query('select * from precioarticulo where idprecioarticulo="'. $id.'"');
		 }
		 	
 		return $precioarticulo;
 	}














}
