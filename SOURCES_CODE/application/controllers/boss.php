<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Boss extends CI_Controller {
	
	function __construct(){ /// เป็นฟังชั่นที่จะทำงานก่อน index จะทำงานเมื่อมีการเรียกใช้คราส Login นี้
            parent::__construct();
            $this->redirects();
			$this->load->library('pagination');

			include_once('login.php');
  			$login = new login(); 
			$result = $login->checkingLogin();
			if($result!='boss'){
				$this->session->unset_userdata('loginData'); 
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

 ##########################Start function  addChillentInArea ตึงข้อมูลแบบฟรอมการเพิ่มข้อมูลเด็กในพื้นที่ ############################	
	function addChillentInArea(){
		$data['loginData'] = $this->session->userdata('loginData');

			$this->Address->setCantonId($data['loginData']['cantonId']);
	
			$this->Address->setDistrictId($data['loginData']['districtId']);

			$this->Address->setProvinceId($data['loginData']['provinceId']);
	
		$data['area']=$this->Address->getmemberAear();

		$this->load->view('boss/childent/formAddChildentMyArea',$data);
	}
##########################END function  addChillentInArea ตึงข้อมูลแบบฟรอมการเพิ่มข้อมูลเด็ก############################	

 ##########################Start function  editChildentInArea ตึงข้อมูลแบบฟรอมการแก้ไขข้อมูลเด็กในพื้นที่ ############################	
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
##########################END function  editChildentInArea ตึงข้อมูลแบบฟรอมการแก้ไขข้อมูลเด็กในพื้นที่############################	
 ##########################Start function  editActionChildent ฟังชั่นแก้ไขข้อมูลเด็กลง db ############################	
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
			
			$diseasesId = $this->input->post('diseasesId');
			$diseasesName = $this->input->post('diseasesName');
			$medicine = $this->input->post('medicine');
			$allergicMedicine = $this->input->post('allergicMedicine');
			
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
			
			$this->Childents->setDiseasesId($diseasesId);
			$this->Childents->setChildrenId($childrenId);
			$this->Childents->setDiseasesName($diseasesName);
			$this->Childents->setMedicine($medicine);
			$this->Childents->setAllergicMedicine($allergicMedicine);
			
			$this->Childents->updateDiseases();
			
			for($i=0;$i<count($tel);$i++){	
				$this->Address->setTelId($telId[$i]);
				$this->Address->setTel($tel[$i]);
				$this->Address->setTelNote($telNote[$i]);
				$this->Address->updateTel();
				
			}
				echo "<script>parent.$.fancybox.close();</script>";
			
	}
##########################END function  editActionChildent เพิ่มข้อมูลเด็ก ############################	
function deleteChildentData($id,$addressId){
		echo "<body style='text-align: center'><p>คุณต้องการลบข้อมูล หรือไม่</p>
				<p>
				  <a href='".base_url()."index.php/boss/deleteChildentAction/".$id."/".$addressId."'><input type='button' name='button' id='button' value='ยืนยันการลบ'></a>  &nbsp;&nbsp;&nbsp;
				  <a onClick='parent.jQuery.fancybox.close();'><input type='button' name='button2' id='button2' value='ยกเลิก'></a>
				</p>
				</body>
				";
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
 ##########################Start function  addActionChildent เพิ่มข้อมูลเด็กลง DB ############################	
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
			
			$diseasesName = $this->input->post('diseasesName');
			$medicine = $this->input->post('medicine');
			$allergicMedicine = $this->input->post('allergicMedicine');
			
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
			
			$this->Childents->setChildrenId($childrenId);
			$this->Childents->setDiseasesName($diseasesName);
			$this->Childents->setMedicine($medicine);
			$this->Childents->setAllergicMedicine($allergicMedicine);
			
			$this->Address->setAddressId($addressId);
			
			$this->Childents->addDiseases();
			
			for($i=0;$i<count($tel);$i++){			
				$this->Address->setTel($tel[$i]);
				$this->Address->setTelNote($telNote[$i]);
				$this->Address->addTel();
				
			}
			
			
			
				echo "<script>parent.$.fancybox.close();</script>";
			
	}
##########################END function  addActionChildent เพิ่มข้อมูลเด็ก ############################	

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
	
	#################### strat function addDistance ดึงแบบฟรอมเพิ่มข้อมูลระยะเวลาการตรวจ ##################
	function addDistance(){
		$this->load->view('boss/policing/addDistance');
	}
	#################### End function addDistance ดึงแบบฟรอมเพิ่มข้อมูลระยะเวลาการตรวจ ##################
	
	#################### strat function addDistanceAction เพิ่มข้อมูลระยะเวลาการตรวจลง db ##################
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
	#################### End function addDistanceAction เพิ่มข้อมูลระยะเวลาการตรวจลงdb ################
	
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
				echo "
				<body>
				<center>การแก้ไขข้อมูลสำเร็จ<br>
						<a  style='font-size:12px' onClick='parent.jQuery.fancybox.close();'>
						<button onClick='parent.jQuery.fancybox.close();'>คลิกที่นี้เพื่อปิด</button></a>
					  </center>
					  </body>";
			}
			
		}else{
			echo "
			<body>
			<center>กรุณาใส่จำนวนให้ถูกต้อง<br>
			<a href='".base_url()."index.php/boss/editDistance/".$distanceId."' style='font-size:12px'>คลิกที่นี้เพิ่อกลับ</a>
			</center>
			</body>";
		}
		
	}
	
	
