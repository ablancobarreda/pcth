<!-- Content Wrapper. Contains page content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="#">Home</a></li>
                        <li class="breadcrumb-item "><a href="#">Cargos</a></li>
                        <li class="breadcrumb-item active">Insertar cargo</li>
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
			<div class="callout callout-info">
				<h5><i class="fas fa-info-circle" style="color:#117a8b;"></i> Información</h5>
				<p>Los campos con (<label style="color: red;">*</label>) son obligatorios.</p>
			</div>
            <div class="card card-primary">
			<div class="card-header bg-dark">
					<spam><i class="fas fa-plus"></i></spam> Insertar cargo
				</div>
              <!-- /.card-header -->
              <!-- form start -->
              <form onsubmit="return validar()" action="<?php echo base_url('index.php/controller/insCargo')?>" method="POST" >
				
			 	 <div class="card-body">
				  <div class="row">
					
				  
					<div class="col-3"></div>
					<div class="form-group col-md-6">
				  		<label for="name"><label style="color: red;">*&nbsp;</label>Nombre:</label><input type="text"  required pattern="[a-zA-Z\sñÑáéíóúÁÉÍÚÓ]+" oninput="checkName(this);" class="form-control" name="nmbCargo" id="nmbCargo" placeholder="Entre el nombre">  
						<p id="msgName" style="color: red;"></p>
					</div>
					<div class="col-3"></div>  
				
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
						<a href="<?php echo base_url()."index.php/controller/ltsCargo/".$flag.'/'.$message.'/'.$type; ?>"> 
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
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

	<script type="text/javascript">

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
		
	</script>
