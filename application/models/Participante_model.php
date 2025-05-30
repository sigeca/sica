<?php
class Participante_model extends CI_model {

	function participacionx($idevento,$idpersona){
 		$this->db->where('idevento',$idevento);
 		$this->db->where('idpersona',$idpersona);
		 $participacion= $this->db->get('participacion');
		 return $participacion;
	}


	function participantep($idpersona){
 		$this->db->where('idpersona',$idpersona);
		 $participacion= $this->db->get('participante');
		 return $participacion;
	}

 	function esinstructor( $id,$idevento){
		if($id==8)  //Si es STALIN FRANCIS
		{
			return true;  
		}

 		$query = $this->db->query('select * from participante where idevento="'.$idevento.'" and  idpersona="'. $id.'" and idnivelparticipante=2');
		if ($query->num_rows() == 0) //SI NO ES UN INSTRUCTOR DE LA CLASES. 
		{
			return false;
		   }else{
			return true;
		   }
 	}






	function listar_participante(){
		 $participante= $this->db->get('participante');
		 return $participante;
	}

	function listar_participante1(){
		 $participante= $this->db->get('participante1');
		 return $participante;
	}


	function listar_participante3($idevento){
		 if($idevento>0)
                {
                $this->db->where('idevento='.$idevento);
                }

		 $participante= $this->db->get('participante3');
		 return $participante;
	}


	function get_participante3($idevento){
		 if($idevento>0)
                {
		        $this->db->order_by("nombres asc");;
                $this->db->where('idevento='.$idevento);
                $query = $this->db->get('participante1'); // Suponiendo que la tabla se llama 'documentos'
        return $query->result_array(); // Devolver array de documentos
         }else{

        return 0;

         }


	}








	function listar_participanteB($idevento){
		 if($idevento>0)
                {
                $this->db->where('idevento='.$idevento);
                }

		 $participante= $this->db->get('participante1');
		 return $participante;
	}



	function instructor($idevento){
		 if($idevento>0)
                {
                $this->db->where('idevento='.$idevento);
                $this->db->where('idnivelparticipante=2'); // 2= instructor
                }

		 $participante= $this->db->get('participante1');
		 return $participante;
	}






 	function participante( $id){
 		$participante = $this->db->query('select * from participante where idparticipante="'. $id.'"');
 		return $participante;
 	}

 	function participante3( $id){
 		$participante = $this->db->query('select * from participante3 where idparticipante="'. $id.'"');
 		return $participante;
 	}




 	function participantes( $id){
 		$participante = $this->db->query('select * from participante1 where idevento="'. $id.'"  order by grupoletra,nombres asc');
 		return $participante;
 	}

	function noparticipantes( $id){
 		$participante = $this->db->query('select * from participante2 where idevento="'. $id.'" and eliminado=1 order by nombres asc');
 		return $participante;
 	}




	function asistencias($idevento,$fecha)
	{

      $sql="";
      $sql=$sql.'select p1.*, (select ta.nombre from asistencia p2,tipoasistencia ta where p2.idtipoasistencia=ta.idtipoasistencia and p2.idpersona=p1.idpersona and p2.fecha="'.$fecha.'"  and p2.idevento='.$idevento. ') as eltipoasistencia from participante1 p1 where p1.idevento='.$idevento.' and p1.idpersona in (select p2.idpersona from asistencia p2 where p2.idevento=p1.idevento and p2.fecha="'.$fecha.'"  and p2.idevento='.$idevento.')';
$sql=$sql." union "; 
    $sql=$sql.'select p1.*, " " as eltipoasistencia from participante1 p1 where idevento='.$idevento.' and p1.idpersona not in (select p2.idpersona from asistencia p2 where p2.idevento=p1.idevento and p2.fecha="'.$fecha.'" and p2.idevento='.$idevento.') order by nombres ;';
   $query= $this->db->query($sql);



	return $query;

	}






