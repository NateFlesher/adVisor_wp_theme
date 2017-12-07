<?php
/**
 * Widget: Advisor - Useful Links
 */
function widget_advisor_recentposts() {

	register_widget( 'widget_advisor_recent_posts' );

}
add_action( 'widgets_init', 'widget_advisor_recentposts' );

class widget_advisor_recent_posts extends WP_Widget {

	// Constructer
	public function __construct() {

		$widget_ops = array(


			'description' => esc_html__( 'Recent posts for your blog.', 'advisor' ),
			'panels_icon' => '',


		);
		parent::__construct( 'widget_advisor_recent_posts', esc_html__( 'Advisor - Recent Posts', 'advisor' ), $widget_ops );
	}

	// Create widget form
  function form( $instance ) {

	  if ( isset( $instance[ 'advisor_title' ] ) && isset( $instance[ 'post_count' ] ) ) {

			$post_count = $instance[ 'post_count' ];
			$title = $instance[ 'advisor_title' ];

		} else {

			$title = esc_html__( 'Recent Posts', 'advisor' );
			$post_count = 3;

		}
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'advisor_title' ); ?>"><?php esc_html_e( 'Title:', 'advisor' ); ?></label>
			<input name="<?php echo $this->get_field_name( 'advisor_title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" class="widefat" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'post_count' ); ?>"><?php esc_html_e( 'Number of Posts:', 'advisor' ); ?></label>
			<input name="<?php echo $this->get_field_name( 'post_count' ); ?>" type="number" min="1" max="10" value="<?php echo $post_count; ?>" class="widefat" />

		</p>

		<?php
  }

  // Update widget
  function update( $new_instance, $old_instance ) {

	  $instance = $old_instance;
		$instance['advisor_title'] = ( ! empty( $new_instance['advisor_title'] ) ) ? strip_tags( $new_instance['advisor_title'] ) : '';
		$instance['post_count'] = ( ! empty( $new_instance['post_count'] ) ) ? strip_tags( $new_instance['post_count'] ) : '';

		return $instance;

  }

  // Display widget on frontend
  function widget( $args, $instance ) {

	  extract( $args );

		// front end
		echo $before_widget;

		$title = apply_filters( 'widget_title', $instance[ 'advisor_title' ] );
		$post_count = empty( $instance[ 'post_count' ] ) ? 3 : $instance[ 'post_count' ];

		?>

		<?php
		if ( ! empty( $title ) ) {


			echo '<h4 class="footer_box_1_title">' . esc_html( $title ) . '</h4>';

		}
		$args = array(

    'numberposts' => $post_count,
		'orderby'			=> 'post_date',
    'order' 			=> 'DESC',
    'post_type' 	=> 'post',
    'post_status' => 'publish',

    );

    $recent_posts = wp_get_recent_posts( $args, ARRAY_A );
		?>
		<?php if( is_array( $recent_posts ) ) { ?>

				<?php
			foreach ( $recent_posts as $recent ) {

				$post_thumb	 = get_the_post_thumbnail(  $recent['ID'] , array(71,63) );
				$post_title	 = get_the_title( $recent['ID'] );
				$time_ago = human_time_diff( get_the_time('U' , $recent['ID'] ), current_time('timestamp') ) . ' ago';


				 ?>
				<article class="popular-post">

					<?php if( !empty( $post_thumb ) ) { ?>

					<?php echo $post_thumb; ?>

					<?php } ?>
					<?php if( !empty( $post_title ) ) { ?>

						<h4><a href="<?php echo esc_url( get_permalink( $recent['ID'] )); ?>"><?php echo esc_html( $post_title ); ?></a></h4>

					<?php } ?>

					<p class="popular-date"><?php echo $time_ago; ?></p>

				</article>

				<?php }

				wp_reset_postdata();

				}
				?>
		<?php

		echo $after_widget;

  }

}
