<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ConfirmCodeForget extends CI_Controller {

	function index($code){	
		
		$this->Member->setMemberForgetCode($code);
		$data['member'] = $this->Member->forgetPasswordMemberByCode();
		$this->load->view('confirmForgetPassword',$data);
		
	}
	
	
}

?>