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

get_header();

global $post;

$blog_page_id = get_option( 'page_for_posts' );

$top_layout   = get_post_meta( $blog_page_id, 'advisor_page_top_layout', true );

if (  $blog_page_id != 0 ) {
   get_template_part('includes/widgets/pagetop','layout');
   //include ( locate_template('includes/pagetop-layout.php') );

} else {
   advisor_template_banner();
}


 global $avisor_options;

 $blog_layout =  $advisor_options['advisor_blog_layout'];

 ?>

			<section>
				<div class="container">



				<?php if (	$blog_layout == 'blog-sidebar' ) { ?>

					<div class="row"><div class="col-md-8 animate fadeInLeft"><div class="p-right-30">

						<?php } ?>

						<?php

              if ( have_posts() ) :

								while ( have_posts() ) : the_post();

									if (	$blog_layout == 'blog-no-sidebar' ) {

                    get_template_part( 'post-item', 'classic' );

									}
									else {

										get_template_part( 'post-item', 'none' );

									}

								endwhile;
								wp_reset_postdata();

              else :

                echo '<div class="alert alert-danger"> ' . esc_html__( 'No Posts Found!' , 'advisor') . '</div>';

              endif;
								?>



					<?php if (	$blog_layout == 'blog-sidebar' ) { ?>

					</div>
			 	</div>

			<?php get_sidebar(); ?>

			</div>

			<?php } ?>

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

<?php

  if( $top_layout == '') {

    echo '</section></div>';

  } ?>

<?php get_footer(); ?>
