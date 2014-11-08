<html>
<head>
<meta charset="utf-8">
<title>ระบบทันตสุขภาพเด็ก โรงพยาบาลสมเด็จพระยุพราชเด่นชัย</title>
<meta name="keywords" content="สมเด็จพระยุพราชเด่นชัย,โรงพยาบาลสมเด็จพระยุพราชเด่นชัย,ทันตสุขภาพเด็ก,villageteeth,ระบบทันตสุขภาพเด็ก" />
<meta name="description" content="ระบบจัดการ ทัตสุขภาพเด็ก โรงพยาบาลสมเด็จพระยุพราชเด่นชัย จังหวัดแพร่ จัดการข้อมูลสถิติ ทัตสุขภาพเด็ก โรงพยาบาลสมเด็จพระยุพราชเด่นชัย จังหวัดแพร่" />
    <link rel="stylesheet" href="<?php echo base_url();?>css/menu.css?v=1001">
  	<link rel="stylesheet" href="<?php echo base_url();?>css/main.css?v=1001">
    <link rel="stylesheet" href="<?php echo base_url();?>css/header.css?v=1001">
    <link rel="stylesheet" href="<?php echo base_url();?>css/table.css?v=1001">
	<script type="text/javascript" src="<?php echo base_url()?>js/jquery-1.11.1.min.js?v=1001"></script>
	<script type="text/javascript" src="<?php echo base_url()?>js/fancy/lib/jquery.mousewheel-3.0.6.pack.js?v=1001"></script>
	<script type="text/javascript" src="<?php echo base_url()?>js/fancy/source/jquery.fancybox.pack.js?v=1001&?v=2.1.5"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>js/fancy/source/jquery.fancybox-thumbs.css?v=1001&?v=2.1.5" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>js/fancy/source/jquery.fancybox.css?v=1001&?v=2.1.5" media="screen" />
    <script type="text/javascript" src="<?php echo base_url()?>js/main.js?v=1001"></script>
      <script src="<?php echo base_url()?>js/pace.min.js"></script>
  <link href="<?php echo base_url()?>css/pace-theme-barber-shop.css" rel="stylesheet" />
    <script>
	$(document).ready(function() {
  		$('.dropdown a').click(function(event) {
				 event.preventDefault();
				 var href = $(this).attr('href');
				 				
						 $('#linkPopupclick').val(href);				
										load(20,href);
										load(100,href);
										load(500,href);
										load(2000,href);
										load(3000,href);
									
										setTimeout(function(){
										  Pace.ignore(function(){
											load(3100,href);
											
										  });
										}, 4000);
									
										Pace.on('hide', function(){
										  console.log('done');
										});
				
				
			
	
               	function load(time,href){
										  var x = new XMLHttpRequest()
										  x.open('GET', href + time, true);
										  x.send();
										};
				}); 
	}); 

	</script>
      <script>
    paceOptions = {
      $(document): true
    };
  </script>
</head>

<body>	
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js?v=1001','ga');
  ga('create', 'UA-55870926-1', 'auto');
  ga('send', 'pageview');
	ga('set', '&uid', {{"<?php echo $loginData['id'];?>"}}); // ตั้งค่ารหัสผู้ใช้โดยใช้ user_id ที่ลงชื่อเข้าใช้
</script>
<div id="header" >
	<div id="logo1">
    	<img src="<?php echo base_url();?>img/logo.png?v=1001?v=1001" width="150px">
    </div>
    <div class="img">
    
    </div>
    <p class="p">
    		ระบบทันตสุขภาพเด็ก โรงพยาบาลสมเด็จพระยุพราชเด่นชัย<br>Dental Health System
    </p>
    <div class="logindata">
    			ยินดีต้อนรับ คุณ : <?php echo $loginData['name'].' '.$loginData['lastName'];?>
                <br>
                <img src="<?php echo base_url();?>img/icon/lock.png?v=1001" width="30px">
                <a href="<?php echo base_url();?>index.php/home/logout" class="logoutBt">ออกจากระบบ</a>
    </div>
