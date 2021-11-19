<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

/*-----------------------------------------------*/
	public function verificar($user,$pass){
		$this->db->select('*');
		$this->db->where('usuario', $user);
		$this->db->where('contrasenna', $pass);
		$query=$this->db->get('tbl_usuario');
		$row=$query->row("usuario");
		$row2=$query->row("contrasenna");
		/*print_r($user); 
		print_r($row);exit();*/
		if($row==$user && $row2 == $pass){
			//print_r($row2);exit();
			//print_r("aqui toy");exit();
			$newdata = array(
				'logged_in'=> true,
				'user' =>$row
			);
			$this->session->set_userdata($newdata); 	
			return TRUE;
		}
		else{
			return FALSE; 
		}
	}

/*----------------------------------------*/
	public function responsables(){
		$query=$this->db->get('datospersonales');
		return $query;
	}

/*----------------------------------------*/
	public function problemas(){
		$query=$this->db->get('bancoproblemas');
		return $query;
	}

/*----------------------------------------*/
	public function experiencias(){
		$query=$this->db->get('experienciaprofesional');
		return $query;
	}

/*----------------------------------------*/
	public function publicaciones(){
		$query=$this->db->get('publicaciones');
		return $query;
	}

/*----------------------------------------*/
	public function colaboraciones(){
		$query=$this->db->get('colabfunciondireccion');
		return $query;
	}

/*----------------------------------------*/
	public function misiones(){
		$query=$this->db->get('misionesinternacionales');
		return $query;
	}

/*----------------------------------------*/
	public function investigaciones(){
		$query=$this->db->get('investigacionesrealizadas');
		return $query;
	}

/*----------------------------------------*/
	public function organizacion(){
		$query=$this->db->get('organizacionesmasa');
		return $query;
	}

/*----------------------------------------*/
	public function eventos(){
		$query=$this->db->get('eventos');
		return $query;
	}
	
/*----------------------------------------*/
	public function asesorias(){
		$query=$this->db->get('asesorias');
		return $query;
	}

/*----------------------------------------*/
	public function colaboracion(){
		$query=$this->db->get('colabfunciondireccion');
		return $query;
	}

/*----------------------------------------*/
	public function idioma(){
		$query=$this->db->get('idioma');
		return $query;
	}

/*----------------------------------------*/
	public function asociacion(){
		$query=$this->db->get('asociacionprofesional');
		return $query;
	}

/*----------------------------------------*/
	public function innovaciones(){
		$query=$this->db->get('innovacion');
		return $query;
	}

/*----------------------------------------*/
	public function catdocente(){
		$query=$this->db->get('categoriadocente');
		return $query;
	}

/*----------------------------------------*/
	public function catcientifica(){
		$query=$this->db->get('categoriacientifica');
		return $query;
	}

/*----------------------------------------*/
	public function cursoent(){
		$query=$this->db->get('cursoentrenamiento');
		return $query;
	}

/*----------------------------------------*/
	public function titulosacademicos(){
		$query=$this->db->get('tituloacademico');
		return $query;
	}

/*----------------------------------------*/
	public function postgrados(){
		$query=$this->db->get('postgrados');
		return $query;
	}

/*----------------------------------------*/
	public function reconocimientos(){
		$query=$this->db->get('reconocimientos');
		return $query;
	}

/*----------------------------------------*/
	public function valoresProblemas(){
		$query=$this->db->get('bancomiembro');
		return $query;
	}

/*----------------------------------------*/
	public function tesis(){
		$query=$this->db->get('tesis');
		return $query;
	}

/*----------------------------------------*/
	public function proyectos(){
		$query=$this->db->get('proyecto');
		return $query;
	}

/*----------------------------------------*/
	public function tablet(){
		$query=$this->db->get('tablet');
		return $query;
	}

/*----------------------------------------*/
	public function transporte(){
		$query=$this->db->get('mediotransporte');
		return $query;
	}

/*----------------------------------------*/
	public function vivienda(){
		$query=$this->db->get('vivienda');
		return $query;
	}

/*----------------------------------------*/
	public function redsocial(){
		$query=$this->db->get('redessociales');
		return $query;
	}

