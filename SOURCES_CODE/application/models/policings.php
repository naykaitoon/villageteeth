<?php 
class Policings extends CI_Model {

    function __construct(){
	   parent::__construct();
    }

######  Attribute  ###### 
    var $policingId ; ######  รหัสข้อมูลการตรวจ  ######
    var $distanceId ; ######  รหัสข้อมูลช่วงระยะเวลาการตรวจ  ######
    var $childrenId ; ######  รหัสข้อมูลเด็ก  ######
    var $memberId ; ######  รหัสข้อมูลผู้ใช้งาน  ######
    var $policingDate ; ######  วัน/เวลา ที่ตรวจ  ######
    var $policingDetialId ; ######  รหัสข้อมูลรายละเอียดการตรวจ  ######
    var $behaviorId ; ######  รหัสข้อมูลพฤติกรรม  ######
    var $policingDetialValue ; ######  ผลรายละเอียดการตรวจ  ######
    var $behaviorName ; ######  ชื่อข้อมูลพฤติกรรม  ######
    var $behaviorType ; ######  ประเภทข้อมูลพฤติกรรม เป็นการตรวจฟัน หรือตรวจทัวไป  ######
    var $behaviorTypeId ; ######  รหัสข้อมูลหมวดหมู่พฤติกรรม  ######
    var $colorCode ; ######  สีของกราฟที่จะแสดง เก็บเป็น Code สี  ######
    var $behaviorTypeName ; ######  ชื่อหมวดหมู่พฤติกรรม  ######
    var $brokenToothId ; ######  รหัสข้อมูลฝันผุ  ######
    var $brokenToothNumber ; ######  เลขซี้ฝันที่ผุ  ######
    var $brokenToothSide ; ######  ด้านฝันที่ผุ บน/ล่าง  ######
    var $distanceMonth ; ######  ระยะเวลาการตรวจ หน่วยเป็น เดือน  ######
    var $meetingId ; ######  รหัสข้อมูลการนัด  ######
    var $meetingsDate ; ######  เวลานัด  ######
###### End Attribute  ###### 

 ###### SET : $policingId ######
    function setPolicingId($policingId){
        $this->policingId = $policingId; 
     }
###### End SET : $policingId ###### 


###### GET : $policingId ######
    function getPolicingId(){
        return $this->policingId; 
     }
###### End GET : $policingId ###### 


 ###### SET : $distanceId ######
    function setDistanceId($distanceId){
        $this->distanceId = $distanceId; 
     }
###### End SET : $distanceId ###### 


###### GET : $distanceId ######
    function getDistanceId(){
        return $this->distanceId; 
     }
###### End GET : $distanceId ###### 


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


 ###### SET : $policingDate ######
    function setPolicingDate($policingDate){
        $this->policingDate = $policingDate; 
     }
###### End SET : $policingDate ###### 


###### GET : $policingDate ######
    function getPolicingDate(){
        return $this->policingDate; 
     }
###### End GET : $policingDate ###### 


 ###### SET : $policingDetialId ######
    function setPolicingDetialId($policingDetialId){
        $this->policingDetialId = $policingDetialId; 
     }
###### End SET : $policingDetialId ###### 


###### GET : $policingDetialId ######
    function getPolicingDetialId(){
        return $this->policingDetialId; 
     }
###### End GET : $policingDetialId ###### 


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


 ###### SET : $policingDetialValue ######
    function setPolicingDetialValue($policingDetialValue){
        $this->policingDetialValue = $policingDetialValue; 
     }
###### End SET : $policingDetialValue ###### 


###### GET : $policingDetialValue ######
    function getPolicingDetialValue(){
        return $this->policingDetialValue; 
     }
###### End GET : $policingDetialValue ###### 


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


 ###### SET : $behaviorTypeName ######
    function setBehaviorTypeName($behaviorTypeName){
        $this->behaviorTypeName = $behaviorTypeName; 
     }
###### End SET : $behaviorTypeName ###### 


###### GET : $behaviorTypeName ######
    function getBehaviorTypeName(){
        return $this->behaviorTypeName; 
     }
###### End GET : $behaviorTypeName ###### 


 ###### SET : $brokenToothId ######
    function setBrokenToothId($brokenToothId){
        $this->brokenToothId = $brokenToothId; 
     }
###### End SET : $brokenToothId ###### 


###### GET : $brokenToothId ######
    function getBrokenToothId(){
        return $this->brokenToothId; 
     }
###### End GET : $brokenToothId ###### 


