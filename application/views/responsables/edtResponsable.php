<!-- Content Wrapper. Contains page content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><spam><i class="fas fa-edit"></i></spam> Editar miembro:</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="#">Home</a></li>
                        <li class="breadcrumb-item "><a href="#">Miembros</a></li>
                        <li class="breadcrumb-item active">Editar miembro</li>
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
					<spam><i class="fas fa-edit"></i></spam> <b>Editar datos del miembro</b>
				</div>
              <!-- /.card-header -->
              <!-- form start -->
              <form onsubmit="return validar()" action="<?php echo base_url('index.php/controller/edtResponsable')?>" method="POST" >
			  <?php  foreach ($m->result() as $d) {  ?>
			 	 <div class="card-body">
				  
				  <input type="hidden" class="form-control" value="<?php echo $d->ci; ?>" name="idresponsable" id="idresponsable" > 
						<input type="hidden" class="form-control" value="<?php echo $cp; ?>" name="controlpagina" id="controlpagina" > 

				  <div class="row">

				  <div class="row">
					<div class="col-1"></div>
					<div class="form-group col-md-4">
				  		<label for="ci"><label style="color: red;">*&nbsp;</label>CI:</label><input type="text" value="<?php echo $d->ci; ?>" required pattern="[0-9]{11}"  oninput="checkCI(this);" maxlength="11" class="form-control" name="ci" id="ci" placeholder="Entre el CI">  
						<p id="msgCI" style="color: red;"></p>
						<div class="form-check">
							<input type="checkbox" class="form-check-input" id="exampleCheck1">
							<label class="form-check-label" for="exampleCheck1"><strong>Carnet de Identidad inválido.</strong></label>
						</div>
					</div>
					<div class="col-1"></div>  

					<div class="col-1"></div>
					<div class="form-group col-md-4">
				  		<label for="cimilitar">CI Militar:</label><input type="text" value="<?php echo $d->ciMilitar; ?>"   pattern="[0-9]+"  oninput="checkCIMilitar(this);" class="form-control" name="cimilitar" id="cimilitar" placeholder="Entre el CI Militar">  
						<p id="msgCIMilitar" style="color: red;"></p>
					</div>
					<div class="col-1"></div>  

					<div class="col-1"></div>
					<div class="form-group col-md-4">
						<label for="cargo"><label style="color: red;">*&nbsp;</label>Grado militar:</label>
						<select onchange="cambioGrado()" class="form-control" id="grado" name="grado"  >      
						<option disabled  value="0">--Seleccione el grado militar--</option>
							<option value="Cabo" <?php if($d->gradoMilitar == "Cabo") echo 'selected="selected"'?>>Cabo</option>
							<option value="Sargento de Tercera" <?php if($d->gradoMilitar == "Sargento de Tercera") echo 'selected="selected"'?>>Sargento de Tercera</option>
							<option value="Sargento de Segunda" <?php if($d->gradoMilitar == "Sargento de Segunda") echo 'selected="selected"'?>>Sargento de Segunda</option>
							<option value="Sargento de Primera" <?php if($d->gradoMilitar == "Sargento de Primera") echo 'selected="selected"'?>>Sargento de Primera</option>
							<option value="Suboficial" <?php if($d->gradoMilitar == "Suboficial") echo 'selected="selected"'?>>Suboficial</option>
							<option value="Segundo Suboficial" <?php if($d->gradoMilitar == "Segundo Suboficial") echo 'selected="selected"'?>>Segundo Suboficial</option>
							<option value="Primer Suboficial" <?php if($d->gradoMilitar == "Primer Suboficial") echo 'selected="selected"'?>>Primer Suboficial</option>
							<option value="Subteniente" <?php if($d->gradoMilitar == "Subteniente") echo 'selected="selected"'?>>Subteniente</option>
							<option value="Teniente" <?php if($d->gradoMilitar == "Teniente") echo 'selected="selected"'?>>Teniente</option>
							<option value="Primer Teniente" <?php if($d->gradoMilitar == "Primer Teniente") echo 'selected="selected"'?>>Primer Teniente</option>
							<option value="Capitán" <?php if($d->gradoMilitar == "Capitán") echo 'selected="selected"'?>>Capitán</option>
							<option value="Mayor" <?php if($d->gradoMilitar == "Mayor") echo 'selected="selected"'?>>Mayor</option>
							<option value="Teniente Coronel" <?php if($d->gradoMilitar == "Teniente Coronel") echo 'selected="selected"'?>>Teniente Coronel</option>
							<option value="Coronel" <?php if($d->gradoMilitar == "Coronel") echo 'selected="selected"'?>>Coronel</option>
							<option value="General de Brigada" <?php if($d->gradoMilitar == "General de Brigada") echo 'selected="selected"'?>>General de Brigada</option>
							<option value="General de División" <?php if($d->gradoMilitar == "General de División") echo 'selected="selected"'?>>General de División</option>
							<option value="General de Cuerpo de Ejército" <?php if($d->gradoMilitar == "General de Cuerpo de Ejército") echo 'selected="selected"'?>>General de Cuerpo de Ejército</option>
							<option value="Comandante del Ejército Rebelde" <?php if($d->gradoMilitar == "Comandante del Ejército Rebelde") echo 'selected="selected"'?>>Comandante del Ejército Rebelde</option>
							<option value="Comandante de la Revolución" <?php if($d->gradoMilitar == "Comandante de la Revolución") echo 'selected="selected"'?>>Comandante de la Revolución</option>
							<option value="General de Ejército" <?php if($d->gradoMilitar == "General de Ejército") echo 'selected="selected"'?>>General de Ejército</option>
							<option value="Comandante en Jefe" <?php if($d->gradoMilitar == "Comandante en Jefe") echo 'selected="selected"'?>>Comandante en Jefe</option>
						</select>  
						
						<p id="msgGrado" style="color: red;"></p>
					</div>
					<div class="col-1"></div>

					<div class="col-1"></div>
					<div class="form-group col-md-4">
						<label for="sexo"><label style="color: red;">*&nbsp;</label>Sexo:</label>
						<select onchange="cambioSexo()" class="form-control" id="sexo" name="sexo"  >      
							<option disabled  value="0">--Seleccione el sexo--</option>
							<option value="F" <?php if($d->sexo == "F") echo 'selected="selected"'?>>Femenino</option>
							<option value="M" <?php if($d->sexo == "M") echo 'selected="selected"'?>>Masculino</option>
						</select>  
						<p id="msgSexo" style="color: red;"></p>
					</div>
					<div class="col-1"></div>

					<div class="col-1"></div>
					<div class="form-group col-md-4">
				  		<label for="name"><label style="color: red;">*&nbsp;</label>Nombres:</label><input type="text" value="<?php echo $d->nombres; ?>" required pattern="[a-zA-Z\sñÑáéíóúÁÉÍÚÓ]+" oninput="checkName(this);" class="form-control" name="name" id="name" placeholder="Entre el(los) nombre(s)">  
						<p id="msgName" style="color: red;"></p>
					</div>
					<div class="col-1"></div>  
				
					<div class="col-1"></div>  
					<div class="form-group col-md-4">
				  		<label for="apellido1"><label style="color: red;">*&nbsp;</label>1<sup>er</sup> Apellido:</label><input type="text" value="<?php echo $d->apellido1; ?>" required pattern="[a-zA-Z\sñÑáéíóúÁÉÍÚÓ]+" oninput="checkApellido1(this);"  class="form-control" name="apellido1" id="apellido1" placeholder="Entre el primer apellido">  
						<p id="msgApellido1" style="color: red;"></p>
				  	</div>
					<div class="col-1"></div>

					<div class="col-1"></div>
					<div class="form-group col-md-4">
				  		<label for="apellido2"><label style="color: red;">*&nbsp;</label>2<sup>do</sup> Apellido</label><input type="text"  value="<?php echo $d->apellido2; ?>" required pattern="[a-zA-Z\sñÑáéíóúÁÉÍÚÓ]+" oninput="checkApellido2(this);"  class="form-control" name="apellido2" id="apellido2" placeholder="Entre el segundo apellido">  
						<p id="msgApellido2" style="color: red;"></p>
					</div>
					<div class="col-1"></div>

					<div class="col-1"></div>
					<div class="form-group col-md-4">
				  		<label for="direccion"><label style="color: red;">*&nbsp;</label>Dirección</label><input type="text" value="<?php echo $d->direccion; ?>" required pattern="[0-9a-zA-Z\sñÑáéíóúÁÉÍÚÓ./#-]+" oninput="checkDireccion(this);"  class="form-control" name="direccion" id="direccion" placeholder="Entre la dirección particular">  
						<p id="msgDireccion" style="color: red;"></p>
					</div>
					<div class="col-1"></div>

					

					<div class="col-1"></div>
					<div class="form-group col-md-4">
				  		<label for="nacimiento"><label style="color: red;">*&nbsp;</label>Lugar nacimiento:</label><input type="text" value="<?php echo $d->nacimientoLugar; ?>" required pattern="[a-zA-Z\sñÑáéíóúÁÉÍÚÓ]+" oninput="checkNacimiento(this);" class="form-control" name="nacimiento" id="nacimiento" placeholder="Entre el lugar de nacimiento">  
						<p id="msgNacimeinto" style="color: red;"></p>
					</div>
					<div class="col-1"></div> 

					<div class="col-1"></div>
					<div class="form-group col-md-4">
				  		<label for="nacionalidad"><label style="color: red;">*&nbsp;</label>Nacionalidad:</label><input type="text" value="<?php echo $d->nacionalidad; ?>" required pattern="[a-zA-Z\sñÑáéíóúÁÉÍÚÓ]+" oninput="checkNacionalidad(this);" class="form-control" name="nacionalidad" id="nacionalidad" placeholder="Entre la nacionalidad">  
						<p id="msgNacionalidad" style="color: red;"></p>
					</div>
					<div class="col-1"></div> 

					<div class="col-1"></div>
					<div class="form-group col-md-4">
						<label for="estado"><label style="color: red;">*&nbsp;</label>Estado civil:</label>
						<select onchange="cambioEstado()" class="form-control" id="estado" name="estado"  >      
							<option disabled  value="0">--Seleccione el estado civil--</option>
							<option value="Soltero" <?php if($d->estadoCivil == "Soltero") echo 'selected="selected"'?>>Soltero</option>
							<option value="Casado" <?php if($d->estadoCivil == "Casado") echo 'selected="selected"'?>>Casado</option>
							<option value="Divorciado" <?php if($d->estadoCivil == "Divorciado") echo 'selected="selected"'?>>Divorciado</option>
							<option value="Novios" <?php if($d->estadoCivil == "Novios") echo 'selected="selected"'?>>Novios</option>
							<option value="Viudo" <?php if($d->estadoCivil == "Viudo") echo 'selected="selected"'?>>Viudo</option>
						</select>  
						<p id="msgEstado" style="color: red;"></p>
					</div>
					<div class="col-1 "></div>

					<div class="col-1"></div>
					<div class="form-group col-md-4">
				  		<label for="hijos"><label style="color: red;">*&nbsp;</label>Hijos:</label>
						  <input type="number"  required pattern="[0-9]+" oninput="checkHijos(this);" class="form-control" value="<?php echo $d->varones; ?>" name="hijosvarones" id="hijosvarones" placeholder="Cantidad de varones">  <br>
						  <input type="number"  required pattern="[0-9]+" oninput="checkHijos(this);" class="form-control" name="hijoshembras" value="<?php echo $d->hembras; ?>" id="hijoshembras" placeholder="Cantidad de hembras">  
						<p id="msgHijos" style="color: red;"></p>
					</div>
					<div class="col-1"></div> 
					
					<div class="col-1"></div>
					<div class="form-group col-md-4">
						<label for="cuadro"><label style="color: red;">*&nbsp;</label>Cuadro:</label>
						<select onchange="cambioCuadro()" class="form-control" id="cuadro" name="cuadro"  >      
							<option disabled  value="0">--Seleccione una opción--</option>
							<option value="Titular" <?php if($d->cuadro == "Titular") echo 'selected="selected"'?>>Titular</option>
							<option value="Reserva" <?php if($d->cuadro == "Reserva") echo 'selected="selected"'?>>Reserva</option>
							<option value="Título de oro" <?php if($d->cuadro == "Título de oro") echo 'selected="selected"'?>>Título de oro</option>
							<option value="Cantera de jóvenes" <?php if($d->cuadro == "Cantera de jóvenes") echo 'selected="selected"'?>>Cantera de jóvenes</option>
						</select>  
						<p id="msgOrgano" style="color: red;"></p>
					</div>
					<div class="col-1 "></div>

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
                	</div>
                </div>
				</div>

                <div class="card-footer">
				<br />
					<div class="row">
					
					<div class="col-md-5"></div>
					
					<div class="col-md-1">
					<?php $flag = True; $message = 1; $type = True; $pag = "home" ?>
					<?php if($cp != 0): ?>
						<a href="<?php echo base_url()."index.php/controller/viewResponsable/".$flag.'/'.$message.'/'.$type.'/'.$d->ci.'/'.$pag; ?>"> 
							<button type="button" class="btn btn-danger  btn-block"><i class="fa fa-times"></i> Cancelar</button> <br />	
						</a>
					<?php endif ?>
					<?php if($cp == 0): ?>
						<a href="<?php echo base_url()."index.php/controller/ltsResponsables/".$flag.'/'.$message.'/'.$type; ?>"> 
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