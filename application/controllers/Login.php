<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
		parent::__construct();		
		$this->load->model('M_login');
 
	}
 
	public function index(){
		$this->load->view('auth/form_login');
	}
 
	public function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('upass');
		$where = array(
			'username' => $username,
			'upass' => $password
			);
		$cek = $this->M_login->cek_login("users",$where)->num_rows();
		if($cek > 0){
 
			$data_session = array(
				'nama' => $username,
				'status' => "login"
				);
 
			$this->session->set_userdata($data_session);
 
			redirect(base_url("home"));
 
		}else{
			// echo "Username dan Password salah !";
			redirect(base_url("login"));
		}
	}
 
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('dashboard'));
	}
}
?>