/*----------------------------------------*/
	public function correo(){
		$query=$this->db->get('email');
		return $query;
	}

/*----------------------------------------*/
	public function telefono(){
		$query=$this->db->get('telefono');
		return $query;
	}

/*----------------------------------------*/
	public function pc(){
		$query=$this->db->get('pc');
		return $query;
	}

/*----------------------------------------*/
	public function problemasMiembro(){
		$query=$this->db->get('bancomiembro');
		return $query;
	}


/*----------------------------------------*/
public function m_experienciaProfesional($arg){ 
	$this->db->select('*');
	$this->db->where('datosPersonales_ci ', $arg);
   $query=$this->db->get('experienciaprofesional');
   return $query;
}

/*----------------------------------------*/
public function m_ExpProfesionalesM($arg, $arg2){ 
	$this->db->select('*');
	$this->db->where('idexperienciaProfesional', $arg);
	$this->db->where('datosPersonales_ci', $arg2);
   $query=$this->db->get('experienciaprofesional');
   return $query;
}

/*----------------------------------------*/
public function m_TesisM($arg, $arg2){ 
	$this->db->select('*');
	$this->db->where('idtesis', $arg);
	$this->db->where('datosPersonales_ci', $arg2);
   $query=$this->db->get('tesis');
   return $query;
}

/*----------------------------------------*/
public function m_InnovacionM($arg, $arg2){ 
	$this->db->select('*');
	$this->db->where('idinnovacion', $arg);
	$this->db->where('datosPersonales_ci', $arg2);
   $query=$this->db->get('innovacion');
   return $query;
}

/*----------------------------------------*/
public function m_AsociacionM($arg, $arg2){ 
	$this->db->select('*');
	$this->db->where('idasociacionProfesional', $arg);
	$this->db->where('datosPersonales_ci', $arg2);
   $query=$this->db->get('asociacionprofesional');
   return $query;
}

/*----------------------------------------*/
public function m_OrganizacionM($arg, $arg2){ 
	$this->db->select('*');
	$this->db->where('idorganizacionesMasa', $arg);
	$this->db->where('datosPersonales_ci', $arg2);
   $query=$this->db->get('organizacionesmasa');
   return $query;
}

/*----------------------------------------*/
public function m_PublicacionM($arg, $arg2){ 
	$this->db->select('*');
	$this->db->where('idpublicaciones', $arg);
	$this->db->where('datosPersonales_ci', $arg2);
   $query=$this->db->get('publicaciones');
   return $query;
}

/*----------------------------------------*/
public function m_OcupacionM($arg, $arg2){ 
	$this->db->select('*');
	$this->db->where('idocupacion', $arg);
	$this->db->where('datosPersonales_ci', $arg2);
   $query=$this->db->get('ocupacion');
   return $query;
}

/*----------------------------------------*/
public function m_ProyectoM($arg, $arg2){ 
	$this->db->select('*');
	$this->db->where('idproyecto', $arg);
	$this->db->where('datosPersonales_ci', $arg2);
   $query=$this->db->get('proyecto');
   return $query;
}

/*----------------------------------------*/
public function m_IdiomaM($arg, $arg2){ 
	$this->db->select('*');
	$this->db->where('ididioma', $arg);
	$this->db->where('datosPersonales_ci', $arg2);
   $query=$this->db->get('idioma');
   return $query;
}

/*----------------------------------------*/
public function m_ColaboracionM($arg, $arg2){ 
	$this->db->select('*');
	$this->db->where('idcolaboracion', $arg);
	$this->db->where('datosPersonales_ci', $arg2);
   $query=$this->db->get('colabfunciondireccion');
   return $query;
}

/*----------------------------------------*/
public function m_AsesoriasM($arg, $arg2){ 
	$this->db->select('*');
	$this->db->where('idasesorias', $arg);
	$this->db->where('datosPersonales_ci', $arg2);
   $query=$this->db->get('asesorias');
   return $query;
}

