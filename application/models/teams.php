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

//SELECT tid, COUNT(question) AS count FROM results WHERE uid = 1 GROUP BY tid;
	function hasFinishedVoting($uid)
	{
		$query = $this->db->query('SELECT tid, COUNT(question) AS count FROM results WHERE uid = '.$this->db->escape($uid).' GROUP BY tid');
		$numberOfQuestions = $this->_countQuestions();
		foreach($query->result_array() as $key)
			if($key['count'] != $numberOfQuestions)
				$results[$key['tid']] = FALSE;
			else
				$results[$key['tid']] = TRUE;
		
		return $results;
	}

	private function _countQuestions()
	{
		return $this->db->count_all('questions');
	}

}
/* End of file teams.php */
/* Location: ./application/models/teams.php */