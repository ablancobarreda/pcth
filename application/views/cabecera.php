
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php  date_default_timezone_set('America/Caracas'); setlocale(LC_TIME, 'spanish'); ?>
    <title>PCTH</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('plugins/fontawesome-free/css/all.min.css'); ?>">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="<?php echo base_url('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'); ?>">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url('plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?php echo base_url('plugins/jqvmap/jqvmap.min.css'); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('dist/css/adminlte.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('plugins/toastr/toastr.min.css'); ?>">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo base_url('plugins/overlayScrollbars/css/OverlayScrollbars.min.css'); ?>">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url('plugins/daterangepicker/daterangepicker.css'); ?>">
    <!-- summernote -->
    <link rel="stylesheet" href="<?php echo base_url('plugins/summernote/summernote-bs4.css'); ?>">
    <!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

     <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/select2/css/select2.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css'); ?>">

	<link rel="stylesheet" href="<?php echo base_url('plugins/toastr/toastr.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('plugins/SVG/svg.css'); ?>">
	
	<!-- DataTables -->
	<link rel="stylesheet" href="<?php echo base_url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css'); ?>">
  

  <link href="<?php echo base_url('dist/css/style.css'); ?>" rel="stylesheet">

           
    <!--font awesome con CDN-->  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">  
  

</head>


<body class="hold-transition sidebar-mini  " >



    <div class="wrapper" >

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark "  style=" background: linear-gradient(to left, #0d47a1, #1b5e20); "> 
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>

            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto" >
                <li class="nav-item">
		<?php 
           if ($this->session->userdata('logged_in')==False) {
			   echo " <a class='nav-link' data-slide='true' href='".base_url('index.php/controller/showLogin')."' role='button'><i class='fas fa-sign-in-alt' title='Iniciar sesión'></i> Iniciar sesión</a>";
			 }
			 else{
				echo " <a class='nav-link' data-slide='true' href='".base_url('index.php/controller/cerrar')."' role='button'><i class='fas fa-sign-out-alt' title='Cerrar sesión'></i> Cerrar sesión</a>";
			 	 
			 }  
		?>
                   
				
                </li>
                <!-- li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-fill-drip" title="Temas"></i>
                    </a>
                </!-->
            </ul>
        </nav>
        <!-- /.navbar -->
