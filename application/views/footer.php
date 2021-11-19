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
        <strong>Fecha: </strong> <?php echo $mesDesc; ?> 
      <?php endif; ?>
      <?php if($this->session->userdata('logged_in')==False): ?>
        <strong>Fecha: </strong> <?php echo $mesDesc; ?> 
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
<!-- a partir de aqui -->


<!-- esto es del chart.js-->
<script src="<?php echo base_url('plugins/chart.js/Chart.min.js'); ?>"></script>
<script>
    $(function() {
        var barChartCanvas = $('#barChart').get(0).getContext('2d')
        var labels = [];
        var miembros = [];
        var datos = [];
        var datosfinal = [];
        var miembrosfinal = [];

      //obtengo el nombre de los miembros
      "<?php foreach($valores->result() as $miemb):?>"
          labels.push("<?php echo $miemb->nombres.' '.$miemb->apellido1.' '.$miemb->apellido2; ?>")
          miembros.push("<?php echo $miemb->ci; ?>")
      "<?php endforeach;?>"

      //Contabilizo la cantidad de problematicas asociados al miemrbro
      var cont = 0;
      for (var i = 0; i < labels.length; i++) {
          "<?php foreach($bmiembro->result() as $bm):?>"
            if (miembros[i] == "<?php echo $bm->datospersonales_ci ; ?>") {
                cont++;
            }
          "<?php endforeach;?>"
          //alert(labels[i]+" "+cont);
          datos.push(cont);
          cont = 0;
      }

      // metodo de burbuja para ordenar de mayor a nemor
      for(var i = 0; i< datos.length; i++){
        for(var j = i+1; j <= datos.length; j++){
          if(datos[i] < datos[j]){
            vardatos = datos[i];
            datos[i] = datos[j];
            datos[j] = vardatos;
            varmiembro = labels[i];
            labels[i] = labels[j];
            labels[j] = varmiembro;
          }
        }
      }

      // recorro hasta 5
      for(var i=0; i < 5; i++){
        datosfinal.push( datos[i]);
        miembrosfinal.push(labels[i]);
      }

      //mando a pintar
      var barChartData = {
        labels: miembrosfinal,
        datasets: [
        {
            label: 'Cantidad de problemáticas',
            backgroundColor: 'rgba(26,93,36,0.9)',
            borderColor: 'rgba(26,93,36,0.8)',
            pointRadius: false,
            pointColor: '#3b8bba',
            pointStrokeColor: 'rgba(26,93,36,1)',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(26,93,36,1)',
            data: datosfinal
        },]
      }

      var barChartOptions = {
          responsive: true,
          maintainAspectRatio: false,
          datasetFill: false
      }

      var barChart = new Chart(barChartCanvas, {
          type: 'bar',
          data: barChartData,
          options: barChartOptions
      });
  }); 
</script>
		

		<!-- DataTables -->
<script src="<?php echo base_url('plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/datatables-responsive/js/dataTables.responsive.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js'); ?>"></script>
<script>
  $(function () {

		// datatable listar responsable
    var busquedaltsresponsable = $("#ltsresponsable").DataTable({
      "responsive": true,
      "dom": 'lrtip',
			"autoWidth": true,
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
	//	var i = 0;
		$('#ltsresponsable tfoot th').each( function () {
				
				$(this).html( '<input type="text" name="filtar[]" style="color:black;" placeholder="Filtrar" />' );
       // alert($(this).attr("class"));
        /*if($(this).attr("class") == "ci"){
          $(this).html( '<select onchange="cambioGrado()" multiple class="form-control" id="propietario" name="propietario" > <option  selected value="">--Seleccione el propietario--</option><option value="95081645466">95081645466</option><option value="98073020413">98073020413</option></select> ' );
        }else {
          $(this).html( '<input type="text" name="filtar[]" style="color:black;" placeholder="Filtrar" />' );
        }*/
        //i++;
		} );
    


		busquedaltsresponsable.columns().every( function () {
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



</body>

</html>