#################### end function editDistanceAction แก้ไข##################
	function deleteDistanceData($id){
		echo "<body style='text-align: center'><p>คุณต้องการลบข้อมูล หรือไม่</p>
				<p>
				  <a href='".base_url()."index.php/boss/deleteDistanceAction/".$id."'><input type='button' name='button' id='button' value='ยืนยันการลบ'></a>  &nbsp;&nbsp;&nbsp;
				  <a onClick='parent.jQuery.fancybox.close();'><input type='button' name='button2' id='button2' onClick='parent.jQuery.fancybox.close();' value='ยกเลิก'></a>
				</p>
				</body>
				";
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
		echo "<body><center><br><br><br>การเพิ่มข้อมูลสำเร็จ<br>						<a  style='font-size:12px' onClick='parent.jQuery.fancybox.close();'>
						<button onClick='parent.jQuery.fancybox.close();'>คลิกที่นี้เพื่อปิด</button></a></center></body>";
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
				  <a onClick='parent.jQuery.fancybox.close();'><input onClick='parent.jQuery.fancybox.close();' type='button' name='button2' id='button2' value='ยกเลิก'></a>
				</p>
				</body>
				";
		}else{
			echo "<body style='text-align: center' ><p style='color:red; font-size:20;'>คุณไม่สามารถ ลบข้อมูลได้ เนื่งจากมีข้อพฤติกรรมในหมวดนี้อยู่</p>
			<p style='color:red;font-size:14;'>กรุณาทำการลบพฤติกรรมให้หมดก่อน จะลบ หมวดหมู่</p>
				<p>
				  <a onClick='parent.jQuery.fancybox.close();'><input type='button' onClick='parent.jQuery.fancybox.close();' name='button2' id='button2' value='ปิด'></a>
				</p>
				</body>
				";
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

		$memberName = $this->input->post('memberName');
		$memberLastName = $this->input->post('memberLastName');
		$memberUsername = $this->input->post('memberUsername');
		$memberPassword = $this->input->post('memberPassword');
		$memberIdIDCard = $this->input->post('memberIdIDCard');
		$memberEmail = $this->input->post('memberEmail');
		$dateB = $this->input->post('memberBirthday');
		
		$memberBirthday = $this->formatDate($dateB);
		
		$addressDetial = $this->input->post('addressDetial');
		$memberPosition = $this->input->post('memberPosition');
		$memberStatus = $this->input->post('memberStatus');
		
		$provinceId = $this->input->post('province');
		$districtId = $this->input->post('district');
		$cantonId = $this->input->post('canton');
		$street = $this->input->post('street');
		
		
		$tel = $this->input->post('tel');
		$telNote = $this->input->post('telNote');
		
		
		$liableareaProvinceId = $this->input->post('liableareaprovince');
		$liableareaDistrictId = $this->input->post('liableareadistrict');
		$liableareaCantonId = $this->input->post('liableareacanton');
		
		$this->Address->setProvinceId($provinceId);
		$this->Address->setDistrictId($districtId);
		$this->Address->setCantonId($cantonId);
		$this->Address->setStreet($street);
		
		$addressId = $this->Address->addAddress();
		$addressIdTel = $addressId;
			$this->Member->setMemberName($memberName);
			$this->Member->setMemberLastName($memberLastName);
			$this->Member->setMemberUsername($memberUsername);
			$this->Member->setMemberPassword($memberPassword);
			$this->Member->setMemberIdIDCard($memberIdIDCard);
			$this->Member->setMemberEmail($memberEmail);
			$this->Member->setMemberBirthday($memberBirthday);
			$this->Member->setAddressDetial($addressDetial);
			$this->Member->setMemberPosition($memberPosition);
			$this->Member->setMemberStatus($memberStatus );
			$this->Member->setAddressId($addressId);
			
			$memberId = $this->Member->addMember();
			
		$this->Address->setProvinceId($liableareaProvinceId);
		$this->Address->setDistrictId($liableareaDistrictId);
		$this->Address->setCantonId($liableareaCantonId);
		$this->Address->setMemberId($memberId);
		
		$this->Address->addLiableArea();
		for($i=0;$i<count($tel);$i++){
			$this->Address->setTelNote($telNote[$i]);
			$this->Address->setTel($tel[$i]);
			$this->Address->setAddressId($addressIdTel);
			$this->Address->addTel();
		}
		
		echo "<center> เพิ่มข้อมูลผู้ใช้งานสำเร็จ<br>
<a onClick='<script>parent.jQuery.fancybox.close();</script>'><input type='button' name='button2' id='button2' value='ปิด'></a></center>";
		
	}
