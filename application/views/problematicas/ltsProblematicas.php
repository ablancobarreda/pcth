<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2" >
                <div class="col-sm-6">
				<h1 class="m-0 text-dark"><spam><i class="fas fa-list-ol"></i></spam> Listado de las problemáticas</h1>
                </div>
                <!-- /.col -->
				<div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item "><a href="#">Banco problemas</a></li>
                        <li class="breadcrumb-item active">Listado de problemáticas</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
		<div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
							<div class="card">
							<br/>
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
							<form action="<?php echo base_url('index.php/controller/expProblematicasPDF')?>" method="POST" >
							<div class='col-4'>
							<?php
								if ($this->session->userdata('logged_in')==True) {
								echo " 
									<a href='".base_url('index.php/controller/v_i_problematica')."' style='margin-left: 20px;'> 
									<button type='button' class='btn btn-info' title='Insertar'><i class='fas fa-plus'></i> Insertar</button></a>
									  ";
								}
							?>
							<button style='margin-left: 20px;' type='submit' class='btn btn-secondary' title='Exportar'><i class='fas fa-file-pdf'></i> Exportar PDF</button>
								
								</div>
                                <!-- /.card-header -->
                                <div class="card-body">
								<div class="table table-responsive">
								<table id="ltsbancoproblemas" class="table table-bordered table-striped" width="100%">
                                        <thead>
                                            <tr >
                                                <th>Órgano</th>
                                                <th>Denominación</th>
                                                <th>Programa</th>
											    <th>Prioridades</th>
											    <th>Responsables</th>
												
											    <th>Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php if($problemas->result() == null) {
											echo "<tr><td colspan='6'><center>No existen problemáticas...</center></td></tr>";
										}?>
										<?php foreach ($problemas->result() as $d) { ?>
												<tr id="tabla_responsable">
												<td><?php echo $d->organo; ?></td>
												<td><?php echo $d->problematica; ?></td>
												<td><?php echo $d->programa; ?></td>
												<td><?php echo $d->prioridades; ?></td>
												<td>
													<ul class="list-inline">
														<li class="list-inline-item">
														<?php foreach ($bmiembro->result() as $bm) { ?>
															<?php if ($d->numeroProblema == $bm->bancoproblemas_numeroProblema){ ?>
																<?php foreach ($resp->result() as $r) { ?>
																	<?php if ($bm->datospersonales_ci == $r->ci){ ?>
																		<?php $flag = True; $message = 1; $type = True; $pag="home";?>
																		<a href="<?php echo base_url()."index.php/controller/viewResponsable/".$flag.'/'.$message.'/'.$type.'/'.$r->ci.'/'.$pag; ?>">
																			<img  title="<?php echo $r->nombres." ".$r->apellido1." ".$r->apellido2;  ?> "class="table-avatar img-circle" style="height:50px; width:50px;" src="<?php echo base_url('dist/img/avatar/'.$r->avatar);  ?>">
																		</a>
																		<?php break; ?>
																	<?php } ?>
																<?php } ?>
															<?php } ?>
														<?php } ?>
														<li>
													<ul>
												</td>
												<td class="text-center">
												
													<?php if($this->session->userdata('logged_in')==True) { ?>
														<?php $controlpag = 0?>
														<a href="<?php echo base_url()."index.php/controller/v_e_Problematica/".$d->numeroProblema .'/'.$controlpag; ?>"  title="Editar" >
														<button type='button' class='btn btn-sm bg-olive' title="Editar" ><i class='fas fa-pencil-alt mr-1'> </i> Editar</button>
														</a>
														<?php $controlpag = 0?>
														<a href="<?php echo base_url()."index.php/controller/v_ascMiembro/".$d->numeroProblema; ?>"  title="Editar" >
														<button type='button' class='btn btn-sm bg-blue' title="Editar" ><i class='fas fa-link mr-1'> </i> Asociar miembro(s)</button>
														</a>
														<?php $controlpag = 0?>
														<a href="<?php echo base_url()."index.php/controller/v_desvMiembro/".$d->numeroProblema; ?>"  title="Editar" >
														<button type='button' class='btn btn-sm bg-navy' title="Editar" ><i class='fas fa-unlink mr-1'> </i> Desincular miembro(s)</button>
														</a>
														<a href="<?php echo base_url()."index.php/controller/delProblematica/".$d->numeroProblema ; ?>" title="Eliminar">
														<button onclick="return confirmProblematica()"  type='button' class='btn btn-sm bg-red delRespresentante' title="Eliminar" ><i class='fas fa-trash mr-1' > </i> Eliminar</button>
														</a >
													<?php } ?>
													<?php if($this->session->userdata('logged_in')==false) { ?>
														<?php $controlpag = 0?>
														<a href="#"  title="Editar" >
														<button type='button' disabled class='btn btn-sm bg-olive' title="Editar" ><i class='fas fa-pencil-alt mr-1'> </i> Editar</button>
														</a>
														<?php $controlpag = 0?>
														<a href="#"  title="Editar" >
														<button type='button' disabled class='btn btn-sm bg-blue' title="Editar" ><i class='fas fa-link mr-1'> </i> Asociar miembro(s)</button>
														</a>
														<?php $controlpag = 0?>
														<a href="#"  title="Editar" >
														<button type='button' disabled class='btn btn-sm bg-navy' title="Editar" ><i class='fas fa-unlink mr-1'> </i> Desincular miembro(s)</button>
														</a>
														<a href="#" title="Eliminar">
														<button onclick="return confirmProblematica()" disabled  type='button' class='btn btn-sm bg-red delRespresentante' title="Eliminar" ><i class='fas fa-trash mr-1' > </i> Eliminar</button>
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
												<td></td>
											</tr>
										</tfoot>
									</table>
									</form>
								</div>
                                    
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
    <!-- /.content -->
</div>

 

<script>
	 function confirmProblematica() { 
			if(window.confirm("\xbfDesea eliminar esta problemática?")){
				return true;
			}
			return false;
			 
		} 

</script>
