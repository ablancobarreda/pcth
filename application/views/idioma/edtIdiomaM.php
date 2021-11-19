



<!-- Content Wrapper. Contains page content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><spam><i class="fas fa-edit"></i></spam> Editar idioma:</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="#">Home</a></li>
                        <li class="breadcrumb-item "><a href="#">Miembro</a></li>
                        <li class="breadcrumb-item "><a href="#">Expediente del miembro</a></li>
                        <li class="breadcrumb-item active">Editar idioma</li>
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
					<spam><i class="fas fa-edit"></i></spam> <b>Editar datos del idioma</b>
				</div>
              <!-- /.card-header -->
              <!-- form start -->
              <form onsubmit="return validar()" action="<?php echo base_url('index.php/controller/edtIdiomaM')?>" method="POST" >
			  <?php  foreach ($idioma->result() as $p) {  ?>
			 	 <div class="card-body">
				  
				  <input type="hidden" class="form-control" value="<?php echo $p->ididioma ; ?>" name="idp" id="idp" > 

						<input type="hidden" value="<?php echo $cim; ?>"  name="cim" id="cim">  

				  <div class="row">
				  <div class="col-1"></div>
					<div class="form-group col-md-4">
				  		<label for="problematica"><label style="color: red;">*&nbsp;</label>Nombre</label><input type="text" value="<?php echo $p->nombre ; ?>"  required  pattern="[a-zA-Z\sñÑáéíóúÁÉÍÚÓ]+"  oninput="checkNombre(this);" class="form-control" name="nombre" id="nombre" placeholder="Entre el nombre del idioma">  
						<p id="msgNombre" style="color: red;"></p>
					</div>
					<div class="col-1"></div>  

					<div class="col-1"></div>
					<div class="form-group col-md-4">
						<label for="organo"><label style="color: red;">*&nbsp;</label>¿Cómo lo lee?</label>
						<select onchange="cambioNivel()" class="form-control" id="lee" name="lee"  >      
							<option disabled  value="0">--Seleccione el nivel--</option>
							<option value="Bien" <?php if($p->califLee == "Bien") echo 'selected="selected"'?>>Bien</option>
							<option value="Regular" <?php if($p->califLee == "Regular") echo 'selected="selected"'?>>Regular</option>
							<option value="Mal" <?php if($p->califLee == "Mal") echo 'selected="selected"'?>>Mal</option>
						</select>  
						<p id="msgLee" style="color: red;"></p>
					</div>
					<div class="col-1 "></div>

					<div class="col-1"></div>
					<div class="form-group col-md-4">
						<label for="organo"><label style="color: red;">*&nbsp;</label>¿Cómo lo habla?</label>
						<select onchange="cambioNivel()" class="form-control" id="habla" name="habla"  >      
							<option disabled  value="0">--Seleccione el nivel--</option>
							<option value="Bien" <?php if($p->calficHabla == "Bien") echo 'selected="selected"'?>>Bien</option>
							<option value="Regular" <?php if($p->calficHabla == "Regular") echo 'selected="selected"'?>>Regular</option>
							<option value="Mal" <?php if($p->calficHabla == "Mal") echo 'selected="selected"'?>>Mal</option>
						</select>  
						<p id="msgHabla" style="color: red;"></p>
					</div>
					<div class="col-1 "></div>

					<div class="col-1"></div>
					<div class="form-group col-md-4">
						<label for="organo"><label style="color: red;">*&nbsp;</label>¿Cómo lo escribe?</label>
						<select onchange="cambioNivel()" class="form-control" id="escribe" name="escribe"  >      
							<option disabled  value="0">--Seleccione el nivel--</option>
							<option value="Bien" <?php if($p->califEscribe == "Bien") echo 'selected="selected"'?>>Bien</option>
							<option value="Regular" <?php if($p->califEscribe == "Regular") echo 'selected="selected"'?>>Regular</option>
							<option value="Mal" <?php if($p->califEscribe == "Mal") echo 'selected="selected"'?>>Mal</option>
						</select>  
						<p id="msgEscribe" style="color: red;"></p>
					</div>
					<div class="col-1 "></div>

                	</div>
                
				</div>

                <div class="card-footer">
				<br />
					<div class="row">
					
					<div class="col-md-5"></div>
					
					<div class="col-md-1">
					<?php $flag = True; $message = 1; $type = True; $pag = "idiomas"?>
					
					
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
			
			var valorSelectLee = document.getElementById('lee').value;
			if(valorSelectLee == 0){
				doc = "Debe seleccionar una opción";
				document.getElementById("msgLee").innerHTML = doc;
				return false;
			}

			var valorSelectHabla = document.getElementById('habla').value;
			if(valorSelectHabla == 0){
				doc = "Debe seleccionar una opción";
				document.getElementById("msgHabla").innerHTML = doc;
				return false;
			}

			var valorSelectEscribe = document.getElementById('escribe').value;
			if(valorSelectEscribe == 0){
				doc = "Debe seleccionar una fecha";
				document.getElementById("msgEscribe").innerHTML = doc;
				return false;
			}
			return true;
		}


</script>