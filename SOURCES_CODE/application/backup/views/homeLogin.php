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
<title>ระบบทันตสุขภาพเด็ก โรงพยาบาลสมเด็จพระยุพราชเด่นชัย</title>
<meta name="keywords" content="สมเด็จพระยุพราชเด่นชัย,โรงพยาบาลสมเด็จพระยุพราชเด่นชัย,ทันตสุขภาพเด็ก,villageteeth,ระบบทันตสุขภาพเด็ก" />
<meta name="description" content="ระบบจัดการ ทัตสุขภาพเด็ก โรงพยาบาลสมเด็จพระยุพราชเด่นชัย จังหวัดแพร่ จัดการข้อมูลสถิติ ทัตสุขภาพเด็ก โรงพยาบาลสมเด็จพระยุพราชเด่นชัย จังหวัดแพร่" />
 	<link rel="stylesheet" href="<?php echo base_url();?>css/main.css">
    <link rel="stylesheet" href="<?php echo base_url();?>css/header.css">
    <link rel="stylesheet" href="<?php echo base_url();?>css/loginForm.css">
     <script src="<?php echo base_url();?>js/jquery-1.11.1.min.js"></script>
     <script>
	 $(document).ready(function(){

                $('.load').fadeOut("fast").hide().load( '<?php echo base_url();?>index.php/home/loginForm' ).fadeIn('fast');

         
 });
 
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
<div id="header" ><div id="logo1"><img src="<?php echo base_url();?>img/logovillageteeth.png" width="200px"></div><div class="p">ระบบทันตสุขภาพเด็ก โรงพยาบาลสมเด็จพระยุพราชเด่นชัย</div><div class="img"><img src="<?php echo base_url();?>img/logo.png" width="200px"></div></div>
<br><br><br><br><br><br><br><br><br>
   <div class="loginForm">
<form id="formLoginPost" action="<?php echo base_url();?>index.php/login/redirects" method="post">
     <table width="450" border="0" align="center" cellpadding="5" cellspacing="0" class="load">
       
     </table>
</form>
</div>


</body>
</html>
