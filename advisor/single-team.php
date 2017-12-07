<?php
/**
 * The template for displaying all single case studies and attachments
 *
 * @package WordPress
 * @subpackage Advisor
 */

get_header();

global $post;
$top_layout = get_post_meta( $post->ID , 'advisor_page_top_layout', true ); ?>

<?php get_template_part('includes/widgets/pagetop','layout'); ?>

<?php
// page banner
// advisor_template_banner();

?>
<!-- CASE STUDY CONTENT -->

<div class="container">
  <div class="row">
   <div class="border-box team-member-content">
     <div class="container">
       <div class="row">
        <div class="col-md-12">

          <?php
            while(have_posts()) : the_post();

             $pID = get_the_ID();

             $team_member_designation = rwmb_meta('advisor_member_designation') ;
             $facebook_url            = rwmb_meta('advisor_member_facebook') ;
             $twitter_url             = rwmb_meta('advisor_member_twitter') ;
             $youtube_url             = rwmb_meta('advisor_member_youtube') ;
             $advisor_member_bio      = rwmb_meta('advisor_member_bio') ;
             $team_mem_image_arr	    = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'advisor_team-member-img');

             if ( empty( $team_mem_image_arr[0] ) ) {
               $image_src = get_template_directory_uri() . "/images/updated/450x450.png";
             } else {
               $image_src = $team_mem_image_arr[0];
             }

             ?>

             <div class="col-md-5 col-lg-4">
               <img src="<?php echo esc_url( $image_src ); ?>" alt="team member" />
               <div class="social-icons bg_gray">
                   <ul class="text-center margin-r-30">
                     <?php if( isset( $facebook_url )  ) { ?><li class="margin-t-15"><a href="<?php echo esc_url( $facebook_url ); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li><?php } ?>
                     <?php if( isset( $twitter_url )  ) { ?><li class="margin-t-15"><a href="<?php echo esc_url( $twitter_url ); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li><?php } ?>
                     <?php if( isset( $youtube_url )  ) { ?><li class="margin-t-15"><a href="<?php echo esc_url( $youtube_url ); ?>"><i aria-hidden="true" class="fa fa-youtube"></i></a></li><?php } ?>

                   </ul>
               </div>
             </div>
             <div class="col-md-7 col-lg-8">
               <div class="team-details">
                <h2 class="color_red"><?php the_title(); ?></h2>
                <h6><?php echo $team_member_designation; ?></h6>
                <p><?php echo $advisor_member_bio; ?></p>
               </div>
             </div>


          <?php endwhile; ?>


          <div class="clearall"></div>
        </div>
      </div>

  </div><!--Container Ends ------->

  </div>
</div>
</div>
<!-- / CASE STUDY CONTENT -->

<?php if( $top_layout == '') {

	echo '</section></div>';

} ?>

<?php get_footer(); ?>
