<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Matricula_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function insertMatricula($datos=array())
	{
		$this->db->insert('matricula', $datos);
		return true;
	}

	public function getMatriculas()
	{
		$query=$this->db
				->select('*')
				->from('matricula')
				->get();
		return $query->result();
	}

	public function getMatriculasJoin()
	{
		$query = $this->db
		       ->select('matricula.id_matricula,matricula.id_estudiante,estudiantes.nom_estudiante,matricula.id_programa,programas.nom_programa')
               ->from('matricula')
               ->join('programas','programas.id_programa = matricula.id_programa')
               ->join('estudiantes','estudiantes.id_estudiante = matricula.id_estudiante')
               ->get();
        return $query->result();
	}


	public function getMatriculaId($id)
	{
		$consulta=array('id_matricula'=>$id);
		$query=$this->db
				->select('*')
				->from('matricula')
				->where($consulta)
				->get();
		return $query->row();
	}

	
	public function searchMatriculas($criterio,$valor)
	{
		$consulta=array($criterio=>$valor);
		$query = $this->db
		       ->select('matricula.id_matricula,matricula.id_estudiante,estudiantes.nom_estudiante,matricula.id_programa,programas.nom_programa')
               ->from('matricula')
               ->join('programas','programas.id_programa = matricula.id_programa')
               ->join('estudiantes','estudiantes.id_estudiante = matricula.id_estudiante')
               ->like($consulta)
			   ->get();
               
		return $query->result();
	}

	public function updateMatricula($datos=array(),$id)
	{
		$this->db->where('id_matricula', $id);
		$this->db->update('matricula', $datos);
		return true;
	}

	public function deleteMatriculas($id)
	{
		$this->db->where('id_matricula', $id);
		$this->db->delete('matricula');
		return true;
	}

	public function validarExistenciaMatriculaId($id)
	{
		$consulta=array('id_matricula'=>$id);
		$query=$this->db
				->select('*')
				->from('matricula')
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