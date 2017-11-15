<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Op_usuarios extends CI_Controller {

	var $user;

	function __construct() {
        	parent::__construct();
    	}

	public function index() {

		if($this->session->userdata('Nit')){
			$this->load->model('Usuarios');
			$filtro['cedula']= $this->Usuarios->filtro($this->session->userdata('Nit'));
			$this->load->view('usuario/menu',$filtro);
		}else {

		redirect(site_url());
	}


}

	public function login(){
		$this->load->view('login/login_usuario');
	}


	public function validar() {
		if ( ! $this->input->post('Nit') && ! $this->input->post('password'))
		{
			redirect('Op_usuarios/login');
		} else {
			$cedula = $this->input->post('Nit');
			$pass = $this->input->post('pass');

			if($this->Login_usuarios->login($cedula, $pass)) {

				$this->session->set_userdata('Nit',$cedula);
				redirect('Op_usuarios');

			}
			else{
				$this->load->view('login/error');
			}
		}
	}


	public function agendar_view(){
		$this->load->view('cliente/agendar');
	}
////////////////////////////   CITAS  //////////////////////////////////////

	 public function gestion_citas(){
		 $this->load->view('usuario/gestion_citas');
	 }

	 public function proximas(){
		 
	 }

}
