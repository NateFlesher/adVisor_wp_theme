<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Advisor
 */

get_header(); ?>

<?php
global $post;
$top_layout = get_post_meta( $post->ID , 'advisor_page_top_layout', true ); ?>

<?php  get_template_part('includes/widgets/pagetop','layout'); ?>


<?php
// page banner
// advisor_template_banner();

?>

<?php

$post_gallery = get_post_meta( $post->ID, 'advisor_post_gallery' );
$post_author = $post->post_author;
$author_name = get_the_author();
$author_bio = get_the_author_meta( 'description' , $post_author );
$author_image = get_user_meta( $post_author , 'advisor_user_avatar' , true );
$author_designation = get_user_meta( $post_author , 'advisor_user_designation' , true );
$author_image = wp_get_attachment_url( $author_image , array(136,136) , false );
$get_the_title = get_the_title();
?>
<section>
<div class="container">
<div class="row">
<div class="col-md-8 animate fadeInLeft">
	<div class="p-right-30">
	<article class="blog-item">

		<?php if ( has_post_thumbnail() && !empty ( $post_gallery  ) ) { ?>

			<div class="blog-thumbnail">
					<div class="single-item-carousel owl-carousel">

						<?php the_post_thumbnail( array( 750 , 421) ); ?>

						<?php foreach ($post_gallery as $img_id) { ?>

						<img alt="" src="<?php echo esc_attr( wp_get_attachment_url( $img_id , array( 800 , 400) ) ); ?>">

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

		<div class="blog-content">

			<h3 class="blog-title"><a href="#"><?php echo esc_html( $get_the_title ); ?></a></h3>
			<?php if ( have_posts() ) { while ( have_posts() ) : the_post();
			  the_content();
			endwhile;
		}?>

			<?php wp_link_pages(); ?>
			<div class="clearall"></div>
			<h4><?php _e( 'Share this post?' , 'advisor' ); ?></h4>
			<a href="https://www.facebook.com/share.php?u=<?php echo esc_url( get_permalink() ); ?>" target="_blank"><i class="icon-facebook-1"></i></a>
			<a href="https://twitter.com/share?text=<?php the_title(); ?>&url=<?php echo esc_url( get_permalink() ); ?>" target="_blank"><i class="icon-twitter-1"></i></a>
			<a href="https://plus.google.com/share?url=<?php echo esc_url( get_permalink() ); ?>" target="_blank"><i class="icon-google"></i></a>
			<?php
			if ( has_post_thumbnail() ) {

				$attachment_id =  get_post_thumbnail_id();
				$attachment_array = wp_get_attachment_image_src( $attachment_id );

			?>
			<a href="https://pinterest.com/pin/create/button/?url=<?php echo esc_url( get_permalink() ); ?>&media=<?php echo $attachment_array[0]; ?>&description=<?php echo strip_tags( get_the_excerpt() ); ?>" target="_blank"><i class="icon-pinterest"></i></a>
			<?php } ?>

		</div>

	</article>

	<div class="blog-review-border">
		<div class="blog-review">

		<?php if( !empty( $author_image ) ) { ?>

						<img src="<?php echo esc_attr( $author_image ); ?>" alt="" class="animate fadeInLeft">

			<?php } ?>
				<?php	if( !empty( $author_name) ) { ?>

			<div class="blog-review-content">

				<h5><?php echo $author_name; ?><span><?php echo esc_html( $author_designation ); ?></span></h5>
					<?php	if( !empty( $author_bio ) ) { ?>

						<p><?php echo $author_bio; ?> </p>

						<?php } ?>


			</div>
			<?php } ?>
		</div>
	</div>
	<?php
		// If comments are open or we have at least one comment, load up the comment template.
	 if ( comments_open() || get_comments_number() ) :

	     comments_template();

	 endif;

	 ?>

	</div>

</div>

<aside class="col-md-4 animate fadeInRight">

	<?php if ( is_active_sidebar( 'advisor_sidebar_blog' ) ) : ?>

		<?php dynamic_sidebar( 'advisor_sidebar_blog' ); ?>

	<?php endif; ?>

</aside>

</div>

</div>
</section>
<!-- / NEWS CONTENT -->


<?php if( $top_layout == '') {

	echo '</section></div>';

} ?>


<?php get_footer(); ?>
