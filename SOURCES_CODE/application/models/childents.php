<?php 
class Childents extends CI_Model {

    function __construct(){
	   parent::__construct();
    }

######  Attribute  ###### 
    var $childrenId ; ######  รหัสข้อมูลเด็ก  ######
    var $childrenName ; ######  ชื่อเด็ก  ######
    var $childrenLastName ; ######  นามสกุลเด็ก  ######
    var $childrenBirthday ; ######  วันเกิด  ######
    var $childrenIDCard ; ######  รหัสบัตรประจำตัวประชาชน  ######
	var $addressId ; ######  รหัสบัตรประจำตัวประชาชน  ######
	var $diseasesId;
	var $diseasesName;
	var $medicine;
	var $textSearch ; ######  คำค้นหรือ pk fk  ######
	var $allergicMedicine;
###### End Attribute  ###### 
######################  start get/set ############################


 ###### SET : $childrenId ######
    function setChildrenId($childrenId){
        $this->childrenId = $childrenId; 
     }
###### End SET : $childrenId ###### 


###### GET : $childrenId ######
    function getChildrenId(){
        return $this->childrenId; 
     }
###### End GET : $childrenId ###### 
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


 ###### SET : $childrenName ######
    function setChildrenName($childrenName){
        $this->childrenName = $childrenName; 
     }
###### End SET : $childrenName ###### 


###### GET : $childrenName ######
    function getChildrenName(){
        return $this->childrenName; 
     }
###### End GET : $childrenName ###### 


 ###### SET : $childrenLastName ######
    function setChildrenLastName($childrenLastName){
        $this->childrenLastName = $childrenLastName; 
     }
###### End SET : $childrenLastName ###### 


###### GET : $childrenLastName ######
    function getChildrenLastName(){
        return $this->childrenLastName; 
     }
###### End GET : $childrenLastName ###### 


 ###### SET : $childrenBirthday ######
    function setChildrenBirthday($childrenBirthday){
        $this->childrenBirthday = $childrenBirthday; 
     }
###### End SET : $childrenBirthday ###### 


###### GET : $childrenBirthday ######
    function getChildrenBirthday(){
        return $this->childrenBirthday; 
     }
###### End GET : $childrenBirthday ###### 


 ###### SET : $childrenIDCard ######
    function setChildrenIDCard($childrenIDCard){
        $this->childrenIDCard = $childrenIDCard; 
     }
###### End SET : $childrenIDCard ###### 


###### GET : $childrenIDCard ######
    function getChildrenIDCard(){
        return $this->childrenIDCard; 
     }
###### End GET : $childrenIDCard ###### 

###### SET : $addressDetial ######
    function setAddressDetial($addressDetial){
        $this->addressDetial = $addressDetial; 
     }
###### End SET : $addressDetial ###### 


###### GET : $addressDetial ######
    function getAddressDetial(){
        return $this->addressDetial; 
     }
###### End GET : $textSearch ###### 
###### SET : $addressDetial ######
    function setTextSearch($textSearch){
        $this->textSearch = $textSearch; 
     }
###### End SET : $textSearch ###### 


###### GET : $textSearch ######
    function getTextSearch(){
        return $this->textSearch; 
     }
###### End GET : $textSearch ###### 

 ###### SET : $childrenId ######
    function setDiseasesId($diseasesId){
        $this->diseasesId = $diseasesId; 
     }
###### End SET : $childrenId ###### 


###### GET : $childrenId ######
    function getDiseasesId(){
        return $this->diseasesId; 
     }
###### End GET : $childrenId ###### 



 ###### SET : $childrenId ######
    function setDiseasesName($diseasesName){
        $this->diseasesName = $diseasesName; 
     }
###### End SET : $childrenId ###### 


###### GET : $childrenId ######
    function getDiseasesName(){
        return $this->diseasesName; 
     }
###### End GET : $childrenId ###### 



 ###### SET : $childrenId ######
    function setMedicine($medicine){
        $this->medicine = $medicine; 
     }
###### End SET : $childrenId ###### 


###### GET : $childrenId ######
    function getMedicine(){
        return $this->medicine; 
     }
###### End GET : $childrenId ###### 

