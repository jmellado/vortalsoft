<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Materias_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function insertMaterias($datos=array())
	{
		$this->db->insert('materias', $datos);
		return true;
	}

	public function getMaterias()
	{
		$query=$this->db
				->select('*')
				->from('materias')
				->get();
		return $query->result();
	}

	public function getMateriasId($id)
	{
		$consulta=array('id_materia'=>$id);
		$query=$this->db
				->select('*')
				->from('materias')
				->where($consulta)
				->get();
		return $query->row();
	}

	public function updateMaterias($datos=array(),$id)
	{
		$this->db->where('id_materia', $id);
		$this->db->update('materias', $datos);
		return true;
	}

	public function deleteMaterias($id)
	{
		$this->db->where('id_materia', $id);
		$this->db->delete('materias');
		return true;
	}


	public function searchMaterias($criterio,$valor)
	{
		$consulta=array($criterio=>$valor);
		$query=$this->db
				->select('*')
				->from('materias')
				->like($consulta)
				->get();
		return $query->result();
	}
}