<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profesores extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('profesores_model');
	}

	public function index()
	{
		$data['titulo']				=		'Vortal.SAS Profesores';
		$data['viewControlador']	=		'profesores';
		$data['contenido']			=		'index';
		$data['datos']				=		$this->profesores_model->getProfesores();
		$this->load->view('masterPage/masterPage', $data);
	}

	public function add()
	{
		if ($this->input->post()) { //pregunto si me llegaron datos del formulario
			
			//if ($this->form_validation->run('formulario/add')) { //ejecuto el archivo de form_validation
				
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
					redirect(base_url().'profesores/add',301);
				} else {
					$this->session->set_flashdata('ControllerMessage','Se ha Producido un Error Intentelo Nuevamente');
					redirect(base_url().'profesores/add',301);
				}
				
		//	}

		}
		$data['titulo']				=		'Vortal.SAS Profesores';
		$data['viewControlador']	=		'profesores';
		$data['contenido']			=		'add';
		$this->load->view('masterPage/masterPage', $data, FALSE);
	}

	public function update($id=null)
	{

		if ($this->input->post()) { //pregunto si me llegaron datos del formulario
			
			//if ($this->form_validation->run('formulario/add')) { //ejecuto el archivo de form_validation
				
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
					redirect(base_url().'profesores/index',301);
				} else {
					$this->session->set_flashdata('ControllerMessage','Se ha Producido un Error Intentelo Nuevamente');
					redirect(base_url().'profesores/index',301);
				}
				
			//}

		}
		$data['titulo']				=		'Vortal.SAS Profesores';
		$data['viewControlador']	=		'profesores';
		$data['contenido']			=		'update';
		$data['datos']				=		$this->profesores_model->getProfesoresId($id);
		$this->load->view('masterPage/masterPage', $data, FALSE);
	}

	public function delete($id=null)
	{
		$guardar= $this->profesores_model->deleteProfesores($id);
				
		if ($guardar == true) {
			$this->session->set_flashdata('ControllerMessage','Se Ha Eliminado Correctamente');
			redirect(base_url().'profesores/index',301);
		} else {
			$this->session->set_flashdata('ControllerMessage','Se ha Producido un Error Intentelo Nuevamente');
			redirect(base_url().'profesores/index',301);
		}
		$data['titulo']				=		'Vortal.SAS Profesores';
		$data['viewControlador']	=		'profesores';
		$data['contenido']			=		'delete';
		$this->load->view('masterPage/masterPage', $data, FALSE);
	}

}
