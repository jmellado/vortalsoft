<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profesores_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function insertProfesores($datos=array())
	{
		$this->db->insert('profesores', $datos);
		return true;
	}

	public function getProfesores()
	{
		$query=$this->db
				->select('*')
				->from('profesores')
				->get();
		return $query->result();
	}

	public function getProfesoresId($id)
	{
		$consulta=array('id_profesor'=>$id);
		$query=$this->db
				->select('*')
				->from('profesores')
				->where($consulta)
				->get();
		return $query->row();
	}

		public function searchProfesores($criterio,$valor)
	{
		$consulta=array($criterio=>$valor);
		

		$query=$this->db
				->select('*')
				->from('profesores')
				->like($consulta)
				->get();
		return $query->result();
	}

	public function updateProfesores($datos=array(),$id)
	{
		$this->db->where('id_profesor', $id);
		$this->db->update('profesores', $datos);
		return true;
	}

	public function deleteProfesores($id)
	{
		$this->db->where('id_profesor', $id);
		$this->db->delete('profesores');
		return true;
	}
}