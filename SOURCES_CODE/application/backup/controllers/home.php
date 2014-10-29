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

/*	
	function test1()
	{
		$id = $this->input->post('provinceId');
		$data = $this->Member->getDistrict($id);
		if($id!=0){
		for($i=0;$i<count($data);$i++){
			echo '<option value="'.$data[$i]['districtId'].'">'.$data[$i]['districtName'].'</option>';
		}
		}else{
			 echo '<option value="0">------</option>';
		}
		
		
	}
	
	function test2()
	{
		$id = $this->input->post('districtId');
		$data = $this->Member->getCanton($id);
		if($data){
		for($i=0;$i<count($data);$i++){
			echo '<option value="'.$data[$i]['cantonId'].'">'.$data[$i]['cantonName'].'</option>';
			echo '<script>$("#canton").removeAttr("disabled");</script>';
		}
		}else{
			 echo '<option value="0">------</option>';
		}
		
	}
	
	function test3()
	{
		$id = $this->input->post('cantonId');
		$data = $this->Member->getZipcode($id);
		if($id!=0){
			echo $data[0]['zipcode'];
		}else{
			 echo '-';
		}
		
	}
	
	function ss()
	{
		var_dump($_POST);
	}
*/	
}

?>