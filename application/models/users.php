<?php

class Users extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    

    function isUserPresent($user,$pass)
    {
		$this->db->select("uid");
		$this->db->where('user', $user); 
		$this->db->where('pass', $pass); 
		$query = $this->db->get('users');

		if($query->num_rows() <= 0)
			return false;
		else
			return true;
    }

    function getUserInfo($user)
    {
		$this->db->where('user', $user); 
		$query = $this->db->get('users');

		if($query->num_rows() <= 0)
			return false;
		else
			return $query->row();
    }

}
/* End of file users.php */
/* Location: ./application/models/users.php */