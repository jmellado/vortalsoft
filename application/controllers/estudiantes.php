<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Estudiantes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('estudiantes_model');
	}

	public function index($folder_nav=null,$nav=null)
	{
		
		$data['titulo']				=               'Vortalsoft';
		$data['viewControlador']	=		       'estudiantes';
		$data['viewNave']	        =                $folder_nav;
		$data['nave']		    	=		                $nav;
		$data['contenido']			=		             'index';	
		$data['datos']				=		$this->estudiantes_model->getEstudiantes();
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

		if ($this->form_validation->run('vali_estudiantes')) { //ejecuto el archivo de form_validation
				
				$datos=array(
					'id_estudiante'       =>$this->input->post("id"),
					'nom_estudiante'      =>$this->input->post("nombre"),
					'ape_estudiante'      =>$this->input->post("apellido"),
					'sexo'                =>$this->input->post("sexo"),
					'fecha_nacimiento'    =>$this->input->post("fecha"),
					'direccion'           =>$this->input->post("direccion"),
					'correo'              =>$this->input->post("correo"),
					'telefono'            =>$this->input->post("telefono")
					);

				$guardar= $this->estudiantes_model->insertEstudiantes($datos);
				
				if ($guardar == true) {
					$this->session->set_flashdata('ControllerMessage','Se Ha Guardado Correctamente');
					redirect(base_url().'estudiantes/add/'.$folder_nav.'/'.$nav,301);
					
				} else {
					$this->session->set_flashdata('ControllerMessage','Se ha Producido un Error Intentelo Nuevamente');
					redirect(base_url().'estudiantes/add/'.$folder_nav.'/'.$nav,301);
				}
	
	    	}

		}
		$data['titulo']				=               'Vortalsoft';
		$data['viewControlador']	=		       'estudiantes';
		$data['viewNave']	        =                $folder_nav;
		$data['nave']		    	=		                $nav;
		$data['contenido']			=		             'add';	

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
		$data['viewControlador']	=		       'estudiantes';
		$data['viewNave']	        =                $folder_nav;
		$data['nave']		    	=		                $nav;
		$data['contenido']			=		            'update';	
		$data['datos']				=		$this->estudiantes_model->getEstudiantesId($id);
		$this->load->view('masterPage/masterPage', $data, FALSE);
	}

	public function delete($id=null,$folder_nav=null,$nav=null)
	{
		$guardar= $this->estudiantes_model->deleteEstudiantes($id);
				
		if ($guardar == true) {
			$this->session->set_flashdata('ControllerMessage','Se ha Eliminado Correctamente');
			redirect(base_url().'estudiantes/index/'.$folder_nav.'/'.$nav,301);
		} else {
			$this->session->set_flashdata('ControllerMessage','Se ha Producido un Error Intentelo Nuevamente');
			redirect(base_url().'estudiantes/index/'.$folder_nav.'/'.$nav,301);
		}
		$data['titulo']				=               'Vortalsoft';
		$data['viewControlador']	=		       'estudiantes';
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
		$data['viewControlador']	  =		              'estudiantes';
		$data['viewNave']	          =                     $folder_nav;
		$data['nave']		    	  =		                       $nav;
		$data['contenido']			  =		                   'search';
		$data['datos']				  =		$this->productos_model->searchEstudiantes($criterio,$valor);
      
		$this->load->view('masterPage/masterPage', $data);
		
	}




}
