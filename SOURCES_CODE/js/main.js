$(document).ready(function(){
                $('.content').fadeOut().hide().load( '/index.php/boss/chillentInArea' ).fadeIn();
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
			height :	'500',
				width :	'80%',
				autoSize : false,
				scrolling : 'auto',
				arrows : false,
				type				: 'iframe',
				afterClose : function() {
					
       		$('.content').load('/index.php/boss/chillentInArea');

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
					
       		$('.content').load('/index.php/boss/chillentAll');

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
	  			height :	'200',
				width :	'400',
				autoSize : false,
				scrolling : 'auto',
				arrows : false,
				type				: 'iframe',
				afterClose : function() {
					
       		$('.content').load($('#linkPopupclick').val());

    }
	
});

  $('.fancyboxAuto').fancybox({
				autoSize : true,
				scrolling : 'auto',
				arrows : false,
				type				: 'iframe'
	
});