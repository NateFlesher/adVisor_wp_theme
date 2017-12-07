<?php
/**
 * Widget: advisor - get in touch
 */

 if ( ! function_exists( 'advisor_get_in_touch' ) ) {

	 function advisor_get_in_touch() {
     register_widget( 'widget_advisor_get_in_touch' );
   }
}

add_action( 'widgets_init', 'advisor_get_in_touch' );


class widget_advisor_get_in_touch extends WP_Widget {

	// Constructer
	public function __construct() {

		$widget_ops = array(

			'description' => esc_html__( 'Get in Touch.', 'advisor' ),
			'panels_icon' => '',

		);
		parent::__construct( 'widget_advisor_get_in_touch', esc_html__( 'Advisor - Get in Touch', 'advisor' ), $widget_ops );
	}

	// Create widget form
  function form( $instance ) {


	  if ( isset( $instance[ 'advisor_title' ] ) ) {

			$title = $instance[ 'advisor_title' ];

		} else {

			$title = __( 'Get in Touch', 'advisor' );


		}

    if ( isset( $instance[ 'phone_no' ] ) ) {

			$phone_no				= $instance[ 'phone_no' ];

		} else {

			$phone_no				= '';
		}

    if ( isset( $instance[ 'email' ] ) ) {

      $email				= $instance[ 'email' ];

    } else {

      $email				= '';
    }

    if ( isset( $instance[ 'office_timing' ] ) ) {

      $office_timing  	= $instance[ 'office_timing' ];

    } else {

      $office_timing		= '';
    }

    if ( isset( $instance[ 'comapny_address' ] ) ) {

      $comapny_address    	= $instance[ 'comapny_address' ];

    } else {

      $comapny_address	   	= '';
    } ?>

    <p>
      <label for="<?php echo $this->get_field_id( 'advisor_title' ); ?>"><?php esc_html_e( 'Title:', 'advisor' ); ?></label>
      <input name="<?php echo $this->get_field_name( 'advisor_title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" class="widefat" />
    </p>

    <p>
      <label for="<?php echo $this->get_field_id( 'phone_no' ); ?>"><?php esc_html_e( 'Phone #:', 'advisor' ); ?></label>
      <input name="<?php echo $this->get_field_name( 'phone_no' ); ?>" type="text" value="<?php echo $phone_no; ?>" class="widefat" />
    </p>

    <p>
      <label for="<?php echo $this->get_field_id( 'email' ); ?>"><?php esc_html_e( 'Email Address:', 'advisor' ); ?></label>
      <input rows="10" cols="15" name="<?php echo $this->get_field_name( 'email' ); ?>" type="text" value="<?php echo $email; ?>" class="widefat" /></input>
    </p>

    <p>
      <label for="<?php echo $this->get_field_id( 'office_timing' ); ?>"><?php esc_html_e( 'Office Time & Working Day:', 'advisor' ); ?></label>
      <input name="<?php echo $this->get_field_name( 'office_timing' ); ?>" type="text" value="<?php echo $office_timing; ?>" class="widefat" />
    </p>

    <p>
      <label for="<?php echo $this->get_field_id( 'comapny_address' ); ?>"><?php esc_html_e( 'Comapny Address:', 'advisor' ); ?></label>
      <input rows="10" cols="15" name="<?php echo $this->get_field_name( 'comapny_address' ); ?>" type="text" value="<?php echo $comapny_address; ?>" class="widefat" /></input>
    </p>

  <?php }

  // Update widget
  function update( $new_instance, $old_instance ) {

    $instance = $old_instance;

    $instance['advisor_title'] = ( ! empty( $new_instance['advisor_title'] ) ) ? strip_tags( $new_instance['advisor_title'] ) : '';
		$instance['phone_no']      = ( ! empty( $new_instance['phone_no'] ) ) ? strip_tags( $new_instance['phone_no'] ) : '';
		$instance['email']       = ( ! empty( $new_instance['email'] ) ) ? strip_tags( $new_instance['email'] ) : '';
    $instance['office_timing']   = ( ! empty( $new_instance['office_timing'] ) ) ? strip_tags( $new_instance['office_timing'] ) : '';
		$instance['comapny_address']     = ( ! empty( $new_instance['comapny_address'] ) ) ? strip_tags( $new_instance['comapny_address'] ) : '';

		return $instance;
  }

  // Display widget on frontend
  function widget( $args, $instance ) {

	  extract( $args );

		// front end
		echo $before_widget;

    $title = $instance[ 'advisor_title' ];
    $phone_no		  = empty( $instance[ 'phone_no' ] ) ? '' : $instance[ 'phone_no' ];
		$email      = empty( $instance[ 'email' ] ) ? '' : $instance[ 'email' ];
    $office_timing 	= empty( $instance[ 'office_timing' ] ) ? '' : $instance[ 'office_timing' ];
		$comapny_address    = empty( $instance[ 'comapny_address' ] ) ? '' : $instance[ 'comapny_address' ];
		?>

      <?php if ( ! empty( $title ) ) { ?>
        <h3><?php echo $title; ?></h3>
      <?php } ?>

      <?php if ( ! empty( $phone_no ) ) { ?>
      	<p><i class="icon-telephone114"></i><?php echo $phone_no; ?></p>
      <?php } ?>

      <?php if ( ! empty( $email ) ) { ?>
        <p><i class="icon-icons142"></i><?php echo $email; ?></p>
      <?php } ?>

      <?php if ( ! empty( $office_timing ) ) { ?>
        <p><i class="icon-alarmclock"></i><?php echo $office_timing; ?></p>
      <?php } ?>

      <?php if ( ! empty( $comapny_address ) ) { ?>
        <p><i class="icon-icons74"></i><?php echo $comapny_address; ?></p>
      <?php } ?>

    </div>

		<?php echo $after_widget;

  }

}
