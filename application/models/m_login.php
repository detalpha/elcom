<?php 

class M_login extends CI_Model{	
	
	function cek_login($where){

		$this->db->select('u.*, r.permissions');
        $this->db->join('users_roles as ur', 'u.id = ur.id_user', 'left');
        $this->db->join('roles as r', 'ur.id_role = r.id', 'left');
		return $this->db->get_where("users as u",$where);
	}

}