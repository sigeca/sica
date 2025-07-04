<?php
class Asignaturadocente_model extends CI_model {

	function lista_asignaturadocentes(){
		 $asignaturadocente= $this->db->get('asignaturadocente');
		 return $asignaturadocente;
	}


	function lista_asignaturadocentesA($iddistributivodocente){
		if($iddistributivodocente>0){
 		$this->db->where('iddistributivodocente',$iddistributivodocente);
		}
		 $this->db->order_by("eldistributivodocente asc, laasignatura asc, paralelo asc");
		 $asignaturadocente= $this->db->get('asignaturadocente1');
		 return $asignaturadocente;
	}



 	function asignaturadocente( $id){
 		$asignaturadocente = $this->db->query('select * from asignaturadocente where idasignaturadocente="'. $id.'"');
 		return $asignaturadocente;
 	}


 	function asignaturadocente1( $id){
		if($id>0){
 		$asignaturadocente = $this->db->query('select * from asignaturadocente1 where idasignaturadocente="'. $id.'"');
		}else{

 		$asignaturadocente = $this->db->query('select * from asignaturadocente1');
		}
 		return $asignaturadocente;
 	}



 	function asignaturadocente1xdistributivo( $id){
		if($id>0){
 			$asignaturadocente = $this->db->query('select * from asignaturadocente1 where iddistributivo="'. $id.'" order by numeronivel,paralelo,laasignatura');
		}else{

 		$asignaturadocente = $this->db->query('select * from asignaturadocente1');
		}
 		return $asignaturadocente;
 	}




/**
     * Obtiene datos de docentes y sus asignaturas para un distributivo específico.
     *
     * @param int $iddistributivo El ID del distributivo por el que filtrar.
     * @return array Un array de arrays con la estructura especificada.
     */
    public function getDocentesAsignaturasByDistributivo($iddistributivo) {
        $result = [];

        // Obtener los docentes que tienen asignaturas en el distributivo especificado
        $this->db->select('d.iddocente, ad.eldocente, d.cedula, dd.portafoliodrive' );
        $this->db->from('asignaturadocente4 ad, docente1 d, distributivodocente dd');
        $this->db->where('ad.iddocente = d.iddocente');
        $this->db->where('ad.iddistributivo', $iddistributivo);
        $this->db->where('dd.iddistributivo', $iddistributivo);
        $this->db->where('dd.iddocente= d.iddocente');
        $this->db->group_by('d.iddocente, ad.eldocente, d.cedula, dd.portafoliodrive'); // Agrupar para obtener docentes únicos
        $docentes = $this->db->get()->result_array();

        foreach ($docentes as $docente) {
            // Para cada docente, obtener las asignaturas específicas de ese distributivo
            $this->db->select('ad.laasignatura, ad.paralelo,ad.idevento');
            $this->db->from('asignaturadocente3 ad');
            $this->db->join('asignatura1 a', 'ad.idasignatura = a.idasignatura');
            $this->db->where('ad.iddocente', $docente['iddocente']);
            $this->db->where('ad.iddistributivo', $iddistributivo);
            $asignaturas = $this->db->get()->result_array();

            $result[] = [
                'iddocente' => $docente['iddocente'],
                'eldocente' => $docente['eldocente'],
                // Asume que 'cedula_imagen_path' guarda la ruta relativa.
                'cedula' => $docente['cedula'],
                'portafoliodrive' => $docente['portafoliodrive'],
                'asignaturas' => $asignaturas
            ];
        }

        return $result;
    }






 	function asignaturadocentexdistributivo( $id,$orden){
		if($id>0){
			if($orden==0){
 			$asignaturadocente = $this->db->query('select * from asignaturadocente2 where iddistributivo="'. $id.'" order by eldocente');
		}else{
 			$asignaturadocente = $this->db->query('select * from asignaturadocente2 where iddistributivo="'. $id.'" order by area,nivel,paralelo,laasignatura');

			}
		}else{

 		$asignaturadocente = $this->db->query('select * from asignaturadocente2');
		}
 		return $asignaturadocente;
 	}



 	function asignaturadocentexdistributivoweb( $id,$orden){
		if($id>0){
			if($orden==0){
 			$asignaturadocente = $this->db->query('select * from asignaturadocenteweb where iddistributivo="'. $id.'" order by area,numeronivelacademico,iddocente,paralelo');
			}
			if($orden==1){
 			$asignaturadocente = $this->db->query('select * from asignaturadocenteweb where iddistributivo="'. $id.'" order by eldocente');
			}

			if($orden==2){
 			$asignaturadocente = $this->db->query('select * from asignaturadocenteweb where iddistributivo="'. $id.'" order by laasignatura');

			}

			if($orden==3){
 			$asignaturadocente = $this->db->query('select * from asignaturadocenteweb where iddistributivo="'. $id.'" order by fechainicia');

			}
	

		}else{

 		$asignaturadocente = $this->db->query('select * from asignaturadocenteweb');
		}
 		return $asignaturadocente;
 	}









