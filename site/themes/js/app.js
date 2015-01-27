var current_page = default_page = 'bussiness';

$(document).ready(function(){
	
	var current_page = getHash() || default_page;
	$('#nav-item-' + current_page).addClass('active');
	var docHeight = $(document).height();
	$('.page-section').css('min-height', docHeight + 'px');
	
	
	$('.nav li.nav-item').click(function(){
		var prev_page = current_page;
		var hash = $(this).find('a').attr('href').substring(1);
		$('#nav-item-' + current_page).removeClass('active');
		//$('#' + current_page + '-content').fadeOut();
		current_page = hash;
		$('#nav-item-' + current_page).addClass('active');
		$('#' + current_page + '-content').hide().fadeIn();
		
		var page_diff = Math.abs(prev_page - current_page);
		
		var time_diff = 800*0;
		
		//$('html body').animate({ scrollTop: 580 }, 800);
		$('html body').animate({ scrollTop: $('#' + current_page + '-content').offset().top - 50 }, time_diff);
	});
	//alert($('.nav li.nav-item.active').attr('id'));
	$('.nav li.nav-item.active').trigger('click');
	
});