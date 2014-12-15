<script type="text/javascript" src="<?php echo base_url()?>js/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url()?>js/jqueryui/jquery-ui.min.css">
  <script src="<?php echo base_url()?>js/jqueryui/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url()?>js/jqueryui/jquery-ui.structure.min.css">
    <link type="text/javascript" rel="stylesheet" href="<?php echo base_url()?>js/jqueryui/jquery-ui.theme.min.css">
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
							$("#canton").attr('disabled','disabled');
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
	
	
	
	$( "#province2" ).focus(function() {
				$( "#province2" ).trigger("click");
				});
				
			$( "#province2" ).keyup(function() {
				$( "#province2" ).trigger("click");
			});
			
			 $( "#district2" ).keyup(function() {
				$( "#district2" ).trigger("change");
			});
			 $( "#canton2" ).keyup(function() {
				$( "#canton2" ).trigger("change");
			});
		 $( "#province2" ).click(function() {
				var str = "";
					$( "select#province2 option:selected" ).each(function() {
						str += $( this ).val() + " ";
					});
						$.post("<?php echo base_url()?>index.php/boss/getDistrict",
						  {
							provinceId:str
						  },
						  function(data){
							$("#district2").removeAttr('disabled');

							$('#district2').html(data);
						  });
				})
		.trigger( "change" );
		  
		 $( "#district2" )
			.change(function() {
				var str = "";
					$( "select#district2 option:selected" ).each(function() {
						str += $( this ).val() + " ";
					});
						$.post("<?php echo base_url()?>index.php/boss/getCanton",
						  {
							districtId:str
						  },
						  function(data){
							 
							$('#canton2').html(data);
						  });
				})
		.trigger( "change" );
		
		 $( "#canton2" )
			.change(function() {
				var str = "";
					$( "select#canton2 option:selected" ).each(function() {
						str += $( this ).val() + " ";
					});
						$.post("<?php echo base_url()?>index.php/boss/getZipCode",
						  {
							cantonId:str
						  },
						  function(data){
							 
						  });
				})
		.trigger( "change" );
	
	$( "#memberUsername" ).focus(function() {
				$( "#memberUsername" ).trigger("click");
	});
	$( "#memberUsername" ).keyup(function() {
				$( "#memberUsername" ).trigger("click");
	});
	$( "#memberUsername" ).click(function() {
		 if($(this).val()!=""){
		$.post("<?php echo base_url()?>index.php/boss/checkUserName",
						  {
							username:$(this).val()
						  },
						  function(data){
						    if(data==1){
								$('#memberUsernameResult').html("<font color='GREEN'>usernameนี้สามารถใช้ได้</font>");
								$('#memberUsernameC').val($("#memberUsername").val());
							}else if(data==0){
								$('#memberUsernameResult').html("<font color='#E40003'>usernameนี้มีผู้ใช้งานแล้ว</font>");
								$('#memberUsernameC').val(0);
							}
						  });
		 }else{
			 $('#memberUsernameResult').html("<font color='#E40003'>กรุณาระบุ username ในการเข้าใช้งาน</font>");
			 $('#memberUsernameC').val(0);
		 }
	});


$( "#memberPassword" ).focus(function() {
				$( "#memberPassword" ).trigger("click");
	});
	$( "#memberPassword" ).keyup(function() {
				$( "#memberPassword" ).trigger("click");
	});
$( "#memberPassword" ).click(function() {
	var value = $(this).val();
if(value!=""){
		 if(value==$( "#memberPasswordC" ).val()){
			 $('#memberPasswordResult').html("<font color='GREEN'>รหัสผ่านสามารถใช้ได้</font>");
			 $('#memberPasswordCheck').val(value);
		 }else{
			 $('#memberPasswordResult').html("<font color='#E40003'>รหัสผ่านไม่ตรงกัน</font>");
			 $('#memberPasswordCheck').val(0);
		 }
}else{
	$('#memberPasswordResult').html("<font color='#E40003'>รหัสผ่านไม่ตรงกัน</font>");
	$('#memberPasswordCheck').val(0);
}
	});
	
$( "#memberPasswordC" ).focus(function() {
				$( "#memberPasswordC" ).trigger("click");
	});
	$( "#memberPasswordC" ).keyup(function() {
				$( "#memberPasswordC" ).trigger("click");
	});
