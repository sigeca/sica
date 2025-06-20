<?php

class Chklstportafolio extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('chklstportafolio_model');
      $this->load->model('documentochklstportafolio_model');
  }

//=========================================================
// Es la primera función que se ejecuta cuando llamamos a
// http://educaysoft.org/sica/chklstportafolio
// ========================================================
	public function index(){
		if(isset($this->session->userdata['logged_in'])){
			$data['chklstportafolio']=$this->chklstportafolio_model->elultimo();
			$data['documentochklstportafolios']= $this->documentochklstportafolio_model->listar_documentochklstportafolio1($data['chklstportafolio']['idchklstportafolio'])->result();

    //print_r($data['chklstportafolio']);
//			die();
			$data['title']="Lista de chklstportafolioes";
			$this->load->view('template/page_header');
			$this->load->view('chklstportafolio_record',$data);
			$this->load->view('template/page_footer');
		}else{
			$this->load->view('template/page_header.php');
			$this->load->view('login_form');
			$this->load->view('template/page_footer.php');
		}
	}


	public function add()
	{
		$data['title']="Nueva chklstportafolio";
		$this->load->view('template/page_header');
		$this->load->view('chklstportafolio_form',$data);
		$this->load->view('template/page_footer');
	}


	public function  save()
	{
	 	$array_item=array(
	 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$data=$this->chklstportafolio_model->save($array_item);
		header("Content-type: application/json; charset=utf-8");
		echo json_encode($data);
	 //	redirect('chklstportafolio');
 	}



	public function edit()
	{

			$tipodocumento=9;  //chklstportafolios\o
			$data['chklstportafolio'] = $this->chklstportafolio_model->chklstportafolio($this->uri->segment(3))->row_array();
  			$data['docentes']= $this->docente_model->lista_docentesA(0)->result();
  			$data['docente']= $this->docente_model->lista_docentesA($data['chklstportafolio']['iddocente'])->row_array();
  			$data['asignaturas']= $this->asignatura_model->lista_asignaturasA(0)->result();
			$data['documentos']= $this->documento_model->lista_documentosxtipo($tipodocumento,$data['docente']['idpersona'])->result();
  			$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
			$data['title'] = "Actualizar chklstportafolio";
			$this->load->view('template/page_header');		
			$this->load->view('chklstportafolio_edit',$data);
			$this->load->view('template/page_footer');
	 
	}


	public function  save_edit()
	{
		$id=$this->input->post('idchklstportafolio');
	 	$array_item=array(
		 	
		 	'idchklstportafolio' => $this->input->post('idchklstportafolio'),
	 		'descripcion' => $this->input->post('descripcion'),
		 	'nombre' => $this->input->post('nombre'),
	 		'duracion' => $this->input->post('duracion'),
	 		'linkdetalle' => $this->input->post('linkdetalle'),
	 		'idasignatura' => $this->input->post('idasignatura'),
	 		'iddocente' => $this->input->post('iddocente'),
	 		'iddocumento' => $this->input->post('iddocumento'),
	 		'idperiodoacademico' => $this->input->post('idperiodoacademico'),
	 	);
	 	$this->chklstportafolio_model->update($id,$array_item);
	 	redirect('chklstportafolio/actual/'.$id);
 	}


 	public function delete()
 	{
 		$this->chklstportafolio_model->delete($this->uri->segment(3));
 //		echo json_encode($data);
	 	redirect('chklstportafolio/elultimo');
	//	$db['default']['db_debug']=FALSE
 	}










	public function listar()
	{
		
	  $data['title']="Chklstportafolio";
		$this->load->view('template/page_header');		
	  $this->load->view('chklstportafolio_list',$data);
		$this->load->view('template/page_footer');
	}



function chklstportafolio_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->chklstportafolio_model->lista_chklstportafoliosA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idchklstportafolio,$r->elperiodo,$r->malla,$r->laasignatura,$r->eldocente,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"   data-retorno="'.site_url('chklstportafolio/actual').'"    data-idchklstportafolio="'.$r->idchklstportafolio.'">Ver</a>');
		}	
		$output=array( "draw"=>$draw,
			"recordsTotal"=> $data0->num_rows(),
			"recordsFiltered"=> $data0->num_rows(),
			"data"=>$data
		);
		echo json_encode($output);
		exit();
	
			

}


	function documentochklstportafolio_data()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));

			$idchklstportafolio=$this->input->get('idchklstportafolio');
			$data0 =$this->documentochklstportafolio_model->lista_unidades($idchklstportafolio);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->idchklstportafolio,$r->iddocumentochklstportafolio,$r->orden,$r->eldocumento,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('documentochklstportafolio/actual').'"    data-iddocumentochklstportafolio="'.$r->iddocumentochklstportafolio.'">Ver</a>');
			}	
			$output=array( "draw"=>$draw,
				"recordsTotal"=> $data0->num_rows(),
				"recordsFiltered"=> $data0->num_rows(),
				"data"=>$data
			);
			echo json_encode($output);
			exit();
	}











	function evento_data()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));

			$idchklstportafolio=$this->input->get('idchklstportafolio');
			$data0 =$this->evento_model->eventoss($idchklstportafolio);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->idchklstportafolio,$r->idevento,$r->titulo,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('evento/actual').'"    data-idevento="'.$r->idevento.'">Ver</a>');
			}	
			$output=array( "draw"=>$draw,
				"recordsTotal"=> $data0->num_rows(),
				"recordsFiltered"=> $data0->num_rows(),
				"data"=>$data
			);
			echo json_encode($output);
			exit();
	}






