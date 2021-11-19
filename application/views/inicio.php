<!-- Content Wrapper. Contains page content -->


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Inicio</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active"><a href="#">Inicio</a></li>
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
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box text-withe" style=" background: linear-gradient(to right, #1e88e5, #66bb6a);">
                        <div class="inner">
							<?php 
							$i = 0;
							foreach ($valores->result() as $d) {
								$i++;
							}
							?>
                            <h3 style="color: #ffffff !important;"><?php echo $i; ?></h3>

                            <p style="color: #ffffff !important;">Miembros</p>
                        </div>
                        <div class="icon">
						<i class="fa fa-users"></i>
						</div>
						<?php $flag = True; $message = 1; $type = True; ?>
                        <a href="<?php echo base_url()."index.php/controller/ltsResponsables/".$flag.'/'.$message.'/'.$type; ?>"  class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">

                    <div class="small-box text-withe" style=" background: linear-gradient(to left, #1e88e5, #66bb6a);">
                        <div class="inner">
						<?php 
							$i = 0;
							foreach ($problemas->result() as $e) {
								$i++;
							}
							?>
                            <h3 style="color: #ffffff !important;"><?php echo $i; ?></h3>
                            <!-- h3>53<sup style="font-size: 20px">%</sup></!-->

                            <p style="color: #ffffff !important;">Problemáticas</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-archive "></i>
                        </div>
                        <?php $flag = True; $message = 1; $type = True; ?>
                        <a href="<?php echo base_url()."index.php/controller/ltsProblematicas/".$flag.'/'.$message.'/'.$type; ?>" class="small-box-footer">Más información  <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box text-withe" style=" background: linear-gradient(to right, #1e88e5, #66bb6a);">
                        <div class="inner">
						<?php 
							$i = 0;
							foreach ($proyectos->result() as $e) {
								$i++;
							}
							?>
                            <h3 style="color: #ffffff !important;"><?php echo $i; ?></h3>
                            <!-- h3>53<sup style="font-size: 20px">%</sup></!-->

                            <p style="color: #ffffff !important;">Proyectos</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-puzzle-piece "></i>
                        </div>
                        <?php $flag = True; $message = 1; $type = True; ?>
                        <a href="<?php echo base_url()."index.php/controller/ltsProyectos/".$flag.'/'.$message.'/'.$type; ?>" class="small-box-footer">Más información  <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box text-withe" style=" background: linear-gradient(to left, #1e88e5, #66bb6a);">
                        <div class="inner">
                        <?php 
							$i = 0;
							foreach ($tesis->result() as $t) {
								$i++;
							}
							?>
                            <h3 style="color: #ffffff !important;"><?php echo $i; ?></h3>
                            <!-- h3>53<sup style="font-size: 20px">%</sup></!-->

                            <p style="color: #ffffff !important;">Tesis</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-book "></i>
                        </div>
                        <?php $flag = True; $message = 1; $type = True; ?>
                        <a href="<?php echo base_url()."index.php/controller/ltsTesis/".$flag.'/'.$message.'/'.$type; ?>" class="small-box-footer">Más información  <i class="fas fa-arrow-circle-right"></i></a>
                     </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box text-withe" style=" background: linear-gradient(to left, #1e88e5, #66bb6a);">
                        <div class="inner">
                        <?php 
							$i = 0;
							foreach ($publicaciones->result() as $t) {
								$i++;
							}
							?>
                            <h3 style="color: #ffffff !important;"><?php echo $i; ?></h3>
                            <!-- h3>53<sup style="font-size: 20px">%</sup></!-->

                            <p style="color: #ffffff !important;">Publicaciones</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-newspaper "></i>
                        </div>
                        <?php $flag = True; $message = 1; $type = True; ?>
                        <a href="<?php echo base_url()."index.php/controller/ltsPublicaciones/".$flag.'/'.$message.'/'.$type; ?>" class="small-box-footer">Más información  <i class="fas fa-arrow-circle-right"></i></a>
                     </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box text-withe" style=" background: linear-gradient(to right, #1e88e5, #66bb6a);">
                        <div class="inner">
                        <?php 
							$i = 0;
							foreach ($colaboraciones->result() as $t) {
								$i++;
							}
							?>
                            <h3 style="color: #ffffff !important;"><?php echo $i; ?></h3>
                            <!-- h3>53<sup style="font-size: 20px">%</sup></!-->

                            <p style="color: #ffffff !important;">Colaboraciones</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-hands-helping "></i>
                        </div>
                        <?php $flag = True; $message = 1; $type = True; ?>
                        <a href="<?php echo base_url()."index.php/controller/ltsColaboracion/".$flag.'/'.$message.'/'.$type; ?>" class="small-box-footer">Más información  <i class="fas fa-arrow-circle-right"></i></a>
                     </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box text-withe" style=" background: linear-gradient(to left, #1e88e5, #66bb6a);">
                        <div class="inner">
                        <?php 
							$i = 0;
							foreach ($investigaciones->result() as $t) {
								$i++;
							}
							?>
                            <h3 style="color: #ffffff !important;"><?php echo $i; ?></h3>
                            <!-- h3>53<sup style="font-size: 20px">%</sup></!-->

                            <p style="color: #ffffff !important;">Investigaciones</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-search "></i>
                        </div>
                        <?php $flag = True; $message = 1; $type = True; ?>
                        <a href="<?php echo base_url()."index.php/controller/ltsInvestigacion/".$flag.'/'.$message.'/'.$type; ?>" class="small-box-footer">Más información  <i class="fas fa-arrow-circle-right"></i></a>
                     </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box text-withe" style=" background: linear-gradient(to right, #1e88e5, #66bb6a);">
                        <div class="inner">
                        <?php 
							$i = 0;
							foreach ($reconocimientos->result() as $t) {
								$i++;
							}
							?>
                            <h3 style="color: #ffffff !important;"><?php echo $i; ?></h3>
                            <!-- h3>53<sup style="font-size: 20px">%</sup></!-->

                            <p style="color: #ffffff !important;">Reconocimientos</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-award "></i>
                        </div>
                        <?php $flag = True; $message = 1; $type = True; ?>
                        <a href="<?php echo base_url()."index.php/controller/ltsReconocimiento/".$flag.'/'.$message.'/'.$type; ?>" class="small-box-footer">Más información  <i class="fas fa-arrow-circle-right"></i></a>
                     </div>
                </div>
            </div>

				<!-- BAR CHART -->
			<div class="card">
              	<div class="card-header text-white" style=" background: linear-gradient(to right, #1e88e5, #66bb6a);">
					<h3 class="card-title"><b><i class="fas fa-chart-bar"></i> Miembros con mayores números de problemáticas asociadas</b></h3>
					<!-- div class="card-tools">
						<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
						<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
					</div -->
            	</div>
              	<div class="card-body">
					<div class="chart">
					<canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
					</div>
              	</div>
            </div>

        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->



