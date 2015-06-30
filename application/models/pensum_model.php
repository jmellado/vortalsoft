<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pensum_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function insertPensum($datos=array())
	{
		$this->db->insert('pensum', $datos);
		return true;
	}

	public function getPensums()
	{
		$query=$this->db
				->select('*')
				->from('pensum')
				->get();
		return $query->result();
	}

	public function getPensumsJoin()
	{
		$query = $this->db
		       ->select('pensum.id_pensum,pensum.id_programa,programas.nom_programa')
               ->from('pensum')
               ->join('programas','programas.id_programa = pensum.id_programa')
               ->get();
        return $query->result();
	}


	public function getPensumId($id)
	{
		$consulta=array('id_pensum'=>$id);
		$query=$this->db
				->select('*')
				->from('pensum')
				->where($consulta)
				->get();
		return $query->row();
	}

	public function searchPensums($criterio,$valor)
	{
		$consulta=array($criterio=>$valor);
		$query=$this->db
				->select('*')
				->from('pensum')
				->like($consulta)
				->get();
		return $query->result();
	}

	public function updatePensum($datos=array(),$id)
	{
		$this->db->where('id_pensum', $id);
		$this->db->update('pensum', $datos);
		return true;
	}

	public function deletePensum($id)
	{
		$this->db->where('id_pensum', $id);
		$this->db->delete('pensum');
		return true;
	}
}