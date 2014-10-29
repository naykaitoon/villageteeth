<?php 
class Member extends CI_Model {

    function __construct(){
	   parent::__construct();
    }

######  Attribute  ###### 
    var $memberId ; ######  รหัสสมาชิก  ######
    var $memberUsername ; ######  ชื่อเข้าใช้งานระบบ  ######
    var $memberPassword ; ######  รหัสผ่านเข้าใช้งานระบบ  ######
    var $memberName ; ######  ชื่อผู้ใช้งาน  ######
    var $memberLastName ; ######  นามสกุลผู้ใช้งาน  ######
    var $memberAddress ; ######  ที่อยู่ผู้ใช้งาน  ######
    var $memberTel ; ######  เบอร์โทรผู้ใช้งาน  ######
    var $memberPositon ; ######  ตำแหน่งผู้ใช้งาน  ######
    var $memberStatus ; ######  สถานะบัญชี  ######
###### End Attribute  ###### 

###################################### GET SET ######################################

 ###### SET : $memberId ######
    function setMemberId($memberId){
        $this->memberId = $memberId; 
     }
###### End SET : $memberId ###### 


###### GET : $memberId ######
    function getMemberId(){
        return $this->memberId; 
     }
###### End GET : $memberId ###### 


 ###### SET : $memberUsername ######
    function setMemberUsername($memberUsername){
        $this->memberUsername = $memberUsername; 
     }
###### End SET : $memberUsername ###### 


###### GET : $memberUsername ######
    function getMemberUsername(){
        return $this->memberUsername; 
     }
###### End GET : $memberUsername ###### 


 ###### SET : $memberPassword ######
    function setMemberPassword($memberPassword){
        $this->memberPassword = $memberPassword; 
     }
###### End SET : $memberPassword ###### 


###### GET : $memberPassword ######
    function getMemberPassword(){
        return $this->memberPassword; 
     }
###### End GET : $memberPassword ###### 


 ###### SET : $memberName ######
    function setMemberName($memberName){
        $this->memberName = $memberName; 
     }
###### End SET : $memberName ###### 


###### GET : $memberName ######
    function getMemberName(){
        return $this->memberName; 
     }
###### End GET : $memberName ###### 


 ###### SET : $memberLastName ######
    function setMemberLastName($memberLastName){
        $this->memberLastName = $memberLastName; 
     }
###### End SET : $memberLastName ###### 


###### GET : $memberLastName ######
    function getMemberLastName(){
        return $this->memberLastName; 
     }
###### End GET : $memberLastName ###### 


 ###### SET : $memberAddress ######
    function setMemberAddress($memberAddress){
        $this->memberAddress = $memberAddress; 
     }
###### End SET : $memberAddress ###### 


###### GET : $memberAddress ######
    function getMemberAddress(){
        return $this->memberAddress; 
     }
###### End GET : $memberAddress ###### 


 ###### SET : $memberTel ######
    function setMemberTel($memberTel){
        $this->memberTel = $memberTel; 
     }
###### End SET : $memberTel ###### 


###### GET : $memberTel ######
    function getMemberTel(){
        return $this->memberTel; 
     }
###### End GET : $memberTel ###### 


 ###### SET : $memberPositon ######
    function setMemberPositon($memberPositon){
        $this->memberPositon = $memberPositon; 
     }
###### End SET : $memberPositon ###### 


###### GET : $memberPositon ######
    function getMemberPositon(){
        return $this->memberPositon; 
     }
###### End GET : $memberPositon ###### 


 ###### SET : $memberStatus ######
    function setMemberStatus($memberStatus){
        $this->memberStatus = $memberStatus; 
     }
###### End SET : $memberStatus ###### 


###### GET : $memberStatus ######
    function getMemberStatus(){
        return $this->memberStatus; 
     }
###### End GET : $memberStatus ###### 

###################################### End GET SET ######################################

######################## function login #############################
function login()
 {
   $this -> db -> select('*');  						###########
   $this -> db -> from('members'); 						 ########### เช็คข้อมูลใน DB 
   $this -> db -> where('memberUsername', $this->getMemberUsername()); ###########
   $this -> db -> where('memberPassword', $this->getMemberPassword()); ###########
   $this -> db -> limit(1); ############## ตำกัดให้คืนค่าแค่ record เดียว

   $query = $this -> db -> get(); ##############  สั่งดึงข้อมูลตามเงื่อนไข

   if($query -> num_rows() == 1)  ############  เมื่อมีข้อมูล 1 record 
   {
     return $query->result(); ############# ส่งค้าที่ดึงได้กลับ
   }
   else ########### เมื่อไม่ตรงตามเงื่อนไข
   {
		  return FALSE;  ############# ส่งค้า FALSE กลับ

   }
 }
 ######################## end function login #############################


######################## function getAllDataMember #############################
	function getAllDataMember(){
		$data['members'] = $this->db->get('members')->result_array(); /// ดึงข้อมูลในตาราง members ทั้งหมด และนำมาเก็บในตัวแปร array ชื่อ $data['member']
		return $data; ///  สั่งส่งค่า ตัวแปร Array $data กลับ
	}
######################## end function getAllDataMember #############################

function getProvince(){

	return $this->db->get('province')->result_array();
}

function getDistrict($provinceId){
	$this->db->where('provinceId',$provinceId);
	return $this->db->get('district')->result_array();
}

function getCanton($districtId){
	$this->db->where('districtId',$districtId);
	return $this->db->get('canton')->result_array();
}

function getZipcode($cantonId){
	$this->db->where('cantonId',$cantonId);
	return $this->db->get('zipcodes')->result_array();
}


}
?>