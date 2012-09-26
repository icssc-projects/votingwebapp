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
		$base['status']  = $this->uri->segment(3);
		$base['siteurl'] = $this->siteurl;

		if(!$this->session->userdata('uid')) // check to see if logged in
			header("Location: ".$base['siteurl']."index.php/dashboard/index");

		$this->load->model("Teams");
		$base['teams'] = $this->Teams->getAllTeams();
		
		$this->load->model("Questions");
		$base['questions'] = $this->Questions->getAllQuestions();
		
		$this->load->view('header');
		$this->load->view('voting/select-team',$base);
		$this->load->view('voting/questions',$base);
		$this->load->view('footer');
	}

}

/* End of file voting.php */
/* Location: ./application/controllers/voting.php */