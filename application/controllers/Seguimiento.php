<?php
class Seguimiento extends CI_Controller{

	public function __construct(){
      		parent::__construct();
      		$this->load->model('seguimiento_model');
      		$this->load->model('documento_model');
      		$this->load->model('persona_model');
      		$this->load->model('evento_model');
      		$this->load->model('tiposeguimiento_model');
         	$this->load->model('sesionevento_model');
         	$this->load->model('correo_model');
	}

	public function index(){
  		$data['eventos']= $this->evento_model->lista_eventos()->result();
  		$data['personas']= $this->persona_model->lista_personas()->result();
  		$data['tiposeguimientos']= $this->tiposeguimiento_model->lista_tiposeguimientos()->result();
		$data['seguimiento'] = $this->seguimiento_model->elultimo();

 		// print_r($data['seguimiento_list']);
  		$data['title']="Lista de Seguimientoes";
		$this->load->view('template/page_header');		
  		$this->load->view('seguimiento_record',$data);
		$this->load->view('template/page_footer');
	}


	public function add()
	{
	    $idevento=$this->uri->segment(3);
	    if(!isset($idevento)){
	      $idevento=0;
	    }else{
	     $data["idevento"]=$idevento;
	    }

		$idpersona=8; //Stalinm Francis
		$data['correosde']= $this->correo_model->correospersona($idpersona)->result();
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['eventos']= $this->evento_model->lista_eventos()->result();
  		$data['tiposeguimientos']= $this->tiposeguimiento_model->lista_tiposeguimientos()->result();
		$data['sesioneventos'] =$this->sesionevento_model->sesioneventos($idevento)->result();
		$data['title']="Nuevo Seguimiento";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('seguimiento_form',$data);
	 	$this->load->view('template/page_footer');
	}


	public function evento()
	{
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['eventos']= $this->evento_model->lista_eventos()->result();
  		$data['tiposeguimientos']= $this->tiposeguimiento_model->lista_tiposeguimientos()->result();
		$data['title']="Nuevo Seguimiento";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('seguimiento_form1',$data);
	 	$this->load->view('template/page_footer');
	}






	public function  save()
	{
	 	$array_item=array(
		 	'idpersona' => $this->input->post('idpersona'),
		 	'idevento' => $this->input->post('idevento'),
		 	'fecha' => $this->input->post('fecha'),
		 	'idtiposeguimiento' => $this->input->post('idtiposeguimiento'),
		 	'comentario' => $this->input->post('comentario'),
	 	);
	 	$this->seguimiento_model->save($array_item);
	 	//redirect('seguimiento');
 	}




	public function  save_seguimiento()
	{
	 	$array_item=array(
	 	'idpersona' => $this->input->post('idpersona'),
	 	'idevento' => $this->input->post('idevento'),
	 	'fecha' => $this->input->post('fecha'),
	 	'correode' => $this->input->post('correode'),
	 	'correopara' => $this->input->post('correopara'),
	 	'asunto' => $this->input->post('asunto'),
		'idtiposeguimiento' => $this->input->post('idtiposeguimiento'),
	 	'comentario' => $this->input->post('comentario'),
	 	);
	 	$result=$this->seguimiento_model->save($array_item);
	 	if($result == FALSE)
		{
			$data=array('resultado'=>"FALSE");
		}else{
			$data=array('resultado'=>"TRUE");
		}
		echo json_encode($data);
  	}	




	public function edit()
	{
	 	$data['seguimiento'] = $this->seguimiento_model->seguimiento($this->uri->segment(3))->row_array();
		$data['eventos']= $this->evento_model->lista_eventos()->result();
		$data['personas']= $this->persona_model->lista_personas()->result();
  		$data['documentos']= $this->documento_model->lista_documentos()->result();
 	 	$data['title'] = "Actualizar Seguimiento";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('seguimiento_edit',$data);
	 	$this->load->view('template/page_footer');
	}


	public function  save_edit()
	{
		$id=$this->input->post('idseguimiento');
	 	$array_item=array(
		 	'idevento' => $this->input->post('idevento'),
		 	'idpersona' => $this->input->post('idpersona'),
		 	'iddocumento' => $this->input->post('iddocumento'),
	 	);
	 	$this->seguimiento_model->update($id,$array_item);
	 	redirect('seguimiento');
 	}



 	public function delete()
 	{
 		$data=$this->seguimiento_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('seguimiento/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}





	public function listar()
	{
		
	  $data['seguimiento'] = $this->seguimiento_model->listar_seguimiento1()->result();
	  $data['title']="Certificado";
		$this->load->view('template/page_header');		
	  $this->load->view('seguimiento_list',$data);
		$this->load->view('template/page_footer');
	}

	function seguimiento_data()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));

