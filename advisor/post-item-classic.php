<?php

	$post_gallery = get_post_meta( $post->ID, 'advisor_post_gallery' );
	$publish_date = get_the_date( get_option( 'date_format' ) , $post->ID );
	$publish_date  = date_i18n( get_option( 'date_format' ), strtotime( $publish_date) );
	$get_the_title = get_the_title();
	$get_the_excerpt = get_the_excerpt();
	$post_permalink = esc_url( get_permalink( $post->ID ) );
	if( is_sticky() ) {

			  $sticky_post = '<span class="post-sticky"><i class="fa fa-star"></i> Featured</span>';
			

	} else {

			$sticky_post = '';
	}
?>
<article class="blog-item-classic">
	<div class="row">
		<div class="col-md-6 col-sm-6 animate fadeInLeft">
			<?php if ( has_post_thumbnail() && !empty ( $post_gallery  ) ) { ?>

				<div class="blog-thumbnail">
						<div class="single-item-carousel owl-carousel">

							<a href="<?php echo esc_url( get_permalink( $post->ID ) ); ?>"><?php the_post_thumbnail( array( 555 , 433) ); ?></a>

							<?php foreach ($post_gallery as $img_id) { ?>

							<a href="<?php echo esc_url( get_permalink( $post->ID ) ); ?>"><img alt="" src="<?php echo esc_attr( wp_get_attachment_url( $img_id , array( 555 , 433) ) ); ?>"></a>

							<?php } ?>

						</div>
					</div>

			<?php } else  { ?>

				<?php if ( has_post_thumbnail() ) { ?>
				<div class="blog-thumbnail">

					<?php the_post_thumbnail( array( 555 , 433 ) ); ?>

				</div>

				<?php } ?>

				<?php } ?>

		</div>
		<div class="col-md-6 col-sm-6 animate fadeInRight">

			<div class="blog-content">

				<div class="blog-date"><a href="<?php echo esc_url( $post_permalink ); ?>"><?php echo $publish_date; ?></a></div>

				<h3><a href="<?php echo esc_url( $post_permalink ); ?>"><?php echo esc_html( $get_the_title ); ?></a><?php echo ' '.$sticky_post; ?></h3>

				<p><?php echo $get_the_excerpt; ?></p>

				<a href="<?php echo esc_url( $post_permalink ); ?>" class="btn-link"><?php esc_html_e( 'Continue Reading' , 'advisor'); ?></a>
			</div>
		</div>
	</div>
</article>
