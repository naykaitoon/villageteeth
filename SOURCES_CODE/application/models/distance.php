<?php 
class Distance extends CI_Model {

    function __construct(){
	   parent::__construct();
    }

######  Attribute  ###### 
    var $distanceId ; ######  รหัสข้อมูลช่วงระยะเวลาการตรวจ  ######
    var $distanceMonth ; ######  ระยะเวลาการตรวจ หน่วยเป็น เดือน  ######
###### End Attribute  ###### 

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

####################### start addDistanceData เพิ่มข้อมูล ###########################
	function addDistanceData(){
		$data = array(
		'distanceMonth' => $this->getDistanceMonth()
		);
		$this->db->insert('distance',$data);
		return $this->db->insert_id();
	}
####################### end addDistanceData เพิ่มข้อมูล ###########################

####################### start addDistanceData แก้ไขข้อมูล ###########################
	function updateDistanceData(){
		$data = array(
		'distanceMonth' => $this->getDistanceMonth()
		);
		$this->db->where('distanceId',$this->getDistanceId());
		$this->db->update('distance',$data);
	}
####################### end addDistanceData แก้ไขข้อมูล ###########################

####################### start addDistanceData ดึงข้อมูลทั้งหมด ###########################
	function deleteDistanceDataPk(){
		$this->db->where('distanceId',$this->getDistanceId());
		$this->db->delete('distance');
	}
####################### end addDistanceData ดึงข้อมูลทั้งหมด ###########################

####################### start getDistanceAll ดึงข้อมูลทั้งหมด ###########################
	function getDistanceAll(){
		$this->db->order_by('distanceMonth','ASC');
		return $this->db->get('distance')->result_array();
	}
####################### end getDistanceAll ดึงข้อมูลทั้งหมด ###########################

####################### start getDistanceAll ดึงข้อมูลPK ###########################
	function getDistancePk(){
		$this->db->where('distanceId',$this->getDistanceId());
		return $this->db->get('distance')->result_array();
	}
####################### end getDistanceAll ดึงข้อมูลPK ###########################

}
?>