<?php
class Model_user extends CI_Model
{
    function getDatauser()
    {
        return $this->db->get('users');
    }

    function insertUser($data)
    {
        $simpan = $this->db->insert('users', $data);
		if($simpan) {
			return 1;
		} else {
			return 0;
		}
    }

    function getUser($id_user)
	{
		return $this->db->get_where('users', array('id_user' => $id_user));
	}

    function deleteUser($id_user)
	{
		$hapus = $this->db->delete('users', array('id_user' => $id_user));
		if($hapus){
			return 1;
		}else {
			return 0;
		}
	}
}