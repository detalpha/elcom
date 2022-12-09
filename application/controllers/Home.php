<?php 

class Home extends CI_Controller{

	function __construct(){
		parent::__construct();

		//$this->load->library('session');
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}

	function index(){

		$data["tabtitle"] = "Dashboard";
		$this->template->load('template','home','', $data);
	}
}