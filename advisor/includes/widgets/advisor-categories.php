<?php
/**
 * Widget: Advisor - Useful Links
 */
function widget_advisor_post_terms() {

	register_widget( 'widget_advisor_categories' );

}
add_action( 'widgets_init', 'widget_advisor_post_terms' );

class widget_advisor_categories extends WP_Widget {

	// Constructer
		public function __construct(){

		$widget_ops = array(


			'description' => esc_html__( 'Advisor Categories', 'advisor' ),
			'panels_icon' => '',



		);
		parent::__construct( 'widget_advisor_categories', esc_html__( 'Advisor - Categories', 'advisor' ), $widget_ops );
	}

	// Create widget form
  function form( $instance ) {

	  if ( isset( $instance[ 'advisor_title' ] ) ) {

			$title = $instance[ 'advisor_title' ];

		} else {

			$title = esc_html__( 'Categories', 'advisor' );


		}
		?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'advisor_title' ) ); ?>"><?php esc_html_e( 'Title:', 'advisor' ); ?></label>
			<input name="<?php echo esc_attr( $this->get_field_name( 'advisor_title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" class="widefat" />
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

		$title = apply_filters( 'widget_title', $instance[ 'advisor_title' ] );


		?>

		<?php
		if ( ! empty( $title ) ) {

			echo $before_title . esc_html( $title ) . $after_title;

		}
		?>
		<?php

		$terms = get_terms( 'category');
		if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {

		    $i = 0;

				echo '<ul class="categories">';

		    foreach ( $terms as $term ) {

						echo '<li><a href="'.esc_url( get_term_link( $term ) ).'"><i class="fa fa-angle-right"></i> ' . esc_html ( $term->name ) . '</a></li>';

		        if ( $i == 18 ) {

		            break;
		        }
						$i++;

		    }

		    echo '</ul>';
		}



		echo $after_widget;

  }

}