 ###### SET : $childrenId ######
    function setAllergicMedicine($allergicMedicine){
        $this->allergicMedicine = $allergicMedicine; 
     }
###### End SET : $childrenId ###### 


###### GET : $childrenId ######
    function getAllergicMedicine(){
        return $this->allergicMedicine; 
     }
###### End GET : $childrenId ###### 

######################  end get/set ############################

######################  start getchillentInArea ############################
###########################  ดึงข้อมูลเด็กในเขตความรับผิดชอบของผู้ใช้งาน  #############################
function getChildentInArea($page,$url){
	 $pageValue = 15;///จำนวนข้อมูลต่อ1หน้า
	$datas= $this->session->userdata('loginData');

	$this->db->join('address','address.addressId = childrens.addressId');
	$this->db->join('canton','canton.cantonId = address.cantonId');
	$this->db->join('district','district.districtId = address.districtId');
	$this->db->join('province','province.provinceId = address.provinceId');
	$this->db->join('diseases','diseases.childrenId = childrens.childrenId');

		$this->db->where('address.cantonId',$datas['cantonId']);

		$this->db->where('address.districtId',$datas['districtId']);

		$this->db->where('address.provinceId',$datas['provinceId']);


	$data = $this->db->get('childrens',$pageValue,$page)->result_array();
	$config['base_url'] = "".base_url()."/index.php/boss/".$url; // ส่วนนี้ จะเป็น link ว่า จะให้ไปที่หน้าไหน ซึ่งเราจะให้ไปที่ method page ด้านล่าง
   		
	$this->db->from('childrens');
	$this->db->join('address','address.addressId = childrens.addressId');
	$this->db->join('canton','canton.cantonId = address.cantonId');
	$this->db->join('district','district.districtId = address.districtId');
	$this->db->join('province','province.provinceId = address.provinceId');
	


		$this->db->where('address.cantonId',$datas['cantonId']);

		$this->db->where('address.districtId',$datas['districtId']);

		$this->db->where('address.provinceId',$datas['provinceId']);

		
		 $config['total_rows'] = $this->db->count_all_results(); // ส
  		 $config['per_page'] = $pageValue; // ให้แสดงหน้าละจำนวนเท่าไหร่
		 $this->pagination->create_links();
  		 $this->pagination->initialize($config);   // จากกนั้น เอาค่า ไป config ใน object pagination ที่เรา load มา 

	 return $data;


	}

######################  end getChillentAll ############################
	function getChildentAll($page,$url){
	 $pageValue = 15;///จำนวนข้อมูลต่อ1หน้า
	$this->db->join('address','address.addressId = childrens.addressId');
	$this->db->join('canton','canton.cantonId = address.cantonId');
	$this->db->join('district','district.districtId = address.districtId');
	$this->db->join('province','province.provinceId = address.provinceId');
		$this->db->join('diseases','diseases.childrenId = childrens.childrenId');
	$data = $this->db->get('childrens',$pageValue,$page)->result_array();
	$loginData2 = $this->session->userdata('loginData');
	$config['base_url'] = "".base_url()."/index.php/boss/".$url; // ส่วนนี้ จะเป็น link ว่า จะให้ไปที่หน้าไหน ซึ่งเราจะให้ไปที่ method page ด้านล่าง
	$config['per_page'] = $pageValue; // ให้แสดงหน้าละจำนวนเท่าไหร่
	$this->db->select('*');
	$this->db->from('childrens');
	$this->db->join('address','address.addressId = childrens.addressId');
	$this->db->join('canton','canton.cantonId = address.cantonId');
	$this->db->join('district','district.districtId = address.districtId');
	$this->db->join('province','province.provinceId = address.provinceId');
	$this->db->join('diseases','diseases.childrenId = childrens.childrenId');
  	$config['total_rows'] = $this->db->count_all_results();// ส่วนนี้ จะนับว่า ฟิว ทั้งหมดที่อยู่ใน tb_user มีเท่าไหร่
	
		 
		 $this->pagination->create_links();
  		 $this->pagination->initialize($config);   // จากกนั้น เอาค่า ไป config ใน object pagination ที่เรา load มา 
	 return $data;


	}
######################  end getChillentAll ############################

