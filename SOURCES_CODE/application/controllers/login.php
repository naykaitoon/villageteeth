<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller { /// คราสชื่อ Login

	function __construct(){ /// เป็นฟังชั่นที่จะทำงานก่อน index จะทำงานเมื่อมีการเรียกใช้คราส Login นี้
            parent::__construct();
            $this->load->helper('url'); /// โหลด helper ชื่อ url
    }
	   
	function index(){  //// ฟังชั่นชื่อ index ซึ่งเป็นฟังชั่นในการทำงานครั้งแรก
			
			$loginData = $this->session->userdata('loginData'); // เรียกใช้ข้อมูลจาก session ชื่อ loginData เก็บไว้ใน $loginData ซื้อเป็นข้อมูลแบบ aray
			$username =  	$this->input->post('username'); /// รับค่า input ชื่อ username
			$password =	 $this->input->post('password');/// รับค่า input ชื่อ password
		if(!$loginData){ // เช็คค่า $loginData ว่ามีหรือไม่ ท่าไม่ จะทำตาม process
			
			
			$this->Member->setMemberUsername($username); //// set ค่า username ใน Model Member
			$this->Member->setMemberPassword(md5($password)); //// set ค่า password ใน Model Member โดยเข้ารหัส MD5
			
			$data = $this->Member->login();  ///// เรียกใช้ ฟังชั่น login ใน Model Member และน้ำตัวแปล $data มารับค่าที่ return กลับมา
	
			if($data){ /// เช็คค่า ใน $data ซึ้งดึงจาก Model ว่ามีหรือไม่ถ้ามีจะทำตาม process
				foreach($data as $r)  // สั่งวน เพื่อเก็บค่าที่อบู่ใน $data
				$sesData = array(); /// ตั้งตัวแปลชื่อ sesData ให้เป็น array
				$sesData = array(
				  'id' => $r->memberId, /// ตั้งข้อมูลใน array ชื่อ id = memberId ที่ดึงจาก Model
				  'username' => $r->memberUsername, /// ตั้งข้อมูลใน array ชื่อ username = memberUsername ที่ดึงจาก Model
				  'name' => $r->memberName, /// ตั้งข้อมูลใน array ชื่อ name = memberName ที่ดึงจาก Model
				  'lastName' => $r->memberLastName, /// ตั้งข้อมูลใน array ชื่อ lastName = memberLastName ที่ดึงจาก Model
				  'status' => $r->memberStatus, /// ตั้งข้อมูลใน array ชื่อ status = memberStatus ที่ดึงจาก Model
				  'cantonId' => $r->cantonId, /// ตั้งข้อมูลใน array ชื่อ status = memberStatus ที่ดึงจาก Model
				  'districtId' => $r->districtId, /// ตั้งข้อมูลใน array ชื่อ status = memberStatus ที่ดึงจาก Model
				  'provinceId' => $r->provinceId
				);
	
				$this->session->set_userdata('loginData',$sesData); ////นำค่า $sesData ที่เป็น array มาเก็บใน session ชื่อ loginData
				$this->redirects(); /// เรียกใช้ฟังชั่น redirects
				
			}else{
				
					$num =  0; // เมื่อ จริง
				return $num;
			}
			
		}else{
			$this->redirects();  /// เรียกใช้ฟังชั่น redirects
		}
		
	}
	
	 function redirects(){ 
	 
 	$loginData = $this->session->userdata('loginData');  /// แรกดู ข้อมูลที่เก็บใน session ชื่อ loginData
   if($loginData){ /// แรกดู ข้อมูลที่เก็บใน session ชื่อ loginData พร้อมกับ เช็คเงื่อนไขว่า มีจิงหรือ เท็จ    
	     $satus = $loginData['status'];  /// ให้ข้อมูลใน array session_data ชื่อ status เท่ากับ $satus
			 if($satus=="boss"){ //เช็คค่า $satus ว่าเป็น admin
			echo"<script langquage='javascript'>window.location='".base_url()."index.php/boss';</script>"; /// เป็นหน้าเว็บโดยใช้ javascript		   	
			 	
			 }else if($satus=="officials"){//เช็คค่า $satus ว่าเป็น user
			echo"<script langquage='javascript'>window.location='".base_url()."index.php/officials';</script>";/// เป็นหน้าเว็บโดยใช้ javascript		   	
			 }
	}else{ /// เมื่อไม่มีข้อมูลใน $this->session->userdata('loginData')
	 		echo"<script langquage='javascript'>window.location='".base_url()."index.php/home';</script>";/// เป็นหน้าเว็บโดยใช้ javascript		   	
	}
 }
	function forgetPassword(){
		
		$usernameAndEmail = $this->input->post('usernameAndEmail');

		$this->Member->setMemberUsername($usernameAndEmail);
		$this->Member->setMemberEmail($usernameAndEmail);
		
		$data = $this->Member->forgetPasswordMember();
		

	//	$memberForgetCode = $data[0]['memberForgetCode'];
			if($data!=FALSE){
		$this->load->library('email');

				$config['protocol'] = 'SMTP';

				$config['smtp_host'] = 'mail.villageteeth.com';

				$config['smtp_port'] = 2525;

				$config['smtp_user'] = 'villaget@villageteeth.com';

				$config['smtp_pass'] = '0875788242';

				$config['wordwrap'] = FALSE;

				$config['mailtype'] = 'text';

				$config['charset'] = 'utf-8';

				$config['newline'] = '\n';
				$message = "สวัดดีคุณ ".$data[0]['memberName']." ".$data[0]['memberLastName']."\n\n";
				$message .= "ชื่อเข้าใช้งานของคุณคือ ".$data[0]['memberUsername']."\n\n";
				$message .= "ลิ้งยืนยัน \n";
				$message .= "http://villageteeth.com/index.php/ConfirmCodeForget/index/".$data[0]['memberForgetCode'];
				$this->email->initialize($config);


				$this->email->from('villaget@villageteeth.com', 'ยืนยันการลืมรหัสผ่าน villageteeth.com '.$data[0]['memberName']);

				$this->email->to($data[0]['memberEmail']);

			

				

				

				$this->email->subject('ForgetCode ยืนยันการลืมรหัสผ่าน');

				$this->email->message($message);

				$this->email->send();

		
			  	 echo "<font id='results' color='green'>กรุณาไปยืนยันตัวตน ตามที่อยู่ Email : ".$data[0]['memberEmail']."เรียบร้อย</font><script>	document.getElementById('sent').disabled = false;</script>";
			}else{
				 echo "<font id='results' color='red'>ไม่มีผู้ใช้งานนี้อยู่ในระบบ</font><script>	document.getElementById('sent').disabled = false;</script>";
			}


	}
	
	function changePassword(){
		$memberId = $this->input->post('memberId');
		$password1 = $this->input->post('password1');
		$password2 = $this->input->post('password2');
		
		if($password1 == $password2){
			$this->Member->setMemberId($memberId);
			$this->Member->setMemberPassword($password1);
			$this->Member->updatePasswordMemberPk();
			$this->session->unset_userdata('loginData');
			echo"<script langquage='javascript'>
			window.location='".base_url()."index.php/home';</script>"; /// เป็นหน้าเว็บโดยใช้ javascript		  
		}else{
			echo"<script langquage='javascript'>alert('รหัสผ่านไม่ตรงกัน กรุณายืนยันใหม่');
			window.location='".base_url()."index.php/home';</script>"; /// เป็นหน้าเว็บโดยใช้ javascript		  
		}

	}
	
	function checkingLogin(){
			$loginData = $this->session->userdata('loginData'); 
			if($loginData['status']=='boss'){
				$returnData =  'boss';
			}else if($loginData['status']=='officials'){
				$returnData =  'officials';
			}else{
				$this->session->unset_userdata('loginData'); 
				$returnData = FALSE;
			}

			return $returnData;
	}
	

}

?>