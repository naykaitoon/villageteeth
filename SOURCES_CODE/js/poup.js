<!----------------------------------------  จัดการเด็กทั้งหมด START  ----------------------------------------------------!>
$('.addChildentAll').fancybox({
		openEffect  : 'fade',
		closeEffect : 'fade',
		maxWidth	: 1000,
		maxHeight	: 530,
		minWidth	: 1000,
		minHeight	: 530,
		fitToView	: true,
		width 		: '100%',
		height		: '100%',
		padding     : 5,
		beforeClose : function() {
					
       		$('.content').load('/index.php/boss/childentAll');

    }
	
});
$('.editChildentAll').fancybox({
	  	openEffect  : 'fade',
		closeEffect : 'fade',
		maxWidth	: 1000,
		maxHeight	: 510,
		minWidth	: 1000,
		minHeight	: 510,
		fitToView	: true,
		width 		: '100%',
		height		: '100%',
		padding     : 5,
		beforeClose : function() {
					
       		$('.content').load('/index.php/boss/childentAll');

    }
	
});
$('.deleteChildentAll').fancybox({
	  	openEffect  : 'fade',
		closeEffect : 'fade',
		maxWidth	: 500,
		maxHeight	: 250,
		minWidth	: 500,
		minHeight	: 250,
		fitToView	: true,
		padding     : 5,
		beforeClose : function() {
					
       		$('.content').load('/index.php/boss/childentAll');

    }
	
});
<!----------------------------------------  จัดการเด็กทั้งหมด END  ----------------------------------------------------!>
<!--  //////////////////////////////////////////////////////////////////////////////////////////////////////// --!>
<!----------------------------------------  จัดการเด็กในพื้นที่ START  ----------------------------------------------------!>
$('.addChildentInArea').fancybox({
	  	openEffect  : 'fade',
		closeEffect : 'fade',
		maxWidth	: 1000,
		maxHeight	: 510,
		minWidth	: 1000,
		minHeight	: 510,
		fitToView	: true,
		width 		: '100%',
		height		: '100%',
		padding     : 5,
		beforeClose : function() {
					
       		$('.content').load('/index.php/boss/childentInArea');

    }
	
});

$('.editChildentInArea').fancybox({
	  	openEffect  : 'fade',
		closeEffect : 'fade',
		maxWidth	: 1000,
		maxHeight	: 510,
		minWidth	: 1000,
		minHeight	: 510,
		fitToView	: true,
		width 		: '100%',
		height		: '100%',
		padding     : 5,
		beforeClose : function() {
					
       		$('.content').load('/index.php/boss/childentInArea');

    }
	
	
});
$('.deleteChildentInArea').fancybox({
	  	openEffect  : 'fade',
		closeEffect : 'fade',
		maxWidth	: 500,
		maxHeight	: 250,
		minWidth	: 500,
		minHeight	: 250,
		fitToView	: true,
		width 		: '100%',
		height		: '100%',
		padding     : 5,
		beforeClose : function() {
					
       		$('.content').load('/index.php/boss/childentInArea');

    }
	
	
});
<!----------------------------------------  จัดการเด็กในพื้นที่ END  ----------------------------------------------------!>
<!--  //////////////////////////////////////////////////////////////////////////////////////////////////////// --!>
<!----------------------------------------  จัดการเด็กในพื้นที่หน้าโปรไฟล์ START  ----------------------------------------------------!>


$('.addChildentProfile').fancybox({
		openEffect  : 'fade',
		closeEffect : 'fade',
		maxWidth	: 1000,
		maxHeight	: 530,
		minWidth	: 1000,
		minHeight	: 530,
		fitToView	: true,
		width 		: '100%',
		height		: '100%',
		padding     : 5,
		beforeClose : function() {
					
       		$('.content').load('/index.php/boss/childentAllProfile');

    }
	
});

$('.viewDetialProfile').fancybox({
		openEffect  : 'fade',
		closeEffect : 'fade',
		maxWidth	: 750,
		maxHeight	: 530,
		minWidth	: 750,
		minHeight	: 530,
		fitToView	: true,
		width 		: '100%',
		height		: '100%',
		padding     : 5
	
});

