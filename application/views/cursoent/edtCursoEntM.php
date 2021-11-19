



<!-- Content Wrapper. Contains page content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><spam><i class="fas fa-edit"></i></spam> Editar categoría docente:</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="#">Home</a></li>
                        <li class="breadcrumb-item "><a href="#">Miembro</a></li>
                        <li class="breadcrumb-item "><a href="#">Expediente del miembro</a></li>
                        <li class="breadcrumb-item active">Editar categoría docente</li>
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
					<spam><i class="fas fa-edit"></i></spam> <b>Editar datos de la categoría docente</b>
				</div>
              <!-- /.card-header -->
              <!-- form start -->
              <form onsubmit="return validar()" action="<?php echo base_url('index.php/controller/edtCursoEntM')?>" method="POST" >
			  <?php  foreach ($cursoent->result() as $t) {  ?>
			 	 <div class="card-body">
				  
				  <input type="hidden" class="form-control" value="<?php echo $t->idcurso ; ?>" name="idt" id="idt" > 

						<input type="hidden" value="<?php echo $cim; ?>"  name="cim" id="cim">  

				  <div class="row">

				  <div class="col-1"></div>
					<div class="form-group col-md-4">
						<label for="organo"><label style="color: red;">*&nbsp;</label>Tipo:</label>
						<select onchange="cambioTipo()" class="form-control" id="tipo" name="tipo"  >      
							<option disabled  value="0">--Seleccione el tipo--</option>
							<option value="Entrenamiento" <?php if($t->tipo == "Entrenamiento") echo 'selected="selected"'?>>Entrenamiento</option>
							<option value="Diplomado" <?php if($t->tipo == "Diplomado") echo 'selected="selected"'?>>Diplomado</option>
						</select>  
						<p id="msgTipo" style="color: red;"></p>
					</div>
					<div class="col-1 "></div>

				  <div class="col-1"></div>
					  <div class="form-group col-md-4">
							<label for="problematica"><label style="color: red;">*&nbsp;</label>Denominación:</label><input type="text" value="<?php echo $t->denimicacion ; ?>"  required  pattern="[a-zA-Z\sñÑáéíóúÁÉÍÚÓ]+"  oninput="checkDenominacion(this);" class="form-control" name="denominacion" id="denominacion" placeholder="Entre la denominación">  
						  <p id="msgDenominacion" style="color: red;"></p>
					  </div>
					  <div class="col-1"></div>  

					  <div class="col-1"></div>
					  <div class="form-group col-md-4">
							<label for="problematica"><label style="color: red;">*&nbsp;</label>Centro de estudio:</label><input type="text" value="<?php echo $t->centroEstudio ; ?>"  required  pattern="[a-zA-Z\sñÑáéíóúÁÉÍÚÓ]+"  oninput="checkCEstudio(this);" class="form-control" name="cestudio" id="cestudio" placeholder="Entre el centro de estudio">  
						  <p id="msgCEstudio" style="color: red;"></p>
					  </div>
					  <div class="col-1"></div>  

					<div class="col-1"></div>
					<div class="form-group col-md-4">
				  		<label for="fechaDefensa"><label style="color: red;">*&nbsp;</label>Fecha:</label><input type="date" value="<?php echo $t->fecha ; ?>"  class="form-control" name="fecha" id="fecha" >  
						<p id="msgFDefensa" style="color: red;"></p>
					</div>
					<div class="col-1"></div>  
					
					<div class="col-1"></div>
					<div class="form-group col-md-4">
							<label for="cargo"><label style="color: red;">*&nbsp;</label>Horas de clases:</label><input type="text" value="<?php echo $t->cantHoras ; ?>" required  pattern="[0-9]+"  oninput="checkHClases(this);" class="form-control" name="hclases" id="hclases" placeholder="Entre las horas de clases">  
						<p id="msgHClases" style="color: red;"></p>
					</div>
					<div class="col-1"></div>  


					<div class="col-1"></div>
					<div class="form-group col-md-4">
						<label for="organo"><label style="color: red;">*&nbsp;</label>Calificación:</label>
						<select onchange="cambioTipo()" class="form-control" id="calif" name="calif"  >      
							<option disabled  value="0">--Seleccione la calificación--</option>
							<option value="5" <?php if($t->califiacion == "5") echo 'selected="selected"'?>>5</option>
							<option value="4" <?php if($t->califiacion == "4") echo 'selected="selected"'?>>4</option>
							<option value="3" <?php if($t->califiacion == "3") echo 'selected="selected"'?>>3</option>
							<option value="2" <?php if($t->califiacion == "2") echo 'selected="selected"'?>>2</option>
						</select>  
						<p id="msgTAutor" style="color: red;"></p>
					</div>
					<div class="col-1 "></div>

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

		function checkCEstudio(input){
			if(input.validity.patternMismatch){
				//input.setCustomValidity("Este campo no acepta números");
				doc = "Este campo solo acepta letras.";
			}
			else{
				input.setCustomValidity("");
				doc = "";
			}
			document.getElementById("msgCEstudio").innerHTML = doc;
		}		

		function checkHClases(input){
			if(input.validity.patternMismatch){
				//input.setCustomValidity("Este campo no acepta números");
				doc = "Este campo solo acepta números.";
			}
			else{
				input.setCustomValidity("");
				doc = "";
			}
			document.getElementById("msgHClases").innerHTML = doc;
		}	

		

		function validar(){
			var doc;
			
			var valorSelectTipoAutor = document.getElementById('calif').value;
			if(valorSelectTipoAutor == 0){
				doc = "Debe seleccionar una opción";
				document.getElementById("msgTAutor").innerHTML = doc;
				return false;
			}
			
			var valorSelectTipoAutor = document.getElementById('tipo').value;
			if(valorSelectTipoAutor == 0){
				doc = "Debe seleccionar una opción";
				document.getElementById("msgTipo").innerHTML = doc;
				return false;
			}


			var valorFecha = document.getElementById('fecha').value;
			if(valorFecha == ""){
				doc = "Debe seleccionar una fecha";
				document.getElementById("msgFDefensa").innerHTML = doc;
				return false;
			}
			return true;
		}



</script>