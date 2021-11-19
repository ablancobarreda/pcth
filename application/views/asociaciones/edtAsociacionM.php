



<!-- Content Wrapper. Contains page content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><spam><i class="fas fa-edit"></i></spam> Editar asociación:</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="#">Home</a></li>
                        <li class="breadcrumb-item "><a href="#">Miembro</a></li>
                        <li class="breadcrumb-item "><a href="#">Expediente del miembro</a></li>
                        <li class="breadcrumb-item active">Editar asociación</li>
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
					<spam><i class="fas fa-edit"></i></spam> <b>Editar datos de la asociación</b>
				</div>
              <!-- /.card-header -->
              <!-- form start -->
              <form onsubmit="return validar()" action="<?php echo base_url('index.php/controller/edtAsociacionM')?>" method="POST" >
			  <?php  foreach ($asociacion->result() as $asoc) {  ?>
			 	 <div class="card-body">
				  
				  <input type="hidden" class="form-control" value="<?php echo $asoc->idasociacionProfesional ; ?>" name="idiasoc" id="idiasoc" > 

						<input type="hidden" value="<?php echo $cim; ?>"  name="cim" id="cim">  

				  <div class="row">
				  <div class="col-1"></div>
					<div class="form-group col-md-4">
						<label for="organo"><label style="color: red;">*&nbsp;</label>Nivel:</label>
						<select onchange="cambioTInnovacion()" class="form-control" id="nivel" name="nivel"  >      
							<option disabled value="0">--Seleccione el nivel--</option>
							<option value="Nacional" <?php if($asoc->nivel == "Nacional") echo 'selected="selected"'?>>Nacional</option>
							<option value="Extranjera" <?php if($asoc->nivel == "Extranjera") echo 'selected="selected"'?>>Extranjera</option>
						</select>  
						<p id="msgNivel" style="color: red;"></p>
					</div>
					<div class="col-1 "></div>

					<div class="col-1"></div>
					<div class="form-group col-md-4">
				  		<label for="cargo">Cargo <label style="color: red;">(si ocupa)</label>:</label><input type="text" value="<?php echo $asoc->cargo ; ?>"  pattern="[a-zA-Z\sñÑáéíóúÁÉÍÚÓ]+"  oninput="checkCargo(this);" class="form-control" name="cargo" id="cargo" placeholder="Entre el cargo">  
						<p id="msgCargo" style="color: red;"></p>
					</div>
					<div class="col-1"></div>  


                	</div>
                
				</div>

                <div class="card-footer">
				<br />
					<div class="row">
					
					<div class="col-md-5"></div>
					
					<div class="col-md-1">
					<?php $flag = True; $message = 1; $type = True ; $pag = "organizaciones"; ?>
					
					
						<a href="<?php echo base_url()."index.php/controller/viewResponsable/".$flag.'/'.$message.'/'.$type.'/'. $cim.'/'. $pag; ?>"> 
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
		
		function checkCargo(input){
			if(input.validity.patternMismatch){
				//input.setCustomValidity("Este campo no acepta números");
				doc = "Este campo solo acepta letras.";
			}
			else{
				input.setCustomValidity("");
				doc = "";
			}
			document.getElementById("msgCargo").innerHTML = doc;
		}	

		

		function validar(){
			var doc;
			
			var valorSelectNivel= document.getElementById('nivel').value;
			if(valorSelectNivel == 0){
				doc = "Debe seleccionar una opción";
				document.getElementById("msgNivel").innerHTML = doc;
				return false;
			}

			return true;
		}


</script>