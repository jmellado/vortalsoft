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
                <div id="navbarCollapse" class="collapse navbar-collapse nav-justified">


                <?php 
                    $nav='navProfesor';
                    $folder_nav='rolProfesor';
                    $id_personal= $this->session->userdata('id_personal');
                    
              ?>
                    <ul class="nav navbar-nav ">
        				<li class="active"><a href="<?php echo base_url()?>profesor">Inicio</a></li>
        				<li><a href="###">Seguimiento</a></li>
                        <li><a href="<?php echo base_url()?>cargas_academicas/index.php">Horario</a></li>
                        <li><a href="<?php echo base_url()?>cargas_academicas/detalles/<?php echo $id_personal?>/<?php echo  $folder_nav;?>/<?php echo  $nav;?>">Carga Academica</a></li>
                        <li><a href="###">Reportes</a></li>
        			    <li><a href="#">Academia</a></li> 
                        <li class      ="dropdown">
                        <a data-toggle ="dropdown" class="dropdown-toggle" href="#">Acerca de <b class="caret"></b></a>
                        <ul role       ="menu" class="dropdown-menu">
                        <li><a href    ="#">Mision</a></li>
                        <li><a href    ="#">Vision</a></li>
                        <li><a href    ="#">Historia</a></li>
                        </ul>
                        </li>
                    </ul>
                </div>
        </nav>
</section>
<section class="contenedor"> <!--etiqueta contenedor principal que se cierra en el footer del masterPage --> 