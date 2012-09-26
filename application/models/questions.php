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

}
/* End of file teams.php */
/* Location: ./application/models/teams.php */