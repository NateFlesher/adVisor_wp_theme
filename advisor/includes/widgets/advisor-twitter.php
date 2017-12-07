<?php
/**
 * Widget: Advisor - Useful Links
 */
function widget_advisor_twitter_feed() {

	register_widget( 'widget_advisor_twitter' );

}
add_action( 'widgets_init', 'widget_advisor_twitter_feed' );

class widget_advisor_twitter extends WP_Widget {

	// Constructer
	public function __construct() {

		$widget_ops = array(


			'description' => esc_html__( 'Twitter Feed , create here https://twitter.com/settings/widgets', 'advisor' ),
			'panels_icon' => '',


		);
		parent::__construct( 'widget_advisor_twitter', esc_html__( 'Advisor - Twitter Feeds', 'advisor' ), $widget_ops );
	}

	// Create widget form
  function form( $instance ) {

	  if ( isset( $instance[ 'advisor_title' ] ) && isset ( $instance[ 'advisor_twitter_user' ] ) ) {

			$advisor_twitter = $instance[ 'advisor_twitter_user' ];
			$title = $instance[ 'advisor_title' ];

		} else {

			$title = esc_html__( 'Twitter Feeds', 'advisor' );
			$advisor_twitter = 'advisortheme';

		}
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'advisor_title' ); ?>"><?php esc_html_e( 'Title:', 'advisor' ); ?></label>
			<input name="<?php echo $this->get_field_name( 'advisor_title' ); ?>" type="text" value="<?php echo esc_attr( $title );?>" class="widefat" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'advisor_twitter_user' ); ?>"><?php esc_html_e( 'Twitter Username:', 'advisor' ); ?></label>
			<input name="<?php echo $this->get_field_name( 'advisor_twitter_user' ); ?>" type="text" value="<?php echo $advisor_twitter;?>" class="widefat" />

		</p>

		<?php
  }

  // Update widget
  function update( $new_instance, $old_instance ) {

	  $instance = $old_instance;
		$instance['advisor_title'] = ( ! empty( $new_instance['advisor_title'] ) ) ? strip_tags( $new_instance['advisor_title'] ) : '';
		$instance['advisor_twitter_user'] = ( ! empty( $new_instance['advisor_twitter_user'] ) ) ? strip_tags( $new_instance['advisor_twitter_user'] ) : '';

		return $instance;

  }

  // Display widget on frontend
  function widget( $args, $instance ) {

	  extract( $args );

		// front end
    global $advisor_options;
		echo $before_widget;

		$title = apply_filters( 'widget_title', $instance[ 'advisor_title' ] );
		$twitter_user = empty( $instance[ 'advisor_twitter_user' ] ) ? 'advisortheme' : $instance[ 'advisor_twitter_user' ];

		?>
    <div class="usefull-links-widget clearfix">
		<?php
		if ( ! empty( $title ) ) {

			echo $before_title . esc_html( $title ) . $after_title;

		}
		?>
		<a class="twitter-timeline" data-theme="<?php if  ( !empty( $advisor_options['advisor-footer-color'] ) ){ echo $advisor_options['advisor-footer-color']; } ?>" data-chrome="transparent noscrollbar noheader nofooter noborders" data-width="330" data-height="218" href="https://twitter.com/<?php echo $twitter_user; ?>">Tweets by <?php echo esc_html( $twitter_user ); ?></a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>

		</div>
		<?php

		echo $after_widget;

  }

}
