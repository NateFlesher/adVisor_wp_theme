<?php
function advisor_custom_styles(){

	global $advisor_options;
	?>
	<style type="text/css">
	<?php
	if( !empty($advisor_options['advisor-accent-type']) && $advisor_options['advisor-accent-type'] == 'custom-color'  ) {

		$accent_color = $advisor_options['advisor-accent-color'];
		$accent_top_bar = $advisor_options['advisor-header-top-bar-color'];
		$accent_color_menu = $advisor_options['advisor-header-menu-background'];
		$accent_color_tagline = $advisor_options['advisor-header-tagline-bg'];
		$btn_color_hover = $advisor_options['advisor-primary-btn-hover'];
		$btn_color = $advisor_options['advisor-btn-link-color'];

	?>
		#header .top-bar p{
			padding: 9px 26px;

		}
		a{ color: <?php echo $accent_color; ?>;}

		h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover{ color:<?php echo $accent_color; ?>; }

		.color-default{ color: <?php echo $accent_color .'!important'; ?>; }
		.btn-link { color: <?php echo $accent_color; ?>;}
		#header .main-nav li a:hover, #header .main-nav li.active a{ border-color: <?php echo $accent_color; ?>; }
		#header .search-container .search button{ color:<?php echo $accent_color; ?>;}
		#header .search-container .search input[type="text"]:focus{ border-color:<?php echo $accent_color; ?>;}
		.no-touch .cd-slider-nav a:hover {background-color: <?php echo $accent_color; ?>;}
		.cd-slider-nav .cd-marker {background-color: <?php echo $accent_color; ?>;}
		#footer a:hover{ color:<?php echo $accent_color; ?>;}
		.btn-primary { background-color: <?php echo $accent_color; ?>;}
		.owl-dots .owl-dot.active{background-color: <?php echo $accent_color; ?>;}
		.counter span{ color:<?php echo $accent_color; ?>;}
		.service-box, .service-box.two:hover{ border-color:<?php echo $accent_color; ?>;}
		.service-box.three:after{ background:<?php echo $accent_color; ?>;}
		.service-box i{ color:<?php echo $accent_color; ?>;}
		.toggle .toggle-heading a i{ color:<?php echo $accent_color; ?>; border-color:<?php echo $accent_color; ?>;}
		.meet-advisors-content h3{ color:<?php echo $accent_color; ?>;}
		.selectboxit-list > .selectboxit-focus > .selectboxit-option-anchor{background-color: <?php echo $accent_color; ?>;}
		#header .main-nav li.dropdown ul.dropdown-menu li a:hover, #header .main-nav li.dropdown ul.dropdown-menu li.active a{ background-color:<?php echo $accent_color; ?>;}
		.cd-slider-nav li .slide-number{ background-color:<?php echo $accent_color; ?>;}
		.cd-slider-nav li.selected .slide-number, .cd-slider-nav li:hover .slide-number{ color:<?php echo $accent_color; ?>;}
		#header.header-two .header-contact-widget li i{ color:<?php echo $accent_color; ?>;}
		#header.header-two .header-contact-widget li p a:hover{ color:<?php echo $accent_color; ?>;}
		.breadcrumbs li a:hover{ color:<?php echo $accent_color; ?>;}
		.blog-item .blog-content h3 a:hover{ color:<?php echo $accent_color; ?>;}
		.blog-item .blog-meta li a:hover{color:<?php echo $accent_color; ?>;}
		.categories li a:hover{color:<?php echo $accent_color; ?>;}
		.tags li a:hover {color:<?php echo $accent_color; ?>; border-color:<?php echo $accent_color; ?>;}
		.popular-post h4 a:hover {color:<?php echo $accent_color; ?>;}
		.search {background-color: <?php echo $accent_color; ?>;}
		.search .search-icon:hover i {color:<?php echo $accent_color; ?>;}
		.blog-item-classic .blog-content a.btn-link, .blog-item .blog-content a.btn-link{border-color:<?php echo $accent_color; ?>;}
		.blog-item-classic .blog-content h3 a:hover{ color:<?php echo $accent_color; ?>;}
		.news-paggination li a:hover{ color:<?php echo $accent_color; ?>;}
		.company-history li .year{ color: <?php echo $accent_color; ?>;}
		.company-history li .history-content:before{ background-color: <?php echo $accent_color; ?>;}
		.team-member h4{ color: <?php echo $accent_color; ?>;}
		.list-bullets li:before{ background:<?php echo $accent_color; ?>;}
		.left-nav li a:hover, .left-nav li a.active{ border-color:<?php echo $accent_color; ?>;}
		.help-widget{ background-color:<?php echo $accent_color; ?>;}
		.product-description h3 a:hover{ color:<?php echo $accent_color; ?>;}
		.product-description .product-cart-btn:hover, .product-description .product-detail-btn:hover{ color:<?php echo $accent_color; ?>;}
		.product-thumb label{ background:<?php echo $accent_color; ?>;}
		.ui-slider-horizontal .ui-slider-range{ background:<?php echo $accent_color; ?>;}
		.top-products .top-products-detail i{ color:<?php echo $accent_color; ?>;}
		.top-products .top-products-detail h4 a:hover{ color:<?php echo $accent_color; ?>;}
		.ratings i{ color:<?php echo $accent_color; ?>;}
		.resp-vtabs li.resp-tab-active{color:<?php echo $accent_color; ?>;}
		.resp-tab-active { background:<?php echo $accent_color; ?>;}
		.cart-total .amount{color:<?php echo $accent_color; ?>;}
		.banner-btn.colored{ background:<?php echo $accent_color; ?>;}
		.map-with-address-widget a:hover{ color:<?php echo $accent_color; ?>;}
		blockquote{ border-color:<?php echo $accent_color; ?>;}
		.cases-filter-nav li a:hover, .cases-filter-nav li a.selected{ background:<?php echo $accent_color; ?>;}
		.product-detail-slider .rslides_tabs li.rslides_here a{background: <?php echo $accent_color; ?>;}
		.review-form-close:hover{ background:<?php echo $accent_color; ?>;}
		.btn.btn-dark:hover{ background:<?php echo $accent_color; ?>;}
		.cases-item figcaption{ background: <?php echo $accent_color; ?>;}

		.highlighted-sec li:nth-child(1n+1) .text-box{ background: <?php echo $accent_color; ?>;}
		.highlighted-sec li:nth-child(2n+2) .text-box{ background: <?php echo $accent_color; ?>;}
		.highlighted-sec li:nth-child(3n+3) .text-box{ background: <?php echo $accent_color; ?>;}
		.highlighted-sec li:nth-child(4n+4) .text-box{ background: <?php echo $accent_color; ?>;}
		.highlighted-sec li:nth-child(5n+5) .text-box{ background: <?php echo $accent_color; ?>;}
		.highlighted-sec li:nth-child(6n+6) .text-box{ background: <?php echo $accent_color; ?>;}


		.services.highlighted .owl-item:nth-child(3n+1) .service-box{ background: <?php echo $accent_color; ?>;}
		.services.highlighted .owl-item:nth-child(3n+2) .service-box{ background: <?php echo $accent_color; ?>;}
		.services.highlighted .owl-item:nth-child(3n+3) .service-box{ background: <?php echo $accent_color; ?>;}

		.testimonial-2 .testimonials-author p{color: <?php echo $accent_color; ?>;}
		#header.header-three .main-nav li a:hover, #header.header-three .main-nav li.active > a{color: <?php echo $accent_color; ?>;}
		.doing-the-right-text span{ color: <?php echo $accent_color; ?>;}

		.ad-bannercontent h1 em span,
		#header.header-four .main-nav li.active a,
		#header.header-four .main-nav li > a:hover,
		.header-five .ad-navigation ul li.ad-active > a,
		.header-five .ad-navigation ul li a:hover{color:<?php echo $accent_color; ?>;}

		.header-six .btn-quote{border-color: <?php echo $accent_color; ?>;}

		.btn-primary:hover  {background-color: <?php echo $btn_color_hover; ?>;}
		a:hover, a:focus, .btn-link:hover, .btn-link:focus { color:<?php echo $btn_color; ?>;}

		#header.header-two .main-nav { background:<?php echo $accent_color_menu; ?>; }

		.smallHeader.active #header.header-two{ background: <?php echo $accent_color_menu; ?> !important;}
		span.post-sticky , .post-sticky i.fa.fa-star{ color: <?php echo $accent_color_menu; ?>;}

		<?php
		}
		if( !empty($advisor_options['advisor-top-bar-color-type']) && $advisor_options['advisor-top-bar-color-type'] == 'custom'  ) {

			$accent_top_bar = $advisor_options['advisor-header-top-bar-color'];
			$accent_color_tagline = $advisor_options['advisor-header-tagline-bg'];

		?>
		#header .top-bar:before, #header .top-bar p, #header .top-bar p:after{ background: <?php echo $accent_color_tagline; ?>;}
		.ad-topbar{ background: <?php echo $accent_color_tagline; ?>;}
		#header .top-bar:after, #header .top-bar, #header .top-bar-simple{ background: <?php echo $accent_top_bar; ?>; }

		<?php } ?>
		<?php if( !empty($advisor_options['advisor-header-layout']) && $advisor_options['advisor-header-layout'] == 'four'  )  { ?>

						@media screen and (max-width: 768px){

							.cd-hero{ float: left; width: 100%; }

						}
						@media (max-width: 590px) {
							.site-title h2, .breadcrumbs {
							    float: none;
							    margin-top: 42px;
							}
							.subpage-header .btn.get-in-touch{
								margin-top: 40px;
							}
						}

		<?php } ?>
		<?php if( $advisor_options['advisor-enable-tob-bar'] == false) {

			if( !empty($advisor_options['advisor-header-layout']) && $advisor_options['advisor-header-layout'] == 'two'  )  { ?>

				@media screen and (max-width: 768px){
				.fixed-header .main-banner, .fixed-header .subpage-header, .fixed-header .cd-hero { margin-top: 15px; }
				}

		<?php } else { ?>

			@media screen and (min-width: 992px){
			.fixed-header .main-banner, .fixed-header .subpage-header, .fixed-header .cd-hero { margin-top: 100px; }
			}

		<?php }
		}
		?>
		<?php if( !empty($advisor_options['advisor-footer-color'] ) && $advisor_options['advisor-footer-color'] == 'custom'  ) {

				$footer_top_bg = $advisor_options['advisor-footer-top-background-color'];
				$footer_bottom_bg = $advisor_options['advisor-footer-bottom-background-color'];
				$footer_font = $advisor_options['advisor-footer-font-color'];


		?>
		#footer.custom { background-color: <?php echo $footer_top_bg; ?>; color: <?php echo $footer_font; ?>; }
		#footer.custom .footer-bottom{ background-color: <?php echo $footer_bottom_bg; ?>; color: <?php echo $footer_font; ?>; }

		#footer_1 { background-color: <?php echo $footer_top_bg; ?>; color: <?php echo $footer_font; ?>; }
		#footer_1 .footer_botom { background-color: <?php echo $footer_bottom_bg; ?>; color: <?php echo $footer_font; ?>; }

		#footer_1 .footer_link  > li > a {
		    color: <?php echo $footer_font; ?>;
		    padding: 10px;
		}
		#footer_1 .footer_botom a{
			color: <?php echo $footer_font; ?> !important;
		}

		#footer.custom, #footer.custom p, #footer.custom h1, #footer.custom h2, #footer.custom h3, #footer.custom h4, #footer.custom h4 a, #footer.custom ul, #footer.custom ul li, #footer.custom ul li a,
		.footer_botom a{
			color: <?php echo $footer_font; ?> !important;
		}

		#footer.custom .footer_botom { background-color: <?php echo $footer_bottom_bg; ?>; color: <?php echo $footer_font; ?>; }


		<?php }

		if( ($advisor_options['advisor-header-layout'] == 'five') && $advisor_options['advisor-accent-type'] == 'custom-color'  ) {

			$font_color = $advisor_options['advisor-header-font-color']; ?>

			.header-five.ad-headerfive ul li a, .header-five.ad-headerfive ul.ad-addressinfo, .header-five.ad-headerfive .ad-copyright{
				color: <?php echo esc_attr($font_color); ?>;
			}

		<?php }


		if( ($advisor_options['advisor-header-layout'] == 'eight') && $advisor_options['advisor-accent-type'] == 'custom-color'  ) {

			$font_color = $advisor_options['advisor-header-font-color']; ?>

 				#header-top_3 .get-tuch ul li p, #header-top_3 .get-tuch ul li h4, #header-top_3 ul li h4 a, #header-top_3 .get-tuch i, #header-top_3 #navbar-menu ul li a, #header-top_3 .header_set ul li h4 a{
				color: <?php echo esc_attr($font_color); ?>;
			}

		<?php }


		if( ($advisor_options['advisor-header-layout'] == 'six') && $advisor_options['advisor-accent-type'] == 'custom-color'  ) {

			$font_color = $advisor_options['advisor-header-font-color']; ?>

			.header-six .ad-navigationarea ul li a.tel, .fixed-header.smallHeader.active #header.header-six {
				color: <?php echo esc_attr($font_color); ?> !important;
			}
			.header-six .ad-navigationarea ul li i{
				color: <?php echo esc_attr($font_color); ?> !important;
				border-color: <?php echo esc_attr($font_color); ?> !important;
			}

		<?php } ?>

	</style>

	<style>

	<?php
		// Advisor Custom CSS form Theme Options
		if( class_exists('redux') ) {

		echo $advisor_options['advisor-custom-styles'];

		} else {

			echo '#header .main-nav li a{ font-size: 14px; }';

		}
	?>


	<?php
	if( !empty($advisor_options['advisor-header-layout']) && $advisor_options['advisor-header-layout'] == 'two' && $advisor_options['advisor-enable-tob-bar'] == true )  { ?>


		@media screen and (min-width: 992px) {
		.fixed-header .main-banner, .fixed-header .subpage-header, .fixed-header .cd-hero{
			margin-top: 190px;
		}
	}
	@media screen and (max-width: 768px) {
	.fixed-header .main-banner, .fixed-header .subpage-header, .fixed-header .cd-hero{
		margin-top: 15px;
		}
	}
	<?php } ?>

	<?php // if admin bar i showing up ?>
	<?php if ( is_admin_bar_showing() ) { ?>


    #header { top: 28px; }

	  .fixed-header.smallHeader.active #header{ top: -17px; }
    @media (min-width: 992px) {
  	  .fixed-header.smallHeader.active #header{
  	   top: -17px;
  	  }
			.fixed-header.smallHeader.active #header.header-three{
				top: 29px;
			}
	  }
  	@media (max-width: 991px) {
  	#header {
        top: 0px;
      }
			.admin-bar #header.header-two{
				top: 0px !important;
			}
  	}
		.fixed-header.smallHeader.active #header.header-two{
			top: -120px;
		}
		.admin-bar #header.header-two{
			top: 28px;
		}

    <?php
  }
	?>

	<?php if ( !empty( $advisor_options['advisor-header-layout'] ) && $advisor_options['advisor-header-layout'] == 'five' ) { ?>

		#ad-header .ad-infobox ul, #ad-header .nav > li > a {
		    margin: 0px;
				margin-top: 10px;
				padding: 0 !important;
		}

		@media (min-width: 992px) {
			.fixed-header .main-banner, .fixed-header .subpage-header, .fixed-header .cd-hero {
				margin-top: 0px;
			}
		}
		@media (max-width: 992px) {
			.ad-headerfive{
				padding: 10px;

			}
			.header-five .ad-hasdropdown > a:before{

				right: 0px !important;
			}
		}
		@media (max-width: 768px) {
			.fixed-header .main-banner, .fixed-header .subpage-header, .fixed-header .cd-hero {
				margin-top: 90px;
			}
			.plain-content{
				margin-top: 75px !important;
			}
		}
		@media (max-width: 599px) {
			.fixed-header .main-banner, .fixed-header .subpage-header, .fixed-header .cd-hero {
				margin-top: 78px;
			}
			.plain-content{
				margin-top: 90px !important;
			}
		}

		.ad-five > section{
				padding: 0px;
				margin-top: 20px;
		}
		.ad-five > section.plain-content section {
				padding: 0px;
		}

		<?php
		} ?>

		<?php if ( !empty( $advisor_options['advisor-header-layout'] ) && $advisor_options['advisor-header-layout'] == 'six' ) { ?>

			@media (min-width: 992px) {
				.fixed-header .main-banner, .fixed-header .subpage-header, .fixed-header .cd-hero {
				    margin-top: 109px;
				}
			}
			@media (min-width: 768px) {
				.fixed-header .main-banner, .fixed-header .subpage-header, .fixed-header .cd-hero {
						margin-top: 153px;
				}
			}
			@media (max-width: 768px) {
				.fixed-header .main-banner, .fixed-header .subpage-header, .fixed-header .cd-hero {
						margin-top: 153px;
				}
			}
			@media (max-width: 599px) {
				.fixed-header .main-banner, .fixed-header .subpage-header, .fixed-header .cd-hero {
						margin-top: 196px;
				}
			}

			<?php
			}
	?>
	<?php if ( !empty( $advisor_options['advisor-header-layout'] ) && $advisor_options['advisor-header-layout'] == 'four' ) { ?>

		@media (min-width: 992px) {
			.fixed-header .main-banner, .fixed-header .subpage-header, .fixed-header .cd-hero {
					margin-top: 109px;
			}
		}
		@media (min-width: 768px) {
			.fixed-header .main-banner, .fixed-header .subpage-header, .fixed-header .cd-hero {
					margin-top: 153px;
			}
		}
		@media (max-width: 768px) {
			.fixed-header .main-banner, .fixed-header .subpage-header, .fixed-header .cd-hero {
					margin-top: 0px;
			}
		}
		@media (max-width: 599px) {
			.fixed-header .main-banner, .fixed-header .subpage-header, .fixed-header .cd-hero {
					margin-top: 0px;
			}
		}

		<?php
		} ?>

		<?php if ( isset( $advisor_options['advisor-header-layout'] ) && $advisor_options['advisor-header-layout'] == 'seven'
	&& $advisor_options['advisor-header-seven-layout'] == 'full' ) { ?>

		#header-bottom.bg_blue{
			background: #fff;
		}

		@media (min-width: 992px) {
			.fixed-header .cd-hero {
    		margin-top: 0;
		}
	}

		.advisor-header-seven-nav nav.navbar.bootsnav.no-background{
			background: #fff;
			border-radius: 0px;
		}
			<?php
			}	?>


			<?php if ( isset( $advisor_options['advisor-header-layout'] ) && $advisor_options['advisor-header-layout'] == 'seven'
		&& $advisor_options['advisor-accent-type'] == 'custom-color' && $advisor_options['advisor-header-seven-layout'] == 'full'  ) { ?>

				#header-bottom.bg_blue, .bg-white, #header-bottom.bg_blue{
					background: <?php echo $accent_color_menu; ?>;
				}

				#header-top {
					background: <?php echo $accent_color_tagline; ?>;
				}

				<?php
				}	?>

				<?php if ( isset( $advisor_options['advisor-header-layout'] ) && $advisor_options['advisor-header-layout'] == 'seven'
			&& $advisor_options['advisor-accent-type'] == 'custom-color' && $advisor_options['advisor-header-seven-layout'] == 'short' ) { ?>

					#header-bottom.bg_blue, .bg-white, #header-bottom.bg_blue{
						background: <?php echo $accent_color_tagline; ?>;
					}

					#header-top {
						background: <?php echo $accent_color_tagline; ?>;
					}

					#header-bottom .bg-white.row{
						background: <?php echo $accent_color_menu; ?>;
					}

					.advisor-header-seven-nav nav.navbar.bootsnav.no-background{
						background: transparent;
						border-radius: 0px;
					}

					<?php
					}	?>


					<?php if ( isset( $advisor_options['advisor-header-layout'] ) && $advisor_options['advisor-header-layout'] == 'seven'
				&& $advisor_options['advisor-accent-type'] == 'custom-color' && $advisor_options['advisor-top-bar-color-type'] == 'default'  ) { ?>

					#header-bottom.bg_blue{
						background: #3a2c5f;
					}

					#header-top {
						background: #3a2c5f;
					}

					<?php
					}	?>


					<?php if ( isset( $advisor_options['advisor-header-layout'] ) && $advisor_options['advisor-header-layout'] == 'nine'
				&& $advisor_options['advisor-accent-type'] == 'custom-color' ) { ?>

					.header-seven .ad-navigationbox{
						background: <?php echo $accent_color_menu; ?>;
					}

					<?php
					}	?>

	</style>
	<?php

}
add_action( 'wp_head', 'advisor_custom_styles', 20);
?>