/*----------------------------------------*/
public function m_EventoM($arg, $arg2){ 
	$this->db->select('*');
	$this->db->where('ideventos', $arg);
	$this->db->where('datosPersonales_ci', $arg2);
   $query=$this->db->get('eventos');
   return $query;
}

/*----------------------------------------*/
public function m_InvestigacionM($arg, $arg2){ 
	$this->db->select('*');
	$this->db->where('idinvestigacionesRealizadas', $arg);
	$this->db->where('datosPersonales_ci', $arg2);
   $query=$this->db->get('investigacionesrealizadas');
   return $query;
}

/*----------------------------------------*/
public function m_ReconocimientoM($arg, $arg2){ 
	$this->db->select('*');
	$this->db->where('idreconocimientos', $arg);
	$this->db->where('datosPersonales_ci', $arg2);
   $query=$this->db->get('reconocimientos');
   return $query;
}

/*----------------------------------------*/
public function m_ActividadM($arg, $arg2){ 
	$this->db->select('*');
	$this->db->where('idact', $arg);
	$this->db->where('datosPersonales_ci', $arg2);
   $query=$this->db->get('actividades');
   return $query;
}

/*----------------------------------------*/
public function m_MisionM($arg, $arg2){ 
	$this->db->select('*');
	$this->db->where('idmisionesInternacionales', $arg);
	$this->db->where('datosPersonales_ci', $arg2);
   $query=$this->db->get('misionesinternacionales');
   return $query;
}

/*----------------------------------------*/
public function m_RedSocialM($arg, $arg2){ 
	$this->db->select('*');
	$this->db->where('idredesSociales', $arg);
	$this->db->where('datosPersonales_ci', $arg2);
   $query=$this->db->get('redessociales');
   return $query;
}

/*----------------------------------------*/
public function m_ViviendaM($arg, $arg2){ 
	$this->db->select('*');
	$this->db->where('idvivienda', $arg);
	$this->db->where('datosPersonales_ci', $arg2);
   $query=$this->db->get('vivienda');
   return $query;
}

/*----------------------------------------*/
public function m_TransporteM($arg, $arg2){ 
	$this->db->select('*');
	$this->db->where('idmedioTransporte', $arg);
	$this->db->where('datosPersonales_ci', $arg2);
   $query=$this->db->get('mediotransporte');
   return $query;
}

/*----------------------------------------*/
public function m_CatCientificaM($arg, $arg2){ 
	$this->db->select('*');
	$this->db->where('idcategoriaCientifica', $arg);
	$this->db->where('datosPersonales_ci', $arg2);
   $query=$this->db->get('categoriacientifica');
   return $query;
}

/*----------------------------------------*/
public function m_CatDocenteM($arg, $arg2){ 
	$this->db->select('*');
	$this->db->where('idcategoriaDocente', $arg);
	$this->db->where('datosPersonales_ci', $arg2);
   $query=$this->db->get('categoriadocente');
   return $query;
}

/*----------------------------------------*/
public function m_CursoEntM($arg, $arg2){ 
	$this->db->select('*');
	$this->db->where('idcurso', $arg);
	$this->db->where('datosPersonales_ci', $arg2);
   $query=$this->db->get('cursoentrenamiento');
   return $query;
}

/*----------------------------------------*/
public function m_PostgradoM($arg, $arg2){ 
	$this->db->select('*');
	$this->db->where('idpostgrado', $arg);
	$this->db->where('datosPersonales_ci', $arg2);
   $query=$this->db->get('postgrados');
   return $query;
}

/*----------------------------------------*/
public function m_CImpartidoM($arg, $arg2){ 
	$this->db->select('*');
	$this->db->where('id', $arg);
	$this->db->where('datosPersonales_ci', $arg2);
   $query=$this->db->get('cursosimpartidos');
   return $query;
}

/*----------------------------------------*/
public function m_CEstudioM($arg, $arg2){ 
	$this->db->select('*');
	$this->db->where('id', $arg);
	$this->db->where('datosPersonales_ci', $arg2);
   $query=$this->db->get('centroestudio');
   return $query;
}

