

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
													  	 <h1>Gestion Pensum <small>Agregar</small></h1>
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
																		        <label class="control-label col-xs-4">Id Pensum (*):</label>
																		        <div class="col-xs-4">
																		            <input type="text" name="id_pensum" placeholder="id pensum"class="form-control" value="<?php echo set_value("id_pensum")?>">
																		        </div>
																		        <div class="col-xs-4">
																		            <span class="help-block"><?php echo form_error('id_pensum'); ?></span>
                                                                               </div>
																		    </div>

																		      <div class="form-group">
																		        <label class="control-label col-xs-4">Progama(*):</label>
																		        <div class="col-xs-4">
                                                                                

																				       <select name="id_programa" id="id_programa"   class="form-control">
																						 <?php
																							//obtengo todas de categoria
																							
																								foreach($programas as $fila)
																								{
																						  ?>
																							     <option value="<?=$fila -> id_programa ?>"><?=$fila -> nom_programa ?></option>
																						  <?php
																							    }
																					      ?>		
																						</select>

																		        </div>
																		        <div class="col-xs-4">
																		            <span class="help-block"><?php echo form_error('id_programa'); ?></span>
                                                                               </div>
																		    </div>

																		     <div class="form-group">
																		        <label class="control-label col-xs-4">Materias (*):</label>
																		        <div class="col-xs-4">
                                                                                

																				       <select name="id_materia" id="id_materia"   class="form-control">
																						 <?php
																							//obtengo todas de categoria
																							
																								foreach($materias as $fila)
																								{
																						  ?>
																							     <option value="<?=$fila -> id_materia ?>"><?=$fila -> nom_materia ?></option>
																						  <?php
																							    }
																					      ?>		
																						</select>

																		        </div>
																		        <div class="col-xs-4">
																		            <span class="help-block"><?php echo form_error('id_materia'); ?></span>
                                                                               </div>
																		    </div>

																		    <div class="form-group">
																		        <label class="control-label col-xs-4">Semestre(*):</label>
																		        <div class="col-xs-4">
                                                                                

																				       <select name="semestre" id="semestre"   class="form-control">
																						  
																						   <option value="1">1</option>
																						    <option value="2">2</option>
																						    <option value="3">3</option>
																						    <option value="4">4</option>
																						    <option value="5">5</option>
																						    <option value="6">6</option>
																						    <option value="7">7</option>
																						    <option value="8">8</option>
																						    <option value="9">9</option>
																						    <option value="10">10</option>
																						   
																					</select>

																		        </div>
																		        <div class="col-xs-4">
																		            <span class="help-block"><?php echo form_error('semestre'); ?></span>
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
																						        	  <input type="submit" value="Guardar" title="Guardar nuevo pensum" class="btn btn-success">
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

