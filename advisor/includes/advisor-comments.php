<?php
	class Advisor_walker_comments extends Walker_Comment {
		var $tree_type = 'comment';
		var $db_fields = array( 'parent' => 'comment_parent', 'id' => 'comment_ID' );

		// constructor – wrapper for the comments list
		function __construct() { ?>



		<?php }

		// start_lvl – wrapper for child comments list
		function start_lvl( &$output, $depth = 0, $args = array() ) {
			$GLOBALS['comment_depth'] = $depth + 2; ?>

			<ul class="children">

		<?php }

		// end_lvl – closing wrapper for child comments list
		function end_lvl( &$output, $depth = 0, $args = array() ) {

			$GLOBALS['comment_depth'] = $depth + 2; ?>

		</ul>

		<?php }

		// start_el – HTML for comment template
		function start_el( &$output, $comment, $depth = 0, $args = array(), $id = 0 ) {

			$depth++;
			$GLOBALS['comment_depth'] = $depth;
			$GLOBALS['comment'] = $comment;
			$parent_class = ( empty( $args['has_children'] ) ? '' : 'parent' );

			if ( 'article' == $args['style'] ) {

				$add_below = 'comment';

			} else {

				$add_below = 'comment';

			} ?>
			<li class="comment">
			<article class="comment-wrapper clearfix"  <?php comment_class(empty( $args['has_children'] ) ? '' :'parent') ?> id="comment-<?php comment_ID() ?>" itemprop="comment" itemscope itemtype="http://schema.org/Comment">
				<div class="comment-avartar"><?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?></div>
				<div class="comment-content-wrapper clearfix comment-meta post-meta" role="complementary">
					<div class="comment-head">
						<span class="comment-author"><?php comment_author(); ?></span>
						<span class="comment-date"><time class="comment-meta-item" datetime="<?php comment_date('Y-m-d') ?>T<?php comment_time('H:iP') ?>" itemprop="datePublished"><?php comment_date('jS F Y') ?> at <?php comment_time() ?></time></span>
					</div>

					<?php edit_comment_link('<p class="comment-meta-item">Edit this comment</p>','',''); ?>

					<?php if ($comment->comment_approved == '0') : ?>
					<p class="comment-meta-item">Your comment is awaiting moderation.</p>
					<?php endif; ?>
				</div>

				<div class="comment-message comment-content post-content" itemprop="text">
					<?php comment_text() ?>
					<span class="comment-reply"><?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'])), $comment->comment_ID) ?></span>
				</div>

		<?php }

		// end_el – closing HTML for comment template
		function end_el(&$output, $comment, $depth = 0, $args = array() ) { ?>

			</article>
			<li>
		<?php }

		// destructor – closing wrapper for the comments list
		function __destruct() { ?>



		<?php }

	}
?>
