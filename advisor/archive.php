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

 advisor_template_banner();
 global $avisor_options , $wp_query;

 $blog_layout =  $advisor_options['advisor_blog_layout'];

 ?>

			<section>
				<div class="container">

        <?php if ( have_posts() ) : ?>

					<h4>
						<?php
              if( is_date() ) {

                $format = get_option( 'date_format ');
                $pfx_date = get_the_date( $format );
                echo esc_html( $pfx_date );
  							echo ' (' . $wp_query->found_posts . ')';

              } else {

              $cate_name = str_replace( '-', ' ', get_queried_object()->name );
              echo esc_html( $cate_name );
							echo ' (' . $wp_query->found_posts . ')';

              }

						?>
					</h4>
					<div class="height-20"></div>
					<div class="category-description">
						<?php the_archive_description( '<div>', '</div>' ); ?>
					</div>

					<div class="height-20"></div>

				<?php if (	$blog_layout == 'blog-sidebar' ) { ?>

					<div class="row"><div class="col-md-8 animate fadeInLeft"><div class="p-right-30">

						<?php } ?>

						<?php
								while ( have_posts() ) : the_post();

                if (	$blog_layout == 'blog-no-sidebar' ) {

                  get_template_part( 'post-item', 'classic' );

                }
                else {

                  get_template_part( 'post-item', 'none' );

                }

								endwhile;
								wp_reset_postdata();

								?>



					<?php if (	$blog_layout == 'blog-sidebar' ) { ?>

					</div>
			 	</div>

			<?php get_sidebar(); ?>

			</div>

			<?php } ?>

			<ul class="news-paggination">
        <li class="animate fadeInRight">
          <?php next_posts_link( '<i class="fa fa-angle-left"></i>'.esc_html__('Older Posts','advisor').''); ?>
        </li>
        <li class="animate fadeInLeft">
          <?php previous_posts_link( ''.esc_html__( 'Newest Posts', 'advisor' ).'<i class="fa fa-angle-right"></i>'); ?>
       </li>

			</ul>



		<?php
		else :

      echo '<div class="alert alert-danger"> ' . esc_html__( 'No Posts Found!' , 'advisor') . '</div>';

		endif;

		?>
  </div>

</section>

<?php get_footer(); ?>
