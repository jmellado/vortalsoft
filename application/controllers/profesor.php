<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profesor extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function index()
	{
		if($this->session->userdata('rol') == FALSE)
		{
			redirect(base_url().'login');
		}
		$data['titulo']             =   'Bienvenido Profesor';
		$data['viewControlador']	=	'rolProfesor';
		$data['viewNave']	        =   'rolProfesor';
	    $data['nave']	     		=	'navProfesor';
		$data['contenido']			=	'index';
		$this->load->view('masterPage/masterPage', $data);
	}
}
