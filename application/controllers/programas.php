<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Programas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('programas_model');
		$this->load->model('decanaturas_model');
	}

	public function index($folder_nav=null,$nav=null)
	{
		
		$data['titulo']				=               'Vortalsoft';
		$data['viewControlador']	=		         'programas';
		$data['viewNave']	        =                $folder_nav;
		$data['nave']		    	=		                $nav;
		$data['contenido']			=		             'index';	
		$data['datos']				=		$this->programas_model->getProgramas();
	    $data['decanaturas']		=		$this->decanaturas_model->getDecanaturas();
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

		if ($this->form_validation->run('vali_programas')) { //ejecuto el archivo de form_validation
				
				$datos=array(
					'id_programa'        =>$this->input->post("id_programa"),
					'nom_programa'       =>$this->input->post("nom_programa"),
					'jefe_programa'      =>$this->input->post("jefe_programa"),
					'id_decanatura'      =>$this->input->post("id_decanatura")
					);

				$consulta= $this->programas_model->insertProgramas($datos);
				
				if ($consulta == true) {
					$this->session->set_flashdata('ControllerMessage','Se Ha Guardado Correctamente');
					redirect(base_url().'programas/add/'.$folder_nav.'/'.$nav,301);
					
				} else {
					$this->session->set_flashdata('ControllerMessage','Se ha Producido un Error Intentelo Nuevamente');
					redirect(base_url().'programas/add/'.$folder_nav.'/'.$nav,301);
				}
	
	    	}

		}
		$data['titulo']				=               'Vortalsoft';
		$data['viewControlador']	=		         'programas';
		$data['viewNave']	        =                $folder_nav;
		$data['nave']		    	=		                $nav;
		$data['contenido']			=		               'add';	
		$data['decanaturas']		=		$this->decanaturas_model->getDecanaturas();

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
			
			if ($this->form_validation->run('vali_programas')) { //ejecuto el archivo de form_validation
				
				$datos=array(
					'id_programa'        =>$this->input->post("id_programa"),
					'nom_programa'       =>$this->input->post("nom_programa"),
					'jefe_programa'      =>$this->input->post("jefe_programa"),
					'id_decanatura'      =>$this->input->post("id_decanatura")
					);

				$consulta= $this->programas_model->updatePrograma($datos,$id);
				
				if ($consulta == true) {
					$this->session->set_flashdata('ControllerMessage','Datos actualiazados Correctamente');
					redirect(base_url().'programas/index/'.$folder_nav.'/'.$nav,301);
				} else {
					$this->session->set_flashdata('ControllerMessage','Se ha Producido un Error Intentelo Nuevamente');
					redirect(base_url().'programas/index/'.$folder_nav.'/'.$nav,301);
				}
				
			}

		}
		$data['titulo']				=		'VentaSoft Productos';
		$data['viewControlador']	=		          'programas';
		$data['viewNave']	        =                 $folder_nav;
		$data['nave']		    	=		                 $nav;
		$data['contenido']			=		             'update';
		$data['datos']				=		$this->programas_model->getProgramasId($id);
        //todas las categorias y proveedores para buscar el nombre y mostrarlo   y no el id como aparece en la la bd
 	    $data['decanaturas']		=		$this->decanaturas_model->getDecanaturas();

        $this->load->view('masterPage/masterPage', $data, FALSE);
	}

	public function delete($id=null,$folder_nav=null,$nav=null)
	{
		$guardar= $this->programas_model->deleteProgramas($id);
				
		if ($guardar == true) {
			$this->session->set_flashdata('ControllerMessage','Se ha Eliminado Correctamente');
			redirect(base_url().'programas/index/'.$folder_nav.'/'.$nav,301);
		} else {
			$this->session->set_flashdata('ControllerMessage','Se ha Producido un Error Intentelo Nuevamente');
			redirect(base_url().'programas/index/'.$folder_nav.'/'.$nav,301);
		}
		
		$data['titulo']				=               'Vortalsoft';
		$data['viewControlador']	=		         'programas';
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
		$data['viewControlador']	  =		                'programas';
		$data['viewNave']	          =                     $folder_nav;
		$data['nave']		    	  =		                       $nav;
		$data['contenido']			  =		                   'search';
		$data['datos']				  =		$this->programas_model->searchProgramas($criterio,$valor);
		$data['decanaturas']	      =		$this->decanaturas_model->getDecanaturas();
      
		$this->load->view('masterPage/masterPage', $data);
		
	}




}
