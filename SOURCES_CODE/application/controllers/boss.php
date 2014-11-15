<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Boss extends CI_Controller {
	
	function __construct(){ /// เป็นฟังชั่นที่จะทำงานก่อน index จะทำงานเมื่อมีการเรียกใช้คราส Login นี้
            parent::__construct();
            $this->redirects();
			$this->load->library('pagination');
			include_once('login.php');
  			$login = new login(); 
			$result = $login->checkingLogin();
			if($result!=TRUE){
				echo"<script langquage='javascript'>window.location='".base_url()."index.php/home';</script>";
			}
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
	function childentInArea($page=0){
		$data['childent'] = $this->Childents->getChildentInArea($page,'childentInArea');
		for($i=0;$i<count($data['childent']);$i++){
			$childrenBirthday = strtotime($data['childent'][$i]['childrenBirthday']);
			$data['childent'][$i]['childrenAge'] =  $this->timespan($childrenBirthday);
		}
		$this->load->view('boss/childent/magChlidentIntArea',$data);
	}
	
	function childentInAreaSearch($page=0){
		$text = $this->input->post('key');
		$this->Childents->setTextSearch($text);
		$data['childent'] = $this->Childents->getChildentAllSearch($page,'childentInAreaSearch');
		for($i=0;$i<count($data['childent']);$i++){
			$childrenBirthday = strtotime($data['childent'][$i]['childrenBirthday']);
			$data['childent'][$i]['childrenAge'] =  $this->timespan($childrenBirthday);
		}
		$this->load->view('boss/childent/searchResultChildentInAera',$data);
	}
	
	
	function childentAll($page=0){
		$data['childent'] = $this->Childents->getChildentAll($page,'childentAll');
		
		for($i=0;$i<count($data['childent']);$i++){
			$childrenBirthday = strtotime($data['childent'][$i]['childrenBirthday']);
			$data['childent'][$i]['childrenAge'] =  $this->timespan($childrenBirthday);
		}
		$this->load->view('boss/childent/magChlidentIntAll',$data);
	}
	function childentAllSearch($page=0){
		$text = $this->input->post('key');
		$this->Childents->setTextSearch($text);
		$data['childent'] = $this->Childents->getChildentAllSearch($page,'childentAllSearch');
		
		for($i=0;$i<count($data['childent']);$i++){
			$childrenBirthday = strtotime($data['childent'][$i]['childrenBirthday']);
			$data['childent'][$i]['childrenAge'] =  $this->timespan($childrenBirthday);
		}
		$this->load->view('boss/childent/searchResultChildent',$data);
	}
	
	function editChildent($childentId){
		$data['loginData'] = $this->session->userdata('loginData');
		
		
		$this->Childents->setChildrenId($childentId);
		
		$data['childent'] = $this->Childents->getChildentInAearPKs();
		$addressId = $data['childent'][0]['addressId'];
		 $this->Address->setAddressId($addressId);
		$data['tel'] = $this->Address->getTelFk();

		$data['province'] = $this->Address->getProvinceAll();

		$this->load->view('boss/childent/fromEditChildent',$data);
	}


	function childentAllProfile($page=0){
			$data['childent'] = $this->Childents->getChildentAll($page,'childentAllProfile');
		
		for($i=0;$i<count($data['childent']);$i++){
			$childrenBirthday = strtotime($data['childent'][$i]['childrenBirthday']);
			$data['childent'][$i]['childrenAge'] =  $this->timespan($childrenBirthday);
		}
		$this->load->view('boss/childent/magChlidentProfile',$data);
	}
	
	function childentAllProfileSearch($page=0){
		$text = $this->input->post('key');
		$this->Childents->setTextSearch($text);
		$data['childent'] = $this->Childents->getChildentAllSearch($page,'childentAllSearch');
		
		for($i=0;$i<count($data['childent']);$i++){
			$childrenBirthday = strtotime($data['childent'][$i]['childrenBirthday']);
			$data['childent'][$i]['childrenAge'] =  $this->timespan($childrenBirthday);
		}
		$this->load->view('boss/childent/searchResultChildentProfile',$data);
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
		$str .= $years.' ปี&nbsp;';
	}	
	$seconds -= $years * 31536000;
	$months = floor($seconds / 2628000);
 
	if ($years > 0 || $months > 0){
		if ($months >= 1){	
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

			$this->Address->setCantonId($data['loginData']['cantonId']);
	
			$this->Address->setDistrictId($data['loginData']['districtId']);

			$this->Address->setProvinceId($data['loginData']['provinceId']);
	
		$data['area']=$this->Address->getmemberAear();

		$this->load->view('boss/childent/formAddChildentMyArea',$data);
	}
##########################END function  addChillent ตึงข้อมูลแบบฟรอมการเพิ่มข้อมูลเด็ก############################	

 ##########################Start function  addChillent ตึงข้อมูลแบบฟรอมการเพิ่มข้อมูลเด็กในพื้นที่ ############################	
	function editChildentInArea($childentId){
		$data['loginData'] = $this->session->userdata('loginData');
		
		
		$this->Childents->setChildrenId($childentId);
		
		$data['childent'] = $this->Childents->getChildentInAearPKs();
		$addressId = $data['childent'][0]['addressId'];
		 $this->Address->setAddressId($addressId);
		$data['tel'] = $this->Address->getTelFk();

		$data['province'] = $this->Address->getProvinceAll();

		
		$this->load->view('boss/childent/fromEditChildent',$data);
	}
##########################END function  addChillent ตึงข้อมูลแบบฟรอมการเพิ่มข้อมูลเด็ก############################	
 ##########################Start function  addActionChillent เพิ่มข้อมูลเด็ก ############################	
	function editActionChildent(){
			$childrenId = $this->input->post('childrenId');
			$childrenName = $this->input->post('childrenName');
			$childrenLastName = $this->input->post('childrenLastName');
			$childrenIDCard = $this->input->post('childrenIDCard');
			$date = $this->input->post('childrenBirthday');
			
			$childrenBirthday = $this->formatDate($date);

			$addressDetialNumber = $this->input->post('addressDetialNumber');
			$addressDetialM = $this->input->post('addressDetialM');
			$addressDetialSubStreet = $this->input->post('addressDetialSubStreet');
			
			$addressDetial = $addressDetialNumber.' หมู่ '.$addressDetialM.' ซอย '.$addressDetialSubStreet;
			
			$addressId = $this->input->post('addressId');
			$provinceId = $this->input->post('province');
			$districtId = $this->input->post('district');
			$cantonId = $this->input->post('canton');
			$street = $this->input->post('street');
			
			$telId = $this->input->post('telId');
			$tel = $this->input->post('tel');
			$telNote = $this->input->post('telNote');
			
			
			$this->Address->setAddressId($addressId);
			$this->Address->setProvinceId($provinceId);
			$this->Address->setDistrictId($districtId);
			$this->Address->setCantonId($cantonId);
			$this->Address->setStreet($street);
			
			$this->Address->updateAddress();
			
			$this->Childents->setChildrenId($childrenId);
			$this->Childents->setAddressId($addressId);
			$this->Childents->setAddressDetial($addressDetial);
			$this->Childents->setChildrenName($childrenName);
			$this->Childents->setChildrenLastName($childrenLastName);
			$this->Childents->setChildrenBirthday($childrenBirthday);
			$this->Childents->setChildrenIDCard($childrenIDCard);

			
			$this->Childents->updateChildent();
			
			
			for($i=0;$i<count($tel);$i++){	
				$this->Address->setTelId($telId[$i]);
				$this->Address->setTel($tel[$i]);
				$this->Address->setTelNote($telNote[$i]);
				$this->Address->updateTel();
				
			}
				echo "<script>parent.$.fancybox.close();</script>";
			
	}
##########################END function  addActionChillent เพิ่มข้อมูลเด็ก ############################	
function deleteChildentData($id,$addressId){
		echo "<body style='text-align: center'><p>คุณต้องการลบข้อมูล หรือไม่</p>
				<p>
				  <a href='".base_url()."index.php/boss/deleteChildentAction/".$id."/".$addressId."'><input type='button' name='button' id='button' value='ยืนยันการลบ'></a>  &nbsp;&nbsp;&nbsp;
				  <a onClick='parent.jQuery.fancybox.close();'><input type='button' name='button2' id='button2' value='ยกเลิก'></a>
				</p>";
	}
function deleteChildentAction($childrenId,$addressId){
	$this->Childents->setChildrenId($childrenId);
	$this->Childents->deleteChildent();
	$this->Address->setAddressId($addressId);
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
			$date = $this->input->post('childrenBirthday');
			
			$childrenBirthday = $this->formatDate($date);

			$addressDetialNumber = $this->input->post('addressDetialNumber');
			$addressDetialM = $this->input->post('addressDetialM');
			$addressDetialSubStreet = $this->input->post('addressDetialSubStreet');
			
			$addressDetial = $addressDetialNumber.' หมู่ '.$addressDetialM.' ซอย '.$addressDetialSubStreet;
			
			$provinceId = $this->input->post('province');
			$districtId = $this->input->post('district');
			$cantonId = $this->input->post('canton');
			$street = $this->input->post('street');
			
			$tel = $this->input->post('tel');
			$telNote = $this->input->post('telNote');
			
			$this->Address->setProvinceId($provinceId);
			$this->Address->setDistrictId($districtId);
			$this->Address->setCantonId($cantonId);
			$this->Address->setStreet($street);
			
			$addressId = $this->Address->addAddress();
			
			$this->Childents->setAddressId($addressId);
			$this->Childents->setAddressDetial($addressDetial);
			$this->Childents->setChildrenName($childrenName);
			$this->Childents->setChildrenLastName($childrenLastName);
			$this->Childents->setChildrenBirthday($childrenBirthday);
			$this->Childents->setChildrenIDCard($childrenIDCard);

			
			$childrenId = $this->Childents->addChildent();
			
			
			$this->Address->setAddressId($addressId);
			
			for($i=0;$i<count($tel);$i++){			
				$this->Address->setTel($tel[$i]);
				$this->Address->setTelNote($telNote[$i]);
				$this->Address->addTel();
				
			}
			
			
			
				echo "<script>parent.$.fancybox.close();</script>";
			
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
	
	function addBehaviorMagType(){
		
		$this->load->view('boss/behavior/addBehaviorType');

	}
	
	function addBehaviorMagTypeAction(){
		
		$behaviorTypeName = $this->input->post('behaviorTypeName');
		$this->Behavior->setBehaviorTypeName($behaviorTypeName);
		$this->Behavior->addBehaviorType();
		echo "<center><br><br><br>การเพิ่มข้อมูลสำเร็จ</center>";
	}
	
	function editBehaviorMagTypeAction(){
		
		$behaviorTypeId = $this->input->post('behaviorTypeId');
		$behaviorTypeName = $this->input->post('behaviorTypeName');
		
		$this->Behavior->setBehaviorTypeId($behaviorTypeId);
		$this->Behavior->setBehaviorTypeName($behaviorTypeName);
		$this->Behavior->updateBehaviorType();
		echo "<script>parent.$.fancybox.close();</script>";
	}
	function editBehaviorMagType($behaviorTypeId){

		$this->Behavior->setBehaviorTypeId($behaviorTypeId);
		$data['behaviorMagType'] = $this->Behavior->getBehaviorTypePk();
		$this->load->view('boss/behavior/editBehaviorType',$data);
		
	}
	function deleteBehaviorMagType($behaviorTypeId){
		$this->Behavior->setBehaviorType($behaviorTypeId);
		$row = $this->Behavior->checkBehaviorInType();
		$num = count($row);

		if($num==0){
		echo "<body style='text-align: center'><p>คุณต้องการลบข้อมูล หรือไม่</p>
				<p>
				  <a href='".base_url()."index.php/boss/deleteBehaviorMagTypeAction/".$behaviorTypeId."'><input type='button' name='button' id='button' value='ยืนยันการลบ'></a>  &nbsp;&nbsp;&nbsp;
				  <a onClick='parent.jQuery.fancybox.close();'><input type='button' name='button2' id='button2' value='ยกเลิก'></a>
				</p>";
		}else{
			echo "<body style='text-align: center' ><p style='color:red; font-size:20;'>คุณไม่สามารถ ลบข้อมูลได้ เนื่งจากมีข้อพฤติกรรมในหมวดนี้อยู่</p>
			<p style='color:red;font-size:14;'>กรุณาทำการลบพฤติกรรมให้หมดก่อน จะลบ หมวดหมู่</p>
				<p>
				  <a onClick='parent.jQuery.fancybox.close();'><input type='button' name='button2' id='button2' value='ปิด'></a>
				</p>";
		}
	}
	
	function deleteBehaviorMagTypeAction($behaviorTypeId){
		
		$this->Behavior->setBehaviorTypeId($behaviorTypeId);
		$this->Behavior->deleteBehaviorTypeDataPk();
		echo "<script>parent.jQuery.fancybox.close();</script>";
		
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
		$data['member'] = $this->Member->getAllDataMember($page,'memberAll');
		$this->load->view('boss/member/magMemberList',$data);
	}
####################end	function memberAll กแสดง ผุ็ใช้งานทั้งหมด ##################
	function memberAllSearch($page=0){
		$text = $this->input->post('key');
		$this->Member->setTextSearch($text);
		$data['member'] = $this->Member->getSearchDataMember($page,'memberAllSearch');
		$this->load->view('boss/member/magMemberListSearchResult',$data);
	}

	function addMember(){
		$data['province']=$this->Address->getProvinceAll();
		$this->load->view('boss/member/formAddMember',$data);
	}
	function checkUserName(){
		$username = $this->input->post('username');
		$this->Member->setMemberUsername($username);
		$username = $this->Member->checkUsername();
		if($username){
			echo 0;
		}else{
			echo 1;
		}
	}

	function addActionMember(){
		var_dump($_POST);
	}

	function childentAddress($childentId){
		$this->Childents->setChildrenId($childentId);
		$data['childent'] = $this->Childents->getChildentInAearPKs();
		$addressId = $data['childent'][0]['addressId'];
		 $this->Address->setAddressId($addressId);
		$data['tel'] = $this->Address->getTelFk();

		$data['province'] = $this->Address->getProvinceAll();
		$this->load->view('boss/childent/detialChildent',$data);
	}
	
	function addBehavior(){
		$data['behaviortype'] = $this->Behavior->getAlldataBehaviortype();
		$this->load->view('boss/behavior/addBehavior',$data);
	}
	
	function addBehaviorAction(){

		$behaviorName = $this->input->post('behaviorName');
		$behaviorType = $this->input->post('behaviorType');
		$behaviorTypeId = $this->input->post('behaviorTypeId');
		$colorCode = $this->input->post('colorCode');
		
		$this->Behavior->setBehaviorName($behaviorName);
		$this->Behavior->setBehaviorType($behaviorType);
		$this->Behavior->setBehaviorTypeId($behaviorTypeId);
		$this->Behavior->setColorCode($colorCode);
		
		$this->Behavior->addBehavior();
		
		echo "<center><br><br><br>การเพิ่มข้อมูลสำเร็จ</center>";
	}
	
	function editBehavior($behaviorId){
		$this->Behavior->setBehaviorId($behaviorId);
		$data['behaviortype'] = $this->Behavior->getAlldataBehaviortype();
		$data['behavior'] = $this->Behavior->getBehaviorPk();
		$this->load->view('boss/behavior/editBehavior',$data);
	}
	
	function editBehaviorAction(){

		$behaviorId = $this->input->post('behaviorId');
		$behaviorName = $this->input->post('behaviorName');
		$behaviorType = $this->input->post('behaviorType');
		$behaviorTypeId = $this->input->post('behaviorTypeId');
		$colorCode = $this->input->post('colorCode');
		
		$this->Behavior->setBehaviorId($behaviorId);
		$this->Behavior->setBehaviorName($behaviorName);
		$this->Behavior->setBehaviorType($behaviorType);
		$this->Behavior->setBehaviorTypeId($behaviorTypeId);
		$this->Behavior->setColorCode($colorCode);
		
		$this->Behavior->updateBehavior();
		
		echo "<script>parent.$.fancybox.close();</script>";
	}
	
	function deleteBehavior($behaviorId){
		echo "<body style='text-align: center'><p>คุณต้องการลบข้อมูล หรือไม่</p>
				<p>
				  <a href='".base_url()."index.php/boss/deleteBehaviorAction/".$behaviorId."'><input type='button' name='button' id='button' value='ยืนยันการลบ'></a>  &nbsp;&nbsp;&nbsp;
				  <a onClick='parent.jQuery.fancybox.close();'><input type='button' name='button2' id='button2' value='ยกเลิก'></a>
				</p>";
	}
function formatDate($date) {
    $data = explode("-", $date);
    $newdata = sprintf("%d-%d-%d", $data[2], $data[1], $data[0]);
    return $newdata;

}
	
	function deleteBehaviorAction($behaviorId){
		
		$this->Behavior->setBehaviorId($behaviorId);
		$this->Behavior->deleteBehaviorDataPk();
		echo "<script>parent.jQuery.fancybox.close();</script>";
	}
	
function police($page=0){
	$data['childent'] = $this->Childents->getChildentInArea($page,'police');
		for($i=0;$i<count($data['childent']);$i++){
			$childrenBirthday = strtotime($data['childent'][$i]['childrenBirthday']);
			$data['childent'][$i]['childrenAge'] =  $this->timespan($childrenBirthday);
		}
	$this->load->view('boss/policing/policingChildents',$data);
	
}
function policeSearch($page=0){
		$text = $this->input->post('key');
		$this->Childents->setTextSearch($text);
		$data['childent'] = $this->Childents->getChildentAllSearch($page,'policeSearch');
		for($i=0;$i<count($data['childent']);$i++){
			$childrenBirthday = strtotime($data['childent'][$i]['childrenBirthday']);
			$data['childent'][$i]['childrenAge'] =  $this->timespan($childrenBirthday);
		}
		$this->load->view('boss/policing/searchResultPolicingChildents',$data);
	}

}

?>