<?php 

class AmandemenBank extends CI_Controller{

	function __construct(){
		parent::__construct();

		//$this->load->library('session');
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
        }

		$this->load->model('m_amandemenbank');
		$this->load->model('m_kontrak');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
	}

	function index(){

		$data["tabtitle"] = "Amandemen Bank";
		$data["listdata"] = $this->m_amandemenbank->get_list();

		// echo $this->db->last_query();
		// return;

		$this->template->load('template','amandemenbank/index','amandemenbank/footer',$data);
	}

	function add(){
		
		$data["tabtitle"] = "Tambah Amandemen Bank";
		$data["listkontrak"] = $this->m_kontrak->get_list();

		$this->template->load('template','amandemenbank/add','amandemenbank/addfooter',$data);
	}

	function store(){
		
		$ruleset = array(
			array(
					'field' => 'nomoramandemen',
					'label' => 'Nomor Amandemen',
					'rules' => 'required|is_unique[kontraks.no_kontrak]',
					'errors' => array(
							'is_unique' => '%s sudah ada.',
							'required' => '%s wajib diisi.'
					),
			)
		);

		$this->form_validation->set_rules($ruleset);

		if ($this->form_validation->run() == FALSE)
		{
			$data["tabtitle"] = "Tambah Amandemen Bank";
			$this->template->load('template','amandemenbank/add','amandemenbank/addfooter',$data);
		}
		else
		{

			$nomoramandemen = $this->input->post('nomoramandemen');
			$nomorkontrak = $this->input->post('nomorkontrak');
			$tglamandemen = $this->input->post('tglamandemen');
			$revisitgl = $this->input->post('revisitgl');
			$revisinilai = $this->input->post('revisinilai');
			$user_id = $this->session->userdata('user_id');

			$data = array(

				'no_amandemen' => $nomoramandemen,
				'no_kontrak' => $nomorkontrak,
				'tgl_amandemen' => DateTime::createFromFormat('d/m/Y', $tglamandemen)->format('Y-m-d'),
				'revisi_waktu' => DateTime::createFromFormat('d/m/Y', $revisitgl)->format('Y-m-d'),
				'revisi_nilai' => str_replace(',', '.', str_replace('.', '', $revisinilai)),
				'createdby' => $user_id,
				'createdat' => date('Y-m-d H:i:s')
			);

			$this->m_amandemenbank->store($data);

			redirect(base_url('AmandemenBank'));
		}
	}

	function edit($id){
		
		$data["tabtitle"] = "Ubah Amandemen Kontrak";
		$data["id"] = $id;
		$data["datakontrak"] = $this->m_amandemenbank->get_data(array('id' => $id));
		$data["listkontrak"] = $this->m_kontrak->get_list();

		$this->template->load('template','amandemenbank/edit','amandemenbank/addfooter',$data);
	}

	function update(){

		$ruleset = array(
			array(
					'field' => 'nomoramandemen',
					'label' => 'Nomor Amandemen',
					'rules' => 'required',
					'errors' => array(
							'is_unique' => '%s sudah ada.'
					),
			)
		);
		
		$this->form_validation->set_rules($ruleset);
		$id = $this->input->post('id');	

		if ($this->form_validation->run() == FALSE)
		{
			
			$data["tabtitle"] = "Ubah Amandemen Kontrak";
			$data["id"] = $id;
			$data["datakontrak"] = $this->m_amandemenbank->get_data(array('id' => $id));
			$data["listkontrak"] = $this->m_kontrak->get_list();

			$this->template->load('template','amandemenbank/edit','amandemenbank/addfooter',$data);
		}
		else
		{

			$nomorkontrak = $this->input->post('nomorkontrak');
			$tglamandemen = $this->input->post('tglamandemen');
			$revisitgl = $this->input->post('revisitgl');
			$revisinilai = $this->input->post('revisinilai');
			$user_id = $this->session->userdata('user_id');

			$data = array(

				'no_kontrak' => $nomorkontrak,
				'tgl_amandemen' => DateTime::createFromFormat('d/m/Y', $tglamandemen)->format('Y-m-d'),
				'revisi_waktu' => DateTime::createFromFormat('d/m/Y', $revisitgl)->format('Y-m-d'),
				'revisi_nilai' => str_replace(',', '.', str_replace('.', '', $revisinilai)),
				'updatedby' => $user_id,
				'updatedat' => date('Y-m-d H:i:s')
			);

			$this->m_amandemenbank->update($data, $id);

			redirect(base_url('AmandemenBank'));
		}
	}

	function delete($id){
		
		$this->m_amandemenbank->delete($id);

		redirect(base_url('AmandemenBank'));
	}
}