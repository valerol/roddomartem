<?php

function ra_customize_register( $wp_customize ) {
	
	$wp_customize->add_section( 'ra-options', array(
        'title'    => __( 'Template options', 'roddomartem' ),
        'priority' => 120,
    ));
 
    $wp_customize->add_setting( 'header-phone-sup', array(
        'default' => '', 
    )); 
    $wp_customize->add_control ( 'header-phone-sup', array(
        'label'      => __( 'Header phone title', 'roddomartem' ),
        'section'    => 'ra-options',
        'settings'   => 'header-phone-sup',
    ));
    
    $wp_customize->add_setting( 'header-phone', array(
        'default' => '', 
    ));    
    $wp_customize->add_control ( 'header-phone', array(
        'label'      => __( 'Header phone', 'roddomartem' ),
        'section'    => 'ra-options',
        'settings'   => 'header-phone',
    ));
    
    $wp_customize->add_setting( 'header-phone-sub', array(
        'default' => '', 
    ));    
    $wp_customize->add_control ( 'header-sub', array(
        'label'      => __( 'Header phone description', 'roddomartem' ),
        'section'    => 'ra-options',
        'settings'   => 'header-phone-sub',
    ));
    
    $wp_customize->add_setting( 'copyright', array(
        'default' => '', 
    ));    
    $wp_customize->add_control ( 'copyright', array(
        'label'      => __( 'Copyright', 'roddomartem' ),
        'section'    => 'ra-options',
        'settings'   => 'copyright',
    ));
    // Map
    $wp_customize->add_setting( 'map', array(
        'default' => '', 
    ));    
    $wp_customize->add_control ( 'map', array(
        'label'      => __( 'Map', 'roddomartem' ),
		'type'     	 => 'textarea',
        'section'    => 'ra-options',
        'settings'   => 'map',
    ));
   
}
add_action( 'customize_register', 'ra_customize_register' ); 

?>