/*----------------------------------------*/
public function m_GradoCientificoM($arg, $arg2){ 
	$this->db->select('*');
	$this->db->where('id', $arg);
	$this->db->where('datosPersonales_ci', $arg2);
   $query=$this->db->get('gradocientifico');
   return $query;
}

/*----------------------------------------*/
public function m_TituloAcademicoM($arg, $arg2){ 
	$this->db->select('*');
	$this->db->where('idtituloAcademico', $arg);
	$this->db->where('datosPersonales_ci', $arg2);
   $query=$this->db->get('tituloacademico');
   return $query;
}

/*----------------------------------------*/
public function m_PCM($arg, $arg2){ 
	$this->db->select('*');
	$this->db->where('idpc', $arg);
	$this->db->where('datosPersonales_ci', $arg2);
   $query=$this->db->get('pc');
   return $query;
}

/*----------------------------------------*/
public function m_TelefonoM($arg, $arg2){ 
	$this->db->select('*');
	$this->db->where('idtelefonoMovil', $arg);
	$this->db->where('datosPersonales_ci', $arg2);
   $query=$this->db->get('telefono');
   return $query;
}

/*----------------------------------------*/
public function m_TabletM($arg, $arg2){ 
	$this->db->select('*');
	$this->db->where('idtablet', $arg);
	$this->db->where('datosPersonales_ci', $arg2);
   $query=$this->db->get('tablet');
   return $query;
}
/*----------------------------------------*/
public function m_CorreoM($arg, $arg2){ 
	$this->db->select('*');
	$this->db->where('idemail', $arg);
	$this->db->where('datosPersonales_ci', $arg2);
   $query=$this->db->get('email');
   return $query;
}

/*----------------------------------------*/
public function m_responsable($arg){ 
	$this->db->select('*');
	$this->db->where('ci', $arg);
   $query=$this->db->get('datospersonales');
   return $query;
}

/*----------------------------------------*/
public function buscarCI($arg){ 
	$this->db->select('*');
	$this->db->where('ci', $arg);
   $query=$this->db->get('datospersonales');
   $find = true;
   if($query->num_rows() == 0){
	   $find = false;

   }
   return $find;	
}

/*----------------------------------------*/
public function buscarCIM($arg){ 
	$this->db->select('*');
	$this->db->where('ciMilitar', $arg);
   $query=$this->db->get('datospersonales');
   $find = true;
   if($query->num_rows() == 0){
	   $find = false;

   }
   return $find;	
}

/*----------------------------------------*/
public function deleteResponsable($arg){ 
	$this->db->select('bancoproblemas_numeroProblema');
	$this->db->where('datospersonales_ci', $arg);
	$query=$this->db->get('bancomiembro');
	$find = true;
	if($query->num_rows() == 0){
		$find = false;

	}
  	return $find;	
}
/*----------------------------------------*/
public function deleteProblematica($arg){ 
	$this->db->select('datospersonales_ci');
	$this->db->where('bancoproblemas_numeroProblema', $arg);
	$query=$this->db->get('bancomiembro');
	$find = true;
	if($query->num_rows() == 0){
		$find = false;

	}
  	return $find;	
}

/*----------------------------------------*/
public function m_tesis($idresponsable){ 
	$query=$this->db->query('SELECT  * FROM tesis  WHERE tesis.datosPersonales_ci  = "'.$idresponsable.'" ');
  	return $query;
}

/*----------------------------------------*/
public function m_innovaciones($idresponsable){ 
	$query=$this->db->query('SELECT  * FROM innovacion  WHERE innovacion.datosPersonales_ci  = "'.$idresponsable.'" ');
  	return $query;
}

/*----------------------------------------*/
public function m_organizaciones($idresponsable){ 
	$query=$this->db->query('SELECT  * FROM organizacionesmasa  WHERE organizacionesmasa.datosPersonales_ci  = "'.$idresponsable.'" ');
  	return $query;
}
/*----------------------------------------*/
public function m_asociaciones($idresponsable){ 
	$query=$this->db->query('SELECT  * FROM asociacionprofesional  WHERE asociacionprofesional.datosPersonales_ci  = "'.$idresponsable.'" ');
  	return $query;
}

