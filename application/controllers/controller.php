<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Controller extends CI_Controller {
	
/*----------------------Constructor------------------------------------------*/
public function __construct(){
	parent::__construct();
	$this->load->helper('form');
	$this->load->model('user_model');
}

/*---------------------Vista inicio-----------------------------------------------*/
public function index(){
	$data['valores'] = $this->user_model->responsables();
	$data['bmiembro'] = $this->user_model->valoresProblemas();
	$data['tesis'] = $this->user_model->tesis();
	$data['proyectos'] = $this->user_model->proyectos();
	$data['problemas'] = $this->user_model->problemas();
	$data['publicaciones'] = $this->user_model->publicaciones();
	$data['colaboraciones'] = $this->user_model->colaboraciones();
	$data['investigaciones'] = $this->user_model->investigaciones();
	$data['reconocimientos'] = $this->user_model->reconocimientos();
	$data['ctrlpag']="inicio";
	
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('inicio', $data);
	$this->load->view('footer');
}

/*---------------------Vista login-----------------------------------------------*/
public function showLogin(){
	$data['type'] = null;
	$this->load->view('login', $data);
}

/*-----------------------Login-----------------------------------------*/
public function entrar(){
	$user=$this->input->post('user');
	$pass=md5($this->input->post('pass'));
	//print_r($pass);exit();
	if($this->user_model->verificar($user,$pass)){
		$data['valores'] = $this->user_model->responsables();
		$data['bmiembro'] = $this->user_model->valoresProblemas();
		$data['tesis'] = $this->user_model->tesis();
		$data['proyectos'] = $this->user_model->proyectos();
		$data['problemas'] = $this->user_model->problemas();
		$data['publicaciones'] = $this->user_model->publicaciones();
		$data['colaboraciones'] = $this->user_model->colaboraciones();
		$data['investigaciones'] = $this->user_model->investigaciones();
		$data['reconocimientos'] = $this->user_model->reconocimientos();
		$data['ctrlpag']="inicio";
		$data['type'] = "error";
		$this->load->view('cabecera');
		$this->load->view('menu', $data);
		$this->load->view('inicio', $data);
		$this->load->view('footer');
	}
	else{
		$datos['mensaje'] = "Usuario y/o contraseña incorrectos";
		$datos['type'] = "error";
		$this->load->view('login', $datos);
	} 
}

/*-----------------------viewchangePassword-----------------------------------------*/
public function viewchangePassword(){
	//$this->load->view('cabecera');
	$this->load->view('chagepass');
	//$this->load->view('footer');
}

/*-----------------------changePassword-----------------------------------------*/
public function changePassword(){
	$user=$this->input->post('user');
	$passold=md5($this->input->post('passold'));
	$passnew=md5($this->input->post('passnew'));
	$passrenew=md5($this->input->post('passrenew'));
	if($this->user_model->verificar($user,$passold)){
		if($passnew != $passrenew){
			$data['mensaje']  = "La contraseña nueva no coincide con la confirmación";
			$this->load->view('chagepass', $data);
		}
		else{
			$dato = array(
				'contrasenna' =>$passnew
			);
			$this->db->where('usuario',$this->input->post('user') );
			$this->db->update('tbl_usuario', $dato);
			
			$data['mensaje']  = "Se ha cambiado la contraseña con éxito.";
			$data['type'] = "success";
			$this->load->view('login', $data);
		}
	}
	else{
		$data['mensaje'] = "Usuario y/o contraseña incorrectos";
		$this->load->view('chagepass', $data);
	} 
}

/*-----------------------Cerrar sesion-----------------------------------------*/
public function cerrar(){
	$newdata = array(
		'logged_in'=> false
	);
	$this->session->set_userdata($newdata); 
	$this->index();
	
}

/*-----------------------Vista listar Responsables-----------------------------------------*/
public function ltsResponsables($flag, $message, $type){   
	$data['valores'] = $this->user_model->responsables();
	$data['bmiembro'] = $this->user_model->valoresProblemas();
	$data['tesis'] = $this->user_model->tesis();
	$data['proyectos'] = $this->user_model->proyectos();
	$data['problemas'] = $this->user_model->problemas();
	$data['publicaciones'] = $this->user_model->publicaciones();
	$data['colaboraciones'] = $this->user_model->colaboraciones();
	$data['investigaciones'] = $this->user_model->investigaciones();
	$data['reconocimientos'] = $this->user_model->reconocimientos();
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";

	if(!$flag){
		$data['mensaje'] = $message;
		$data['type'] = $type;
	}
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('responsables/ltsResponsables',$data);
	//$this->load->view('prueba');
	//$this->load->view('responsables/nuevo', $data);
	$this->load->view('footer');
}

/*---------------------Vista insertar responsable-------------------------------------------*/
public function v_i_responsable(){   
	//$find = $this->user_model->buscarCantCargos();
	$data['ctrlpag']="miembro";
	$data['inspag']="insmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('responsables/insResponsable');
	$this->load->view('viewfooter');
}

/*---------------Insertar responsable-------------------------------------------------*/
public function insResponsable(){  
	$avatar = "";
	if($this->input->post('sexo') == "M"){
		$avatar = "male.png";
	}
	if($this->input->post('sexo') == "F"){
		$avatar = "female.png";
	}
	
	$dato = array(
		'ci' =>$this->input->post('ci') ,
		'ciMilitar' =>$this->input->post('cimilitar') ,
		'nombres' =>$this->input->post('name') ,
		'apellido1' =>$this->input->post('apellido1') ,
		'apellido2' =>$this->input->post('apellido2') ,
		'gradoMilitar' =>$this->input->post('grado') ,
		'organo' =>$this->input->post('organo') ,
		'nacimientoLugar' =>$this->input->post('nacimiento') ,
		'nacionalidad' =>$this->input->post('nacionalidad') ,
		'direccion' =>$this->input->post('direccion') ,
		'sexo' =>$this->input->post('sexo') ,
		'estadoCivil' =>$this->input->post('estado') ,
		'varones' =>$this->input->post('hijosvarones') ,
		'hembras' =>$this->input->post('hijoshembras') ,
		'cuadro' =>$this->input->post('cuadro'), 
		'avatar' => $avatar
	);
	$findci = $this->user_model->buscarCI($this->input->post('ci'));
	$findcim = $this->user_model->buscarCIM($this->input->post('cimilitar'));
	if($findci){
		$flag = false;
		$message  = "Error al insertar el miembro. Ya existe uno registrado con ese CI";
		$type = False;
	
	}
	else if($findcim){
		$flag = false;
		$message  = "Error al insertar el miembro. Ya existe uno registrado con ese CI Militar";
		$type = False;
	
	}
	else{
		$this->db->insert('datospersonales', $dato);
		$flag = false;
		$message  = "Miembro insertado con éxito";
		$type = True;
	}
	

	$this->ltsResponsables($flag, $message, $type);
}

/*--------------------Vista actualizar responsable--------------------------------------------*/
public function editResponsable($id, $controlpag){   
	$data['m']=$this->user_model->m_responsable($id);
	//$data['depart'] = $this->user_model->departamentos();
	//$data['eqpdpt'] = $this->user_model->EqpDpt();
	//$data['cargos'] = $this->user_model->cargos();
	$data['cp'] = $controlpag;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('responsables/edtResponsable', $data);
	$this->load->view('viewfooter');
}

/*-----------------------Actualizar responsable-----------------------------------------*/
public function edtResponsable(){
	$pag = "home";
	$dato = array(
		'ci' =>$this->input->post('ci') ,
		'ciMilitar' =>$this->input->post('cimilitar') ,
		'nombres' =>$this->input->post('name') ,
		'apellido1' =>$this->input->post('apellido1') ,
		'apellido2' =>$this->input->post('apellido2') ,
		'gradoMilitar' =>$this->input->post('grado') ,
		'organo' =>$this->input->post('organo') ,
		'nacimientoLugar' =>$this->input->post('nacimiento') ,
		'nacionalidad' =>$this->input->post('nacionalidad') ,
		'direccion' =>$this->input->post('direccion') ,
		'sexo' =>$this->input->post('sexo') ,
		'estadoCivil' =>$this->input->post('estado') ,
		'varones' =>$this->input->post('hijosvarones') ,
		'hembras' =>$this->input->post('hijoshembras') ,
		'cuadro' =>$this->input->post('cuadro') 
	);
	$this->db->where('ci',$this->input->post('ci') );
	$this->db->update('datospersonales', $dato);
	
	$flag = false;
	$message  = "Miembro editado con éxito";
	$type = "success";
	
	if($this->input->post('controlpagina') == 0){
		$this->ltsResponsables($flag, $message, $type);
	}else{
		$this->viewResponsable($flag, $message, $type, $this->input->post('ci'), $pag );
	}
}

/*------------------Elimiar empleado----------------------------------------------*/
public function delResponsable($id){
	$this->user_model->deleteResponsable($id);
	//foreach ($f->result() as $d){
		if($this->user_model->deleteResponsable($id)) {
			//print_r($d->bancoProblemas_numeroProblema); exit();
			$flag = false;
			$message  = "Error al eliminar el responsable. Hay problemática(s) asociada(s) a este miembro. Desvincule al miembro de la(s) probproblemática(s) antes de eliminarlo.";
			$type = False;	
		}
		
		else{
			$this->db->where('ci', $id);
			$this->db->delete('datospersonales');
			$flag = false;
			$message  = "Miembro eliminado con éxito";
			$type = "success";
		}
	//}
	$this->ltsResponsables($flag, $message, $type);	
}	

/*----------------Vista expediente responsable---------------------*/
public function viewResponsable($flag, $message, $type, $ci, $pag){
	$data['m']=$this->user_model->m_responsable($ci);
	$data['expprof']=$this->user_model->m_experienciaProfesional($ci);
	$data['problemas']=$this->user_model->m_problemas($ci);
	$data['tesis']=$this->user_model->m_tesis($ci);
	$data['innovaciones']=$this->user_model->m_innovaciones($ci);
	$data['organiz']=$this->user_model->m_organizaciones($ci);
	$data['asociac']=$this->user_model->m_asociaciones($ci);
	$data['idi']=$this->user_model->m_idioma($ci);
	$data['colabora']=$this->user_model->m_colaboraciones($ci);
	$data['asesor']=$this->user_model->m_asesorias($ci);
	$data['evento']=$this->user_model->m_eventos($ci);
	$data['invest']=$this->user_model->m_investigaciones($ci);
	$data['reconocimientos']=$this->user_model->m_reconocimientos($ci);
	$data['misiones']=$this->user_model->m_misiones($ci);
	$data['publicaciones']=$this->user_model->m_publicaciones($ci);
	$data['pcs']=$this->user_model->m_pc($ci);
	$data['telef']=$this->user_model->m_telefono($ci);
	$data['tablet']=$this->user_model->m_tablet($ci);
	$data['correo']=$this->user_model->m_correo($ci);
	$data['rsocial']=$this->user_model->m_redsocial($ci);
	$data['vivienda']=$this->user_model->m_vivienda($ci);
	$data['transporte']=$this->user_model->m_transporte($ci);
	$data['catdocente']=$this->user_model->m_catdocente($ci);
	$data['catcientifica']=$this->user_model->m_catcientifica($ci);
	$data['cursoentrenamiento']=$this->user_model->m_cursoentrenamiento($ci);
	$data['postgrados']=$this->user_model->m_postgrados($ci);
	$data['tituloacademico']=$this->user_model->m_tituloacademico($ci);
	$data['proyecto']=$this->user_model->m_proyecto($ci);
	$data['actividades']=$this->user_model->m_actividades($ci);
	$data['ocupacion']=$this->user_model->m_ocupacion($ci);
	$data['gradocient']=$this->user_model->m_gradocient($ci);
	$data['estudio']=$this->user_model->m_estudio($ci);
	$data['cimpart']=$this->user_model->m_cimpart($ci);
	$data['pag'] = $pag;
	
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	if(!$flag){
		$data['mensaje'] = $message;
		$data['type'] = $type;
	}

	//var_dump($data);
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('responsables/viewResponsable', $data);
	$this->load->view('viewfooter');	
}

/*-----------------------Subir foto del representnte---------------------------------------- */
public function uploadPicture(){
	$pag = "home";
	//$tipo = $_FILES['upload']['ext'];
	$ext = pathinfo($_FILES["upload"]["name"], PATHINFO_EXTENSION);
	$allowedExts = array("gif", "jpeg", "jpg", "png", "JPG", "JPEG", "GIF", "PNG");
	//print_r($ext); exit();

	$mi_archivo = 'upload';
	$config['upload_path'] = "dist/img/avatar/";
	$config['file_name'] = $_FILES["upload"]["name"]; // nombre de la foto
	$config['allowed_types'] = "*";
	$config['max_size'] = "5000";
	//$config['max_width'] = "2000";
	//$config['max_height'] = "2000";
	$config['overwrite'] = true;
	
	$this->load->library('upload', $config);
	
	$this->upload->do_upload($mi_archivo);
	
	//var_dump($this->upload->data());
	//print_r(filesize($_FILES['upload']['tmp_name'])); exit();
	if(!in_array($ext, $allowedExts)) {
		$flag = false;
		$message  = "Error al cambiar el avatar. La extensión \"".$ext."\" no se corresponde a una imagen.";
		$type = False;	
	}
	else if(filesize($_FILES['upload']['tmp_name']) > 5000000) {
		$flag = false;
		$message  = "Error al cambiar el avatar. La imagen no puede pesar más de 5Mb.";
		$type = False;	
	}
	else{
		$dato = array(
			'avatar' =>$config['file_name']
		);
		$this->db->where('ci',$this->input->post('uploadCi') );
		$this->db->update('datospersonales', $dato);
	
		$flag = false;
		$message  = "Avatar modificado con éxito";
		$type = "success";
	}	
	$this->viewResponsable($flag, $message, $type, $this->input->post('uploadCi'), $pag);
	
}

/*---------------------Vista listar problematicas-------------------------------------------*/
public function ltsProblematicas($flag, $message, $type){   
	$data['problemas'] = $this->user_model->problemas();
	$data['bmiembro']=$this->user_model->problemasMiembro();
	$data['resp']=$this->user_model->responsables();
	$data['ctrlpag']="problema";
	$data['ltspag']="ltsproblema";
	if(!$flag){
		$data['mensaje'] = $message;
		$data['type'] = $type;
	}
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('problematicas/ltsProblematicas',$data);
	$this->load->view('viewfooter');
}

/*--------------------Vista actualizar problematica--------------------------------------------*/
public function v_e_Problematica($numeroProblema, $controlpag){   
	$data['p']=$this->user_model->m_problematicas($numeroProblema);
	//$data['depart'] = $this->user_model->departamentos();
	//$data['eqpdpt'] = $this->user_model->EqpDpt();
	//$data['cargos'] = $this->user_model->cargos();
	$data['ctrlpag']="problema";
	$data['ltspag']="ltsproblema";
	$data['cp'] = $controlpag;
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('problematicas/edtProblematica', $data);
	$this->load->view('viewfooter');
}

/*-----------------------Actualizar problematica-----------------------------------------*/
public function edtProblematica(){
	$dato = array(
		'organo' =>$this->input->post('organo') ,
		'problematica' =>$this->input->post('problematica') ,
		'programa' =>$this->input->post('programa') ,
		'prioridades' =>$this->input->post('prioridades') 
	);
	$this->db->where('numeroProblema', $this->input->post('numeroProblema') );
	$this->db->update('bancoproblemas', $dato);
	
	$flag = false;
	$message  = "Problemática editada con éxito";
	$type = "success";
	
	if($this->input->post('controlpagina') == 0){
		$this->ltsProblematicas($flag, $message, $type);
	}else{
		$this->viewResponsable($flag, $message, $type, $this->input->post('ci'), "home" );
	}
}

/*---------------------Vista insertar problematica-------------------------------------------*/
public function v_i_problematica(){  
	$data['ctrlpag']="problema";
	$data['inspag']="insproblema"; 
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('problematicas/insProblematica');
	$this->load->view('viewfooter');
}

/*---------------Insertar Problematica-------------------------------------------------*/
public function insProblematica(){  
	$dato = array(
		'organo' =>$this->input->post('organo') ,
		'problematica' =>$this->input->post('problematica') ,
		'programa' =>$this->input->post('programa') ,
		'prioridades' =>$this->input->post('prioridades') 
	);
	$this->db->insert('bancoproblemas', $dato);
	$flag = false;
	$message  = "Problemática insertada con éxito";
	$type = True;

	$this->ltsProblematicas($flag, $message, $type);
}

/*------------------Elimiar problematica----------------------------------------------*/
public function delProblematica($id){
	$bool = $this->user_model->deleteProblematica($id);
	//foreach ($f->result() as $d){
		if($bool) {
			//print_r($d->bancoProblemas_numeroProblema); exit();
			$flag = false;
			$message  = "Error al eliminar la problemática. Hay miembro(s) asociada(s) a esta problemática. Desvincule la problemática de el(los) miembro(s) antes de eliminarla.";
			$type = False;	
		}
		
		else{
			$this->db->where('numeroProblema', $id);
			$this->db->delete('bancoproblemas');
			$flag = false;
			$message  = "Problemática eliminada con éxito";
			$type = "success";
		}
	//}
	$this->ltsProblematicas($flag, $message, $type);	
}	

/*--------------------Vista asociar miembro a problematica--------------------------------------------*/
public function v_ascMiembro($numeroProblema){   
	$data['bmiembro']=$this->user_model->m_bancomiembro($numeroProblema);
	$data['resp']=$this->user_model->responsables();
	$data['ctrlpag']="problema";
	$data['ltspag']="ltsproblema";
	$data['numProb'] = $numeroProblema;
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('problematicas/asocMiembro', $data);
	$this->load->view('viewfooter');
}

/*-------------------Asociar miembro a problematica------------------------*/
public function ascMiembro(){
	$miembros_array = $_REQUEST['miembros'];
	
	$i=0;
	foreach ($miembros_array as $valorMiembro){
		$dato = array(
			'datospersonales_ci' => $miembros_array[$i],
			'bancoproblemas_numeroProblema' =>$this->input->post('numeroProblema')
		);
		$this->db->insert('bancomiembro', $dato);
		$i++;
	}
	$flag = false;
	$message  = "Miembro(s) asociados con éxito";
	$type = True;
	
	$this->ltsProblematicas($flag, $message, $type);
}

/*--------------------Vista desvincular miembro a problematica--------------------------------------------*/
public function v_desvMiembro($numeroProblema){   
	$data['bmiembro']=$this->user_model->m_bancomiembro($numeroProblema);
	$data['resp']=$this->user_model->responsables();
	$data['ctrlpag']="problema";
	$data['ltspag']="ltsproblema";
	$data['numProb'] = $numeroProblema;
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('problematicas/desvincMiembro', $data);
	$this->load->view('viewfooter');
}

/*-------------------Desvincular miembro a problematica-------------------------*/
public function desvMiembro(){
	$miembros_array = $_REQUEST['miembros'];
	
	$i=0;
	foreach ($miembros_array as $valorMiembro){
		$this->db->where('bancoproblemas_numeroProblema', $this->input->post('numeroProblema'));
		$this->db->where('datospersonales_ci', $miembros_array[$i]);
		$this->db->delete('bancomiembro');
		$i++;
	}
	$flag = false;
	$message  = "Miembro(s) desvincuado(s) con éxito";
	$type = True;
	
	$this->ltsProblematicas($flag, $message, $type);
}

/*-------------------Desvincular problematica mediante miembro--------------------------------*/
public function desvProblematicaMiembro($ci, $numProb){
	$pag = "problematicas";
	$this->db->where('bancoproblemas_numeroProblema', $numProb);
	$this->db->where('datospersonales_ci', $ci);
	$this->db->delete('bancomiembro');
	$flag = false;
	$message  = "Problemática desvinculada del miembro con éxito";
	$type = "success";
	$this->viewResponsable($flag, $message, $type, $ci, $pag );
}

/*---------------------Vista insertar problematica-------------------------------------------*/
public function v_i_ProblematicaM($ci){   
	$data['cim'] = $ci;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('problematicas/insProblematicaM', $data);
	$this->load->view('viewfooter');
}

/*---------------Insertar Problematica mediante miembro-------------------------------------------------*/
public function insProblematicaM(){  
	$pag = "problematicas";
	$dato = array(
		'organo' =>$this->input->post('organo') ,
		'problematica' =>$this->input->post('problematica') ,
		'programa' =>$this->input->post('programa') ,
		'prioridades' =>$this->input->post('prioridades') 
	);
	$this->db->insert('bancoproblemas', $dato);

	$probLastId = $this->db->insert_id();

	$dato1 = array(
		'datospersonales_ci' =>$this->input->post('cim') ,
		'bancoproblemas_numeroProblema' => $probLastId
	);
	$this->db->insert('bancomiembro', $dato1);

	$flag = false;
	$message  = "Problemática insertada con éxito";
	$type = True;

	$this->viewResponsable($flag, $message, $type, $this->input->post('cim') , $pag );
}

/*--------------------Vista actualizar problematica--------------------------------------------*/
public function v_e_ProblematicaM($numeroProblema, $ci){   
	$data['p']=$this->user_model->m_problematicas($numeroProblema);
	$data['cim']=$ci;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('problematicas/edtProblematicaM', $data);
	$this->load->view('viewfooter');
}

/*-----------------------Actualizar problematica-----------------------------------------*/
public function edtProblematicaM(){
	$pag = "problematicas";
	$dato = array(
		'organo' =>$this->input->post('organo') ,
		'problematica' =>$this->input->post('problematica') ,
		'programa' =>$this->input->post('programa') ,
		'prioridades' =>$this->input->post('prioridades') 
	);
	$this->db->where('numeroProblema', $this->input->post('numeroProblema') );
	$this->db->update('bancoproblemas', $dato);
	
	$flag = false;
	$message  = "Problemática editada con éxito";
	$type = "success";

	$this->viewResponsable($flag, $message, $type, $this->input->post('cim'), $pag );
	
}

/*--------------------Vista actualizar exp profesional--------------------------------------------*/
public function v_e_ExpProfesionalM($ci, $idExp){   
	$data['experiencia']=$this->user_model->m_ExpProfesionalesM($idExp, $ci);
	$data['cim']=$ci;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('expprofesionales/edtExpProfesionalesM', $data);
	$this->load->view('viewfooter');
}

/*-----------------------Actualizar exp profesional-----------------------------------------*/
public function edtExpProfesionalM(){
	$pag = "expprofesional";
	$dato = array(
		'centroLaboral' =>$this->input->post('centrolaboral') ,
		'cargoOcupa' =>$this->input->post('cargo') ,
		'fechaDesde' =>$this->input->post('fechaDesde') ,
		'fechaHasta' =>$this->input->post('fechaHasta') 
	);
	$this->db->where('idexperienciaProfesional ', $this->input->post('idexp') );
	$this->db->where('datosPersonales_ci  ', $this->input->post('cim') );
	$this->db->update('experienciaprofesional', $dato);
	
	$flag = false;
	$message  = "Experiencia profesional editada con éxito";
	$type = "success";

	$this->viewResponsable($flag, $message, $type, $this->input->post('cim'), $pag );

}

/*---------------------Vista insertar problematica-------------------------------------------*/
public function v_i_ExpProfesionalM($ci){   
	$data['cim'] = $ci;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('expprofesionales/insExpProfesionalesM', $data);
	$this->load->view('viewfooter');
}

/*---------------Insertar Problematica mediante miembro-------------------------------------------------*/
public function insExpProfesionalM(){  
	$pag = "expprofesional";
	$dato = array(
		'datosPersonales_ci ' =>$this->input->post('cim') ,
		'centroLaboral' =>$this->input->post('centrolaboral') ,
		'cargoOcupa' =>$this->input->post('cargo') ,
		'fechaDesde' =>$this->input->post('fechaDesde') ,
		'fechaHasta' =>$this->input->post('fechaHasta') 
	);
	$this->db->insert('experienciaprofesional', $dato);

	$flag = false;
	$message  = "Experiencia profesional insertada con éxito";
	$type = True;

	$this->viewResponsable($flag, $message, $type, $this->input->post('cim') , $pag );
}

/*------------------Elimiar exp profesional----------------------------------------------*/
public function delExpProfesionalM($ci, $idExp){
	$pag = "expprofesional";
	$this->db->where('idexperienciaProfesional', $idExp);
	$this->db->delete('experienciaprofesional');
	$flag = false;
	$message  = "Experiencia profesional eliminada con éxito";
	$type = "success";
		
	$this->viewResponsable($flag, $message, $type, $ci, $pag );
}

/*--------------------Vista actualizar tesis--------------------------------------------*/
public function v_e_TesisM($ci, $idExp){   
	$data['tesis']=$this->user_model->m_TesisM($idExp, $ci);
	$data['cim']=$ci;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('tesis/edtTesisM', $data);
	$this->load->view('viewfooter');
}

/*-----------------------Actualizar tesis-----------------------------------------*/
public function edtTesisM(){
	$pag = "tesis";
	$dato = array(
		'centroEstudio' =>$this->input->post('centroestudio') ,
		'titulo' =>$this->input->post('titulo') ,
		'tipoAutor' =>$this->input->post('tipoautor') ,
		'fechaDefensa' =>$this->input->post('fechaDefensa') ,
		'clasificacion' =>$this->input->post('clasificacion') ,
		'centroReferencia' =>$this->input->post('centroReferencia') 
	);
	$this->db->where('idtesis', $this->input->post('idt') );
	$this->db->where('datosPersonales_ci', $this->input->post('cim') );
	$this->db->update('tesis', $dato);
	
	$flag = false;
	$message  = "Tesis editada con éxito";
	$type = "success";

	$this->viewResponsable($flag, $message, $type, $this->input->post('cim'), $pag );

}

/*---------------------Vista insertar tesis-------------------------------------------*/
public function v_i_TesisM($ci){   
	$data['cim'] = $ci;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('tesis/insTesisM', $data);
	$this->load->view('viewfooter');
}

/*---------------Insertar tesis-------------------------------------------------*/
public function insTesisM(){  
	$pag = "tesis";
	$dato = array(
		'datosPersonales_ci' =>$this->input->post('cim') ,
		'centroEstudio' =>$this->input->post('centroestudio') ,
		'titulo' =>$this->input->post('titulo') ,
		'tipoAutor' =>$this->input->post('tipoautor') ,
		'fechaDefensa' =>$this->input->post('fechaDefensa') ,
		'clasificacion' =>$this->input->post('clasificacion') ,
		'centroReferencia' =>$this->input->post('centroReferencia') 
	);
	$this->db->insert('tesis', $dato);

	$flag = false;
	$message  = "Tesis insertada con éxito";
	$type = True;

	$this->viewResponsable($flag, $message, $type, $this->input->post('cim'), $pag  );
}

/*------------------Elimiar tesis----------------------------------------------*/
public function delTesisM($idt, $ci){
	$pag = "tesis";
	$this->db->where('idtesis', $idt);
	$this->db->delete('tesis');
	$flag = false;
	$message  = "Tesis eliminada con éxito";
	$type = "success";
		
	$this->viewResponsable($flag, $message, $type, $ci, $pag );
}

/*---------------------Vista insertar Innovacion-------------------------------------------*/
public function v_i_InnovacionM($ci){   
	$data['cim'] = $ci;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('innovaciones/insInnovacionesM', $data);
	$this->load->view('viewfooter');
}

/*---------------Insertar Innovacion-------------------------------------------------*/
public function insInnovacionM(){  
	$pag = "innovaciones";
	$dato = array(
		'datosPersonales_ci' =>$this->input->post('cim') ,
		'tipo' =>$this->input->post('tipoinnovacion') ,
		'denominacion' =>$this->input->post('denominacion') ,
		'fechaInicio' =>$this->input->post('fechaInicio') ,
		'fechaFin' =>$this->input->post('fechaFin') ,
		'clasificacion' =>$this->input->post('clasificacion') ,
		'solucionNoIdent' =>$this->input->post('solNoIdent')
	);
	$this->db->insert('innovacion', $dato);

	$flag = false;
	$message  = "Innovación insertada con éxito";
	$type = True;

	$this->viewResponsable($flag, $message, $type, $this->input->post('cim'), $pag  );
}

/*--------------------Vista actualizar Innovacion--------------------------------------------*/
public function v_e_InnovacionM($ci, $idExp){   
	$data['innovacion']=$this->user_model->m_InnovacionM($idExp, $ci);
	$data['cim']=$ci;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('innovaciones/edtInnovacionesM', $data);
	$this->load->view('viewfooter');
}

/*-----------------------Actualizar Innovacion-----------------------------------------*/
public function edtInnovacionM(){
	$pag = "innovaciones";
	$dato = array(
		'datosPersonales_ci' =>$this->input->post('cim') ,
		'tipo' =>$this->input->post('tipoinnovacion') ,
		'denominacion' =>$this->input->post('denominacion') ,
		'fechaInicio' =>$this->input->post('fechaInicio') ,
		'fechaFin' =>$this->input->post('fechaFin') ,
		'clasificacion' =>$this->input->post('clasificacion') ,
		'solucionNoIdent' =>$this->input->post('solNoIdent')
	);
	$this->db->where('idinnovacion ', $this->input->post('idinnov') );
	$this->db->where('datosPersonales_ci', $this->input->post('cim') );
	$this->db->update('innovacion', $dato);
	
	$flag = false;
	$message  = "Innovación editada con éxito";
	$type = "success";

	$this->viewResponsable($flag, $message, $type, $this->input->post('cim'), $pag );

}

/*------------------Elimiar Innovacion----------------------------------------------*/
public function delInnovacionM($idinnov, $ci){
	$pag = "innovaciones";
	$this->db->where('idinnovacion', $idinnov);
	$this->db->delete('innovacion');
	$flag = false;
	$message  = "Innovación eliminada con éxito";
	$type = "success";
		
	$this->viewResponsable($flag, $message, $type, $ci, $pag );
}

/*---------------------Vista insertar Asociacion-------------------------------------------*/
public function v_i_AsociacionM($ci){   
	$data['cim'] = $ci;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('asociaciones/insAsociacionM', $data);
	$this->load->view('viewfooter');
}

/*---------------Insertar Asociacion-------------------------------------------------*/
public function insAsociacionM(){  
	$pag = "organizaciones";
	$dato = array(
		'datosPersonales_ci' =>$this->input->post('cim') ,
		'nivel' =>$this->input->post('nivel') ,
		'cargo' =>$this->input->post('cargo') 
	);
	$this->db->insert('asociacionprofesional', $dato);

	$flag = false;
	$message  = "Asociación profesional insertada con éxito";
	$type = True;

	$this->viewResponsable($flag, $message, $type, $this->input->post('cim'), $pag  );
}

/*--------------------Vista actualizar Asociacion--------------------------------------------*/
public function v_e_AsociacionM($ci, $idExp){   
	$data['asociacion']=$this->user_model->m_AsociacionM($idExp, $ci);
	$data['cim']=$ci;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('asociaciones/edtAsociacionM', $data);
	$this->load->view('viewfooter');
}

/*-----------------------Actualizar Asociacion-----------------------------------------*/
public function edtAsociacionM(){
	$pag = "organizaciones";
	$dato = array(
		'datosPersonales_ci' =>$this->input->post('cim') ,
		'nivel' =>$this->input->post('nivel') ,
		'cargo' =>$this->input->post('cargo') 
	);
	$this->db->where('idasociacionProfesional', $this->input->post('idiasoc') );
	$this->db->where('datosPersonales_ci', $this->input->post('cim') );
	$this->db->update('asociacionprofesional', $dato);
	
	$flag = false;
	$message  = "Asociación profesional editada con éxito";
	$type = "success";

	$this->viewResponsable($flag, $message, $type, $this->input->post('cim'), $pag );

}

/*------------------Elimiar Asociacion----------------------------------------------*/
public function delAsociacionM($ci, $idasoc){
	$pag = "organizaciones";
	$this->db->where('idasociacionProfesional', $idasoc);
	$this->db->delete('asociacionprofesional');
	$flag = false;
	$message  = "Asociación profesional eliminada con éxito";
	$type = "success";
		
	$this->viewResponsable($flag, $message, $type, $ci, $pag );
}

/*---------------------Vista insertar Organizacion-------------------------------------------*/
public function v_i_OrganizacionM($ci){   
	$data['cim'] = $ci;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('asociaciones/insOrganizacionM', $data);
	$this->load->view('viewfooter');
}

/*---------------Insertar Organizacion-------------------------------------------------*/
public function insOrganizacionM(){  
	$pag = "organizaciones";
	$dato = array(
		'datosPersonales_ci' =>$this->input->post('cim') ,
		'nombreOM' =>$this->input->post('nombre') ,
		'cargo' =>$this->input->post('cargo') 
	);
	$this->db->insert('organizacionesmasa', $dato);

	$flag = false;
	$message  = "Organización insertada con éxito";
	$type = True;

	$this->viewResponsable($flag, $message, $type, $this->input->post('cim'), $pag  );
}

/*--------------------Vista actualizar Organizacion--------------------------------------------*/
public function v_e_OrganizacionM($ci, $idExp){   
	$data['organiz']=$this->user_model->m_OrganizacionM($idExp, $ci);
	$data['cim']=$ci;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('asociaciones/edtOrganizacionM', $data);
	$this->load->view('viewfooter');
}

/*-----------------------Actualizar Organizacion-----------------------------------------*/
public function edtOrganizacionM(){
	$pag = "organizaciones";
	$dato = array(
		'datosPersonales_ci' =>$this->input->post('cim') ,
		'nombreOM' =>$this->input->post('nombre') ,
		'cargo' =>$this->input->post('cargo') 
	);
	$this->db->where('idorganizacionesMasa', $this->input->post('idiasoc') );
	$this->db->where('datosPersonales_ci', $this->input->post('cim') );
	$this->db->update('organizacionesmasa', $dato);
	
	$flag = false;
	$message  = "Organización editada con éxito";
	$type = "success";

	$this->viewResponsable($flag, $message, $type, $this->input->post('cim'), $pag );

}

/*------------------Elimiar Organizacion----------------------------------------------*/
public function delOrganizacionM($ci, $idasoc){
	$pag = "organizaciones";
	$this->db->where('idorganizacionesMasa', $idasoc);
	$this->db->delete('organizacionesmasa');
	$flag = false;
	$message  = "Organización eliminada con éxito";
	$type = "success";
		
	$this->viewResponsable($flag, $message, $type, $ci, $pag );
}

/*---------------------Vista insertar Publicacion-------------------------------------------*/
public function v_i_PublicacionM($ci){   
	$data['cim'] = $ci;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('publicaciones/insPublicacionM', $data);
	$this->load->view('viewfooter');
}

/*---------------Insertar Publicacion-------------------------------------------------*/
public function insPublicacionM(){  
	$pag = "publicaciones";
	$dato = array(
		'datosPersonales_ci' =>$this->input->post('cim') ,
		'titulo' =>$this->input->post('titulo') ,
		'nivel' =>$this->input->post('nivel') ,
		'fecha' =>$this->input->post('fechaDefensa') ,
		'url' =>$this->input->post('url') ,
		'isbnISSN' =>$this->input->post('isbn') ,
		'tipoPublicacion' =>$this->input->post('tipo') 
	);
	$this->db->insert('publicaciones', $dato);

	$flag = false;
	$message  = "Publicación insertada con éxito";
	$type = True;

	$this->viewResponsable($flag, $message, $type, $this->input->post('cim'), $pag  );
}

/*--------------------Vista actualizar Publicacion--------------------------------------------*/
public function v_e_PublicacionM($ci, $idExp){   
	$data['public']=$this->user_model->m_PublicacionM($idExp, $ci);
	$data['cim']=$ci;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('publicaciones/edtPublicacionM', $data);
	$this->load->view('viewfooter');
}

/*-----------------------Actualizar Publicacion-----------------------------------------*/
public function edtPublicacionM(){
	$pag = "publicaciones";
	$dato = array(
		'datosPersonales_ci' =>$this->input->post('cim') ,
		'titulo' =>$this->input->post('titulo') ,
		'nivel' =>$this->input->post('nivel') ,
		'fecha' =>$this->input->post('fechaDefensa') ,
		'url' =>$this->input->post('url') ,
		'isbnISSN' =>$this->input->post('isbn') ,
		'tipoPublicacion' =>$this->input->post('tipo') 
	);
	$this->db->where('idpublicaciones', $this->input->post('idp') );
	$this->db->where('datosPersonales_ci', $this->input->post('cim') );
	$this->db->update('publicaciones', $dato);
	
	$flag = false;
	$message  = "Publicación editada con éxito";
	$type = "success";

	$this->viewResponsable($flag, $message, $type, $this->input->post('cim'), $pag );

}

/*------------------Elimiar Publicacion----------------------------------------------*/
public function delPublicacionM($ci, $idasoc){
	$pag = "publicaciones";
	$this->db->where('idpublicaciones', $idasoc);
	$this->db->delete('publicaciones');
	$flag = false;
	$message  = "Publicación eliminada con éxito";
	$type = "success";
		
	$this->viewResponsable($flag, $message, $type, $ci, $pag );
}

/*---------------------Vista insertar Proyecto-------------------------------------------*/
public function v_i_ProyectoM($ci){   
	$data['cim'] = $ci;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('proyectos/insProyectoM', $data);
	$this->load->view('viewfooter');
}

/*---------------Insertar Proyecto-------------------------------------------------*/
public function insProyectoM(){  
	$pag = "proyectos";
	$dato = array(
		'datosPersonales_ci' =>$this->input->post('cim') ,
		'denomicacion' =>$this->input->post('denomicacion') ,
		'tipoProyecto' =>$this->input->post('tipoProyecto') ,
		'tipoTProyecto' =>$this->input->post('tipoTProyecto') 
	);
	$this->db->insert('proyecto', $dato);

	$flag = false;
	$message  = "Proyecto insertado con éxito";
	$type = True;

	$this->viewResponsable($flag, $message, $type, $this->input->post('cim'), $pag  );
}

/*--------------------Vista actualizar Proyecto--------------------------------------------*/
public function v_e_ProyectoM($ci, $idExp){   
	$data['proy']=$this->user_model->m_ProyectoM($idExp, $ci);
	$data['cim']=$ci;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('proyectos/edtProyectoM', $data);
	$this->load->view('viewfooter');
}

/*-----------------------Actualizar Proyecto-----------------------------------------*/
public function edtProyectoM(){
	$pag = "proyectos";
	$dato = array(
		'datosPersonales_ci' =>$this->input->post('cim') ,
		'denomicacion' =>$this->input->post('denomicacion') ,
		'tipoProyecto' =>$this->input->post('tipoProyecto') ,
		'tipoTProyecto' =>$this->input->post('tipoTProyecto') 
	);
	$this->db->where('idproyecto', $this->input->post('idp') );
	$this->db->where('datosPersonales_ci', $this->input->post('cim') );
	$this->db->update('proyecto', $dato);
	
	$flag = false;
	$message  = "Proyecto editado con éxito";
	$type = "success";

	$this->viewResponsable($flag, $message, $type, $this->input->post('cim'), $pag );

}

/*------------------Elimiar Proyecto----------------------------------------------*/
public function delProyectoM($ci, $idasoc){
	$pag = "proyectos";
	$this->db->where('idproyecto', $idasoc);
	$this->db->delete('proyecto');
	$flag = false;
	$message  = "Proyecto eliminado con éxito";
	$type = "success";
		
	$this->viewResponsable($flag, $message, $type, $ci, $pag );
}

/*---------------------Vista insertar Idioma-------------------------------------------*/
public function v_i_IdiomaM($ci){   
	$data['cim'] = $ci;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('idioma/insIdiomaM', $data);
	$this->load->view('viewfooter');
}

/*---------------Insertar Idioma-------------------------------------------------*/
public function insIdiomaM(){  
	$pag = "idiomas";
	$dato = array(
		'datosPersonales_ci' =>$this->input->post('cim') ,
		'nombre' =>$this->input->post('nombre') ,
		'calficHabla' =>$this->input->post('habla') ,
		'califLee' =>$this->input->post('lee') ,
		'califEscribe' =>$this->input->post('escribe') 
	);
	$this->db->insert('idioma', $dato);

	$flag = false;
	$message  = "Idioma insertado con éxito";
	$type = True;

	$this->viewResponsable($flag, $message, $type, $this->input->post('cim'), $pag  );
}

/*--------------------Vista actualizar Idioma--------------------------------------------*/
public function v_e_IdiomaM($ci, $idExp){   
	$data['idioma']=$this->user_model->m_IdiomaM($idExp, $ci);
	$data['cim']=$ci;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('idioma/edtIdiomaM', $data);
	$this->load->view('viewfooter');
}

/*-----------------------Actualizar Idioma-----------------------------------------*/
public function edtIdiomaM(){
	$pag = "idiomas";
	$dato = array(
		'datosPersonales_ci' =>$this->input->post('cim') ,
		'nombre' =>$this->input->post('nombre') ,
		'calficHabla' =>$this->input->post('habla') ,
		'califLee' =>$this->input->post('lee') ,
		'califEscribe' =>$this->input->post('escribe') 
	);
	$this->db->where('ididioma', $this->input->post('idp') );
	$this->db->where('datosPersonales_ci', $this->input->post('cim') );
	$this->db->update('idioma', $dato);
	
	$flag = false;
	$message  = "Idioma editado con éxito";
	$type = "success";

	$this->viewResponsable($flag, $message, $type, $this->input->post('cim'), $pag );

}

/*------------------Elimiar Idioma----------------------------------------------*/
public function delIdiomaM($ci, $idasoc){
	$pag = "idiomas";
	$this->db->where('ididioma', $idasoc);
	$this->db->delete('idioma');
	$flag = false;
	$message  = "Idioma eliminado con éxito";
	$type = "success";
		
	$this->viewResponsable($flag, $message, $type, $ci, $pag );
}

/*---------------------Vista insertar Colaboracion-------------------------------------------*/
public function v_i_ColaboracionM($ci){   
	$data['cim'] = $ci;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('colaboraciones/insColaboracionM', $data);
	$this->load->view('viewfooter');
}

/*---------------Insertar Colaboracion-------------------------------------------------*/
public function insColaboracionM(){  
	$pag = "colaboraciones";
	$dato = array(
		'datosPersonales_ci' =>$this->input->post('cim') ,
		'tipo' =>$this->input->post('tipo') ,
		'fechaInicio' =>$this->input->post('fechaDesde') ,
		'fechaFin' =>$this->input->post('fechaHasta') 
	);
	$this->db->insert('colabfunciondireccion', $dato);

	$flag = false;
	$message  = "Colaboración insertada con éxito";
	$type = True;

	$this->viewResponsable($flag, $message, $type, $this->input->post('cim'), $pag  );
}

/*--------------------Vista actualizar Colaboracion--------------------------------------------*/
public function v_e_ColaboracionM($ci, $idExp){   
	$data['colab']=$this->user_model->m_ColaboracionM($idExp, $ci);
	$data['cim']=$ci;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('colaboraciones/edtColaboracionM', $data);
	$this->load->view('viewfooter');
}

/*-----------------------Actualizar Colaboracion-----------------------------------------*/
public function edtColaboracionM(){
	$pag = "colaboraciones";
	$dato = array(
		'datosPersonales_ci' =>$this->input->post('cim') ,
		'tipo' =>$this->input->post('tipo') ,
		'fechaInicio' =>$this->input->post('fechaDesde') ,
		'fechaFin' =>$this->input->post('fechaHasta') 
	);
	$this->db->where('idcolaboracion', $this->input->post('idp') );
	$this->db->where('datosPersonales_ci', $this->input->post('cim') );
	$this->db->update('colabfunciondireccion', $dato);
	
	$flag = false;
	$message  = "Colaboración editada con éxito";
	$type = "success";

	$this->viewResponsable($flag, $message, $type, $this->input->post('cim'), $pag );

}

/*------------------Elimiar Colaboracion----------------------------------------------*/
public function delColaboracionM($ci, $idasoc){
	$pag = "colaboraciones";
	$this->db->where('idcolaboracion', $idasoc);
	$this->db->delete('colabfunciondireccion');
	$flag = false;
	$message  = "Colaboración eliminada con éxito";
	$type = "success";
		
	$this->viewResponsable($flag, $message, $type, $ci, $pag );
}

/*---------------------Vista insertar Asesorias-------------------------------------------*/
public function v_i_AsesoriasM($ci){   
	$data['cim'] = $ci;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('asesorias/insAsesoriasM', $data);
	$this->load->view('viewfooter');
}

/*---------------Insertar Asesorias-------------------------------------------------*/
public function insAsesoriasM(){  
	$pag = "asesorias";
	$dato = array(
		'datosPersonales_ci' =>$this->input->post('cim') ,
		'nombreTrabajo' =>$this->input->post('trabajo') ,
		'fehca' =>$this->input->post('fecha') 
	);
	$this->db->insert('asesorias', $dato);

	$flag = false;
	$message  = "Asesoría insertada con éxito";
	$type = True;

	$this->viewResponsable($flag, $message, $type, $this->input->post('cim'), $pag  );
}

/*--------------------Vista actualizar Asesorias--------------------------------------------*/
public function v_e_AsesoriasM($ci, $idExp){   
	$data['asesorias']=$this->user_model->m_AsesoriasM($idExp, $ci);
	$data['cim']=$ci;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('asesorias/edtAsesoriasM', $data);
	$this->load->view('viewfooter');
}

/*-----------------------Actualizar Asesorias-----------------------------------------*/
public function edtAsesoriasM(){
	$pag = "asesorias";
	$dato = array(
		'datosPersonales_ci' =>$this->input->post('cim') ,
		'nombreTrabajo' =>$this->input->post('trabajo') ,
		'fehca' =>$this->input->post('fecha') 
	);
	$this->db->where('idasesorias', $this->input->post('idp') );
	$this->db->where('datosPersonales_ci', $this->input->post('cim') );
	$this->db->update('asesorias', $dato);
	
	$flag = false;
	$message  = "Asesoría editada con éxito";
	$type = "success";

	$this->viewResponsable($flag, $message, $type, $this->input->post('cim'), $pag );

}

/*------------------Elimiar Asesorias----------------------------------------------*/
public function delAsesoriasM($ci, $idasoc){
	$pag = "asesorias";
	$this->db->where('idasesorias', $idasoc);
	$this->db->delete('asesorias');
	$flag = false;
	$message  = "Asesoría eliminada con éxito";
	$type = "success";
		
	$this->viewResponsable($flag, $message, $type, $ci, $pag );
}

/*---------------------Vista insertar Evento-------------------------------------------*/
public function v_i_EventoM($ci){   
	$data['cim'] = $ci;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('eventos/insEventoM', $data);
	$this->load->view('viewfooter');
}

/*---------------Insertar Evento-------------------------------------------------*/
public function insEventoM(){  
	$pag = "eventos";
	$dato = array(
		'datosPersonales_ci' =>$this->input->post('cim') ,
		'tipoEvento' =>$this->input->post('tipo') ,
		'fecha' =>$this->input->post('fecha') ,
		'lugar' =>$this->input->post('lugar') ,
		'participacion' =>$this->input->post('tipop') ,
		'denominacion' =>$this->input->post('denominiacion') 
	);
	$this->db->insert('eventos', $dato);

	$flag = false;
	$message  = "Evento insertado con éxito";
	$type = True;

	$this->viewResponsable($flag, $message, $type, $this->input->post('cim'), $pag  );
}

/*--------------------Vista actualizar Evento--------------------------------------------*/
public function v_e_EventoM($ci, $idExp){   
	$data['eventos']=$this->user_model->m_EventoM($idExp, $ci);
	$data['cim']=$ci;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('eventos/edtEventoM', $data);
	$this->load->view('viewfooter');
}

/*-----------------------Actualizar Evento-----------------------------------------*/
public function edtEventoM(){
	$pag = "eventos";
	$dato = array(
		'datosPersonales_ci' =>$this->input->post('cim') ,
		'tipoEvento' =>$this->input->post('tipo') ,
		'fecha' =>$this->input->post('fecha') ,
		'lugar' =>$this->input->post('lugar') ,
		'participacion' =>$this->input->post('tipop') ,
		'denominacion' =>$this->input->post('denominiacion') 
	);
	$this->db->where('ideventos', $this->input->post('idp') );
	$this->db->where('datosPersonales_ci', $this->input->post('cim') );
	$this->db->update('eventos', $dato);
	
	$flag = false;
	$message  = "Evento editado con éxito";
	$type = "success";

	$this->viewResponsable($flag, $message, $type, $this->input->post('cim'), $pag );

}

/*------------------Elimiar Evento----------------------------------------------*/
public function delEventoM($ci, $idasoc){
	$pag = "eventos";
	$this->db->where('ideventos', $idasoc);
	$this->db->delete('eventos');
	$flag = false;
	$message  = "Evento eliminado con éxito";
	$type = "success";
		
	$this->viewResponsable($flag, $message, $type, $ci, $pag );
}

/*---------------------Vista insertar Investigacion-------------------------------------------*/
public function v_i_InvestigacionM($ci){   
	$data['cim'] = $ci;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('investigaciones/insInvestigacionM', $data);
	$this->load->view('viewfooter');
}

/*---------------Insertar Investigacion-------------------------------------------------*/
public function insInvestigacionM(){  
	$pag = "investigaciones";
	$dato = array(
		'datosPersonales_ci' =>$this->input->post('cim') ,
		'nombreInvestigacion' =>$this->input->post('trabajo') ,
		'anno' =>$this->input->post('anno') 
	);
	$this->db->insert('investigacionesrealizadas', $dato);

	$flag = false;
	$message  = "Investigación insertada con éxito";
	$type = True;

	$this->viewResponsable($flag, $message, $type, $this->input->post('cim'), $pag  );
}

/*--------------------Vista actualizar Investigacion--------------------------------------------*/
public function v_e_InvestigacionM($ci, $idExp){   
	$data['investig']=$this->user_model->m_InvestigacionM($idExp, $ci);
	$data['cim']=$ci;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('investigaciones/edtInvestigacionM', $data);
	$this->load->view('viewfooter');
}

/*-----------------------Actualizar Investigacion-----------------------------------------*/
public function edtInvestigacionM(){
	$pag = "investigaciones";
	$dato = array(
		'datosPersonales_ci' =>$this->input->post('cim') ,
		'nombreInvestigacion' =>$this->input->post('trabajo') ,
		'anno' =>$this->input->post('anno') 
	);
	$this->db->where('idinvestigacionesRealizadas', $this->input->post('idp') );
	$this->db->where('datosPersonales_ci', $this->input->post('cim') );
	$this->db->update('investigacionesrealizadas', $dato);
	
	$flag = false;
	$message  = "Investigación editada con éxito";
	$type = "success";

	$this->viewResponsable($flag, $message, $type, $this->input->post('cim'), $pag );

}

/*------------------Elimiar Investigacion----------------------------------------------*/
public function delInvestigacionM($ci, $idasoc){
	$pag = "investigaciones";
	$this->db->where('idinvestigacionesRealizadas', $idasoc);
	$this->db->delete('investigacionesrealizadas');
	$flag = false;
	$message  = "Investigación eliminada con éxito";
	$type = "success";
		
	$this->viewResponsable($flag, $message, $type, $ci, $pag );
}

/*---------------------Vista insertar Reconocimiento-------------------------------------------*/
public function v_i_ReconocimientoM($ci){   
	$data['cim'] = $ci;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('reconocimientos/insReconocimientoM', $data);
	$this->load->view('viewfooter');
}

/*---------------Insertar Reconocimiento-------------------------------------------------*/
public function insReconocimientoM(){  
	$pag = "reconocimientos";
	if($this->input->post('tipo') == "Otro"){
		$dato = array(
			'datosPersonales_ci' =>$this->input->post('cim') ,
			'tipoReconocimiento' =>$this->input->post('tipoesp') ,
			'fecha' =>$this->input->post('fechaDefensa') ,
			'denominacion' =>$this->input->post('centroReferencia') 
		);
	}
	else{
		$dato = array(
			'datosPersonales_ci' =>$this->input->post('cim') ,
			'tipoReconocimiento' =>$this->input->post('tipo') ,
			'fecha' =>$this->input->post('fechaDefensa') ,
			'denominacion' =>$this->input->post('centroReferencia') 
		);
	}

	$this->db->insert('reconocimientos', $dato);

	$flag = false;
	$message  = "Reconocimiento insertado con éxito";
	$type = True;

	$this->viewResponsable($flag, $message, $type, $this->input->post('cim'), $pag  );
}

/*--------------------Vista actualizar Reconocimiento--------------------------------------------*/
public function v_e_ReconocimientoM($ci, $idExp){   
	$data['reconocimiento']=$this->user_model->m_ReconocimientoM($idExp, $ci);
	$data['cim']=$ci;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('reconocimientos/edtReconocimientoM', $data);
	$this->load->view('viewfooter');
}

/*-----------------------Actualizar Reconocimiento-----------------------------------------*/
public function edtReconocimientoM(){
	$pag = "reconocimientos";
	if($this->input->post('tipo') == "Otro"){
		$dato = array(
			'tipoReconocimiento' =>$this->input->post('tipoesp') ,
			'fecha' =>$this->input->post('fechaDefensa') ,
			'denominacion' =>$this->input->post('centroReferencia') 
		);
	}
	else{
		$dato = array(
			'tipoReconocimiento' =>$this->input->post('tipo') ,
			'fecha' =>$this->input->post('fechaDefensa') ,
			'denominacion' =>$this->input->post('centroReferencia') 
		);
	}
	
	$this->db->where('idreconocimientos', $this->input->post('idt') );
	$this->db->update('reconocimientos', $dato);
	
	$flag = false;
	$message  = "Reconocimiento editado con éxito";
	$type = "success";

	$this->viewResponsable($flag, $message, $type, $this->input->post('cim'), $pag );

}

/*------------------Elimiar Reconocimiento----------------------------------------------*/
public function delReconocimientoM($ci, $idasoc){
	$pag = "reconocimientos";
	$this->db->where('idreconocimientos', $idasoc);
	$this->db->delete('reconocimientos');
	$flag = false;
	$message  = "Reconocimiento eliminado con éxito";
	$type = "success";
		
	$this->viewResponsable($flag, $message, $type, $ci, $pag );
}

/*---------------------Vista insertar Ocupacion-------------------------------------------*/
public function v_i_OcupacionM($ci){   
	$data['cim'] = $ci;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('ocupacion/insOcupacionM', $data);
	$this->load->view('viewfooter');
}

/*---------------Insertar Ocupacion-------------------------------------------------*/
public function insOcupacionM(){  
	$pag = "ocupacion";
	$dato = array(
		'datosPersonales_ci' =>$this->input->post('cim') ,
		'ocupacion' =>$this->input->post('ocupacion') ,
		'fecha' =>$this->input->post('fechaInicio')
	);
	$this->db->insert('ocupacion', $dato);

	$flag = false;
	$message  = "Ocupación insertada con éxito";
	$type = True;

	$this->viewResponsable($flag, $message, $type, $this->input->post('cim'), $pag  );
}

/*--------------------Vista actualizar Ocupacion--------------------------------------------*/
public function v_e_OcupacionM($idocup, $ci){   
	$data['ocupaciones']=$this->user_model->m_OcupacionM($idocup, $ci);
	$data['cim']=$ci;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('ocupacion/edtOcupacionM', $data);
	$this->load->view('viewfooter');
}

/*-----------------------Actualizar Ocupacion-----------------------------------------*/
public function edtOcupacionM(){
	$pag = "ocupacion";
	$dato = array(
		'datosPersonales_ci' =>$this->input->post('cim') ,
		'ocupacion' =>$this->input->post('ocupacion') ,
		'fecha' =>$this->input->post('fechaInicio')
	);
	
	$this->db->where('idocupacion', $this->input->post('idm') );
	$this->db->update('ocupacion', $dato);
	$flag = false;
	$message  = "Ocupación editada con éxito";
	$type = "success";

	$this->viewResponsable($flag, $message, $type, $this->input->post('cim'), $pag );

}

/*------------------Elimiar Ocupacion----------------------------------------------*/
public function delOcupacion($ci, $idasoc){
	$pag = "ocupacion";
	$this->db->where('idocupacion', $idasoc);
	$this->db->delete('ocupacion');
	$flag = false;
	$message  = "Ocupación eliminada con éxito";
	$type = "success";
		
	$this->viewResponsable($flag, $message, $type, $ci, $pag );
}

/*---------------------Vista insertar Actividad-------------------------------------------*/
public function v_i_ActividadM($ci){   
	$data['cim'] = $ci;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('actividades/insActividadM', $data);
	$this->load->view('viewfooter');
}

/*---------------Insertar Actividad-------------------------------------------------*/
public function insActividadM(){  
	$pag = "actividades";
	$dato = array(
		'datosPersonales_ci' =>$this->input->post('cim') ,
		'denominacion' =>$this->input->post('denominacion') ,
		'fecha' =>$this->input->post('fechaInicio')
	);
	$this->db->insert('actividades', $dato);

	$flag = false;
	$message  = "Actividad insertada con éxito";
	$type = True;

	$this->viewResponsable($flag, $message, $type, $this->input->post('cim'), $pag  );
}

/*--------------------Vista actualizar Actividad--------------------------------------------*/
public function v_e_ActividadM($idact, $ci){   
	$data['actividades']=$this->user_model->m_ActividadM($idact, $ci);
	$data['cim']=$ci;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('actividades/edtActividadM', $data);
	$this->load->view('viewfooter');
}

/*-----------------------Actualizar Actividad-----------------------------------------*/
public function edtActividadM(){
	$pag = "actividades";
	$dato = array(
		'datosPersonales_ci' =>$this->input->post('cim') ,
		'denominacion' =>$this->input->post('denominacion') ,
		'fecha' =>$this->input->post('fechaInicio')
	);
	
	$this->db->where('idact', $this->input->post('idm') );
	$this->db->update('actividades', $dato);
	
	$flag = false;
	$message  = "Actividad editada con éxito";
	$type = "success";

	$this->viewResponsable($flag, $message, $type, $this->input->post('cim'), $pag );

}

/*------------------Elimiar Actividad----------------------------------------------*/
public function delActividad($ci, $idasoc){
	$pag = "actividades";
	$this->db->where('idact', $idasoc);
	$this->db->delete('actividades');
	$flag = false;
	$message  = "Actividad eliminada con éxito";
	$type = "success";
		
	$this->viewResponsable($flag, $message, $type, $ci, $pag );
}

/*---------------------Vista insertar Mision-------------------------------------------*/
public function v_i_MisionM($ci){   
	$data['cim'] = $ci;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('misiones/insMisionM', $data);
	$this->load->view('viewfooter');
}

/*---------------Insertar Mision-------------------------------------------------*/
public function insMisionM(){  
	$pag = "misiones";
	$dato = array(
		'datosPersonales_ci' =>$this->input->post('cim') ,
		'pais' =>$this->input->post('solNoIdent') ,
		'caracter' =>$this->input->post('caracter') ,
		'organismo' =>$this->input->post('organismo') ,
		'fechaInicio' =>$this->input->post('fechaInicio') ,
		'fechaFin' =>$this->input->post('fechaFin') 
	);
	$this->db->insert('misionesinternacionales', $dato);

	$flag = false;
	$message  = "Misión internacionalista insertada con éxito";
	$type = True;

	$this->viewResponsable($flag, $message, $type, $this->input->post('cim'), $pag  );
}

/*--------------------Vista actualizar Mision--------------------------------------------*/
public function v_e_MisionM($ci, $idExp){   
	$data['misiones']=$this->user_model->m_MisionM($idExp, $ci);
	$data['cim']=$ci;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('misiones/edtMisionM', $data);
	$this->load->view('viewfooter');
}

/*-----------------------Actualizar Mision-----------------------------------------*/
public function edtMisionM(){
	$pag = "misiones";
	$dato = array(
		'datosPersonales_ci' =>$this->input->post('cim') ,
		'pais' =>$this->input->post('solNoIdent') ,
		'caracter' =>$this->input->post('caracter') ,
		'organismo' =>$this->input->post('organismo') ,
		'fechaInicio' =>$this->input->post('fechaInicio') ,
		'fechaFin' =>$this->input->post('fechaFin') 
	);
	
	$this->db->where('idmisionesInternacionales', $this->input->post('idm') );
	$this->db->update('misionesinternacionales', $dato);
	
	$flag = false;
	$message  = "Misión internacionalista editada con éxito";
	$type = "success";

	$this->viewResponsable($flag, $message, $type, $this->input->post('cim'), $pag );

}

/*------------------Elimiar Mision----------------------------------------------*/
public function delMisionM($ci, $idasoc){
	$pag = "misiones";
	$this->db->where('idmisionesInternacionales', $idasoc);
	$this->db->delete('misionesinternacionales');
	$flag = false;
	$message  = "Misión internacionalista eliminada con éxito";
	$type = "success";
		
	$this->viewResponsable($flag, $message, $type, $ci, $pag );
}

/*---------------------Vista insertar RedSocial-------------------------------------------*/
public function v_i_RedSocialM($ci){   
	$data['cim'] = $ci;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('redsocial/insRedSocialM', $data);
	$this->load->view('viewfooter');
}

/*---------------Insertar RedSocial-------------------------------------------------*/
public function insRedSocialM(){  
	$pag = "rsociales";
	$dato = array(
		'datosPersonales_ci' =>$this->input->post('cim') ,
		'nombre' =>$this->input->post('tipo') ,
		'cuenta' =>$this->input->post('denominiacion') 
	);
	$this->db->insert('redessociales', $dato);

	$flag = false;
	$message  = "Red social insertada con éxito";
	$type = True;

	$this->viewResponsable($flag, $message, $type, $this->input->post('cim'), $pag  );
}

/*--------------------Vista actualizar RedSocial--------------------------------------------*/
public function v_e_RedSocialM($ci, $idExp){   
	$data['rsociales']=$this->user_model->m_RedSocialM($idExp, $ci);
	$data['cim']=$ci;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('redsocial/edtRedSocialM', $data);
	$this->load->view('viewfooter');
}

/*-----------------------Actualizar RedSocial-----------------------------------------*/
public function edtRedSocialM(){
	$pag = "rsociales";
	$dato = array(
		'nombre' =>$this->input->post('tipo') ,
		'cuenta' =>$this->input->post('denominiacion') 
	);
	
	$this->db->where('idredesSociales', $this->input->post('idm') );
	$this->db->update('redessociales', $dato);
	
	$flag = false;
	$message  = "Red social editada con éxito";
	$type = "success";

	$this->viewResponsable($flag, $message, $type, $this->input->post('cim'), $pag );

}

/*------------------Elimiar RedSocial----------------------------------------------*/
public function delRedSocialM($ci, $idasoc){
	$pag = "rsociales";
	$this->db->where('idredesSociales', $idasoc);
	$this->db->delete('redessociales');
	$flag = false;
	$message  = "Red social eliminada con éxito";
	$type = "success";
		
	$this->viewResponsable($flag, $message, $type, $ci, $pag );
}

/*---------------------Vista insertar Vivienda-------------------------------------------*/
public function v_i_ViviendaM($ci){   
	$data['cim'] = $ci;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('vivienda/insViviendaM', $data);
	$this->load->view('viewfooter');
}

/*---------------Insertar Vivienda-------------------------------------------------*/
public function insViviendaM(){  
	$pag = "atencion";
	$dato = array(
		'datosPersonales_ci' =>$this->input->post('cim') ,
		'tipoVivienda' =>$this->input->post('tipo') ,
		'estado' =>$this->input->post('denominiacion') 
	);
	$this->db->insert('vivienda', $dato);

	$flag = false;
	$message  = "Vivienda insertada con éxito";
	$type = True;

	$this->viewResponsable($flag, $message, $type, $this->input->post('cim'), $pag  );
}

/*--------------------Vista actualizar Vivienda--------------------------------------------*/
public function v_e_ViviendaM($ci, $idExp){   
	$data['vivienda']=$this->user_model->m_ViviendaM($idExp, $ci);
	$data['cim']=$ci;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('vivienda/edtViviendaM', $data);
	$this->load->view('viewfooter');
}

/*-----------------------Actualizar Vivienda-----------------------------------------*/
public function edtViviendaM(){
	$pag = "atencion";
	if($this->input->post('tipo') == "Propia"){
		$dato = array(
			'tipoVivienda' =>$this->input->post('tipo') ,
			'estado' =>$this->input->post('denominiacion') 
		);
	}
	else{
		$dato = array(
			'tipoVivienda' =>$this->input->post('tipo') ,
			'estado' => "" 
		);
	}
	
	$this->db->where('idvivienda', $this->input->post('idm') );
	$this->db->update('vivienda', $dato);
	
	$flag = false;
	$message  = "Vivienda editada con éxito";
	$type = "success";

	$this->viewResponsable($flag, $message, $type, $this->input->post('cim'), $pag );

}

/*------------------Elimiar Vivienda----------------------------------------------*/
public function delViviendaM($ci, $idasoc){
	$pag = "atencion";
	$this->db->where('idvivienda', $idasoc);
	$this->db->delete('vivienda');
	$flag = false;
	$message  = "Vivienda eliminada con éxito";
	$type = "success";
		
	$this->viewResponsable($flag, $message, $type, $ci, $pag );
}

/*---------------------Vista insertar Transporte-------------------------------------------*/
public function v_i_TransporteM($ci){   
	$data['cim'] = $ci;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('transporte/insTransporteM', $data);
	$this->load->view('viewfooter');
}

/*---------------Insertar Transporte-------------------------------------------------*/
public function insTransporteM(){  
	$pag = "atencion";
	$dato = array(
		'datosPersonales_ci' =>$this->input->post('cim') ,
		'tipoAsignacion' =>$this->input->post('tipo') ,
		'estado' =>$this->input->post('denominiacion') 
	);
	$this->db->insert('mediotransporte', $dato);

	$flag = false;
	$message  = "Medio de transporte insertado con éxito";
	$type = True;

	$this->viewResponsable($flag, $message, $type, $this->input->post('cim'), $pag  );
}

/*--------------------Vista actualizar Transporte--------------------------------------------*/
public function v_e_TransporteM($ci, $idExp){   
	$data['transporte']=$this->user_model->m_TransporteM($idExp, $ci);
	$data['cim']=$ci;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('transporte/edtTransporteM', $data);
	$this->load->view('viewfooter');
}

/*-----------------------Transporte-----------------------------------------*/
public function edtTransporteM(){
	$pag = "atencion";
	if($this->input->post('tipo') == "Propio"){
		$dato = array(
			'tipoAsignacion' =>$this->input->post('tipo') ,
			'estado' =>$this->input->post('denominiacion') 
		);
	}
	else{
		$dato = array(
			'tipoAsignacion' =>$this->input->post('tipo') ,
			'estado' => "" 
		);
	}
	
	$this->db->where('idmedioTransporte', $this->input->post('idm') );
	$this->db->update('mediotransporte', $dato);
	
	$flag = false;
	$message  = "Medio de transporte editado con éxito";
	$type = "success";

	$this->viewResponsable($flag, $message, $type, $this->input->post('cim'), $pag );

}

/*------------------Elimiar Transporte----------------------------------------------*/
public function delTransporteM($ci, $idasoc){
	$pag = "atencion";
	$this->db->where('idmedioTransporte', $idasoc);
	$this->db->delete('mediotransporte');
	$flag = false;
	$message  = "Medio de transporte eliminado con éxito";
	$type = "success";
		
	$this->viewResponsable($flag, $message, $type, $ci, $pag );
}

/*---------------------Vista insertar CatCientifica-------------------------------------------*/
public function v_i_CatCientificaM($ci){   
	$data['cim'] = $ci;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('catcientifica/insCatCientificaM', $data);
	$this->load->view('viewfooter');
}

/*---------------Insertar CatCientifica-------------------------------------------------*/
public function insCatCientificaM(){  
	$pag = "potencial";
	$dato = array(
		'datosPersonales_ci' =>$this->input->post('cim') ,
		'tipo' =>$this->input->post('tipoautor') ,
		'fecha' =>$this->input->post('fecha') 
	);
	$this->db->insert('categoriacientifica', $dato);

	$flag = false;
	$message  = "Categoría científica insertada con éxito";
	$type = True;

	$this->viewResponsable($flag, $message, $type, $this->input->post('cim'), $pag  );
}

/*--------------------Vista actualizar CatCientifica--------------------------------------------*/
public function v_e_CatCientificaM($ci, $idExp){   
	$data['catcient']=$this->user_model->m_CatCientificaM($idExp, $ci);
	$data['cim']=$ci;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('catcientifica/edtCatCientificaM', $data);
	$this->load->view('viewfooter');
}

/*-----------------------editar  CatCientifica-----------------------------------------*/
public function edtCatCientificaM(){
	$pag = "potencial";
	$dato = array(
		'datosPersonales_ci' =>$this->input->post('cim') ,
		'tipo' =>$this->input->post('tipoautor') ,
		'fecha' =>$this->input->post('fecha') 
	);
	
	$this->db->where('idcategoriaCientifica', $this->input->post('idt') );
	$this->db->update('categoriacientifica', $dato);
	
	$flag = false;
	$message  = "Categoría científica editada con éxito";
	$type = "success";

	$this->viewResponsable($flag, $message, $type, $this->input->post('cim'), $pag );

}

/*------------------Elimiar CatCientifica----------------------------------------------*/
public function delCatCientificaM($ci, $idasoc){
	$pag = "potencial";
	$this->db->where('idcategoriaCientifica', $idasoc);
	$this->db->delete('categoriacientifica');
	$flag = false;
	$message  = "Categoría científica eliminada con éxito";
	$type = "success";
		
	$this->viewResponsable($flag, $message, $type, $ci, $pag );
}

/*---------------------Vista insertar CatDocente-------------------------------------------*/
public function v_i_CatDocenteM($ci){   
	$data['cim'] = $ci;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('catdocente/insCatDocenteM', $data);
	$this->load->view('viewfooter');
}

/*---------------Insertar CatDocente-------------------------------------------------*/
public function insCatDocenteM(){  
	$pag = "potencial";
	$dato = array(
		'datosPersonales_ci' =>$this->input->post('cim') ,
		'tipo' =>$this->input->post('tipo') ,
		'fecha' =>$this->input->post('fecha') ,
		'asignatura' =>$this->input->post('asignatura') ,
		'curso' =>$this->input->post('curso') ,
		'horasClases' =>$this->input->post('hclases') 
	);
	$this->db->insert('categoriadocente', $dato);

	$flag = false;
	$message  = "Categoría docente insertada con éxito";
	$type = True;

	$this->viewResponsable($flag, $message, $type, $this->input->post('cim'), $pag  );
}

/*--------------------Vista actualizar CatDocente--------------------------------------------*/
public function v_e_CatDocenteM($ci, $idExp){   
	$data['catdocente']=$this->user_model->m_CatDocenteM($idExp, $ci);
	$data['cim']=$ci;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('catdocente/edtCatDocenteM', $data);
	$this->load->view('viewfooter');
}

/*-----------------------editar  CatDocente-----------------------------------------*/
public function edtCatDocenteM(){
	$pag = "potencial";
	$dato = array(
		'datosPersonales_ci' =>$this->input->post('cim') ,
		'tipo' =>$this->input->post('tipo') ,
		'fecha' =>$this->input->post('fecha') ,
		'asignatura' =>$this->input->post('asignatura') ,
		'curso' =>$this->input->post('curso') ,
		'horasClases' =>$this->input->post('hclases') 
	);
	
	$this->db->where('idcategoriaDocente', $this->input->post('idt') );
	$this->db->update('categoriadocente', $dato);
	
	$flag = false;
	$message  = "Categoría docente editada con éxito";
	$type = "success";

	$this->viewResponsable($flag, $message, $type, $this->input->post('cim'), $pag );

}

/*------------------Elimiar CatDocente----------------------------------------------*/
public function delCatDocenteM($ci, $idasoc){
	$pag = "potencial";
	$this->db->where('idcategoriaDocente', $idasoc);
	$this->db->delete('categoriadocente');
	$flag = false;
	$message  = "Categoría docente eliminada con éxito";
	$type = "success";
		
	$this->viewResponsable($flag, $message, $type, $ci, $pag );
}

/*---------------------Vista insertar CImpartido-------------------------------------------*/
public function v_i_CImpartidoM($ci){   
	$data['cim'] = $ci;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('cursosimpartidos/insCImpartidoM', $data);
	$this->load->view('viewfooter');
}

/*---------------Insertar CImpartido-------------------------------------------------*/
public function insCImpartidoM(){  
	$pag = "cursosimpartidos";
	$dato = array(
		'datosPersonales_ci' =>$this->input->post('cim') ,
		'tipo' =>$this->input->post('tipo') ,
		'nombre' =>$this->input->post('nombre') ,
		'fecha' =>$this->input->post('fechaInicio') 
	);
	$this->db->insert('cursosimpartidos', $dato);

	$flag = false;
	$message  = "Curso insertado con éxito";
	$type = True;

	$this->viewResponsable($flag, $message, $type, $this->input->post('cim'), $pag  );
}

/*--------------------Vista actualizar CImpartido--------------------------------------------*/
public function v_e_CImpartidoM($ci, $idExp){   
	$data['cestudio']=$this->user_model->m_CImpartidoM($idExp, $ci);
	$data['cim']=$ci;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('cursosimpartidos/edtCImpartidoM', $data);
	$this->load->view('viewfooter');
}

/*-----------------------editar  CImpartido-----------------------------------------*/
public function edtCImpartidoM(){
	$pag = "cursosimpartidos";
	$dato = array(
		'datosPersonales_ci' =>$this->input->post('cim') ,
		'tipo' =>$this->input->post('tipo') ,
		'nombre' =>$this->input->post('nombre') ,
		'fecha' =>$this->input->post('fechaInicio') 
	);
	
	$this->db->where('id', $this->input->post('idm') );
	$this->db->update('cursosimpartidos', $dato);
	
	$flag = false;
	$message  = "Curso editado con éxito";
	$type = "success";

	$this->viewResponsable($flag, $message, $type, $this->input->post('cim'), $pag );

}

/*------------------Elimiar CImpartido----------------------------------------------*/
public function delCImpartidoM($ci, $idasoc){
	$pag = "cursosimpartidos";
	$this->db->where('id', $idasoc);
	$this->db->delete('cursosimpartidos');
	$flag = false;
	$message  = "Curso eliminado con éxito";
	$type = "success";
		
	$this->viewResponsable($flag, $message, $type, $ci, $pag );
}

/*---------------------Vista insertar CEstudio-------------------------------------------*/
public function v_i_CEstudioM($ci){   
	$data['cim'] = $ci;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('centroestudio/insCEstudioM', $data);
	$this->load->view('viewfooter');
}

/*---------------Insertar CEstudio-------------------------------------------------*/
public function insCEstudioM(){  
	$pag = "centroestudio";
	$dato = array(
		'datosPersonales_ci' =>$this->input->post('cim') ,
		'tipo' =>$this->input->post('tipo') ,
		'nombre' =>$this->input->post('nombre') ,
		'fechaInicio' =>$this->input->post('fechaInicio') ,
		'fechaFin' =>$this->input->post('fechaFin') 
	);
	$this->db->insert('centroestudio', $dato);

	$flag = false;
	$message  = "Centro de estudio insertado con éxito";
	$type = True;

	$this->viewResponsable($flag, $message, $type, $this->input->post('cim'), $pag  );
}

/*--------------------Vista actualizar CEstudio--------------------------------------------*/
public function v_e_CEstudioM($ci, $idExp){   
	$data['cestudio']=$this->user_model->m_CEstudioM($idExp, $ci);
	$data['cim']=$ci;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('centroestudio/edtCEstudioM', $data);
	$this->load->view('viewfooter');
}

/*-----------------------editar  CEstudio-----------------------------------------*/
public function edtCEstudioM(){
	$pag = "centroestudio";
	$dato = array(
		'datosPersonales_ci' =>$this->input->post('cim') ,
		'tipo' =>$this->input->post('tipo') ,
		'nombre' =>$this->input->post('nombre') ,
		'fechaInicio' =>$this->input->post('fechaInicio') ,
		'fechaFin' =>$this->input->post('fechaFin') 
	);
	
	$this->db->where('id', $this->input->post('idm') );
	$this->db->update('centroestudio', $dato);
	
	$flag = false;
	$message  = "Centro de estudio editado con éxito";
	$type = "success";

	$this->viewResponsable($flag, $message, $type, $this->input->post('cim'), $pag );

}

/*------------------Elimiar CEstudio----------------------------------------------*/
public function delCEstudioM($ci, $idasoc){
	$pag = "centroestudio";
	$this->db->where('id', $idasoc);
	$this->db->delete('centroestudio');
	$flag = false;
	$message  = "Centro de estudio eliminado con éxito";
	$type = "success";
		
	$this->viewResponsable($flag, $message, $type, $ci, $pag );
}

/*---------------------Vista insertar CursoEnt-------------------------------------------*/
public function v_i_CursoEntM($ci){   
	$data['cim'] = $ci;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('cursoent/insCursoEntM', $data);
	$this->load->view('viewfooter');
}

/*---------------Insertar CursoEnt-------------------------------------------------*/
public function insCursoEntM(){  
	$pag = "potencial";
	$dato = array(
		'datosPersonales_ci' =>$this->input->post('cim') ,
		'tipo' =>$this->input->post('tipo') ,
		'denimicacion' =>$this->input->post('denominacion') ,
		'fecha' =>$this->input->post('fecha') ,
		'centroEstudio' =>$this->input->post('cestudio') ,
		'cantHoras' =>$this->input->post('hclases') ,
		'califiacion' =>$this->input->post('calif') 
	);
	$this->db->insert('cursoentrenamiento', $dato);

	$flag = false;
	$message  = "Curso entrenamiento insertado con éxito";
	$type = True;

	$this->viewResponsable($flag, $message, $type, $this->input->post('cim'), $pag  );
}

/*--------------------Vista actualizar CursoEnt--------------------------------------------*/
public function v_e_CursoEntM($ci, $idExp){   
	$data['cursoent']=$this->user_model->m_CursoEntM($idExp, $ci);
	$data['cim']=$ci;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('cursoent/edtCursoEntM', $data);
	$this->load->view('viewfooter');
}

/*-----------------------editar  CursoEnt-----------------------------------------*/
public function edtCursoEntM(){
	$pag = "potencial";
	$dato = array(
		'denimicacion' =>$this->input->post('denominacion') ,
		'tipo' =>$this->input->post('tipo') ,
		'fecha' =>$this->input->post('fecha') ,
		'centroEstudio' =>$this->input->post('cestudio') ,
		'cantHoras' =>$this->input->post('hclases') ,
		'califiacion' =>$this->input->post('calif') 
	);
	
	$this->db->where('idcurso', $this->input->post('idt') );
	$this->db->update('cursoentrenamiento', $dato);
	
	$flag = false;
	$message  = "Curso entrenamiento  editada con éxito";
	$type = "success";

	$this->viewResponsable($flag, $message, $type, $this->input->post('cim'), $pag );

}

/*------------------Elimiar CursoEnt----------------------------------------------*/
public function delCursoEntM($ci, $idasoc){
	$pag = "potencial";
	$this->db->where('idcurso', $idasoc);
	$this->db->delete('cursoentrenamiento');
	$flag = false;
	$message  = "Curso entrenamiento  eliminada con éxito";
	$type = "success";
		
	$this->viewResponsable($flag, $message, $type, $ci, $pag );
}

/*---------------------Vista insertar Postgrado-------------------------------------------*/
public function v_i_PostgradoM($ci){   
	$data['cim'] = $ci;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('postgrados/insPostgradoM', $data);
	$this->load->view('viewfooter');
}

/*---------------Insertar Postgrado-------------------------------------------------*/
public function insPostgradoM(){  
	$pag = "potencial";
	$dato = array(
		'datosPersonales_ci' =>$this->input->post('cim') ,
		'tipo' =>$this->input->post('tipo') ,
		'denominacion' =>$this->input->post('denominacion') ,
		'fecha' =>$this->input->post('fecha') ,
		'centroReferencia' =>$this->input->post('cestudio') ,
		'cantHoras' =>$this->input->post('hclases') ,
		'calificacion' =>$this->input->post('calif') 
	);
	$this->db->insert('postgrados', $dato);

	$flag = false;
	$message  = "Postgrado insertado con éxito";
	$type = True;

	$this->viewResponsable($flag, $message, $type, $this->input->post('cim'), $pag  );
}

/*--------------------Vista actualizar Postgrado--------------------------------------------*/
public function v_e_PostgradoM($ci, $idExp){   
	$data['postgrados']=$this->user_model->m_PostgradoM($idExp, $ci);
	$data['cim']=$ci;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('postgrados/edtPostgradoM', $data);
	$this->load->view('viewfooter');
}

/*-----------------------editar  Postgrado-----------------------------------------*/
public function edtPostgradoM(){
	$pag = "potencial";
	$dato = array(
		'datosPersonales_ci' =>$this->input->post('cim') ,
		'tipo' =>$this->input->post('tipo') ,
		'denominacion' =>$this->input->post('denominacion') ,
		'fecha' =>$this->input->post('fecha') ,
		'centroReferencia' =>$this->input->post('cestudio') ,
		'cantHoras' =>$this->input->post('hclases') ,
		'calificacion' =>$this->input->post('calif') 
	);
	
	$this->db->where('idpostgrado', $this->input->post('idt') );
	$this->db->update('postgrados', $dato);
	
	$flag = false;
	$message  = "Postgrado editado con éxito";
	$type = "success";

	$this->viewResponsable($flag, $message, $type, $this->input->post('cim'), $pag );

}

/*------------------Elimiar Postgrado----------------------------------------------*/
public function delPostgradoM($ci, $idasoc){
	$pag = "potencial";
	$this->db->where('idpostgrado', $idasoc);
	$this->db->delete('postgrados');
	$flag = false;
	$message  = "Postgrado eliminado con éxito";
	$type = "success";
		
	$this->viewResponsable($flag, $message, $type, $ci, $pag );
}

/*---------------------Vista insertar GradoCientifico-------------------------------------------*/
public function v_i_GradoCientificoM($ci){   
	$data['cim'] = $ci;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('gradocientifico/insGradoCientificoM', $data);
	$this->load->view('viewfooter');
}

/*---------------Insertar GradoCientifico-------------------------------------------------*/
public function insGradoCientificoM(){  
	$pag = "potencial";
	$dato = array(
		'datosPersonales_ci' =>$this->input->post('cim') ,
		'centroReferencia' =>$this->input->post('cestudio') ,
		'tipo' =>$this->input->post('tipo'),
		'denominacion' =>$this->input->post('denominacion'),
		'fecha' =>$this->input->post('fechaDefensa'),
		'cantH' =>$this->input->post('canth'),
		'calificacion' =>$this->input->post('calificacion'),
	);
	$this->db->insert('gradocientifico', $dato);

	$flag = false;
	$message  = "Grado científico insertado con éxito";
	$type = True;

	$this->viewResponsable($flag, $message, $type, $this->input->post('cim'), $pag  );
}

/*--------------------Vista actualizar GradoCientifico--------------------------------------------*/
public function v_e_GradoCientificoM($ci, $idExp){   
	$data['gradocient']=$this->user_model->m_GradoCientificoM($idExp, $ci);
	$data['cim']=$ci;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('gradocientifico/edtGradoCientificoM', $data);
	$this->load->view('viewfooter');
}

/*-----------------------editar  GradoCientifico-----------------------------------------*/
public function edtGradoCientificoM(){
	$pag = "potencial";
	$dato = array(
		'datosPersonales_ci' =>$this->input->post('cim') ,
		'centroReferencia' =>$this->input->post('cestudio') ,
		'tipo' =>$this->input->post('tipo'),
		'denominacion' =>$this->input->post('denominacion'),
		'fecha' =>$this->input->post('fechaDefensa'),
		'cantH' =>$this->input->post('canth'),
		'calificacion' =>$this->input->post('calificacion'),
	);
	
	$this->db->where('id', $this->input->post('idt') );
	$this->db->update('gradocientifico', $dato);
	
	$flag = false;
	$message  = "Grado científico editado con éxito";
	$type = "success";

	$this->viewResponsable($flag, $message, $type, $this->input->post('cim'), $pag );

}

/*------------------Elimiar GradoCientifico----------------------------------------------*/
public function delGradoCientificoM($ci, $idasoc){
	$pag = "potencial";
	$this->db->where('id', $idasoc);
	$this->db->delete('gradocientifico');
	$flag = false;
	$message  = "Grado científico eliminado con éxito";
	$type = "success";
		
	$this->viewResponsable($flag, $message, $type, $ci, $pag );
}

/*---------------------Vista insertar TituloAcademico-------------------------------------------*/
public function v_i_TituloAcademicoM($ci){   
	$data['cim'] = $ci;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('titulosacademicos/insTituloAcademicoM', $data);
	$this->load->view('viewfooter');
}

/*---------------Insertar TituloAcademico-------------------------------------------------*/
public function insTituloAcademicoM(){  
	$pag = "potencial";
	$dato = array(
		'datosPersonales_ci' =>$this->input->post('cim') ,
		'libro' =>$this->input->post('libro') ,
		'tomo' =>$this->input->post('tomo') ,
		'folio' =>$this->input->post('folio') ,
		'centroReferencia' =>$this->input->post('cestudio') ,
		'carrera' =>$this->input->post('carrera'),
		'tipo' =>$this->input->post('tipo'),
		'denominacion' =>$this->input->post('denominacion'),
		'fecha' =>$this->input->post('fechaDefensa'),
		'cantHoras' =>$this->input->post('canth'),
		'calificacion' =>$this->input->post('calificacion'),
		'centroEstudio' =>$this->input->post('estudio')
	);
	$this->db->insert('tituloacademico', $dato);

	$flag = false;
	$message  = "Título académico insertado con éxito";
	$type = True;

	$this->viewResponsable($flag, $message, $type, $this->input->post('cim'), $pag  );
}

/*--------------------Vista actualizar TituloAcademico--------------------------------------------*/
public function v_e_TituloAcademicoM($ci, $idExp){   
	$data['tituloacad']=$this->user_model->m_TituloAcademicoM($idExp, $ci);
	$data['cim']=$ci;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('titulosacademicos/edtTituloAcademicoM', $data);
	$this->load->view('viewfooter');
}

/*-----------------------editar  TituloAcademico-----------------------------------------*/
public function edtTituloAcademicoM(){
	$pag = "potencial";
	$dato = array(
		'datosPersonales_ci' =>$this->input->post('cim') ,
		'libro' =>$this->input->post('libro') ,
		'tomo' =>$this->input->post('tomo') ,
		'folio' =>$this->input->post('folio') ,
		'centroReferencia' =>$this->input->post('cestudio') ,
		'carrera' =>$this->input->post('carrera'),
		'tipo' =>$this->input->post('tipo'),
		'denominacion' =>$this->input->post('denominacion'),
		'fecha' =>$this->input->post('fechaDefensa'),
		'cantHoras' =>$this->input->post('canth'),
		'calificacion' =>$this->input->post('calificacion'),
		'centroEstudio' =>$this->input->post('estudio')
	);
	
	$this->db->where('idtituloAcademico', $this->input->post('idt') );
	$this->db->update('tituloacademico', $dato);
	
	$flag = false;
	$message  = "Título académico editado con éxito";
	$type = "success";

	$this->viewResponsable($flag, $message, $type, $this->input->post('cim'), $pag );

}

/*------------------Elimiar TituloAcademico----------------------------------------------*/
public function delTituloAcademicoM($ci, $idasoc){
	$pag = "potencial";
	$this->db->where('idtituloAcademico', $idasoc);
	$this->db->delete('tituloacademico');
	$flag = false;
	$message  = "Título académico eliminado con éxito";
	$type = "success";
		
	$this->viewResponsable($flag, $message, $type, $ci, $pag );
}

/*---------------------Vista insertar PC-------------------------------------------*/
public function v_i_PCM($ci){   
	$data['cim'] = $ci;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('tic/insPCM', $data);
	$this->load->view('viewfooter');
}

/*---------------Insertar PC-------------------------------------------------*/
public function insPCM(){  
	$pag = "tic";
	$dato = array(
		'datosPersonales_ci' =>$this->input->post('cim') ,
		'estado' =>$this->input->post('estado') ,
		'noserie' =>$this->input->post('serie') 
	);
	$this->db->insert('pc', $dato);

	$flag = false;
	$message  = "PC insertada con éxito";
	$type = True;

	$this->viewResponsable($flag, $message, $type, $this->input->post('cim'), $pag  );
}

/*--------------------Vista actualizar PC--------------------------------------------*/
public function v_e_PCM($ci, $idExp){   
	$data['pcm']=$this->user_model->m_PCM($idExp, $ci);
	$data['cim']=$ci;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('tic/edtPCM', $data);
	$this->load->view('viewfooter');
}

/*-----------------------editar  PC-----------------------------------------*/
public function edtPCM(){
	$pag = "tic";
	$dato = array(
		'estado' =>$this->input->post('estado') ,
		'noserie' =>$this->input->post('serie') 
	);
	
	$this->db->where('idpc', $this->input->post('idt') );
	$this->db->update('pc', $dato);
	
	$flag = false;
	$message  = "PC editada con éxito";
	$type = "success";

	$this->viewResponsable($flag, $message, $type, $this->input->post('cim'), $pag );

}

/*------------------Elimiar PC----------------------------------------------*/
public function delPCM($ci, $idasoc){
	$pag = "tic";
	$this->db->where('idpc', $idasoc);
	$this->db->delete('pc');
	$flag = false;
	$message  = "PC eliminada con éxito";
	$type = "success";
		
	$this->viewResponsable($flag, $message, $type, $ci, $pag );
}

/*---------------------Vista insertar Telefono-------------------------------------------*/
public function v_i_TelefonoM($ci){   
	$data['cim'] = $ci;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('tic/insTelefonoM', $data);
	$this->load->view('viewfooter');
}

/*---------------Insertar Telefono-------------------------------------------------*/
public function insTelefonoM(){  
	$pag = "tic";
	$dato = array(
		'datosPersonales_ci' =>$this->input->post('cim') ,
		'tipo' =>$this->input->post('tipo') ,
		'propietario' =>$this->input->post('propietario') ,
		'numero' =>$this->input->post('numero') 
	);
	$this->db->insert('telefono', $dato);

	$flag = false;
	$message  = "Teléfono insertado con éxito";
	$type = True;

	$this->viewResponsable($flag, $message, $type, $this->input->post('cim'), $pag  );
}

/*--------------------Vista actualizar Telefono--------------------------------------------*/
public function v_e_TelefonoM($ci, $idExp){   
	$data['telefonom']=$this->user_model->m_TelefonoM($idExp, $ci);
	$data['cim']=$ci;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('tic/edtTelefonoM', $data);
	$this->load->view('viewfooter');
}

/*-----------------------editar  Telefono-----------------------------------------*/
public function edtTelefonoM(){
	$pag = "tic";
	$dato = array(
		'tipo' =>$this->input->post('tipo') ,
		'propietario' =>$this->input->post('propietario') ,
		'numero' =>$this->input->post('numero') 
	);
	
	$this->db->where('idtelefonoMovil', $this->input->post('idt') );
	$this->db->update('telefono', $dato);
	
	$flag = false;
	$message  = "Teléfono editado con éxito";
	$type = "success";

	$this->viewResponsable($flag, $message, $type, $this->input->post('cim'), $pag );

}

/*------------------Elimiar Telefono----------------------------------------------*/
public function delTelefonoM($ci, $idasoc){
	$pag = "tic";
	$this->db->where('idtelefonoMovil', $idasoc);
	$this->db->delete('telefono');
	$flag = false;
	$message  = "Teléfono eliminado con éxito";
	$type = "success";
		
	$this->viewResponsable($flag, $message, $type, $ci, $pag );
}

/*---------------------Vista insertar Tablet-------------------------------------------*/
public function v_i_TabletM($ci){   
	$data['cim'] = $ci;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('tic/insTabletM', $data);
	$this->load->view('viewfooter');
}

/*---------------Insertar Tablet-------------------------------------------------*/
public function insTabletM(){  
	$pag = "tic";
	$dato = array(
		'datosPersonales_ci' =>$this->input->post('cim') ,
		'numSerie' =>$this->input->post('serie') ,
		'marca' =>$this->input->post('marca') 
	);
	$this->db->insert('tablet', $dato);

	$flag = false;
	$message  = "Tablet insertada con éxito";
	$type = True;

	$this->viewResponsable($flag, $message, $type, $this->input->post('cim'), $pag  );
}

/*--------------------Vista actualizar Tablet--------------------------------------------*/
public function v_e_TabletM($ci, $idExp){   
	$data['tabletm']=$this->user_model->m_TabletM($idExp, $ci);
	$data['cim']=$ci;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('tic/edtTabletM', $data);
	$this->load->view('viewfooter');
}

/*-----------------------editar  Tablet-----------------------------------------*/
public function edtTabletM(){
	$pag = "tic";
	$dato = array(
		'datosPersonales_ci' =>$this->input->post('cim') ,
		'numSerie' =>$this->input->post('serie') ,
		'marca' =>$this->input->post('marca') 
	);
	
	$this->db->where('idtablet', $this->input->post('idt') );
	$this->db->update('tablet', $dato);
	
	$flag = false;
	$message  = "Tablet editada con éxito";
	$type = "success";

	$this->viewResponsable($flag, $message, $type, $this->input->post('cim'), $pag );

}

/*------------------Elimiar Tablet----------------------------------------------*/
public function delTabletM($ci, $idasoc){
	$pag = "tic";
	$this->db->where('idtablet', $idasoc);
	$this->db->delete('tablet');
	$flag = false;
	$message  = "Tablet eliminada con éxito";
	$type = "success";
		
	$this->viewResponsable($flag, $message, $type, $ci, $pag );
}

/*---------------------Vista insertar Correo-------------------------------------------*/
public function v_i_CorreoM($ci){   
	$data['cim'] = $ci;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('tic/insCorreoM', $data);
	$this->load->view('viewfooter');
}

/*---------------Insertar Correo-------------------------------------------------*/
public function insCorreoM(){  
	$pag = "tic";
	$dato = array(
		'datosPersonales_ci' =>$this->input->post('cim') ,
		'tipo' =>$this->input->post('tipo') ,
		'correo' =>$this->input->post('correo') 
	);
	$this->db->insert('email', $dato);

	$flag = false;
	$message  = "Correo insertado con éxito";
	$type = True;

	$this->viewResponsable($flag, $message, $type, $this->input->post('cim'), $pag  );
}

/*--------------------Vista actualizar Correo--------------------------------------------*/
public function v_e_CorreoM($ci, $idExp){   
	$data['correom']=$this->user_model->m_CorreoM($idExp, $ci);
	$data['cim']=$ci;
	$data['ctrlpag']="miembro";
	$data['ltspag']="ltsmiembro";
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('tic/edtCorreoM', $data);
	$this->load->view('viewfooter');
}

/*-----------------------editar  Correo-----------------------------------------*/
public function edtCorreoM(){
	$pag = "tic";
	$dato = array(
		'datosPersonales_ci' =>$this->input->post('cim') ,
		'tipo' =>$this->input->post('tipo') ,
		'correo' =>$this->input->post('correo') 
	);
	
	$this->db->where('idemail', $this->input->post('idt') );
	$this->db->update('email', $dato);
	
	$flag = false;
	$message  = "Correo editado con éxito";
	$type = "success";

	$this->viewResponsable($flag, $message, $type, $this->input->post('cim'), $pag );

}

/*------------------Elimiar Correo----------------------------------------------*/
public function delCorreoM($ci, $idasoc){
	$pag = "tic";
	$this->db->where('idemail', $idasoc);
	$this->db->delete('email');
	$flag = false;
	$message  = "Correo eliminado con éxito";
	$type = "success";
		
	$this->viewResponsable($flag, $message, $type, $ci, $pag );
}

/*---------------------Vista listar experencias profesionales-------------------------------------------*/
public function ltsExperienciasProf($flag, $message, $type){   
	$data['experiencias'] = $this->user_model->experiencias();
	$data['resp']=$this->user_model->responsables();
	$data['ctrlpag']="ltsexperiencia";
	$data['ltspag']="ltsexperiencia";
	if(!$flag){
		$data['mensaje'] = $message;
		$data['type'] = $type;
	}
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('expprofesionales/ltsExpProfesionales',$data);
	$this->load->view('viewfooter');
}

/*---------------------Vista listar tesis-------------------------------------------*/
public function ltsTesis($flag, $message, $type){   
	$data['tesis'] = $this->user_model->tesis();
	$data['resp']=$this->user_model->responsables();
	$data['ctrlpag']="ltstesis";
	$data['ltspag']="ltstesis";
	if(!$flag){
		$data['mensaje'] = $message;
		$data['type'] = $type;
	}
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('tesis/ltsTesis',$data);
	$this->load->view('viewfooter');
}

/*---------------------Vista listar innovaciones-------------------------------------------*/
public function ltsInnovaciones($flag, $message, $type){   
	$data['innovaciones'] = $this->user_model->innovaciones();
	$data['resp']=$this->user_model->responsables();
	$data['ctrlpag']="ltsinnovaciones";
	$data['ltspag']="ltsinnovaciones";
	if(!$flag){
		$data['mensaje'] = $message;
		$data['type'] = $type;
	}
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('innovaciones/ltsInnovaciones',$data);
	$this->load->view('viewfooter');
}

/*---------------------Vista listar organizacion-------------------------------------------*/
public function ltsOrganizacion($flag, $message, $type){   
	$data['organizacion'] = $this->user_model->organizacion();
	$data['resp']=$this->user_model->responsables();
	$data['ctrlpag']="asociacion";
	$data['ltspag']="ltsorganiz";
	
	if(!$flag){
		$data['mensaje'] = $message;
		$data['type'] = $type;
	}
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('asociaciones/ltsOrganizacion',$data);
	$this->load->view('viewfooter');
}

/*---------------------Vista listar Asociacion-------------------------------------------*/
public function ltsAsociacion($flag, $message, $type){   
	$data['asociacion'] = $this->user_model->asociacion();
	$data['resp']=$this->user_model->responsables();
	$data['ctrlpag']="asociacion";
	$data['ltspag']="ltsasoc";
	if(!$flag){
		$data['mensaje'] = $message;
		$data['type'] = $type;
	}
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('asociaciones/ltsAsociacion',$data);
	$this->load->view('viewfooter');
}

/*---------------------Vista listar cat docentes-------------------------------------------*/
public function ltsCatDocente($flag, $message, $type){   
	$data['catdocente'] = $this->user_model->catdocente();
	$data['resp']=$this->user_model->responsables();
	$data['ctrlpag']="potencial";
	$data['ltspag']="ltscatdoc";
	if(!$flag){
		$data['mensaje'] = $message;
		$data['type'] = $type;
	}
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('catdocente/ltsCatDocente',$data);
	$this->load->view('viewfooter');
}

/*---------------------Vista listar cat cientifica-------------------------------------------*/
public function ltsCatCientifica($flag, $message, $type){   
	$data['catcientifica'] = $this->user_model->catcientifica();
	$data['resp']=$this->user_model->responsables();
	$data['ctrlpag']="potencial";
	$data['ltspag']="ltscatcient";
	if(!$flag){
		$data['mensaje'] = $message;
		$data['type'] = $type;
	}
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('catcientifica/ltsCatCientifica',$data);
	$this->load->view('viewfooter');
}

/*---------------------Vista listar cursoent-------------------------------------------*/
public function ltsCursoEnt($flag, $message, $type){   
	$data['cursoent'] = $this->user_model->cursoent();
	$data['resp']=$this->user_model->responsables();
	$data['ctrlpag']="potencial";
	$data['ltspag']="ltscurso";
	if(!$flag){
		$data['mensaje'] = $message;
		$data['type'] = $type;
	}
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('cursoent/ltsCursoEnt',$data);
	$this->load->view('viewfooter');
}

/*---------------------Vista listar postgrados-------------------------------------------*/
public function ltsPostgrado($flag, $message, $type){   
	$data['postgrados'] = $this->user_model->postgrados();
	$data['resp']=$this->user_model->responsables();
	$data['ctrlpag']="potencial";
	$data['ltspag']="ltspostgrado";
	if(!$flag){
		$data['mensaje'] = $message;
		$data['type'] = $type;
	}
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('postgrados/ltsPostgrado',$data);
	$this->load->view('viewfooter');
}

/*---------------------Vista listar titulosacademicos-------------------------------------------*/
public function ltsTituloAcademico($flag, $message, $type){   
	$data['titulosacademicos'] = $this->user_model->titulosacademicos();
	$data['resp']=$this->user_model->responsables();
	$data['ctrlpag']="potencial";
	$data['ltspag']="ltstitulo";
	if(!$flag){
		$data['mensaje'] = $message;
		$data['type'] = $type;
	}
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('titulosacademicos/ltsTituloAcademico',$data);
	$this->load->view('viewfooter');
}

/*---------------------Vista listar publicaciones-------------------------------------------*/
public function ltsPublicaciones($flag, $message, $type){   
	$data['publicaciones'] = $this->user_model->publicaciones();
	$data['resp']=$this->user_model->responsables();
	$data['ctrlpag']="ltspublicaciones";
	$data['ltspag']="ltspublicaciones";
	if(!$flag){
		$data['mensaje'] = $message;
		$data['type'] = $type;
	}
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('publicaciones/ltsPublicacion',$data);
	$this->load->view('viewfooter');
}

/*---------------------Vista listar proyectos-------------------------------------------*/
public function ltsProyectos($flag, $message, $type){   
	$data['proyectos'] = $this->user_model->proyectos();
	$data['resp']=$this->user_model->responsables();
	$data['ctrlpag']="ltsproyectos";
	$data['ltspag']="ltsproyectos";
	if(!$flag){
		$data['mensaje'] = $message;
		$data['type'] = $type;
	}
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('proyectos/ltsProyecto',$data);
	$this->load->view('viewfooter');
}

/*---------------------Vista listar idiomas-------------------------------------------*/
public function ltsIdioma($flag, $message, $type){   
	$data['idioma'] = $this->user_model->idioma();
	$data['resp']=$this->user_model->responsables();
	$data['ctrlpag']="ltsidiomas";
	$data['ltspag']="ltsidiomas";

	if(!$flag){
		$data['mensaje'] = $message;
		$data['type'] = $type;
	}
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('idioma/ltsIdioma',$data);
	$this->load->view('viewfooter');
}

/*---------------------Vista listar colaboracion-------------------------------------------*/
public function ltsColaboracion($flag, $message, $type){   
	$data['colaboracion'] = $this->user_model->colaboracion();
	$data['resp']=$this->user_model->responsables();
	$data['ctrlpag']="ltscolaboracion";
	$data['ltspag']="ltscolaboracion";

	if(!$flag){
		$data['mensaje'] = $message;
		$data['type'] = $type;
	}
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('colaboraciones/ltsColaboracion',$data);
	$this->load->view('viewfooter');
}

/*---------------------Vista listar assesorias-------------------------------------------*/
public function ltsAsesorias($flag, $message, $type){   
	$data['assesorias'] = $this->user_model->asesorias();
	$data['resp']=$this->user_model->responsables();
	$data['ctrlpag']="ltsassesorias";
	$data['ltspag']="ltsassesorias";

	if(!$flag){
		$data['mensaje'] = $message;
		$data['type'] = $type;
	}
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('asesorias/ltsAsesorias',$data);
	$this->load->view('viewfooter');
}

/*---------------------Vista listar eventos-------------------------------------------*/
public function ltsEvento($flag, $message, $type){   
	$data['eventos'] = $this->user_model->eventos();
	$data['resp']=$this->user_model->responsables();
	$data['ctrlpag']="ltseventos";
	$data['ltspag']="ltseventos";

	if(!$flag){
		$data['mensaje'] = $message;
		$data['type'] = $type;
	}
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('eventos/ltsEvento',$data);
	$this->load->view('viewfooter');
}

/*---------------------Vista listar investigaciones-------------------------------------------*/
public function ltsInvestigacion($flag, $message, $type){   
	$data['investigaciones'] = $this->user_model->investigaciones();
	$data['resp']=$this->user_model->responsables();
	$data['ctrlpag']="ltsinvestigaciones";
	$data['ltspag']="ltsinvestigaciones";

	if(!$flag){
		$data['mensaje'] = $message;
		$data['type'] = $type;
	}
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('investigaciones/ltsInvestigacion',$data);
	$this->load->view('viewfooter');
}

/*---------------------Vista listar reconocimiento-------------------------------------------*/
public function ltsReconocimiento($flag, $message, $type){   
	$data['reconocimiento'] = $this->user_model->reconocimientos();
	$data['resp']=$this->user_model->responsables();
	$data['ctrlpag']="ltsreconocimientos";
	$data['ltspag']="ltsreconocimientos";

	if(!$flag){
		$data['mensaje'] = $message;
		$data['type'] = $type;
	}
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('reconocimientos/ltsReconocimiento',$data);
	$this->load->view('viewfooter');
}

/*---------------------Vista listar misiones-------------------------------------------*/
public function ltsMision($flag, $message, $type){   
	$data['misiones'] = $this->user_model->misiones();
	$data['resp']=$this->user_model->responsables();
	$data['ctrlpag']="ltsmisiones";
	$data['ltspag']="ltsmisiones";

	if(!$flag){
		$data['mensaje'] = $message;
		$data['type'] = $type;
	}
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('misiones/ltsMision',$data);
	$this->load->view('viewfooter');
}

/*---------------------Vista listar pc-------------------------------------------*/
public function ltsPC($flag, $message, $type){   
	$data['pc'] = $this->user_model->pc();
	$data['resp']=$this->user_model->responsables();
	$data['ctrlpag']="tic";
	$data['ltspag']="ltspc";

	if(!$flag){
		$data['mensaje'] = $message;
		$data['type'] = $type;
	}
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('tic/ltsPC',$data);
	$this->load->view('viewfooter');
}

/*---------------------Vista listar telefono-------------------------------------------*/
public function ltsTelefono($flag, $message, $type){   
	$data['telefono'] = $this->user_model->telefono();
	$data['resp']=$this->user_model->responsables();
	$data['ctrlpag']="tic";
	$data['ltspag']="ltstelefono";

	if(!$flag){
		$data['mensaje'] = $message;
		$data['type'] = $type;
	}
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('tic/ltsTelefono',$data);
	$this->load->view('viewfooter');
}

/*---------------------Vista listar tablet-------------------------------------------*/
public function ltsTablet($flag, $message, $type){   
	$data['tablet'] = $this->user_model->tablet();
	$data['resp']=$this->user_model->responsables();
	$data['ctrlpag']="tic";
	$data['ltspag']="ltstablet";

	if(!$flag){
		$data['mensaje'] = $message;
		$data['type'] = $type;
	}
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('tic/ltsTablet',$data);
	$this->load->view('viewfooter');
}

/*---------------------Vista listar correo-------------------------------------------*/
public function ltsCorreo($flag, $message, $type){   
	$data['correo'] = $this->user_model->correo();
	$data['resp']=$this->user_model->responsables();
	$data['ctrlpag']="tic";
	$data['ltspag']="ltscorreo";

	if(!$flag){
		$data['mensaje'] = $message;
		$data['type'] = $type;
	}
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('tic/ltsCorreo',$data);
	$this->load->view('viewfooter');
}

/*---------------------Vista listar redsocial-------------------------------------------*/
public function ltsRedSocial($flag, $message, $type){   
	$data['redsocial'] = $this->user_model->redsocial();
	$data['resp']=$this->user_model->responsables();
	$data['ctrlpag']="ltsredsocial";
	$data['ltspag']="ltsredsocial";

	if(!$flag){
		$data['mensaje'] = $message;
		$data['type'] = $type;
	}
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('redsocial/ltsRedSocial',$data);
	$this->load->view('viewfooter');
}

/*---------------------Vista listar vivienda-------------------------------------------*/
public function ltsVivienda($flag, $message, $type){   
	$data['vivienda'] = $this->user_model->vivienda();
	$data['resp']=$this->user_model->responsables();
	$data['ctrlpag']="atencion";
	$data['ltspag']="ltsvivienda";

	if(!$flag){
		$data['mensaje'] = $message;
		$data['type'] = $type;
	}
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('vivienda/ltsVivienda',$data);
	$this->load->view('viewfooter');
}

/*---------------------Vista listar transporte-------------------------------------------*/
public function ltsTransporte($flag, $message, $type){   
	$data['transporte'] = $this->user_model->transporte();
	$data['resp']=$this->user_model->responsables();
	$data['ctrlpag']="atencion";
	$data['ltspag']="ltstransporte";

	if(!$flag){
		$data['mensaje'] = $message;
		$data['type'] = $type;
	}
	$this->load->view('cabecera');
	$this->load->view('menu', $data);
	$this->load->view('transporte/ltsTransporte',$data);
	$this->load->view('viewfooter');
}

/*-----------------Exportar expediente----------------------------------------------------*/
public function expExpedientePDF($ci){
	date_default_timezone_set('UTC'); setlocale(LC_TIME, 'spanish');

	//cargar la libreria
	$this->load->library('fpdf_gen');

	// crear el objeto
	$pdf = new FPDF("L", "mm", "letter");
	$this->fpdf->AliasNbPages('(np)');

	//margenes
	$this->fpdf->SetMargins(5,3,3,3);
	

  //---------------------------Datos personales-----------------------------
	//query datos personales
	$miembro_query=$this->db->query('SELECT * FROM datospersonales WHERE  ci = "'.$ci.'" ');
	//guardo en variables el resultado
	$miembro_data = NULL;
	foreach($miembro_query->result() as $miembro_valor){
		$miembro_data[0]=$miembro_valor->nombres.' '.$miembro_valor->apellido1.' '.$miembro_valor->apellido2;
		$miembro_data[1]=$miembro_valor->ci;
		$miembro_data[2] =$miembro_valor->ciMilitar;
		$miembro_data[3]=$miembro_valor->nacionalidad;
		$miembro_data[4]=$miembro_valor->direccion;
		$miembro_data[5]=$miembro_valor->avatar;
		$miembro_data[6]=$miembro_valor->gradoMilitar;
	}
	
	//query cat docente
	$miembro_cat_docente_query=$this->db->query('SELECT * FROM categoriadocente INNER JOIN datospersonales ON (datospersonales.ci = categoriadocente.datosPersonales_ci)
	WHERE  datospersonales.ci = "'.$ci.'" ');
	//guardo en variables el resultado
	$miembro_cat_docente_data = NULL;
	$fecha_ant_docente = null;
	foreach($miembro_cat_docente_query->result() as $miembro_cat_docente_valor){
		if($miembro_cat_docente_valor->fecha > $fecha_ant_docente){
			$fecha_ant_docente = $miembro_cat_docente_valor->fecha;
			$miembro_cat_docente_data[0]=$miembro_cat_docente_valor->tipo;
		}
	}

	//query  ocuacion
	$miembro_ocuacion_query=$this->db->query('SELECT * FROM ocupacion INNER JOIN datospersonales ON (datospersonales.ci = ocupacion.datosPersonales_ci)
	WHERE  datospersonales.ci = "'.$ci.'" ');
	//guardo en variables el resultado
	$miembro_ocuacion_data = NULL;
	$fecha_ant_ocuacion = null;
	foreach($miembro_ocuacion_query->result() as $miembro_ocuacion_valor){
		if($miembro_ocuacion_valor->fecha > $fecha_ant_ocuacion){
			$fecha_ant_ocuacion = $miembro_ocuacion_valor->fecha;
			$miembro_ocuacion_data[0]=$miembro_ocuacion_valor->ocupacion;
		}
	}

	//query titulo_acad
	$miembro_titulo_acad_query=$this->db->query('SELECT * FROM tituloacademico INNER JOIN datospersonales ON (datospersonales.ci = tituloacademico.datosPersonales_ci)
	WHERE  datospersonales.ci = "'.$ci.'" ');
	//guardo en variables el resultado
	$miembro_titulo_acad_data = NULL;
	$fecha_ant_titulo_acad = null;
	foreach($miembro_titulo_acad_query->result() as $miembro_titulo_acad_valor){
		if($miembro_titulo_acad_valor->fecha > $fecha_ant_titulo_acad){
			$fecha_ant_titulo_acad = $miembro_titulo_acad_valor->fecha;
			$miembro_titulo_acad_data[0]=$miembro_titulo_acad_valor->tipo;
		}
	}

	//query cat cientifica
	$miembro_cat_cientifica_query=$this->db->query('SELECT * FROM categoriacientifica INNER JOIN datospersonales ON (datospersonales.ci = categoriacientifica.datosPersonales_ci)
	WHERE  datospersonales.ci = "'.$ci.'" ');
	//guardo en variables el resultado
	$miembro_cat_cientifica_data = NULL;
	$fecha_ant_cientifica = null;
	foreach($miembro_cat_cientifica_query->result() as $miembro_cat_cientifica_valor){
		if($miembro_cat_cientifica_valor->fecha > $fecha_ant_cientifica){
			$fecha_ant_cientifica = $miembro_cat_cientifica_valor->fecha;
			$miembro_cat_cientifica_data[0]=$miembro_cat_cientifica_valor->tipo;
		}
	}

	//query grado
	$miembro_grado_query=$this->db->query('SELECT * FROM gradocientifico INNER JOIN datospersonales ON (datospersonales.ci = gradocientifico.datosPersonales_ci)
	WHERE  datospersonales.ci = "'.$ci.'" ');
	//guardo en variables el resultado
	$miembro_grado_data = NULL;
	$fecha_ant_grado = null;
	foreach($miembro_grado_query->result() as $miembro_grado_valor){
		if($miembro_grado_valor->fecha > $fecha_ant_grado){
			$fecha_ant_grado = $miembro_grado_valor->fecha;
			$miembro_grado_data[0]=$miembro_grado_valor->tipo;
		}
	}

	$this->fpdf->Ln(10);
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->SetFillColor(31, 137, 229);//Fondo azul de celda
    $this->fpdf->SetTextColor(255, 255, 255); //Letra color blanco
	$this->fpdf->Cell(200,10,utf8_decode("CURRICULUM VITAE"),1,1,'C',1);
	$this->fpdf->Image(base_url('dist/img/avatar/'."$miembro_data[5]"),10,10,35, 35);
	$this->fpdf->SetFont('Arial','B',12);
	
	//Cabecera del reporte
	$this->fpdf->Ln(20);
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->SetFillColor(101, 187, 106);//Fondo verde de celda
    $this->fpdf->SetTextColor(255, 255, 255); //Letra color blanco
	$this->fpdf->Cell(200,10,utf8_decode("DATOS PERSONALES"),1,1,'C', 1);
	$this->fpdf->Ln(2);
	 
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->SetTextColor(0, 0, 0); //Letra color negro
	$this->fpdf->Cell(200,10,utf8_decode("Nombres y apellidos: "."$miembro_data[0]"),0,0,'L', 0);
	$this->fpdf->Ln(5);
	$this->fpdf->Cell(200,10,utf8_decode("Grado militar: "."$miembro_data[6]"),0,0,'L', 0);
	$this->fpdf->Ln(5);
	$this->fpdf->Cell(200,10,utf8_decode("CI: "."$miembro_data[1]"),0,0,'L', 0);
	$this->fpdf->Ln(5);
	$this->fpdf->Cell(200,10,utf8_decode("CI militar: "."$miembro_data[2]"),0,0,'L', 0);
	$this->fpdf->Ln(5);
	if($miembro_ocuacion_data == NULL){
		$this->fpdf->Cell(200,10,utf8_decode("Ocupación: "),0,0,'L', 0);
	}else{
		$this->fpdf->Cell(200,10,utf8_decode("Ocupación: "."$miembro_ocuacion_data[0]"),0,0,'L', 0);
	}
	$this->fpdf->Ln(5);
	$this->fpdf->Cell(200,10,utf8_decode("Nacionalidad: "."$miembro_data[3]"),0,0,'L', 0);
	$this->fpdf->Ln(5);
	$this->fpdf->Cell(200,10,utf8_decode("Dirección particular: "."$miembro_data[4]"),0,0,'L', 0);
	$this->fpdf->Ln(5);
	if($miembro_titulo_acad_data == NULL){
		$this->fpdf->Cell(200,10,utf8_decode("Título académico: "),0,0,'L', 0);
	}else{
		$this->fpdf->Cell(200,10,utf8_decode("Título académico: "."$miembro_titulo_acad_data[0]"),0,0,'L', 0);
	}
	$this->fpdf->Ln(5);
	if($miembro_grado_data == NULL){
		$this->fpdf->Cell(200,10,utf8_decode("Grado científico: "),0,0,'L', 0);
	}else{
		$this->fpdf->Cell(200,10,utf8_decode("Grado científico: "."$miembro_grado_data[0]"),0,0,'L', 0);
	}
	$this->fpdf->Ln(5);
	if($miembro_cat_docente_data == NULL){
		$this->fpdf->Cell(200,10,utf8_decode("Categoría docente: "),0,0,'L', 0);
	}else{
		$this->fpdf->Cell(200,10,utf8_decode("Categoría docente: "."$miembro_cat_docente_data[0]"),0,0,'L', 0);
	}
	$this->fpdf->Ln(5);
	if($miembro_cat_docente_data == NULL){
		$this->fpdf->Cell(200,10,utf8_decode("Categoría científica: "),0,0,'L', 0);
	}else{
		$this->fpdf->Cell(200,10,utf8_decode("Categoría científica: "."$miembro_cat_cientifica_data[0]"),0,0,'L', 0);
	}

 //--------------------------Datos Profesionales----------------------------------------------
	//Cabecera del reporte
	$this->fpdf->Ln(15);
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->SetFillColor(101, 187, 106);//Fondo verde de celda
    $this->fpdf->SetTextColor(255, 255, 255); //Letra color blanco
	$this->fpdf->Cell(200,10,utf8_decode("DATOS PROFESIONALES"),1,1,'C', 1);
	$this->fpdf->Ln(2);

  //---------------------------------1-------------------------------------------------------------------------------------------------------------------------
	//1
    $this->fpdf->SetTextColor(0,0,0); //Letra color blanco
	$this->fpdf->Cell(200,10,utf8_decode("1. Estudios: (Carreras, Centros de Estudios, países, fecha y títulos obtenidos relacionados crono-"),0,0,'L', 0);
	$this->fpdf->Ln(5);
	$this->fpdf->Cell(200,10,utf8_decode("    lógicamente)."),0,1,'L', 0);
	$this->fpdf->Ln(2);

	//query cestudio
	$miembro_cestudio_query=$this->db->query('SELECT * FROM centroestudio INNER JOIN datospersonales ON (datospersonales.ci = centroestudio.datosPersonales_ci )
	WHERE  datospersonales.ci = "'.$ci.'" ORDER BY centroestudio.fechaInicio DESC ');
	
	//guardo en variables el resultado
	$i=0;
	$j=0;
	$miembro_cestudio_data = NULL;
	foreach($miembro_cestudio_query->result() as $miembro_cestudio_valor){
		$miembro_cestudio_data[$i][$j++]=$miembro_cestudio_valor->nombre;
		$miembro_cestudio_data[$i][$j++]=$miembro_cestudio_valor->tipo;
		$miembro_cestudio_data[$i][$j++]=$miembro_cestudio_valor->fechaInicio;
		$miembro_cestudio_data[$i][$j++]=$miembro_cestudio_valor->fechaFin;
		$i++;
		$j=0;
	}

	//Confecciono el header de la table
	$header_cestudio = array("Nombre", "Tipo", "Fecha inicio", "Fecha fin");
	$ancho_columnas_cestudio = array(90, 50, 30, 30);
	
	// Cabecera
	for($i=0;$i<count($header_cestudio);$i++){
		$this->fpdf->SetFillColor(127, 127, 127);//Fondo gris de celda
    	$this->fpdf->SetTextColor(255, 255, 255); //Letra color blanco
		$this->fpdf->Cell($ancho_columnas_cestudio[$i],7,utf8_decode($header_cestudio[$i]),1,0,'C', 1);
	}
	$this->fpdf->Ln();
	if($miembro_cestudio_data == NULL){
		$this->fpdf->SetTextColor(0, 0, 0); //Letra color negra
		$this->fpdf->Cell(200,10,'No hay registros que mostrar',1,1,'C', 0);
	}
	else{
		$a=0;
		foreach($miembro_cestudio_data as $row){		
			$table_cestudio[$a][0] = utf8_decode($row[0]);
			$table_cestudio[$a][1] = utf8_decode($row[1]);
			$table_cestudio[$a][2] = utf8_decode($row[2]);
			$table_cestudio[$a][3] = utf8_decode($row[3]);
			$a++;
		}
		$this->fpdf->SetTextColor(0, 0, 0); //Letra color negro
		$this->fpdf->plot_table($ancho_columnas_cestudio, 6, $table_cestudio);
	} 
	$this->fpdf->Cell(array_sum($ancho_columnas_cestudio),0,'','T');
	$this->fpdf->Ln(2);

  //---------------------------------2-------------------------------------------------------------------------------------------------------------------------
	//2
	$this->fpdf->Ln(4);
    $this->fpdf->SetTextColor(0,0,0); //Letra color blanco
	$this->fpdf->Cell(200,10,utf8_decode("2. Estudios de postgrados, cursos especializados, (Centros de Estudios, materia o temas, profesor"),0,0,'L', 0);
	$this->fpdf->Ln(5);
	$this->fpdf->Cell(200,10,utf8_decode("    etc.)."),0,1,'L', 0);
	$this->fpdf->Ln(2);

	//postgrados
	//query postgrado
	$miembro_postgrado_query=$this->db->query('SELECT * FROM postgrados INNER JOIN datospersonales ON (datospersonales.ci = postgrados.datosPersonales_ci)
	WHERE  datospersonales.ci = "'.$ci.'" ');
	
	//guardo en variables el resultado
	$i=0;
	$j=0;
	$miembro_postgrado_data = NULL;
	foreach($miembro_postgrado_query->result() as $miembro_postgrado_valor){
		$miembro_postgrado_data[$i][$j++]=$miembro_postgrado_valor->tipo;
		$miembro_postgrado_data[$i][$j++]=$miembro_postgrado_valor->denominacion;
		$miembro_postgrado_data[$i][$j++]=$miembro_postgrado_valor->fecha;
		$miembro_postgrado_data[$i][$j++]=$miembro_postgrado_valor->cantHoras;
		$miembro_postgrado_data[$i][$j++]=$miembro_postgrado_valor->centroReferencia;
		$miembro_postgrado_data[$i][$j++]=$miembro_postgrado_valor->calificacion;
		$i++;
		$j=0;
	}

	//Confecciono el header de la table
	$header_postgrado = array("Tipo", "Denominación", "Fecha", "C/h", "Centro ref.", "Calific.");
	$ancho_columnas_postgrado = array(30, 60, 25, 15, 50, 20);

	
	for($i=0;$i<count($header_postgrado);$i++){
		$this->fpdf->SetFillColor(127, 127, 127);//Fondo gris de celda
    	$this->fpdf->SetTextColor(255, 255, 255); //Letra color blanco
		$this->fpdf->Cell($ancho_columnas_postgrado[$i],7,utf8_decode($header_postgrado[$i]),1,0,'C', 1);
	}
	$this->fpdf->Ln();
	if($miembro_postgrado_data == NULL){
		$this->fpdf->SetTextColor(0, 0, 0); //Letra color negra
		$this->fpdf->Cell(200,10,'No hay registros que mostrar',1,1,'C', 0);
	}
	else{
		$a=0;
		foreach($miembro_postgrado_data as $row){		
			$table_postgrado[$a][0] = utf8_decode($row[0]);
			$table_postgrado[$a][1] = utf8_decode($row[1]);
			$table_postgrado[$a][2] = utf8_decode($row[2]);
			$table_postgrado[$a][3] = utf8_decode($row[3]);
			$table_postgrado[$a][4] = utf8_decode($row[4]);
			$table_postgrado[$a][5] = utf8_decode($row[5]);
			$a++;
		}
		$this->fpdf->SetTextColor(0, 0, 0); //Letra color negro
		$this->fpdf->plot_table($ancho_columnas_postgrado, 6, $table_postgrado);
	} 
	$this->fpdf->Cell(array_sum($ancho_columnas_postgrado),0,'','T');
	$this->fpdf->Ln(2);
	
  //---------------------------------3-------------------------------------------------------------------------------------------------------------------------
	//3
	$this->fpdf->Ln(4);
    $this->fpdf->SetTextColor(0,0,0); //Letra color negro
	$this->fpdf->Cell(200,10,utf8_decode("3. Experiencia profesional en su campo (cursos impartidos, asesoría a trabajos de investigación"),0,0,'L', 0);
	$this->fpdf->Ln(5);
	$this->fpdf->Cell(200,10,utf8_decode("    estudiantil, tribunales, etc, Centro, fecha)."),0,1,'L', 0);
	$this->fpdf->Ln(2);

	//cimpartidos
	//query cimpartidos
	$miembro_cimpartidos_query=$this->db->query('SELECT * FROM cursosimpartidos INNER JOIN datospersonales ON (datospersonales.ci = cursosimpartidos.datosPersonales_ci)
	WHERE  datospersonales.ci = "'.$ci.'" ');
	
	//guardo en variables el resultado
	$i=0;
	$j=0;
	$miembro_cimpartidos_data = NULL;
	foreach($miembro_cimpartidos_query->result() as $miembro_cimpartidos_valor){
		$miembro_cimpartidos_data[$i][$j++]=$miembro_cimpartidos_valor->nombre;
		$miembro_cimpartidos_data[$i][$j++]=$miembro_cimpartidos_valor->tipo;
		$miembro_cimpartidos_data[$i][$j++]=$miembro_cimpartidos_valor->fecha;
		$i++;
		$j=0;
	}

	//Confecciono el header de la table
	$header_cimpartidos = array("Nombre", "Tipo", "Fecha");
	$ancho_columnas_cimpartidos = array(120, 50, 30);
	

	$this->fpdf->SetTextColor(0,0,0); //Letra color negro
	$this->fpdf->Cell(200,10,utf8_decode("Cursos impartidos:"),0,0,'L', 0);
	$this->fpdf->Ln();
	// Cabecera
	for($i=0;$i<count($header_cimpartidos);$i++){
		$this->fpdf->SetFillColor(127, 127, 127);//Fondo gris de celda
    	$this->fpdf->SetTextColor(255, 255, 255); //Letra color blanco
		$this->fpdf->Cell($ancho_columnas_cimpartidos[$i],7,utf8_decode($header_cimpartidos[$i]),1,0,'C', 1);
	}
	$this->fpdf->Ln();
	if($miembro_cimpartidos_data == NULL){
		$this->fpdf->SetTextColor(0, 0, 0); //Letra color negra
		$this->fpdf->Cell(200,10,'No hay registros que mostrar',1,1,'C', 0);
	}
	else{
		$a=0;
		foreach($miembro_cimpartidos_data as $row){		
			$table_cimpartidos[$a][0] = utf8_decode($row[0]);
			$table_cimpartidos[$a][1] = utf8_decode($row[1]);
			$table_cimpartidos[$a][2] = utf8_decode($row[2]);
			$a++;
		}
		$this->fpdf->SetTextColor(0, 0, 0); //Letra color negro
		$this->fpdf->plot_table($ancho_columnas_cimpartidos, 6, $table_cimpartidos);
	} 
	$this->fpdf->Cell(array_sum($ancho_columnas_cimpartidos),0,'','T');
	$this->fpdf->Ln(2);


	//asesorias
	//query asesorias
	$miembro_asesorias_query=$this->db->query('SELECT * FROM asesorias INNER JOIN datospersonales ON (datospersonales.ci = asesorias.datosPersonales_ci)
	WHERE  datospersonales.ci = "'.$ci.'" ');
	
	//guardo en variables el resultado
	$i=0;
	$j=0;
	$miembro_asesorias_data = NULL;
	foreach($miembro_asesorias_query->result() as $miembro_asesorias_valor){
		$miembro_asesorias_data[$i][$j++]=$miembro_asesorias_valor->nombreTrabajo;
		$miembro_asesorias_data[$i][$j++]=$miembro_asesorias_valor->fehca;
		$i++;
		$j=0;
	}

	//Confecciono el header de la table
	$header_asesorias = array("Nombre del trabajo", "Fecha");
	$ancho_columnas_asesorias = array(170, 30);
	

	$this->fpdf->SetTextColor(0,0,0); //Letra color negro
	$this->fpdf->Cell(200,10,utf8_decode("Asesoría a trabajos de investigación estudiantil:"),0,0,'L', 0);
	$this->fpdf->Ln();
	// Cabecera
	for($i=0;$i<count($header_asesorias);$i++){
		$this->fpdf->SetFillColor(127, 127, 127);//Fondo gris de celda
    	$this->fpdf->SetTextColor(255, 255, 255); //Letra color blanco
		$this->fpdf->Cell($ancho_columnas_asesorias[$i],7,utf8_decode($header_asesorias[$i]),1,0,'C', 1);
	}
	$this->fpdf->Ln();
	if($miembro_asesorias_data == NULL){
		$this->fpdf->SetTextColor(0, 0, 0); //Letra color negra
		$this->fpdf->Cell(200,10,'No hay registros que mostrar',1,1,'C', 0);
	}
	else{
		$a=0;
		foreach($miembro_asesorias_data as $row){		
			$table_asesorias[$a][0] = utf8_decode($row[0]);
			$table_asesorias[$a][1] = utf8_decode($row[1]);
			$a++;
		}
		$this->fpdf->SetTextColor(0, 0, 0); //Letra color negro
		$this->fpdf->plot_table($ancho_columnas_asesorias, 6, $table_asesorias);
	} 
	$this->fpdf->Cell(array_sum($ancho_columnas_asesorias),0,'','T');
	$this->fpdf->Ln(2);

  //---------------------------------4-------------------------------------------------------------------------------------------------------------------------
	//4	
	$this->fpdf->Ln(4);
	$this->fpdf->SetTextColor(0,0,0); //Letra color negro
	$this->fpdf->Cell(200,10,utf8_decode("4. Investigaciones (temas, forma de participación, lugares, fechas)."),0,0,'L', 0);
	$this->fpdf->Ln();

	//query investigaciones
	$miembro_investigaciones_query=$this->db->query('SELECT * FROM investigacionesrealizadas INNER JOIN datospersonales ON (datospersonales.ci = investigacionesrealizadas.datosPersonales_ci)
	WHERE  datospersonales.ci = "'.$ci.'" ');
	
	//guardo en variables el resultado
	$i=0;
	$j=0;
	$miembro_investigaciones_data = NULL;
	foreach($miembro_investigaciones_query->result() as $miembro_investigaciones_valor){
		$miembro_investigaciones_data[$i][$j++]=$miembro_investigaciones_valor->nombreInvestigacion;
		$miembro_investigaciones_data[$i][$j++]=$miembro_investigaciones_valor->anno;
		$i++;
		$j=0;
	}

	//Confecciono el header de la table
	$header_investigaciones = array("Nombre de la investigación", "Año");
	$ancho_columnas_investigaciones = array(180, 20);
	
	// Cabecera
	for($i=0;$i<count($header_investigaciones);$i++){
		$this->fpdf->SetFillColor(127, 127, 127);//Fondo gris de celda
    	$this->fpdf->SetTextColor(255, 255, 255); //Letra color blanco
		$this->fpdf->Cell($ancho_columnas_investigaciones[$i],7,utf8_decode($header_investigaciones[$i]),1,0,'C', 1);
	}
	$this->fpdf->Ln();
	if($miembro_investigaciones_data == NULL){
		$this->fpdf->SetTextColor(0, 0, 0); //Letra color negra
		$this->fpdf->Cell(200,10,'No hay registros que mostrar',1,1,'C', 0);
	}
	else{
		$a=0;
		foreach($miembro_investigaciones_data as $row){		
			$table_investigaciones[$a][0] = utf8_decode($row[0]);
			$table_investigaciones[$a][1] = utf8_decode($row[1]);
			$a++;
		}
		$this->fpdf->SetTextColor(0, 0, 0); //Letra color negro
		$this->fpdf->plot_table($ancho_columnas_investigaciones, 6, $table_investigaciones);
	} 
	$this->fpdf->Cell(array_sum($ancho_columnas_investigaciones),0,'','T');
	$this->fpdf->Ln(2);

  //---------------------------------5-------------------------------------------------------------------------------------------------------------------------
	//5	
	$this->fpdf->Ln(4);
	$this->fpdf->SetTextColor(0,0,0); //Letra color negro
	$this->fpdf->Cell(200,10,utf8_decode("5. Publicaciones (relación de los títulos, nombre de las revistas o boletines, etc, fecha y lugar)."),0,0,'L', 0);
	$this->fpdf->Ln();

	//query publicaciones
	$miembro_investigaciones_query=$this->db->query('SELECT * FROM publicaciones INNER JOIN datospersonales ON (datospersonales.ci = publicaciones.datosPersonales_ci)
	WHERE  datospersonales.ci = "'.$ci.'" ');
	
	//guardo en variables el resultado
	$i=0;
	$j=0;
	$miembro_publicaciones_data = NULL;
	foreach($miembro_investigaciones_query->result() as $miembro_publicaciones_valor){
		$miembro_publicaciones_data[$i][$j++]=$miembro_publicaciones_valor->titulo;
		$miembro_publicaciones_data[$i][$j++]=$miembro_publicaciones_valor->nivel;
		$miembro_publicaciones_data[$i][$j++]=$miembro_publicaciones_valor->fecha;
		$miembro_publicaciones_data[$i][$j++]=$miembro_publicaciones_valor->url;
		$miembro_publicaciones_data[$i][$j++]=$miembro_publicaciones_valor->isbnISSN;
		$miembro_publicaciones_data[$i][$j++]=$miembro_publicaciones_valor->tipoPublicacion;
		$i++;
		$j=0;
	}

	//Confecciono el header de la table
	$header_publicaciones = array("Título", "Nivel", "Fecha", "URL", "ISBN/ISSN.", "Tipo");
	$ancho_columnas_publicaciones = array(65,15,25,40,30,25);
	
	// Cabecera
	for($i=0;$i<count($header_publicaciones);$i++){
		$this->fpdf->SetFillColor(127, 127, 127);//Fondo gris de celda
    	$this->fpdf->SetTextColor(255, 255, 255); //Letra color blanco
		$this->fpdf->Cell($ancho_columnas_publicaciones[$i],7,utf8_decode($header_publicaciones[$i]),1,0,'C', 1);
	}
	$this->fpdf->Ln();
	if($miembro_publicaciones_data == NULL){
		$this->fpdf->SetTextColor(0, 0, 0); //Letra color negra
		$this->fpdf->Cell(200,10,'No hay registros que mostrar',1,1,'C', 0);
	}
	else{
		$a=0;
		foreach($miembro_publicaciones_data as $row){		
			$table_publicaciones[$a][0] = utf8_decode($row[0]);
			$table_publicaciones[$a][1] = utf8_decode($row[1]);
			$table_publicaciones[$a][2] = utf8_decode($row[2]);
			$table_publicaciones[$a][3] = utf8_decode($row[3]);
			$table_publicaciones[$a][4] = utf8_decode($row[4]);
			$table_publicaciones[$a][5] = utf8_decode($row[5]);
			$a++;
		}
		$this->fpdf->SetTextColor(0, 0, 0); //Letra color negro
		$this->fpdf->plot_table($ancho_columnas_publicaciones, 6, $table_publicaciones);
	} 
	$this->fpdf->Cell(array_sum($ancho_columnas_publicaciones),0,'','T');
	$this->fpdf->Ln(2);

  //---------------------------------6-------------------------------------------------------------------------------------------------------------------------
	//6	
	$this->fpdf->Ln(4);
	$this->fpdf->SetTextColor(0,0,0); //Letra color negro
	$this->fpdf->Cell(200,10,utf8_decode("6. Congresos, conferencias, simposium, etc, en que ha participado (lugar,  fecha,  en calidad de"),0,0,'L', 0);
	$this->fpdf->Ln(5);
	$this->fpdf->Cell(200,10,utf8_decode("    que: observador, delegado, ponente)."),0,1,'L', 0);
	//$this->fpdf->Ln();

	//query eventos
	$miembro_eventos_query=$this->db->query('SELECT * FROM eventos INNER JOIN datospersonales ON (datospersonales.ci = eventos.datosPersonales_ci)
	WHERE  datospersonales.ci = "'.$ci.'" ');
	
	//guardo en variables el resultado
	$i=0;
	$j=0;
	$miembro_eventos_data = NULL;
	foreach($miembro_eventos_query->result() as $miembro_eventos_valor){
		$miembro_eventos_data[$i][$j++]=$miembro_eventos_valor->tipoEvento;
		$miembro_eventos_data[$i][$j++]=$miembro_eventos_valor->denominacion;
		$miembro_eventos_data[$i][$j++]=$miembro_eventos_valor->fecha;
		$i++;
		$j=0;
	}

	//Confecciono el header de la table
	$header_eventos = array("Nivel", "Denominación", "Fecha");
	$ancho_columnas_eventos = array(65,110,25);
	
	// Cabecera
	for($i=0;$i<count($header_eventos);$i++){
		$this->fpdf->SetFillColor(127, 127, 127);//Fondo gris de celda
    	$this->fpdf->SetTextColor(255, 255, 255); //Letra color blanco
		$this->fpdf->Cell($ancho_columnas_eventos[$i],7,utf8_decode($header_eventos[$i]),1,0,'C', 1);
	}
	$this->fpdf->Ln();
	if($miembro_eventos_data == NULL){
		$this->fpdf->SetTextColor(0, 0, 0); //Letra color negra
		$this->fpdf->Cell(200,10,'No hay registros que mostrar',1,1,'C', 0);
	}
	else{
		$a=0;
		foreach($miembro_eventos_data as $row){		
			$table_eventos[$a][0] = utf8_decode($row[0]);
			$table_eventos[$a][1] = utf8_decode($row[1]);
			$table_eventos[$a][2] = utf8_decode($row[2]);
			$a++;
		}
		$this->fpdf->SetTextColor(0, 0, 0); //Letra color negro
		$this->fpdf->plot_table($ancho_columnas_eventos, 6, $table_eventos);
	} 
	$this->fpdf->Cell(array_sum($ancho_columnas_eventos),0,'','T');
	$this->fpdf->Ln(2);

  //---------------------------------7-------------------------------------------------------------------------------------------------------------------------
	//7	
	$this->fpdf->Ln(4);
	$this->fpdf->SetTextColor(0,0,0); //Letra color negro
	$this->fpdf->Cell(200,10,utf8_decode("7. Idiomas extranjeros (si lo habla, escribe y lee)."),0,0,'L', 0);
	$this->fpdf->Ln();

	//query idioma
	$miembro_idioma_query=$this->db->query('SELECT * FROM idioma INNER JOIN datospersonales ON (datospersonales.ci = idioma.datosPersonales_ci)
	WHERE  datospersonales.ci = "'.$ci.'" ');
	
	//guardo en variables el resultado
	$i=0;
	$j=0;
	$miembro_idioma_data = NULL;
	foreach($miembro_idioma_query->result() as $miembro_idioma_valor){
		$miembro_idioma_data[$i][$j++]=$miembro_idioma_valor->nombre;
		$miembro_idioma_data[$i][$j++]=$miembro_idioma_valor->calficHabla;
		$miembro_idioma_data[$i][$j++]=$miembro_idioma_valor->califLee;
		$miembro_idioma_data[$i][$j++]=$miembro_idioma_valor->califEscribe;
		$i++;
		$j=0;
	}

	//Confecciono el header de la table
	$header_idioma = array("Idioma", "Habla", "Lee", "Escribe");
	$ancho_columnas_idioma = array(50,50,50,50);
	
	// Cabecera
	for($i=0;$i<count($header_idioma);$i++){
		$this->fpdf->SetFillColor(127, 127, 127);//Fondo gris de celda
    	$this->fpdf->SetTextColor(255, 255, 255); //Letra color blanco
		$this->fpdf->Cell($ancho_columnas_idioma[$i],7,utf8_decode($header_idioma[$i]),1,0,'C', 1);
	}
	$this->fpdf->Ln();
	if($miembro_idioma_data == NULL){
		$this->fpdf->SetTextColor(0, 0, 0); //Letra color negra
		$this->fpdf->Cell(200,10,'No hay registros que mostrar',1,1,'C', 0);
	}
	else{
		$a=0;
		foreach($miembro_idioma_data as $row){		
			$table_idioma[$a][0] = utf8_decode($row[0]);
			$table_idioma[$a][1] = utf8_decode($row[1]);
			$table_idioma[$a][2] = utf8_decode($row[2]);
			$table_idioma[$a][3] = utf8_decode($row[3]);
			$a++;
		}
		$this->fpdf->SetTextColor(0, 0, 0); //Letra color negro
		$this->fpdf->plot_table($ancho_columnas_idioma, 6, $table_idioma);
	} 
	$this->fpdf->Cell(array_sum($ancho_columnas_idioma),0,'','T');
	$this->fpdf->Ln(2);

  //---------------------------------8-------------------------------------------------------------------------------------------------------------------------
	//8
	$this->fpdf->Ln(4);
	$this->fpdf->SetTextColor(0,0,0); //Letra color negro
	$this->fpdf->Cell(200,10,utf8_decode("8. Colaboración en función de dirección (Consejos Científicos, Comisiones de expertos o espe-"),0,0,'L', 0);
	$this->fpdf->Ln(5);
	$this->fpdf->Cell(200,10,utf8_decode("    cialistas, dirigente docente o científico, etc)."),0,1,'L', 0);
	//$this->fpdf->Ln();

	//query colaboracion
	$miembro_colaboracion_query=$this->db->query('SELECT * FROM colabfunciondireccion INNER JOIN datospersonales ON (datospersonales.ci = colabfunciondireccion.datosPersonales_ci)
	WHERE  datospersonales.ci = "'.$ci.'" ');
	
	//guardo en variables el resultado
	$i=0;
	$j=0;
	$miembro_colaboracion_data = NULL;
	foreach($miembro_colaboracion_query->result() as $miembro_colaboracion_valor){
		$miembro_colaboracion_data[$i][$j++]=$miembro_colaboracion_valor->tipo;
		$miembro_colaboracion_data[$i][$j++]=$miembro_colaboracion_valor->fechaInicio;
		$miembro_colaboracion_data[$i][$j++]=$miembro_colaboracion_valor->fechaFin;
		$i++;
		$j=0;
	}

	//Confecciono el header de la table
	$header_colaboracion = array("Tipo de colaboración", "Fecha inicio", "Fecha fin");
	$ancho_columnas_colaboracion = array(130,35,35);
	
	// Cabecera
	for($i=0;$i<count($header_colaboracion);$i++){
		$this->fpdf->SetFillColor(127, 127, 127);//Fondo gris de celda
    	$this->fpdf->SetTextColor(255, 255, 255); //Letra color blanco
		$this->fpdf->Cell($ancho_columnas_colaboracion[$i],7,utf8_decode($header_colaboracion[$i]),1,0,'C', 1);
	}
	$this->fpdf->Ln();
	if($miembro_colaboracion_data == NULL){
		$this->fpdf->SetTextColor(0, 0, 0); //Letra color negra
		$this->fpdf->Cell(200,10,'No hay registros que mostrar',1,1,'C', 0);
	}
	else{
		$a=0;
		foreach($miembro_colaboracion_data as $row){		
			$table_colaboracion[$a][0] = utf8_decode($row[0]);
			$table_colaboracion[$a][1] = utf8_decode($row[1]);
			$table_colaboracion[$a][2] = utf8_decode($row[2]);
			$a++;
		}
		$this->fpdf->SetTextColor(0, 0, 0); //Letra color negro
		$this->fpdf->plot_table($ancho_columnas_colaboracion, 6, $table_colaboracion);
	} 
	$this->fpdf->Cell(array_sum($ancho_columnas_colaboracion),0,'','T');
	$this->fpdf->Ln(2);

  //---------------------------------9-------------------------------------------------------------------------------------------------------------------------
	//9
	$this->fpdf->Ln(4);
	$this->fpdf->SetTextColor(0,0,0); //Letra color negro
	$this->fpdf->Cell(200,10,utf8_decode("9. Otras menciones técnicas o especiales realizadas en el extranjero (país, año, carácter de las"),0,0,'L', 0);
	$this->fpdf->Ln(5);
	$this->fpdf->Cell(200,10,utf8_decode("    misiones, organismo por el que participó)."),0,1,'L', 0);
	
	//query misiones
	$miembro_misiones_query=$this->db->query('SELECT * FROM misionesinternacionales INNER JOIN datospersonales ON (datospersonales.ci = misionesinternacionales.datosPersonales_ci)
	WHERE  datospersonales.ci = "'.$ci.'" ');
	
	//guardo en variables el resultado
	$i=0;
	$j=0;
	$miembro_misiones_data = NULL;
	foreach($miembro_misiones_query->result() as $miembro_misiones_valor){
		$miembro_misiones_data[$i][$j++]=$miembro_misiones_valor->pais;
		$miembro_misiones_data[$i][$j++]=$miembro_misiones_valor->fechaInicio;
		$miembro_misiones_data[$i][$j++]=$miembro_misiones_valor->fechaFin;
		$miembro_misiones_data[$i][$j++]=$miembro_misiones_valor->caracter;
		$miembro_misiones_data[$i][$j++]=$miembro_misiones_valor->organismo;
		$i++;
		$j=0;
	}

	//Confecciono el header de la table
	$header_misiones = array("País", "Fecha inicio", "Fecha fin", "Carácter", "Organismo");
	$ancho_columnas_misiones = array(40,40,40,40, 40);
	
	// Cabecera
	for($i=0;$i<count($header_misiones);$i++){
		$this->fpdf->SetFillColor(127, 127, 127);//Fondo gris de celda
    	$this->fpdf->SetTextColor(255, 255, 255); //Letra color blanco
		$this->fpdf->Cell($ancho_columnas_misiones[$i],7,utf8_decode($header_misiones[$i]),1,0,'C', 1);
	}
	$this->fpdf->Ln();
	if($miembro_misiones_data == NULL){
		$this->fpdf->SetTextColor(0, 0, 0); //Letra color negra
		$this->fpdf->Cell(200,10,'No hay registros que mostrar',1,1,'C', 0);
	}
	else{
		$a=0;
		foreach($miembro_misiones_data as $row){		
			$table_misiones[$a][0] = utf8_decode($row[0]);
			$table_misiones[$a][1] = utf8_decode($row[1]);
			$table_misiones[$a][2] = utf8_decode($row[2]);
			$table_misiones[$a][3] = utf8_decode($row[3]);
			$table_misiones[$a][4] = utf8_decode($row[4]);
			$a++;
		}
		$this->fpdf->SetTextColor(0, 0, 0); //Letra color negro
		$this->fpdf->plot_table($ancho_columnas_misiones, 6, $table_misiones);
	} 
	$this->fpdf->Cell(array_sum($ancho_columnas_misiones),0,'','T');
	$this->fpdf->Ln(2);

  //---------------------------------10-------------------------------------------------------------------------------------------------------------------------
	//10
	$this->fpdf->Ln(4);
	$this->fpdf->SetTextColor(0,0,0); //Letra color negro
	$this->fpdf->Cell(200,10,utf8_decode("10. Otras actividades."),0,0,'L', 0);
	$this->fpdf->Ln();

	//query idioma
	$miembro_actividad_query=$this->db->query('SELECT * FROM actividades INNER JOIN datospersonales ON (datospersonales.ci = actividades.datosPersonales_ci)
	WHERE  datospersonales.ci = "'.$ci.'" ');
	
	//guardo en variables el resultado
	$i=0;
	$j=0;
	$miembro_actividad_data = NULL;
	foreach($miembro_actividad_query->result() as $miembro_actividad_valor){
		$miembro_actividad_data[$i][$j++]=$miembro_actividad_valor->denominacion;
		$miembro_actividad_data[$i][$j++]=$miembro_actividad_valor->fecha;
		$i++;
		$j=0;
	}

	//Confecciono el header de la table
	$header_actividad = array("Denominación", "Fecha");
	$ancho_columnas_actividad = array(150,50);
	
	// Cabecera
	for($i=0;$i<count($header_actividad);$i++){
		$this->fpdf->SetFillColor(127, 127, 127);//Fondo gris de celda
    	$this->fpdf->SetTextColor(255, 255, 255); //Letra color blanco
		$this->fpdf->Cell($ancho_columnas_actividad[$i],7,utf8_decode($header_actividad[$i]),1,0,'C', 1);
	}
	$this->fpdf->Ln();
	if($miembro_actividad_data == NULL){
		$this->fpdf->SetTextColor(0, 0, 0); //Letra color negra
		$this->fpdf->Cell(200,10,'No hay registros que mostrar',1,1,'C', 0);
	}
	else{
		$a=0;
		foreach($miembro_actividad_data as $row){		
			$table_actividad[$a][0] = utf8_decode($row[0]);
			$table_actividad[$a][1] = utf8_decode($row[1]);
			$a++;
		}
		$this->fpdf->SetTextColor(0, 0, 0); //Letra color negro
		$this->fpdf->plot_table($ancho_columnas_actividad, 6, $table_actividad);
	} 
	$this->fpdf->Cell(array_sum($ancho_columnas_actividad),0,'','T');
	$this->fpdf->Ln(2);
	
  //----------------------------------------------------------------------------------------------------------------------------------------------------------

	$this->fpdf->Output('Curriculum vitae '."$miembro_data[0]".'.pdf', 'D');
}

/*-----------------Exportar transporte----------------------------------------------------*/
public function expTransportePDF(){
	date_default_timezone_set('UTC'); setlocale(LC_TIME, 'spanish');

	//obtener los input de filtrado
	$filtar_array = $_REQUEST['filtar'];


	//query
	$consulta=$this->db->query('SELECT mediotransporte.tipoAsignacion, mediotransporte.estado, datospersonales.apellido1,
	datospersonales.apellido2, datospersonales.nombres FROM mediotransporte INNER JOIN datospersonales ON (datospersonales.ci = mediotransporte.datosPersonales_ci) 
	WHERE  mediotransporte.tipoAsignacion LIKE "%'.$filtar_array[0].'%" AND  mediotransporte.estado LIKE "%'.$filtar_array[1].'%" 
	AND CONCAT(`nombres`, `apellido1`, `apellido2`) LIKE "%'.$filtar_array[2].'%" ');


	//guardo en variables el resultado
	$i=0;
	$j=0;
	$data = NULL;
	foreach($consulta->result() as $valor){
		$data[$i][$j++]=$valor->tipoAsignacion;
		$data[$i][$j++]=$valor->estado ;
		$data[$i][$j++]=$valor->nombres.' '.$valor->apellido1.' '.$valor->apellido2;
		$i++;
		$j=0;    
	}

	//print_r($data);exit();
	$fecha = date('d-m-Y');
	$newDate = date("d-m-Y", strtotime($fecha));				
	$mesDesc = strftime("%d de %B de %Y", strtotime($newDate));

	//Confecciono el header de la table
	$header = array("Tipo asignación", "Estado",  "Nombres y apellidos");

	//cargar la libreria
	$this->load->library('fpdf_gen');
	// crear el objeto
	$pdf = new FPDF("L", "mm", "letter");

	//
	$this->fpdf->AliasNbPages('(np)');

	//margenes
	$this->fpdf->SetMargins(5,3,3,3);

	//header del reporte
	$this->fpdf->Ln(10);
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->text(10,20,"Ministerio del Interior. Granma. Bayamo");
	$this->fpdf->Cell(0,0,$mesDesc,0,1,'R');
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->text(10,30,utf8_decode("Potencial Científico Técnico Humano"));

	//Cabecera del reporte
	$this->fpdf->Ln(15);
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->SetFillColor(31, 137, 229);//Fondo azul de celda
    $this->fpdf->SetTextColor(240, 255, 240); //Letra color blanco
	$this->fpdf->Cell(200,10,utf8_decode("Listados de los medios de transporte"),1,1,'C', 1);
	$this->fpdf->Ln(4);

	$this->fpdf->Ln(5);
	$this->fpdf->SetFont('Arial','',10);

	$pdf->SetFont('Arial','B',10);

	// Anchuras de las columnas
	$w = array(70, 60, 70);
	// Cabecera
	for($i=0;$i<count($header);$i++){
		$this->fpdf->SetFillColor(101, 187, 106);//Fondo verde de celda
    	$this->fpdf->SetTextColor(240, 255, 240); //Letra color blanco
		$this->fpdf->Cell($w[$i],7,utf8_decode($header[$i]),1,0,'C', 1);
	}
	$this->fpdf->Ln();
	
	//datos
	$this->fpdf->SetFillColor(229, 229, 229); //Gris tenue de cada fila
	$this->fpdf->SetTextColor(3, 3, 3); //Color del texto: Negro
	$bandera = false; //Para alternar el relleno
	 if($data == NULL){
		$this->fpdf->Cell(200,10,'No hay registros que mostrar',1,1,'C', 1);
	}
	else{
		$a=0;
		foreach($data as $row){		
			$table[$a][0] = utf8_decode($row[0]);
			$table[$a][1] = utf8_decode($row[1]);
			$table[$a][2] = utf8_decode($row[2]);
			$a++;
		}
		$this->fpdf->plot_table($w, 6, $table);
	} 

	$this->fpdf->Cell(array_sum($w),0,'','T');

	$this->fpdf->Ln(10);
	$this->fpdf->Output('Listado de los medios de transporte.pdf', 'D');

}

/*-----------------Exportar vivienda----------------------------------------------------*/
public function expViviendaPDF(){
	date_default_timezone_set('UTC'); setlocale(LC_TIME, 'spanish');

	//obtener los input de filtrado
	$filtar_array = $_REQUEST['filtar'];


	//query
	$consulta=$this->db->query('SELECT vivienda.tipoVivienda, vivienda.estado, datospersonales.apellido1,
	datospersonales.apellido2, datospersonales.nombres FROM vivienda INNER JOIN datospersonales ON (datospersonales.ci = vivienda.datosPersonales_ci) 
	WHERE  vivienda.tipoVivienda LIKE "%'.$filtar_array[0].'%" AND  vivienda.estado LIKE "%'.$filtar_array[1].'%" 
	AND CONCAT(`nombres`, `apellido1`, `apellido2`) LIKE "%'.$filtar_array[2].'%" ');


	//guardo en variables el resultado
	$i=0;
	$j=0;
	$data = NULL;
	foreach($consulta->result() as $valor){
		$data[$i][$j++]=$valor->tipoVivienda;
		$data[$i][$j++]=$valor->estado ;
		$data[$i][$j++]=$valor->nombres.' '.$valor->apellido1.' '.$valor->apellido2;
		$i++;
		$j=0;    
	}

	//print_r($data);exit();
	$fecha = date('d-m-Y');
	$newDate = date("d-m-Y", strtotime($fecha));				
	$mesDesc = strftime("%d de %B de %Y", strtotime($newDate));

	//Confecciono el header de la table
	$header = array("Tipo vivienda", "Estado",  "Nombres y apellidos");

	//cargar la libreria
	$this->load->library('fpdf_gen');
	// crear el objeto
	$pdf = new FPDF("L", "mm", "letter");

	//
	$this->fpdf->AliasNbPages('(np)');

	//margenes
	$this->fpdf->SetMargins(5,3,3,3);

	//header del reporte
	$this->fpdf->Ln(10);
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->text(10,20,"Ministerio del Interior. Granma. Bayamo");
	$this->fpdf->Cell(0,0,$mesDesc,0,1,'R');
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->text(10,30,utf8_decode("Potencial Científico Técnico Humano"));

	//Cabecera del reporte
	$this->fpdf->Ln(15);
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->SetFillColor(31, 137, 229);//Fondo azul de celda
    $this->fpdf->SetTextColor(240, 255, 240); //Letra color blanco
	$this->fpdf->Cell(200,10,utf8_decode("Listados de las viviendas"),1,1,'C', 1);
	$this->fpdf->Ln(4);

	$this->fpdf->Ln(5);
	$this->fpdf->SetFont('Arial','',10);

	$pdf->SetFont('Arial','B',10);

	// Anchuras de las columnas
	$w = array(70, 60, 70);
	// Cabecera
	for($i=0;$i<count($header);$i++){
		$this->fpdf->SetFillColor(101, 187, 106);//Fondo verde de celda
    	$this->fpdf->SetTextColor(240, 255, 240); //Letra color blanco
		$this->fpdf->Cell($w[$i],7,utf8_decode($header[$i]),1,0,'C', 1);
	}
	$this->fpdf->Ln();
	
	//datos
	$this->fpdf->SetFillColor(229, 229, 229); //Gris tenue de cada fila
	$this->fpdf->SetTextColor(3, 3, 3); //Color del texto: Negro
	$bandera = false; //Para alternar el relleno
	 if($data == NULL){
		$this->fpdf->Cell(200,10,'No hay registros que mostrar',1,1,'C', 1);
	}
	else{
		$a=0;
		foreach($data as $row){		
			$table[$a][0] = utf8_decode($row[0]);
			$table[$a][1] = utf8_decode($row[1]);
			$table[$a][2] = utf8_decode($row[2]);
			$a++;
		}
		$this->fpdf->plot_table($w, 6, $table);
	} 

	$this->fpdf->Cell(array_sum($w),0,'','T');

	$this->fpdf->Ln(10);
	$this->fpdf->Output('Listado de las viviendas.pdf', 'D');

}

/*-----------------Exportar red social----------------------------------------------------*/
public function expRedSocialPDF(){
	date_default_timezone_set('UTC'); setlocale(LC_TIME, 'spanish');

	//obtener los input de filtrado
	$filtar_array = $_REQUEST['filtar'];


	//query
	$consulta=$this->db->query('SELECT redessociales.nombre, redessociales.cuenta, datospersonales.apellido1,
	datospersonales.apellido2, datospersonales.nombres FROM redessociales INNER JOIN datospersonales ON (datospersonales.ci = redessociales.datosPersonales_ci) 
	WHERE  redessociales.nombre LIKE "%'.$filtar_array[0].'%" AND  redessociales.cuenta LIKE "%'.$filtar_array[1].'%" 
	AND CONCAT(`nombres`, `apellido1`, `apellido2`) LIKE "%'.$filtar_array[2].'%" ');


	//guardo en variables el resultado
	$i=0;
	$j=0;
	$data = NULL;
	foreach($consulta->result() as $valor){
		$data[$i][$j++]=$valor->nombre;
		$data[$i][$j++]=$valor->cuenta ;
		$data[$i][$j++]=$valor->nombres.' '.$valor->apellido1.' '.$valor->apellido2;
		$i++;
		$j=0;    
	}

	//print_r($data);exit();
	$fecha = date('d-m-Y');
	$newDate = date("d-m-Y", strtotime($fecha));				
	$mesDesc = strftime("%d de %B de %Y", strtotime($newDate));

	//Confecciono el header de la table
	$header = array("Nombre", "Cuenta",  "Nombres y apellidos");

	//cargar la libreria
	$this->load->library('fpdf_gen');
	// crear el objeto
	$pdf = new FPDF("L", "mm", "letter");

	//
	$this->fpdf->AliasNbPages('(np)');

	//margenes
	$this->fpdf->SetMargins(5,3,3,3);

	//header del reporte
	$this->fpdf->Ln(10);
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->text(10,20,"Ministerio del Interior. Granma. Bayamo");
	$this->fpdf->Cell(0,0,$mesDesc,0,1,'R');
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->text(10,30,utf8_decode("Potencial Científico Técnico Humano"));

	//Cabecera del reporte
	$this->fpdf->Ln(15);
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->SetFillColor(31, 137, 229);//Fondo azul de celda
    $this->fpdf->SetTextColor(240, 255, 240); //Letra color blanco
	$this->fpdf->Cell(200,10,utf8_decode("Listados de las redes soiales"),1,1,'C', 1);
	$this->fpdf->Ln(4);

	$this->fpdf->Ln(5);
	$this->fpdf->SetFont('Arial','',10);

	$pdf->SetFont('Arial','B',10);

	// Anchuras de las columnas
	$w = array(70, 60, 70);
	// Cabecera
	for($i=0;$i<count($header);$i++){
		$this->fpdf->SetFillColor(101, 187, 106);//Fondo verde de celda
    	$this->fpdf->SetTextColor(240, 255, 240); //Letra color blanco
		$this->fpdf->Cell($w[$i],7,utf8_decode($header[$i]),1,0,'C', 1);
	}
	$this->fpdf->Ln();
	
	//datos
	$this->fpdf->SetFillColor(229, 229, 229); //Gris tenue de cada fila
	$this->fpdf->SetTextColor(3, 3, 3); //Color del texto: Negro
	$bandera = false; //Para alternar el relleno
	 if($data == NULL){
		$this->fpdf->Cell(200,10,'No hay registros que mostrar',1,1,'C', 1);
	}
	else{
		$a=0;
		foreach($data as $row){		
			$table[$a][0] = utf8_decode($row[0]);
			$table[$a][1] = utf8_decode($row[1]);
			$table[$a][2] = utf8_decode($row[2]);
			$a++;
		}
		$this->fpdf->plot_table($w, 6, $table);
	} 

	$this->fpdf->Cell(array_sum($w),0,'','T');

	$this->fpdf->Ln(10);
	$this->fpdf->Output('Listado de las redes soiales.pdf', 'D');

}

/*-----------------Exportar correo----------------------------------------------------*/
public function expCorreoPDF(){
	date_default_timezone_set('UTC'); setlocale(LC_TIME, 'spanish');

	//obtener los input de filtrado
	$filtar_array = $_REQUEST['filtar'];


	//query
	$consulta=$this->db->query('SELECT email.tipo, email.correo, datospersonales.apellido1,
	datospersonales.apellido2, datospersonales.nombres FROM email INNER JOIN datospersonales ON (datospersonales.ci = email.datosPersonales_ci) 
	WHERE  email.tipo LIKE "%'.$filtar_array[0].'%" AND  email.correo LIKE "%'.$filtar_array[1].'%" 
	AND CONCAT(`nombres`, `apellido1`, `apellido2`) LIKE "%'.$filtar_array[2].'%" ');


	//guardo en variables el resultado
	$i=0;
	$j=0;
	$data = NULL;
	foreach($consulta->result() as $valor){
		$data[$i][$j++]=$valor->tipo;
		$data[$i][$j++]=$valor->correo ;
		$data[$i][$j++]=$valor->nombres.' '.$valor->apellido1.' '.$valor->apellido2;
		$i++;
		$j=0;    
	}

	//print_r($data);exit();
	$fecha = date('d-m-Y');
	$newDate = date("d-m-Y", strtotime($fecha));				
	$mesDesc = strftime("%d de %B de %Y", strtotime($newDate));

	//Confecciono el header de la table
	$header = array("Tipo", "Correo",  "Nombres y apellidos");

	//cargar la libreria
	$this->load->library('fpdf_gen');
	// crear el objeto
	$pdf = new FPDF("L", "mm", "letter");

	//
	$this->fpdf->AliasNbPages('(np)');

	//margenes
	$this->fpdf->SetMargins(5,3,3,3);

	//header del reporte
	$this->fpdf->Ln(10);
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->text(10,20,"Ministerio del Interior. Granma. Bayamo");
	$this->fpdf->Cell(0,0,$mesDesc,0,1,'R');
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->text(10,30,utf8_decode("Potencial Científico Técnico Humano"));

	//Cabecera del reporte
	$this->fpdf->Ln(15);
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->SetFillColor(31, 137, 229);//Fondo azul de celda
    $this->fpdf->SetTextColor(240, 255, 240); //Letra color blanco
	$this->fpdf->Cell(200,10,utf8_decode("Listados de los correos"),1,1,'C', 1);
	$this->fpdf->Ln(4);

	$this->fpdf->Ln(5);
	$this->fpdf->SetFont('Arial','',10);

	$pdf->SetFont('Arial','B',10);

	// Anchuras de las columnas
	$w = array(70, 60, 70);
	// Cabecera
	for($i=0;$i<count($header);$i++){
		$this->fpdf->SetFillColor(101, 187, 106);//Fondo verde de celda
    	$this->fpdf->SetTextColor(240, 255, 240); //Letra color blanco
		$this->fpdf->Cell($w[$i],7,utf8_decode($header[$i]),1,0,'C', 1);
	}
	$this->fpdf->Ln();
	
	//datos
	$this->fpdf->SetFillColor(229, 229, 229); //Gris tenue de cada fila
	$this->fpdf->SetTextColor(3, 3, 3); //Color del texto: Negro
	$bandera = false; //Para alternar el relleno
	 if($data == NULL){
		$this->fpdf->Cell(200,10,'No hay registros que mostrar',1,1,'C', 1);
	}
	else{
		$a=0;
		foreach($data as $row){		
			$table[$a][0] = utf8_decode($row[0]);
			$table[$a][1] = utf8_decode($row[1]);
			$table[$a][2] = utf8_decode($row[2]);
			$a++;
		}
		$this->fpdf->plot_table($w, 6, $table);
	} 

	$this->fpdf->Cell(array_sum($w),0,'','T');

	$this->fpdf->Ln(10);
	$this->fpdf->Output('Listado de los correos.pdf', 'D');

}

/*-----------------Exportar tablet----------------------------------------------------*/
public function expTabletPDF(){
	date_default_timezone_set('UTC'); setlocale(LC_TIME, 'spanish');

	//obtener los input de filtrado
	$filtar_array = $_REQUEST['filtar'];


	//query
	$consulta=$this->db->query('SELECT tablet.numSerie, tablet.marca, datospersonales.apellido1,
	datospersonales.apellido2, datospersonales.nombres FROM tablet INNER JOIN datospersonales ON (datospersonales.ci = tablet.datosPersonales_ci) 
	WHERE  tablet.numSerie LIKE "%'.$filtar_array[0].'%" AND  tablet.marca LIKE "%'.$filtar_array[1].'%" 
	AND CONCAT(`nombres`, `apellido1`, `apellido2`) LIKE "%'.$filtar_array[2].'%" ');


	//guardo en variables el resultado
	$i=0;
	$j=0;
	$data = NULL;
	foreach($consulta->result() as $valor){
		$data[$i][$j++]=$valor->numSerie;
		$data[$i][$j++]=$valor->marca ;
		$data[$i][$j++]=$valor->nombres.' '.$valor->apellido1.' '.$valor->apellido2;
		$i++;
		$j=0;    
	}

	//print_r($data);exit();
	$fecha = date('d-m-Y');
	$newDate = date("d-m-Y", strtotime($fecha));				
	$mesDesc = strftime("%d de %B de %Y", strtotime($newDate));

	//Confecciono el header de la table
	$header = array("No serie", "Marca",  "Nombres y apellidos");

	//cargar la libreria
	$this->load->library('fpdf_gen');
	// crear el objeto
	$pdf = new FPDF("L", "mm", "letter");

	//
	$this->fpdf->AliasNbPages('(np)');

	//margenes
	$this->fpdf->SetMargins(5,3,3,3);

	//header del reporte
	$this->fpdf->Ln(10);
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->text(10,20,"Ministerio del Interior. Granma. Bayamo");
	$this->fpdf->Cell(0,0,$mesDesc,0,1,'R');
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->text(10,30,utf8_decode("Potencial Científico Técnico Humano"));

	//Cabecera del reporte
	$this->fpdf->Ln(15);
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->SetFillColor(31, 137, 229);//Fondo azul de celda
    $this->fpdf->SetTextColor(240, 255, 240); //Letra color blanco
	$this->fpdf->Cell(200,10,utf8_decode("Listados de las tablets"),1,1,'C', 1);
	$this->fpdf->Ln(4);

	$this->fpdf->Ln(5);
	$this->fpdf->SetFont('Arial','',10);

	$pdf->SetFont('Arial','B',10);

	// Anchuras de las columnas
	$w = array(70, 60, 70);
	// Cabecera
	for($i=0;$i<count($header);$i++){
		$this->fpdf->SetFillColor(101, 187, 106);//Fondo verde de celda
    	$this->fpdf->SetTextColor(240, 255, 240); //Letra color blanco
		$this->fpdf->Cell($w[$i],7,utf8_decode($header[$i]),1,0,'C', 1);
	}
	$this->fpdf->Ln();
	
	//datos
	$this->fpdf->SetFillColor(229, 229, 229); //Gris tenue de cada fila
	$this->fpdf->SetTextColor(3, 3, 3); //Color del texto: Negro
	$bandera = false; //Para alternar el relleno
	 if($data == NULL){
		$this->fpdf->Cell(200,10,'No hay registros que mostrar',1,1,'C', 1);
	}
	else{
		$a=0;
		foreach($data as $row){		
			$table[$a][0] = utf8_decode($row[0]);
			$table[$a][1] = utf8_decode($row[1]);
			$table[$a][2] = utf8_decode($row[2]);
			$a++;
		}
		$this->fpdf->plot_table($w, 6, $table);
	} 

	$this->fpdf->Cell(array_sum($w),0,'','T');

	$this->fpdf->Ln(10);
	$this->fpdf->Output('Listado de las tablets.pdf', 'D');

}

/*-----------------Exportar telefono----------------------------------------------------*/
public function expTelefonoPDF(){
	date_default_timezone_set('UTC'); setlocale(LC_TIME, 'spanish');

	//obtener los input de filtrado
	$filtar_array = $_REQUEST['filtar'];


	//query
	$consulta=$this->db->query('SELECT telefono.tipo, telefono.propietario, telefono.numero, datospersonales.apellido1,
	datospersonales.apellido2, datospersonales.nombres FROM telefono INNER JOIN datospersonales ON (datospersonales.ci = telefono.datosPersonales_ci) 
	WHERE  telefono.tipo LIKE "%'.$filtar_array[0].'%" AND  telefono.propietario LIKE "%'.$filtar_array[1].'%" AND  telefono.numero LIKE "%'.$filtar_array[2].'%"
	AND CONCAT(`nombres`, `apellido1`, `apellido2`) LIKE "%'.$filtar_array[3].'%" ');


	//guardo en variables el resultado
	$i=0;
	$j=0;
	$data = NULL;
	foreach($consulta->result() as $valor){
		$data[$i][$j++]=$valor->tipo;
		$data[$i][$j++]=$valor->propietario ;
		$data[$i][$j++]=$valor->numero ;
		$data[$i][$j++]=$valor->nombres.' '.$valor->apellido1.' '.$valor->apellido2;
		$i++;
		$j=0;    
	}

	//print_r($data);exit();
	$fecha = date('d-m-Y');
	$newDate = date("d-m-Y", strtotime($fecha));				
	$mesDesc = strftime("%d de %B de %Y", strtotime($newDate));

	//Confecciono el header de la table
	$header = array("Tipo", "Propietario", "Número", "Nombres y apellidos");

	//cargar la libreria
	$this->load->library('fpdf_gen');
	// crear el objeto
	$pdf = new FPDF("L", "mm", "letter");

	//
	$this->fpdf->AliasNbPages('(np)');

	//margenes
	$this->fpdf->SetMargins(5,3,3,3);

	//header del reporte
	$this->fpdf->Ln(10);
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->text(10,20,"Ministerio del Interior. Granma. Bayamo");
	$this->fpdf->Cell(0,0,$mesDesc,0,1,'R');
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->text(10,30,utf8_decode("Potencial Científico Técnico Humano"));

	//Cabecera del reporte
	$this->fpdf->Ln(15);
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->SetFillColor(31, 137, 229);//Fondo azul de celda
    $this->fpdf->SetTextColor(240, 255, 240); //Letra color blanco
	$this->fpdf->Cell(200,10,utf8_decode("Listados de los teléfonos"),1,1,'C', 1);
	$this->fpdf->Ln(4);

	$this->fpdf->Ln(5);
	$this->fpdf->SetFont('Arial','',10);

	$pdf->SetFont('Arial','B',10);

	// Anchuras de las columnas
	$w = array(50,50,50,50);
	// Cabecera
	for($i=0;$i<count($header);$i++){
		$this->fpdf->SetFillColor(101, 187, 106);//Fondo verde de celda
    	$this->fpdf->SetTextColor(240, 255, 240); //Letra color blanco
		$this->fpdf->Cell($w[$i],7,utf8_decode($header[$i]),1,0,'C', 1);
	}
	$this->fpdf->Ln();
	
	//datos
	$this->fpdf->SetFillColor(229, 229, 229); //Gris tenue de cada fila
	$this->fpdf->SetTextColor(3, 3, 3); //Color del texto: Negro
	$bandera = false; //Para alternar el relleno
	 if($data == NULL){
		$this->fpdf->Cell(200,10,'No hay registros que mostrar',1,1,'C', 1);
	}
	else{
		$a=0;
		foreach($data as $row){		
			$table[$a][0] = utf8_decode($row[0]);
			$table[$a][1] = utf8_decode($row[1]);
			$table[$a][2] = utf8_decode($row[2]);
			$table[$a][3] = utf8_decode($row[3]);
			$a++;
		}
		$this->fpdf->plot_table($w, 6, $table);
	} 

	$this->fpdf->Cell(array_sum($w),0,'','T');

	$this->fpdf->Ln(10);
	$this->fpdf->Output('Listado de los teléfonos.pdf', 'D');

}

/*-----------------Exportar pc----------------------------------------------------*/
public function expPCPDF(){
	date_default_timezone_set('UTC'); setlocale(LC_TIME, 'spanish');

	//obtener los input de filtrado
	$filtar_array = $_REQUEST['filtar'];


	//query
	$consulta=$this->db->query('SELECT pc.estado, pc.noserie, datospersonales.apellido1,
	datospersonales.apellido2, datospersonales.nombres FROM pc INNER JOIN datospersonales ON (datospersonales.ci = pc.datosPersonales_ci) 
	WHERE  pc.estado LIKE "%'.$filtar_array[0].'%" AND  pc.noserie LIKE "%'.$filtar_array[1].'%" AND CONCAT(`nombres`, `apellido1`, `apellido2`) LIKE "%'.$filtar_array[2].'%" ');


	//guardo en variables el resultado
	$i=0;
	$j=0;
	$data = NULL;
	foreach($consulta->result() as $valor){
		$data[$i][$j++]=$valor->estado;
		$data[$i][$j++]=$valor->noserie ;
		$data[$i][$j++]=$valor->nombres.' '.$valor->apellido1.' '.$valor->apellido2;
		$i++;
		$j=0;    
	}

	//print_r($data);exit();
	$fecha = date('d-m-Y');
	$newDate = date("d-m-Y", strtotime($fecha));				
	$mesDesc = strftime("%d de %B de %Y", strtotime($newDate));

	//Confecciono el header de la table
	$header = array("Estado", "No. serie", "Nombres y apellidos");

	//cargar la libreria
	$this->load->library('fpdf_gen');
	// crear el objeto
	$pdf = new FPDF("L", "mm", "letter");

	//
	$this->fpdf->AliasNbPages('(np)');

	//margenes
	$this->fpdf->SetMargins(5,3,3,3);

	//header del reporte
	$this->fpdf->Ln(10);
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->text(10,20,"Ministerio del Interior. Granma. Bayamo");
	$this->fpdf->Cell(0,0,$mesDesc,0,1,'R');
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->text(10,30,utf8_decode("Potencial Científico Técnico Humano"));

	//Cabecera del reporte
	$this->fpdf->Ln(15);
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->SetFillColor(31, 137, 229);//Fondo azul de celda
    $this->fpdf->SetTextColor(240, 255, 240); //Letra color blanco
	$this->fpdf->Cell(200,10,utf8_decode("Listados de las PC"),1,1,'C', 1);
	$this->fpdf->Ln(4);

	$this->fpdf->Ln(5);
	$this->fpdf->SetFont('Arial','',10);

	$pdf->SetFont('Arial','B',10);

	// Anchuras de las columnas
	$w = array(70, 60, 70);
	// Cabecera
	for($i=0;$i<count($header);$i++){
		$this->fpdf->SetFillColor(101, 187, 106);//Fondo verde de celda
    	$this->fpdf->SetTextColor(240, 255, 240); //Letra color blanco
		$this->fpdf->Cell($w[$i],7,utf8_decode($header[$i]),1,0,'C', 1);
	}
	$this->fpdf->Ln();
	
	//datos
	$this->fpdf->SetFillColor(229, 229, 229); //Gris tenue de cada fila
	$this->fpdf->SetTextColor(3, 3, 3); //Color del texto: Negro
	$bandera = false; //Para alternar el relleno
	 if($data == NULL){
		$this->fpdf->Cell(200,10,'No hay registros que mostrar',1,1,'C', 1);
	}
	else{
		$a=0;
		foreach($data as $row){		
			$table[$a][0] = utf8_decode($row[0]);
			$table[$a][1] = utf8_decode($row[1]);
			$table[$a][2] = utf8_decode($row[2]);
			$a++;
		}
		$this->fpdf->plot_table($w, 6, $table);
	} 

	$this->fpdf->Cell(array_sum($w),0,'','T');

	$this->fpdf->Ln(10);
	$this->fpdf->Output('Listado de las PC.pdf', 'D');

}

/*-----------------Exportar misiones----------------------------------------------------*/
public function expMisionPDF(){
	date_default_timezone_set('UTC'); setlocale(LC_TIME, 'spanish');

	//obtener los input de filtrado
	$filtar_array = $_REQUEST['filtar'];


	//query
	$consulta=$this->db->query('SELECT misionesinternacionales.pais, misionesinternacionales.fechaInicio, misionesinternacionales.fechaFin, misionesinternacionales.caracter,
	misionesinternacionales.organismo, datospersonales.apellido1,datospersonales.apellido2, datospersonales.nombres FROM misionesinternacionales INNER JOIN datospersonales 
	ON (datospersonales.ci = misionesinternacionales.datosPersonales_ci) WHERE  misionesinternacionales.pais LIKE "%'.$filtar_array[0].'%" 
	AND  misionesinternacionales.fechaInicio LIKE "%'.$filtar_array[1].'%" AND misionesinternacionales.fechaFin LIKE "%'.$filtar_array[2].'%" 
	AND  misionesinternacionales.caracter LIKE "%'.$filtar_array[3].'%" AND  misionesinternacionales.organismo LIKE "%'.$filtar_array[4].'%" 
	AND CONCAT(`nombres`, `apellido1`, `apellido2`) LIKE "%'.$filtar_array[5].'%" ');


	//guardo en variables el resultado
	$i=0;
	$j=0;
	$data = NULL;
	foreach($consulta->result() as $valor){
		$data[$i][$j++]=$valor->pais;
		$data[$i][$j++]=$valor->fechaInicio ;
		$data[$i][$j++]=$valor->fechaFin;
		$data[$i][$j++]=$valor->caracter;
		$data[$i][$j++]=$valor->organismo;
		$data[$i][$j++]=$valor->nombres.' '.$valor->apellido1.' '.$valor->apellido2;
		$i++;
		$j=0;    
	}

	//print_r($data);exit();
	$fecha = date('d-m-Y');
	$newDate = date("d-m-Y", strtotime($fecha));				
	$mesDesc = strftime("%d de %B de %Y", strtotime($newDate));

	//Confecciono el header de la table
	$header = array("País", "Fecha inicio", "Fecha fin", "Carácter", "Organismo", "Nombres y apellidos");

	//cargar la libreria
	$this->load->library('fpdf_gen');
	// crear el objeto
	$pdf = new FPDF("L", "mm", "letter");

	//
	$this->fpdf->AliasNbPages('(np)');

	//margenes
	$this->fpdf->SetMargins(5,3,3,3);

	//header del reporte
	$this->fpdf->Ln(10);
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->text(10,20,"Ministerio del Interior. Granma. Bayamo");
	$this->fpdf->Cell(0,0,$mesDesc,0,1,'R');
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->text(10,30,utf8_decode("Potencial Científico Técnico Humano"));

	//Cabecera del reporte
	$this->fpdf->Ln(15);
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->SetFillColor(31, 137, 229);//Fondo azul de celda
    $this->fpdf->SetTextColor(240, 255, 240); //Letra color blanco
	$this->fpdf->Cell(200,10,utf8_decode("Listados de las misiones internacionales"),1,1,'C', 1);
	$this->fpdf->Ln(4);

	$this->fpdf->Ln(5);
	$this->fpdf->SetFont('Arial','',10);

	$pdf->SetFont('Arial','B',10);

	// Anchuras de las columnas
	$w = array(33, 33, 33, 33, 33, 35);
	// Cabecera
	for($i=0;$i<count($header);$i++){
		$this->fpdf->SetFillColor(101, 187, 106);//Fondo verde de celda
    	$this->fpdf->SetTextColor(240, 255, 240); //Letra color blanco
		$this->fpdf->Cell($w[$i],7,utf8_decode($header[$i]),1,0,'C', 1);
	}
	$this->fpdf->Ln();
	
	//datos
	$this->fpdf->SetFillColor(229, 229, 229); //Gris tenue de cada fila
	$this->fpdf->SetTextColor(3, 3, 3); //Color del texto: Negro
	$bandera = false; //Para alternar el relleno
	 if($data == NULL){
		$this->fpdf->Cell(200,10,'No hay registros que mostrar',1,1,'C', 1);
	}
	else{
		$a=0;
		foreach($data as $row){		
			$table[$a][0] = utf8_decode($row[0]);
			$table[$a][1] = utf8_decode($row[1]);
			$table[$a][2] = utf8_decode($row[2]);
			$table[$a][3] = utf8_decode($row[3]);
			$table[$a][4] = utf8_decode($row[4]);
			$table[$a][5] = utf8_decode($row[5]);
			$a++;
		}
		$this->fpdf->plot_table($w, 6, $table);
	} 

	$this->fpdf->Cell(array_sum($w),0,'','T');

	$this->fpdf->Ln(10);
	$this->fpdf->Output('Listado de las misiones internacionales.pdf', 'D');

}

/*-----------------Exportar reconocimientos----------------------------------------------------*/
public function expReconocimientoPDF(){
	date_default_timezone_set('UTC'); setlocale(LC_TIME, 'spanish');

	//obtener los input de filtrado
	$filtar_array = $_REQUEST['filtar'];


	//query
	$consulta=$this->db->query('SELECT reconocimientos.tipoReconocimiento, reconocimientos.fecha, reconocimientos.denominacion, datospersonales.apellido1,
	datospersonales.apellido2, datospersonales.nombres FROM reconocimientos INNER JOIN datospersonales ON (datospersonales.ci = reconocimientos.datosPersonales_ci) 
	WHERE  reconocimientos.denominacion LIKE "%'.$filtar_array[0].'%" AND  reconocimientos.tipoReconocimiento LIKE "%'.$filtar_array[1].'%" AND 
	 reconocimientos.fecha LIKE "%'.$filtar_array[2].'%" AND CONCAT(`nombres`, `apellido1`, `apellido2`) LIKE "%'.$filtar_array[3].'%" ');


	//guardo en variables el resultado
	$i=0;
	$j=0;
	$data = NULL;
	foreach($consulta->result() as $valor){
		$data[$i][$j++]=$valor->denominacion;
		$data[$i][$j++]=$valor->tipoReconocimiento ;
		$data[$i][$j++]=$valor->fecha;
		$data[$i][$j++]=$valor->nombres.' '.$valor->apellido1.' '.$valor->apellido2;
		$i++;
		$j=0;    
	}

	//print_r($data);exit();
	$fecha = date('d-m-Y');
	$newDate = date("d-m-Y", strtotime($fecha));				
	$mesDesc = strftime("%d de %B de %Y", strtotime($newDate));

	//Confecciono el header de la table
	$header = array("Denominación", "Tipo", "Fecha", "Nombres y apellidos");

	//cargar la libreria
	$this->load->library('fpdf_gen');
	// crear el objeto
	$pdf = new FPDF("L", "mm", "letter");

	//
	$this->fpdf->AliasNbPages('(np)');

	//margenes
	$this->fpdf->SetMargins(5,3,3,3);

	//header del reporte
	$this->fpdf->Ln(10);
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->text(10,20,"Ministerio del Interior. Granma. Bayamo");
	$this->fpdf->Cell(0,0,$mesDesc,0,1,'R');
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->text(10,30,utf8_decode("Potencial Científico Técnico Humano"));

	//Cabecera del reporte
	$this->fpdf->Ln(15);
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->SetFillColor(31, 137, 229);//Fondo azul de celda
    $this->fpdf->SetTextColor(240, 255, 240); //Letra color blanco
	$this->fpdf->Cell(200,10,utf8_decode("Listados de los reconocimientos"),1,1,'C', 1);
	$this->fpdf->Ln(4);

	$this->fpdf->Ln(5);
	$this->fpdf->SetFont('Arial','',10);

	$pdf->SetFont('Arial','B',10);

	// Anchuras de las columnas
	$w = array(50, 50, 50, 50);
	// Cabecera
	for($i=0;$i<count($header);$i++){
		$this->fpdf->SetFillColor(101, 187, 106);//Fondo verde de celda
    	$this->fpdf->SetTextColor(240, 255, 240); //Letra color blanco
		$this->fpdf->Cell($w[$i],7,utf8_decode($header[$i]),1,0,'C', 1);
	}
	$this->fpdf->Ln();
	
	//datos
	$this->fpdf->SetFillColor(229, 229, 229); //Gris tenue de cada fila
	$this->fpdf->SetTextColor(3, 3, 3); //Color del texto: Negro
	$bandera = false; //Para alternar el relleno
	 if($data == NULL){
		$this->fpdf->Cell(200,10,'No hay registros que mostrar',1,1,'C', 1);
	}
	else{
		$a=0;
		foreach($data as $row){		
			$table[$a][0] = utf8_decode($row[0]);
			$table[$a][1] = utf8_decode($row[1]);
			$table[$a][2] = utf8_decode($row[2]);
			$table[$a][3] = utf8_decode($row[3]);
			$a++;
		}
		$this->fpdf->plot_table($w, 6, $table);
	} 

	$this->fpdf->Cell(array_sum($w),0,'','T');

	$this->fpdf->Ln(10);
	$this->fpdf->Output('Listado de los reconocimientos.pdf', 'D');

}

/*-----------------Exportar investigaciones----------------------------------------------------*/
public function expInvestigacionPDF(){
	date_default_timezone_set('UTC'); setlocale(LC_TIME, 'spanish');

	//obtener los input de filtrado
	$filtar_array = $_REQUEST['filtar'];

	//query
	$consulta=$this->db->query('SELECT investigacionesrealizadas.nombreInvestigacion, investigacionesrealizadas.anno, datospersonales.apellido1, datospersonales.apellido2,datospersonales.nombres 
	FROM investigacionesrealizadas INNER JOIN datospersonales ON (datospersonales.ci = investigacionesrealizadas.datosPersonales_ci) WHERE investigacionesrealizadas.nombreInvestigacion 
	LIKE "%'.$filtar_array[0].'%" AND  investigacionesrealizadas.anno LIKE "%'.$filtar_array[1].'%" AND CONCAT(`nombres`, `apellido1`, `apellido2`) LIKE "%'.$filtar_array[2].'%" ');

	//guardo en variables el resultado
	$i=0;
	$j=0;
	$data = NULL;
	foreach($consulta->result() as $valor){
		$data[$i][$j++]=$valor->nombreInvestigacion ;
		$data[$i][$j++]=$valor->anno;
		$data[$i][$j++]=$valor->nombres.' '.$valor->apellido1.' '.$valor->apellido2;
		$i++;
		$j=0;    
	}

	//print_r($data);exit();
	$fecha = date('d-m-Y');
	$newDate = date("d-m-Y", strtotime($fecha));				
	$mesDesc = strftime("%d de %B de %Y", strtotime($newDate));

	//Confecciono el header de la table
	$header = array("Nombre investigación", "Año", "Nombres y apellidos");

	//cargar la libreria
	$this->load->library('fpdf_gen');
	// crear el objeto
	$pdf = new FPDF("L", "mm", "letter");

	//
	$this->fpdf->AliasNbPages('(np)');

	//margenes
	$this->fpdf->SetMargins(5,3,3,3);

	//header del reporte
	$this->fpdf->Ln(10);
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->text(10,20,"Ministerio del Interior. Granma. Bayamo");
	$this->fpdf->Cell(0,0,$mesDesc,0,1,'R');
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->text(10,30,utf8_decode("Potencial Científico Técnico Humano"));

	//Cabecera del reporte
	$this->fpdf->Ln(15);
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->SetFillColor(31, 137, 229);//Fondo azul de celda
    $this->fpdf->SetTextColor(240, 255, 240); //Letra color blanco
	$this->fpdf->Cell(200,10,utf8_decode("Listados de las investigaciones"),1,1,'C', 1);
	$this->fpdf->Ln(4);

	$this->fpdf->Ln(5);
	$this->fpdf->SetFont('Arial','',10);

	$pdf->SetFont('Arial','B',10);

	// Anchuras de las columnas
	$w = array(120, 20, 60);
	// Cabecera
	for($i=0;$i<count($header);$i++){
		$this->fpdf->SetFillColor(101, 187, 106);//Fondo verde de celda
    	$this->fpdf->SetTextColor(240, 255, 240); //Letra color blanco
		$this->fpdf->Cell($w[$i],7,utf8_decode($header[$i]),1,0,'C', 1);
	}
	$this->fpdf->Ln();
	
	//datos
	$this->fpdf->SetFillColor(229, 229, 229); //Gris tenue de cada fila
	$this->fpdf->SetTextColor(3, 3, 3); //Color del texto: Negro
	$bandera = false; //Para alternar el relleno
	 if($data == NULL){
		$this->fpdf->Cell(200,10,'No hay registros que mostrar',1,1,'C', 1);
	}
	else{
		$a=0;
		foreach($data as $row){		
			$table[$a][0] = utf8_decode($row[0]);
			$table[$a][1] = utf8_decode($row[1]);
			$table[$a][2] = utf8_decode($row[2]);
			$a++;
		}
		$this->fpdf->plot_table($w, 6, $table);
	} 

	$this->fpdf->Cell(array_sum($w),0,'','T');

	$this->fpdf->Ln(10);
	$this->fpdf->Output('Listado de las investigaciones.pdf', 'D');

}

/*-----------------Exportar eventos----------------------------------------------------*/
public function expEventoPDF(){
	date_default_timezone_set('UTC'); setlocale(LC_TIME, 'spanish');

	//obtener los input de filtrado
	$filtar_array = $_REQUEST['filtar'];

	//query
	$consulta=$this->db->query('SELECT eventos.tipoEvento, eventos.fecha, eventos.lugar, eventos.participacion, eventos.denominacion, datospersonales.apellido1, datospersonales.apellido2,datospersonales.nombres 
	FROM eventos INNER JOIN datospersonales ON (datospersonales.ci = eventos.datosPersonales_ci) WHERE eventos.tipoEvento LIKE "%'.$filtar_array[0].'%" 
	AND  eventos.fecha LIKE "%'.$filtar_array[1].'%" AND  eventos.denominacion LIKE "%'.$filtar_array[2].'%" AND  eventos.denominacion LIKE "%'.$filtar_array[3].'%"
	AND  eventos.denominacion LIKE "%'.$filtar_array[4].'%" AND CONCAT(`nombres`, `apellido1`, `apellido2`) LIKE "%'.$filtar_array[5].'%" ');

	//guardo en variables el resultado
	$i=0;
	$j=0;
	$data = NULL;
	foreach($consulta->result() as $valor){
		$data[$i][$j++]=$valor->tipoEvento ;
		$data[$i][$j++]=$valor->fecha;
		$data[$i][$j++]=$valor->denominacion;
		$data[$i][$j++]=$valor->lugar;
		$data[$i][$j++]=$valor->participacion;
		$data[$i][$j++]=$valor->nombres.' '.$valor->apellido1.' '.$valor->apellido2;
		$i++;
		$j=0;    
	}

	//print_r($data);exit();
	$fecha = date('d-m-Y');
	$newDate = date("d-m-Y", strtotime($fecha));				
	$mesDesc = strftime("%d de %B de %Y", strtotime($newDate));

	//Confecciono el header de la table
	$header = array("Tipo evento", "Fecha", "Denominación", "lugar", "Tipo part.", "Nombres y apellidos");

	//cargar la libreria
	$this->load->library('fpdf_gen');
	// crear el objeto
	$pdf = new FPDF("L", "mm", "letter");

	//
	$this->fpdf->AliasNbPages('(np)');

	//margenes
	$this->fpdf->SetMargins(5,3,3,3);

	//header del reporte
	$this->fpdf->Ln(10);
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->text(10,20,"Ministerio del Interior. Granma. Bayamo");
	$this->fpdf->Cell(0,0,$mesDesc,0,1,'R');
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->text(10,30,utf8_decode("Potencial Científico Técnico Humano"));

	//Cabecera del reporte
	$this->fpdf->Ln(15);
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->SetFillColor(31, 137, 229);//Fondo azul de celda
    $this->fpdf->SetTextColor(240, 255, 240); //Letra color blanco
	$this->fpdf->Cell(200,10,utf8_decode("Listados de los eventos"),1,1,'C', 1);
	$this->fpdf->Ln(4);

	$this->fpdf->Ln(5);
	$this->fpdf->SetFont('Arial','',10);

	$pdf->SetFont('Arial','B',10);

	// Anchuras de las columnas
	$w = array(33, 33, 35, 33, 33, 33);
	// Cabecera
	for($i=0;$i<count($header);$i++){
		$this->fpdf->SetFillColor(101, 187, 106);//Fondo verde de celda
    	$this->fpdf->SetTextColor(240, 255, 240); //Letra color blanco
		$this->fpdf->Cell($w[$i],7,utf8_decode($header[$i]),1,0,'C', 1);
	}
	$this->fpdf->Ln();
	
	//datos
	$this->fpdf->SetFillColor(229, 229, 229); //Gris tenue de cada fila
	$this->fpdf->SetTextColor(3, 3, 3); //Color del texto: Negro
	$bandera = false; //Para alternar el relleno
	 if($data == NULL){
		$this->fpdf->Cell(200,10,'No hay registros que mostrar',1,1,'C', 1);
	}
	else{
		$a=0;
		foreach($data as $row){		
			$table[$a][0] = utf8_decode($row[0]);
			$table[$a][1] = utf8_decode($row[1]);
			$table[$a][2] = utf8_decode($row[2]);
			$table[$a][3] = utf8_decode($row[3]);
			$table[$a][4] = utf8_decode($row[4]);
			$table[$a][5] = utf8_decode($row[5]);
			$a++;
		}
		$this->fpdf->plot_table($w, 6, $table);
	} 

	$this->fpdf->Cell(array_sum($w),0,'','T');

	$this->fpdf->Ln(10);
	$this->fpdf->Output('Listado de los eventos.pdf', 'D');

}

/*-----------------Exportar assesorias----------------------------------------------------*/
public function expAsesoriasnPDF(){
	date_default_timezone_set('UTC'); setlocale(LC_TIME, 'spanish');

	//obtener los input de filtrado
	$filtar_array = $_REQUEST['filtar'];

	//query
	$consulta=$this->db->query('SELECT asesorias.nombreTrabajo, asesorias.fehca, datospersonales.apellido1, datospersonales.apellido2,datospersonales.nombres 
	FROM asesorias INNER JOIN datospersonales ON (datospersonales.ci = asesorias.datosPersonales_ci) WHERE asesorias.nombreTrabajo LIKE "%'.$filtar_array[0].'%" 
	AND  asesorias.fehca LIKE "%'.$filtar_array[1].'%" AND CONCAT(`nombres`, `apellido1`, `apellido2`) LIKE "%'.$filtar_array[2].'%" ');

	//guardo en variables el resultado
	$i=0;
	$j=0;
	$data = NULL;
	foreach($consulta->result() as $valor){
		$data[$i][$j++]=$valor->nombreTrabajo ;
		$data[$i][$j++]=$valor->fehca;
		$data[$i][$j++]=$valor->nombres.' '.$valor->apellido1.' '.$valor->apellido2;
		$i++;
		$j=0;    
	}

	//print_r($data);exit();
	$fecha = date('d-m-Y');
	$newDate = date("d-m-Y", strtotime($fecha));				
	$mesDesc = strftime("%d de %B de %Y", strtotime($newDate));

	//Confecciono el header de la table
	$header = array("Nombre trabajo", "Fecha", "Nombres y apellidos");

	//cargar la libreria
	$this->load->library('fpdf_gen');
	// crear el objeto
	$pdf = new FPDF("L", "mm", "letter");

	//
	$this->fpdf->AliasNbPages('(np)');

	//margenes
	$this->fpdf->SetMargins(5,3,3,3);

	//header del reporte
	$this->fpdf->Ln(10);
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->text(10,20,"Ministerio del Interior. Granma. Bayamo");
	$this->fpdf->Cell(0,0,$mesDesc,0,1,'R');
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->text(10,30,utf8_decode("Potencial Científico Técnico Humano"));

	//Cabecera del reporte
	$this->fpdf->Ln(15);
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->SetFillColor(31, 137, 229);//Fondo azul de celda
    $this->fpdf->SetTextColor(240, 255, 240); //Letra color blanco
	$this->fpdf->Cell(200,10,utf8_decode("Listados de las asesorías"),1,1,'C', 1);
	$this->fpdf->Ln(4);

	$this->fpdf->Ln(5);
	$this->fpdf->SetFont('Arial','',10);

	$pdf->SetFont('Arial','B',10);

	// Anchuras de las columnas
	$w = array(70, 60, 70);
	// Cabecera
	for($i=0;$i<count($header);$i++){
		$this->fpdf->SetFillColor(101, 187, 106);//Fondo verde de celda
    	$this->fpdf->SetTextColor(240, 255, 240); //Letra color blanco
		$this->fpdf->Cell($w[$i],7,utf8_decode($header[$i]),1,0,'C', 1);
	}
	$this->fpdf->Ln();
	
	//datos
	$this->fpdf->SetFillColor(229, 229, 229); //Gris tenue de cada fila
	$this->fpdf->SetTextColor(3, 3, 3); //Color del texto: Negro
	$bandera = false; //Para alternar el relleno
	 if($data == NULL){
		$this->fpdf->Cell(200,10,'No hay registros que mostrar',1,1,'C', 1);
	}
	else{
		$a=0;
		foreach($data as $row){		
			$table[$a][0] = utf8_decode($row[0]);
			$table[$a][1] = utf8_decode($row[1]);
			$table[$a][2] = utf8_decode($row[2]);
			$a++;
		}
		$this->fpdf->plot_table($w, 6, $table);
	} 

	$this->fpdf->Cell(array_sum($w),0,'','T');

	$this->fpdf->Ln(10);
	$this->fpdf->Output('Listado de las asesorías.pdf', 'D');

}

/*-----------------Exportar colaboracion----------------------------------------------------*/
public function expColaboracionPDF(){
	date_default_timezone_set('UTC'); setlocale(LC_TIME, 'spanish');

	//obtener los input de filtrado
	$filtar_array = $_REQUEST['filtar'];

	//query
	$consulta=$this->db->query('SELECT colabfunciondireccion.tipo, colabfunciondireccion.fechaInicio, colabfunciondireccion.fechaFin, datospersonales.apellido1, 
	datospersonales.apellido2,datospersonales.nombres FROM colabfunciondireccion INNER JOIN datospersonales ON (datospersonales.ci = colabfunciondireccion.datosPersonales_ci) 
	WHERE colabfunciondireccion.tipo LIKE "%'.$filtar_array[0].'%" AND  colabfunciondireccion.fechaInicio LIKE "%'.$filtar_array[1].'%" 
	AND  colabfunciondireccion.fechaFin LIKE "%'.$filtar_array[2].'%" AND CONCAT(`nombres`, `apellido1`, `apellido2`) LIKE "%'.$filtar_array[3].'%" ');

	//guardo en variables el resultado
	$i=0;
	$j=0;
	$data = NULL;
	foreach($consulta->result() as $valor){
		$data[$i][$j++]=$valor->tipo ;
		$data[$i][$j++]=$valor->fechaInicio;
		$data[$i][$j++]=$valor->fechaFin;
		$data[$i][$j++]=$valor->nombres.' '.$valor->apellido1.' '.$valor->apellido2;
		$i++;
		$j=0;    
	}

	//print_r($data);exit();
	$fecha = date('d-m-Y');
	$newDate = date("d-m-Y", strtotime($fecha));				
	$mesDesc = strftime("%d de %B de %Y", strtotime($newDate));

	//Confecciono el header de la table
	$header = array("Tipo", "Fecha inicio", "Fecha fin", "Nombres y apellidos");

	//cargar la libreria
	$this->load->library('fpdf_gen');
	// crear el objeto
	$pdf = new FPDF("L", "mm", "letter");

	//
	$this->fpdf->AliasNbPages('(np)');

	//margenes
	$this->fpdf->SetMargins(5,3,3,3);

	//header del reporte
	$this->fpdf->Ln(10);
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->text(10,20,"Ministerio del Interior. Granma. Bayamo");
	$this->fpdf->Cell(0,0,$mesDesc,0,1,'R');
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->text(10,30,utf8_decode("Potencial Científico Técnico Humano"));

	//Cabecera del reporte
	$this->fpdf->Ln(15);
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->SetFillColor(31, 137, 229);//Fondo azul de celda
    $this->fpdf->SetTextColor(240, 255, 240); //Letra color blanco
	$this->fpdf->Cell(200,10,utf8_decode("Listados de las colaboraciones"),1,1,'C', 1);
	$this->fpdf->Ln(4);

	$this->fpdf->Ln(5);
	$this->fpdf->SetFont('Arial','',10);

	$pdf->SetFont('Arial','B',10);

	// Anchuras de las columnas
	$w = array(50,50,50,50);
	// Cabecera
	for($i=0;$i<count($header);$i++){
		$this->fpdf->SetFillColor(101, 187, 106);//Fondo verde de celda
    	$this->fpdf->SetTextColor(240, 255, 240); //Letra color blanco
		$this->fpdf->Cell($w[$i],7,utf8_decode($header[$i]),1,0,'C', 1);
	}
	$this->fpdf->Ln();
	
	//datos
	$this->fpdf->SetFillColor(229, 229, 229); //Gris tenue de cada fila
	$this->fpdf->SetTextColor(3, 3, 3); //Color del texto: Negro
	$bandera = false; //Para alternar el relleno
	 if($data == NULL){
		$this->fpdf->Cell(200,10,'No hay registros que mostrar',1,1,'C', 1);
	}
	else{
		$a=0;
		foreach($data as $row){		
			$table[$a][0] = utf8_decode($row[0]);
			$table[$a][1] = utf8_decode($row[1]);
			$table[$a][2] = utf8_decode($row[2]);
			$table[$a][3] = utf8_decode($row[3]);
			$a++;
		}
		$this->fpdf->plot_table($w, 6, $table);
	} 

	$this->fpdf->Cell(array_sum($w),0,'','T');

	$this->fpdf->Ln(10);
	$this->fpdf->Output('Listado de las colaboraciones.pdf', 'D');

}

/*-----------------Exportar idiomas----------------------------------------------------*/
public function expIdiomasPDF(){
	date_default_timezone_set('UTC'); setlocale(LC_TIME, 'spanish');

	//obtener los input de filtrado
	$filtar_array = $_REQUEST['filtar'];

	//query
	$consulta=$this->db->query('SELECT idioma.nombre, idioma.calficHabla, idioma.califLee, idioma.califEscribe, datospersonales.apellido1, datospersonales.apellido2,
	datospersonales.nombres FROM idioma INNER JOIN datospersonales ON (datospersonales.ci = idioma.datosPersonales_ci) WHERE idioma.nombre LIKE "%'.$filtar_array[0].'%" 
	AND  idioma.calficHabla LIKE "%'.$filtar_array[1].'%" AND  idioma.califLee LIKE "%'.$filtar_array[2].'%" AND  idioma.califEscribe LIKE "%'.$filtar_array[3].'%"
	AND CONCAT(`nombres`, `apellido1`, `apellido2`) LIKE "%'.$filtar_array[4].'%" ');

	//guardo en variables el resultado
	$i=0;
	$j=0;
	$data = NULL;
	foreach($consulta->result() as $valor){
		$data[$i][$j++]=$valor->nombre ;
		$data[$i][$j++]=$valor->calficHabla;
		$data[$i][$j++]=$valor->califLee;
		$data[$i][$j++]=$valor->califEscribe;
		$data[$i][$j++]=$valor->nombres.' '.$valor->apellido1.' '.$valor->apellido2;
		$i++;
		$j=0;    
	}

	//print_r($data);exit();
	$fecha = date('d-m-Y');
	$newDate = date("d-m-Y", strtotime($fecha));				
	$mesDesc = strftime("%d de %B de %Y", strtotime($newDate));

	//Confecciono el header de la table
	$header = array("Nombre", "Habla", "Lee", "Escribe", "Nombres y apellidos");

	//cargar la libreria
	$this->load->library('fpdf_gen');
	// crear el objeto
	$pdf = new FPDF("L", "mm", "letter");

	//
	$this->fpdf->AliasNbPages('(np)');

	//margenes
	$this->fpdf->SetMargins(5,3,3,3);

	//header del reporte
	$this->fpdf->Ln(10);
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->text(10,20,"Ministerio del Interior. Granma. Bayamo");
	$this->fpdf->Cell(0,0,$mesDesc,0,1,'R');
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->text(10,30,utf8_decode("Potencial Científico Técnico Humano"));

	//Cabecera del reporte
	$this->fpdf->Ln(15);
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->SetFillColor(31, 137, 229);//Fondo azul de celda
    $this->fpdf->SetTextColor(240, 255, 240); //Letra color blanco
	$this->fpdf->Cell(200,10,utf8_decode("Listados de los idiomas"),1,1,'C', 1);
	$this->fpdf->Ln(4);

	$this->fpdf->Ln(5);
	$this->fpdf->SetFont('Arial','',10);

	$pdf->SetFont('Arial','B',10);

	// Anchuras de las columnas
	$w = array(40, 40, 40, 40, 40);
	// Cabecera
	for($i=0;$i<count($header);$i++){
		$this->fpdf->SetFillColor(101, 187, 106);//Fondo verde de celda
    	$this->fpdf->SetTextColor(240, 255, 240); //Letra color blanco
		$this->fpdf->Cell($w[$i],7,utf8_decode($header[$i]),1,0,'C', 1);
	}
	$this->fpdf->Ln();
	
	//datos
	$this->fpdf->SetFillColor(229, 229, 229); //Gris tenue de cada fila
	$this->fpdf->SetTextColor(3, 3, 3); //Color del texto: Negro
	$bandera = false; //Para alternar el relleno
	 if($data == NULL){
		$this->fpdf->Cell(200,10,'No hay registros que mostrar',1,1,'C', 1);
	}
	else{
		$a=0;
		foreach($data as $row){		
			$table[$a][0] = utf8_decode($row[0]);
			$table[$a][1] = utf8_decode($row[1]);
			$table[$a][2] = utf8_decode($row[2]);
			$table[$a][3] = utf8_decode($row[3]);
			$table[$a][4] = utf8_decode($row[4]);
			$a++;
		}
		$this->fpdf->plot_table($w, 6, $table);
	} 

	$this->fpdf->Cell(array_sum($w),0,'','T');

	$this->fpdf->Ln(10);
	$this->fpdf->Output('Listado de los idiomas.pdf', 'D');

}

/*-----------------Exportar proyectos----------------------------------------------------*/
public function expProyectosPDF(){
	date_default_timezone_set('UTC'); setlocale(LC_TIME, 'spanish');

	//obtener los input de filtrado
	$filtar_array = $_REQUEST['filtar'];

	//query
	$consulta=$this->db->query('SELECT proyecto.denomicacion, proyecto.tipoProyecto, proyecto.tipoTProyecto, datospersonales.apellido1, datospersonales.apellido2,
	datospersonales.nombres FROM proyecto INNER JOIN datospersonales ON (datospersonales.ci = proyecto.datosPersonales_ci) WHERE proyecto.denomicacion LIKE "%'.$filtar_array[0].'%" 
	AND  proyecto.tipoProyecto LIKE "%'.$filtar_array[1].'%" AND  proyecto.tipoTProyecto LIKE "%'.$filtar_array[2].'%" AND CONCAT(`nombres`, `apellido1`, `apellido2`) LIKE 
	"%'.$filtar_array[3].'%" ');

	//guardo en variables el resultado
	$i=0;
	$j=0;
	$data = NULL;
	foreach($consulta->result() as $valor){
		$data[$i][$j++]=$valor->denomicacion ;
		$data[$i][$j++]=$valor->tipoProyecto;
		$data[$i][$j++]=$valor->tipoTProyecto;
		$data[$i][$j++]=$valor->nombres.' '.$valor->apellido1.' '.$valor->apellido2;
		$i++;
		$j=0;    
	}

	//print_r($data);exit();
	$fecha = date('d-m-Y');
	$newDate = date("d-m-Y", strtotime($fecha));				
	$mesDesc = strftime("%d de %B de %Y", strtotime($newDate));

	//Confecciono el header de la table
	$header = array("Denominación", "Tipo", "Campo", "Nombres y apellidos");

	//cargar la libreria
	$this->load->library('fpdf_gen');
	// crear el objeto
	$pdf = new FPDF("L", "mm", "letter");

	//
	$this->fpdf->AliasNbPages('(np)');

	//margenes
	$this->fpdf->SetMargins(5,3,3,3);

	//header del reporte
	$this->fpdf->Ln(10);
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->text(10,20,"Ministerio del Interior. Granma. Bayamo");
	$this->fpdf->Cell(0,0,$mesDesc,0,1,'R');
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->text(10,30,utf8_decode("Potencial Científico Técnico Humano"));

	//Cabecera del reporte
	$this->fpdf->Ln(15);
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->SetFillColor(31, 137, 229);//Fondo azul de celda
    $this->fpdf->SetTextColor(240, 255, 240); //Letra color blanco
	$this->fpdf->Cell(200,10,utf8_decode("Listados de los proyectos"),1,1,'C', 1);
	$this->fpdf->Ln(4);

	$this->fpdf->Ln(5);
	$this->fpdf->SetFont('Arial','',10);

	$pdf->SetFont('Arial','B',10);

	// Anchuras de las columnas
	$w = array(50, 50, 50, 50);
	// Cabecera
	for($i=0;$i<count($header);$i++){
		$this->fpdf->SetFillColor(101, 187, 106);//Fondo verde de celda
    	$this->fpdf->SetTextColor(240, 255, 240); //Letra color blanco
		$this->fpdf->Cell($w[$i],7,utf8_decode($header[$i]),1,0,'C', 1);
	}
	$this->fpdf->Ln();
	
	//datos
	$this->fpdf->SetFillColor(229, 229, 229); //Gris tenue de cada fila
	$this->fpdf->SetTextColor(3, 3, 3); //Color del texto: Negro
	$bandera = false; //Para alternar el relleno
	 if($data == NULL){
		$this->fpdf->Cell(200,10,'No hay registros que mostrar',1,1,'C', 1);
	}
	else{
		$a=0;
		foreach($data as $row){		
			$table[$a][0] = utf8_decode($row[0]);
			$table[$a][1] = utf8_decode($row[1]);
			$table[$a][2] = utf8_decode($row[2]);
			$table[$a][3] = utf8_decode($row[3]);
			$a++;
		}
		$this->fpdf->plot_table($w, 6, $table);
	} 

	$this->fpdf->Cell(array_sum($w),0,'','T');

	$this->fpdf->Ln(10);
	$this->fpdf->Output('Listado de los proyectos.pdf', 'D');

}

/*-----------------Exportar publicaciones----------------------------------------------------*/
public function expPublicacionesPDF(){
	date_default_timezone_set('UTC'); setlocale(LC_TIME, 'spanish');

	//obtener los input de filtrado
	$filtar_array = $_REQUEST['filtar'];

	//query
	$consulta=$this->db->query('SELECT publicaciones.titulo, publicaciones.nivel, publicaciones.fecha, publicaciones.url, publicaciones.isbnISSN, publicaciones.tipoPublicacion,
	datospersonales.apellido1, datospersonales.apellido2, datospersonales.nombres FROM publicaciones INNER JOIN datospersonales ON (datospersonales.ci = publicaciones.datosPersonales_ci)
	WHERE publicaciones.titulo LIKE "%'.$filtar_array[0].'%" AND  publicaciones.nivel LIKE "%'.$filtar_array[1].'%" AND  publicaciones.fecha LIKE "%'.$filtar_array[2].'%"
	AND publicaciones.url LIKE "%'.$filtar_array[3].'%" AND  publicaciones.isbnISSN LIKE "%'.$filtar_array[4].'%" AND  publicaciones.tipoPublicacion LIKE "%'.$filtar_array[5].'%" 
	AND CONCAT(`nombres`, `apellido1`, `apellido2`) LIKE "%'.$filtar_array[6].'%" ');

	//guardo en variables el resultado
	$i=0;
	$j=0;
	$data = NULL;
	foreach($consulta->result() as $valor){
		$data[$i][$j++]=$valor->titulo ;
		$data[$i][$j++]=$valor->nivel;
		$data[$i][$j++]=$valor->fecha;
		$data[$i][$j++]=$valor->url;
		$data[$i][$j++]=$valor->isbnISSN;
		$data[$i][$j++]=$valor->tipoPublicacion;
		$data[$i][$j++]=$valor->nombres.' '.$valor->apellido1.' '.$valor->apellido2;
		$i++;
		$j=0;    
	}

	//print_r($data);exit();
	$fecha = date('d-m-Y');
	$newDate = date("d-m-Y", strtotime($fecha));				
	$mesDesc = strftime("%d de %B de %Y", strtotime($newDate));

	//Confecciono el header de la table
	$header = array("Título", "Nivel", "Fecha", "URL", "ISBN/ISSN.", "Tipo", "Nombres y apellidos");

	//cargar la libreria
	$this->load->library('fpdf_gen');
	// crear el objeto
	$pdf = new FPDF("L", "mm", "letter");

	//
	$this->fpdf->AliasNbPages('(np)');

	//margenes
	$this->fpdf->SetMargins(5,3,3,3);

	//header del reporte
	$this->fpdf->Ln(10);
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->text(10,20,"Ministerio del Interior. Granma. Bayamo");
	$this->fpdf->Cell(0,0,$mesDesc,0,1,'R');
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->text(10,30,utf8_decode("Potencial Científico Técnico Humano"));
	//Cabecera del reporte
	$this->fpdf->Ln(15);
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->SetFillColor(31, 137, 229);//Fondo azul de celda
    $this->fpdf->SetTextColor(240, 255, 240); //Letra color blanco
	$this->fpdf->Cell(200,10,utf8_decode("Listados de las publicaciones"),1,1,'C', 1);
	$this->fpdf->Ln(4);

	$this->fpdf->Ln(5);
	$this->fpdf->SetFont('Arial','',10);

	$pdf->SetFont('Arial','B',10);

	// Anchuras de las columnas
	$w = array(35,15,15,35,30,25,45);
	// Cabecera
	for($i=0;$i<count($header);$i++){
		$this->fpdf->SetFillColor(101, 187, 106);//Fondo verde de celda
    	$this->fpdf->SetTextColor(240, 255, 240); //Letra color blanco
		$this->fpdf->Cell($w[$i],7,utf8_decode($header[$i]),1,0,'C', 1);
	}
	$this->fpdf->Ln();
	
	//datos
	$this->fpdf->SetFillColor(229, 229, 229); //Gris tenue de cada fila
	$this->fpdf->SetTextColor(3, 3, 3); //Color del texto: Negro
	$bandera = false; //Para alternar el relleno
	 if($data == NULL){
		$this->fpdf->Cell(200,10,'No hay registros que mostrar',1,1,'C', 1);
	}
	else{
		$a=0;
		foreach($data as $row){		
			$table[$a][0] = utf8_decode($row[0]);
			$table[$a][1] = utf8_decode($row[1]);
			$table[$a][2] = utf8_decode($row[2]);
			$table[$a][3] = utf8_decode($row[3]);
			$table[$a][4] = utf8_decode($row[4]);
			$table[$a][5] = utf8_decode($row[5]);
			$table[$a][6] = utf8_decode($row[6]);
			$a++;
		}
		$this->fpdf->plot_table($w, 6, $table);
	} 

	$this->fpdf->Cell(array_sum($w),0,'','T');

	$this->fpdf->Ln(10);
	$this->fpdf->Output('Listado de las publicaciones.pdf', 'D');

}

/*-----------------Exportar titulosacademicos----------------------------------------------------*/
public function expTituloAcademicoPDF(){
	date_default_timezone_set('UTC'); setlocale(LC_TIME, 'spanish');

	//obtener los input de filtrado
	$filtar_array = $_REQUEST['filtar'];

	//query
	$consulta=$this->db->query('SELECT tituloacademico.libro, tituloacademico.tomo, tituloacademico.folio, tituloacademico.centroReferencia, tituloacademico.carrera, 
	datospersonales.apellido1, datospersonales.apellido2, datospersonales.nombres FROM tituloacademico INNER JOIN datospersonales ON (datospersonales.ci = tituloacademico.datosPersonales_ci)
	WHERE tituloacademico.libro LIKE "%'.$filtar_array[0].'%" AND  tituloacademico.tomo LIKE "%'.$filtar_array[1].'%" AND  tituloacademico.folio LIKE "%'.$filtar_array[2].'%"
	AND tituloacademico.centroReferencia LIKE "%'.$filtar_array[3].'%" AND  tituloacademico.carrera LIKE "%'.$filtar_array[4].'%" AND CONCAT(`nombres`, `apellido1`, `apellido2`) 
	LIKE "%'.$filtar_array[5].'%" ');

	//guardo en variables el resultado
	$i=0;
	$j=0;
	$data = NULL;
	foreach($consulta->result() as $valor){
		$data[$i][$j++]=$valor->libro ;
		$data[$i][$j++]=$valor->tomo;
		$data[$i][$j++]=$valor->folio;
		$data[$i][$j++]=$valor->centroReferencia;
		$data[$i][$j++]=$valor->carrera;
		$data[$i][$j++]=$valor->nombres.' '.$valor->apellido1.' '.$valor->apellido2;
		$i++;
		$j=0;    
	}

	//print_r($data);exit();
	$fecha = date('d-m-Y');
	$newDate = date("d-m-Y", strtotime($fecha));				
	$mesDesc = strftime("%d de %B de %Y", strtotime($newDate));

	//Confecciono el header de la table
	$header = array("Libro", "Tomo", "Folio", "Centro ref.", "Carrera.", "Nombres y apellidos");

	//cargar la libreria
	$this->load->library('fpdf_gen');
	// crear el objeto
	$pdf = new FPDF("L", "mm", "letter");

	//
	$this->fpdf->AliasNbPages('(np)');

	//margenes
	$this->fpdf->SetMargins(5,3,3,3);

	//header del reporte
	$this->fpdf->Ln(10);
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->text(10,20,"Ministerio del Interior. Granma. Bayamo");
	$this->fpdf->Cell(0,0,$mesDesc,0,1,'R');
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->text(10,30,utf8_decode("Potencial Científico Técnico Humano"));
	//Cabecera del reporte
	$this->fpdf->Ln(15);
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->SetFillColor(31, 137, 229);//Fondo azul de celda
    $this->fpdf->SetTextColor(240, 255, 240); //Letra color blanco
	$this->fpdf->Cell(200,10,utf8_decode("Listados de los títulos académicos"),1,1,'C', 1);
	$this->fpdf->Ln(4);

	$this->fpdf->Ln(5);
	$this->fpdf->SetFont('Arial','',10);

	$pdf->SetFont('Arial','B',10);

	// Anchuras de las columnas
	$w = array(35,15,15,45,45,45);
	// Cabecera
	for($i=0;$i<count($header);$i++){
		$this->fpdf->SetFillColor(101, 187, 106);//Fondo verde de celda
    	$this->fpdf->SetTextColor(240, 255, 240); //Letra color blanco
		$this->fpdf->Cell($w[$i],7,utf8_decode($header[$i]),1,0,'C', 1);
	}
	$this->fpdf->Ln();
	
	//datos
	$this->fpdf->SetFillColor(229, 229, 229); //Gris tenue de cada fila
	$this->fpdf->SetTextColor(3, 3, 3); //Color del texto: Negro
	$bandera = false; //Para alternar el relleno
	 if($data == NULL){
		$this->fpdf->Cell(200,10,'No hay registros que mostrar',1,1,'C', 1);
	}
	else{
		$a=0;
		foreach($data as $row){		
			$table[$a][0] = utf8_decode($row[0]);
			$table[$a][1] = utf8_decode($row[1]);
			$table[$a][2] = utf8_decode($row[2]);
			$table[$a][3] = utf8_decode($row[3]);
			$table[$a][4] = utf8_decode($row[4]);
			$table[$a][5] = utf8_decode($row[5]);
			$a++;
		}
		$this->fpdf->plot_table($w, 6, $table);
	} 

	$this->fpdf->Cell(array_sum($w),0,'','T');

	$this->fpdf->Ln(10);
	$this->fpdf->Output('Listado de los titulos academ.pdf', 'D');

}

/*-----------------Exportar postgrados----------------------------------------------------*/
public function expPostgradoPDF(){
	date_default_timezone_set('UTC'); setlocale(LC_TIME, 'spanish');

	//obtener los input de filtrado
	$filtar_array = $_REQUEST['filtar'];

	//query
	$consulta=$this->db->query('SELECT postgrados.tipo, postgrados.denominacion, postgrados.fecha, postgrados.cantHoras, postgrados.centroReferencia, postgrados.calificacion, 
	datospersonales.apellido1, datospersonales.apellido2, datospersonales.nombres FROM postgrados INNER JOIN datospersonales ON (datospersonales.ci = postgrados.datosPersonales_ci)
	WHERE postgrados.tipo LIKE "%'.$filtar_array[0].'%" AND  postgrados.denominacion LIKE "%'.$filtar_array[1].'%" AND  postgrados.fecha LIKE "%'.$filtar_array[2].'%"
	AND  postgrados.cantHoras LIKE "%'.$filtar_array[3].'%" AND  postgrados.centroReferencia LIKE "%'.$filtar_array[4].'%"  AND  postgrados.calificacion LIKE "%'.$filtar_array[5].'%" 
	AND CONCAT(`nombres`, `apellido1`, `apellido2`) LIKE "%'.$filtar_array[6].'%" ');

	//guardo en variables el resultado
	$i=0;
	$j=0;
	$data = NULL;
	foreach($consulta->result() as $valor){
		$data[$i][$j++]=$valor->tipo ;
		$data[$i][$j++]=$valor->denominacion;
		$data[$i][$j++]=$valor->fecha;
		$data[$i][$j++]=$valor->cantHoras;
		$data[$i][$j++]=$valor->centroReferencia;
		$data[$i][$j++]=$valor->calificacion;
		$data[$i][$j++]=$valor->nombres.' '.$valor->apellido1.' '.$valor->apellido2;
		$i++;
		$j=0;    
	}

	//print_r($data);exit();
	$fecha = date('d-m-Y');
	$newDate = date("d-m-Y", strtotime($fecha));				
	$mesDesc = strftime("%d de %B de %Y", strtotime($newDate));

	//Confecciono el header de la table
	$header = array("Tipo", "Denominación", "Fecha", "H/clases", "Centro ref.", "Calif.", "Nombres y apellidos");

	//cargar la libreria
	$this->load->library('fpdf_gen');
	// crear el objeto
	$pdf = new FPDF("L", "mm", "letter");

	//
	$this->fpdf->AliasNbPages('(np)');

	//margenes
	$this->fpdf->SetMargins(5,3,3,3);

	//header del reporte
	$this->fpdf->Ln(10);
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->text(10,20,"Ministerio del Interior. Granma. Bayamo");
	$this->fpdf->Cell(0,0,$mesDesc,0,1,'R');
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->text(10,30,utf8_decode("Potencial Científico Técnico Humano"));
	//Cabecera del reporte
	$this->fpdf->Ln(15);
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->SetFillColor(31, 137, 229);//Fondo azul de celda
    $this->fpdf->SetTextColor(240, 255, 240); //Letra color blanco
	$this->fpdf->Cell(200,10,utf8_decode("Listados de los postgrados"),1,1,'C', 1);
	$this->fpdf->Ln(4);

	$this->fpdf->Ln(5);
	$this->fpdf->SetFont('Arial','',10);

	$pdf->SetFont('Arial','B',10);

	// Anchuras de las columnas
	$w = array(20,55,20,15,30,15,45);
	// Cabecera
	for($i=0;$i<count($header);$i++){
		$this->fpdf->SetFillColor(101, 187, 106);//Fondo verde de celda
    	$this->fpdf->SetTextColor(240, 255, 240); //Letra color blanco
		$this->fpdf->Cell($w[$i],7,utf8_decode($header[$i]),1,0,'C', 1);
	}
	$this->fpdf->Ln();
	
	//datos
	$this->fpdf->SetFillColor(229, 229, 229); //Gris tenue de cada fila
	$this->fpdf->SetTextColor(3, 3, 3); //Color del texto: Negro
	$bandera = false; //Para alternar el relleno
	 if($data == NULL){
		$this->fpdf->Cell(200,10,'No hay registros que mostrar',1,1,'C', 1);
	}
	else{
		$a=0;
		foreach($data as $row){		
			$table[$a][0] = utf8_decode($row[0]);
			$table[$a][1] = utf8_decode($row[1]);
			$table[$a][2] = utf8_decode($row[2]);
			$table[$a][3] = utf8_decode($row[3]);
			$table[$a][4] = utf8_decode($row[4]);
			$table[$a][5] = utf8_decode($row[5]);
			$table[$a][6] = utf8_decode($row[6]);
			$a++;
		}
		$this->fpdf->plot_table($w, 6, $table);
	} 

	$this->fpdf->Cell(array_sum($w),0,'','T');

	$this->fpdf->Ln(10);
	$this->fpdf->Output('Listado de los postgrados.pdf', 'D');

}

/*-----------------Exportar curso ent----------------------------------------------------*/
public function expCursoEntPDF(){
	date_default_timezone_set('UTC'); setlocale(LC_TIME, 'spanish');

	//obtener los input de filtrado
	$filtar_array = $_REQUEST['filtar'];

	//query
	$consulta=$this->db->query('SELECT cursoentrenamiento.denimicacion, cursoentrenamiento.centroEstudio, cursoentrenamiento.fecha, cursoentrenamiento.cantHoras, 
	cursoentrenamiento.califiacion, datospersonales.apellido1, datospersonales.apellido2, datospersonales.nombres FROM cursoentrenamiento INNER JOIN datospersonales 
	ON (datospersonales.ci = cursoentrenamiento.datosPersonales_ci) WHERE cursoentrenamiento.denimicacion LIKE "%'.$filtar_array[0].'%" 
	AND  cursoentrenamiento.centroEstudio LIKE "%'.$filtar_array[1].'%" AND  cursoentrenamiento.fecha LIKE "%'.$filtar_array[2].'%"
	AND  cursoentrenamiento.cantHoras LIKE "%'.$filtar_array[3].'%" AND  cursoentrenamiento.califiacion LIKE "%'.$filtar_array[4].'%" 
	AND CONCAT(`nombres`, `apellido1`, `apellido2`) LIKE "%'.$filtar_array[5].'%" ');

	//guardo en variables el resultado
	$i=0;
	$j=0;
	$data = NULL;
	foreach($consulta->result() as $valor){
		$data[$i][$j++]=$valor->denimicacion ;
		$data[$i][$j++]=$valor->centroEstudio;
		$data[$i][$j++]=$valor->fecha;
		$data[$i][$j++]=$valor->cantHoras;
		$data[$i][$j++]=$valor->califiacion;
		$data[$i][$j++]=$valor->nombres.' '.$valor->apellido1.' '.$valor->apellido2;
		$i++;
		$j=0;    
	}

	//print_r($data);exit();
	$fecha = date('d-m-Y');
	$newDate = date("d-m-Y", strtotime($fecha));				
	$mesDesc = strftime("%d de %B de %Y", strtotime($newDate));

	//Confecciono el header de la table
	$header = array("Denominación", "C. estudio", "Fecha","H/clases","Calif.", "Nombres y apellidos");

	//cargar la libreria
	$this->load->library('fpdf_gen');
	// crear el objeto
	$pdf = new FPDF("L", "mm", "letter");

	//
	$this->fpdf->AliasNbPages('(np)');

	//margenes
	$this->fpdf->SetMargins(5,3,3,3);

	//header del reporte
	$this->fpdf->Ln(10);
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->text(10,20,"Ministerio del Interior. Granma. Bayamo");
	$this->fpdf->Cell(0,0,$mesDesc,0,1,'R');
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->text(10,30,utf8_decode("Potencial Científico Técnico Humano"));
	//Cabecera del reporte
	$this->fpdf->Ln(15);
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->SetFillColor(31, 137, 229);//Fondo azul de celda
    $this->fpdf->SetTextColor(240, 255, 240); //Letra color blanco
	$this->fpdf->Cell(200,10,utf8_decode("Listados de los cursos de entrenamiento"),1,1,'C', 1);
	$this->fpdf->Ln(4);

	$this->fpdf->Ln(5);
	$this->fpdf->SetFont('Arial','',10);

	$pdf->SetFont('Arial','B',10);

	// Anchuras de las columnas
	$w = array(55,40,25,15,15,50);
	// Cabecera
	for($i=0;$i<count($header);$i++){
		$this->fpdf->SetFillColor(101, 187, 106);//Fondo verde de celda
    	$this->fpdf->SetTextColor(240, 255, 240); //Letra color blanco
		$this->fpdf->Cell($w[$i],7,utf8_decode($header[$i]),1,0,'C', 1);
	}
	$this->fpdf->Ln();
	
	//datos
	$this->fpdf->SetFillColor(229, 229, 229); //Gris tenue de cada fila
	$this->fpdf->SetTextColor(3, 3, 3); //Color del texto: Negro
	$bandera = false; //Para alternar el relleno
	 if($data == NULL){
		$this->fpdf->Cell(200,10,'No hay registros que mostrar',1,1,'C', 1);
	}
	else{
		$a=0;
		foreach($data as $row){		
			$table[$a][0] = utf8_decode($row[0]);
			$table[$a][1] = utf8_decode($row[1]);
			$table[$a][2] = utf8_decode($row[2]);
			$table[$a][3] = utf8_decode($row[3]);
			$table[$a][4] = utf8_decode($row[4]);
			$table[$a][5] = utf8_decode($row[5]);
			$a++;
		}
		$this->fpdf->plot_table($w, 6, $table);
	} 

	$this->fpdf->Cell(array_sum($w),0,'','T');

	$this->fpdf->Ln(10);
	$this->fpdf->Output('Listado de las cursos entrenamiento.pdf', 'D');

}

/*-----------------Exportar cat cienfi----------------------------------------------------*/
public function expCatCientificaPDF(){
	date_default_timezone_set('UTC'); setlocale(LC_TIME, 'spanish');

	//obtener los input de filtrado
	$filtar_array = $_REQUEST['filtar'];

	//query
	$consulta=$this->db->query('SELECT categoriacientifica.tipo, categoriacientifica.fecha, datospersonales.apellido1, datospersonales.apellido2, datospersonales.nombres 
	FROM categoriacientifica INNER JOIN datospersonales ON (datospersonales.ci = categoriacientifica.datosPersonales_ci) WHERE categoriacientifica.tipo LIKE "%'.$filtar_array[0].'%" 
	AND  categoriacientifica.fecha LIKE "%'.$filtar_array[1].'%" AND CONCAT(`nombres`, `apellido1`, `apellido2`) LIKE "%'.$filtar_array[2].'%" ');

	//guardo en variables el resultado
	$i=0;
	$j=0;
	$data = NULL;
	foreach($consulta->result() as $valor){
		$data[$i][$j++]=$valor->tipo ;
		$data[$i][$j++]=$valor->fecha;
		$data[$i][$j++]=$valor->nombres.' '.$valor->apellido1.' '.$valor->apellido2;
		$i++;
		$j=0;    
	}

	//print_r($data);exit();
	$fecha = date('d-m-Y');
	$newDate = date("d-m-Y", strtotime($fecha));				
	$mesDesc = strftime("%d de %B de %Y", strtotime($newDate));

	//Confecciono el header de la table
	$header = array("Tipo", "Fecha", "Nombres y apellidos");

	//cargar la libreria
	$this->load->library('fpdf_gen');
	// crear el objeto
	$pdf = new FPDF("L", "mm", "letter");

	//
	$this->fpdf->AliasNbPages('(np)');

	//margenes
	$this->fpdf->SetMargins(5,3,3,3);

	//header del reporte
	$this->fpdf->Ln(10);
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->text(10,20,"Ministerio del Interior. Granma. Bayamo");
	$this->fpdf->Cell(0,0,$mesDesc,0,1,'R');
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->text(10,30,utf8_decode("Potencial Científico Técnico Humano"));
	//Cabecera del reporte
	$this->fpdf->Ln(15);
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->SetFillColor(31, 137, 229);//Fondo azul de celda
    $this->fpdf->SetTextColor(240, 255, 240); //Letra color blanco
	$this->fpdf->Cell(200,10,utf8_decode("Listados de las categorías científicas"),1,1,'C', 1);
	$this->fpdf->Ln(4);

	$this->fpdf->Ln(5);
	$this->fpdf->SetFont('Arial','',10);

	$pdf->SetFont('Arial','B',10);

	// Anchuras de las columnas
	$w = array(70, 60, 70);
	// Cabecera
	for($i=0;$i<count($header);$i++){
		$this->fpdf->SetFillColor(101, 187, 106);//Fondo verde de celda
    	$this->fpdf->SetTextColor(240, 255, 240); //Letra color blanco
		$this->fpdf->Cell($w[$i],7,utf8_decode($header[$i]),1,0,'C', 1);
	}
	$this->fpdf->Ln();
	
	//datos
	$this->fpdf->SetFillColor(229, 229, 229); //Gris tenue de cada fila
	$this->fpdf->SetTextColor(3, 3, 3); //Color del texto: Negro
	$bandera = false; //Para alternar el relleno
	 if($data == NULL){
		$this->fpdf->Cell(200,10,'No hay registros que mostrar',1,1,'C', 1);
	}
	else{
		$a=0;
		foreach($data as $row){		
			$table[$a][0] = utf8_decode($row[0]);
			$table[$a][1] = utf8_decode($row[1]);
			$table[$a][2] = utf8_decode($row[2]);
			$a++;
		}
		$this->fpdf->plot_table($w, 6, $table);
	} 

	$this->fpdf->Cell(array_sum($w),0,'','T');

	$this->fpdf->Ln(10);
	$this->fpdf->Output('Listado de las cat cientificas.pdf', 'D');

}

/*-----------------Exportar cat docentes----------------------------------------------------*/
public function expCatDocentePDF(){
	date_default_timezone_set('UTC'); setlocale(LC_TIME, 'spanish');

	//obtener los input de filtrado
	$filtar_array = $_REQUEST['filtar'];

	//query
	$consulta=$this->db->query('SELECT categoriadocente.tipo, categoriadocente.fecha, categoriadocente.asignatura, categoriadocente.curso, categoriadocente.horasClases,
	datospersonales.apellido1, datospersonales.apellido2, datospersonales.nombres FROM categoriadocente INNER JOIN datospersonales 
	ON (datospersonales.ci = categoriadocente.datosPersonales_ci) WHERE categoriadocente.tipo LIKE "%'.$filtar_array[0].'%" 
	AND  categoriadocente.fecha LIKE "%'.$filtar_array[1].'%" AND  categoriadocente.asignatura LIKE "%'.$filtar_array[2].'%"AND  categoriadocente.curso LIKE "%'.$filtar_array[3].'%"
	AND  categoriadocente.horasClases LIKE "%'.$filtar_array[4].'%" AND CONCAT(`nombres`, `apellido1`, `apellido2`) LIKE "%'.$filtar_array[5].'%" ');

	//guardo en variables el resultado
	$i=0;
	$j=0;
	$data = NULL;
	foreach($consulta->result() as $valor){
		$data[$i][$j++]=$valor->tipo ;
		$data[$i][$j++]=$valor->fecha;
		$data[$i][$j++]=$valor->asignatura;
		$data[$i][$j++]=$valor->curso;
		$data[$i][$j++]=$valor->horasClases;
		$data[$i][$j++]=$valor->nombres.' '.$valor->apellido1.' '.$valor->apellido2;
		$i++;
		$j=0;    
	}

	//print_r($data);exit();
	$fecha = date('d-m-Y');
	$newDate = date("d-m-Y", strtotime($fecha));				
	$mesDesc = strftime("%d de %B de %Y", strtotime($newDate));

	//Confecciono el header de la table
	$header = array("Tipo", "Fecha","Asignatura", "Curso","H/clases", "Nombres y apellidos");

	//cargar la libreria
	$this->load->library('fpdf_gen');
	// crear el objeto
	$pdf = new FPDF("L", "mm", "letter");

	//
	$this->fpdf->AliasNbPages('(np)');

	//margenes
	$this->fpdf->SetMargins(5,3,3,3);

	//header del reporte
	$this->fpdf->Ln(10);
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->text(10,20,"Ministerio del Interior. Granma. Bayamo");
	$this->fpdf->Cell(0,0,$mesDesc,0,1,'R');
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->text(10,30,utf8_decode("Potencial Científico Técnico Humano"));
	//Cabecera del reporte
	$this->fpdf->Ln(15);
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->SetFillColor(31, 137, 229);//Fondo azul de celda
    $this->fpdf->SetTextColor(240, 255, 240); //Letra color blanco
	$this->fpdf->Cell(200,10,utf8_decode("Listados de las categorías docentes"),1,1,'C', 1);
	$this->fpdf->Ln(4);

	$this->fpdf->Ln(5);
	$this->fpdf->SetFont('Arial','',10);

	$pdf->SetFont('Arial','B',10);

	// Anchuras de las columnas
	$w = array(30,25,50,20,15,60);
	// Cabecera
	for($i=0;$i<count($header);$i++){
		$this->fpdf->SetFillColor(101, 187, 106);//Fondo verde de celda
    	$this->fpdf->SetTextColor(240, 255, 240); //Letra color blanco
		$this->fpdf->Cell($w[$i],7,utf8_decode($header[$i]),1,0,'C', 1);
	}
	$this->fpdf->Ln();
	
	//datos
	$this->fpdf->SetFillColor(229, 229, 229); //Gris tenue de cada fila
	$this->fpdf->SetTextColor(3, 3, 3); //Color del texto: Negro
	$bandera = false; //Para alternar el relleno
	 if($data == NULL){
		$this->fpdf->Cell(200,10,'No hay registros que mostrar',1,1,'C', 1);
	}
	else{
		$a=0;
		foreach($data as $row){		
			$table[$a][0] = utf8_decode($row[0]);
			$table[$a][1] = utf8_decode($row[1]);
			$table[$a][2] = utf8_decode($row[2]);
			$table[$a][3] = utf8_decode($row[3]);
			$table[$a][4] = utf8_decode($row[4]);
			$table[$a][5] = utf8_decode($row[5]);
			$a++;
		}
		$this->fpdf->plot_table($w, 6, $table);
	} 

	$this->fpdf->Cell(array_sum($w),0,'','T');

	$this->fpdf->Ln(10);
	$this->fpdf->Output('Listado de las cat docentes.pdf', 'D');

}

/*-----------------Exportar Asociacion----------------------------------------------------*/
public function expAsociacionPDF(){
	date_default_timezone_set('UTC'); setlocale(LC_TIME, 'spanish');

	//obtener los input de filtrado
	$filtar_array = $_REQUEST['filtar'];

	//query
	$consulta=$this->db->query('SELECT asociacionprofesional.nivel, asociacionprofesional.cargo, datospersonales.apellido1, datospersonales.apellido2, datospersonales.nombres 
	FROM asociacionprofesional INNER JOIN datospersonales ON (datospersonales.ci = asociacionprofesional.datosPersonales_ci) WHERE asociacionprofesional.nivel LIKE "%'.$filtar_array[0].'%" 
	AND  asociacionprofesional.cargo LIKE "%'.$filtar_array[1].'%" AND CONCAT(`nombres`, `apellido1`, `apellido2`) LIKE "%'.$filtar_array[2].'%" ');

	//guardo en variables el resultado
	$i=0;
	$j=0;
	$data = NULL;
	foreach($consulta->result() as $valor){
		$data[$i][$j++]=$valor->nivel ;
		$data[$i][$j++]=$valor->cargo;
		$data[$i][$j++]=$valor->nombres.' '.$valor->apellido1.' '.$valor->apellido2;
		$i++;
		$j=0;    
	}

	//print_r($data);exit();
	$fecha = date('d-m-Y');
	$newDate = date("d-m-Y", strtotime($fecha));				
	$mesDesc = strftime("%d de %B de %Y", strtotime($newDate));

	//Confecciono el header de la table
	$header = array("Nivel", "Cargo", "Nombres y apellidos");

	//cargar la libreria
	$this->load->library('fpdf_gen');
	// crear el objeto
	$pdf = new FPDF("L", "mm", "letter");

	//
	$this->fpdf->AliasNbPages('(np)');

	//margenes
	$this->fpdf->SetMargins(5,3,3,3);

	//header del reporte
	$this->fpdf->Ln(10);
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->text(10,20,"Ministerio del Interior. Granma. Bayamo");
	$this->fpdf->Cell(0,0,$mesDesc,0,1,'R');
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->text(10,30,utf8_decode("Potencial Científico Técnico Humano"));
	//Cabecera del reporte
	$this->fpdf->Ln(15);
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->SetFillColor(31, 137, 229);//Fondo azul de celda
    $this->fpdf->SetTextColor(240, 255, 240); //Letra color blanco
	$this->fpdf->Cell(200,10,'Listado de las asociaciones profesionales',1,1,'C', 1);
	$this->fpdf->Ln(4);

	$this->fpdf->Ln(5);
	$this->fpdf->SetFont('Arial','',10);

	$pdf->SetFont('Arial','B',10);

	// Anchuras de las columnas
	$w = array(70,60,70);
	// Cabecera
	for($i=0;$i<count($header);$i++){
		$this->fpdf->SetFillColor(101, 187, 106);//Fondo verde de celda
    	$this->fpdf->SetTextColor(240, 255, 240); //Letra color blanco
		$this->fpdf->Cell($w[$i],7,utf8_decode($header[$i]),1,0,'C', 1);
	}
	$this->fpdf->Ln();
	
	//datos
	$this->fpdf->SetFillColor(229, 229, 229); //Gris tenue de cada fila
	$this->fpdf->SetTextColor(3, 3, 3); //Color del texto: Negro
	$bandera = false; //Para alternar el relleno
	 if($data == NULL){
		$this->fpdf->Cell(200,10,'No hay registros que mostrar',1,1,'C', 1);
	}
	else{
		$a=0;
		foreach($data as $row){		
			$table[$a][0] = utf8_decode($row[0]);
			$table[$a][1] = utf8_decode($row[1]);
			$table[$a][2] = utf8_decode($row[2]);
			$a++;
		}
		$this->fpdf->plot_table($w, 6, $table);
	} 

	$this->fpdf->Cell(array_sum($w),0,'','T');

	$this->fpdf->Ln(10);
	$this->fpdf->Output('Listado de las asociaciones prof.pdf', 'D');

}

/*-----------------Exportar Organizacion----------------------------------------------------*/
public function expOrganizacionPDF(){
	date_default_timezone_set('UTC'); setlocale(LC_TIME, 'spanish');

	//obtener los input de filtrado
	$filtar_array = $_REQUEST['filtar'];

	//query
	$consulta=$this->db->query('SELECT organizacionesmasa.nombreOM, organizacionesmasa.cargo, datospersonales.apellido1, datospersonales.apellido2, datospersonales.nombres 
	FROM organizacionesmasa INNER JOIN datospersonales ON (datospersonales.ci = organizacionesmasa.datosPersonales_ci) WHERE organizacionesmasa.nombreOM LIKE "%'.$filtar_array[0].'%" 
	AND  organizacionesmasa.cargo LIKE "%'.$filtar_array[1].'%" AND CONCAT(`nombres`, `apellido1`, `apellido2`) LIKE "%'.$filtar_array[2].'%" ');

	//guardo en variables el resultado
	$i=0;
	$j=0;
	$data = NULL;
	foreach($consulta->result() as $valor){
		$data[$i][$j++]=$valor->nombreOM ;
		$data[$i][$j++]=$valor->cargo;
		$data[$i][$j++]=$valor->nombres.' '.$valor->apellido1.' '.$valor->apellido2;
		$i++;
		$j=0;    
	}

	//print_r($data);exit();
	$fecha = date('d-m-Y');
	$newDate = date("d-m-Y", strtotime($fecha));				
	$mesDesc = strftime("%d de %B de %Y", strtotime($newDate));

	//Confecciono el header de la table
	$header = array("Nombre", "Cargo", "Nombres y apellidos");

	//cargar la libreria
	$this->load->library('fpdf_gen');
	// crear el objeto
	$pdf = new FPDF("L", "mm", "letter");

	//
	$this->fpdf->AliasNbPages('(np)');

	//margenes
	$this->fpdf->SetMargins(5,3,3,3);

	//header del reporte
	$this->fpdf->Ln(10);
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->text(10,20,"Ministerio del Interior. Granma. Bayamo");
	$this->fpdf->Cell(0,0,$mesDesc,0,1,'R');
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->text(10,30,utf8_decode("Potencial Científico Técnico Humano"));
	//Cabecera del reporte
	$this->fpdf->Ln(15);
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->SetFillColor(31, 137, 229);//Fondo azul de celda
    $this->fpdf->SetTextColor(240, 255, 240); //Letra color blanco
	$this->fpdf->Cell(200,10,'Listado de las asociaciones',1,1,'C', 1);
	$this->fpdf->Ln(4);

	$this->fpdf->Ln(5);
	$this->fpdf->SetFont('Arial','',10);

	$pdf->SetFont('Arial','B',10);

	// Anchuras de las columnas
	$w = array(70,60,70);
	// Cabecera
	for($i=0;$i<count($header);$i++){
		$this->fpdf->SetFillColor(101, 187, 106);//Fondo verde de celda
    	$this->fpdf->SetTextColor(240, 255, 240); //Letra color blanco
		$this->fpdf->Cell($w[$i],7,utf8_decode($header[$i]),1,0,'C', 1);
	}
	$this->fpdf->Ln();
	
	//datos
	$this->fpdf->SetFillColor(229, 229, 229); //Gris tenue de cada fila
	$this->fpdf->SetTextColor(3, 3, 3); //Color del texto: Negro
	$bandera = false; //Para alternar el relleno
	 if($data == NULL){
		$this->fpdf->Cell(200,10,'No hay registros que mostrar',1,1,'C', 1);
	}
	else{
		$a=0;
		foreach($data as $row){		
			$table[$a][0] = utf8_decode($row[0]);
			$table[$a][1] = utf8_decode($row[1]);
			$table[$a][2] = utf8_decode($row[2]);
			$a++;
		}
		$this->fpdf->plot_table($w, 6, $table);
	} 

	$this->fpdf->Cell(array_sum($w),0,'','T');

	$this->fpdf->Ln(10);
	$this->fpdf->Output('Listado de las asociaciones.pdf', 'D');

}

/*-----------------Exportar Innovaciones----------------------------------------------------*/
public function expInnovacionesPDF(){
	date_default_timezone_set('UTC'); setlocale(LC_TIME, 'spanish');

	//obtener los input de filtrado
	$filtar_array = $_REQUEST['filtar'];

	//query
	$consulta=$this->db->query('SELECT innovacion.tipo,innovacion.denominacion, innovacion.fechaInicio, innovacion.fechaFin, innovacion.clasificacion, innovacion.solucionNoIdent,
	datospersonales.apellido1, datospersonales.apellido2, datospersonales.nombres FROM innovacion INNER JOIN datospersonales ON (datospersonales.ci = innovacion.datosPersonales_ci) 
	WHERE innovacion.tipo LIKE "%'.$filtar_array[0].'%" AND  innovacion.fechaInicio LIKE "%'.$filtar_array[1].'%" AND  innovacion.fechaInicio LIKE "%'.$filtar_array[2].'%" 
	AND innovacion.fechaFin LIKE "%'.$filtar_array[3].'%" AND innovacion.clasificacion LIKE "%'.$filtar_array[4].'%" AND innovacion.solucionNoIdent LIKE "%'.$filtar_array[5].'%"
	AND CONCAT(`nombres`, `apellido1`, `apellido2`) LIKE "%'.$filtar_array[6].'%" ');

	//guardo en variables el resultado
	$i=0;
	$j=0;
	$data = NULL;
	foreach($consulta->result() as $valor){
		$data[$i][$j++]=$valor->tipo ;
		$data[$i][$j++]=$valor->denominacion ;
		$data[$i][$j++]=$valor->fechaInicio;
		$data[$i][$j++]=$valor->fechaFin;
		$data[$i][$j++]=$valor->clasificacion;
		$data[$i][$j++]=$valor->solucionNoIdent;
		$data[$i][$j++]=$valor->nombres.' '.$valor->apellido1.' '.$valor->apellido2;
		$i++;
		$j=0;    
	}

	//print_r($data);exit();
	$fecha = date('d-m-Y');
	$newDate = date("d-m-Y", strtotime($fecha));				
	$mesDesc = strftime("%d de %B de %Y", strtotime($newDate));

	//Confecciono el header de la table
	$header = array("Tipo", "Denominación", "Fecha inicio", "Fecha fin" , "Clasificación", "Solución no ident.", "Nombres y apellidos");

	//cargar la libreria
	$this->load->library('fpdf_gen');
	// crear el objeto
	$pdf = new FPDF("L", "mm", "letter");

	//
	$this->fpdf->AliasNbPages('(np)');

	//margenes
	$this->fpdf->SetMargins(5,3,3,3);

	//header del reporte
	$this->fpdf->Ln(10);
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->text(10,20,"Ministerio del Interior. Granma. Bayamo");
	$this->fpdf->Cell(0,0,$mesDesc,0,1,'R');
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->text(10,30,utf8_decode("Potencial Científico Técnico Humano"));
	//Cabecera del reporte
	$this->fpdf->Ln(15);
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->SetFillColor(31, 137, 229);//Fondo azul de celda
    $this->fpdf->SetTextColor(240, 255, 240); //Letra color blanco
	$this->fpdf->Cell(200,10,'Listado de las innovaciones',1,1,'C', 1);
	$this->fpdf->Ln(4);

	$this->fpdf->Ln(5);
	$this->fpdf->SetFont('Arial','',10);

	$pdf->SetFont('Arial','B',10);

	// Anchuras de las columnas
	$w = array(30,30,25,25,25,30,35);
	// Cabecera
	for($i=0;$i<count($header);$i++){
		$this->fpdf->SetFillColor(101, 187, 106);//Fondo verde de celda
    	$this->fpdf->SetTextColor(240, 255, 240); //Letra color blanco
		$this->fpdf->Cell($w[$i],7,utf8_decode($header[$i]),1,0,'C', 1);
	}
	$this->fpdf->Ln();
	
	//datos
	$this->fpdf->SetFillColor(229, 229, 229); //Gris tenue de cada fila
	$this->fpdf->SetTextColor(3, 3, 3); //Color del texto: Negro
	$bandera = false; //Para alternar el relleno
	 if($data == NULL){
		$this->fpdf->Cell(200,10,'No hay registros que mostrar',1,1,'C', 1);
	}
	else{
		$a=0;
		foreach($data as $row){		
			$table[$a][0] = utf8_decode($row[0]);
			$table[$a][1] = utf8_decode($row[1]);
			$table[$a][2] = utf8_decode($row[2]);
			$table[$a][3] = utf8_decode($row[3]);
			$table[$a][4] = utf8_decode($row[4]);
			$table[$a][5] = utf8_decode($row[5]);
			$table[$a][6] = utf8_decode($row[6]);
			$a++;
		}
		$this->fpdf->plot_table($w, 6, $table);
	} 

	$this->fpdf->Cell(array_sum($w),0,'','T');

	$this->fpdf->Ln(10);
	$this->fpdf->Output('Listado de las innovaciones.pdf', 'D');

}

/*-----------------Exportar tesis----------------------------------------------------*/
public function expTesisPDF(){
	date_default_timezone_set('UTC'); setlocale(LC_TIME, 'spanish');

	//obtener los input de filtrado
	$filtar_array = $_REQUEST['filtar'];

	//query
	$consulta=$this->db->query('SELECT tesis.centroEstudio, tesis.titulo, tesis.tipoAutor, tesis.fechaDefensa, tesis.clasificacion, tesis.centroReferencia,
	datospersonales.apellido1, datospersonales.apellido2, datospersonales.nombres FROM tesis INNER JOIN datospersonales ON (datospersonales.ci = tesis.datosPersonales_ci) 
	WHERE tesis.centroEstudio LIKE "%'.$filtar_array[0].'%" AND tesis.titulo LIKE "%'.$filtar_array[1].'%" AND tesis.tipoAutor 
	LIKE "%'.$filtar_array[2].'%" AND tesis.fechaDefensa LIKE "%'.$filtar_array[3].'%" AND tesis.clasificacion LIKE "%'.$filtar_array[4].'%"
	AND tesis.centroReferencia LIKE "%'.$filtar_array[5].'%" AND CONCAT(`nombres`, `apellido1`, `apellido2`) LIKE "%'.$filtar_array[6].'%" ');

	//guardo en variables el resultado
	$i=0;
	$j=0;
	$data = NULL;
	foreach($consulta->result() as $valor){
		$data[$i][$j++]=$valor->centroEstudio ;
		$data[$i][$j++]=$valor->titulo;
		$data[$i][$j++]=$valor->tipoAutor;
		$data[$i][$j++]=$valor->fechaDefensa;
		$data[$i][$j++]=$valor->clasificacion;
		$data[$i][$j++]=$valor->centroReferencia;
		$data[$i][$j++]=$valor->nombres.' '.$valor->apellido1.' '.$valor->apellido2;
		$i++;
		$j=0;    
	}

	//print_r($data);exit();
	$fecha = date('d-m-Y');
	$newDate = date("d-m-Y", strtotime($fecha));				
	$mesDesc = strftime("%d de %B de %Y", strtotime($newDate));

	//Confecciono el header de la table
	$header = array("Centro estudio", "Título", "T. autor" , "Fecha", "Clasificación", "Centro ref.", "Nombres y apellidos");

	//cargar la libreria
	$this->load->library('fpdf_gen');
	// crear el objeto
	$pdf = new FPDF("L", "mm", "letter");

	//
	$this->fpdf->AliasNbPages('(np)');

	//margenes
	$this->fpdf->SetMargins(5,3,3,3);

	//header del reporte
	$this->fpdf->Ln(10);
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->text(10,20,"Ministerio del Interior. Granma. Bayamo");
	$this->fpdf->Cell(0,0,$mesDesc,0,1,'R');
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->text(10,30,utf8_decode("Potencial Científico Técnico Humano"));
	//Cabecera del reporte
	$this->fpdf->Ln(15);
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->SetFillColor(31, 137, 229);//Fondo azul de celda
    $this->fpdf->SetTextColor(240, 255, 240); //Letra color blanco
	$this->fpdf->Cell(200,10,'Listado de las tesis',1,1,'C', 1);
	$this->fpdf->Ln(4);

	$this->fpdf->Ln(5);
	$this->fpdf->SetFont('Arial','',10);

	$pdf->SetFont('Arial','B',10);

	// Anchuras de las columnas
	$w = array(30,30,30,20,25,25,40);
	// Cabecera
	for($i=0;$i<count($header);$i++){
		$this->fpdf->SetFillColor(101, 187, 106);//Fondo verde de celda
    	$this->fpdf->SetTextColor(240, 255, 240); //Letra color blanco
		$this->fpdf->Cell($w[$i],7,utf8_decode($header[$i]),1,0,'C', 1);
	}
	$this->fpdf->Ln();
	
	//datos
	$this->fpdf->SetFillColor(229, 229, 229); //Gris tenue de cada fila
	$this->fpdf->SetTextColor(3, 3, 3); //Color del texto: Negro
	$bandera = false; //Para alternar el relleno
	 if($data == NULL){
		$this->fpdf->Cell(200,10,'No hay registros que mostrar',1,1,'C', 1);
	}
	else{
		$a=0;
		foreach($data as $row){		
			$table[$a][0] = utf8_decode($row[0]);
			$table[$a][1] = utf8_decode($row[1]);
			$table[$a][2] = utf8_decode($row[2]);
			$table[$a][3] = utf8_decode($row[3]);
			$table[$a][4] = utf8_decode($row[4]);
			$table[$a][5] = utf8_decode($row[5]);
			$table[$a][6] = utf8_decode($row[6]);
			$a++;
		}
		$this->fpdf->plot_table($w, 6, $table);
	} 

	$this->fpdf->Cell(array_sum($w),0,'','T');
	$this->fpdf->Ln(10);
	$this->fpdf->Output('Listado de las tesis.pdf', 'D');

}

/*-----------------Exportar Experiencias Profesioales----------------------------------------------------*/
public function expExperienciasProfPDF(){
	date_default_timezone_set('UTC'); setlocale(LC_TIME, 'spanish');

	//obtener los input de filtrado
	$filtar_array = $_REQUEST['filtar'];

	//query
	$consulta=$this->db->query('SELECT experienciaprofesional.centroLaboral, experienciaprofesional.cargoOcupa, experienciaprofesional.fechaDesde, 
	experienciaprofesional.fechaHasta, datospersonales.apellido1, datospersonales.apellido2, datospersonales.nombres FROM experienciaprofesional
	INNER JOIN datospersonales ON (datospersonales.ci = experienciaprofesional.datosPersonales_ci) WHERE experienciaprofesional.centroLaboral LIKE 
	"%'.$filtar_array[0].'%" AND experienciaprofesional.cargoOcupa LIKE "%'.$filtar_array[1].'%" AND experienciaprofesional.fechaDesde
	LIKE "%'.$filtar_array[2].'%" AND experienciaprofesional.fechaHasta LIKE "%'.$filtar_array[3].'%" AND CONCAT(`nombres`, 
	`apellido1`, `apellido2`) LIKE "%'.$filtar_array[4].'%" ');

	//guardo en variables el resultado
	$i=0;
	$j=0;
	$data = NULL;
	foreach($consulta->result() as $valor){
		$data[$i][$j++]=$valor->centroLaboral ;
		$data[$i][$j++]=$valor->cargoOcupa;
		$data[$i][$j++]=$valor->fechaDesde;
		$data[$i][$j++]=$valor->fechaHasta;
		$data[$i][$j++]=$valor->nombres.' '.$valor->apellido1.' '.$valor->apellido2;
		$i++;
		$j=0;    
	}

	//print_r($data);exit();
	$fecha = date('d-m-Y');
	$newDate = date("d-m-Y", strtotime($fecha));				
	$mesDesc = strftime("%d de %B de %Y", strtotime($newDate));

	//Confecciono el header de la table
	$header = array('Centro laboral', 'Cargo', 'Fecha inicio' , 'Fecha fin', 'Nombres y apellidos');

	//cargar la libreria
	$this->load->library('fpdf_gen');
	// crear el objeto
	$pdf = new FPDF("L", "mm", "letter");

	//
	$this->fpdf->AliasNbPages('(np)');

	//margenes
	$this->fpdf->SetMargins(5,3,3,3);

	//header del reporte
	$this->fpdf->Ln(10);
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->text(10,20,"Ministerio del Interior. Granma. Bayamo");
	$this->fpdf->Cell(0,0,$mesDesc,0,1,'R');
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->text(10,30,utf8_decode("Potencial Científico Técnico Humano"));
	//Cabecera del reporte
	$this->fpdf->Ln(15);
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->SetFillColor(31, 137, 229);//Fondo azul de celda
    $this->fpdf->SetTextColor(240, 255, 240); //Letra color blanco
	$this->fpdf->Cell(200,10,'Listado de las experiencias profesionales',1,1,'C', 1);
	$this->fpdf->Ln(4);

	$this->fpdf->Ln(5);
	$this->fpdf->SetFont('Arial','',10);

	$pdf->SetFont('Arial','B',10);

	// Anchuras de las columnas
	$w = array(65,30,20,20,65);
	// Cabecera
	for($i=0;$i<count($header);$i++){
		$this->fpdf->SetFillColor(101, 187, 106);//Fondo verde de celda
    	$this->fpdf->SetTextColor(240, 255, 240); //Letra color blanco
		$this->fpdf->Cell($w[$i],7,utf8_decode($header[$i]),1,0,'C', 1);
	}
	$this->fpdf->Ln();
	
	//datos
	$this->fpdf->SetFillColor(229, 229, 229); //Gris tenue de cada fila
	$this->fpdf->SetTextColor(3, 3, 3); //Color del texto: Negro
	$bandera = false; //Para alternar el relleno
	if($data == NULL){
		$this->fpdf->Cell(200,10,'No hay registros que mostrar',1,1,'C', 1);
	}
	else{
		$a=0;
		foreach($data as $row){		
			$table[$a][0] = utf8_decode($row[0]);
			$table[$a][1] = utf8_decode($row[1]);
			$table[$a][2] = utf8_decode($row[2]);
			$table[$a][3] = utf8_decode($row[3]);
			$table[$a][4] = utf8_decode($row[4]);
			$a++;
		}
		$this->fpdf->plot_table($w, 6, $table);
	} 
	$this->fpdf->Cell(array_sum($w),0,'','T');
	$this->fpdf->Ln(10);
	$this->fpdf->Output('Listado de las experiencias prof.pdf', 'D');

}

/*-----------------Exportar Miembros----------------------------------------------------*/
public function expMiembrosPDF(){
	date_default_timezone_set('UTC'); setlocale(LC_TIME, 'spanish');
	//obtener los input de filtrado
	$filtar_array = $_REQUEST['filtar'];

	//query
	$consulta=$this->db->query('SELECT ci, ciMilitar, gradoMilitar, nombres,apellido1, apellido2, organo, cuadro FROM datospersonales 
	WHERE ci LIKE "%'.$filtar_array[0].'%" AND ciMilitar LIKE "%'.$filtar_array[1].'%" AND gradoMilitar 
	LIKE "%'.$filtar_array[2].'%" AND CONCAT(`nombres`, `apellido1`, `apellido2`) LIKE "%'.$filtar_array[3].'%" 
	AND organo LIKE "%'.$filtar_array[4].'%" AND cuadro LIKE "%'.$filtar_array[5].'%" ');

	//guardo en variables el resultado
	$i=0;
	$j=0;
	$data = NULL;
	foreach($consulta->result() as $valor){
		$data[$i][$j++]=$valor->ci ;
		$data[$i][$j++]=$valor->ciMilitar;
		$data[$i][$j++]=$valor->gradoMilitar;
		$data[$i][$j++]=$valor->nombres.' '.$valor->apellido1.' '.$valor->apellido2;
		$data[$i][$j++]=$valor->organo;
		$data[$i][$j++]=$valor->cuadro;
		$i++;
		$j=0;    
	}

	//print_r($data);exit();
	$fecha = date('d-m-Y');
	$newDate = date("d-m-Y", strtotime($fecha));				
	$mesDesc = strftime("%d de %B de %Y", strtotime($newDate));

	//Confecciono el header de la table
	$header = array('CI', 'CI militar', 'Grado militar' ,'Nombres y apellidos','Órgano','Cuadro');

	//cargar la libreria
	$this->load->library('fpdf_gen');
	// crear el objeto
	$pdf = new FPDF("L", "mm", "letter");

	//
	$this->fpdf->AliasNbPages('(np)');

	//margenes
	$this->fpdf->SetMargins(5,3,3,3);

	//header del reporte
	$this->fpdf->Ln(10);
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->text(10,20,"Ministerio del Interior. Granma. Bayamo");
	$this->fpdf->Cell(0,0,$mesDesc,0,1,'R');
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->text(10,30,utf8_decode("Potencial Científico Técnico Humano"));
	//Cabecera del reporte
	$this->fpdf->Ln(15);
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->SetFillColor(31, 137, 229);//Fondo azul de celda
    $this->fpdf->SetTextColor(240, 255, 240); //Letra color blanco
	$this->fpdf->Cell(200,10,'Listado de los Miembros',1,1,'C', 1);
	$this->fpdf->Ln(4);

	$this->fpdf->Ln(5);
	$this->fpdf->SetFont('Arial','',10);

	$pdf->SetFont('Arial','B',10);

	// Anchuras de las columnas
	$w = array(25,15,70,60,15,15);
	// Cabecera
	for($i=0;$i<count($header);$i++){
		$this->fpdf->SetFillColor(101, 187, 106);//Fondo verde de celda
    	$this->fpdf->SetTextColor(240, 255, 240); //Letra color blanco
		$this->fpdf->Cell($w[$i],7,utf8_decode($header[$i]),1,0,'C', 1);
	}
	$this->fpdf->Ln();
	
	//datos
	$this->fpdf->SetFillColor(229, 229, 229); //Gris tenue de cada fila
	$this->fpdf->SetTextColor(3, 3, 3); //Color del texto: Negro
	$bandera = false; //Para alternar el relleno
	if($data == NULL){
		$this->fpdf->Cell(200,10,'No hay registros que mostrar',1,1,'C', 1);
	}
	else{
		$a=0;
		foreach($data as $row){		
			$table[$a][0] = utf8_decode($row[0]);
			$table[$a][1] = utf8_decode($row[1]);
			$table[$a][2] = utf8_decode($row[2]);
			$table[$a][3] = utf8_decode($row[3]);
			$table[$a][4] = utf8_decode($row[4]);
			$table[$a][5] = utf8_decode($row[5]);
			$a++;
		}
		$this->fpdf->plot_table($w, 6, $table);
	} 
	$this->fpdf->Cell(array_sum($w),0,'','T');
	$this->fpdf->Ln(10);
	$this->fpdf->Output('Listado de los Miembros.pdf', 'D');

}

/*-----------------Exportar Problematicas----------------------------------------------------*/
public function expProblematicasPDF(){
	date_default_timezone_set('UTC'); setlocale(LC_TIME, 'spanish');
	//obtener los input de filtrado
	$filtar_array = $_REQUEST['filtar'];

	//buscar en la BD 
	$this->db->select('bancoproblemas.numeroProblema, bancoproblemas.organo, bancoproblemas.problematica, bancoproblemas.programa, bancoproblemas.prioridades, datospersonales.nombres, datospersonales.apellido1, datospersonales.apellido2');
	$this->db->like('bancoproblemas.organo', $filtar_array[0], 'both');
	$this->db->like('bancoproblemas.problematica', $filtar_array[1], 'both');
	$this->db->like('bancoproblemas.programa', $filtar_array[2], 'both');
	$this->db->like('bancoproblemas.prioridades', $filtar_array[3], 'both');
	$this->db->join('bancomiembro', 'bancoproblemas.numeroProblema = bancomiembro.bancoproblemas_numeroProblema', 'inner');
	$this->db->join('datospersonales', 'bancomiembro.datospersonales_ci = datospersonales.ci', 'inner');
	$this->db->order_by("datospersonales.ci", "desc");
	$consulta=$this->db->get('bancoproblemas');

	//guardo en variables el resultado
	$i=0;
	$j=0;
	$data = NULL;
	foreach($consulta->result() as $valor){
		$data[$i][$j++]=$valor->organo ;
		$data[$i][$j++]=$valor->problematica;
		$data[$i][$j++]=$valor->programa;
		$data[$i][$j++]=$valor->prioridades;
		$data[$i][$j++]=$valor->nombres.' '.$valor->apellido1.' '.$valor->apellido2;
		$i++;
		$j=0;    
	}
	$fecha = date('d-m-Y');
	$newDate = date("d-m-Y", strtotime($fecha));				
	$mesDesc = strftime("%d de %B de %Y", strtotime($newDate));

	//Confecciono el header de la table
	$header = array('Órgano', 'Denominación', 'Programa' ,'Prioridades','Nombres y apellidos');

	//cargar la libreria
	$this->load->library('fpdf_gen');
	// crear el objeto
	$pdf = new FPDF("L", "mm", "letter");

	//
	$this->fpdf->AliasNbPages('(np)');

	//margenes
	$this->fpdf->SetMargins(5,3,3,3);

	//header del reporte
	$this->fpdf->Ln(10);
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->text(10,20,"Ministerio del Interior. Granma. Bayamo");
	$this->fpdf->Cell(0,0,$mesDesc,0,1,'R');
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->text(10,30,utf8_decode("Potencial Científico Técnico Humano"));
	//Cabecera del reporte
	$this->fpdf->Ln(15);
	$this->fpdf->SetFont('Arial','B',12);
	$this->fpdf->SetFillColor(31, 137, 229);//Fondo azul de celda
    $this->fpdf->SetTextColor(240, 255, 240); //Letra color blanco
	$this->fpdf->Cell(200,10,utf8_decode('Listado de las problemáticas'),1,1,'C', 1);
	$this->fpdf->Ln(4);

	$this->fpdf->Ln(5);
	$this->fpdf->SetFont('Arial','',10);

	$pdf->SetFont('Arial','B',10);

	// Anchuras de las columnas
	$w = array(25,50,40,25,60);
	// Cabecera
	for($i=0;$i<count($header);$i++){
		$this->fpdf->SetFillColor(101, 187, 106);//Fondo verde de celda
    	$this->fpdf->SetTextColor(240, 255, 240); //Letra color blanco
		$this->fpdf->Cell($w[$i],7,utf8_decode($header[$i]),1,0,'C', 1);
	}
	$this->fpdf->Ln();
	
	//datos
	$this->fpdf->SetFillColor(229, 229, 229); //Gris tenue de cada fila
	$this->fpdf->SetTextColor(3, 3, 3); //Color del texto: Negro
	$bandera = false; //Para alternar el relleno
	if($data == NULL){
		$this->fpdf->Cell(200,10,'No hay registros que mostrar',1,1,'C', 1);
	}
	else{
		$a=0;
		foreach($data as $row){		
			$table[$a][0] = utf8_decode($row[0]);
			$table[$a][1] = utf8_decode($row[1]);
			$table[$a][2] = utf8_decode($row[2]);
			$table[$a][3] = utf8_decode($row[3]);
			$table[$a][4] = utf8_decode($row[4]);
			$a++;
		}
		$this->fpdf->plot_table($w, 6, $table);
	} 
	$this->fpdf->Cell(array_sum($w),0,'','T');
	$this->fpdf->Ln(10);
	$this->fpdf->Output(utf8_decode('Listado de las problemáticas.pdf'), 'D');

}




}
