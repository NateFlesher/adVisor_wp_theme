<?php
/**
 * The template for displaying the header
 * @package WordPress
 * @subpackage Advisor
 * @since Advisor 1.0
 */
 ?>
<!-- HERDER -->

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

    <header id="header" class="h-one-h">

				<div class="container">

					<!-- TOP BAR -->
          <?php if ( $enable_top_bar == true ) { ?>

					<div class="top-bar clearfix">

            <?php if ( !empty( $header_tagline ) ) { ?>

						<p><?php echo esc_html( $header_tagline ) ; ?></p>

              <?php } ?>

						<ul>
              <?php if ( !empty( $header_phone ) ) { ?>

							<li><i class="icon-telephone114"></i>
                <a class="tel" href="tel:<?php echo esc_attr( $header_phone ); ?>">
                  <?php echo esc_html( $header_phone_call_us ) ; ?> <?php echo esc_html( $header_phone ) ; ?>
                </a>
              </li>


              <?php } ?>
              <?php if ( !empty( $header_address ) ) { ?>

							<li><i class="icon-icons74"></i> <?php echo esc_html( $header_address ) ; ?></li>

              <?php } ?>
              <?php if ( !empty( $working_days ) || !empty( $header_office ) )  { ?>

                <?php $working_hours_ofc = $working_days.' '.$header_office; ?>

							<li><i class="icon-icons20"></i><?php echo esc_html( $working_hours_ofc ) ; ?></li>

              <?php } ?>
						</ul>
            <?php } ?>
					</div>
					<!-- / TOP BAR -->

					<!-- HEADER INNER -->
					<div class="header clearfix">

            <?php if( !empty( $logo_url_img ) ) { ?>

						<a href="<?php echo esc_url( site_url() ); ?>" class="logo"><img src="<?php echo esc_attr( $logo_url_img ); ?>" alt="<?php echo esc_attr( $logo_alt ); ?>"></a>

						<?php
						} else { ?>

							<a href="<?php echo esc_url( site_url() ); ?>" class="logo"><?php echo get_bloginfo('description'); ?></a>

				 	  <?php } ?>

						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#primary-nav" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<?php
						if( $advisor_options['advisor-header-search-icon'] ){

							locate_template('searchform.php', true);

						}?>

            <nav class="main-nav navbar-collapse collapse" id="primary-nav">
              <!-- Add Main menu -->
  						<?php advisor_render_main_menu(); ?>
            </nav>

            <?php wp_reset_postdata(); ?>

					</div><!-- / HEADER INNER -->

      </div><!-- / CONTAINER -->

</header><!-- / HERDER -->
