<section class="contenedor">
    	<nav role="navigation" class="navbar navbar-default nav-justified">
                    <div class="navbar-header">
                        <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                       
                    </div>
                     <?php 
                              $nav='navEstudiante';
                              $folder_nav='rolEstudiante';
                    ?>

                    <div id="navbarCollapse" class="collapse navbar-collapse nav-justified">
                        <ul class="nav navbar-nav ">
            				<li class="active"><a href="<?php echo base_url()?>estudiante">Inicio</a></li>
            			    <li><a href="<?php echo base_url()?>productos/index/<?php echo  $folder_nav;?>/<?php echo  $nav;?>">Hoja de vida</a></li>
                            <li><a href="<?php echo base_url()?>clientes/index/<?php echo  $folder_nav;?>/<?php echo  $nav;?>">Liquidacion</a></li>
                            <li><a href="<?php echo base_url()?>clientes/index/<?php echo  $folder_nav;?>/<?php echo  $nav;?>">Matricula en linea</a></li>
                            <li><a href="<?php echo base_url()?>clientes/index/<?php echo  $folder_nav;?>/<?php echo  $nav;?>">Consultar matricula</a></li>
                            <li><a href="<?php echo base_url()?>clientes/index/<?php echo  $folder_nav;?>/<?php echo  $nav;?>">Horario</a></li>
                            <li><a href="<?php echo base_url()?>clientes/index/<?php echo  $folder_nav;?>/<?php echo  $nav;?>">Pensum</a></li>
            				    
                            <li class      ="dropdown">
                            <a data-toggle ="dropdown" class="dropdown-toggle" href="#"> Otras Funcionalidades <b class="caret"></b></a>
                            <ul role       ="menu" class="dropdown-menu">
                            <li><a href    ="#">Capacitaciones</a></li>
                            <li><a href    ="#">Deuda de estudiante</a></li>
                            </ul>
                            </li>
                        </ul>
                    </div>
    </nav>

</section>
<section class="contenedor"> <!--etiqueta contenedor principal que se cierra en el footer del masterPage --> 