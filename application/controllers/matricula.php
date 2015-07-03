<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Matricula extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('matricula_model');
		$this->load->model('programas_model');
		$this->load->model('detalle_matricula_model');
		
	}

	public function index($folder_nav=null,$nav=null)
	{
		
		$data['titulo']				=               'Vortalsoft';
		$data['viewControlador']	=		         'matricula';
		$data['viewNave']	        =                $folder_nav;
		$data['nave']		    	=		                $nav;
		$data['contenido']			=		             'index';	
		$data['datos']				= $this->matricula_model->getMatriculasJoin();
		$this->load->view('masterPage/masterPage', $data);
	}

	

public function add($folder_nav=null,$nav=null)
	{
		if ($this->input->post()) { //pregunto si me llegaron datos del formulario
			
              
			    $this->form_validation->set_message('required', 'campo  obligatorio');
				$this->form_validation->set_message('integer', 'Campo debe poseer solo numeros');
				
				$this->form_validation->set_error_delimiters('<span>','</span>');

		if ($this->form_validation->run('vali_Matricula')) { //ejecuto el archivo de form_validation
				
				$datos=array(
					'id_matricula'       =>$this->input->post("id_matricula"),
					'id_estudiante'      =>$this->input->post("id_estudiante"),
					'id_programa'        =>$this->input->post("id_programa")
				        	);

                     $id = $this->input->post("id_matricula");
                     $validar= $this->matricula_model->validarExistenciaMatriculaId($id);

                    if ($validar == true) {
							$this->session->set_flashdata('ControllerMessage','Matricula registrado anteriormente, verifique el codigo e intentelo nuevamente');
							redirect(base_url().'matricula/add/'.$folder_nav.'/'.$nav,301);
				    } else 
				    {

				$consulta= $this->matricula_model->insertMatricula($datos);
				
				if ($consulta == true) {
					$this->session->set_flashdata('ControllerMessage','Se Ha Guardado Correctamente');
					redirect(base_url().'matricula/add/'.$folder_nav.'/'.$nav,301);
					
				} else {
					$this->session->set_flashdata('ControllerMessage','Se ha Producido un Error Intentelo Nuevamente');
					redirect(base_url().'matricula//add/'.$folder_nav.'/'.$nav,301);
				}
			}
	
	    	}

		}
		$data['titulo']				=               'Vortalsoft';
		$data['viewControlador']	=		         'matricula';
		$data['viewNave']	        =                $folder_nav;
		$data['nave']		    	=		                $nav;
		$data['contenido']			=		               'add';	
		$data['programas']		    =		$this->programas_model->getProgramas();

		$this->load->view('masterPage/masterPage', $data, FALSE);
	}

	public function update($id=null,$folder_nav=null,$nav=null)
	{

		if ($this->input->post()) { //pregunto si me llegaron datos del formulario

			    $this->form_validation->set_message('required', 'campo  obligatorio');
				$this->form_validation->set_message('integer', 'Campo debe poseer solo numeros');
				$this->form_validation->set_message('numeric', 'Campo  debe poseer solo numeros');
				$this->form_validation->set_error_delimiters('<span>','</span>');
			
			if ($this->form_validation->run('vali_Matricula')) { //ejecuto el archivo de form_validation
				
				$datos=array(
					'id_matricula'       =>$this->input->post("id_matricula"),
					'id_estudiante'      =>$this->input->post("id_estudiante"),
					'id_programa'        =>$this->input->post("id_programa")
				        	);


				$consulta= $this->matricula_model->updateMatricula($datos,$id);
				
				if ($consulta == true) {
					$this->session->set_flashdata('ControllerMessage','Datos actualiazados Correctamente');
					redirect(base_url().'matricula/index/'.$folder_nav.'/'.$nav,301);
				} else {
					$this->session->set_flashdata('ControllerMessage','Se ha Producido un Error Intentelo Nuevamente');
					redirect(base_url().'matricula/index/'.$folder_nav.'/'.$nav,301);
				}
				
			}

		}
		$data['titulo']				=		'VentaSoft Productos';
		$data['viewControlador']	=		          'matricula';
		$data['viewNave']	        =                 $folder_nav;
		$data['nave']		    	=		                 $nav;
		$data['contenido']			=		             'update';
		$data['datos']				=		$this->decanaturas_model->getMatriculaId($id);
	    $this->load->view('masterPage/masterPage', $data, FALSE);
	}


	public function delete($id=null,$folder_nav=null,$nav=null)
	{
		
		$consulta_detalles= $this->detalle_matricula_model->deleteDetalleMatriculas($id);
		$consulta= $this->matricula_model->deleteMatriculas($id);
				
		if ($consulta == true  && $consulta_detalles == true) {
			$this->session->set_flashdata('ControllerMessage','Se ha Eliminado Correctamente');
			redirect(base_url().'matricula/index/'.$folder_nav.'/'.$nav,301);
		} else {
			$this->session->set_flashdata('ControllerMessage','Se ha Producido un Error Intentelo Nuevamente');
			redirect(base_url().'matricula/index/'.$folder_nav.'/'.$nav,301);
		}
		$data['titulo']				=               'Vortalsoft';
		$data['viewControlador']	=		         'matricula';
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
		$data['viewControlador']	  =		                'matricula';
		$data['viewNave']	          =                     $folder_nav;
		$data['nave']		    	  =		                       $nav;
		$data['contenido']			  =		                   'search';
		$data['datos']				  =		$this->matricula_model->searchMatriculas($criterio,$valor);
      
		$this->load->view('masterPage/masterPage', $data);
		
	}
}
