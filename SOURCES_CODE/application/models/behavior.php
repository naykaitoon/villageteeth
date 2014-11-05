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
    var $colorCode ; ######  สีของกราฟที่จะแสดง เก็บเป็น Code สี  ######
	var $behaviorTypeName; ###########  ชื่อประเภท ###########
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


 ###### SET : $colorCode ######
    function setColorCode($colorCode){
        $this->colorCode = $colorCode; 
     }
###### End SET : $colorCode ###### 


###### GET : $colorCode ######
    function getColorCode(){
        return $this->colorCode; 
     }
###### End GET : $colorCode ###### 

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
			'behaviorTypeId' => $this->getBehaviorTypeId(),
			'colorCode' => $this->getColorCode()
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
			'behaviorTypeId' => $this->getBehaviorTypeId(),
			'colorCode' => $this->getColorCode()
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
}
?>
