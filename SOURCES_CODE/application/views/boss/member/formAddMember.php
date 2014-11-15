<script type="text/javascript" src="<?php echo base_url()?>js/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url()?>js/jqueryui/jquery-ui.min.css">
  <script src="<?php echo base_url()?>js/jqueryui/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url()?>js/jqueryui/jquery-ui.structure.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>js/jqueryui/jquery-ui.theme.min.css">
     <link rel="stylesheet" href="<?php echo base_url();?>css/table.css">
         <link rel="stylesheet" href="<?php echo base_url();?>css/boxFormMain.css">    
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
							  $('#zipcode2').removeAttr("disabled");
							$('#zipcode2').val(data);
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
    $( "#memberBirthday" ).datepicker({
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
 <script src="j.js"></script>
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
</head>

<body>
<div class="table"align="center" >
<form id="form1" action="<?php echo base_url();?>index.php/boss/addActionMember" name="form1" method="post" onsubmit="return checkFormSubmit();" >
  <table width="80%" border="0" align="center" cellpadding="5" cellspacing="0" id="myTbl">
      <tr>
        <th colspan="5" align="center" valign="middle" nowrap="nowrap">เพิ่มผู้ใช้งาน</th>
      </tr>
      <tr>
        <td width="30%" align="right" valign="middle">ชื่อ - นามสกุล : </td>
        <td colspan="4" align="left" valign="middle"><input type="text" name="memberName" id="memberName" required> - <input type="text" name="memberLastName" id="memberLastName" required></td>
      </tr>
     <tr>
        <td align="right" valign="middle">ชื่อเข้าใช้งาน : </td>
        <td colspan="4" align="left" valign="middle"><input type="text" name="memberUsername" id="memberUsername"  required>
          <a id="memberUsernameResult"></a></td>
     </tr>
          <tr>
        <td align="right" valign="middle">รหัสผ่าน : </td>
        <td colspan="4" align="left" valign="middle"><input type="text" name="memberPassword" id="memberPassword"  required>
ยืนยันรหัสผ่าน        &nbsp;
        <input type="text" name="memberPasswordC" id="memberPasswordC"  required>        <a id="memberPasswordResult"></a></td>
     </tr>
      <tr>
        <td align="right" valign="middle">เลขบัตรประจำตัวประชาชน : </td>
        <td colspan="4" align="left" valign="middle"><input type="text" name="memberIdIDCard" id="memberIdIDCard" onFocus="checkForm();" onKeyUp="checkForm();" required><a id="memberIdIDCardResult"></a></td>
      </tr>
       <tr>
        <td align="right" valign="middle">อีเมล์ : </td>
        <td colspan="4" align="left" valign="middle"><input type="text" name="memberEmail" id="memberEmail" required><a id="memberEmailResult"></a></td>
      </tr>
      <tr>
        <td align="right" valign="middle">วันเกิด ป/ด/ว: </td>
        <td colspan="4" align="left" valign="middle"><input type="text" name="memberBirthday" id="memberBirthday" readonly required></td>
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
        <td align="right" valign="middle">จังหวัด</td>
        <td width="24%" align="left" valign="middle"><select name="province" id="province" required>
  <option value="0">กรุณาเลือก</option>
  <?php foreach($province as $p){?>
  <option value="<?php echo $p['provinceId']?>"><?php echo $p['provinceName']?></option>
  <?php }?>
  </select></td>
        <td width="11%" rowspan="3" align="right" valign="middle">เขตพื้นที่ที่รับผิดชอบ  </td>
        <td width="9%" align="right" valign="middle">จังหวัด</td>
        <td width="26%" align="left" valign="middle"><select name="liableareaprovince" id="province2" required>
          <option value="0">กรุณาเลือก</option>
          <?php foreach($province as $p){?>
          <option value="<?php echo $p['provinceId']?>"><?php echo $p['provinceName']?></option>
          <?php }?>
        </select></td>
      </tr>
      <tr>
        <td align="right" valign="middle">อำเภอ</td>
        <td align="left" valign="middle">
          <select name="district"  id="district" required>
            <option value="0">กรุณาเลือกจังหวัด</option>
            
        </select></td>
        <td align="right" valign="middle">อำเภอ </td>
        <td align="left" valign="middle"><select name="liableareadistrict"  id="district2" required>
          <option value="0">กรุณาเลือกจังหวัด</option>
        </select></td>
      </tr>
      <tr>
        <td align="right" valign="middle">ตำบล</td>
        <td align="left" valign="middle"> <select name="canton"  id="canton" required>
          
          <option value="0">กรุณาเลือก</option>
          
        </select></td>
        <td align="right" valign="middle">ตำบล</td>
        <td align="left" valign="middle"><select name="liableareacanton"  id="canton2" required>
          <option value="0">กรุณาเลือก</option>
        </select></td>
      </tr>
      <tr>
        <td align="right" valign="middle">รหัสไปรษณีย์:</td>
        <td colspan="4" align="left" valign="middle"><input name="zipcode" type="text"  id="zipcode" size="5" maxlength="5" disabled  readonly required></td>
      </tr>
       <tr>
        <td align="right" valign="middle">ตำแหน่ง : </td>
        <td colspan="4" align="left" valign="middle"><input type="text" name="tel[]2" id="tel[]2" required></td>
      </tr>
      <tr>
        <td align="right" valign="middle">สถานะบัญชี : </td>
        <td colspan="4" align="left" valign="middle"> <select name="memberStatus"  id="memberStatus" required>
 	<option value="officials">เจ้าหน้าที่</option>
    <option value="boss">ผู้ดูแลระบบ</option>
  </select></td>
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
       <tr>    <td colspan="2" align="center" valign="middle"><input type="submit" name="submit" id="submit" value="บันทึก">
          &nbsp;&nbsp;&nbsp;
<input type="button" name="addRow" id="addRow" value="เพิ่มเบอร์โทร">  <input type="button" name="removeRow" id="removeRow" value="ลบเบอร์โทร"></td>
      </tr>
  </table>
</form>
</div>
