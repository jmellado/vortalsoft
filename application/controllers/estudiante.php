<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 */
class Estudiante extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		
	}
	
	public function index()
	{
		if($this->session->userdata('rol') == FALSE || $this->session->userdata('rol') == 'Docente')
		{
			redirect(base_url().'home');
		}
		$data['titulo']             = 'Bienvenido Estudiante ';
		$data['viewControlador']	=	'rolEstudiante';
		$data['viewNave']	        =   'rolEstudiante';
	    $data['nave']	     		=	'navEstudiante';
		$data['contenido']			=	'index';
		$this->load->view('masterPage/masterPage', $data);
	}
}
