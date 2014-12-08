<?php 
class Behavior extends CI_Model {

    function __construct(){
	   parent::__construct();
    }

######  Attribute  ###### 
    var $behaviorId ; ######  รหัสข้อมูลพฤติกรรม  ######
    var $behaviorName ; ######  ชื่อข้อมูลพฤติกรรม  ######
    var $behaviorType ; ######  ประเภทข้อมูลพฤติกรรม เป็นการตรวจฟัน หรือตรวจทัวไป  ######
    var $behaviorTypeId ; ######  รหัสข้อมูลหมวดหมู่พฤติกรรม  ######
	var $behaviorTypeName; ###########  ชื่อประเภท ###########
	var $policingDate;
	var $provinceId ; ######  sssss  ######
    var $districtId ; ######  s  ######
    var $cantonId ; ######  s  ######
###### End Attribute  ###### 

 ###### SET : $behaviorId ######
    function setBehaviorId($behaviorId){
        $this->behaviorId = $behaviorId; 
     }
###### End SET : $behaviorId ###### 


###### GET : $behaviorId ######
    function getBehaviorId(){
        return $this->behaviorId; 
     }
###### End GET : $behaviorId ###### 


 ###### SET : $behaviorName ######
    function setBehaviorName($behaviorName){
        $this->behaviorName = $behaviorName; 
     }
###### End SET : $behaviorName ###### 


###### GET : $behaviorName ######
    function getBehaviorName(){
        return $this->behaviorName; 
     }
###### End GET : $behaviorName ###### 


 ###### SET : $behaviorType ######
    function setBehaviorType($behaviorType){
        $this->behaviorType = $behaviorType; 
     }
###### End SET : $behaviorType ###### 


###### GET : $behaviorType ######
    function getBehaviorType(){
        return $this->behaviorType; 
     }
###### End GET : $behaviorType ###### 


 ###### SET : $behaviorTypeId ######
    function setBehaviorTypeId($behaviorTypeId){
        $this->behaviorTypeId = $behaviorTypeId; 
     }
###### End SET : $behaviorTypeId ###### 


###### GET : $behaviorTypeId ######
    function getBehaviorTypeId(){
        return $this->behaviorTypeId; 
     }
###### End GET : $behaviorTypeId ###### 


###### GET : $behaviorTypeId ######
    function getBehaviorTypeName(){
        return $this->behaviorTypeName; 
     }
###### End GET : $behaviorTypeId ###### 


 ###### SET : $colorCode ######
    function setBehaviorTypeName($behaviorTypeName){
        $this->behaviorTypeName = $behaviorTypeName; 
     }
###### End SET : $colorCode ###### 


	function setPolicingDate($policingDate){
		 $this->policingDate = $policingDate; 
	}
###### GET : $behaviorTypeId ######
    function getPolicingDate(){
        return $this->policingDate; 
     }
###### End GET : $behaviorTypeId ###### 
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


	function getAlldataBehavior(){
		$this->db->join('behaviortype','behaviortype.behaviortypeId = behavior.behaviortypeId');
		$data = $this->db->get('behavior')->result_array();		
		return $data;
	}
	
	function getAlldataBehaviortype(){
		$data = $this->db->get('behaviortype')->result_array();		
		return $data;
	}
	
	function addBehavior(){
		$data = array(
			'behaviorName' => $this->getBehaviorName(),
			'behaviorType' => $this->getBehaviorType(),
			'behaviorTypeId' => $this->getBehaviorTypeId()
		);
		
		$this->db->insert('behavior',$data);
	}
	function addBehaviorType(){
		$data = array(
			'behaviorTypeName' => $this->getBehaviorTypeName()
		);
		
		$this->db->insert('behaviortype',$data);
	}
	
	function getBehaviorTypePk(){
		$this->db->where('behaviortype.behaviorTypeId',$this->getBehaviorTypeId());
		return $this->db->get('behaviortype')->result_array();		
	}
	
	function checkBehaviorInType(){

		$this->db->where('behavior.behaviorTypeId',$this->getBehaviorType());
		return $this->db->get('behavior')->result_array();		
	}
	
	function updateBehaviorType(){
		$data = array(
			'behaviorTypeName' => $this->getBehaviorTypeName()
		);
		$this->db->where('behaviorTypeId',$this->getBehaviorTypeId());
		$this->db->update('behaviortype',$data);
	}
	
	function updateBehavior(){
		$data = array(
			'behaviorName' => $this->getBehaviorName(),
			'behaviorType' => $this->getBehaviorType(),
			'behaviorTypeId' => $this->getBehaviorTypeId()
		);
		
		$this->db->where('behaviorId',$this->getBehaviorId());
		$this->db->update('behavior',$data);
	}
	
