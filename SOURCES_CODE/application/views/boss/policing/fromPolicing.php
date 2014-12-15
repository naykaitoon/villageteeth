<html>
<head>
<link rel="stylesheet" href="<?php echo base_url()?>js/jqueryui/jquery-ui.min.css"  media="screen">
<link rel="stylesheet" href="<?php echo base_url()?>js/jqueryui/jquery-ui.theme.min.css"   media="screen">
<script>
 $( ".meetingDate" ).datepicker({
      changeMonth: true,
      changeYear: true,
	  dateFormat: 'dd-mm-yy',
	  	  minDate : 'NOW()',
	   showOn: "button",
		buttonImage: "<?php echo base_url()?>img/calendar.png",
		buttonImageOnly: true,
		buttonText: "เลือกวันที่"
    });
			$("#submit").click(function(event){
				  event.preventDefault();
				  $.post( "<?php echo base_url();?>index.php/boss/addPolicing", 
				  $( ".addPolicing" ).serialize() 
				  )
				  .done(
				  function( data ) {
					$('.table').html(data);
				});
				
			  });
			  
			  $('#cancle').click(function(event){
				  event.preventDefault();
					$('.content').load('<?php echo base_url();?>index.php/boss/police');	
				
			  });
			

</script>

<?php 
function idFormat($idCard){
	 $id1 = substr($idCard, 0, 1);
	 $id2= substr($idCard, 1, 4);
	 $id3= substr($idCard, 5, 5);
	 $id4= substr($idCard, 10, 2);
	 $id5= substr($idCard, 12, 1);
	 echo $id1.'-'.$id2.'-'.$id3.'-'.$id4.'-'.$id5;
}
?>
</head>
<body>
<div id="headTitleContentbg">
 <h2 id="headTitleContent">แบบบันทึกข้อมูลเด็กรายบุคคลในคลินิกส่งเสริมทันตสุขภาพเด็ก</h2>
 </div>
 <div class="table">

<form class="addPolicing" action="<?php echo base_url();?>index.php/boss/addPolicing" method="post" >
  <?php foreach($childent as $c){?>
  <input type="hidden" name="childrenId" value="<?php echo $c['childrenId'];?>"/>
  <br><br>
  <table width="50%" border="0" align="left" cellpadding="7" cellspacing="3" style="margin-bottom:15px;box-shadow:2px 2px 2px #373737;" >
    <tbody>
      <tr>
        <th height="48" colspan="2" valign="baseline" nowrap="nowrap" style="border-radius:2px;"><p style="padding-top:15px;">ข้อมูลประจำตัว</p></th>
      </tr>
      <tr>
        <td width="29%" align="right" valign="baseline">ชื่อ&nbsp;</td>
        <td width="71%" align="left" valign="baseline"><?php echo $c['childrenName'].'  '.$c['childrenLastName']?></td>
      </tr>
      <tr>
        <td align="right" valign="baseline">ที่อยู่ : </td>
        <td align="left" valign="baseline"><?php echo $c['addressDetial'].' ต.'.$c['cantonName'].' อ.'.$c['districtName'].' จ.'.$c['provinceName'];?></td>
      </tr>
      <tr>
        <td align="right" valign="baseline">เลขประจำตัวประชาชน : </td>
        <td align="left" valign="baseline"><?php idFormat($c['childrenIDCard']);?></td>
      </tr>
      <tr>
        <td align="right" valign="baseline">โรคประจำตัว : </td>
        <td align="left" valign="baseline"><?php echo $c['diseasesName'];?></td>
      </tr>
      <tr>
        <td align="right" valign="baseline">ยาที่กินประจำ : </td>
        <td align="left" valign="baseline"><?php echo $c['medicine'];?></td>
      </tr>
    </tbody>
  </table>
<br>
<br>
  <?php }?>
 

  <table width="100%" border="0" align="center" cellpadding="8" cellspacing="2" style="background:none;">
    <tbody>
    <tr valign="baseline">
      <td width="68%" height="0" align="center" valign="middle" nowrap="nowrap" style="background-color:#0B80FF;font-size:18px;color:#fff;text-shadow:2px 2px 2px #373737;"><p style="padding-top:15px;">แบบบันทึกข้อมูลเด็ก</p></td>
      <td height="20" colspan="2" align="center" valign="middle" nowrap="nowrap"  style="background-color:#0B80FF;font-size:18px;color:#fff;text-shadow:2px 2px 2px #373737;"><p style="">การตรวจช่วง : 
        <select name="distanceId" id="distanceId">
        <?php foreach($distance as $d){ if($d['distanceMonth']>$max[0]['distanceMonth']){ ?>
        <option value="<?php echo $d['distanceId']?>"><?php echo $d['distanceMonth']?> เดือน</option>
        <?php }}?>
      </select></p></td>
    </tr>
    <tr>
      <td width="68%" height="30" align="center" valign="middle" nowrap="nowrap" style="font-weight:bold;background-color:#6DB3FF;color:#FFF;text-shadow:1px 1px 1px #434343;">พฤติกรรม</td>
      <td width="10%" height="30" align="center" valign="middle" nowrap="nowrap" style="font-weight:bold;background-color:#6DB3FF;color:#FFF;text-shadow:1px 1px 1px #434343;"><p style="">ทำ</p></td>
      <td width="12%" height="30" align="center" valign="middle" nowrap="nowrap" style="font-weight:bold;background-color:#6DB3FF;color:#FFF;text-shadow:1px 1px 1px #434343;"><p style="">ไม่ทำ</p></td>
    </tr>
