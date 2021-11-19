



<!-- Content Wrapper. Contains page content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><spam><i class="fas fa-plus" ></i></spam> Insertar publicación:</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="#">Home</a></li>
                        <li class="breadcrumb-item "><a href="#">Miembro</a></li>
                        <li class="breadcrumb-item "><a href="#">Expediente del miembro</a></li>
                        <li class="breadcrumb-item active">Insertar publicación</li>
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
			<div class="callout callout-info" style="background-color:#e0f7fa;">
				<h5><i class="fas fa-info-circle" style="color:#117a8b;"></i> Información</h5>
				<p>Los campos con (<label style="color: red;">*</label>) son obligatorios.</p>
			</div>
            <!-- Small boxes (Stat box) -->
            <div class="card card-primary">
				<div class="card-header text-white" style=" background: linear-gradient(to right, #1e88e5, #66bb6a);">
					<spam><i class="fas fa-plus" ></i></spam> <b>Insertar datos de la publicación</b>
				</div>
              <!-- /.card-header -->
              <!-- form start -->
              <form onsubmit="return validar()" action="<?php echo base_url('index.php/controller/insPublicacionM')?>" method="POST" >
			  
			 	 <div class="card-body">
				  
				  
						<input type="hidden" value="<?php echo $cim; ?>"  name="cim" id="cim">  

				  <div class="row">
				  <div class="col-1"></div>
					<div class="form-group col-md-4">
				  		<label for="problematica"><label style="color: red;">*&nbsp;</label>Título</label><input type="text" value=""  required  pattern="[a-zA-Z\sñÑáéíóúÁÉÍÚÓ]+"  oninput="checkTitulo(this);" class="form-control" name="titulo" id="titulo" placeholder="Entre el título">  
						<p id="msgTitulo" style="color: red;"></p>
					</div>
					<div class="col-1"></div>  


					<div class="col-1"></div>
					<div class="form-group col-md-4">
						<label for="organo"><label style="color: red;">*&nbsp;</label>Nivel:</label>
						<select onchange="cambioNivel()" class="form-control" id="nivel" name="nivel"  >      
							<option disabled selected value="0">--Seleccione el nivel--</option>
							<option value="I" >Nivel I</option>
							<option value="II" >Nivel II</option>
							<option value="III">Nivel III</option>
						</select>  
						<p id="msgNivel" style="color: red;"></p>
					</div>
					<div class="col-1 "></div>


					<div class="col-1"></div>
					<div class="form-group col-md-4">
				  		<label for="fechaDefensa"><label style="color: red;">*&nbsp;</label>Fecha:</label><input type="date" value="" required  class="form-control" name="fechaDefensa" id="fechaDefensa" >  
						<p id="msgFecha" style="color: red;"></p>
					</div>
					<div class="col-1"></div>  

					<div class="col-1"></div>
					<div class="form-group col-md-4">
				  		<label for="cargo">URL:</label> 
						  <!-- input type="url" oninput="checkURL(this);"  pattern="http(s?)(:\/\/)((www.)?)(([^.]+)\.)?([a-zA-z0-9\-_]+)(.com|.net|.gov|.org|.in|.ru|.es|.us|.ug|.ar|.ur|.it|.bu|.cu|.co|.gob|.edu|.micons|.azcuba|.grm|.hav)(\/[^\s]*)?"  class="form-control" name="url" id="url" placeholder="Entre la URL" -->
						  <input type="url" oninput="checkURL(this);"  pattern="http(s?)://.+"  class="form-control" name="url" id="url" placeholder="Entre la URL">
						<p id="msgURL" style="color: red;"></p>
					</div>
					<div class="col-1"></div>  
					
					<div class="col-1"></div>
					<div class="form-group col-md-4">
				  		<label for="cargo">ISBN/ISSN:</label><input type="text" value=""   pattern="[0-9]+"  oninput="checkIsnb(this);" class="form-control" name="isbn" id="isbn" placeholder="Entre el ISBN/ISSN">  
						<p id="msgISBN" style="color: red;"></p>
					</div>
					<div class="col-1"></div>  
				
					<div class="col-1"></div>
					<div class="form-group col-md-4">
						<label for="organo"><label style="color: red;">*&nbsp;</label>Tipo de publicación:</label>
						<select onchange="cambioTipo()" class="form-control" id="tipo" name="tipo"  >      
							<option disabled  selected value="0">--Seleccione el tipo--</option>
							<option value="Libro" >Libro</option>
							<option value="Cuaderno" >Cuaderno</option>
							<option value="Folleto" >Folleto</option>
							<option value="Volante" >Volante</option>
							<option value="Cartel" >Cartel</option>
							<option value="Boletín" >Boletín</option>
							<option value="Gaceta" >Gaceta</option>
							<option value="Revista" >Revista</option>
							<option value="Periódico mural" >Periódico mural</option>
							<option value="Encarte / Suplemento" >Encarte / Suplemento</option>
							<option value="Audiovisual" >Audiovisual</option>
							<option value="Publicación electrónica" >Publicación electrónica</option>
						</select>  
						<p id="msgTipo" style="color: red;"></p>
					</div>
					<div class="col-1 "></div>

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
					<?php $flag = True; $message = 1; $type = True;$pag = "publicaciones" ?>
					
					
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

		function checkURL(input){
			if(input.validity.patternMismatch){
				//input.setCustomValidity("Este campo no acepta números");
				doc = "Entre una URL válida. Ej: http://www.ejemplo.com";
			}
			else{
				input.setCustomValidity("");
				doc = "";
			}
			document.getElementById("msgURL").innerHTML = doc;
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

		function checkIsnb(input){
			if(input.validity.patternMismatch){
				//input.setCustomValidity("Este campo no acepta números");
				doc = "Este campo solo acepta números.";
			}
			else{
				input.setCustomValidity("");
				doc = "";
			}
			document.getElementById("msgISBN").innerHTML = doc;
		}	

		

		function validar(){
			var doc;
			
			var valorSelectTipo = document.getElementById('tipo').value;
			if(valorSelectTipo == 0){
				doc = "Debe seleccionar una opción";
				document.getElementById("msgTipo").innerHTML = doc;
				return false;
			}

			var valorSelectNivel = document.getElementById('nivel').value;
			if(valorSelectNivel == 0){
				doc = "Debe seleccionar una opción";
				document.getElementById("msgNivel").innerHTML = doc;
				return false;
			}

			var valorSelectFecha = document.getElementById('fechaDefensa').value;
			if(valorSelectFecha == ""){
				doc = "Debe seleccionar una fecha";
				document.getElementById("msgFecha").innerHTML = doc;
				return false;
			}
			return true;
		}


</script>