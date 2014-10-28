<!-- 
	type : view
	file_name : home.php
    file_type : php
    author : Jedsadakorn Sirikunpan
    details : homepage
	start_date : 16/9/2557
    end_Date : -
-->
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="keywords" content="สมเด็จพระยุพราชเด่นชัย,โรงพยาบาลสมเด็จพระยุพราชเด่นชัย,ทันตสุขภาพเด็ก,villageteeth,ระบบทันตสุขภาพเด็ก" />
<meta name="description" content="ระบบจัดการ ทัตสุขภาพเด็ก โรงพยาบาลสมเด็จพระยุพราชเด่นชัย จังหวัดแพร่ จัดการข้อมูลสถิติ ทัตสุขภาพเด็ก โรงพยาบาลสมเด็จพระยุพราชเด่นชัย จังหวัดแพร่" />
    <link rel="stylesheet" href="<?php echo base_url();?>css/menu.css">
  	<link rel="stylesheet" href="<?php echo base_url();?>css/main.css">
    <link rel="stylesheet" href="<?php echo base_url();?>css/header.css">
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
<div class="allContent">
<div id="menu">
<ul class="dropdown">
      <li>
        <a class="mainMenu" href="#">จัดการข้อมูลเด้ก</a>
        <ul>
          <li><a class="submenu" href="#">เด็กในเขตความรับผิดชอบ</a></li>
           <li><a class="submenu" href="#">ข้อมูลประวัติเด็กในเขตความรับผิดชอบ</a></li>
        </ul>
      </li>
      <li>
        <a class="mainMenu" href="#">จัดการข้อมูลการตรวจ</a>
        <ul>
         <li><a class="submenu" href="#">ลงข้อมูลการตรวจ</a></li>	
          <li><a class="submenu" href="#">ดูพฤติกรรมทัตสุขภาพ</a></li>
          <li><a class="submenu" href="#">ตารางการนัดเด็กของฉัน</a></li>      

        </ul>
      </li>
     <li><a class="mainMenu" href="#">รายงานข้อมูลสถิติ</a>
        <ul>
          <li><a class="submenu" href="#">สถิติโดยรวมทั้งหมด</a></li>
           <li><a class="submenu" href="#">สถิติโดยแบ่งตามพื้นที่</a></li>
           <li><a class="submenu" href="#">สถิติโดยแบ่งตามพฤติกรรม</a></li>
           <li><a class="submenu" href="#">สถิติเด็กในเขตของฉัน</a>
           		  <ul>
        		           <li><a class="submenu" href="#">สถิติโดยรวมในเขตของฉัน</a></li>
                           <li><a class="submenu" href="#">สถิติโดยแบ่งตามพฤติกรรม</a></li>
       			 </ul>
            <li>
           <li><a class="submenu" href="#">สถิติเด็กการตรวจของฉัน</a>
          	  <ul>
        		        <li><a class="submenu" href="#">แบ่งตามพฤษติกรรม</a></li>
                        <li><a class="submenu" href="#">แบ่งตามช่วงอายุ</a>
                            <ul>
       		       				<li><a class="submenusub" href="#">3เดือน</a></li>
                               <li><a class="submenusub" href="#">6เดือน</a></li>
                                <li><a class="submenusub" href="#">12เดือน</a></li>
             	 			</ul>
                        <li><a class="submenu" href="#">ข้อมูลการตรวจรายบุคคล</a>
       			 </ul>
            <li>
        </ul>
      </li>
    </ul>
    <script src="<?php echo base_url();?>js/menu/tendina.min.js"></script>
    <script>
      $('.dropdown').tendina({
        // This is a setup made only
        // to show which options you can use,
        // it doesn't actually make sense!
        animate: true,
        speed: 500,
        onHover: false,
        hoverDelay: 300,
        activeMenu: $('#deepest'),
        openCallback: function(clickedEl) {
          console.log('Hey dude!');
        },
        closeCallback: function(clickedEl) {
          console.log('Bye dude!');
        }
      })
    </script>
    </div>
</div>
<div class="content" align="center">

</div>
</div>
</body>
</html>