public function panel()
{
	
	$data['chklstportafolios'] = $this->chklstportafolio_model->lista_chklstportafolios()->result();
  	$data['title']="Chklstportafolio";
	$this->load->view('template/page_header');		
  	$this->load->view('chklstportafolios/chklstportafolios',$data);
	$this->load->view('template/page_footer');
}


public function iniciar()
{
  	$data['evento']=array('idchklstportafolio'=>$_GET['idchklstportafolio'],'idevento'=>$_GET['idevento']);	
	$data['chklstportafolio'] = $this->chklstportafolio_model->chklstportafolio($_GET['idchklstportafolio'])->row_array();
	$data['unidadchklstportafolios'] = $this->unidadchklstportafolio_model->lista_unidades($_GET['idchklstportafolio'])->result();
  	$data['title']="Chklstportafolio";
	$this->load->view('template/page_header');		
 	$this->load->view('chklstportafolios/FundamentosDeProgramacion_clases',$data);
	$this->load->view('template/page_footer');
}




public function actual()
{
	$data['chklstportafolio'] = $this->chklstportafolio_model->chklstportafolio($this->uri->segment(3))->row_array();
	$data['documentochklstportafolios']= $this->documentochklstportafolio_model->listar_documentochklstportafolio1($data['chklstportafolio']['idchklstportafolio'])->result();
	$data['documentos']= $this->documento_model->lista_documentos()->result();
  	$data['asignaturas']= $this->asignatura_model->lista_asignaturasA()->result();
 	$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
  	$data['docentes']= $this->docente_model->lista_docentesA(0)->result();
	  if(!empty($data))
	  {
	    $data['title']="Chklstportafolio";
	    $this->load->view('template/page_header');		
	    $this->load->view('chklstportafolio_record',$data);
	    $this->load->view('template/page_footer');
	  }else{
	    $this->load->view('template/page_header');		
	    $this->load->view('registro_vacio');
	    $this->load->view('template/page_footer');
	  }
 }



	public function reportepdf()
	{
		$tmp=explode("-",$this->uri->segment(3));
        	$idchklstportafolio=$tmp[0];
        	if(isset($tmp[1]))
        	{
        		$mesnumero=$tmp[1];
        	}else{
        		$mesnumero=0;
        	}
		$data['unidadchklstportafolio'] =$this->unidadchklstportafolio_model->unidadchklstportafolioss($idchklstportafolio)->result();
		$data['chklstportafolio'] =$this->chklstportafolio_model->chklstportafolio1($idchklstportafolio)->result();
	 	$data['temas']= $this->tema_model->lista_temass($idchklstportafolio)->result();
		$data['asignatura']=$this->asignatura_model->asignatura($data['chklstportafolio'][0]->idasignatura)->result();
		$data['metodoaprendizajetema']=$this->metodoaprendizajetema_model->metodoaprendizajetemaxchklstportafolio($data['chklstportafolio'][0]->idchklstportafolio)->result();
		$data['malla']=$this->malla_model->malla($data['asignatura'][0]->idmalla)->result();
		$data['departamento']=$this->departamento_model->departamento($data['malla'][0]->iddepartamento)->result();
		$data['calendarioacademico'] = $this->calendarioacademico_model->lista_calendarioacademico2($data['chklstportafolio'][0]->idperiodoacademico,$data['malla'][0]->iddepartamento)->result();
		$data['title']="Chklstportafolio";
	//	$this->load->view('template/page_header');		
		$this->load->view('chklstportafolio_list_pdf',$data);
//		$this->load->view('template/page_footer');
	}



