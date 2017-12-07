<?php
if ( ! function_exists( 'advisor_register_widgets' ) ) {
	function advisor_register_widgets() {


    register_sidebar(
			array(
				'name'          => esc_html__( 'Blog/Single Post Sidebar', 'advisor' ),
				'id'            => 'advisor_sidebar_blog',
				'before_widget' => '<div class="sidebar-widget clearfix advisor-blog-sidebar">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3>',
				'after_title'   => '</h3>'
			)
		);
		register_sidebar(
			array(
				'name'           => esc_html__( 'Services Page Sidebar', 'advisor' ),
				'id'             => 'advisor_sidebar_services',
				'before_widget'  => '',
				'after_widget'   => '',
				'before_title'   => '<h5 class="advisor-services-sidebar">',
				'after_title'    => '</h5>'
			)
		);

		/* ================ ADD FOOTER SIDEBARS for style1 ============== */

		global $advisor_options;

		if (  isset( $advisor_options['advisor-footer-style'] ) && ( $advisor_options['advisor-footer-style'] == 'style1' ) ) {

	    register_sidebar(
				array(
					'name'          => esc_html__( 'Footer Left', 'advisor' ),
					'id'            => 'advisor_footer_left',
					'before_widget' => '<div class="col-md-6 advisor-footer-left">',
					'after_widget'  => '</div>',
					'before_title'  => '<h4>',
					'after_title'   => '</h4>'
				)
			);
	    register_sidebar(
				array(
					'name'          => esc_html__( 'Footer Right', 'advisor' ),
					'id'            => 'advisor_footer_right',
					'before_widget' => '',
					'after_widget'  => '',
					'before_title'  => '<h4 class="advisor-footer-right">',
					'after_title'   => '</h4>'
				)
			);

		}

		/* ================ ADD FOOTER SIDEBARS for style2 ============== */

		if (  isset( $advisor_options['advisor-footer-style'] ) && ( $advisor_options['advisor-footer-style'] == 'style2' )
	&& ( $advisor_options['advisor-footer-widgets'] == 1 )) {

				register_sidebar(array(
					'name' => __( 'Footer Area 1', 'advisor' ),
					'id'   => 'advisor_footer_area_one',
					'description'   => __( '', 'advisor' ),
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<h4>',
					'after_title'   => '</h4>'
				));
				register_sidebar(array(
					'name' => __( 'Footer Area 2', 'advisor' ),
					'id'   => 'advisor_footer_area_two',
					'description'   => __( '', 'advisor' ),
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<h4>',
					'after_title'   => '</h4>'
				));
				register_sidebar(array(
					'name' => __( 'Footer Area 3', 'advisor' ),
					'id'   => 'advisor_footer_area_three',
					'description'   => __( '', 'advisor' ),
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<h4>',
					'after_title'   => '</h4>'
				));
				register_sidebar(array(
					'name' => __( 'Footer Area 4', 'advisor' ),
					'id'   => 'advisor_footer_area_four',
					'description'   => __( '', 'advisor' ),
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<h4>',
					'after_title'   => '</h4>'
				));

		}


	}
}
add_action( 'widgets_init', 'advisor_register_widgets' );
?>
