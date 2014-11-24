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
				height :	550,
				width :	'80%',
				fitToView	: false,
				scrolling : 'auto',
				autoSize : false,
				type				: 'iframe',
				overlay : {
            				css : {
               				 'background' : 'rgba(58, 42, 45, 0.95)',
           				 }
				}
	
});
  $('.AddMember').fancybox({
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
					
       		$('.content').load('/index.php/boss/memberAll');

    }
	
});

	 $('.policingPhoto').fancybox({
				height : 550,
				width :	900,
				fitToView	: false,
				scrolling : 'on',
				autoSize : false,
				type				: 'iframe',
				overlay : {
            				css : {
               				 'background' : 'rgba(58, 42, 45, 0.95)',
           				 }
				}
				,
					afterClose : function() {
						
					}
				
				
	
});
$('.fancyboxMagChildent').fancybox({
				height :	580,
				width :	'80%',
				fitToView	: false,
				scrolling : 'auto',
				autoSize : false,
				type				: 'iframe',
				afterClose : function() {
					
       		$('.content').load('/index.php/boss/childentInArea');

    },
				overlay : {
            				css : {
               				 'background' : 'rgba(58, 42, 45, 0.95)'
           				 }
				}
	
	
});
$('.fancyboxMagChildentPolincy').fancybox({
				height :	580,
				width :	'80%',
				fitToView	: false,
				scrolling : 'auto',
				autoSize : false,
				type				: 'iframe',
				afterClose : function() {
					
       		$('.content').load('/index.php/boss/polince');

    },
				overlay : {
            				css : {
               				 'background' : 'rgba(58, 42, 45, 0.95)'
           				 }
				}
	
	
});

