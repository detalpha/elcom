<?php 

class Login extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('m_login');

	}

	function index(){
		$this->load->view('auth/login');
	}

	function login(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$where = array(
			'email' => $email,
			'password' => md5($password)
			);
		$cek = $this->m_login->cek_login($where);
		if($cek->num_rows() > 0){

			$user_data = $cek->result();

			$data_session = array(
				'nama' => $user_data[0]->name,
				'user_id' => $user_data[0]->id,
				'status' => "login",
				'permission' => $user_data[0]->permissions
			);
			
			$this->session->set_userdata($data_session);

			redirect(base_url("Home"));

		}else{
			$data['loginerror'] = "Username dan password salah !";
			$this->load->view('auth/login', $data);
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}