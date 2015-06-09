<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 */
class Docente extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function index()
	{
		if($this->session->userdata('rol') == FALSE)
		{
			redirect(base_url().'login');
		}
		$data['titulo']             =   'Bienvenido Docente';
		$data['viewControlador']	=	'rolDocente';
		$data['viewNave']	        =   'rolDocente';
	    $data['nave']	     		=	'navDocente';
		$data['contenido']			=	'index';
		$this->load->view('masterPage/masterPage', $data);
	}
}
