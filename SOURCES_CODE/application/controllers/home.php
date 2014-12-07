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
class Home extends CI_Controller {
	function __construct(){ /// เป็นฟังชั่นที่จะทำงานก่อน index จะทำงานเมื่อมีการเรียกใช้คราส Login นี้
            parent::__construct();
			
    }
	function index()
	{	
		$this->session->unset_userdata('loginData');
		$this->load->view('homeLogin');
	}
	
	function logout(){
		$this->session->unset_userdata('loginData');
		$this->load->view('homeLogin');
	}
	
	function forgetPassword(){
		$this->load->view('form/forgetPassword');
	}
	function loginForm(){
		$this->load->view('form/loginForm');
	}
	function fix(){
		$this->load->view('fix');
	}



	
	

}

?>