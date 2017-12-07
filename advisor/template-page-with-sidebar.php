<?php
/*
 * Template Name: Page With Sidebar
*/

get_header(); ?>

<?php
global $post;
$top_layout = get_post_meta( $post->ID , 'advisor_page_top_layout', true );
$sidebar_layout = get_post_meta( $post->ID , 'advisor_page_sidebar', true ); ?>

<!-- add css for the visual composer elements -->
<?php  if(!empty(advisor_vc_row_element_css())){ ?>
<style><?php echo advisor_vc_row_element_css(); ?></style>
<?php } ?>

<?php get_template_part('includes/widgets/pagetop','layout'); ?>

<!-- SERVICES CONTENT -->
<section>
	<div class="container">

		<div class="row p-t-35">

			<?php if ( empty( $sidebar_layout ) || $sidebar_layout == 'sidebar-left' ) { ?>

			<?php if ( is_active_sidebar( 'advisor_sidebar_services' ) ) : ?>

			<div class="col-md-4 col-sm-4 col-xs-12 animate fadeInLeft">
				<aside>
            <?php dynamic_sidebar( 'advisor_sidebar_services' ); ?>
				</aside>
			</div>
			<?php endif; ?>
			<div class="col-md-8 col-sm-8 col-xs-12 animate fadeInRight">

			<?php
			while(have_posts()): the_post();

				the_content();

			endwhile;

			?>

			</div>

			<?php } elseif ( $sidebar_layout == 'sidebar-right' ) { ?>

				<div class="col-md-8 col-sm-8 col-xs-12 animate fadeInRight">

					<?php
					while(have_posts()): the_post();

						the_content();

					endwhile;

					?>

				</div>

				<?php if ( is_active_sidebar( 'advisor_sidebar_services' ) ) : ?>

				<div class="col-md-4 col-sm-4 col-xs-12 animate fadeInLeft">
					<aside>
							<?php dynamic_sidebar( 'advisor_sidebar_services' ); ?>
					</aside>
				</div>
				<?php endif; ?>


			<?php } ?>

		</div>
	</div>
</section>

<?php if( $top_layout == '') {

	echo '</section></div>';

}?>

<?php get_footer(); ?>
