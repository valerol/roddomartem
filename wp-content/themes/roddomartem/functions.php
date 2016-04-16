<?php
/**
 * Roddomartem functions and definitions
 */
 
add_filter( 'wp_revisions_to_keep', 'ra_set_revisions_number' );
//add_filter( 'post_type_link', 'ra_permalinks', 10, 3 );
add_filter( 'tiny_mce_before_init', 'ra_mce_before_init' );
// add_filter( 'wpcf7_posted_data', 'insert_question' );
// add_filter( 'wpcf7_form_hidden_fields', 'question_form_term' );

function ra_set_revisions_number( $revisions ) {
    return 0;
}

// Убираем category из пунктов меню
add_filter( 'wp_nav_menu_items', 'ra_nav_cats_noslug' );
function ra_nav_cats_noslug( $items ) {

		if ( strpos( $items, '/category' ) ) {
			$items = str_replace( '/category', '', $items );
		}
		
		return $items;

}

if ( ! function_exists( 'roddomartem_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * Create your own roddomartem_setup() function to override in a child theme.
 */
function roddomartem_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Twenty Sixteen, use a find and replace
	 * to change 'roddomartem' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'roddomartem', get_template_directory() . '/languages' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	
//	set_post_thumbnail_size( 370, 225, true );
	set_post_thumbnail_size( 370, 370, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'main' => __( 'Main Menu', 'roddomartem' ),
	) );
}
endif; // roddomartem_setup
add_action( 'after_setup_theme', 'roddomartem_setup' );

function ra_thumbsize( $template_part = '' ) {	
	$thumbsizes = array(
		'rounded-blocks' => array( 370, 370 ),
		'main-illustrated' => array( 370, 325 ),
		'main-team' => 'medium',
	);
	
	if ( isset( $thumbsizes[ $template_part ] ) ) {
		return $thumbsizes[ $template_part ];
	}
	else return;
}

if ( ! function_exists( 'roddomartem_fonts_url' ) ) :
/**
 * Register Google fonts.
 *
 * @return string Google fonts URL for the theme.
 */
function roddomartem_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Roboto+Slab, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Roboto Slab font: on or off', 'roddomartem' ) ) {
		$fonts[] = 'Roboto Slab:300,400';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 */
function roddomartem_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'roddomartem_javascript_detection', 0 );

/**
 * Enqueues scripts and styles.
 */
function roddomartem_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'roddomartem-fonts', roddomartem_fonts_url(), array(), null );

	// Normalize
	wp_enqueue_style( 'roddomartem-ie8', get_template_directory_uri() . '/css/normalize.css' );
	
	// Grid
	wp_enqueue_style( 'grid', get_template_directory_uri() . '/css/grid.css' );
	
	// Superfish menu
	wp_enqueue_style( 'sfmenu', get_template_directory_uri() . '/css/superfish-menu.css' );
	
	// Slider
	wp_enqueue_style( 'slider', get_template_directory_uri() . '/css/camera.css' );
	
	// Search
	wp_enqueue_style( 'search', get_template_directory_uri() . '/css/search.css' );
	
	// Theme stylesheet
	wp_enqueue_style( 'roddomartem-style', get_stylesheet_uri() );
	
	// Common scripts
	wp_enqueue_script( 'roddomartem-script', get_template_directory_uri() . '/js/script.js', array( 'jquery' ) );
	
	// WOW
	wp_enqueue_script( 'wow', get_template_directory_uri() . '/js/wow.js', array( 'jquery' ) );
	
	// Superfish menu
	wp_enqueue_script( 'sfmenu', get_template_directory_uri() . '/js/superfish.js', array( 'jquery' ) );
	
	// Camera Slider
	wp_enqueue_script( 'slider', get_template_directory_uri() . '/js/camera.js', array( 'jquery' ) );
}
add_action( 'wp_enqueue_scripts', 'roddomartem_scripts' );


// Functions to get the content

include( 'templates.php' );

function ra_title_parts( $title, $separator ) {
	$content = '';
	$title_parts = explode( $separator, $title, 2 );
	$content .= ra_set_content( 'span', array( 'class' => 'first', 'content' => trim( $title_parts[ 0 ] ) ) );
	
	if ( isset( $title_parts[ 1 ] ) ) {
		$content .= ra_set_content( 'span', array( 'class' => 'second', 'content' => trim( $title_parts[ 1 ] ) ) );
	}
	return $content;
}

