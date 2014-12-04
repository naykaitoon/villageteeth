<html>
<head>
<meta charset="utf-8">
<title>ระบบทันตสุขภาพเด็ก โรงพยาบาลสมเด็จพระยุพราชเด่นชัย</title>
<meta name="keywords" content="สมเด็จพระยุพราชเด่นชัย,โรงพยาบาลสมเด็จพระยุพราชเด่นชัย,ทันตสุขภาพเด็ก,villageteeth,ระบบทันตสุขภาพเด็ก,ทันตสุขภาพเด่นชัย" />
<meta name="description" content="ระบบจัดการ ทัตสุขภาพเด็ก เด่นชัย โรงพยาบาลสมเด็จพระยุพราชเด่นชัย จังหวัดแพร่ จัดการข้อมูลสถิติ ทัตสุขภาพเด็ก โรงพยาบาลสมเด็จพระยุพราชเด่นชัย จังหวัดแพร่" />
<link rel="stylesheet" href="<?php echo base_url();?>css/menu.css?v=1001">
<link rel="stylesheet" href="<?php echo base_url();?>css/main.css?v=1001">
<link rel="stylesheet" href="<?php echo base_url();?>css/header.css?v=1001">
<link rel="stylesheet" href="<?php echo base_url();?>css/table.css?v=1001">
<link rel="stylesheet" href="<?php echo base_url();?>css/font.css?v=1001">
<script type="text/javascript" src="<?php echo base_url()?>js/jquery-1.11.1.min.js?v=1001"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/jqueryui/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/jquery.fancybox.js?v=1001&?v=2.1.5"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/jquery.mousewheel-3.0.6.pack.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/fancy/helpers/jquery.fancybox-thumbs.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>js/fancy/helpers/jquery.fancybox-thumbs.css?v=1001&?v=2.1.5" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>js/fancy/jquery.fancybox.css?v=2.1.5" media="screen" />
<script type="text/javascript" src="<?php echo base_url()?>js/main.js?v=1001"></script>
<script>
	$(document).ready(function() {
		var check;
			$('#alertLink').hide();
		$.get( '<?php echo base_url();?>index.php/boss/countAlert', function(num){
			if(num!=0){
				check = num;
				$('#alertLink').show('slow');
				$('.alert').show('slow').html(num);	
			}else{
				
			}
		});
$('.dropdown a').click(function(event) {
				 event.preventDefault();
				 var href = $(this).attr('href');
				 				
						 $('#linkPopupclick').val(href);				
}); 
	setInterval(function (){
			
			$.get( '<?php echo base_url();?>index.php/boss/countAlert', function( data ) {
	
	if(data!=0){
				if(check != data){	
				$('#alertLink').show('slow');
				$('.alert').show('slow').html(num);	
				$('body').remove('audio');
$('body').append('<audio controls autoplay preload="none"><source src="<?php echo base_url();?>sound/alert.MP3" type="audio/ogg"> </audio>');
				}
	}else{
				$('#alertLink').hide('slow');
				$('.alert').hide('slow');
}
	
			check = data;
			

			});
			
	},5000);		
  		
	}); 

	 $(".promo").fancybox({
	  	        openEffect	: 'elastic',
    	        closeEffect	: 'elastic',
				height : 550,
				width :	700,
				scrolling : 'auto',
				autoSize : false,
				fitToView	: false,
				type				: 'iframe'
				
				
	
});



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
	ga('set', '&uid', {{"<?php echo MD5($loginData['id'].date('Y-m-d H:m:s'));?>"}}); // ตั้งค่ารหัสผู้ใช้โดยใช้ user_id ที่ลงชื่อเข้าใช้
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
<a id="alertLink" class="submenu" href="<?php echo base_url()?>index.php/boss/listAllAlert" >
   <p class="alert" style="text-decoration:none;text-align:left;"></p>
   </a>

      <div class="logindata">
    <p>
    			<li class="textlog" style="text-align:center;">
               
              <h2 style="padding-top:5px;margin-top:-3px;margin-left:-15px;"><font color="#ACACAC;"> ยินดีต้อนรับ</font> คุณ : <?php echo $loginData['name'].' '.$loginData['lastName'];?></h2>
               <br>

     <ul class="dropdownAcou" style="text-align:center;">
        <li class="headicon">
            <a href="" onClick="return false;" ><img src="<?php echo base_url();?>img/icon/settingIcon.png" width="30" height="30" class="iconAction" />&nbsp;&nbsp;จัดการบีญชี</a>
      <ul>
                <li style="text-align:center;"><a href="<?php echo base_url();?>index.php/boss/editMyProfile" class="editProfile"><img src="<?php echo base_url();?>img/icon/prof.png" width="30" height="30" />แก้ไขข้อมูลส่วนตัว</a></li>
            </ul>
                  <ul style="text-align:center;">
                <li style="text-align:center;"><a href="<?php echo base_url();?>index.php/boss/chooseNewPassword" class="chooseNewPassword"><img src="<?php echo base_url();?>img/icon/editpass.png" width="30" height="30" />เปลี่ยนรหัสผ่าน</a></li>
            </ul>
        </li>
    </ul>
       <a href="<?php echo base_url();?>index.php/home/logout" class="logoutBt">ออกจากระบบ</a>
    </p>
        </li>
    </div>
