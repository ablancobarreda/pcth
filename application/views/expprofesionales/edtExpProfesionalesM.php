



<!-- Content Wrapper. Contains page content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><spam><i class="fas fa-edit"></i></spam> Editar experiencia profesional:</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="#">Home</a></li>
                        <li class="breadcrumb-item "><a href="#">Miembro</a></li>
                        <li class="breadcrumb-item ">Expediente del miembro</li>
                        <li class="breadcrumb-item active">Editar experiencia profesional</li>
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
			<div class="callout callout-info"style="background-color:#e0f7fa;">
				<h5><i class="fas fa-info-circle" style="color:#117a8b;"></i> Información</h5>
				<p>Los campos con (<label style="color: red;">*</label>) son obligatorios.</p>
			</div>
            <!-- Small boxes (Stat box) -->
            <div class="card card-primary">
				<div class="card-header text-white" style=" background: linear-gradient(to right, #1e88e5, #66bb6a);">
					<spam><i class="fas fa-edit"></i></spam> <b>Editar datos de la experiencia profesional</b>
				</div>
              <!-- /.card-header -->
              <!-- form start -->
              <form onsubmit="return validar()" action="<?php echo base_url('index.php/controller/edtExpProfesionalM')?>" method="POST" >
			  <?php  foreach ($experiencia->result() as $exp) {  ?>
			 	 <div class="card-body">
				  
				  <input type="hidden" class="form-control" value="<?php echo $exp->idexperienciaProfesional; ?>" name="idexp" id="idexp" > 

						<input type="hidden" value="<?php echo $cim; ?>"  name="cim" id="cim">  

				  <div class="row">
				  <div class="col-1"></div>
					<div class="form-group col-md-4">
				  		<label for="problematica"><label style="color: red;">*&nbsp;</label>Centro laboral:</label><input type="text" value="<?php echo $exp->centroLaboral; ?>"  required  pattern="[a-zA-Z\sñÑáéíóúÁÉÍÚÓ]+"  oninput="checkCentroLaboral(this);" class="form-control" name="centrolaboral" id="centrolaboral" placeholder="Entre el centro laboral">  
						<p id="msgCentroLaboral" style="color: red;"></p>
					</div>
					<div class="col-1"></div>  

					<div class="col-1"></div>
					<div class="form-group col-md-4">
				  		<label for="cargo"><label style="color: red;">*&nbsp;</label>Cargo:</label><input type="text" value="<?php echo $exp->cargoOcupa; ?>" required  pattern="[a-zA-Z\sñÑáéíóúÁÉÍÚÓ]+"  oninput="checkCargo(this);" class="form-control" name="cargo" id="cargo" placeholder="Entre el cargo">  
						<p id="msgCargo" style="color: red;"></p>
					</div>
					<div class="col-1"></div>  

					


					<div class="col-1"></div>
					<div class="form-group col-md-4">
				  		<label for="programa"><label style="color: red;">*&nbsp;</label>Fecha desde:</label><input type="date" value="<?php echo $exp->fechaDesde; ?>" required  class="form-control" name="fechaDesde" id="fechaDesde" >  
						<p id="msgPrograma" style="color: red;"></p>
					</div>
					<div class="col-1"></div>  
				
					<div class="col-1"></div>  
					<div class="form-group col-md-4">
				  		<label for="prioridades"><label style="color: red;">*&nbsp;</label>Fecha hasta:</label><input type="date" value="<?php echo $exp->fechaHasta; ?>" required  class="form-control" name="fechaHasta" id="fechaHasta" >  
						<p id="msgPrioridades" style="color: red;"></p>
				  	</div>
					<div class="col-1"></div>
                	</div>
                
				</div>

                <div class="card-footer">
				<br />
					<div class="row">
					
					<div class="col-md-5"></div>
					
					<div class="col-md-1">
					<?php $flag = True; $message = 1; $type = True; $pag="expprofesional" ?>
					
					
						<a href="<?php echo base_url()."index.php/controller/viewResponsable/".$flag.'/'.$message.'/'.$type.'/'. $cim.'/'. $pag; ?>"> 
							<button type="button" class="btn btn-danger  btn-block"><i class="fa fa-times"></i> Cancelar</button> <br />	
						</a>
					
					</div>
					<div class="col-md-1">
						<button type="submit" class="btn btn-success btn-block" ><i class="fa fa-check"></i> Aceptar</button>
					</div>
					
				</div>
				</div>
				
				<?php  } ?>
            </form>
				</div>
				
        </div>
        <!-- /.container-fluid -->
    </section>

</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
		
		function checkCentroLaboral(input){
			if(input.validity.patternMismatch){
				//input.setCustomValidity("Este campo no acepta números");
				doc = "Este campo solo acepta letras.";
			}
			else{
				input.setCustomValidity("");
				doc = "";
			}
			document.getElementById("msgCentroLaboral").innerHTML = doc;
		}	

		function checkCargo(input){
			if(input.validity.patternMismatch){
				//input.setCustomValidity("Este campo no acepta números");
				doc = "Este campo solo acepta letras.";
			}
			else{
				input.setCustomValidity("");
				doc = "";
			}
			document.getElementById("msgCargo").innerHTML = doc;
		}	

		

		function validar(){
			var doc;
			var valorSelectOrgano = document.getElementById('organo').value;
			if(valorSelectOrgano == 0){
				doc = "Debe seleccionar una opción";
				document.getElementById("msgOrgano").innerHTML = doc;
				return false;
			}
			return true;
		}


</script>