<?php

$post_gallery = get_post_meta( $post->ID, 'advisor_post_gallery' );
$post_bordered = get_post_meta( $post->ID, 'advisor_post_bordered' , true );
$publish_date = get_the_date( get_option( 'date_format' ) , $post->ID );
$publish_date  = date_i18n( get_option( 'date_format' ), strtotime( $publish_date) );
$post_format = get_post_format( $post->ID );

$author_id 		= $post->post_author;
$author_image = get_user_meta( $author_id , 'advisor_user_avatar' , true );
$author_image = wp_get_attachment_url( $author_image , array(42,42) , true );
$get_the_author = get_the_author();
$get_the_title = get_the_title();
$get_the_excerpt = get_the_excerpt();
$post_permalink = esc_url( get_permalink( $post->ID ) );
if( is_sticky() ) {

    $sticky_post = '<span class="post-sticky"><i class="fa fa-star"></i>'. esc_html__('Featured','advisor'). '</span>';


} else {

    $sticky_post = '';
}
 ?>

<article class="blog-item <?php if( $post_bordered == true ) { echo 'bordered'; } ?> <?php post_class(); ?>">

	<?php if ( has_post_thumbnail() && !empty ( $post_gallery  ) ) { ?>

		<div class="blog-thumbnail">
				<div class="single-item-carousel owl-carousel">

					<a href="<?php echo esc_url( get_permalink( $post->ID ) ); ?>"><?php the_post_thumbnail( array( 750 , 421) ); ?></a>

					<?php foreach ($post_gallery as $img_id) { ?>

					<a href="<?php echo esc_url( get_permalink( $post->ID ) ); ?>"><img alt="" src="<?php echo esc_attr( wp_get_attachment_url( $img_id , array( 750 , 421) ) ); ?>"></a>

					<?php } ?>

				</div>
			</div>

	<?php } else  { ?>

    <?php if ( has_post_thumbnail() ) { ?>
    <div class="blog-thumbnail">

      <?php the_post_thumbnail( array( 750 , 421) ); ?>

    </div>

    <?php } ?>

    <?php } ?>

	<ul class="blog-meta">

		<li>
		<?php	if ( !empty( $author_image ) )  {  ?>

			<img alt="" src="<?php echo esc_attr( $author_image ); ?>">

		<?php } ?>

			<span><?php echo esc_html( $get_the_author ); ?></span>

		</li>

		<li>
			<i class=" icon-clock"></i><a href="<?php echo esc_url( $post_permalink ); ?>"><?php echo $publish_date; ?></a>
		</li>
			<?php

			if ( comments_open() ) {

				$comments = wp_count_comments( $post->ID );
				$num_comments = $comments->approved ;

				if ( $num_comments == 0 ) {

					$comments = esc_html__('0 Comments' , 'advisor');

				} elseif ( $num_comments > 1 ) {

					$comments = $num_comments . esc_html__(' Comments' , 'advisor');

				} else {

					$comments = esc_html__('1 Comment' , 'advisor');

				}

				$write_comments = '<a href="' . get_comments_link() .'"><i class="icon-chat-1"></i>'. $comments.'</a>';

				?>

				<li>

				<?php echo $write_comments; ?>

			</li>

		<?php 	} ?>

 	</ul>
	<div class="blog-content">
		<h3 class="blog-title"><a href="<?php echo esc_url( $post_permalink ); ?>"><?php echo esc_html( $get_the_title ); ?></a><?php echo ' '.$sticky_post; ?></h3>
		<p><?php echo $get_the_excerpt; ?></p>
		<a href="<?php echo esc_url( $post_permalink ); ?>" class="btn-link"><?php esc_html_e( 'Continue Reading' , 'advisor'); ?></a>
	</div>
</article>