</div>

<div class="allContent">
	<div id="menu">
		<ul class="dropdown">
 			<li id="headMenubg">
       			 <a class="mainMenu"  id="headMenu" onClick="return false" style="font-size:25px;">
                 <img class="iconAction" src="<?php echo base_url();?>img/icon/menu.png?v=1001?v=1001" height="30px">&nbsp;&nbsp;เมนู
                 </a>
        	</li>
      		<li>
        		 <a class="mainMenu" href="" onClick="return false">
  <img class="iconAction" src="<?php echo base_url();?>img/icon/magChilldent.png?v=1001" height="30px" > จัดการข้อมูลเด็ก</a>
        <ul>
          	<li><a class="submenu" href="<?php echo base_url();?>index.php/boss/childentInArea">- เด็กในเขตความรับผิดชอบ</a></li>
         	<li><a class="submenu" href="<?php echo base_url();?>index.php/boss/childentAll">- เด็กทั้งหมด</a></li>
           	<li><a class="submenu" href="<?php echo base_url();?>index.php/boss/childentAllProfile">- ข้อมูลประวัติเด็ก</a></li>
        </ul>
      </li>  
      <li><a class="mainMenu" href="" onClick="return false"><img class="iconAction" src="<?php echo base_url();?>img/icon/grap.png?v=1001" height="30px" > รายงานข้อมูลสถิติ</a>
        <ul>
          <li><a class="submenu" href="<?php echo base_url();?>index.php/report/statisticPolicingsReport">- สถิติการข้ารับการตรวจ</a></li>
           <li><a class="submenu" href="<?php echo base_url();?>index.php/home/fix" onClick="return false">- สถิติโดยแบ่งตามพื้นที่</a></li>
           <li><a class="submenu" href="<?php echo base_url();?>index.php/report/policingsBehaviorMagChart">- สถิติโดยแบ่งตามพฤติกรรม</a></li>
           <li><a class="submenu" href="<?php echo base_url();?>index.php/home/fix" onClick="return false">- สถิติเด็กในเขตของฉัน</a>
           		  <ul>
        		           <li><a class="submenu" href="<?php echo base_url();?>index.php/home/fix" onClick="return false">- สถิติโดยรวมในเขตของฉัน</a></li>
                           <li><a class="submenu" href="<?php echo base_url();?>index.php/home/fix" onClick="return false">- สถิติโดยแบ่งตามพฤติกรรม</a></li>
       			 </ul>
            <li>
           <li><a class="submenu" href="<?php echo base_url();?>index.php/home/fix" onClick="return false">- สถิติเด็กการตรวจของฉัน</a>
          	  <ul>
        		        <li><a class="submenu" href="<?php echo base_url();?>index.php/home/fix" onClick="return false" >- แบ่งตามพฤษติกรรม</a></li>
                        <li><a class="submenu" href="<?php echo base_url();?>index.php/home/fix" onClick="return false">- แบ่งตามช่วงอายุ</a>                
                        <li><a class="submenu" href="<?php echo base_url();?>index.php/home/fix" onClick="return false">- ข้อมูลการตรวจรายบุคคล</a>
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
          <li><a class="submenu" href="<?php echo base_url();?>index.php/boss/policingFind">- ค้นหาประวัติการตรวจ</a></li>   
          <li><a class="submenu" href="<?php echo base_url();?>index.php/boss/calendaAlert">- ตารางการนัดเด็กของฉัน</a></li>      

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
<div class="alertValues"></div>
</body>
</html>