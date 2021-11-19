



<!-- Content Wrapper. Contains page content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><spam><i class="fas fa-plus"></i></spam> Insertar misión internacionalista:</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="#">Home</a></li>
                        <li class="breadcrumb-item "><a href="#">Miembro</a></li>
                        <li class="breadcrumb-item "><a href="#">Expediente del miembro</a></li>
                        <li class="breadcrumb-item active">Insertar misión internacionalista</li>
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
					<spam><i class="fas fa-plus"></i></spam> <b>Insertar datos de la misión internacionalista</b>
				</div>
              <!-- /.card-header -->
              <!-- form start -->
              <form onsubmit="return validar()" action="<?php echo base_url('index.php/controller/insMisionM')?>" method="POST" >
			  
			 	 <div class="card-body">
				  
				  
						<input type="hidden" value="<?php echo $cim; ?>"  name="cim" id="cim">  

				  <div class="row"> 

					<div class="col-1"></div>
					<div class="form-group col-md-4">
				  		<label for="cargo"><label style="color: red;">*&nbsp;</label>País:</label><input type="text" value="" required  pattern="[a-zA-Z\sñÑáéíóúÁÉÍÚÓ]+"  oninput="checkSolNoIdent(this);" class="form-control" name="solNoIdent" id="solNoIdent" placeholder="Entre el país">  
						<p id="msgSolucion" style="color: red;"></p>
					</div>
					<div class="col-1"></div> 

					<div class="col-1"></div>
					<div class="form-group col-md-4">
						<label for="organo"><label style="color: red;">*&nbsp;</label>Carácter:</label>
						<select onchange="cambioCaracter()" class="form-control" id="caracter" name="caracter"  >      
							<option disabled  selected value="0">--Seleccione el carácter--</option>
							<option value="Asesor" >Abierta</option>
							<option value="Líder" >Líder</option>
							<option value="Experto" >Experto</option>
							<option value="Colaborador" >Colaborador</option>
						</select>  
						<p id="msgcaracter" style="color: red;"></p>
					</div>
					<div class="col-1 "></div> 

					<div class="col-1"></div>
					<div class="form-group col-md-4">
				  		<label for="cargo"><label style="color: red;">*&nbsp;</label>Organismo:</label><input type="text" value="" required  pattern="[a-zA-Z\sñÑáéíóúÁÉÍÚÓ]+"  oninput="checkOrganismo(this);" class="form-control" name="organismo" id="organismo" placeholder="Entre el organismo">  
						<p id="msgOrganismo" style="color: red;"></p>
					</div>
					<div class="col-1"></div> 

					<div class="col-1"></div>
					<div class="form-group col-md-4">
				  		<label for="fechaDefensa"><label style="color: red;">*&nbsp;</label>Fecha inicio:</label><input type="date" value="" required  class="form-control" name="fechaInicio" id="fechaInicio" >  
						<p id="msgFechaInicio" style="color: red;"></p>
					</div>
					<div class="col-1"></div>  

					<div class="col-1"></div>
					<div class="form-group col-md-4">
				  		<label for="fechaDefensa"><label style="color: red;">*&nbsp;</label>Fecha fin:</label><input type="date" value="" required  class="form-control" name="fechaFin" id="fechaFin" >  
						<p id="msgFechaFin" style="color: red;"></p>
					</div>
					<div class="col-1"></div>  
				
					

					

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
					<?php $flag = True; $message = 1; $type = True;  $pag="misiones";?>
					
					
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

		function checkSolNoIdent(input){
			if(input.validity.patternMismatch){
				//input.setCustomValidity("Este campo no acepta números");
				doc = "Este campo solo acepta letras.";
			}
			else{
				input.setCustomValidity("");
				doc = "";
			}
			document.getElementById("msgSolucion").innerHTML = doc;
		}	
		function checkOrganismo(input){
			if(input.validity.patternMismatch){
				//input.setCustomValidity("Este campo no acepta números");
				doc = "Este campo solo acepta letras.";
			}
			else{
				input.setCustomValidity("");
				doc = "";
			}
			document.getElementById("msgSolucion").innerHTML = doc;
		}	

		

		function validar(){
			var doc;

			var valorFechaInicio = document.getElementById('fechaInicio').value;
			var valorFechaFin = document.getElementById('fechaFin').value;
			
			if(valorFechaInicio == ""){
				doc = "Debe seleccionar una fecha de inicio";
				document.getElementById("msgFechaInicio").innerHTML = doc;
				return false;
			}
			if(valorFechaFin == ""){
				doc = "Debe seleccionar una fecha final";
				document.getElementById("msgFechaFin").innerHTML = doc;
				return false;
			}

			if(valorFechaFin < valorFechaInicio){
				alert ("La fecha de inicio no puede ser mayor que la fecha final");
				return false;
			}

			var valorSelectTipoinnov= document.getElementById('caracter').value;
			if(valorSelectTipoinnov == 0){
				doc = "Debe seleccionar una opción";
				document.getElementById("msgcaracter").innerHTML = doc;
				return false;
			}
			return true;
		}


</script>