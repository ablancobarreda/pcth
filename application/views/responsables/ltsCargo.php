<!-- Content Wrapper. Contains page content -->


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2" >
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><spam><i class="fas fa-list-ol"></i></spam> Listado de los cargos</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><a href="#">Listado de los cargos</a></li>
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
							<?php if(!empty($mensaje) && $type == true): ?>
			
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h5><i class="icon fas fa-check-circle"></i>Satisfactorio!</h5>
				<?php echo $mensaje ?>
				</div>

		<?php endif ?>
		<?php if(!empty($mensaje) && $type == false): ?>
				

				<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h5><i class="icon fas fa-times-circle"></i>Error!</h5>
				<?php echo $mensaje ?>
				</div>
		<?php endif ?>
							<?php
								if ($this->session->userdata('logged_in')==True) {
								echo " <div class='col-1'>
									<a href='".base_url('index.php/controller/v_i_Cargo')."' style='margin-left: 20px;'> 
									<button type='button' class='btn btn-info btn-sm'><i class='fas fa-plus'></i> Insertar</button></a>
								</div>  ";
								}
							?>
							
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="ltscargos" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                               
											    <th>Opciones</th>
											   
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php if($cargos->result() == null) {
											echo "<tr><td colspan='2'><center>No existen cargos...</center></td></tr>";
										}?>
										<?php foreach ($cargos->result() as $d) { ?>
											
												<tr id="tabla_cargo">
												<td><?php echo $d->nombrecargo; ?></td>
												
													<td class="text-center">
														<?php if($this->session->userdata('logged_in')==True) { ?>
															<a href="<?php echo base_url()."index.php/controller/editCargo/".$d->idcargo; ?>"  title="Editar" >
															<button type='button' class='btn btn-sm bg-olive'><i class='fas fa-pencil-alt'> </i> Editar</button>
															</a>
															<a href="<?php echo base_url()."index.php/controller/delCargo/".$d->idcargo; ?>" title="Eliminar">
															<button onclick="return confirmDeleteCargo()"  type='button' class='btn btn-sm bg-red delRespresentante'><i class='fas fa-trash' ></i> Eliminar</button>
															</a >
														<?php } ?>
													</td> 
												
												
												</tr>
											<?php } ?>  
											
										</tbody>
										<tfoot style="height: 18px; background-color:#6c757d;color: #6c757d; ">
											<tr>
												<th style="text-align: left;"></th>
												<td></td>
												
											</tr>
										</tfoot>
                                       
                                       
									</table>
									
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
<!-- /.content-wrapper -->

<script>
	 function confirmDeleteCargo() { 
			if(window.confirm("\xbfDesea eliminar este cargo?")){
				return true;
			}
			return false;
			 
		} 
</script>