	function getChildentAllSearch($page,$url){
	 $pageValue = 15;///จำนวนข้อมูลต่อ1หน้า
	$this->db->join('address','address.addressId = childrens.addressId');
	$this->db->join('canton','canton.cantonId = address.cantonId');
	$this->db->join('district','district.districtId = address.districtId');
	$this->db->join('province','province.provinceId = address.provinceId');
		$this->db->join('diseases','diseases.childrenId = childrens.childrenId');
	$this->db->like('childrens.childrenName',$this->getTextSearch());
	$this->db->or_like('childrens.childrenName',$this->getTextSearch());
	$this->db->or_like('childrens.childrenLastName',$this->getTextSearch());
	$this->db->or_like('childrens.childrenIDCard',$this->getTextSearch());
	$data = $this->db->get('childrens',$pageValue,$page)->result_array();
	$loginData2 = $this->session->userdata('loginData');
	$config['base_url'] = "".base_url()."/index.php/boss/".$url; // ส่วนนี้ จะเป็น link ว่า จะให้ไปที่หน้าไหน ซึ่งเราจะให้ไปที่ method page ด้านล่าง
	$config['per_page'] = $pageValue; // ให้แสดงหน้าละจำนวนเท่าไหร่
	$this->db->select('*');
	$this->db->from('childrens');
	$this->db->join('address','address.addressId = childrens.addressId');
	$this->db->join('canton','canton.cantonId = address.cantonId');
	$this->db->join('district','district.districtId = address.districtId');
	$this->db->join('province','province.provinceId = address.provinceId');
		$this->db->join('diseases','diseases.childrenId = childrens.childrenId');
	$this->db->or_like('childrens.childrenName',$this->getTextSearch());
	$this->db->or_like('childrens.childrenLastName',$this->getTextSearch());
	$this->db->or_like('childrens.childrenIDCard',$this->getTextSearch());
  	$config['total_rows'] = $this->db->count_all_results();// ส่วนนี้ จะนับว่า ฟิว ทั้งหมดที่อยู่ใน tb_user มีเท่าไหร่
	
		 
		 $this->pagination->create_links();
  		 $this->pagination->initialize($config);   // จากกนั้น เอาค่า ไป config ใน object pagination ที่เรา load มา 
	 return $data;


	}

function addChildent(){
	$data = array(
	'addressId'  => $this->getAddressId(),
	'addressDetial' => $this->getAddressDetial(),
	'childrenName' => $this->getChildrenName(),
	'childrenLastName' => $this->getChildrenLastName(),
	'childrenBirthday' => $this->getChildrenBirthday(),
	'childrenIDCard' => $this->getChildrenIDCard()
	);
	$this->db->insert('childrens',$data);
	return $this->db->insert_id();
}

function updateChildent(){
	$data = array(
	'addressDetial' => $this->getAddressDetial(),
	'childrenName' => $this->getChildrenName(),
	'childrenLastName' => $this->getChildrenLastName(),
	'childrenBirthday' => $this->getChildrenBirthday(),
	'childrenIDCard' => $this->getChildrenIDCard()
	);
	$this->db->where('childrenId',$this->getChildrenId());
	$this->db->update('childrens',$data);

}

function getChildentInAearPKs(){
		
	$this->db->join('address','address.addressId = childrens.addressId');
	$this->db->join('canton','canton.cantonId = address.cantonId');
	$this->db->join('district','district.districtId = address.districtId');
	$this->db->join('province','province.provinceId = address.provinceId');
	$this->db->join('zipcodes','zipcodes.cantonId = canton.cantonId');
	$this->db->join('diseases','diseases.childrenId = childrens.childrenId');
	$this->db->group_by('childrens.childrenId');
	$this->db->where('childrens.childrenId ',$this->getChildrenId()); 
	$data = $this->db->get('childrens')->result_array();
	return $data;
	}
function deleteChildent(){
	$this->db->where('childrenId',$this->getChildrenId());
	$this->db->delete('childrens');
	$this->db->where('diseases.childrenId',$this->getChildrenId());
	$this->db->delete('diseases');

}

function addDiseases(){
	$data = array(
	'childrenId' => $this->getChildrenId(),
	'diseasesName' => $this->getDiseasesName(),
	'medicine' => $this->getMedicine(),
	'allergicMedicine' => $this->getAllergicMedicine()
	);
	$this->db->insert('diseases',$data);
}

function updateDiseases(){
	$data = array(
	'childrenId' => $this->getChildrenId(),
	'diseasesName' => $this->getDiseasesName(),
	'medicine' => $this->getMedicine(),
	'allergicMedicine' => $this->getAllergicMedicine()
	);
	$this->db->where('diseases.diseasesId',$this->getDiseasesId());
	$this->db->update('diseases',$data);
}

function getChildentInAreaAlerting($page,$url){
	 $pageValue = 15;///จำนวนข้อมูลต่อ1หน้า
		$date = strtotime(date('Y-m-d'));
   		$dates = strtotime("+7 day", $date);
		$datass = $this->session->userdata('loginData');


	$this->db->join('address','address.addressId = childrens.addressId');
	$this->db->join('canton','canton.cantonId = address.cantonId');
	$this->db->join('district','district.districtId = address.districtId');
	$this->db->join('province','province.provinceId = address.provinceId');
	$this->db->join('diseases','diseases.childrenId = childrens.childrenId');
	$this->db->join('meetings','meetings.childrenId = childrens.childrenId');
	$this->db->join('policings','policings.policingId = meetings.policingId');
		$this->db->where('address.cantonId',$datass['cantonId']);

		$this->db->where('address.districtId',$datass['districtId']);

		$this->db->where('address.provinceId',$datass['provinceId']);

		$this->db->where('meetings.meetingsDate >=',date('Y-m-d'));
		$this->db->where('meetings.meetingsDate <=',date('Y-m-d',$dates));
		$this->db->where('policings.memberId',$datass['id']);
	$data = $this->db->get('childrens',$pageValue,$page)->result_array();
	$config['base_url'] = "".base_url()."/index.php/boss/".$url; // ส่วนนี้ จะเป็น link ว่า จะให้ไปที่หน้าไหน ซึ่งเราจะให้ไปที่ method page ด้านล่าง
   		
	$this->db->from('childrens');
	$this->db->join('address','address.addressId = childrens.addressId');
	$this->db->join('canton','canton.cantonId = address.cantonId');
	$this->db->join('district','district.districtId = address.districtId');
	$this->db->join('province','province.provinceId = address.provinceId');
	$this->db->join('meetings','meetings.childrenId = childrens.childrenId');
	$this->db->join('policings','policings.policingId = meetings.policingId');
	
		$this->db->where('address.cantonId',$datass['cantonId']);

		$this->db->where('address.districtId',$datass['districtId']);

		$this->db->where('address.provinceId',$datass['provinceId']);

		$this->db->where('meetings.meetingsDate >=',date('Y-m-d'));
		$this->db->where('meetings.meetingsDate <=',date('Y-m-d',$dates));
		$this->db->where('policings.memberId',$datass['id']);
		 $config['total_rows'] = $this->db->count_all_results(); // ส
  		 $config['per_page'] = $pageValue; // ให้แสดงหน้าละจำนวนเท่าไหร่
		 $this->pagination->create_links();
  		 $this->pagination->initialize($config);   // จากกนั้น เอาค่า ไป config ใน object pagination ที่เรา load มา 

	 return $data;


	}
	
