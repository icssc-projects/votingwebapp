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

		$this->load->view('header');
		$this->load->view('dashboard/index',$base);
		$this->load->view('footer');
	}



	/*
	* Login Screen
	*
	* Login screen for application.
	* 
	* @author	Adam Brenner <aebrenne@uci.edu>
	* @access	private
	*/
	public function _handleLoginAuth() {
		
	}
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */