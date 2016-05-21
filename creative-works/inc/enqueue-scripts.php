<?php
/**
 * CreativeWorks enqueue scripts and styles.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package CreativeWorks
 */

add_action( 'wp_enqueue_scripts', 'creative_works_styles_and_scripts' );
function creative_works_styles_and_scripts() {

	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/creative-works/css/bootstrap.min.css', false, false, false );

	wp_enqueue_style( 'open-sans-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800', false, false, false );

	wp_enqueue_style( 'merriweather-fonts', 'https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic', false, false, false );

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/creative-works/fonts/font-awesome/css/font-awesome.min.css', false, false, false );

	wp_enqueue_style( 'animate-css', get_template_directory_uri() . '/creative-works/css/animate.min.css', false, false, false );

	wp_enqueue_style( 'animate-css', get_template_directory_uri() . '/creative-works/css/animate.min.css', false, false, false );

	wp_enqueue_script( 'jquery-easing', get_template_directory_uri() . '/creative-works/js/jquery.easing.min.js', array( 'jquery'), false, true );

	wp_enqueue_script( 'jquery-fittext', get_template_directory_uri() . '/creative-works/js/jquery.fittext.js', false, false, true );

	wp_enqueue_script( 'wow', get_template_directory_uri() . '/creative-works/js/wow.min.js', false, false, true );

	wp_enqueue_script( 'sb-creative-wp-js', get_template_directory_uri() . '/creative-works/js/creative.js', array( 'bootstrap-js' ), false, true );

	wp_enqueue_style( 'sb-creative-wp-css', get_template_directory_uri() . '/creative-works/css/creative-works.css', array( 'creative-css' ), false, false );

	wp_enqueue_style( 'creative-css', get_template_directory_uri() . '/creative-works/css/creative.css', false, false, false );

	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/creative-works/js/bootstrap.min.js', false, false, true );
}

add_action( 'admin_enqueue_scripts', 'creative_works_admin_enqueue_scripts' );
function creative_works_admin_enqueue_scripts() {
	wp_enqueue_script( 'media-uploader', get_template_directory_uri() . '/creative-works/js/media-uploader.js', false, false, true );

	wp_enqueue_style( 'wp-color-picker' );

	wp_enqueue_script( 'wp-color-picker');
}