<!----------------------------------------  จัดการเด็กในพื้นที่หน้าโปรไฟล์ END  ----------------------------------------------------!>

<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

<!----------------------------------------- จัดการช่วงระยะเวลา START -------------------------------------------------------------------!>

  $('.addDistance').fancybox({
		openEffect  : 'fade',
		closeEffect : 'fade',
		maxWidth	: 500,
		maxHeight	: 190,
		minWidth	: 500,
		minHeight	: 190,
		fitToView	: true,
		width 		: '100%',
		height		: '100%',
		padding     : 5,
		beforeClose : function() {
					
       		$('.content').load('/index.php/boss/distanceDataList');

    }
	
});

  $('.editDistance').fancybox({
		openEffect  : 'fade',
		closeEffect : 'fade',
		maxWidth	: 500,
		maxHeight	: 190,
		minWidth	: 500,
		minHeight	: 190,
		fitToView	: true,
		width 		: '100%',
		height		: '100%',
		padding     : 5,
		beforeClose : function() {
					
       		$('.content').load('/index.php/boss/distanceDataList');

    }
	
});

  $('.deleteDistance').fancybox({
	  	openEffect  : 'fade',
		closeEffect : 'fade',
		maxWidth	: 500,
		maxHeight	: 250,
		minWidth	: 500,
		minHeight	: 250,
		fitToView	: true,
		width 		: '100%',
		height		: '100%',
		padding     : 5,
		beforeClose : function() {
					
       		$('.content').load('/index.php/boss/distanceDataList');

    }
	
});

<!----------------------------------------  จัดการช่วงระยะเวลา END ----------------------------------------------------!>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

<!----------------------------------------- จัดการพฤติกรรม START -------------------------------------------------------------------!>

  $('.addBehavior').fancybox({
		openEffect  : 'fade',
		closeEffect : 'fade',
		maxWidth	: 500,
		maxHeight	: 230,
		minWidth	: 500,
		minHeight	: 230,
		fitToView	: true,
		width 		: '100%',
		height		: '100%',
		padding     : 5,
		beforeClose : function() {
     		$('.content').load('/index.php/boss/behaviorMag');
    }
	
});

  $('.editBehavior').fancybox({
		openEffect  : 'fade',
		closeEffect : 'fade',
		maxWidth	: 500,
		maxHeight	: 230,
		minWidth	: 500,
		minHeight	: 230,
		fitToView	: true,
		width 		: '100%',
		height		: '100%',
		padding     : 5,
		beforeClose : function() {
       		$('.content').load('/index.php/boss/behaviorMag');
    }
	
});

$('.deleteBehavior').fancybox({
	  	openEffect  : 'fade',
		closeEffect : 'fade',
		maxWidth	: 500,
		maxHeight	: 250,
		minWidth	: 500,
		minHeight	: 250,
		fitToView	: true,
		width 		: '100%',
		height		: '100%',
		padding     : 5,
		beforeClose : function() {
       		$('.content').load('/index.php/boss/behaviorMag');
    }
	
});

<!----------------------------------------  จัดการพฤติกรรม END ----------------------------------------------------!>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<!----------------------------------------- จัดการประเภทพฤติกรรม START --------------------------------------------------------!>

  $('.addBehaviorType').fancybox({
		openEffect  : 'fade',
		closeEffect : 'fade',
		maxWidth	: 500,
		maxHeight	: 150,
		minWidth	: 500,
		minHeight	: 150,
		fitToView	: true,
		width 		: '100%',
		height		: '100%',
		padding     : 5,
		beforeClose : function() {
     		$('.content').load('/index.php/boss/behaviorMagType');
    }
	
});

  $('.editBehaviorType').fancybox({
		openEffect  : 'fade',
		closeEffect : 'fade',
		maxWidth	: 500,
		maxHeight	: 150,
		minWidth	: 500,
		minHeight	: 150,
		fitToView	: true,
		width 		: '100%',
		height		: '100%',
		padding     : 5,
		beforeClose : function() {
       		$('.content').load('/index.php/boss/behaviorMagType');
    }
	
});

