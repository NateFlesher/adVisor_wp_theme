<?php
/**
 * Widget: Advisor - Useful Links
 */
function widget_advisor_useful_links() {

	register_widget( 'widget_advisor_links' );

}
add_action( 'widgets_init', 'widget_advisor_useful_links' );

class widget_advisor_links extends WP_Widget {

	// Constructer
	public function __construct() {

		$widget_ops = array(

			'description' => esc_html__( 'Useful Links', 'advisor' ),
			'panels_icon' => '',

		);
		parent::__construct( 'widget_advisor_links', esc_html__( 'Advisor - Useful Links', 'advisor' ), $widget_ops );
	}

	// Create widget form
  function form( $instance ) {

	  if ( isset( $instance[ 'advisor_title' ] ) && isset ( $instance[ 'advisor_footer_menu' ] ) ) {

			$advisor_menu = $instance[ 'advisor_footer_menu' ];
			$title = $instance[ 'advisor_title' ];

		} else {

			$title = esc_html__( 'Useful Links', 'advisor' );
			$advisor_menu = '';

		}
		$all_menus =  array();
		$all_menus = get_terms('nav_menu');
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'advisor_title' ); ?>"><?php esc_html_e( 'Title:', 'advisor' ); ?></label>
			<input name="<?php echo $this->get_field_name( 'advisor_title' ); ?>" type="text" value="<?php echo esc_attr( $title );?>" class="widefat" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'advisor_footer_menu' ); ?>"><?php esc_html_e( 'Select Menu:', 'advisor' ); ?></label>
			<select name="<?php echo $this->get_field_name( 'advisor_footer_menu' ); ?>" value="<?php echo $advisor_menu;?>" class="widefat">

				<?php
				if ( ! empty( $all_menus ) && !is_wp_error( $all_menus ) ){

					foreach( $all_menus as $onemenu ) { ?>

						<option <?php selected( $instance['advisor_footer_menu'], $onemenu->slug); ?> value="<?php echo $onemenu->slug; ?>"><?php echo esc_html( $onemenu->name ); ?></option>

				<?php

					}
				}
				?>
			</select>
		</p>

		<?php
  }

  // Update widget
  function update( $new_instance, $old_instance ) {

	  $instance = $old_instance;
		$instance['advisor_title'] = ( ! empty( $new_instance['advisor_title'] ) ) ? strip_tags( $new_instance['advisor_title'] ) : '';
		$instance['advisor_footer_menu'] = ( ! empty( $new_instance['advisor_footer_menu'] ) ) ? strip_tags( $new_instance['advisor_footer_menu'] ) : '';

		return $instance;

  }

  // Display widget on frontend
  function widget( $args, $instance ) {

	  extract( $args );

		// front end
		echo $before_widget;

		$title = apply_filters( 'widget_title', $instance[ 'advisor_title' ] );
		$footer_menu = empty( $instance[ 'advisor_footer_menu' ] ) ? 'main-menu' : $instance[ 'advisor_footer_menu' ];
    ?>

		<div class="usefull-links-widget clearfix">
		<?php
		if ( ! empty( $title ) ) {

			echo '<h4 class="footer_box_1_title">' . esc_html( $title ) . '</h4>';

		}
		?>
		<?php
		$footer_menu_items = array();
		$footer_menu_items = wp_get_nav_menu_items( $footer_menu );
		$i = 0;
		foreach( $footer_menu_items as $item ) {

			if( $i == 0 || $i == 6 ) {

				echo '<ul>';

			}
				echo '<li><a href="'.$item->url.'">'.$item->title.'</a></li>';

			if( $i == 5 ) {

				echo '</ul>';

			}
			if( $i == 11 ) {

				break;

			}
			$i++;
		}
		if( $i/5 != 0  ) {

		echo '</ul>';

		}

		?>


	</div>
		<?php

		echo $after_widget;

  }

}
