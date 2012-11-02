<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Voting extends CI_Controller {

	private $siteurl;

	public function __construct()
	{
		parent::__construct();
		$this->siteurl = $this->config->item('base_url');
	}

	/*
	* Voting Page
	*
	* Team selection page
	* 
	* @author	Adam Brenner <aebrenne@uci.edu>
	*/
	public function index()
	{
		$base['siteurl'] = $this->siteurl;

		if(!$this->session->userdata('uid')) // check to see if logged in
			header("Location: ".$base['siteurl']."index.php/dashboard/index");

		$this->load->model("teams");
		$base['teams'] = $this->teams->getAllTeams();
		
		$this->load->library('timer');
		$base['timeLeft'] = $this->timer->getTimeLeft();
		
		$this->load->view('header',$base);
		$this->load->view('voting/select-team',$base);
		$this->load->view('voting/javascript',$base);
		$this->load->view('footer');
	}

	/*
	* Voting Page
	*
	* Question selection page for a specific team
	* 
	* @author	Adam Brenner <aebrenne@uci.edu>
	*/
	public function team()
	{
		$base['siteurl'] = $this->siteurl;

		if(!$this->session->userdata('uid')) // check to see if logged in
			header("Location: ".$base['siteurl']."index.php/dashboard/index");

		$this->load->model("teams");
		$tid = $this->uri->segment(3);
		if($tid == false || !$this->teams->isValidTeam($tid)) {
			echo "Team with a database ID of $tid was not found.";
			exit;
		}

		$this->load->model("questions");
		$base['questions'] = $this->questions->getAllQuestions();
		$base['teams'] = $this->teams->getTeam($tid);
		$base['uid'] = $this->session->userdata('uid');
		
		$this->load->library('timer');
		$base['timeLeft'] = $this->timer->getTimeLeft();
		
//		$this->load->view('header',$base);
		$this->load->view('voting/questions',$base);
//		$this->load->view('voting/javascript',$base);
//		$this->load->view('footer');
	}

	/*
	* Voting Ajax Record Page
	*
	* Records Ajax responses from voting app
	* 
	* @author	Adam Brenner <aebrenne@uci.edu>
	*/
	public function votingAjax()
	{
		$base['siteurl'] = $this->siteurl;

		if(!$this->session->userdata('uid')) // check to see if logged in
			header("Location: ".$base['siteurl']."index.php/dashboard/index");

		$data = $this->uri->uri_to_assoc(3);

		foreach($data as $key => $value) {
			if(!isset($value) || $value == null) {
				echo "Missing value for key: $key";
				exit;
			}
		}

		$this->load->model('Votes');
		$this->Votes->ajaxInsert($data);
		
		echo "Updated!";
	}

}

/* End of file voting.php */
/* Location: ./application/controllers/voting.php */