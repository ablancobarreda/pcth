



<!-- Content Wrapper. Contains page content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><spam><i class="fas fa-edit"></i></spam> Editar problemática:</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="#">Home</a></li>
                        <li class="breadcrumb-item "><a href="#">Banco problemas</a></li>
                        <li class="breadcrumb-item active">Editar problemática</li>
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
					<spam><i class="fas fa-edit"></i></spam> <b>Editar datos de la problemática</b>
				</div>
              <!-- /.card-header -->
              <!-- form start -->
              <form onsubmit="return validar()" action="<?php echo base_url('index.php/controller/edtProblematica')?>" method="POST" >
			  <?php  foreach ($p->result() as $d) {  ?>
			 	 <div class="card-body">
				  
				  <input type="hidden" class="form-control" value="<?php echo $d->numeroProblema; ?>" name="numeroProblema" id="numeroProblema" > 
						<input type="hidden" class="form-control" value="<?php echo $cp; ?>" name="controlpagina" id="controlpagina" > 

				  

				  <div class="row">
					<div class="col-1"></div>
					<div class="form-group col-md-4">
						<label for="organo"><label style="color: red;">*&nbsp;</label>Órgano:</label>
						<select onchange="cambioOrgano()" class="form-control" id="organo" name="organo"  >      
							<option disabled  value="0">--Seleccione el organo--</option>
							<option value="1" <?php if($d->organo == "1") echo 'selected="selected"'?>>1</option>
							<option value="2" <?php if($d->organo == "2") echo 'selected="selected"'?>>2</option>
							<option value="Cuadro" <?php if($d->organo == "Cuadro") echo 'selected="selected"'?>>Cuadro</option>
						</select>  
						<p id="msgOrgano" style="color: red;"></p>
					</div>
					<div class="col-1 "></div>

					<div class="col-1"></div>
					<div class="form-group col-md-4">
				  		<label for="problematica">Problemática:</label><input type="text" value="<?php echo $d->problematica; ?>"   pattern="[a-zA-Z\sñÑáéíóúÁÉÍÚÓ]+"  oninput="checkProblematica(this);" class="form-control" name="problematica" id="problematica" placeholder="Entre la denominación">  
						<p id="msgProblematica" style="color: red;"></p>
					</div>
					<div class="col-1"></div>  

					


					<div class="col-1"></div>
					<div class="form-group col-md-4">
				  		<label for="programa"><label style="color: red;">*&nbsp;</label>Programa:</label><input type="text" value="<?php echo $d->programa; ?>" required pattern="[a-zA-Z\sñÑáéíóúÁÉÍÚÓ]+" oninput="checkPrograma(this);" class="form-control" name="programa" id="programa" placeholder="Entre el programa">  
						<p id="msgPrograma" style="color: red;"></p>
					</div>
					<div class="col-1"></div>  
				
					<div class="col-1"></div>  
					<div class="form-group col-md-4">
				  		<label for="prioridades"><label style="color: red;">*&nbsp;</label>Prioridades:</label><input type="text" value="<?php echo $d->prioridades; ?>" required pattern="[a-zA-Z\sñÑáéíóúÁÉÍÚÓ]+" oninput="checkPrioridades(this);"  class="form-control" name="prioridades" id="prioridades" placeholder="Entre la prioridad">  
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
					<?php $flag = True; $message = 1; $type = True; ?>
					<?php if($cp != 0): ?>
						<a href="<?php echo base_url()."index.php/controller/viewResponsable/".$flag.'/'.$message.'/'.$type.'/'.$d->numeroProblema; ?>"> 
							<button type="button" class="btn btn-danger  btn-block"><i class="fa fa-times"></i> Cancelar</button> <br />	
						</a>
					<?php endif ?>
					<?php if($cp == 0): ?>
						<a href="<?php echo base_url()."index.php/controller/ltsProblematicas/".$flag.'/'.$message.'/'.$type; ?>"> 
							<button type="button" class="btn btn-danger  btn-block"><i class="fa fa-times"></i> Cancelar</button> <br />	
						</a>
					<?php endif ?>
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
		
		function checkProblematica(input){
			if(input.validity.patternMismatch){
				//input.setCustomValidity("Este campo no acepta números");
				doc = "Este campo solo acepta letras.";
			}
			else{
				input.setCustomValidity("");
				doc = "";
			}
			document.getElementById("msgProblematica").innerHTML = doc;
		}	

		function checkPrograma(input){
			if(input.validity.patternMismatch){
				//input.setCustomValidity("Este campo no acepta números");
				doc = "Este campo solo acepta letras.";
			}
			else{
				input.setCustomValidity("");
				doc = "";
			}
			document.getElementById("msgPrograma").innerHTML = doc;
		}	

		function checkPrioridades(input){
			if(input.validity.patternMismatch){
				//input.setCustomValidity("Este campo no acepta números");
				doc = "Este campo solo acepta letras.";
			}
			else{
				input.setCustomValidity("");
				doc = "";
			}
			document.getElementById("msgPrioridades").innerHTML = doc;
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

		function cambioOrgano(){
			var valorSelect = document.getElementById('organo').value;
			if(valorSelect == 0){
				doc = "Debe seleccionar una opción";
				document.getElementById("msgOrgano").innerHTML = doc;
			}else{
				doc = "";
				document.getElementById("msgOrgano").innerHTML = doc;
			}
		}

</script>