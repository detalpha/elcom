<?php 

class AmandemenKontrak extends CI_Controller{

	function __construct(){
		parent::__construct();

		//$this->load->library('session');
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
        }

		$this->load->model('m_amandemenkontrak');
		$this->load->model('m_kontrak');
		$this->load->helper(array('form', 'url'));
		$config['allowed_types']	= 'pdf'; // file yang di perbolehkan
		$config['upload_path']		= './files/';
		$config['encrypt_name']		= true;
		$this->load->library('upload', $config);
		$this->load->library('form_validation');
	}

	function index(){

		$data["tabtitle"] = "Amandemen Kontrak";
		$data["listdata"] = $this->m_amandemenkontrak->get_list();

		$this->template->load('template','amandemenkontrak/index','amandemenkontrak/footer',$data);
	}

	function add(){
		
		$data["tabtitle"] = "Tambah Amandemen Kontrak";
		$data["listkontrak"] = $this->m_kontrak->get_list();

		$this->template->load('template','amandemenkontrak/add','amandemenkontrak/addfooter',$data);
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
		$data["tabtitle"] = "Tambah Amandemen Kontrak";

		if ($this->form_validation->run() == FALSE)
		{
			$this->template->load('template','amandemenkontrak/add','amandemenkontrak/addfooter',$data);
		}
		else
		{

			$dokumen="";

			if ( ! $this->upload->do_upload("dokumen")){
				
				$data["error"] = $this->upload->display_errors();
				
				$this->template->load('template','amandemenkontrak/add','amandemenkontrak/addfooter',$data);
				
			}else{

				$dokumen = $this->upload->data('file_name');
			}

			$nomoramandemen = $this->input->post('nomoramandemen');
			$nokontrak = $this->input->post('nomorkontrak');
			$gbamandemen = $this->input->post('gbamandemen');
			$durasikontrak = $this->input->post('durasikontrak');
			$satuandurasi = $this->input->post('satuandurasi');
			$nilaikontrak = $this->input->post('nilaikontrak');
			$klausakontrak = $this->input->post('klausakontrak');
			$user_id = $this->session->userdata('user_id');

			$data = array(

				'no_amandemen' => $nomoramandemen,
				'no_kontrak' => $nokontrak,
				'gb_amandemen' => $gbamandemen,
				'revisi_durasi' => $durasikontrak,
				'satuan_durasi' => $satuandurasi,
				'revisi_nilai' => str_replace(',', '.', str_replace('.', '', $nilaikontrak)),
				'revisi_klausa' => $klausakontrak,
				'filename' => $dokumen,
				'createdby' => $user_id,
				'createdat' => date('Y-m-d H:i:s')
			);

			$this->m_amandemenkontrak->store($data);

			redirect(base_url('AmandemenKontrak'));
		}
	}

	function edit($id){
		
		$data["tabtitle"] = "Ubah Amandemen Kontrak";
		$data["id"] = $id;
		$data["datakontrak"] = $this->m_amandemenkontrak->get_data(array('id' => $id));
		$data["listkontrak"] = $this->m_kontrak->get_list();

		$this->template->load('template','amandemenkontrak/edit','amandemenkontrak/addfooter',$data);
	}

	function update(){
		
		$ruleset = array(
			array(
					'field' => 'nomoramandemen',
					'label' => 'Nomor Amandemen',
					'rules' => 'required',
					'errors' => array(
							'required' => '%s wajib diisi.'
					),
			)
		);

		$this->form_validation->set_rules($ruleset);

		$id = $this->input->post('id');

		$data["tabtitle"] = "Ubah Amandemen Kontrak";
		$data["id"] = $id;
		$data["datakontrak"] = $this->m_amandemenkontrak->get_data(array('id' => $id));
		$data["listkontrak"] = $this->m_kontrak->get_list();

		if ($this->form_validation->run() == FALSE)
		{
			$this->template->load('template','amandemenkontrak/edit','amandemenkontrak/addfooter',$data);
		}
		else
		{

			$dokumen="";

			if ( ! $this->upload->do_upload("dokumen")){
				
				$data["error"] = $this->upload->display_errors();
				
				$this->template->load('template','amandemenkontrak/add','amandemenkontrak/addfooter',$data);
				
			}else{

				$dokumen = $this->upload->data('file_name');
			}

			$nomoramandemen = $this->input->post('nomoramandemen');
			$nokontrak = $this->input->post('nomorkontrak');
			$gbamandemen = $this->input->post('gbamandemen');
			$durasikontrak = $this->input->post('durasikontrak');
			$satuandurasi = $this->input->post('satuandurasi');
			$nilaikontrak = $this->input->post('nilaikontrak');
			$klausakontrak = $this->input->post('klausakontrak');
			$user_id = $this->session->userdata('user_id');

			$data = array(

				'no_kontrak' => $nokontrak,
				'gb_amandemen' => $gbamandemen,
				'revisi_durasi' => $durasikontrak,
				'satuan_durasi' => $satuandurasi,
				'revisi_nilai' => str_replace(',', '.', str_replace('.', '', $nilaikontrak)),
				'revisi_klausa' => $klausakontrak,
				'filename' => $dokumen,
				'updatedby' => $user_id,
				'updatedat' => date('Y-m-d H:i:s')
			);

			// echo print_r($data);
			// return;

			$this->m_amandemenkontrak->update($data, $id);

			redirect(base_url('AmandemenKontrak'));
		}
	}

	function delete($id){
		
		$this->m_amandemenkontrak->delete($id);

		redirect(base_url('AmandemenKontrak'));
	}
}