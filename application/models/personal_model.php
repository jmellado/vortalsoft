<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Personal_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

  	public function insertPersona($datos_usuarios=array())
	{
		$this->db->insert('personal', $datos_usuarios);
		return true;
	}

	public function getPersonal()
	{
		$query=$this->db
				->select('*')
				->from('personal')
				->get();
		return $query->result();
	}

	public function getPersonaId($id)
	{
		$consulta=array('id_personal'=>$id);
		$query=$this->db
				->select('*')
				->from('personal')
				->where($consulta)
				->get();
		return $query->row();
	}

	public function searchPersonal($criterio,$valor)
	{
		$consulta=array($criterio=>$valor);
		

		$query=$this->db
				->select('*')
				->from('personal')
				->like($consulta)
				->get();
		return $query->result();
	}

	public function validarExistenciaPersonaId($id)
	{
		$consulta=array('id_personal'=>$id);
		$query=$this->db
				->select('*')
				->from('personal')
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

	public function updatePersona($datos=array(),$id)
	{
		$this->db->where('id_personal', $id);
		$this->db->update('personal', $datos);
		return true;
	}

	public function deletePersona($id)
	{
		$this->db->where('id_personal', $id);
		$this->db->delete('personal');
		return true;
	}


     
}

/* End of file clientesModel.php */
/* Location: ./application/models/clientesModel.php */