	function getChildentInAreaAlertingSearch($page,$url){
		$pageValue = 15;///จำนวนข้อมูลต่อ1หน้า
		$date = strtotime(date('Y-m-d'));
   		$dates = strtotime("+7 day", $date);
		$datass = $this->session->userdata('loginData');


	$this->db->join('meetings','meetings.childrenId = childrens.childrenId');
	$this->db->join('policings','policings.policingId = meetings.policingId');
	if($this->getTextSearch()!=""||$this->getTextSearch()!=FALSE){
		$this->db->or_like('childrens.childrenName',$this->getTextSearch());
		$this->db->or_like('childrens.childrenLastName',$this->getTextSearch());
		$this->db->or_like('childrens.childrenIDCard',$this->getTextSearch());
		$data = $this->db->get('childrens',$pageValue,$page)->result_array();
		}
		$this->db->where('meetings.meetingsDate >=',date('Y-m-d'));
		$this->db->where('meetings.meetingsDate <=',date('Y-m-d',$dates));
		$this->db->where('policings.memberId',$datass['id']);
		
	$config['base_url'] = "".base_url()."/index.php/boss/".$url; // ส่วนนี้ จะเป็น link ว่า จะให้ไปที่หน้าไหน ซึ่งเราจะให้ไปที่ method page ด้านล่าง
   		
	$this->db->from('childrens');
	$this->db->join('meetings','meetings.childrenId = childrens.childrenId');
	$this->db->join('policings','policings.policingId = meetings.policingId');
	if($this->getTextSearch()!=""||$this->getTextSearch()!=FALSE){
	$this->db->or_like('childrens.childrenName',$this->getTextSearch());
	$this->db->or_like('childrens.childrenLastName',$this->getTextSearch());
	$this->db->or_like('childrens.childrenIDCard',$this->getTextSearch());
	}
		$this->db->where('meetings.meetingsDate >=',date('Y-m-d'));
		$this->db->where('meetings.meetingsDate <=',date('Y-m-d',$dates));
		$this->db->where('policings.memberId',$datass['id']);

		 $config['total_rows'] = $this->db->count_all_results(); // ส
  		 $config['per_page'] = $pageValue; // ให้แสดงหน้าละจำนวนเท่าไหร่
		 $this->pagination->create_links();
  		 $this->pagination->initialize($config);   // จากกนั้น เอาค่า ไป config ใน object pagination ที่เรา load มา 

	 return $data;

	}

}
?>