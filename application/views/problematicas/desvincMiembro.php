



<!-- Content Wrapper. Contains page content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><spam><i class="fas fa-edit"></i></spam> Desvincular miembro(s) de problemática:</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="#">Home</a></li>
                        <li class="breadcrumb-item "><a href="#">Banco problemas</a></li>
                        <li class="breadcrumb-item active">Desvincular miembro(s) de problemática</li>
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
					<spam><i class="fas fa-unlink"></i></spam> <b>Desvincular miembro(s) de la problemática</b>
				</div>
                <!-- /.card-header -->
                <!-- form start -->
                <form onsubmit="return validar()" action="<?php echo base_url('index.php/controller/desvMiembro')?>" method="POST" >
                    <div class="card-body">
                        <input type="hidden" class="form-control" value="<?php echo $numProb; ?>" name="numeroProblema" id="numeroProblema" > 
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="form-group col-md-4">
                                <label for="organo"><label style="color: red;">*&nbsp;</label>Miembro(s):</label>
                                <div class="select2-secondary">
                                    <select class="select2 select2-hidden-accessible" multiple="" id="miembros" name="miembros[]" data-placeholder="Seleccione el(los) miembros" data-dropdown-css-class="select2-info" style="width: 100%;" data-select2-id="15" tabindex="-1" aria-hidden="true">
                                        <?php  foreach ($resp->result() as $miembro) {  ?>
                                            <?php  foreach ($bmiembro->result() as $bancomiembro) {  ?>
                                                <?php  if ($miembro->ci == $bancomiembro->datospersonales_ci) {  ?>
                                                    <option value="<?php echo $miembro->ci ;?>"><?php echo $miembro->nombres." ".$miembro->apellido1." ".$miembro->apellido2 ;?></option>
                                                 <?php  } ?>
                                            <?php  } ?> 
                                        <?php  } ?>
                                    </select> 
						            <p id="msgMiembros" style="color: red;"></p>
					            </div>
					        </div>
			                <div class="col-4"></div>
					    </div>
				    </div>
                    <div class="card-footer">
				        <br />
					    <div class="row">
					        <div class="col-md-5"></div>
					        <div class="col-md-1">
					            <?php $flag = True; $message = 1; $type = True; ?>
                                <a href="<?php echo base_url()."index.php/controller/ltsProblematicas/".$flag.'/'.$message.'/'.$type; ?>"> 
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
			var valorSelectMiembro = document.getElementById('miembros').value;
			 if(valorSelectMiembro.length == 0){
                doc = "Debe seleccionar un mmiembro o varios.";
				document.getElementById("msgMiembros").innerHTML = doc;
                return false;          
            }
			return true;
		}

		

</script>