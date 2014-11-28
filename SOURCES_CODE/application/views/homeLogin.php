<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ระบบทันตสุขภาพเด็ก โรงพยาบาลสมเด็จพระยุพราชเด่นชัย Dental Health System</title>
<meta name="keywords" content="สมเด็จพระยุพราชเด่นชัย,โรงพยาบาลสมเด็จพระยุพราชเด่นชัย,ทันตสุขภาพเด็ก,villageteeth,ระบบทันตสุขภาพเด็ก" />
<meta name="description" content="ระบบจัดการ ทัตสุขภาพเด็ก โรงพยาบาลสมเด็จพระยุพราชเด่นชัย จังหวัดแพร่ จัดการข้อมูลสถิติ ทัตสุขภาพเด็ก โรงพยาบาลสมเด็จพระยุพราชเด่นชัย จังหวัดแพร่ Dental Health System villageteeth"/>
      <link rel="stylesheet" href="<?php echo base_url();?>css/loginForm.css">
      <link rel="stylesheet" href="<?php echo base_url();?>css/menu.css">
  	<link rel="stylesheet" href="<?php echo base_url();?>css/main.css">
    <link rel="stylesheet" href="<?php echo base_url();?>css/header.css">
    <link rel="stylesheet" href="<?php echo base_url();?>css/table.css">
     <link rel="stylesheet" href="<?php echo base_url();?>css/font.css?v=1001">
     <script src="<?php echo base_url();?>js/jquery-1.11.1.min.js"></script>
       <script src="<?php echo base_url()?>js/pace.min.js"></script>
  <link href="<?php echo base_url()?>css/pace-theme-barber-shop.css" rel="stylesheet" />
     <script>
	 $(document).ready(function(){
		    $('.load').load( '<?php echo base_url();?>index.php/home/loginForm' ); 
										load(20);
										load(100);
										load(500);
										load(2000);
										load(3000);
									
										setTimeout(function(){
										  Pace.ignore(function(){
											load(3100);
										  });
										}, 4000);
									
										Pace.on('hide', function(){
										  console.log('done');
										});
				   
                
				 	function load(time){
										  var x = new XMLHttpRequest()
										  x.open('GET', time, true);
										  x.send(); 
										
										};   
 });
 
	 </script>
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" id="homeLoginBody">	
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
<form id="formLoginPost" action="<?php echo base_url();?>index.php/login/redirects" method="post">
     <table width="450" border="0" align="center" cellpadding="5" cellspacing="0" class="load">
       
     </table>
</form>
</div>
<br>
<br>
<div id="footerLoaginLoginHome" title="ที่อยู่ที่ติดต่อ" align="center">
  <p id="footerText">โครงการลูกรักฟันดีเริ่มที่ซี้แรก ร่วมกับ โรงพยาบาลสมเด็จพระยุพราชเด่นชัย&nbsp;:&nbsp;&nbsp;http://www.villageteeth.com<br>
545 หมู่ 9 ตำบลเด่นชัย อำเภอเด่นชัย จังหวัดแพร่54110 โทรศัพท์ 054-613134 Fax. 054-613195 WebSite : http://www.denchaihosp.com/<br>Copyright © 2014 All rights Reserved. </p></div>
</body>
</html>