 	function asignaturadocentexdistributivo2( $id,$orden){
		if($id>0){
			if($orden==0){
 			$asignaturadocente = $this->db->query('select * from asignaturadocente4 where iddistributivo="'. $id.'" order by area,numeronivelacademico,iddocente,paralelo');
			}
			if($orden==1){
 			$asignaturadocente = $this->db->query('select * from asignaturadocente4 where iddistributivo="'. $id.'" order by eldocente');
			}

			if($orden==2){
 			$asignaturadocente = $this->db->query('select * from asignaturadocente4 where iddistributivo="'. $id.'" order by laasignatura');

			}
	if($orden==3){
 			$asignaturadocente = $this->db->query('select * from asignaturadocente4 where iddistributivo="'. $id.'" order by fechainicia desc');

			}
		}else{

 		$asignaturadocente = $this->db->query('select * from asignaturadocente2');
		}
 		return $asignaturadocente;
 	}





 	function asignaturadocentexdistributivo4( $id,$orden){
		if($id>0){
			if($orden==0){
 			$asignaturadocente = $this->db->query('select * from asignaturadocente4 where iddistributivo="'. $id.'" order by eldocente');
		}else{
 			$asignaturadocente = $this->db->query('select * from asignaturadocente4 where iddistributivo="'. $id.'" order by area,nivel,paralelo,laasignatura');

			}
		}else{

 		$asignaturadocente = $this->db->query('select * from asignaturadocente4');
		}
 		return $asignaturadocente;
 	}




 	function asignaturadocentexdistributivo5( $id,$orden){
		if($id>0){
			if($orden==0){
 			$asignaturadocente = $this->db->query('select * from asignaturadocente5 where iddistributivo="'. $id.'" order by eldocente');
		}else{
 			$asignaturadocente = $this->db->query('select * from asignaturadocente5 where iddistributivo="'. $id.'" order by area,nivel,paralelo,laasignatura');

			}
		}else{

 		$asignaturadocente = $this->db->query('select * from asignaturadocente5');
		}
 		return $asignaturadocente;
 	}





 	function asignaturadocentexdistributivo6( $id,$orden){
		if($id>0){
			if($orden==0){
 			$asignaturadocente = $this->db->query('select * from asignaturadocente6 where iddistributivo="'. $id.'" order by eldocente');
		}else{
 			$asignaturadocente = $this->db->query('select * from asignaturadocente6 where iddistributivo="'. $id.'" order by area,nivel,paralelo,laasignatura');

			}
		}else{

 		$asignaturadocente = $this->db->query('select * from asignaturadocente5');
		}
 		return $asignaturadocente;
 	}









 	function asignaturadocentespersona( $id){
 		$asignaturadocente = $this->db->query('select * from asignaturadocente where idpersona="'. $id.'"');
 		return $asignaturadocente;
 	}


 	function save($array)
 	{

		$condition1 = "iddistributivodocente =" . "'" . $array['iddistributivodocente'] . "'";
		$condition2 = "idasignatura =" . "'" . $array['idasignatura'] . "'";
		$this->db->select('*');
		$this->db->from('asignaturadocente');
		$this->db->where($condition1);
		$this->db->where($condition2);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) { // Crear un silabo para la asignatura docente nuevo
			$nombre="";


		}


		$condition1 = "iddistributivodocente =" . "'" . $array['iddistributivodocente'] . "'";
		$condition2 = "idasignatura =" . "'" . $array['idasignatura'] . "'";
		$condition3 = "idparalelo =" . "'" . $array['idparalelo'] . "'";
		$this->db->select('*');
		$this->db->from('asignaturadocente');
		$this->db->where($condition1);
		$this->db->where($condition2);
		$this->db->where($condition3);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
			$this->db->insert("asignaturadocente", $array);
			return true;
		   }else{
			return false;
		   }


 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idasignaturadocente',$id);
 		$this->db->update('asignaturadocente',$array_item);
	}
 


 	public function delete($id)
	{

		$condition1 = "idasignaturadocente =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('jornadadocente');
		$this->db->where($condition1);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() > 0) { // Crear un silabo para la asignatura docente nuevo

			$result= false;

		}else{
 			$this->db->where('idasignaturadocente',$id);
			$this->db->delete('asignaturadocente');
    			if($this->db->affected_rows()==1)
				$result=true;
			else
				$result=false;
		}
			return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idasignaturadocente")->get('asignaturadocente');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idasignaturadocente")->get('asignaturadocente');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$asignaturadocente = $this->db->select("idasignaturadocente")->order_by("idasignaturadocente")->get('asignaturadocente')->result_array();
		$arr=array("idasignaturadocente"=>$id);
		$clave=array_search($arr,$asignaturadocente);
	   if(array_key_exists($clave+1,$asignaturadocente))
		 {

 		$asignaturadocente = $this->db->query('select * from asignaturadocente where idasignaturadocente="'. $asignaturadocente[$clave+1]["idasignaturadocente"].'"');
		 }else{

 		$asignaturadocente = $this->db->query('select * from asignaturadocente where idasignaturadocente="'. $id.'"');
		 }
		 	
 		return $asignaturadocente;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$asignaturadocente = $this->db->select("idasignaturadocente")->order_by("idasignaturadocente")->get('asignaturadocente')->result_array();
		$arr=array("idasignaturadocente"=>$id);
		$clave=array_search($arr,$asignaturadocente);
	   if(array_key_exists($clave-1,$asignaturadocente))
		 {

 		$asignaturadocente = $this->db->query('select * from asignaturadocente where idasignaturadocente="'. $asignaturadocente[$clave-1]["idasignaturadocente"].'"');
		 }else{

 		$asignaturadocente = $this->db->query('select * from asignaturadocente where idasignaturadocente="'. $id.'"');
		 }
		 	
 		return $asignaturadocente;
 	}






}
