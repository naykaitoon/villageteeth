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
	var $textSearch ; ######  คำค้นหรือ pk fk  ######
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

	
######################  end get/set ############################

######################  start getchillentInArea ############################
###########################  ดึงข้อมูลเด็กในเขตความรับผิดชอบของผู้ใช้งาน  #############################
function getChillentInArea($page,$url){
	 $pageValue = 15;///จำนวนข้อมูลต่อ1หน้า
	$data = $this->session->userdata('loginData');
	$this->db->where('address.ownerType ','childents'); 
	$this->db->join('canton','canton.cantonId = address.cantonId');
	$this->db->join('district','district.districtId = address.districtId');
	$this->db->join('province','province.provinceId = address.provinceId');

	$this->db->join('childrens','address.ownerId = childrens.childrenId');
	
	if($data['areaType']=='canton'){
		$this->db->where('address.cantonId',$data['areaId']);
	}else if($data['areaType']=='district'){
		$this->db->where('address.districtId',$data['areaId']);
	}else if($data['areaType']=='province'){
		$this->db->where('address.provinceId',$data['areaId']);
	}

	$data = $this->db->get('address',$pageValue,$page)->result_array();
	$loginData2 = $this->session->userdata('loginData');
	$config['base_url'] = "".base_url()."/index.php/boss/".$url; // ส่วนนี้ จะเป็น link ว่า จะให้ไปที่หน้าไหน ซึ่งเราจะให้ไปที่ method page ด้านล่าง
	
	$this->db->select('*');
	$this->db->from('address');
	$this->db->where('address.ownerType ','childents'); 
	$this->db->join('canton','canton.cantonId = address.cantonId');
	$this->db->join('district','district.districtId = address.districtId');
	$this->db->join('province','province.provinceId = address.provinceId');

	$this->db->join('childrens','address.ownerId = childrens.childrenId');
	
	if($loginData2['areaType']=='canton'){
		$this->db->where('address.cantonId',$loginData2['areaId']);
	}else if($loginData2['areaType']=='district'){
		$this->db->where('address.districtId',$loginData2['areaId']);
	}else if($loginData2['areaType']=='province'){
		$this->db->where('address.provinceId',$loginData2['areaId']);
	}
	
  	$config['total_rows'] = $this->db->count_all_results();// ส่วนนี้ จะนับว่า ฟิว ทั้งหมดที่อยู่ใน tb_user มีเท่าไหร่
	$config['per_page'] = $pageValue; // ให้แสดงหน้าละจำนวนเท่าไหร่
		 
		 $this->pagination->create_links();
  		 $this->pagination->initialize($config);   // จากกนั้น เอาค่า ไป config ใน object pagination ที่เรา load มา 
	 return $data;


	}
	
	function getChillentAll($page,$url){
	 $pageValue = 15;///จำนวนข้อมูลต่อ1หน้า
	$this->db->where('address.ownerType ','childents'); 
	$this->db->join('canton','canton.cantonId = address.cantonId');
	$this->db->join('district','district.districtId = address.districtId');
	$this->db->join('province','province.provinceId = address.provinceId');

	$this->db->join('childrens','address.ownerId = childrens.childrenId');

	$data = $this->db->get('address',$pageValue,$page)->result_array();
	$loginData2 = $this->session->userdata('loginData');
	$config['base_url'] = "".base_url()."/index.php/boss/".$url; // ส่วนนี้ จะเป็น link ว่า จะให้ไปที่หน้าไหน ซึ่งเราจะให้ไปที่ method page ด้านล่าง
	
	$this->db->select('*');
	$this->db->from('address');
	$this->db->where('address.ownerType ','childents'); 
	$this->db->join('canton','canton.cantonId = address.cantonId');
	$this->db->join('district','district.districtId = address.districtId');
	$this->db->join('province','province.provinceId = address.provinceId');

	$this->db->join('childrens','address.ownerId = childrens.childrenId');

  	$config['total_rows'] = $this->db->count_all_results();// ส่วนนี้ จะนับว่า ฟิว ทั้งหมดที่อยู่ใน tb_user มีเท่าไหร่
	$config['per_page'] = $pageValue; // ให้แสดงหน้าละจำนวนเท่าไหร่
		 
		 $this->pagination->create_links();
  		 $this->pagination->initialize($config);   // จากกนั้น เอาค่า ไป config ใน object pagination ที่เรา load มา 
	 return $data;


	}
######################  end getchillentInArea ############################

function test(){
	$data = $this->session->userdata('loginData');
	$this->db->where('address.ownerType ','childents'); 
	$this->db->join('canton','canton.cantonId = address.cantonId');
	$this->db->join('district','district.districtId = address.districtId');
	$this->db->join('province','province.provinceId = address.provinceId');

	$this->db->join('childrens','address.ownerId = childrens.childrenId');
	$this->db->where('address.cantonId',$data['areaId']);
	$this->db->or_where('address.districtId',$data['areaId']);
	$this->db->or_where('address.provinceId',$data['areaId']);
	return $this->db->get('address')->result_array();
	
}
}
?>