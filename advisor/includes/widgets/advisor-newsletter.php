<?php
/**
 * Widget: Advisor - Useful Links
 */
function widget_advisor_newsletter_feed() {

	register_widget( 'widget_advisor_newsletter' );

}
add_action( 'widgets_init', 'widget_advisor_newsletter_feed' );

class widget_advisor_newsletter extends WP_Widget {

	// Constructer
	public function __construct() {

		$widget_ops = array(


			'description' => esc_html__( 'Newsletter', 'advisor' ),
			'panels_icon' => '',


		);
		parent::__construct( 'widget_advisor_newsletter', esc_html__( 'Advisor - Newsletter', 'advisor' ), $widget_ops );
	}

	// Create widget form
  function form( $instance ) {

	  if ( isset( $instance[ 'advisor_title' ]  ) ) {

			$title = $instance[ 'advisor_title' ];

		} else {

			$title = esc_html__( 'Newsletter', 'advisor' );

		}
		if ( isset( $instance[ 'news_text' ]  ) ) {

			$text = $instance[ 'news_text' ];

		} else {

			$text = '';

		}
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'advisor_title' ); ?>"><?php esc_html_e( 'Title:', 'advisor' ); ?></label>
			<input name="<?php echo $this->get_field_name( 'advisor_title' ); ?>" type="text" value="<?php echo esc_attr( $title );?>" class="widefat" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'news_text' ); ?>"><?php esc_html_e( 'Small Text:', 'advisor' ); ?></label>
			<input name="<?php echo $this->get_field_name( 'news_text' ); ?>" type="text" value="<?php echo esc_attr( $text );?>" class="widefat" />
		</p>

		<?php
  }

  // Update widget
  function update( $new_instance, $old_instance ) {

	  $instance = $old_instance;
		$instance['advisor_title'] = ( ! empty( $new_instance['advisor_title'] ) ) ? strip_tags( $new_instance['advisor_title'] ) : '';
		$instance['news_text'] = ( ! empty( $new_instance['news_text'] ) ) ? strip_tags( $new_instance['news_text'] ) : '';


		return $instance;

  }

  // Display widget on frontend
  function widget( $args, $instance ) {

	  extract( $args );

		global $advisor_options;

		// front end
		echo $before_widget;

		$title = apply_filters( 'widget_title', $instance[ 'advisor_title' ] );
		$newsletter_text = empty( $instance[ 'news_text' ] ) ? '' : $instance[ 'news_text' ];

		?>
		<div class="newsletter-widget">

		<?php
		if ( ! empty( $title ) ) {

			echo $before_title . esc_html( $title ) . $after_title;

		}
		?>
		<p><?php echo esc_html( $newsletter_text ); ?></p>
		<form id="newsletter_form">
				<input id="nl_user_name" name="nl_user_name" type="text" placeholder="<?php _e( 'Your Name', 'advisor'); ?>">
				<input id="nl_email" name="nl_email" type="text" placeholder="<?php _e( 'Email Address', 'advisor'); ?>">
				<input id="nonce" type="hidden" name="nonce" value="<?php echo wp_create_nonce(); ?>" />

				<button id="newsletter_submit" data-text="<?php _e( 'Submit', 'advisor'); ?>" class="btn btn-primary"><?php _e( 'Submit', 'advisor'); ?></button>
		</form>
		<div class="nl_notify" style="margin-top: 12px; font-size: initial;"></div>

		<?php advisor_social_circles(); ?>

		</div>
		<?php

		echo $after_widget;

  }

}
