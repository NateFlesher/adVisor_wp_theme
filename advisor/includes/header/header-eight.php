<?php
/**
 * The template for displaying the header
 * @package WordPress
 * @subpackage Advisor
 * @since Advisor 1.0
 */
 ?>

 <?php

 <?php
 global $advisor_options , $post;

 if ( class_exists( 'Redux' ) ) {

 	if ( !empty( $advisor_options['advisor-header-layout']) ) {

 		 $header_style = $advisor_options['advisor-header-layout'];

 	} else {

 		$header_style = 'one';

 	}
 	if ( $advisor_options['advisor-enable-tob-bar'] == true ) {

 		 $enable_top_bar = true;

 	} else {

 		$enable_top_bar = false;
 	}

 	if ( !empty( $advisor_options['advisor-header-logo']['url'] ) ) {

 		$logo_url_img = $advisor_options['advisor-header-logo']['url'];
 		$logo_image_id = $advisor_options['advisor-header-logo']['id'];
 		$logo_alt = get_post_meta( $logo_image_id, '_wp_attachment_image_alt', true);

 		 if ( is_ssl() ) {

 	    	$logo_url_img = str_replace( 'http://', 'https://', $logo_url_img );

 	     }
 	} else {

 		$logo_url_img = '';
 	}
 	if ( !empty( $advisor_options['advisor-header-tagline']) ) {

 		 $header_tagline = $advisor_options['advisor-header-tagline'];

 	} else {

 		$header_tagline = '';

 	}
 	if ( !empty( $advisor_options['advisor-header-phone']) ) {

 		 $header_phone = $advisor_options['advisor-header-phone'];

 	} else {

 		$header_phone = '';
 	}
 	if ( !empty( $advisor_options['advisor-header-phone-label']) ) {

 		 $header_phone_label = $advisor_options['advisor-header-phone-label'];

 	} else {

 		$header_phone_label = '';

 	}
 	if ( !empty( $advisor_options['advisor-header-phone-call-us']) ) {

 		 $header_phone_call_us = $advisor_options['advisor-header-phone-call-us'];

 	} else {

 		$header_phone_call_us = '';

 	}
 	if ( !empty( $advisor_options['advisor-header-email']) ) {

 		 $header_email = $advisor_options['advisor-header-email'];

 	} else {

 		$header_email = '';
 	}
 	if ( !empty( $advisor_options['advisor-header-address']) ) {

 		 $header_address = $advisor_options['advisor-header-address'];

 	} else {

 		$header_address = '';
 	}
 	if ( !empty( $advisor_options['advisor-header-company']) ) {

 		 $header_company = $advisor_options['advisor-header-company'];

 	} else {

 		$header_company = '';
 	}
 	if ( !empty( $advisor_options['advisor-header-office-time']) ) {

 		 $header_office = $advisor_options['advisor-header-office-time'];

 	} else {

 		$header_office = '';
 	}
 	if ( !empty( $advisor_options['advisor-header-working-days']) ) {

 		 $working_days = $advisor_options['advisor-header-working-days'];

 	} else {

 		$working_days = '';

 	}
 	if ( !empty( $advisor_options['advisor-get-a-quote']) ) {

 		 $get_quote_url = esc_url( $advisor_options['advisor-get-a-quote'] );

 	} else {

 		$get_quote_url = '';

 	}
 	if ( !empty( $advisor_options['advisor-get-a-label']) ) {

 		 $get_quote_label = esc_html( $advisor_options['advisor-get-a-label'] );

 	} else {

 		$get_quote_label = '';

 	}
 	if ( $advisor_options['advisor-enable-page-loader'] == true ) {

 		 $page_loader = esc_html( $advisor_options['advisor-enable-page-loader'] );

 	} else {

 		$page_loader = false;

 	}
 	if ( !empty( $advisor_options['advisor-header-menu-background']) ) {

 		 $menu_background_color = $advisor_options['advisor-header-menu-background'];

 	} else {

 		$menu_background_color = '';
 	}

 	if ( !empty( $advisor_options['advisor-header-social-icons']) ) {

 		 $show_social_icons = $advisor_options['advisor-header-social-icons'];

 	} else {

 		$show_social_icons = 0;
 	}

 } else {

 	$header_style = 'one';
 	$enable_top_bar = true;
 	$logo_url_img = '';
 	$header_email = esc_html__('support@brighthemes.com' , 'advisor' );
 	$header_tagline = esc_html__('We have over 15 years of experience' , 'advisor' );
 	$header_phone = esc_html__( '+92123456796' , 'advisor' );
 	$header_address = esc_html__('786 South Park Avenue' , 'advisor' );
 	$header_company = esc_html__('Manhattan Hall,' , 'advisor' );
 	$working_days = esc_html__('Mon to Fri' , 'advisor' );
 	$header_office = esc_html__('08:00 - 16:30' , 'advisor' );
 	$get_quote_url = '';
 	$get_quote_label = '';
 	$page_loader = true;
 	$menu_background_color = '';
 	$show_social_icons = 0;

 }
 ?>


 if( $advisor_options['advisor-accent-type'] == 'custom-color') {
   $menu_background_color = $menu_background_color;
 } else {
   $menu_background_color = '';
 } ?>

 <!-- Header Top Start -->
 <header id="header-top_3" <?php if ( !empty( $menu_background_color ) ) { ?>style="background: <?php echo esc_attr( $menu_background_color ,'advisor' ); ;?>" <?php } ?>>
     <div class="container">
         <div class="row">
             <div class="header_set">
                 <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12 text-right">


                   <?php if( !empty( $header_phone ) ||  !empty( $header_email ) ) { ?>
                     <div class="get-tuch text-left"><i class="icon-telephone114"></i>
                         <ul>
                             <?php if( !empty( $header_phone ) ) { ?>
                               <li>
                                 <h4>
                                   <a href="tel:<?php echo esc_attr( $header_phone ); ?>">
                                     <?php echo esc_html( $header_phone_call_us ) ; ?> <?php echo esc_html( $header_phone ) ; ?>
                                   </a>
                                </h4>
                              </li><?php } ?>

                             <?php if( !empty( $header_email ) ) { ?><li><p class="p_14"><?php echo $header_email; ?></p></li><?php } ?>

                         </ul>
                     </div>
                     <?php } ?>


                     <?php if( !empty( $header_office ) || !empty( $working_days ) ) { ?>
                     <div class="get-tuch text-left"><i class="icon-alarmclock"></i>
                         <ul>
                           <?php if( !empty( $header_office ) ) { ?><li><h4><?php echo $header_office; ?></h4></li><?php } ?>
                           <?php if( !empty( $working_days ) ) { ?><li><p class="p_14"><?php echo $working_days; ?></p></li><?php } ?>
                         </ul>
                     </div>
                     <?php } ?>


                 </div>
                 <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12 text-right">
                     <div class="header-top-links">
                       <?php if( $show_social_icons == 1 ) { ?>
                         <div class="social-icons text-right">
                             <ul>
                               <?php if( isset( $advisor_options['advisor-facebook-url'] )  ) { ?><li><a href="<?php echo esc_url( $advisor_options['advisor-facebook-url'] ); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li><?php } ?>
                               <?php if( isset( $advisor_options['advisor-twitter-url'] )  ) { ?><li><a href="<?php echo esc_url( $advisor_options['advisor-twitter-url'] ); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li><?php } ?>
                               <?php if( isset( $advisor_options['advisor-google-url'] )  ) { ?><li><a href="<?php echo esc_url( $advisor_options['advisor-google-url'] ); ?>"><i aria-hidden="true" class="fa fa-google-plus"></i></a></li><?php } ?>
                               <?php if( isset( $advisor_options['advisor-instagram-url'] )  ) { ?><li><a href="<?php echo esc_url( $advisor_options['advisor-instagram-url'] ); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li><?php } ?>
                               <?php if( isset( $advisor_options['advisor-linkedin-url'] )  ) { ?><li><a href="<?php echo esc_url( $advisor_options['advisor-linkedin-url'] ); ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li><?php } ?>
                             </ul>
                         </div>
                         <?php } ?>
                     </div>
                 </div>
             </div>
         </div>
     </div>

     <!-- Header Top End -->

     <!-- Navbar Start -->
     <nav class="navbar navbar-default navbar-fixed navbar-transparent navbar-sticky dark bootsnav">

         <div class="container">
             <div class="" id="search">
                 <button type="button" class="close"><?php echo esc_html("x",'advisor') ?></button>

                 <form>
                     <input type="search" name="s" placeholder="<?php _e('Search on Site...', 'advisor'); ?>" value="">
                     <span class="searc_button"><i class="icon-icons185"></i></span>
                     <button class="btn btn-primary" type="submit"><?php _e('Search', 'advisor'); ?></button>
                 </form>
             </div>
             <!-- Start Header Navigation -->
             <div class="navbar-header">
                 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                     <i class="fa fa-bars"></i>
                 </button>
                 <a class="navbar-brand" href="#brand">

                   <?php if ( !empty ( $logo_url_img ) ) { ?>

                     <a href="<?php echo esc_url( site_url() ); ?>"><img src="<?php echo esc_attr( $logo_url_img ); ?>" alt="<?php echo esc_attr( $logo_alt ); ?>"></a>

                   <?php } else { ?>

                     <a href="<?php echo esc_url( site_url() ); ?>" class="logo"><?php echo get_bloginfo('description'); ?></a>

                   <?php } ?>

                 </a>
             </div>
             <!-- End Header Navigation -->

             <!-- Add Main menu -->
             <?php advisor_render_main_menu_eight(); ?>

             <?php if( $advisor_options['advisor-header-search-icon'] ) { ?>

               <ul class="nav navbar-nav navbar-right search-wrapper">
                 <li class="search"> <a href="#search"><i class="icon-icons185"></i></a></li>
               </ul>

            <?php } ?>

         </div>
     </nav>

 </header>
 <!-- Navbar End -->
