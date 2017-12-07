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

<?php    get_template_part('includes/widgets/pagetop','layout'); ?>

<?php
// page banner
// advisor_template_banner();

?>
<!-- CASE STUDY CONTENT -->
<section>

<div class="container">

  <?php
    while(have_posts()) : the_post();

     $pID = get_the_ID();
     $case_images = get_post_meta($pID , 'advisor_case_gallery');
     $case_challenge = get_post_meta($pID , 'advisor_case_challenge');
     $case_solution = get_post_meta($pID , 'advisor_case_solution');
     $case_result = get_post_meta($pID , 'advisor_case_result');

     if( !empty($case_images) && is_array($case_images) )
     {
      ?>

       <div class="row">

       <div class="col-md-3">

         <?php

          //First Case Study Image

          if( isset($case_images[0] ))
          {

            advisor_case_image($case_images[0] , 'margin-bottom-20' , '200', array(289,259));

          }

          //Second Case Study Image

          if( isset($case_images[1] ))
          {

            advisor_case_image($case_images[1] , '' , '200', array(289,259));

          }

          ?>

       </div>

       <div class="col-md-6 p-0">

          <?php

            //Third Case Study Image

            if( isset($case_images[2] ))
            {

              advisor_case_image($case_images[2] , '' , '200', array(555,491));

            }

          ?>

       </div>

       <div class="col-md-3">

         <?php

            //Fourth Case Study Image

             if( isset($case_images[3] ))

             {

               advisor_case_image($case_images[3] , 'margin-bottom-20' , '200', array(289,259));

             }

            //Fifth Case Study Image

            if( isset($case_images[4] ))
            {

              advisor_case_image($case_images[4] , '' , '200', array(289,259));

            }

        ?>

       </div>
       </div>

  <?php } ?>

     <div class="height-70"></div>

       <?php if(!empty($case_challenge)) { ?>

         <div class="animate fadeInUp">

          <?php echo $case_challenge[0]; ?>

         </div>

         <hr>
         <br>

         <div class="row">

          <?php } if( !empty($case_solution )) {  ?>

            <div class="col-md-6 animate fadeInUp" data-delay="200">

              <?php echo $case_solution[0]; ?>

            </div>

           <?php } if(!empty($case_result)) { ?>

            <div class="col-md-6 animate fadeInUp" data-delay="200">

              <?php echo $case_result[0]; ?>

            </div>


          <?php } ?>

    </div>

  <?php endwhile; ?>
<div class="clearall"></div>
</div><!--Container Ends ------->

</section>
<!-- / CASE STUDY CONTENT -->

<?php if( $top_layout == '') {

	echo '</section></div>';

} ?>
<?php get_footer(); ?>