public function exportcsv()
{
	$tmp=explode("-",$this->uri->segment(3));
       	$idchklstportafolio=$tmp[0];
       	if(isset($tmp[1]))
       	{
       		$mesnumero=$tmp[1];
       	}else{
       		$mesnumero=0;
       	}
	$filename='chklstportafolio.csv';
	header("Content-Description:File Transfer");
	header("Content-Disposition: attachment; filename=$filename");
	header("Content-Type: application/csv;");

	$data['temas']= $this->tema_model->lista_temassexport($idchklstportafolio)->result_array();

	$file=fopen('php://output','w');
	$header=array("idtema","sesion","nombrecorto","nombrelargo");
	fputcsv($file,$header);
	foreach($data['temas'] as $key=>$value){

	fputcsv($file,$value);
	}
	fclose($file);
	exit;

}





public function elprimero()
{
	$data['chklstportafolio'] = $this->chklstportafolio_model->elprimero();
	$data['documentochklstportafolios']= $this->documentochklstportafolio_model->listar_documentochklstportafolio1($data['chklstportafolio']['idchklstportafolio'])->result();
	$data['documentos']= $this->documento_model->lista_documentos()->result();
  	$data['asignaturas']= $this->asignatura_model->lista_asignaturasA()->result();
 	$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
  	$data['docentes']= $this->docente_model->lista_docentesA(0)->result();
  if(!empty($data))
  {
    $data['title']="Chklstportafolio";
    $this->load->view('template/page_header');		
    $this->load->view('chklstportafolio_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
		$data['chklstportafolio'] = $this->chklstportafolio_model->elultimo();
			$data['documentochklstportafolios']= $this->documentochklstportafolio_model->listar_documentochklstportafolio1($data['chklstportafolio']['idchklstportafolio'])->result();
	$data['documentos']= $this->documento_model->lista_documentos()->result();
  	$data['asignaturas']= $this->asignatura_model->lista_asignaturasA()->result();
 	$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
  		$data['docentes']= $this->docente_model->lista_docentesA(0)->result();
  if(!empty($data))
  {
    $data['title']="Chklstportafolio";
  
    $this->load->view('template/page_header');		
    $this->load->view('chklstportafolio_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['chklstportafolio_list']=$this->chklstportafolio_model->lista_chklstportafolio()->result();
	$data['chklstportafolio'] = $this->chklstportafolio_model->siguiente($this->uri->segment(3))->row_array();
	$data['documentochklstportafolios']= $this->documentochklstportafolio_model->listar_documentochklstportafolio1($data['chklstportafolio']['idchklstportafolio'])->result();
	$data['documentos']= $this->documento_model->lista_documentos()->result();
  	$data['asignaturas']= $this->asignatura_model->lista_asignaturasA()->result();
 	$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
  		$data['docentes']= $this->docente_model->lista_docentesA(0)->result();
  	$data['title']="Chklstportafolio";
	$this->load->view('template/page_header');		
  	$this->load->view('chklstportafolio_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['chklstportafolio_list']=$this->chklstportafolio_model->lista_chklstportafolio()->result();
	$data['chklstportafolio'] = $this->chklstportafolio_model->anterior($this->uri->segment(3))->row_array();
	$data['documentochklstportafolios']= $this->documentochklstportafolio_model->listar_documentochklstportafolio1($data['chklstportafolio']['idchklstportafolio'])->result();
	$data['documentos']= $this->documento_model->lista_documentos()->result();
  	$data['asignaturas']= $this->asignatura_model->lista_asignaturasA()->result();
 	$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
  		$data['docentes']= $this->docente_model->lista_docentesA(0)->result();
  	$data['title']="Chklstportafolio";
	$this->load->view('template/page_header');		
  	$this->load->view('chklstportafolio_record',$data);
	$this->load->view('template/page_footer');
}




public function exportarxls()
{
    $this->load->model('export_model');


	$idperiodoacademico=$this->uri->segment(3);


  $eventos= $this->evento_model->eventosp($idperiodoacademico)->result();


  $chklstportafolios= $this->chklstportafolio_model->chklstportafoliosp($idperiodoacademico)->result();
  $criterioseguimientochklstportafolios= $this->criterioseguimientochklstportafolio_model->lista_criterioseguimientochklstportafolios()->result();
// Preparar los datos para exportar a Excel
    $data = array();
    //$data[] = ['No','ASIGNAGURA', 'CÓDIGO','FORMATO INSTITUCIONAL','ENTREGA A AUTORIDAD','PRESENTACION Y ACTUALIZACIÓN A ESTUDIANTE','ENTREGA DE PLANIFICACION', "PLANIFICACION Y ACTUALIZACION DE RESULTADOS DE APRENDIZAJE","No. H/CLASE PLANIFICADAS DE ASIGNATURA",'No. H/CLASE DESARROLLADAS DE ASIGNATURA' , 'CUMPLIMIENTO DE SILABO',"CUMPLIMIENTO DE SISTEMA DE EVALUACION DE ASIGNATURA", "CUMPLIMIENTO CONTRIBUCIÓN DE LOGROS DE APRENDIZAJE",'PRESENTACION DE PORTAFOLIO' ,"RETROALIMENTACION Y PLAN DE MEJORAS" ]; // Encabezados


    $data[] = ['No','ASIGNAGURA', 'CÓDIGO','Docente' ]; // Encabezados


    foreach ($criterioseguimientochklstportafolios as $criterio) {
        $data[0][]=$criterio->nombre;


    }

    $i=1;
    foreach ($eventos as $evento) {
            $seguimientochklstportafolios= $this->seguimientochklstportafolio_model->seguimientochklstportafolios($evento->idevento)->result();

            $data[] = [$i,$evento->laasignatura, $evento->codigo,$evento->eldocente];

            $criteriox=array();
            foreach ($seguimientochklstportafolios as $seguimiento) {
                $criteriox[$seguimiento->idcriterioseguimientochklstportafolio] =$seguimiento->elvalorcriterioseguimientochklstportafolio ;
            }
        
            foreach ($criterioseguimientochklstportafolios as $criterio) {
            if(isset($criteriox[$criterio->idcriterioseguimientochklstportafolio])){
                $data[$i][]=$criteriox[$criterio->idcriterioseguimientochklstportafolio];
            }else{
                $data[$i][]="--";

            }


    }




            $i++;
    }




$filename = 'seguimientochklstportafolio.xlsx';
$this->chklstportafolio_model->exportToExcel($data, $filename);
}














}
