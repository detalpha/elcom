<?php 

class User extends CI_Controller{

	function __construct(){
		parent::__construct();

		//$this->load->library('session');
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
        }

		$this->load->model('m_user');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
	}

	function index(){

		$data["tabtitle"] = "User";
		$data["listkontrak"] = $this->m_user->get_list();

		// echo print_r($data);
		// return;

		$this->template->load('template','user/index','user/footer',$data);
	}

	function add(){
		
        $data["tabtitle"] = "Tambah User";
        $data["listrole"] = $this->m_user->get_role_list();

		$this->template->load('template','user/add','user/addfooter',$data);
	}

	function store(){
		
		$ruleset = array(
			array(
					'field' => 'email',
					'label' => 'Email',
					'rules' => 'valid_email|is_unique[users.email]'
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required'
			),
            array(
                'field' => 'passconf',
                'label' => 'Password Confirmation',
                'rules' => 'matches[password]'
			)
		);

		$this->form_validation->set_rules($ruleset);
		$data["tabtitle"] = "Tambah User";
        $data["listrole"] = $this->m_user->get_role_list();

		if ($this->form_validation->run() == FALSE)
		{
			$this->template->load('template','user/add','user/addfooter',$data);
			// echo "masuk pak eko";
			// return;
		}
		else
		{

            try{

                $this->db->trans_begin();

                $email = $this->input->post('email');
                $nama = $this->input->post('nama');
                $password = $this->input->post('password');
                $role = $this->input->post('role');
                $user_id = $this->session->userdata('user_id');

                $data = array(
                    'email' => $email,
                    'name' => $nama,
                    'password' => md5($password),
                    'createdby' => $user_id,
                    'createdat' => date('Y-m-d H:i:s')
                );
                
                $insertId = $this->m_user->store($data);

                $datarole = array(
                    'id_user' => $insertId,
                    'id_role' => $role
                );

                $this->m_user->storerole($datarole);
                $this->db->trans_commit();
            }
            catch (Exception $ex){
                $this->db->trans_rollback();
            }

			redirect(base_url('User'));
		}
	}

	function edit($id){
		
		$data["tabtitle"] = "Ubah User";
		$data["id"] = $id;
		$data["datakontrak"] = $this->m_user->get_data(array('u.id' => $id));
        $data["listrole"] = $this->m_user->get_role_list();

		// echo print_r($data);
		// return;

		$this->template->load('template','user/edit','user/addfooter',$data);
	}

	function update(){
		
		$this->form_validation->set_rules('email', 'Email', 'valid_email');

        if(!empty($this->input->post('password')) || !empty($this->input->post('passconf'))){
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');
        }

        $id = $this->input->post('id');
        
        $data["tabtitle"] = "Ubah User";
		$data["id"] = $id;
		$data["datakontrak"] = $this->m_user->get_data(array('u.id' => $id));
        $data["listrole"] = $this->m_user->get_role_list();

		if ($this->form_validation->run() == FALSE)
		{
			$this->template->load('template','user/edit','user/addfooter',$data);
			// echo "masuk pak eko";
			// return;
		}
		else
		{

			try{

                $this->db->trans_begin();

                $nama = $this->input->post('nama');
                $password = $this->input->post('password');
                $role = $this->input->post('role');
                $user_id = $this->session->userdata('user_id');

                $data = array(
                    'name' => $nama,
                    'updatedby' => $user_id,
                    'updatedat' => date('Y-m-d H:i:s')
                );

                if(!empty($password)){
                    $data['password'] = md5($password);
                }
                
                $this->m_user->update($data, $id);

                $datarole = array(
                    'id_role' => $role
                );

                $this->m_user->updaterole($datarole, $id);
                $this->db->trans_commit();
            }
            catch (Exception $ex){
                $this->db->trans_rollback();
            }

			redirect(base_url('User'));
		}
    }
    
    function editprofile(){
        
        $id = $this->session->userdata('user_id');
		$data["tabtitle"] = "Ubah Profile";
		$data["id"] = $id;
		$data["datakontrak"] = $this->m_user->get_data(array('u.id' => $id));

		// echo print_r($data);
		// return;

		$this->template->load('template','user/editprofile','user/addfooter',$data);
	}

	function updateprofile(){

        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if(!empty($this->input->post('password')) || !empty($this->input->post('passconf'))){
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');
        }

		$id = $this->session->userdata('user_id');
		$data["tabtitle"] = "Ubah User";
		$data["id"] = $id;
		$data["datakontrak"] = $this->m_user->get_data(array('u.id' => $id));

		if ($this->form_validation->run() == FALSE)
		{
			$this->template->load('template','user/editprofile','user/addfooter',$data);
			// echo "masuk pak eko";
			// return;
		}
		else
		{

			try{

                $this->db->trans_begin();

                $id = $this->input->post('id');
                $nama = $this->input->post('nama');
                $password = $this->input->post('password');
                $role = $this->input->post('role');
                $user_id = $this->session->userdata('user_id');

                $data = array(
                    'name' => $nama,
                    'updatedby' => $user_id,
                    'updatedat' => date('Y-m-d H:i:s')
                );

                if(!empty($password)){
                    $data['password'] = md5($password);
                }
                
                $this->m_user->update($data, $id);

                $this->db->trans_commit();
            }
            catch (Exception $ex){
                $this->db->trans_rollback();
            }

			redirect(base_url('Home'));
		}
	}

	function delete($id){
		
		$this->m_user->delete($id);

		redirect(base_url('User'));
	}
}