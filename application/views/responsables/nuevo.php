<!-- Content Wrapper. Contains page content -->
<!-- Content Wrapper. Contains page content -->


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2" >
                <div class="col-sm-6">
				
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="#">Home</a></li>
                        <li class="breadcrumb-item "><a href="#">Equipo</a></li>
                        <li class="breadcrumb-item active">Insertar equipo</li>
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
			<div class="callout callout-info">
				<h5><i class="fas fa-info-circle" style="color:#117a8b;"></i> Información</h5>
				<p>Los campos con (<label style="color: red;">*</label>) son obligatorios.</p>
			</div>
			<div class="card card-primary">
             
				<div class="card-header bg-dark">
					<spam><i class="fas fa-plus"></i></spam> Insertar equipo
				</div>
				<form onsubmit="return validar()" id="regForm" action="<?php echo base_url('index.php/controller/nuevo1')?>" method="POST" >
					<?php foreach ($r->result() as $d){ ?>
						<div class="card-body">
							
							<div class="tab">
								<div class="row" >
									<div class="col-3"></div>
									<div class="form-group col-md-6">
										<?php if($c == 'Medio básico') { ?>
											<label for="name"><label style="color: red;">*&nbsp;</label>Número inventario:</label>
										<?php } else { ?>
											<label for="name"><label style="color: red;">*&nbsp;</label>Código:</label>
										<?php } ?>
										<input type="hidden"   class="form-control" name="idresponsable" id="idresponsable" value="<?php echo $d->idresponsable; ?>">
										<input type="hidden"   class="form-control" name="control" id="control" value="<?php echo $c; ?>"> 
										<input type="text"  required pattern="[0-9]+" oninput="checkCodigo(this);" class="form-control" name="serial" id="serial" placeholder="Entre la codificación del equipo">  
											<p id="msgCodigo" style="color: red;"></p>
									</div>
									<div class="col-3"></div>  

									<div class="col-3"></div>
									<div class="form-group col-md-6">	
									<label for="cargo"><label style="color: red;">*&nbsp;</label>Tipo de equipo:</label>		
										<select name="tipoEQ" id="tipoEQ"  class="form-control" onchange="cambiovalortipo()">
										<option disabled selected value="0">--Seleccione el tipo --</option>
												<option value="Unidad central">Unidad central</option>
												<option value="Teclado">Teclado</option>
												<option value="Mouse">Mouse</option>
												<option value="Video">Video</option>
												<option value="Bocinas">Bocinas</option>
												<option value="Impresora">Impresora</option>
												<option value="Scanner">Scanner</option>
												<option value="Cámara">Cámara</option>
												<option value="UPS">UPS</option>
												<option value="Switch">Switch</option>
												<option value="Router">Router</option>
												<option value="Modem">Modem</option>
												<option value="Tablet">Tablet</option>
												<option value="Teléfono">Teléfono</option>
												<option value="Televisor">Televisor</option>
										</select>
										<p id="msgTipo" style="color: red;"></p>
										</div>
									<div class="col-3"></div>
							
									<div class="col-3"></div>
									<div class="form-group col-md-6">
										<label for="name"><label style="color: red;">*&nbsp;</label>Descripción:</label><input type="text"  oninput="checkDesc(this);" required pattern="[0-9a-zA-Z\sñÑáéíóúÁÉÍÚÓ/-+.,:]+"  class="form-control" name="descripcion" id="descripcion" placeholder="Entre el la descripción del equipo"> 
										<p id="msgDesc" style="color: red;"></p>
									</div>
									<div class="col-3"></div>
								</div>
							</div>

							<div class="tab">
								<div class="row" >
									<div class="col-3"></div>
									<div class="form-group col-md-6">
										<label for="name"><label style="color: red;">*&nbsp;</label>Chasis:</label><input type="text"  required pattern="[0-9a-zA-Z\s/-]+" oninput="checkChasis(this);" class="form-control" name="chasis" id="chasis" placeholder="Entre la codifiación del chasis del equipo">  
										<p id="msgChasis" style="color: red;"></p>
									</div>
									<div class="col-3"></div>  

									<div class="col-3"></div>
									<div class="form-group col-md-6">
										<label for="name"><label style="color: red;">*&nbsp;</label>Modelo:</label><input type="text"  required pattern="[0-9a-zA-Z\sñÑáéíóúÁÉÍÚÓ-]+" oninput="checkModelo(this);" class="form-control" name="modelo" id="modelo" placeholder="Entre el modelo del equipo">  
										<p id="msgModelo" style="color: red;"></p>
									</div>
									<div class="col-3"></div>  
								
									<div class="col-3"></div>  
									<div class="form-group col-md-6">
										<label for="apellido1"><label style="color: red;">*&nbsp;</label>Serie:</label><input type="text"  required pattern="[0-9a-zA-Z]+" oninput="checkSerie(this);"  class="form-control" name="serie" id="serie" placeholder="Entre la serie del equipo">  
										<p id="msgSerie" style="color: red;"></p>
									</div>
									<div class="col-3"></div>

									<div class="col-3"></div>  
									<div class="form-group col-md-6">
										<label for="apellido1"><label style="color: red;">*&nbsp;</label>Departamento:</label>
										<select onchange="cambiovalordpto()" class="form-control" id="departamento" name="departamento"  required>      
											<option disabled selected value="0">--Seleccione el departamento --</option>
											<?php foreach ($depart->result() as $dep) : ?>
											<option value="<?php echo $dep->iddepartamento ?>" ><?php echo $dep->nombre ?></option>
											<?php endforeach ?>
										</select> 
										<p id="msgDpto" style="color: red;"></p>
									</div>
									<div class="col-3"></div>

									<div class="col-3"></div>  
									<div class="form-group col-md-6">
										<label for="apellido1"><label style="color: red;">*&nbsp;</label>Estado:</label>
										<select onchange="cambiovalorestado()" class="form-control" id="estado" name="estado"  required>      
											<option disabled selected value="0">--Seleccione el estado --</option>
											<option value="Bueno">Bueno</option>
											<option value="Malo">Malo</option>
										</select> 
										<p id="msgEstado" style="color: red;"></p>
									</div>
									<div class="col-3"></div>

									<div class="col-3"></div>  
									<div class="form-group col-md-6">
										<label for="apellido1">Observación:</label><textarea  pattern="[0-9a-zA-Z\sñÑáéíóúÁÉÍÚÓ/*-+.,:]+"  class="form-control" name="observacion" id="observacion" placeholder="Entre la observación del equipo"></textarea> 
									</div>
									<div class="col-3"></div>
								</div>
							</div>

							<div class="tab">

								<div id="divTeclado" style="display: none">
									<div class="row" >

										<div class="col-2"></div>  
											<div class="form-group col-md-8">
											<h3>Teclado:</h3>
											<hr />
										</div>
										<div class="col-2"></div>

										<div class="col-3"></div>  
										<div class="form-group col-md-6">
											<label for="apellido1"><label style="color: red;">*&nbsp;</label>Clase:</label>
											<select onchange="cambiovalorclase()" class="form-control" id="claseTeclado" name="claseTeclado"  required>      
												<option disabled selected value="0">--Seleccione la clase --</option>
												<option value="USB">USB</option>
												<option value="PS2">PS2</option>
												<option value="Serie">Serie</option>
											</select> 
											<p id="msgClaseTeclado" style="color: red;"></p>
										</div>
										<div class="col-3"></div>

										<div class="col-3"></div>  
										<div class="form-group col-md-6">
											<label for="apellido1"><label style="color: red;">*&nbsp;</label>Características:</label><textarea  pattern="[0-9a-zA-Z\sñÑáéíóúÁÉÍÚÓ/*-+.,:]+"  class="form-control" name="caracteristicasTeclado" id="caracteristicasTeclado" placeholder="Entre la características del equipo"></textarea> 
											<p id="msgCaractTeclado" style="color: red;"></p>
										</div>
										<div class="col-3"></div>
									</div>
								</div>

								<div id="divMouse" style="display: none">
									<div class="row" >

									<div class="col-2"></div>  
											<div class="form-group col-md-8">
											<h3>Mouse:</h3>
											<hr />
										</div>
										<div class="col-2"></div>

										<div class="col-3"></div>  
										<div class="form-group col-md-6">
											<label for="apellido1"><label style="color: red;">*&nbsp;</label>Clase:</label>
											<select onchange="cambiovalorclase()" class="form-control" id="claseMouse" name="claseMouse"  required>      
												<option disabled selected value="0">--Seleccione la clase --</option>
												<option value="USB">USB</option>
												<option value="PS2">PS2</option>
												<option value="Serie">Serie</option>
											</select> 
											<p id="msgEstado" style="color: red;"></p>
										</div>
										<div class="col-3"></div>

										<div class="col-3"></div>  
										<div class="form-group col-md-6">
											<label for="apellido1"><label style="color: red;">*&nbsp;</label>Características:</label><textarea  pattern="[0-9a-zA-Z\sñÑáéíóúÁÉÍÚÓ/*-+.,:]+"  class="form-control" name="caracteristicasMouse" id="caracteristicasMouse" placeholder="Entre la características del equipo"></textarea> 
										</div>
										<div class="col-3"></div>
									</div>
								</div>

								<div id="divVideo" style="display: none">
									<div class="row" >

									<div class="col-2"></div>  
											<div class="form-group col-md-8">
											<h3>Video:</h3>
											<hr />
										</div>
										<div class="col-2"></div>

										<div class="col-3"></div>  
										<div class="form-group col-md-6">
											<label for="apellido1"><label style="color: red;">*&nbsp;</label>Clase:</label>
											<select onchange="cambiovalorclase()" class="form-control" id="claseVideo" name="claseVideo"  required>      
												<option disabled selected value="0">--Seleccione la clase --</option>
												<option value="TRC">TRC</option>
												<option value="LCD">LCD</option>
												<option value="Plasma">Plasma</option>
											</select> 
											<p id="msgEstado" style="color: red;"></p>
										</div>
										<div class="col-3"></div>

										<div class="col-3"></div>  
										<div class="form-group col-md-6">
											<label for="apellido1"><label style="color: red;">*&nbsp;</label>Características:</label><textarea  pattern="[0-9a-zA-Z\sñÑáéíóúÁÉÍÚÓ/*-+.,:]+"  class="form-control" name="caracteristicasVideo" id="caracteristicasVideo" placeholder="Entre la características del equipo"></textarea> 
										</div>
										<div class="col-3"></div>
									</div>
								</div>

								<div id="divSpeaker" style="display: none">
									<div class="row" >

									<div class="col-2"></div>  
											<div class="form-group col-md-8">
											<h3>Bocinas:</h3>
											<hr />
										</div>
										<div class="col-2"></div>

										<div class="col-3"></div>  
										<div class="form-group col-md-6">
											<label for="apellido1"><label style="color: red;">*&nbsp;</label>Clase:</label>
											<select onchange="cambiovalorclase()" class="form-control" id="claseSpeaker" name="claseSpeaker"  required>      
												<option disabled selected value="0">--Seleccione la clase --</option>
												<option value="USB">USB</option>
												<option value="AC">AC</option>
											</select> 
											<p id="msgEstado" style="color: red;"></p>
										</div>
										<div class="col-3"></div>

										<div class="col-3"></div>  
										<div class="form-group col-md-6">
											<label for="apellido1"><label style="color: red;">*&nbsp;</label>Características:</label><textarea  pattern="[0-9a-zA-Z\sñÑáéíóúÁÉÍÚÓ/*-+.,:]+"  class="form-control" name="caracteristicasSpeaker" id="caracteristicasSpeaker" placeholder="Entre la características del equipo"></textarea> 
										</div>
										<div class="col-3"></div>
									</div>
								</div>

								<div id="divPrinter" style="display: none">
									<div class="row" >

									<div class="col-2"></div>  
											<div class="form-group col-md-8">
											<h3>Impresora:</h3>
											<hr />
										</div>
										<div class="col-2"></div>

										<div class="col-3"></div>  
										<div class="form-group col-md-6">
											<label for="apellido1"><label style="color: red;">*&nbsp;</label>Clase:</label>
											<select onchange="cambiovalorclase()" class="form-control" id="clasePrinter" name="clasePrinter"  required>      
												<option disabled selected value="0">--Seleccione la clase --</option>
												<option value="Plotter">Plotter</option>
												<option value="Matrix">Matrix</option>
												<option value="Laser">Laser</option>
												<option value="Tinta">Tinta</option>
											</select> 
											<p id="msgEstado" style="color: red;"></p>
										</div>
										<div class="col-3"></div>

										<div class="col-3"></div>  
										<div class="form-group col-md-6">
											<label for="apellido1"><label style="color: red;">*&nbsp;</label>Características:</label><textarea  pattern="[0-9a-zA-Z\sñÑáéíóúÁÉÍÚÓ/*-+.,:]+"  class="form-control" name="caracteristicasPrinter" id="caracteristicasPrinter" placeholder="Entre la características del equipo"></textarea> 
										</div>
										<div class="col-3"></div>
									</div>
								</div>

								<div id="divScanner" style="display: none">
									<div class="row" >

									<div class="col-2"></div>  
											<div class="form-group col-md-8">
											<h3>Scanner:</h3>
											<hr />
										</div>
										<div class="col-2"></div>

										<div class="col-3"></div>  
										<div class="form-group col-md-6">
											<label for="apellido1"><label style="color: red;">*&nbsp;</label>Clase:</label>
											<select onchange="cambiovalorclase()" class="form-control" id="claseScanner" name="claseScanner"  required>      
												<option disabled selected value="0">--Seleccione la clase --</option>
												<option value="A4">A4</option>
											</select> 
											<p id="msgEstado" style="color: red;"></p>
										</div>
										<div class="col-3"></div>

										<div class="col-3"></div>  
										<div class="form-group col-md-6">
											<label for="apellido1"><label style="color: red;">*&nbsp;</label>Características:</label><textarea  pattern="[0-9a-zA-Z\sñÑáéíóúÁÉÍÚÓ/*-+.,:]+"  class="form-control" name="caracteristicasScanner" id="caracteristicasScanner" placeholder="Entre la características del equipo"></textarea> 
										</div>
										<div class="col-3"></div>
									</div>
								</div>

								<div id="divCamara" style="display: none">
									<div class="row" >

									<div class="col-2"></div>  
											<div class="form-group col-md-8">
											<h3>Cámara:</h3>
											<hr />
										</div>
										<div class="col-2"></div>

										<div class="col-3"></div>  
										<div class="form-group col-md-6">
											<label for="apellido1"><label style="color: red;">*&nbsp;</label>Clase:</label>
											<select onchange="cambiovalorclase()" class="form-control" id="claseCamara" name="claseCamara"  required>      
												<option disabled selected value="0">--Seleccione la clase --</option>
												<option value="IP">IP</option>
												<option value="Bolsillo">Bolsillo</option>
											</select> 
											<p id="msgEstado" style="color: red;"></p>
										</div>
										<div class="col-3"></div>

										<div class="col-3"></div>  
										<div class="form-group col-md-6">
											<label for="apellido1"><label style="color: red;">*&nbsp;</label>Características:</label><textarea  pattern="[0-9a-zA-Z\sñÑáéíóúÁÉÍÚÓ/*-+.,:]+"  class="form-control" name="caracteristicasCamara" id="caracteristicasCamara" placeholder="Entre la características del equipo"></textarea> 
										</div>
										<div class="col-3"></div>
									</div>
								</div>

								<div id="divUPS" style="display: none">
									<div class="row" >

									<div class="col-2"></div>  
											<div class="form-group col-md-8">
											<h3>UPS:</h3>
											<hr />
										</div>
										<div class="col-2"></div>

										<div class="col-3"></div>  
										<div class="form-group col-md-6">
											<label for="apellido1"><label style="color: red;">*&nbsp;</label>Clase:</label>
											<select onchange="cambiovalorclase()" class="form-control" id="claseUPS" name="claseUPS"  required>      
												<option disabled selected value="0">--Seleccione la clase --</option>
												<option value="Mesa">Mesa</option>
												<option value="Rack">Rack</option>
											</select> 
											<p id="msgEstado" style="color: red;"></p>
										</div>
										<div class="col-3"></div>

										<div class="col-3"></div>  
										<div class="form-group col-md-6">
											<label for="apellido1"><label style="color: red;">*&nbsp;</label>Características:</label><textarea  pattern="[0-9a-zA-Z\sñÑáéíóúÁÉÍÚÓ/*-+.,:]+"  class="form-control" name="caracteristicasUPS" id="caracteristicasUPS" placeholder="Entre la características del equipo"></textarea> 
										</div>
										<div class="col-3"></div>
									</div>
								</div>

								<div id="divSwitch" style="display: none">
									<div class="row" >

									<div class="col-2"></div>  
											<div class="form-group col-md-8">
											<h3>Switch:</h3>
											<hr />
										</div>
										<div class="col-2"></div>

										<div class="col-3"></div>  
										<div class="form-group col-md-6">
											<label for="apellido1"><label style="color: red;">*&nbsp;</label>Clase:</label>
											<select onchange="cambiovalorclase()" class="form-control" id="claseSwitch" name="claseSwitch"  required>      
												<option disabled selected value="0">--Seleccione la clase --</option>
												<option value="ETH">ETH</option>
											</select> 
											<p id="msgEstado" style="color: red;"></p>
										</div>
										<div class="col-3"></div>

										<div class="col-3"></div>  
										<div class="form-group col-md-6">
											<label for="apellido1"><label style="color: red;">*&nbsp;</label>Características:</label><textarea  pattern="[0-9a-zA-Z\sñÑáéíóúÁÉÍÚÓ/*-+.,:]+"  class="form-control" name="caracteristicasSwitch" id="caracteristicasSwitch" placeholder="Entre la características del equipo"></textarea> 
										</div>
										<div class="col-3"></div>
									</div>
								</div>

								<div id="divRouter" style="display: none">
									<div class="row" >

									<div class="col-2"></div>  
											<div class="form-group col-md-8">
											<h3>Router:</h3>
											<hr />
										</div>
										<div class="col-2"></div>

										<div class="col-3"></div>  
										<div class="form-group col-md-6">
											<label for="apellido1"><label style="color: red;">*&nbsp;</label>Clase:</label>
											<select onchange="cambiovalorclase()" class="form-control" id="claseRouter" name="claseRouter"  required>      
												<option disabled selected value="0">--Seleccione la clase --</option>
												<option value="Wireless">Wireless</option>
												<option value="1eth-1wan">1eth-1wan</option>
											</select> 
											<p id="msgEstado" style="color: red;"></p>
										</div>
										<div class="col-3"></div>

										<div class="col-3"></div>  
										<div class="form-group col-md-6">
											<label for="apellido1"><label style="color: red;">*&nbsp;</label>Características:</label><textarea  pattern="[0-9a-zA-Z\sñÑáéíóúÁÉÍÚÓ/*-+.,:]+"  class="form-control" name="caracteristicasRouter" id="caracteristicasRouter" placeholder="Entre la características del equipo"></textarea> 
										</div>
										<div class="col-3"></div>
									</div>
								</div>

								<div id="divModem" style="display: none">
									<div class="row" >

									<div class="col-2"></div>  
											<div class="form-group col-md-8">
											<h3>Modem:</h3>
											<hr />
										</div>
										<div class="col-2"></div>

										<div class="col-3"></div>  
										<div class="form-group col-md-6">
											<label for="apellido1"><label style="color: red;">*&nbsp;</label>Clase:</label>
											<select onchange="cambiovalorclase()" class="form-control" id="claseModem" name="claseModem"  required>      
												<option disabled selected value="0">--Seleccione la clase --</option>
												<option value="USB">USB</option>
												<option value="Serie">Serie</option>
											</select> 
											<p id="msgEstado" style="color: red;"></p>
										</div>
										<div class="col-3"></div>

										<div class="col-3"></div>  
										<div class="form-group col-md-6">
											<label for="apellido1"><label style="color: red;">*&nbsp;</label>Características:</label><textarea  pattern="[0-9a-zA-Z\sñÑáéíóúÁÉÍÚÓ/*-+.,:]+"  class="form-control" name="caracteristicasModem" id="caracteristicasModem" placeholder="Entre la características del equipo"></textarea> 
										</div>
										<div class="col-3"></div>
									</div>
								</div>
								
								<div id="divTablet" style="display: none">
									<div class="row" >

									<div class="col-2"></div>  
											<div class="form-group col-md-8">
											<h3>Tablet:</h3>
											<hr />
										</div>
										<div class="col-2"></div>

										<div class="col-3"></div>  
										<div class="form-group col-md-6">
											<label for="apellido1"><label style="color: red;">*&nbsp;</label>Clase:</label>
											<select onchange="cambiovalorclase()" class="form-control" id="claseTablet" name="claseTablet"  required>      
												<option disabled selected value="0">--Seleccione la clase --</option>
												<option value="SIM">Con entrada de SIM</option>
												<option value="noSIM">Sin entrada de SIM</option>
											</select> 
											<p id="msgEstado" style="color: red;"></p>
										</div>
										<div class="col-3"></div>

										<div class="col-3"></div>  
										<div class="form-group col-md-6">
											<label for="apellido1"><label style="color: red;">*&nbsp;</label>Características:</label><textarea  pattern="[0-9a-zA-Z\sñÑáéíóúÁÉÍÚÓ/*-+.,:]+"  class="form-control" name="caracteristicasTablet" id="caracteristicasTablet" placeholder="Entre la características del equipo"></textarea> 
										</div>
										<div class="col-3"></div>
									</div>
								</div>

								<div id="divTelefono" style="display: none">
									<div class="row" >

									<div class="col-2"></div>  
											<div class="form-group col-md-8">
											<h3>Teléfono:</h3>
											<hr />
										</div>
										<div class="col-2"></div>

										<div class="col-3"></div>  
										<div class="form-group col-md-6">
											<label for="apellido1"><label style="color: red;">*&nbsp;</label>Clase:</label>
											<select onchange="cambiovalorclase()" class="form-control" id="claseTelefono" name="claseTelefono"  required >      
												<option disabled selected value="0">--Seleccione la clase --</option>
												<option value="Inalámbrico">Inalámbrico</option>
												<option value="Celular">Celular</option>
												<option value="Fijo">Fijo</option>
											</select> 
											<p id="msgEstado" style="color: red;"></p>
										</div>
										<div class="col-3"></div>

										<div class="col-3"></div>  
										<div class="form-group col-md-6">
											<label for="apellido1"><label style="color: red;">*&nbsp;</label>Características:</label><textarea  pattern="[0-9a-zA-Z\sñÑáéíóúÁÉÍÚÓ/*-+.,:]+"  class="form-control" name="caracteristicasTelefono" id="caracteristicasTelefono" placeholder="Entre la características del equipo"></textarea> 
										</div>
										<div class="col-3"></div>
									</div>
								</div>

								<div id="divTelevisor" style="display: none">
									<div class="row" >

									<div class="col-2"></div>  
											<div class="form-group col-md-8">
											<h3>Televisor:</h3>
											<hr />
										</div>
										<div class="col-2"></div>

										<div class="col-3"></div>  
										<div class="form-group col-md-6">
											<label for="apellido1"><label style="color: red;">*&nbsp;</label>Clase:</label>
											<select onchange="cambiovalorclase()" class="form-control" id="claseTelevisor" name="claseTelevisor"  required>      
												<option disabled selected value="0">--Seleccione la clase --</option>
												<option value="TRC">TRC</option>
												<option value="LED">LED</option>
												<option value="Plasma">Plasma</option>
											</select> 
											<p id="msgEstado" style="color: red;"></p>
										</div>
										<div class="col-3"></div>

										<div class="col-3"></div>  
										<div class="form-group col-md-6">
											<label for="apellido1"><label style="color: red;">*&nbsp;</label>Características:</label><textarea  pattern="[0-9a-zA-Z\sñÑáéíóúÁÉÍÚÓ/*-+.,:]+"  class="form-control" name="caracteristicasTelevisor" id="caracteristicasTelevisor" placeholder="Entre la características del equipo"></textarea> 
										</div>
										<div class="col-3"></div>
									</div>
								</div>

								<div id="divUC" style="display: none">
									<div class="row">
										<div class="col-2"></div>  
											<div class="form-group col-md-8">
												<h3>Unidad central:</h3>
												<hr />
											</div>
										<div class="col-2"></div>

										<div class="col-3"></div>  
										<div class="form-group col-md-6">
											<label for="apellido1"><label style="color: red;">*&nbsp;</label>Clase:</label>
											<select onchange="cambiovalorclase()" class="form-control" id="claseUC" name="claseUC"  required>      
												<option disabled selected value="0">--Seleccione la clase --</option>
												<option value="Escritorio">Escritorio</option>
												<option value="Laptop">Laptop</option>
												<option value="Cliente ligero">Cliente ligero</option>
												<option value="Servidor">Servidor</option>
											</select> 
											<p id="msgEstado" style="color: red;"></p>
										</div>
										<div class="col-3"></div>

										<div class="col-3"></div>  
										<div class="form-group col-md-6">
											<label for="name"><label style="color: red;">*&nbsp;</label>Identificación del software:</label><input type="text"  required pattern="[0-9a-zA-Z\sñÑáéíóúÁÉÍÚÓ-]+" oninput="checkIdentSoft(this);" class="form-control" name="IdentSoft" id="IdentSoft" placeholder="Entre la identificación del software">  
											<p id="msgIdentSoft" style="color: red;"></p>
										</div>
										<div class="col-3"></div>

										<div class="card card-gray card-tabs col-12">
											<div class="card-header p-0  pt-1">
												<ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
													<li class="nav-item">
														<a class="nav-link active" id="custom-tabs-one-cpu-tab" data-toggle="pill" href="#custom-tabs-one-cpu" role="tab" aria-controls="custom-tabs-one-cpu" aria-selected="true">CPU</a>
													</li>
													<li class="nav-item">
														<a class="nav-link " id="custom-tabs-one-fdd-tab" data-toggle="pill" href="#custom-tabs-one-fdd" role="tab" aria-controls="custom-tabs-one-fdd" aria-selected="false">FDD</a>
													</li>
													<li class="nav-item">
														<a class="nav-link " id="custom-tabs-one-odd-tab" data-toggle="pill" href="#custom-tabs-one-odd" role="tab" aria-controls="custom-tabs-one-odd" aria-selected="false">ODD</a>
													</li>
													<li class="nav-item">
														<a class="nav-link " id="custom-tabs-one-cdd-tab" data-toggle="pill" href="#custom-tabs-one-cdd" role="tab" aria-controls="custom-tabs-one-cdd" aria-selected="false">CDD</a>
													</li>
													<li class="nav-item">
														<a class="nav-link " id="custom-tabs-one-fuente-tab" data-toggle="pill" href="#custom-tabs-one-fuente" role="tab" aria-controls="custom-tabs-one-fuente" aria-selected="false">Fuente</a>
													</li>
													<li class="nav-item">
														<a class="nav-link " id="custom-tabs-one-board-tab" data-toggle="pill" href="#custom-tabs-one-board" role="tab" aria-controls="custom-tabs-one-board" aria-selected="false">Board</a>
													</li>
													<li class="nav-item">
														<a class="nav-link " id="custom-tabs-one-ram-tab" data-toggle="pill" href="#custom-tabs-one-ram" role="tab" aria-controls="custom-tabs-one-ram" aria-selected="false">RAM</a>
													</li>
													<li class="nav-item">
														<a class="nav-link " id="custom-tabs-one-hdd-tab" data-toggle="pill" href="#custom-tabs-one-hdd" role="tab" aria-controls="custom-tabs-one-hdd" aria-selected="false">HDD</a>
													</li>
													<li class="nav-item">
														<a class="nav-link " id="custom-tabs-one-setup-tab" data-toggle="pill" href="#custom-tabs-one-setup" role="tab" aria-controls="custom-tabs-one-setup" aria-selected="false">Clave Setup</a>
													</li>
													<li class="nav-item">
														<a class="nav-link " id="custom-tabs-one-so-tab" data-toggle="pill" href="#custom-tabs-one-so" role="tab" aria-controls="custom-tabs-one-so" aria-selected="false">Sistema Operativo</a>
													</li>
													<li class="nav-item">
														<a class="nav-link " id="custom-tabs-one-sistema-tab" data-toggle="pill" href="#custom-tabs-one-sistema" role="tab" aria-controls="custom-tabs-one-sistema" aria-selected="false">Clave Sistema</a>
													</li>
													<li class="nav-item">
														<a class="nav-link " id="custom-tabs-one-red-tab" data-toggle="pill" href="#custom-tabs-one-red" role="tab" aria-controls="custom-tabs-one-red" aria-selected="false">Red</a>
													</li>
												</ul>
											</div>
											<div class="card-body">
												<div class="tab-content" id="custom-tabs-one-tabContent">

													<div class="tab-pane fade active show " id="custom-tabs-one-cpu" role="tabpanel" aria-labelledby="custom-tabs-one-cpu-tab">
														<div id=""div">
															<div class="row">
																<div class="col-3"></div>
																<div class="form-group col-md-6">
																	<label for="name"><label style="color: red;">*&nbsp;</label>Marca:</label><input type="text"  required pattern="[0-9a-zA-Z\s/-]+" oninput="checkMarcaCPU(this);" class="form-control" name="marcaCPU" id="marcaCPU" placeholder="Entre la marca del CPU">  
																	<p id="msgMarcaCPU" style="color: red;"></p>
																</div>
																<div class="col-3"></div>  

																<div class="col-3"></div>
																<div class="form-group col-md-6">
																	<label for="name"><label style="color: red;">*&nbsp;</label>Modelo:</label><input type="text"  required pattern="[0-9a-zA-Z\sñÑáéíóúÁÉÍÚÓ-]+" oninput="checkModeloCPU(this);" class="form-control" name="modeloCPU" id="modeloCPU" placeholder="Entre el modelo del CPU">  
																	<p id="msgModeloCPU" style="color: red;"></p>
																</div>
																<div class="col-3"></div>  
															
																<div class="col-3"></div>  
																<div class="form-group col-md-6">
																	<label for="apellido1"><label style="color: red;">*&nbsp;</label>Serie:</label><input type="text"  required pattern="[0-9a-zA-Z]+" oninput="checkSerieCPU(this);"  class="form-control" name="serieCPU" id="serieCPU" placeholder="Entre la serie del CPU">  
																	<p id="msgSerieCPU" style="color: red;"></p>
																</div>
																<div class="col-3"></div>
																	
																<div class="col-3"></div>
																<div class="form-group col-md-6">
																	<label for="name"><label style="color: red;">*&nbsp;</label>Características:</label><input type="text"  required pattern="[0-9a-zA-Z\sñÑáéíóúÁÉÍÚÓ/-+.,:]+"  class="form-control" name="caractCPU" id="caractCPU" placeholder="Entre las caracateríticas del CPU"> 
																	<p id="msgCaractCPU" style="color: red;"></p>
																</div>
																<div class="col-3"></div>
															</div>
														</div>
													</div>
													
													<div class="tab-pane fade " id="custom-tabs-one-fdd" role="tabpanel" aria-labelledby="custom-tabs-one-fdd-tab">
														<div class="row">
															<div class="col-3"></div>
															<div class="form-group col-md-6">
																<label for="name"><label style="color: red;">*&nbsp;</label>Marca:</label><input type="text"  required pattern="[0-9a-zA-Z\s/-]+" oninput="checkMarcaFDD(this);" class="form-control" name="marcaFDD" id="marcaFDD" placeholder="Entre la marca del FDD">  
																<p id="msgMarcaFDD" style="color: red;"></p>
															</div>
															<div class="col-3"></div>  

															<div class="col-3"></div>
															<div class="form-group col-md-6">
																<label for="name"><label style="color: red;">*&nbsp;</label>Modelo:</label><input type="text"  required pattern="[0-9a-zA-Z\sñÑáéíóúÁÉÍÚÓ-]+" oninput="checkModeloFDD(this);" class="form-control" name="modeloFDD" id="modeloFDD" placeholder="Entre el modelo del FDD">  
																<p id="msgModeloFDD" style="color: red;"></p>
															</div>
															<div class="col-3"></div>  
														
															<div class="col-3"></div>  
															<div class="form-group col-md-6">
																<label for="apellido1"><label style="color: red;">*&nbsp;</label>Serie:</label><input type="text"  required pattern="[0-9a-zA-Z]+" oninput="checkSerieFDD(this);"  class="form-control" name="serieFDD" id="serieFDD" placeholder="Entre la serie del FDD">  
																<p id="msgSerieFDD" style="color: red;"></p>
															</div>
															<div class="col-3"></div>
																
															<div class="col-3"></div>
															<div class="form-group col-md-6">
																<label for="name"><label style="color: red;">*&nbsp;</label>Características:</label><input type="text"  required pattern="[0-9a-zA-Z\sñÑáéíóúÁÉÍÚÓ/-+.,:]+"  class="form-control" name="caractFDD" id="caractFDD" placeholder="Entre las caracateríticas del FDD"> 
																<p id="msgCaractFDD" style="color: red;"></p>
															</div>
															<div class="col-3"></div>
														</div>
													</div>

													<div class="tab-pane fade " id="custom-tabs-one-odd" role="tabpanel" aria-labelledby="custom-tabs-one-odd-tab">
														<div class="row">
															<div class="col-3"></div>
															<div class="form-group col-md-6">
																<label for="name"><label style="color: red;">*&nbsp;</label>Marca:</label><input type="text"  required pattern="[0-9a-zA-Z\s/-]+" oninput="checkMarcaODD(this);" class="form-control" name="marcaODD" id="marcaODD" placeholder="Entre la marca del ODD">  
																<p id="msgMarcaODD" style="color: red;"></p>
															</div>
															<div class="col-3"></div>  

															<div class="col-3"></div>
															<div class="form-group col-md-6">
																<label for="name"><label style="color: red;">*&nbsp;</label>Modelo:</label><input type="text"  required pattern="[0-9a-zA-Z\sñÑáéíóúÁÉÍÚÓ-]+" oninput="checkModeloODD(this);" class="form-control" name="modeloODD" id="modeloODD" placeholder="Entre el modelo del ODD">  
																<p id="msgModeloODD" style="color: red;"></p>
															</div>
															<div class="col-3"></div>  
														
															<div class="col-3"></div>  
															<div class="form-group col-md-6">
																<label for="apellido1"><label style="color: red;">*&nbsp;</label>Serie:</label><input type="text"  required pattern="[0-9a-zA-Z]+" oninput="checkSerieODD(this);"  class="form-control" name="serieODD" id="serieODD" placeholder="Entre la serie del ODD">  
																<p id="msgSerieODD" style="color: red;"></p>
															</div>
															<div class="col-3"></div>
																
															<div class="col-3"></div>
															<div class="form-group col-md-6">
																<label for="name"><label style="color: red;">*&nbsp;</label>Características:</label><input type="text"  required pattern="[0-9a-zA-Z\sñÑáéíóúÁÉÍÚÓ/-+.,:]+"  class="form-control" name="caractODD" id="caractODD" placeholder="Entre las caracateríticas del ODD"> 
																<p id="msgCaractODD" style="color: red;"></p>
															</div>
															<div class="col-3"></div>
														</div>
													</div>

													<div class="tab-pane fade " id="custom-tabs-one-cdd" role="tabpanel" aria-labelledby="custom-tabs-one-cdd-tab">
														<div class="row">
															<div class="col-3"></div>
															<div class="form-group col-md-6">
																<label for="name"><label style="color: red;">*&nbsp;</label>Marca:</label><input type="text"  required pattern="[0-9a-zA-Z\s/-]+" oninput="checkMarcaCDD(this);" class="form-control" name="marcaCDD" id="marcaCDD" placeholder="Entre la marca del CDD">  
																<p id="msgMarcaCDD" style="color: red;"></p>
															</div>
															<div class="col-3"></div>  

															<div class="col-3"></div>
															<div class="form-group col-md-6">
																<label for="name"><label style="color: red;">*&nbsp;</label>Modelo:</label><input type="text"  required pattern="[0-9a-zA-Z\sñÑáéíóúÁÉÍÚÓ-]+" oninput="checkModeloCDD(this);" class="form-control" name="modeloCDD" id="modeloCDD" placeholder="Entre el modelo del CDD">  
																<p id="msgModeloCDD" style="color: red;"></p>
															</div>
															<div class="col-3"></div>  
														
															<div class="col-3"></div>  
															<div class="form-group col-md-6">
																<label for="apellido1"><label style="color: red;">*&nbsp;</label>Serie:</label><input type="text"  required pattern="[0-9a-zA-Z]+" oninput="checkSerieCDD(this);"  class="form-control" name="serieCDD" id="serieCDD" placeholder="Entre la serie del CDD">  
																<p id="msgSerieCDD" style="color: red;"></p>
															</div>
															<div class="col-3"></div>
																
															<div class="col-3"></div>
															<div class="form-group col-md-6">
																<label for="name"><label style="color: red;">*&nbsp;</label>Características:</label><input type="text"  required pattern="[0-9a-zA-Z\sñÑáéíóúÁÉÍÚÓ/-+.,:]+"  class="form-control" name="caractCDD" id="caractCDD" placeholder="Entre las caracateríticas del CDD"> 
																<p id="msgCaractCDD" style="color: red;"></p>
															</div>
															<div class="col-3"></div>
														</div>
													</div>

													<div class="tab-pane fade " id="custom-tabs-one-fuente" role="tabpanel" aria-labelledby="custom-tabs-one-fuente-tab">
														<div class="row">
															<div class="col-3"></div>
															<div class="form-group col-md-6">
																<label for="name"><label style="color: red;">*&nbsp;</label>Marca:</label><input type="text"  required pattern="[0-9a-zA-Z\s/-]+" oninput="checkMarcaFuente(this);" class="form-control" name="marcaFuente" id="marcaFuente" placeholder="Entre la marca de la fuente">  
																<p id="msgMarcaFuente" style="color: red;"></p>
															</div>
															<div class="col-3"></div>  

															<div class="col-3"></div>
															<div class="form-group col-md-6">
																<label for="name"><label style="color: red;">*&nbsp;</label>Modelo:</label><input type="text"  required pattern="[0-9a-zA-Z\sñÑáéíóúÁÉÍÚÓ-]+" oninput="checkModeloFuente(this);" class="form-control" name="modeloFuente" id="modeloFuente" placeholder="Entre el modelo de la fuente">  
																<p id="msgModeloFuente" style="color: red;"></p>
															</div>
															<div class="col-3"></div>  
														
															<div class="col-3"></div>  
															<div class="form-group col-md-6">
																<label for="apellido1"><label style="color: red;">*&nbsp;</label>Serie:</label><input type="text"  required pattern="[0-9a-zA-Z]+" oninput="checkSerieFuente(this);"  class="form-control" name="serieFuente" id="serieFuente" placeholder="Entre la serie de la fuente">  
																<p id="msgSerieFuente" style="color: red;"></p>
															</div>
															<div class="col-3"></div>
																
															<div class="col-3"></div>
															<div class="form-group col-md-6">
																<label for="name"><label style="color: red;">*&nbsp;</label>Características:</label><input type="text"  required pattern="[0-9a-zA-Z\sñÑáéíóúÁÉÍÚÓ/-+.,:]+"  class="form-control" name="caractFuente" id="caractFuente" placeholder="Entre las caracateríticas de la fuente"> 
																<p id="msgCaractFuente" style="color: red;"></p>
															</div>
															<div class="col-3"></div>
														</div>
													</div>

													<div class="tab-pane fade " id="custom-tabs-one-board" role="tabpanel" aria-labelledby="custom-tabs-one-board-tab">
														<div class="row">
															<div class="col-3"></div>
															<div class="form-group col-md-6">
																<label for="name"><label style="color: red;">*&nbsp;</label>Marca:</label><input type="text"  required pattern="[0-9a-zA-Z\s/-]+" oninput="checkMarcaBoard(this);" class="form-control" name="marcaBoard" id="marcaBoard" placeholder="Entre la marca de la board">  
																<p id="msgMarcaBoard" style="color: red;"></p>
															</div>
															<div class="col-3"></div>  

															<div class="col-3"></div>
															<div class="form-group col-md-6">
																<label for="name"><label style="color: red;">*&nbsp;</label>Modelo:</label><input type="text"  required pattern="[0-9a-zA-Z\sñÑáéíóúÁÉÍÚÓ-]+" oninput="checkModeloBoard(this);" class="form-control" name="modeloBoard" id="modeloBoard" placeholder="Entre el modelo de la board">  
																<p id="msgModeloBoard" style="color: red;"></p>
															</div>
															<div class="col-3"></div>  
														
															<div class="col-3"></div>  
															<div class="form-group col-md-6">
																<label for="apellido1"><label style="color: red;">*&nbsp;</label>Serie:</label><input type="text"  required pattern="[0-9a-zA-Z]+" oninput="checkSerieBoard(this);"  class="form-control" name="serieBoard" id="serieBoard" placeholder="Entre la serie de la board">  
																<p id="msgSerieBoard" style="color: red;"></p>
															</div>
															<div class="col-3"></div>
																
															<div class="col-3"></div>
															<div class="form-group col-md-6">
																<label for="name"><label style="color: red;">*&nbsp;</label>Características:</label><input type="text"  required pattern="[0-9a-zA-Z\sñÑáéíóúÁÉÍÚÓ/-+.,:]+"  class="form-control" name="caractBoard" id="caractBoard" placeholder="Entre las caracateríticas de la board"> 
																<p id="msgCaractBoard" style="color: red;"></p>
															</div>
															<div class="col-3"></div>
														</div>
													</div>

													<div class="tab-pane fade " id="custom-tabs-one-ram" role="tabpanel" aria-labelledby="custom-tabs-one-ram-tab">
														<div id="field_wrapperRAM">
															<div class="row" >
															
																<spam class="col-3"></spam>
																<spam class="form-group col-md-6">
																	<a  href="javascript:void(0);" class="col-md-2" > 
																		<button type="button" class="btn btn-info btn-block add_buttonRAM"><i class="fa fa-plus"></i> Adicionar RAM
																		</button> <br />	
																	</a>
																	
																	<hr />
																</spam>
																<spam class="col-3"></spam> 

																<div class="col-3"></div>
																<div class="form-group col-md-6">
																	<label for="name"><label style="color: red;">*&nbsp;</label>Marca:</label><input type="text"  required pattern="[0-9a-zA-Z\s/-]+" oninput="checkMarcaRAM(this);" class="form-control" name="marcaRAM[]" id="marcaRAM" placeholder="Entre la marca de la RAM">  
																	<p id="msgMarcaRAM" style="color: red;"></p>
																</div>
																<div class="col-3"></div>  

																<div class="col-3"></div>
																<div class="form-group col-md-6">
																	<label for="name"><label style="color: red;">*&nbsp;</label>Modelo:</label><input type="text"  required pattern="[0-9a-zA-Z\sñÑáéíóúÁÉÍÚÓ-]+" oninput="checkModeloRAM(this);" class="form-control" name="modeloRAM[]" id="modeloRAM" placeholder="Entre el modelo de la RAM">  
																	<p id="msgModeloRAM" style="color: red;"></p>
																</div>

																<div class="col-3"></div>  
															
																<div class="col-3"></div>  
																<div class="form-group col-md-6">
																	<label for="apellido1"><label style="color: red;">*&nbsp;</label>Serie:</label><input type="text"  required pattern="[0-9a-zA-Z]+" oninput="checkSerieRAM(this);"  class="form-control" name="serieRAM[]" id="serieRAM" placeholder="Entre la serie de la RAM">  
																	<p id="msgSerieRAM" style="color: red;"></p>
																</div>
																<div class="col-3"></div>
																	
																<div class="col-3"></div>
																<div class="form-group col-md-6">
																	<label for="name"><label style="color: red;">*&nbsp;</label>Características:</label><input type="text"  required pattern="[0-9a-zA-Z\sñÑáéíóúÁÉÍÚÓ/-+.,:]+"  class="form-control" name="caractRAM[]" id="caractRAM" placeholder="Entre las caracateríticas de la RAM"> 
																	<p id="msgCaractRAM" style="color: red;"></p>
																</div>
																<div class="col-3"></div>
															</div>
														</div>
														
													</div>

													<div class="tab-pane fade " id="custom-tabs-one-hdd" role="tabpanel" aria-labelledby="custom-tabs-one-hdd-tab">
														<div id="field_wrapperHDD">
															<div class="row" >
															
																<spam class="col-3"></spam>
																<spam class="form-group col-md-6">
																	<a  href="javascript:void(0);" class="col-md-2" > 
																		<button type="button" class="btn btn-info btn-block add_buttonHDD"><i class="fa fa-plus"></i> Adicionar HDD
																		</button> <br />	
																	</a>
																	
																	<hr />
																</spam>
																<spam class="col-3"></spam> 

																<div class="col-3"></div>
																<div class="form-group col-md-6">
																	<label for="name"><label style="color: red;">*&nbsp;</label>Marca:</label><input type="text"  required pattern="[0-9a-zA-Z\s/-]+" oninput="checkMarcaHDD(this);" class="form-control" name="marcaHDD[]" id="marcaHDD" placeholder="Entre la marca del HDD">  
																	<p id="msgMarcaHDD" style="color: red;"></p>
																</div>
																<div class="col-3"></div>  

																<div class="col-3"></div>
																<div class="form-group col-md-6">
																	<label for="name"><label style="color: red;">*&nbsp;</label>Modelo:</label><input type="text"  required pattern="[0-9a-zA-Z\sñÑáéíóúÁÉÍÚÓ-]+" oninput="checkModeloHDD(this);" class="form-control" name="modeloHDD[]" id="modeloHDD" placeholder="Entre el modelo del HDD">  
																	<p id="msgModeloHDD" style="color: red;"></p>
																</div>

																<div class="col-3"></div>  
															
																<div class="col-3"></div>  
																<div class="form-group col-md-6">
																	<label for="apellido1"><label style="color: red;">*&nbsp;</label>Serie:</label><input type="text"  required pattern="[0-9a-zA-Z]+" oninput="checkSerieHDD(this);"  class="form-control" name="serieHDD[]" id="serieHDD" placeholder="Entre la serie del HDD">  
																	<p id="msgSerieHDD" style="color: red;"></p>
																</div>
																<div class="col-3"></div>
																	
																<div class="col-3"></div>
																<div class="form-group col-md-6">
																	<label for="name"><label style="color: red;">*&nbsp;</label>Características:</label><input type="text"  required pattern="[0-9a-zA-Z\sñÑáéíóúÁÉÍÚÓ/-+.,:]+"  class="form-control" name="caractHDD[]" id="caractHDD" placeholder="Entre las caracateríticas del HDD"> 
																	<p id="msgCaractHDD" style="color: red;"></p>
																</div>
																<div class="col-3"></div>
															</div>
														</div>
													</div>

													<div class="tab-pane fade " id="custom-tabs-one-setup" role="tabpanel" aria-labelledby="custom-tabs-one-setup-tab">
														<div class="row">
															<div class="col-3"></div>
															<div class="form-group col-md-6">
																<label for="name"><label style="color: red;">*&nbsp;</label>Clave supervisor:</label><input type="text"  required pattern="[0-9a-zA-Z\s/-]+" oninput="checkClaveSuperv(this);" class="form-control" name="claveSuperv" id="claveSuperv" placeholder="Entre la clave del supervisor">  
																<p id="msgClaveSuperv" style="color: red;"></p>
															</div>
															<div class="col-3"></div>  

															<div class="col-3"></div>
															<div class="form-group col-md-6">
																<label for="name"><label style="color: red;">*&nbsp;</label>Clave usuario:</label><input type="text"  required pattern="[0-9a-zA-Z\sñÑáéíóúÁÉÍÚÓ-]+" oninput="checkClaveUsuario(this);" class="form-control" name="claveUsuario" id="claveUsuario" placeholder="Entre la clave del usuario">  
																<p id="msgClaveUsuario" style="color: red;"></p>
															</div>
															<div class="col-3"></div>  
														</div>
													</div>

													<div class="tab-pane fade " id="custom-tabs-one-so" role="tabpanel" aria-labelledby="custom-tabs-one-so-tab">
														<div class="row">
															<div class="col-3"></div>
															<div class="form-group col-md-6">
																<label for="name"><label style="color: red;">*&nbsp;</label>Versión:</label><input type="text"  required pattern="[0-9a-zA-Z\s/-]+" oninput="checkVersionSO(this);" class="form-control" name="versionSO" id="versionSO" placeholder="Entre la versión del sistema operativo">  
																<p id="msgVersionSO" style="color: red;"></p>
															</div>
															<div class="col-3"></div>  

															<div class="col-3"></div>
															<div class="form-group col-md-6">
																<label for="name"><label style="color: red;">*&nbsp;</label>Actualización:</label><input type="text"  required pattern="[0-9a-zA-Z\sñÑáéíóúÁÉÍÚÓ-]+" oninput="checkActSO(this);" class="form-control" name="actSO" id="actSO" placeholder="Entre la sctualización del sistema operativo">  
																<p id="msgActualizacionSO" style="color: red;"></p>
															</div>
															<div class="col-3"></div>  
														</div>
													</div>

													<div class="tab-pane fade " id="custom-tabs-one-sistema" role="tabpanel" aria-labelledby="custom-tabs-one-sistema-tab">
														<div class="row">
															<div class="col-3"></div>
															<div class="form-group col-md-6">
																<label for="name"><label style="color: red;">*&nbsp;</label>Administrador:</label><input type="text"  required pattern="[0-9a-zA-Z\s/-]+" oninput="checkAdminSys(this);" class="form-control" name="adminSys" id="adminSys" placeholder="Entre el nombre de usuario del administrador">  
																<p id="msgAdmSys" style="color: red;"></p>
															</div>
															<div class="col-3"></div>  

															<div class="col-3"></div>
															<div class="form-group col-md-6">
																<label for="name"><label style="color: red;">*&nbsp;</label>Clave administrador:</label><input type="text"  required pattern="[0-9a-zA-Z\sñÑáéíóúÁÉÍÚÓ-]+" oninput="checkClvADminSys(this);" class="form-control" name="clvADminSys" id="clvADminSys" placeholder="Entre la clave del administrador">  
																<p id="msgClvAdmSys" style="color: red;"></p>
															</div>
															<div class="col-3"></div>

															<div class="col-3"></div>
															<div class="form-group col-md-6">
																<label for="name"><label style="color: red;">*&nbsp;</label>Usuario:</label><input type="text"  required pattern="[0-9a-zA-Z\sñÑáéíóúÁÉÍÚÓ-]+" oninput="checkUserSys(this);" class="form-control" name="userSys" id="userSys" placeholder="Entre el nombre de usuario del usuario">  
																<p id="msgUserSys" style="color: red;"></p>
															</div>
															<div class="col-3"></div>  

															<div class="col-3"></div>
															<div class="form-group col-md-6">
																<label for="name"><label style="color: red;">*&nbsp;</label>Clave usuario:</label><input type="text"  required pattern="[0-9a-zA-Z\sñÑáéíóúÁÉÍÚÓ-]+" oninput="checkClvUserSys(this);" class="form-control" name="clvUserSys" id="clvUserSys" placeholder="Entre la clave del usuario">  
																<p id="msgClavUserSys" style="color: red;"></p>
															</div>
															<div class="col-3"></div>  
														</div>
													</div>

													<div class="tab-pane fade " id="custom-tabs-one-red" role="tabpanel" aria-labelledby="custom-tabs-one-red-tab">
														<div class="row">
															<div class="col-3"></div>
															<div class="form-group col-md-6">
																<label for="name"><label style="color: red;">*&nbsp;</label>MAC:</label><input type="text"  required pattern="[0-9a-zA-Z\s/-]+" oninput="checkMAC(this);" class="form-control" name="mac" id="mac" placeholder="Entre la MAC">  
																<p id="msgMAC" style="color: red;"></p>
															</div>
															<div class="col-3"></div>  

															<div class="col-3"></div>
															<div class="form-group col-md-6">
																<label for="name"><label style="color: red;">*&nbsp;</label>IP Local:</label><input type="text"  required pattern="[0-9a-zA-Z\sñÑáéíóúÁÉÍÚÓ-]+" oninput="checkIPLocal(this);" class="form-control" name="ipLocal" id="ipLocal" placeholder="Entre el IP Local">  
																<p id="msgIPL" style="color: red;"></p>
															</div>
															<div class="col-3"></div>

															<div class="col-3"></div>
															<div class="form-group col-md-6">
																<label for="name"><label style="color: red;">*&nbsp;</label>Mask 1:</label><input type="text"  required pattern="[0-9a-zA-Z\sñÑáéíóúÁÉÍÚÓ-]+" oninput="checMask1(this);" class="form-control" name="mask1" id="mask1" placeholder="Entre la máscara de red 1">  
																<p id="msgMsk1" style="color: red;"></p>
															</div>
															<div class="col-3"></div>  

															<div class="col-3"></div>
															<div class="form-group col-md-6">
																<label for="name"><label style="color: red;">*&nbsp;</label>IP Intranet:</label><input type="text"  required pattern="[0-9a-zA-Z\sñÑáéíóúÁÉÍÚÓ-]+" oninput="checkIPIntranet(this);" class="form-control" name="ipIntranet" id="ipIntranet" placeholder="Entre el IP de Intranet">  
																<p id="msgIPI" style="color: red;"></p>
															</div>
															<div class="col-3"></div> 

															<div class="col-3"></div>
															<div class="form-group col-md-6">
																<label for="name"><label style="color: red;">*&nbsp;</label>Mask 2:</label><input type="text"  required pattern="[0-9a-zA-Z\sñÑáéíóúÁÉÍÚÓ-]+" oninput="checkMask2(this);" class="form-control" name="mask2" id="mask2" placeholder="Entre la máscara de red 2">  
																<p id="msgMsk2" style="color: red;"></p>
															</div>
															<div class="col-3"></div>  
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<span class="step" style="display: none !important;"></span>
								<span class="step" style="display: none !important;" ></span>
								<span class="step" style="display: none !important;"></span>
							
							</div>

						</div>

						<div class="card-footer">
							<br />
							<div class="row">
								<div class="col-md-4"></div>
									<div class="col-md-1">
										<button type="button" id="prevBtn" class="btn btn-secondary btn-block" onclick="nextPrev(-1)"><i class="fas fa-arrow-left"></i> Anterior</button><br />
									</div>
									<div class="col-md-1">
										<button type="reset" class="btn btn-primary btn-block"><i class="fa fa-eraser"></i> Limpiar</button><br />
									</div>
									
									<div class="col-md-1">
									<?php foreach ($r->result() as $d){ ?>
									<?php $flag = True; $message = 1; $type = True; ?>
										<a  href="<?php echo base_url()."index.php/controller/viewResponsable/".$flag.'/'.$message.'/'.$type.'/'.$d->idresponsable; ?>" > 
											<button type="button" class="btn btn-danger btn-block "><i class="fa fa-times"></i> Cancelar
											</button> <br />	
										</a>
									<?php } ?>
								</div>
									<div class="col-md-1">
										<button type="button" id="nextBtn" class="btn btn-secondary btn-block" onclick="nextPrev(1)">Siguiente</button>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>
				</form>
			</div>
        </div>
	</section>
</div>


  

<script>
	
	var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("tab");
	x[n].style.display = "block";
	
  // ... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
		showInp();
    document.getElementById("nextBtn").className = "btn btn-success btn-block";
		document.getElementById("nextBtn").innerHTML = "<i class='fas fa-check'></i> Aceptar";
		

  } else {
		document.getElementById("nextBtn").innerHTML = "<i class='fas fa-arrow-right'></i> Siguiente";
		document.getElementById("nextBtn").className = "btn btn-secondary btn-block";
  }
  // ... and run a function that displays the correct step indicator:
  fixStepIndicator(n)
}

