<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ConfirmCodeForget extends CI_Controller {

	function index($email,$code)
	{	
		
		$this->Member->setMemberForgetCode($code);
		$this->Member->setMemberEmail($email);
		$data['forget'] = $this->Member->forgetPasswordMemberByCode();
		var_dump($data);
		//$this->load->view('confirmForgetPassword',$data);
		
	}
	
	
}

?>