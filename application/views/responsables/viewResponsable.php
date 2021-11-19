
<div class="content-wrapper">
<div class="content-header">
		  <div class="container-fluid">
				<div class="row mb-2" >
					 <div class="col-sm-6">
						  <h1 class="m-0 text-dark"><spam><i class="fas fa-folder-open"></i></spam> Expediente del miembro</h1>
					 </div>
					 <!-- /.col -->
					 <div class="col-sm-6">
						  <ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item "><a href="#">Inicio</a></li>
								<li class="breadcrumb-item "><a href="#">Miembro</a></li>
								<li class="breadcrumb-item active">Expediente del miembro</li>
						  </ol>
					 </div>
					 <!-- /.col -->
				</div>
				<!-- /.row -->
		  </div>
		  <!-- /.container-fluid -->
	 </div>
<section class="content">
	 <div class="row">
		<div class="col-1"></div>
		<div class="col-10">
		<?php if(!empty($mensaje) && $type == true): ?>
			
		<div class="callout callout-success alert alert-dismissible "  style="background-color:#e8f5e9;">
						  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							 <h5><i class="fas fa-check-circle" style="color:#28a745;"></i> Satisfactorio!</h5>
							 <p><?php echo $mensaje ?></p>
						  </div>
		  <?php endif ?>
		  <?php if(!empty($mensaje) && $type == false): ?>
				
	 
			 <div class="callout callout-danger alert alert-dismissible "  style="background-color:#ffcdd2;">
						  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							 <h5><i class="far fa-times-circle" style="color:#d32f2f;"></i> Error!</h5>
							 <p><?php echo $mensaje ?></p>
							 
						  </div>
		  <?php endif ?>
		</div>
		<div class="col-1"></div>
	 </div>

		<?php  foreach ($m->result() as $d): ?>
			<div class="container-fluid">
		  <div class="row">
			 
			 <div class="col-12">
		<!-- desde aqui -->
  <div class="card">
		<div class="px-3 pb-1 cover" style=" background: linear-gradient(to left, #1e88e5, #66bb6a); background-size: cover; " >
		  <div class="media align-items-end" style="transform: translateX(3px) translateY(2.5rem);">
			 <div class=" mr-3">
			  
				  <img src="<?php echo base_url('dist/img/avatar/'.$d->avatar);  ?>" style=" height:150px; width:150px; " alt="User profile picture" class=" profile-user-img  img-circle  img-thumbnail" >
				
				
			 </div>
			 <div class="media-body mb-4 text-white">
				<h3 class=" mt-0 mb-0 "><strong><?php echo $d->nombres." ".$d->apellido1." ".$d->apellido2; ?></strong></h3>
				<p class=" mb-4"><?php echo $d->gradoMilitar; ?></p>
				<ul class="list-inline" style=" float:right;">
				  
				  <?php 	if ($this->session->userdata('logged_in')==True) {  ?>
				<li class="list-inline-item">
					 <button data-toggle="modal" data-target="#modal-default" type="button" class="btn bg-navy"><i class="fas fa-image mr-1"></i> Subir avatar</button>
				  </li>
				  <li class=" list-inline-item">
					 <?php $controlpag = 1?>
					 <a href='<?php echo base_url()."index.php/controller/editResponsable/".$d->ci.'/'.$controlpag; ?>'> <button type="button" class="btn bg-olive "><i class="fas fa-edit mr-1"></i> Editar datos</button></a>
				  </li>
				  <?php } ?>
				  <li class="list-inline-item">
					 <a href="<?php echo base_url()."index.php/controller/expExpedientePDF/".$d->ci ; ?>" class="btn btn-secondary"> <i class="fas fa-file-pdf mr-1"></i> Exportar expediente</a>
				  </li>
				</ul>
			  
			 </div>
		  </div>
		</div>
		<!-- AVATAR -->
		<div class="bg-light">
		  <br>
		  <br>
		  <div class="modal fade" id="modal-default">
		  <div class="modal-dialog">
			 <div class="modal-content">
				<div class="modal-header text-white" style=" background: linear-gradient(to right, #1e88e5, #66bb6a);">
				  <h4 class="modal-title" > <i class="fas fa-image mr-1"></i> Subir avatar</h4>
				  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					 <span aria-hidden="true">&times;</span>
				  </button>
				</div>
				<form onsubmit="return validar()" action="<?php echo base_url('index.php/controller/uploadPicture')?>" method="post" enctype="multipart/form-data">
				<div class="modal-body">
				<div class="col-1"></div>
				  <div class="form-group col-md-10">
						<input type="hidden" name="uploadCi" value="<?php echo $d->ci; ?>">
						<input type="file"  id="upload" name="upload">
						<p id="msgUpload" style="color: red;"></p>
			 </div>
			 <div class="col-1"></div>  
					 
				  
				
				</div>
				<div class="card-footer">
				  <div class="row">
					 <div class=col-3></div>
					 <div class=col-3>
					 <button type="button" class="btn bg-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
					 </div>
					 <div class=col-3><button type="submit" class="btn bg-success"><i class="fa fa-check"></i> Aceptar </button></div>

				  </div>
				  
				  
				</div>
				</form>
			 </div>
			 
			 <!-- /.modal-content -->
		  </div>
		  <!-- /.modal-dialog -->
		  </div>
		</div>
			<!-- Publicacion -->
		
		
	
		<div class="bg-light">
		<div class="post">
		  <div class="row">
			 <div class="col-1"></div>
			 <div class="col-3">
				<strong><i class="fas fa-id-badge mr-1"></i> Carnet de identidad: </strong> <?php echo $d->ci; ?><br><br>
				<strong><i class="far fa-id-badge mr-1"></i> Carnet de identidad militar: </strong><?php echo $d->ciMilitar; ?><br><br>
				<strong><i class="fas fa-map-marked-alt mr-1"></i> Dirección: </strong> <?php echo $d->direccion; ?><br><br>
				<strong><i class="fas fa-venus-mars mr-1"></i> Sexo: </strong><?php echo $d->sexo; ?><br><br>
				
			 </div >
			 <div class="col-3">
			 <strong><i class="fas fa-building mr-1"></i> Órgano: </strong> <?php echo $d->organo; ?><br><br>
				<strong><i class="fas fa-medal mr-1"></i> Cuadro: </strong> <?php echo $d->cuadro; ?><br><br>
				<strong><i class="fas fa-map-marker-alt mr-1"></i> Lugar de nacimiento: </strong><?php echo $d->nacimientoLugar; ?><br><br>
				<strong><i class="fas fa-flag mr-1"></i> Nacionalidad: </strong><?php echo $d->nacionalidad; ?><br><br>
			 </div>
			 <div class="col-3">
			 <strong><i class="fas fa-ring mr-1"></i> Estado civil: </strong><?php echo $d->estadoCivil; ?><br><br>
			
				  <fieldset style="margin: 1px -8px 8px; border: 1px solid ; padding:4px; border-radius:4px; width:100%;">
					 <legend style="font-size:16px;"> <strong><i class="fas fa-baby mr-1"></i>Hijos: </strong></legend>
					 
					 <strong ><i class="fas fa-male"></i> Varones: </strong><?php echo $d->varones; ?><br>
				  <strong><i class="fas fa-female "></i> Hembras: </strong><?php echo $d->hembras; ?>
				  </fieldset>
			  
			 </div>
				
				
			 
		  </div >
		</div>
						  
						  
				  </div>
		</div>
  </div>
						

		<!-- hasta aqui -->


			 <div class="col-md-12">
				<div class="card card-dark card-outline card-tabs">
			  
					 <ul class="nav nav-tabs">
						<li class="nav-item"><a class="nav-link <?php if($pag == "problematicas" or $pag == "home"){ echo "active";} ?> " href="#problematicas" data-toggle="tab" ><b><i class="nav-icon fas fa-archive mr-1"></i>Problemáticas</b></a></li>
						<li class="nav-item"><a class="nav-link <?php if($pag == "centroestudio"){ echo "active";} ?> " href="#centroestudio" data-toggle="tab"><b><i class="nav-icon fas fa-university mr-1"></i>Estudios</b></a></li>
						<li class="nav-item"><a class="nav-link <?php if($pag == "expprofesional"){ echo "active";} ?> " href="#expprofesional" data-toggle="tab"><b><i class="nav-icon fas fa-briefcase mr-1"></i>Experiencia profesional</b></a></li>
						<li class="nav-item"><a class="nav-link <?php if($pag == "ocupacion"){ echo "active";} ?> " href="#ocupacion" data-toggle="tab"><b><i class="nav-icon fas fa-user-tag mr-1"></i>Ocupación</b></a></li>
						<li class="nav-item"><a class="nav-link <?php if($pag == "tesis"){ echo "active";} ?> " href="#tesis" data-toggle="tab"><b><i class="nav-icon fas fa-book mr-1"></i>Tesis</b></a></li>
						<li class="nav-item"><a class="nav-link <?php if($pag == "innovaciones"){ echo "active";} ?>" href="#innovaciones" data-toggle="tab"><b><i class="nav-icon fas fa-lightbulb mr-1"></i>Innovaciones</b></a></li>
						<li class="nav-item"><a class="nav-link <?php if($pag == "organizaciones"){ echo "active";} ?>" href="#organizaciones" data-toggle="tab"><b><i class="nav-icon fas fa-users mr-1"></i>Asociaciones</b></a></li>
						<li class="nav-item"><a class="nav-link <?php if($pag == "potencial"){ echo "active";} ?>" href="#potencial" data-toggle="tab"><b><i class="nav-icon fas fa-atom mr-1"></i>Potencial científico</b></a></li>
						<li class="nav-item"><a class="nav-link <?php if($pag == "cursosimpartidos"){ echo "active";} ?>" href="#cursosimpartidos" data-toggle="tab"><b><i class="nav-icon fas fa-scroll mr-1"></i>Cursos impartidos</b></a></li>
						<li class="nav-item"><a class="nav-link <?php if($pag == "publicaciones"){ echo "active";} ?>" href="#publicaciones" data-toggle="tab"><b><i class="nav-icon fas fa-newspaper mr-1"></i>Publicaciones</b></a></li>
						<li class="nav-item"><a class="nav-link <?php if($pag == "proyectos"){ echo "active";} ?>" href="#proyectos" data-toggle="tab"><b><i class="nav-icon fas fa-puzzle-piece mr-1"></i>Proyectos</b></a></li>
						<li class="nav-item"><a class="nav-link <?php if($pag == "idiomas"){ echo "active";} ?>" href="#idiomas" data-toggle="tab"><b><i class="nav-icon fas fa-language mr-1"></i>Idiomas</b></a></li>
						<li class="nav-item"><a class="nav-link <?php if($pag == "colaboraciones"){ echo "active";} ?>" href="#colaboraciones" data-toggle="tab"><b><i class="nav-icon fas fa-hands-helping mr-1"></i>Colaboraciones</b></a></li>
						<li class="nav-item"><a class="nav-link <?php if($pag == "asesorias"){ echo "active";} ?>" href="#asesorias" data-toggle="tab"><b><i class="nav-icon fas fa-user-friends mr-1"></i>Asesorías</b></a></li>
						<li class="nav-item"><a class="nav-link <?php if($pag == "eventos"){ echo "active";} ?>" href="#eventos" data-toggle="tab"><b><i class="nav-icon fas fa-calendar-check mr-1"></i>Eventos</b></a></li>
						<li class="nav-item"><a class="nav-link <?php if($pag == "investigaciones"){ echo "active";} ?>" href="#investigaciones" data-toggle="tab"><b><i class="nav-icon fas fa-search mr-1"></i>Investigaciones</b></a></li>
						<li class="nav-item"><a class="nav-link <?php if($pag == "reconocimientos"){ echo "active";} ?>" href="#reconocimientos" data-toggle="tab"><b><i class="nav-icon fas fa-award mr-1"></i>Reconocimientos</b></a></li>
						<li class="nav-item"><a class="nav-link <?php if($pag == "misiones"){ echo "active";} ?>" href="#misiones" data-toggle="tab"><b><i class="nav-icon fas fa-route mr-1"></i>Misiones internacionalistas</b></a></li>
						<li class="nav-item"><a class="nav-link <?php if($pag == "tic"){ echo "active";} ?>" href="#tic" data-toggle="tab"><b><i class="nav-icon fas fa-laptop-house mr-1"></i>TIC</b></a></li>
						<li class="nav-item"><a class="nav-link <?php if($pag == "rsociales"){ echo "active";} ?>" href="#rsociales" data-toggle="tab"><b><i class="nav-icon fas fa-project-diagram mr-1"></i>Redes sociales</b></a></li>
						<li class="nav-item"><a class="nav-link <?php if($pag == "atencion"){ echo "active";} ?>" href="#atencion" data-toggle="tab"><b><i class="nav-icon fab fa-phabricator mr-1"></i>Atención</b></a></li>
						<li class="nav-item"><a class="nav-link <?php if($pag == "actividades"){ echo "active";} ?>" href="#actividades" data-toggle="tab"><b><i class="nav-icon fas fa-icons mr-1"></i>Otras actividades</b></a></li>
					 </ul>
				  
				  <div class="card-body">
					 <div class="tab-content">
						  
						<div class=" tab-pane <?php if($pag == "problematicas" or $pag == "home"){ echo "active";} ?>" id="problematicas">
						<div class="card"> 
							 <div class="card-header text-white" style=" background: linear-gradient(to right, #1e88e5, #66bb6a);"> <i class="nav-icon fas fa-archive mr-1"></i> Problemáticas asociadas </div>
							 <div class="card-body" id="cardproblematicas">
								<?php
										if ($this->session->userdata('logged_in')==True) { $controlador = 1; ?>
										<div class='col-1'>
										  <a href="<?php echo base_url()."index.php/controller/v_i_ProblematicaM/".$d->ci; ?>" style='margin-left: 20px;'> 
											 <button type='button' class='btn btn-info btn-sm'><i class='fas fa-plus'></i> Insertar</button>
										  </a>
										</div>  
									 <?php	} ?>
								<br>
								<br>
						  <div class="table table-responsive">
							  <table id="ltsprobematicas" class="table table-bordered table-striped"  width="100%">
								<thead>
								  <tr >
										<th>Órgano</th>
										<th>Problemática</th>
										<th>Programa</th>
										<th>Prioridades</th>
													  <th>Opciones</th>
														  </tr>
													 </thead>
													 <tbody>
							 <?php if($problemas->result() == null) {
								echo "<tr><td colspan='5'><center>No existen problemáticas asociadas a este miembro...</center></td></tr>";
							 }?>
							 <?php  foreach ($problemas->result() as $prob) { ?>
												<tr id="tabla_problematicas">
												<td><?php echo $prob->organo; ?></td>
												<td><?php echo $prob->problematica; ?></td>
												<td><?php echo $prob->programa; ?></td>
												<td><?php echo $prob->prioridades; ?></td>
												<td class="text-center">
												<?php $flag = True; $message = 1; $type = True; ?>
													
													<?php  if($this->session->userdata('logged_in')==True) { ?>
													
									 <a href="<?php echo base_url()."index.php/controller/v_e_ProblematicaM/".$prob->numeroProblema .'/'.$d->ci; ?>"  title="Editar" >
										<button type='button' class='btn btn-sm bg-olive' title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
										</a>
														<a href="<?php echo base_url()."index.php/controller/desvProblematicaMiembro/".$d->ci.'/'.$prob->numeroProblema ; ?>" title="Desvincular">
														<button onclick="return confirmProblematica()"  type='button' class='btn btn-sm bg-navy delRespresentante' title="Desvincular" ><i class='fas fa-unlink' > </i> Desvincular</button>
														</a >
													<?php } ?>
													<?php  if($this->session->userdata('logged_in')==false) { ?>
													
									 <a href="#"  title="Editar" >
										<button type='button' disabled class='btn btn-sm bg-olive' title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
										</a>
														<a href="#" title="Desvincular">
														<button onclick="return confirmProblematica()" disabled type='button' class='btn btn-sm bg-navy delRespresentante' title="Desvincular" ><i class='fas fa-unlink' > </i> Desvincular</button>
														</a >
													<?php } ?>
												</td> 
												</tr>
											<?php } ?>  
													 </tbody>
													 <tfoot style="height: 18px; background-color:#6c757d;color: #6c757d; ">
											<tr>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<td></td>
											</tr>
										</tfoot>
						  </table>
						  </div>
								</div>
						  </div>
						
							 
						
						</div>

						<div class=" tab-pane <?php if($pag == "ocupacion"){ echo "active";} ?>" id="ocupacion">
						<div class="card"> 
							 <div class="card-header text-white" style=" background: linear-gradient(to right, #1e88e5, #66bb6a);"> <i class="nav-icon fas fa-user-tag mr-1"></i> Ocupación </div>
							 <div class="card-body" id="cardproblematicas">
								<?php
										if ($this->session->userdata('logged_in')==True) { $controlador = 1; ?>
										<div class='col-1'>
										  <a href="<?php echo base_url()."index.php/controller/v_i_OcupacionM/".$d->ci; ?>" style='margin-left: 20px;'> 
											 <button type='button' class='btn btn-info btn-sm'><i class='fas fa-plus'></i> Insertar</button>
										  </a>
										</div>  
									 <?php	} ?>
								<br>
								<br>
						  <div class="table table-responsive">
							  <table id="ltsocupacion" class="table table-bordered table-striped"  width="100%">
								<thead>
								  <tr >
				
										<th>Ocupación</th>
										<th>Fecha</th>
													  <th>Opciones</th>
									 </tr>
								</thead>
								<tbody>
							 <?php if($ocupacion->result() == null) {
								echo "<tr><td colspan='3'><center>No existen ocupaciones asociadas a este miembro...</center></td></tr>";
							 }?>
							 <?php  foreach ($ocupacion->result() as $act) { ?>
												<tr id="tabla_problematicas">
												<td><?php echo $act->ocupacion; ?></td>
												<td><?php echo strftime("%d %B, %Y", strtotime($act->fecha)) ?></td>
												<td class="text-center">
												<?php $flag = True; $message = 1; $type = True; ?>
													
													<?php  if($this->session->userdata('logged_in')==True) { ?>
													
									 <a href="<?php echo base_url()."index.php/controller/v_e_OcupacionM/".$act->idocupacion .'/'.$d->ci; ?>"  title="Editar" >
										<button type='button' class='btn btn-sm bg-olive' title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
										</a>
														<a href="<?php echo base_url()."index.php/controller/delOcupacion/".$d->ci.'/'.$act->idocupacion ; ?>" title="Eliminar">
														<button onclick="return confirmOcupacion()"  type='button' class='btn btn-sm bg-danger delRespresentante' title="Eliminar" ><i class='fas fa-trash' > </i> Eliminar</button>
														</a >
													<?php } ?>
													<?php  if($this->session->userdata('logged_in')==false) { ?>
													
									 <a href="#"  title="Editar" >
										<button type='button' disabled class='btn btn-sm bg-olive' title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
										</a>
														<a href="#" title="Desvincular">
														<button onclick="return confirmOcupacion()" disabled type='button' class='btn btn-sm bg-navy delRespresentante' title="Eliminar" ><i class='fas fa-trash' > </i> Eliminar</button>
														</a >
													<?php } ?>
												</td> 
												</tr>
											<?php } ?>  
													 </tbody>
													 <tfoot style="height: 18px; background-color:#6c757d;color: #6c757d; ">
											<tr>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<td></td>
											</tr>
										</tfoot>
						  </table>
						  </div>
								</div>
						  </div>
						
							 
						
						</div>

						<div class=" tab-pane <?php if($pag == "actividades"){ echo "active";} ?>" id="actividades">
						<div class="card"> 
							 <div class="card-header text-white" style=" background: linear-gradient(to right, #1e88e5, #66bb6a);"> <i class="nav-icon fas fa-icons mr-1"></i> Otras actividades </div>
							 <div class="card-body" id="cardproblematicas">
								<?php
										if ($this->session->userdata('logged_in')==True) { $controlador = 1; ?>
										<div class='col-1'>
										  <a href="<?php echo base_url()."index.php/controller/v_i_ActividadM/".$d->ci; ?>" style='margin-left: 20px;'> 
											 <button type='button' class='btn btn-info btn-sm'><i class='fas fa-plus'></i> Insertar</button>
										  </a>
										</div>  
									 <?php	} ?>
								<br>
								<br>
						  <div class="table table-responsive">
							  <table id="ltsactividad" class="table table-bordered table-striped"  width="100%">
								<thead>
								  <tr >
				
										<th>Denominación</th>
										<th>Fecha</th>
													  <th>Opciones</th>
														  </tr>
													 </thead>
													 <tbody>
							 <?php if($actividades->result() == null) {
								echo "<tr><td colspan='3'><center>No existen otras actividaes asociadas a este miembro...</center></td></tr>";
							 }?>
							 <?php  foreach ($actividades->result() as $act) { ?>
												<tr id="tabla_problematicas">
												<td><?php echo $act->denominacion; ?></td>
												<td><?php echo strftime("%d %B, %Y", strtotime($act->fecha)); ?></td>
												<td class="text-center">
												<?php $flag = True; $message = 1; $type = True; ?>
													
													<?php  if($this->session->userdata('logged_in')==True) { ?>
													
									 <a href="<?php echo base_url()."index.php/controller/v_e_ActividadM/".$act->idact .'/'.$d->ci; ?>"  title="Editar" >
										<button type='button' class='btn btn-sm bg-olive' title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
										</a>
														<a href="<?php echo base_url()."index.php/controller/delActividad/".$d->ci.'/'.$act->idact ; ?>" title="Eliminar">
														<button onclick="return confirmActvidad()"  type='button' class='btn btn-sm bg-danger delRespresentante' title="Eliminar" ><i class='fas fa-trash' > </i> Eliminar</button>
														</a >
													<?php } ?>
													<?php  if($this->session->userdata('logged_in')==false) { ?>
													
									 <a href="#"  title="Editar" >
										<button type='button' disabled class='btn btn-sm bg-olive' title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
										</a>
														<a href="#" title="Desvincular">
														<button onclick="return confirmActvidad()" disabled type='button' class='btn btn-sm bg-navy delRespresentante' title="Eliminar" ><i class='fas fa-trash' > </i> Eliminar</button>
														</a >
													<?php } ?>
												</td> 
												</tr>
											<?php } ?>  
													 </tbody>
													 <tfoot style="height: 18px; background-color:#6c757d;color: #6c757d; ">
											<tr>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<td></td>
											</tr>
										</tfoot>
						  </table>
						  </div>
								</div>
						  </div>
						
							 
						
						</div>

					 <div class="tab-pane <?php if($pag == "cursosimpartidos"){ echo "active";} ?>" id="cursosimpartidos">
						<div class="card">
							 <div class="card-header text-white" style=" background: linear-gradient(to right, #1e88e5, #66bb6a);"><i class="nav-icon fas fa-scroll mr-1"></i>Cursos impartidos</div>
								<div class="card-body" id="cardexpprofesional">
								<?php
										if ($this->session->userdata('logged_in')==True) {  ?>
										<div class='col-1'>
										  <a href="<?php echo base_url()."index.php/controller/v_i_CImpartidoM/".$d->ci; ?>" style='margin-left: 20px;'> 
											 <button type='button' class='btn btn-info btn-sm'><i class='fas fa-plus'></i> Insertar</button>
										  </a>
										</div>  
									 <?php	} ?>
								<br>
								<br>
							 <div class="table table-responsive">
							 <table id="ltscursoimpartido" class="table table-bordered table-striped" width="100%">
							 <thead>
								<tr >
									 <th>Denominación</th>
									 <th>Tipo</th>
									 <th>Fecha</th>
									 
								  <th>Opciones</th>
								</tr>
						  </thead>
						  <tbody>
								<?php if($cimpart->result() == null) {
								  echo "<tr><td colspan='4'><center>No existen cursos impartidos asociados a este miembro...</center></td></tr>";
								}?>
								<?php  foreach ($cimpart->result() as $exp) { ?>
								  <tr id="tabla_expProfesionales">
								  <td><?php echo $exp->nombre; ?></td>
								  <td><?php echo $exp->tipo; ?></td>
								  <td><?php echo  strftime("%d %B, %Y", strtotime( $exp->fecha)); ?></td>
								  <td class="text-center">
								  <?php $flag = True; $message = 1; $type = True; ?>
									 
									 <?php  if($this->session->userdata('logged_in')==True) { ?>
									 
										<a href="<?php echo base_url()."index.php/controller/v_e_CImpartidoM/".$d->ci.'/'.$exp->id; ?>"  title="Editar" >
										<button type='button' class='btn btn-sm bg-olive' title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
										</a>
										<a href="<?php echo base_url()."index.php/controller/delCImpartidoM/".$d->ci.'/'.$exp->id; ?>" title="Eliminar">
										<button onclick="return confirmCurso()"  type='button' class='btn btn-sm bg-red delRespresentante' title="Eliminar" ><i class='fas fa-trash' > </i> Eliminar</button>
										</a >
									 <?php } ?>
									 <?php  if($this->session->userdata('logged_in')==false) { ?>
									 
										<a href="#"  title="Editar" >
										<button type='button' class='btn btn-sm bg-olive' disabled title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
										</a>
										<a href="#" title="Eliminar">
										<button  disabled type='button' class='btn btn-sm bg-red delRespresentante' title="Eliminar" ><i class='fas fa-trash' > </i> Eliminar</button>
										</a >
									 <?php } ?>
								  </td> 
								  </tr>
								<?php } ?>  
														</tbody>
														<tfoot style="height: 18px; background-color:#6c757d;color: #6c757d; ">
											<tr>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<td></td>
											</tr>
										</tfoot>
						  </table>

						  
						  </div>
								</div>
							 </div>
							 
							 
					</div>

					 <div class="tab-pane <?php if($pag == "centroestudio"){ echo "active";} ?>" id="centroestudio">
						<div class="card">
							 <div class="card-header text-white" style=" background: linear-gradient(to right, #1e88e5, #66bb6a);"><i class="nav-icon fas fa-university mr-1"></i>Centros de estudios</div>
								<div class="card-body" id="cardexpprofesional">
								<?php
										if ($this->session->userdata('logged_in')==True) {  ?>
										<div class='col-1'>
										  <a href="<?php echo base_url()."index.php/controller/v_i_CEstudioM/".$d->ci; ?>" style='margin-left: 20px;'> 
											 <button type='button' class='btn btn-info btn-sm'><i class='fas fa-plus'></i> Insertar</button>
										  </a>
										</div>  
									 <?php	} ?>
								<br>
								<br>
							 <div class="table table-responsive">
							 <table id="ltsestudio" class="table table-bordered table-striped" width="100%">
							 <thead>
								<tr >
									 <th>Centro estudiantil</th>
									 <th>Tipo</th>
									 <th>Desde</th>
									 <th>Hasta</th>
									 
								  <th>Opciones</th>
								</tr>
						  </thead>
						  <tbody>
								<?php if($estudio->result() == null) {
								  echo "<tr><td colspan='5'><center>No existen centros estudiantiles asociadas a este miembro...</center></td></tr>";
								}?>
								<?php  foreach ($estudio->result() as $exp) { ?>
								  <tr id="tabla_expProfesionales">
								  <td><?php echo $exp->nombre; ?></td>
								  <td><?php echo $exp->tipo; ?></td>
								  <td><?php echo  strftime("%d %B, %Y", strtotime( $exp->fechaInicio)); ?></td>
								  <td><?php echo  strftime("%d %B, %Y", strtotime( $exp->fechaFin)) ; ?></td>
								  <td class="text-center">
								  <?php $flag = True; $message = 1; $type = True; ?>
									 
									 <?php  if($this->session->userdata('logged_in')==True) { ?>
									 
										<a href="<?php echo base_url()."index.php/controller/v_e_CEstudioM/".$d->ci.'/'.$exp->id; ?>"  title="Editar" >
										<button type='button' class='btn btn-sm bg-olive' title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
										</a>
										<a href="<?php echo base_url()."index.php/controller/delCEstudioM/".$d->ci.'/'.$exp->id; ?>" title="Eliminar">
										<button onclick="return confirmEstudio()"  type='button' class='btn btn-sm bg-red delRespresentante' title="Eliminar" ><i class='fas fa-trash' > </i> Eliminar</button>
										</a >
									 <?php } ?>
									 <?php  if($this->session->userdata('logged_in')==false) { ?>
									 
										<a href="#"  title="Editar" >
										<button type='button' class='btn btn-sm bg-olive' disabled title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
										</a>
										<a href="#" title="Eliminar">
										<button  disabled type='button' class='btn btn-sm bg-red delRespresentante' title="Eliminar" ><i class='fas fa-trash' > </i> Eliminar</button>
										</a >
									 <?php } ?>
								  </td> 
								  </tr>
								<?php } ?>  
														</tbody>
														<tfoot style="height: 18px; background-color:#6c757d;color: #6c757d; ">
											<tr>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<td></td>
											</tr>
										</tfoot>
						  </table>

						  
						  </div>
								</div>
							 </div>
							 
							 
						</div>

					 <div class="tab-pane <?php if($pag == "expprofesional"){ echo "active";} ?>" id="expprofesional">
						<div class="card">
							 <div class="card-header text-white" style=" background: linear-gradient(to right, #1e88e5, #66bb6a);"><i class="nav-icon fas fa-briefcase mr-1"></i>Experiencia profesional</div>
								<div class="card-body" id="cardexpprofesional">
								<?php
										if ($this->session->userdata('logged_in')==True) {  ?>
										<div class='col-1'>
										  <a href="<?php echo base_url()."index.php/controller/v_i_ExpProfesionalM/".$d->ci; ?>" style='margin-left: 20px;'> 
											 <button type='button' class='btn btn-info btn-sm'><i class='fas fa-plus'></i> Insertar</button>
										  </a>
										</div>  
									 <?php	} ?>
								<br>
								<br>
							 <div class="table table-responsive">
							 <table id="ltsexpprofesionales" class="table table-bordered table-striped" width="100%">
							 <thead>
								<tr >
									 <th>Centro laboral</th>
									 <th>Cargo</th>
									 <th>Desde</th>
									 <th>Hasta</th>
									 
								  <th>Opciones</th>
								</tr>
						  </thead>
						  <tbody>
								<?php if($expprof->result() == null) {
								  echo "<tr><td colspan='5'><center>No existen experiencias profesionales asociadas a este miembro...</center></td></tr>";
								}?>
								<?php  foreach ($expprof->result() as $exp) { ?>
								  <tr id="tabla_expProfesionales">
								  <td><?php echo $exp->centroLaboral; ?></td>
								  <td><?php echo $exp->cargoOcupa; ?></td>
								  <td><?php echo  strftime("%d %B, %Y", strtotime( $exp->fechaDesde)); ?></td>
								  <td><?php echo  strftime("%d %B, %Y", strtotime( $exp->fechaHasta)) ; ?></td>
								  <td class="text-center">
								  <?php $flag = True; $message = 1; $type = True; ?>
									 
									 <?php  if($this->session->userdata('logged_in')==True) { ?>
									 
										<a href="<?php echo base_url()."index.php/controller/v_e_ExpProfesionalM/".$d->ci.'/'.$exp->idexperienciaProfesional; ?>"  title="Editar" >
										<button type='button' class='btn btn-sm bg-olive' title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
										</a>
										<a href="<?php echo base_url()."index.php/controller/delExpProfesionalM/".$d->ci.'/'.$exp->idexperienciaProfesional; ?>" title="Eliminar">
										<button onclick="return confirmExpProfesional()"  type='button' class='btn btn-sm bg-red delRespresentante' title="Eliminar" ><i class='fas fa-trash' > </i> Eliminar</button>
										</a >
									 <?php } ?>
									 <?php  if($this->session->userdata('logged_in')==false) { ?>
									 
										<a href="#"  title="Editar" >
										<button type='button' class='btn btn-sm bg-olive' disabled title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
										</a>
										<a href="#" title="Eliminar">
										<button onclick="return confirmExpProfesional()" disabled type='button' class='btn btn-sm bg-red delRespresentante' title="Eliminar" ><i class='fas fa-trash' > </i> Eliminar</button>
										</a >
									 <?php } ?>
								  </td> 
								  </tr>
								<?php } ?>  
														</tbody>
														<tfoot style="height: 18px; background-color:#6c757d;color: #6c757d; ">
											<tr>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<td></td>
											</tr>
										</tfoot>
						  </table>

						  
						  </div>
								</div>
							 </div>
							 
							 
						</div>

						
					<div class="tab-pane <?php if($pag == "tesis"){ echo "active";} ?>" id="tesis">
						<div class="card">
							 <div class="card-header text-white" style=" background: linear-gradient(to right, #1e88e5, #66bb6a);"><i class="nav-icon fas fa-book mr-1"></i>Tesis</div>
							 <div class="card-body" id="cardtesis">
							 <?php
														if ($this->session->userdata('logged_in')==True) {  ?>
														<div class='col-1'>
															<a href="<?php echo base_url()."index.php/controller/v_i_TesisM/".$d->ci; ?>" style='margin-left: 20px;'> 
																<button type='button' class='btn btn-info btn-sm'><i class='fas fa-plus'></i> Insertar</button>
															</a>
														</div>  
													<?php	} ?>
							 <br>
							 <br>
						  <div class="table table-responsive">
						  <table id="ltstesis" class="table table-bordered table-striped"  width="100%">
							 <thead>
								<tr >
									 <th>Centro estudio</th>
									 <th>Título</th>
									 <th>Tipo autor</th>
								  <th>Fecha defensa</th>
								  <th>Clasificación</th>
								  <th>Centro referencia</th>
								  
		
												<th>Opciones</th>
														  </tr>
													 </thead>
													 <tbody>
							 <?php if($tesis->result() == null) {
								echo "<tr><td colspan='8'><center>No existen tesis asociadas a este miembro...</center></td></tr>";
							 }?>
							 <?php  foreach ($tesis->result() as $t) { ?>
												<tr id="tabla_tesis">
												<td><?php echo $t->centroEstudio; ?></td>
												<td><?php echo $t->titulo; ?></td>
												<td><?php echo $t->tipoAutor; ?></td>
												<td><?php echo  strftime("%d %B, %Y", strtotime( $t->fechaDefensa)) ; ?></td>
												<td><?php echo $t->clasificacion; ?></td>
												<td><?php echo $t->centroReferencia; ?></td>
												
												<td class="text-center">
												<?php $flag = True; $message = 1; $type = True; ?>
													
													<?php  if($this->session->userdata('logged_in')==True) { ?>
														
														<a href="<?php echo base_url()."index.php/controller/v_e_TesisM/".$d->ci.'/'.$t->idtesis ; ?>"  title="Editar" >
														<button type='button' class='btn btn-sm bg-olive' title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
														</a>
														<a href="<?php echo base_url()."index.php/controller/delTesisM/".$t->idtesis.'/'.$d->ci ; ?>" title="Eliminar">
														<button onclick="return confirmTesis()"  type='button' class='btn btn-sm bg-red delRespresentante' title="Eliminar" ><i class='fas fa-trash' > </i> Eliminar</button>
														</a >
													<?php } ?>
													<?php  if($this->session->userdata('logged_in')==false) { ?>
														
														<a href="#"  title="Editar" >
														<button type='button' class='btn btn-sm bg-olive'  disabled title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
														</a>
														<a href="#" title="Eliminar">
														<button onclick="return confirmTesis()"  disabled type='button' class='btn btn-sm bg-red delRespresentante' title="Eliminar" ><i class='fas fa-trash' > </i> Eliminar</button>
														</a >
													<?php } ?>
												</td> 
												</tr>
											<?php } ?>  
													 </tbody>
													 <tfoot style="height: 18px; background-color:#6c757d;color: #6c757d; ">
											<tr>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<td></td>
											</tr>
										</tfoot>
									  </table>
						  </div>
							 </div>
						  </div>
						</div>
						
						<div class="tab-pane <?php if($pag == "innovaciones"){ echo "active";} ?>" id="innovaciones">
						  <div class="card">
							 <div class="card-header text-white" style=" background: linear-gradient(to right, #1e88e5, #66bb6a);"><i class="nav-icon fas fa-lightbulb mr-1"></i>Innovaciones</div>
							 <div class="card-body" id="cardinnovaciones">
							 <?php
										  if ($this->session->userdata('logged_in')==True) { $controlador = 1; ?>
										  <div class='col-1'>
											 <a href="<?php echo base_url()."index.php/controller/v_i_InnovacionM/".$d->ci; ?>" style='margin-left: 20px;'> 
												<button type='button' class='btn btn-info btn-sm'><i class='fas fa-plus'></i> Insertar</button>
											 </a>
										  </div>  

										  <?php } ?>
								  <br>
								  <br>
								<div class="table table-responsive">
								<table id="ltsinnovaciones" class="table table-bordered table-striped"  width="100%">
								  <thead>
									 <tr >
										  <th>Tipo</th>
										  <th>Denominación</th>
										  <th>Fecha inicio</th>
										  <th>Fecha final</th>
										<th>Clasificación</th>
										<th>Solución no identificada</th> 
									  
			 
									 <th>Opciones</th>
																</tr>
														  </thead>
														  <tbody>
								  <?php if($innovaciones->result() == null) {
									 echo "<tr><td colspan='7'><center>No existen innovaciones asociadas a este miembro...</center></td></tr>";
								  }?>
								  <?php  foreach ($innovaciones->result() as $innov) { ?>
									 <tr id="tabla_innovaciones">
									 <td><?php echo $innov->tipo; ?></td>
									 <td><?php echo $innov->denominacion; ?></td>
									 
									 <td><?php echo strftime("%d %B, %Y", strtotime($innov->fechaInicio)); ?></td>
									 <td><?php echo strftime("%d %B, %Y", strtotime($innov->fechaFin)); ?>
									  </td>
									 <td><?php echo $innov->clasificacion; ?></td>
									 <td><?php echo $innov->solucionNoIdent; ?></td>
									 <td class="text-center">
									 <?php $flag = True; $message = 1; $type = True; ?>
										
										<?php  if($this->session->userdata('logged_in')==True) { ?>
										
										  <a href="<?php  echo base_url()."index.php/controller/v_e_InnovacionM/".$d->ci.'/'.$innov->idinnovacion; ?>"  title="Editar" >
										  <button type='button' class='btn btn-sm bg-olive' title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
										  </a>
										  <a href="<?php echo base_url()."index.php/controller/delInnovacionM/".$innov->idinnovacion.'/'.$d->ci; ?>" title="Eliminar">
										  <button onclick="return confirmInnovaciones()"  type='button' class='btn btn-sm bg-red delRespresentante' title="Eliminar" ><i class='fas fa-trash' > </i> Eliminar</button>
										  </a >
										<?php } ?>
										<?php  if($this->session->userdata('logged_in')==False) { ?>
										
										  <a href="#"  title="Editar" >
										  <button type='button' class='btn btn-sm bg-olive' disabled title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
										  </a>
										  <a href="#" title="Eliminar">
										  <button onclick="return confirmInnovaciones()" disabled type='button' class='btn btn-sm bg-red delRespresentante' title="Eliminar" ><i class='fas fa-trash' > </i> Eliminar</button>
										  </a >
										<?php } ?>
									 </td> 
									 </tr>
								  <?php } ?>  
														  </tbody>
														  <tfoot style="height: 18px; background-color:#6c757d;color: #6c757d; ">
											<tr>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<td></td>
											</tr>
										  </tfoot>
								</table>
							 </div>

							 </div>
						  </div>
						</div>

						<div class="tab-pane <?php if($pag == "organizaciones"){ echo "active";} ?>" id="organizaciones">
						  <div class="card">
							 <div class="card-header text-white" style=" background: linear-gradient(to right, #1e88e5, #66bb6a);"><i class="nav-icon fas fa-users mr-1"></i>Organizaciones</div>
							 <div class="card-body" id="cardorganizaciones">
							 <?php
										  if ($this->session->userdata('logged_in')==True) { $controlador = 1; ?>
										  <div class='col-1'>
											 <a href="<?php  echo base_url()."index.php/controller/v_i_OrganizacionM/".$d->ci; ?>" style='margin-left: 20px;'> 
												<button type='button' class='btn btn-info btn-sm'><i class='fas fa-plus'></i> Insertar</button>
											 </a>
										  </div>  
										<?php	} ?>
								  <br>
								  <br>
								<div class="table table-responsive">
								<table id="ltsorganizaciones" class="table table-bordered table-striped"  width="100%">
								  <thead>
									 <tr >
										  <th>Nombre </th>
										  <th>Cargo</th>
									  
			 
									 <th>Opciones</th>
																</tr>
														  </thead>
														  <tbody>
								  <?php if($organiz->result() == null) {
									 echo "<tr><td colspan='3'><center>No existen asociaciones asociadas a este miembro...</center></td></tr>";
								  }?>
								  <?php  foreach ($organiz->result() as $org) { ?>
									 <tr id="tabla_organizaciones">
									 <td><?php echo $org->nombreOM; ?></td>
									 <td><?php echo $org->cargo; ?></td>
									 <td class="text-center">
									 <?php $flag = True; $message = 1; $type = True; ?>
										
										<?php  if($this->session->userdata('logged_in')==True) { ?>
										
										  <a href="<?php echo base_url()."index.php/controller/v_e_OrganizacionM/".$d->ci.'/'.$org->idorganizacionesMasa; ?>"  title="Editar" >
										  <button type='button' class='btn btn-sm bg-olive' title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
										  </a>
										  <a href="<?php echo base_url()."index.php/controller/delOrganizacionM/".$d->ci.'/'.$org->idorganizacionesMasa; ?>" title="Eliminar">
										  <button onclick="return confirmOrganizaciones()"  type='button' class='btn btn-sm bg-red delRespresentante' title="Eliminar" ><i class='fas fa-trash' > </i> Eliminar</button>
										  </a >
										<?php } ?>
										<?php  if($this->session->userdata('logged_in')==False) { ?>
										
										  <a href="#"  title="Editar" >
										  <button type='button' class='btn btn-sm bg-olive' disabled title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
										  </a>
										  <a href="#" title="Eliminar">
										  <button onclick="return confirmOrganizaciones()" disabled type='button' class='btn btn-sm bg-red delRespresentante' title="Eliminar" ><i class='fas fa-trash' > </i> Eliminar</button>
										  </a >
										<?php } ?>
									 </td> 
									 </tr>
								  <?php } ?>  
														  </tbody>
														  <tfoot style="height: 18px; background-color:#6c757d;color: #6c757d; ">
											<tr>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<td></td>
											</tr>
									  	</tfoot>
								</table>
							 </div>
							 </div>
						  </div>
						  <div class="card">
							 <div class="card-header text-white" style=" background: linear-gradient(to right, #1e88e5, #66bb6a);"><i class="nav-icon fas fa-users mr-1"></i>Asociaciones profesionales</div>
							 <div class="card-body"  id="cardasociaciones">
							 <?php
										  if ($this->session->userdata('logged_in')==True) { $controlador = 1; ?>
										  <div class='col-1'>
											 <a href="<?php echo base_url()."index.php/controller/v_i_AsociacionM/".$d->ci; ?>" style='margin-left: 20px;'> 
												<button type='button' class='btn btn-info btn-sm'><i class='fas fa-plus'></i> Insertar</button>
											 </a>
										  </div>  
										<?php	} ?>
								  <br>
								  <br>
								<div class="table table-responsive">
								<table id="ltsasociaciones" class="table table-bordered table-striped"  width="100%">
								  <thead>
									 <tr >
										  <th>Nivel </th>
										  <th>Cargo</th>
									  
			 
									 <th>Opciones</th>
																</tr>
														  </thead>
														  <tbody>
								  <?php if($asociac->result() == null) {
									 echo "<tr><td colspan='3'><center>No existen asociaciones asociadas a este miembro...</center></td></tr>";
								  }?>
								  <?php  foreach ($asociac->result() as $asoc) { ?>
									 <tr id="tabla_asociaciones">
									 <td><?php echo $asoc->nivel; ?></td>
									 <td><?php echo $asoc->cargo; ?></td>
									 <td class="text-center">
									 <?php $flag = True; $message = 1; $type = True; ?>
										
										<?php  if($this->session->userdata('logged_in')==True) { ?>
										
										  <a href="<?php echo base_url()."index.php/controller/v_e_AsociacionM/".$d->ci.'/'.$asoc->idasociacionProfesional; ?>"  title="Editar" >
										  <button type='button' class='btn btn-sm bg-olive' title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
										  </a>
										  <a href="<?php echo base_url()."index.php/controller/delAsociacionM/".$d->ci.'/'.$asoc->idasociacionProfesional; ?>" title="Eliminar">
										  <button onclick="return confirmAsociaciones()"  type='button' class='btn btn-sm bg-red delRespresentante' title="Eliminar" ><i class='fas fa-trash' > </i> Eliminar</button>
										  </a >
										<?php } ?>
										<?php  if($this->session->userdata('logged_in')==False) { ?>
										
										  <a href="#"  title="Editar" >
										  <button type='button' class='btn btn-sm bg-olive' disabled title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
										  </a>
										  <a href="#" title="Eliminar">
										  <button onclick="return confirmAsociaciones()" disabled type='button' class='btn btn-sm bg-red delRespresentante' title="Eliminar" ><i class='fas fa-trash' > </i> Eliminar</button>
										  </a >
										<?php } ?>
									 </td> 
									 </tr>
								  <?php } ?>  
														  </tbody>
														  <tfoot style="height: 18px; background-color:#6c757d;color: #6c757d; ">
											<tr>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<td></td>
											</tr>
										  </tfoot>
								</table>
							 </div>
							 </div>
						  </div>
						</div>

						<div class="tab-pane <?php if($pag == "potencial"){ echo "active";} ?>" id="potencial">
						  <div class="card">
							 <div class="card-header text-white" style=" background: linear-gradient(to right, #1e88e5, #66bb6a);"><i class="nav-icon fas fa-tags mr-1"></i>Categoría docente</div>
							 <div class="card-body">
							 <?php
										  if ($this->session->userdata('logged_in')==True) { $controlador = 1; ?>
										  <div class='col-1'>
											 <a href="<?php echo base_url()."index.php/controller/v_i_CatDocenteM/".$d->ci; ?>" style='margin-left: 20px;'> 
												<button type='button' class='btn btn-info btn-sm'><i class='fas fa-plus'></i> Insertar</button>
											 </a>
										  </div>  
										<?php	} ?>
								  <br>
								  <br>
								<div class="table table-responsive">
								<table id="ltscatdocentepdf" class="table table-bordered table-striped"  width="100%">
								  <thead>
									 <tr >
										  <th>Tipo</th>
										  <th>Fecha</th>
										  <th>Asignatura</th>
										<th>Curso</th>
										<th>Horas clases</th> 
									  
			 
									 <th>Opciones</th>
																</tr>
														  </thead>
														  <tbody>
								  <?php if($catdocente->result() == null) {
									 echo "<tr><td colspan='6'><center>No existen categorías docentes asociadas a este miembro...</center></td></tr>";
								  }?>
								  <?php  foreach ($catdocente->result() as $cdoc) { ?>
									 <tr id="tabla_innovaciones">
									 <td><?php echo $cdoc->tipo; ?></td>
									 <td><?php echo strftime("%d %B, %Y", strtotime($cdoc->fecha)); ?></td>
									 <td><?php echo $cdoc->asignatura; ?></td>
									 <td><?php echo $cdoc->curso; ?></td>
									 <td><?php echo $cdoc->horasClases; ?></td>
									 <td class="text-center">
									 <?php $flag = True; $message = 1; $type = True; ?>
										
										<?php  if($this->session->userdata('logged_in')==True) { ?>
										
										  <a href="<?php echo base_url()."index.php/controller/v_e_CatDocenteM/".$d->ci.'/'.$cdoc->idcategoriaDocente; ?>"  title="Editar" >
										  <button type='button' class='btn btn-sm bg-olive' title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
										  </a>
										  <a href="<?php echo base_url()."index.php/controller/delCatDocenteM/".$d->ci.'/'.$cdoc->idcategoriaDocente; ?>" title="Eliminar">
										  <button onclick="return confirmCatDocente()"  type='button' class='btn btn-sm bg-red delRespresentante' title="Eliminar" ><i class='fas fa-trash' > </i> Eliminar</button>
										  </a >
										<?php } ?>
										<?php  if($this->session->userdata('logged_in')==false) { ?>
										
										  <a href="#"  title="Editar" >
										  <button type='button' class='btn btn-sm bg-olive' disabled title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
										  </a>
										  <a href="#" title="Eliminar">
										  <button onclick="return confirmCatDocente()" disabled type='button' class='btn btn-sm bg-red delRespresentante' title="Eliminar" ><i class='fas fa-trash' > </i> Eliminar</button>
										  </a >
										<?php } ?>
									 </td> 
									 </tr>
								  <?php } ?>  
														  </tbody>
														  <tfoot style="height: 18px; background-color:#6c757d;color: #6c757d; ">
											<tr>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<td></td>
											</tr>
										  </tfoot>
								</table>
							 </div>
							 </div>
						  </div>
						  <div class="card">
							 <div class="card-header text-white" style=" background: linear-gradient(to right, #1e88e5, #66bb6a);"><i class="nav-icon fas fa-tags mr-1"></i>Categoría científica</div>
							 <div class="card-body">
							 <?php
										  if ($this->session->userdata('logged_in')==True) { $controlador = 1; ?>
										  <div class='col-1'>
											 <a href="<?php echo base_url()."index.php/controller/v_i_CatCientificaM/".$d->ci; ?>" style='margin-left: 20px;'> 
												<button type='button' class='btn btn-info btn-sm'><i class='fas fa-plus'></i> Insertar</button>
											 </a>
										  </div>  
										<?php	} ?>
								  <br>
								  <br>
								<div class="table table-responsive">
								<table id="ltscatcientifica" class="table table-bordered table-striped"  width="100%">
								  <thead>
									 <tr >
										  <th>Tipo</th>
										  <th>Fecha</th>
									  
			 
									 <th>Opciones</th>
																</tr>
														  </thead>
														  <tbody>
								  <?php if($catcientifica->result() == null) {
									 echo "<tr><td colspan='3'><center>No existen categorías científicas asociadas a este miembro...</center></td></tr>";
								  }?>
								  <?php  foreach ($catcientifica->result() as $ccient) { ?>
									 <tr id="tabla_innovaciones">
									 <td><?php echo $ccient->tipo; ?></td>
									 <td><?php echo strftime("%d %B, %Y", strtotime($ccient->fecha)); ?></td>
									 <td class="text-center">
									 <?php $flag = True; $message = 1; $type = True; ?>
										
										<?php  if($this->session->userdata('logged_in')==True) { ?>
										
										  <a href="<?php echo base_url()."index.php/controller/v_e_CatCientificaM/".$d->ci.'/'.$ccient->idcategoriaCientifica; ?>"  title="Editar" >
										  <button type='button' class='btn btn-sm bg-olive' title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
										  </a>
										  <a href="<?php echo base_url()."index.php/controller/delCatCientificaM/".$d->ci.'/'.$ccient->idcategoriaCientifica; ?>" title="Eliminar">
										  <button onclick="return confirmCatCientificas()"  type='button' class='btn btn-sm bg-red delRespresentante' title="Eliminar" ><i class='fas fa-trash' > </i> Eliminar</button>
										  </a >
										<?php } ?>
										<?php  if($this->session->userdata('logged_in')==false) { ?>
										
										  <a href="#"  title="Editar" >
										  <button type='button' class='btn btn-sm bg-olive' disabled title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
										  </a>
										  <a href="#" title="Eliminar">
										  <button onclick="return confirmCatCientificas()" disabled type='button' class='btn btn-sm bg-red delRespresentante' title="Eliminar" ><i class='fas fa-trash' > </i> Eliminar</button>
										  </a >
										<?php } ?>
									 </td> 
									 </tr>
								  <?php } ?>  
														  </tbody>
														  <tfoot style="height: 18px; background-color:#6c757d;color: #6c757d; ">
											<tr>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<td></td>
											</tr>
										  </tfoot>
								</table>
							 </div>
							 </div>
						  </div>
						  <div class="card">
							 <div class="card-header text-white" style=" background: linear-gradient(to right, #1e88e5, #66bb6a);"><i class="nav-icon fas fa-chalkboard-teacher mr-1"></i>Cursos de entrenamiento</div>
							 <div class="card-body">
							 <?php
										  if ($this->session->userdata('logged_in')==True) { $controlador = 1; ?>
										  <div class='col-1'>
											 <a href="<?php echo base_url()."index.php/controller/v_i_CursoEntM/".$d->ci; ?>" style='margin-left: 20px;'> 
												<button type='button' class='btn btn-info btn-sm'><i class='fas fa-plus'></i> Insertar</button>
											 </a>
										  </div>  
										<?php	} ?>
								  <br>
								  <br>
								<div class="table table-responsive">
								<table id="ltscursoentrenamiento" class="table table-bordered table-striped"  width="100%">
								  <thead>
									 <tr >
										  <th>Tipo</th>
										  <th>Denomicación</th>
										  <th>Centro estudio</th>
										  <th>Fecha</th>
										  <th>Cant. Horas</th>
										  <th>Califiación</th>
									  
			 
									 <th>Opciones</th>
																</tr>
														  </thead>
														  <tbody>
								  <?php if($cursoentrenamiento->result() == null) {
									 echo "<tr><td colspan='6'><center>No existen cursos de entrenamientos asociados a este miembro...</center></td></tr>";
								  }?>
								  <?php  foreach ($cursoentrenamiento->result() as $curso) { ?>
									 <tr id="tabla_innovaciones">
									 <td><?php echo $curso->tipo; ?></td>
									 <td><?php echo $curso->denimicacion; ?></td>
									 <td><?php echo $curso->centroEstudio; ?></td>
									 <td><?php echo strftime("%d %B, %Y", strtotime($curso->fecha)); ?></td>
									 <td><?php echo $curso->cantHoras; ?></td>
									 <td><?php echo $curso->califiacion; ?></td>
									 <td class="text-center">
									 <?php $flag = True; $message = 1; $type = True; ?>
										
										<?php  if($this->session->userdata('logged_in')==True) { ?>
										
										  <a href="<?php echo base_url()."index.php/controller/v_e_CursoEntM/".$d->ci.'/'.$curso->idcurso; ?>"  title="Editar" >
										  <button type='button' class='btn btn-sm bg-olive' title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
										  </a>
										  <a href="<?php echo base_url()."index.php/controller/delCursoEntM/".$d->ci.'/'.$curso->idcurso; ?>" title="Eliminar">
										  <button onclick="return confirmCurso()"  type='button' class='btn btn-sm bg-red delRespresentante' title="Eliminar" ><i class='fas fa-trash' > </i> Eliminar</button>
										  </a >
										<?php } ?>
										<?php  if($this->session->userdata('logged_in')==False) { ?>
										
										  <a href="#"  title="Editar" >
										  <button type='button' disabled class='btn btn-sm bg-olive' title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
										  </a>
										  <a href="#" title="Eliminar">
										  <button onclick="return confirmCurso()" disabled type='button' class='btn btn-sm bg-red delRespresentante' title="Eliminar" ><i class='fas fa-trash' > </i> Eliminar</button>
										  </a >
										<?php } ?>
									 </td> 
									 </tr>
								  <?php } ?>  
														  </tbody>
														  <tfoot style="height: 18px; background-color:#6c757d;color: #6c757d; ">
											<tr>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<td></td>
											</tr>
										  </tfoot>
								</table>
							 </div>
							 </div>
						  </div>
						  <div class="card">
							 <div class="card-header text-white" style=" background: linear-gradient(to right, #1e88e5, #66bb6a);"><i class="nav-icon fas fa-user-graduate mr-1"></i>Postgrados</div>
							 <div class="card-body">
							 <?php
										  if ($this->session->userdata('logged_in')==True) { $controlador = 1; ?>
										  <div class='col-1'>
											 <a href="<?php echo base_url()."index.php/controller/v_i_PostgradoM/".$d->ci; ?>" style='margin-left: 20px;'> 
												<button type='button' class='btn btn-info btn-sm'><i class='fas fa-plus'></i> Insertar</button>
											 </a>
										  </div>  
										<?php	} ?>
								  <br>
								  <br>
								<div class="table table-responsive">
								<table id="ltspostgrados" class="table table-bordered table-striped"  width="100%">
								  <thead>
									 <tr >
										  <th>Tipo</th>
										  <th>Denominación</th>
										  <th>Fecha</th>
										  <th>Cant. horas</th>
										  <th>Centro referencia</th>
										  <th>Calificación</th>
									  
			 
									 <th>Opciones</th>
																</tr>
														  </thead>
														  <tbody>
								  <?php if($postgrados->result() == null) {
									 echo "<tr><td colspan='7'><center>No existen postgrados asociados a este miembro...</center></td></tr>";
								  }?>
								  <?php  foreach ($postgrados->result() as $post) { ?>
									 <tr id="tabla_innovaciones">
									 <td><?php echo $post->tipo; ?></td>
									 <td><?php echo $post->denominacion; ?></td>
									 <td><?php echo strftime("%d %B, %Y", strtotime($post->fecha)); ?></td>
									 <td><?php echo $post->cantHoras; ?></td>
									 <td><?php echo $post->centroReferencia; ?></td>
									 <td><?php echo $post->calificacion; ?></td>
									 <td class="text-center">
									 <?php $flag = True; $message = 1; $type = True; ?>
										
										<?php  if($this->session->userdata('logged_in')==True) { ?>
										
										  <a href="<?php echo base_url()."index.php/controller/v_e_PostgradoM/".$d->ci.'/'.$post->idpostgrado; ?>"  title="Editar" >
										  <button type='button' class='btn btn-sm bg-olive' title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
										  </a>
										  <a href="<?php echo base_url()."index.php/controller/delPostgradoM/".$d->ci.'/'.$post->idpostgrado; ?>" title="Eliminar">
										  <button onclick="return confirmPostgrados()"  type='button' class='btn btn-sm bg-red delRespresentante' title="Eliminar" ><i class='fas fa-trash' > </i> Eliminar</button>
										  </a >
										<?php } ?>
										<?php  if($this->session->userdata('logged_in')==False) { ?>
										
										  <a href="#"  title="Editar" >
										  <button type='button' class='btn btn-sm bg-olive'  disabled title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
										  </a>
										  <a href="#" title="Eliminar">
										  <button onclick="return confirmPostgrados()" disabled type='button' class='btn btn-sm bg-red delRespresentante' title="Eliminar" ><i class='fas fa-trash' > </i> Eliminar</button>
										  </a >
										<?php } ?>
									 </td> 
									 </tr>
								  <?php } ?>  
														  </tbody>
														  <tfoot style="height: 18px; background-color:#6c757d;color: #6c757d; ">
											<tr>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<td></td>
											</tr>
										  </tfoot>
								</table>
							 </div>
							 </div>
						  </div>
						  <div class="card">
							 <div class="card-header text-white" style=" background: linear-gradient(to right, #1e88e5, #66bb6a);"><i class="nav-icon fas fa-graduation-cap mr-1"></i>Títulos académicos</div>
							 <div class="card-body">
							 <?php
										  if ($this->session->userdata('logged_in')==True) { $controlador = 1; ?>
										  <div class='col-1'>
											 <a href="<?php echo base_url()."index.php/controller/v_i_TituloAcademicoM/".$d->ci; ?>" style='margin-left: 20px;'> 
												<button type='button' class='btn btn-info btn-sm'><i class='fas fa-plus'></i> Insertar</button>
											 </a>
										  </div>  
										<?php	} ?>
								  <br>
								  <br>
								<div class="table table-responsive">
								<table id="ltstituloacademico" class="table table-bordered table-striped"  width="100%">
								  <thead>
									 <tr >
										  <th>Tipo</th>
										  <th>Denominación</th>
										  <th>Libro</th>
										  <th>Tomo</th>
										  <th>Folio</th>
										  <th>Fecha</th>
										  <th>Centro de referencia</th>
										  <th>Centro de estudio</th>
										  <th>Carrera</th>
										  <th>Cantidad horas</th>
										  <th>Calificación</th>
									 <th>Opciones</th>
																</tr>
														  </thead>
														  <tbody>
								  <?php if($tituloacademico->result() == null) {
									 echo "<tr><td colspan='12'><center>No existen títulos académicos asociados a este miembro...</center></td></tr>";
								  }?>
								  <?php  foreach ($tituloacademico->result() as $titulo) { ?>
									 <tr id="tabla_innovaciones">
									 <td><?php echo $titulo->tipo; ?></td>
									 <td><?php echo $titulo->denominacion; ?></td>
									 <td><?php echo $titulo->libro; ?></td>
									 <td><?php echo $titulo->tomo; ?></td>
									 <td><?php echo $titulo->folio; ?></td>
									 <td><?php echo $titulo->fecha; ?></td>
									 <td><?php echo $titulo->centroReferencia; ?></td>
									 <td><?php echo $titulo->centroEstudio; ?></td>
									 <td><?php echo $titulo->carrera; ?></td>
									 <td><?php echo $titulo->cantHoras; ?></td>
									 <td><?php echo $titulo->calificacion; ?></td>
									 <td class="text-center">
									 <?php $flag = True; $message = 1; $type = True; ?>
										
										<?php  if($this->session->userdata('logged_in')==True) { ?>
										
										  <a href="<?php echo base_url()."index.php/controller/v_e_TituloAcademicoM/".$d->ci.'/'.$titulo->idtituloAcademico; ?>"  title="Editar" >
										  <button type='button' class='btn btn-sm bg-olive' title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
										  </a>
										  <a href="<?php echo base_url()."index.php/controller/delTituloAcademicoM/".$d->ci.'/'.$titulo->idtituloAcademico; ?>" title="Eliminar">
										  <button onclick="return confirmTituloAcademico()"  type='button' class='btn btn-sm bg-red delRespresentante' title="Eliminar" ><i class='fas fa-trash' > </i> Eliminar</button>
										  </a >
										<?php } ?>
										<?php  if($this->session->userdata('logged_in')==False) { ?>
										
										<a href="#"  title="Editar" >
										<button type='button' class='btn btn-sm bg-olive'  disabled title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
										</a>
										<a href="#" title="Eliminar">
										<button onclick="return confirmPostgrados()" disabled type='button' class='btn btn-sm bg-red delRespresentante' title="Eliminar" ><i class='fas fa-trash' > </i> Eliminar</button>
										</a >
									 <?php } ?>
									 </td> 
									 </tr>
								  <?php } ?>  
														  </tbody>
														  <tfoot style="height: 18px; background-color:#6c757d;color: #6c757d; ">
											<tr>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<td></td>
											</tr>
										  </tfoot>
								</table>
							 </div>
							 </div>
						  </div>
						  <div class="card">
							 <div class="card-header text-white" style=" background: linear-gradient(to right, #1e88e5, #66bb6a);"><i class="nav-icon fas fa-graduation-cap mr-1"></i>Grado científico</div>
							 <div class="card-body">
							 <?php
										  if ($this->session->userdata('logged_in')==True) { $controlador = 1; ?>
										  <div class='col-1'>
											 <a href="<?php echo base_url()."index.php/controller/v_i_GradoCientificoM/".$d->ci; ?>" style='margin-left: 20px;'> 
												<button type='button' class='btn btn-info btn-sm'><i class='fas fa-plus'></i> Insertar</button>
											 </a>
										  </div>  
										<?php	} ?>
								  <br>
								  <br>
								<div class="table table-responsive">
								<table id="ltstituloacademico" class="table table-bordered table-striped"  width="100%">
								  <thead>
									 <tr >
										  <th>Tipo</th>
										  <th>Denominación</th>
										  <th>Fecha</th>
										  <th>Centro de referencia</th>
										  <th>Cantidad horas</th>
										  <th>Calificación</th>
									 <th>Opciones</th>
																</tr>
														  </thead>
														  <tbody>
								  <?php if($gradocient->result() == null) {
									 echo "<tr><td colspan='7'><center>No existen grados científicos asociados a este miembro...</center></td></tr>";
								  }?>
								  <?php  foreach ($gradocient->result() as $titulo) { ?>
									 <tr id="tabla_innovaciones">
									 <td><?php echo $titulo->tipo; ?></td>
									 <td><?php echo $titulo->denominacion; ?></td>
									 
									 <td><?php echo $titulo->fecha; ?></td>
									 <td><?php echo $titulo->centroReferencia; ?></td>
									 <td><?php echo $titulo->cantH; ?></td>
									 <td><?php echo $titulo->calificacion; ?></td>
									 <td class="text-center">
									 <?php $flag = True; $message = 1; $type = True; ?>
										
										<?php  if($this->session->userdata('logged_in')==True) { ?>
										
										  <a href="<?php echo base_url()."index.php/controller/v_e_GradoCientificoM/".$d->ci.'/'.$titulo->id; ?>"  title="Editar" >
										  <button type='button' class='btn btn-sm bg-olive' title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
										  </a>
										  <a href="<?php echo base_url()."index.php/controller/delGradoCientificoM/".$d->ci.'/'.$titulo->id; ?>" title="Eliminar">
										  <button onclick="return confirmGradoCientifico()"  type='button' class='btn btn-sm bg-red delRespresentante' title="Eliminar" ><i class='fas fa-trash' > </i> Eliminar</button>
										  </a >
										<?php } ?>
										<?php  if($this->session->userdata('logged_in')==False) { ?>
										
										<a href="#"  title="Editar" >
										<button type='button' class='btn btn-sm bg-olive'  disabled title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
										</a>
										<a href="#" title="Eliminar">
										<button disabled type='button' class='btn btn-sm bg-red delRespresentante' title="Eliminar" ><i class='fas fa-trash' > </i> Eliminar</button>
										</a >
									 <?php } ?>
									 </td> 
									 </tr>
								  <?php } ?>  
														  </tbody>
														  <tfoot style="height: 18px; background-color:#6c757d;color: #6c757d; ">
											<tr>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<td></td>
											</tr>
										  </tfoot>
								</table>
							 </div>
							 </div>
						  </div>
						</div>

						<div class="tab-pane <?php if($pag == "publicaciones"){ echo "active";} ?>" id="publicaciones">
						<div class="card">
							 <div class="card-header text-white" style=" background: linear-gradient(to right, #1e88e5, #66bb6a);"><i class="nav-icon fas fa-newspaper mr-1"></i>Publicaciones</div>
							 <div class="card-body">
							 <?php
														if ($this->session->userdata('logged_in')==True) { $controlador = 1; ?>
														<div class='col-1'>
															<a href="<?php echo base_url()."index.php/controller/v_i_PublicacionM/".$d->ci; ?>" style='margin-left: 20px;'> 
																<button type='button' class='btn btn-info btn-sm'><i class='fas fa-plus'></i> Insertar</button>
															</a>
														</div>  
													<?php	} ?>
							 <br>
							 <br>
						  <div class="table table-responsive">
						  <table id="ltspublicaciones" class="table table-bordered table-striped"  width="100%">
							 <thead>
								<tr >
									 
									
									 <th>Título</th>
								  <th>Nivel</th>
								  <th>URL</th>
								  <th>ISBN/ISSN</th>
								  <th>Tipo publicación</th>
								  <th>Fecha</th>
								 
		
												<th>Opciones</th>
														  </tr>
													 </thead>
													 <tbody>
							 <?php if($publicaciones->result() == null) {
								echo "<tr><td colspan='8'><center>No existen publicaciones asociadas a este miembro...</center></td></tr>";
							 }?>
							 <?php  foreach ($publicaciones->result() as $publ) { ?>
												<tr id="tabla_tesis">
												<td><?php echo $publ->titulo; ?></td>
												<td><?php echo $publ->nivel; ?></td>
												<td><?php echo $publ->url; ?></td>
												<td><?php echo $publ->isbnISSN; ?></td>
												<td><?php echo $publ->tipoPublicacion; ?></td>
												<td><?php echo strftime("%d %B, %Y", strtotime($publ->fecha)) ; ?></td>
												
												<td class="text-center">
												<?php $flag = True; $message = 1; $type = True; ?>
													
													<?php  if($this->session->userdata('logged_in')==True) { ?>
														<a href="<?php echo base_url()."index.php/controller/v_e_PublicacionM/".$d->ci.'/'.$publ->idpublicaciones ; ?>"  title="Editar" >
														<button type='button' class='btn btn-sm bg-olive' title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
														</a>
														<a href="<?php echo base_url()."index.php/controller/delPublicacionM/".$d->ci.'/'.$publ->idpublicaciones; ?>" title="Eliminar">
														<button onclick="return confirPublicacion()"  type='button' class='btn btn-sm bg-red delRespresentante' title="Eliminar" ><i class='fas fa-trash' > </i> Eliminar</button>
														</a >
													<?php } ?>
								  <?php  if($this->session->userdata('logged_in')==False) { ?>
										<a href="#"  title="Editar" >
										<button type='button' class='btn btn-sm bg-olive'  disabled title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
										</a>
										<a href="#" title="Eliminar">
										<button onclick="return confirmPostgrados()" disabled type='button' class='btn btn-sm bg-red delRespresentante' title="Eliminar" ><i class='fas fa-trash' > </i> Eliminar</button>
										</a >
									 		<?php } ?>
												</td> 
												</tr>
											<?php } ?>  
										</tbody>
										<tfoot style="height: 18px; background-color:#6c757d;color: #6c757d; ">
											<tr>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<td></td>
												
											</tr>
										</tfoot>
									  </table>
						  </div>
							 </div>
						  </div>
						</div>

						<div class="tab-pane <?php if($pag == "proyectos"){ echo "active";} ?>" id="proyectos">
						<div class="card">
							 <div class="card-header text-white" style=" background: linear-gradient(to right, #1e88e5, #66bb6a);"><i class="nav-icon fas fa-puzzle-piece mr-1"></i>Proyectos</div>
							 <div class="card-body">
							 <?php
														if ($this->session->userdata('logged_in')==True) { $controlador = 1; ?>
														<div class='col-1'>
															<a href="<?php echo base_url()."index.php/controller/v_i_ProyectoM/".$d->ci; ?>" style='margin-left: 20px;'> 
																<button type='button' class='btn btn-info btn-sm'><i class='fas fa-plus'></i> Insertar</button>
															</a>
														</div>  
													<?php	} ?>
							 <br>
							 <br>
						  <div class="table table-responsive">
						  <table id="ltsproyecto" class="table table-bordered table-striped"  width="100%">
							 <thead>
								<tr >
									 
									
									 <th>Denomiciónn</th>
								  <th>Tipo</th>
								  <th>Campo</th>
								  
		
												<th>Opciones</th>
														  </tr>
													 </thead>
													 <tbody>
							 <?php if($proyecto->result() == null) {
								echo "<tr><td colspan='5'><center>No existen proyectos asociados a este miembro...</center></td></tr>";
							 }?>
							 <?php  foreach ($proyecto->result() as $pro) { ?>
												<tr id="tabla_tesis">
												<td><?php echo $pro->denomicacion; ?></td>
												<td><?php echo $pro->tipoProyecto; ?></td>
												<td><?php echo $pro->tipoTProyecto; ?></td>
												
												<td class="text-center">
												<?php $flag = True; $message = 1; $type = True; ?>
													
													<?php  if($this->session->userdata('logged_in')==True) { ?>
														
														<a href="<?php echo base_url()."index.php/controller/v_e_ProyectoM/".$d->ci.'/'.$pro->idproyecto; ?>"  title="Editar" >
														<button type='button' class='btn btn-sm bg-olive' title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
														</a>
														<a href="<?php echo base_url()."index.php/controller/delProyectoM/".$d->ci.'/'.$pro->idproyecto; ?>" title="Eliminar">
														<button onclick="return confirProyectos()"  type='button' class='btn btn-sm bg-red delRespresentante' title="Eliminar" ><i class='fas fa-trash' > </i> Eliminar</button>
														</a >
													<?php } ?>
								  <?php  if($this->session->userdata('logged_in')==False) { ?>
														
										<a href="#"  title="Editar" >
										<button type='button' class='btn btn-sm bg-olive'  disabled title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
										</a>
										<a href="#" title="Eliminar">
										<button onclick="return confirmPostgrados()" disabled type='button' class='btn btn-sm bg-red delRespresentante' title="Eliminar" ><i class='fas fa-trash' > </i> Eliminar</button>
										</a >
									 <?php } ?>
												</td> 
												</tr>
											<?php } ?>  
													 </tbody>
													 <tfoot style="height: 18px; background-color:#6c757d;color: #6c757d; ">
											<tr>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<td></td>
												
											</tr>
										</tfoot>
									  </table>
						  </div>
							 </div>
						  </div>
						</div>

						<div class="tab-pane <?php if($pag == "idiomas"){ echo "active";} ?>" id="idiomas">
						<div class="card" >
							 <div class="card-header text-white" style=" background: linear-gradient(to right, #1e88e5, #66bb6a);"><i class="nav-icon fas fa-language mr-1"></i>Idiomas</div>
							 <div class="card-body" id="cardidioma">
							 <?php
										  if ($this->session->userdata('logged_in')==True) { $controlador = 1; ?>
										  <div class='col-1'>
											 <a href="<?php echo base_url()."index.php/controller/v_i_IdiomaM/".$d->ci; ?>" style='margin-left: 20px;'> 
												<button type='button' class='btn btn-info btn-sm'><i class='fas fa-plus'></i> Insertar</button>
											 </a>
										  </div>  
										<?php	} ?>
								  <br>
								  <br>
								<div class="table table-responsive">
								<table id="ltsidiomas" class="table table-bordered table-striped"  width="100%">
								  <thead>
									 <tr >
										  <th>Idioma </th>
										  <th>Calif. Habla</th>
										  <th>Calif. Lee</th>
										  <th>Calif. Escribe</th>
									  
			 
									 <th>Opciones</th>
																</tr>
														  </thead>
														  <tbody>
								  <?php if($idi->result() == null) {
									 echo "<tr><td colspan='5'><center>No existen idiomas asociados a este miembro...</center></td></tr>";
								  }?>
								  <?php  foreach ($idi->result() as $idiom) { ?>
									 <tr id="tabla_idiomas">
									 <td><?php echo $idiom->nombre; ?></td>
									 <td><?php echo $idiom->calficHabla; ?></td>
									 <td><?php echo $idiom->califLee; ?></td>
									 <td><?php echo $idiom->califEscribe; ?></td>
									 <td class="text-center">
									 <?php $flag = True; $message = 1; $type = True; ?>
										
										<?php  if($this->session->userdata('logged_in')==True) { ?>
										
										  <a href="<?php echo base_url()."index.php/controller/v_e_IdiomaM/".$d->ci.'/'.$idiom->ididioma; ?>"  title="Editar" >
										  <button type='button' class='btn btn-sm bg-olive' title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
										  </a>
										  <a href="<?php echo base_url()."index.php/controller/delIdiomaM/".$d->ci.'/'.$idiom->ididioma; ?>" title="Eliminar">
										  <button onclick="return confirmIdioma()"  type='button' class='btn btn-sm bg-red delRespresentante' title="Eliminar" ><i class='fas fa-trash' > </i> Eliminar</button>
										  </a >
										<?php } ?>
										<?php  if($this->session->userdata('logged_in')==False) { ?>
										
										<a href="#"  title="Editar" >
										<button type='button' class='btn btn-sm bg-olive'  disabled title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
										</a>
										<a href="#" title="Eliminar">
										<button onclick="return confirmPostgrados()" disabled type='button' class='btn btn-sm bg-red delRespresentante' title="Eliminar" ><i class='fas fa-trash' > </i> Eliminar</button>
										</a >
									 <?php } ?>
									 </td> 
									 </tr>
								  <?php } ?>  
														  </tbody>
														  <tfoot style="height: 18px; background-color:#6c757d;color: #6c757d; ">
											<tr>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<td></td>
											</tr>
										</tfoot>
								</table>
							 </div>
							 </div>
						  </div>
						</div>

						<div class="tab-pane <?php if($pag == "colaboraciones"){ echo "active";} ?>" id="colaboraciones">
						<div class="card">
							 <div class="card-header text-white" style=" background: linear-gradient(to right, #1e88e5, #66bb6a);"><i class="nav-icon fas fa-hands-helping mr-1"></i>Colaboraciones</div>
							 <div class="card-body" id="cardcolaboraciones">
							 <?php
														if ($this->session->userdata('logged_in')==True) { $controlador = 1; ?>
														<div class='col-1'>
															<a href="<?php echo base_url()."index.php/controller/v_i_ColaboracionM/".$d->ci; ?>" style='margin-left: 20px;'> 
																<button type='button' class='btn btn-info btn-sm'><i class='fas fa-plus'></i> Insertar</button>
															</a>
														</div>  
													<?php	} ?>
							 <br>
							 <br>
						  <div class="table table-responsive">
						  <table id="ltscolaboraciones" class="table table-bordered table-striped"  width="100%">
							 <thead>
								<tr >
									 
									 <th>Tipo</th>
									 <th>Fecha Inicio</th>
								  <th>Fecha Fin</th>
		
												<th>Opciones</th>
														  </tr>
													 </thead>
													 <tbody>
							 <?php if($colabora->result() == null) {
								echo "<tr><td colspan='4'><center>No existen colaboraciones asociadas a este miembro...</center></td></tr>";
							 }?>
							 <?php  foreach ($colabora->result() as $colab) { ?>
												<tr id="tabla_tesis">
												<td><?php echo $colab->tipo; ?></td>
												<td><?php echo strftime("%d %B, %Y", strtotime($colab->fechaInicio)); ?></td>
												<td><?php echo strftime("%d %B, %Y", strtotime($colab->fechaFin)); ?></td>
												<td class="text-center">
												<?php $flag = True; $message = 1; $type = True; ?>
													
													<?php  if($this->session->userdata('logged_in')==True) { ?>
													
														<a href="<?php echo base_url()."index.php/controller/v_e_ColaboracionM/".$d->ci.'/'.$colab->idcolaboracion ; ?>"  title="Editar" >
														<button type='button' class='btn btn-sm bg-olive' title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
														</a>
														<a href="<?php echo base_url()."index.php/controller/delColaboracionM/".$d->ci.'/'.$colab->idcolaboracion ; ?>" title="Eliminar">
														<button onclick="return confirmColaboraciones()"  type='button' class='btn btn-sm bg-red delRespresentante' title="Eliminar" ><i class='fas fa-trash' > </i> Eliminar</button>
														</a >
													<?php } ?>
								  <?php  if($this->session->userdata('logged_in')==False) { ?>
										
										<a href="#"  title="Editar" >
										<button type='button' class='btn btn-sm bg-olive'  disabled title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
										</a>
										<a href="#" title="Eliminar">
										<button onclick="return confirmPostgrados()" disabled type='button' class='btn btn-sm bg-red delRespresentante' title="Eliminar" ><i class='fas fa-trash' > </i> Eliminar</button>
										</a >
									 <?php } ?>
												</td> 
												</tr>
											<?php } ?>  
													 </tbody>
													 <tfoot style="height: 18px; background-color:#6c757d;color: #6c757d; ">
											<tr>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<td></td>
											</tr>
										</tfoot>
									  </table>
						  </div>
							 </div>
						  </div>
						</div>

						<div class="tab-pane <?php if($pag == "asesorias"){ echo "active";} ?>" id="asesorias">
						<div class="card">
							 <div class="card-header text-white" style=" background: linear-gradient(to right, #1e88e5, #66bb6a);"><i class="nav-icon fas fa-user-friends mr-1"></i>Asesorías</div>
							 <div class="card-body" id="cardasesorias">
							 <?php
														if ($this->session->userdata('logged_in')==True) { $controlador = 1; ?>
														<div class='col-1'>
															<a href="<?php echo base_url()."index.php/controller/v_i_AsesoriasM/".$d->ci; ?>" style='margin-left: 20px;'> 
																<button type='button' class='btn btn-info btn-sm'><i class='fas fa-plus'></i> Insertar</button>
															</a>
														</div>  
													<?php	} ?>
							 <br>
							 <br>
						  <div class="table table-responsive">
						  <table id="ltsasesorias" class="table table-bordered table-striped"  width="100%">
							 <thead>
								<tr >
									 
									
									 <th>Nombre trabajo</th>
								  <th>Fecha</th>
		
												<th>Opciones</th>
														  </tr>
													 </thead>
													 <tbody>
							 <?php if($asesor->result() == null) {
								echo "<tr><td colspan='3'><center>No existen asesorías asociadas a este miembro...</center></td></tr>";
							 }?>
							 <?php  foreach ($asesor->result() as $ases) { ?>
												<tr id="tabla_tesis">
												<td><?php echo $ases->nombreTrabajo; ?></td>
												<td><?php echo strftime("%d %B, %Y", strtotime($ases->fehca)); ?></td>
												<td class="text-center">
												<?php $flag = True; $message = 1; $type = True; ?>
													
													<?php  if($this->session->userdata('logged_in')==True) { ?>
													
														<a href="<?php echo base_url()."index.php/controller/v_e_AsesoriasM/".$d->ci.'/'.$ases->idasesorias; ?>"  title="Editar" >
														<button type='button' class='btn btn-sm bg-olive' title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
														</a>
														<a href="<?php echo base_url()."index.php/controller/delAsesoriasM/".$d->ci.'/'.$ases->idasesorias; ?>" title="Eliminar">
														<button onclick="return confirmAsesorias()"  type='button' class='btn btn-sm bg-red delRespresentante' title="Eliminar" ><i class='fas fa-trash' > </i> Eliminar</button>
														</a >
													<?php } ?>
								  <?php  if($this->session->userdata('logged_in')==False) { ?>
										
										<a href="#"  title="Editar" >
										<button type='button' class='btn btn-sm bg-olive'  disabled title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
										</a>
										<a href="#" title="Eliminar">
										<button onclick="return confirmPostgrados()" disabled type='button' class='btn btn-sm bg-red delRespresentante' title="Eliminar" ><i class='fas fa-trash' > </i> Eliminar</button>
										</a >
									 <?php } ?>
												</td> 
												</tr>
											<?php } ?>  
													 </tbody>
													 <tfoot style="height: 18px; background-color:#6c757d;color: #6c757d; ">
											<tr>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<td></td>
											</tr>
										</tfoot>
									  </table>
						  </div>
							 </div>
						  </div>
						</div>

						<div class="tab-pane <?php if($pag == "eventos"){ echo "active";} ?>" id="eventos">
						<div class="card">
							 <div class="card-header text-white" style=" background: linear-gradient(to right, #1e88e5, #66bb6a);"><i class="nav-icon fas fa-calendar-check mr-1"></i>Eventos</div>
							 <div class="card-body" id="cardeventos">
							 <?php
														if ($this->session->userdata('logged_in')==True) { $controlador = 1; ?>
														<div class='col-1'>
															<a href="<?php echo base_url()."index.php/controller/v_i_EventoM/".$d->ci; ?>" style='margin-left: 20px;'> 
																<button type='button' class='btn btn-info btn-sm'><i class='fas fa-plus'></i> Insertar</button>
															</a>
														</div>  
													<?php	} ?>
							 <br>
							 <br>
						  <div class="table table-responsive">
						  <table id="ltseventos" class="table table-bordered table-striped"  width="100%">
							 <thead>
								<tr >
									 
									
									 <th>Tipo de evento</th>
								  <th>Denominación</th>
								  <th>Fecha</th>
								  <th>Lugar</th>
								  <th>Tipo participación</th>
		
												<th>Opciones</th>
														  </tr>
													 </thead>
													 <tbody>
							 <?php if($evento->result() == null) {
								echo "<tr><td colspan='6'><center>No existen eventos asociados a este miembro...</center></td></tr>";
							 }?>
							 <?php  foreach ($evento->result() as $even) { ?>
												<tr id="tabla_tesis">
												<td><?php echo $even->tipoEvento; ?></td>
												<td><?php echo $even->denominacion; ?></td>
												<td><?php echo strftime("%d %B, %Y", strtotime($even->fecha)); ?></td>
												<td><?php echo $even->lugar; ?></td>
												<td><?php echo $even->participacion; ?></td>
												<td class="text-center">
												<?php $flag = True; $message = 1; $type = True; ?>
													
													<?php  if($this->session->userdata('logged_in')==True) { ?>
													
														<a href="<?php echo base_url()."index.php/controller/v_e_EventoM/".$d->ci.'/'.$even->ideventos; ?>"  title="Editar" >
														<button type='button' class='btn btn-sm bg-olive' title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
														</a>
														<a href="<?php echo base_url()."index.php/controller/delEventoM/".$d->ci.'/'.$even->ideventos; ?>" title="Eliminar">
														<button onclick="return confirmEventos()"  type='button' class='btn btn-sm bg-red delRespresentante' title="Eliminar" ><i class='fas fa-trash' > </i> Eliminar</button>
														</a >
													<?php } ?>
								  <?php  if($this->session->userdata('logged_in')==False) { ?>
										
										<a href="#"  title="Editar" >
										<button type='button' class='btn btn-sm bg-olive'  disabled title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
										</a>
										<a href="#" title="Eliminar">
										<button onclick="return confirmPostgrados()" disabled type='button' class='btn btn-sm bg-red delRespresentante' title="Eliminar" ><i class='fas fa-trash' > </i> Eliminar</button>
										</a >
									 <?php } ?>
												</td> 
												</tr>
											<?php } ?>  
													 </tbody>
													 <tfoot style="height: 18px; background-color:#6c757d;color: #6c757d; ">
											<tr>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<td></td>
											</tr>
										</tfoot>
									  </table>
						  </div>
							 </div>
						  </div>
						</div>

						<div class="tab-pane <?php if($pag == "investigaciones"){ echo "active";} ?>" id="investigaciones">
						<div class="card">
							 <div class="card-header text-white" style=" background: linear-gradient(to right, #1e88e5, #66bb6a);"><i class="nav-icon fas fa-search mr-1"></i>Investigaciones</div>
							 <div class="card-body" id="cardinvestigaciones">
							 <?php
														if ($this->session->userdata('logged_in')==True) { $controlador = 1; ?>
														<div class='col-1'>
															<a href="<?php echo base_url()."index.php/controller/v_i_InvestigacionM/".$d->ci; ?>" style='margin-left: 20px;'> 
																<button type='button' class='btn btn-info btn-sm'><i class='fas fa-plus'></i> Insertar</button>
															</a>
														</div>  
													<?php	} ?>
							 <br>
							 <br>
						  <div class="table table-responsive">
						  <table id="ltsinvestigaciones" class="table table-bordered table-striped"  width="100%">
							 <thead>
								<tr >
									 
									
									 <th>Nombre</th>
								  <th>Año</th>
								 
												<th>Opciones</th>
														  </tr>
													 </thead>
													 <tbody>
							 <?php if($invest->result() == null) {
								echo "<tr><td colspan='4'><center>No existen investigaciones asociadas a este miembro...</center></td></tr>";
							 }?>
							 <?php  foreach ($invest->result() as $inv) { ?>
												<tr id="tabla_tesis">
												<td><?php echo $inv->nombreInvestigacion; ?></td>
												<td><?php echo $inv->anno; ?></td>
												
												<td class="text-center">
												<?php $flag = True; $message = 1; $type = True; ?>
													
													<?php  if($this->session->userdata('logged_in')==True) { ?>
														
														<a href="<?php echo base_url()."index.php/controller/v_e_InvestigacionM/".$d->ci.'/'.$inv->idinvestigacionesRealizadas ; ?>"  title="Editar" >
														<button type='button' class='btn btn-sm bg-olive' title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
														</a>
														<a href="<?php echo base_url()."index.php/controller/delInvestigacionM/".$d->ci.'/'.$inv->idinvestigacionesRealizadas ; ?>" title="Eliminar">
														<button onclick="return confirmInvestigaciones()"  type='button' class='btn btn-sm bg-red delRespresentante' title="Eliminar" ><i class='fas fa-trash' > </i> Eliminar</button>
														</a >
													<?php } ?>
								  <?php  if($this->session->userdata('logged_in')==False) { ?>
														
										<a href="#"  title="Editar" >
										<button type='button' class='btn btn-sm bg-olive'  disabled title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
										</a>
										<a href="#" title="Eliminar">
										<button onclick="return confirmPostgrados()" disabled type='button' class='btn btn-sm bg-red delRespresentante' title="Eliminar" ><i class='fas fa-trash' > </i> Eliminar</button>
										</a >
									 <?php } ?>
												</td> 
												</tr>
											<?php } ?>  
													 </tbody>
													 <tfoot style="height: 18px; background-color:#6c757d;color: #6c757d; ">
											<tr>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												
												<td></td>
											</tr>
										</tfoot>
									  </table>
						  </div>
							 </div>
						  </div>
						</div>

						<div class="tab-pane <?php if($pag == "reconocimientos"){ echo "active";} ?>" id="reconocimientos">
						<div class="card">
							 <div class="card-header text-white" style=" background: linear-gradient(to right, #1e88e5, #66bb6a);"><i class="nav-icon fas fa-award mr-1"></i>Reconocimientos</div>
							 <div class="card-body" id="cardreconocimientos">
							 <?php
														if ($this->session->userdata('logged_in')==True) { $controlador = 1; ?>
														<div class='col-1'>
															<a href="<?php echo base_url()."index.php/controller/v_i_ReconocimientoM/".$d->ci; ?>" style='margin-left: 20px;'> 
																<button type='button' class='btn btn-info btn-sm'><i class='fas fa-plus'></i> Insertar</button>
															</a>
														</div>  
													<?php	} ?>
							 <br>
							 <br>
						  <div class="table table-responsive">
						  <table id="ltsreconocimientos" class="table table-bordered table-striped"  width="100%">
							 <thead>
								<tr >
									 
									
									 <th>Tipo de reconocimiento</th>
								  <th>Denominación</th>
								  <th>Fecha</th>
		
												<th>Opciones</th>
														  </tr>
													 </thead>
													 <tbody>
							 <?php if($reconocimientos->result() == null) {
								echo "<tr><td colspan='4'><center>No existen reconocimientos asociados a este miembro...</center></td></tr>";
							 }?>
							 <?php  foreach ($reconocimientos->result() as $recon) { ?>
												<tr id="tabla_tesis">
												<td><?php echo $recon->tipoReconocimiento; ?></td>
												<td><?php echo $recon->denominacion; ?></td>
												<td><?php echo strftime("%d %B, %Y", strtotime($recon->fecha)); ?></td>
												<td class="text-center">
												<?php $flag = True; $message = 1; $type = True; ?>
													
													<?php  if($this->session->userdata('logged_in')==True) { ?>
													
														<a href="<?php echo base_url()."index.php/controller/v_e_ReconocimientoM/".$d->ci.'/'.$recon->idreconocimientos; ?>"  title="Editar" >
														<button type='button' class='btn btn-sm bg-olive' title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
														</a>
														<a href="<?php echo base_url()."index.php/controller/delReconocimientoM/".$d->ci.'/'.$recon->idreconocimientos; ?>" title="Eliminar">
														<button onclick="return confirmReconocimientos()"  type='button' class='btn btn-sm bg-red delRespresentante' title="Eliminar" ><i class='fas fa-trash' > </i> Eliminar</button>
														</a >
													<?php } ?>
								  <?php  if($this->session->userdata('logged_in')==False) { ?>
										
										<a href="#"  title="Editar" >
										<button type='button' class='btn btn-sm bg-olive'  disabled title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
										</a>
										<a href="#" title="Eliminar">
										<button onclick="return confirmPostgrados()" disabled type='button' class='btn btn-sm bg-red delRespresentante' title="Eliminar" ><i class='fas fa-trash' > </i> Eliminar</button>
										</a >
									 <?php } ?>
												</td> 
												</tr>
											<?php } ?>  
													 </tbody>
													 <tfoot style="height: 18px; background-color:#6c757d;color: #6c757d; ">
											<tr>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<td></td>
											</tr>
										</tfoot>
									  </table>
						  </div>
							 </div>
						  </div>
						</div>

						<div class="tab-pane <?php if($pag == "misiones"){ echo "active";} ?>" id="misiones">
						<div class="card">
							 <div class="card-header text-white" style=" background: linear-gradient(to right, #1e88e5, #66bb6a);"><i class="nav-icon fas fa-route mr-1"></i>Misiones internacionalistas</div>
							 <div class="card-body">
							 <?php
								if ($this->session->userdata('logged_in')==True) { $controlador = 1; ?>
								<div class='col-1'>
									<a href="<?php echo base_url()."index.php/controller/v_i_MisionM/".$d->ci; ?>" style='margin-left: 20px;'> 
										<button type='button' class='btn btn-info btn-sm'><i class='fas fa-plus'></i> Insertar</button>
									</a>
								</div>  
							<?php	} ?>
							 <br>
							 <br>
						  <div class="table table-responsive">
						  <table id="ltsmisiones" class="table table-bordered table-striped"  width="100%">
							 <thead>
								<tr >
									 
									
									 <th>País</th>
								  <th>Fecha Inicio</th>
								  <th>Fecha Fin</th>
								  <th>Carácter</th>
								  <th>Organismo</th>
		
												<th>Opciones</th>
														  </tr>
													 </thead>
													 <tbody>
							 <?php if($misiones->result() == null) {
								echo "<tr><td colspan='6'><center>No existen misiones internacionalistas asociadas a este miembro...</center></td></tr>";
							 }?>
							 <?php  foreach ($misiones->result() as $mis) { ?>
												<tr id="tabla_tesis">
												<td><?php echo $mis->pais; ?></td>
												<td><?php echo strftime("%d %B, %Y", strtotime($mis->fechaInicio)); ?></td>
												<td><?php echo strftime("%d %B, %Y", strtotime($mis->fechaFin)); ?></td>
												<td><?php echo $mis->caracter; ?></td>
												<td><?php echo $mis->organismo; ?></td>
												<td class="text-center">
												<?php $flag = True; $message = 1; $type = True; ?>
													
													<?php  if($this->session->userdata('logged_in')==True) { ?>
													
														<a href="<?php echo base_url()."index.php/controller/v_e_MisionM/".$d->ci.'/'.$mis->idmisionesInternacionales; ?>"  title="Editar" >
														<button type='button' class='btn btn-sm bg-olive' title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
														</a>
														<a href="<?php echo base_url()."index.php/controller/delMisionM/".$d->ci.'/'.$mis->idmisionesInternacionales; ?>" title="Eliminar">
														<button onclick="return confirmMision()"  type='button' class='btn btn-sm bg-red delRespresentante' title="Eliminar" ><i class='fas fa-trash' > </i> Eliminar</button>
														</a >
													<?php } ?>
								  <?php  if($this->session->userdata('logged_in')==False) { ?>
										
										<a href="#"  title="Editar" >
										<button type='button' class='btn btn-sm bg-olive'  disabled title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
										</a>
										<a href="#" title="Eliminar">
										<button onclick="return confirmPostgrados()" disabled type='button' class='btn btn-sm bg-red delRespresentante' title="Eliminar" ><i class='fas fa-trash' > </i> Eliminar</button>
										</a >
									 <?php } ?>
												</td> 
												</tr>
											<?php } ?>  
													 </tbody>
													 <tfoot style="height: 18px; background-color:#6c757d;color: #6c757d; ">
											<tr>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<td></td>
											</tr>
										</tfoot>
									  </table>
						  </div>
							 </div>
						  </div>
						</div>

						<div class="tab-pane <?php if($pag == "tic"){ echo "active";} ?>" id="tic">
						<div class="card">
							 <div class="card-header text-white" style=" background: linear-gradient(to right, #1e88e5, #66bb6a);"><i class="nav-icon fas fa-desktop mr-1"></i> PC</div>
							 <div class="card-body">
							 <?php
														if ($this->session->userdata('logged_in')==True) { $controlador = 1; ?>
														<div class='col-1'>
															<a href="<?php echo base_url()."index.php/controller/v_i_PCM/".$d->ci; ?>" style='margin-left: 20px;'> 
																<button type='button' class='btn btn-info btn-sm'><i class='fas fa-plus'></i> Insertar</button>
															</a>
														</div>  
													<?php	} ?>
							 <br>
							 <br>
						  <div class="table table-responsive">
						  <table id="ltspc" class="table table-bordered table-striped"  width="100%">
							 <thead>
								<tr >
									 
									
									 <th>No. Serie</th>
									 <th>Estado</th>
		
												<th>Opciones</th>
														  </tr>
													 </thead>
													 <tbody>
							 <?php if($pcs->result() == null) {
								echo "<tr><td colspan='3'><center>No existen PC asociadas a este miembro...</center></td></tr>";
							 }?>
							 <?php  foreach ($pcs->result() as $pc) { ?>
												<tr id="tabla_tesis">
												<td><?php echo $pc->noserie; ?></td>
												<td><?php echo $pc->estado; ?></td>
												<td class="text-center">
												<?php $flag = True; $message = 1; $type = True; ?>
													
													<?php  if($this->session->userdata('logged_in')==True) { ?>
													
														<a href="<?php echo base_url()."index.php/controller/v_e_PCM/".$d->ci.'/'.$pc->idpc; ?>"  title="Editar" >
														<button type='button' class='btn btn-sm bg-olive' title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
														</a>
														<a href="<?php echo base_url()."index.php/controller/delPCM/".$d->ci.'/'.$pc->idpc; ?>" title="Eliminar">
														<button onclick="return confirmPC()"  type='button' class='btn btn-sm bg-red delRespresentante' title="Eliminar" ><i class='fas fa-trash' > </i> Eliminar</button>
														</a >
													<?php } ?>
								  <?php  if($this->session->userdata('logged_in')==False) { ?>
										
										<a href="#"  title="Editar" >
										<button type='button' class='btn btn-sm bg-olive'  disabled title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
										</a>
										<a href="#" title="Eliminar">
										<button onclick="return confirmPostgrados()" disabled type='button' class='btn btn-sm bg-red delRespresentante' title="Eliminar" ><i class='fas fa-trash' > </i> Eliminar</button>
										</a >
									 <?php } ?>
												</td> 
												</tr>
											<?php } ?>  
													 </tbody>
													 <tfoot style="height: 18px; background-color:#6c757d;color: #6c757d; ">
											<tr>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<td></td>
											</tr>
										</tfoot>
										
									  </table>
						  </div>
							 </div>
						</div>
						<div class="card">
							 <div class="card-header text-white" style=" background: linear-gradient(to right, #1e88e5, #66bb6a);"><i class="nav-icon fas fa-phone-alt mr-1"></i>Teléfono</div>
							 <div class="card-body">
							 <?php
														if ($this->session->userdata('logged_in')==True) { $controlador = 1; ?>
														<div class='col-1'>
															<a href="<?php echo base_url()."index.php/controller/v_i_TelefonoM/".$d->ci; ?>" style='margin-left: 20px;'> 
																<button type='button' class='btn btn-info btn-sm'><i class='fas fa-plus'></i> Insertar</button>
															</a>
														</div>  
													<?php	} ?>
							 <br>
							 <br>
						  <div class="table table-responsive">
						  <table id="ltstelefono" class="table table-bordered table-striped"  width="100%">
							 <thead>
								<tr >
									 
									
									 <th>Tipo</th>
									 <th>Propietario</th>
									 <th>Número</th>
		
												<th>Opciones</th>
														  </tr>
													 </thead>
													 <tbody>
							 <?php if($telef->result() == null) {
								echo "<tr><td colspan='4'><center>No existen teléfonos asociados a este miembro...</center></td></tr>";
							 }?>
							 <?php  foreach ($telef->result() as $tel) { ?>
												<tr id="tabla_tesis">
												<td><?php echo $tel->tipo; ?></td>
												<td><?php echo $tel->propietario; ?></td>
												<td><?php echo $tel->numero; ?></td>
												<td class="text-center">
												<?php $flag = True; $message = 1; $type = True; ?>
													
													<?php  if($this->session->userdata('logged_in')==True) { ?>
													
														<a href="<?php echo base_url()."index.php/controller/v_e_TelefonoM/".$d->ci.'/'.$tel->idtelefonoMovil; ?>"  title="Editar" >
														<button type='button' class='btn btn-sm bg-olive' title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
														</a>
														<a href="<?php echo base_url()."index.php/controller/delTelefonoM/".$d->ci.'/'.$tel->idtelefonoMovil; ?>" title="Eliminar">
														<button onclick="return confirmTelefono()"  type='button' class='btn btn-sm bg-red delRespresentante' title="Eliminar" ><i class='fas fa-trash' > </i> Eliminar</button>
														</a >
													<?php } ?>
								  <?php  if($this->session->userdata('logged_in')==False) { ?>
										
										<a href="#"  title="Editar" >
										<button type='button' class='btn btn-sm bg-olive'  disabled title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
										</a>
										<a href="#" title="Eliminar">
										<button onclick="return confirmPostgrados()" disabled type='button' class='btn btn-sm bg-red delRespresentante' title="Eliminar" ><i class='fas fa-trash' > </i> Eliminar</button>
										</a >
									 <?php } ?>
												</td> 
												</tr>
											<?php } ?>  
													 </tbody>
													 <tfoot style="height: 18px; background-color:#6c757d;color: #6c757d; ">
											<tr>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<td></td>
											</tr>
										</tfoot>
										
									  </table>
						  </div>
							 </div>
						</div>
						<div class="card">
							 <div class="card-header text-white" style=" background: linear-gradient(to right, #1e88e5, #66bb6a);"><i class="nav-icon fas fa-tablet-alt mr-1"></i>Tablet</div>
							 <div class="card-body">
							 <?php
														if ($this->session->userdata('logged_in')==True) { $controlador = 1; ?>
														<div class='col-1'>
															<a href="<?php echo base_url()."index.php/controller/v_i_TabletM/".$d->ci; ?>" style='margin-left: 20px;'> 
																<button type='button' class='btn btn-info btn-sm'><i class='fas fa-plus'></i> Insertar</button>
															</a>
														</div>  
													<?php	} ?>
							 <br>
							 <br>
						  <div class="table table-responsive">
						  <table id="ltstablet" class="table table-bordered table-striped"  width="100%">
							 <thead>
								<tr >
									 
									
									 <th>Marca</th>
									 <th>No. Serie</th>
		
												<th>Opciones</th>
														  </tr>
													 </thead>
													 <tbody>
							 <?php if($tablet->result() == null) {
								echo "<tr><td colspan='3'><center>No existen tabletas asociados a este miembro...</center></td></tr>";
							 }?>
							 <?php  foreach ($tablet->result() as $tab) { ?>
												<tr id="tabla_tesis">
												<td><?php echo $tab->marca; ?></td>
												<td><?php echo $tab->numSerie; ?></td>
												<td class="text-center">
												<?php $flag = True; $message = 1; $type = True; ?>
													
													<?php  if($this->session->userdata('logged_in')==True) { ?>
													
														<a href="<?php echo base_url()."index.php/controller/v_e_TabletM/".$d->ci.'/'.$tab->idtablet; ?>"  title="Editar" >
														<button type='button' class='btn btn-sm bg-olive' title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
														</a>
														<a href="<?php echo base_url()."index.php/controller/delTabletM/".$d->ci.'/'.$tab->idtablet; ?>" title="Eliminar">
														<button onclick="return confirmTablet()"  type='button' class='btn btn-sm bg-red delRespresentante' title="Eliminar" ><i class='fas fa-trash' > </i> Eliminar</button>
														</a >
													<?php } ?>
								  <?php  if($this->session->userdata('logged_in')==False) { ?>
										
										<a href="#"  title="Editar" >
										<button type='button' class='btn btn-sm bg-olive'  disabled title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
										</a>
										<a href="#" title="Eliminar">
										<button onclick="return confirmPostgrados()" disabled type='button' class='btn btn-sm bg-red delRespresentante' title="Eliminar" ><i class='fas fa-trash' > </i> Eliminar</button>
										</a >
									 <?php } ?>
												</td> 
												</tr>
											<?php } ?>  
													 </tbody>
													 <tfoot style="height: 18px; background-color:#6c757d;color: #6c757d; ">
											<tr>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<td></td>
											</tr>
										</tfoot>
										
									  </table>
						  </div>
							 </div>
						</div>
						<div class="card">
							 <div class="card-header text-white" style=" background: linear-gradient(to right, #1e88e5, #66bb6a);"><i class="nav-icon fas fa-at mr-1"></i>Correo</div>
							 <div class="card-body">
							 <?php
														if ($this->session->userdata('logged_in')==True) { $controlador = 1; ?>
														<div class='col-1'>
															<a href="<?php echo base_url()."index.php/controller/v_i_CorreoM/".$d->ci; ?>" style='margin-left: 20px;'> 
																<button type='button' class='btn btn-info btn-sm'><i class='fas fa-plus'></i> Insertar</button>
															</a>
														</div>  
													<?php	} ?>
							 <br>
							 <br>
						  <div class="table table-responsive">
						  <table id="ltscorreo" class="table table-bordered table-striped"  width="100%">
							 <thead>
								<tr >
									 
									
									 <th>Tipo</th>
									 <th>Correo</th>
		
												<th>Opciones</th>
														  </tr>
													 </thead>
													 <tbody>
							 <?php if($correo->result() == null) {
								echo "<tr><td colspan='3'><center>No existen correos asociados a este miembro...</center></td></tr>";
							 }?>
							 <?php  foreach ($correo->result() as $corr) { ?>
												<tr id="tabla_tesis">
												<td><?php echo $corr->tipo; ?></td>
												<td><?php echo $corr->correo; ?></td>
												<td class="text-center">
												<?php $flag = True; $message = 1; $type = True; ?>
													
													<?php  if($this->session->userdata('logged_in')==True) { ?>
													
														<a href="<?php echo base_url()."index.php/controller/v_e_CorreoM/".$d->ci.'/'.$corr->idemail; ?>"  title="Editar" >
														<button type='button' class='btn btn-sm bg-olive' title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
														</a>
														<a href="<?php echo base_url()."index.php/controller/delCorreoM/".$d->ci.'/'.$corr->idemail; ?>" title="Eliminar">
														<button onclick="return confirmCorreo()"  type='button' class='btn btn-sm bg-red delRespresentante' title="Eliminar" ><i class='fas fa-trash' > </i> Eliminar</button>
														</a >
													<?php } ?>
								  <?php  if($this->session->userdata('logged_in')==False) { ?>
										
										<a href="#"  title="Editar" >
										<button type='button' class='btn btn-sm bg-olive'  disabled title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
										</a>
										<a href="#" title="Eliminar">
										<button onclick="return confirmPostgrados()" disabled type='button' class='btn btn-sm bg-red delRespresentante' title="Eliminar" ><i class='fas fa-trash' > </i> Eliminar</button>
										</a >
									 <?php } ?>
												</td> 
												</tr>
											<?php } ?>  
													 </tbody>
													 <tfoot style="height: 18px; background-color:#6c757d;color: #6c757d; ">
											<tr>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<td></td>
											</tr>
										</tfoot>
										
									  </table>
						  </div>
							 </div>
						</div>
						</div>

						<div class="tab-pane <?php if($pag == "rsociales"){ echo "active";} ?>" id="rsociales">
						<div class="card">
							 <div class="card-header text-white" style=" background: linear-gradient(to right, #1e88e5, #66bb6a);"><i class="nav-icon fas fa-project-diagram mr-1"></i>Redes sociales</div>
							 <div class="card-body">
							 <?php
														if ($this->session->userdata('logged_in')==True) { $controlador = 1; ?>
														<div class='col-1'>
															<a href="<?php echo base_url()."index.php/controller/v_i_RedSocialM/".$d->ci; ?>" style='margin-left: 20px;'> 
																<button type='button' class='btn btn-info btn-sm'><i class='fas fa-plus'></i> Insertar</button>
															</a>
														</div>  
													<?php	} ?>
							 <br>
							 <br>
						  <div class="table table-responsive">
						  <table id="ltsfacebook" class="table table-bordered table-striped"  width="100%">
							 <thead>
								<tr >
									 
								 
									 <th>Nombre</th>
									 <th>Cuenta</th>
		
												<th>Opciones</th>
														  </tr>
													 </thead>
													 <tbody>
							 <?php if($rsocial->result() == null) {
								echo "<tr><td colspan='3'><center>No existen redes sociales asociadas a este miembro...</center></td></tr>";
							 }?>
							 <?php  foreach ($rsocial->result() as $fac) { ?>
												<tr id="tabla_tesis">
								<td><?php 
								  if($fac->nombre == "Facebook"){
									 echo "<i class='fab fa-2x fa-facebook-square mr-1' style='color: #1565c0;'></i>Facebook";
								  }
								  else if($fac->nombre == "Twitter"){
									 echo "<i class='fab fa-2x fa-twitter mr-1' style='color: #26c6da;'></i>Twitter";
								  }
								  else if($fac->nombre == "Whatsapp"){
									 echo "<i class='fab fa-2x fa-whatsapp mr-1' style='color: #388e3c;'></i>Whatsapp";
								  }
								  else if($fac->nombre == "Telegram"){
									 echo "<i class='fab fa-2x fa-telegram mr-1' style='color: #03a9f4;'></i>Telegram";
								  }
								  else if($fac->nombre == "YouTube"){
									 echo "<i class='fab fa-2x fa-youtube mr-1' style='color: #c62828;'></i>YouTube";
								  }
								  else if($fac->nombre == "Instagram"){
									 echo "<i class='fab fa-2x fa-instagram mr-1' style='color: #5d4037;'></i>Instagram";
								  }
								?></td>
								<td><?php echo $fac->cuenta; ?></td>
												<td class="text-center">
												<?php $flag = True; $message = 1; $type = True; ?>
													
													<?php  if($this->session->userdata('logged_in')==True) { ?>
													
														<a href="<?php echo base_url()."index.php/controller/v_e_RedSocialM/".$d->ci.'/'.$fac->idredesSociales; ?>"  title="Editar" >
														<button type='button' class='btn btn-sm bg-olive' title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
														</a>
														<a href="<?php echo base_url()."index.php/controller/delRedSocialM/".$d->ci.'/'.$fac->idredesSociales; ?>" title="Eliminar">
														<button onclick="return confirmFacebook()"  type='button' class='btn btn-sm bg-red delRespresentante' title="Eliminar" ><i class='fas fa-trash' > </i> Eliminar</button>
														</a >
													<?php } ?>
								  <?php  if($this->session->userdata('logged_in')==False) { ?>
										
										<a href="#"  title="Editar" >
										<button type='button' class='btn btn-sm bg-olive'  disabled title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
										</a>
										<a href="#" title="Eliminar">
										<button onclick="return confirmPostgrados()" disabled type='button' class='btn btn-sm bg-red delRespresentante' title="Eliminar" ><i class='fas fa-trash' > </i> Eliminar</button>
										</a >
									 <?php } ?>
												</td> 
												</tr>
											<?php } ?>  
													 </tbody>
													 <tfoot style="height: 18px; background-color:#6c757d;color: #6c757d; ">
											<tr>
												<th style="text-align: left;"></th>
								<th style="text-align: left;"></th>
								
												<td></td>
											</tr>
							 </tfoot>
							 
							 </table>
							 </div>
							 </div>
						</div>
						
						</div>

						<div class="tab-pane <?php if($pag == "atencion"){ echo "active";} ?>" id="atencion">
						<div class="card">
							 <div class="card-header text-white" style=" background: linear-gradient(to right, #1e88e5, #66bb6a);"><i class="nav-icon fas fa-home mr-1"></i>Vivienda</div>
							 <div class="card-body">
							 <?php
														if ($this->session->userdata('logged_in')==True) { $controlador = 1; ?>
														<div class='col-1'>
															<a href="<?php echo base_url()."index.php/controller/v_i_ViviendaM/".$d->ci; ?>" style='margin-left: 20px;'> 
																<button type='button' class='btn btn-info btn-sm'><i class='fas fa-plus'></i> Insertar</button>
															</a>
														</div>  
													<?php	} ?>
							 <br>
							 <br>
						  <div class="table table-responsive">
						  <table id="ltsvivienda" class="table table-bordered table-striped"  width="100%">
							 <thead>
								<tr >
									 
									
									 <th>Tipo de vivienda</th>
									 <th>Estado</th>
		
												<th>Opciones</th>
														  </tr>
													 </thead>
													 <tbody>
							 <?php if($vivienda->result() == null) {
								echo "<tr><td colspan='3'><center>No existen viviendas asociadas a este miembro...</center></td></tr>";
							 }?>
							 <?php  foreach ($vivienda->result() as $viv) { ?>
												<tr id="tabla_tesis">
												<td><?php echo $viv->tipoVivienda; ?></td>
												<td><?php echo $viv->estado; ?></td>
												<td class="text-center">
												<?php $flag = True; $message = 1; $type = True; ?>
													
													<?php  if($this->session->userdata('logged_in')==True) { ?>
													
														<a href="<?php echo base_url()."index.php/controller/v_e_ViviendaM/".$d->ci.'/'.$viv->idvivienda ; ?>"  title="Editar" >
														<button type='button' class='btn btn-sm bg-olive' title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
														</a>
														<a href="<?php echo base_url()."index.php/controller/delViviendaM/".$d->ci.'/'.$viv->idvivienda; ?>" title="Eliminar">
														<button onclick="return confirmVivienda()"  type='button' class='btn btn-sm bg-red delRespresentante' title="Eliminar" ><i class='fas fa-trash' > </i> Eliminar</button>
														</a >
													<?php } ?>
								  <?php  if($this->session->userdata('logged_in')==False) { ?>
										
										<a href="#"  title="Editar" >
										<button type='button' class='btn btn-sm bg-olive'  disabled title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
										</a>
										<a href="#" title="Eliminar">
										<button onclick="return confirmPostgrados()" disabled type='button' class='btn btn-sm bg-red delRespresentante' title="Eliminar" ><i class='fas fa-trash' > </i> Eliminar</button>
										</a >
									 <?php } ?>
												</td> 
												</tr>
											<?php } ?>  
													 </tbody>
													 <tfoot style="height: 18px; background-color:#6c757d;color: #6c757d; ">
											<tr>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<td></td>
											</tr>
							 </tfoot>
							 
							 </table>
							 </div>
							 </div>
						</div>
						<div class="card">
							 <div class="card-header text-white" style=" background: linear-gradient(to right, #1e88e5, #66bb6a);"><i class="nav-icon fas fa-car-side mr-1"></i>Medios de transporte</div>
							 <div class="card-body">
							 <?php
														if ($this->session->userdata('logged_in')==True) { $controlador = 1; ?>
														<div class='col-1'>
															<a href="<?php echo base_url()."index.php/controller/v_i_TransporteM/".$d->ci; ?>" style='margin-left: 20px;'> 
																<button type='button' class='btn btn-info btn-sm'><i class='fas fa-plus'></i> Insertar</button>
															</a>
														</div>  
													<?php	} ?>
							 <br>
							 <br>
						  <div class="table table-responsive">
						  <table id="ltstransporte" class="table table-bordered table-striped"  width="100%">
							 <thead>
								<tr >
									 
									
									 <th>Tipo de transporte</th>
									 <th>Estado</th>
		
												<th>Opciones</th>
														  </tr>
													 </thead>
													 <tbody>
							 <?php if($transporte->result() == null) {
								echo "<tr><td colspan='3'><center>No existen viviendas asociadas a este miembro...</center></td></tr>";
							 }?>
							 <?php  foreach ($transporte->result() as $trans) { ?>
												<tr id="tabla_tesis">
												<td><?php echo $trans->tipoAsignacion; ?></td>
												<td><?php echo $trans->estado; ?></td>
												<td class="text-center">
												<?php $flag = True; $message = 1; $type = True; ?>
													
													<?php  if($this->session->userdata('logged_in')==True) { ?>
													
														<a href="<?php echo base_url()."index.php/controller/v_e_TransporteM/".$d->ci.'/'.$trans->idmedioTransporte; ?>"  title="Editar" >
														<button type='button' class='btn btn-sm bg-olive' title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
														</a>
														<a href="<?php echo base_url()."index.php/controller/delTransporteM/".$d->ci.'/'.$trans->idmedioTransporte; ?>" title="Eliminar">
														<button onclick="return confirmTransporte()"  type='button' class='btn btn-sm bg-red delRespresentante' title="Eliminar" ><i class='fas fa-trash' > </i> Eliminar</button>
														</a >
													<?php } ?>
								  <?php  if($this->session->userdata('logged_in')==False) { ?>
										
										<a href="#"  title="Editar" >
										<button type='button' class='btn btn-sm bg-olive'  disabled title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
										</a>
										<a href="#" title="Eliminar">
										<button onclick="return confirmPostgrados()" disabled type='button' class='btn btn-sm bg-red delRespresentante' title="Eliminar" ><i class='fas fa-trash' > </i> Eliminar</button>
										</a >
									 <?php } ?>
												</td> 
												</tr>
											<?php } ?>  
													 </tbody>
													 <tfoot style="height: 18px; background-color:#6c757d;color: #6c757d; ">
											<tr>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<td></td>
											</tr>
							 </tfoot>
							 
							 </table>
							 </div>
							 </div>
						</div>
						</div>

						<!-- /.tab-pane -->
					 </div>
					 <!-- /.tab-content -->
				  </div><!-- /.card-body -->
				</div>
				<!-- /.card -->
			 </div>
			 <!-- /.col -->
		  </div>
		  <!-- /.row -->
		</div><!-- /.container-fluid -->
		<?php endforeach ?>
	 </section>
	</div>

  <script> 
		  
	 function confirmExpProfesional() { 
			if(window.confirm("\xbfDesea eliminar esta experiencia profesional?")){
				return true;
			}
			return false;
			 
		} 

	 function confirmTesis() { 
			if(window.confirm("\xbfDesea eliminar esta tesis?")){
				return true;
			}
			return false;
			 
		} 

	 function confirmProblematica() { 
			if(window.confirm("\xbfDesea desvincular esta problemática del miembro?")){
				return true;
			}
			return false;
			 
		} 

	 function confirmIdioma() { 
			if(window.confirm("\xbfDesea eliminar este idioma?")){
				return true;
			}
			return false;
			 
		} 

	 function confirmMision() { 
			if(window.confirm("\xbfDesea eliminar esta misión internacionalista?")){
				return true;
			}
			return false;
			 
		} 
	 
	 function confirPublicacion() { 
			if(window.confirm("\xbfDesea eliminar esta publicación?")){
				return true;
			}
			return false;
			 
		} 

	 function confirmInnovaciones() { 
			if(window.confirm("\xbfDesea eliminar esta innovación?")){
				return true;
			}
			return false;
			 
		} 

	 function confirmOrganizaciones() { 
			if(window.confirm("\xbfDesea eliminar esta asociación?")){
				return true;
			}
			return false;
			 
		} 

	 function confirmAsociaciones() { 
			if(window.confirm("\xbfDesea eliminar esta asociación?")){
				return true;
			}
			return false;
			 
		} 

	 function confirmColaboraciones() { 
			if(window.confirm("\xbfDesea eliminar esta colaboración?")){
				return true;
			}
			return false;
			 
		} 

	 function confirmAsesorias() { 
			if(window.confirm("\xbfDesea eliminar esta asesoría?")){
				return true;
			}
			return false;
			 
		} 

	 function confirmEventos() { 
			if(window.confirm("\xbfDesea eliminar este evento?")){
				return true;
			}
			return false;
			 
		} 

	 function confirmInvestigaciones() { 
			if(window.confirm("\xbfDesea eliminar esta investigación?")){
				return true;
			}
			return false;
			 
		} 

	 function confirmGradoCientifico() { 
			if(window.confirm("\xbfDesea eliminar este grado científico?")){
				return true;
			}
			return false;
			 
		} 

	 function confirmReconocimientos() { 
			if(window.confirm("\xbfDesea eliminar este reconocimiento?")){
				return true;
			}
			return false;
			 
		} 

	 function confirmPC() { 
			if(window.confirm("\xbfDesea eliminar esta PC?")){
				return true;
			}
			return false;
			 
		} 
	 
	 function confirmTelefono() { 
			if(window.confirm("\xbfDesea eliminar este teléfono?")){
				return true;
			}
			return false;
			 
		} 

	 function confirmTablet() { 
			if(window.confirm("\xbfDesea eliminar esta tablet?")){
				return true;
			}
			return false;
			 
		} 

	 function confirmCorreo() { 
			if(window.confirm("\xbfDesea eliminar este correo?")){
				return true;
			}
			return false;
			 
		} 

	 function confirmTwitter() { 
			if(window.confirm("\xbfDesea eliminar esta cuenta de Twitter?")){
				return true;
			}
			return false;
			 
		} 

	 function confirmOcupacion() { 
			if(window.confirm("\xbfDesea eliminar esta ocupación?")){
				return true;
			}
			return false;
			 
		} 

	 function confirmFacebook() { 
			if(window.confirm("\xbfDesea eliminar esta cuenta de Facebook?")){
				return true;
			}
			return false;
			 
		} 

	 function confirmInstagram() { 
			if(window.confirm("\xbfDesea eliminar esta cuenta de Instagram?")){
				return true;
			}
			return false;
			 
		} 

	 function confirmWhatsapp() { 
			if(window.confirm("\xbfDesea eliminar esta cuenta de Whatsapp?")){
				return true;
			}
			return false;
			 
		} 

	 function confirmTelegram() { 
			if(window.confirm("\xbfDesea eliminar esta cuenta de Telegram?")){
				return true;
			}
			return false;
			 
		} 

	 function confirmYouTube() { 
			if(window.confirm("\xbfDesea eliminar esta cuenta de YouTube?")){
				return true;
			}
			return false;
			 
		} 

	 function confirmVivienda() { 
			if(window.confirm("\xbfDesea eliminar esta vivienda?")){
				return true;
			}
			return false;
			 
		} 

	 function confirmTransporte() { 
			if(window.confirm("\xbfDesea eliminar este medio de transporte?")){
				return true;
			}
			return false;
			 
		} 

	 function confirmCatDocente() { 
			if(window.confirm("\xbfDesea eliminar esta categoría docente?")){
				return true;
			}
			return false;
			 
		} 

	 function confirmCatCientificas() { 
			if(window.confirm("\xbfDesea eliminar esta categoría científica?")){
				return true;
			}
			return false;
			 
		} 

	 function confirmCurso() { 
			if(window.confirm("\xbfDesea eliminar esta curso de entrenamiento?")){
				return true;
			}
			return false;
			 
		} 

	 function confirmPostgrados() { 
			if(window.confirm("\xbfDesea eliminar este postgrado?")){
				return true;
			}
			return false;
			 
		} 

	 function confirmTituloAcademico() { 
			if(window.confirm("\xbfDesea eliminar este título académico?")){
				return true;
			}
			return false;
			 
		} 

	 function confirmActvidad() { 
			if(window.confirm("\xbfDesea eliminar esta actividad?")){
				return true;
			}
			return false;
			 
		} 

	 function confirProyectos() { 
			if(window.confirm("\xbfDesea eliminar este proyecto?")){
				return true;
			}
			return false;
			
			
		} 

	 function confirmCurso() { 
			if(window.confirm("\xbfDesea eliminar este curso impartido?")){
				return true;
			}
			return false;
			 
		} 

	 function confirmEstudio() { 
			if(window.confirm("\xbfDesea eliminar este centro estudiantil?")){
				return true;
			}
			return false;
			 
		} 

	 function validar(){
			var doc;
			var valorUpload = document.getElementById('upload').value;
			 if(valorUpload.length == 0){
			 doc = "Debe seleccionar una avatar.";
				  document.getElementById("msgUpload").innerHTML = doc;
			 return false;          
		}
			return true;
		} 
	 
	 
	 
		
	 
	 
	 
	 
		
</script> 

