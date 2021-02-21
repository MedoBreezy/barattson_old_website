$(function() {
	$('.owl-carousel').owlCarousel({
		loop:true,
		margin:0,
		nav:false,
		items:1,
		animateOut: 'fadeOut',
		autoplay:true,
		autoplayTimeout:5000,
		autoplayHoverPause:true
	});
	
	$('.events-click-js').on('click', function() {
		let url = $(this).find('a').attr('href');
		
		window.location.href = url;
	});
	
	$('#branchs').on('change', function() {
		let branch = this.value;
		
		if (branch == 1) {
			$('#main_office').show();
			$('#nizami_branch').hide();
		}
		
		if (branch == 2) {
			$('#main_office').hide();
			$('#nizami_branch').show();
		}
	});

	$('.social_messengers .main_icon').click(function(){
		$('.social_messengers .content ul').slideToggle();
		if ($(this).hasClass('active')) {
			$(this).removeClass('active');
			$(this).children('img.closeMessengers').hide();
			setTimeout(function(){
				$('.social_messengers .main_icon').children('img.messageIcon').fadeIn();
			},100)
			$('.social_messengers .content ul').removeClass('showSocialMessengers');
			$('.social_messengers .content ul').addClass('hideSocialMessengers');
		} else {
			$(this).addClass('active');
			$(this).children('img.messageIcon').hide();
			setTimeout(function(){
				$('.social_messengers .main_icon').children('img.closeMessengers').fadeIn();
			},100)
			$('.social_messengers .content ul').removeClass('hideSocialMessengers');
			$('.social_messengers .content ul').addClass('showSocialMessengers');
		}
	})


	
		

});