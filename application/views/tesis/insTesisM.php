



<!-- Content Wrapper. Contains page content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><spam><i class="fas fa-plus"></i></spam> Insertar tesis:</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="#">Home</a></li>
                        <li class="breadcrumb-item "><a href="#">Miembro</a></li>
                        <li class="breadcrumb-item "><a href="#">Expediente del miembro</a></li>
                        <li class="breadcrumb-item active">Insertar tesis</li>
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
					<spam><i class="fas fa-plus"></i></spam> <b>Insertar datos de la tesis</b>
				</div>
              <!-- /.card-header -->
              <!-- form start -->
              <form onsubmit="return validar()" action="<?php echo base_url('index.php/controller/insTesisM')?>" method="POST" >
			  
			 	 <div class="card-body">
				  
				  
						<input type="hidden" value="<?php echo $cim; ?>"  name="cim" id="cim">  

				  <div class="row">
				  <div class="col-1"></div>
					<div class="form-group col-md-4">
				  		<label for="problematica"><label style="color: red;">*&nbsp;</label>Centro estudio:</label><input type="text" value=""  required  pattern="[a-zA-Z\sñÑáéíóúÁÉÍÚÓ]+"  oninput="checkCentroEstudio(this);" class="form-control" name="centroestudio" id="centroestudio" placeholder="Entre el centro estudio">  
						<p id="msgCentroEstudio" style="color: red;"></p>
					</div>
					<div class="col-1"></div>  

					<div class="col-1"></div>
					<div class="form-group col-md-4">
				  		<label for="cargo"><label style="color: red;">*&nbsp;</label>Título:</label><input type="text" value="" required  pattern="[a-zA-Z\sñÑáéíóúÁÉÍÚÓ]+"  oninput="checkTitulo(this);" class="form-control" name="titulo" id="titulo" placeholder="Entre el titulo">  
						<p id="msgTitulo" style="color: red;"></p>
					</div>
					<div class="col-1"></div>  

					<div class="col-1"></div>
					<div class="form-group col-md-4">
						<label for="organo"><label style="color: red;">*&nbsp;</label>Tipo de autor:</label>
						<select onchange="cambioTAutor()" class="form-control" id="tipoautor" name="tipoautor"  >      
							<option disabled selected value="0">--Seleccione el tipo de autor--</option>
							<option value="Cadete propio" >Cadete propio</option>
							<option value="Cadete insertado" >Cadete insertado</option>
							<option value="Curso por encuento">Curso por encuento</option>
						</select>  
						<p id="msgTAutor" style="color: red;"></p>
					</div>
					<div class="col-1 "></div>


					<div class="col-1"></div>
					<div class="form-group col-md-4">
				  		<label for="fechaDefensa"><label style="color: red;">*&nbsp;</label>Fecha defensa:</label><input type="date" value="" required  class="form-control" name="fechaDefensa" id="fechaDefensa" >  
						<p id="msgFDefensa" style="color: red;"></p>
					</div>
					<div class="col-1"></div>  
				
					<div class="col-1"></div>
					<div class="form-group col-md-4">
						<label for="organo"><label style="color: red;">*&nbsp;</label>Clasificación:</label>
						<select onchange="cambioClasif()" class="form-control" id="clasificacion" name="clasificacion"  >      
							<option disabled  selected value="0">--Seleccione la clasificación--</option>
							<option value="Abierta" >Abierta</option>
							<option value="Secreta" >Secreta</option>
						</select>  
						<p id="msgClasificacion" style="color: red;"></p>
					</div>
					<div class="col-1 "></div>

					<div class="col-1"></div>
					<div class="form-group col-md-4">
				  		<label for="cargo"><label style="color: red;">*&nbsp;</label>Centro de referencia:</label><input type="text" value="" required  pattern="[a-zA-Z\sñÑáéíóúÁÉÍÚÓ]+"  oninput="checkCReferencia(this);" class="form-control" name="centroReferencia" id="centroReferencia" placeholder="Entre el centro de referencia">  
						<p id="msgCReferencia" style="color: red;"></p>
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
					<?php $flag = True; $message = 1; $type = True;$pag = "tesis" ?>
					
					
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
		
		function checkCentroEstudio(input){
			if(input.validity.patternMismatch){
				//input.setCustomValidity("Este campo no acepta números");
				doc = "Este campo solo acepta letras.";
			}
			else{
				input.setCustomValidity("");
				doc = "";
			}
			document.getElementById("msgCentroEstudio").innerHTML = doc;
		}	

		function checkTitulo(input){
			if(input.validity.patternMismatch){
				//input.setCustomValidity("Este campo no acepta números");
				doc = "Este campo solo acepta letras.";
			}
			else{
				input.setCustomValidity("");
				doc = "";
			}
			document.getElementById("msgTitulo").innerHTML = doc;
		}	

		function checkCReferencia(input){
			if(input.validity.patternMismatch){
				//input.setCustomValidity("Este campo no acepta números");
				doc = "Este campo solo acepta letras.";
			}
			else{
				input.setCustomValidity("");
				doc = "";
			}
			document.getElementById("msgCReferencia").innerHTML = doc;
		}	

		

		function validar(){
			var doc;
			
			var valorSelectTipoAutor = document.getElementById('tipoautor').value;
			if(valorSelectTipoAutor == 0){
				doc = "Debe seleccionar una opción";
				document.getElementById("msgTAutor").innerHTML = doc;
				return false;
			}

			var valorSelectClasificacion = document.getElementById('clasificacion').value;
			if(valorSelectClasificacion == 0){
				doc = "Debe seleccionar una opción";
				document.getElementById("msgClasificacion").innerHTML = doc;
				return false;
			}

			var valorFecha = document.getElementById('fechaDefensa').value;
			if(valorFecha == ""){
				doc = "Debe seleccionar una fecha";
				document.getElementById("msgFDefensa").innerHTML = doc;
				return false;
			}
			return true;
		}


</script>