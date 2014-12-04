$(document).ready(function(){
			var whi = $(document).width();
			$('html body').css('max-width',whi);
			$('html body').css('min-width',whi);
                $('.content').fadeOut().hide().load( '/index.php/boss/childentInArea' ).fadeIn();
				 $(".submenu , .submenusub").click(function(event) {
	 				 event.preventDefault();
                var href = $(this).attr('href');

                $('.content').load( href );

            });

			$('.mainMenu').click(function(event) {
				 event.preventDefault();
				 });
$("#dropdown").on("click", function(e){
  e.preventDefault();
  
  if($(this).hasClass("open")) {
    $(this).removeClass("open");
    $(this).children("ul").slideUp("fast");
  } else {
    $(this).addClass("open");
    $(this).children("ul").slideDown("fast");
  }
});
         
 });
 
  $('.fancybox').fancybox({
	  	               openEffect	: 'elastic',
    	               closeEffect	: 'elastic',
	  
				height :	550,
				width :	'80%',
				fitToView	: false,
				scrolling : 'auto',
				autoSize : false,
				type				: 'iframe'
	
});
  $('.AddMember').fancybox({
	  	               openEffect	: 'elastic',
    	               closeEffect	: 'elastic',
				height :	580,
				width :	'80%',
				fitToView	: false,
				scrolling : 'auto',
				autoSize : false,
				type				: 'iframe',
					afterClose : function() {
					
       		$('.content').load('/index.php/boss/memberAll');

    }
	
});
$('.popupPrint').fancybox({
	  	        openEffect	: 'elastic',
    	        closeEffect	: 'elastic',
				height : 550,
				width :	700,
				scrolling : 'auto',
				autoSize : false,
				fitToView	: false,
				type				: 'iframe'
				
				
	
});

	 $('.policingPhoto').fancybox({
	  	        openEffect	: 'elastic',
    	        closeEffect	: 'elastic',
				height : 600,
				width :	900,
				scrolling : 'auto',
				autoSize : false,
				fitToView	: false,
				type				: 'iframe'
				,
					afterClose : function() {
					$('.content').load($('#linkPopupclick').val());
					}
				
				
	
});
$('.fancyboxMagChildent').fancybox({
	  	               openEffect	: 'elastic',
    	               closeEffect	: 'elastic',
				height :	580,
				width :	'80%',
				fitToView	: false,
				scrolling : 'auto',
				autoSize : false,
				type				: 'iframe',
				afterClose : function() {
					
       		$('.content').load('/index.php/boss/childentInArea');

    }
	
});
$('.fancyboxMagChildentPolincy').fancybox({
	  	               openEffect	: 'elastic',
    	               closeEffect	: 'elastic',
				height :	580,
				width :	'80%',
				fitToView	: false,
				scrolling : 'auto',
				autoSize : false,
				type				: 'iframe',
				afterClose : function() {
					
       		$('.content').load('/index.php/boss/polince');

    }
	
	
});

