<?php

class Questions extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }


    function getAllQuestions()
    {
		return $this->db->get('questions');
    }

	function getMaxPoints()
	{
		$query = $this->db->query('SELECT sum(maxValue) AS maxPoints FROM questions');
		$row = $query->row();
		return $row->maxPoints;
	}

}
/* End of file teams.php */
/* Location: ./application/models/teams.php */