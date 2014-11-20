<?php 
class Policings extends CI_Model {

    function __construct(){
	   parent::__construct();
    }
	
	function getPolicingData(){
		
		$this->db->join('behaviortype','behaviortype.behaviortypeId = behavior.behaviortypeId');
		return $this->db->get('behavior')->result_array();
	}
	
	function getPolicingDataPk(){
		
		$this->db->join('behaviortype','behaviortype.behaviortypeId = behavior.behaviortypeId');
		return $this->db->get('behavior')->result_array();
	}
	
	function getPolicingDataBehaviortype(){
		return $this->db->get('behaviortype')->result_array();
	}
	
	function getPolicingDataDistance(){
		return $this->db->get('distance')->result_array();
	}
	
}
?>