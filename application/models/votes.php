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
		// SELECT * FROM results WHERE uid = $data['uid'] AND tid = $data['tid'] AND question = $data['question'] AND value = $data['value']
		$query = $this->db->get_where("results",$data);

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

}
/* End of file votes.php */
/* Location: ./application/models/votes.php */