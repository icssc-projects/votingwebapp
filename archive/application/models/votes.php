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

	function getPastResponses($userid)
	{
		return $this->db->query("SELECT * FROM ajaxResults WHERE uid = '$userid'");
	}

	function insertScore($team, $data)
	{
		foreach($data as $question => $score) {
			$this->db->insert('results', array('tid' => $team, 'question' => $question, 'value' => $score)); 
		}

	}
	
	function getResults($category)
	{
		if($category == "")
			return $this->db->query("SELECT * FROM publicResults");
		
		return $this->db->query("SELECT * FROM publicResults WHERE category = '$category'");
	
		// SELECT results.tid, teams.name, SUM(value) AS total, COUNT(results.tid) AS count FROM results, teams WHERE teams.id = results.tid GROUP BY results.tid ORDER BY total DESC;
	}
	
	function getResultsPublic($category)
	{
		return $this->db->query("SELECT * FROM publicResults WHERE category = '$category' LIMIT 0,2");
	
		// SELECT ajaxResults.tid AS tid, teams.name AS name, teams.category AS category, SUM(ajaxResults.value) AS score, COUNT(ajaxResults.tid) AS responseCount FROM ajaxResults, teams WHERE teams.id = ajaxResults.tid GROUP BY ajaxResults.tid ORDER BY score DESC;
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
