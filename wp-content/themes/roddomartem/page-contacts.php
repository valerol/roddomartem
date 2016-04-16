<?php
get_template_part( 'header' );

while ( have_posts() ) {	
	the_post();
	// Wrapper 1
	$heading_1 = ra_set_content( 'div', array( 'class' => 'heading1 wow fadeIn', 'content' => '<h2>' . get_the_title() . '</h2>' ) );
	$content_1 = '';
	$content_1 .= ra_set_content( 'map', array( 'content' => get_theme_mod( 'map' ), 'class' => 'map-wrapper1 map-wrapper1__offset1' ) );
	$content_1 .= ra_get_posts( 
		'textblocks', 
		array( 
			'category_name' => 'contacts', 
			'posts_per_page' => 18,
			'orderby' => 'date',
			'order' => 'ASC' ),
		array( 'content' ),
		3 );
	// Wrapper 2	
	$content_2 = ra_set_content( 'div', array( 'class' => 'article', 'content' => get_the_content() ) );
}

ra_wrapper( 'wrapper1', $content_1, $heading_1 );
ra_wrapper( 'wrapper2', $content_2 );

get_template_part( 'footer' ); 
?>
 
