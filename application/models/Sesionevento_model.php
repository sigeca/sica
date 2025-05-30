<?php
class Sesionevento_model extends CI_model {

	function listar_sesionevento(){
		 $sesionevento= $this->db->get('sesionevento0');
		 return $sesionevento;
	}

	function listar_sesionevento1(){
		 $sesionevento= $this->db->get('sesionevento1');
		 return $sesionevento;
	}

 	function sesionevento( $id){
 		$sesionevento = $this->db->query('select * from sesionevento0 where idsesionevento="'. $id.'"');
 		return $sesionevento;
 	}



 	function sesioneventos( $id){
 		$sesionevento = $this->db->query('select * from sesionevento0 where idevento="'. $id.'" order by fecha');
 		return $sesionevento;
 	}



 	function get_sesionevento_flutter($idevento)
 	{
		 if($idevento>0)
                {
		        $this->db->order_by("fecha asc");
                $this->db->where('idevento='.$idevento);
                $query = $this->db->get('sesionevento1'); // Suponiendo que la tabla se llama 'documentos'
        return $query->result_array(); // Devolver array de documentos
         }else{

        return 0;

         }




	}
 



 	function sesioneventos1( $id){
 		$sesionevento = $this->db->query('select * from sesionevento1 where idevento="'. $id.'" order by fecha');
 		return $sesionevento;
 	}


 	function sesioneventosA( $id){
		$condition="idevento=".$id;
		$this->db->where($condition);
		$sesionevento =$this->db->order_by("fecha",'asc')->get('sesionevento1');
 		return $sesionevento;
 	}



 	function sesioneventosB( $id){
		$condition="idevento=".$id;
		$this->db->where($condition);
		$sesionevento =$this->db->order_by("fecha",'asc')->get('sesionevento2');
 		return $sesionevento;
 	}




	function sesionevento_activo($id){
 		//$sesionevento = $this->db->query('select * from sesionevento where idevento='. $id.' and idmodoevaluacion>1 and fecha in (select fecha from participacion p where  p.idevento='.$id.' and p.idtipoparticipacion=1) order by fecha');
 		$sesionevento = $this->db->query('select * from sesionevento1 where idevento='. $id.' and idmodoevaluacion>1 and fecha in (select fecha from participacion p where  p.idevento='.$id.') order by fecha');
 		return $sesionevento;
 	}


	function sesionevento_activo2($id){
 		$sesionevento = $this->db->query('select * from sesionevento0 where idevento='. $id.' and fecha in (select fecha from participacion p where  p.idevento='.$id.' ) order by fecha');
 		return $sesionevento;
 	}





	function sesionevento_asistencia($id){
 		$sesionevento = $this->db->query('select * from sesionevento1 where idevento='. $id.' and fecha in (select fecha from asistencia a where  a.idevento='.$id.') order by fecha');
 		return $sesionevento;
 	}



	function sesioneventos_AsisPart($idevento,$idpersona){
		$sesionevento =$this->db->query('select fev.idevento,fev.fecha,fev.temacorto,fev.tema,(select idtipoasistencia from asistencia asi where asi.fecha=fev.fecha and  asi.idpersona='.$idpersona.' limit 1  ) as asistencia, (select longitud from asistencia asi where asi.fecha=fev.fecha and asi.idevento=fev.idevento and  asi.idpersona='.$idpersona.' limit 1 ) as longitud,  (select latitud from asistencia asi where asi.fecha=fev.fecha and  asi.idevento=fev.idevento and  asi.idpersona='.$idpersona.' limit 1 ) as latitud, (select porcentaje from participacion par where par.fecha=fev.fecha and  par.idevento=fev.idevento and par.idpersona='.$idpersona.' limit 1  ) as participacion, (select valor from pagoevento pev where pev.fecha=fev.fecha and  pev.idevento=fev.idevento and pev.idpersona='.$idpersona.' limit 1) as pagos   from sesionevento0 fev where fev.idevento='.$idevento.' order by fecha');

 		return $sesionevento;
 	}



	function sesionevento_sesiones($idevento){
        $sesiones=$this->db->query('select * from sesionevento0 where idevento='.$idevento.' order by fecha asc;');

	return $sesiones;
}





