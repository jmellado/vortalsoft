<div class="container_12">
			<div class="grid_12">
				<div class="row">
				      <div class="col-md-2">
				      	    <div class="panel panel-info" >
                                <div class="panel-heading">
                                    <div class="panel-title">Bienvenido ¡</div>
                                </div> 
                                <div style="padding-top:10px" class="panel-body" >
                                	 <div class="form-group">
										     <label> Rol :</label> 
										      <input type="text" class="form-control" disabled value='<?=$this->session->userdata('rol')?>'></input>  
										     <label> Usuario :</label> 
										     <input type="text" class="form-control" disabled value='<?=$this->session->userdata('user')?>'></input>  
										  </div>
								      <hr> </hr>
								      <?=anchor(base_url().'login/logout_ci', 'Cerrar sesión')?>
								   
                                </div>
                            </div>
		 	          </div> <!--/cierre vcol md2-->

				 <div class="col-md-9">

				     
		                <div class="row">

				      	             
												 <div class="panel panel-default">
													  <div class="panel-heading">
													  	 <h1>Gestion Materias <small>Buscar</small></h1>
													  </div>
												  </div>
									          
								<?php //envio de mensajes de error de autenticacion
								if ($this->session->flashdata('ControllerMessage') != '') { ?>
									<div class="alert alert-success">
										<p><?php echo $this->session->flashdata('ControllerMessage'); ?></p>
									</div>
								<?php } ?>
                                
                                 <?php  // recibir por parametro el nombre del diretorio  y el nav que pedendiendo del rol (rolAdmin,rolCliente,rolVendedor)
								        $nav= $nave;
								        $folder_nav= $viewNave;
								       
								 ?>
                                                          <?php 
																		$atributos = array( 'search' => 'form','name'=>'form' ,'class'=>'navbar-form navbar-right' ,'role'=>'search');
																		echo form_open_multipart('materias/search/'.$folder_nav.'/'.$nav,$atributos);
																    ?>
				                                                            	     <label class="control-label">Busqueda por:</label>
				                                                            	     <select name="criterio" id="criterio"   class="form-control">
				                                                                          <option value="id_materia" >Id</option>
				                                                                          <option value="nom_materia" selected >Nombre</option>
				                                                                          <option value="num_creditos" >Creditos</option>
				                                                                          <option value="intensidad_horaria" >Horas</option>
				                                                                          
				                                                            	     </select>

																		 		    <input type="text"  name="valor"  value="<?php echo set_value("valor")?>"  class="form-control" placeholder="Buscar materia">
																		 		    <input type="submit" value="Buscar" title="Buscar materias" class="btn btn-info">
																		 		  
															    	  <?php 
																	   echo form_close();
												                     ?>  
							<div class="panel panel-default">
												   <div class="panel-heading">
													    <a class="glyphicon glyphicon-plus-sign " aria-hidden="true" href="<?php echo base_url()?>materias/add/<?php echo  $folder_nav;?>/<?php echo  $nav;?>"> Nuevo </a>
													   </div>
												  <div class="panel-body">  

                                                                <table class="table table-hover">
																	<tr>
																		<th>Id</th>
																		<th>Nombre</th>
																		<th>Creditos</th>
																		<th>Horas</th>
																		
																		
																		
																	</tr>
																	<?php foreach ($datos as $dato) {?>
																		<tr>
																			<td><?php echo $dato->id_materia;?></td>
																			<td><?php echo $dato->nom_materia;?></td>
																			<td><?php echo $dato->num_creditos;?></td>
																			<td><?php echo $dato->intensidad_horaria; ?></td>
																			
																			<td><a class="glyphicon glyphicon-pencil" aria-hidden="true" href="<?php echo base_url()?>materias/update/<?php echo $dato->id_materia?>/<?php echo  $folder_nav;?>/<?php echo $nav;?>"></a>  <span class="glyphicon glyphicon-option-horizontal"></span>     <a class="glyphicon glyphicon-trash" aria-hidden="true" onclick="if(confirmarEliminar() == false) return false" title="Eliminar Materia" href="<?php echo base_url()?>materias/delete/<?php echo $dato->id_materia?>/<?php echo  $folder_nav;?>/<?php echo  $nav;?>"></a></td>
																		</tr>
																	<?php } ?>
																</table> 

															  
								                  </div>
								</div>
							</div>	

				      </div>  <!--/cierre vcol md9--> 
                </div>
			</div>
</div>	