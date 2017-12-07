	jQuery(document).ready(function($) {
	
		  jQuery("#one" ).click(function(){
			  jQuery("#color" ).attr("href", "css/color-green.css");
			  jQuery(".logo" ).attr("src", "images/logo.png");
			  return false;
		  });
		  
		  jQuery("#two" ).click(function(){
			  jQuery("#color" ).attr("href", "css/color-red.css");
			  jQuery(".navbar-brand img" ).attr("src", "images/logo-green.png");
			  return false;
		  });
		  
		  jQuery("#three" ).click(function(){
			  jQuery("#color" ).attr("href", "css/color-dark-blue.css");
			  jQuery(".navbar-brand img" ).attr("src", "images/logo-red.png");
			  return false;
		  });
		  
		  
		  jQuery("#four" ).click(function(){
			  jQuery("#color" ).attr("href", "css/color-default.css");
			  jQuery(".navbar-brand img" ).attr("src", "images/logo-yellow.png");
			  return false;
		  });
		  
		  jQuery("#five" ).click(function(){
			  jQuery("#color" ).attr("href", "css/color-pink.css");
			  jQuery(".navbar-brand img" ).attr("src", "images/logo-brown.png");
			  return false;
		  });
		  
		  jQuery("#six" ).click(function(){
			  jQuery("#color" ).attr("href", "css/color-orange.css");
			  jQuery(".navbar-brand img" ).attr("src", "images/logo-cyan.png");
			  return false;
		  });
		  
		  jQuery("#seven" ).click(function(){
			  jQuery("#color" ).attr("href", "css/color-orange.css");
			  jQuery(".navbar-brand img" ).attr("src", "images/logo-purple.png");
			  return false;
		  });
		  
		  jQuery("#light").click(function(){
			  	jQuery("#footer").addClass("light");
				jQuery("#footer").removeClass("dark");
				jQuery("#footer img" ).attr("src", "images/footer-logo.png");
		   });
		   jQuery("#dark").click(function(){
			  	jQuery("#footer").addClass("dark");
				jQuery("#footer").removeClass("light");
				jQuery("#footer img" ).attr("src", "images/footer-logo-dark.png");
		   });
		   
		   
		   jQuery("#h-one").click(function(){
			  	jQuery(".h-one-h").show();
				jQuery(".h-two-h").hide();
				jQuery("body").removeClass("two");
		   });
		   jQuery("#h-two").click(function(){
			  	jQuery(".h-one-h").hide();
				jQuery(".h-two-h").show();
				jQuery("body").addClass("two");
		   });
		   
		   
		   
		   
		var body_class_animation = $.cookie('body_class_animation');
			if(body_class_animation) {
				//$('#color').attr('href', body_class_animation);
				jQuery("#on").addClass("active");
				jQuery("#off").removeClass("active");
				jQuery(".animate").addClass("animate-it");
				
			}
			
		$("#on").click(function() {
			$.cookie('body_class_animation', jQuery(".animate").addClass("animate-it"));
			jQuery(".animate").addClass("animate-it");
			jQuery("#on").addClass("active");
			jQuery("#off").removeClass("active");
		});
		$("#off").click(function() {
			$.removeCookie('body_class_animation');
			jQuery(".animate").removeClass("animate-it");
			jQuery("#on").removeClass("active");
			jQuery("#off").addClass("active");
		});
			
		  
		  // picker buttton
		  jQuery(".picker_close").click(function(){
			  
			  	jQuery("#choose_color").toggleClass("position");
			  
		   });
		   
		   
		   jQuery(".styled-selectt p").click(function(){
			  
			  	jQuery(this).parent().find("ul").slideToggle();
			  
		   });
		   
		   
		  
	});