$('.addBehavior').fancybox({
				height :	320,
				width :	'80%',
				fitToView	: false,
				scrolling : 'auto',
				autoSize : false,
				type				: 'iframe',
				afterClose : function() {
					
       		$('.content').load('/index.php/boss/behaviorMag');

    },
				overlay : {
            				css : {
               				 'background' : 'rgba(58, 42, 45, 0.95)'
           				 },showEarly : false
				}
	
	
});
$('.editBehavior').fancybox({
			height :	320,
				width :	'80%',
				fitToView	: false,
				scrolling : 'auto',
				autoSize : false,
				type				: 'iframe',
				afterClose : function() {
					
       		$('.content').load('/index.php/boss/behaviorMag');

    },
				overlay : {
            				css : {
               				 'background' : 'rgba(58, 42, 45, 0.95)'
           				 },showEarly : false
				}
	
	
});
$('.fancyboxMagChildentAll').fancybox({
				height :	550,
				width :	'80%',
				fitToView	: false,
				scrolling : 'auto',
				autoSize : false,
				type				: 'iframe',
				afterClose : function() {
					
       		$('.content').load('/index.php/boss/childentAll');

    },
				overlay : {
            				css : {
               				 'background' : 'rgba(58, 42, 45, 0.95)'
           				 },showEarly : false
				}
	
});
$('.editProfile').fancybox({
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
				height :	300,
				width :	'50%',
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
$('.fancyboxMagMemberAll').fancybox({
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
					
       		$('.content').load('/index.php/boss/memberAll');

    }
	
});
$('.deleteMemberAll').fancybox({
					  			height :	150,
				width :	300,
				scrolling : 'no',
				autoSize : false,
				type				: 'iframe',
				afterClose : function() {
					
       		$('.content').load("/index.php/boss/memberAll");

    },
				overlay : {
            				css : {
               				 'background' : 'rgba(58, 42, 45, 0.95)'
           				 },showEarly : false
				}
});
  $('.fancyboxMini').fancybox({
	  			height :	230,
				width :	400,
				fitToView	: false,
				scrolling : 'auto',
				autoSize : false,
				type				: 'iframe',
				afterClose : function() {
					
       		$('.content').load($('#linkPopupclick').val());

    },
				overlay : {
            				css : {
               				 'background' : 'rgba(58, 42, 45, 0.95)'
           				 },showEarly : false
				}
	
});
  $('.fancyboxMiniBehaviorType').fancybox({
	  			height :	200,
				width :	500,
				fitToView	: false,
				scrolling : 'auto',
				autoSize : false,
				type				: 'iframe',
				afterClose : function() {
					
       		$('.content').load($('#linkPopupclick').val());

    },
				overlay : {
            				css : {
               				 'background' : 'rgba(58, 42, 45, 0.95)'
           				 },showEarly : false
				}
	
});
  $('.fancyboxDeleteBehavior').fancybox({
	  			height :	150,
				width :	350,
				fitToView	: false,
				scrolling : 'auto',
				autoSize : false,
				type				: 'iframe',
				afterClose : function() {
					
       		$('.content').load("/index.php/boss/behaviorMag");

    },
				overlay : {
            				css : {
               				 'background' : 'rgba(58, 42, 45, 0.95)'
           				 },showEarly : false
				}
	
});
  $('.fancyboxdistanceDataList').fancybox({
	  			height :	150,
				width :	250,
				fitToView	: false,
				scrolling : 'auto',
				autoSize : false,
				type				: 'iframe',
				afterClose : function() {
					
       		$('.content').load("/index.php/boss/distanceDataList");

    },
				overlay : {
            				css : {
               				 'background' : 'rgba(58, 42, 45, 0.95)'
           				 },showEarly : false
				}
	
});
  $('.behaviorTypeEdit').fancybox({
	  			height :	200,
				width :	500,
				fitToView	: false,
				scrolling : 'auto',
				autoSize: false,
				type				: 'iframe',
				afterClose : function() {
					
       		$('.content').load("/index.php/boss/behaviorMagType");

    },
				overlay : {
            				css : {
               				 'background' : 'rgba(58, 42, 45, 0.95)'
           				 },showEarly : false
				}
	
});
  $('.behaviorTypeDelete').fancybox({
	  			height :	200,
				width :	550,
				fitToView	: false,
				scrolling : 'auto',
				autoSize : false,
				type				: 'iframe',
				afterClose : function() {
					
       		$('.content').load("/index.php/boss/behaviorMagType");

    },
				overlay : {
            				css : {
               				 'background' : 'rgba(58, 42, 45, 0.95)'
           				 },showEarly : false
				}
	
});
  $('.fancyboxDeleteMagAll').fancybox({
	  			height :	'350',
				width :	'300',
				fitToView	: false,
				scrolling : 'auto',
				
				type				: 'iframe',
				afterClose : function() {
					
       		$('.content').load("/index.php/boss/behaviorMag");

    },
				overlay : {
            				css : {
               				 'background' : 'rgba(58, 42, 45, 0.95)'
           				 },showEarly : false
				}
	
});

  $('.deletechildentAll').fancybox({
	  			height :	150,
				width :	300,
				scrolling : 'no',
				autoSize : false,
				type				: 'iframe',
				afterClose : function() {
					
       		$('.content').load("/index.php/boss/childentAll");

    },
				overlay : {
            				css : {
               				 'background' : 'rgba(58, 42, 45, 0.95)'
           				 },showEarly : false
				}
	
});

  $('.deletechildentInArea').fancybox({
	  			height :	150,
				width :	300,
				scrolling : 'no',
				autoSize : false,
				type				: 'iframe',
				afterClose : function() {
					
       		$('.content').load("/index.php/boss/childentInArea");

    },
				overlay : {
            				css : {
               				 'background' : 'rgba(58, 42, 45, 0.95)'
           				 }
				}
	
});

  $('.fancyboxAuto').fancybox({
				autoSize : true,
				scrolling : 'auto',
				fitToView	: false,
				type				: 'iframe',
				overlay : {
            				css : {
               				 'background' : 'rgba(58, 42, 45, 0.95)'
           				 },showEarly : false
				}
				
	
});