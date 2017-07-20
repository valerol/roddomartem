<?php
get_template_part( 'header' );

// Wrapper 1
while ( have_posts() ) {	
	the_post();
	$post_id = $post->ID;
	$content_1 = '';
	$content_1 .= ra_get_post( $post, 'article', array( 'title', 'image', 'content' ) );
	
	$content_1 .= ra_get_posts( 
		'textblocks', 
		array( 
			'post_type' => 'page', 
			'post_parent' => $post_id, 
			'meta_key' => 'textblock',
			'orderby' => 'meta_value_num',
			'order' => 'ASC',
			'posts_per_page' => 3 ),
		array( 'counter', 'title', 'content' ),
		3 );
}

// Wrapper 2
$content_2 = ra_get_comments( $post_id, 'testimonial', array( 'info', 'content' ) );
$heading_2 = ra_set_content( 'div', array( 'class' => 'heading1 wow fadeIn', 'content' => '<h2>' . __( 'Testimonials', 'roddomartem' ) . '</h5>' ) );

// Wrapper 4
/*$content_4 = ra_get_posts( 
	'list', 
	array( 
		'post_type' => 'page', 
		'post_parent' => $post_id, 
		'orderby' => 'menu_order', 
		'meta_key' => 'textblock',
		'meta_compare' => 'NOT EXISTS',
		'posts_per_page' => 10 ),
	array( 'link' ) );
$content_4 = ra_set_content( 'div', array( 'class' => 'row', 'content' => $content_4 ) );*/

ra_wrapper( 'wrapper1 wrapper1__inset1', $content_1 );
ra_wrapper( 'wrapper2 wrapper2__inset1', $content_2, $heading_2 );
get_template_part( 'testimonial-form' );
//ra_wrapper( 'wrapper4', $content_4 );

get_template_part( 'footer' ); 
?>
