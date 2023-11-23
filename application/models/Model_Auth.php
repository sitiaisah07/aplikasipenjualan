	<?php
	class Model_Auth extends CI_Model
	{
		function getlogin($username, $password)
		{
			return $this->db->get_where('users', array('username' => $username,'password' => $password));
		}
	}
	