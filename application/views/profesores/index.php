  <div class="panel panel-info" >
			  <div class="panel-heading">
                     <h3>Bienvenido de nuevo <?=$this->session->userdata('perfil')?></h3>
				     <h3>Usuario: <?=$this->session->userdata('username')?></h3>
				     <?=anchor(base_url().'login/logout_ci', 'Cerrar sesión')?>
              </div>       
       </div>  

<h1>Gestion de Profesores</h1>

<?php if ($this->session->flashdata('ControllerMessage') != '') { ?>
	<div class="alert alert-success">
		<p><?php echo $this->session->flashdata('ControllerMessage'); ?></p>
	</div>
<?php } ?>

<p>
	<a href="<?php echo base_url()?>profesores/add">Agregar Nuevo Profesor</a>
</p>

<table class="table table-hover">
	<tr>
		<th>Id</th>
		<th>Nombre Completo</th>
		<th>Apellidos</th>
		<th>Sexo</th>
		<th>Fecha Nacimiento</th>
		<th>Direccion</th>
		<th>Correo</th>
		<th>Telefono</th>
		
		
	</tr>
	<?php foreach ($datos as $dato) {?>
		<tr>
			<td><?php echo $dato->id_profesor;?></td>
			<td><?php echo $dato->nom_profesor;?></td>
			<td><?php echo $dato->ape_profesor;?></td>
			<td><?php echo $dato->sexo; ?></td>
			<td><?php echo $dato->fecha_nacimiento; ?></td>
			<td><?php echo $dato->direccion; ?></td>
			<td><?php echo $dato->correo; ?></td>
			<td><?php echo $dato->telefono; ?></td>
			<td><a href="<?php echo base_url()?>profesores/update/<?php echo $dato->id_profesor?>">Editar</a> || <a href="<?php echo base_url()?>profesores/delete/<?php echo $dato->id_profesor?>">Eliminar</a></td>
		</tr>
	<?php } ?>
</table> 