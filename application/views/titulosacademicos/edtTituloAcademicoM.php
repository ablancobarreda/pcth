



<!-- Content Wrapper. Contains page content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><spam><i class="fas fa-edit"></i></spam> Editar título académico:</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="#">Home</a></li>
                        <li class="breadcrumb-item "><a href="#">Miembro</a></li>
                        <li class="breadcrumb-item "><a href="#">Expediente del miembro</a></li>
                        <li class="breadcrumb-item active">Editar título académico</li>
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
					<spam><i class="fas fa-edit"></i></spam> <b>Editar datos del título académico</b>
				</div>
              <!-- /.card-header -->
              <!-- form start -->
              <form onsubmit="return validar()" action="<?php echo base_url('index.php/controller/edtTituloAcademicoM')?>" method="POST" >
			  <?php  foreach ($tituloacad->result() as $t) {  ?>
			 	 <div class="card-body">
				  
				  <input type="hidden" class="form-control" value="<?php echo $t->idtituloAcademico ; ?>" name="idt" id="idt" > 

						<input type="hidden" value="<?php echo $cim; ?>"  name="cim" id="cim">  

				  <div class="row">

				  <div class="col-1"></div>
					<div class="form-group col-md-4">
						<label for="organo"><label style="color: red;">*&nbsp;</label>Tipo:</label>
						<select onchange="cambioTipo()" class="form-control" id="tipo" name="tipo"  >      
							<option disabled value="0">--Seleccione el tipo--</option>
							<option value="Máster" <?php if($t->tipo == "Máster") echo 'selected="selected"'?>>Máster</option>
							<option value="Especialista" <?php if($t->tipo == "Especialista") echo 'selected="selected"'?>>Especialista</option>
						</select>  
						<p id="msgTipo" style="color: red;"></p>
					</div>
					<div class="col-1 "></div>

					  <div class="col-1"></div>
					  <div class="form-group col-md-4">
							<label for="problematica"><label style="color: red;">*&nbsp;</label>Denominación:</label><input type="text" value="<?php echo $t->denominacion ; ?>"  required  pattern="[a-zA-Z\sñÑáéíóúÁÉÍÚÓ]+"  oninput="checkDenominacion(this);" class="form-control" name="denominacion" id="denominacion" placeholder="Entre la denominación">  
						  <p id="msgDenominacion" style="color: red;"></p>
					  </div>
					  <div class="col-1"></div>

				  <div class="col-1"></div>
					  <div class="form-group col-md-4">
							<label for="problematica"><label style="color: red;">*&nbsp;</label>Centro de referencia:</label><input type="text" value="<?php echo $t->centroReferencia ; ?>"  required  pattern="[a-zA-Z\sñÑáéíóúÁÉÍÚÓ]+"  oninput="checkCReferencia(this);" class="form-control" name="cestudio" id="cestudio" placeholder="Entre el centro de referencia">  
						  <p id="msgCReferencia" style="color: red;"></p>
					  </div>
					  <div class="col-1"></div>  

					  <div class="col-1"></div>
					  <div class="form-group col-md-4">
							<label for="problematica"><label style="color: red;">*&nbsp;</label>Centro de estudio:</label><input type="text" value="<?php echo $t->centroEstudio ; ?>"  required  pattern="[a-zA-Z\sñÑáéíóúÁÉÍÚÓ]+"  oninput="checkEstudio(this);" class="form-control" name="estudio" id="estudio" placeholder="Entre el centro de estudio">  
						  <p id="msgEstudio" style="color: red;"></p>
					  </div>
					  <div class="col-1"></div> 
					  
					  <div class="col-1"></div>
					  <div class="form-group col-md-4">
							<label for="problematica"><label style="color: red;">*&nbsp;</label>Carrera:</label><input type="text" value="<?php echo $t->carrera ; ?>"  required  pattern="[a-zA-Z\sñÑáéíóúÁÉÍÚÓ]+"  oninput="checkCarrera(this);" class="form-control" name="carrera" id="carrera" placeholder="Entre la carrera">  
						  <p id="msgCarrera" style="color: red;"></p>
					  </div>
					  <div class="col-1"></div>   

					  <div class="col-1"></div>
					<div class="form-group col-md-4">
				  		<label for="fechaDefensa"><label style="color: red;">*&nbsp;</label>Fecha defensa:</label><input type="date" value="<?php echo $t->fecha ; ?>" required  class="form-control" name="fechaDefensa" id="fechaDefensa" >  
						<p id="msgFDefensa" style="color: red;"></p>
					</div>
					<div class="col-1"></div>  

					  <div class="col-1"></div>
						<div class="form-group col-md-4">
								<label for="problematica"><label style="color: red;">*&nbsp;</label>Cantidad horas:</label><input type="text" value="<?php echo $t->cantHoras ; ?>"  required  pattern="[0-9]+"  oninput="checkcantH(this);" class="form-control" name="canth" id="canth" placeholder="Entre la cantidad de horas">  
							<p id="msgCantH" style="color: red;"></p>
						</div>
						<div class="col-1"></div> 
					  
						<div class="col-1"></div>
						<div class="form-group col-md-4">
								<label for="problematica"><label style="color: red;">*&nbsp;</label>Libro:</label><input type="text" value="<?php echo $t->libro ; ?>"  required  pattern="[a-zA-Z\sñÑáéíóúÁÉÍÚÓ]+"  oninput="checkLibro(this);" class="form-control" name="libro" id="libro" placeholder="Entre el libro">  
							<p id="msgLibro" style="color: red;"></p>
						</div>
						<div class="col-1"></div>  
					  
					  <div class="col-1"></div>
					  <div class="form-group col-md-4">
							  <label for="cargo"><label style="color: red;">*&nbsp;</label>Tomo:</label><input type="text" value="<?php echo $t->tomo ; ?>" required  pattern="[0-9]+"  oninput="checkTomo(this);" class="form-control" name="tomo" id="tomo" placeholder="Entre el tomo">  
						  <p id="msgTomo" style="color: red;"></p>
					  </div>
					  <div class="col-1"></div>  
					  <div class="col-1"></div>
					  <div class="form-group col-md-4">
							  <label for="cargo"><label style="color: red;">*&nbsp;</label>Folio:</label><input type="text" value="<?php echo $t->folio ; ?>" required  pattern="[0-9]+"  oninput="checkFolio(this);" class="form-control" name="folio" id="folio" placeholder="Entre el folio">  
						  <p id="msgFolio" style="color: red;"></p>
					  </div>
					  <div class="col-1"></div>

					  <div class="col-1"></div>
					  <div class="form-group col-md-4">
							  <label for="cargo"><label style="color: red;">*&nbsp;</label>Calificación:</label><input type="text" value="<?php echo $t->calificacion ; ?>" required  pattern="[0-9]+"  oninput="checkCalificacion(this);" class="form-control" name="calificacion" id="calificacion" placeholder="Entre la Calificación">  
						  <p id="msgCalificacion" style="color: red;"></p>
					  </div>
					  <div class="col-1"></div>  

                	</div>
                
				</div>

                <div class="card-footer">
				<br />
					<div class="row">
					
					<div class="col-md-5"></div>
					
					<div class="col-md-1">
					<?php $flag = True; $message = 1; $type = True; $pag = "potencial"?>
					
					
						<a href="<?php echo base_url()."index.php/controller/viewResponsable/".$flag.'/'.$message.'/'.$type.'/'. $cim.'/'.$pag; ?>"> 
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

		function checkDenominacion(input){
			if(input.validity.patternMismatch){
				//input.setCustomValidity("Este campo no acepta números");
				doc = "Este campo solo acepta letras.";
			}
			else{
				input.setCustomValidity("");
				doc = "";
			}
			document.getElementById("msgDenominacion").innerHTML = doc;
		}

		function checkEstudio(input){
			if(input.validity.patternMismatch){
				//input.setCustomValidity("Este campo no acepta números");
				doc = "Este campo solo acepta letras.";
			}
			else{
				input.setCustomValidity("");
				doc = "";
			}
			document.getElementById("msgEstudio").innerHTML = doc;
		}

		function checkCarrera(input){
			if(input.validity.patternMismatch){
				//input.setCustomValidity("Este campo no acepta números");
				doc = "Este campo solo acepta letras.";
			}
			else{
				input.setCustomValidity("");
				doc = "";
			}
			document.getElementById("msgCarrera").innerHTML = doc;
		}		
		function checkLibro(input){
			if(input.validity.patternMismatch){
				//input.setCustomValidity("Este campo no acepta números");
				doc = "Este campo solo acepta letras.";
			}
			else{
				input.setCustomValidity("");
				doc = "";
			}
			document.getElementById("msgLibro").innerHTML = doc;
		}		

		function checkcantH(input){
			if(input.validity.patternMismatch){
				//input.setCustomValidity("Este campo no acepta números");
				doc = "Este campo solo acepta números.";
			}
			else{
				input.setCustomValidity("");
				doc = "";
			}
			document.getElementById("msgCantH").innerHTML = doc;
		}	

		function checkCalificacion(input){
			if(input.validity.patternMismatch){
				//input.setCustomValidity("Este campo no acepta números");
				doc = "Este campo solo acepta números.";
			}
			else{
				input.setCustomValidity("");
				doc = "";
			}
			document.getElementById("msgCalificacion").innerHTML = doc;
		}	


		function checkTomo(input){
			if(input.validity.patternMismatch){
				//input.setCustomValidity("Este campo no acepta números");
				doc = "Este campo solo acepta números.";
			}
			else{
				input.setCustomValidity("");
				doc = "";
			}
			document.getElementById("msgTomo").innerHTML = doc;
		}	

		function checkFolio(input){
			if(input.validity.patternMismatch){
				//input.setCustomValidity("Este campo no acepta números");
				doc = "Este campo solo acepta números.";
			}
			else{
				input.setCustomValidity("");
				doc = "";
			}
			document.getElementById("msgFolio").innerHTML = doc;
		}	

		

		function validar(){
			var doc;
			
			var valorSelectTipoAutor = document.getElementById('tipo').value;
			if(valorSelectTipoAutor == 0){
				doc = "Debe seleccionar una opción";
				document.getElementById("msgTipo").innerHTML = doc;
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