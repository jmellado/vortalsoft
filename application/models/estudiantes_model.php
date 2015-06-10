<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Estudiantes_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function insertEstudiantes($datos=array())
	{
		$this->db->insert('estudiantes', $datos);
		return true;
	}

	public function getEstudiantes()
	{
		$query=$this->db
				->select('*')
				->from('estudiantes')
				->get();
		return $query->result();
	}

	public function getEstudiantesId($id)
	{
		$consulta=array('id_estudiante'=>$id);
		$query=$this->db
				->select('*')
				->from('estudiantes')
				->where($consulta)
				->get();
		return $query->row();
	}

	public function searchEstudiantes($criterio,$valor)
	{
		$consulta=array($criterio=>$valor);
		$query=$this->db
				->select('*')
				->from('estudiantes')
				->like($consulta)
				->get();
		return $query->result();
	}

	public function updateEstudiantes($datos=array(),$id)
	{
		$this->db->where('id_estudiante', $id);
		$this->db->update('estudiantes', $datos);
		return true;
	}

	public function deleteEstudiantes($id)
	{
		$this->db->where('id_estudiante', $id);
		$this->db->delete('estudiantes');
		return true;
	}
}