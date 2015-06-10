<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profesores extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('profesores_model');
	}

	public function index($folder_nav=null,$nav=null)
	{
		$data['titulo']				=               'Vortalsoft';
		$data['viewControlador']	=		        'profesores';
		$data['viewNave']	        =                $folder_nav;
		$data['nave']		    	=		                $nav;
		$data['contenido']			=		             'index';	
        $data['datos']				=		$this->profesores_model->getProfesores();
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
			
		if ($this->form_validation->run('vali_profesores')) { //ejecuto el archivo de form_validation
				
				$datos=array(
					'id_profesor'       =>$this->input->post("id"),
					'nom_profesor'      =>$this->input->post("nombre"),
					'ape_profesor'      =>$this->input->post("apellido"),
					'sexo'             =>$this->input->post("sexo"),
					'fecha_nacimiento' =>$this->input->post("fecha"),
					'direccion'        =>$this->input->post("direccion"),
					'correo'           =>$this->input->post("correo"),
					'telefono'         =>$this->input->post("telefono")
					);

				$guardar= $this->profesores_model->insertProfesores($datos);
				
				if ($guardar == true) {
					$this->session->set_flashdata('ControllerMessage','Se Ha Guardado Correctamente');
					redirect(base_url().'profesores/add/'.$folder_nav.'/'.$nav,301);
				} else {
					$this->session->set_flashdata('ControllerMessage','Se ha Producido un Error Intentelo Nuevamente');
					redirect(base_url().'profesores/add/'.$folder_nav.'/'.$nav,301);
				}
				
			}

		}
	    $data['titulo']				=               'Vortalsoft';
		$data['viewControlador']	=		        'profesores';
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
			
			if ($this->form_validation->run('vali_profesores')) { //ejecuto el archivo de form_validation
				
				$datos=array(
					'id_profesor'       =>$this->input->post("id"),
					'nom_profesor'      =>$this->input->post("nombre"),
					'ape_profesor'      =>$this->input->post("apellido"),
					'sexo'             =>$this->input->post("sexo"),
					'fecha_nacimiento' =>$this->input->post("fecha"),
					'direccion'        =>$this->input->post("direccion"),
					'correo'           =>$this->input->post("correo"),
					'telefono'         =>$this->input->post("telefono"),
					
					
					);

				$guardar= $this->profesores_model->updateProfesores($datos,$id);
				
				if ($guardar == true) {
					$this->session->set_flashdata('ControllerMessage','Se Ha Guardado Correctamente');
					redirect(base_url().'profesores/index/'.$folder_nav.'/'.$nav,301);
				} else {
					$this->session->set_flashdata('ControllerMessage','Se ha Producido un Error Intentelo Nuevamente');
					redirect(base_url().'profesores/index/'.$folder_nav.'/'.$nav,301);
				}
				
			}

		}
	    $data['titulo']				=               'Vortalsoft';
		$data['viewControlador']	=		        'profesores';
		$data['viewNave']	        =                $folder_nav;
		$data['nave']		    	=		                $nav;
		$data['contenido']			=		             'update';	
		$data['datos']				=		$this->profesores_model->getProfesoresId($id);
		$this->load->view('masterPage/masterPage', $data, FALSE);
	}

	public function delete($id=null,$folder_nav=null,$nav=null)
	{
		$guardar= $this->profesores_model->deleteProfesores($id);
				
		if ($guardar == true) {
			$this->session->set_flashdata('ControllerMessage','Se Ha Eliminado Correctamente');
			redirect(base_url().'profesores/index/'.$folder_nav.'/'.$nav,301);
		} else {
			$this->session->set_flashdata('ControllerMessage','Se ha Producido un Error Intentelo Nuevamente');
			redirect(base_url().'profesores/index/'.$folder_nav.'/'.$nav,301);
		}
		$data['titulo']				=               'Vortalsoft';
		$data['viewControlador']	=		        'profesores';
		$data['viewNave']	        =                $folder_nav;
		$data['nave']		    	=		                $nav;
		$data['contenido']			=	                'delete';	
		$this->load->view('masterPage/masterPage', $data, FALSE);
	}


	public function search($folder_nav=null,$nav=null)   
       {

		
	    $criterio                     =  $this->input->post("criterio");
	    $valor                        =     $this->input->post("valor");
		$data['titulo']				  =                    'Vortalsoft';
		$data['viewControlador']	  =		               'profesores';
		$data['viewNave']	          =                     $folder_nav;
		$data['nave']		    	  =		                       $nav;
		$data['contenido']			  =		                   'search';
		$data['datos']				  =		$this->profesores_model->searchProfesores($criterio,$valor);
      
		$this->load->view('masterPage/masterPage', $data);
		
	}

}
