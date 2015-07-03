<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cargas_academicas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('cargasacademicas_model');
	}

	public function index($folder_nav=null,$nav=null)
	{
		
		$data['titulo']				=               'Vortalsoft';
		$data['viewControlador']	=		       'cargas_academicas';
		$data['viewNave']	        =                $folder_nav;
		$data['nave']		    	=		                $nav;
		$data['contenido']			=		             'index';	
		$data['datos']				=		$this->cargasacademicas_model->getCargas();
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

		if ($this->form_validation->run('vali_cargas')) { //ejecuto el archivo de form_validation
				
				$datos=array(
					'id_profesor'      =>$this->input->post("id"),
					'id_materia'       =>$this->input->post("id1"),
					'año'      =>$this->input->post("ano"),
					'semestre'      =>$this->input->post("semestre")
					);

				$guardar= $this->cargasacademicas_model->insertCargas($datos);
				
				if ($guardar == true) {
					$this->session->set_flashdata('ControllerMessage','Se Ha Guardado Correctamente');
					redirect(base_url().'cargas_academicas/add/'.$folder_nav.'/'.$nav,301);
					
				} else {
					$this->session->set_flashdata('ControllerMessage','Se ha Producido un Error Intentelo Nuevamente');
					redirect(base_url().'cargas_academicas/add/'.$folder_nav.'/'.$nav,301);
				}
	
	    	}

		}
		$data['titulo']				=               'Vortalsoft';
		$data['viewControlador']	=		       'cargas_academicas';
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


		  if ($this->form_validation->run('vali_cargas')) { //ejecuto el archivo de form_validation
				

				$datos=array(
					'id_profesor'      =>$this->input->post("id"),
					'id_materia'       =>$this->input->post("id1"),
					'año'      =>$this->input->post("ano"),
					'semestre'                =>$this->input->post("semestre"),
					
					);

				$guardar= $this->cargasacademicas_model->updateCargas($datos,$id,$id1);
				
				if ($guardar == true) {
					$this->session->set_flashdata('ControllerMessage','Se Ha Guardado Correctamente');
					redirect(base_url().'cargas_academicas/index/'.$folder_nav.'/'.$nav,301);
				} else {
					$this->session->set_flashdata('ControllerMessage','Se ha Producido un Error Intentelo Nuevamente');
					redirect(base_url().'cargas_academicas/index/'.$folder_nav.'/'.$nav,301);
				}
				
			}

		}
		$data['titulo']				=               'Vortalsoft';
		$data['viewControlador']	=		       'cargas_academicas';
		$data['viewNave']	        =                $folder_nav;
		$data['nave']		    	=		                $nav;
		$data['contenido']			=		            'update';	
		$data['datos']				=		$this->cargasacademicas_model->getCargasId($id);
		$this->load->view('masterPage/masterPage', $data, FALSE);
	}

	public function delete($id=null,$folder_nav=null,$nav=null)
	{
		$guardar= $this->cargasacademicas_model->deleteCargas($id);
				
		if ($guardar == true) {
			$this->session->set_flashdata('ControllerMessage','Se ha Eliminado Correctamente');
			redirect(base_url().'cargas_academicas/index/'.$folder_nav.'/'.$nav,301);
		} else {
			$this->session->set_flashdata('ControllerMessage','Se ha Producido un Error Intentelo Nuevamente');
			redirect(base_url().'cargas_academicas/index/'.$folder_nav.'/'.$nav,301);
		}
		$data['titulo']				=               'Vortalsoft';
		$data['viewControlador']	=		       'cargas_academicas';
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
		$data['viewControlador']	  =		              'cargas_academicas';
		$data['viewNave']	          =                     $folder_nav;
		$data['nave']		    	  =		                       $nav;
		$data['contenido']			  =		                   'search';
		$data['datos']				  =		$this->cargasacademicas_model->searchCargas($criterio,$valor);
      
		$this->load->view('masterPage/masterPage', $data);
		
	}

	
	public function detalles($id=null,$folder_nav=null,$nav=null)
	{
		
		$data['titulo']				=               'Vortalsoft';
		$data['viewControlador']	=		        'rolProfesor';
		$data['viewNave']	        =                $folder_nav;
		$data['nave']		    	=		                $nav;
		$data['contenido']			=		          'detalles';	
		$data['datos']				=		$this->cargasacademicas_model->getCargasJoin($id);
		$this->load->view('masterPage/masterPage', $data);
	}




}
