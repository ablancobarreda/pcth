

<aside class="main-sidebar sidebar-dark-primary elevation-2" >
    <!-- Brand Logo -->
    <a href="#" class="brand-link" style=" background: linear-gradient(to right, #0d47a1, #1b5e20);">
      <img src="<?php echo base_url('dist/img/logo/logo-pcth.png'); ?>" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
      &nbsp;&nbsp;<span class="brand-text font-weight-dark">PCTH</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar ">


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->

                <li class='nav-item '>
                    <a href="<?php echo base_url()."index.php/controller/index" ; ?>" class='nav-link  <?php if($ctrlpag == "inicio"){ echo "active";} ?>'>
                        <i class='fas fa-home nav-icon'></i>
                    <p>Inicio</p>
                    </a>
                </li>

                <li class="nav-item has-treeview  <?php if($ctrlpag == "miembro"){ echo "menu-is-opening menu-open";} ?>">
                    <a  href='' class='nav-link  <?php if($ctrlpag == "miembro"){ echo "active";} ?>'>
                        <i class="nav-icon fas fa-user-alt"></i><p>Miembros<i class="fas fa-angle-left right"></i></p>
                    </a>
					<ul class="nav nav-treeview " style="margin-left:10px; "> 
                        <?php if($this->session->userdata('logged_in')==True):?>
                            <li class='nav-item '>
                                <a href="<?php echo base_url()."index.php/controller/v_i_responsable" ; ?>" class='nav-link  <?php if($inspag == "insmiembro"){ echo "active";} ?>'>
                                    <i class='fa fa-plus nav-icon'></i>
                                    <p>Adicionar miembro</p>
                                </a>
                            </li>
                            <?php endif ?>
                        <?php $flag = True; $message = 1; $type = True;  ?>
                            <li class='nav-item'>
                                <a href="<?php echo base_url()."index.php/controller/ltsResponsables/".$flag.'/'.$message.'/'.$type; ?>" class='nav-link <?php if($ltspag == "ltsmiembro"){ echo "active";} ?>'>
                                    <i class='fa fa-list-ol nav-icon'></i>
                                    <p>Listar miembros</p>
                                </a>
                            </li>
                    </ul>
                </li>
				
                <li class="nav-item has-treeview  <?php if($ctrlpag == "problema"){ echo "menu-is-opening menu-open";} ?>" >
                    <a  href='' class='nav-link <?php if($ctrlpag == "problema"){ echo "active";} ?>' ><i class="nav-icon fas fa-archive"></i><p>Banco problemas<i class="fas fa-angle-left right"></i></p></a>
                    <ul class="nav nav-treeview " style="margin-left:10px; ">
                        <?php if($this->session->userdata('logged_in')==True):?>
                            <li class='nav-item '>
                                <a href="<?php echo base_url()."index.php/controller/v_i_problematica" ; ?>" class='nav-link  <?php if($inspag == "insproblema"){ echo "active";} ?>'>
                                    <i class='fa fa-plus nav-icon'></i>
                                    <p>Adicionar problemática</p>
                                </a>
                            </li>
                            <?php endif ?>
                        <?php $flag = True; $message = 1; $type = True;  ?> 
                        <li class='nav-item'>
                            <a href="<?php echo base_url()."index.php/controller/ltsProblematicas/".$flag.'/'.$message.'/'.$type; ?>" class='nav-link  <?php if($ltspag == "ltsproblema"){ echo "active";} ?>'>
                                <i class='fa fa-list-ol nav-icon'></i>
                                <p>Listar banco problemas</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a  href="<?php echo base_url()."index.php/controller/ltsExperienciasProf/".$flag.'/'.$message.'/'.$type; ?>" class='nav-link  <?php if($ltspag == "ltsexperiencia"){ echo "active";} ?>'>
                        <i class="nav-icon fas fa-briefcase"></i><p>Experiencias prof.</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a  href="<?php echo base_url()."index.php/controller/ltsTesis/".$flag.'/'.$message.'/'.$type; ?>" class='nav-link  <?php if($ltspag == "ltstesis"){ echo "active";} ?>'>
                        <i class="nav-icon fas fa-book mr-1"></i><p>Tesis</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a  href="<?php echo base_url()."index.php/controller/ltsInnovaciones/".$flag.'/'.$message.'/'.$type; ?>" class='nav-link  <?php if($ltspag == "ltsinnovaciones"){ echo "active";} ?>'>
                        <i class="nav-icon fas fa-lightbulb mr-1"></i><p> Innovaciones</p>
                    </a>
                </li>
                <li class="nav-item has-treeview  <?php if($ctrlpag == "asociacion"){ echo "menu-is-opening menu-open";} ?>" >
                    <a  href='' class='nav-link <?php if($ctrlpag == "asociacion"){ echo "active";} ?>'><i class="nav-icon fas fa-users"></i><p>Asociaciones<i class="fas fa-angle-left right"></i></p></a>
                    <ul class="nav nav-treeview " style="margin-left:10px; "> 
                        <li class='nav-item'>
                            <a href="<?php  echo base_url()."index.php/controller/ltsOrganizacion/".$flag.'/'.$message.'/'.$type; ?>" class='nav-link  <?php if($ltspag == "ltsorganiz"){ echo "active";} ?>'>
                                <i class='fa fa-list-ol nav-icon'></i>
                                <p>Organizaciones</p>
                            </a>
                        </li>
                        <li class='nav-item'>
                            <a href="<?php  echo base_url()."index.php/controller/ltsAsociacion/".$flag.'/'.$message.'/'.$type; ?>" class='nav-link  <?php if($ltspag == "ltsasoc"){ echo "active";} ?>'>
                                <i class='fa fa-list-ol nav-icon'></i>
                                <p>Asociaciones prof.</p>
                            </a>
                        </li>
                    </ul>
                </li>       
                <li class="nav-item has-treeview  <?php if($ctrlpag == "potencial"){ echo "menu-is-opening menu-open";} ?>" >
                    <a  href='' class='nav-link <?php if($ctrlpag == "potencial"){ echo "active";} ?>'><i class="nav-icon fas fa-atom"></i><p>Potencial científico<i class="fas fa-angle-left right"></i></p></a>
                    <ul class="nav nav-treeview " style="margin-left:10px;"> 
                        <li class='nav-item'>
                            <a href="<?php  echo base_url()."index.php/controller/ltsCatDocente/".$flag.'/'.$message.'/'.$type; ?>" class='nav-link  <?php if($ltspag == "ltscatdoc"){ echo "active";} ?>'>
                                <i class='fa fa-list-ol nav-icon'></i>
                                <p>Categ. docentes</p>
                            </a>
                        </li>
                        <li class='nav-item'>
                            <a href="<?php  echo base_url()."index.php/controller/ltsCatCientifica/".$flag.'/'.$message.'/'.$type; ?>" class='nav-link  <?php if($ltspag == "ltscatcient"){ echo "active";} ?>'>
                                <i class='fa fa-list-ol nav-icon'></i>
                                <p>Categ. científicas</p>
                            </a>
                        </li>
                        <li class='nav-item'>
                            <a href="<?php  echo base_url()."index.php/controller/ltsCursoEnt/".$flag.'/'.$message.'/'.$type; ?>" class='nav-link  <?php if($ltspag == "ltscurso"){ echo "active";} ?>'>
                                <i class='fa fa-list-ol nav-icon'></i>
                                <p>Cursos entrenamiento</p>
                            </a>
                        </li>
                        <li class='nav-item'>
                            <a href="<?php  echo base_url()."index.php/controller/ltsPostgrado/".$flag.'/'.$message.'/'.$type; ?>" class='nav-link  <?php if($ltspag == "ltspostgrado"){ echo "active";} ?>'>
                                <i class='fa fa-list-ol nav-icon'></i>
                                <p>Postgrados</p>
                            </a>
                        </li>
                        <li class='nav-item'>
                            <a href="<?php echo base_url()."index.php/controller/ltsTituloAcademico/".$flag.'/'.$message.'/'.$type; ?>" class='nav-link  <?php if($ltspag == "ltstitulo"){ echo "active";} ?>'>
                                <i class='fa fa-list-ol nav-icon'></i>
                                <p>Títulos académicos</p>
                            </a>
                        </li>
                    </ul>
                </li>       
                <li class="nav-item ">
                    <a  href="<?php echo base_url()."index.php/controller/ltsPublicaciones/".$flag.'/'.$message.'/'.$type; ?>" class='nav-link  <?php if($ltspag == "ltspublicaciones"){ echo "active";} ?>'>
                        <i class="nav-icon fas fa-newspaper mr-1"></i><p> Publicaciones</p>
                    </a>
                </li>     
                <li class="nav-item">
                    <a  href="<?php echo base_url()."index.php/controller/ltsProyectos/".$flag.'/'.$message.'/'.$type; ?>" class='nav-link  <?php if($ltspag == "ltsproyectos"){ echo "active";} ?>'>
                        <i class="nav-icon fas fa-puzzle-piece mr-1"></i><p> Proyectos</p>
                    </a>
                </li>     
                <li class="nav-item">
                    <a  href="<?php echo base_url()."index.php/controller/ltsIdioma/".$flag.'/'.$message.'/'.$type; ?>" class='nav-link <?php if($ltspag == "ltsidiomas"){ echo "active";} ?>'>
                        <i class="nav-icon fas fa-language mr-1"></i><p> Idiomas</p>
                    </a>
                </li>     
                <li class="nav-item">
                    <a  href="<?php echo base_url()."index.php/controller/ltsColaboracion/".$flag.'/'.$message.'/'.$type; ?>" class='nav-link <?php if($ltspag == "ltscolaboracion"){ echo "active";} ?>'>
                        <i class="nav-icon fas fa-hands-helping mr-1"></i><p> Colaboraciones</p>
                    </a>
                </li>     
                <li class="nav-item">
                    <a  href="<?php echo base_url()."index.php/controller/ltsAsesorias/".$flag.'/'.$message.'/'.$type; ?>" class='nav-link <?php if($ltspag == "ltsassesorias"){ echo "active";} ?>'>
                        <i class="nav-icon fas fa-user-friends mr-1"></i><p> Asesorías</p>
                    </a>
                </li>     
                <li class="nav-item">
                    <a  href="<?php echo base_url()."index.php/controller/ltsEvento/".$flag.'/'.$message.'/'.$type; ?>" class='nav-link <?php if($ltspag == "ltseventos"){ echo "active";} ?>'>
                        <i class="nav-icon fas fa-calendar-check mr-1"></i><p> Eventos</p>
                    </a>
                </li>     
                <li class="nav-item">
                    <a  href="<?php echo base_url()."index.php/controller/ltsInvestigacion/".$flag.'/'.$message.'/'.$type; ?>" class='nav-link <?php if($ltspag == "ltsinvestigaciones"){ echo "active";} ?>'>
                        <i class="nav-icon fas fa-search mr-1"></i><p> Investigaciones</p>
                    </a>
                </li>     
                <li class="nav-item">
                    <a  href="<?php echo base_url()."index.php/controller/ltsReconocimiento/".$flag.'/'.$message.'/'.$type; ?>" class='nav-link <?php if($ltspag == "ltsreconocimientos"){ echo "active";} ?>'>
                        <i class="nav-icon fas fa-award mr-1"></i><p> Reconocimientos</p>
                    </a>
                </li>     
                <li class="nav-item">
                    <a  href="<?php echo base_url()."index.php/controller/ltsMision/".$flag.'/'.$message.'/'.$type; ?>" class='nav-link <?php if($ltspag == "ltsmisiones"){ echo "active";} ?>'>
                        <i class="nav-icon fas fa-route mr-1"></i><p> Misiones Int.</p>
                    </a>
                </li>     
                <li class="nav-item has-treeview <?php if($ctrlpag == "tic"){ echo "menu-is-opening menu-open";} ?>" >
                    <a  href='' class='nav-link <?php if($ctrlpag == "tic"){ echo "active";} ?>'><i class="nav-icon fas fa-laptop-house"></i><p>TIC<i class="fas fa-angle-left right"></i></p></a>
                    <ul class="nav nav-treeview " style="margin-left:10px;"> 
                        <li class='nav-item'>
                            <a href="<?php echo base_url()."index.php/controller/ltsPC/".$flag.'/'.$message.'/'.$type; ?>" class='nav-link <?php if($ltspag == "ltspc"){ echo "active";} ?>'>
                                <i class='fa fa-list-ol nav-icon'></i>
                                <p>Listar PC</p>
                            </a>
                        </li>
                        <li class='nav-item'>
                            <a href="<?php  echo base_url()."index.php/controller/ltsTelefono/".$flag.'/'.$message.'/'.$type; ?>" class='nav-link <?php if($ltspag == "ltstelefono"){ echo "active";} ?>'>
                                <i class='fa fa-list-ol nav-icon'></i>
                                <p>Listar teléfonos</p>
                            </a>
                        </li>
                        <li class='nav-item'>
                            <a href="<?php echo base_url()."index.php/controller/ltsTablet/".$flag.'/'.$message.'/'.$type; ?>" class='nav-link <?php if($ltspag == "ltstablet"){ echo "active";} ?>'>
                                <i class='fa fa-list-ol nav-icon'></i>
                                <p>Listar tablet</p>
                            </a>
                        </li>
                        <li class='nav-item'>
                            <a href="<?php  echo base_url()."index.php/controller/ltsCorreo/".$flag.'/'.$message.'/'.$type; ?>" class='nav-link <?php if($ltspag == "ltscorreo"){ echo "active";} ?>'>
                                <i class='fa fa-list-ol nav-icon'></i>
                                <p>Listar correos</p>
                            </a>
                        </li>
                    </ul>
                </li> 
                <li class="nav-item">
                    <a  href="<?php echo base_url()."index.php/controller/ltsRedSocial/".$flag.'/'.$message.'/'.$type; ?>" class='nav-link <?php if($ltspag == "ltsredsocial"){ echo "active";} ?>'>
                        <i class="nav-icon fas fa-project-diagram mr-1"></i><p> Redes sociales</p>
                    </a>
                </li> 
                <li class="nav-item has-treeview <?php if($ctrlpag == "atencion"){ echo "menu-is-opening menu-open";} ?>" >
                    <a  href='' class='nav-link <?php if($ctrlpag == "atencion"){ echo "active";} ?>'><i class="nav-icon fab fa-phabricator"></i><p>Atención<i class="fas fa-angle-left right"></i></p></a>
                    <ul class="nav nav-treeview " style="margin-left:10px; "> 
                        <li class='nav-item'>
                            <a href="<?php  echo base_url()."index.php/controller/ltsVivienda/".$flag.'/'.$message.'/'.$type; ?>" class='nav-link <?php if($ltspag == "ltsvivienda"){ echo "active";} ?>'>
                                <i class='fa fa-list-ol nav-icon'></i>
                                <p>Listar viviendas</p>
                            </a>
                        </li>
                        <li class='nav-item'>
                            <a href="<?php  echo base_url()."index.php/controller/ltsTransporte/".$flag.'/'.$message.'/'.$type; ?>" class='nav-link <?php if($ltspag == "ltstransporte"){ echo "active";} ?>'>
                                <i class='fa fa-list-ol nav-icon'></i>
                                <p>Transporte</p>
                            </a>
                        </li>
                    </ul>
                </li> 
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>


