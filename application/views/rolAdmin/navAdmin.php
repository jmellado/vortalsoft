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
                    $nav='navAdmin';
                    $folder_nav='rolAdmin';
              ?>

            <ul class="nav navbar-nav ">
				<li class="active"><a href="<?php echo base_url()?>admin">Inicio</a></li>				
                <li><a href="<?php echo base_url()?>estudiantes/index/<?php echo  $folder_nav;?>/<?php echo  $nav;?>">Estudiantes</a></li>
                <li><a href="<?php echo base_url()?>profesores/index/<?php echo  $folder_nav;?>/<?php echo  $nav;?>">Profesores</a></li>
                <li><a href="<?php echo base_url()?>materias/index/<?php echo  $folder_nav;?>/<?php echo  $nav;?>">Materias</a></li>
            
				<li class      ="dropdown">
                <a data-toggle ="dropdown" class="dropdown-toggle" href="#">Admin<b class="caret"></b></a>
                <ul role       ="menu" class="dropdown-menu">
                <li><a href    ="#">Vendedores</a></li>
                <li><a href    ="#">Rutas del dia</a></li>
                <li><a href    ="#">Ubicacion Actual</a></li>
                </ul>
                </li>
                <li><a href="<?php echo base_url()?>usuario/index/<?php echo  $folder_nav;?>/<?php echo  $nav;?>">Usuarios</a></li>
            </ul>
        </div>
   </nav>

</section>
<section class="contenedor"> <!--etiqueta contenedor principal que se cierra en el footer del masterPage --> 