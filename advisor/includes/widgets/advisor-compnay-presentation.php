<?php
/**
 * Widget: Advisor - Useful Links
 */
function widget_advisor_services_presentation() {

	register_widget( 'widget_advisor_presentation' );

}
add_action( 'widgets_init', 'widget_advisor_services_presentation' );

class widget_advisor_presentation extends WP_Widget {

	// Constructer
		public function __construct() {

		$widget_ops = array(

			'description' => esc_html__( 'Company text,slogan or anything that describes services you provide.', 'advisor' ),
			'panels_icon' => '',
		);
		parent::__construct( 'widget_advisor_presentation', esc_html__( 'Advisor - Company Presentation', 'advisor' ), $widget_ops );

	}


	// Create widget form
  function form( $instance ) {

	  if ( isset( $instance[ 'advisor_title' ] )  ) {

			$title = $instance[ 'advisor_title' ];

		} else {

			$title = esc_html__( 'How can we help you?', 'advisor' );

		}
		if ( isset( $instance[ 'presenation_text' ] ) ) {

			$presenation_text = $instance[ 'presenation_text' ];


		} else {

			$presenation_text = '';

		}
		if ( isset( $instance[ 'doc_title' ] ) ) {

			$doc_title = $instance[ 'doc_title' ];

		} else {

			$doc_title = '';

		}
		if ( isset( $instance[ 'doc_url' ] ) ) {

			$doc_url = $instance[ 'doc_url' ];

		} else {

			$doc_url = '';

		}

		if ( isset( $instance[ 'button_label' ] ) ) {

			$button_label = $instance[ 'button_label' ];

		} else {

			$button_label = esc_html__( 'Contact Us', 'advisor' );

		}

		if ( isset( $instance[ 'button_url' ] ) ) {

			$button_url = $instance[ 'button_url' ];

		} else {

			$button_url = '';

		}
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'advisor_title' ); ?>"><?php esc_html_e( 'Presenation Title:', 'advisor' ); ?></label>
			<input name="<?php echo $this->get_field_name( 'advisor_title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" class="widefat" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'presenation_text' ); ?>"><?php esc_html_e( 'Presenation Text:', 'advisor' ); ?></label>
			<textarea name="<?php echo $this->get_field_name( 'presenation_text' ); ?>" class="widefat"><?php echo $presenation_text; ?></textarea>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'button_label' ); ?>"><?php esc_html_e( 'Button Label:', 'advisor' ); ?></label>
			<input name="<?php echo $this->get_field_name( 'button_label' ); ?>" type="text" value="<?php echo esc_attr( $button_label ); ?>" class="widefat" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'button_url' ); ?>"><?php esc_html_e( 'Button Link:', 'advisor' ); ?></label>
			<input name="<?php echo $this->get_field_name( 'button_url' ); ?>" type="text" value="<?php echo esc_attr( $button_url ); ?>" class="widefat" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'doc_title' ); ?>"><?php esc_html_e( 'Attachment Title:', 'advisor' ); ?></label>
			<input type="text" name="<?php echo $this->get_field_name( 'doc_title' ); ?>" value="<?php echo $doc_title; ?>" class="widefat" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'doc_url' ); ?>"><?php esc_html_e( 'Attachment URL:', 'advisor' ); ?></label>
			<input type="text" name="<?php echo $this->get_field_name( 'doc_url' ); ?>" value="<?php echo $doc_url; ?>" class="widefat" />
		</p>

		<?php
  }

  // Update widget
  function update( $new_instance, $old_instance ) {

	  $instance = $old_instance;
		$instance['advisor_title'] = ( ! empty( $new_instance['advisor_title'] ) ) ? strip_tags( $new_instance['advisor_title'] ) : '';
		$instance['presenation_text'] = ( ! empty( $new_instance['presenation_text'] ) ) ? $new_instance['presenation_text'] : '';
		$instance['doc_title'] = ( ! empty( $new_instance['doc_title'] ) ) ? strip_tags( $new_instance['doc_title'] ) : '';
		$instance['doc_url'] = ( ! empty( $new_instance['doc_url'] ) ) ? strip_tags( $new_instance['doc_url'] ) : '';
		$instance['button_label'] = ( ! empty( $new_instance['button_label'] ) ) ? strip_tags( $new_instance['button_label'] ) : '';
		$instance['button_url'] = ( ! empty( $new_instance['button_url'] ) ) ? strip_tags( $new_instance['button_url'] ) : '';

		return $instance;

  }

  // Display widget on frontend
  function widget( $args, $instance ) {

	  extract( $args );

		// front end
		echo $before_widget;

		$title = apply_filters( 'widget_title', $instance[ 'advisor_title' ] );
		$presenation_text = empty( $instance[ 'presenation_text' ] ) ? '' : $instance[ 'presenation_text' ];
		$doc_title = empty( $instance[ 'doc_title' ] ) ? '' : $instance[ 'doc_title' ];
		$doc = empty( $instance[ 'doc_url' ] ) ? '' : $instance[ 'doc_url' ];
		$button_label = empty( $instance[ 'button_label' ] ) ? '' : $instance[ 'button_label' ];
		$button_url = empty( $instance[ 'button_url' ] ) ? '' : $instance[ 'button_url' ];

		?>

		<div class="help-widget">

				<?php
				if ( ! empty( $title ) ) {

					echo $before_title . esc_html( $title ) . $after_title;

				}
				?>
				<?php if ( !empty( $presenation_text ) ) { ?>

				<p><?php echo $presenation_text;  ?></p>

				<?php } ?>

				<?php

				if ( empty ( $button_url ) ) {

					$contact_page_id = advisor_contact_us_page();
					$page_src        = get_the_permalink( $contact_page_id );
					$button_url 		 = $page_src;

				} else {
					$button_url = $button_url;
				}

		    if( !empty( $button_label )) {  ?>

				<a href="<?php echo esc_url( $button_url ); ?>" class="btn btn-primary btn-white get-in-touch" data-text="<?php echo esc_attr( $button_label ); ?>"><i class="icon-telephone114"></i><?php echo esc_html( $button_label ); ?></a>

				<?php } ?>
			</div>
			<?php if ( ! empty( $doc ) && ! empty( $doc_title )  ) { ?>

			<a href="<?php echo $doc; ?>" target="_blank" class="company-presentation-link"><i class="icon-file-pdf-o"></i> <?php echo esc_html( $doc_title ); ?> </a>

			<?php } ?>


		<?php

		echo $after_widget;

  }

}