 	function save($array)
	{	
   		date_default_timezone_set('America/Guayaquil');
    		$fecha = date("Y-m-d");
    		$hora= date("H:i:s");

    // Verifica si ya existe una sesión con el mismo idevento y fecha
		$condition ="idevento="."'". $array['idevento']."' and  fecha=". "'".$array['fecha']."'";
		$this->db->select('*');
		$this->db->from('sesionevento0');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if($query->num_rows()==0)
		{	
			$this->db->insert("sesionevento", $array);
			if($this->db->affected_rows()>0)
			{
			$idsesionevento=$this->db->insert_id();
            $this->db->insert("vitacora", array(
                "idusuario"=>$this->session->userdata['logged_in']['idusuario'],
                "fecha"=>$fecha,
                "hora"=>$hora,
                "tabla"=>"sesionevento",
                "accion"=>"se creo una nueva sesion de evento con id=".$idsesionevento,
                "url"=>$_SERVER['REQUEST_URI']));
				return true;
			}else{
				return false;
			}
		}else{
            // Ya existe se actualiza la sessión
			$this->db->where('fecha',$array['fecha']);
			$this->db->where('idevento',$array['idevento']);
			$this->db->update('sesionevento',$array);

			if($this->db->affected_rows()>0)
			{
            //Registro en vitacora
                $this->db->insert("vitacora", array(
                    "idusuario"=>$this->session->userdata['logged_in']['idusuario'],
                    "fecha"=>$fecha,
                    "hora"=>$hora,
                    "tabla"=>"sesionevento",
                    "accion"=>"se modifico la sesion evento con id=".$array['idsesionevento'],
                    "url"=>$_SERVER['REQUEST_URI']));

				return true;
			}else{
				return false;
			}
		}
 	}

function update($id, $array_item)
{
    date_default_timezone_set('America/Guayaquil');
    // Las variables $fecha y $hora no se usan en la operación de actualización aquí,
    // asegúrate de que $array_item ya incluya estos campos si son necesarios para la DB.

    $this->db->where('idsesionevento', $id);
    $this->db->update('sesionevento', $array_item);

    // Verificar si la actualización fue exitosa y si se afectó alguna fila
    if ($this->db->affected_rows() > 0) {
        $this->registrar_vitacora("sesionevento", "Se modificó la sesión de evento con id = $id");
        return [
            'success' => true,
            'message' => "La sesión de evento con ID $id fue actualizada exitosamente."
        ];
    } else {
        // Si affected_rows() es 0, puede ser que el registro no exista o los datos sean los mismos.
        // Si hay un error de base de datos, lo capturamos.
        $db_error = $this->db->error(); // Obtiene el último error de la base de datos

        if ($db_error['code'] != 0) {
            // Hubo un error real de la base de datos
            // Opcional: registrar el error en un archivo de log (ver Opción 2)
            // log_message('error', 'Error al actualizar sesionevento ID ' . $id . ': ' . $db_error['message']);
            return [
                'success' => false,
                'message' => "Error en la base de datos al actualizar la sesión de evento: " . $db_error['message'],
                'error_code' => $db_error['code']
            ];
        } else {
            // No se afectaron filas, pero no hubo un error de DB (e.g., ID no existe o datos idénticos)
            return [
                'success' => false,
                'message' => "No se realizó ninguna actualización para la sesión de evento con ID $id. El registro no existe o los datos son idénticos a los actuales."
            ];
        }
    }
}




  public function delete($id)
	{
 		$this->db->where('idsesionevento',$id);
		$this->db->delete('sesionevento');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}





  public function quitar($idsesionevento)
	{
		$this->db->trans_start();
		$condition = "idsesionevento =" . $idsesionevento ;
		$this->db->select('*');
		$this->db->from('sesionevento0');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() != 0) {
	 		  	$this->db->where('idsesionevento',$idsesionevento);
				$this->db->update('sesionevento', array('eliminado'=>1));
           				 $this->db->trans_complete();
			      		$result=true;
      	}else{	

            $this->db->trans_complete();
			      $result=false;
   	}

	return $result;
 	}


private function registrar_vitacora($tabla, $accion)
{
    $fecha = date("Y-m-d");
    $hora  = date("H:i:s");

    $this->db->insert("vitacora", array(
        "idusuario" => $this->session->userdata['logged_in']['idusuario'],
        "fecha"     => $fecha,
        "hora"      => $hora,
        "tabla"     => $tabla,
        "accion"    => $accion,
        "url"       => $_SERVER['REQUEST_URI']
    ));
}






	function elprimero()
	{
		$query=$this->db->order_by("idsesionevento")->get('sesionevento0');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idsesionevento")->get('sesionevento0');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$sesionevento = $this->db->select("idsesionevento")->order_by("idsesionevento")->get('sesionevento0')->result_array();
		$arr=array("idsesionevento"=>$id);
		$clave=array_search($arr,$sesionevento);
	   if(array_key_exists($clave+1,$sesionevento))
		 {

 		$sesionevento = $this->db->query('select * from sesionevento0 where idsesionevento="'. $sesionevento[$clave+1]["idsesionevento"].'"');
		 }else{

 		$sesionevento = $this->db->query('select * from sesionevento0 where idsesionevento="'. $id.'"');
		 }
		 	
 		return $sesionevento;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$sesionevento = $this->db->select("idsesionevento")->order_by("idsesionevento")->get('sesionevento0')->result_array();
		$arr=array("idsesionevento"=>$id);
		$clave=array_search($arr,$sesionevento);
	   if(array_key_exists($clave-1,$sesionevento))
		 {

 		$sesionevento = $this->db->query('select * from sesionevento0 where idsesionevento="'. $sesionevento[$clave-1]["idsesionevento"].'"');
		 }else{

 		$sesionevento = $this->db->query('select * from sesionevento0 where idsesionevento="'. $id.'"');
		 }
		 	
 		return $sesionevento;
 	}














}
