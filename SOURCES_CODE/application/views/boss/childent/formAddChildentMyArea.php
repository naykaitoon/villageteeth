<script type="text/javascript" src="<?php echo base_url()?>js/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url()?>js/jqueryui/jquery-ui.min.css">
  <script src="<?php echo base_url()?>js/jqueryui/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url()?>js/jqueryui/jquery-ui.structure.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>js/jqueryui/jquery-ui.theme.min.css">
     <link rel="stylesheet" href="<?php echo base_url();?>css/table.css">
         <link rel="stylesheet" href="<?php echo base_url();?>css/boxFormMain.css">    
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
  <style>
	*{
		font-family:Segoe, "Segoe UI", "DejaVu Sans", "Trebuchet MS", Verdana, sans-serif;

	}
	
	</style>
</head>

<body>
<div class="table"align="center" >
<form id="form1" name="form1" method="post" action="<?php echo base_url();?>index.php/boss/addActionChildent" onsubmit="return checkFormSubmit();" >
  <table width="80%" border="0" align="center" cellpadding="5" cellspacing="0" id="myTbl">
      <tr>
        <th colspan="2" align="center" valign="middle" nowrap="nowrap">เพิ่มข้อมูลเด็กในพื้นที่</th>
      </tr>
            <tr>
        <td width="28%" align="right" valign="middle">ชื่อ - นามสกุล : </td>
        <td width="72%" align="left" valign="middle"><input type="text" name="childrenName" id="childrenName" required> - <input type="text" name="childrenLastName" id="childrenLastName" required></td>
      </tr>
      <tr>
        <td align="right" valign="middle">เลขบัตรประจำตัวประชาชน : </td>
        <td align="left" valign="middle"><input type="text" name="childrenIDCard" id="childrenIDCard" onFocus="checkForm();" onKeyUp="checkForm();" required><a id="childrenIDCardResult"></a></td>
      </tr>
      <tr>
        <td align="right" valign="middle">วันเกิด ป/ด/ว: </td>
        <td align="left" valign="middle"><input type="text" name="childrenBirthday" id="childrenBirthday" readonly required></td>
      </tr>
      <tr>
        <td align="right" valign="middle">ที่อยู่บ้านเลขที่/หมู่/ซอย : </td>
        <td align="left" valign="middle">บ้านเลขที่ 
          <input name="addressDetialNumber" type="text" required id="addressDetialNumber" size="10"> 
          หมู่ 
          <input name="addressDetialM" type="text" required id="addressDetialM" size="4" maxlength="2">
          ซอย
          <input name="addressDetialSubStreet" type="text" required id="addressDetialSubStreet" size="20" maxlength="50"></td>
      </tr>
             <tr>
        <td align="right" valign="middle">ถนน</td>
        <td align="left" valign="middle"><input type="text" name="street" id="street"  required></td>
      </tr>
      <tr>
        <td width="28%" align="right" valign="middle">จังหวัด</td>
        <td width="72%" align="left" valign="middle"><select name="province" id="province">
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
        <td align="left" valign="middle"><input name="zipcode" type="text"  id="zipcode" size="5" maxlength="5" disabled  readonly></td>
      </tr>
       <tbody>
        <tr class="firstTr">
        <td align="right" valign="middle">เบอร์โทร - หมายเหตุเบอร์โทร</td>
        <td align="left" valign="middle"><input type="text" name="tel[]" id="tel[]" required> - <input type="text" name="telNote[]" id="telNote" required></td>
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
