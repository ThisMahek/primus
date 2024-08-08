
(function ($) {
	"use strict";
	var Resume = {
		initialised: false,
		version: 1.0,
		mobile: false,
		init: function () {
			if (!this.initialised) {
				this.initialised = true;
			}
			else {
				return;
			}
			/*-------------- Resume Functions Calling ---------------------------------------------------
			------------------------------------------------------------------------------------------------*/
			
			
			this.tyipng();
			this.bottom_top();
			this.loader();	
			this.toggle_menu();
			this.copy_right();
			this.port_tab();
			this.counter();
		},

		/*-------------- Resume Functions Calling ---------------------------------------------------
		--------------------------------------------------------------------------------------------------*/

		// Typing Effect
		tyipng: function () {
			var currentUrl = window.location.href;
			var urlParts = currentUrl.split('/');
            var lastPart = urlParts[urlParts.length - 1];
			var username = lastPart.replace(/[\d_]+$/, '');
			
			 window.ityped.init(document.querySelector('.cv_profile_name'),{
                strings: [user_name_website],
                loop: false,
                typeSpeed:  300,
                backSpeed:  500,
                showCursor: false,
            })
		},
		
		// Bottom To Top
		bottom_top: function () {
			if ($('#button').length > 0) {
				var btn = $('#button');
				var fixed = $('.vld_header_wrapper')
				$(window).scroll(function () {
					if ($(window).scrollTop() > 50) {
						btn.addClass('show');
						fixed.addClass('fixed');
					} else {
						btn.removeClass('show');
						fixed.removeClass('fixed');
					}
				});
				btn.on('click', function (e) {
					e.preventDefault();
					$('html, body').animate({ scrollTop: 0 }, '50');
				});
			}
		},
		
		// loader			
		loader: function () {
			jQuery(window).on('load', function () {
				$(".loader").fadeOut();
				$(".spinner").delay(500).fadeOut("slow");
			});
		},
		
		// toggle menu
		toggle_menu: function(){
			$('.cv_toggle_btn, .cv_menu_close').on('click', function () {
				$('body').toggleClass('menu-open');
			})
		},

		copy_right: function(){
			document.getElementById("copyYear").innerHTML = new Date().getFullYear();
		},

		port_tab: function(){
			$('.cv_port_tab li a').on('click', function(){
        		var target = $(this).attr('data-rel');
      			$('.cv_port_tab li a').removeClass('active');
        		$(this).addClass('active');
        		$("#"+target).fadeIn('slow').siblings(".cv_tab_pane").hide();
        		return false;
    		});
		},

		counter: function(){
			$('.timer').appear(function() {
				$(this).countTo();
			});
		},

	};
        Resume.init();	
}(jQuery));

