



<!-- Content Wrapper. Contains page content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><spam><i class="fas fa-edit"></i></spam> Editar reconocimiento:</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="#">Home</a></li>
                        <li class="breadcrumb-item "><a href="#">Miembro</a></li>
                        <li class="breadcrumb-item "><a href="#">Expediente del miembro</a></li>
                        <li class="breadcrumb-item active">Editar reconocimiento</li>
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
					<spam><i class="fas fa-edit"></i></spam> <b>Editar datos del reconocimiento</b>
				</div>
              <!-- /.card-header -->
              <!-- form start -->
              <form onsubmit="return validar()" action="<?php echo base_url('index.php/controller/edtReconocimientoM')?>" method="POST" >
			  <?php  foreach ($reconocimiento->result() as $t) {  ?>
			 	 <div class="card-body">
				  
				  <input type="hidden" class="form-control" value="<?php echo $t->idreconocimientos ; ?>" name="idt" id="idt" > 

						<input type="hidden" value="<?php echo $cim; ?>"  name="cim" id="cim">  

				  <div class="row">
				  <div class="col-1"></div>
					<div class="form-group col-md-4">
						<label for="organo"><label style="color: red;">*&nbsp;</label>Tipo de reconocimiento:</label>
						<select class="form-control" id="tipo" name="tipo"  onchange="showInp()">      
							<option disabled value="0">--Seleccione el tipo--</option>
							<option value="Condecoración" <?php if($t->tipoReconocimiento == "Condecoración") echo 'selected="selected"'?>>Condecoración</option>
							<option value="Premio" <?php if($t->tipoReconocimiento == "Premio") echo 'selected="selected"'?>>Premio</option>
							<?php if($t->tipoReconocimiento != "Condecoración" && $t->tipoReconocimiento != "Premio"){ ?>
								<option value="<?php echo $t->tipoReconocimiento ; ?>" <?php if($t->tipoReconocimiento ==  $t->tipoReconocimiento) echo 'selected="selected"'?>><?php echo $t->tipoReconocimiento ; ?></option>
							<?php }?>
							<option value="Otro" >Otro</option>
						</select>  
						<p id="msgTAutor" style="color: red;"></p>
					</div>
					<div class="col-1 "></div>

					<div class="col-1" style="display: none" id="col1tipoesp"></div>
					<div class="form-group col-md-4" style="display: none" id="col4tipoesp">
				  		<label for="cargo" ><label style="color: red;">*&nbsp;</label>Especifique el tipo:</label><input  type="text" value=""   pattern="[a-zA-Z\sñÑáéíóúÁÉÍÚÓ]+"  oninput="checkTitulo(this);" class="form-control" name="tipoesp" id="tipoesp" placeholder="Especifique el tipo de reconocimiento">  
						<p id="msgTitulo" style="color: red;" ></p>
					</div>
					<div class="col-1" style="display: none" id="col2tipoesp"></div>  

					
					<div class="col-1" ></div>
					<div class="form-group col-md-4">
				  		<label for="cargo"><label style="color: red;">*&nbsp;</label>Denominación:</label><input type="text" value="<?php echo $t->denominacion ; ?>" required  pattern="[a-zA-Z\sñÑáéíóúÁÉÍÚÓ]+"  oninput="checkCReferencia(this);" class="form-control" name="centroReferencia" id="centroReferencia" placeholder="Entre la denominación">  
						<p id="msgCReferencia" style="color: red;"></p>
					</div>
					<div class="col-1"></div> 

					<div class="col-1"></div>
					<div class="form-group col-md-4">
				  		<label for="fechaDefensa"><label style="color: red;">*&nbsp;</label>Fecha defensa:</label><input type="date" value="<?php echo $t->fecha ; ?>" required  class="form-control" name="fechaDefensa" id="fechaDefensa" >  
						<p id="msgFDefensa" style="color: red;"></p>
					</div>
					<div class="col-1"></div>    

                	</div>
                
				</div>

                <div class="card-footer">
				<br />
					<div class="row">
					
					<div class="col-md-5"></div>
					
					<div class="col-md-1">
					<?php $flag = True; $message = 1; $type = True; $pag = "reconocimientos"?>
					
					
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
		
		function showInp(){
			getSelectValue = document.getElementById("tipo").value;
			if(getSelectValue=="Otro"){
				document.getElementById("col1tipoesp").style.display = "inline-block";
				document.getElementById("col4tipoesp").style.display = "inline-block";
				document.getElementById("col2tipoesp").style.display = "inline-block";
			}
			else{
				document.getElementById("col1tipoesp").style.display = "none";
				document.getElementById("col4tipoesp").style.display = "none";
				document.getElementById("col2tipoesp").style.display = "none";
			}
		}
		

		function checkTitulo(input){
			if(input.validity.patternMismatch){
				//input.setCustomValidity("Este campo no acepta números");
				doc = "Este campo solo acepta letras.";
			}
			else{
				input.setCustomValidity("");
				doc = "";
			}
			document.getElementById("msgTitulo").innerHTML = doc;
		}	

		function checkCReferencia(input){
			if(input.validity.patternMismatch){
				//input.setCustomValidity("Este campo no acepta números");
				doc = "Este campo solo acepta letras.";
			}
			else{
				input.setCustomValidity("");
				doc = "";
			}
			document.getElementById("msgCReferencia").innerHTML = doc;
		}	

		

		function validar(){
			var doc;
			
			var valorSelectTipoAutor = document.getElementById('tipo').value;
			if(valorSelectTipoAutor == 0){
				doc = "Debe seleccionar una opción";
				document.getElementById("msgTAutor").innerHTML = doc;
				return false;
			}

			return true;
		}


</script>