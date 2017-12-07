<?php
/*
 * Template Name: Contact Us
*/

get_header(); ?>

<?php
global $post;

$top_layout = get_post_meta( $post->ID , 'advisor_page_top_layout', true ); ?>

<!-- add css for the visual composer elements -->
<?php  if(!empty(advisor_vc_row_element_css())){ ?>
<style><?php echo advisor_vc_row_element_css(); ?></style>
<?php } ?>

<?php  get_template_part('includes/widgets/pagetop','layout');

while(have_posts()): the_post();

	the_content();

endwhile;
if( $top_layout == '') {

	echo '</section></div>';

}
?>

<?php get_footer(); ?>
