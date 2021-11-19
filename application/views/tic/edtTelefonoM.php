



<!-- Content Wrapper. Contains page content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><spam><i class="fas fa-edit"></i></spam> Editar teléfoo:</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="#">Home</a></li>
                        <li class="breadcrumb-item "><a href="#">Miembro</a></li>
                        <li class="breadcrumb-item "><a href="#">Expediente del miembro</a></li>
                        <li class="breadcrumb-item active">Editar teléfoo</li>
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
					<spam><i class="fas fa-edit"></i></spam> <b>Editar datos del teléfoo</b>
				</div>
              <!-- /.card-header -->
              <!-- form start -->
              <form onsubmit="return validar()" action="<?php echo base_url('index.php/controller/edtTelefonoM')?>" method="POST" >
			  <?php  foreach ($telefonom->result() as $d) {  ?>
			 	 <div class="card-body">
				  
				  <input type="hidden" class="form-control" value="<?php echo $d->idtelefonoMovil ; ?>" name="idt" id="idt" > 

						<input type="hidden" value="<?php echo $cim; ?>"  name="cim" id="cim">  

				  <div class="row">
				  <div class="col-1"></div>
					<div class="form-group col-md-4">
						<label for="cargo"><label style="color: red;">*&nbsp;</label>Tipo:</label>
						<select onchange="cambioGrado()" class="form-control" id="tipo" name="tipo"  >      
							<option disabled value="0">--Seleccione el tipo--</option>
							<option value="Fijo" <?php if($d->tipo == "Fijo") echo 'selected="selected"'?>>Fijo</option>
							<option value="Móvil" <?php if($d->tipo == "Móvil") echo 'selected="selected"'?>>Móvil</option>
						</select>  
						
						<p id="msgTipo" style="color: red;"></p>
					</div>
					<div class="col-1"></div>
				  <div class="col-1"></div>
					<div class="form-group col-md-4">
						<label for="cargo"><label style="color: red;">*&nbsp;</label>Propietario:</label>
						<select onchange="cambioGrado()" class="form-control" id="propietario" name="propietario"  >      
							<option disabled  value="0">--Seleccione el propietario--</option>
							<option value="Propio" <?php if($d->propietario == "Propio") echo 'selected="selected"'?>>Propio</option>
							<option value="Estatal" <?php if($d->propietario == "Estatal") echo 'selected="selected"'?>>Estatal</option>
						</select>  
						
						<p id="msgPropietario" style="color: red;"></p>
					</div>
					<div class="col-1"></div>
					
					<div class="col-1"></div>
					<div class="form-group col-md-4">
				  		<label for="cargo"><label style="color: red;">*&nbsp;</label>Número:</label><input type="text" value="<?php echo $d->numero ; ?>" required  pattern="[0-9]{8}" maxlength="8" oninput="checkNumero(this);" class="form-control" name="numero" id="numero" placeholder="Entre el número">  
						<p id="msgNumero" style="color: red;"></p>
					</div>
					<div class="col-1"></div>   

                	</div>
                
				</div>

                <div class="card-footer">
				<br />
					<div class="row">
					
					<div class="col-md-5"></div>
					
					<div class="col-md-1">
					<?php $flag = True; $message = 1; $type = True; $pag = "tic"?>
					
					
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
		
		function checkNumero(input){
			if(input.validity.patternMismatch){
				//input.setCustomValidity("Este campo no acepta números");
				doc = "Este campo solo acepta números y debe contener 8 dígitos";
			}
			else{
				input.setCustomValidity("");
				doc = "";
			}
			document.getElementById("msgNumero").innerHTML = doc;
		}	

		

		

		function validar(){
			var doc;
			var valorSelectTipo = document.getElementById('tipo').value;
			if(valorSelectTipo == 0){
				doc = "Debe seleccionar una opción";
				document.getElementById("msgTipo").innerHTML = doc;
				return false;
			}

			var valorSelectPropietario = document.getElementById('propietario').value;
			if(valorSelectPropietario == 0){
				doc = "Debe seleccionar una opción";
				document.getElementById("msgPropietario").innerHTML = doc;
				return false;
			}

			return true;
		}


</script>