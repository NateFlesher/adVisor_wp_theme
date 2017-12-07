<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Advisor
 * @since Advisor 1.0
 */

get_header(); ?>

		<?php advisor_template_banner();  ?>

		<section class="palin-content">
			<div class="container">




					<div class="row">
						<div class="col-md-8 animate fadeInLeft">



							<div class="p-right-30">
								<?php if ( have_posts() ) :

								while ( have_posts() ) : the_post();

									get_template_part( 'post-item', 'none' );

								endwhile;
								wp_reset_postdata();

								else :

										echo '<div class="alert alert-danger"> ' . esc_html__( 'No Content Found!' , 'advisor') . '</div>';

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

					<ul class="news-paggination">

			        <li class="animate fadeInRight">
			          <?php next_posts_link( '<i class="fa fa-angle-left"></i>'. esc_html__('Older Posts','advisor').''); ?>
			        </li>
			        <li class="animate fadeInLeft">
			          <?php previous_posts_link( ''. esc_html__( 'Newest Posts', 'advisor' ).'<i class="fa fa-angle-right"></i>'); ?>
			       </li>

					</ul>
	</div>


</section>

<?php get_footer(); ?>
