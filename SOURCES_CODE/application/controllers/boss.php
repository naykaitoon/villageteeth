<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Boss extends CI_Controller {
	
	function __construct(){ /// เป็นฟังชั่นที่จะทำงานก่อน index จะทำงานเมื่อมีการเรียกใช้คราส Login นี้
            parent::__construct();
            $this->redirects();
    }
	   
	function index()
	{	
		$data['loginData'] = $this->session->userdata('loginData');
		$this->load->view('bossView',$data);
	}
	function redirects(){ 
 		 $loginData=$this->session->userdata('loginData');
	     $satus = $loginData['status'];  /// ให้ข้อมูลใน array session_data ชื่อ status เท่ากับ $satus
			 if($satus!="boss"||$loginData==FALSE){ //เช็คค่า $satus ว่าเป็น admin
				   	$this->session->unset_userdata('loginData'); //ลบ ค่า ใน session ทั้งหมด
			 	echo"<script>
				alert('คุณไม่มีสิทธิ์ ใช้งานในส่วนนี้ กรุณา ลงชื้อเข้าใช้ระบบใหม่ค่ะ');
				window.location='".base_url()."index.php/home';</script>";/// เป็นหน้าเว็บโดยใช้ javascript		
			 }
   
 	}
	function chillentInArea($page=0){
		$data['childent'] = $this->Childents->getchillentInArea($page,'chillentInArea');
		for($i=0;$i<count($data['childent']);$i++){
			$childrenBirthday = strtotime($data['childent'][$i]['childrenBirthday']);
			$data['childent'][$i]['childrenAge'] =  $this->timespan($childrenBirthday);
		}
		$this->load->view('boss/childent/magChlidentIntArea',$data);
	}
	function chillentAll($page=0){
		$data['childent'] = $this->Childents->getChillentAll($page,'chillentAll');
		
		for($i=0;$i<count($data['childent']);$i++){
			$childrenBirthday = strtotime($data['childent'][$i]['childrenBirthday']);
			$data['childent'][$i]['childrenAge'] =  $this->timespan($childrenBirthday);
		}
		$this->load->view('boss/childent/magChlidentIntAll',$data);
	}
	
	
	function editChildent($id){
		$data['province']=$this->Address->getProvinceAll();
		$this->Childents->setChildrenId($id);
		$data['childent'] = $this->Childents->getChildentInAearPKs();
		$this->load->view('boss/childent/fromEditChildent',$data);
	}


	function chillentAllProfile($page=0){
			$data['childent'] = $this->Childents->getChillentAll($page,'chillentAll');
		
		for($i=0;$i<count($data['childent']);$i++){
			$childrenBirthday = strtotime($data['childent'][$i]['childrenBirthday']);
			$data['childent'][$i]['childrenAge'] =  $this->timespan($childrenBirthday);
		}
		$this->load->view('boss/childent/magChlidentProfile',$data);
	}
########################## START function  timespan คำนวนวันเกิด ############################	
	function timespan($seconds = 1){	
	$time = time();
	if ( ! is_numeric($seconds)){
		$seconds = 1;
	}
	if ( ! is_numeric($time)){
		$time = time();
	}
	if ($time <= $seconds){
		$seconds = 1;
	}
	else{
		$seconds = $time - $seconds;
	}
	$str = '';
	$years = floor($seconds / 31536000);
	if ($years > 0){	
		$str .= $years.' ปี ';
	}	
	$seconds -= $years * 31536000;
	$months = floor($seconds / 2628000);
 
	if ($years > 0 OR $months > 0){
		if ($months > 0){	
			$str .= $months.' เดือน, ';
		}	
		$seconds -= $months * 2628000;
	}
	return substr(trim($str), 0, -1);
}

##########################END function  timespan คำนวนวันเกิด ############################	

 ##########################Start function  addChillent ตึงข้อมูลแบบฟรอมการเพิ่มข้อมูลเด็กในพื้นที่ ############################	
	function addChillentInArea(){
		$data['loginData'] = $this->session->userdata('loginData');
		if($data['loginData']['areaType']==='canton'){
			$this->Address->setCantonId($data['loginData']['areaId']);
		}else if($data['loginData']['areaType']==='district'){
			$this->Address->setDistrictId($data['loginData']['areaId']);
		}else if($data['loginData']['areaType']==='province'){
			$this->Address->setProvinceId($data['loginData']['areaId']);
		}
		$data['area']=$this->Address->getmemberAear();

		$this->load->view('boss/childent/formAddChildentMyArea',$data);
	}
##########################END function  addChillent ตึงข้อมูลแบบฟรอมการเพิ่มข้อมูลเด็ก############################	

 ##########################Start function  addChillent ตึงข้อมูลแบบฟรอมการเพิ่มข้อมูลเด็กในพื้นที่ ############################	
	function editChillentInArea($childentId){
		$data['loginData'] = $this->session->userdata('loginData');
		if($data['loginData']['areaType']==='canton'){
			$this->Address->setCantonId($data['loginData']['areaId']);
		}else if($data['loginData']['areaType']==='district'){
			$this->Address->setDistrictId($data['loginData']['areaId']);
		}else if($data['loginData']['areaType']==='province'){
			$this->Address->setProvinceId($data['loginData']['areaId']);
		}
		$data['area']=$this->Address->getmemberAear();
		$this->Childents->setChildrenId($childentId);
		$data['childent'] = $this->Childents->getChildentInAearPKs();
		$this->load->view('boss/childent/formEditChildentMyArea',$data);
	}
##########################END function  addChillent ตึงข้อมูลแบบฟรอมการเพิ่มข้อมูลเด็ก############################	
 ##########################Start function  addActionChillent เพิ่มข้อมูลเด็ก ############################	
	function editActionChildent(){
			$addressId = $this->input->post('addressId');
			$childrenId = $this->input->post('childrenId');
			$childrenName = $this->input->post('childrenName');
			$childrenLastName = $this->input->post('childrenLastName');
			$childrenIDCard = $this->input->post('childrenIDCard');
			$childrenBirthday = $this->input->post('childrenBirthday');
			
			$addressDetial = $this->input->post('addressDetial');
			$provinceId = $this->input->post('province');
			$districtId = $this->input->post('district');
			$cantonId = $this->input->post('canton');
			$street = $this->input->post('street');
			
			$telId = $this->input->post('telId');
			$tel = $this->input->post('tel');
			$telNote = $this->input->post('telNote');

	
			
			$this->Childents->setChildrenId($childrenId);
			$this->Childents->setChildrenName($childrenName);
			$this->Childents->setChildrenLastName($childrenLastName);
			$this->Childents->setChildrenBirthday($childrenBirthday);
			$this->Childents->setChildrenIDCard($childrenIDCard);
			
			$this->Childents->updateChildent();
			
			$this->Address->setAddressId($addressId);
			$this->Address->setOwnerType('childents');
			$this->Address->setAddressDetial($addressDetial);
			$this->Address->setProvinceId($provinceId);
			$this->Address->setDistrictId($districtId);
			$this->Address->setCantonId($cantonId);
			$this->Address->setStreet($street);
			
				$this->Address->updateAddress();
				
			$this->Address->setTelId($telId);
			$this->Address->setTel($tel);
			$this->Address->setTelNote($telNote);
			
			$this->Address->updateTel();
			
				echo "<center><br><br><br>การแก้ไขข้อมูลสำเร็จ  </center>";
			
	}
##########################END function  addActionChillent เพิ่มข้อมูลเด็ก ############################	
function deleteChildentData($id){
		echo "<body style='text-align: center'><p>คุณต้องการลบข้อมูล หรือไม่</p>
				<p>
				  <a href='".base_url()."index.php/boss/deleteChildentAction/".$id."'><input type='button' name='button' id='button' value='ยืนยันการลบ'></a>  &nbsp;&nbsp;&nbsp;
				  <a onClick='parent.jQuery.fancybox.close();'><input type='button' name='button2' id='button2' value='ยกเลิก'></a>
				</p>";
	}
function deleteChildentAction($childrenId){
	$this->Childents->setChildrenId($childrenId);
	$this->Childents->deleteChildent();
	$this->Address->setOwnerId($childrenId);
	$this->Address->deleteAddress();
	echo "<center><br><br><br>ลบข้อมูลสำเร็จ  </center>";
}
 ##########################Start function  addChillent ตึงข้อมูลแบบฟรอมการเพิ่มข้อมูลเด็ก ############################	
	function addChillent(){
		$data['province']=$this->Address->getProvinceAll();
		$this->load->view('boss/childent/formAddChildent',$data);
	}
##########################END function  addChillent ตึงข้อมูลแบบฟรอมการเพิ่มข้อมูลเด็ก############################	
 ##########################Start function  addActionChillent เพิ่มข้อมูลเด็ก ############################	
	function addActionChildent(){

			$childrenName = $this->input->post('childrenName');
			$childrenLastName = $this->input->post('childrenLastName');
			$childrenIDCard = $this->input->post('childrenIDCard');
			$childrenBirthday = $this->input->post('childrenBirthday');
			
			$addressDetial = $this->input->post('addressDetial');
			$provinceId = $this->input->post('province');
			$districtId = $this->input->post('district');
			$cantonId = $this->input->post('canton');
			$street = $this->input->post('street');
			
			$tel = $this->input->post('tel');
			$telNote = $this->input->post('telNote');
			
			$this->Childents->setChildrenName($childrenName);
			$this->Childents->setChildrenLastName($childrenLastName);
			$this->Childents->setChildrenBirthday($childrenBirthday);
			$this->Childents->setChildrenIDCard($childrenIDCard);
			
			$childrenId = $this->Childents->addChildent();
			
			$this->Address->setOwnerId($childrenId);
			$this->Address->setOwnerType('childents');
			$this->Address->setAddressDetial($addressDetial);
			$this->Address->setProvinceId($provinceId);
			$this->Address->setDistrictId($districtId);
			$this->Address->setCantonId($cantonId);
			$this->Address->setStreet($street);
			
			$this->Address->setTel($tel);
			$this->Address->setTelNote($telNote);
			
			$this->Address->addAddress();
			
				echo "<center><br><br><br>การเพิ่มข้อมูลสำเร็จ  </center>";
			
	}
##########################END function  addActionChillent เพิ่มข้อมูลเด็ก ############################	

	function getDistrict()
	{
		$provinceId = $this->input->post('provinceId');
		$this->Address->setProvinceId($provinceId);
		$data = $this->Address->getDistrictFk();
		if($provinceId!=0){
		for($i=0;$i<count($data);$i++){
			 echo '<option value="'.$data[$i]['districtId'].'">'.$data[$i]['districtName'].'</option>';
		}
		}else{
			 echo '<option value="0">กรุณาเลือกจังหวัด</option>';
		}
		
		
		
	}
	
	function getCanton()
	{
		$districtId = $this->input->post('districtId');
		$this->Address->setDistrictId($districtId);
		$data = $this->Address->getCantonFk();
		if($data){
			echo '<option value="0">กรุณาเลือก</option>';
		for($i=0;$i<count($data);$i++){
			echo '<option value="'.$data[$i]['cantonId'].'">'.$data[$i]['cantonName'].'</option>';
			echo '<script>$("#canton").removeAttr("disabled");</script>';
		}
		}else{
			 echo '<option value="0">กรุณาเลือกอำเภอ</option>';
		}
		
	}
	
	function getZipCode()
	{
		$cantonId = $this->input->post('cantonId');
		$this->Address->setCantonId($cantonId);
		$data = $this->Address->getZipcodeFk();
		
		if($cantonId!=0){
			echo $data[0]['zipcode'];
		}else{
			 echo '00000';
		}
		
	}
	
	function distanceDataList(){
		$data['distance'] = $this->Distance->getDistanceAll();
		$this->load->view('boss/policing/distance',$data);
	}
	
	#################### strat function editDistance จัดการข้อมูลระยะเวลาการตรวจ ##################
	function addDistance(){
		$this->load->view('boss/policing/addDistance');
	}
	#################### End function editDistance จัดการข้อมูลระยะเวลาการตรวจ ##################
	
	#################### strat function addDistanceAction เพิ่มข้อมูลระยะเวลาการตรวจ ##################
	function addDistanceAction(){
		$distanceMonth = $this->input->post('distanceMonth');

		if($distanceMonth!=FALSE&&$distanceMonth!=""){
			$this->Distance->setDistanceMonth($distanceMonth);
			$resultId = $this->Distance->addDistanceData();
			if($resultId!=FALSE&&$resultId!=""){
				echo "<center><br><br><br>การเพิ่มข้อมูลสำเร็จ</center>";
			}
			
		}else{
			echo "<center>กรุณาใส่จำนวนให้ถูกต้อง<br>
			<a href='".base_url()."index.php/boss/addDistance' style='font-size:12px'>คลิกที่นี้เพิ่อกลับ</a>
			</center>";
		}
		
	}
	#################### End function addDistanceAction เพิ่มข้อมูลระยะเวลาการตรวจ ##################
	
	#################### strat function editDistance จัดการข้อมูลระยะเวลาการตรวจ ##################
	function editDistance($distanceId){
		$this->Distance->setDistanceId($distanceId);
		$data['distance'] = $this->Distance->getDistancePk();
		$this->load->view('boss/policing/editDistance',$data);
	}
	#################### End function editDistance จัดการข้อมูลระยะเวลาการตรวจ ##################
#################### strat function editDistanceAction แก้ไข##################
	function editDistanceAction(){
		$distanceId = $this->input->post('distanceId');
		$distanceMonth = $this->input->post('distanceMonth');

		if($distanceMonth!=FALSE&&$distanceMonth!=""){
			$this->Distance->setDistanceId($distanceId);
			$this->Distance->setDistanceMonth($distanceMonth);
			$this->Distance->updateDistanceData();
			if($distanceMonth!=FALSE&&$distanceMonth!=""){
				echo "<center>การแก้ไขข้อมูลสำเร็จ<br>
						<a href='".base_url()."index.php/boss/distanceDataList'  style='font-size:12px' onClick='parent.jQuery.fancybox.close();'>
						<button>คลิกที่นี้เพื่อปิด</button></a>
					  </center>";
			}
			
		}else{
			echo "<center>กรุณาใส่จำนวนให้ถูกต้อง<br>
			<a href='".base_url()."index.php/boss/editDistance/".$distanceId."' style='font-size:12px'>คลิกที่นี้เพิ่อกลับ</a>
			</center>";
		}
		
	}
	
	
#################### end function editDistanceAction แก้ไข##################
	function deleteDistanceData($id){
		echo "<body style='text-align: center'><p>คุณต้องการลบข้อมูล หรือไม่</p>
				<p>
				  <a href='".base_url()."index.php/boss/deleteDistanceAction/".$id."'><input type='button' name='button' id='button' value='ยืนยันการลบ'></a>  &nbsp;&nbsp;&nbsp;
				  <a onClick='parent.jQuery.fancybox.close();'><input type='button' name='button2' id='button2' value='ยกเลิก'></a>
				</p>";
	}
####################end	function editDistance ยืนยันการลบ Distance##################

#################### strat function editDistance การลบ Distance##################
	function deleteDistanceAction($distanceId){
		$this->Distance->setDistanceId($distanceId);
		$this->Distance->deleteDistanceDataPk();
		echo "<script>parent.jQuery.fancybox.close();</script>";
	}
####################end	function editDistance การลบ Distance##################
	
	
	function behaviorMag(){
		$data['behavior'] = $this->Behavior->getAlldataBehavior();
		$this->load->view('boss/behavior/behavior',$data);
	}
	
	function behaviorMagType(){
		$data['behaviorMagType'] = $this->Behavior->getAlldataBehaviortype();
		$this->load->view('boss/behavior/behaviorType',$data);
	}
	
	function memberByArea(){
		$data['province']=$this->Address->getProvinceAll();
		$this->load->view('boss/member/magMemberSearchArea',$data);
	}
	
	function memberByAreaSearch($page=0){
		$provinceId = $this->input->post('provinceId');
		$districtId = $this->input->post('districtId');
		$cantonId = $this->input->post('cantonId');

		$this->Address->setProvinceId($provinceId);
		$this->Address->setDistrictId($districtId);
		$this->Address->setCantonId($cantonId);
		$data['province']=$this->Address->getProvinceAll();
		$data['member'] = $this->Address->getMemberByAddress($page,'memberByAreaSearch');
		$this->load->view('boss/member/magMemberListByArea',$data);
	}
#################### strat function memberAll แสดง ผุ็ใช้งานทั้งหมด ##################
	function memberAll($page=0){
		$data['member'] = $this->Member->getAllDataMember($page,'chillentAll');
		$this->load->view('boss/member/magMemberList',$data);
	}
####################end	function memberAll กแสดง ผุ็ใช้งานทั้งหมด ##################

	function childentAddress($childentId){
		$this->Address->setOwnerId($childentId);
		$data['childent'] = $this->Address->getAddressFK();
		$this->load->view('boss/childent/detialChildent',$data);
	}

}

?>