$('.deleteBehaviorType').fancybox({
	  	openEffect  : 'fade',
		closeEffect : 'fade',
		maxWidth	: 500,
		maxHeight	: 250,
		minWidth	: 500,
		minHeight	: 250,
		fitToView	: true,
		width 		: '100%',
		height		: '100%',
		padding     : 5,
		beforeClose : function() {
       		$('.content').load('/index.php/boss/behaviorMagType');
    }
	
});

<!----------------------------------------  จัดการประเภทพฤติกรรม END ----------------------------------------------------!>

<!-----------------------------------------  ค้นหาประวัติการตรวจ START ---------------------------------------------------!>
$('.policingreport').fancybox({
	 	openEffect  : 'fade',
		closeEffect : 'fade',
		maxWidth	: 800,
		maxHeight	: 600,
		minWidth	: 800,
		minHeight	: 600,
		fitToView	: true,
		width 		: '100%',
		height		: '100%',
		padding     : 5
});
<!-------------------------------------------   ค้นหาประวัติการตรวจ  END --------------------------------------------------------------!>

<!----------------------------------------- จัดการผู้ใช้งาน START ---------------------------------------------------!>


$('.AddMember').fancybox({
		openEffect  : 'fade',
		closeEffect : 'fade',
		maxWidth	: 900,
		maxHeight	: 600,
		minWidth	: 900,
		minHeight	: 600,
		fitToView	: true,
		width 		: '100%',
		height		: '100%',
		padding     : 5,
		beforeClose : function() {
       		$('.content').load('/index.php/boss/memberAll');
    }

	
});

$('.editMember').fancybox({
		openEffect  : 'fade',
		closeEffect : 'fade',
		maxWidth	: 900,
		maxHeight	: 600,
		minWidth	: 900,
		minHeight	: 600,
		fitToView	: true,
		width 		: '100%',
		height		: '100%',
		padding     : 5,
		beforeClose : function() {
       		$('.content').load('/index.php/boss/memberAll');
    }

	
});

$('.delMember').fancybox({
		openEffect  : 'fade',
		closeEffect : 'fade',
		maxWidth	: 500,
		maxHeight	: 250,
		minWidth	: 500,
		minHeight	: 250,
		fitToView	: true,
		width 		: '100%',
		height		: '100%',
		padding     : 5,
		beforeClose : function() {
       		$('.content').load('/index.php/boss/memberAll');
    }

	
});



$('.AddMemberByArea').fancybox({
		openEffect  : 'fade',
		closeEffect : 'fade',
		maxWidth	: 900,
		maxHeight	: 600,
		minWidth	: 900,
		minHeight	: 600,
		fitToView	: true,
		width 		: '100%',
		height		: '100%',
		padding     : 5,
		beforeClose : function() {
       		$('.content').load('/index.php/boss/memberByArea');
    }

	
});

$('.editMemberByArea').fancybox({
		openEffect  : 'fade',
		closeEffect : 'fade',
		maxWidth	: 900,
		maxHeight	: 600,
		minWidth	: 900,
		minHeight	: 600,
		fitToView	: true,
		width 		: '100%',
		height		: '100%',
		padding     : 5,
		beforeClose : function() {
       		$('.content').load('/index.php/boss/memberByArea');
    }

	
});

$('.delMemberByArea').fancybox({
		openEffect  : 'fade',
		closeEffect : 'fade',
		maxWidth	: 500,
		maxHeight	: 250,
		minWidth	: 500,
		minHeight	: 250,
		fitToView	: true,
		width 		: '100%',
		height		: '100%',
		padding     : 5,
		beforeClose : function() {
       		$('.content').load('/index.php/boss/memberByArea');
    }

	
});
<!-------------------------------------------   จัดการผู้ใช้งาน  END --------------------------------------------------------------!>

$('.printMemberByArea').fancybox({
		openEffect  : 'fade',
		closeEffect : 'fade',
		maxWidth	: 1000,
		maxHeight	: 530,
		minWidth	: 1000,
		minHeight	: 530,
		fitToView	: true,
		width 		: '100%',
		height		: '100%',
		padding     : 5	
});



