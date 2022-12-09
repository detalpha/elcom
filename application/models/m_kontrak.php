<?php 

class M_kontrak extends CI_Model{	
	
	public $tablename = "kontraks";
	
	function get_data($where){
		return $this->db->get_where($this->tablename,$where)->result();
	}

	function get_list(){
		// return $this->db->get($this->tablename)->result();

		$this->db->select('k.id, k.no_kontrak, k.nama_kontrak, k.tgl_kontrak, COALESCE(revisi_nilai, nilai_kontrak) as nilai_kontrak, (Case WHEN ak.revisi_durasi is not null and ak.satuan_durasi = 1 Then DATE_ADD(tgl_mulai, INTERVAL ak.revisi_durasi DAY) WHEN ak.revisi_durasi is not null and ak.satuan_durasi = 2 Then DATE_ADD(tgl_mulai, INTERVAL ak.revisi_durasi WEEK) WHEN ak.revisi_durasi is not null and ak.satuan_durasi = 3 Then DATE_ADD(tgl_mulai, INTERVAL ak.revisi_durasi MONTH) else tgl_akhir END) as tgl_akhir, DATEDIFF((Case WHEN ak.revisi_durasi is not null and ak.satuan_durasi = 1 Then DATE_ADD(tgl_mulai, INTERVAL ak.revisi_durasi DAY) WHEN ak.revisi_durasi is not null and ak.satuan_durasi = 2 Then DATE_ADD(tgl_mulai, INTERVAL ak.revisi_durasi WEEK) WHEN ak.revisi_durasi is not null and ak.satuan_durasi = 3 Then DATE_ADD(tgl_mulai, INTERVAL ak.revisi_durasi MONTH) else tgl_akhir END), now()) as selisih_hari');
        $this->db->join('(select * from amandemen_kontraks Order By id DESC limit 1) as ak', 'k.id = ak.no_kontrak', 'left');
        return $this->db->get('kontraks as k')->result();
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