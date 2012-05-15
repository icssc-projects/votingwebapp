<?php
class Auth extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

	/**
	* Verify Login
	*
	*/
	function verifyLogin($username,$password)
	{
		$username = $this->db->escape($username);
		$password = $this->db->escape($password);

		$query = $this->db->query("SELECT uid, username FROM users WHERE username = $username AND password = $password");

		if ($query->num_rows() <= 0)
		    $status = "FALSE";
		else if ($query->num_rows() == 1)
		    $status = $query->row_array();
		else // More than one record than something is really wrong!
		    $status = "TRUE";

		return $status;
	}

}
?>