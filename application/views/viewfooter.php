<footer class="main-footer">
<img src="<?php echo base_url('dist/img/logo/logo-minint.png'); ?>" style="height:40px; width:40px;" alt="AdminLTE Logo" class="brand-image" ><strong> MININT Bayamo | Potencial Científico Técnico Humano.</strong> <b>Version</b> 1.0.0
   
    
    <div class="float-right d-none d-sm-inline-block">
		<?php  
			$fecha = date('d-m-Y');
			$newDate = date("d-m-Y", strtotime($fecha));				
			$mesDesc = strftime("%d de %B de %Y", strtotime($newDate));
		?>
      <?php if($this->session->userdata('logged_in')==True): ?>
        <strong>Usuario: </strong><?php echo $this->session->userdata('user'); ?><br>
		
        <strong>Fecha: </strong> <?php echo $mesDesc ; ?> 
      <?php endif; ?>
      <?php if($this->session->userdata('logged_in')==False): ?>
        <strong>Fecha: </strong> <?php echo $mesDesc ; ?> 
      <?php	endif; ?>   
    </div>
</footer>




<script src="<?php echo base_url('aqui/main.js'); ?>"></script>


<!-- ./wrapper -->
<!-- jQuery -->
<script src="<?php echo base_url('plugins/bootstrap/js/bs4-form-validation.min.js'); ?>"></script>

<script src="<?php echo base_url('plugins/jquery/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/jquery-validation/jquery.validate.js'); ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>

<script src="<?php echo base_url('plugins/toastr/toastr.min.js'); ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  //$.widget.bridge('uibutton', $.ui.button)
</script>

<script src="<?php echo base_url('plugins/chart.js/Chart.min.js'); ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<!-- ChartJS -->
<script src="<?php echo base_url('plugins/chart.js/Chart.min.js'); ?>"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('plugins/sparklines/sparkline.js'); ?>"></script>
<!-- JQVMap -->
<script src="<?php echo base_url('plugins/jqvmap/jquery.vmap.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/jqvmap/maps/jquery.vmap.usa.js'); ?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('plugins/jquery-knob/jquery.knob.min.js'); ?>"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('plugins/moment/moment.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/daterangepicker/daterangepicker.js'); ?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js'); ?>"></script>
<!-- Summernote -->
<script src="<?php echo base_url('plugins/summernote/summernote-bs4.min.js'); ?>"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('dist/js/adminlte.js'); ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url('dist/js/pages/dashboard.js'); ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('dist/js/demo.js'); ?>"></script>
<!-- Select2 -->
<script src="<?php echo base_url('plugins/select2/js/select2.full.min.js'); ?>"></script>

<script src=".<?php echo base_url('plugins/bs-custom-file-input/bs-custom-file-input.min.js'); ?>"></script>


<!-- a partir de aqui -->


<script src="<?php echo base_url('plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/datatables-responsive/js/dataTables.responsive.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/datatables-buttons/js/dataTables.buttons.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/datatables-buttons/js/buttons.bootstrap4.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/jszip/jszip.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/pdfmake/pdfmake.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/pdfmake/vfs_fonts.js'); ?>"></script>
<script src="<?php echo base_url('plugins/datatables-buttons/js/buttons.html5.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/datatables-buttons/js/buttons.print.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/datatables-buttons/js/buttons.colVis.min.js'); ?>"></script>



