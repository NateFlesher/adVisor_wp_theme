<?php

/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage Advisor
 * @since Advisor 1.0
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )

    return;
?>

    <?php if ( have_comments() ) : ?>
        <h2>
            <?php
                printf( _nx( 'Comment "%2$s"', '%1$s Comments', get_comments_number(), 'comments title', 'advisor' ),
                number_format_i18n( get_comments_number() ), '' );
            ?>
        </h2>
        <?php
        if ( class_exists( 'Advisor_walker_comments' )) {

          $walker_comments = new Advisor_walker_comments();

        } else {

          $walker_comments = null;
        }

        ?>
        <ol class="commentlist">
            <?php
                wp_list_comments( array(

                    'style'             => 'ol',
                    'short_ping'        => true,
                    'avatar_size'       => 75,
                    'reverse_top_level' => null,
              			'reverse_children'  => '',
              			'format'            => 'html5',
                    'max_depth'         => 6,
              			'short_ping'        => true,
                    'walker'            => $walker_comments,

                ) );
            ?>
        </ol><!-- .comment-list -->

        <?php
        // Are there comments to navigate through?

        if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
        ?>
        <nav class="navigation comment-navigation" role="navigation">

            <div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'advisor' ) ); ?></div>
            <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'advisor' ) ); ?></div>

        </nav><!-- .comment-navigation -->
        <?php endif; // Check for comment navigation ?>

        <?php if ( ! comments_open() && get_comments_number() ) : ?>

        <p class="no-comments"><?php _e( 'Comments are closed.' , 'advisor' ); ?></p>

        <?php endif; ?>

    <?php endif; // have_comments() ?>
    <?php
  		$commenter = wp_get_current_commenter();
  		$req = get_option( 'require_name_email' );
  		$aria_req = ( $req ? " aria-required='true'" : '' );

  		$fields =  array(
  		  'author' => '<div class="row"><div class="col-md-4"><input class="advisor-comment-author" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '"' . $aria_req . ' placeholder="' . esc_html__( 'Your Name', 'advisor' ) . '" required/></div>',
  			'email'  => '<div class="col-md-4"><input class="comment-email" id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '"' . $aria_req . ' placeholder="' . esc_html__( 'Your Email', 'advisor' ) . '" required/></div>',
  		  'url'    => '<div class="col-md-4"><input class="comment-url" id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" placeholder="' . esc_html__( 'Website', 'advisor' ) . '" /></div></div>',
  		);

  		$reply_args = array (

  			'title_reply'       	=> esc_html__( 'Leave a Reply', 'advisor' ),
        'fields'							=> $fields,
  			'cancel_reply_link' 	=> esc_html__( 'Cancel Reply', 'advisor' ),
  			'comment_field'				=> '<div class="comment-form-comment form-group"><textarea id="comment"  class="form-control advisor-post-comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="' . esc_html_x( 'Your Message', 'noun', 'advisor' ) .'" required></textarea></div>
        <div id="comment-msg" style="display: none;">'.__('Ops! there is some missing field.', 'advisor').'</div>',
        'class_submit'        => 'btn btn-primary',
        'label_submit'      	=> esc_html__( 'Submit', 'advisor' ),
  		);

  		comment_form( $reply_args );

  	?>


<!-- #comments -->
