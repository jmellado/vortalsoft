<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Detalle_matricula_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function insertDetalleMatricula($datos=array())
	{
		$this->db->insert('detalle_matricula', $datos);
		return true;
	}

	public function getDetalleMatriculas()
	{
		$query=$this->db
				->select('*')
				->from('detalle_matricula')
				->get();
		return $query->result();
	}

	public function getDetalleMatriculasJoin()
	{
		$query = $this->db
		       ->select('matricula.id_matricula,matricula.id_estudiante,estudiantes.nom_estudiante,matricula.id_programa,programas.nom_programa')
               ->from('matricula')
               ->join('programas','programas.id_programa = matricula.id_programa')
               ->join('estudiantes','estudiantes.id_estudiante = matricula.id_estudiante')
               ->get();
        return $query->result();
	}


	public function getDetalleMatriculaId($id)
	{
		$consulta=array('id_matricula'=>$id);
		$query=$this->db
				->select('*')
				->from('detalle_matricula')
				->where($consulta)
				->get();
		return $query->row();
	}

	
	public function searchDetalleMatriculas($criterio,$valor)
	{
		$consulta=array($criterio=>$valor);
		$query=$this->db
				->select('*')
				->from('detalle_matricula')
				->like($consulta)
				->get();
		return $query->result();
	}

	public function updateDetalleMatricula($datos=array(),$id)
	{
		$this->db->where('id_matricula', $id);
		$this->db->update('detalle_matricula', $datos);
		return true;
	}

	public function deleteDetalleMatriculas($id)
	{
		$this->db->where('id_matricula', $id);
		$this->db->delete('detalle_matricula');
		return true;
	}

	public function validarExistenciaDetalleMatriculaId($id)
	{
		$consulta=array('id_matricula'=>$id);
		$query=$this->db
				->select('*')
				->from('detalle_matricula')
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