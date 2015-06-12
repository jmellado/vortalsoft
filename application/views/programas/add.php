

 <div class="container_12">
			<div class="grid_12">
				<div class="row">
				      <div class="col-md-2">
				      	     <div class="panel panel-info" >
	                                <div class="panel-heading">
	                                    <div class="panel-title">Bienvenido !</div>
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
		 	          </div>

				      <div class="col-md-9">  <!--/ abre contenido --> 


				      	<div class="row">
												  <div class="panel panel-default">
													  <div class="panel-heading">
													  	 <h1>Gestion Programas <small>Agregar</small></h1>
													  </div>
												  </div>
									  
											  

								<div class="panel panel-default">
									      <div class="panel-heading">
										              
							 			  </div>
								          <div class="panel-body">  

								          	                  	<?php 
																	$atributos = array( 'id' => 'form','name'=>'form' ,'class'=>'form-horizontal');
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
																		        <label class="control-label col-xs-4">Id Programa (*):</label>
																		        <div class="col-xs-4">
																		            <input type="text" name="id_programa" placeholder="id programa"class="form-control" value="<?php echo set_value("id_programa")?>">
																		        </div>
																		        <div class="col-xs-4">
																		            <span class="help-block"><?php echo form_error('id_programa'); ?></span>
                                                                               </div>
																		    </div>
                                                                            <div class="form-group">
																		        <label class="control-label col-xs-4">Nombre (*):</label>
																		        <div class="col-xs-4">
																		          <input type="text" name="nom_programa" class="form-control" placeholder="nombre" value="<?php echo set_value("nom_programa")?>">
																		        </div>
																		        <div class="col-xs-4">
																		            <span class="help-block"><?php echo form_error('nom_programa'); ?></span>
                                                                               </div>
																		    </div>
																		    <div class="form-group">
																		        <label class="control-label col-xs-4">Jefe (*):</label>
																		        <div class="col-xs-4">
																		          <input type="text" name="jefe_programa" class="form-control" placeholder="jefe" value="<?php echo set_value("jefe_programa")?>">
																		        </div>
																		        <div class="col-xs-4">
																		            <span class="help-block"><?php echo form_error('jefe_programa'); ?></span>
                                                                               </div>
																		    </div>


																		     <div class="form-group">
																		        <label class="control-label col-xs-4">Decanatura (*):</label>
																		        <div class="col-xs-4">
                                                                                

																				       <select name="id_decanatura" id="id_decanatura"   class="form-control">
																						 <?php
																							//obtengo todas de categoria
																							
																								foreach($decanaturas as $fila)
																								{
																						  ?>
																							<option value="<?=$fila -> id_decanatura ?>"><?=$fila -> nom_decanatura ?></option>
																						  <?php
																							    }
																					      ?>		
																						</select>

																		        </div>
																		        <div class="col-xs-4">
																		            <span class="help-block"><?php echo form_error('id_decanatura'); ?></span>
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
																			        	  <input type="submit" value="Guardar" title="Guardar nuevo programa" class="btn btn-success">
																			       </div>
																			    </div>

                                                                         <?php 
															 	         echo form_close();
													                     ?>  
                            </div>

                                                		  
								           </div>
								</div>
						
                          </div>

				      </div> <!--/ cierre contenido --> 
                </div>
			</div>
</div>	

