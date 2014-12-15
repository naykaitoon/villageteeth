<script type="text/javascript" src="<?php echo base_url()?>js/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url()?>js/jqueryui/jquery-ui.min.css">
<script src="<?php echo base_url()?>js/jqueryui/jquery-ui.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url()?>js/jqueryui/jquery-ui.structure.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>js/jqueryui/jquery-ui.theme.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>css/tableBox.css">    
<link rel="stylesheet" href="<?php echo base_url();?>css/font.css">
<script type="text/javascript">
		$(document).ready(function() {
			$( "#province" ).focus(function() {
				$( "#province" ).trigger("click");
				});
				
			$( "#province" ).keyup(function() {
				$( "#province" ).trigger("click");
			});
			
			 $( "#district" ).keyup(function() {
				$( "#district" ).trigger("change");
			});
			 $( "#canton" ).keyup(function() {
				$( "#canton" ).trigger("change");
			});
		 $( "#province" ).click(function() {
				var str = "";
					$( "select#province option:selected" ).each(function() {
						str += $( this ).val() + " ";
					});
						$.post("<?php echo base_url()?>index.php/boss/getDistrict",
						  {
							provinceId:str
						  },
						  function(data){
							$("#district").removeAttr('disabled');
							$("#zipcode").attr('disabled','disabled');
							$('#district').html(data);
						  });
				})
		.trigger( "change" );
		  
		 $( "#district" )
			.change(function() {
				var str = "";
					$( "select#district option:selected" ).each(function() {
						str += $( this ).val() + " ";
					});
						$.post("<?php echo base_url()?>index.php/boss/getCanton",
						  {
							districtId:str
						  },
						  function(data){
							 
							$('#canton').html(data);
						  });
				})
		.trigger( "change" );
		
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
  <script language="javascript" type="text/javascript">
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
    <script language="javascript" type="text/javascript">
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
  <script type="text/javascript">
$(function(){
	$("#addRow").click(function(){
		if($(".firstTr").size()<=3){
		$("#myTbl tbody:last").append($("#myTbl tbody tr:last").clone());
		}else{
			alert("ขออภัยเพิ่มเบอร์โทรได้สูงสุด 4 เบอร์");
		}
	});
	$("#removeRow").click(function(){
		if($(".firstTr").size()>1){
			$("#myTbl tbody tr:last").remove();
		}else{
			alert("ต้องมีรายการข้อมูลอย่างน้อย 1 รายการ");
		}
	});			
});
</script>
<style>
	body{
		font-family: thaisanslite_r1 Vera Serif Bold;
		margin:0;
		margin-top:-18px;
		}
</style>
<div class="table" align="center" >
<form id="form1" action="<?php echo base_url();?>index.php/boss/addActionChildent" name="form1" method="post" onsubmit="return checkFormSubmit();" >
  <table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" id="myTbl">
      <tr>
        <th colspan="5" align="center" valign="middle" nowrap="nowrap">เพิ่มข้อมูลเด็ก</th>
      </tr>
      <tr>
        <td width="27%" align="right" valign="middle">ชื่อ - นามสกุล : </td>
        <td colspan="4" align="left" valign="middle"><input type="text" name="childrenName" id="childrenName" required> - <input type="text" name="childrenLastName" id="childrenLastName" required></td>
      </tr>
      <tr>
        <td align="right" valign="middle">เลขบัตรประจำตัวประชาชน : </td>
        <td colspan="4" align="left" valign="middle"><input type="text" name="childrenIDCard" id="childrenIDCard" onFocus="checkForm();" onKeyUp="checkForm();" required><a id="childrenIDCardResult"></a></td>
      </tr>
      <tr>
        <td align="right" valign="middle">วันเกิด ว/ด/ป (ค.ศ.): </td>
        <td colspan="4" align="left" valign="middle"><input type="text" name="childrenBirthday" id="childrenBirthday" readonly required></td>
      </tr>
      <tr>
        <td align="right" valign="middle">ที่อยู่บ้านเลขที่/หมู่/ซอย : </td>
        <td colspan="4" align="left" valign="middle">บ้านเลขที่ 
          <input name="addressDetialNumber" type="text" required id="addressDetialNumber" size="10"> 
          หมู่ 
          <input name="addressDetialM" type="text" required id="addressDetialM" size="4" maxlength="2">
          ซอย
          <input name="addressDetialSubStreet" type="text" required id="addressDetialSubStreet" size="20" maxlength="50"></td>
      </tr>
                   <tr>
        <td align="right" valign="middle">ถนน</td>
        <td colspan="4" align="left" valign="middle"><input type="text" name="street" id="street"  required></td>
      </tr>
      <tr>
        <td align="right" valign="middle" nowrap="nowrap">ที่อยู่ : </td>
        <td width="18%" align="left" valign="middle" nowrap="nowrap">จังหวัด : 
          <select name="province" id="province" required>
  <option value="0">กรุณาเลือก</option>
  <?php foreach($province as $p){?>
  <option value="<?php echo $p['provinceId']?>"><?php echo $p['provinceName']?></option>
  <?php }?>
  </select></td>
        <td width="18%" align="left" valign="middle" nowrap="nowrap">อำเภอ : <select name="district"  id="district" required>
    <option value="0">กรุณาเลือกจังหวัด</option>

  </select></td>
        <td width="17%" align="left" valign="middle" nowrap="nowrap">ตำบล
          <select name="canton"  id="canton" required>
            <option value="0">กรุณาเลือก</option>
        </select></td>
        <td width="20%" align="left" valign="middle" nowrap="nowrap">รหัสไปรษณีย์&nbsp;:  &nbsp;
<input name="zipcode" type="text"  id="zipcode" size="5" maxlength="5" disabled  readonly required></td>
      </tr>
       <tr>
        <td align="right" valign="middle">โรคประจำตัว:</td>
        <td colspan="4" align="left" valign="middle"><input name="diseasesName" type="text" required id="diseasesName" size="40" maxlength="50"> 
          &nbsp;&nbsp;<span style="color: #8F0205">*ตัวอย่าง</span> <span style="color: #494949">โรค1,โรค2,...</span></td>
      </tr>
        <tr>
        <td align="right" valign="middle">ยาที่กินเป็นประจำ:</td>
        <td colspan="4" align="left" valign="middle"><input name="medicine" type="text" required id="medicine" size="40" maxlength="50"> 
          &nbsp;&nbsp;<span style="color: #8F0205">*ตัวอย่าง</span>&nbsp; <span style="color: #494949">ยา1,ยา2,...</span></td>
      </tr>
        <tr>
        <td align="right" valign="middle">ยาที่แพ้</td>
        <td colspan="4" align="left" valign="middle"><input name="allergicMedicine" type="text" required id="allergicMedicine" size="40" maxlength="50"> 
          &nbsp;&nbsp;<span style="color: #8F0205">*ตัวอย่าง</span>&nbsp; <span style="color: #494949">ยา1,ยา2,...</span></td>
      </tr>
        <tbody>
     <tr class="firstTr">
        <td align="right" valign="middle">เบอร์โทร : </td>
        <td colspan="4" align="left" valign="middle"><input type="text" name="tel[]" id="tel[]" required>
           *หมายเหตุเบอร์โทร           <input type="text" name="telNote[]" id="telNote" required></td>
      </tr>
     
    </tbody> 
      </table>
      
     <table width="80%" border="0" align="center" cellpadding="5" cellspacing="0" id="myTbl">
       <tr>    <td width="50%" align="center" valign="middle">&nbsp;&nbsp;&nbsp;
<input type="button" name="addRow" id="addRow" value="เพิ่มเบอร์โทร">  <input type="button" name="removeRow" id="removeRow" value="ลบเบอร์โทร">
<input type="reset" name="reset" id="reset" value="ล้างข้อมูล" ></td>
         <td width="50%" align="center" valign="middle"><input type="submit" name="submit" id="submit" value="บันทึก">
         &nbsp;
         <input type="button" name="cancle" id="cancle" value="ยกเลิก/ปิด" onClick="parent.jQuery.fancybox.close();"></td>
      </tr>
  </table>
</form>
</div>