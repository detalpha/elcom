<?php 

class M_user extends CI_Model{	
	
	public $tablename = "users";
	
	function get_data($where){
        $this->db->select('u.*, r.name as rolename, r.id as role_id');
        $this->db->join('users_roles as ur', 'u.id = ur.id_user', 'left');
        $this->db->join('roles as r', 'ur.id_role = r.id', 'left');
        return $this->db->get_where('users as u', $where)->result();
    }
    
    function get_list(){
		$this->db->select('u.*, r.name as rolename');
        $this->db->join('users_roles as ur', 'u.id = ur.id_user', 'left');
        $this->db->join('roles as r', 'ur.id_role = r.id', 'left');
        $this->db->where_not_in('u.id', 1);
        return $this->db->get('users as u')->result();
	}

    function get_role_list($where = null){
        
        if(!empty($where)){
            $this->db->where($where);
        }
        return $this->db->get("roles")->result();
	}

	function store($data){

        $this->db->insert($this->tablename, $data);
        $insertId = $this->db->insert_id();

		return $insertId;
    }
    
    function storerole($data){

        return $this->db->insert("users_roles", $data);
	}

	function update($data, $id){

		$this->db->set($data);
		$this->db->where('id', $id);
		return $this->db->update($this->tablename);
	}

	function updaterole($data, $id){

		$this->db->set($data);
		$this->db->where('id_user', $id);
		return $this->db->update("users_roles");
	}

	function delete($id){

        $this->db->delete($this->tablename, array('id' => $id));
        $this->db->delete("users_roles", array('id_user' => $id));

        return true;
	}
}