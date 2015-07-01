<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Decanaturas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('decanaturas_model');
	}

	public function index($folder_nav=null,$nav=null)
	{
		
		$data['titulo']				=               'Vortalsoft';
		$data['viewControlador']	=		       'decanaturas';
		$data['viewNave']	        =                $folder_nav;
		$data['nave']		    	=		                $nav;
		$data['contenido']			=		             'index';	
		$data['datos']				=		$this->decanaturas_model->getDecanaturas();
		$this->load->view('masterPage/masterPage', $data);
	}

	public function add($folder_nav=null,$nav=null)
	{
		if ($this->input->post()) { //pregunto si me llegaron datos del formulario
			
              
			    $this->form_validation->set_message('required', 'campo  obligatorio');
				$this->form_validation->set_message('integer', 'Campo debe poseer solo numeros');
				
				$this->form_validation->set_error_delimiters('<span>','</span>');

		if ($this->form_validation->run('vali_decanaturas')) { //ejecuto el archivo de form_validation
				
				$datos=array(
					'id_decanatura'       =>$this->input->post("id_decanatura"),
					'nom_decanatura'      =>$this->input->post("nom_decanatura"),
					'jefe_decanatura'      =>$this->input->post("jefe_decanatura")
				        	);

                     $id = $this->input->post("id_decanatura");
                     $validar= $this->personal_model->validarExistenciaDecanaturaId($id);

                    if ($validar == true) {
							$this->session->set_flashdata('ControllerMessage','Decanatura registrado anteriormente, verifique el codigo e intentelo nuevamente');
							redirect(base_url().'profesores/add/'.$folder_nav.'/'.$nav,301);
				    } else 
				    {

				$consulta= $this->decanaturas_model->insertDecanaturas($datos);
				
				if ($consulta == true) {
					$this->session->set_flashdata('ControllerMessage','Se Ha Guardado Correctamente');
					redirect(base_url().'decanaturas/add/'.$folder_nav.'/'.$nav,301);
					
				} else {
					$this->session->set_flashdata('ControllerMessage','Se ha Producido un Error Intentelo Nuevamente');
					redirect(base_url().'decanaturas/add/'.$folder_nav.'/'.$nav,301);
				}
			}
	
	    	}

		}
		$data['titulo']				=               'Vortalsoft';
		$data['viewControlador']	=		       'decanaturas';
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
				$this->form_validation->set_error_delimiters('<span>','</span>');
			
			if ($this->form_validation->run('vali_decanaturas')) { //ejecuto el archivo de form_validation
				
				$datos=array(
					'id_decanatura'       =>$this->input->post("id_decanatura"),
					'nom_decanatura'      =>$this->input->post("nom_decanatura"),
					'jefe_decanatura'      =>$this->input->post("jefe_decanatura")
				        	);


				$consulta= $this->decanaturas_model->updateDecanatura($datos,$id);
				
				if ($consulta == true) {
					$this->session->set_flashdata('ControllerMessage','Datos actualiazados Correctamente');
					redirect(base_url().'decanaturas/index/'.$folder_nav.'/'.$nav,301);
				} else {
					$this->session->set_flashdata('ControllerMessage','Se ha Producido un Error Intentelo Nuevamente');
					redirect(base_url().'decanaturas/index/'.$folder_nav.'/'.$nav,301);
				}
				
			}

		}
		$data['titulo']				=		'VentaSoft Productos';
		$data['viewControlador']	=		        'decanaturas';
		$data['viewNave']	        =                 $folder_nav;
		$data['nave']		    	=		                 $nav;
		$data['contenido']			=		             'update';
		$data['datos']				=		$this->decanaturas_model->getDecanaturaId($id);
	    $this->load->view('masterPage/masterPage', $data, FALSE);
	}


	public function delete($id=null,$folder_nav=null,$nav=null)
	{
		$consulta= $this->decanaturas_model->deleteDecanaturas($id);
				
		if ($consulta == true) {
			$this->session->set_flashdata('ControllerMessage','Se ha Eliminado Correctamente');
			redirect(base_url().'decanaturas/index/'.$folder_nav.'/'.$nav,301);
		} else {
			$this->session->set_flashdata('ControllerMessage','Se ha Producido un Error Intentelo Nuevamente');
			redirect(base_url().'decanaturas/index/'.$folder_nav.'/'.$nav,301);
		}
		$data['titulo']				=               'Vortalsoft';
		$data['viewControlador']	=		       'decanaturas';
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
		$data['viewControlador']	  =		              'decanaturas';
		$data['viewNave']	          =                     $folder_nav;
		$data['nave']		    	  =		                       $nav;
		$data['contenido']			  =		                   'search';
		$data['datos']				  =		$this->decanaturas_model->searchDecanaturas($criterio,$valor);
      
		$this->load->view('masterPage/masterPage', $data);
		
	}
}