function ra_heading_parts( $heading, $separator ) {
	$content = '';
	$heading_parts = explode( $separator, $heading, 2 );
	$content .= trim( $heading_parts[ 0 ] );
	
	if ( isset( $heading_parts[ 1 ] ) ) {
		$content .= '</br>';
		$content .= ra_set_content( 'span', array( 'class' => 'light', 'content' => trim( $heading_parts[ 1 ] ) ) );
	}
	return $content;
}

function ra_set_content( $template, $tags ) {
	$content = ra_tags_replace( $template, $tags );
	return $content;
}

function ra_tags_replace( $template, $tags ) {
	$template = ra_get_template( $template );

	foreach( $tags as $key => $val ) {
		$key = mb_convert_case( $key, MB_CASE_UPPER );
		
		if ( strpos( $template, '%' . $key . '%' ) ) {
			$template = str_replace( '%' . $key . '%', $val, $template );
		}
	}
	$template = preg_replace( '#\%(\w+)\%#', '', $template );
	return $template;
}

function ra_get_post( $obj_post, $template, $template_tags, $counter = '' ) {
	global $post;
	$post = $obj_post;
	setup_postdata( $post );
	
	switch ( $template ) {				
		case 'colored': $image_size = array( 370, 225 );
		break;
		case 'newsbox': $image_size = array( 370, 370 );	
		break;
		case 'news': $image_size = array( 370, 370 );	
		break;
		case 'rounded_4': $image_size = array( 370, 370 );	
		break;		
		case 'rounded_3': $image_size = array( 370, 370 );	
		break;
		case 'article': $image_size = 'fullsize';	
		break;
		default: $image_size = 'thumbnail';
	}
	
	if ( $post->post_type == 'question' && get_the_content() == '' ) {
		$edit_ancor = __( 'Reply', 'roddomartem' );
	}
	else $edit_ancor = __( 'Edit', 'roddomartem' );
		
	$edit_link = '<a class="edit-link" href="' . get_edit_post_link( $post->ID ) . '">' . $edit_ancor . '</a>';
	
	if ( $template == 'colored' ) {
		$title = ra_heading_parts( get_the_title(), ' ' );
	}
	else $title = get_the_title();
	
	if ( $post->post_type == 'doctor' ) {
		$link = get_the_title();
	}
	else $link = '<a href="' . get_the_permalink() . '">' . $title . '</a>';
	
	foreach( $template_tags as $tag ) {			
		
		switch ( $tag ) {				
			case 'content': $tags[ 'content' ] = get_the_content( __( 'More', 'roddomartem' ) );
			case 'description': $tags[ 'description' ] = get_the_excerpt();
			case 'title': $tags[ 'title' ] = $title;
			case 'link': $tags[ 'link' ] = $link;
			case 'edit_link': $tags[ 'edit_link' ] = $edit_link;
			case 'image': $tags[ 'image' ] = get_the_post_thumbnail( $post->id, $image_size );
			case 'counter': $tags[ 'counter' ] = $counter;
			case 'datetime': $tags[ 'datetime' ] = get_the_date( 'Y-m-d' );
			case 'date': $tags[ 'date' ] = get_the_date();
			break;
		}
	}
	wp_reset_postdata();
	$content = ra_tags_replace( $template, $tags );
	return $content;
}

function ra_get_comments( $post_id, $template, $template_tags ) {
	$comments = get_comments( array ( 'post_id' => $post_id, 'status' => 'approve' ) );
	$output = '';
	
	if ( $comments ) {
		foreach ( $comments as $comment ) {
			$name = $comment->comment_author;
			$date = date( 'm.d.Y', strtotime( $comment->comment_date ) );
			$info = $date;
			
			if ( $name ) {
				$info .= ', ' . $name;
			}
			
			foreach( $template_tags as $tag ) {
				
				switch ( $tag ) {				
					case 'content': $tags[ 'content' ] = $comment->comment_content;
					case 'info': $tags[ 'info' ] = $info;
					break;
				}
			}
			
			$comment = ra_tags_replace( $template, $tags );
			$output .= $comment;
		}
	}
	
	return $output;
}

