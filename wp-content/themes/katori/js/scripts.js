
//Page loader
jQuery(document).ready(function($) {
	$("#page").show();
});

//Menu dropdown animation
jQuery(function($) {
	$('.menu-toggle').click(function() { 
		$('.menu').fadeToggle();
	});
	$('.menu-item-has-children').click(function() { 
		$(this).find('ul').fadeToggle();
	});
	$('.menu-item-has-children ul').click(function() { 
		$(this).find('ul').fadeToggle();
	});	
});

//Fit Vids
jQuery(function($) {
  
  $(document).ready(function(){
    $("body").fitVids();
  });
  
});

jQuery(function($) {
		$(document).ready(function() {

			var $grid = $('.home.page #main');

			imagesLoaded( function() {
				$grid.shuffle({
					itemSelector: '.home.page .hentry'
				});
			});

			$('#filter a').click(function (e) {
				e.preventDefault();

				// set active class
				$('#filter a').removeClass('active');
				$(this).addClass('active');

				// get group name from clicked item
				var groupName = $(this).attr('data-group');

				$grid.shuffle('shuffle', groupName );
			});

		});
});

//Sets the header overlay height and the widget area min-height
jQuery(function($) {
	var height = $(window).height();
	var header = $('.site-header').height(); 
	$('.overlay').css('min-height', height);
	$('.slides-wrapper').css('min-height', height);
	$('.overlay').css('height', header);
	$('.slides-wrapper').css('height', header);
	$('.widget-area').css('min-height', height);
	$(window).resize(function() {
		var height = $(window).height();
		var header = $('.site-header').height();
		$('.overlay').css('min-height', height);
		$('.slides-wrapper').css('min-height', height);
		$('.overlay').css('height', header);
		$('.slides-wrapper').css('height', header);
		$('.widget-area').css('min-height', height);
	});	
});



//Toggle sidebar
jQuery(function($) {
	$('.sidebar-toggle').click(function()
	{
		$('.widget-area').fadeToggle('slow');
		$('.content-area, .site-footer').toggleClass('hide');
		$('.site-content.container').toggleClass('fullwidth');
		$('.sidebar-toggle').find('i').toggleClass('fa-toggle-off fa-toggle-on');
	});
});
