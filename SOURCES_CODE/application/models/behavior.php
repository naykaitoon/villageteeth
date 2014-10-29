<?php 
class Behavior extends CI_Model {

    function __construct(){
	   parent::__construct();
    }
	
	function getAlldataBehavior(){
		$data = $this->db->get('behavior')->result_array();		
		return $data;
	}
	
	function getAlldataBehaviortype(){
		$data = $this->db->get('behaviortype')->result_array();		
		return $data;
	}
	
}
?>