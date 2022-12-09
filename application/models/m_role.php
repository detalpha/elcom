<?php 

class M_role extends CI_Model{	
	
	public $tablename = "roles";
	
	function get_data($where){
        return $this->db->get_where($this->tablename, $where)->result();
    }
    
    function get_list(){
		return $this->db->get($this->tablename)->result();
	}

	function store($data){

        return $this->db->insert($this->tablename, $data);
    }

	function update($data, $id){

		$this->db->set($data);
		$this->db->where('id', $id);
		return $this->db->update($this->tablename);
	}

	function delete($id){

        $this->db->delete($this->tablename, array('id' => $id));

        return true;
	}
}