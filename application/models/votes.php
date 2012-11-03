<?php

class Votes extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function ajaxInsert($data)
    {
		// Produces something like
		// SELECT * FROM results WHERE uid = $data['uid'] AND tid = $data['tid'] AND question = $data['question']
		$query = $this->db->get_where('results',array('uid' => $data['uid'], 'tid' => $data['tid'], 'question' => $data['question']));

		if($query->num_rows() == 0)
			// Produces something like
			// INSERT INTO results (uid, tid, question, value) VALUES ('$data['uid']', '$data['tid']', '$data['question']', '$data['value']')
			$this->db->insert('results', $data);
		else
		{
			// Produces something like
			// UPDATE `results` SET `uid` = '$data['uid']', `tid` = '$data['tid']', `question` = '$data['question']', `value` = '$data['value']' WHERE `uid` = '$data['uid']' AND `tid` = '$data['tid']' AND `question` = '$data['question']'
			$this->db->where('uid', $data['uid']);
			$this->db->where('tid', $data['tid']);
			$this->db->where('question', $data['question']);
			$this->db->update('results', $data);
		}

    }

	/*
	* result_array() returns an array to the one shown below. What
	* would be best if we had a mulit d-array that corresponds to
	* each key in the array below.
	*
	*	Array
	*	(
	*	    [0] => Array
	*	        (
	*	            [uid] => 1
	*	            [tid] => 1
	*	            [question] => 1
	*	            [value] => 1
	*	        )
	*
	*	    [1] => Array
	*	        (
	*	            [uid] => 1
	*	            [tid] => 1
	*	            [question] => 2
	*	            [value] => 2
	*	        )
	*	)
	*/
	function getVotesByJudge($uid,$tid)
	{
		$query = $this->db->get_where('results',array('uid' => $uid, 'tid' => $tid));

		for($i = 1; $i <= $this->_countQuestions(); $i++)
			$results[$i] = 0;

		foreach($query->result_array() as $key)
			$results[$key['question']] = $key['value'];
		
		return $results;
	}

	private function _countQuestions()
	{
		return $this->db->count_all('questions');
	}

}
/* End of file votes.php */
/* Location: ./application/models/votes.php */