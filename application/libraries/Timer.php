<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Timer {

	private $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
    }

	/*
	* We will return a string that contains valid HTML that can be inserted
	* directly to a view. 
	*
	* @author	Adam Brenner <aebrenne@uci.edu>
	*/
    public function getTimeLeft()
    {
		$this->CI->load->helper('date');
		$endTime  = strtotime($this->CI->config->item('countdown_timer'));
		$nowTime  = time();
		
		if($nowTime > $endTime)
			// Event has passed
			$timeLeft = "Finish Up!";
		else
			$timeLeft = timespan(time(),$endTime);

		return $timeLeft;
    }
}

/* End of file Timer.php */
/* Location: ./application/libraries/Timer.php */