function switchMembers($status,$memberId){
			$this->Member->setMemberId($memberId);
			$memberData = $this->Member->getMemberById();
	if($memberId){
		if($status=="off"){
			$memberActiveStatus="notActivated";
			$messageTitles = "แจ้งการระงับการใช้งาน";
			$message = "สวัดดีคุณ ".$memberData['memberName']." ".$memberData['memberLastName']."\n\n";
			$message .= "ชื่อเข้าใช้งานของคุณคือ ".$memberData['memberUsername']."\n\n";
			$message .= "แจ้งการระงับการใช้งาน บัญชี ".$memberData['memberUsername']." เนื่องจากเหตุผลบางประการ \n\n";
			$message .= "หากท่านต้องการที่จะเปิดใช้งานบัญชี กรุณาติดต่อหัวหน้าโครงการ หรือผู้ดูแลระบบ \n\n";
			$message .= "http://www.villageteeth.com  โรงพยาบาลสมเด็จพระยุพราชเด่นชัย \n";
			$message .= "545 หมู่ 9 ตำบลเด่นชัย อำเภอเด่นชัย จังหวัดแพร่54110 โทรศัพท์ 054-613134\n";
			$message .= "หัวหน้าโครงการ คุณ ฉลวย ศิริกุลพันธ์ Tel. 087-5788-242 \n";
			$message .= "Email : villaget@villageteeth.com";
			$message .= "\n";
		}else if($status=="on"){
			$memberActiveStatus="activated";
			$messageTitles = "แจ้งการยกเลิกระงับการใช้งาน";
			$message = "สวัดดีคุณ ".$memberData['memberName']." ".$memberData['memberLastName']."\n\n";
			$message .= "ชื่อเข้าใช้งานของคุณคือ ".$memberData['memberUsername']."\n\n";
			$message .= "แจ้งการรยกเลิกการะงับการใช้งาน บัญชี ".$memberData['memberUsername']." \n\n";
			$message .= "ขณะนี้บัญชีของท่านสามรถใช้งานได้ตามปรกติและค่ะ \n\n";
			$message .= "http://www.villageteeth.com  โรงพยาบาลสมเด็จพระยุพราชเด่นชัย \n";
			$message .= "545 หมู่ 9 ตำบลเด่นชัย อำเภอเด่นชัย จังหวัดแพร่54110 โทรศัพท์ 054-613134\n";
			$message .= "หัวหน้าโครงการ คุณ ฉลวย ศิริกุลพันธ์ Tel. 087-5788-242 \n";
			$message .= "Email : villaget@villageteeth.com";
			$message .= "\n";
			
		}
		$title = $messageTitles.' บัญชี  villageteeth.com คุณ : '.$memberData['memberName'];

			$this->Member->setMemberId($memberId);
			$this->Member->setMemberActiveStatus($memberActiveStatus);
			
			$this->Member->updateMemberActiveStatus();			
				
				$config['protocol'] = 'SMTP';
				$config['smtp_host'] = 'mail.villageteeth.com';
				$config['smtp_port'] = 2525;
				$config['smtp_user'] = 'villaget@villageteeth.com';
				$config['smtp_pass'] = '0875788242';
				$config['wordwrap'] = FALSE;
				$config['mailtype'] = 'text';
				$config['charset'] = 'utf-8';
				$config['newline'] = '\n';
				
		$this->email->initialize($config);
		$this->email->from('villaget@villageteeth.com', $title);
		$this->email->to($memberData['memberEmail']);
		$this->email->subject($messageTitles.' บัญชี villageteeth.com ');
		$this->email->message($message);
		$this->email->send();
				if($status=="off"){
			  	  echo "<script>alert('ได้ทำการระงับใช้ บัญชี และส่ง Email เพื่อแจ้งเตือนให้แก่บัญชีดังกล่าวเรียบร้อยแล้ว')</script>";
				}else if($status=="on"){
				  echo "<script>alert('ได้ทำการยกเลิกการระงับใช้ บัญชี และส่ง Email เพื่อแจ้งเตือนให้แก่บัญชีดังกล่าวเรียบร้อยแล้ว')</script>";
				}
	}else{
		echo "<script>alert('กรุณาเรียกใช้การเปิดปิดบัญชีให้ถูกต้องด้วยนะค่ะ');</script>";
		 
	}
	 $this->memberAll();
	
}
	function editMembers($memberId){
		$this->Member->setMemberId($memberId);
		$data['member'] = $this->Member->getMemberByIdAndDetial();
		$this->Address->setCantonId($data['member']['addressCantonId']);
		$this->Address->setDistrictId($data['member']['addressDistrictId']);
		$this->Address->setProvinceId($data['member']['addressProvinceId']);
		$data['address'] = $this->Address->getmemberAear();
		
		$this->Address->setCantonId($data['member']['liableareaCantonId']);
		$this->Address->setDistrictId($data['member']['liableareaDistrictId']);
		$this->Address->setProvinceId($data['member']['liableareaProvinceId']);
		$data['liablearea'] = $this->Address->getmemberAear();
		
		$addressId = $data['member']['addressId'];
		$this->Address->setAddressId($addressId);
		$data['tel'] = $this->Address->getTelFk();
		
		$data['province']=$this->Address->getProvinceAll();
		$this->load->view('boss/member/formEditMember',$data);
	}
	function editMyProfile(){
		$loginData = $this->session->userdata('loginData');
		$memberId = $loginData['id'];
		$data['link'] = '/boss/editMyProfileAction';
		$this->Member->setMemberId($memberId);
		$data['member'] = $this->Member->getMemberByIdAndDetial();
		$this->Address->setCantonId($data['member']['addressCantonId']);
		$this->Address->setDistrictId($data['member']['addressDistrictId']);
		$this->Address->setProvinceId($data['member']['addressProvinceId']);
		$data['address'] = $this->Address->getmemberAear();
		
		$this->Address->setCantonId($data['member']['liableareaCantonId']);
		$this->Address->setDistrictId($data['member']['liableareaDistrictId']);
		$this->Address->setProvinceId($data['member']['liableareaProvinceId']);
		$data['liablearea'] = $this->Address->getmemberAear();
		
		$addressId = $data['member']['addressId'];
		$this->Address->setAddressId($addressId);
		$data['tel'] = $this->Address->getTelFk();
		
		$data['province']=$this->Address->getProvinceAll();
		$this->load->view('form/formProfile',$data);
	}
	function editMyProfileAction(){
		$loginData = $this->session->userdata('loginData');
		$memberId = $loginData['id'];
		$memberName = $this->input->post('memberName');
		$memberLastName = $this->input->post('memberLastName');
		$memberUsername = $this->input->post('memberUsername');
		$memberPassword = $this->input->post('memberPassword');
		$memberIdIDCard = $this->input->post('memberIdIDCard');
		$memberEmail = $this->input->post('memberEmail');
		$dateB = $this->input->post('memberBirthday');
		
		$memberBirthday = $this->formatDate($dateB);
		
		$addressId = $this->input->post('addressId');
		$addressDetial = $this->input->post('addressDetial');
		$memberPosition = $this->input->post('memberPosition');
		$memberStatus = $loginData['status'];
		
		$provinceId = $this->input->post('province');
		$districtId = $this->input->post('district');
		$cantonId = $this->input->post('canton');
		$street = $this->input->post('street');
		
		$telId = $this->input->post('telId');
		$tel = $this->input->post('tel');
		$telNote = $this->input->post('telNote');
		
		
		$liableareaId = $this->input->post('liableareaId');
		$liableareaProvinceId =$this->input->post('liableareaprovince');
		$liableareaDistrictId = $this->input->post('liableareadistrict');
		$liableareaCantonId =$this->input->post('liableareacanton');
		
		
		$this->Address->setAddressId($addressId);
		$this->Address->setProvinceId($provinceId);
		$this->Address->setDistrictId($districtId);
		$this->Address->setCantonId($cantonId);
		$this->Address->setStreet($street);
		
		$this->Address->updateAddress();
		
			$this->Member->setMemberId($memberId);
			$this->Member->setMemberName($memberName);
			$this->Member->setMemberLastName($memberLastName);
			$this->Member->setMemberUsername($memberUsername);
			$this->Member->setMemberPassword($memberPassword);
			$this->Member->setMemberIdIDCard($memberIdIDCard);
			$this->Member->setMemberEmail($memberEmail);
			$this->Member->setMemberBirthday($memberBirthday);
			$this->Member->setAddressDetial($addressDetial);
			$this->Member->setMemberPosition($memberPosition);
			$this->Member->setMemberStatus($memberStatus);
			
			
		$this->Member->updateMember();
		
		$this->Address->setLiableareaId($liableareaId);
		$this->Address->setProvinceId($liableareaProvinceId);
		$this->Address->setDistrictId($liableareaDistrictId);
		$this->Address->setCantonId($liableareaCantonId);

		
		$this->Address->updateLiableArea();
		
		for($i=0;$i<count($telId);$i++){
			$this->Address->setTelId($telId[$i]);
			$this->Address->setTelNote($telNote[$i]);
			$this->Address->setTel($tel[$i]);
			$this->Address->updateTel();
		}
		$sesData = array(
				  'id' => $memberId,
				  'username' => $memberUsername, 
				  'name' => $memberName,
				  'lastName' => $memberLastName, 
				  'status' => $memberStatus, 
				  'cantonId' => $liableareaCantonId,
				  'districtId' => $liableareaDistrictId, 
				  'provinceId' => $liableareaProvinceId
				);
	
				$this->session->set_userdata('loginData',$sesData);
			echo "<script>parent.jQuery.fancybox.close();</script>";
		
	}
	function chooseNewPassword(){
		$data['link'] = '/boss/chooseNewPasswordCheckingAndAction';
		$this->load->view('form/choosePassword',$data);
	}
	function chooseNewPasswordCheckingAndAction(){
		$loginData = $this->session->userdata('loginData');
		$memberId = $loginData['id'];
		$memberPassword = $this->input->post('memberPassword');
		$memberPasswordOld = $this->input->post('memberPasswordOld');
		$memberPasswordCon = $this->input->post('memberPasswordCon');
		
		$this->Member->setMemberId($memberId);
		$this->Member->setMemberPassword($memberPasswordOld);
		$result = $this->Member->checkPassword();
	
		if($result){
			if($memberPassword==$memberPasswordCon){
					$this->Member->setMemberId($memberId);
					$this->Member->setMemberPassword($memberPassword);
					$this->Member->updatePasswordMemberPk();
				echo "<center> แก้ไขรหัสสำเร็จ คลิกปิด เพื่อกลับไปหน้าแรก และ ลงชื่อเข้าใช้งานใหม่<br>
	<a onClick='parent.jQuery.fancybox.close();'><input onClick='parent.jQuery.fancybox.close();' type='button' name='button2' id='button2' value='ปิด'></a>
	</center>";
			}else{
				echo "<center><font color='#FF0004'>รหัสผ่านไม่ถูกต้อง กรุณาทำรายการใหม่</font><br>
	<a onClick='parent.jQuery.fancybox.close();' href='".base_url()."index.php/boss/chooseNewPassword'><input type='button' name='button2' id='button2' onClick='parent.jQuery.fancybox.close();' value='กลับ'></a>
	</center>";
			}
		}else{
			echo "<center><font color='#FF0004' size='25px'>รหัสผ่านเดิมไม่ถูกต้อง กรุณาทำรายการใหม่</font><br><a onClick='parent.jQuery.fancybox.close();' href='".base_url()."index.php/boss/chooseNewPassword'><input type='button' name='button2' id='button2' onClick='parent.jQuery.fancybox.close();' value='กลับ'></a>
	</center>";
		}
	}
	function editActionMember(){
		$memberId = $this->input->post('memberId');
		$memberName = $this->input->post('memberName');
		$memberLastName = $this->input->post('memberLastName');
		$memberUsername = $this->input->post('memberUsername');
		$memberIdIDCard = $this->input->post('memberIdIDCard');
		$memberEmail = $this->input->post('memberEmail');
		$dateB = $this->input->post('memberBirthday');
		
		$memberBirthday = $this->formatDate($dateB);
		
		$addressId = $this->input->post('addressId');
		$addressDetial = $this->input->post('addressDetial');
		$memberPosition = $this->input->post('memberPosition');
		$memberStatus = $this->input->post('memberStatus');
		
		$provinceId = $this->input->post('province');
		$districtId = $this->input->post('district');
		$cantonId = $this->input->post('canton');
		$street = $this->input->post('street');
		
		$telId = $this->input->post('telId');
		$tel = $this->input->post('tel');
		$telNote = $this->input->post('telNote');
		
		
		$liableareaId = $this->input->post('liableareaId');
		$liableareaProvinceId = $this->input->post('liableareaprovince');
		$liableareaDistrictId = $this->input->post('liableareadistrict');
		$liableareaCantonId = $this->input->post('liableareacanton');
		
		$this->Address->setAddressId($addressId);
		$this->Address->setProvinceId($provinceId);
		$this->Address->setDistrictId($districtId);
		$this->Address->setCantonId($cantonId);
		$this->Address->setStreet($street);
		
		$this->Address->updateAddress();
		
			$this->Member->setMemberId($memberId);
			$this->Member->setMemberName($memberName);
			$this->Member->setMemberLastName($memberLastName);
			$this->Member->setMemberUsername($memberUsername);
			$this->Member->setMemberIdIDCard($memberIdIDCard);
			$this->Member->setMemberEmail($memberEmail);
			$this->Member->setMemberBirthday($memberBirthday);
			$this->Member->setAddressDetial($addressDetial);
			$this->Member->setMemberPosition($memberPosition);
			$this->Member->setMemberStatus($memberStatus);
			
			
		$this->Member->updateMember();
		
		$this->Address->setLiableareaId($liableareaId);
		$this->Address->setProvinceId($liableareaProvinceId);
		$this->Address->setDistrictId($liableareaDistrictId);
		$this->Address->setCantonId($liableareaCantonId);

		
		$this->Address->updateLiableArea();
		
		for($i=0;$i<count($telId);$i++){
			$this->Address->setTelId($telId[$i]);
			$this->Address->setTelNote($telNote[$i]);
			$this->Address->setTel($tel[$i]);
			$this->Address->updateTel();
		}
		
		echo "<body>
				<p align='center'>แก้ไขข้อมูลสำเร็จ</p>
				<p align='center'>
					<a onClick='parent.jQuery.fancybox.close();'><input onClick='parent.jQuery.fancybox.close();' type='button' name='button2' id='button2' value='ปิด'></a>
					</p>
					</body>";
		
	}
	
	function deleteMembers($memberId){
		echo "<body style='text-align: center'><p>คุณต้องการลบข้อมูล หรือไม่</p>
				<p>
					<a href='".base_url()."index.php/boss/deleteMembersAction/".$memberId."'><input onClick='parent.jQuery.fancybox.close();' type='button' name='button' id='button' value='ยืนยันการลบ'></a>  &nbsp;&nbsp;&nbsp;
					<a onClick='parent.jQuery.fancybox.close();'><input onClick='parent.jQuery.fancybox.close();' type='button' name='button2' id='button2' value='ยกเลิก'></a>
					</p>
		</body>";
	}
	
	function deleteMembersAction($memberId){
		$this->Member->setMemberId($memberId);
		$data = $this->Member->getMemberByIdAndDetial();
		$this->Address->setAddressId($data['addressId']);
		$this->Address->deleteAddress();
		
		$this->Address->setLiableareaId($data['liableareaId']);
		$this->Address->deleteLiableArea();
		
		$this->Member->setMemberId($data['memberId']);
		$this->Member->deleteMember();
				echo "
				<body>
				<p align='center'>ลบข้อมูลสำเร็จ</p>
				<p align='center'>
					<a onClick='parent.jQuery.fancybox.close();'><input type='button' onClick='parent.jQuery.fancybox.close();' name='button2' id='button2' value='ปิด'></a>
					</p>
					</body>
		";
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
		
		echo "<center><br><br><br>การเพิ่มข้อมูลสำเร็จ<br>	<a onClick='parent.jQuery.fancybox.close();'><input type='button' onClick='parent.jQuery.fancybox.close();' name='button2' id='button2' value='ปิด'></a></center>";
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
				 	<a onClick='parent.jQuery.fancybox.close();'><input type='button' onClick='parent.jQuery.fancybox.close();' name='button2' id='button2' value='ปิด'></a>
				</p>
				</body>
				";
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

function policing($childentId){
	$this->Childents->setChildrenId($childentId);
	$data['loginData'] = $this->session->userdata('loginData');
	$data['childent'] = $this->Childents->getChildentInAearPKs();
	$data['behaviorall'] = $this->Policings->getPolicingData();
	$data['behaviorTypeAll'] = $this->Policings->getPolicingDataBehaviortype();
	$data['distance'] = $this->Policings->getPolicingDataDistance();
	
	$this->Policings->setChildrenId($childentId);
	
	$data['max'] = $this->Policings->findMaxPolicing();
	$this->load->view('boss/policing/fromPolicing',$data);
}

function policingPhoto($behaviorId,$childentId){

	$data['pImg'] = $this->session->userdata($behaviorId.$childentId);
	
	$this->Policings->setBehaviorId($behaviorId);
	$data['behavior'] = $this->Policings->getPolicingDataPk();
	
	$data['childentId'] = $childentId;



	
	$this->load->view('boss/policing/fromPolicingPhoto',$data);
}

function addPolicingPhoto($behaviorId,$childentId){
	
	for($i=1;$i<=10;$i++){
		$data['u'.$i.''] = 0;
	}
	
	for($i=1;$i<=10;$i++){
		$data['d'.$i.''] = 0;
	}
	
	$upData = $this->input->post('up');
	$downData = $this->input->post('down');
	
	for($i=0;$i<count($upData);$i++){
		if($upData[$i]!=FALSE){
			$data['u'.$upData[$i].''] = 1;
		}
	}
	
	for($i=0;$i<count($downData);$i++){
		if($downData[$i]!=FALSE){
			$data['d'.$downData[$i].''] = 1;
		}
	}
	$this->session->set_userdata($behaviorId.$childentId,$data);
	echo "<script>parent.jQuery.fancybox.close();</script>";
	
}
function policingPhotoDeleteValue($behaviorId,$childrenId){
	$this->session->unset_userdata($behaviorId.$childrenId);
	$this->addPolicingPhoto($behaviorId,$childentId);
}
	
function addPolicing(){
	
		$childrenId = $this->input->post('childrenId');
		$distanceId = $this->input->post('distanceId');
		$policing = $this->input->post('policing');
		$policingValue = $this->input->post('policingValue');
		$policingPhoto = $this->input->post('policingPhoto');
		
		for($i=0;$i<count($policingPhoto);$i++){
			$data=$this->session->userdata($policingPhoto[$i].$childrenId);
			if($data!=FALSE){
				$policyPhotoData[$i]['behaviorId']=$policingPhoto[$i];
				$policyPhotoData[$i]['policingDetialValue']=$data;
				
			}
		}

		for($i=0;$i<count($policing);$i++){
			$policingData[$i]['behaviorId'] = $policing[$i];
			$policingData[$i]['policingDetialValue'] = $policingValue[$i];
		}

		$loginData = $this->session->userdata('loginData');
		$this->Policings->setDistanceId($distanceId);
		$this->Policings->setChildrenId($childrenId);
		$this->Policings->setMemberId($loginData['id']);
		$returnPolicingsId = $this->Policings->addPolicing();
			
		$meetingDate = $this->formatDate($this->input->post('meetingDate'));
		
			$this->Policings->setPolicingId($returnPolicingsId);
			$this->Policings->setChildrenId($childrenId);
			$this->Policings->setMeetingsDate($meetingDate);
			$this->Policings->addMeetings();
		
		for($i=0;$i<count($policingData);$i++){
			$this->Policings->setPolicingId($returnPolicingsId);
			$this->Policings->setBehaviorId($policingData[$i]['behaviorId']);
			$this->Policings->setPolicingDetialValue($policingData[$i]['policingDetialValue']);
			$this->Policings->addPolicingDetial();
		}
		
		for($i=0;$i<count($policyPhotoData);$i++){
			$this->Policings->setPolicingId($returnPolicingsId);
			$this->Policings->setBehaviorId($policyPhotoData[$i]['behaviorId']);
			$this->Policings->setPolicingDetialValue(3);
			$returnPolicingDetialId = $this->Policings->addPolicingDetial();
			$this->policingPhotoDeleteValue($policyPhotoData[$i]['behaviorId'],$childrenId);
				for($ii=1;$ii<=10;$ii++){
	
					if($policyPhotoData[$i]['policingDetialValue']['d'.$ii.'']!=0){
						$this->Policings->setPolicingDetialId($returnPolicingDetialId);
					
						$this->Policings->setBrokenToothNumber($ii);
						$this->Policings->setBrokenToothSide('down');
						$this->Policings->addBrokentooth();		
					}
			
				}
				for($ii=1;$ii<10;$ii++){
		
					if($policyPhotoData[$i]['policingDetialValue']['u'.$ii.'']!=0){
						$this->Policings->setPolicingDetialId($returnPolicingDetialId);
					
						$this->Policings->setBrokenToothNumber($ii);
						$this->Policings->setBrokenToothSide('up');
						$this->Policings->addBrokentooth();		
					}
			
				}
		}

	echo "<script>alert('ลงตรวจข้อมูลการตรวจสำเร็จ');</script>";	
	$this->police();
		
}

function policingFind(){
	
	$data['policings'] = $this->Policings->findding();
	for($i=0;$i<count($data['policings']);$i++){
			$childrenBirthday = strtotime($data['policings'][$i]['childrenBirthday']);
			$data['policings'][$i]['childrenAge'] =  $this->timespan($childrenBirthday);
		}
	$this->load->view('boss/policing/findPolicingChildents',$data);
}

	function calendaAlert($now='',$searchDate=NULL){
		
		if(!$now){
			$now = strtotime("now");
			}else{
				$now = $_GET['now'];
			}
		if($_GET){
				$dates= $_GET['searchDate'];
		}else{
			$dates= strtotime("now");
		}
		$date= date('Y-m',$dates);
	    $this->Policings->setMeetingsDate($this->formatDateYM($date));
		$meeting = $this->Policings->getAllCalendaMeeting();
		
		$data['html'] =$this->calenda($now,$meeting);
		$this->load->view('boss/policing/calendaListAlert',$data);
		
	}
	function loadCalendaOlry($now='',$searchDate=NULL){
				
		if(!$now){
			$now = strtotime("now");
			}else{
				$now = $_GET['now'];
			}
		if($_GET){
				$dates= $_GET['searchDate'];
		}else{
			$dates= strtotime("now");
		}
		$date= date('Y-m',$dates);
	    $this->Policings->setMeetingsDate($this->formatDateYM($date));
		$meeting = $this->Policings->getAllCalendaMeeting();
		$html = $this->calenda($now,$meeting);
		echo $html;
	}
	function calenda($date,$meeting){
			$now = $date;
			
			if(isset($_GET['now']) && !empty($_GET['now'])){
				 $now = $_GET['now'];
			}

		$month = date('n',$now);
		$year = date('Y',$now);
		$first = strtotime("$year-$month-1");
		$first_day = date('w',$first);
		$num_day = date('t',$now);
		$today = date("Y-n-j");
		$TH_Day = array("อา.","จ.","อ.","พ.","พฤ.","ศ.","ส.");
		$TH_Month = array(1 => "มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน",
		"กรกฏาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
		$TH_Year = $year+543;
		
		$class = "default";
		
		$url_togo = base_url(). "index.php/boss/loadCalendaOlry?now=";
		$last_month = strtotime("-1 month $year-$month");
		$next_month = strtotime("+1 month $year-$month");
		
		$last_searchDate = strtotime("-1 month $year-$month");
		$next_searchDate = strtotime("+1 month $year-$month");
			
		$url_lastMonth = "<a class='nextM' href='" . $url_togo . $last_month ."&searchDate=".$last_searchDate. "'>&laquo;</a>";
		$url_nextMonth = "<a class='nextM' href='" . $url_togo . $next_month ."&searchDate=".$next_searchDate. "'>&raquo;</a>";
		
		$html = (" 
<script>
	$('.nextM').click(function(event){
		event.preventDefault();
		 var href = $(this).attr('href');
		$('#calenda').load(href);
	});
	$('.findDate').click(function(event){
		event.preventDefault();
		 var href = $(this).attr('href');
		$('.listmeettingAlert').load(href);
	});
	</script>
	<table id='calenda' border=0 cellspacing=1 cellpadding=7 align='center'>
		<tr>
		 <th>$url_lastMonth</th>
		 <th colspan=5>พุทธศักราช  $TH_Year<p>$TH_Month[$month]</th>
		 <th>$url_nextMonth</th>
		</tr>
		<tr bgcolor=#FFFACD><th>" . implode("</th><th>",$TH_Day) . "</th></tr>");
		
		$start = 1 - $first_day;
		$w = 1;
			for($d = $start; ;$d++){
				

				$cloasa = '</a>';
				
				 $class = "default";
				 $date = "$year-$month-$d";
		//		
					
				
				
				 if($w == 1){
					  $class = "sunday  >";
					  $html .= ("<tr align=center class=$class");
				 }else if($w == 7){
					  $class = "saturday  >";
				 }else{
					  $class = "default  >";
				 }
	//		
				 if($d < 1){
					  for($loop = 0; $loop<count($meeting);$loop++){

							if($this->formatDateD($meeting[$loop]['meetingsDate'])==$d){
								
								$class = "meettingAlert > <a class='findDate' href='".base_url()."index.php/boss/getAlertCalendaByDate/".$meeting[$loop]['meetingsDate']."'>";
									
						  }
					  }
					   $html .= ("<td class=$class &nbsp;</td>");
				 }else if($d >= $num_day){
					  if($d == $num_day){

							 
							  if($today == $date){
	
											$class = "today >";
								
								 }	
		
							 for($loop = 0; $loop<count($meeting);$loop++){

							if($this->formatDateD($meeting[$loop]['meetingsDate'])==$d){
								
							$class = "meettingAlert > <a class='findDate' href='".base_url()."index.php/boss/getAlertCalendaByDate/".$meeting[$loop]['meetingsDate']."'>";
									
						  }
					  }		
							  $html .= ("<td align=center class=$class $d $cloasa</td>");
					 }else{
							 if($w == 7){
									$class = "saturday >";
							 }else{
									$class = "default >";
							 }
					for($loop = 0; $loop<count($meeting);$loop++){

							if($this->formatDateD($meeting[$loop]['meetingsDate'])==$d){
								
									$class = "meettingAlert > <a class='findDate' href='".base_url()."index.php/boss/getAlertCalendaByDate/".$meeting[$loop]['meetingsDate']."'> ดู</a>";
						  }
					  }
							  $html .= ("<td class=$class &nbsp;</td>");
					}
					if($w == 7){
						  $html .= ("</tr>");
						 break;
					}
				}else{
					 if($today == $date){
						  $class = "today >";
					 }
					  for($loop = 0; $loop<count($meeting);$loop++){

							if($this->formatDateD($meeting[$loop]['meetingsDate'])==$d){
								
								$class = "meettingAlert > <a class='findDate' href='".base_url()."index.php/boss/getAlertCalendaByDate/".$meeting[$loop]['meetingsDate']."'>";
									
						  }
					  }
					  $html .= ("<td align=center class=$class $d $cloasa</td>");
				}
			
				if($w == 7){
					 $html .= ("</tr>");
					$w = 1;
				}else{
					$w++;
				}
			
			}
			 $html .='</table>';
			return $html;
			}


function formatDateYM($date) {
    $data = explode("-", $date);
    $newdata = sprintf("%d-%d", $data[0], $data[1]);
    return $newdata;

}

function formatDateD($date) {
    $data = explode("-", $date);
    $newdata = sprintf("%d",$data[2]);
    return $newdata;

}

function getAlertCalendaByDate($date){
	$this->Policings->setMeetingsDate($date);
	$data['policings'] = $this->Policings->getAllCalendaMeetingByDate();
	for($i=0;$i<count($data['policings']);$i++){
			$childrenBirthday = strtotime($data['policings'][$i]['childrenBirthday']);
			$data['policings'][$i]['childrenAge'] =  $this->timespan($childrenBirthday);
		}
	$this->load->view('boss/policing/listByDateCalenda',$data);
}

function countAlert(){
	$data = $this->Policings->countAlertPolencing();

	if(!$data){
		$num = '0';
	}else{
		$num = count($data);
	}
	echo $num;
}

function listAllAlert($page=0){
	
	$data['childent'] = $this->Childents->getChildentInAreaAlerting($page,'listAllAlert');
	
		for($i=0;$i<count($data['childent']);$i++){
			$childrenBirthday = strtotime($data['childent'][$i]['childrenBirthday']);
			$data['childent'][$i]['childrenAge'] =  $this->timespan($childrenBirthday);
		}

	$this->load->view('boss/policing/listAlert',$data);
}

function listAllAlertSearch($page=0){
	$text=$this->input->post('key');
	$this->Childents->setTextSearch($text);
	$data['childent'] = $this->Childents->getChildentInAreaAlertingSearch($page,'listAllAlertSearch');

		for($i=0;$i<count($data['childent']);$i++){
			$childrenBirthday = strtotime($data['childent'][$i]['childrenBirthday']);
			$data['childent'][$i]['childrenAge'] =  $this->timespan($childrenBirthday);
		}

	$this->load->view('boss/policing/listAlertSearchResult',$data);
}

   
	

}?>