			$data0 = $this->seguimiento_model->listar_seguimiento1();
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->idseguimiento,$r->elevento,$r->lapersona,$r->fecha,$r->tiposeguimiento,
					$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idseguimiento="'.$r->idseguimiento.'">Ver</a>');
			}	
			$output=array( "draw"=>$draw,
				"recordsTotal"=> $data0->num_rows(),
				"recordsFiltered"=> $data0->num_rows(),
				"data"=>$data
			);
			echo json_encode($output);
			exit();
	}


public function reporte()
{

	$data['evento'] = $this->evento_model->evento($this->uri->segment(3))->row_array();
	$data['sesioneventos'] =$this->sesionevento_model->sesionevento_seguimiento($this->uri->segment(3))->result();
	$data['seguimiento'] = $this->seguimiento_model->listar_seguimiento_reporte($this->uri->segment(3))->result();
  	$data['title']="Certificado";
  	$this->load->view('seguimiento_report',$data);
}


public function tabla()
{


$this->load->library('table');
$this->load->library('typography');






//-- Table Initiation
$tmpl = array (
  'table_open'          => '<table border="0" cellpadding="0" cellspacing="0">',
  'heading_row_start'   => '<tr class="heading">',
  'heading_row_end'     => '</tr>',
  'heading_cell_start'  => '<th>',
  'heading_cell_end'    => '</th>',
  'row_start'           => '<tr>',
  'row_end'             => '</tr>',
  'cell_start'          => '<td>',
  'cell_end'            => '</td>',
  'row_alt_start'       => '<tr class="alt">',
  'row_alt_end'         => '</tr>',
  'cell_alt_start'      => '<td>',
  'cell_alt_end'        => '</td>',
  'table_close'         => '</table>'
);
$this->table->set_template($tmpl);      
$this->table->set_caption("TABLE TITLE");

//-- Header Row
$this->table->set_heading('ID', 'Date', 'Title', 'Item');
    $this->load->database();
    $this->load->helper('form');
        $this->db->select('*');
        $query = $this->db->get('seguimiento1');

	if ($query->num_rows() > 0) {
		$rows=$query->result();
	
//-- Content Rows
foreach($rows as  $row)
{
  $this->table->add_row(
    anchor("work/fill_form/$row->idseguimiento", $row->idseguimiento),
    $row->fecha,
    $row->elevento,
    $this->typography->auto_typography($row->lapersona)
  );
}

//-- Display Table
$table = $this->table->generate();
echo $table;
	}






}






public function elprimero()
{
  $data['documentos']= $this->documento_model->lista_documentos()->result();
	$data['seguimiento'] = $this->seguimiento_model->elprimero();
  if(!empty($data))
  {
  		$data['eventos']= $this->evento_model->lista_eventos()->result();

  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Seguimiento del documento";
    $this->load->view('template/page_header');		
    $this->load->view('seguimiento_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
  $data['documentos']= $this->documento_model->lista_documentos()->result();
	$data['seguimiento'] = $this->seguimiento_model->elultimo();
  if(!empty($data))
  {
  		$data['eventos']= $this->evento_model->lista_eventos()->result();
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Seguimiento del documento";
  
    $this->load->view('template/page_header');		
    $this->load->view('seguimiento_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['seguimiento_list']=$this->seguimiento_model->lista_seguimiento()->result();
  $data['documentos']= $this->documento_model->lista_documentos()->result();
	$data['seguimiento'] = $this->seguimiento_model->siguiente($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  		$data['eventos']= $this->evento_model->lista_eventos()->result();
    $data['title']="Seguimiento del documento";
 // $data['title']="Correo";
	$this->load->view('template/page_header');		
  $this->load->view('seguimiento_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['seguimiento_list']=$this->seguimiento_model->lista_seguimiento()->result();
  $data['documentos']= $this->documento_model->lista_documentos()->result();
	$data['seguimiento'] = $this->seguimiento_model->anterior($this->uri->segment(3))->row_array();
 	$data['personas']= $this->persona_model->lista_personas()->result();
  		$data['eventos']= $this->evento_model->lista_eventos()->result();
 // $data['title']="Correo";
    $data['title']="Seguimiento del documento";
	$this->load->view('template/page_header');		
  $this->load->view('seguimiento_record',$data);
	$this->load->view('template/page_footer');
}



public function get_participantes() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->post('idevento')) 
    {
        $this->db->select('*');
        $this->db->where(array('idevento' => $this->input->post('idevento')));
        $query = $this->db->get('participante1');
	$data=$query->result();
	echo json_encode($data);
	}
}




public function get_participantes2() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->post('idevento')) 
    {
      $sql="";
      $sql=$sql.'select p1.*, (select idtiposeguimiento from seguimiento p2 where p2.idpersona=p1.idpersona and p2.fecha="'.$this->input->post('fecha').'"  and p2.idevento='.$this->input->post('idevento'). ') as idtiposeguimiento from participante1 p1 where p1.idevento='.$this->input->post('idevento').' and p1.idpersona in (select p2.idpersona from seguimiento p2 where p2.idevento=p1.idevento and p2.fecha="'.$this->input->post('fecha').'"  and p2.idevento='.$this->input->post('idevento').')';
$sql=$sql." union "; 

    $sql=$sql.'select p1.*, " " as idtiposeguimiento from participante1 p1 where idevento='.$this->input->post('idevento').' and p1.idpersona not in (select p2.idpersona from seguimiento p2 where p2.idevento=p1.idevento and p2.fecha="'.$this->input->post('fecha').'" and p2.idevento='.$this->input->post('idevento').') order by nombres ;';



   $query= $this->db->query($sql);

	$data=$query->result();
	echo json_encode($data);
	}
}

public function get_seguimiento() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->post('idevento')) 
    {
        $this->db->select('*');
        $this->db->where(array('idevento' => $this->input->post('idevento'),'fecha' => $this->input->post('fecha')));
        $query = $this->db->get('seguimiento1');

	if ($query->num_rows() > 0) {
		$this->db->select('idtiposeguimiento,nombre as tiposeguimiento, "" as comentario');
		$query = $this->db->get('tiposeguimiento');
		$data=$query->result();
		echo json_encode($data);
	}else{

		$this->db->select('idtiposeguimiento,nombre as tiposeguimiento, "" as comentario');
		$query = $this->db->get('tiposeguimiento');

		$data=$query->result();
		echo json_encode($data);
	}


    }
}




