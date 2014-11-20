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
<div id="headTitleContentbg">
 <h2 id="headTitleContent">แบบบันทึกข้อมูลเด็กรายบุคคลในคลินิกส่งเสริมทันตสุขภาพเด็ก</h2>
 </div>
<form action="<?php echo base_url();?>index.php/boss/test2" method="post" class="table">
  <?php foreach($childent as $c){?>
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
        <select name="distance" id="distance">
        <?php foreach($distance as $d){ ?>
        <option value="<?php echo $d['distanceId']?>"><?php echo $d['distanceMonth']?> เดือน</option>
        <?php }?>
      </select></p></td>
    </tr>
    <tr>
      <td width="68%" height="30" align="center" valign="middle" nowrap="nowrap" style="font-weight:bold;background-color:#6DB3FF;color:#FFF;text-shadow:1px 1px 1px #434343;">พฤติกรรม</td>
      <td width="10%" height="30" align="center" valign="middle" nowrap="nowrap" style="font-weight:bold;background-color:#6DB3FF;color:#FFF;text-shadow:1px 1px 1px #434343;"><p style="">ทำ</p></td>
      <td width="12%" height="30" align="center" valign="middle" nowrap="nowrap" style="font-weight:bold;background-color:#6DB3FF;color:#FFF;text-shadow:1px 1px 1px #434343;"><p style="">ไม่ทำ</p></td>
    </tr>
<?php
$check = 1;
 for($ii=0;$ii<count($behaviorTypeAll);$ii++){
	foreach($behaviorall as $b){
		if($behaviorTypeAll[$ii]['behaviorTypeId']==$b['behaviorTypeId']){
	  ?>
	  <?php if($check==1){ ?> 
    <tr valign="baseline">
	<td colspan="3" align="left" style="font-weight:bold;background-color:#6DB3FF;color:#FFF;text-shadow:1px 1px 1px #434343;">&nbsp;&nbsp;&nbsp;<?php echo $behaviorTypeAll[$ii]['behaviorTypeName']; $check=0;?></td>
    </tr> 
    <tr>
	<td align="left" valign="baseline" style="font-weight:600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;<?php echo $b['behaviorName'];?></td>
    <?php if($b['behaviorType']=='normal'){?>   
    <td align="center" valign="baseline">
     
      <input type="hidden" name="behaviorId[]" value="<?php echo $b['behaviorId']; ?>">
     					 <input type="radio" name="<?php echo  $b['behaviorId']; ?>" id="<?php echo $b['behaviorId']; ?>" value="1"></td>
      <td align="center" valign="baseline"><input name="<?php echo  $b['behaviorId']; ?>" type="radio" required  id="<?php $b['behaviorId']; ?>2" value="0" checked></td>
 <?php }else{ ?>
   <td width="10%" colspan="2" align="center">
   <a class="policingPhoto" href="<?php echo base_url();?>index.php/boss/policingPhoto/<?php echo $b['behaviorId']; ?>">ลงข้อมูลฟันแบบรูปภาพ</a>
    </td>
 <?php }?>
    
    </tr>
<?php }else if($check==0){?> 
<tr>

	<td align="left" valign="baseline" style="font-weight:600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;<?php echo $b['behaviorName'];?></td>
     <?php if($b['behaviorType']=='normal'){?>   
        <td align="center" valign="baseline"><input type="hidden" name="behaviorId[]"  value="<?php echo $b['behaviorId']; ?>">
     					 <input type="radio" name="<?php echo  $b['behaviorId'] ?>" id="<?php echo  $b['behaviorId'] ?>" value="1"></td>
      <td align="center" valign="baseline"><input name="<?php echo  $b['behaviorId'] ?>" type="radio" required id="<?php echo  $b['behaviorId'] ?>2" value="0" checked></td>
 
     <?php }else{ ?>
   <td align="center" colspan="2">
   <a class="policingPhoto" href="<?php echo base_url();?>index.php/boss/policingPhoto/<?php echo $b['behaviorId']; ?>">ลงข้อมูลฟันแบบรูปภาพ</a>
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
      <td colspan="3" align="left">&nbsp;&nbsp;&nbsp;วันที่นัดครั้งต่อไป&nbsp;&nbsp;
        : 
        <input type="text" name="textfield" id="textfield"></td>
      </tr>
    <tr valign="baseline">
      <td colspan="3" align="center"><input type="submit" name="submit" id="submit" value="บันทึก"></td>
      </tr>
  </tbody>
</table>
</form>

<br><br><br><br>

 <script>
	 $('.policingPhoto').fancybox({
				height : 550,
				width :	900,
				fitToView	: false,
				scrolling : 'on',
				autoSize : false,
				type				: 'iframe',
				overlay : {
            				css : {
               				 'background' : 'rgba(58, 42, 45, 0.95)',
           				 }
				}
	
});
	</script>