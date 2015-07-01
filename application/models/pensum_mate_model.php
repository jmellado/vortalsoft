<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pensum_mate_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function insertPensum_mate($datos=array())
	{
		$this->db->insert('pensum_mat', $datos);
		return true;
	}

	public function getPensum_mates()
	{
		$query=$this->db
				->select('*')
				->from('Pensum_mat')
				->get();
		return $query->result();
	}

	public function getPensum_mateId($id)
	{
		$consulta=array('id_pensum'=>$id);
		$query=$this->db
				->select('*')
				->from('Pensum_mat')
				->where($consulta)
				->get();
		return $query->row();
	}

	public function getPensum_mateJoin($id_pensum,$semestre)
	{
		$consulta=array('id_pensum'=>$id_pensum,
                        'semestre'=>$semestre
			           );
		$query = $this->db
		       ->select('materias.id_materia,materias.nom_materia,materias.num_creditos,materias.intensidad_horaria')
               ->from('materias')
               ->join('Pensum_mat','pensum_mat.id_materia = materias.id_materia')
               ->where($consulta)
               ->get();
        return $query->result();
	}

	public function searchPensum_mates($criterio,$valor)
	{
		$consulta=array($criterio=>$valor);
		$query=$this->db
				->select('*')
				->from('pensum_mat')
				->like($consulta)
				->get();
		return $query->result();
	}

	public function updatePensum_mate($datos=array(),$id)
	{
		$this->db->where('id_pensum', $id);
		$this->db->update('pensum_mat', $datos);
		return true;
	}

	public function deletePensum_mate($id)
	{
		$this->db->where('id_pensum', $id);
		$this->db->delete('pensum_mat');
		return true;
	}
}