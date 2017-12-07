<?php
/**
 * Widget: Advisor - Useful Links
 */
function widget_advisor_post_tags() {

	register_widget( 'widget_advisor_tags' );

}
add_action( 'widgets_init', 'widget_advisor_post_tags' );

class widget_advisor_tags extends WP_Widget {

	// Constructer
	public function __construct() {

		$widget_ops = array(


			'description' => esc_html__( 'Advisor Post Tags', 'advisor' ),
			'panels_icon' => '',



		);
		parent::__construct( 'widget_advisor_tags', esc_html__( 'Advisor - Post Tags', 'advisor' ), $widget_ops );
	}

	// Create widget form
  function form( $instance ) {

	  if ( isset( $instance[ 'advisor_title' ] ) ) {

			$title = $instance[ 'advisor_title' ];

		} else {

			$title = esc_html__( 'Tags', 'advisor' );


		}
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'advisor_title' ); ?>"><?php esc_html_e( 'Title:', 'advisor' ); ?></label>
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

		$title = apply_filters( 'widget_title', $instance[ 'advisor_title' ] );


		?>

		<?php
		if ( ! empty( $title ) ) {

			echo $before_title . esc_html( $title ) . $after_title;

		}
		?>
		<?php if( is_singular( 'post' ) ) {


			the_tags( '<ul class="tags"><li>', '</li><li>', '</li></ul>');


		} else {

			$tags = get_tags();
			echo '<ul class="tags">';
			if( !empty( $tags ) ) {

					foreach ( $tags as $tag ) {

					$tag_link = get_tag_link( $tag->term_id );

					echo '<li><a href="' . $tag_link.'"> ' . $tag->name . '</a></li>' ;


					}


				}



			}

			echo $after_widget;

	}

}
