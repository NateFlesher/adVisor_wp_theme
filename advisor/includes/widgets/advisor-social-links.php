<?php
/**
 * Widget: advisor - About advisor
 */

 if ( ! function_exists( 'advisor_social_links' ) ) {

	 function advisor_social_links() {
     register_widget( 'widget_advisor_social_links' );
   }
}

add_action( 'widgets_init', 'advisor_social_links' );


class widget_advisor_social_links extends WP_Widget {

	// Constructer
	public function __construct() {

		$widget_ops = array(

			'description' => esc_html__( 'Display Social Links.', 'advisor' ),
			'panels_icon' => '',

		);
		parent::__construct( 'widget_advisor_social_links', esc_html__( 'advisor - Social Links', 'advisor' ), $widget_ops );
	}

	// Create widget form
  function form( $instance ) {

    if ( isset( $instance[ 'facebook_url' ] ) ) {

			$facebook_url				= $instance[ 'facebook_url' ];

		} else {

			$facebook_url				= '';
		}

    if ( isset( $instance[ 'twitter_url' ] ) ) {

      $twitter_url				= $instance[ 'twitter_url' ];

    } else {

      $twitter_url				= '';
    }

    if ( isset( $instance[ 'google_plus_url' ] ) ) {

      $google_plus_url  	= $instance[ 'google_plus_url' ];

    } else {

      $google_plus_url		= '';
    }

    if ( isset( $instance[ 'pinterest_url' ] ) ) {

      $pinterest_url    	= $instance[ 'pinterest_url' ];

    } else {

      $pinterest_url	   	= '';
    } ?>

    <p>
      <label for="<?php echo $this->get_field_id( 'facebook_url' ); ?>"><?php esc_html_e( 'Facebook URL:', 'advisor' ); ?></label>
      <input name="<?php echo $this->get_field_name( 'facebook_url' ); ?>" type="text" value="<?php echo $facebook_url; ?>" class="widefat" />
    </p>

    <p>
      <label for="<?php echo $this->get_field_id( 'twitter_url' ); ?>"><?php esc_html_e( 'Twitter URL:', 'advisor' ); ?></label>
      <input rows="10" cols="15" name="<?php echo $this->get_field_name( 'twitter_url' ); ?>" type="text" value="<?php echo $twitter_url; ?>" class="widefat" /></input>
    </p>

    <p>
      <label for="<?php echo $this->get_field_id( 'google_plus_url' ); ?>"><?php esc_html_e( 'Google Plus URL:', 'advisor' ); ?></label>
      <input name="<?php echo $this->get_field_name( 'google_plus_url' ); ?>" type="text" value="<?php echo $google_plus_url; ?>" class="widefat" />
    </p>

    <p>
      <label for="<?php echo $this->get_field_id( 'pinterest_url' ); ?>"><?php esc_html_e( 'Pinterest URL:', 'advisor' ); ?></label>
      <input rows="10" cols="15" name="<?php echo $this->get_field_name( 'pinterest_url' ); ?>" type="text" value="<?php echo $pinterest_url; ?>" class="widefat" /></input>
    </p>

  <?php }

  // Update widget
  function update( $new_instance, $old_instance ) {

    $instance = $old_instance;
		$instance['facebook_url']      = ( ! empty( $new_instance['facebook_url'] ) ) ? strip_tags( $new_instance['facebook_url'] ) : '';
		$instance['twitter_url']       = ( ! empty( $new_instance['twitter_url'] ) ) ? strip_tags( $new_instance['twitter_url'] ) : '';
    $instance['google_plus_url']   = ( ! empty( $new_instance['google_plus_url'] ) ) ? strip_tags( $new_instance['google_plus_url'] ) : '';
		$instance['pinterest_url']     = ( ! empty( $new_instance['pinterest_url'] ) ) ? strip_tags( $new_instance['pinterest_url'] ) : '';

		return $instance;
  }

  // Display widget on frontend
  function widget( $args, $instance ) {

	  extract( $args );

		// front end
		echo $before_widget;

    $facebook_url		  = empty( $instance[ 'facebook_url' ] ) ? '' : $instance[ 'facebook_url' ];
		$twitter_url      = empty( $instance[ 'twitter_url' ] ) ? '' : $instance[ 'twitter_url' ];
    $google_plus_url 	= empty( $instance[ 'google_plus_url' ] ) ? '' : $instance[ 'google_plus_url' ];
		$pinterest_url    = empty( $instance[ 'pinterest_url' ] ) ? '' : $instance[ 'pinterest_url' ];
		?>

    <div class="social-icons_1">

      <!-- social icons -->
  		<ul>

        <!-- facebook -->
        <?php if ( ! empty( $facebook_url ) ) { ?>
        	<li>
          	<a href="<?php echo $facebook_url; ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
    			</li>
        <?php } ?>

        <!-- twitter -->
        <?php if ( ! empty( $twitter_url ) ) { ?>
          <li>
            <a href="<?php echo $twitter_url; ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
          </li>
        <?php } ?>

        <!-- google-plus -->
        <?php if ( ! empty( $google_plus_url ) ) { ?>
          <li>
            <a href="<?php echo $google_plus_url; ?>" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
          </li>
        <?php } ?>

        <!-- pinterest -->
        <?php if ( ! empty( $pinterest_url ) ) { ?>
          <li>
            <a href="<?php echo $pinterest_url; ?>" target="_blank"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
          </li>
        <?php } ?>
  	  </ul>
    </div>

		<?php echo $after_widget;

  }

}
