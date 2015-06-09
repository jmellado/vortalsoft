<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Proveedores_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function insertProveedores($datos=array())					
	{
		$this->db->insert('proveedores', $datos);
		return true;
	}

	public function getProveedores()
	{
		$query=$this->db
				->select('*')
				->from('proveedores')
				->get();
		return $query->result();
	}

	public function getProveedoresId($id)
	{
		$consulta=array('id_proveedor'=>$id);
		$query=$this->db
				->select('*')
				->from('proveedores')
				->where($consulta)
				->get();
		return $query->row();
	}

	public function getProveedoresNombre($id)
	{
		$consulta=array('id_proveedor'=>$id);
		$query=$this->db
				->select('*')
				->from('proveedores')
				->where($consulta)
				->get();
		return $query->row();
	}
	
	public function updateProveedores($datos=array(),$id)
	{
		$this->db->where('id_proveedor', $id);
		$this->db->update('proveedores', $datos);
		return true;
	}

	public function deleteProveedores($id)
	{
		$this->db->where('id_proveedor', $id);
		$this->db->delete('proveedores');
		return true;
	}

}

/* End of file proveedores_model.php */
/* Location: ./application/models/proveedores_model.php */