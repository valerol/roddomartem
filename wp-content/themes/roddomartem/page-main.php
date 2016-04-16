<?php 
get_template_part( 'header' );

// Slider
$content_0 = ra_slides( 'slide', array( 'category_name' => 'slider' ) ); 

// Colored blocks
$content_1 = ra_get_posts( 
	'colored', 
	array( 
		'post_type' => 'page',
		'meta_key' => 'colored_main',
		'orderby' => 'meta_value_num',
		'order' => 'ASC',
	),
	array( 'image', 'link' ),
	3 );
$content_1 = ra_set_content( 'div', array ( 'content' => $content_1, 'class' => 'box1-wrapper1' ) );

// Main post
while ( have_posts() ) {	
	the_post();
	$content_2 = ra_get_post( $post, 'article', array( 'title', 'content' ) );
}

// Doctors 
$content_3 = ra_get_posts( 
	'rounded_4', 
	array( 			
		'post_type' => 'doctor',
		'meta_key' => 'priority',
		'meta_value' => array( '10', '100' ),
		'orderby' => 'meta_value_num',
	),
	array( 'image', 'title', 'description' ),
	4 );
$heading_3 = ra_set_content( 'div', array( 'content' => '<h5>' . __( 'Our specialists', 'roddomartem' ) . '</h5>', 'class' => 'heading2 wow fadeIn' ) );
$content_3 = ra_set_content( 'div', array( 'class' => 'box3-wrapper', 'content' => $content_3 ) );

//Map
$content_4 = ra_set_content( 'map', array( 'content' => get_theme_mod( 'map' ), 'class' => 'map-wrapper1 wow zoomIn' ) );

// Show content
if ( $content_0 ) echo ra_set_content( 'slider', array( 'content' => $content_0 ) );
ra_wrapper( 'wrapper1', $content_1 );
ra_wrapper( 'wrapper2', $content_2 );
ra_wrapper( 'wrapper3', $content_3, $heading_3 );
if ( $content_4 ) echo $content_4;

// Show map
get_template_part( 'map' ); 

get_template_part( 'footer' );
?>
