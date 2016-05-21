<?php
/**
 * CreativeWorks functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package CreativeWorks
 */
add_action( 'customize_register', 'creative_works_customize_theme' );
function creative_works_customize_theme( $wp_customize ) {

	// Initialize Incrementers
	$section_priority	   = 1;
	$control_priority	   = 1;

	// CreativeWorks Theme Options Panel
	$wp_customize->add_panel( 'creative_works_theme_panel', array(
		'priority'		  => 10,
		'title'			 => esc_html__( 'CreativeWorks Theme Options', 'CreativeWorks' ),
		'description'	   => esc_html__( 'Customization Options specific to CreativeWorks', 'CreativeWorks' ),
	) );

	$wp_customize->add_section( 'creative_works_footer', array(
		'title'			 => esc_html__( 'Footer Options', 'CreativeWorks' ),
		'priority'		  => $section_priority++,
		'panel'			 => 'creative_works_theme_panel',
	) );

	// Footer Heading
	$wp_customize->add_setting( 'creative_works_footer_heading', array(
		'default'		   => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability'		=> 'edit_theme_options',
	) );
	$wp_customize->add_control( 'creative_works_footer_heading', array(
		'type'			  => 'text',
		'priority'		  => $control_priority++,
		'label'			 => esc_html__( 'Enter Footer Heading', 'CreativeWorks' ),
		'section'		   => 'creative_works_footer',
	) );

	// Footer Body Text
	$wp_customize->add_setting( 'creative_works_footer_body', array(
		'default'		   => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability'		=> 'edit_theme_options',
	) );
	$wp_customize->add_control( 'creative_works_footer_body', array(
		'type'			  => 'text',
		'priority'		  => $control_priority++,
		'label'			 => esc_html__( 'Enter Footer Body Text', 'CreativeWorks' ),
		'section'		   => 'creative_works_footer',
	) );

	// Footer Background Color
	$wp_customize->add_setting( 'creative_works_footer_bg_color', array(
		'default'		   => '',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability'		=> 'edit_theme_options',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'creative_works_footer_bg_color', array(
		'priority'		  => $control_priority++,
		'label'			 => esc_html__( 'Select Footer Background Color', 'CreativeWorks' ),
		'section'		   => 'creative_works_footer',
	) ) );

	// Footer Body Phone
	$wp_customize->add_setting( 'creative_works_footer_phone', array(
		'default'		   => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability'		=> 'edit_theme_options',
	) );
	$wp_customize->add_control( 'creative_works_footer_phone', array(
		'type'			  => 'text',
		'priority'		  => $control_priority++,
		'label'			 => esc_html__( 'Enter Phone Number', 'CreativeWorks' ),
		'section'		   => 'creative_works_footer',
	) );

	// Footer Body Email
	$wp_customize->add_setting( 'creative_works_footer_email', array(
		'default'		   => '',
		'sanitize_callback' => 'sanitize_email',
		'capability'		=> 'edit_theme_options',
	) );
	$wp_customize->add_control( 'creative_works_footer_email', array(
		'type'			  => 'text',
		'priority'		  => $control_priority++,
		'label'			 => esc_html__( 'Enter Email Address', 'CreativeWorks' ),
		'section'		   => 'creative_works_footer',
	) );
}
