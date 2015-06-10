
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
													  	 <h1>Gestion Estudiantes <small>Actualizar</small></h1>
													  </div>
												  </div>
									  
								
								<div class="panel panel-default">
									      <div class="panel-heading">
										              
							 			  </div>
								          <div class="panel-body">  

								          	                  	<?php 
																	$atributos = array('estudiantes' => 'form','name'=>'form' ,'class'=>'form-horizontal');
																	echo form_open_multipart(null,$atributos);
															    ?>
																			<?php if ($this->session->flashdata('ControllerMessage') != '') { ?>
																				<div class="alert alert-success">
																					<p><?php echo $this->session->flashdata('ControllerMessage'); ?></p>
																				</div>
																			<?php } ?>


																 <?php  // recibir por parametro el nombre del diretorio  y el nav que pedendiendo del rol (rolAdmin,rolCliente,rolVendedor)
																       $nav= $nave;
																       $folder_nav= $viewNave;
																 ?>
		
                                                          <div class="row">
															     	   <form class="form-horizontal">
							
																		</form>

	                                                               
																	       <div class="form-group">
																		        <label class="control-label col-xs-4">Id Estudiante (*):</label>
																		        <div class="col-xs-4">
																		         <input type="text" name="id" placeholder="id estudiante" class="form-control" value="<?php echo $datos->id_estudiante?>">
																		        </div>
																		        <div class="col-xs-4">
																		            <span class="help-block"><?php echo form_error('id_producto'); ?></span>
                                                                               </div>
																		    </div>
                                                                            <div class="form-group">
																		        <label class="control-label col-xs-4">Nombre (*):</label>
																		        <div class="col-xs-4">
																		          <input type="text" name="nombre" placeholder="nombre" class="form-control" value="<?php echo $datos->nom_estudiante?>">
																		        </div>
																		        <div class="col-xs-4">
																		            <span class="help-block"><?php echo form_error('nombre'); ?></span>
                                                                               </div>
																		    </div>

																		     <div class="form-group">
																		        <label class="control-label col-xs-4">Apellidos (*):</label>
																		        <div class="col-xs-4">
																		         <input type="text" name="apellido" placeholder="apellidos" class="form-control" value="<?php echo $datos->ape_estudiante?>">
																		        </div>
																		         <div class="col-xs-4">
																		            <span class="help-block"><?php echo form_error('apellido'); ?></span>
                                                                               </div>
																		    </div>

																		     <div class="form-group">
																		        <label class="control-label col-xs-4">Correo (*):</label>
																		        <div class="col-xs-4">
																		        <input type="email" name="correo"  placeholder="correo" class="form-control" value="<?php echo $datos->correo?>">
																		        </div>
																		         <div class="col-xs-4">
																		            <span class="help-block"><?php echo form_error('correo'); ?></span>
                                                                               </div>
																		    </div>

																		     <div class="form-group">
																		        <label class="control-label col-xs-4">Direccion (*)</label>
																		        <div class="col-xs-4">
																		        <input type="text" name="direccion" placeholder="direccion" class="form-control" value="<?php echo $datos->direccion?>">
																		        </div>
																		         <div class="col-xs-4">
																		            <span class="help-block"><?php echo form_error('direccion'); ?></span>
                                                                               </div>
																		    </div>

																		   

																		     <div class="form-group">
																		        <label class="control-label col-xs-4" >Telefono (*):</label>
																		        <div class="col-xs-4">
																		        <input type="text" name="telefono" placeholder="telefono" class="form-control" value="<?php echo $datos->telefono?>">
																		        </div>
                                                                                <div class="col-xs-4">
																		            <span class="help-block"><?php echo form_error('telefono'); ?></span>
                                                                               </div>
																		    </div>


																		     <div class="form-group">
																		        <label class="control-label col-xs-4">Fecha Nacimiento (*)</label>
																		        <div class="col-xs-4">
																		            <input type="date" name="fecha" class="form-control" value="<?php echo $datos->fecha_nacimiento?>">
																		        </div>
																		         <div class="col-xs-4">
																		            <span class="help-block"><?php echo form_error('fecha'); ?></span>
                                                                               </div>
																		    </div>

																		      <div class="form-group">
																		        <label class="control-label col-xs-4">Sexo (*):</label>
																		        <div class="col-xs-4">
                                                                                    <select name="sexo" id="sexo" class="form-control">
																						<option value="0">Seleccionar</option>
																						<option value="m">Masculino</option>
																						<option value="f">Femenino</option>	
																					</select>

																		        </div>
																		        <div class="col-xs-4">
																		            <span class="help-block"><?php echo form_error('sexo'); ?></span>
                                                                               </div>
																		    </div>

																			    <div class="form-group">
																			        <div class="col-xs-offset-1 col-xs-10">
																			        	
																			        	   
																						  <div class="alert alert-info">
																							 <strong>Observaciones!</strong> Los Campos con (*) deben llenarse obligatoriamente
																			              </div>
																			        </div>
																			    </div>
																			    <div class="form-group">
																			        <div class="col-xs-offset-4 col-xs-5">
																			        	  <input type="submit" value="Guardar Cambios" title="Guardar Cambios" class="btn btn-success">
																			       </div>
																			    </div>


                                                                         <?php 
															 	         echo form_close();
													                     ?>  

                                                                
	                                                                 

                      </div>

                                                		  
								           </div>
								</div>
						
                          </div>
				    </div>  <!--/cierre vcol md9--> 
				      
                </div>
			</div>
</div>

 