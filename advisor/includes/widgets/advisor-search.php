<?php
/**
 * Widget: Advisor - Useful Links
 */
function widget_advisor_wp_search() {

	register_widget( 'widget_advisor_search' );

}
add_action( 'widgets_init', 'widget_advisor_wp_search' );

class widget_advisor_search extends WP_Widget {

	// Constructer
	public function __construct() {

		$widget_ops = array(


			'description' => esc_html__( 'Advisor Search', 'advisor' ),
			'panels_icon' => '',



		);
		parent::__construct( 'widget_advisor_search', esc_html__( 'Advisor - Search', 'advisor' ), $widget_ops );
	}

	// Create widget form
  function form( $instance ) {

	  if ( isset( $instance[ 'advisor_title' ] ) ) {

			$title = $instance[ 'advisor_title' ];

		} else {

			$title = __( 'Search..', 'advisor' );


		}
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'advisor_title' ); ?>"><?php esc_html_e( 'Placeholder:', 'advisor' ); ?></label>
			<input name="<?php echo $this->get_field_name( 'advisor_title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" class="widefat" />
		</p>

		<?php
  }

  // Update widget
  function update( $new_instance, $old_instance ) {

	  $instance = $old_instance;
		$instance['advisor_title'] = ( ! empty( $new_instance['advisor_title'] ) ) ? strip_tags( $new_instance['advisor_title'] ) : '';


		return $instance;

  }

  // Display widget on frontend
  function widget( $args, $instance ) {

	  extract( $args );

		// front end
		echo $before_widget;

		$title = $instance[ 'advisor_title' ];

		?>
    	<div class="search clearfix">
    		<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    			<input type="text" value="<?php echo get_search_query(); ?>" name="s" placeholder="<?php echo esc_attr( $title ); ?>">
    			<button type="submit" class="search-icon"><i class="fa fa-search"></i></button>
    		</form>
    	</div>

		<?php

		echo $after_widget;

  }

}
