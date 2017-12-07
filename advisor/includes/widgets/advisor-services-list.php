<?php
/**
 * Widget: Advisor - Useful Links
 */
function widget_advisor_services_pages_list() {

	register_widget( 'widget_advisor_services_list' );

}
add_action( 'widgets_init', 'widget_advisor_services_pages_list' );

class widget_advisor_services_list extends WP_Widget {

	// Constructer
	public function __construct() {

		$widget_ops = array(


			'description' => esc_html__( 'The list of services, pages assigned with "Services" template are listed.', 'advisor' ),
			'panels_icon' => '',


		);
		parent::__construct( 'widget_advisor_services_list', esc_html__( 'Advisor - Services List', 'advisor' ), $widget_ops );
	}

	// Create widget form
  function form( $instance ) {

  }

  // Update widget
  function update( $new_instance, $old_instance ) {

  }

  // Display widget on frontend
  function widget( $args, $instance ) {

	  extract( $args );

		// front end
		echo $before_widget;

		?>
		<?php
		global $post;

		$curr_page_id = $post->ID;

		$services_array = get_pages( array (

			'meta_key'   => '_wp_page_template',
			'hierarchical' => 0,
			'meta_value' => 'template-services.php'

		) );


		if ( $services_array ) { ?>

				<ul class="left-nav">

			<?php foreach ($services_array as $service_page) { ?>

									<li><a href="<?php echo esc_url( get_the_permalink( $service_page->ID )); ?>" class="<?php if ( $service_page->ID == $curr_page_id ) { echo 'active'; } ?>"><?php echo esc_html( $service_page->post_title ); ?> <i class="fa fa-angle-right"></i></a></li>

			<?php } ?>

				</ul>

		<?php	}	?>

		<?php

		echo $after_widget;

  }

}
