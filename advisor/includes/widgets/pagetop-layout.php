<?php
$blog_page_id = '';
global $post;
if ( is_home() ) {

	$blog_page_id = get_option( 'page_for_posts' );

} else {

	$blog_page_id = $post->ID;
}
$top_layout   = get_post_meta( $blog_page_id, 'advisor_page_top_layout', true );

if( $top_layout == 'banner' ) {

	if( class_exists( 'RWMB_Loader' ) ) {

  	$button_label = rwmb_meta( 'advisor_banner_button_label', $blog_page_id  );
  	$button_link = rwmb_meta( 'advisor_banner_button_url', $blog_page_id );
  	$enable_breadcrumbs = rwmb_meta( 'advisor_banner_enable_breadcrumbs',  $blog_page_id );
  	$font_color = rwmb_meta( 'advisor_banner_font_color', $blog_page_id );
  	$background_color = rwmb_meta( 'advisor_banner_bg_color',  $blog_page_id );
    $img_args = array( 'size' => 'advisor-background', 'limit' => 1);
  	$background_img = rwmb_meta( 'advisor_banner_bg_image', $img_args , $blog_page_id);
    $bg_url = '';
    if( is_array( $background_img ) ) {

      foreach( $background_img as $img_bg ) {

        $bg_url =  $img_bg['url'];

      }

    }

  	$args_banner = array(

  		'button_label'              => $button_label,
  		'button_link'               => $button_link,
  		'enable_breadcrumbs'        => $enable_breadcrumbs,
  		'font_color'          			=> $font_color,
  		'background_color'          => $background_color,
  		'background_img'          	=> $bg_url,


  	);
		advisor_template_banner( $args_banner );

  } else {

		$args_banner = null;
		advisor_template_banner( $args_banner );

  }


} else if( $top_layout == 'slideshow' ) {

  /// do nothing

}  else if( $top_layout == 'none' ) {

  /// do nothing

} else {

	echo '<section class="plain-content"><div class="container">';

}
