<!-- Content Wrapper. Contains page content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><spam><i class="fas fa-edit"></i></spam> Editar cargo:</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="#">Home</a></li>
                        <li class="breadcrumb-item "><a href="#">Cargos</a></li>
                        <li class="breadcrumb-item active">Editar cargo</li>
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
            <!-- Small boxes (Stat box) -->
            <div class="card card-primary">
             
              <!-- /.card-header -->
              <!-- form start -->
              <form onsubmit="return validar()" action="<?php echo base_url('index.php/controller/edtCargo')?>" method="POST">
				
			  <?php  foreach ($m->result() as $d) {
                 ?>

				  <div class="card-body">
				  <div class="row">
					
					<div class="col-3"></div>
					<div class="form-group col-md-6">
					<input type="hidden" class="form-control" value="<?php echo $d->idcargo; ?>" name="idcargo" id="idcargo" >
				  		<label for="name">Nombre:</label><input type="text"  required pattern="[a-zA-Z\sñÑáéíóúÁÉÍÚÓ]+" oninput="checkName(this);" class="form-control" name="name" id="name" value="<?php echo $d->nombrecargo; ?>" placeholder="Entre el nombre">  
						  <p id="msgName" style="color: red;"></p>
					</div>
					<div class="col-3"></div>  

                </div>
				</div>

                <div class="card-footer">
				<br />
					<div class="row">
					
					<div class="col-md-4">
				
					</div>
					
					<div class="col-md-1">
					<?php $flag = True; $message = 1; $type = True; ?>
						<a href='<?php echo base_url()."index.php/controller/ltsCargo/".$flag.'/'.$message.'/'.$type; ?>'> 
							<button type="button" class="btn btn-danger  btn-block"><i class="fa fa-times"></i> Cancelar</button> <br />	
						</a>
					</div>
					<div class="col-md-1">
						<button type="submit" class="btn btn-success btn-block" ><i class="fa fa-check"></i> Aceptar</button>
					</div>
					
					
					
					
					
				</div>
				</div>
				
				 <?php } ?>
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
