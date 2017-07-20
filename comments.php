		<h2 class="comments-title">
			<?php
				printf( __( 'Comments', 'roddomartem' ),
					number_format_i18n( get_comments_number() ), get_the_title() );
			?>
		</h2>

		<?php //roddomartem_comment_nav(); ?>

		<?php ra_comments( 'testimonial', $post->ID ); ?>

		<?php //roddomartem_comment_nav(); ?>

	<?php endif; // have_comments() ?>

	<?php comment_form( array ( 
		'title_reply' => __( 'Leave a reply', 'roddomartem' ),
		'fields' => array (
			'author' => '<p><input id="author" name="author" placeholder="' . __( 'Name', 'roddomartem' ) . '" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"/></p>',
			'email' => '',
			'url' => ''	),
		'comment_field' => '<p><textarea id="comment" name="comment" placeholder="' . __( 'Comment', 'roddomartem' ) . '" cols="45" rows="8" aria-required="true"></textarea></p>',
		'comment_notes_before' => '',
		) ); ?>

</div><!-- .comments-area -->
