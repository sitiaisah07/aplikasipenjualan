<?php

class Model_pelanggan extends Ci_Model
{
    function getDataPelanggan()
    {
		$cabang = $this->session->userdata('kode_cabang');
		if($cabang != "PST") {
			$this->db->where('pelanggan.kode_cabang', $cabang);
		}
        $this->db->join('cabang', 'pelanggan.kode_cabang = cabang.kode_cabang');
        return $this->db->get('pelanggan');
    }

    function insertPelanggan($data)
	{
		$simpan = $this->db->insert('pelanggan', $data);
		if($simpan) {
			return 1;
		} else {
			return 0;
		}
	}

    function getPelanggan($kodepelanggan)
	{
		return $this->db->get_where('pelanggan', array('kode_pelanggan' => $kodepelanggan));
	}

    function updatePelanggan($data, $kodepelanggan)
	{
		$simpan = $this->db->update('pelanggan', $data, array('kode_pelanggan' => $kodepelanggan));
		if($simpan) {
			return 1;
		} else {
			return 0;
		}
	}

	function deletePelanggan($kodepelanggan)
	{
		$hapus = $this->db->delete('pelanggan', array('kode_pelanggan' => $kodepelanggan));
		if($hapus){
			return 1;
		}else {
			return 0;
		}
	}
}