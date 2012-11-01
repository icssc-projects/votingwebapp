<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	private $siteurl;

	public function __construct()
	{
		parent::__construct();
		$this->siteurl = $this->config->item('base_url');
	}

	/*
	* Login Screen
	*
	* Login screen for application.
	* 
	* @author	Adam Brenner <aebrenne@uci.edu>
	*/
	public function index()
	{
		$base['status']  = $this->uri->segment(3);
		$base['siteurl'] = $this->siteurl;

		if($this->session->userdata('uid')) // check to see if logged in
			header("Location: ".$base['siteurl']."index.php/voting/index");

		$this->load->view('header',$base);
		$this->load->view('dashboard/index',$base);
		$this->load->view('footer');
	}

	/*
	* Login Handler
	*
	* Login handler for application. This is a two part
	* solution. First is to handle $_POST base submissions.
	*
	* However, becaue this is a mobile application, for
	* bookmarking purposes, it might be nice to use $_GET
	* to auto login users. Security? Yes, its a concern. 
	* Is it worth my time? Not at this point in time.
	* 
	* @author	Adam Brenner <aebrenne@uci.edu>
	*/
	public function login()
	{
		$base['siteurl'] = $this->siteurl;

		if($this->session->userdata('uid')) // check to see if logged in
			header("Location: ".$base['siteurl']."index.php/voting/index");

		$user = $this->input->get_post('user', TRUE);
		$pass = $this->input->get_post('pass', TRUE);

		if(!$this->_isLoginValid($user,$pass)) {
			echo "Invalid Account";
		} else {
			$this->load->model("users");
			$uInfo = $this->users->getUserInfo($user);
			$this->session->set_userdata('uid', $uInfo->uid);
			header("Location: ".$base['siteurl']."index.php/voting/index");
		}
	}

	/*
	* Login Screen
	*
	* Login screen for application.
	* 
	* @author	Adam Brenner <aebrenne@uci.edu>
	* @access	private
	*/
	public function _isLoginValid($user,$pass) {
		
		if(!isset($user) || !isset($pass))
			return false;
		
		$this->load->model("users");
		if(!$this->users->isUserPresent($user,$pass)) {
			return false;
		} else {
			return true;
		}
	}

	/*
	* LogOut Handler
	*
	* Logout a user.
	* 
	* @author	Adam Brenner <aebrenne@uci.edu>
	*/
	public function logout()
	{
		$base['siteurl'] = $this->siteurl;
		$this->session->sess_destroy();
		header("Location: ".$base['siteurl']."index.php");
	}
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */