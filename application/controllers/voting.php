<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Voting extends CI_Controller {


	function index()
	{
		
		// Load global items
		$base['siteurl'] = $this->config->item('base_url');

		if(!$this->session->userdata('uid')) // check to see if logged in
			header("Location: ".$base['siteurl']."index.php/welcome/index");
		
		$this->load->model('votes');
		$base['teams'] = $this->votes->getTeams();
		$base['uid'] = $this->session->userdata('uid');
		
		
		$preResponses = $this->votes->getPastResponses($this->session->userdata('uid'));
		
		$base['responses'] = array();
		
		// Last Minute Logic - NO WHERE NEAR PERFECT BUT ITS LATE AT NIGHT
		// 3-d array
		// 1d: Team (this case 21 teams)
		// 2d: Question (4 questions)
		// 3d: Value => "checked" or "" (highest value)
		
		for($i = 1; $i <= 21; $i++) {
			for($x = 1; $x <= 4; $x++) {
				for($j = 1; $j <= 15; $j++) {
					$base['responses'][$i][$x][$j] = "";
				}
			}
		}
		
		foreach($preResponses->result_array() as $key) {
			$base['responses'][$key['tid']][$key['question']][$key['value']] = "checked";
		}
		
		$this->load->view("header", $base);
		$this->load->view("voting/index", $base);
		$this->load->view("footer");

	}

	function verifySubmission()
	{
		
		// Load global items
		$base['siteurl'] = $this->config->item('base_url');

		if(!$this->session->userdata('uid')) // check to see if logged in
			header("Location: ".$base['siteurl']."index.php/welcome/index");
		$results = $_POST;
		
		
		// 21 Teams
		// Change as needed
		if(count($results) != 21) {
			
			$base["landing"]["header"] = "Missing Items - TEAMS";
			$base["landing"]["body"] = "Not all teams were filled in. Use the BACK BUTTON to double check.";
			
			$this->load->view("header", $base);
			$this->load->view("landing", $base);
			$this->load->view("footer");
			return;
		}

		$this->load->model('votes');
		foreach($results as $token => $row)
		{
			// 4 Questions
			// Change as needed
			if(count($row) != 4) {
				$base["landing"]["header"] = "Missing Items - QUESTIONS";
				$base["landing"]["body"] = "Not all questions were filled in. Use the BACK BUTTON to double check.";

				$this->load->view("header", $base);
				$this->load->view("landing", $base);
				$this->load->view("footer");
				return;
			}
			
			$this->votes->insertScore($token,$row);
		}
		$base["landing"]["header"] = "Completed!";
		$base["landing"]["body"] = "THANK YOU for submitting your votes. They have been added to the database. Please return this device back to Amase.";
		
		$this->load->view("header", $base);
		$this->load->view("landing", $base);
		$this->load->view("footer");
	}
//	/index.php/voting/votingAjax/
	function votingAjax()
	{
		// Load global items
		$base['siteurl'] = $this->config->item('base_url');
		if(!$this->session->userdata('uid')) // check to see if logged in
			header("Location: ".$base['siteurl']."index.php/welcome/index");
		
		$data['uid'] = $this->input->get_post("j");
		$data['tid'] = $this->input->get_post("t");
		$data['question'] = $this->input->get_post("q");
		$data['value'] = $this->input->get_post("v");
		
		$this->load->model('votes');
		$this->votes->ajaxInsert($data);
		
		echo "Updated!";
	}

}

/* End of file voting.php */
/* Location: ./application/controllers/voting.php */
