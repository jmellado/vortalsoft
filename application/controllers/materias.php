<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Materias extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('materias_model');
	}

	public function index($folder_nav=null,$nav=null)
	{
		
		$data['titulo']				=               'Vortalsoft';
		$data['viewControlador']	=		       'materias';
		$data['viewNave']	        =                $folder_nav;
		$data['nave']		    	=		                $nav;
		$data['contenido']			=		             'index';	
		$data['datos']				=		$this->materias_model->getMaterias();
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

		if ($this->form_validation->run('vali_materias')) { //ejecuto el archivo de form_validation
				
				$datos=array(
					'id_materia'       =>$this->input->post("id"),
					'nom_materia'      =>$this->input->post("nombre"),
					'num_creditos'      =>$this->input->post("creditos"),
					'intensidad_horaria'                =>$this->input->post("horas")
					);

				$guardar= $this->materias_model->insertMaterias($datos);
				
				if ($guardar == true) {
					$this->session->set_flashdata('ControllerMessage','Se Ha Guardado Correctamente');
					redirect(base_url().'materias/add/'.$folder_nav.'/'.$nav,301);
					
				} else {
					$this->session->set_flashdata('ControllerMessage','Se ha Producido un Error Intentelo Nuevamente');
					redirect(base_url().'materias/add/'.$folder_nav.'/'.$nav,301);
				}
	
	    	}

		}
		$data['titulo']				=               'Vortalsoft';
		$data['viewControlador']	=		       'materias';
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


		  if ($this->form_validation->run('vali_materias')) { //ejecuto el archivo de form_validation
				

				$datos=array(
					'id_materia'       =>$this->input->post("id"),
					'nom_materia'      =>$this->input->post("nombre"),
					'num_creditos'      =>$this->input->post("creditos"),
					'intensidad_horaria'                =>$this->input->post("horas"),
					
					);

				$guardar= $this->materias_model->updateMaterias($datos,$id);
				
				if ($guardar == true) {
					$this->session->set_flashdata('ControllerMessage','Se Ha Guardado Correctamente');
					redirect(base_url().'materias/index/'.$folder_nav.'/'.$nav,301);
				} else {
					$this->session->set_flashdata('ControllerMessage','Se ha Producido un Error Intentelo Nuevamente');
					redirect(base_url().'materias/index/'.$folder_nav.'/'.$nav,301);
				}
				
			}

		}
		$data['titulo']				=               'Vortalsoft';
		$data['viewControlador']	=		       'materias';
		$data['viewNave']	        =                $folder_nav;
		$data['nave']		    	=		                $nav;
		$data['contenido']			=		            'update';	
		$data['datos']				=		$this->materias_model->getMateriasId($id);
		$this->load->view('masterPage/masterPage', $data, FALSE);
	}

	public function delete($id=null,$folder_nav=null,$nav=null)
	{
		$guardar= $this->materias_model->deleteMaterias($id);
				
		if ($guardar == true) {
			$this->session->set_flashdata('ControllerMessage','Se ha Eliminado Correctamente');
			redirect(base_url().'materias/index/'.$folder_nav.'/'.$nav,301);
		} else {
			$this->session->set_flashdata('ControllerMessage','Se ha Producido un Error Intentelo Nuevamente');
			redirect(base_url().'materias/index/'.$folder_nav.'/'.$nav,301);
		}
		$data['titulo']				=               'Vortalsoft';
		$data['viewControlador']	=		       'materias';
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
		$data['viewControlador']	  =		              'materias';
		$data['viewNave']	          =                     $folder_nav;
		$data['nave']		    	  =		                       $nav;
		$data['contenido']			  =		                   'search';
		$data['datos']				  =		$this->materias_model->searchMaterias($criterio,$valor);
      
		$this->load->view('masterPage/masterPage', $data);
		
	}




}
