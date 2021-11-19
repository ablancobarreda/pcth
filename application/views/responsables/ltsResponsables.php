<!-- Content Wrapper. Contains page content -->


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2" >
                <div class="col-sm-6">
				<h1 class="m-0 text-dark"><spam><i class="fas fa-list-ol"></i></spam> Listado de los miembros</h1>
                </div>
                <!-- /.col -->
				<div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item "><a href="#">Miembros</a></li>
                        <li class="breadcrumb-item active">Listado de miembros</li>
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
							<form action="<?php echo base_url('index.php/controller/expMiembrosPDF')?>" method="POST" >
							<div class='col-4'>
								<?php
								if ($this->session->userdata('logged_in')==True) {
								echo "
									<a href='".base_url('index.php/controller/v_i_responsable')."' style='margin-left: 20px;'> 
									<button type='button' class='btn btn-info' title='Insertar'><i class='fas fa-plus'></i> Insertar</button></a>";
								}?>
									<button style='margin-left: 20px;' type='submit' class='btn btn-secondary' title='Exportar'><i class='fas fa-file-pdf'></i> Exportar PDF</button>
								</div>  
								
							
                                <!-- /.card-header -->
                                <div class="card-body">
								<div class="table table-responsive">
								<table id="ltsresponsable" class="table table-bordered table-striped" width="100%">
                                        <thead>
                                            <tr >
                                                <th>CI</th>
                                                <th>CI Militar</th>
                                                <th>Grado</th>
											    <th>Nombre y Apellidos</th>
											    <th>Órgano</th>
											    <th>Cuadro</th>
												<th>Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php if($valores->result() == null) {
											echo "<tr><td colspan='7'><center>No existen responsables...</center></td></tr>";
										}?>
										<?php foreach ($valores->result() as $d) { ?>
												<tr id="tabla_responsable">
												<td><?php echo $d->ci; ?></td>
												<td><?php echo $d->ciMilitar; ?></td>
												<td><?php echo $d->gradoMilitar; ?></td>
												<td><?php echo $d->nombres.' '.$d->apellido1.' '.$d->apellido2; ?></td>
												<td><?php echo $d->organo; ?></td>
												<td><?php echo $d->cuadro; ?></td>
												<td class="text-center">
												<?php $flag = True; $message = 1; $type = True; $pag ="home"; ?>
													<a href="<?php echo base_url()."index.php/controller/viewResponsable/".$flag.'/'.$message.'/'.$type.'/'.$d->ci.'/'.$pag; ?>" title="Ver">
													<button type='button' class='btn btn-sm bg-blue' title="Detalles" ><i class='fas fa-eye' > </i> Detalles</button>
													</a>
													<?php if($this->session->userdata('logged_in')==True) { ?>
														<?php $controlpag = 0?>
														<a href="<?php echo base_url()."index.php/controller/editResponsable/".$d->ci.'/'.$controlpag; ?>"  title="Editar" >
														<button type='button' class='btn btn-sm bg-olive' title="Editar" ><i class='fas fa-pencil-alt'> </i> Editar</button>
														</a>
														<a href="<?php echo base_url()."index.php/controller/delResponsable/".$d->ci; ?>" title="Eliminar">
														<button onclick="return confirmDeleteResp()"  type='button' class='btn btn-sm bg-red delRespresentante' title="Eliminar" ><i class='fas fa-trash' > </i> Eliminar</button>
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
        $(document).ready(function() {
		  
          var busqueda = $("#example1").DataTable({
            "responsive": true,
			"autoWidth": false,
			"language": {
				"lengthMenu": "Mostrar "+ 
					`<select class="custom-select custom-select-sm form-control form-control-sm">
						<option value="10">10</option>
						<option value="25">25</option>
						<option value="50">50</option>
						<option value="100">100</option>
						<option value="-1">Todos</option>
					</select>` + 
					" registros por página",
				"zeroRecords": "Nada encontrado - disculpa",
				"info": "Mostrando la página _PAGE_ de _PAGES_",
				"infoEmpty": "No hay registros disponibles",
				"infoFiltered": "(Filtrado de un total de _MAX_ registros)",
				"search":"Buscar:",
				"paginate": {
					"first": "Primero",
					"last": "Último",
					"next": "Siguiente",
					"previous": "Anterior"
          },
        }
               
           });

           $('#example1 tfoot th').each( function () {
                var title = $(this).text();
                $(this).html( '<input type="text" style="color:black;" placeholder="Buscar" />' );
            } );

            busqueda.columns().every( function () {
                var that = this;
 
                $( 'input', this.footer() ).on( 'keyup change clear', function () {
                        if ( that.search() !== this.value ) {
                            that
                                .search( this.value )
                                .draw();
                        }
                    } );
                } );

           

            


    });
</script>



<script>
	 function confirmDeleteResp() { 
			if(window.confirm("\xbfDesea eliminar este miembro?")){
				return true;
			}
			return false;
			 
		} 

</script>
