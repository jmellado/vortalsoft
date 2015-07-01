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
													  	 <h1>Gestion Pensum <small>Detalles</small></h1>
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
                                                        
						              <div class="panel panel-default">
                                                  <?php $semestre ="1";?>
                                                  <div class="panel-heading">
													   <large> Semestre <?php echo $semestre;?></large>  
												   </div>
												  <div class="panel-body">  
                                                         <table class="table table-hover">
																	<tr>
																		<th>Id Materia</th>
																		<th>Materia</th>
																		<th>Creditos</th>
																		<th>IH</th>
																	</tr>
																	<?php foreach ($semestre1 as $dato) {?>
																		<tr>
																			<td><?php echo $dato->id_materia;?></td>
																			<td><?php echo $dato->nom_materia;?></td>
																			<td><?php echo $dato->num_creditos;?></td>
																			<td><?php echo $dato->intensidad_horaria; ?></td>
																		</tr>
																	<?php } ?>
													      </table> 
										          </div>
								       </div>

								       <div class="panel panel-default">
                                                  <?php $semestre ="2";?>
                                                  <div class="panel-heading">
													   <large> Semestre <?php echo $semestre;?></large>  
												   </div>
												  <div class="panel-body">  
                                                         <table class="table table-hover">
																	<tr>
																		<th>Id Materia</th>
																		<th>Materia</th>
																		<th>Creditos</th>
																		<th>IH</th>
																	</tr>
																	<?php foreach ($semestre2 as $dato) {?>
																		<tr>
																			<td><?php echo $dato->id_materia;?></td>
																			<td><?php echo $dato->nom_materia;?></td>
																			<td><?php echo $dato->num_creditos;?></td>
																			<td><?php echo $dato->intensidad_horaria; ?></td>
																		</tr>
																	<?php } ?>
													      </table> 
										          </div>
								       </div>
								       <div class="panel panel-default">
                                                  <?php $semestre ="3";?>
                                                  <div class="panel-heading">
													   <large> Semestre <?php echo $semestre;?></large>  
												   </div>
												  <div class="panel-body">  
                                                         <table class="table table-hover">
																	<tr>
																		<th>Id Materia</th>
																		<th>Materia</th>
																		<th>Creditos</th>
																		<th>IH</th>
																	</tr>
																	<?php foreach ($semestre3 as $dato) {?>
																		<tr>
																			<td><?php echo $dato->id_materia;?></td>
																			<td><?php echo $dato->nom_materia;?></td>
																			<td><?php echo $dato->num_creditos;?></td>
																			<td><?php echo $dato->intensidad_horaria; ?></td>
																		</tr>
																	<?php } ?>
													      </table> 
										          </div>
								       </div>
								       <div class="panel panel-default">
                                                  <?php $semestre ="4";?>
                                                  <div class="panel-heading">
													   <large> Semestre <?php echo $semestre;?></large>  
												   </div>
												  <div class="panel-body">  
                                                         <table class="table table-hover">
																	<tr>
																		<th>Id Materia</th>
																		<th>Materia</th>
																		<th>Creditos</th>
																		<th>IH</th>
																	</tr>
																	<?php foreach ($semestre4 as $dato) {?>
																		<tr>
																			<td><?php echo $dato->id_materia;?></td>
																			<td><?php echo $dato->nom_materia;?></td>
																			<td><?php echo $dato->num_creditos;?></td>
																			<td><?php echo $dato->intensidad_horaria; ?></td>
																		</tr>
																	<?php } ?>
													      </table> 
										          </div>
								       </div>
								       <div class="panel panel-default">
                                                  <?php $semestre ="5";?>
                                                  <div class="panel-heading">
													   <large> Semestre <?php echo $semestre;?></large>  
												   </div>
												  <div class="panel-body">  
                                                         <table class="table table-hover">
																	<tr>
																		<th>Id Materia</th>
																		<th>Materia</th>
																		<th>Creditos</th>
																		<th>IH</th>
																	</tr>
																	<?php foreach ($semestre5 as $dato) {?>
																		<tr>
																			<td><?php echo $dato->id_materia;?></td>
																			<td><?php echo $dato->nom_materia;?></td>
																			<td><?php echo $dato->num_creditos;?></td>
																			<td><?php echo $dato->intensidad_horaria; ?></td>
																		</tr>
																	<?php } ?>
													      </table> 
										          </div>
								       </div>
								       <div class="panel panel-default">
                                                  <?php $semestre ="6";?>
                                                  <div class="panel-heading">
													   <large> Semestre <?php echo $semestre;?></large>  
												   </div>
												  <div class="panel-body">  
                                                         <table class="table table-hover">
																	<tr>
																		<th>Id Materia</th>
																		<th>Materia</th>
																		<th>Creditos</th>
																		<th>IH</th>
																	</tr>
																	<?php foreach ($semestre6 as $dato) {?>
																		<tr>
																			<td><?php echo $dato->id_materia;?></td>
																			<td><?php echo $dato->nom_materia;?></td>
																			<td><?php echo $dato->num_creditos;?></td>
																			<td><?php echo $dato->intensidad_horaria; ?></td>
																		</tr>
																	<?php } ?>
													      </table> 
										          </div>
								       </div>
								       <div class="panel panel-default">
                                                  <?php $semestre ="7";?>
                                                  <div class="panel-heading">
													   <large> Semestre <?php echo $semestre;?></large>  
												   </div>
												  <div class="panel-body">  
                                                         <table class="table table-hover">
																	<tr>
																		<th>Id Materia</th>
																		<th>Materia</th>
																		<th>Creditos</th>
																		<th>IH</th>
																	</tr>
																	<?php foreach ($semestre7 as $dato) {?>
																		<tr>
																			<td><?php echo $dato->id_materia;?></td>
																			<td><?php echo $dato->nom_materia;?></td>
																			<td><?php echo $dato->num_creditos;?></td>
																			<td><?php echo $dato->intensidad_horaria; ?></td>
																		</tr>
																	<?php } ?>
													      </table> 
										          </div>
								       </div>
								       <div class="panel panel-default">
                                                  <?php $semestre ="8";?>
                                                  <div class="panel-heading">
													   <large> Semestre <?php echo $semestre;?></large>  
												   </div>
												  <div class="panel-body">  
                                                         <table class="table table-hover">
																	<tr>
																		<th>Id Materia</th>
																		<th>Materia</th>
																		<th>Creditos</th>
																		<th>IH</th>
																	</tr>
																	<?php foreach ($semestre8 as $dato) {?>
																		<tr>
																			<td><?php echo $dato->id_materia;?></td>
																			<td><?php echo $dato->nom_materia;?></td>
																			<td><?php echo $dato->num_creditos;?></td>
																			<td><?php echo $dato->intensidad_horaria; ?></td>
																		</tr>
																	<?php } ?>
													      </table> 
										          </div>
								       </div>
								       <div class="panel panel-default">
                                                  <?php $semestre ="9";?>
                                                  <div class="panel-heading">
													   <large> Semestre <?php echo $semestre;?></large>  
												   </div>
												  <div class="panel-body">  
                                                         <table class="table table-hover">
																	<tr>
																		<th>Id Materia</th>
																		<th>Materia</th>
																		<th>Creditos</th>
																		<th>IH</th>
																	</tr>
																	<?php foreach ($semestre9 as $dato) {?>
																		<tr>
																			<td><?php echo $dato->id_materia;?></td>
																			<td><?php echo $dato->nom_materia;?></td>
																			<td><?php echo $dato->num_creditos;?></td>
																			<td><?php echo $dato->intensidad_horaria; ?></td>
																		</tr>
																	<?php } ?>
													      </table> 
										          </div>
								       </div>
								       <div class="panel panel-default">
                                                  <?php $semestre ="10";?>
                                                  <div class="panel-heading">
													   <large> Semestre <?php echo $semestre;?></large>  
												   </div>
												  <div class="panel-body">  
                                                         <table class="table table-hover">
																	<tr>
																		<th>Id Materia</th>
																		<th>Materia</th>
																		<th>Creditos</th>
																		<th>IH</th>
																	</tr>
																	<?php foreach ($semestre10 as $dato) {?>
																		<tr>
																			<td><?php echo $dato->id_materia;?></td>
																			<td><?php echo $dato->nom_materia;?></td>
																			<td><?php echo $dato->num_creditos;?></td>
																			<td><?php echo $dato->intensidad_horaria; ?></td>
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