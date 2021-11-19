



<!-- Content Wrapper. Contains page content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><spam><i class="fas fa-edit"></i></spam> Editar colaboración:</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="#">Home</a></li>
                        <li class="breadcrumb-item "><a href="#">Miembro</a></li>
                        <li class="breadcrumb-item "><a href="#">Expediente del miembro</a></li>
                        <li class="breadcrumb-item active">Editar colaboración</li>
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
					<spam><i class="fas fa-edit"></i></spam> <b>Editar datos de la colaboración</b>
				</div>
              <!-- /.card-header -->
              <!-- form start -->
              <form onsubmit="return validar()" action="<?php echo base_url('index.php/controller/edtColaboracionM')?>" method="POST" >
			  <?php  foreach ($colab->result() as $p) {  ?>
			 	 <div class="card-body">
				  
				  <input type="hidden" class="form-control" value="<?php echo $p->idcolaboracion ; ?>" name="idp" id="idp" > 

						<input type="hidden" value="<?php echo $cim; ?>"  name="cim" id="cim">  

				  <div class="row">
				  <div class="col-1"></div>
					<div class="form-group col-md-4">
						<label for="organo"><label style="color: red;">*&nbsp;</label>Tipo de colaboración:</label>
						<select onchange="cambioNivel()" class="form-control" id="tipo" name="tipo"  >      
							<option disabled  value="0">--Seleccione el nivel--</option>
							<option value="Comité de expertos" <?php if($p->tipo == "Comité de expertos") echo 'selected="selected"'?>>Comité de expertos</option>
							<option value="Comisiones metodológicas" <?php if($p->tipo == "Comisiones metodológicas") echo 'selected="selected"'?>>Comisiones metodológicas</option>
							<option value="Consejo científico" <?php if($p->tipo == "Consejo científico") echo 'selected="selected"'?>>Consejo científico</option>
						</select>  
						<p id="msgTipo" style="color: red;"></p>
					</div>
					<div class="col-1 "></div>

					<div class="col-1"></div>
					<div class="form-group col-md-4">
				  		<label for="programa"><label style="color: red;">*&nbsp;</label>Fecha desde:</label><input type="date" value="<?php echo $p->fechaInicio ; ?>"   class="form-control" name="fechaDesde" id="fechaDesde" >  
						<p id="msgFechaDesde" style="color: red;"></p>
					</div>
					<div class="col-1"></div>  
				
					<div class="col-1"></div>  
					<div class="form-group col-md-4">
				  		<label for="prioridades"><label style="color: red;">*&nbsp;</label>Fecha hasta:</label><input type="date" value="<?php echo $p->fechaFin ; ?>"   class="form-control" name="fechaHasta" id="fechaHasta" >  
						<p id="msgFechaHasta" style="color: red;"></p>
				  	</div>
					<div class="col-1"></div>

                	</div>
                
				</div>

                <div class="card-footer">
				<br />
					<div class="row">
					
					<div class="col-md-5"></div>
					
					<div class="col-md-1">
					<?php $flag = True; $message = 1; $type = True; $pag = "colaboraciones"?>
					
					
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