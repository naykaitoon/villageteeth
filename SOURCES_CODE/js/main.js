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
    $(this).childent("ul").slideUp("fast");
  } else {
    $(this).addClass("open");
    $(this).childent("ul").slideDown("fast");
  }
});
         
 });
