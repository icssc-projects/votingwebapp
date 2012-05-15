<?php
class Votes extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }


	function getTeams()
	{
		return $this->db->query("SELECT * FROM teams");
	}


	function insertScore($team, $data)
	{
		foreach($data as $question => $score) {
			$this->db->insert('results', array('tid' => $team, 'question' => $question, 'value' => $score)); 
		}

	}
	
	function getResults()
	{
		return $this->db->query("SELECT * FROM winners");
	
		// SELECT results.tid, teams.name, SUM(value) AS total, COUNT(results.tid) AS count FROM results, teams WHERE teams.id = results.tid GROUP BY results.tid ORDER BY total DESC;
	}
	
	function ajaxInsert($data)
	{
		$query = $this->db->query("SELECT * FROM ajaxResults WHERE uid = ".$data['uid']." AND tid = ".$data['tid']." AND question = ".$data['question']."");
		
		if($query->num_rows() == 0)
			$this->db->insert('ajaxResults', $data);
		else
		{
			$this->db->where('uid', $data['uid']);
			$this->db->where('tid', $data['tid']);
			$this->db->where('question', $data['question']);
			$this->db->update('ajaxResults', $data);
		}
			
			
	}
}
?>
