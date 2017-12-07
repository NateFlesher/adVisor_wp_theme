<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Advisor
 * @since Advisor 1.0
 */

get_header(); ?>

<?php
global $post;
$top_layout = get_post_meta( $post->ID , 'advisor_page_top_layout', true ); ?>

<!-- add css for the visual composer elements -->
<?php
	$custom_css="<style>". advisor_vc_row_element_css()."</style>";

	update_option( 'advisor-custom-css', $custom_css );
	get_template_part('includes/widgets/pagetop','layout');
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			the_content();

			//If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}

			// End of the loop.
		endwhile;

		if( $top_layout == '') {

			echo '</section></div>';

		}
		?>
<?php get_footer(); ?>