public function get_seguimientop() {

    $this->load->database();
    $this->load->helper('form');
    if($this->input->post('idevento')) 
    {
        $this->db->select('*');
        $this->db->where(array('idevento' => $this->input->post('idevento'),'fecha' => $this->input->post('fecha'),'idpersona' => $this->input->post('idpersona')));
        $query = $this->db->get('seguimiento1');

	if ($query->num_rows() > 0) {
//		$this->db->select('idtiposeguimiento,nombre as tiposeguimiento, "" as comentario');
//		$query = $this->db->get('tiposeguimiento');
		$data=$query->result();
		echo json_encode($data);
	}else{

		$this->db->select('idtiposeguimiento,nombre as tiposeguimiento, "" as comentario');
		$query = $this->db->get('tiposeguimiento');

		$data=$query->result();
		echo json_encode($data);
	}


    }


}



public function get_tiposeguimiento() {
    $this->load->database();
    $this->load->helper('form');
    $this->db->select('*');
    $query = $this->db->get('tiposeguimiento');
	$data=$query->result();
	echo json_encode($data);
}



public function send()
{
    $this->load->database();
    $this->load->helper('form','language');


       		$mailto = $this->input->post('correopara');

        $this->load->library('email');
        $nome = $this->input->post('nome');
        $msg = str_replace("educaysoft@gmail.com",$mailto, $this->input->post('msg'));
        $secure = $this->input->post('secure');
	$email= $this->input->post('correode');


	if(strpos($email,"educaysoft")!=false){

		//$config['protocol'] = 'ssmtp';
		//$config['smtp_host'] = 'ssl://smtp.office365.com';

		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'ssl://smtp.live.com';

		$config['smtp_user'] =$email; // $this->settings['smtp_email'];
        	$config['smtp_pass'] ="PIwiIB.2@3#"; //  $this->settings['smtp_password'];
		$config['smtp_port'] = '587';
		$config['smtp_crypto'] = 'tls';
		$config['mailtype'] = 'html';
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;
		$config['newline'] = "\r\n";
		$this->email->clear(TRUE);

	}else{




        $config['protocol'] = "smtp";
        $config['smtp_host'] = "ssl://smtp.gmail.com";
        $config['smtp_port'] = "465";
        $config['smtp_timeout'] = "7";
        $config['smtp_user'] =$email; // $this->settings['smtp_email'];
  //      $config['smtp_pass'] ="PIwiIB.2@3#"; //  $this->settings['smtp_password'];
        $config['smtp_pass'] ="mhcvyxolqozgctbj"; //  $this->settings['smtp_password'];
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
        $config['validation'] = TRUE; 

}	
        
        $this->email->initialize($config); 
        $this->email->from($email, $nome);
        $this->email->to($mailto);
	if($this->input->post('asunto'))
	{
		$this->email->subject($this->input->post('asunto'));
	}else{
		$this->email->subject('UTLVTE - EDUCACIÓN CONTINUA');
	}	

	$this->email->message($msg);
        if ($this->email->send()){
            echo json_encode(array("sent"=>TRUE,"mailto"=>$mailto));
        }else{
            echo json_encode(array("sent"=>FALSE));
        }
   // }
}


