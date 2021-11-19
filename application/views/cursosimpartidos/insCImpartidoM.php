



<!-- Content Wrapper. Contains page content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><spam><i class="fas fa-plus"></i></spam> Insertar curso impartido:</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="#">Home</a></li>
                        <li class="breadcrumb-item "><a href="#">Miembro</a></li>
                        <li class="breadcrumb-item "><a href="#">Expediente del miembro</a></li>
                        <li class="breadcrumb-item active">Insertar curso impartido</li>
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
					<spam><i class="fas fa-plus"></i></spam> <b>Insertar datos del curso impartido</b>
				</div>
              <!-- /.card-header -->
              <!-- form start -->
              <form onsubmit="return validar()" action="<?php echo base_url('index.php/controller/insCImpartidoM')?>" method="POST" >
			  
			 	 <div class="card-body">
				  
				  
						<input type="hidden" value="<?php echo $cim; ?>"  name="cim" id="cim">  

				  <div class="row"> 

					<div class="col-1"></div>
					<div class="form-group col-md-4">
				  		<label for="cargo"><label style="color: red;">*&nbsp;</label>Nombre:</label><input type="text" value="" required  pattern="[a-zA-Z\sñÑáéíóúÁÉÍÚÓ]+"  oninput="checkNombre(this);" class="form-control" name="nombre" id="nombre" placeholder="Entre el nombre del curso">  
						<p id="msgNombre" style="color: red;"></p>
					</div>
					<div class="col-1"></div> 

					<div class="col-1"></div>
					<div class="form-group col-md-4">
						<label for="organo"><label style="color: red;">*&nbsp;</label>Tipo:</label>
						<select onchange="cambioTipo()" class="form-control" id="tipo" name="tipo"  >      
							<option disabled  selected value="0">--Seleccione la enseñanza--</option>
							<option value="Postgrado" >Postgrado</option>
							<option value="Maestría" >Maestría</option>
							<option value="Curso entrenamiento" >Curso entrenamiento</option>
							<option value="Conferencia" >Conferencia</option>
							<option value="Especialidad" >Especialidad</option>
						</select>  
						<p id="msgTipo" style="color: red;"></p>
					</div>
					<div class="col-1 "></div> 

					<div class="col-1"></div>
					<div class="form-group col-md-4">
				  		<label for="fechaDefensa"><label style="color: red;">*&nbsp;</label>Fecha:</label><input type="date" value="" required  class="form-control" name="fechaInicio" id="fechaInicio" >  
						<p id="msgFechaInicio" style="color: red;"></p>
					</div>
					<div class="col-1"></div>  

				
                	</div>
                
				</div>

                <div class="card-footer">
				<br />
					<div class="row">
					
					<div class="col-md-4"></div>
					<div class="col-md-1">
						<button type="reset" class="btn btn-primary  btn-block"><i class="fa fa-eraser"></i> Limpiar</button><br />
					</div>
										<div class="col-md-1">
					<?php $flag = True; $message = 1; $type = True;  $pag="cursosimpartidos";?>
									
						<a href="<?php echo base_url()."index.php/controller/viewResponsable/".$flag.'/'.$message.'/'.$type.'/'. $cim.'/'.$pag; ?>"> 
							<button type="button" class="btn btn-danger  btn-block"><i class="fa fa-times"></i> Cancelar</button> <br />	
						</a>
					
					</div>
					<div class="col-md-1">
						<button type="submit" class="btn btn-success btn-block" ><i class="fa fa-check"></i> Aceptar</button>
					</div>
					
				</div>
				</div>				
            </form>
				</div>
				
        </div>
        <!-- /.container-fluid -->
    </section>

</div>
<!-- /.content-wrapper -->

<script type="text/javascript">

		function checkNombre(input){
			if(input.validity.patternMismatch){
				//input.setCustomValidity("Este campo no acepta números");
				doc = "Este campo solo acepta letras.";
			}
			else{
				input.setCustomValidity("");
				doc = "";
			}
			document.getElementById("msgNombre").innerHTML = doc;
		}	
				

		function validar(){
			var doc;

			var valorFechaInicio = document.getElementById('fechaInicio').value;
			
			if(valorFechaInicio == ""){
				doc = "Debe seleccionar una fecha de inicio";
				document.getElementById("msgFechaInicio").innerHTML = doc;
				return false;
			}

			var valorSelectTipoinnov= document.getElementById('tipo').value;
			if(valorSelectTipoinnov == 0){
				doc = "Debe seleccionar una opción";
				document.getElementById("msgTipo").innerHTML = doc;
				return false;
			}
			return true;
		}


</script>