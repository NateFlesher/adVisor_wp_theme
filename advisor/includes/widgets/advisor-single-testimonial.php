<?php
/**
 * Widget: Advisor - Useful Links
 */
function widget_advisor_single_testimonial() {

	register_widget( 'widget_advisor_single_testimonial' );

}
add_action( 'widgets_init', 'widget_advisor_single_testimonial' );

class widget_advisor_single_testimonial extends WP_Widget {

	// Constructer
	public function __construct() {

		$widget_ops = array(


			'description' => esc_html__( 'Testimonial, you can add single testimonials from the list.', 'advisor' ),
			'panels_icon' => '',



		);
		parent::__construct( 'widget_advisor_single_testimonial', esc_html__( 'Advisor - Single Testimonial', 'advisor' ), $widget_ops );
	}

	// Create widget form
  function form( $instance ) {

	  if (  isset ( $instance[ 'advisor_testimonial' ] ) ) {

			$advisor_testimonial  = $instance[ 'advisor_testimonial' ];


		} else {

			$advisor_testimonial = '';


		}
		$args_all = array(

		 'post_type' 			=> 'testimonial',
		 'orderby'  		 		=> 'date',
		 'order'     			=> 'desc',
		 'posts_per_page' 	=> -1,

	 );

		 $advisor_testimonials = new WP_Query( $args_all );

		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'advisor_testimonial' ); ?>"><?php esc_html_e( 'Testimonial By:', 'advisor' ); ?></label>
			<select name="<?php echo $this->get_field_name( 'advisor_testimonial' ); ?>" type="text" value="<?php echo $advisor_testimonial; ?>" class="widefat">

				<?php


					  while ( $advisor_testimonials->have_posts() ) : $advisor_testimonials->the_post(); ?>

						<option <?php selected( $instance['advisor_testimonial'], get_the_ID() ); ?> value="<?php echo get_the_ID(); ?>"><?php echo esc_html( get_the_title() ); ?></option>

				<?php

			endwhile;
			wp_reset_postdata();

				?>
			</select>
		</p>



		<?php
  }

  // Update widget
  function update( $new_instance, $old_instance ) {

	  $instance = $old_instance;
		$instance['advisor_testimonial'] = ( ! empty( $new_instance['advisor_testimonial'] ) ) ? strip_tags( $new_instance['advisor_testimonial'] ) : '';


		return $instance;

  }

  // Display widget on frontend
  function widget( $args, $instance ) {

	  extract( $args );

		// front end
		echo $before_widget;


		$advisor_testimonial = empty( $instance[ 'advisor_testimonial' ] ) ? 'No Testimonial Selected' : $instance[ 'advisor_testimonial' ];
		$client_designation  = get_post_meta( $advisor_testimonial, 'advisor_client_designation', true );
		$client_name  			 = get_the_title ( $advisor_testimonial );
		$client_feedback     = get_post_meta($advisor_testimonial, 'advisor_client_feedback', true );
		$client_thumbnail 	 = get_the_post_thumbnail(  $advisor_testimonial , array(100,100) , array( 'class' => 'img-circle' ));

		?>

		<div class="testimonial">
				<div class="testimonial-content">
					<h5><?php _e( 'Testimonial', 'advisor'); ?></h5>
					<p><?php echo esc_html( $client_feedback , 'advisor' ); ?></p>
				</div>


				<div class="testimonials-author">
					<?php echo $client_thumbnail; ?>
					<p><?php echo esc_html( $client_name ); ?><span>( <?php echo esc_html( $client_designation ); ?> )</span></p>
				</div>


	 </div>



		<?php

		echo $after_widget;

  }

}
