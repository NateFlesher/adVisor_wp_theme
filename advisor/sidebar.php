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
 ?>
 <?php if ( is_active_sidebar( 'advisor_sidebar_blog' ) ) : ?>
 <aside class="col-md-4 animate fadeInRight">

   <?php dynamic_sidebar( 'advisor_sidebar_blog' ); ?>

</aside>
<?php endif; ?>
