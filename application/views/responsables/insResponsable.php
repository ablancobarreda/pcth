<!-- Content Wrapper. Contains page content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
				<h1 class="m-0 text-dark"><spam><i class="fas fa-plus"></i></spam> Insertar miembro</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item "><a href="#">Miembros</a></li>
                        <li class="breadcrumb-item active">Insertar miembro</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
			<div class="callout callout-info"style="background-color:#e0f7fa;">
				<h5><i class="fas fa-info-circle" style="color:#117a8b;"></i> Información</h5>
				<p>Los campos con (<label style="color: red;">*</label>) son obligatorios.</p>
			</div>
            <!-- Small boxes (Stat box) -->
            <div class="card card-primary">
				<div class="card-header text-white" style=" background: linear-gradient(to right, #1e88e5, #66bb6a);">
					<spam><i class="fas fa-plus"></i></spam> <b>Insertar miembro</b>
				</div>
              <!-- /.card-header -->
              <!-- form start -->
			  <!-- form onsubmit="return validar()" id="regForm" action="<?php echo base_url('index.php/controller/insResponsable')?>" method="POST" >
				
						<div class="card-body">
							
						<div class="tab">
							<div class="row">
								<div class="col-4"></div>
								<div class="form-group col-md-4">
									<label for="ci"><label style="color: red;">*&nbsp;</label>CI:</label><input type="text"  required pattern="[0-9]{11}"  oninput="checkCI(this);" maxlength="11" class="form-control" name="ci" id="ci" placeholder="Entre el CI">  
									<p id="msgCI" style="color: red;"></p>
									<div class="form-check">
										<input type="checkbox" class="form-check-input" id="exampleCheck1">
										<label class="form-check-label" for="exampleCheck1"><strong>Carnet de Identidad inválido.</strong></label>
									</div>
								</div>
								<div class="col-4"></div>
								
								<div class="col-4"></div>
								<div class="form-group col-md-4">
									<label for="name"><label style="color: red;">*&nbsp;</label>Nombres:</label><input type="text"  required pattern="[a-zA-Z\sñÑáéíóúÁÉÍÚÓ]+" oninput="checkName(this);" class="form-control" name="name" id="name" placeholder="Entre el(los) nombre(s)">  
									<p id="msgName" style="color: red;"></p>
								</div>
								<div class="col-4"></div>

								<div class="col-4"></div>
								<div class="form-group col-md-4">
									<label for="apellido1"><label style="color: red;">*&nbsp;</label>1<sup>er</sup> Apellido:</label><input type="text"  required pattern="[a-zA-Z\sñÑáéíóúÁÉÍÚÓ]+" oninput="checkApellido1(this);"  class="form-control" name="apellido1" id="apellido1" placeholder="Entre el primer apellido">  
									<p id="msgApellido1" style="color: red;"></p>
								</div>
								<div class="col-4"></div>

								<div class="col-4"></div>
								<div class="form-group col-md-4">
									<label for="apellido2"><label style="color: red;">*&nbsp;</label>2<sup>do</sup> Apellido</label><input type="text"  required pattern="[a-zA-Z\sñÑáéíóúÁÉÍÚÓ]+" oninput="checkApellido2(this);"  class="form-control" name="apellido2" id="apellido2" placeholder="Entre el segundo apellido">  
									<p id="msgApellido2" style="color: red;"></p>
								</div>
								<div class="col-4"></div>

								<div class="col-4"></div>
								<div class="form-group col-md-4">
									<label for="sexo"><label style="color: red;">*&nbsp;</label>Sexo:</label>
									<select onchange="cambioSexo()" class="form-control" id="sexo" name="sexo"  >      
										<option disabled selected value="0">--Seleccione el sexo--</option>
										<option value="F">Femenino</option>
										<option value="M">Masculino</option>
									</select>  
									<p id="msgSexo" style="color: red;"></p>
								</div>
								<div class="col-4"></div>



							</div>
						</div>

						<div class="tab">
							<input type="text"  required pattern="[a-zA-Z\sñÑáéíóúÁÉÍÚÓ]+" class="form-control" name="apellido1" id="apellido1" placeholder="Entre el primer apellido">
							<p id="msg2" style="color: red;"></p>	
						</div>

						<div class="tab">

							<input type="text"  required pattern="[a-zA-Z\sñÑáéíóúÁÉÍÚÓ]+" class="form-control" name="apellido2" id="apellido2" placeholder="Entre el segundo apellido">
							<p id="msg3" style="color: red;"></p>

								<span class="step" style="display: none !important;">1</span>
								<span class="step" style="display: none !important;" >2</span>
								<span class="step" style="display: none !important;">3</span>
							
							</div>

						</div>

						<div class="card-footer">
							<br />
							<div class="row">
								<div class="col-md-4"></div>
									<div class="col-md-1">
										<button type="button" id="prevBtn" class="btn btn-secondary btn-block" onclick="nextPrev(-1)"><i class="fas fa-arrow-left mr-1"></i> Anterior</button><br />
									</div>
									<div class="col-md-1">
										<button type="reset" class="btn btn-primary btn-block"><i class="fa fa-eraser mr-1"></i> Limpiar</button><br />
									</div>
									
									<div class="col-md-1">
									
									<?php $flag = True; $message = 1; $type = True; ?>
										<a  href="<?php echo base_url()."index.php/controller/viewResponsable/".$flag.'/'.$message.'/'.$type; ?>" > 
											<button type="button" class="btn btn-danger btn-block "><i class="fa fa-times mr-1"></i> Cancelar
											</button> <br />	
										</a>
									
								</div>
									<div class="col-md-1">
										<button type="button" id="nextBtn" class="btn btn-secondary btn-block" onclick="nextPrev(1)">Siguiente</button>
									</div>
								</div>
							</div>
						</div>
				
				</form -->

              <form onsubmit="return validar()" action="<?php echo base_url('index.php/controller/insResponsable')?>" method="POST" >
				
			<div class="card-body">
				  

				<div class="row">
					<div class="col-1"></div>
					<div class="form-group col-md-4">
				  		<label for="ci"><label style="color: red;">*&nbsp;</label>CI:</label><input type="text"  required pattern="[0-9]{11}"  oninput="checkCI(this);" maxlength="11" class="form-control" name="ci" id="ci" placeholder="Entre el CI">  
						<p id="msgCI" style="color: red;"></p>
						<div class="form-check">
							<input type="checkbox" class="form-check-input" id="exampleCheck1">
							<label class="form-check-label" for="exampleCheck1"><strong>Carnet de Identidad inválido.</strong></label>
						</div>
					</div>
					<div class="col-1"></div>  

					<div class="col-1"></div>
					<div class="form-group col-md-4">
				  		<label for="cimilitar">CI Militar:</label><input type="text"   pattern="[0-9]+"  oninput="checkCIMilitar(this);" class="form-control" name="cimilitar" id="cimilitar" placeholder="Entre el CI Militar">  
						<p id="msgCIMilitar" style="color: red;"></p>
					</div>
					<div class="col-1"></div>  

					<div class="col-1"></div>
					<div class="form-group col-md-4">
						<label for="cargo"><label style="color: red;">*&nbsp;</label>Grado militar:</label>
						<select onchange="cambioGrado()" class="form-control" id="grado" name="grado"  >      
							<option disabled selected value="0">--Seleccione el grado militar--</option>
							<option value="Cabo">Cabo</option>
							<option value="Sargento de Tercera">Sargento de Tercera</option>
							<option value="Sargento de Segunda">Sargento de Segunda</option>
							<option value="Sargento de Primera">Sargento de Primera</option>
							<option value="Suboficial">Suboficial</option>
							<option value="Segundo Suboficial">Segundo Suboficial</option>
							<option value="Primer Suboficial">Primer Suboficial</option>
							<option value="Subteniente">Subteniente</option>
							<option value="Teniente">Teniente</option>
							<option value="Primer Teniente">Primer Teniente</option>
							<option value="Capitán">Capitán</option>
							<option value="Mayor">Mayor</option>
							<option value="Teniente Coronel">Teniente Coronel</option>
							<option value="Coronel">Coronel</option>
							<option value="General de Brigada">General de Brigada</option>
							<option value="General de División">General de División</option>
							<option value="General de Cuerpo de Ejército">General de Cuerpo de Ejército</option>
							<option value="Comandante del Ejército Rebelde">Comandante del Ejército Rebelde</option>
							<option value="Comandante de la Revolución">Comandante de la Revolución</option>
							<option value="General de Ejército">General de Ejército</option>
							<option value="Comandante en Jefe">Comandante en Jefe</option>
						</select>  
						
						<p id="msgGrado" style="color: red;"></p>
					</div>
					<div class="col-1"></div>

					<div class="col-1"></div>
					<div class="form-group col-md-4">
						<label for="sexo"><label style="color: red;">*&nbsp;</label>Sexo:</label>
						<select onchange="cambioSexo()" class="form-control" id="sexo" name="sexo"  >      
							<option disabled selected value="0">--Seleccione el sexo--</option>
							<option value="F">Femenino</option>
							<option value="M">Masculino</option>
						</select>  
						<p id="msgSexo" style="color: red;"></p>
					</div>
					<div class="col-1"></div>

					<div class="col-1"></div>
					<div class="form-group col-md-4">
				  		<label for="name"><label style="color: red;">*&nbsp;</label>Nombres:</label><input type="text"  required pattern="[a-zA-Z\sñÑáéíóúÁÉÍÚÓ]+" oninput="checkName(this);" class="form-control" name="name" id="name" placeholder="Entre el(los) nombre(s)">  
						<p id="msgName" style="color: red;"></p>
					</div>
					<div class="col-1"></div>  
				
					<div class="col-1"></div>  
					<div class="form-group col-md-4">
				  		<label for="apellido1"><label style="color: red;">*&nbsp;</label>1<sup>er</sup> Apellido:</label><input type="text"  required pattern="[a-zA-Z\sñÑáéíóúÁÉÍÚÓ]+" oninput="checkApellido1(this);"  class="form-control" name="apellido1" id="apellido1" placeholder="Entre el primer apellido">  
						<p id="msgApellido1" style="color: red;"></p>
				  	</div>
					<div class="col-1"></div>

					<div class="col-1"></div>
					<div class="form-group col-md-4">
				  		<label for="apellido2"><label style="color: red;">*&nbsp;</label>2<sup>do</sup> Apellido</label><input type="text"  required pattern="[a-zA-Z\sñÑáéíóúÁÉÍÚÓ]+" oninput="checkApellido2(this);"  class="form-control" name="apellido2" id="apellido2" placeholder="Entre el segundo apellido">  
						<p id="msgApellido2" style="color: red;"></p>
					</div>
					<div class="col-1"></div>

					<div class="col-1"></div>
					<div class="form-group col-md-4">
				  		<label for="direccion"><label style="color: red;">*&nbsp;</label>Dirección</label><input type="text"  required pattern="[0-9a-zA-Z\sñÑáéíóúÁÉÍÚÓ./#-]+" oninput="checkDireccion(this);"  class="form-control" name="direccion" id="direccion" placeholder="Entre la dirección particular">  
						<p id="msgDireccion" style="color: red;"></p>
					</div>
					<div class="col-1"></div>

					

					<div class="col-1"></div>
					<div class="form-group col-md-4">
				  		<label for="nacimiento"><label style="color: red;">*&nbsp;</label>Lugar nacimiento:</label><input type="text"  required pattern="[a-zA-Z\sñÑáéíóúÁÉÍÚÓ]+" oninput="checkNacimiento(this);" class="form-control" name="nacimiento" id="nacimiento" placeholder="Entre el lugar de nacimiento">  
						<p id="msgNacimeinto" style="color: red;"></p>
					</div>
					<div class="col-1"></div> 

					<div class="col-1"></div>
					<div class="form-group col-md-4">
				  		<label for="nacionalidad"><label style="color: red;">*&nbsp;</label>Nacionalidad:</label><input type="text"  required pattern="[a-zA-Z\sñÑáéíóúÁÉÍÚÓ]+" oninput="checkNacionalidad(this);" class="form-control" name="nacionalidad" id="nacionalidad" placeholder="Entre la nacionalidad">  
						<p id="msgNacionalidad" style="color: red;"></p>
					</div>
					<div class="col-1"></div> 

					<div class="col-1"></div>
					<div class="form-group col-md-4">
						<label for="estado"><label style="color: red;">*&nbsp;</label>Estado civil:</label>
						<select onchange="cambioEstado()" class="form-control" id="estado" name="estado"  >      
							<option disabled selected value="0">--Seleccione el estado civil--</option>
							<option value="Soltero">Soltero</option>
							<option value="Casado">Casado</option>
							<option value="Divorciado">Divorciado</option>
							<option value="Novios">Novios</option>
							<option value="Viudo">Viudo</option>
						</select>  
						<p id="msgEstado" style="color: red;"></p>
					</div>
					<div class="col-1 "></div>

					<div class="col-1"></div>
					<div class="form-group col-md-4">
				  		<label for="hijos"><label style="color: red;">*&nbsp;</label>Hijos:</label>
						  <input type="number"  required pattern="[0-9]+" oninput="checkHijos(this);" class="form-control" name="hijosvarones" id="hijosvarones" placeholder="Cantidad de varones">  <br>
						  <input type="number"  required pattern="[0-9]+" oninput="checkHijos(this);" class="form-control" name="hijoshembras" id="hijoshembras" placeholder="Cantidad de hembras">  
						<p id="msgHijos" style="color: red;"></p>
					</div>
					<div class="col-1"></div> 
					
					<div class="col-1"></div>
					<div class="form-group col-md-4">
						<label for="cuadro"><label style="color: red;">*&nbsp;</label>Cuadro:</label>
						<select onchange="cambioCuadro()" class="form-control" id="cuadro" name="cuadro"  >      
							<option disabled selected value="0">--Seleccione una opción--</option>
							<option value="Titular">Titular</option>
							<option value="Reserva">Reserva</option>
							<option value="Título de oro">Título de oro</option>
							<option value="Cantera de jóvenes">Cantera de jóvenes</option>
						</select>  
						<p id="msgOrgano" style="color: red;"></p>
					</div>
					<div class="col-1 "></div>

					<div class="col-1"></div>
					<div class="form-group col-md-4">
						<label for="organo"><label style="color: red;">*&nbsp;</label>Órgano:</label>
						<select onchange="cambioOrgano()" class="form-control" id="organo" name="organo"  >      
							<option disabled selected value="0">--Seleccione el organo--</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
						</select>  
						<p id="msgOrgano" style="color: red;"></p>
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
					<?php $flag = True; $message = 1; $type = True; ?>
						<a href="<?php echo base_url()."index.php/controller/ltsResponsables/".$flag.'/'.$message.'/'.$type; ?>"> 
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
				
                
            
            <!-- /.row -->
            <!-- Main row -->
            
            
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
	/*
	var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("tab");
	x[n].style.display = "block";
	//alert("tabs "+ x.length);
  // ... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
		
    document.getElementById("nextBtn").className = "btn btn-success btn-block";
		document.getElementById("nextBtn").innerHTML = "<i class='fas fa-check mr-1'></i> Aceptar";
		

  } else {
		document.getElementById("nextBtn").innerHTML = "<i class='fas fa-arrow-right '></i> Siguiente";
		document.getElementById("nextBtn").className = "btn btn-secondary btn-block";
  }
  // ... and run a function that displays the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
	var x = document.getElementsByClassName("tab");

  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
	currentTab = currentTab + n;
  // if you have reached the end of the form... :
  if (currentTab >= x.length) {
    //...the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, z, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");

  //alert("tab actual "+currentTab);
  //alert("Cant imputs "+y.length);

	if(currentTab == 0){
		for(i=0; i < y.length; i++) {
			if(y[i].id == "ci"){
				if(y[i].value == ""){
					//alert("toy aqui en el nombre");
					doc = "Debe llenar este campo.";
					document.getElementById("msgCI").innerHTML = doc;
					valid = false;
					break;
				}
				if(checkCI(y[i])){
					alert("entre");
					valid = false;
					break;
				}
			}
			if(y[i].id == "name"){
				if(y[i].value == ""){
					//alert("toy aqui en el nombre");
					doc = "Debe llenar este campo.";
					document.getElementById("msgName").innerHTML = doc;
					valid = false;
					break;
				}
			}
			if(y[i].id == "apellido1"){
				if(y[i].value == ""){
					//alert("toy aqui en el nombre");
					doc = "Debe llenar este campo.";
					document.getElementById("msgApellido1").innerHTML = doc;
					valid = false;
					break;
				}
			}
			if(y[i].id == "apellido2"){
				if(y[i].value == ""){
					//alert("toy aqui en el nombre");
					doc = "Debe llenar este campo.";
					document.getElementById("msgApellido2").innerHTML = doc;
					valid = false;
					break;
				}
			}
			if(y[i].id == "sexo"){
				if(y[i].value == "0"){
					//alert("toy aqui en el nombre");
					doc = "Debe seleccionar un sexo.";
					document.getElementById("msgSexo").innerHTML = doc;
					valid = false;
					break;
				}
			}
		}
	}
	else if(currentTab == 1){
		for(i=0; i < y.length; i++) {
			if(y[i].id == "apellido1"){
				if(y[i].value == ""){
					alert("toy aqui en apellido 1");
					doc = "Debe llenar este campo.";
					document.getElementById("msg2").innerHTML = doc;
					valid = false;
					break;
				}
			}
		}
	}
	else if(currentTab == 2){
		for(i=0; i < y.length; i++) {
			if(y[i].id == "apellido2"){
				if(y[i].value == ""){
					alert("toy aqui en apellido 2");
					doc = "Debe llenar este campo.";
					document.getElementById("msg2").innerHTML = doc;
					valid = false;
					break;
				}
			}
		}
	}
  
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class to the current step:
  x[n].className += " active";
}
*/
</script>
	<script type="text/javascript">
		function checkCI(input){
			if(input.validity.patternMismatch){
				//input.setCustomValidity("Este campo solo acepta 11 caracteres.");
				doc = "Este campo solo acepta números y debe tener una cantidad de 11 caracteres.";
				
			}
			else{
				input.setCustomValidity("");
				doc = "";
			}
			var checkInvalido = document.getElementById('exampleCheck1').checked;
			var valorCI = document.getElementById('ci').value;
			//alert(valorCI.length);
			if(!checkInvalido && valorCI.length >= 5){
				
				// mes 00
				if((valorCI[2] == 0) && (valorCI[3] == 0)){
					doc = "CI inválido. Inserte uno correcto.";
					document.getElementById("msgCI").innerHTML = doc;
					return false;
				}
				// meses 10 11 y 12
				if((valorCI[2] == 1) && ((valorCI[3] != 0) && (valorCI[3] != 1) && (valorCI[3] != 2))){
					doc = "CI inválido. Inserte uno correcto.";
					document.getElementById("msgCI").innerHTML = doc;
					return false;
				}
				// comienzo de dias 1, 2 y 3
				if((valorCI[4] != 1) && (valorCI[4] != 2) && (valorCI[4] != 3)) {
					doc = "CI inválido. Inserte uno correcto.";
					document.getElementById("msgCI").innerHTML = doc;
					return false;
				}
				// terminacion de dias 0 y 1 cuando el incio del dia es con 3
				if((valorCI[4] == 3) && ((valorCI[5] != 0) && (valorCI[3] != 1))){
					doc = "CI inválido. Inserte uno correcto.";
					document.getElementById("msgCI").innerHTML = doc;
					return false;
				}
				// mes febrero
				if((valorCI[4]+valorCI[3] == 02) ){
					doc = "CI inválido. Inserte uno correcto.";
					document.getElementById("msgCI").innerHTML = doc;
					return false;
				}
				
			}
			document.getElementById("msgCI").innerHTML = doc;
		}	

		function checkCIMilitar(input){
			if(input.validity.patternMismatch){
				//input.setCustomValidity("Este campo solo acepta 11 caracteres.");
				doc = "Este campo solo acepta números.";
				
			}
			else{
				input.setCustomValidity("");
				doc = "";
			}
			document.getElementById("msgCIMilitar").innerHTML = doc;
		}	

		function checkName(input){
			if(input.validity.patternMismatch){
				//input.setCustomValidity("Este campo no acepta números");
				doc = "Este campo solo acepta letras.";
			}
			else{
				input.setCustomValidity("");
				doc = "";
			}
			document.getElementById("msgName").innerHTML = doc;
		}	

		function checkNacionalidad(input){
			if(input.validity.patternMismatch){
				//input.setCustomValidity("Este campo no acepta números");
				doc = "Este campo solo acepta letras.";
			}
			else{
				input.setCustomValidity("");
				doc = "";
			}
			document.getElementById("msgNacionalidad").innerHTML = doc;
		}	

		function checkDireccion(input){
			if(input.validity.patternMismatch){
				//input.setCustomValidity("Este campo no acepta números");
				doc = "Escriba una dirección correcta.";
			}
			else{
				input.setCustomValidity("");
				doc = "";
			}
			document.getElementById("msgDireccion").innerHTML = doc;
		}	

		function checkApellido1(input){
			if(input.validity.patternMismatch){
				//input.setCustomValidity("Este campo no acepta números");
				doc = "Este campo solo acepta letras.";
			}
			else{
				input.setCustomValidity("");
				doc = "";
			}
			document.getElementById("msgApellido1").innerHTML = doc;
		}	

		function checkApellido2(input){
			if(input.validity.patternMismatch){
				//input.setCustomValidity("Este campo no acepta números");
				doc = "Este campo solo acepta letras.";
			}
			else{
				input.setCustomValidity("");
				doc = "";
			}
			document.getElementById("msgApellido2").innerHTML = doc;
		}	

		function validar(){
			var doc;
			var valorSelectGrado = document.getElementById('grado').value;
			if(valorSelectGrado == 0){
				doc = "Debe seleccionar una opción";
				document.getElementById("msgGrado").innerHTML = doc;
				return false;
			}
			var valorSelectSexo = document.getElementById('sexo').value;
			if(valorSelectSexo == 0){
				doc = "Debe seleccionar una opción";
				document.getElementById("msgSexo").innerHTML = doc;
				return false;
			}

			var valorSelectOrgano = document.getElementById('organo').value;
			if(valorSelectOrgano == 0){
				doc = "Debe seleccionar una opción";
				document.getElementById("msgOrgano").innerHTML = doc;
				return false;
			}
			
			var valorSelectEstado = document.getElementById('estado').value;
			if(valorSelectEstado == 0){
				doc = "Debe seleccionar una opción";
				document.getElementById("msgEstado").innerHTML = doc;
				return false;
			}
			
			var valorSelect = document.getElementById('cargo').value;
			if(valorSelect == 0){
				doc = "Debe seleccionar una opción";
				document.getElementById("msgSelect").innerHTML = doc;
				return false;
			}
			var checkInvalido = document.getElementById('exampleCheck1').checked;
			if(!checkInvalido){
				var valorCI = document.getElementById('ci').value;
				// mes 00
				if((valorCI[2] == 0) && (valorCI[3] == 0)){
					doc = "CI inválido. Inserte uno correcto.";
					document.getElementById("msgCI").innerHTML = doc;
					return false;
				}
				// meses 10 11 y 12
				if((valorCI[2] == 1) && ((valorCI[3] != 0) && (valorCI[3] != 1) && (valorCI[3] != 2))){
					doc = "CI inválido. Inserte uno correcto.";
					document.getElementById("msgCI").innerHTML = doc;
					return false;
				}
				// comienzo de dias 1, 2 y 3
				if((valorCI[4] != 1) && (valorCI[4] != 2) && (valorCI[4] != 3)) {
					doc = "CI inválido. Inserte uno correcto.";
					document.getElementById("msgCI").innerHTML = doc;
					return false;
				}
				// terminacion de dias 0 y 1 cuando el incio del dia es con 3
				if((valorCI[4] == 3) && ((valorCI[5] != 0) && (valorCI[3] != 1))){
					doc = "CI inválido. Inserte uno correcto.";
					document.getElementById("msgCI").innerHTML = doc;
					return false;
				}
				// mes febrero
				if((valorCI[4]+valorCI[3] == 02) ){
					doc = "CI inválido. Inserte uno correcto.";
					document.getElementById("msgCI").innerHTML = doc;
					return false;
				}
				var valor = parseInt(valorCI[9]);
				if((valorSelectSexo == 'M') && (!esPar(valor))){
					doc = "No coincide el CI con el sexo.";
					document.getElementById("msgCI").innerHTML = doc;
					return false;
				}
				if((valorSelectSexo == 'F') && (esPar(valor))){
					doc = "No coincide el CI con el sexo.";
					document.getElementById("msgCI").innerHTML = doc;
					return false;
				}
			}
			return true;
		}

		
		function cambiovalor(){
			var valorSelect = document.getElementById('cargo').value;
			if(valorSelect == 0){
				doc = "Debe seleccionar una opción";
				document.getElementById("msgSelect").innerHTML = doc;
			}else{
				doc = "";
				document.getElementById("msgSelect").innerHTML = doc;
			}
		}

		function cambioSexo(){
			var valorSelect = document.getElementById('sexo').value;
			if(valorSelect == 0){
				doc = "Debe seleccionar una opción";
				document.getElementById("msgSexo").innerHTML = doc;
			}else{
				doc = "";
				document.getElementById("msgSexo").innerHTML = doc;
			}
			var checkInvalido = document.getElementById('exampleCheck1').checked;
			if(!checkInvalido){
				var valorCI = document.getElementById('ci').value;
				var valor = parseInt(valorCI[9]);
				if((valorSelect == "F") && (esPar(valor))){
					doc = "No se corresponde el sexo con los datos del CI";
					document.getElementById("msgSexo").innerHTML = doc;
				}else{
					doc = "";
					document.getElementById("msgSexo").innerHTML = doc;
				}
				if((valorSelect == "M") && (!esPar(valor))){
					doc = "No se corresponde el sexo con los datos del CI";
					document.getElementById("msgSexo").innerHTML = doc;
				}else{
					doc = "";
					document.getElementById("msgSexo").innerHTML = doc;
				}
			}
		}

		function esPar(valor){
			if(valor%2 == 0)
				return true;
			return false;
		}

		
</script>
