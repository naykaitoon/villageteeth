<?php 
class Address extends CI_Model {

    function __construct(){
	   parent::__construct();
    }

######  Attribute  ###### 
    var $addressId ; ######  รหัสข้อมูลที่อยู่  ######
    var $ownerId ; ######   	รหัสข้อมูลผู้ใช้งาน หรือ รหัสข้อมูลเด็ก  ######
    var $ownerType ; ######  ประเภทของที่อยู่ เป็นของ ผู้ใช้งานหรือเด็ก  ######
    var $addressDetial ; ######  รายละเอียดข้อมูลที่อยู่  ######
    var $cantonId ; ######  รหัสข้อมูลตำบล  ######
    var $districtId ; ######  รหัสข้อมูลอำเภอ  ######
    var $provinceId ; ######  รหัสข้อมูลจังหวัด  ######
    var $street ; ######  ชื่อภนน  ######
###### End Attribute  ###### 

 ###### SET : $addressId ######
    function setAddressId($addressId){
        $this->addressId = $addressId; 
     }
###### End SET : $addressId ###### 


###### GET : $addressId ######
    function getAddressId(){
        return $this->addressId; 
     }
###### End GET : $addressId ###### 


 ###### SET : $ownerId ######
    function setOwnerId($ownerId){
        $this->ownerId = $ownerId; 
     }
###### End SET : $ownerId ###### 


###### GET : $ownerId ######
    function getOwnerId(){
        return $this->ownerId; 
     }
###### End GET : $ownerId ###### 


 ###### SET : $ownerType ######
    function setOwnerType($ownerType){
        $this->ownerType = $ownerType; 
     }
###### End SET : $ownerType ###### 


###### GET : $ownerType ######
    function getOwnerType(){
        return $this->ownerType; 
     }
###### End GET : $ownerType ###### 


 ###### SET : $addressDetial ######
    function setAddressDetial($addressDetial){
        $this->addressDetial = $addressDetial; 
     }
###### End SET : $addressDetial ###### 


###### GET : $addressDetial ######
    function getAddressDetial(){
        return $this->addressDetial; 
     }
###### End GET : $addressDetial ###### 


 ###### SET : $cantonId ######
    function setCantonId($cantonId){
        $this->cantonId = $cantonId; 
     }
###### End SET : $cantonId ###### 


###### GET : $cantonId ######
    function getCantonId(){
        return $this->cantonId; 
     }
###### End GET : $cantonId ###### 


 ###### SET : $districtId ######
    function setDistrictId($districtId){
        $this->districtId = $districtId; 
     }
###### End SET : $districtId ###### 


###### GET : $districtId ######
    function getDistrictId(){
        return $this->districtId; 
     }
###### End GET : $districtId ###### 


 ###### SET : $provinceId ######
    function setProvinceId($provinceId){
        $this->provinceId = $provinceId; 
     }
###### End SET : $provinceId ###### 


###### GET : $provinceId ######
    function getProvinceId(){
        return $this->provinceId; 
     }
###### End GET : $provinceId ###### 


 ###### SET : $street ######
    function setStreet($street){
        $this->street = $street; 
     }
###### End SET : $street ###### 


###### GET : $street ######
    function getStreet(){
        return $this->street; 
     }
###### End GET : $street ###### 
function getProvinceAll(){
	return $this->db->get('province')->result_array();
}

function getDistrictFk(){
	$this->db->where('provinceId',$this->getProvinceId());
	return $this->db->get('district')->result_array();
}

function getCantonFk(){
	$this->db->where('districtId',$this->getDistrictId());
	return $this->db->get('canton')->result_array();
}

function getZipcodeFk(){
	$this->db->where('cantonId',$this->getCantonId());
	return $this->db->get('zipcodes')->result_array();
}
}
?>

