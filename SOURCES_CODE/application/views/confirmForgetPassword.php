<!-- 
	type : view
	file_name : homeLogin.php
    file_type : php
    author : Jedsadakorn Sirikunpan
    details : loginpage
	start_date : 18/10/2557
    end_Date : -
-->
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ลืมรหัสผ่าน</title>
<meta name="keywords" content="สมเด็จพระยุพราชเด่นชัย,โรงพยาบาลสมเด็จพระยุพราชเด่นชัย,ทันตสุขภาพเด็ก,villageteeth,ระบบทันตสุขภาพเด็ก" />
<meta name="description" content="ระบบจัดการ ทัตสุขภาพเด็ก โรงพยาบาลสมเด็จพระยุพราชเด่นชัย จังหวัดแพร่ จัดการข้อมูลสถิติ ทัตสุขภาพเด็ก โรงพยาบาลสมเด็จพระยุพราชเด่นชัย จังหวัดแพร่ Dental Health System villageteeth" />
      <link rel="stylesheet" href="<?php echo base_url();?>css/loginForm.css">
      <link rel="stylesheet" href="<?php echo base_url();?>css/menu.css">
  	<link rel="stylesheet" href="<?php echo base_url();?>css/main.css">
    <link rel="stylesheet" href="<?php echo base_url();?>css/header.css">
    <link rel="stylesheet" href="<?php echo base_url();?>css/table.css">
  
     <script src="<?php echo base_url();?>js/jquery-1.11.1.min.js"></script>
     <script>
			function checkPassword(){
				var pass1 = $('#password1').val();
				var pass2 = $('#password2').val();
				
			if(pass1.length>7&&pass2.length>7){	
				
					if(pass1==pass2){
							$('#password1').css('background-color','#75C559');
							$('#password2').css('background-color','#75C559');
							$('.resultCheckPass').html('<br><font color="#75C559">รหัสผ่านนี้ใช้ได้</font>');
							document.getElementById('login').disabled = false;
					}else{
						$('#password1').css('background-color','#FF4144');
						$('#password2').css('background-color','#FF4144');
						$('.resultCheckPass').html('<br><font color="#FF4144">รหัสผ่านไม่ตรงกัน</font>');
						document.getElementById('login').disabled = true;
					}
				}else{
						$('#password1').css('background-color','#FF4144');
						$('#password2').css('background-color','#FF4144');
						$('.resultCheckPass').html('<br><font color="#FF4144">รหัสผ่านต้องมีอย่างน้อย 8 ตัวอัคศร</font>');
						document.getElementById('login').disabled = true;
				}

			}
	 </script>
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">	
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-55870926-1', 'auto');
  ga('send', 'pageview');
	ga('set', '&uid', {{"<?php echo md5(date('Y-m-d H:m:s'));?>"}}); // ตั้งค่ารหัสผู้ใช้โดยใช้ user_id ที่ลงชื่อเข้าใช้
</script>

<div id="header" ><div id="logo1"><img src="<?php echo base_url();?>img/logo.png" width="150px"></div><div class="img"></div><p class="p">ระบบทันตสุขภาพเด็ก โรงพยาบาลสมเด็จพระยุพราชเด่นชัย<br>Dental Health System</p></div>
<br><br><br><br><br><br><br><br><br>
   <div class="loginForm" align="center">
<form id="formLoginPost" action="<?php echo base_url();?>index.php/login/changePassword" method="post">
     <table width="450" border="0" align="center" cellpadding="5" cellspacing="0" class="load">
       <tbody>
         <tr>
           <th colspan="2" align="center" nowrap="nowrap">เปลี่ยนรหัสผ่าน<input type="hidden"  name="memberId" id="memberId"    value="<?php echo $member[0]['memberId'];?>"required/></th>
         </tr>
         <tr>
           <td width="139" align="right" valign="middle" nowrap="nowrap">รหัสผ่าน&nbsp;:&nbsp;</td>
           <td width="291" align="left" valign="middle" nowrap="nowrap">&nbsp;             <input  name="password1" type="password"  required id="password1"  placeholder="รหัสผ่านใหม่" style="height:40px;width:200px;" onKeyUp="checkPassword()" maxlength="15"/></td>
         </tr>
         <tr>
           <td align="right" valign="middle" nowrap="nowrap">ยืนยันรหัสผ่าน&nbsp;:&nbsp;</td>
           <td align="left" valign="middle" nowrap="nowrap">&nbsp;             <input  name="password2" type="password"  required id="password2"  placeholder="ยืนยันรหัสผ่านใหม่" style="height:40px;width:200px;" onKeyUp="checkPassword()" maxlength="15"/></td>
         </tr>
         <tr>
           <td colspan="2" align="center" valign="middle" nowrap="nowrap"><p>
             <input  type="submit" value="ยืนยัน"  id="login" disabled>
           </p>
           <p class="resultCheckPass" ></p></td>
         </tr>
           <tr>
           <td id="tdLast" colspan="2" align="center" valign="middle" nowrap="nowrap"><a id="resultLogin"></a></td>
         </tr>
           </tbody>
     </table>
</form>
</div>
<br>
<br>
<div id="footerLoagin" title="ที่อยู่ที่ติดต่อ" align="center"><p id="footerText">โครงการลูกรักฟันดีเริ่มที่ซี้แรก ร่วมกับ โรงพยาบาลสมเด็จพระยุพราชเด่นชัย<br>
545 หมู่ 9 ตำบลเด่นชัย อำเภอเด่นชัย จังหวัดแพร่54110 โทรศัพท์ 054-613134 Fax. 054-613195 WebSite : <a href="http://www.denchaihosp.com/">http://www.denchaihosp.com/</a><br>Copyright © 2014 All rights Reserved. </p></div>
</body>
</html>