/*----------------------------------------*/
public function m_idioma($idresponsable){ 
	$query=$this->db->query('SELECT  * FROM idioma  WHERE idioma.datosPersonales_ci  = "'.$idresponsable.'" ');
  	return $query;
}

/*----------------------------------------*/
public function m_actividades($idresponsable){ 
	$query=$this->db->query('SELECT  * FROM actividades  WHERE actividades.datosPersonales_ci  = "'.$idresponsable.'" ');
  	return $query;
}

/*----------------------------------------*/
public function m_ocupacion($idresponsable){ 
	$query=$this->db->query('SELECT  * FROM ocupacion  WHERE ocupacion.datosPersonales_ci  = "'.$idresponsable.'" ');
  	return $query;
}

/*----------------------------------------*/
public function m_colaboraciones($idresponsable){ 
	$query=$this->db->query('SELECT  * FROM colabfunciondireccion  WHERE colabfunciondireccion.datosPersonales_ci  = "'.$idresponsable.'" ');
  	return $query;
}

/*----------------------------------------*/
public function m_asesorias($idresponsable){ 
	$query=$this->db->query('SELECT  * FROM asesorias  WHERE asesorias.datosPersonales_ci  = "'.$idresponsable.'" ');
  	return $query;
}

/*----------------------------------------*/
public function m_eventos($idresponsable){ 
	$query=$this->db->query('SELECT  * FROM eventos  WHERE eventos.datosPersonales_ci  = "'.$idresponsable.'" ');
  	return $query;
}

/*----------------------------------------*/
public function m_investigaciones($idresponsable){ 
	$query=$this->db->query('SELECT  * FROM investigacionesrealizadas  WHERE investigacionesrealizadas.datosPersonales_ci  = "'.$idresponsable.'" ');
  	return $query;
}

/*----------------------------------------*/
public function m_reconocimientos($idresponsable){ 
	$query=$this->db->query('SELECT  * FROM reconocimientos  WHERE reconocimientos.datosPersonales_ci  = "'.$idresponsable.'" ');
  	return $query;
}

/*----------------------------------------*/
public function m_misiones($idresponsable){ 
	$query=$this->db->query('SELECT  * FROM misionesinternacionales  WHERE misionesinternacionales.datosPersonales_ci  = "'.$idresponsable.'" ');
  	return $query;
}

/*----------------------------------------*/
public function m_estudio($idresponsable){ 
	$query=$this->db->query('SELECT  * FROM centroestudio  WHERE centroestudio.datosPersonales_ci  = "'.$idresponsable.'" ');
  	return $query;
}

/*----------------------------------------*/
public function m_publicaciones($idresponsable){ 
	$query=$this->db->query('SELECT  * FROM publicaciones  WHERE publicaciones.datosPersonales_ci  = "'.$idresponsable.'" ');
  	return $query;
}

/*----------------------------------------*/
public function m_cimpart($idresponsable){ 
	$query=$this->db->query('SELECT  * FROM cursosimpartidos  WHERE cursosimpartidos.datosPersonales_ci  = "'.$idresponsable.'" ');
  	return $query;
}

/*----------------------------------------*/
public function m_pc($idresponsable){ 
	$query=$this->db->query('SELECT  * FROM pc  WHERE pc.datosPersonales_ci  = "'.$idresponsable.'" ');
  	return $query;
}

/*----------------------------------------*/
public function m_telefono($idresponsable){ 
	$query=$this->db->query('SELECT  * FROM telefono  WHERE telefono.datosPersonales_ci  = "'.$idresponsable.'" ');
  	return $query;
}

/*----------------------------------------*/
public function m_tablet($idresponsable){ 
	$query=$this->db->query('SELECT  * FROM tablet  WHERE tablet.datosPersonales_ci  = "'.$idresponsable.'" ');
  	return $query;
}

/*----------------------------------------*/
public function m_correo($idresponsable){ 
	$query=$this->db->query('SELECT  * FROM email  WHERE email.datosPersonales_ci  = "'.$idresponsable.'" ');
  	return $query;
}

