<!-- Content Wrapper. Contains page content -->


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2" >
                <div class="col-sm-6">
				<?php foreach ($r->result() as $d){ ?>
					<h1 class="m-0 text-dark"><spam><i class="fas fa-plus"></i></spam> Insertar acceso al dominio >> <?php echo $d->nombre." ".$d->apellido1." ".$d->apellido2 ?> </h1>
					<?php } ?>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><a href="#">Acceso al dominio</a></li>
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
				<div class="card card-primary">
             
			 <!-- /.card-header -->
			 <!-- form start -->
			 <form action="<?php echo base_url('index.php/controller/insAccesoDominio')?>" method="POST" >
			   
				 <div class="card-body">
				 <div class="form-group">
					<div class="  alert alert-info" >
						<i class="fas fa-info-circle"></i><spam >&nbsp;Los campos con (<label style="color: red;">*</label>) son obligatorios.</spam>
					</div>
				</div>
				 <div class="row">
				   <div class="col-3"></div>
				   <div class="form-group col-md-6">
				   <?php foreach ($r->result() as $d){ ?>
						<input type="hidden"   class="form-control" name="idresponsable" id="idresponsable" value="<?php echo $d->idresponsable; ?>"> 
						<?php } ?>
					   </div>
				   <div class="col-3"></div>
				 
				   <div class="col-3"></div>
				   <div class="form-group col-md-6">
						 <label for="name"><label style="color: red;">*&nbsp;</label>Usuario del dominio:</label><input type="text"  required pattern="[0-9a-zA-Z\sñÑáéíóúÁÉÍÚÓ/*-+.,:@]+" oninput="checkUser(this);" class="form-control" name="usuariodominio" id="usuariodominio" placeholder="Entre el usuario del dominio">  
					   <p id="msgUser" style="color: red;"></p>
				   </div>
				   <div class="col-3"></div>  
			   
				   <div class="col-3"></div>  
				   <div class="form-group col-md-6">
						 <label for="apellido1"><label style="color: red;">*&nbsp;</label>Contraseña:</label><input type="text"  required pattern="[0-9a-zA-Z\sñÑáéíóúÁÉÍÚÓ/*-+.,:@]+" oninput="checkPass(this);"  class="form-control" name="passdominio" id="passdominio" placeholder="Entre la contraseña del dominio">  
					   <p id="msgPass" style="color: red;"></p>
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
					   <button type="reset" class="btn btn-primary  btn-block"><i class="fa fa-eraser"></i> Limpiar</button><br />
				   </div>
				   <div class="col-md-1">
				   <?php foreach ($r->result() as $d){ ?>
					<?php $flag = True; $message = 1; $type = True; ?>
					   <a  href="<?php echo base_url()."index.php/controller/viewResponsable/".$flag.'/'.$message.'/'.$type.'/'.$d->idresponsable; ?>" > 
						   <button type="button" class="btn btn-danger  btn-block"><i class="fa fa-times"></i> Cancelar</button> <br />	
					   </a>
				   <?php } ?>
				   </div>
				   <div class="col-md-1">
					   <button type="submit" class="btn btn-success btn-block" ><i class="fa fa-check"></i> Aceptar</button>
				   </div>
				   
				   
			   </div>
			   </div>
			   
			   
		   </form>
			 
		   
			   </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
    <!-- /.content -->
</div>


<script type="text/javascript">
		function checkUser(input){
			var doc;
			if(input.validity.patternMismatch){
				//input.setCustomValidity("Este campo solo acepta 11 caracteres.");
				doc = "Este campo solo acepta números, letras y el caracter especial (punto).";
				
			}
			else{
				input.setCustomValidity("");
				doc = "";
			}
			document.getElementById("msgUser").innerHTML = doc;
			

			
		}	


	</script>