 	function participantes1( $id){

   date_default_timezone_set('America/Guayaquil');
    $fecha = date("Y-m-d");
$participante=$this->db->query('select pa.idparticipante,pa.idnivelparticipante,pa.idpersona,ev.idevento,ev.titulo as elevento,concat(pe.apellidos," ",pe.nombres) as nombres,doc.archivopdf,pa.grupoletra,(select idtipoasistencia from asistencia asis where asis.fecha="'.$fecha.'" and asis.idpersona= pa.idpersona) as hoy    from participante pa,evento ev,persona pe,documento doc where pa.idpersona=pe.idpersona and pa.idevento=ev.idevento and pa.iddocumento=doc.iddocumento UNION  select pa.idparticipante,pa.idnivelparticipante,pa.idpersona,ev.idevento,ev.titulo as elevento,concat(pe.apellidos," ",pe.nombres) as nombres," " as archivopdf,pa.grupoletra ,(select idtipoasistencia from asistencia asis where asis.fecha="'.$fecha.'" and asis.idpersona= pa.idpersona) as hoy  from participante pa,evento ev,persona pe,documento doc where pa.idpersona=pe.idpersona and pa.idevento=ev.idevento and pa.idevento=ev.idevento and  pa.iddocumento=0;');

return $participante;
}







 	function save($array)
 	{

		$this->db->select('*');
		$this->db->from('participante');
		$this->db->where('idevento',$array['idevento']);
		$this->db->where('idpersona',$array['idpersona']);
		$this->db->limit(1);
		$query = $this->db->get();
		if($query->num_rows() == 0) {
		    	$this->db->insert("participante", $array);
			if($this->db->affected_rows()>0){
				$result=true;
      			}else{
				$result=false;
      			}
    		}else{
			$result=false;
    		}	

 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idparticipante',$id);
 		$this->db->update('participante',$array_item);
    return true;
	}
 



  public function quitar($idp)
	{
		$this->db->trans_start();
		$condition = "idparticipante =" . $idp ;
		$this->db->select('*');
		$this->db->from('participante0');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() != 0) {
	 		  	$this->db->where('idparticipante',$idp);
				$this->db->update('participante', array('eliminado'=>1));
           				 $this->db->trans_complete();
			      		$result=true;
      	}else{	
            $this->db->trans_complete();
	      $result=false;
   	}

	return $result;
 	}










  public function retornar($idp)
	{
		$this->db->trans_start();
		$condition = "idparticipante =" . $idp ;
		$condition = "eliminado =1";
		$this->db->select('*');
		$this->db->from('participante');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() != 0) {
	 		  	$this->db->where('idparticipante',$idp);
				$this->db->update('participante', array('eliminado'=>0));
		    		//$this->db->delete('participante');
           				 $this->db->trans_complete();
			      		$result=true;
      	}else{	

            $this->db->trans_complete();
			      $result=false;
   	}

	return $result;
 	}



















	function elprimero()
	{
		$query=$this->db->order_by("idparticipante")->get('participante0');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idparticipante")->get('participante0');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$participante = $this->db->select("idparticipante")->order_by("idparticipante")->get('participante0')->result_array();
		$arr=array("idparticipante"=>$id);
		$clave=array_search($arr,$participante);
	   if(array_key_exists($clave+1,$participante))
		 {

 		$participante = $this->db->query('select * from participante0 where idparticipante="'. $participante[$clave+1]["idparticipante"].'"');
		 }else{

 		$participante = $this->db->query('select * from participante0 where idparticipante="'. $id.'"');
		 }
		 	
 		return $participante;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$participante = $this->db->select("idparticipante")->order_by("idparticipante")->get('participante0')->result_array();
		$arr=array("idparticipante"=>$id);
		$clave=array_search($arr,$participante);
	   if(array_key_exists($clave-1,$participante))
		 {

 		$participante = $this->db->query('select * from participante0 where idparticipante="'. $participante[$clave-1]["idparticipante"].'"');
		 }else{

 		$participante = $this->db->query('select * from participante0 where idparticipante="'. $id.'"');
		 }
		 	
 		return $participante;
 	}














}