$('.popupPrint').fancybox({
		openEffect  	: 'fade',
		closeEffect 	: 'fade',
				maxheight : 600,
				maxwidth :	700,
				scrolling : 'on',

				type				: 'iframe'
				
				
	
});
$('.viewstatisticBehavior').fancybox({
		openEffect  	: 'fade',
		closeEffect 	: 'fade',
				maxheight : 650,
				maxwidth :	700,
				scrolling : 'on',

				type				: 'iframe'
				
				
	
});

$('.viewstatisticPolo').fancybox({
		openEffect  	: 'fade',
		closeEffect 	: 'fade',
				maxheight : 600,
				width :	'100%',
				scrolling : 'on',

				type				: 'iframe'
				
				
	
});
$('.popupPrintBehavior').fancybox({
	  	   openEffect	: 'fade',
    	        closeEffect	: 'fade',
				maxheight : '600',
				width :	'95%',
				scrolling : 'on',

				type				: 'iframe'
				
	
});

	 $('.policingPhoto').fancybox({
		openEffect  	: 'fade',
		closeEffect 	: 'fade',
				height : 600,
				width :	900,
				type				: 'iframe'
				,
					afterClose : function() {
					$('.content').load($('#linkPopupclick').val());
					}
				
				
	
});
$('.editProfile').fancybox({
	  	 openEffect  : 'fade',
		closeEffect : 'fade',
		maxWidth	: 900,
		maxHeight	: 600,
		minWidth	: 900,
		minHeight	: 600,
		fitToView	: true,
		width 		: '100%',
		height		: '100%',
		padding     : 5,
		type				: 'iframe',
					beforeClose : function() {
					
       		window.location='/index.php/boss';

    }
	
});
$('.chooseNewPassword').fancybox({
	    openEffect  : 'fade',
		closeEffect : 'fade',
		maxWidth	: 500,
		maxHeight	: 230,
		minWidth	: 500,
		minHeight	: 230,
		fitToView	: true,
		width 		: '100%',
		height		: '100%',
		padding     : 5,
		type				: 'iframe',
					afterClose : function() {
					
       		window.location='/index.php/boss';

    }
	
});
$('.fancyboxMagMemberAll').fancybox({
	  	               openEffect	: 'fade',
    	               closeEffect	: 'fade',
				height :	580,
				width :	'80%',
				

				

				type				: 'iframe',
					afterClose : function() {
					
       		$('.content').load('/index.php/boss/memberAll');

    }
	
});
$('.deleteMemberAll').fancybox({
	  	               openEffect	: 'fade',
    	               closeEffect	: 'fade',
					  			height :	150,
				width :	300,
				scrolling : 'no',

				type				: 'iframe',
				afterClose : function() {
					
       		$('.content').load("/index.php/boss/memberAll");

    }
});
  $('.fancyboxdistanceDataList').fancybox({
	  	               openEffect	: 'fade',
    	               closeEffect	: 'fade',
	  			height :	150,
				width :	250,
				

				

				type				: 'iframe',
				afterClose : function() {
					
       		$('.content').load("/index.php/boss/distanceDataList");

    }
	
});
  $('.behaviorTypeEdit').fancybox({
	  	               openEffect	: 'fade',
    	               closeEffect	: 'fade',
	  			height :	200,
				width :	500,
				

				
				autoSize: false,
				type				: 'iframe',
				afterClose : function() {
					
       		$('.content').load("/index.php/boss/behaviorMagType");

    }
	
});
  $('.behaviorTypeDelete').fancybox({
	  	               openEffect	: 'fade',
    	               closeEffect	: 'fade',
	  			height :	200,
				width :	550,
				

				

				type				: 'iframe',
				afterClose : function() {
					
       		$('.content').load("/index.php/boss/behaviorMagType");

    }
	
});
  $('.fancyboxDeleteMagAll').fancybox({
	  	               openEffect	: 'fade',
    	               closeEffect	: 'fade',
	  			height :	'350',
				width :	'300',
				

				
				
				type				: 'iframe',
				afterClose : function() {
					
       		$('.content').load("/index.php/boss/behaviorMag");

    }
	
});

  $('.fancyboxAuto').fancybox({
	  	               openEffect	: 'fade',
    	               closeEffect	: 'fade',
				autoSize : true,
				
				

				type				: 'iframe'
				
	
});