public function sendhotmail()
{
	$this->load->database();
        $this->load->helper('form','language');

//    if ($this->input->post('secure') != 'siteform') {
  //      echo lang('erro_no_js');
   // }else{

     //  if($this->input->post('idpersona'))
//	{
//	$condition="idpersona=".$this->input->post('idpersona')." and idcorreo_estado=1";
//		$this->db->select('*');
//		$this->db->from('correo');
//		$this->db->where($condition);
///		$this->db->limit(1);
//		$query=$this->db->get();
//		if($query->num_rows() >0) {
//			$mailto=$query->result()[0]->nombre;
//
//		}else{
  //      		$mailto = $this->input->post('mailto');
//		}
//	}else{
       		$mailto = $this->input->post('correopara');
//	}

        $this->load->library('email');
        $nome = $this->input->post('nome');
        $msg = str_replace("tecnologiasdelainformacion@utelvt.edu.ec",$mailto, $this->input->post('msg'));
        $secure = $this->input->post('secure');
	$email= $this->input->post('correode');
     //   $config['protocol'] = "smtp";
     //   $config['smtp_host'] = "smtp.live.com";
     //   $config['smtp_port'] = "587";
    //    $config['smtp_timeout'] = "10";
 
$config['protocol'] = 'ssmtp';
$config['smtp_host'] = 'ssl://smtp.office365.com';


	$config['smtp_user'] =$email; // $this->settings['smtp_email'];
        $config['smtp_pass'] ="SAfq1234"; //  $this->settings['smtp_password'];

$config['smtp_port'] = '587';
$config['smtp_crypto'] = 'tls';
$config['mailtype'] = 'html';
$config['charset'] = 'iso-8859-1';
$config['wordwrap'] = TRUE;
$config['newline'] = "\r\n";
$this->email->clear(TRUE);

//	$config['smtp_crypto'] = 'tls';
  //      $config['charset'] = "utf-8";
    //    $config['mailtype'] = "html";
    //    $config['newline'] = "\r\n";
   //     $config['validation'] = TRUE; 
        $this->email->initialize($config); 
        $this->email->from($email, $nome);
        $this->email->to($mailto);
	if($this->input->post('asunto'))
	{
		$this->email->subject($this->input->post('asunto'));
	}else{
		$this->email->subject('UTLVTE - EDUCACIÓN CONTINUA');
	}	

	$this->email->message($msg);
        if ($this->email->send()){
            echo json_encode(array("sent"=>TRUE,"mailto"=>$mailto));
        }else{
            echo json_encode(array("sent"=>FALSE));
        }
}





public function sendeducaysoft()
{
	$this->load->database();
        $this->load->helper('form','language');

    if ($this->input->post('secure') != 'siteform') {
        echo lang('erro_no_js');
    }else{

       if($this->input->post('idpersona'))
	{
	$condition="idpersona=".$this->input->post('idpersona')." and idcorreo_estado=1";
		$this->db->select('*');
		$this->db->from('correo');
		$this->db->where($condition);
		$this->db->limit(1);
		$query=$this->db->get();
		if($query->num_rows() >0) {
			$mailto=$query->result()[0]->nombre;

		}else{
        		$mailto = $this->input->post('mailto');
		}
	}else{
       		$mailto = $this->input->post('mailto');
	}

        $this->load->library('email');
        $nome = $this->input->post('nome');
        $msg = str_replace("stalin.francis@utelvt.edu.ec",$mailto, $this->input->post('msg'));
        $secure = $this->input->post('secure');
	$email= $this->input->post('email');
        $config['protocol'] = "smtp";
        $config['smtp_host'] = "ssl://mail.educaysoft.org";
        $config['smtp_port'] = "25";
        $config['smtp_timeout'] = "7";
        $config['smtp_user'] =  "_mainaccount@educaysoft.org"; // $this->settings['smtp_email'];
        $config['smtp_pass'] ="PIwiIB2@3#"; //  $this->settings['smtp_password'];
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
        $config['validation'] = TRUE; 
        $this->email->initialize($config); 
        $this->email->from($correode, $nome);
        $this->email->to($correopara);
	if($this->input->post('asunto'))
	{
		$this->email->subject($this->input->post('asunto'));
	}else{
		$this->email->subject('UTLVTE - EDUCACIÓN CONTINUA');
	}	

	$this->email->message($msg);
        if ($this->email->send()){
            echo json_encode(array("sent"=>TRUE,"mailto"=>$correopara));
        }else{
            echo json_encode(array("sent"=>FALSE));
        }
    }
}








}

