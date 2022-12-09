<?php 

class Role extends CI_Controller{

	function __construct(){
		parent::__construct();

		//$this->load->library('session');
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
        }

		$this->load->model('m_role');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
	}

	function index(){

		$data["tabtitle"] = "User";
		$data["listkontrak"] = $this->m_role->get_list();

		// echo print_r($data);
		// return;

		$this->template->load('template','role/index','role/footer',$data);
	}

	function add(){
		
        $data["tabtitle"] = "Tambah Role";

		$this->template->load('template','role/add','role/addfooter',$data);
	}

	function store(){
		
		$ruleset = array(
			array(
					'field' => 'namarole',
					'label' => 'Nama Role',
					'rules' => 'required'
            )
		);

        $this->form_validation->set_rules($ruleset);
        
		if ($this->form_validation->run() == FALSE)
		{
            $data["tabtitle"] = "Tambah Role";

            $this->template->load('template','role/add','role/addfooter',$data);
			// echo "masuk pak eko";
			// return;
		}
		else
		{

            try{

                $this->db->trans_begin();

                $namarole = $this->input->post('namarole');
                $slug = $this->input->post('slug');
                $menulist = $this->input->post('menu');
                $user_id = $this->session->userdata('user_id');

                $arr_permission = array();

                foreach($menulist as $menu){
                    $arr_permission[$menu] = true;
                }

                $data = array(
                    'name' => $namarole,
                    'slug' => $slug,
                    'permissions' => json_encode($arr_permission),
                    'createdby' => $user_id,
                    'createdat' => date('Y-m-d H:i:s')
                );
                
                $insertId = $this->m_role->store($data);

                $this->db->trans_commit();
            }
            catch (Exception $ex){
                $this->db->trans_rollback();
            }

			redirect(base_url('Role'));
		}
	}

	function edit($id){
		
		$data["tabtitle"] = "Ubah Role";
		$data["id"] = $id;
		$data["datakontrak"] = $this->m_role->get_data(array('id' => $id));

		// echo print_r($data);
		// return;

		$this->template->load('template','role/edit','role/addfooter',$data);
	}

	function update(){
		
		$ruleset = array(
			array(
					'field' => 'namarole',
					'label' => 'Nama Role',
					'rules' => 'required'
            )
		);

        $this->form_validation->set_rules($ruleset);
        $id = $this->input->post('id');
                
		if ($this->form_validation->run() == FALSE)
		{
            $data["tabtitle"] = "Ubah Role";
            $data["id"] = $id;
            $data["datakontrak"] = $this->m_role->get_data(array('id' => $id));

            $this->template->load('template','role/edit','role/addfooter',$data);
		}
		else
		{

			try{

                $this->db->trans_begin();

                $namarole = $this->input->post('namarole');
                $slug = $this->input->post('slug');
                $menulist = $this->input->post('menu');
                $user_id = $this->session->userdata('user_id');

                $arr_permission = array();

                foreach($menulist as $menu){
                    $arr_permission[$menu] = true;
                }

                $data = array(
                    'name' => $namarole,
                    'slug' => $slug,
                    'permissions' => json_encode($arr_permission),
                    'updatedby' => $user_id,
                    'updatedat' => date('Y-m-d H:i:s')
                );
                
                $this->m_role->update($data, $id);

                $this->db->trans_commit();
            }
            catch (Exception $ex){
                $this->db->trans_rollback();
            }

			redirect(base_url('Role'));
		}
	}

	function delete($id){
		
		$this->m_role->delete($id);

		redirect(base_url('Role'));
	}
}