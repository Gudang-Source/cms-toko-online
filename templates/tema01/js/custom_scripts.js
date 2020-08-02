(function($){
	
	$(document).ready(function(){
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////						   
								
		// -------------------------------------------------------------------------------------------------------
		// Dropdown Menu
		// -------------------------------------------------------------------------------------------------------

		if ( ! ( $.browser.msie && ($.browser.version == 6 || $.browser.version == 7) ) ){
			$("ul#topnav li:has(ul), ul#topnav2 li:has(ul), ul.menu li:has(ul) ").addClass("dropdown");
		}
		
		
		$(".main_menu li").hover(function () {
												 
			$('.secondary', this).fadeIn(500);
		}, function () {
			
			$('.secondary', this);
		});
		

		$('#search input[name=\'filter_name\']').bind('keydown', function(e) {
		if (e.keyCode == 13) {
			url = $('base').attr('href') + 'index.php?route=product/search';
			 
			var filter_name = $('input[name=\'filter_name\']').attr('value');
			
			if (filter_name) {
				url += '&filter_name=' + encodeURIComponent(filter_name);
			}
			
			location = url;
		}
	});
		
		
		// -------------------------------------------------------------------------------------------------------
		// Tipsy - tooltips jQuery plugin
		// -------------------------------------------------------------------------------------------------------
		
		$('a.wish_small, a.compe_small, a.compare_prod, a.wish_prod, a#toggle_switch, .team_social a, a.go_to_page, .count_comments a').tipsy({gravity: 's', fade: true, title: function() { return this.getAttribute('original-title').toUpperCase(); }});
		$('#currency a, #language a').tipsy({gravity: 'e', fade: true, title: function() { return this.getAttribute('original-title').toUpperCase(); }});
		
		// -------------------------------------------------------------------------------------------------------
		// SLIDING ELEMENTS
		// -------------------------------------------------------------------------------------------------------

    	$("#toggle_switch").toggle(function(){
        $(this).addClass("swap");
        $('#togglerone').slideToggle("slow");
		return false;
    	}, function () {
        
        $('#togglerone').slideToggle("slow");
		$(this).removeClass("swap");
		return false;
		});

		
		// -------------------------------------------------------------------------------------------------------
		// FADING ELEMENTS
		// -------------------------------------------------------------------------------------------------------
		
		$(".banner a img, .cat_hold a img, .fading").hover(function() {
		$(this).stop()
		.animate({opacity: 0.6}, "medium")

		}, function() {
		$(this).stop()
		.animate({opacity: 1}, "medium")
		});
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	});
	
})(window.jQuery);	

// non jQuery scripts below





	
	
// Scroll Top
$(document).ready(function(){

	// hide #back-top first
	$("#back-top").hide();
	
	// fade in #back-top
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				$('#back-top').fadeIn();
			} else {
				$('#back-top').fadeOut();
			}
		});

		// scroll body to 0px on click
		$('#back-top a').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});

});







