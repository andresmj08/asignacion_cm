<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cita extends CI_Model {

	public function __construct() {

	}



	public function crear_cita($dato){
		return $this->db->insert('cita',$dato);
	}

	public function crear_cita_relacion($relacion){
				return $this->db->insert('cita_tiene_operaciones',$relacion);
	}

	public function traer_ultimo(){
		$rta= $this->db->query('select Id_cita from cita order by Id_cita desc limit 1');
		return $rta->result_array();
	}

	public function buscar($nit) {
		$this->db->from('cita');
		$this->db->where('Terceros_Nit',$nit);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function cancelar($dato) {
		$this->db->where('Id_cita', $dato);
		return $this->db->delete('cita');
	}
	public function cancelar_relacion($dato) {
		$this->db->where('Cita_Id_cita', $dato);
		return $this->db->delete('cita_tiene_operaciones');
	}


	public function listar_proximas($dato){
		$this->db->from('cita');
		$this->db->where('Fecha_inicial <',$dato);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function listar(){
		$this->db->from('cita');
		$query = $this->db->get();
		return $query->result_array();
	}

}
