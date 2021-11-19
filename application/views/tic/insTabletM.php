



<!-- Content Wrapper. Contains page content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><spam><i class="fas fa-plus"></i></spam> Insertar tablet:</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="#">Home</a></li>
                        <li class="breadcrumb-item "><a href="#">Miembro</a></li>
                        <li class="breadcrumb-item "><a href="#">Expediente del miembro</a></li>
                        <li class="breadcrumb-item active">Insertar tablet</li>
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
					<spam><i class="fas fa-plus"></i></spam> <b>Insertar datos de la tablet</b>
				</div>
              <!-- /.card-header -->
              <!-- form start -->
              <form onsubmit="return validar()" action="<?php echo base_url('index.php/controller/insTabletM')?>" method="POST" >
			  
			 	 <div class="card-body">
				  
				  
					<input type="hidden" value="<?php echo $cim; ?>"  name="cim" id="cim">  

				  <div class="row">
					  <div class="col-1"></div>
					  <div class="form-group col-md-4">
							<label for="cargo"><label style="color: red;">*&nbsp;</label>Marca:</label><input type="text" value="" required  pattern="[0-9a-zA-Z\sñÑáéíóúÁÉÍÚÓ]+"  class="form-control" name="marca" id="marca" placeholder="Entre la marca">  
						  <p id="msgMarca" style="color: red;"></p>
					  </div>
					  <div class="col-1"></div>  

				  <div class="col-1"></div>
					<div class="form-group col-md-4">
				  		<label for="problematica"><label style="color: red;">*&nbsp;</label>N<sup>o</sup> Serie:</label><input type="text" value=""  required  pattern="[a-zA-Z0-9]+"   class="form-control" name="serie" id="serie" placeholder="Entre el número de serie">  
						<p id="msgPC" style="color: red;"></p>
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
					<?php $flag = True; $message = 1; $type = True;$pag = "tic" ?>
					
					
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
			
			return true;
		}


</script>