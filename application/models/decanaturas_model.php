<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Decanaturas_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function insertDecanaturas($datos=array())
	{
		$this->db->insert('decanaturas', $datos);
		return true;
	}

	public function getDecanaturas()
	{
		$query=$this->db
				->select('*')
				->from('decanaturas')
				->get();
		return $query->result();
	}

	public function getDecanaturaId($id)
	{
		$consulta=array('id_decanatura'=>$id);
		$query=$this->db
				->select('*')
				->from('decanaturas')
				->where($consulta)
				->get();
		return $query->row();
	}

	public function searchDecanaturas($criterio,$valor)
	{
		$consulta=array($criterio=>$valor);
		$query=$this->db
				->select('*')
				->from('decanaturas')
				->like($consulta)
				->get();
		return $query->result();
	}

	public function updateDecanatura($datos=array(),$id)
	{
		$this->db->where('id_decanatura', $id);
		$this->db->update('decanaturas', $datos);
		return true;
	}

	public function deleteDecanaturas($id)
	{
		$this->db->where('id_decanatura', $id);
		$this->db->delete('decanaturas');
		return true;
	}

		public function validarExistenciaDecanaturaId($id)
	{
		$consulta=array('id_decanatura'=>$id);
		$query=$this->db
				->select('*')
				->from('decanaturas')
				->where($consulta)
				->get();
			
		      if ($query->num_rows > 0) 
		      {
		          return true;
	          }else
	          {
                  return false;
	          }

	}
}