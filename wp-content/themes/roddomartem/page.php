<?php
get_template_part( 'header' );
// All pages Wrapper 1
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

// Departments pages
if ( $term = get_term_by( 'slug', $post->post_name, 'department' ) ) {
	// Wrapper 1
	if ( $term->slug == 'departments' ) {
		$content_1 .= ra_get_posts( 'rounded_3', 
		array( 
			'post_type' => 'page', 
			'post_parent' => $post->ID, 
			'orderby' => 'menu_order', 
			'posts_per_page' => 6 ),
		array( 'image', 'title', 'content' ),
		3 );
	}
	
	// Wrapper 2
	$heading_2 = ra_set_content( 'div', array( 'class' => 'heading1 wow fadeIn', 'content' => '<h2>' . __( 'Questions', 'roddomartem' ) . '</h2>' ) );		
	$content_2 = ra_get_posts( 'question', 
		array( 			
			'post_type' => 'question',
			'tax_query' => array(
				array(
					'taxonomy' => 'department',
					'field' => 'slug',
					'terms' => $term->slug
				) ) ),
		array( 'title', 'description', 'content', 'edit_link' ) );
	
	// Wrapper 3		
	$heading_3 = ra_set_content( 'div', array( 'class' => 'heading1 wow fadeIn', 'content' => '<h5>' . __( 'Ask a question', 'roddomartem' ) . '</h5>' ) );
	$content_3 = do_shortcode( '[contact-form-7 id="356" title="Question"]' );

	// Wrapper 4	
	$heading_4 = ra_set_content( 'div', array( 'class' => 'heading1 wow fadeIn', 'content' => '<h5>' . __( 'Our specialists', 'roddomartem' ) . '</h5>' ) );
	$content_4 = ra_get_posts( 'colored', 
		array( 			
			'post_type' => 'doctor',
			'meta_key' => 'priority',
			'meta_value' => '',
			'orderby' => 'meta_value_num',
			'order' => 'DESC',
			'tax_query' => array(
				array(
					'taxonomy' => 'department',
					'field' => 'slug',
					'terms' => $term->slug
				) ) ),
		array( 'image', 'link', 'description' ),
		3 );
		
	ra_wrapper( 'wrapper1 wrapper1__inset1', $content_1 );
	ra_wrapper( 'wrapper2 wrapper2__inset1', $content_2, $heading_2 );
	ra_wrapper( 'wrapper3', $content_3, $heading_3 );
	ra_wrapper( 'wrapper4', $content_4, $heading_4 );
}

// Other pages
else {
/*	$content_4 = ra_get_posts( 
		'list', 
		array( 
			'post_type' => 'page', 
			'post_parent' => $post_id, 
			'orderby' => 'menu_order', 
			'meta_key' => 'textblock',
			'meta_compare' => 'NOT EXISTS',
			'posts_per_page' => 10 ),
		array( 'link' ) );
	if ( $content_4 ) {
		$content_4 = ra_set_content( 'div', array( 'class' => 'row', 'content' => $content_4 ) );
	}*/

	ra_wrapper( 'wrapper1 wrapper1__inset1', $content_1 );
	//ra_wrapper( 'wrapper4', $content_4 );
}

get_template_part( 'footer' ); 
?>