$( "#memberPasswordC" ).click(function() {
	var value = $(this).val();
if(value!=""){
		 if(value==$( "#memberPassword" ).val()){
			 $('#memberPasswordResult').html("<font color='GREEN'>รหัสผ่านสามารถใช้ได้</font>");
			 $('#memberPasswordCheck').val(value);
		 }else{
			 $('#memberPasswordResult').html("<font color='#E40003'>รหัสผ่านไม่ตรงกัน</font>");
			 $('#memberPasswordCheck').val(0);
		 }
}else{
	$('#memberPasswordResult').html("<font color='#E40003'>รหัสผ่านไม่ตรงกัน</font>");
	$('#memberPasswordCheck').val(0);
}
	});
		});
	</script>
  <script language="javascript">
function checkForm() 
{ if(!checkID(document.form1.memberIdIDCard.value)) 
 $('#memberIdIDCardResult').html('<font color="red">รหัสประชาชนไม่ถูกต้อง</font>');
else  $('#memberIdIDCardResult').html('<font color="green">รหัสประชาชนถูกต้อง</font>');}
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
	var addressResult = true;
	var address = document.getElementsByClassName('address');
for(i=0;i<address.length;++i){
	if(address[i].value==0){
		addressResult = false;
	}
}
if(!checkIDSubmit(document.form1.memberIdIDCard.value)||document.form1.memberUsernameC.value == 0||!addressResult) {
 	alert('กรุณาใส่ข้อมูลที่ถูกต้อง');
	if(!addressResult){
		result = false;
		alert('กรุณาระบุที่อยู่ หรือ พื้นที่ที่รับผิดชอบให้ครบถ้วน');
	}
		result = false;
	if(document.form1.memberPasswordCheck.value == 0){
		result = false;
		alert('กรุณายืนยันรหัสผ่านใหม่');
	}
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
var d = new Date();
var year = d.getFullYear()-22; 
var mount = d.getMonth(); 
var day = d.getDate();
  $(function() {
    $( "#memberBirthday" ).datepicker({
      changeMonth: true,
      changeYear: true,
	  dateFormat: 'dd-mm-yy',
	  yearRange: '1920:'+year,
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
<link rel="stylesheet" href="<?php echo base_url();?>css/font.css">
<div class="table"align="center" >
<form id="form1" action="<?php echo base_url();?>index.php/boss/editActionMember" name="form1" method="post" onsubmit="return checkFormSubmit();" >
  <table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" id="myTbl">
      <tr>
        <th colspan="5" align="center" valign="middle" nowrap="nowrap">แก้ไขข้อมูลผู้ใช้งาน</th>
      </tr>
      <tr>
        <td width="30%" align="right" valign="middle">ชื่อ - นามสกุล : </td>
        <td colspan="4" align="left" valign="middle"><input type="text" name="memberName" id="memberName" value="<?php echo $member['memberName']?>" required> - <input type="text" name="memberLastName" id="memberLastName" value="<?php echo $member['memberLastName']?>" required>
        <input type="hidden" name="addressId" id="addressId" value="<?php echo $member['addressId']?>" required>
        <input type="hidden" name="memberId" id="memberId" value="<?php echo $member['memberId']?>" required>
        <input type="hidden" name="liableareaId" id="liableareaId" value="<?php echo $member['liableareaId']?>" required>
        
        </td>
      </tr>
     <tr>
        <td align="right" valign="middle">ชื่อเข้าใช้งาน : </td>
        <td colspan="4" align="left" valign="middle"><?php echo $member['memberUsername']?></td>
     </tr>
      <tr>
        <td align="right" valign="middle">เลขบัตรประจำตัวประชาชน : </td>
        <td colspan="4" align="left" valign="middle"><input type="text" name="memberIdIDCard" id="memberIdIDCard" onFocus="checkForm();" onKeyUp="checkForm();" value="<?php echo $member['memberIdIDCard']?>" required><a id="memberIdIDCardResult"></a></td>
      </tr>
       <tr>
        <td align="right" valign="middle">อีเมล์ : </td>
        <td colspan="4" align="left" valign="middle"><input name="memberEmail" value="<?php echo $member['memberEmail']?>" type="email" required id="memberEmail" size="35"></td>
      </tr>
      <tr>
        <td align="right" valign="middle">วันเกิด ว/ด/ป (ค.ศ.): </td>
        <td colspan="4" align="left" valign="middle"><input type="text" name="memberBirthday" id="memberBirthday"  value="<?php echo date("d-m-Y", strtotime($member['memberBirthday'])); ?>" readonly required></td>
      </tr>
      <tr>
        <td align="right" valign="middle">ที่อยู่บ้านเลขที่/หมู่/ซอย : </td>
        <td colspan="4" align="left" valign="middle"><input name="addressDetial" value="<?php echo $member['addressDetial']?>" type="text" required id="addressDetial" size="40">
&nbsp;ถนน :       
<input type="text" name="street" id="street" value="<?php echo $member['addressStreet']?>" required></td>
      </tr>
      <tr>
        <td align="right" valign="middle">จังหวัด</td>
        <td width="24%" align="left" valign="middle"><select name="province" id="province" class="address" required>
  <option value="0">กรุณาเลือก</option>
  <?php foreach($province as $p){ ?>
  <option value="<?php echo $p['provinceId']?>" <?php if($member['addressProvinceId']==$p['provinceId']){ echo 'selected ';}?> ><?php echo $p['provinceName']?></option>
  <?php }?>
  </select></td>
        <th width="11%" rowspan="3" align="right" valign="middle" nowrap="nowrap">เขตพื้นที่ที่รับผิดชอบ  </th>
        <td width="9%" align="right" valign="middle">จังหวัด</td>
        <td width="26%" align="left" valign="middle"><select name="liableareaprovince" id="province2" class="address" required>
          <option value="0">กรุณาเลือก</option>
          <?php foreach($province as $p){?>
          <option value="<?php echo $p['provinceId']?>" <?php if($member['liableareaProvinceId']==$p['provinceId']){ echo 'selected';}?> ><?php echo $p['provinceName']?></option>
          <?php }?>
        </select></td>
      </tr>
      <tr>
        <td align="right" valign="middle">อำเภอ</td>
        <td align="left" valign="middle">
          <select name="district"  id="district" class="address" required>
            <option value="<?php  echo $address[0]['districtId'];?>"><?php echo $address[0]['districtName'];?></option>
            
        </select></td>
        <td align="right" valign="middle">อำเภอ </td>
        <td align="left" valign="middle"><select name="liableareadistrict"  id="district2" class="address" required>
          <option value="<?php  echo $liablearea[0]['districtId'];?>"><?php echo $liablearea[0]['districtName'];?></option>
        </select></td>
      </tr>
      <tr>
        <td align="right" valign="middle">ตำบล</td>
        <td align="left" valign="middle"> <select name="canton"  id="canton" class="address" required>
          
          <option value="<?php  echo $address[0]['cantonId'];?>"><?php  echo $address[0]['cantonName'];?></option>
          
        </select></td>
        <td align="right" valign="middle">ตำบล</td>
        <td align="left" valign="middle"><select name="liableareacanton"  id="canton2" class="address" required>
          <option value="<?php  echo $liablearea[0]['cantonId'];?>"><?php  echo $liablearea[0]['cantonName'];?></option>
        </select></td>
      </tr>
      <tr>
        <td align="right" valign="middle">รหัสไปรษณีย์:</td>
        <td colspan="4" align="left" valign="middle"><input name="zipcode" type="text"  id="zipcode" size="5" maxlength="5"  readonly required></td>
      </tr>
       <tr>
        <td align="right" valign="middle">ตำแหน่ง : </td>
        <td colspan="4" align="left" valign="middle"><input name="memberPosition" type="text" required id="memberPosition" size="40" value="<?php echo $member['memberPosition']?>"></td>
      </tr>
      <tr>
        <td align="right" valign="middle">สถานะบัญชี : </td>
        <td colspan="4" align="left" valign="middle"> <select name="memberStatus"  id="memberStatus" required>
 	<option value="officials" <?php if($member['memberStatus']=='officials'){echo 'selected';}?> >เจ้าหน้าที่</option>
    <option value="boss" <?php if($member['memberStatus']=='officials'){echo 'boss';}?> >ผู้ดูแลระบบ</option>
  </select></td>
      </tr>
        <tbody>
    <?php foreach($tel as $t){?>
         <tr class="firstTr">
        <td align="right" valign="middle">เบอร์โทร - หมายเหตุเบอร์โทร : <input type="hidden" name="telId[]" value="<?php echo $t['telId']?>"></td>
        <td align="left" colspan="4" valign="middle"><input type="text" name="tel[]" value="<?php echo $t['tel']?>"> - <input type="text" name="telNote[]" value="<?php echo $t['telNote']?>"></td>
      </tr> 
<?php }?>
    </tbody> 
      </table>
      
     <table width="80%" border="0" align="center" cellpadding="5" cellspacing="0" id="myTbl">
       <tr>    <td width="50%" align="center" valign="middle">&nbsp;&nbsp;&nbsp;
         <input type="reset" name="reset" id="reset" value="ล้างข้อมูล" ></td>
         <td width="50%" align="center" valign="middle"><input type="submit" name="submit" id="submit" value="บันทึก">
         &nbsp;
         <input type="button" name="cancle" id="cancle" value="ยกเลิก/ปิด" onClick="parent.jQuery.fancybox.close();"></td>
       </tr>
  </table>
</form>
</div>
