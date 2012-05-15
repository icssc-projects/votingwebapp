<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	* Index Controller
	*
	* Index controller for login system.
	*
	* @author		Adam Brenner <aebrenne@uci.edu>
	* @link			http://appjam.roboteater.com/
	**/
	public function index()
	{
		$base['siteurl'] = $this->config->item('base_url');
		$base['status'] = $this->uri->segment(3);

		if($this->session->userdata('uid')) // check to see if logged in
			header("Location: ".$base['siteurl']."index.php/voting/index");

		$this->load->view('header',$base);
		$this->load->view('login/index',$base);
		$this->load->view('footer');
	}


	/**
	* Verify page
	*
	* Checks to see if the username and password passed in from the index
	* function is correct and in the database. Will assign user information
	* to session header if correct. If not, sends user back to login page
	* with error notice.
	*
	* @access	public
	* @param	String username, String password
	* @return	void
	* @author	Adam Brenner <aebrenne@uci.edu>
	* @version	CI 1.7.3 - should still work in newer ones
	* @todo 	New CI 2.x requires form_validation instead of validations
	*/
	function verify()
	{
		
		// Load global items
		$base['siteurl'] = $this->config->item('base_url');

		if($this->session->userdata('uid')) // check to see if logged in
			header("Location: ".$base['siteurl']."index.php/voting/index");
		
		// Site specific items
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$this->load->model('auth'); // authentication database model

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() == FALSE)
		{
			header("Location: ".$base['siteurl']."index.php/welcome/index/invalid");
			exit;
		}
		elseif ($this->form_validation->run() == TRUE)
		{
			$username = $this->input->post("username");
			$password = $this->input->post("password");
			
			$verify = $this->auth->verifyLogin($username,$password);
			if($verify == "FALSE")
			{
				header("Location: ".$base['siteurl']."index.php/welcome/index/invalid");
				exit;
			}
			elseif ($verify == "TRUE")
			{
				// hopefully this will never run, if it does, something fucked up is going
				// on in the database and my code!
				header("Location: ".$base['siteurl']."index.php/welcome/index/contact");
				exit;
			}
			else
			{
				$sessionData = array(
						'uid' => $verify['uid'],
						'username'  => $verify['username'],
						);
				$this->session->set_userdata($sessionData);
			}
		}
		
		header("Location: ".$base['siteurl']."index.php/voting/index");

	}

	function logout()
	{
		// Load global items
		$base['siteurl'] = $this->config->item('base_url'); // no file endings
		$this->session->sess_destroy();
		header("Location: ".$base['siteurl']."index.php/welcome/index/out");
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */