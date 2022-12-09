<?php 

class M_amandemenkontrak extends CI_Model{	
	
	public $tablename = "amandemen_kontraks";
	
	function get_data($where){
		return $this->db->get_where($this->tablename,$where)->result();
	}

	function get_list(){
		// return $this->db->get($this->tablename)->result();
		$this->db->select('ak.*, k.*, sd.*');
		$this->db->from($this->tablename." ak");
		$this->db->join('kontraks k', 'ak.no_kontrak = k.id');
		$this->db->join('satuan_durasi sd', 'ak.satuan_durasi = sd.id');
		return $this->db->get()->result();
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

		return $this->db->delete($this->tablename, array('id' => $id));
	}
}