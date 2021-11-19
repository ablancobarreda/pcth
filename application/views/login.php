<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CEDAI | Iniciar Sesión</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/fontawesome-free/css/all.min.css'); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'); ?>">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('dist/css/adminlte.min.css'); ?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page" style=" background: linear-gradient(to right, #1e88e5, #66bb6a);">
<div class="login-box">
  <div class="login-logo">
  
    <h1> <img src="<?php echo base_url('dist/img/logo/logo-pcth.png'); ?>" style="height:80px; width:80px;" alt="AdminLTE Logo" class="brand-image" > P. C. T. H. <img src="<?php echo base_url('dist/img/logo/logo-minint.png'); ?>" style="height:80px; width:80px;" alt="AdminLTE Logo" class="brand-image" > </h1>
    
  </div>
  <!-- /.login-logo -->
  <div class="card">
  <div class="card-header login-card-header text-white" style=" background: linear-gradient(to left, #0d47a1, #1b5e20); ">
    <center><h3><i class="fas fa-sign-in-alt mr-1"></i>Iniciar sesión</h3></center>
  </div>
    <div class="card-body login-card-body">
     
			<form action="<?php echo base_url('index.php/controller/entrar')?>" method="post">
					<?php if(!empty($mensaje) && $type == "error"): ?>
						<div class="callout callout-danger alert alert-dismissible "  style="background-color:#ffcdd2;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h5><i class="far fa-times-circle" style="color:#d32f2f;"></i> Error!</h5>
                      <p><?php echo $mensaje ?></p>
                      
                    </div>
					<?php endif ?>
          <?php if(!empty($mensaje) && $type == "success"): ?>
			
      <div class="callout callout-success alert alert-dismissible "  style="background-color:#e8f5e9;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                 <h5><i class="fas fa-check-circle" style="color:#28a745;"></i> Satisfactorio!</h5>
                 <p><?php echo $mensaje ?></p>
                </div>
        <?php endif ?>
        <div class="form-group mb-3">
          <input type="text" class="form-control" name="user" placeholder="Usuario">
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="pass" name="pass" placeholder="Contraseña">
          <div class="input-group-append">
            <div class="input-group-text">
              <span id = "ojo" class="fas fa-eye" onclick="mostrarContrasena()"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
         
					 <div class="col-6" >
					 <div class="input-group-prepend ">
                    
                  </div><button type="submit" class="btn btn-success btn-block"><i class="fa fa-check"></i> Aceptar</button>
					</div>
          
					
          <div class="col-6">
           <a href='<?php echo base_url('index.php/controller/index'); ?>'> <button type="button" class="btn btn-danger btn-block"><i class="fas fa-times"></i> Cancelar</button></a>
					</div>
				
          <!-- /.col -->
        </div>
      </form>
      
      <hr>
      
      <center><a href="<?php echo base_url('index.php/controller/viewchangePassword'); ?>"> <button type="button" class="btn bg-navy"><i class="fas fa-key mr-1"></i> Cambiar contraseña</button></a></center>
      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<strong>MININT Bayamo | Potencial Científico Técnico Humano.</strong> <b> 2021</b>  

<!-- jQuery -->
<script src="<?php echo base_url('plugins/jquery/jquery.min.js'); ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('dist/js/adminlte.min.js'); ?>"></script>
<script>
  function mostrarContrasena(){
      var tipo = document.getElementById("pass");
      var classicon = document.getElementById("ojo");
      if(tipo.type == "password"){
          tipo.type = "text";
          classicon.className = "fas fa-eye-slash";

      }else{
          tipo.type = "password";
          classicon.className = "fas fa-eye";
      }
  }
</script>
</body>
</html>