function ra_get_posts( $template, $args, $tags, $per_row = 1 ) {

	$defaults = array(
		'posts_per_page'   => 10,
		'offset'           => 0,
		'category'         => '',
		'category_name'    => '',
		'orderby'          => 'date',
		'order'            => 'DESC',
		'include'          => '',
		'exclude'          => '',
		'meta_key'         => '',
		'meta_value'       => '',
		'post_type'        => 'post',
		'post_mime_type'   => '',
		'post_parent'      => '',
		'author'	   => '',
		'post_status'      => 'publish',
		'suppress_filters' => true,
	);
	
	$args = wp_parse_args( $args, $defaults );

	if ( $posts = get_posts( $args ) ) {
		$counter = 0;
		$buffer = '';
		$output = '';
		$count_posts = count( $posts );
		
		foreach ( $posts as $obj_post ) {
			$counter++;
			$tags[ 'counter' ] = $counter;
			$buffer .= ra_get_post( $obj_post, $template, $tags, ( $counter % $per_row ) + 1 );
			
			if ( $per_row > 1 ) {
				
				if ( $counter % $per_row == 0 || $counter == $count_posts ) {
					
					if ( $count_posts > $per_row ) { 
						$row_class = 'row margin-bottom';
					}
					else $row_class = 'row';
					$buffer = ra_set_content( 'div', array( 'content' => $buffer, 'class' => $row_class ) );					
					$output .= $buffer;
					$buffer = '';
				}
			}
			
			if ( $template == 'list' ) {
			
				if ( $count_posts > 3 ) {
					$per_col = floor( $count_posts / 3 ) + ( $count_posts % 3 );
				}
				else $per_col = 1;
				
				if ( $counter % $per_col == 0 or $counter == $count_posts ) {
					$buffer = ra_set_content( 'ul', array( 'content' => $buffer ) ); 
					$output .= $buffer;
					$buffer = '';
				}
			}

		}
		if ( $per_row <= 1 && $template != 'list' ) {
			$output = $buffer;
		}
		return $output;
	}
	else return false;
}

function ra_slides( $template, $args ) {

	$defaults = array(
		'posts_per_page'   => 10,
		'offset'           => 0,
		'category'         => '',
		'category_name'    => '',
		'orderby'          => 'date',
		'order'            => 'DESC',
		'include'          => '',
		'exclude'          => '',
		'meta_key'         => '',
		'meta_value'       => '',
		'post_type'        => 'post',
		'post_mime_type'   => '',
		'post_parent'      => '',
		'author'	   => '',
		'post_status'      => 'publish',
		'suppress_filters' => true,
	);
	
	$args = wp_parse_args( $args, $defaults );

	if ( $posts = get_posts( $args ) ) {
		
		$slides = '';
		$tags = array();
		
		foreach ( $posts as $obj_post ) {
			global $post;
			$post = $obj_post;
			setup_postdata( $post );
			
			$link = get_post_meta( $post->ID, 'link', true );
			$text = ra_set_content( 'span', array( 'content' => get_the_title(), 'class' => 'first' ) ) .
					ra_set_content( 'span', array( 'content' => get_the_content(), 'class' => 'second' ) );
					
			if ( $link ) {
				$text = '<a href="' . $link . '">' . $text . '</a>';
			}
			
			$tags[ 'image_url' ] = wp_get_attachment_url( get_post_thumbnail_id() );
			$tags[ 'text' ] = $text;

			wp_reset_postdata();
			$slides .= ra_tags_replace( $template, $tags );
		}
	}
	return $slides;
}

function ra_wrapper( $class, $content, $heading = '' ) {
	
	if ( $content ) {
		echo ra_set_content( 'wrapper',	array( 
			'content' => $content,
			'class' => $class,
			'heading' => $heading
		) );
	}
	else return;
}

// Editor special formats
function ra_mce_before_init( $settings ) {
    $style_formats = array(
        array(
            'title' => 'Pretty UL',
            'selector' => 'ul',
            'classes' => 'list1 list1__inset1'
        ),
        
        array(
            'title' => 'Pretty UL white',
            'selector' => 'ul',
            'classes' => 'list1'
        ),
        
        array(
            'title' => 'PDF',
            'selector' => 'li',
            'classes' => 'pdf'
        ),
        
        array(
            'title' => 'DOC',
            'selector' => 'li',
            'classes' => 'doc'
        ),
        
        array(
            'title' => 'XLS',
            'selector' => 'li',
            'classes' => 'xls'
        ),
        
        array(
            'title' => 'ZIP',
            'selector' => 'li',
            'classes' => 'zip'
        ),
    );
    $settings[ 'style_formats' ] = json_encode( $style_formats );
    return $settings;
}

// Theme settings
include( 'theme-mods.php' );

?>