/*----------------------------------------*/
public function m_redsocial($idresponsable){ 
	$query=$this->db->query('SELECT  * FROM redessociales  WHERE redessociales.datosPersonales_ci  = "'.$idresponsable.'" ');
  	return $query;
}

/*----------------------------------------*/
public function m_vivienda($idresponsable){ 
	$query=$this->db->query('SELECT  * FROM vivienda  WHERE vivienda.datosPersonales_ci  = "'.$idresponsable.'" ');
  	return $query;
}

/*----------------------------------------*/
public function m_transporte($idresponsable){ 
	$query=$this->db->query('SELECT  * FROM mediotransporte  WHERE mediotransporte.datosPersonales_ci  = "'.$idresponsable.'" ');
  	return $query;
}

/*----------------------------------------*/
public function m_catdocente($idresponsable){ 
	$query=$this->db->query('SELECT  * FROM categoriadocente  WHERE categoriadocente.datosPersonales_ci  = "'.$idresponsable.'" ');
  	return $query;
}

/*----------------------------------------*/
public function m_catcientifica($idresponsable){ 
	$query=$this->db->query('SELECT  * FROM categoriacientifica  WHERE categoriacientifica.datosPersonales_ci  = "'.$idresponsable.'" ');
  	return $query;
}

/*----------------------------------------*/
public function m_cursoentrenamiento($idresponsable){ 
	$query=$this->db->query('SELECT  * FROM cursoentrenamiento  WHERE cursoentrenamiento.datosPersonales_ci  = "'.$idresponsable.'" ');
  	return $query;
}

/*----------------------------------------*/
public function m_postgrados($idresponsable){ 
	$query=$this->db->query('SELECT  * FROM postgrados  WHERE postgrados.datosPersonales_ci  = "'.$idresponsable.'" ');
  	return $query;
}

/*----------------------------------------*/
public function m_gradocient($idresponsable){ 
	$query=$this->db->query('SELECT  * FROM gradocientifico  WHERE gradocientifico.datosPersonales_ci  = "'.$idresponsable.'" ');
  	return $query;
}

/*----------------------------------------*/
public function m_tituloacademico($idresponsable){ 
	$query=$this->db->query('SELECT  * FROM tituloacademico  WHERE tituloacademico.datosPersonales_ci  = "'.$idresponsable.'" ');
  	return $query;
}

/*----------------------------------------*/
public function m_proyecto($idresponsable){ 
	$query=$this->db->query('SELECT  * FROM proyecto  WHERE proyecto.datosPersonales_ci  = "'.$idresponsable.'" ');
  	return $query;
}

/*----------------------------------------*/
public function m_problematicas($numeroProblema){ 
	$query=$this->db->query('SELECT  * FROM bancoproblemas  WHERE bancoproblemas.numeroProblema  = "'.$numeroProblema.'" ');
  	return $query;
}

/*----------------------------------------*/
public function m_bancomiembro($numeroProblema){ 
	$query=$this->db->query('SELECT bancomiembro.datospersonales_ci FROM bancomiembro  WHERE bancomiembro.bancoproblemas_numeroProblema  = "'.$numeroProblema.'" ');
  	return $query;
}

/*----------------------------------------*/
public function m_problemas($idresponsable){ 
	//$query=$this->db->query('SELECT * FROM bancoproblemas INNER JOIN datospersonales ON (datospersonales.bancoProblemas_numeroProblema = bancoproblemas.numeroProblema)  WHERE datospersonales.ci = "'.$idresponsable.'" ');
	$query=$this->db->query('SELECT 
	bancoproblemas.numeroProblema,
	bancoproblemas.organo,
	bancoproblemas.problematica,
	bancoproblemas.programa,
	bancoproblemas.prioridades
  FROM
	datospersonales
	INNER JOIN bancomiembro ON (datospersonales.ci = bancomiembro.datospersonales_ci)
	INNER JOIN bancoproblemas ON (bancomiembro.bancoproblemas_numeroProblema = bancoproblemas.numeroProblema)
  WHERE
	datospersonales.ci = "'.$idresponsable.'" ');
  	return $query;
}



}
