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
  $('.fancyboxMini').fancybox({
	  			height :	'450',
				width :	'400',
				autoSize : true,
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