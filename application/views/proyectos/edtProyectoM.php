



<!-- Content Wrapper. Contains page content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><spam><i class="fas fa-edit"></i></spam> Editar proyecto:</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="#">Home</a></li>
                        <li class="breadcrumb-item "><a href="#">Miembro</a></li>
                        <li class="breadcrumb-item "><a href="#">Expediente del miembro</a></li>
                        <li class="breadcrumb-item active">Editar proyecto</li>
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
					<spam><i class="fas fa-edit"></i></spam> <b>Editar datos del proyecto</b>
				</div>
              <!-- /.card-header -->
              <!-- form start -->
              <form onsubmit="return validar()" action="<?php echo base_url('index.php/controller/edtProyectoM')?>" method="POST" >
			  <?php  foreach ($proy->result() as $p) {  ?>
			 	 <div class="card-body">
				  
				  <input type="hidden" class="form-control" value="<?php echo $p->idproyecto  ; ?>" name="idp" id="idp" > 

						<input type="hidden" value="<?php echo $cim; ?>"  name="cim" id="cim">  

				  <div class="row">
				  <div class="col-1"></div>
					<div class="form-group col-md-4">
				  		<label for="problematica"><label style="color: red;">*&nbsp;</label>Denomicación</label><input type="text" value="<?php echo $p->denomicacion ; ?>"  required  pattern="[a-zA-Z\sñÑáéíóúÁÉÍÚÓ]+"  oninput="checkDenomicacion(this);" class="form-control" name="denomicacion" id="denomicacion" placeholder="Entre la denomicación">  
						<p id="msgDenomicacion" style="color: red;"></p>
					</div>
					<div class="col-1"></div>    
				
					<div class="col-1"></div>
					<div class="form-group col-md-4">
						<label for="organo"><label style="color: red;">*&nbsp;</label>Tipo de proyecto:</label>
						<select onchange="cambioTipo()" class="form-control" id="tipoProyecto" name="tipoProyecto"  >      
							<option disabled   value="0">--Seleccione el tipo--</option>
							<option value="Propio"  <?php if($p->tipoProyecto == "Propio") echo 'selected="selected"'?>>Propio</option>
							<option value="Implicado"  <?php if($p->tipoProyecto == "Implicado") echo 'selected="selected"'?>>Implicado</option>
						</select>  
						<p id="msgtipoProyecto" style="color: red;"></p>
					</div>
					<div class="col-1 "></div>

					<div class="col-1"></div>
					<div class="form-group col-md-4">
						<label for="organo"><label style="color: red;">*&nbsp;</label>Clasificación:</label>
						<select onchange="cambioTipo()" class="form-control" id="tipoTProyecto" name="tipoTProyecto"  >      
							<option disabled   value="0">--Seleccione la clasificación--</option>
							<option value="Institucional"  <?php if($p->tipoTProyecto == "Institucional") echo 'selected="selected"'?>>Institucional</option>
							<option value="Territorial"  <?php if($p->tipoTProyecto == "Territorial") echo 'selected="selected"'?>>Territorial</option>
						</select>  
						<p id="msgtipoTProyecto" style="color: red;"></p>
					</div>
					<div class="col-1 "></div>

                	</div>
                
				</div>

                <div class="card-footer">
				<br />
					<div class="row">
					
					<div class="col-md-5"></div>
					
					<div class="col-md-1">
					<?php $flag = True; $message = 1; $type = True; $pag = "proyectos"?>
					
					
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
			

		function checkDenomicacion(input){
			if(input.validity.patternMismatch){
				//input.setCustomValidity("Este campo no acepta números");
				doc = "Este campo solo acepta letras.";
			}
			else{
				input.setCustomValidity("");
				doc = "";
			}
			document.getElementById("msgDenomicacion").innerHTML = doc;
		}			

		function validar(){
			var doc;
			
			var valorSelecttipoProyecto = document.getElementById('tipoProyecto').value;
			if(valorSelecttipoProyecto == 0){
				doc = "Debe seleccionar una opción";
				document.getElementById("msgtipoProyecto").innerHTML = doc;
				return false;
			}

			var valorSelecttipoTProyecto = document.getElementById('tipoTProyecto').value;
			if(valorSelecttipoTProyecto == 0){
				doc = "Debe seleccionar una opción";
				document.getElementById("msgtipoTProyecto").innerHTML = doc;
				return false;
			}
			return true;
		}


</script>