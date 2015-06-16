  <div class="panel panel-info" >
			  <div class="panel-heading">
                     <h3>Bienvenido de nuevo <?=$this->session->userdata('perfil')?></h3>
				     <h3>Usuario: <?=$this->session->userdata('username')?></h3>
				     <?=anchor(base_url().'login/logout_ci', 'Cerrar sesión')?>
              </div>       
       </div>  


<h1>Gestion de Materias</h1>

<?php if ($this->session->flashdata('ControllerMessage') != '') { ?>
	<div class="alert alert-success">
		<p><?php echo $this->session->flashdata('ControllerMessage'); ?></p>
	</div>
<?php } ?>

<p>
	<a href="<?php echo base_url()?>materias/add">Agregar Nueva Materia</a>
</p>

<table class="table table-hover">
	<tr>
		<th>Id</th>
		<th>Nombre Materia</th>
		<th>Numero Creditos</th>
		<th>Intensidad Horaria</th>
		
		
		
	</tr>
	<?php foreach ($datos as $dato) {?>
		<tr>
			<td><?php echo $dato->id_materia;?></td>
			<td><?php echo $dato->nom_materia;?></td>
			<td><?php echo $dato->num_creditos;?></td>
			<td><?php echo $dato->intensidad_horaria; ?></td>
			<!--<td><?php echo $dato->fecha_nacimiento; ?></td>
			<td><?php echo $dato->direccion; ?></td>
			<td><?php echo $dato->correo; ?></td>
			<td><?php echo $dato->telefono; ?></td>-->
			<td><a href="<?php echo base_url()?>materias/update/<?php echo $dato->id_materia?>">Editar</a> || <a href="<?php echo base_url()?>materias/delete/<?php echo $dato->id_materia?>">Eliminar</a></td>
		</tr>
	<?php } ?>
</table> 