<?php
$check = 1;
$roop = 0;
 for($ii=0;$ii<count($behaviorTypeAll);$ii++){
	foreach($behaviorall as $b){
		if($behaviorTypeAll[$ii]['behaviorTypeId']==$b['behaviorTypeId']){
	  ?>
	  <?php if($check==1){ ?> 
    <tr valign="baseline">
	<td colspan="3" align="left" style="font-weight:bold;background-color:#6DB3FF;color:#FFF;text-shadow:1px 1px 1px #434343;">&nbsp;&nbsp;&nbsp;<?php echo $behaviorTypeAll[$ii]['behaviorTypeName']; $check=0;?></td>
    </tr> 
    <tr>
	<td align="left" valign="middle" style="font-weight:600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;<?php echo $b['behaviorName'];?></td>
    <?php if($b['behaviorType']=='normal'){?>   
    <td align="center" valign="baseline">
     
      <input type="hidden" name="policing[]" value="<?php echo $b['behaviorId']; ?>">
     					 <input type="radio" name="policingValue[<?php echo $roop;?>]" id="<?php echo $b['behaviorId']; ?>" value="1"></td>
      <td align="center" valign="baseline"><input name="policingValue[<?php echo $roop;?>]" type="radio" required  id="<?php $b['behaviorId']; ?>2" value="0" checked></td>
 <?php 
 $roop++;
 }else{ ?>
   <td width="10%"  align="center" class="reloadText">
   <input type="hidden" name="policingPhoto[]" value="<?php echo $b['behaviorId']; ?>">
   <?php 
   $polincyPhoto = $this->session->userdata($b['behaviorId'].$childent[0]['childrenId']);
   if(!$polincyPhoto){
	   		$text = 'ตรวจ';
	   }else{ 
	   		$text = 'ตรวจใหม่อีกครั้ง';
	    }?>
    <a class="policingPhoto" href="<?php echo base_url();?>index.php/boss/policingPhoto/<?php echo $b['behaviorId']; ?>/<?php echo $childent[0]['childrenId']; ?>"><?php echo $text;?></a>
       </td>
   <td align="center" class="reload" >
   <?php 
   $polincyPhototext = $this->session->userdata($b['behaviorId'].$childent[0]['childrenId']);
   if(!$polincyPhototext){?>
  <img src="<?php echo base_url();?>img/icon/null.png" width="50px"/>
   <?php }else{ ?>
  <img src="<?php echo base_url();?>img/icon/notnull.png"  width="50px"/>
   <?php }?>
    </td>
 <?php }?>
    
    </tr>
<?php }else if($check==0){?> 
<tr>

	<td align="left" valign="middle" style="font-weight:600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;<?php echo $b['behaviorName'];?></td>
     <?php if($b['behaviorType']=='normal'){?>   
        <td align="center" valign="baseline"><input type="hidden" name="policing[]"  value="<?php echo $b['behaviorId']; ?>">
     					 <input type="radio" name="policingValue[<?php echo $roop;?>]" id="<?php echo  $b['behaviorId'] ?>" value="1"></td>
      <td align="center" valign="baseline"><input name="policingValue[<?php echo $roop;?>]" type="radio" required id="<?php echo  $b['behaviorId'] ?>2" value="0" checked></td>
 
     <?php $roop++;
	 
	 }else{ ?>
   <td align="center" class="reloadText">
   <input type="hidden" name="policingPhoto[]" value="<?php echo $b['behaviorId']; ?>">
   <?php
      $polincyPhoto = $this->session->userdata($b['behaviorId'].$childent[0]['childrenId']);

   if(!$polincyPhoto){
	   		$text = 'ตรวจ';
	   }else{ 
	   		$text = 'ตรวจใหม่อีกครั้ง';
	    }?>
    <a class="policingPhoto" href="<?php echo base_url();?>index.php/boss/policingPhoto/<?php echo $b['behaviorId']; ?>/<?php echo $childent[0]['childrenId']; ?>"><?php echo $text;?></a>
   </td>
   <td align="center" class="reload">
    <?php 
   $polincyPhoto = $this->session->userdata($b['behaviorId'].$childent[0]['childrenId']);

   if(!$polincyPhoto){?>
  <img src="<?php echo base_url();?>img/icon/null.png" width="50px"/>
   <?php }else{ ?>
  <img src="<?php echo base_url();?>img/icon/notnull.png"  width="50px"/>
   <?php }?>
    </td>
 <?php }?>
    </tr>
	<?php }?>
<?php 
	  }
	  
	}
	 $check = 1;
}?>
    <tr valign="baseline">
      <td colspan="3" align="left">&nbsp;&nbsp;&nbsp;ผู้ให้บริการ&nbsp;&nbsp;<a style="background-color:#787878;color:#FFFFFF;padding:5px;"><?php echo $loginData['name'].' '.$loginData['lastName'];?></a>&nbsp;&nbsp;วันที่ให้บริการ&nbsp;<a style="background-color:#787878;color:#FFFFFF;padding:5px;"><?php echo date('d-m-Y');?></a></td>
      </tr>
    <tr valign="baseline">
      <td colspan="3" align="left">
      &nbsp;&nbsp;&nbsp;วันที่นัดครั้งต่อไป&nbsp;&nbsp;
        : 
        <input type="text" name="meetingDate" style="font-size:18px;text-align:center;" class="meetingDate" value="<?php echo date('d-m-Y');?>" readonly></td>
      </tr>
    <tr valign="baseline">
      <td colspan="3" align="center"><input type="button" name="submit" id="submit" value="บันทึก">&nbsp;&nbsp;&nbsp;<input type="button" name="cancle" id="cancle" value="ยกเลิก/กลับ"> </td>
      </tr>
  </tbody>
</table>
</form>
</div>
</body>
<br><br><br><br>
</html>