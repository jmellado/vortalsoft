<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cargasacademicas_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function insertCargas($datos=array())
	{
		$this->db->insert('carga_academica', $datos);
		return true;
	}

	public function getCargas()
	{
		$query=$this->db
				->select('*')
				->from('carga_academica')
				->get();
		return $query->result();
	}

	public function getCargasId($id)
	{
		$consulta=array('id_profesor'=>$id);
		$query=$this->db
				->select('*')
				->from('carga_academica')
				->where($consulta)
				->get();
		return $query->row();
	}

	public function updateCargas($datos=array(),$id,$id1)
	{
		//$consulta=array('id_profesor'=>$id,'id_materia'=>$id1);
		
		//$this->db->where('id_profesor', $id);
		$this->db->where('id_profesor', $id);
		$this->db->update('carga_academica', $datos);
		return true;
	}

	public function deleteCargas($id)
	{
		$this->db->where('id_profesor', $id);
		$this->db->delete('carga_academica');
		return true;
	}


	public function searchCargas($criterio,$valor)
	{
		$consulta=array($criterio=>$valor);
		$query=$this->db
				->select('*')
				->from('carga_academica')
				->like($consulta)
				->get();
		return $query->result();
	}
}