	function deleteBehaviorTypeDataPk(){
		
		$this->db->where('behaviorTypeId',$this->getBehaviorTypeId());
		$this->db->delete('behaviortype');
		
		
	}
	
	function deleteBehaviorDataPk(){
		
		$this->db->where('behaviorId',$this->getBehaviorId());
		$this->db->delete('behavior');
		
	}
	
	function getBehaviorPk(){
		$this->db->join('behaviortype','behaviortype.behaviortypeId = behavior.behaviortypeId');
		$this->db->where('behavior.behaviorId',$this->getBehaviorId());
		$data = $this->db->get('behavior')->result_array();		
		return $data;
	}
	
	function getBehaviorReport(){
		$this->db->select('behavior.behaviorId,policingdetial.policingDetialValue');
		$this->db->join('behavior','behavior.behaviorId = policingdetial.behaviorId');
		$this->db->join('policings','policings.policingId = policingdetial.policingId');
		$data = $this->db->get('policingdetial')->result_array();		
		return $data;
	}
	
	function getMyBehaviorReport(){
		$data['loginData'] = $this->session->userdata('loginData');
		$this->db->select('behavior.behaviorId,policingdetial.policingDetialValue');
		$this->db->join('behavior','behavior.behaviorId = policingdetial.behaviorId');
		$this->db->join('policings','policings.policingId = policingdetial.policingId');
		$this->db->join('childrens','childrens.childrenId = policings.childrenId');
		$this->db->join('address','address.addressId = childrens.addressId');
		$this->db->where('address.cantonId',$data['loginData']['cantonId']);
		$data = $this->db->get('policingdetial')->result_array();		
		return $data;
	}
	
	function getBehaviorReportYear(){
		$this->db->select('behavior.behaviorId,policingdetial.policingDetialValue');
		$this->db->join('behavior','behavior.behaviorId = policingdetial.behaviorId');
		$this->db->join('policings','policings.policingId = policingdetial.policingId');

		$this->db->like('policings.policingDate',$this->getPolicingDate());

		$data = $this->db->get('policingdetial')->result_array();		
		return $data;
	}
	function getMyBehaviorReportYear(){
		$data['loginData'] = $this->session->userdata('loginData');
		$this->db->select('behavior.behaviorId,policingdetial.policingDetialValue');
		$this->db->join('behavior','behavior.behaviorId = policingdetial.behaviorId');
		$this->db->join('policings','policings.policingId = policingdetial.policingId');
		$this->db->join('childrens','childrens.childrenId = policings.childrenId');
		$this->db->join('address','address.addressId = childrens.addressId');
		$this->db->like('policings.policingDate',$this->getPolicingDate());
		$this->db->where('address.cantonId',$data['loginData']['cantonId']);
		$data = $this->db->get('policingdetial')->result_array();		
		return $data;
	}
	function getByYear(){
		$this->db->select('policings.policingDate');
		$this->db->join('behavior','behavior.behaviorId = policingdetial.behaviorId');
		$this->db->join('policings','policings.policingId = policingdetial.policingId');
        $this->db->group_by('YEAR(policings.policingDate)'); 
        $data = $this->db->get('policingdetial')->result_array();		
		return $data;
	}
	function getMyByYear(){
		$data['loginData'] = $this->session->userdata('loginData');
		
		$this->db->select('policings.policingDate');
		$this->db->join('policings','policings.policingId = policingdetial.policingId');
		$this->db->join('childrens','childrens.childrenId = policings.childrenId');
		$this->db->join('address','address.addressId = childrens.addressId');
		$this->db->join('behavior','behavior.behaviorId = policingdetial.behaviorId');
		$this->db->where('address.cantonId',$data['loginData']['cantonId']);
        $this->db->group_by('YEAR(policings.policingDate)'); 
        $data = $this->db->get('policingdetial')->result_array();		
		return $data;

	}
	function getBehavior(){
		$data = $this->db->get('behavior')->result_array();		
		return $data;
	}
	
	function getBehaviorReportArea(){
		$this->db->select('behavior.behaviorId,policingdetial.policingDetialValue');

	
		$this->db->join('behavior','behavior.behaviorId = policingdetial.behaviorId');
		$this->db->join('policings','policings.policingId = policingdetial.policingId');
		$this->db->join('childrens','childrens.childrenId = policings.childrenId');
		$this->db->join('address','address.addressId = childrens.addressId');
		$this->db->like('policings.policingDate',$this->getPolicingDate());

		$data = $this->db->get('policingdetial')->result_array();		
		return $data;
	}
	
	
}
?>
