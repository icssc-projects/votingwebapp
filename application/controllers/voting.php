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
		
		
		// 10 Teams
		// Change as needed
		if(count($results) != 10) {
			
			$base["landing"]["header"] = "Missing Items";
			$base["landing"]["body"] = "Not all items were filled in. Use the BACK BUTTON to double check.";
			
			$this->load->view("header", $base);
			$this->load->view("landing", $base);
			$this->load->view("footer");
			return;
		}

		$this->load->model('votes');
		foreach($results as $token => $row)
		{
			// 9 Questions
			// Change as needed
			if(count($row) != 9) {
				$base["landing"]["header"] = "Missing Items";
				$base["landing"]["body"] = "Not all items were filled in. Use the BACK BUTTON to double check.";

				$this->load->view("header", $base);
				$this->load->view("landing", $base);
				$this->load->view("footer");
				return;
			}
			
			$this->votes->insertScore($token,$row);
		}
		$base["landing"]["header"] = "Completed!";
		$base["landing"]["body"] = "THANK YOU for submitting your votes. They have been added to the database. Please return this device back to AppJam.";
		
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
