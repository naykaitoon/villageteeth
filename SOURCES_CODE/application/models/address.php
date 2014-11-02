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
	var $telId;
	var $tel;
	var $telNote;
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

 ###### SET : $telId ######
    function setTelId($telId){
        $this->telId = $telId; 
     }
###### End SET : $telId ###### 


###### GET : $telId ######
    function getTelId(){
        return $this->telId; 
     }
###### End GET : $telId ###### 

 ###### SET : $tel ######
    function setTel($tel){
        $this->tel = $tel; 
     }
###### End SET : $tel ###### 


###### GET : $tel ######
    function getTel(){
        return $this->tel; 
     }
###### End GET : $tel ###### 

 ###### SET : $telNote ######
    function setTelNote($telNote){
        $this->telNote = $telNote; 
     }
###### End SET : $telNote ###### 


###### GET : $telNote ######
    function getTelNote(){
        return $this->telNote; 
     }
###### End GET : $telNote ###### 


////////////////////////    /////////////////////////////
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

function getmemberAear(){
	
	$this->db->join('district','district.districtId = canton.districtId');
	$this->db->join('province','province.provinceId = canton.provinceId');
	if($this->getCantonId()){
		$this->db->where('canton.cantonId',$this->getCantonId());
	}else if($this->getDistrictId()){
		$this->db->where('canton.districtId',$this->getDistrictId());
	}else if($this->getProvinceId()){
		$this->db->where('canton.provinceId',$this->getProvinceId());
	}
	$data = $this->db->get('canton')->result_array();
	
	return $data;
	
}

function getMemberByAddress($page,$url){
	$pageValue = 15;///จำนวนข้อมูลต่อ1หน้า
	$this->db->join('address','address.ownerId = members.memberId');
	$this->db->join('canton','canton.cantonId = address.cantonId');
	$this->db->join('district','district.districtId = address.districtId');
	$this->db->join('province','province.provinceId = address.provinceId');
	$this -> db -> join('liablearea', 'liablearea.memberId = members.memberId');
		
	if($this->getCantonId()){
		$this->db->where('liablearea.areaId',$this->getCantonId());
	}else if($this->getDistrictId()){
		$this->db->where('liablearea.areaId',$this->getDistrictId());
	}else if($this->getProvinceId()){
		$this->db->where('liablearea.areaId',$this->getProvinceId());
	}
		$this->db->where('address.ownerType','members');
		
		$data = $this->db->get('members',$pageValue,$page)->result_array(); /// ดึงข้อมูลในตาราง members ทั้งหมด และนำมาเก็บในตัวแปร array ชื่อ $data['member']
	$config['base_url'] = "".base_url()."/index.php/boss/".$url;
	$this->db->select('*');
	$this->db->from('members');
	$this->db->join('address','address.ownerId = members.memberId');
	$this->db->join('canton','canton.cantonId = address.cantonId');
	$this->db->join('district','district.districtId = address.districtId');
	$this->db->join('province','province.provinceId = address.provinceId');
		
		if($this->getCantonId()){
		$this->db->where('address.cantonId',$this->getCantonId());
	}else if($this->getDistrictId()){
		$this->db->where('address.districtId',$this->getDistrictId());
	}else if($this->getProvinceId()){
		$this->db->where('address.provinceId',$this->getProvinceId());
	}
		
		
		$this -> db -> join('liablearea', 'liablearea.memberId = members.memberId');
		$config['total_rows'] = $this->db->count_all_results();// ส่วนนี้ จะนับว่า ฟิว ทั้งหมดที่อยู่ใน tb_user มีเท่าไหร่
		$config['per_page'] = $pageValue; // ให้แสดงหน้าละจำนวนเท่าไหร่
		 
		 $this->pagination->create_links();
  		 $this->pagination->initialize($config);   // จากกนั้น เอาค่า ไป config ใน object pagination ที่เรา load มา 
		return $data; ///  สั่งส่งค่า ตัวแปร Array $data กลับ
}

function addAddress(){
	$data = array(
		'ownerId' => $this->getOwnerId(),
		'ownerType' => $this->getOwnerType(),
		'addressDetial' => $this->getAddressDetial(),
		'provinceId' => $this->getProvinceId(),
		'districtId' => $this->getDistrictId(),
		'cantonId' => $this->getCantonId(),
		'street' => $this->getStreet()
	);

	$this->db->insert('address',$data);
	
	$id = $this->db->insert_id();
	
	$dataTel = array(
		'addressId' => $id,
		'tel' => $this->getTel(),
		'telNote' => $this->getTelNote()
	);
	$this->db->insert('tel',$dataTel);
	
}



function updateAddress(){
	$data = array(
		'ownerType' => $this->getOwnerType(),
		'addressDetial' => $this->getAddressDetial(),
		'provinceId' => $this->getProvinceId(),
		'districtId' => $this->getDistrictId(),
		'cantonId' => $this->getCantonId(),
		'street' => $this->getStreet()
	);
	$this->db->where('addressId',$this->getAddressId());
	$this->db->update('address',$data);
	
	
	
}
function updateTel(){
	$dataTel = array(
		'tel' => $this->getTel(),
		'telNote' => $this->getTelNote()
	);
	$this->db->where('telId',$this->getTelId());
	$this->db->update('tel',$dataTel);
}
function deleteAddress(){
	$this->db->where('ownerId',$this->getOwnerId());
	$this->db->delete('address');
}

function getAddressFK(){
	$this->db->join('childrens','childrens.childrenId = address.ownerId');
	$this->db->join('canton','canton.cantonId = address.cantonId');
	$this->db->join('district','district.districtId = address.districtId');
	$this->db->join('province','province.provinceId = address.provinceId');
	$this->db->join('zipcodes','zipcodes.cantonId = canton.cantonId');
	$this->db->join('tel','tel.addressId = address.addressId');
	$this->db->where('ownerType','childents');
	$this->db->where('address.ownerId',$this->getOwnerId());
	$data = $this->db->get('address')->result_array();
	
	return $data;
}

}
?>

