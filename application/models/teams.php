<?php

class Teams extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }


    function getAllTeams()
    {
		return $this->db->get('teams');
    }

	/*
	* It is the job of the callee to see if an account
	* is valid, not the caller.
	*/
	function getTeam($tid)
	{
		if(!$this->isValidTeam($tid))
			return false;

		return $this->db->get_where('teams', array('tid' => $tid));
	}

	function isValidTeam($tid)
	{
		$query = $this->db->get_where('teams', array('tid' => $tid));
		
		if($query->num_rows() == 1)
			return true;
		else
			return false;
	}

}
/* End of file teams.php */
/* Location: ./application/models/teams.php */