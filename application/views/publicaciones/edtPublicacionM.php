



<!-- Content Wrapper. Contains page content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><spam><i class="fas fa-edit"></i></spam> Editar publicación:</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="#">Home</a></li>
                        <li class="breadcrumb-item "><a href="#">Miembro</a></li>
                        <li class="breadcrumb-item "><a href="#">Expediente del miembro</a></li>
                        <li class="breadcrumb-item active">Editar publicación</li>
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
					<spam><i class="fas fa-edit"></i></spam> <b>Editar datos de la publicación</b>
				</div>
              <!-- /.card-header -->
              <!-- form start -->
              <form onsubmit="return validar()" action="<?php echo base_url('index.php/controller/edtPublicacionM')?>" method="POST" >
			  <?php  foreach ($public->result() as $p) {  ?>
			 	 <div class="card-body">
				  
				  <input type="hidden" class="form-control" value="<?php echo $p->idpublicaciones ; ?>" name="idp" id="idp" > 

						<input type="hidden" value="<?php echo $cim; ?>"  name="cim" id="cim">  

				  <div class="row">
				  <div class="col-1"></div>
					<div class="form-group col-md-4">
				  		<label for="problematica"><label style="color: red;">*&nbsp;</label>Título</label><input type="text" value="<?php echo $p->titulo ; ?>"  required  pattern="[a-zA-Z\sñÑáéíóúÁÉÍÚÓ]+"  oninput="checkTitulo(this);" class="form-control" name="titulo" id="titulo" placeholder="Entre el título">  
						<p id="msgTitulo" style="color: red;"></p>
					</div>
					<div class="col-1"></div>  


					<div class="col-1"></div>
					<div class="form-group col-md-4">
						<label for="organo"><label style="color: red;">*&nbsp;</label>Nivel:</label>
						<select onchange="cambioNivel()" class="form-control" id="nivel" name="nivel"  >      
							<option disabled  value="0">--Seleccione el nivel--</option>
							<option value="I"  <?php if($p->nivel == "I") echo 'selected="selected"'?>>Nivel I</option>
							<option value="II"  <?php if($p->nivel == "II") echo 'selected="selected"'?>>Nivel II</option>
							<option value="III"  <?php if($p->nivel == "III") echo 'selected="selected"'?>>Nivel III</option>
						</select>  
						<p id="msgNivel" style="color: red;"></p>
					</div>
					<div class="col-1 "></div>


					<div class="col-1"></div>
					<div class="form-group col-md-4">
				  		<label for="fechaDefensa"><label style="color: red;">*&nbsp;</label>Fecha:</label><input type="date" value="<?php echo $p->fecha ; ?>" required  class="form-control" name="fechaDefensa" id="fechaDefensa" >  
						<p id="msgFecha" style="color: red;"></p>
					</div>
					<div class="col-1"></div>  

					<div class="col-1"></div>
					<div class="form-group col-md-4">
				  		<label for="cargo">URL:</label> 
						  <!-- input type="url" oninput="checkURL(this);"  pattern="http(s?)(:\/\/)((www.)?)(([^.]+)\.)?([a-zA-z0-9\-_]+)(.com|.net|.gov|.org|.in|.ru|.es|.us|.ug|.ar|.ur|.it|.bu|.cu|.co|.gob|.edu|.micons|.azcuba|.grm|.hav)(\/[^\s]*)?"  class="form-control" name="url" id="url" placeholder="Entre la URL" -->
						  <input type="url" oninput="checkURL(this);" value="<?php echo $p->url ; ?>" pattern="http(s?)://.+"  class="form-control" name="url" id="url" placeholder="Entre la URL">
						<p id="msgURL" style="color: red;"></p>
					</div>
					<div class="col-1"></div>  
					
					<div class="col-1"></div>
					<div class="form-group col-md-4">
				  		<label for="cargo">ISBN/ISSN:</label><input type="text" value="<?php echo $p->isbnISSN ; ?>"  pattern="[0-9]+"  oninput="checkIsnb(this);" class="form-control" name="isbn" id="isbn" placeholder="Entre el ISBN/ISSN">  
						<p id="msgISBN" style="color: red;"></p>
					</div>
					<div class="col-1"></div>  
				
					<div class="col-1"></div>
					<div class="form-group col-md-4">
						<label for="organo"><label style="color: red;">*&nbsp;</label>Tipo de publicación:</label>
						<select onchange="cambioTipo()" class="form-control" id="tipo" name="tipo"  >      
							<option disabled   value="0">--Seleccione el tipo--</option>
							<option value="Libro"  <?php if($p->nivel == "Libro") echo 'selected="selected"'?>>Libro</option>
							<option value="Cuaderno"  <?php if($p->nivel == "Cuaderno") echo 'selected="selected"'?>>Cuaderno</option>
							<option value="Folleto"  <?php if($p->nivel == "Folleto") echo 'selected="selected"'?>>Folleto</option>
							<option value="Volante"  <?php if($p->nivel == "Volante") echo 'selected="selected"'?>>Volante</option>
							<option value="Cartel"  <?php if($p->nivel == "Cartel") echo 'selected="selected"'?>>Cartel</option>
							<option value="Boletín"  <?php if($p->nivel == "Boletín") echo 'selected="selected"'?>>Boletín</option>
							<option value="Gaceta"  <?php if($p->nivel == "Gaceta") echo 'selected="selected"'?>>Gaceta</option>
							<option value="Revista"  <?php if($p->nivel == "Revista") echo 'selected="selected"'?>>Revista</option>
							<option value="Periódico mural"  <?php if($p->nivel == "Periódico mural") echo 'selected="selected"'?>>Periódico mural</option>
							<option value="Encarte / Suplemento"  <?php if($p->nivel == "Encarte / Suplemento") echo 'selected="selected"'?>>Encarte / Suplemento</option>
							<option value="Audiovisual"  <?php if($p->nivel == "Audiovisual") echo 'selected="selected"'?>>Audiovisual</option>
							<option value="Publicación electrónica"  <?php if($p->nivel == "Publicación electrónica") echo 'selected="selected"'?>>Publicación electrónica</option>
						</select>  
						<p id="msgTipo" style="color: red;"></p>
					</div>
					<div class="col-1 "></div>

                	</div>
                
				</div>

                <div class="card-footer">
				<br />
					<div class="row">
					
					<div class="col-md-5"></div>
					
					<div class="col-md-1">
					<?php $flag = True; $message = 1; $type = True; $pag = "publicaciones"?>
					
					
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
			return true;
		}


</script>