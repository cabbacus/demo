<?php
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php

	if ( have_comments() ) : ?>

		<h2 class="comments-title">

			<?php

				$comments_number = get_comments_number();
				$post_title = '<b class="comments-title__post-title">&ldquo;' . get_the_title() . '&rdquo;</b>';

				if ( '1' === $comments_number ) {
					/* translators: %s: post title */
					printf( _x( 'One Reply to %s', 'comments title', 'barberry' ),
						$post_title );
				} else {

					printf(
						/* translators: 1: number of comments, 2: post title */
						_nx(
							'%1$s Reply to %2$s',
							'%1$s Replies to %2$s',
							$comments_number,
							'comments title',
							'barberry'
						),
						number_format_i18n( $comments_number ),
						$post_title
					);

				}

			?>

		</h2>

		<ol class="comment-list">

			<?php
				wp_list_comments( array( 'callback' => 'barberry_comment' ) );
			?>

		</ol>

		<?php the_comments_pagination( array(
			'prev_text' => '<span class="screen-reader-text">' . esc_html__( 'Previous', 'barberry' ) . '</span>',
			'next_text' => '<span class="screen-reader-text">' . esc_html__( 'Next', 'barberry' ) . '</span>',
		) );

	endif; // Check for have_comments().

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="no-comments"><?php esc_html__( 'Comments are closed.', 'barberry' ); ?></p>

	<?php
	endif;

	comment_form();
	?>

</div>
