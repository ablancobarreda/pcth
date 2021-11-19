<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2" >
                <div class="col-sm-6">
				<h1 class="m-0 text-dark"><spam><i class="fas fa-list-ol"></i></spam> Listado de los medios de transporte</h1>
                </div>
                <!-- /.col -->
				<div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Listado de los medios de transporte</li>
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
							<form action="<?php echo base_url('index.php/controller/expViviendaPDF')?>" method="POST" >
							<div class='col-4'>
							
							<button style='margin-left: 20px;' type='submit' class='btn btn-secondary' title='Exportar'><i class='fas fa-file-pdf'></i> Exportar PDF</button>
								
								</div>
                                <!-- /.card-header -->
                                <div class="card-body">
								<div class="table table-responsive">
								<table id="ltsproyectospdf" class="table table-bordered table-striped" width="100%">
                                        <thead>
                                            <tr >
                                                <th>Tipo</th>
                                                <th>Estado</th>
											    <th>Miembro</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php if($transporte->result() == null) {
											echo "<tr><td colspan='3'><center>No existen medios de transporte...</center></td></tr>";
										}?>
										<?php foreach ($transporte->result() as $t) { ?>
												<tr id="tabla_responsable">
												<td><?php echo $t->tipoAsignacion; ?></td>
												<td><?php echo $t->estado; ?></td>
												<td>
													<ul class="list-inline">
														<li class="list-inline-item">
														
														<?php foreach ($resp->result() as $r) { ?>
															<?php if ($t->datosPersonales_ci  == $r->ci){ ?>
																<?php $flag = True; $message = 1; $type = True; $pag="atencion";?>
																<a href="<?php echo base_url()."index.php/controller/viewResponsable/".$flag.'/'.$message.'/'.$type.'/'.$r->ci.'/'.$pag; ?>">
																	<?php echo $r->nombres.' '.$r->apellido1.' '.$r->apellido2 ?>
																</a>
																<?php break; ?>
															<?php } ?>
														<?php } ?>
														
														<li>
													<ul>
												</td>
												
												</tr>
											<?php } ?>  
                                        </tbody>
										<tfoot style="height: 18px; background-color:#6c757d;color: #6c757d; ">
											<tr>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
												<th style="text-align: left;"></th>
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

