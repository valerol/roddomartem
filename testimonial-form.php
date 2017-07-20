<div class="wrapper3">
	<div class="container">
		<div class="row">
			<div class="grid_12 box3">
				<div class="heading2 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
					<h5><?php _e( 'Leave a reply', 'roddomartem' ) ?></h5>
				</div>
					<?php comment_form( array ( 
						'title_reply' => __( '' ),
						'fields' => array (
							'author' => '<p><input id="author" name="author" placeholder="' . __( 'Name', 'roddomartem' ) . '" type="text" value="" size="30" required /></p>',
							'email' => '',
							'url' => ''	),
						'comment_field' => '<p><textarea id="comment" name="comment" placeholder="' . __( 'Testimonial', 'roddomartem' ) . '" cols="45" rows="8" aria-required="true"></textarea></p>',
						'comment_notes_before' => '',
						'label_submit' => __( 'Submit', 'roddomartem' ),
						) ); ?> 
			</div>
		</div>
	</div>
</div>
