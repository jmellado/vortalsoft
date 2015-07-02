<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pensum extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pensum_model');
		$this->load->model('pensum_mate_model');
		$this->load->model('programas_model');
		$this->load->model('materias_model');
		
	}

	public function index($folder_nav=null,$nav=null)
	{
		
		$data['titulo']				=               'Vortalsoft';
		$data['viewControlador']	=		            'pensum';
		$data['viewNave']	        =                $folder_nav;
		$data['nave']		    	=		                $nav;
		$data['contenido']			=		             'index';	
		$data['datos']				= $this->pensum_model->getPensumsJoin();
		$this->load->view('masterPage/masterPage', $data);
	}

	public function detalles($id_pensum=null,$folder_nav=null,$nav=null)
	{
		
		$data['titulo']				=               'Vortalsoft';
		$data['viewControlador']	=		            'pensum';
		$data['viewNave']	        =                $folder_nav;
		$data['nave']		    	=		                $nav;
		$data['contenido']			=		          'detalles';	
		$data['semestre1']				= $this->pensum_mate_model->getPensum_mateJoin($id_pensum,"1");
		$data['semestre2']				= $this->pensum_mate_model->getPensum_mateJoin($id_pensum,"2");
		$data['semestre3']				= $this->pensum_mate_model->getPensum_mateJoin($id_pensum,"3");
		$data['semestre4']				= $this->pensum_mate_model->getPensum_mateJoin($id_pensum,"4");
		$data['semestre5']				= $this->pensum_mate_model->getPensum_mateJoin($id_pensum,"5");
		$data['semestre6']				= $this->pensum_mate_model->getPensum_mateJoin($id_pensum,"6");
		$data['semestre7']				= $this->pensum_mate_model->getPensum_mateJoin($id_pensum,"7");
		$data['semestre8']				= $this->pensum_mate_model->getPensum_mateJoin($id_pensum,"8");
		$data['semestre9']				= $this->pensum_mate_model->getPensum_mateJoin($id_pensum,"9");
		$data['semestre10']				= $this->pensum_mate_model->getPensum_mateJoin($id_pensum,"10");

		$this->load->view('masterPage/masterPage', $data);
	}


	public function add($folder_nav=null,$nav=null)
	{
		
		if ($this->input->post()) { //pregunto si me llegaron datos del formulario
			
              
			    $this->form_validation->set_message('required', 'campo  obligatorio');
				$this->form_validation->set_message('integer', 'Campo debe poseer solo numeros');
				$this->form_validation->set_message('numeric', 'Campo  debe poseer solo numeros');
				$this->form_validation->set_message('is_unique', 'Campo ya registrado');
				$this->form_validation->set_message('max_length', 'Campo  debe tener un Maximo de %d Caracteres');
				$this->form_validation->set_error_delimiters('<span>','</span>');

		if ($this->form_validation->run('vali_Pensum_varios')) { //ejecuto el archivo de form_validation
				
				
				 $datos_pemsum =array(
					'id_pensum'        =>$this->input->post("id_pensum"),
					'id_programa'      =>$this->input->post("id_programa")
					
					         );

                     $id = $this->input->post("id_pensum");
                     $validar= $this->pensum_model->validarExistenciaPensumId($id);
                     
                     if ($validar == true) {

									for ($i=1; $i < 10 ; $i++) { 
								     		$materias_sele = $this->input->post("semestre".$i);

										    foreach ($materias_sele as $mate) {

										    	 $datos_pensum_mate=array(
																		'id_pensum'       =>$this->input->post("id_pensum"),
																		'id_materia'      =>$mate,
																		'semestre'        =>$i 	
																		);
						                      $consulta_pensum_mate = $this->pensum_mate_model->insertPensum_mate($datos_pensum_mate);
										    }
								    }

						
						if ( $consulta_pensum_mate  == true) 
						{
							$this->session->set_flashdata('ControllerMessage','Se Ha Guardado Correctamente');
							redirect(base_url().'pensum/add/'.$folder_nav.'/'.$nav,301);
							
						} else {
							$this->session->set_flashdata('ControllerMessage','Se ha Producido un Error Intentelo Nuevamente 1');
							redirect(base_url().'pensum/add/'.$folder_nav.'/'.$nav,301);
						}		
				    } 
				    else 
				    {

				    	$consulta_pensum = $this->pensum_model->insertPensum($datos_pemsum);
									
							  for ($i=1; $i < 10 ; $i++) { 
								     		$materias_sele = $this->input->post("semestre".$i);

										    foreach ($materias_sele as $mate) {

										    	 $datos_pensum_mate=array(
																		'id_pensum'       =>$this->input->post("id_pensum"),
																		'id_materia'      =>$mate,
																		'semestre'        =>$i 	
																		);
						                      $consulta_pensum_mate = $this->pensum_mate_model->insertPensum_mate($datos_pensum_mate);
										    }
								    }

						
						if ($consulta_pensum == true && $consulta_pensum_mate  == true) 
						{
							$this->session->set_flashdata('ControllerMessage','Se Ha Guardado Correctamente');
							redirect(base_url().'pensum/add/'.$folder_nav.'/'.$nav,301);
							
						} else {
							$this->session->set_flashdata('ControllerMessage','Se ha Producido un Error Intentelo Nuevamente 2 ');
							redirect(base_url().'pensum/add/'.$folder_nav.'/'.$nav,301);
						}


	    	        }

		  }
	    }
	    
		$data['titulo']				=               'Vortalsoft';
		$data['viewControlador']	=		            'pensum';
		$data['viewNave']	        =                $folder_nav;
		$data['nave']		    	=		                $nav;
		$data['contenido']			=		               'add';	
		$data['programas']		    =		$this->programas_model->getProgramas();
		$data['datos']		        =		$this->materias_model->getMaterias();

		$this->load->view('masterPage/masterPage', $data, FALSE);
	}


	public function add_individual($folder_nav=null,$nav=null)
	{
		
		if ($this->input->post()) { //pregunto si me llegaron datos del formulario
			
              
			    $this->form_validation->set_message('required', 'campo  obligatorio');
				$this->form_validation->set_message('integer', 'Campo debe poseer solo numeros');
				$this->form_validation->set_message('numeric', 'Campo  debe poseer solo numeros');
				$this->form_validation->set_message('is_unique', 'Campo ya registrado');
				$this->form_validation->set_message('max_length', 'Campo  debe tener un Maximo de %d Caracteres');
				$this->form_validation->set_error_delimiters('<span>','</span>');

		if ($this->form_validation->run('vali_Pensum')) { //ejecuto el archivo de form_validation
				
				
				 $datos_pemsum =array(
					'id_pensum'        =>$this->input->post("id_pensum"),
					'id_programa'      =>$this->input->post("id_programa")
					
					         );

				 $datos_pensum_mate=array(
					'id_pensum'       =>$this->input->post("id_pensum"),
					'id_materia'      =>$this->input->post("id_materia"),
					'semestre'        =>$this->input->post("semestre")	
					);

				
                     $id = $this->input->post("id_pensum");
                     $validar= $this->pensum_model->validarExistenciaPensumId($id);

                    if ($validar == true) {

						$consulta_pensum_mate = $this->pensum_mate_model->insertPensum_mate($datos_pensum_mate);
						
						if ( $consulta_pensum_mate  == true) 
						{
							$this->session->set_flashdata('ControllerMessage','Se Ha Guardado Correctamente');
							redirect(base_url().'pensum/add_individual/'.$folder_nav.'/'.$nav,301);
							
						} else {
							$this->session->set_flashdata('ControllerMessage','Se ha Producido un Error Intentelo Nuevamente');
							redirect(base_url().'pensum/add_individual/'.$folder_nav.'/'.$nav,301);
						}		
				    } 
				    else 
				    {
				    	$consulta_pensum = $this->pensum_model->insertPensum($datos_pemsum);
						$consulta_pensum_mate = $this->pensum_mate_model->insertPensum_mate($datos_pensum_mate);
						
						if ($consulta_pensum == true && $consulta_pensum_mate  == true) 
						{
							$this->session->set_flashdata('ControllerMessage','Se Ha Guardado Correctamente');
							redirect(base_url().'pensum/add_individual/'.$folder_nav.'/'.$nav,301);
							
						} else {
							$this->session->set_flashdata('ControllerMessage','Se ha Producido un Error Intentelo Nuevamente');
							redirect(base_url().'pensum/add_individual/'.$folder_nav.'/'.$nav,301);
						}


	    	        }

		  }
	    }
	    
		$data['titulo']				=               'Vortalsoft';
		$data['viewControlador']	=		            'pensum';
		$data['viewNave']	        =                $folder_nav;
		$data['nave']		    	=		                $nav;
		$data['contenido']			=		    'add_individual';	
		$data['programas']		    =		$this->programas_model->getProgramas();
		$data['materias']		    =		$this->materias_model->getMaterias();

		$this->load->view('masterPage/masterPage', $data, FALSE);
	}

	public function update($id=null,$folder_nav=null,$nav=null)
	{

		if ($this->input->post()) { //pregunto si me llegaron datos del formulario
			   
			    $this->form_validation->set_message('required', 'campo  obligatorio');
				$this->form_validation->set_message('integer', 'Campo debe poseer solo numeros');
				$this->form_validation->set_message('numeric', 'Campo  debe poseer solo numeros');
				$this->form_validation->set_message('is_unique', 'Campo ya registrado');
				$this->form_validation->set_message('max_length', 'Campo  debe tener un Maximo de %d Caracteres');
				$this->form_validation->set_error_delimiters('<span>','</span>');


		  if ($this->form_validation->run('vali_estudiantes')) { //ejecuto el archivo de form_validation
				

				$datos=array(
					'id_estudiante'       =>$this->input->post("id"),
					'nom_estudiante'      =>$this->input->post("nombre"),
					'ape_estudiante'      =>$this->input->post("apellido"),
					'sexo'                =>$this->input->post("sexo"),
					'fecha_nacimiento'    =>$this->input->post("fecha"),
					'direccion'           =>$this->input->post("direccion"),
					'correo'              =>$this->input->post("correo"),
					'telefono'            =>$this->input->post("telefono"),
					
					
					);

				$guardar= $this->estudiantes_model->updateEstudiantes($datos,$id);
				
				if ($guardar == true) {
					$this->session->set_flashdata('ControllerMessage','Se Ha Guardado Correctamente');
					redirect(base_url().'estudiantes/index/'.$folder_nav.'/'.$nav,301);
				} else {
					$this->session->set_flashdata('ControllerMessage','Se ha Producido un Error Intentelo Nuevamente');
					redirect(base_url().'estudiantes/index/'.$folder_nav.'/'.$nav,301);
				}
				
			}

		}
		$data['titulo']				=               'Vortalsoft';
		$data['viewControlador']	=		            'pensum';
		$data['viewNave']	        =                $folder_nav;
		$data['nave']		    	=		                $nav;
		$data['contenido']			=		            'update';	
		$data['datos']				=		$this->pensum_model->getPensumId($id);
		$this->load->view('masterPage/masterPage', $data, FALSE);
	}

	public function delete($id=null,$folder_nav=null,$nav=null)
	{
		$consulta_pensum_mate= $this->pensum_mate_model->deletePensum_mate($id);
		$consulta_pensum= $this->pensum_model->deletePensum($id);
				
		if ($consulta_pensum_mate == true && $consulta_pensum == true) {
			$this->session->set_flashdata('ControllerMessage','Se ha Eliminado Correctamente');
			redirect(base_url().'pensum/index/'.$folder_nav.'/'.$nav,301);
		} else {
			$this->session->set_flashdata('ControllerMessage','Se ha Producido un Error Intentelo Nuevamente');
			redirect(base_url().'pensum/index/'.$folder_nav.'/'.$nav,301);
		}
		$data['titulo']				=               'Vortalsoft';
		$data['viewControlador']	=		            'pensum';
		$data['viewNave']	        =                $folder_nav;
		$data['nave']		    	=		                $nav;
		$data['contenido']			=		            'delete';	
		$this->load->view('masterPage/masterPage', $data, FALSE);
	}

		public function search($folder_nav=null,$nav=null)   
       {

		
	    $criterio                     =  $this->input->post("criterio");
	    $valor                        =     $this->input->post("valor");
		$data['titulo']				  =                    'Vortalsoft';
		$data['viewControlador']	  =		                   'pensum';
		$data['viewNave']	          =                     $folder_nav;
		$data['nave']		    	  =		                       $nav;
		$data['contenido']			  =		                   'search';
		$data['datos']				  =		$this->pensum_model->searchPensums($criterio,$valor);
      
		$this->load->view('masterPage/masterPage', $data);
		
	}




}
