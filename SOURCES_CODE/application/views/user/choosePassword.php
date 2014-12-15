<script>
function checkPassword(){
	var memberPassword = document.getElementById('memberPassword').value;
	var memberPasswordCon = document.getElementById('memberPasswordCon').value;
	if(memberPassword.length>5&&memberPasswordCon.length>5){
			
			if(memberPassword==memberPasswordCon){
				document.getElementById('result').innerHTML='<font color="GREEN">รหัสผ่านใช้ได้</font>';
				
			}else{
				document.getElementById('result').innerHTML='<font color="RED">รหัสผ่านไม่ตรงกัน</font>';
			}
	
	}else{
	
			document.getElementById('result').innerHTML='<font color="ORANGE">รหัสผ่านอย่างน้อยต้องมี 6 ตัวอัคษร</font>';
	}
}
checkPassword();

function checkPasswordSubmit(){
	var memberPassword = document.getElementById('memberPassword').value;
	var memberPasswordCon = document.getElementById('memberPasswordCon').value;
	var result = false; 
	if(memberPassword.length>5&&memberPasswordCon.length>5){
			
			if(memberPassword==memberPasswordCon){
					result = true; 
			}else{
					result = false; 
					alert('รหัสผ่านไม่ตรงกัน กรุณายืนยันรหัสผ่านใหม่');
			}
	
	}else{
			result = false; 
			alert('รหัสผ่านอย่างน้อยต้องมี 6 ตัวอัคษร');
	}
	return result;
}
</script>
<style>
	body{
		font-family: thaisanslite_r1 Vera Serif Bold;
		margin:0;
		margin-top:-18px;
		}
</style>
<link rel="stylesheet" href="<?php echo base_url();?>css/tableBox.css">    
<link rel="stylesheet" href="<?php echo base_url();?>css/font.css">
<body onLoad="checkPassword();">
<div class="table"align="center" >
<form id="form1" action="<?php echo base_url();?>index.php<?php echo $link;?>" name="form1" method="post" onsubmit="return checkPasswordSubmit();" >
  <table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" id="myTbl">
      <tr>
        <th colspan="5" align="center" valign="middle" nowrap="nowrap">เปลี่ยนรหัสผ่าน</th>
      </tr>
            <tr>
        <td width="30%" align="right" valign="middle">รหัสผ่านเดิม : </td>
        <td width="59%" colspan="4" align="left" valign="middle"><input type="password" name="memberPasswordOld" id="memberPasswordOld"  required></td>
      </tr>
      <tr>
        <td width="30%" align="right" valign="middle">รหัสผ่านใหม่ : </td>
        <td width="30%" colspan="3" align="left" valign="middle"><input type="password" name="memberPassword" id="memberPassword"  onKeyUp="checkPassword();" onFocus="checkPassword();" onClick="checkPassword();" onChange="checkPassword();" required></td>
        <td width="29%" rowspan="2" align="left" valign="middle"><a id="result"></a></td>
      </tr>
     <tr>
        <td align="right" valign="middle">ยืนยันรหัสผ่านใหม : </td>
        <td colspan="3" align="left" valign="middle"><input type="password" name="memberPasswordCon" id="memberPasswordCon" onKeyUp="checkPassword();" onFocus="checkPassword();" onClick="checkPassword();" onChange="checkPassword();" required></td>
      </tr>
       <tr>    
         <td width="50%" align="center" colspan="5" valign="middle"><input type="submit" name="submit" id="submit" value="เปลี่ยน" onClick="return confirms();">
           &nbsp;
         <input type="button" name="cancle" id="cancle" value="ยกเลิก/ปิด" onClick="parent.jQuery.fancybox.close();"></td>
       </tr>
  </table>
</form>
</div>
</body>

