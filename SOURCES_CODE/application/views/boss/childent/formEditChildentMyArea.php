<script type="text/javascript" src="<?php echo base_url()?>js/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url()?>js/jqueryui/jquery-ui.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>js/jqueryui/jquery-ui.structure.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>js/jqueryui/jquery-ui.theme.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>css/font.css">
<link rel="stylesheet" href="<?php echo base_url();?>css/tableBox.css">
<script type="text/javascript">
		$(document).ready(function() {
		 $( "#canton" )
			.change(function() {
				var str = "";
					$( "select#canton option:selected" ).each(function() {
						str += $( this ).val() + " ";
					});
						$.post("<?php echo base_url()?>index.php/boss/getZipCode",
						  {
							cantonId:str
						  },
						  function(data){
							  $('#zipcode').removeAttr("disabled");
							$('#zipcode').val(data);
						  });
				})
		.trigger( "change" );
	
		});
	</script>
   <script language="javascript">
function checkForm() 
{ if(!checkID(document.form1.childrenIDCard.value)) 
 $('#childrenIDCardResult').html('<font color="red">รหัสประชาชนไม่ถูกต้อง</font>');
else  $('#childrenIDCardResult').html('<font color="green">รหัสประชาชนถูกต้อง เชิญผ่านได้</font>');}
 function checkID(id){ 
		
if(id.length != 13) return false; 
for(i=0, sum=0; i < 12; i++) 
sum += parseFloat(id.charAt(i))*(13-i); if((11-sum%11)%10!=parseFloat(id.charAt(12))) 
return false; return true;}
		
 </script>
    <script language="javascript">
function checkFormSubmit() 
{ 
	var result = false;
if(!checkIDSubmit(document.form1.childrenIDCard.value)) {
 	alert('รหัสประชาชนไม่ถูกต้อง');
	result = false;
}else{
	 result = true;
	 }
	 return result;
}
 function checkIDSubmit(id){ 
		
if(id.length != 13) return false; 
for(i=0, sum=0; i < 12; i++) 
sum += parseFloat(id.charAt(i))*(13-i); if((11-sum%11)%10!=parseFloat(id.charAt(12))) 
return false; return true;}
		
 </script>
  <script>
  $(function() {
    $( "#childrenBirthday" ).datepicker({
      changeMonth: true,
      changeYear: true,
	  dateFormat: 'dd-mm-yy',
	  maxDate : 'NOW()',
	   showOn: "button",
		buttonImage: "<?php echo base_url()?>img/calendar.png",
		buttonImageOnly: true,
		buttonText: "เลือกวันที่"
    });
  });
  </script>
<style>
	body{
		margin:0;
		margin-top:-18px;
		}
