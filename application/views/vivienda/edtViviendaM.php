



<!-- Content Wrapper. Contains page content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><spam><i class="fas fa-edit"></i></spam> Editar vivienda:</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="#">Home</a></li>
                        <li class="breadcrumb-item "><a href="#">Miembro</a></li>
                        <li class="breadcrumb-item "><a href="#">Expediente del miembro</a></li>
                        <li class="breadcrumb-item active">Editar vivienda</li>
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
					<spam><i class="fas fa-edit"></i></spam> <b>Editar datos de la vivienda</b>
				</div>
              <!-- /.card-header -->
              <!-- form start -->
              <form onsubmit="return validar()" action="<?php echo base_url('index.php/controller/edtViviendaM')?>" method="POST" >
			  <?php  foreach ($vivienda->result() as $p) {  ?>
			 	 <div class="card-body">
				  
				  <input type="hidden" class="form-control" value="<?php echo $p->idvivienda ; ?>" name="idm" id="idm" > 

						<input type="hidden" value="<?php echo $cim; ?>"  name="cim" id="cim">  

				  <div class="row">
				
					<div class="col-1"></div>
					<div class="form-group col-md-4">
						<label for="organo"><label style="color: red;">*&nbsp;</label>Tipo de vivienda:</label>
						<select onchange="showInp()" class="form-control" id="tipo" name="tipo"  >      
							<option disabled selected value="0">--Seleccione el tipo--</option>
							<option value="Propia" <?php if($p->tipoVivienda == "Propia") echo 'selected="selected"'?>>Propia</option>
							<option value="Albergado" <?php if($p->tipoVivienda == "Albergado") echo 'selected="selected"'?>>Albergado</option>
						</select>  
						<p id="msgTipo" style="color: red;"></p>
					</div>
					<div class="col-1 "></div>
				
				  <div class="col-1" <?php if($p->tipoVivienda != "Propia") echo 'style="display: none"' ;?> id="col1estado"></div>
					<div class="form-group col-md-4"  <?php if($p->tipoVivienda != "Propia") echo 'style="display: none"' ;?> id="col4estado">
				  		<label for="problematica"><label style="color: red;">*&nbsp;</label>Estado:</label><input type="text" value="<?php echo $p->estado ; ?>"   pattern="[a-zA-Z\sñÑáéíóúÁÉÍÚÓ]+" oninput="checkEstado(this);"  class="form-control" name="denominiacion" id="denominiacion" placeholder="Entre el estado de la vivienda">  
						<p id="msgDenominiacion" style="color: red;"></p>
					</div>
					<div class="col-1"  <?php if($p->tipoVivienda != "Propia") echo 'style="display: none"' ;?> id="col2estado"></div>

                	</div>
                
				</div>

                <div class="card-footer">
				<br />
					<div class="row">
					
					<div class="col-md-5"></div>
					
					<div class="col-md-1">
					<?php $flag = True; $message = 1; $type = True; $pag = "atencion";?>
					
					
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
			if(getSelectValue=="Propia"){
				document.getElementById("col1estado").style.display = "inline-block";
				document.getElementById("col4estado").style.display = "inline-block";
				document.getElementById("col2estado").style.display = "inline-block";
			}
			else{
				document.getElementById("col1estado").style.display = "none";
				document.getElementById("col4estado").style.display = "none";
				document.getElementById("col2estado").style.display = "none";
			}
		}

		function checkEstado(input){
			if(input.validity.patternMismatch){
				//input.setCustomValidity("Este campo no acepta números");
				doc = "Este campo solo acepta letras.";
			}
			else{
				input.setCustomValidity("");
				doc = "";
			}
			document.getElementById("msgDenominiacion").innerHTML = doc;
		}

		function validar(){
			var doc;  
			var valorTipo = document.getElementById('tipo').value;
			if(valorTipo == "0"){
				doc = "Debe seleccionar una opción";
				document.getElementById("msgTipo").innerHTML = doc;
				return false;
			}


			var valorEstado = document.getElementById('denominiacion').value;
			if(valorEstado == "" && valorTipo == "Propia"){
				doc = "Debe llenar el estado de la vivienda";
				document.getElementById("msgDenominiacion").innerHTML = doc;
				return false;
			}
			
			return true;
		}



</script>