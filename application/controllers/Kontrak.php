<?php 

class Kontrak extends CI_Controller{

	function __construct(){
		parent::__construct();

		//$this->load->library('session');
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
        }

		$this->load->model('m_kontrak');
		$this->load->helper(array('form', 'url'));

		$config['allowed_types']	= 'pdf'; // file yang di perbolehkan
		$config['upload_path']		= './files/';
		$config['encrypt_name']		= true;
		$this->load->library('upload', $config);
		$this->load->library('form_validation');
	}

	function index(){

		$data["tabtitle"] = "Kontrak";
		$data["listkontrak"] = $this->m_kontrak->get_list();

		// echo print_r($data);
		// return;

		$this->template->load('template','kontrak/index','kontrak/footer',$data);
	}

	function add(){
		
		$data["tabtitle"] = "Tambah Kontrak";

		$this->template->load('template','kontrak/add','kontrak/addfooter',$data);
	}

	function store(){
		
		$ruleset = array(
			array(
					'field' => 'nokontrak',
					'label' => 'Nomor Kontrak',
					'rules' => 'required|is_unique[kontraks.no_kontrak]',
					'errors' => array(
							'is_unique' => '%s sudah ada.',
							'required' => '%s wajib diisi.'
					),
			)
		);

		$this->form_validation->set_rules($ruleset);
		$data["tabtitle"] = "Tambah Kontrak";

		if ($this->form_validation->run() == FALSE)
		{
			$this->template->load('template','kontrak/add','kontrak/addfooter',$data);
		}
		else
		{

			$bappfile="";
			$bast1file="";
			$bast2file="";

			if ( ! $this->upload->do_upload("bappfile")){
				
				$data["error"] = $this->upload->display_errors();
				
				$this->template->load('template','kontrak/add','kontrak/addfooter',$data);
				
			}else{

				$bappfile = $this->upload->data('file_name');
			}

			if ( ! $this->upload->do_upload("bast1file")){

				$data["error"] = $this->upload->display_errors();
				
				$this->template->load('template','kontrak/add','kontrak/addfooter',$data);

			}else{

				$bast1file = $this->upload->data('file_name');
			}

			if ( ! $this->upload->do_upload("bast2file")){
				$data["error"] = $this->upload->display_errors();
				
				$this->template->load('template','kontrak/add','kontrak/addfooter',$data);

			}else{

				$bast2file = $this->upload->data('file_name');
			}

			$nokontrak = $this->input->post('nokontrak');
			$namakontrak = $this->input->post('namakontrak');
			$tglkontrak = $this->input->post('tglkontrak');
			$tglmulai = $this->input->post('tglmulai');
			$durasikontrak = $this->input->post('durasikontrak');
			$satuandurasi = $this->input->post('satuandurasi');
			$tglselesai = $this->input->post('tglselesai');
			$nilaikontrak = $this->input->post('nilaikontrak');
			$matauang = $this->input->post('matauang');
			$masagaransi = $this->input->post('masagaransi');
			$satuangaransi = $this->input->post('satuangaransi');
			$nomorbank = $this->input->post('nomorbank');
			$nilaibg = $this->input->post('nilaibg');
			$matauangbg = $this->input->post('matauangbg');
			$tglexpbg = $this->input->post('tglexpbg');
			$emailuser = $this->input->post('emailuser');
			$user_id = $this->session->userdata('user_id');

			$new_email = array();

			foreach($emailuser as $email)
			{
				$new_email[] = $email;
			}

			$res_email = implode(';',$new_email);

			$data = array(

				'no_kontrak' => $nokontrak,
				'nama_kontrak' => $namakontrak,
				'tgl_kontrak' => DateTime::createFromFormat('d/m/Y', $tglkontrak)->format('Y-m-d'),
				'tgl_mulai' => DateTime::createFromFormat('d/m/Y', $tglmulai)->format('Y-m-d'),
				'duration' => $durasikontrak,
				'duration_unit' => $satuandurasi,
				'tgl_akhir' => DateTime::createFromFormat('d/m/Y', $tglselesai)->format('Y-m-d'),
				'email_user' => $res_email,
				'mata_uang' => $matauang,
				'nilai_kontrak' => str_replace(',', '.', str_replace('.', '', $nilaikontrak)),
				'masa_garansi' => $masagaransi,
				'masa_garansi_unit' => $satuangaransi,
				'no_bg' => $nomorbank,
				'nilai_bg' => str_replace(',', '.', str_replace('.', '', $nilaibg)),
				'mata_uang_bg' => $matauangbg,
				// 'tgl_exp_bg' => DateTime::createFromFormat('d/m/Y', $tglexpbg)->format('Y-m-d'),
				'bapp_file' => $bappfile,
				'bast_file_1' => $bast1file,
				'bast_file_2' => $bast2file,
				'createdby' => $user_id,
				'createdat' => date('Y-m-d H:i:s')
			);

			// if(!empty($nomorbank)){
			// 	$data['no_bg'] = $nomorbank;
			// }

			// if(!empty($nilaibg)){
			// 	$data['nilai_bg'] = str_replace(',', '.', str_replace('.', '', $nilaibg));
			// }

			// if(!empty($matauangbg)){
			// 	$data['mata_uang_bg'] = $matauangbg;
			// }

			if(!empty($tglexpbg)){
				$data['tgl_exp_bg'] = DateTime::createFromFormat('d/m/Y', $tglexpbg)->format('Y-m-d');
			}

			$this->m_kontrak->store($data);

			redirect(base_url('Kontrak'));
		}
	}

	function edit($id){
		
		$data["tabtitle"] = "Ubah Kontrak";
		$data["id"] = $id;
		$data["datakontrak"] = $this->m_kontrak->get_data(array('id' => $id));

		// echo print_r($data);
		// return;

		$this->template->load('template','kontrak/edit','kontrak/addfooter',$data);
	}

	function update(){
		
		$ruleset = array(
			array(
					'field' => 'nokontrak',
					'label' => 'No Kontrak',
					'rules' => 'required'
			)
		);

		$this->form_validation->set_rules($ruleset);

		$id = $this->input->post('id');

		$data["tabtitle"] = "Ubah Kontrak";
		$data["id"] = $id;
		$data["datakontrak"] = $this->m_kontrak->get_data(array('id' => $id));

		if ($this->form_validation->run() == FALSE)
		{
			$this->template->load('template','kontrak/edit','kontrak/addfooter',$data);
			// echo "masuk pak eko";
			// return;
		}
		else
		{

			$bappfile="";
			$bast1file="";
			$bast2file="";

			if (!empty($_FILES['bappfile']['name'])) {
				if ( ! $this->upload->do_upload("bappfile")){
				
					$data["error"] = $this->upload->display_errors();
					
					$this->template->load('template','kontrak/edit','kontrak/addfooter',$data);
					
				}else{
	
					$bappfile = $this->upload->data('file_name');
				}
			}

			if (!empty($_FILES['bast1file']['name'])) {
				if ( ! $this->upload->do_upload("bast1file")){

					$data["error"] = $this->upload->display_errors();
					
					$this->template->load('template','kontrak/edit','kontrak/addfooter',$data);

				}else{

					$bast1file = $this->upload->data('file_name');
				}
			}

			if (!empty($_FILES['bast2file']['name'])) {
				if ( ! $this->upload->do_upload("bast2file")){
					$data["error"] = $this->upload->display_errors();
					
					$this->template->load('template','kontrak/edit','kontrak/addfooter',$data);

				}else{

					$bast2file = $this->upload->data('file_name');
				}
			}

			$namakontrak = $this->input->post('namakontrak');
			$tglkontrak = $this->input->post('tglkontrak');
			$tglmulai = $this->input->post('tglmulai');
			$durasikontrak = $this->input->post('durasikontrak');
			$satuandurasi = $this->input->post('satuandurasi');
			$tglselesai = $this->input->post('tglselesai');
			$nilaikontrak = $this->input->post('nilaikontrak');
			$matauang = $this->input->post('matauang');
			$masagaransi = $this->input->post('masagaransi');
			$satuangaransi = $this->input->post('satuangaransi');
			$nomorbank = $this->input->post('nomorbank');
			$nilaibg = $this->input->post('nilaibg');
			$matauangbg = $this->input->post('matauangbg');
			$tglexpbg = $this->input->post('tglexpbg');
			$emailuser = $this->input->post('emailuser');
			$user_id = $this->session->userdata('user_id');

			$new_email = array();

			foreach($emailuser as $email)
			{
				$new_email[] = $email;
			}

			$res_email = implode(';',$new_email);

			$data = array(

				'nama_kontrak' => $namakontrak,
				'tgl_kontrak' => DateTime::createFromFormat('d/m/Y', $tglkontrak)->format('Y-m-d'),
				'tgl_mulai' => DateTime::createFromFormat('d/m/Y', $tglmulai)->format('Y-m-d'),
				'duration' => $durasikontrak,
				'duration_unit' => $satuandurasi,
				'tgl_akhir' => DateTime::createFromFormat('d/m/Y', $tglselesai)->format('Y-m-d'),
				'email_user' => $res_email,
				'mata_uang' => $matauang,
				'nilai_kontrak' => str_replace(',', '.', str_replace('.', '', $nilaikontrak)),
				'masa_garansi' => $masagaransi,
				'masa_garansi_unit' => $satuangaransi,
				'no_bg' => $nomorbank,
				'nilai_bg' => str_replace(',', '.', str_replace('.', '', $nilaibg)),
				'mata_uang_bg' => $matauangbg,
				// 'tgl_exp_bg' => DateTime::createFromFormat('d/m/Y', $tglexpbg)->format('Y-m-d'),
				'updatedby' => $user_id,
				'updatedat' => date('Y-m-d H:i:s')
			);

			// if(!empty($nomorbank)){
			// 	$data['no_bg'] = $nomorbank;
			// }

			// if(!empty($nilaibg)){
			// 	$data['nilai_bg'] = str_replace(',', '.', str_replace('.', '', $nilaibg));
			// }

			// if(!empty($matauangbg)){
			// 	$data['mata_uang_bg'] = $matauangbg;
			// }

			if(!empty($tglexpbg)){
				$data['tgl_exp_bg'] = DateTime::createFromFormat('d/m/Y', $tglexpbg)->format('Y-m-d');
			}else{
				$data['tgl_exp_bg'] = '';
			}

			if(!empty($bappfile)){
				$data['bapp_file'] = $bappfile;
			}

			if(!empty($bast1file)){
				$data['bast_file_1'] = $bast1file;
			}

			if(!empty($bast2file)){
				$data['bast_file_2'] = $bast2file;
			}

			// echo print_r($data);
			// return;

			$this->m_kontrak->update($data, $id);

			redirect(base_url('Kontrak'));
		}
	}

	function delete($id){
		
		$this->m_kontrak->delete($id);

		redirect(base_url('Kontrak'));
	}
}