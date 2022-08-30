(function($) {
	$.fn.tabsScroll = function(){
		var _ = $(this);
		function scrollItem(){
			if(_.length > 0){
				var active = _.find('li.active');
				var left = active.position().left - 50;
				_.animate({scrollLeft: left},200);		
			}
		}
		$(function(){
			scrollItem();
		});
		_.find('a').click(function(){
			scrollItem();
		});
	}
})(jQuery);
$(document).ready(function(){
	// MEDIA
	function mediaLoad(){
		if($(window).width() < 767){

		}
	}
	mediaLoad();
	function mediaResize(){
		if($(window).width() < 767){
			
		}else{

		}
	}
	$(window).on('resize',function(){
		mediaResize();
	});

	$('.btnNav').click(function(e){
		e.preventDefault();
		if(!$(this).hasClass('active')){
			$(this).addClass('active');
			$('body').addClass('openMenu');
			$('.maska').fadeIn();
		}else{
			$(this).removeClass('active');
			$('body').removeClass('openMenu');
			$('.maska').fadeOut();
		}
	});

	$('.maska').click(function(){
		$('.btnNav').removeClass('active');
		$('body').removeClass('openMenu');
		$(this).fadeOut();
	});

	$('#citizens-passport_number').keyup(function(){
 		var crills = ["А", "Б", "С", "Д", "Э", "Ф", "Г", "Е", "И", "Ж", "К", "Л", "М", "Н", "О", "П", "Қ", "Р", "С", "Т", "У", "В", "Ш", "Х", "Й", "З", "Ғ",'Ы','Щ','Ц','Я','Ь','Ю'];
		var seria = $(this).val();

		if(crills.includes(seria.substr(0,1))){
			// alert('Faqatgina lotin harflaridan kiritish mumkin!');
			$(this).val('');
			return false;	
    	}	
	

	});

	   
	// alert(123);

	// function scrollItem(){
	// 	var _ = $('.pTabNav');
	// 	if(_.length > 0){
	// 		var active = _.find('li.active');
	// 		var left = active.position().left - 50;
	// 		_.animate({scrollLeft: left},200);		
	// 	}
	// }
	// $(function(){
	// 	scrollItem();
	// });
	// $('.pTabNav ul li a').click(function(){
	// 	scrollItem();
	// });
	
});