<script>
  $(function () {

	$('.select2').select2()

	//Initialize Select2 Elements
	$('.select2bs4').select2({
	theme: 'bootstrap4'
	})

	// datatable listar problematicas asociadas al miembro
    var busquedaproblemas = $("#ltsprobematicas").DataTable({
		//"dom": 'lBfrtip',
		
		"responsive": true,
			"autoWidth": true,
			
			"dom": 'lrtip',
			"language": {
						"lengthMenu": "Mostrar "+ 
							`<select class="custom-select custom-select-sm form-control form-control-sm">
								<option value="5">5</option>
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
				},
				"aoColumnDefs": [{
						"bSortable": false,
						"aTargets": [4]
				}],			
		});
		$('#ltsprobematicas tfoot th').each( function () {
				var title = $(this).text();
				$(this).html( '<input type="text" name="filtar[]" style="color:black;" placeholder="Filtrar" />' );
        //i++;
		} );
		busquedaproblemas.columns().every( function () {
				var that = this;

				$( 'input', this.footer() ).on( 'keyup change clear', function () {
								if ( that.search() !== this.value ) {
										that.search( this.value ).draw();
								}
								
						} );
		
		} );

	// datatable listar ocupacion asociadas al miembro
    var busquedaocup = $("#ltsocupacion").DataTable({
		//"dom": 'lBfrtip',
		
		"responsive": true,
			"autoWidth": true,
			
			"dom": 'lrtip',
			"language": {
						"lengthMenu": "Mostrar "+ 
							`<select class="custom-select custom-select-sm form-control form-control-sm">
								<option value="5">5</option>
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
				},
				"aoColumnDefs": [{
						"bSortable": false,
						"aTargets": [2]
				}],			
		});
		$('#ltsocupacion tfoot th').each( function () {
				var title = $(this).text();
				$(this).html( '<input type="text" name="filtar[]" style="color:black;" placeholder="Filtrar" />' );
        //i++;
		} );
		busquedaocup.columns().every( function () {
				var that = this;

				$( 'input', this.footer() ).on( 'keyup change clear', function () {
								if ( that.search() !== this.value ) {
										that.search( this.value ).draw();
								}
								
						} );
		
		} );

	// datatable listar ocupacion asociadas al miembro
    var busquedaest = $("#ltsestudio").DataTable({
		//"dom": 'lBfrtip',
		
		"responsive": true,
			"autoWidth": true,
			
			"dom": 'lrtip',
			"language": {
						"lengthMenu": "Mostrar "+ 
							`<select class="custom-select custom-select-sm form-control form-control-sm">
								<option value="5">5</option>
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
				},
				"aoColumnDefs": [{
						"bSortable": false,
						"aTargets": []
				}],			
		});
		$('#ltsestudio tfoot th').each( function () {
				var title = $(this).text();
				$(this).html( '<input type="text" name="filtar[]" style="color:black;" placeholder="Filtrar" />' );
        //i++;
		} );
		busquedaest.columns().every( function () {
				var that = this;

				$( 'input', this.footer() ).on( 'keyup change clear', function () {
								if ( that.search() !== this.value ) {
										that.search( this.value ).draw();
								}
								
						} );
		
		} );

	// datatable listar ocupacion asociadas al miembro
    var busquedacurso = $("#ltscursoimpartido").DataTable({
		//"dom": 'lBfrtip',
		
		"responsive": true,
			"autoWidth": true,
			
			"dom": 'lrtip',
			"language": {
						"lengthMenu": "Mostrar "+ 
							`<select class="custom-select custom-select-sm form-control form-control-sm">
								<option value="5">5</option>
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
				},
				"aoColumnDefs": [{
						"bSortable": false,
						"aTargets": []
				}],			
		});
		$('#ltscursoimpartido tfoot th').each( function () {
				var title = $(this).text();
				$(this).html( '<input type="text" name="filtar[]" style="color:black;" placeholder="Filtrar" />' );
        //i++;
		} );
		busquedacurso.columns().every( function () {
				var that = this;

				$( 'input', this.footer() ).on( 'keyup change clear', function () {
								if ( that.search() !== this.value ) {
										that.search( this.value ).draw();
								}
								
						} );
		
		} );


		// datatable listar publicaciones asociadas al miembro
		var busquedapublicaciones = $("#ltspublicaciones").DataTable({
		//"dom": 'lBfrtip',
		
		"dom": 'lrtip',
		"responsive": true,
			"autoWidth": true,
		//	"dom": '<"top"Blf>rtip',
			
			"language": {
						"lengthMenu": "Mostrar "+ 
							`<select class="custom-select custom-select-sm form-control form-control-sm">
								<option value="5">5</option>
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
				},
				"aoColumnDefs": [{
						"bSortable": false,
						"aTargets": [6]
				}],			
		});
		$('#ltspublicaciones tfoot th').each( function () {
				var title = $(this).text();
				$(this).html( '<input type="text" name="filtar[]" style="color:black;" placeholder="Filtrar" />' );
        //i++;
		} );			
		busquedapublicaciones.columns().every( function () {
				var that = this;

				$( 'input', this.footer() ).on( 'keyup change clear', function () {
								if ( that.search() !== this.value ) {
										that.search( this.value ).draw();
								}
								
						} );
		
		} );

		// datatable listar proyecto asociadas al miembro
		var busquedaproyecto = $("#ltsproyecto").DataTable({
		//"dom": 'lBfrtip',
		
		"dom": 'lrtip',
		"responsive": true,
			"autoWidth": true,
		//	"dom": '<"top"Blf>rtip',
			
			"language": {
						"lengthMenu": "Mostrar "+ 
							`<select class="custom-select custom-select-sm form-control form-control-sm">
								<option value="5">5</option>
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
				},
				"aoColumnDefs": [{
						"bSortable": false,
						"aTargets": [3]
				}],			
		});
		$('#ltsproyecto tfoot th').each( function () {
				var title = $(this).text();
				$(this).html( '<input type="text" name="filtar[]" style="color:black;" placeholder="Filtrar" />' );
        //i++;
		} );			
		busquedaproyecto.columns().every( function () {
				var that = this;

				$( 'input', this.footer() ).on( 'keyup change clear', function () {
								if ( that.search() !== this.value ) {
										that.search( this.value ).draw();
								}
								
						} );
		
		} );
	
	// datatable listar actividades asociadas al miembro
    var busquedaact = $("#ltsactividad").DataTable({
		//"dom": 'lBfrtip',
		
		"responsive": true,
			"autoWidth": true,
			
			"dom": 'lrtip',
			"language": {
						"lengthMenu": "Mostrar "+ 
							`<select class="custom-select custom-select-sm form-control form-control-sm">
								<option value="5">5</option>
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
				},
				"aoColumnDefs": [{
						"bSortable": false,
						"aTargets": [2]
				}],			
		});
		$('#ltsactividad tfoot th').each( function () {
				var title = $(this).text();
				$(this).html( '<input type="text" name="filtar[]" style="color:black;" placeholder="Filtrar" />' );
        //i++;
		} );
		busquedaact.columns().every( function () {
				var that = this;

				$( 'input', this.footer() ).on( 'keyup change clear', function () {
								if ( that.search() !== this.value ) {
										that.search( this.value ).draw();
								}
								
						} );
		
		} );


	// datatable listar experiencias profesionales asociadas al miembro
	var busquedaexpprofesionales = $("#ltsexpprofesionales").DataTable({
		//"dom": 'lBfrtip',
		
		"responsive": true,
			"autoWidth": true,
			
			"dom": 'lrtip',
			"language": {
						"lengthMenu": "Mostrar "+ 
							`<select class="custom-select custom-select-sm form-control form-control-sm">
								<option value="5">5</option>
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
				},
				"aoColumnDefs": [{
						"bSortable": false,
						"aTargets": [4]
				}],			
		});
		$('#ltsexpprofesionales tfoot th').each( function () {
				var title = $(this).text();
				$(this).html( '<input type="text" name="filtar[]" style="color:black;" placeholder="Filtrar" />' );
        //i++;
		} );
		busquedaexpprofesionales.columns().every( function () {
				var that = this;

				$( 'input', this.footer() ).on( 'keyup change clear', function () {
								if ( that.search() !== this.value ) {
										that.search( this.value ).draw();
								}
								
						} );
		
		} );


	

	// datatable listar tesis asociadas al miembro
    var busquedatesis = $("#ltstesis").DataTable({
		//"dom": 'lBfrtip',
		
		"responsive": true,
			"autoWidth": true,
			
			"dom": 'lrtip',
			"language": {
						"lengthMenu": "Mostrar "+ 
							`<select class="custom-select custom-select-sm form-control form-control-sm">
								<option value="5">5</option>
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
				},
				"aoColumnDefs": [{
						"bSortable": false,
						"aTargets": [6]
				}],			
		});
		$('#ltstesis tfoot th').each( function () {
				var title = $(this).text();
				$(this).html( '<input type="text" name="filtar[]" style="color:black;" placeholder="Filtrar" />' );
        //i++;
		} );				
		busquedatesis.columns().every( function () {
				var that = this;

				$( 'input', this.footer() ).on( 'keyup change clear', function () {
								if ( that.search() !== this.value ) {
										that.search( this.value ).draw();
								}
								
						} );
		
		} );

    


	// datatable listar innovaciones asociadas al miembro
    var busquedainnovaciones = $("#ltsinnovaciones").DataTable({
		//"dom": 'lBfrtip',
		
		"responsive": true,
			"autoWidth": true,
			
			"dom": 'lrtip',
			"language": {
						"lengthMenu": "Mostrar "+ 
							`<select class="custom-select custom-select-sm form-control form-control-sm">
								<option value="5">5</option>
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
				},
				"aoColumnDefs": [{
						"bSortable": false,
						"aTargets": [5]
				}],			
		});
	
		$('#ltsinnovaciones tfoot th').each( function () {
				var title = $(this).text();
				$(this).html( '<input type="text" name="filtar[]" style="color:black;" placeholder="Filtrar" />' );
        //i++;
		} );				
		busquedainnovaciones.columns().every( function () {
				var that = this;

				$( 'input', this.footer() ).on( 'keyup change clear', function () {
								if ( that.search() !== this.value ) {
										that.search( this.value ).draw();
								}
								
						} );
		
		} );
	

	// datatable listar organizaciones asociadas al miembro
    var busquedaorganizaciones = $("#ltsorganizaciones").DataTable({
		//"dom": 'lBfrtip',
		"responsive": true,
			"autoWidth": true,
			
			"dom": 'lrtip',
			"language": {
						"lengthMenu": "Mostrar "+ 
							`<select class="custom-select custom-select-sm form-control form-control-sm">
								<option value="5">5</option>
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
				},
				"aoColumnDefs": [{
						"bSortable": false,
						"aTargets": [2]
				}],			
		});
	
		$('#ltsorganizaciones tfoot th').each( function () {
				var title = $(this).text();
				$(this).html( '<input type="text" name="filtar[]" style="color:black;" placeholder="Filtrar" />' );
        //i++;
		} );				
		busquedaorganizaciones.columns().every( function () {
				var that = this;

				$( 'input', this.footer() ).on( 'keyup change clear', function () {
								if ( that.search() !== this.value ) {
										that.search( this.value ).draw();
								}
								
						} );
		
		} );
	
	// datatable listar organizaciones asociadas al miembro
    var busquedaasociaciones = $("#ltsasociaciones").DataTable({
		//"dom": 'lBfrtip',
		
		"responsive": true,
			"autoWidth": true,
			
			"dom": 'lrtip',
			"language": {
						"lengthMenu": "Mostrar "+ 
							`<select class="custom-select custom-select-sm form-control form-control-sm">
								<option value="5">5</option>
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
				},
				"aoColumnDefs": [{
						"bSortable": false,
						"aTargets": [2]
				}],			
		});
		$('#ltsasociaciones tfoot th').each( function () {
				var title = $(this).text();
				$(this).html( '<input type="text" name="filtar[]" style="color:black;" placeholder="Filtrar" />' );
        //i++;
		} );	
		busquedaasociaciones.columns().every( function () {
				var that = this;

				$( 'input', this.footer() ).on( 'keyup change clear', function () {
								if ( that.search() !== this.value ) {
										that.search( this.value ).draw();
								}
								
						} );
		
		} );

	


	// datatable listar idiomas asociadas al miembro
    var busquedaidiomas = $("#ltsidiomas").DataTable({
		//"dom": 'lBfrtip',
		
		"responsive": true,
			"autoWidth": true,
		//	"dom": '<"top"Blf>rtip',
			
		"dom": 'lrtip',
			"language": {
						"lengthMenu": "Mostrar "+ 
							`<select class="custom-select custom-select-sm form-control form-control-sm">
								<option value="5">5</option>
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
				},
				"aoColumnDefs": [{
						"bSortable": false,
						"aTargets": [4]
				}],			
		});
		$('#ltsidiomas tfoot th').each( function () {
				var title = $(this).text();
				$(this).html( '<input type="text" name="filtar[]" style="color:black;" placeholder="Filtrar" />' );
        //i++;
		} );			
		busquedaidiomas.columns().every( function () {
				var that = this;

				$( 'input', this.footer() ).on( 'keyup change clear', function () {
								if ( that.search() !== this.value ) {
										that.search( this.value ).draw();
								}
								
						} );
		
		} );


	// datatable listar colaboraciones asociadas al miembro
    var busquedacolaboraciones = $("#ltscolaboraciones").DataTable({
		//"dom": 'lBfrtip',
		
		"responsive": true,
			"autoWidth": true,
		//	"dom": '<"top"Blf>rtip',
			
		"dom": 'lrtip',
			"language": {
						"lengthMenu": "Mostrar "+ 
							`<select class="custom-select custom-select-sm form-control form-control-sm">
								<option value="5">5</option>
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
				},
				"aoColumnDefs": [{
						"bSortable": false,
						"aTargets": [3]
				}],			
		});
		$('#ltscolaboraciones tfoot th').each( function () {
				var title = $(this).text();
				$(this).html( '<input type="text" name="filtar[]" style="color:black;" placeholder="Filtrar" />' );
        //i++;
		} );			
		busquedacolaboraciones.columns().every( function () {
				var that = this;

				$( 'input', this.footer() ).on( 'keyup change clear', function () {
								if ( that.search() !== this.value ) {
										that.search( this.value ).draw();
								}
								
						} );
		
		} );
	// datatable listar asesorias asociadas al miembro
    var busquedaasesorias = $("#ltsasesorias").DataTable({
		//"dom": 'lBfrtip',
		
		"responsive": true,
			"autoWidth": true,
		//	"dom": '<"top"Blf>rtip',
			
		"dom": 'lrtip',
			"language": {
						"lengthMenu": "Mostrar "+ 
							`<select class="custom-select custom-select-sm form-control form-control-sm">
								<option value="5">5</option>
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
				},
				"aoColumnDefs": [{
						"bSortable": false,
						"aTargets": [2]
				}],			
		});
		$('#ltsasesorias tfoot th').each( function () {
				var title = $(this).text();
				$(this).html( '<input type="text" name="filtar[]" style="color:black;" placeholder="Filtrar" />' );
        //i++;
		} );			
		busquedaasesorias.columns().every( function () {
				var that = this;

				$( 'input', this.footer() ).on( 'keyup change clear', function () {
								if ( that.search() !== this.value ) {
										that.search( this.value ).draw();
								}
								
						} );
		
		} );

	// datatable listar eventos asociadas al miembro
    var busquedaeventos = $("#ltseventos").DataTable({
		//"dom": 'lBfrtip',
		
		"responsive": true,
			"autoWidth": true,
		//	"dom": '<"top"Blf>rtip',
			
		"dom": 'lrtip',
			"language": {
						"lengthMenu": "Mostrar "+ 
							`<select class="custom-select custom-select-sm form-control form-control-sm">
								<option value="5">5</option>
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
				},
				"aoColumnDefs": [{
						"bSortable": false,
						"aTargets": []
				}],			
		});
		$('#ltseventos tfoot th').each( function () {
				var title = $(this).text();
				$(this).html( '<input type="text" name="filtar[]" style="color:black;" placeholder="Filtrar" />' );
        //i++;
		} );			
		busquedaeventos.columns().every( function () {
				var that = this;

				$( 'input', this.footer() ).on( 'keyup change clear', function () {
								if ( that.search() !== this.value ) {
										that.search( this.value ).draw();
								}
								
						} );
		
		} );
	// datatable listar investigaciones asociadas al miembro
    var busquedainvestigaciones = $("#ltsinvestigaciones").DataTable({
		//"dom": 'lBfrtip',
		
		"dom": 'lrtip',
		"responsive": true,
			"autoWidth": true,
		//	"dom": '<"top"Blf>rtip',
			
			"language": {
						"lengthMenu": "Mostrar "+ 
							`<select class="custom-select custom-select-sm form-control form-control-sm">
								<option value="5">5</option>
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
				},
				"aoColumnDefs": [{
						"bSortable": false,
						"aTargets": [2]
				}],			
		});
		$('#ltsinvestigaciones tfoot th').each( function () {
				var title = $(this).text();
				$(this).html( '<input type="text" name="filtar[]" style="color:black;" placeholder="Filtrar" />' );
        //i++;
		} );			
		busquedainvestigaciones.columns().every( function () {
				var that = this;

				$( 'input', this.footer() ).on( 'keyup change clear', function () {
								if ( that.search() !== this.value ) {
										that.search( this.value ).draw();
								}
								
						} );
		
		} );
	// datatable listar reconocimientos asociadas al miembro
    var busquedareconocimientos = $("#ltsreconocimientos").DataTable({
		//"dom": 'lBfrtip',
		
		"dom": 'lrtip',
		"responsive": true,
			"autoWidth": true,
		//	"dom": '<"top"Blf>rtip',
			
			"language": {
						"lengthMenu": "Mostrar "+ 
							`<select class="custom-select custom-select-sm form-control form-control-sm">
								<option value="5">5</option>
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
				},
				"aoColumnDefs": [{
						"bSortable": false,
						"aTargets": [3]
				}],			
		});
		$('#ltsreconocimientos tfoot th').each( function () {
				var title = $(this).text();
				$(this).html( '<input type="text" name="filtar[]" style="color:black;" placeholder="Filtrar" />' );
        //i++;
		} );			
		busquedareconocimientos.columns().every( function () {
				var that = this;

				$( 'input', this.footer() ).on( 'keyup change clear', function () {
								if ( that.search() !== this.value ) {
										that.search( this.value ).draw();
								}
								
						} );
		
		} );

	// datatable listar misiones asociadas al miembro
    var busquedamisiones = $("#ltsmisiones").DataTable({
		//"dom": 'lBfrtip',
		
		"dom": 'lrtip',
		"responsive": true,
			"autoWidth": true,
		//	"dom": '<"top"Blf>rtip',
			
			"language": {
						"lengthMenu": "Mostrar "+ 
							`<select class="custom-select custom-select-sm form-control form-control-sm">
								<option value="5">5</option>
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
				},
				"aoColumnDefs": [{
						"bSortable": false,
						"aTargets": [3]
				}],			
		});
		$('#ltsmisiones tfoot th').each( function () {
				var title = $(this).text();
				$(this).html( '<input type="text" name="filtar[]" style="color:black;" placeholder="Filtrar" />' );
        //i++;
		} );			
		busquedamisiones.columns().every( function () {
				var that = this;

				$( 'input', this.footer() ).on( 'keyup change clear', function () {
								if ( that.search() !== this.value ) {
										that.search( this.value ).draw();
								}
								
						} );
		
		} );
	

	// datatable listar pc asociadas al miembro
    var busquedapcs = $("#ltspc").DataTable({
		//"dom": 'lBfrtip',
		
		"dom": 'lrtip',
		"responsive": true,
			"autoWidth": true,
		//	"dom": '<"top"Blf>rtip',
			
			"language": {
						"lengthMenu": "Mostrar "+ 
							`<select class="custom-select custom-select-sm form-control form-control-sm">
								<option value="5">5</option>
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
				},
				"aoColumnDefs": [{
						"bSortable": false,
						"aTargets": [2]
				}],			
		});
		$('#ltspc tfoot th').each( function () {
				var title = $(this).text();
				$(this).html( '<input type="text" name="filtar[]" style="color:black;" placeholder="Filtrar" />' );
        //i++;
		} );		
		busquedapcs.columns().every( function () {
				var that = this;

				$( 'input', this.footer() ).on( 'keyup change clear', function () {
								if ( that.search() !== this.value ) {
										that.search( this.value ).draw();
								}
								
						} );
		
		} );
	// datatable listar telefonos asociadas al miembro
    var busquedatelefonos = $("#ltstelefono").DataTable({
		//"dom": 'lBfrtip',
		
		"dom": 'lrtip',
		"responsive": true,
			"autoWidth": true,
		//	"dom": '<"top"Blf>rtip',
			
			"language": {
						"lengthMenu": "Mostrar "+ 
							`<select class="custom-select custom-select-sm form-control form-control-sm">
								<option value="5">5</option>
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
				},
				"aoColumnDefs": [{
						"bSortable": false,
						"aTargets": [3]
				}],			
		});
		$('#ltstelefono tfoot th').each( function () {
				var title = $(this).text();
				$(this).html( '<input type="text" name="filtar[]" style="color:black;" placeholder="Filtrar" />' );
        //i++;
		} );			
		busquedatelefonos.columns().every( function () {
				var that = this;

				$( 'input', this.footer() ).on( 'keyup change clear', function () {
								if ( that.search() !== this.value ) {
										that.search( this.value ).draw();
								}
								
						} );
		
		} );
	// datatable listar tablet asociadas al miembro
    var busquedatablet = $("#ltstablet").DataTable({
		//"dom": 'lBfrtip',
		
		"dom": 'lrtip',
		"responsive": true,
			"autoWidth": true,
		//	"dom": '<"top"Blf>rtip',
			
			"language": {
						"lengthMenu": "Mostrar "+ 
							`<select class="custom-select custom-select-sm form-control form-control-sm">
								<option value="5">5</option>
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
				},
				"aoColumnDefs": [{
						"bSortable": false,
						"aTargets": [2]
				}],			
		});
		$('#ltstablet tfoot th').each( function () {
				var title = $(this).text();
				$(this).html( '<input type="text" name="filtar[]" style="color:black;" placeholder="Filtrar" />' );
        //i++;
		} );			
		busquedatablet.columns().every( function () {
				var that = this;

				$( 'input', this.footer() ).on( 'keyup change clear', function () {
								if ( that.search() !== this.value ) {
										that.search( this.value ).draw();
								}
								
						} );
		
		} );
	// datatable listar correo asociadas al miembro
    var busquedacorreo = $("#ltscorreo").DataTable({
		//"dom": 'lBfrtip',
		
		"dom": 'lrtip',
		"responsive": true,
			"autoWidth": true,
		//	"dom": '<"top"Blf>rtip',
			
			"language": {
						"lengthMenu": "Mostrar "+ 
							`<select class="custom-select custom-select-sm form-control form-control-sm">
								<option value="5">5</option>
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
				},
				"aoColumnDefs": [{
						"bSortable": false,
						"aTargets": [2]
				}],			
		});
		$('#ltscorreo tfoot th').each( function () {
				var title = $(this).text();
				$(this).html( '<input type="text" name="filtar[]" style="color:black;" placeholder="Filtrar" />' );
        //i++;
		} );			
		busquedacorreo.columns().every( function () {
				var that = this;

				$( 'input', this.footer() ).on( 'keyup change clear', function () {
								if ( that.search() !== this.value ) {
										that.search( this.value ).draw();
								}
								
						} );
		
		} );
	// datatable listar facebook asociadas al miembro
    var busquedarfacebook = $("#ltsfacebook").DataTable({
		//"dom": 'lBfrtip',
		
		"dom": 'lrtip',
		"responsive": true,
			"autoWidth": true,
		//	"dom": '<"top"Blf>rtip',
			
			"language": {
						"lengthMenu": "Mostrar "+ 
							`<select class="custom-select custom-select-sm form-control form-control-sm">
								<option value="5">5</option>
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
				},
				"aoColumnDefs": [{
						"bSortable": false,
						"aTargets": [2]
				}],			
		});
		$('#ltsfacebook tfoot th').each( function () {
				var title = $(this).text();
				$(this).html( '<input type="text" name="filtar[]" style="color:black;" placeholder="Filtrar" />' );
        //i++;
		} );			
		busquedarfacebook.columns().every( function () {
				var that = this;

				$( 'input', this.footer() ).on( 'keyup change clear', function () {
								if ( that.search() !== this.value ) {
										that.search( this.value ).draw();
								}
								
						} );
		
		} );
	
	// datatable listar vivienda asociadas al miembro
    var busquedarvivienda = $("#ltsvivienda").DataTable({
		//"dom": 'lBfrtip',
		
		"dom": 'lrtip',
		"responsive": true,
			"autoWidth": true,
		//	"dom": '<"top"Blf>rtip',
			
			"language": {
						"lengthMenu": "Mostrar "+ 
							`<select class="custom-select custom-select-sm form-control form-control-sm">
								<option value="5">5</option>
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
				},
				"aoColumnDefs": [{
						"bSortable": false,
						"aTargets": [2]
				}],			
		});
		$('#ltsvivienda tfoot th').each( function () {
				var title = $(this).text();
				$(this).html( '<input type="text" name="filtar[]" style="color:black;" placeholder="Filtrar" />' );
        //i++;
		} );			
		busquedarvivienda.columns().every( function () {
				var that = this;

				$( 'input', this.footer() ).on( 'keyup change clear', function () {
								if ( that.search() !== this.value ) {
										that.search( this.value ).draw();
								}
								
						} );
		
		} );
	// datatable listar transporte asociadas al miembro
    var busquedartransporte = $("#ltstransporte").DataTable({
		//"dom": 'lBfrtip',
		
		"dom": 'lrtip',
		"responsive": true,
			"autoWidth": true,
		//	"dom": '<"top"Blf>rtip',
			
			"language": {
						"lengthMenu": "Mostrar "+ 
							`<select class="custom-select custom-select-sm form-control form-control-sm">
								<option value="5">5</option>
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
				},
				"aoColumnDefs": [{
						"bSortable": false,
						"aTargets": [2]
				}],			
		});
		$('#ltstransporte tfoot th').each( function () {
				var title = $(this).text();
				$(this).html( '<input type="text" name="filtar[]" style="color:black;" placeholder="Filtrar" />' );
        //i++;
		} );			
		busquedartransporte.columns().every( function () {
				var that = this;

				$( 'input', this.footer() ).on( 'keyup change clear', function () {
								if ( that.search() !== this.value ) {
										that.search( this.value ).draw();
								}
								
						} );
		
		} );

	// datatable listar cat docente asociadas al miembro
    var busquedarltscatdocente = $("#ltscatdocente").DataTable({
		//"dom": 'lBfrtip',
		
		"dom": 'lrtip',
		"responsive": true,
			"autoWidth": true,
		//	"dom": '<"top"Blf>rtip',
			
			"language": {
						"lengthMenu": "Mostrar "+ 
							`<select class="custom-select custom-select-sm form-control form-control-sm">
								<option value="5">5</option>
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
				},
				"aoColumnDefs": [{
						"bSortable": false,
						"aTargets": [5]
				}],			
		});
		$('#ltscatdocente tfoot th').each( function () {
				var title = $(this).text();
				$(this).html( '<input type="text" name="filtar[]" style="color:black;" placeholder="Filtrar" />' );
        //i++;
		} );			
		busquedarltscatdocente.columns().every( function () {
				var that = this;

				$( 'input', this.footer() ).on( 'keyup change clear', function () {
								if ( that.search() !== this.value ) {
										that.search( this.value ).draw();
								}
								
						} );
		
		} );
	

	// datatable listar cat cientifica asociadas al miembro
    var busquedarltscatcientifica = $("#ltscatcientifica").DataTable({
		//"dom": 'lBfrtip',
		
		"dom": 'lrtip',
		"responsive": true,
			"autoWidth": true,
		//	"dom": '<"top"Blf>rtip',
			
			"language": {
						"lengthMenu": "Mostrar "+ 
							`<select class="custom-select custom-select-sm form-control form-control-sm">
								<option value="5">5</option>
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
				},
				"aoColumnDefs": [{
						"bSortable": false,
						"aTargets": [2]
				}],			
		});
		$('#ltscatcientifica tfoot th').each( function () {
				var title = $(this).text();
				$(this).html( '<input type="text" name="filtar[]" style="color:black;" placeholder="Filtrar" />' );
        //i++;
		} );			
		busquedarltscatcientifica.columns().every( function () {
				var that = this;

				$( 'input', this.footer() ).on( 'keyup change clear', function () {
								if ( that.search() !== this.value ) {
										that.search( this.value ).draw();
								}
								
						} );
		
		} );

	
	// datatable listar cat cursoentrenamiento asociadas al miembro
    var busquedarcursoentrenamiento = $("#ltscursoentrenamiento").DataTable({
		//"dom": 'lBfrtip',
		
		"dom": 'lrtip',
		"responsive": true,
			"autoWidth": true,
		//	"dom": '<"top"Blf>rtip',
			
			"language": {
						"lengthMenu": "Mostrar "+ 
							`<select class="custom-select custom-select-sm form-control form-control-sm">
								<option value="5">5</option>
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
				},
				"aoColumnDefs": [{
						"bSortable": false,
						"aTargets": [5]
				}],			
		});
		$('#ltscursoentrenamiento tfoot th').each( function () {
				var title = $(this).text();
				$(this).html( '<input type="text" name="filtar[]" style="color:black;" placeholder="Filtrar" />' );
        //i++;
		} );			
		busquedarcursoentrenamiento.columns().every( function () {
				var that = this;

				$( 'input', this.footer() ).on( 'keyup change clear', function () {
								if ( that.search() !== this.value ) {
										that.search( this.value ).draw();
								}
								
						} );
		
		} );

	
	// datatable listar cat postgrados asociadas al miembro
    var busquedarpostgrados = $("#ltspostgrados").DataTable({
		//"dom": 'lBfrtip',
		
		"dom": 'lrtip',
		"responsive": true,
			"autoWidth": true,
		//	"dom": '<"top"Blf>rtip',
			
			"language": {
						"lengthMenu": "Mostrar "+ 
							`<select class="custom-select custom-select-sm form-control form-control-sm">
								<option value="5">5</option>
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
				},
				"aoColumnDefs": [{
						"bSortable": false,
						"aTargets": [6]
				}],			
		});
		$('#ltspostgrados tfoot th').each( function () {
				var title = $(this).text();
				$(this).html( '<input type="text" name="filtar[]" style="color:black;" placeholder="Filtrar" />' );
        //i++;
		} );			
		busquedarpostgrados.columns().every( function () {
				var that = this;

				$( 'input', this.footer() ).on( 'keyup change clear', function () {
								if ( that.search() !== this.value ) {
										that.search( this.value ).draw();
								}
								
						} );
		
		} );
	// datatable listar cat tituloacademico asociadas al miembro
    var busquedatituloacademico = $("#ltstituloacademico").DataTable({
		//"dom": 'lBfrtip',
		
		"dom": 'lrtip',
		"responsive": true,
			"autoWidth": true,
		//	"dom": '<"top"Blf>rtip',
			
			"language": {
						"lengthMenu": "Mostrar "+ 
							`<select class="custom-select custom-select-sm form-control form-control-sm">
								<option value="5">5</option>
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
				},
				"aoColumnDefs": [{
						"bSortable": false,
						"aTargets": [5]
				}],			
		});
		$('#ltstituloacademico tfoot th').each( function () {
				var title = $(this).text();
				$(this).html( '<input type="text" name="filtar[]" style="color:black;" placeholder="Filtrar" />' );
        //i++;
		} );			
		busquedatituloacademico.columns().every( function () {
				var that = this;

				$( 'input', this.footer() ).on( 'keyup change clear', function () {
								if ( that.search() !== this.value ) {
										that.search( this.value ).draw();
								}
								
						} );
		
		} );
	

	

	
	// datatable listar bancoproblemas asociadas al miembro
    var busquedabancoproblemas = $("#ltsbancoproblemas").DataTable({
		//"dom": 'lBfrtip',
		
		"dom": 'lrtip',
		"responsive": true,
			"autoWidth": true,
		//	"dom": '<"top"Blf>rtip',
			
			"language": {
						"lengthMenu": "Mostrar "+ 
							`<select class="custom-select custom-select-sm form-control form-control-sm">
								<option value="5">5</option>
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
				},
				"aoColumnDefs": [{
						"bSortable": false,
						"aTargets": [5]
				}],			
		});
		$('#ltsbancoproblemas tfoot th').each( function () {
				var title = $(this).text();
				$(this).html( '<input type="text" name="filtar[]" style="color:black;" placeholder="Filtrar" />' );
        //i++;
		} );			
		busquedabancoproblemas.columns().every( function () {
				var that = this;

				$( 'input', this.footer() ).on( 'keyup change clear', function () {
								if ( that.search() !== this.value ) {
										that.search( this.value ).draw();
								}
								
						} );
		
		} );


		// datatable listar experiencias profesionales asociadas al miembro PDF
	var busquedaexpprofesionalespdf = $("#ltsexpprofpdf").DataTable({
		//"dom": 'lBfrtip',
		
		"responsive": true,
			"autoWidth": true,
			
			"dom": 'lrtip',
			"language": {
						"lengthMenu": "Mostrar "+ 
							`<select class="custom-select custom-select-sm form-control form-control-sm">
								<option value="5">5</option>
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
				},
				"aoColumnDefs": [{
						"bSortable": false,
						"aTargets": []
				}],			
		});
		$('#ltsexpprofpdf tfoot th').each( function () {
				var title = $(this).text();
				$(this).html( '<input type="text" name="filtar[]" style="color:black;" placeholder="Filtrar" />' );
        //i++;
		} );
		busquedaexpprofesionalespdf.columns().every( function () {
				var that = this;

				$( 'input', this.footer() ).on( 'keyup change clear', function () {
								if ( that.search() !== this.value ) {
										that.search( this.value ).draw();
								}
								
						} );
		
		} );


        var busquedatesispdf = $("#ltstesispdf").DataTable({
            //"dom": 'lBfrtip',
            
            "responsive": true,
                "autoWidth": true,
                
                "dom": 'lrtip',
                "language": {
                            "lengthMenu": "Mostrar "+ 
                                `<select class="custom-select custom-select-sm form-control form-control-sm">
                                    <option value="5">5</option>
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
                    },
                    "aoColumnDefs": [{
                            "bSortable": false,
                            "aTargets": []
                    }],			
            });
            $('#ltstesispdf tfoot th').each( function () {
                    var title = $(this).text();
                    $(this).html( '<input type="text" name="filtar[]" style="color:black;" placeholder="Filtrar" />' );
            //i++;
            } );				
            busquedatesispdf.columns().every( function () {
                    var that = this;
    
                    $( 'input', this.footer() ).on( 'keyup change clear', function () {
                                    if ( that.search() !== this.value ) {
                                            that.search( this.value ).draw();
                                    }
                                    
                            } );
            
            } );


            // datatable listar innovaciones asociadas al miembro
    var busquedainnovacionespdf = $("#ltsInnovacionespdf").DataTable({
		//"dom": 'lBfrtip',
		
		"responsive": true,
			"autoWidth": true,
			
			"dom": 'lrtip',
			"language": {
						"lengthMenu": "Mostrar "+ 
							`<select class="custom-select custom-select-sm form-control form-control-sm">
								<option value="5">5</option>
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
				},
				"aoColumnDefs": [{
						"bSortable": false,
						"aTargets": []
				}],			
		});
	
		$('#ltsInnovacionespdf tfoot th').each( function () {
				var title = $(this).text();
				$(this).html( '<input type="text" name="filtar[]" style="color:black;" placeholder="Filtrar" />' );
        //i++;
		} );				
		busquedainnovacionespdf.columns().every( function () {
				var that = this;

				$( 'input', this.footer() ).on( 'keyup change clear', function () {
								if ( that.search() !== this.value ) {
										that.search( this.value ).draw();
								}
								
						} );
		
		} );



        // datatable listar organizaciones asociadas al miembro
    var busquedaorganizacionespdf = $("#ltsorganizacionespdf").DataTable({
		//"dom": 'lBfrtip',
		"responsive": true,
			"autoWidth": true,
			
			"dom": 'lrtip',
			"language": {
						"lengthMenu": "Mostrar "+ 
							`<select class="custom-select custom-select-sm form-control form-control-sm">
								<option value="5">5</option>
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
				},
				"aoColumnDefs": [{
						"bSortable": false,
						"aTargets": []
				}],			
		});
	
		$('#ltsorganizacionespdf tfoot th').each( function () {
				var title = $(this).text();
				$(this).html( '<input type="text" name="filtar[]" style="color:black;" placeholder="Filtrar" />' );
        //i++;
		} );				
		busquedaorganizacionespdf.columns().every( function () {
				var that = this;

				$( 'input', this.footer() ).on( 'keyup change clear', function () {
								if ( that.search() !== this.value ) {
										that.search( this.value ).draw();
								}
								
						} );
		
		} );

// datatable listar organizaciones asociadas al miembro
var busquedaasociacionespdf = $("#ltsasociacionpdf").DataTable({
    //"dom": 'lBfrtip',
    
    "responsive": true,
        "autoWidth": true,
        
        "dom": 'lrtip',
        "language": {
                    "lengthMenu": "Mostrar "+ 
                        `<select class="custom-select custom-select-sm form-control form-control-sm">
                            <option value="5">5</option>
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
            },
            "aoColumnDefs": [{
                    "bSortable": false,
                    "aTargets": []
            }],			
    });
    $('#ltsasociacionpdf tfoot th').each( function () {
            var title = $(this).text();
            $(this).html( '<input type="text" name="filtar[]" style="color:black;" placeholder="Filtrar" />' );
    //i++;
    } );	
    busquedaasociacionespdf.columns().every( function () {
            var that = this;

            $( 'input', this.footer() ).on( 'keyup change clear', function () {
                            if ( that.search() !== this.value ) {
                                    that.search( this.value ).draw();
                            }
                            
                    } );
    
    } );


    // datatable listar publicaciones asociadas al miembro
    var busquedapublicacionespdf = $("#ltspublicacionespdf").DataTable({
		//"dom": 'lBfrtip',
		
		"dom": 'lrtip',
		"responsive": true,
			"autoWidth": true,
		//	"dom": '<"top"Blf>rtip',
			
			"language": {
						"lengthMenu": "Mostrar "+ 
							`<select class="custom-select custom-select-sm form-control form-control-sm">
								<option value="5">5</option>
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
				},
				"aoColumnDefs": [{
						"bSortable": false,
						"aTargets": []
				}],			
		});
		$('#ltspublicacionespdf tfoot th').each( function () {
				var title = $(this).text();
				$(this).html( '<input type="text" name="filtar[]" style="color:black;" placeholder="Filtrar" />' );
        //i++;
		} );			
		busquedapublicacionespdf.columns().every( function () {
				var that = this;

				$( 'input', this.footer() ).on( 'keyup change clear', function () {
								if ( that.search() !== this.value ) {
										that.search( this.value ).draw();
								}
								
						} );
		
		} );


        // datatable listar cat docente asociadas al miembro
    var busquedarltscatdocentepdf = $("#ltscatdocentepdf").DataTable({
		//"dom": 'lBfrtip',
		
		"dom": 'lrtip',
		"responsive": true,
			"autoWidth": true,
		//	"dom": '<"top"Blf>rtip',
			
			"language": {
						"lengthMenu": "Mostrar "+ 
							`<select class="custom-select custom-select-sm form-control form-control-sm">
								<option value="5">5</option>
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
				},
				"aoColumnDefs": [{
						"bSortable": false,
						"aTargets": []
				}],			
		});
		$('#ltscatdocentepdf tfoot th').each( function () {
				var title = $(this).text();
				$(this).html( '<input type="text" name="filtar[]" style="color:black;" placeholder="Filtrar" />' );
        //i++;
		} );			
		busquedarltscatdocentepdf.columns().every( function () {
				var that = this;

				$( 'input', this.footer() ).on( 'keyup change clear', function () {
								if ( that.search() !== this.value ) {
										that.search( this.value ).draw();
								}
								
						} );
		
		} );


        // datatable listar cat cientifica asociadas al miembro
    var busquedarltscatcientificapdf = $("#ltscatcientificapdf").DataTable({
		//"dom": 'lBfrtip',
		
		"dom": 'lrtip',
		"responsive": true,
			"autoWidth": true,
		//	"dom": '<"top"Blf>rtip',
			
			"language": {
						"lengthMenu": "Mostrar "+ 
							`<select class="custom-select custom-select-sm form-control form-control-sm">
								<option value="5">5</option>
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
				},
				"aoColumnDefs": [{
						"bSortable": false,
						"aTargets": [2]
				}],			
		});
		$('#ltscatcientificapdf tfoot th').each( function () {
				var title = $(this).text();
				$(this).html( '<input type="text" name="filtar[]" style="color:black;" placeholder="Filtrar" />' );
        //i++;
		} );			
		busquedarltscatcientificapdf.columns().every( function () {
				var that = this;

				$( 'input', this.footer() ).on( 'keyup change clear', function () {
								if ( that.search() !== this.value ) {
										that.search( this.value ).draw();
								}
								
						} );
		
		} );

        // datatable listar cat cursoentrenamiento asociadas al miembro
    var busquedarcursoentrenamientopdf = $("#ltscursoentpdf").DataTable({
		//"dom": 'lBfrtip',
		
		"dom": 'lrtip',
		"responsive": true,
			"autoWidth": true,
		//	"dom": '<"top"Blf>rtip',
			
			"language": {
						"lengthMenu": "Mostrar "+ 
							`<select class="custom-select custom-select-sm form-control form-control-sm">
								<option value="5">5</option>
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
				},
				"aoColumnDefs": [{
						"bSortable": false,
						"aTargets": []
				}],			
		});
		$('#ltscursoentpdf tfoot th').each( function () {
				var title = $(this).text();
				$(this).html( '<input type="text" name="filtar[]" style="color:black;" placeholder="Filtrar" />' );
        //i++;
		} );			
		busquedarcursoentrenamientopdf.columns().every( function () {
				var that = this;

				$( 'input', this.footer() ).on( 'keyup change clear', function () {
								if ( that.search() !== this.value ) {
										that.search( this.value ).draw();
								}
								
						} );
		
		} );

        // datatable listar cat tituloacademico asociadas al miembro
    var busquedatituloacademicopdf = $("#ltstituloacadempdf").DataTable({
		//"dom": 'lBfrtip',
		
		"dom": 'lrtip',
		"responsive": true,
			"autoWidth": true,
		//	"dom": '<"top"Blf>rtip',
			
			"language": {
						"lengthMenu": "Mostrar "+ 
							`<select class="custom-select custom-select-sm form-control form-control-sm">
								<option value="5">5</option>
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
				},
				"aoColumnDefs": [{
						"bSortable": false,
						"aTargets": []
				}],			
		});
		$('#ltstituloacadempdf tfoot th').each( function () {
				var title = $(this).text();
				$(this).html( '<input type="text" name="filtar[]" style="color:black;" placeholder="Filtrar" />' );
        //i++;
		} );			
		busquedatituloacademicopdf.columns().every( function () {
				var that = this;

				$( 'input', this.footer() ).on( 'keyup change clear', function () {
								if ( that.search() !== this.value ) {
										that.search( this.value ).draw();
								}
								
						} );
		
		} );


        // datatable listar proyecto asociadas al miembro
    var busquedaproyectopdf = $("#ltsproyectospdf").DataTable({
		//"dom": 'lBfrtip',
		
		"dom": 'lrtip',
		"responsive": true,
			"autoWidth": true,
		//	"dom": '<"top"Blf>rtip',
			
			"language": {
						"lengthMenu": "Mostrar "+ 
							`<select class="custom-select custom-select-sm form-control form-control-sm">
								<option value="5">5</option>
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
				},
				"aoColumnDefs": [{
						"bSortable": false,
						"aTargets": []
				}],			
		});
		$('#ltsproyectospdf tfoot th').each( function () {
				var title = $(this).text();
				$(this).html( '<input type="text" name="filtar[]" style="color:black;" placeholder="Filtrar" />' );
        //i++;
		} );			
		busquedaproyectopdf.columns().every( function () {
				var that = this;

				$( 'input', this.footer() ).on( 'keyup change clear', function () {
								if ( that.search() !== this.value ) {
										that.search( this.value ).draw();
								}
								
						} );
		
		} );

	



	

				

 
 });
</script> 

</body>


</html>