function showInp(){
	
		getSelectValue = document.getElementById("tipoEQ").value;
		if(getSelectValue == "Unidad central"){
			document.getElementById("divUC").style.display = "block";
			document.getElementById("divTeclado").style.display = "none";
			document.getElementById("divMouse").style.display = "none";
			document.getElementById("divVideo").style.display = "none";
			document.getElementById("divSpeaker").style.display = "none";
			document.getElementById("divPrinter").style.display = "none";
			document.getElementById("divScanner").style.display = "none";
			document.getElementById("divCamara").style.display = "none";
			document.getElementById("divUPS").style.display = "none";
			document.getElementById("divSwitch").style.display = "none";
			document.getElementById("divRouter").style.display = "none";
			document.getElementById("divModem").style.display = "none";
			document.getElementById("divTablet").style.display = "none";
			document.getElementById("divTelefono").style.display = "none";
			document.getElementById("divTelevisor").style.display = "none";
			
		}
		else if(getSelectValue=="Teclado"){
			document.getElementById("divUC").style.display = "none";
			document.getElementById("divTeclado").style.display = "block";
			document.getElementById("divMouse").style.display = "none";
			document.getElementById("divVideo").style.display = "none";
			document.getElementById("divSpeaker").style.display = "none";
			document.getElementById("divPrinter").style.display = "none";
			document.getElementById("divScanner").style.display = "none";
			document.getElementById("divCamara").style.display = "none";
			document.getElementById("divUPS").style.display = "none";
			document.getElementById("divSwitch").style.display = "none";
			document.getElementById("divRouter").style.display = "none";
			document.getElementById("divModem").style.display = "none";
			document.getElementById("divTablet").style.display = "none";
			document.getElementById("divTelefono").style.display = "none";
			document.getElementById("divTelevisor").style.display = "none";
		}
		else if(getSelectValue=="Mouse"){
			document.getElementById("divUC").style.display = "none";
			document.getElementById("divTeclado").style.display = "none";
			document.getElementById("divMouse").style.display = "block";
			document.getElementById("divVideo").style.display = "none";
			document.getElementById("divSpeaker").style.display = "none";
			document.getElementById("divPrinter").style.display = "none";
			document.getElementById("divScanner").style.display = "none";
			document.getElementById("divCamara").style.display = "none";
			document.getElementById("divUPS").style.display = "none";
			document.getElementById("divSwitch").style.display = "none";
			document.getElementById("divRouter").style.display = "none";
			document.getElementById("divModem").style.display = "none";
			document.getElementById("divTablet").style.display = "none";
			document.getElementById("divTelefono").style.display = "none";
			document.getElementById("divTelevisor").style.display = "none";
		}
		else if(getSelectValue=="Video"){
			document.getElementById("divUC").style.display = "none";
			document.getElementById("divTeclado").style.display = "none";
			document.getElementById("divMouse").style.display = "none";
			document.getElementById("divVideo").style.display = "block";
			document.getElementById("divSpeaker").style.display = "none";
			document.getElementById("divPrinter").style.display = "none";
			document.getElementById("divScanner").style.display = "none";
			document.getElementById("divCamara").style.display = "none";
			document.getElementById("divUPS").style.display = "none";
			document.getElementById("divSwitch").style.display = "none";
			document.getElementById("divRouter").style.display = "none";
			document.getElementById("divModem").style.display = "none";
			document.getElementById("divTablet").style.display = "none";
			document.getElementById("divTelefono").style.display = "none";
			document.getElementById("divTelevisor").style.display = "none";
		}
		else if(getSelectValue=="Bocinas"){
			document.getElementById("divUC").style.display = "none";
			document.getElementById("divTeclado").style.display = "none";
			document.getElementById("divMouse").style.display = "none";
			document.getElementById("divVideo").style.display = "none";
			document.getElementById("divSpeaker").style.display = "block";
			document.getElementById("divPrinter").style.display = "none";
			document.getElementById("divScanner").style.display = "none";
			document.getElementById("divCamara").style.display = "none";
			document.getElementById("divUPS").style.display = "none";
			document.getElementById("divSwitch").style.display = "none";
			document.getElementById("divRouter").style.display = "none";
			document.getElementById("divModem").style.display = "none";
			document.getElementById("divTablet").style.display = "none";
			document.getElementById("divTelefono").style.display = "none";
			document.getElementById("divTelevisor").style.display = "none";
		}
		else if(getSelectValue=="Impresora"){
			document.getElementById("divUC").style.display = "none";
			document.getElementById("divTeclado").style.display = "none";
			document.getElementById("divMouse").style.display = "none";
			document.getElementById("divVideo").style.display = "none";
			document.getElementById("divSpeaker").style.display = "none";
			document.getElementById("divPrinter").style.display = "block";
			document.getElementById("divScanner").style.display = "none";
			document.getElementById("divCamara").style.display = "none";
			document.getElementById("divUPS").style.display = "none";
			document.getElementById("divSwitch").style.display = "none";
			document.getElementById("divRouter").style.display = "none";
			document.getElementById("divModem").style.display = "none";
			document.getElementById("divTablet").style.display = "none";
			document.getElementById("divTelefono").style.display = "none";
			document.getElementById("divTelevisor").style.display = "none";
		}
		else if(getSelectValue=="Scanner"){
			document.getElementById("divUC").style.display = "none";
			document.getElementById("divTeclado").style.display = "none";
			document.getElementById("divMouse").style.display = "none";
			document.getElementById("divVideo").style.display = "none";
			document.getElementById("divSpeaker").style.display = "none";
			document.getElementById("divPrinter").style.display = "none";
			document.getElementById("divScanner").style.display = "block";
			document.getElementById("divCamara").style.display = "none";
			document.getElementById("divUPS").style.display = "none";
			document.getElementById("divSwitch").style.display = "none";
			document.getElementById("divRouter").style.display = "none";
			document.getElementById("divModem").style.display = "none";
			document.getElementById("divTablet").style.display = "none";
			document.getElementById("divTelefono").style.display = "none";
			document.getElementById("divTelevisor").style.display = "none";
		}
		else if(getSelectValue=="Cámara"){
			document.getElementById("divUC").style.display = "none";
			document.getElementById("divTeclado").style.display = "none";
			document.getElementById("divMouse").style.display = "none";
			document.getElementById("divVideo").style.display = "none";
			document.getElementById("divSpeaker").style.display = "none";
			document.getElementById("divPrinter").style.display = "none";
			document.getElementById("divScanner").style.display = "none";
			document.getElementById("divCamara").style.display = "block";
			document.getElementById("divUPS").style.display = "none";
			document.getElementById("divSwitch").style.display = "none";
			document.getElementById("divRouter").style.display = "none";
			document.getElementById("divModem").style.display = "none";
			document.getElementById("divTablet").style.display = "none";
			document.getElementById("divTelefono").style.display = "none";
			document.getElementById("divTelevisor").style.display = "none";
		}
		else if(getSelectValue=="UPS"){
			document.getElementById("divUC").style.display = "none";
			document.getElementById("divTeclado").style.display = "none";
			document.getElementById("divMouse").style.display = "none";
			document.getElementById("divVideo").style.display = "none";
			document.getElementById("divSpeaker").style.display = "none";
			document.getElementById("divPrinter").style.display = "none";
			document.getElementById("divScanner").style.display = "none";
			document.getElementById("divCamara").style.display = "none";
			document.getElementById("divUPS").style.display = "block";
			document.getElementById("divSwitch").style.display = "none";
			document.getElementById("divRouter").style.display = "none";
			document.getElementById("divModem").style.display = "none";
			document.getElementById("divTablet").style.display = "none";
			document.getElementById("divTelefono").style.display = "none";
			document.getElementById("divTelevisor").style.display = "none";
		}
		else if(getSelectValue=="Switch"){
			document.getElementById("divUC").style.display = "none";
			document.getElementById("divTeclado").style.display = "none";
			document.getElementById("divMouse").style.display = "none";
			document.getElementById("divVideo").style.display = "none";
			document.getElementById("divSpeaker").style.display = "none";
			document.getElementById("divPrinter").style.display = "none";
			document.getElementById("divScanner").style.display = "none";
			document.getElementById("divCamara").style.display = "none";
			document.getElementById("divUPS").style.display = "none";
			document.getElementById("divSwitch").style.display = "block";
			document.getElementById("divRouter").style.display = "none";
			document.getElementById("divModem").style.display = "none";
			document.getElementById("divTablet").style.display = "none";
			document.getElementById("divTelefono").style.display = "none";
			document.getElementById("divTelevisor").style.display = "none";
		}
		else if(getSelectValue=="Router"){
			document.getElementById("divUC").style.display = "none";
			document.getElementById("divTeclado").style.display = "none";
			document.getElementById("divMouse").style.display = "none";
			document.getElementById("divVideo").style.display = "none";
			document.getElementById("divSpeaker").style.display = "none";
			document.getElementById("divPrinter").style.display = "none";
			document.getElementById("divScanner").style.display = "none";
			document.getElementById("divCamara").style.display = "none";
			document.getElementById("divUPS").style.display = "none";
			document.getElementById("divSwitch").style.display = "none";
			document.getElementById("divRouter").style.display = "block";
			document.getElementById("divModem").style.display = "none";
			document.getElementById("divTablet").style.display = "none";
			document.getElementById("divTelefono").style.display = "none";
			document.getElementById("divTelevisor").style.display = "none";
		}
		else if(getSelectValue=="Modem"){
			document.getElementById("divUC").style.display = "none";
			document.getElementById("divTeclado").style.display = "none";
			document.getElementById("divMouse").style.display = "none";
			document.getElementById("divVideo").style.display = "none";
			document.getElementById("divSpeaker").style.display = "none";
			document.getElementById("divPrinter").style.display = "none";
			document.getElementById("divScanner").style.display = "none";
			document.getElementById("divCamara").style.display = "none";
			document.getElementById("divUPS").style.display = "none";
			document.getElementById("divSwitch").style.display = "none";
			document.getElementById("divRouter").style.display = "none";
			document.getElementById("divModem").style.display = "block";
			document.getElementById("divTablet").style.display = "none";
			document.getElementById("divTelefono").style.display = "none";
			document.getElementById("divTelevisor").style.display = "none";
		}
		else if(getSelectValue=="Tablet"){
			document.getElementById("divUC").style.display = "none";
			document.getElementById("divTeclado").style.display = "none";
			document.getElementById("divMouse").style.display = "none";
			document.getElementById("divVideo").style.display = "none";
			document.getElementById("divSpeaker").style.display = "none";
			document.getElementById("divPrinter").style.display = "none";
			document.getElementById("divScanner").style.display = "none";
			document.getElementById("divCamara").style.display = "none";
			document.getElementById("divUPS").style.display = "none";
			document.getElementById("divSwitch").style.display = "none";
			document.getElementById("divRouter").style.display = "none";
			document.getElementById("divModem").style.display = "none";
			document.getElementById("divTablet").style.display = "block";
			document.getElementById("divTelefono").style.display = "none";
			document.getElementById("divTelevisor").style.display = "none";
		}
		else if(getSelectValue=="Teléfono"){
			document.getElementById("divUC").style.display = "none";
			document.getElementById("divTeclado").style.display = "none";
			document.getElementById("divMouse").style.display = "none";
			document.getElementById("divVideo").style.display = "none";
			document.getElementById("divSpeaker").style.display = "none";
			document.getElementById("divPrinter").style.display = "none";
			document.getElementById("divScanner").style.display = "none";
			document.getElementById("divCamara").style.display = "none";
			document.getElementById("divUPS").style.display = "none";
			document.getElementById("divSwitch").style.display = "none";
			document.getElementById("divRouter").style.display = "none";
			document.getElementById("divModem").style.display = "none";
			document.getElementById("divTablet").style.display = "none";
			document.getElementById("divTelefono").style.display = "block";
			document.getElementById("divTelevisor").style.display = "none";
		}
		else if(getSelectValue=="Televisor"){
			document.getElementById("divUC").style.display = "none";
			document.getElementById("divTeclado").style.display = "none";
			document.getElementById("divMouse").style.display = "none";
			document.getElementById("divVideo").style.display = "none";
			document.getElementById("divSpeaker").style.display = "none";
			document.getElementById("divPrinter").style.display = "none";
			document.getElementById("divScanner").style.display = "none";
			document.getElementById("divCamara").style.display = "none";
			document.getElementById("divUPS").style.display = "none";
			document.getElementById("divSwitch").style.display = "none";
			document.getElementById("divRouter").style.display = "none";
			document.getElementById("divModem").style.display = "none";
			document.getElementById("divTablet").style.display = "none";
			document.getElementById("divTelefono").style.display = "none";
			document.getElementById("divTelevisor").style.display = "block";
		}


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
  z = x[currentTab].getElementsByTagName("select");
  t = x[currentTab].getElementsByTagName("texarea");

  //alert(currentTab);

	if(currentTab == 0){
		for(i=0; i < y.length; i++) {
			if(y[i].id == "serial"){
				if(y[i].value == ""){
					//alert("toy aqui");
					doc = "Debe llenar este campo.";
					document.getElementById("msgCodigo").innerHTML = doc;
					valid = false;
					break;
				}
			}
			if(y[i].id == "descripcion"){
				if(y[i].value == ""){
					//alert("toy aqui");
					doc = "Debe llenar este campo.";
					document.getElementById("msgDesc").innerHTML = doc;
					valid = false;
					break;
				}
			}
		}
		for(i=0; i < z.length; i++) {
			if(z[i].id == "tipoEQ"){
				if(z[i].value == 0){
					//alert("toy aqui");
					doc = "Debe seleccionar un tipo.";
					document.getElementById("msgTipo").innerHTML = doc;
					valid = false;
					break;
				}
			}
		}
	}
	else if(currentTab == 1){
		for(i=0; i < y.length; i++) {
			if(y[i].id == "chasis"){
				if(y[i].value == ""){
					//alert("toy aqui");
					doc = "Debe llenar este campo.";
					document.getElementById("msgChasis").innerHTML = doc;
					valid = false;
					break;
				}
			}
			if(y[i].id == "modelo"){
				if(y[i].value == ""){
					//alert("toy aqui");
					doc = "Debe llenar este campo.";
					document.getElementById("msgModelo").innerHTML = doc;
					valid = false;
					break;
				}
			}
			if(y[i].id == "serie"){
				if(y[i].value == ""){
					//alert("toy aqui");
					doc = "Debe llenar este campo.";
					document.getElementById("msgSerie").innerHTML = doc;
					valid = false;
					break;
				}
			}
		}
		for(i=0; i < z.length; i++) {
			if(z[i].id == "departamento"){
				if(z[i].value == 0){
					//alert("toy aqui");
					doc = "Debe seleccionar un departamento.";
					document.getElementById("msgDpto").innerHTML = doc;
					valid = false;
					break;
				}
			}
			if(z[i].id == "estado"){
				if(z[i].value == 0){
					//alert("toy aqui");
					doc = "Debe seleccionar un estado.";
					document.getElementById("msgEstado").innerHTML = doc;
					valid = false;
					break;
				}
			}
  		}
	}
	else{
		getSelectValue = document.getElementById("tipoEQ").value;
		alert(getSelectValue);
		if(getSelectValue == "Teclado"){
			
			for(i=0; i < t.length; i++) {
				if(t[i].id == "caracteristicasTeclado"){
					if(t[i].textContent.length == 0){
						//alert("toy aqui");
						doc = "Debe llenar as caracter.";
						document.getElementById("msgCaractTeclado").innerHTML = doc;
						valid = false;
						break;
					}
				}
			}
			
			for(i=0; i < z.length; i++) {
				if(z[i].id == "claseTeclado"){
					if(z[i].value == 0){
						//alert("toy aqui");
						doc = "Debe seleccionar una clase.";
						document.getElementById("msgClaseTeclado").innerHTML = doc;
						valid = false;
						break;
					}
				}	
			}

			
			
		}
	}
  
  //alert(z.length);
  

  
  // A loop that checks every input field in the current tab:
  /*for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false:
      valid = false;
    }
  }*/
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

</script>

<script type="text/javascript">
	function validar(){
			var doc;
			var valorSelectTipo = document.getElementById('tipo').value;
			var valorSelectEstado = document.getElementById('estado').value;
			var valorSelectDpto = document.getElementById('departamento').value;
			if(valorSelectTipo == 0 || valorSelectEstado == 0 || valorSelectDpto == 0){
				doc = "Debe seleccionar una opción";
				if(valorSelectTipo == 0){
					document.getElementById("msgTipo").innerHTML = doc;	
				}
				if(valorSelectEstado == 0){
					document.getElementById("msgEstado").innerHTML = doc;
				}
				if(valorSelectDpto == 0){
					document.getElementById("msgDpto").innerHTML = doc;
				}
			}else{
				return true;
			}
			return false;
		}


	function cambiovalortipo(){
		var valorSelectTipo = document.getElementById('tipoEQ').value;
		if(valorSelectTipo == 0){
			doc = "Debe seleccionar una opción";
			document.getElementById("msgTipo").innerHTML = doc;
		}else{
			doc = "";
			document.getElementById("msgTipo").innerHTML = doc;
		}
	}
	function cambiovalordpto(){
		var valorSelectEstado = document.getElementById('departamento').value;
		if(valorSelectEstado == 0){
			doc = "Debe seleccionar una opción";
			document.getElementById("msgDpto").innerHTML = doc;
		}else{
			doc = "";
			document.getElementById("msgDpto").innerHTML = doc;
		}
	}
	function cambiovalorestado(){
		var valorSelectEstado = document.getElementById('estado').value;
		if(valorSelectEstado == 0){
			doc = "Debe seleccionar una opción";
			document.getElementById("msgEstado").innerHTML = doc;
		}else{
			doc = "";
			document.getElementById("msgEstado").innerHTML = doc;
		}
	}


	function checkCodigo(input){
		var doc;
		if(input.validity.patternMismatch){
			//input.setCustomValidity("Este campo solo acepta 11 caracteres.");
			doc = "Este campo solo acepta números.";
			document.getElementById("nextBtn").disabled = true;
		}
		else{
			input.setCustomValidity("");
			doc = "";
			document.getElementById("nextBtn").disabled = false;
		}
		document.getElementById("msgCodigo").innerHTML = doc;
		
	}

	function checkDesc(input){
		var doc;
		if(input.value != ""){
			input.setCustomValidity("");
			doc = "";
			document.getElementById("nextBtn").disabled = false;
		}
		document.getElementById("msgDesc").innerHTML = doc;
		
	}

	function checkChasis(input){
		var doc;
		if(input.validity.patternMismatch){
			//input.setCustomValidity("Este campo solo acepta 11 caracteres.");
			doc = "Este campo no acepta caracteres especiales.";
			document.getElementById("nextBtn").disabled = true;
		}
		else{
			input.setCustomValidity("");
			doc = "";
			document.getElementById("nextBtn").disabled = false;
		}
		document.getElementById("msgChasis").innerHTML = doc;
	}
	

	function checkModelo(input){
		var doc;
		if(input.validity.patternMismatch){
			//input.setCustomValidity("Este campo solo acepta 11 caracteres.");
			doc = "Este campo no acepta caracteres especiales excepto el (guión).";
			document.getElementById("nextBtn").disabled = true;
		}
		else{
			input.setCustomValidity("");
			doc = "";
			document.getElementById("nextBtn").disabled = false;
		}
		document.getElementById("msgModelo").innerHTML = doc;
	}

	function checkSerie(input){
		var doc;
		if(input.validity.patternMismatch){
			//input.setCustomValidity("Este campo solo acepta 11 caracteres.");
			doc = "Este campo no acepta caracteres especiales.";
			document.getElementById("nextBtn").disabled = true;
		}
		else{
			input.setCustomValidity("");
			doc = "";
			document.getElementById("nextBtn").disabled = false;
		}
		document.getElementById("msgSerie").innerHTML = doc;
	}


</script>
