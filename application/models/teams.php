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

}
/* End of file teams.php */
/* Location: ./application/models/teams.php */