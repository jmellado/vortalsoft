<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pensum_mate_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function insertPensum_mate($datos=array())
	{
		$this->db->insert('pensum_mate', $datos);
		return true;
	}

	public function getPensum_mates()
	{
		$query=$this->db
				->select('*')
				->from('Pensum_mate')
				->get();
		return $query->result();
	}

	public function getPensum_mateId($id)
	{
		$consulta=array('id_pensum'=>$id);
		$query=$this->db
				->select('*')
				->from('Pensum_mate')
				->where($consulta)
				->get();
		return $query->row();
	}

	public function searchPensum_mates($criterio,$valor)
	{
		$consulta=array($criterio=>$valor);
		$query=$this->db
				->select('*')
				->from('Pensum_mate')
				->like($consulta)
				->get();
		return $query->result();
	}

	public function updatePensum_mate($datos=array(),$id)
	{
		$this->db->where('id_pensum', $id);
		$this->db->update('Pensum_mate', $datos);
		return true;
	}

	public function deletePensum_mate($id)
	{
		$this->db->where('id_pensum', $id);
		$this->db->delete('Pensum_mate');
		return true;
	}
}