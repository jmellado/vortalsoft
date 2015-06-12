<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Programas_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function insertProgramas($datos=array())
	{
		$this->db->insert('programas', $datos);
		return true;
	}

	public function getProgramas()
	{
		$query=$this->db
				->select('*')
				->from('programas')
				->get();
		return $query->result();
	}

	public function getProgramasId($id)
	{
		$consulta=array('id_programa'=>$id);
		$query=$this->db
				->select('*')
				->from('programas')
				->where($consulta)
				->get();
		return $query->row();
	}

	public function searchProgramas($criterio,$valor)
	{
		$consulta=array($criterio=>$valor);
		$query=$this->db
				->select('*')
				->from('programas')
				->like($consulta)
				->get();
		return $query->result();
	}

	public function updatePrograma($datos=array(),$id)
	{
		$this->db->where('id_programa', $id);
		$this->db->update('programas', $datos);
		return true;
	}

	public function deleteProgramas($id)
	{
		$this->db->where('id_programa', $id);
		$this->db->delete('programas');
		return true;
	}
}