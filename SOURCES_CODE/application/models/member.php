﻿<?php 
class Member extends CI_Model {

    function __construct(){
	   parent::__construct();
    }

######  Attribute  ###### 
    var $memberId ; ######  รหัสข้อมูลผู้ใช้งาน  ######
    var $memberUsername ; ######  ชื่อเข้าใช้งาน  ######
    var $memberPassword ; ######  รหัสผ่าน *เข้ารหัส MD5  ######
    var $memberName ; ######  ชื่อผู้เข้าใช้งาน  ######
    var $memberLastName ; ######  นาสกุลผู้เข้าใช้งาน  ######
    var $memberPosition ; ######  ตำแหน่งผู้เข้าใช้งาน  ######
	var $memberBirthday ; ######  วันเกิดผู้เข้าใช้งาน  ######
    var $memberStatus ; ######  สถานะบัญชีผู้เข้าใช้งาน  ######
    var $memberForgetCode ; ######  code ใช้ในการลืมรหัสผ่าน  ######
	var $memberEmail ; ######  อีเมล์ของผู้ใช้งาน  ######
    var $memberActiveStatus ; ######  สถานะการเปิดใช้บัญชีผู้ใช้งาน  ######
###### End Attribute  ###### 

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


 ###### SET : $memberPosition ######
    function setMemberPosition($memberPosition){
        $this->memberPosition = $memberPosition; 
     }
###### End SET : $memberPosition ###### 


###### GET : $memberPosition ######
    function getMemberPosition(){
        return $this->memberPosition; 
     }
###### End GET : $memberPosition ###### 

 ###### SET : $memberBirthday ######
    function setMemberBirthday($memberBirthday){
        $this->memberBirthday = $memberBirthday; 
     }
###### End SET : $memberBirthday ###### 


###### GET : $memberBirthday ######
    function getMemberBirthday(){
        return $this->memberBirthday; 
     }
###### End GET : $memberBirthday ###### 


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


 ###### SET : $memberForgetCode ######
    function setMemberForgetCode($memberForgetCode){
        $this->memberForgetCode = $memberForgetCode; 
     }
###### End SET : $memberForgetCode ###### 

 ###### SET : $memberEmail ######
    function setMemberEmail($memberEmail){
        $this->memberEmail = $memberEmail; 
     }
###### End SET : $memberEmail ###### 


###### GET : $memberEmail ######
    function getMemberEmail(){
        return $this->memberEmail; 
     }
###### End GET : $memberEmail ###### 

###### GET : $memberForgetCode ######
    function getMemberForgetCode(){
        return $this->memberForgetCode; 
     }
###### End GET : $memberForgetCode ###### 


