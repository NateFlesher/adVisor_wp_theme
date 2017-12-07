<?php
get_header(); ?>

		<section style="margin-top: 100px;">
			<div class="container">

					<div class="row">

              <div class="col-md-6 col-md-offset-3">
                  <img src="<?php echo get_template_directory_uri().'/images/404img.png'; ?>">
              </div>

			    </div>

                    <br>

          <div class="row">

              <center>
                   <a class="black-btn" href="<?php echo esc_url(home_url()); ?>"><?php esc_html_e('Go back to Home' , 'advisor'); ?></a>
              </center>

  			</div>



	</div>
</section>

<?php get_footer(); ?>
