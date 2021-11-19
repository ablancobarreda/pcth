



<!-- Content Wrapper. Contains page content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><spam><i class="fas fa-edit"></i></spam> Editar evento:</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="#">Home</a></li>
                        <li class="breadcrumb-item "><a href="#">Miembro</a></li>
                        <li class="breadcrumb-item "><a href="#">Expediente del miembro</a></li>
                        <li class="breadcrumb-item active">Editar evento</li>
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
					<spam><i class="fas fa-edit"></i></spam> <b>Editar datos del evento</b>
				</div>
              <!-- /.card-header -->
              <!-- form start -->
              <form onsubmit="return validar()" action="<?php echo base_url('index.php/controller/edtEventoM')?>" method="POST" >
			  <?php  foreach ($eventos->result() as $p) {  ?>
			 	 <div class="card-body">
				  
				  <input type="hidden" class="form-control" value="<?php echo $p->ideventos ; ?>" name="idp" id="idp" > 

						<input type="hidden" value="<?php echo $cim; ?>"  name="cim" id="cim">  

				  <div class="row">
				  <div class="col-1"></div>
					<div class="form-group col-md-4">
				  		<label for="problematica"><label style="color: red;">*&nbsp;</label>Denominación:</label><input type="text" value="<?php echo $p->denominacion?>"  required  pattern="[a-zA-Z\sñÑáéíóúÁÉÍÚÓ]+"  oninput="checkDenominiacion(this);" class="form-control" name="denominiacion" id="denominiacion" placeholder="Entre la denominación">  
						<p id="msgDenominiacion" style="color: red;"></p>
					</div>
					<div class="col-1"></div>

					<div class="col-1"></div>
					<div class="form-group col-md-4">
						<label for="organo"><label style="color: red;">*&nbsp;</label>Tipo:</label>
						<select onchange="cambioNivel()" class="form-control" id="tipo" name="tipo"  >      
							<option disabled value="0">--Seleccione el tipo--</option>
							<option value="Institucional" <?php if($p->tipoEvento == "Institucional") echo 'selected="selected"'?>>Institucional</option>
							<option value="Nacional" <?php if($p->tipoEvento == "Nacional") echo 'selected="selected"'?>>Nacional</option>
							<option value="Internacional" <?php if($p->tipoEvento == "Internacional") echo 'selected="selected"'?>>Internacional</option>
						</select>  
						<p id="msgTipo" style="color: red;"></p>
					</div>
					<div class="col-1 "></div>
				
					<div class="col-1"></div>  
					<div class="form-group col-md-4">
				  		<label for="prioridades"><label style="color: red;">*&nbsp;</label>Fecha:</label><input type="date" value="<?php echo $p->fecha?>"   class="form-control" name="fecha" id="fecha" >  
						<p id="msgFecha" style="color: red;"></p>
				  	</div>
					<div class="col-1"></div>

					<div class="col-1"></div>
					<div class="form-group col-md-4">
				  		<label for="problematica"><label style="color: red;">*&nbsp;</label>Lugar:</label><input type="text" value="<?php echo $p->lugar?>"  required  pattern="[a-zA-Z\sñÑáéíóúÁÉÍÚÓ]+"  oninput="checklugar(this);" class="form-control" name="lugar" id="lugar" placeholder="Entre el lugar">  
						<p id="msgLugar" style="color: red;"></p>
					</div>
					<div class="col-1"></div>

					<div class="col-1"></div>
					<div class="form-group col-md-4">
						<label for="organo"><label style="color: red;">*&nbsp;</label>Tipo participación:</label>
						<select onchange="cambioNivel()" class="form-control" id="tipop" name="tipop"  >      
							<option disabled  value="0">--Seleccione el tipo--</option>
							<option value="Observador"<?php if($p->participacion == "Observador") echo 'selected="selected"'?> >Observador</option>
							<option value="Delegado"<?php if($p->participacion == "Delegado") echo 'selected="selected"'?> >Delegado</option>
							<option value="Ponente" <?php if($p->participacion == "Ponente") echo 'selected="selected"'?>>Ponente</option>
							<option value="Organizador" <?php if($p->participacion == "Organizador") echo 'selected="selected"'?>>Organizador</option>
							<option value="Invitado" <?php if($p->participacion == "Invitado") echo 'selected="selected"'?>>Invitado</option>
						</select>  
						<p id="msgTipoP" style="color: red;"></p>
					</div>
					<div class="col-1 "></div>

                	</div>
                
				</div>

                <div class="card-footer">
				<br />
					<div class="row">
					
					<div class="col-md-5"></div>
					
					<div class="col-md-1">
					<?php $flag = True; $message = 1; $type = True; $pag = "eventos";?>
					
					
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
		
		function checkDenominiacion(input){
			if(input.validity.patternMismatch){
				//input.setCustomValidity("Este campo no acepta números");
				doc = "Este campo solo acepta letras.";
			}
			else{
				input.setCustomValidity("");
				doc = "";
			}
			document.getElementById("msgDenominiacion").innerHTML = doc;
		}
		function checklugar(input){
			if(input.validity.patternMismatch){
				//input.setCustomValidity("Este campo no acepta números");
				doc = "Este campo solo acepta letras.";
			}
			else{
				input.setCustomValidity("");
				doc = "";
			}
			document.getElementById("msgLugar").innerHTML = doc;
		}
		function validar(){
			var doc;  
			
			var valorSelectTipo = document.getElementById('tipo').value;
			if(valorSelectTipo == 0){
				doc = "Debe seleccionar una opción";
				document.getElementById("msgTipo").innerHTML = doc;
				return false;
			}
			var valorSelectTipoP = document.getElementById('tipop').value;
			if(valorSelectTipoP == 0){
				doc = "Debe seleccionar una opción";
				document.getElementById("msgTipoP").innerHTML = doc;
				return false;
			}

			var valorFecha = document.getElementById('fecha').value;
			if(valorFecha == ""){
				doc = "Debe seleccionar una fecha";
				document.getElementById("msgFecha").innerHTML = doc;
				return false;
			}
			
			return true;
		}




</script>