 ###### SET : $memberActiveStatus ######
    function setMemberActiveStatus($memberActiveStatus){
        $this->memberActiveStatus = $memberActiveStatus; 
     }
###### End SET : $memberActiveStatus ###### 


###### GET : $memberActiveStatus ######
    function getMemberActiveStatus(){
        return $this->memberActiveStatus; 
     }

###################################### End GET SET ######################################

######################## function login #############################
function login()
 {
   $this -> db -> select('*');  						###########
   $this -> db -> from('members'); 						 ########### เช็คข้อมูลใน DB 
   $this -> db -> where('memberUsername', $this->getMemberUsername()); ###########
   $this -> db -> where('memberPassword', $this->getMemberPassword()); ###########
   $this -> db -> where('memberActiveStatus', 'activated'); ###########
   $this -> db -> join('liablearea', 'liablearea.memberId = members.memberId'); ########### จอย table liablearea
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
 
 ######################## function forgetPasswordMember #############################
function forgetPasswordMember()
 {
   $this -> db -> select('memberUsername,memberEmail,memberName,memberLastName,memberForgetCode');  						###########
   $this -> db -> from('members'); 						 ########### เช็คข้อมูลใน DB 
   $this -> db -> where('memberUsername', $this->getMemberUsername()); ###########
   $this -> db -> or_where('memberEmail', $this->getMemberEmail()); ###########
   $this -> db -> limit(1); ############## ตำกัดให้คืนค่าแค่ record เดียว

   $query = $this -> db -> get(); ##############  สั่งดึงข้อมูลตามเงื่อนไข

   if($query -> num_rows() == 1)  ############  เมื่อมีข้อมูล 1 record 
   {
     return $query->result_array(); ############# ส่งค้าที่ดึงได้กลับ
   }
   else ########### เมื่อไม่ตรงตามเงื่อนไข
   {
		  return FALSE;  ############# ส่งค้า FALSE กลับ

   }
 }
 ######################## end function forgetPasswordMember #############################
 
  ######################## function forgetPasswordMember #############################
function forgetPasswordMemberByCode()
 {
   $this -> db -> select('memberId,memberUsername');  						###########
   $this -> db -> from('members'); 						 ########### เช็คข้อมูลใน DB 
   $this -> db -> where('memberForgetCode', $this->getMemberForgetCode()); ###########
   $this -> db -> limit(1); ############## ตำกัดให้คืนค่าแค่ record เดียว

   $query = $this -> db -> get(); ##############  สั่งดึงข้อมูลตามเงื่อนไข

   if($query -> num_rows() == 1)  ############  เมื่อมีข้อมูล 1 record 
   {
     return $query->result_array(); ############# ส่งค้าที่ดึงได้กลับ
   }
   else ########### เมื่อไม่ตรงตามเงื่อนไข
   {
		  return FALSE;  ############# ส่งค้า FALSE กลับ

   }
 }
 ######################## end function forgetPasswordMember #############################


######################## function getAllDataMember #############################
	function getAllDataMember($page,$url){
	 $pageValue = 15;///จำนวนข้อมูลต่อ1หน้า
	$this->db->join('address','address.addressId = members.addressId');
	$this->db->join('canton','canton.cantonId = address.cantonId');
	$this->db->join('district','district.districtId = address.districtId');
	$this->db->join('province','province.provinceId = address.provinceId');
		$this -> db -> join('liablearea', 'liablearea.memberId = members.memberId');
		$data = $this->db->get('members')->result_array(); /// ดึงข้อมูลในตาราง members ทั้งหมด และนำมาเก็บในตัวแปร array ชื่อ $data['member']
	$config['base_url'] = "".base_url()."/index.php/boss/".$url;
	$this->db->select('*');
	$this->db->from('members');
	$this->db->join('address','address.addressId = members.addressId');
	$this->db->join('canton','canton.cantonId = address.cantonId');
	$this->db->join('district','district.districtId = address.districtId');
	$this->db->join('province','province.provinceId = address.provinceId');
		$this -> db -> join('liablearea', 'liablearea.memberId = members.memberId');
		$config['total_rows'] = $this->db->count_all_results();// ส่วนนี้ จะนับว่า ฟิว ทั้งหมดที่อยู่ใน tb_user มีเท่าไหร่
		$config['per_page'] = $pageValue; // ให้แสดงหน้าละจำนวนเท่าไหร่
		 
		 $this->pagination->create_links();
  		 $this->pagination->initialize($config);   // จากกนั้น เอาค่า ไป config ใน object pagination ที่เรา load มา 
		return $data; ///  สั่งส่งค่า ตัวแปร Array $data กลับ
	}
######################## end function getAllDataMember #############################

######################## function getMemberPk #############################
	function updatePasswordMemberPk(){
	
		$data = array(
			'memberPassword' => MD5($this->getMemberPassword()),
			'memberForgetCode' => MD5($this->getMemberId().date('Y-m-d H:m:s'))
		);
		$this->db->where('memberId',$this->getMemberId());
		$this->db->update('members',$data); /// ดึงข้อมูลในตาราง members ทั้งหมด และนำมาเก็บในตัวแปร array ชื่อ 

	}
######################## end function getMemberPk #############################





}
?>