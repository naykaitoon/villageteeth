<?php /* 
	type : controller
	file_name : home.php
    file_type : php
    author : Jedsadakorn Sirikunpan
    details : Controller homepage
	start_date : 16/9/2557
    end_Date : -
*/ ?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Boss extends CI_Controller {

	function index()
	{	
		$this->session->unset_userdata('loginData');
		$this->load->view('home');
	}
	
	
}

?>