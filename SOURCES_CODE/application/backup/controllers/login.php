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
class Login extends CI_Controller {
function __construct()
       {
            parent::__construct();
            $this->load->helper('url');
       }
	function index()
	{ 		
			$this->session->unset_userdata('loginData');
			$loginData = $this->session->userdata('loginData');
		
		if(!$loginData){
			$username =  $this->input->post('username'); /// รับค่า input ชื่อ username
			$password =  $this->input->post('password');/// รับค่า input ชื่อ password
			
			$this->Member->setMemberUsername($username); //// set ค่า username ใน Model Member
			$this->Member->setMemberPassword(md5($password)); //// set ค่า password ใน Model Member
			
			$data = $this->Member->login();  ///// เรียกใช้ ฟังชั่น login ใน Model Member และน้ำตัวแปล $data มารับค่าที่ return กลับมา
			if($data){
				foreach($data as $r)  // สั่งวน เพื่อเก็บค่าที่อบู่ใน $data
				$sesData = array();
				$sesData = array(
				  'username' => $r->memberUsername,
				  'name' => $r->memberName,
				  'lastName' => $r->memberLastName,
				  'status' => $r->memberStatus
				);
	
				$this->session->set_userdata('loginData',$sesData); ////นำค่า $sesData ที่เป็น array มาเก็บใน session ชื่อ loginData
				$this->redirects();
				
			}else{
				return 0;
				
	
			}
		}else{
			$this->redirects();
		}
	}
	
	 function redirects(){ 
	 
 	$loginData = $this->session->userdata('loginData');  /// แรกดู ข้อมูลที่เก็บใน session ชื่อ loginData
   if($loginData){ /// แรกดู ข้อมูลที่เก็บใน session ชื่อ loginData พร้อมกับ เช็คเงื่อนไขว่า มีจิงหรือ เท็จ    
	     $satus = $loginData['status'];  /// ให้ข้อมูลใน array session_data ชื่อ status เท่ากับ $satus
			 if($satus=="boss"){ //เช็คค่า $satus ว่าเป็น admin
			echo"<script langquage='javascript'>
				window.location='".base_url()."index.php/boss';
				</script>";
		   	
			 	
			 }else if($satus=="officials"){//เช็คค่า $satus ว่าเป็น user
			echo"<script langquage='javascript'>
				window.location='".base_url()."index.php/officials';
				</script>";
			 }
	}else{ /// เมื่อไม่มีข้อมูลใน $this->session->userdata('loginData')
	 		echo"<script langquage='javascript'>
				window.location='".base_url()."index.php/home';
				</script>";
	}
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