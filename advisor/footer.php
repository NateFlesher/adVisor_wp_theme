<?php
/**
 * The template for displaying the footer
 * @package WordPress
 * @subpackage Advisor
 * @since Advisor 1.0
 */
 global $advisor_options;
if ( class_exists( 'Redux' ) ) {

if ( ! empty( $advisor_options['advisor-footer-logo']['url'] ) ) {

  $footer_logo_img = $advisor_options['advisor-footer-logo']['url'];
  if ( is_ssl() ) {

    $footer_logo_img = str_replace( 'http://', 'https://', $footer_logo_img );

  }
} else {

	$footer_logo_img = '';

}
if ( $advisor_options['advisor-footer-address-widget'] == true ) {

  $enable_address_widget = true;


} else {

  $enable_address_widget = false;
}
if ( $advisor_options['advisor-footer-logo-text-widget'] == true ) {

  $enable_logo_text = true;


} else {

  $enable_logo_text = false;
}
 if ( ! empty( $advisor_options['advisor-footer-text']) ) {

	 $footer_text = $advisor_options['advisor-footer-text'];


} else {

	$footer_text = '';

}
 if ( ! empty( $advisor_options['advisor-footer-tagline']) ) {

	 $footer_tagline = $advisor_options['advisor-footer-tagline'];

} else {

	$footer_tagline = '';

}
if ( ! empty( $advisor_options['advisor-footer-copyrights']) ) {

	 $footer_copyrights = $advisor_options['advisor-footer-copyrights'];

} else {

	$footer_copyrights = '';

}

} else {

  $footer_copyrights = esc_html__( 'Coyright 2016 Advisor. All rights reserved.' , 'advisor' );
  $footer_tagline = __( 'Designed by <a href="">Brighthemes</a>' , 'advisor' );
  $footer_text = '';
  $footer_logo_img = '';
  $enable_address_widget = false;
  $enable_logo_text = false;
}
?>

    <?php if( isset( $advisor_options['advisor-footer-style'] ) && ( $advisor_options['advisor-footer-style'] == 'style1')  ) { ?>
    <footer id="footer" class="<?php if  ( !empty( $advisor_options['advisor-footer-color'] ) ){ echo esc_attr( $advisor_options['advisor-footer-color'] ); } ?>">

            <div class="container">
              <?php if( $enable_logo_text == true || $enable_address_widget == true || is_active_sidebar( 'advisor_footer_right' ) || is_active_sidebar( 'advisor_footer_left' ) ) { ?>

                <div class="footer-top clearfix">

                  <?php if( $enable_logo_text == true ) { ?>
                    <div class="row">
                        <div class="col-md-3 col-sm-3">
                            <div class="footer-logo animate fadeInLeft">
                            <?php if( !empty( $footer_logo_img )){  ?>

                            		<a href="#"><img src="<?php echo esc_attr( $footer_logo_img ); ?>" alt=""></a>

                            <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-9">
                            <p><?php echo $footer_text; ?></p>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="height-50"></div>

                    <div class="footer-left">

                      <?php if( $enable_address_widget == true ) { ?>

                        <div class="footer-address-widget clearfix">

                            <ul>
                              	<?php if ( !empty( $advisor_options['advisor-footer-phone'] ) || !empty( $advisor_options['advisor-footer-email'] )  ) {

                                    $advisor_footer_phone = $advisor_options['advisor-footer-phone'];
                                    $advisor_footer_email = $advisor_options['advisor-footer-email'];

                                  ?>
                                  <li><i class="icon-telephone114"></i><?php echo esc_html( $advisor_footer_phone ); ?><a href="mailto:<?php echo $advisor_footer_email; ?>"><?php echo $advisor_footer_email; ?></a></li>

                                <?php } ?>
                                <?php if ( !empty( $advisor_options['advisor-footer-company'] ) || !empty( $advisor_options['advisor-footer-address'] )  ) {

                                  $advisor_footer_company = $advisor_options['advisor-footer-company'];
                                  $advisor_footer_address = $advisor_options['advisor-footer-address'];

                                  ?>

                                <li><i class="icon-icons74"></i><?php echo esc_html( $advisor_footer_company ); ?><span><?php echo esc_html( $advisor_footer_address ); ?></span></li>

                                <?php } ?>
                            </ul>

                        </div>
                        <?php } ?>
                          <?php if ( is_active_sidebar( 'advisor_footer_left' ) ) : ?>

                            <div class="row">

		                          <?php dynamic_sidebar( 'advisor_footer_left' ); ?>

                            </div>

                          <?php endif; ?>

                    </div>
                    <?php if ( is_active_sidebar( 'advisor_footer_right' ) ) : ?>

                    <div class="footer-right">

                      <?php dynamic_sidebar( 'advisor_footer_right' ); ?>

                    </div>

                    <?php endif; ?>
                </div>

                <?php } ?>
            </div>

            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-6"><p><?php echo $footer_copyrights; ?></p></div>
                        <div class="col-md-6 col-sm-6"><p class="text-right"><?php echo $footer_tagline; ?></p></div>
                    </div>
                </div>
            </div>

          </footer>

          <?php } elseif( isset( $advisor_options['advisor-footer-style'] ) && ( $advisor_options['advisor-footer-style'] == 'style2')
              && ( $advisor_options['advisor-footer-widgets'] != 1 ) ) { ?>

            <!-- Footer Start -->
            <footer id="footer_1" class="p-t-70 <?php if ( !empty( $advisor_options['advisor-footer-color'] ) ){ echo esc_attr( $advisor_options['advisor-footer-color'] ); } ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="header-top-links">
                                <div class="social-icons footer-social-icons">
                                    <ul>
                                        <?php if( isset( $advisor_options['advisor-facebook-url'] )  ) { ?><li><a href="<?php echo esc_url( $advisor_options['advisor-facebook-url'] ); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li><?php } ?>
                                        <?php if( isset( $advisor_options['advisor-twitter-url'] )  ) { ?><li><a href="<?php echo esc_url( $advisor_options['advisor-twitter-url'] ); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li><?php } ?>
                                        <?php if( isset( $advisor_options['advisor-google-url'] )  ) { ?><li><a href="<?php echo esc_url( $advisor_options['advisor-google-url'] ); ?>"><i aria-hidden="true" class="fa fa-google-plus"></i></a></li><?php } ?>
                                        <?php if( isset( $advisor_options['advisor-instagram-url'] )  ) { ?><li><a href="<?php echo esc_url( $advisor_options['advisor-instagram-url'] ); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li><?php } ?>
                                        <?php if( isset( $advisor_options['advisor-linkedin-url'] )  ) { ?><li><a href="<?php echo esc_url( $advisor_options['advisor-linkedin-url'] ); ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li><?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>

                          <!-- footer menu -->
                      		<?php
                      		$menu_location_name = 'advisor-footer-menu';
                      		$locations          = get_nav_menu_locations();


                      		if (isset ( $locations[ $menu_location_name ] ) ) {

                      			$advisor_footer_menu = array(
                      				'theme_location'   => $menu_location_name,
                      				 'container'       => 'div',
                      				 'container_class' => 'col-md-12 text-center m-b-20',
                      				 'menu_class'      => 'footer_link',
                      				 'echo'            => true,
                      				 'fallback_cb'     => false,
                      				 'depth'					 => 1,
                      			 );
                      			 wp_nav_menu( $advisor_footer_menu );

                      		 } ?>	<!-- footer menu ends-->


                        <div class="col-md-12 text-center">
                            <?php if( !empty( $footer_copyrights ) ) { ?><p class="footer-copyrights"><?php echo $footer_copyrights; ?></p><?php } ?>
                        </div>
                    </div>
                </div>
                <div class="footer_botom m-t-50 p-t-20 p-b-20">
                    <div class="container">
                        <div class="row">

                            <div class="col-md-12 text-center">
                              <?php if( !empty( $footer_tagline ) ) { ?>

                                  <p class="footer-copyrights theme-maker"><?php _e('Made with ', 'advisor'); ?><i class="icon-heart3"></i><?php _e(' by ', 'advisor'); ?><a href="#"><?php echo $footer_tagline; ?></a></p>

                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- Footer End -->

          <?php } elseif( isset( $advisor_options['advisor-footer-style'] ) && ( $advisor_options['advisor-footer-style'] == 'style2')
              && ( $advisor_options['advisor-footer-widgets'] == 1 ) ) { ?>

                <!-- Footer Start -->
                <footer id="footer" class="bg_blue p-t-100 <?php if ( !empty( $advisor_options['advisor-footer-color'] ) ){ echo esc_attr( $advisor_options['advisor-footer-color'] ); } ?>">
                    <div class="container">
                        <div class="row">


                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="footer_box_1">

                                  <?php if ( is_active_sidebar( 'advisor_footer_area_one' ) ) : ?>

        		                          <?php dynamic_sidebar( 'advisor_footer_area_one' ); ?>

                                  <?php endif; ?>

                                </div>
                            </div>

                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="footer_box_1">

                                  <?php if ( is_active_sidebar( 'advisor_footer_area_two' ) ) : ?>

        		                          <?php dynamic_sidebar( 'advisor_footer_area_two' ); ?>

                                  <?php endif; ?>

                                </div>
                            </div>

                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="footer_box_1">

                                  <?php if ( is_active_sidebar( 'advisor_footer_area_three' ) ) : ?>

                                      <?php dynamic_sidebar( 'advisor_footer_area_three' ); ?>

                                  <?php endif; ?>

                                </div>
                            </div>

                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="footer_box_1">

                                  <?php if ( is_active_sidebar( 'advisor_footer_area_four' ) ) : ?>

        		                          <?php dynamic_sidebar( 'advisor_footer_area_four' ); ?>

                                  <?php endif; ?>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="footer_botom m-t-80 p-t-20 p-b-20">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">

                                  <?php if( !empty( $footer_copyrights ) ) { ?>

                                    <p><?php echo $footer_copyrights; ?></p>

                                  <?php } ?>

                                </div>
                                <div class="col-md-6 text-right">

                                  <?php if( !empty( $footer_tagline ) ) { ?>

                                    <p><?php _e('Made with ', 'advisor'); ?><i class="icon-heart3"></i><?php _e(' by ', 'advisor'); ?><a href="#"><?php echo $footer_tagline; ?></a></p>

                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- Footer End -->

          <?php } ?>

      	<!-- FOOTER SCRIPTS
      		================================================== -->
        <?php wp_footer(); ?>


    </body>
</html>
