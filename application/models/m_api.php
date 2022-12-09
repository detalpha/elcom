<?php 

class M_api extends CI_Model{	
	
	function get_notif_kontrak(){
        
        $this->db->select('*, DATEDIFF((Case WHEN ak.revisi_durasi is not null and ak.satuan_durasi = 1 Then DATE_ADD(tgl_mulai, INTERVAL ak.revisi_durasi DAY) WHEN ak.revisi_durasi is not null and ak.satuan_durasi = 2 Then DATE_ADD(tgl_mulai, INTERVAL ak.revisi_durasi WEEK) WHEN ak.revisi_durasi is not null and ak.satuan_durasi = 3 Then DATE_ADD(tgl_mulai, INTERVAL ak.revisi_durasi MONTH) else tgl_akhir END), now()) as hari, k.no_kontrak as no_kontrak_show');
        $this->db->join('(select no_kontrak, revisi_durasi, satuan_durasi from amandemen_kontraks Order By id DESC limit 1) as ak', 'k.id = ak.no_kontrak', 'left');
        $this->db->where_in('DATEDIFF((Case WHEN ak.revisi_durasi is not null and ak.satuan_durasi = 1 Then DATE_ADD(tgl_mulai, INTERVAL ak.revisi_durasi DAY) WHEN ak.revisi_durasi is not null and ak.satuan_durasi = 2 Then DATE_ADD(tgl_mulai, INTERVAL ak.revisi_durasi WEEK) WHEN ak.revisi_durasi is not null and ak.satuan_durasi = 3 Then DATE_ADD(tgl_mulai, INTERVAL ak.revisi_durasi MONTH) else tgl_akhir END), now())', array(10, 20, 30));
        $query = $this->db->get('kontraks as k');
        
        return $query;
    }
    
    function get_notif_bg(){
        
        $this->db->select('*, DATEDIFF(COALESCE(revisi_waktu, tgl_akhir), now()) as hari, k.no_kontrak as no_kontrak_show');
        $this->db->join('( Select no_kontrak, revisi_waktu from amandemen_banks Order By tgl_amandemen DESC limit 1 ) as ab', 'k.id = ab.no_kontrak', 'left');
        $this->db->where_in('DATEDIFF(COALESCE(revisi_waktu, tgl_akhir ), now())', array(15, 23, 30));
        $query = $this->db->get('kontraks as k');
        
        return $query;
	}
    
    function get_notif_garansi(){
        
        $this->db->select('*, DATEDIFF(new_tgl_garansi, now()) as hari');
        $this->db->join('( Select id, Case WHEN masa_garansi_unit = 1 Then DATE_ADD(tgl_mulai, INTERVAL masa_garansi DAY) WHEN masa_garansi_unit = 2 Then DATE_ADD(tgl_mulai, INTERVAL masa_garansi WEEK) WHEN masa_garansi_unit = 3 Then DATE_ADD(tgl_mulai, INTERVAL masa_garansi MONTH) END as new_tgl_garansi from kontraks ) as nk', 'k.id = nk.id');
        $this->db->where_in('DATEDIFF(new_tgl_garansi, now())', array(5, 10, 15));
        $query = $this->db->get('kontraks k');
        
        return $query;
	}
}