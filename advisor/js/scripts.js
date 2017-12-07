(function () {
		"use strict";

		var autoplay;
		var autoplayTimeout;
		var loop ;
		var partner_items;

		/* ------------------------------------------------------------------------
		   LOADER
		 ------------------------------------------------------------------------  */
		jQuery(window).load(function() { // makes sure the whole site is loaded
			jQuery('#loader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
			jQuery('body').delay(350).css({'overflow':'visible'});
		});




		/* ------------------------------------------------------------------------
		   SMALL HEADER
		------------------------------------------------------------------------ */
		jQuery(window).scroll(function() {
			var scroll = jQuery(window).scrollTop();
			if (scroll >= 250) {
				jQuery("body.fixed-header").addClass("smallHeader");
				if (scroll >= 350) {
					jQuery("body.fixed-header").addClass("active");
				}
			}
			else {
				jQuery("body.fixed-header").removeClass("smallHeader active");
			}
		});





		/* ------------------------------------------------------------------------
		Smooth Scroll
		------------------------------------------------------------------------ */
		var $window = jQuery(window, '.cd-testimonials-all .cd-testimonials-all-wrapper');		//Window object

		/* ------------------------------------------------------------------------
		   ITEM COUNTER
		------------------------------------------------------------------------ */
		var itemcount= 0;

		jQuery('.pluss-item').on("click", function() {
			itemcount++;
			jQuery(this).parent().find('.total-items').val(itemcount);
		});

		jQuery('.less-item').on("click", function() {
			itemcount--;
			jQuery(this).parent().find('.total-items').val(itemcount);
		});




		/* ------------------------------------------------------------------------
		   ADD REVIEW CUSTOM SCRIPT [open/close]
		------------------------------------------------------------------------ */
		jQuery("#add-review-btn").on("click", function() {
			jQuery("#add-review-form").slideDown();
		});
		jQuery("#review-form-close").on("click", function() {
			jQuery("#add-review-form").slideUp();
		});




		/* ------------------------------------------------------------------------
		   MOBILE MENU
		------------------------------------------------------------------------ */
		// jQuery(".main-nav li a").on("click", function() {
		// 	jQuery(this).parent("li").find(".dropdown-menu").slideToggle();
		// 	jQuery(this).find("i").toggleClass("fa-caret-down fa-caret-up");
		// });
		jQuery("#review-form-close").on("click", function() {
			jQuery("#add-review-form").slideUp();
		});






		/* ------------------------------------------------------------------------
		   SMOOTH SCROLLING
		------------------------------------------------------------------------ */
		jQuery('.scroll').each( function() {
		var $this = jQuery(this),
			target = this.hash;
			jQuery(this).on("click", function(e) {
				e.preventDefault();
				if( $this.length > 0 ) {
					if($this.attr('href') == '#' ) {
					} else {
					   jQuery('html, body').animate({
							scrollTop: (jQuery(target).offset().top) - -1
						}, 1000);
					}
				}
			});
		});




		/* ------------------------------------------------------------------------
		   TESTIMONIAL MODEL
		------------------------------------------------------------------------ */
		jQuery('.cd-see-all').on('click', function(){
			jQuery('.cd-testimonials-all').addClass('is-visible');
			jQuery('body').css('overflow','hidden');
		});
		jQuery('.cd-testimonials-all .close-btn').on('click', function(){
			jQuery('.cd-testimonials-all').removeClass('is-visible');
			jQuery('body').css('overflow-y','scroll');
		});
		jQuery(document).keyup(function(event){
			//check if user has pressed 'Esc'
			if(event.which=='27'){
				jQuery('.cd-testimonials-all').removeClass('is-visible');
			}
		});


		/* SMOOTH SCROLL FOR TESTIMOVIALS WRAPPER */



		jQuery('.cd-testimonials-all-wrapper').children('ul').masonry({
			itemSelector: '.cd-testimonials-item'
		});


		/* ------------------------------------------------------------------------
		   SINGLE ITEM CAROUSEL
		------------------------------------------------------------------------ */
		autoplay = jQuery('.single-item-carousel').attr('data-autoplay');
		autoplayTimeout = jQuery('.single-item-carousel').attr('data-autoplay-timeout');

		if (autoplay == 'true') {

	    if (autoplayTimeout == 0) {
	      autoplayTimeout = 5000;
	      }

	   } else {

	     autoplayTimeout = 0;

	   }


		jQuery('.single-item-carousel').owlCarousel({

			items:1,
			nav:true,
			autoplay:autoplay,
  		autoplayTimeout:autoplayTimeout,
			loop:true,
			animateOut: 'fadeOut',
			navText:[ '', '' ]
		});


			// For Services Slider
			autoplay = jQuery('#services_slider').attr('data-autoplay');
			autoplayTimeout = jQuery('#services_slider').attr('data-autoplay-timeout');


			if (autoplay == 'true') {

		    if (autoplayTimeout == 0) {
		      autoplayTimeout = 5000;
		      }

		   } else {

		     autoplayTimeout = 0;

		   }

			jQuery("#services_slider").owlCarousel({

						autoplay:autoplay,
						autoplayTimeout:autoplayTimeout,
						loop:true,
					  pagination : false,
					  navigation : true,
					  navigationText: [
						"<i class='fa fa-angle-left'></i>",
						"<i class='fa fa-angle-right'></i>"],
	          itemsDesktop : [1199,3],
	          itemsDesktopSmall : [979,3],
						responsive:{
							0:{
								items:1
							},
							768:{
								items:1
							},
							979:{
								items:2
							},
							1199:{
								items:3
							}

						}

			});




		/* ------------------------------------------------------------------------
		   TWO ITEMS CAROUSEL
		------------------------------------------------------------------------ */
		// var autoplay =jQuery('.two-items-carousel').attr('data-autoplay');

		autoplay 				= jQuery('.two-items-carousel').attr('data-autoplay');
		autoplayTimeout = jQuery('.two-items-carousel').attr('data-autoplay-timeout');
		// partner_items   = jQuery('.two-items-carousel').attr('partner-items');


		if (autoplay == 'true') {

	    if (autoplayTimeout == 0) {
	      autoplayTimeout = 5000;
	      }

	   } else {

	     autoplayTimeout = 0;

	   }


		jQuery('.two-items-carousel').owlCarousel({
			nav:true,
			autoplay:autoplay,
			autoplayTimeout:autoplayTimeout,
			loop:true,
			navText:[ '', '' ],
			responsive:{
				0:{
					items:1
				},
				768:{
					items:1
				},
				979:{
					items:2
				},
				1199:{
					items:2
				}

			}
		});




		autoplay 				= jQuery('.partner-items-carousel').attr('data-autoplay');
		autoplayTimeout = jQuery('.partner-items-carousel').attr('data-autoplay-timeout');
		partner_items   = jQuery('.partner-items-carousel').attr('partner-items');


		if (autoplay == 'true') {

			if (autoplayTimeout == 0) {
				autoplayTimeout = 5000;
				}

		 } else {

			 autoplayTimeout = 0;

		 }


		jQuery('.partner-items-carousel').owlCarousel({
			nav:true,
			autoplay:autoplay,
			autoplayTimeout:autoplayTimeout,
			loop:true,
			navText:[ '', '' ],
			responsive:{
				0:{
					items:1
				},
				768:{
					items:1
				},
				979:{
					items:partner_items
				},
				1199:{
					items:partner_items
				}

			}
		});




		/* ------------------------------------------------------------------------
		   THREE ITEMS CAROUSEL
		------------------------------------------------------------------------ */
		jQuery('.three-items-carousel').owlCarousel({
			nav:true,
			navText:[ '', '' ],
			responsive:{
				0:{
					items:1
				},
				768:{
					items:2
				},
				979:{
					items:2
				},
				1199:{
					items:3
				}

			}

		});




		/* ------------------------------------------------------------------------
		   FANCYBOX
		------------------------------------------------------------------------ */
		jQuery('.fancybox').fancybox({
			maxWidth	: 600,
			maxHeight	: 800,
			fitToView	: false,
			width		: '100%',
			height		: '70%',
			autoSize	: false,
			autoHeight : true,
			closeClick	: false,
			openEffect	: 'none',
			closeEffect	: 'none'
		});




		/* ------------------------------------------------------------------------
		   FANCYBOX MEDIA
		------------------------------------------------------------------------ */
		jQuery('.fancybox-media').fancybox({
			openEffect  : 'none',
			closeEffect : 'none',
			helpers : {
				media : {}
			}
		});




		/* ------------------------------------------------------------------------
		   PRODUCT DETAIL
		------------------------------------------------------------------------ */
		jQuery("#product-detail-slider").responsiveSlides({
			maxwidth: 1000,
			timeout: 3E3,
			pager: true,
			speed: 700
		});




		/* ------------------------------------------------------------------------
		   VERTICAL TABS
		------------------------------------------------------------------------ */
		jQuery('.verticalTab').easyResponsiveTabs({
			type: 'vertical',
			width: 'auto',
			fit: true
		});




		/* ------------------------------------------------------------------------
		   TOGGLES ICON
		------------------------------------------------------------------------ */
		jQuery('.toggle-heading').on('click', function(){

				jQuery(this).find('i').toggleClass('fa-plus fa-minus');


		});




		/* ------------------------------------------------------------------------
		   SEARCH
		------------------------------------------------------------------------ */
		jQuery('.search-trigger').on('click', function(){
			jQuery('.search-container').fadeIn();
		});
		jQuery('.header-search-close').on('click', function(){
			jQuery('.search-container').fadeOut();
		});




		/* ------------------------------------------------------------------------
			ANIMATIONS
		------------------------------------------------------------------------ */
		jQuery('.animate-it').appear();
		jQuery(document.body).on('appear', '.animate-it', function(e, $affected) {
			var fadeDelayAttr;
			var fadeDelay;
			jQuery(this).each(function(){
				if (jQuery(this).data("delay")) {
					fadeDelayAttr = jQuery(this).data("delay")
					fadeDelay = fadeDelayAttr;
				} else {
					fadeDelay = 0;
				}
				jQuery(this).delay(fadeDelay).queue(function(){
					jQuery(this).addClass('animated').clearQueue();
				});
			})
		});




		/* ------------------------------------------------------------------------
		   ISOTOPE
		------------------------------------------------------------------------ */
		jQuery(window).load(function() {
			var $container = jQuery('#cases-container');
			$container.isotope({
				filter: '*',
				animationOptions: {
					duration: 750,
					easing: 'linear',
					queue: false,
				}
			});

			jQuery('.cases-filter-nav li a').on("click", function() {
				var selector = jQuery(this).attr('data-filter');
				$container.isotope({
					filter: selector,
					animationOptions: {
						duration: 750,
						easing: 'linear',
						queue: false,
					}
				});
			  return false;
			});

			var $optionSets = jQuery('.cases-filter-nav'),
				   $optionLinks = $optionSets.find('a');

				   $optionLinks.on("click", function() {
					  var $this = jQuery(this);
				  // don't proceed if already selected
				  if ( $this.hasClass('selected') ) {
					  return false;
				  }
			   var $optionSet = $this.parents('.cases-filter-nav');
			   $optionSet.find('.selected').removeClass('selected');
			   $this.addClass('selected');
			});
		});

		jQuery('.animate-it').appear();
		jQuery(document.body).on('appear', '.animate-it', function(e, $affected) {
			var fadeDelayAttr;
			var fadeDelay;
			jQuery(this).each(function(){
				if (jQuery(this).data("delay")) {
					fadeDelayAttr = jQuery(this).data("delay")
					fadeDelay = fadeDelayAttr;
				} else {
					fadeDelay = 0;
				}
				jQuery(this).delay(fadeDelay).queue(function(){
					jQuery(this).addClass('animated').clearQueue();
				});
			})
		});



		/* ------------------------------------------------------------------------
		   RANGE SLIDER [price filter]
		------------------------------------------------------------------------ */
		jQuery( "#slider-range" ).slider({
		range: true,
		min: 24781,
		max: 50000,
		values: [ 28781,45000],

		slide: function( event, ui ) {

			jQuery( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
		},

		stop: function(event, ui) {
		   jQuery( "#sort_price_max" ).val(ui.values[ 1 ] );
		   jQuery( "#sort_price_min" ).val(ui.values[ 0 ] );
		}
		});
		jQuery( "#amount" ).val( "$" + jQuery( "#slider-range" ).slider( "values", 0 ) +
		" - $" + jQuery( "#slider-range" ).slider( "values", 1 ) );

})(jQuery);

jQuery( '#contact_form_shortcode').submit(function(e) {
	e.preventDefault();

	var name = jQuery('#bta_name').val();
	var email = jQuery('#bta_email').val();
	var phone = jQuery('#bta_phone').val();
	var recipient = jQuery('#bta_recipient').val();
	var purpose = jQuery('#bta_purpose').val();
	var nonce = jQuery('#nonce').val();

	jQuery.ajax({
		url : ajaxUrl,
		type : 'POST',
		data : {
			action : 'advisor_shortcode_contact_form_email',
			bta_name : name,
			bta_email : email,
			bta_phone : phone,
			bta_recipient : recipient,
			bta_purpose : purpose,
			bta_nonce : nonce
		},

		success : function( response ) {

			jQuery(".nl_callback_notify").html();
			var nl_response = "<div class='alert alert-success'>" + response + "</div>";
			jQuery(".nl_callback_notify").append( nl_response );
			setTimeout(function() {

			jQuery(".alert").fadeOut();

			}, 3000);

			jQuery('#bta_name').val('');
			jQuery('#bta_email').val('');
			jQuery('#bta_phone').val('');
			jQuery('#bta_purpose').val('');
			//jQuery('#nonce').val('');
		}
	});
});


jQuery( '#contact-us-form').submit(function(e) {

	e.preventDefault();

	var name = jQuery('#contact_name').val();
	var email = jQuery('#contact_email').val();
	var phone = jQuery('#contact_phone').val();
	var message = jQuery('#contact_message').val();
	var recipient = jQuery('#contact_recipient').val();
	var nonce = jQuery('#contact_nonce').val();


	jQuery.ajax({
		url : ajaxUrl,
		type : 'POST',
		data : {
			action : 'advisor_shortcode_contact_form_email',
			bta_name : name,
			bta_email : email,
			bta_phone : phone,
			bta_purpose : message,
			bta_recipient : recipient,
			bta_nonce : nonce
		},
		success : function( response ) {

				jQuery(".nl_contact_notify").html();
				var nl_response = "<div class='alert alert-success'>" + response + "</div>";
				jQuery(".nl_contact_notify").append( nl_response );
				setTimeout(function() {

				jQuery(".alert").fadeOut();

				}, 3000);

				jQuery('#contact_name').val('');
				jQuery('#contact_email').val('');
				jQuery('#contact_phone').val('');
				jQuery('#contact_message').val('');
				//jQuery('#nonce').val('');
		}
	});
});


jQuery( '#newsletter_submit').click(function(e) {
	e.preventDefault();
	var name = jQuery('#nl_user_name').val();
	var email = jQuery('#nl_email').val();
	var nonce = jQuery('#nonce').val();

	if(name != '' && email != '')
	{
		jQuery.ajax({
			url : ajaxUrl,
			type : 'POST',
			data : {
				action : 'advisor_newsletter_form_submission',
				nl_name : name,
				nl_email : email,
				nonce : nonce
			},
			success : function( response ) {

				jQuery(".nl_notify").html();
				var nl_response = "<div class='alert alert-success'>" + response + "</div>";
				jQuery(".nl_notify").append( nl_response );
				setTimeout(function() {

				jQuery(".alert").fadeOut();

				}, 3000);

				jQuery('#nl_user_name').val('');
				jQuery('#nl_email').val('');
				//jQuery('#nonce').val('');

			}
		});

} else {

		jQuery(".nl_notify").html();

		var nl_alert = "<div class='alert alert-danger'>" + "Error: Both fields are required!" + "</div>";
		jQuery(".nl_notify").append( nl_alert );
		setTimeout(function() {

			jQuery(".alert").fadeOut();

		}, 3000);

}

});


function advisor_validateEmail(email) {
		var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		return re.test(email);
}

jQuery( '#subscription_form_submit').click(function(e) {
	e.preventDefault();

	var name  = jQuery('#subscriber_username').val();
	var email = jQuery('#subscriber_email').val();
	var nonce = jQuery('#subscriber_nonce').val();

	if(name != '' && email != '')
	{

		if ( advisor_validateEmail(email) ) {

		jQuery.ajax({
			url : ajaxUrl,
			type : 'POST',
			data : {
				action : 'advisor_newsletter_form_submission',
				nl_name : name,
				nl_email : email,
				nonce : nonce
			},
			success : function( response ) {

				jQuery(".nl_notify").html();
				var nl_response = "<div class='alert alert-success'>" + response + "</div>";
				jQuery(".nl_notify").append( nl_response );
				setTimeout(function() {

				jQuery(".alert").fadeOut();

				}, 3000);

				jQuery('#nl_user_name').val('');
				jQuery('#nl_email').val('');
				//jQuery('#nonce').val('');

			}
		});

} else {

				jQuery(".nl_notify").html();

				var nl_alert = "<div class='alert alert-danger'>" + "Error: Invalid email address!" + "</div>";
				jQuery(".nl_notify").append( nl_alert );
				setTimeout(function() {

					jQuery(".alert").fadeOut();

				}, 3000);

		}
} else {

		jQuery(".nl_notify").html();

		var nl_alert = "<div class='alert alert-danger'>" + "Error: Both fields are required!" + "</div>";
		jQuery(".nl_notify").append( nl_alert );
		setTimeout(function() {

			jQuery(".alert").fadeOut();

		}, 3000);

}

});
