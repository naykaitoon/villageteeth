$(document).ready(function(){
                $('.content').fadeOut().hide().load( '/index.php/boss/childentInArea' ).fadeIn();
				 $(".submenu , .submenusub").click(function(event) {
	 				 event.preventDefault();
                var href = $(this).attr('href');

                $('.content').load( href );

            });

			$('.mainMenu').click(function(event) {
				 event.preventDefault();
				 });
         
 });
  $('.fancybox').fancybox({
				height :	'500',
				width :	'80%',
				autoSize : false,
				scrolling : 'auto',
				arrows : false,
				type				: 'iframe'
	
});
$('.fancyboxMagChildent').fancybox({
			height :	'650',
				width :	'80%',
				autoSize : true,
				scrolling : 'auto',
				arrows : false,
				type				: 'iframe',
				afterClose : function() {
					
       		$('.content').load('/index.php/boss/childentInArea');

    }
	
	
});

$('.addBehavior').fancybox({
			height :	'500',
				width :	'80%',
				autoSize : false,
				scrolling : 'auto',
				arrows : false,
				type				: 'iframe',
				afterClose : function() {
					
       		$('.content').load('/index.php/boss/behaviorMag');

    }
	
	
});
$('.editBehavior').fancybox({
			height :	'500',
				width :	'80%',
				autoSize : false,
				scrolling : 'auto',
				arrows : false,
				type				: 'iframe',
				afterClose : function() {
					
       		$('.content').load('/index.php/boss/behaviorMag');

    }
	
	
});
$('.fancyboxMagChildentAll').fancybox({
			height :	'500',
				width :	'80%',
				autoSize : false,
				scrolling : 'auto',
				arrows : false,
				type				: 'iframe',
				afterClose : function() {
					
       		$('.content').load('/index.php/boss/childentAll');

    }
	
});
  $('.fancyboxMini').fancybox({
	  			height :	'300',
				width :	'400',
				autoSize : false,
				scrolling : 'auto',
				arrows : false,
				type				: 'iframe',
				afterClose : function() {
					
       		$('.content').load($('#linkPopupclick').val());

    }
	
});
  $('.fancyboxDelete').fancybox({
	  			height :	'250',
				width :	'250',
				autoSize : false,
				scrolling : 'auto',
				arrows : false,
				type				: 'iframe',
				afterClose : function() {
					
       		$('.content').load("/index.php/boss/behaviorMag");

    }
	
});
  $('.fancyboxDeleteMagAll').fancybox({
	  			height :	'250',
				width :	'250',
				autoSize : false,
				scrolling : 'auto',
				arrows : false,
				type				: 'iframe',
				afterClose : function() {
					
       		$('.content').load("/index.php/boss/behaviorMag");

    }
	
});

  $('.deletechildentAll').fancybox({
	  			height :	'250',
				width :	'300',
				autoSize : false,
				scrolling : 'no',
				arrows : false,
				type				: 'iframe',
				afterClose : function() {
					
       		$('.content').load("/index.php/boss/childentAll");

    }
	
});

  $('.deletechildentInArea').fancybox({
	  			height :	'250',
				width :	'300',
				autoSize : false,
				scrolling : 'no',
				arrows : false,
				type				: 'iframe',
				afterClose : function() {
					
       		$('.content').load("/index.php/boss/childentInArea");

    }
	
});

  $('.fancyboxAuto').fancybox({
				autoSize : true,
				scrolling : 'auto',
				arrows : false,
				type				: 'iframe'
	
});