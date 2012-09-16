<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Results extends CI_Controller {


	function index()
	{
		
		// Load global items
		$base['siteurl'] = $this->config->item('base_url');
		
		$this->load->model('votes');
		$base['resultsCS190'] = $this->votes->getResults("CS-190");
		$base['resultsGeneral'] = $this->votes->getResults("General");
		$base['results'] = $this->votes->getResults("");
		
		$this->load->view("header", $base);
		$this->load->view("results/index", $base);
		$this->load->view("footer");

	}
	
	function publicStats()
	{
		
		// Load global items
		$base['siteurl'] = $this->config->item('base_url');
		
		$this->load->model('votes');
		$base['resultsCS190'] = $this->votes->getResultsPublic("CS-190");
		$base['resultsGeneral'] = $this->votes->getResultsPublic("General");
		
		$this->load->view("header", $base);
		$this->load->view("results/public", $base);
		$this->load->view("footer");

	}


}

/* End of file results.php */
/* Location: ./application/controllers/results.php */