 ###### SET : $brokenToothNumber ######
    function setBrokenToothNumber($brokenToothNumber){
        $this->brokenToothNumber = $brokenToothNumber; 
     }
###### End SET : $brokenToothNumber ###### 


###### GET : $brokenToothNumber ######
    function getBrokenToothNumber(){
        return $this->brokenToothNumber; 
     }
###### End GET : $brokenToothNumber ###### 


 ###### SET : $brokenToothSide ######
    function setBrokenToothSide($brokenToothSide){
        $this->brokenToothSide = $brokenToothSide; 
     }
###### End SET : $brokenToothSide ###### 


###### GET : $brokenToothSide ######
    function getBrokenToothSide(){
        return $this->brokenToothSide; 
     }
###### End GET : $brokenToothSide ###### 


 ###### SET : $distanceMonth ######
    function setDistanceMonth($distanceMonth){
        $this->distanceMonth = $distanceMonth; 
     }
###### End SET : $distanceMonth ###### 


###### GET : $distanceMonth ######
    function getDistanceMonth(){
        return $this->distanceMonth; 
     }
###### End GET : $distanceMonth ###### 


 ###### SET : $meetingId ######
    function setMeetingId($meetingId){
        $this->meetingId = $meetingId; 
     }
###### End SET : $meetingId ###### 


###### GET : $meetingId ######
    function getMeetingId(){
        return $this->meetingId; 
     }
###### End GET : $meetingId ###### 


 ###### SET : $meetingsDate ######
    function setMeetingsDate($meetingsDate){
        $this->meetingsDate = $meetingsDate; 
     }
###### End SET : $meetingsDate ###### 


###### GET : $meetingsDate ######
    function getMeetingsDate(){
        return $this->meetingsDate; 
     }
###### End GET : $meetingsDate ###### 

function getPolicingData(){
		
		$this->db->join('behaviortype','behaviortype.behaviortypeId = behavior.behaviortypeId');
		return $this->db->get('behavior')->result_array();
	}
	
	function getPolicingDataPk(){
		
		$this->db->join('behaviortype','behaviortype.behaviortypeId = behavior.behaviortypeId');
		$this->db->where('behavior.behaviorId',$this->getBehaviorId());
		return $this->db->get('behavior')->result_array();
	}
	
	function getPolicingDataBehaviortype(){
		return $this->db->get('behaviortype')->result_array();
	}
	
	function getPolicingDataDistance(){
		return $this->db->get('distance')->result_array();
	}
	
	function addPolicing(){
		$data =array(
		'distanceId' => $this->getDistanceId(),
		'childrenId' => $this->getChildrenId(),
		'memberId' => $this->getMemberId(),
		'policingDate' => date('Y-m-d H:m:s')
		);
		$this->db->insert('policings',$data);
		return $this->db->insert_id();
	}
	
	function addPolicingDetial(){
		$data =array(
			'policingId'=> $this->getPolicingId(),
			'behaviorId'=> $this->getBehaviorId(),
			'policingDetialValue'=> $this->getPolicingDetialValue()
		);
		$this->db->insert('policingdetial',$data);
		return $this->db->insert_id();	
	}
	
	function addBrokentooth(){
		$data =array(
			'policingDetialId'=> $this->getPolicingDetialId(),
			'brokenToothNumber'=> $this->getBrokenToothNumber(),
			'brokenToothSide'=> $this->getBrokenToothSide()
		);
		$this->db->insert('brokentooth',$data);
		
	}
	
	function addMeetings(){
			$data =array(
			'policingId'=> $this->getPolicingId(),
			'childrenId'=> $this->getChildrenId(),
			'meetingsDate'=> $this->getMeetingsDate()
		);
		$this->db->insert('meetings',$data);
	}
	
	function findMaxPolicing(){
		$this->db->select_max('distance.distanceMonth');
		$this->db->join('distance','distance.distanceId = policings.distanceId');
		$this->db->where('policings.childrenId',$this->getChildrenId());
		return $this->db->get('policings')->result_array();
	}
	
	function findding(){
		
	
		$this->db->join('childrens','childrens.childrenId = policings.childrenId');
		$this->db->join('members','members.memberId = policings.memberId');
		
		$this->db->join('distance','distance.distanceId = policings.distanceId');
		
		return $this->db->get('policings')->result_array();
	}
}
?>