</style>
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0"><div class="table"align="center" >
<form id="form1" name="form1" method="post"action="<?php echo base_url();?>index.php/boss/editActionChildent" onsubmit="return checkFormSubmit();">
  <table width="100%" border="0" align="center" cellpadding="5" cellspacing="0">

      <tr>
        <th colspan="2" align="center" valign="middle" nowrap="nowrap">แก้ไขข้อมูลเด็กในพื้นที่</th>
      </tr>
      <tr>
        <td width="30%" align="right" valign="middle">ชื่อ - นามสกุล : <input type="hidden" name="childrenId" id="childrenId" value="<?php echo $childent[0]['childrenId'];?>"><input type="hidden" name="addressId" id="addressId" value="<?php echo $childent[0]['addressId'];?>"></td>
        <td width="70%" align="left" valign="middle"><input type="text" name="childrenName" id="childrenName" value="<?php echo $childent[0]['childrenName'];?>"> - <input type="text" name="childrenLastName" id="childrenLastName"  value="<?php echo $childent[0]['childrenLastName'];?>"></td>
      </tr>
      <tr>
        <td align="right" valign="middle">เลขบัตรประจำตัวประชาชน : </td>
        <td align="left" valign="middle"><input type="text" name="childrenIDCard" id="childrenIDCard" value="<?php echo $childent[0]['childrenIDCard'];?>" onKeyUp="checkForm();"><a id="childrenIDCardResult"></a></td>
      </tr>
      <tr>
        <td align="right" valign="middle">วันเกิด ว/ด/ป (ค.ศ.): </td>
        <td align="left" valign="middle"><input type="text" name="childrenBirthday" value="<?php echo $childent[0]['childrenBirthday'];?>"  id="childrenBirthday" readonly required></td>
      </tr>
      <tr>
        <td align="right" valign="middle">ที่อยู่บ้านเลขที่/หมู่/ซอย : </td>
        <td align="left" valign="middle"><input type="text" name="addressDetial" id="addressDetial" value="<?php echo $childent[0]['addressDetial'];?>"></td>
      </tr>
       <tr>
        <td align="right" valign="middle">ถนน</td>
        <td align="left" valign="middle"><input type="text" name="street" id="street"  value="<?php echo $childent[0]['street'];?>"></td>
      </tr>
      <tr>
        <td align="right" valign="middle">จังหวัด</td>
        <td align="left" valign="middle"><select name="province" id="province">
  <?php foreach($area as $p){?>
  <option value="<?php echo $p['provinceId']?>"><?php echo $p['provinceName']?></option>
  <?php }?>
  </select></td>
      </tr>
      <tr>
        <td align="right" valign="middle">อำเภอ</td>
        <td align="left" valign="middle">
  <select name="district"  id="district" >
   <?php foreach($area as $p){?>
  <option value="<?php echo $p['districtId']?>"><?php echo $p['districtName']?></option>
  <?php }?>
  </select></td>
      </tr>
      <tr>
        <td align="right" valign="middle">ตำบล</td>
        <td align="left" valign="middle"> <select name="canton"  id="canton" >
  <?php foreach($area as $p){?>
  <option value="<?php echo $p['cantonId']?>"><?php echo $p['cantonName']?></option>
  <?php }?>
   </select></td>
      </tr>
      <tr>
        <td align="right" valign="middle">รหัสไปรษณีย์:</td>
        <td align="left" valign="middle"><input name="zipcode" type="text"  id="zipcode" value="" size="5" maxlength="5" disabled  readonly></td>
      </tr>
                   <tr>
        <td align="right" valign="middle">โรคประจำตัว:</td>
        <td align="left" valign="middle"><input name="diseasesName" type="text" required id="diseasesName" size="40" maxlength="50" value="<?php echo $childent[0]['diseasesName'];?>"> 
        <input name="diseasesId" type="hidden" required id="diseasesId" size="40" maxlength="50" value="<?php echo $childent[0]['diseasesId'];?>">
          &nbsp;&nbsp;<span style="color: #8F0205">*ตัวอย่าง</span> <span style="color: #494949">โรค1,โรค2,...</span></td>
      </tr>
        <tr>
        <td align="right" valign="middle">ยาที่กินเป็นประจำ:</td>
        <td align="left" valign="middle"><input name="medicine" type="text" required id="medicine" size="40" maxlength="50" value="<?php echo $childent[0]['medicine'];?>"> 
          &nbsp;&nbsp;<span style="color: #8F0205">*ตัวอย่าง</span>&nbsp; <span style="color: #494949">ยา1,ยา2,...</span></td>
      </tr>
                    <tr>
        <td align="right" valign="middle">ยาที่แพ้</td>
        <td align="left" valign="middle"><input name="allergicMedicine" type="text" required id="allergicMedicine" size="40" maxlength="50" value="<?php echo $childent[0]['allergicMedicine'];?>"> 
          &nbsp;&nbsp;<span style="color: #8F0205">*ตัวอย่าง</span>&nbsp; <span style="color: #494949">ยา1,ยา2,...</span></td>
      </tr>
       <tbody>
              <?php foreach($childent as $t){?>
         <tr class="firstTr">
        <td align="right" valign="middle">เบอร์โทร - หมายเหตุเบอร์โทร : <input type="hidden" name="telId[]" value="<?php echo $t['telId']?>"></td>
        <td align="left" valign="middle"><input type="text" name="tel[]" value="<?php echo $t['tel']?>"> - <input type="text" name="telNote[]" value="<?php echo $t['telNote']?>"></td>
      </tr> 
      <?php }?>
    </tbody>
    </table>
    
     <table width="80%" border="0" align="center" cellpadding="5" cellspacing="0" id="myTbl">
       <tr>    <td align="center" valign="middle">&nbsp;&nbsp;&nbsp;
          <input type="submit" name="submit" id="submit" value="บันทึก">
         &nbsp;
         <input type="button" name="cancle" id="cancle" value="ยกเลิก/ปิด" onClick="parent.jQuery.fancybox.close();"></td>
      </tr>
  </table>
</form>
</div>