$('.addBehavior').fancybox({
	  	               openEffect	: 'elastic',
    	               closeEffect	: 'elastic',
				height :	320,
				width :	'80%',
				fitToView	: false,
				scrolling : 'auto',
				autoSize : false,
				type				: 'iframe',
				afterClose : function() {
					
       		$('.content').load('/index.php/boss/behaviorMag');

    }
	
	
});
$('.editBehavior').fancybox({
	  	               openEffect	: 'elastic',
    	               closeEffect	: 'elastic',
			height :	320,
				width :	'80%',
				fitToView	: false,
				scrolling : 'auto',
				autoSize : false,
				type				: 'iframe',
				afterClose : function() {
					
       		$('.content').load('/index.php/boss/behaviorMag');

    }
	
});
$('.fancyboxMagChildentAll').fancybox({
	  	               openEffect	: 'elastic',
    	               closeEffect	: 'elastic',
				height :	550,
				width :	'80%',
				fitToView	: false,
				scrolling : 'auto',
				autoSize : false,
				type				: 'iframe',
				afterClose : function() {
					
       		$('.content').load('/index.php/boss/childentAll');

    }
	
});
$('.editProfile').fancybox({
	  	               openEffect	: 'elastic',
    	               closeEffect	: 'elastic',
				height :	580,
				width :	'80%',
				fitToView	: false,
				scrolling : 'auto',
				autoSize : false,
				type				: 'iframe',
				overlay : {
            				css : {
               				 'background' : 'rgba(58, 42, 45, 0.95)',
           				 }
				},
					afterClose : function() {
					
       		window.location='/index.php/boss';

    }
	
});
$('.chooseNewPassword').fancybox({
	  	               openEffect	: 'elastic',
    	               closeEffect	: 'elastic',
				height :	300,
				width :	'50%',
				fitToView	: false,
				scrolling : 'auto',
				autoSize : false,
				type				: 'iframe',
					afterClose : function() {
					
       		window.location='/index.php/boss';

    }
	
});
$('.fancyboxMagMemberAll').fancybox({
	  	               openEffect	: 'elastic',
    	               closeEffect	: 'elastic',
				height :	580,
				width :	'80%',
				fitToView	: false,
				scrolling : 'auto',
				autoSize : false,
				type				: 'iframe',
					afterClose : function() {
					
       		$('.content').load('/index.php/boss/memberAll');

    }
	
});
$('.deleteMemberAll').fancybox({
	  	               openEffect	: 'elastic',
    	               closeEffect	: 'elastic',
					  			height :	150,
				width :	300,
				scrolling : 'no',
				autoSize : false,
				type				: 'iframe',
				afterClose : function() {
					
       		$('.content').load("/index.php/boss/memberAll");

    }
});
  $('.fancyboxMini').fancybox({
	  	               openEffect	: 'elastic',
    	               closeEffect	: 'elastic',
	  			height :	230,
				width :	400,
				fitToView	: false,
				scrolling : 'auto',
				autoSize : false,
				type				: 'iframe',
				afterClose : function() {
					
       		$('.content').load($('#linkPopupclick').val());

    }
	
});
  $('.fancyboxMiniBehaviorType').fancybox({
	  	               openEffect	: 'elastic',
    	               closeEffect	: 'elastic',
	  			height :	200,
				width :	500,
				fitToView	: false,
				scrolling : 'auto',
				autoSize : false,
				type				: 'iframe',
				afterClose : function() {
					
       		$('.content').load($('#linkPopupclick').val());

    }
	
});
  $('.fancyboxDeleteBehavior').fancybox({
	  	               openEffect	: 'elastic',
    	               closeEffect	: 'elastic',
	  			height :	150,
				width :	350,
				fitToView	: false,
				scrolling : 'auto',
				autoSize : false,
				type				: 'iframe',
				afterClose : function() {
					
       		$('.content').load("/index.php/boss/behaviorMag");

    }
	
});
  $('.fancyboxdistanceDataList').fancybox({
	  	               openEffect	: 'elastic',
    	               closeEffect	: 'elastic',
	  			height :	150,
				width :	250,
				fitToView	: false,
				scrolling : 'auto',
				autoSize : false,
				type				: 'iframe',
				afterClose : function() {
					
       		$('.content').load("/index.php/boss/distanceDataList");

    }
	
});
  $('.behaviorTypeEdit').fancybox({
	  	               openEffect	: 'elastic',
    	               closeEffect	: 'elastic',
	  			height :	200,
				width :	500,
				fitToView	: false,
				scrolling : 'auto',
				autoSize: false,
				type				: 'iframe',
				afterClose : function() {
					
       		$('.content').load("/index.php/boss/behaviorMagType");

    }
	
});
  $('.behaviorTypeDelete').fancybox({
	  	               openEffect	: 'elastic',
    	               closeEffect	: 'elastic',
	  			height :	200,
				width :	550,
				fitToView	: false,
				scrolling : 'auto',
				autoSize : false,
				type				: 'iframe',
				afterClose : function() {
					
       		$('.content').load("/index.php/boss/behaviorMagType");

    }
	
});
  $('.fancyboxDeleteMagAll').fancybox({
	  	               openEffect	: 'elastic',
    	               closeEffect	: 'elastic',
	  			height :	'350',
				width :	'300',
				fitToView	: false,
				scrolling : 'auto',
				
				type				: 'iframe',
				afterClose : function() {
					
       		$('.content').load("/index.php/boss/behaviorMag");

    }
	
});

  $('.deletechildentAll').fancybox({
	  	               openEffect	: 'elastic',
    	               closeEffect	: 'elastic',
	  			height :	150,
				width :	300,
				scrolling : 'no',
				autoSize : false,
				type				: 'iframe',
				afterClose : function() {
					
       		$('.content').load("/index.php/boss/childentAll");

    }
	
});

  $('.deletechildentInArea').fancybox({
	  	               openEffect	: 'elastic',
    	               closeEffect	: 'elastic',
	  			height :	150,
				width :	300,
				scrolling : 'no',
				autoSize : false,
				type				: 'iframe',
				afterClose : function() {
					
       		$('.content').load("/index.php/boss/childentInArea");

    }
	
});

  $('.fancyboxAuto').fancybox({
	  	               openEffect	: 'elastic',
    	               closeEffect	: 'elastic',
				autoSize : true,
				scrolling : 'auto',
				fitToView	: false,
				type				: 'iframe'
				
	
});