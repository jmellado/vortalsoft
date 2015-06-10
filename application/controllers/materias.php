<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Materias extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('materias_model');
	}

	public function index()
	{
		$data['titulo']				=		'Vortal.SAS Materias';
		$data['viewControlador']	=		'materias';
		$data['contenido']			=		'index';
		$data['datos']				=		$this->materias_model->getMaterias();
		$this->load->view('masterPage/masterPage', $data);
	}

	public function add()
	{
		if ($this->input->post()) { //pregunto si me llegaron datos del formulario
			
			//if ($this->form_validation->run('formulario/add')) { //ejecuto el archivo de form_validation
				
				$datos=array(
					'id_materia'       =>$this->input->post("id"),
					'nom_materia'      =>$this->input->post("nombre"),
					'num_creditos'      =>$this->input->post("apellido"),
					'intensidad_horaria' =>$this->input->post("direccion")
					);

				$guardar= $this->materias_model->insertMaterias($datos);
				
				if ($guardar == true) {
					$this->session->set_flashdata('ControllerMessage','Se Ha Guardado Correctamente');
					redirect(base_url().'materias/add',301);
				} else {
					$this->session->set_flashdata('ControllerMessage','Se ha Producido un Error Intentelo Nuevamente');
					redirect(base_url().'materias/add',301);
				}
				
		//	}

		}
		$data['titulo']				=		'Vortal.SAS Materias';
		$data['viewControlador']	=		'materias';
		$data['contenido']			=		'add';
		$this->load->view('masterPage/masterPage', $data, FALSE);
	}

	public function update($id=null)
	{

		if ($this->input->post()) { //pregunto si me llegaron datos del formulario
			
			//if ($this->form_validation->run('formulario/add')) { //ejecuto el archivo de form_validation
				
				$datos=array(
					'id_materia'       =>$this->input->post("id"),
					'nom_materia'      =>$this->input->post("nombre"),
					'num_creditos'      =>$this->input->post("apellido"),
					'intensidad_horaria'=>$this->input->post("correo")
					);

				$guardar= $this->materias_model->updateMaterias($datos,$id);
				
				if ($guardar == true) {
					$this->session->set_flashdata('ControllerMessage','Se Ha Guardado Correctamente');
					redirect(base_url().'materias/index',301);
				} else {
					$this->session->set_flashdata('ControllerMessage','Se ha Producido un Error Intentelo Nuevamente');
					redirect(base_url().'materias/index',301);
				}
				
			//}

		}
		$data['titulo']				=		'Vortal.SAS Materias';
		$data['viewControlador']	=		'materias';
		$data['contenido']			=		'update';
		$data['datos']				=		$this->materias_model->getMateriasId($id);
		$this->load->view('masterPage/masterPage', $data, FALSE);
	}

	public function delete($id=null)
	{
		$guardar= $this->materias_model->deleteMaterias($id);
				
		if ($guardar == true) {
			$this->session->set_flashdata('ControllerMessage','Se Ha Eliminado Correctamente');
			redirect(base_url().'materias/index',301);
		} else {
			$this->session->set_flashdata('ControllerMessage','Se ha Producido un Error Intentelo Nuevamente');
			redirect(base_url().'materias/index',301);
		}
		$data['titulo']				=		'Vortal.SAS Materias';
		$data['viewControlador']	=		'materias';
		$data['contenido']			=		'delete';
		$this->load->view('masterPage/masterPage', $data, FALSE);
	}

}
