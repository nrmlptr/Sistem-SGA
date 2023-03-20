<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	// public function __construct(){
	// 	parent::__construct();		
	// 	$this->load->model('M_login');
 
	// }
 
	public function index(){
		$this->load->view('auth/form_login');
	}
 
	//buat metode yang berfungsi untuk seleksi data input == data db
	public function aksi_login(){
		//inputan user
		$username = $this->input->post('username');
		$password = $this->input->post('upass');

		//bandingkan inputan dengan data tersimpan di db
		$this->load->model('M_login');
		$getUser = $this->M_login->cek_login($username,$password);
		// var_dump($getUser);die;
		if(!$getUser){
			redirect('Login/index');
		}else{
			$datauser = array(
				'username' => $username,
				'akses' => $getUser->akses,
				'logged_in' => TRUE
			);
			$this->session->set_userdata($datauser); //<- buat session untuk  hak izin akses

			if($getUser->akses == 1){
				redirect('home/Home_Admin');
			}elseif($getUser->akses == 2){
				// // //deklarasikan logged_at
				// $identifier = $this->session->set_userdata('Juri 1');
            	// $logged_at = date('Y-m-d');

				// //bandingkan inputan dengan data tersimpan di db
				// $this->load->model('M_login');
				// $cekLog = $this->M_login->cek_logjuri($identifier,$logged_at);
				// var_dump($cekLog);die;
				// if($cekLog){
				// 	$this->session->set_userdata('Juri 1');
					redirect('home/Home_Juri');
				// }else{
				// 	// $this->session->set_userdata('Juri ');
				// }redirect('Login/index');

				
				
			}
		}
	}
 
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('dashboard'));
	}
}
?>