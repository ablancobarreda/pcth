



<!-- Content Wrapper. Contains page content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><spam><i class="fas fa-plus" ></i></spam> Insertar colaboración:</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="#">Home</a></li>
                        <li class="breadcrumb-item "><a href="#">Miembro</a></li>
                        <li class="breadcrumb-item "><a href="#">Expediente del miembro</a></li>
                        <li class="breadcrumb-item active">Insertar colaboración</li>
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
					<spam><i class="fas fa-plus" ></i></spam> <b>Insertar datos de la colaboración</b>
				</div>
              <!-- /.card-header -->
              <!-- form start -->
              <form onsubmit="return validar()" action="<?php echo base_url('index.php/controller/insColaboracionM')?>" method="POST" >
			  
			 	 <div class="card-body">
				  
				  
						<input type="hidden" value="<?php echo $cim; ?>"  name="cim" id="cim">  

				  <div class="row">
				  

					<div class="col-1"></div>
					<div class="form-group col-md-4">
						<label for="organo"><label style="color: red;">*&nbsp;</label>Tipo de colaboración:</label>
						<select onchange="cambioNivel()" class="form-control" id="tipo" name="tipo"  >      
							<option disabled selected value="0">--Seleccione el nivel--</option>
							<option value="Comité de expertos" >Comité de expertos</option>
							<option value="Comisiones metodológicas" >Comisiones metodológicas</option>
							<option value="Consejo científico">Consejo científico</option>
						</select>  
						<p id="msgTipo" style="color: red;"></p>
					</div>
					<div class="col-1 "></div>

					<div class="col-1"></div>
					<div class="form-group col-md-4">
				  		<label for="programa"><label style="color: red;">*&nbsp;</label>Fecha desde:</label><input type="date" value=""   class="form-control" name="fechaDesde" id="fechaDesde" >  
						<p id="msgFechaDesde" style="color: red;"></p>
					</div>
					<div class="col-1"></div>  
				
					<div class="col-1"></div>  
					<div class="form-group col-md-4">
				  		<label for="prioridades"><label style="color: red;">*&nbsp;</label>Fecha hasta:</label><input type="date" value=""   class="form-control" name="fechaHasta" id="fechaHasta" >  
						<p id="msgFechaHasta" style="color: red;"></p>
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
					<?php $flag = True; $message = 1; $type = True;$pag = "colaboraciones" ?>
					
					
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

		function validar(){
			var doc;  
			
			var valorSelectTipo = document.getElementById('tipo').value;
			if(valorSelectTipo == 0){
				doc = "Debe seleccionar una opción";
				document.getElementById("msgTipo").innerHTML = doc;
				return false;
			}

			var valorFechaDesde = document.getElementById('fechaDesde').value;
			var valorFechaHasta = document.getElementById('fechaHasta').value;
			
			if(valorFechaDesde == ""){
				doc = "Debe seleccionar una fecha de inicio";
				document.getElementById("msgFechaDesde").innerHTML = doc;
				return false;
			}
			if(valorFechaHasta == ""){
				doc = "Debe seleccionar una fecha final";
				document.getElementById("msgFechaHasta").innerHTML = doc;
				return false;
			}

			if(valorFechaHasta < valorFechaDesde){
				alert ("La fecha de inicio no puede ser mayor que la fecha final");
				return false;
			}
			return true;
		}


</script>