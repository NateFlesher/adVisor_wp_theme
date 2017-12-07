<?php
if ( ! function_exists( 'advisor_page_banner' ) ) {

	function advisor_page_banner( $button_label = '', $button_link = '', $enable_breadcurmbs = 1, $font_color = '', $background_color = '', $background_img = ''){

			if ( !empty( $background_color ) ) { ?>
				<style>
				.subpage-header{
					background: <?php echo $background_color; ?>;
				}
				</style>

			<?php } ?>
			<?php if ( !empty( $font_color ) ) { ?>
				<style>
				.breadcrumbs li{
					color: <?php echo $font_color; ?>;
				}
				.site-title h2{
					color: <?php echo $font_color; ?>;
				}

				</style>

			<?php } ?>
			<?php	if ( !empty( $background_img ) ) { ?>
				<style>
				.subpage-header{
					background: url(<?php echo $background_img; ?>);
					background-repeat: no-repeat;
					background-size: cover;

				}
				</style>

			<?php }

			global $post;
			$page_id = '';
			if( is_object ( $post ) ) {

				$page_id = $post->ID;

			} else {

				$page_id = get_the_ID();

			}
			ob_start();
			?>
			<section class="subpage-header">
				<div class="container">
					<div class="site-title clearfix">
					<h2>
					<?php	if ( is_category() ) {

									$single_cat_title = single_cat_title('', false);
									echo esc_html( $single_cat_title );

				 				} else if ( is_tag() ) {

									$single_cat_title = single_cat_title('', false);
									echo esc_html( $single_cat_title );


								} else if ( is_search() ) {


 									echo esc_html__('Search Results' , 'advisor');


								} else if( is_home() ) {

									$page_blog = get_option( 'page_for_posts' );
									if( empty( $page_blog ) ) {

										echo esc_html__('News' , 'advisor');

									} else {

										$page_id = $page_blog;
										$get_the_title =  get_the_title( $page_id );
										echo esc_html( $get_the_title );

									}

								} else {

									$get_the_title =  get_the_title( $page_id );
									echo esc_html( $get_the_title );

								}

					?>
					</h2>

						<?php
						if( $enable_breadcurmbs ==  1 ) {

								advisor_breadcrumbs();

						} else{

							echo '<style>.site-title h2:after{ display: none; }</style>';

						}
						?>
					</div>
					<?php if( !empty( $button_label ) && !empty( $button_link ) ) { ?>

					<a href="<?php echo esc_url( $button_link  ); ?>" class="btn btn-primary get-in-touch" data-text="<?php echo esc_attr( $button_label ); ?>"><i class="icon-telephone114"></i><?php echo esc_html( $button_label ); ?></a>

					<?php } ?>
				</div>
			</section>

		<?php

		 return ob_get_clean();
	}
}
?>