</div>
<div class="allContent">
	<div id="menu">
		<ul class="dropdown">
 			<li>
       			 <a class="mainMenu"  id="headMenu" onClick="return false" style="font-size:25px;">
                 <img class="iconAction" src="<?php echo base_url();?>img/icon/menu.png?v=1001?v=1001" height="30px">&nbsp;&nbsp;เมนู
                 </a>
        	</li>
      		<li>
        		 <a class="mainMenu" href="" onClick="return false">
                 <img class="iconAction" src="<?php echo base_url();?>img/icon/magChilldent.png?v=1001" height="30px" > จัดการข้อมูลเด้ก</a>
        <ul>
          	<li><a class="submenu" href="<?php echo base_url();?>index.php/boss/childentInArea">- เด็กในเขตความรับผิดชอบ</a></li>
         	<li><a class="submenu" href="<?php echo base_url();?>index.php/boss/childentAll">- เด็กทั้งหมด</a></li>
           	<li><a class="submenu" href="<?php echo base_url();?>index.php/boss/childentAllProfile">- ข้อมูลประวัติเด็ก</a></li>
        </ul>
      </li>  
      <li><a class="mainMenu" href="" onClick="return false"><img class="iconAction" src="<?php echo base_url();?>img/icon/grap.png?v=1001" height="30px" > รายงานข้อมูลสถิติ</a>
        <ul>
          <li><a class="submenu" href="#">- สถิติโดยรวมทั้งหมด</a></li>
           <li><a class="submenu" href="#">- สถิติโดยแบ่งตามพื้นที่</a></li>
           <li><a class="submenu" href="#">- สถิติโดยแบ่งตามพฤติกรรม</a></li>
           <li><a class="submenu" href="#" onClick="return false">- สถิติเด็กในเขตของฉัน</a>
           		  <ul>
        		           <li><a class="submenu" href="#">- สถิติโดยรวมในเขตของฉัน</a></li>
                           <li><a class="submenu" href="#">- สถิติโดยแบ่งตามพฤติกรรม</a></li>
       			 </ul>
            <li>
           <li><a class="submenu" href="" onClick="return false">- สถิติเด็กการตรวจของฉัน</a>
          	  <ul>
        		        <li><a class="submenu" href="#" >- แบ่งตามพฤษติกรรม</a></li>
                        <li><a class="submenu" href="#">- แบ่งตามช่วงอายุ</a>                
                        <li><a class="submenu" href="#">- ข้อมูลการตรวจรายบุคคล</a>
       			 </ul>
            <li>
        </ul>
      </li>
      <li>
        <a class="mainMenu" href="" onClick="return false"><img class="iconAction" src="<?php echo base_url();?>img/icon/policy.png?v=1001" height="30px" > จัดการข้อมูลการตรวจ</a>
        <ul>
          <li><a class="submenu" href="<?php echo base_url();?>index.php/boss/distanceDataList">- ระยะเวลาการตรวจ</a></li>
          		
          <li><a class="submenu" href="<?php echo base_url();?>index.php/boss/behaviorMag">- พฤติกรรมทัตสุขภาพ</a></li>
          <li><a class="submenu" href="<?php echo base_url();?>index.php/boss/behaviorMagType">- หมวดหมู่พฤติกรรมทัตสุขภาพ</a></li>
          <li><a class="submenu" href="<?php echo base_url();?>index.php/boss/content">- ตารางการนัดเด็กของฉัน</a></li>      

        </ul>
      </li>
      <li>
        <a class="mainMenu" href="" onClick="return false"><img src="<?php echo base_url();?>img/icon/magMember.png?v=1001" height="30px" > จัดการมูลผู้ใช้งาน</a>
        <ul>
          <li><a class="submenu"  href="<?php echo base_url();?>index.php/boss/memberByArea">- ตามเขตรับผิดชอบ</a></li>
          <li><a class="submenu"  href="<?php echo base_url();?>index.php/boss/memberAll">- ผู้ใช้งานทั้งหมด</a></li>
        </ul>
      </li>
     <li> <a class="mainMenu" href="" onClick="return false;" ><img class="iconAction" src="<?php echo base_url();?>img/polincy.png?v=1001" height="30px" > ลงข้อมูลการตรวจ</a>
     	 <ul>
          <li><a class="submenu" href="<?php echo base_url();?>index.php/boss/police">- ตามเขตรับผิดชอบ</a></li>
        </ul>
      </li>
    </ul>
    <script src="<?php echo base_url();?>js/menu/tendina.min.js?v=1001"></script>
    <script>
      $('.dropdown').tendina({
        // This is a setup made only
        // to show which options you can use,
        // it doesn't actually make sense!
        animate: true,
        speed: 500,
        onHover: false,
        hoverDelay: 300,
        activeMenu: $('deepest'),
        openCallback: function(clickedEl) {
          console.log('Hey dude!');
        },
        closeCallback: function(clickedEl) {
          console.log('Bye dude!');
        }
      });
    </script>
  </div>
</div>

</div>
<div class="content" align="center">

</div>
<input type="hidden" id="linkPopupclick">
<div id="footerLoagin" title="ที่อยู่ที่ติดต่อ" align="center"><p id="footerText">โครงการลูกรักฟันดีเริ่มที่ซี้แรก ร่วมกับ โรงพยาบาลสมเด็จพระยุพราชเด่นชัย&nbsp;:&nbsp;&nbsp;http://www.villageteeth.com<br>
545 หมู่ 9 ตำบลเด่นชัย อำเภอเด่นชัย จังหวัดแพร่54110 โทรศัพท์ 054-613134 Fax. 054-613195 WebSite : <a href="http://www.denchaihosp.com/">http://www.denchaihosp.com/</a><br>Copyright © 2014 All rights Reserved. </p></div>
</body>
</html>