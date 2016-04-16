<?php get_template_part( 'header' ); 

$content_1 = '';

while ( have_posts() ) {	
	the_post();
	$content_1 .= ra_get_post( $post, 'newsbox', array( 'link', 'date', 'datetime', 'image', 'content' ) );
}

$pagination = paginate_links();

if ( $pagination ) {
	$content_1 .= ra_set_content( 'div', array( 'class'=> 'pagination', 'content' => $pagination ) );
}

$heading_1 = ra_set_content( 'div', array( 'content' => '<h2>' . single_cat_title( '', false ) . '</h2>', 'class' => 'heading1 wow fadeIn' ) );

ra_wrapper( 'wrapper', $content_1, $heading_1 );

get_template_part( 'footer' ); ?>
