<?php
get_template_part( 'header' );

while ( have_posts() ) {	
	the_post();
	$content_1 = ra_get_post( $post, 'news', array( 'image', 'title', 'content' ) );
	ra_wrapper( 'wrapper1 wrapper1__inset1', $content_1 );
}

get_template_part( 'footer' ); 
?>
