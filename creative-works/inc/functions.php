<?php
/**
 * CreativeWorks functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package CreativeWorks
 */

// Register Custom Navigation Walker
require_once( get_template_directory() . '/creative-works/js/wp_bootstrap_navwalker.php' );
require_once( get_template_directory() . '/creative-works/inc/enqueue-scripts.php' );
require_once( get_template_directory() . '/creative-works/inc/customize-theme.php' );
require_once( get_template_directory() . '/creative-works/inc/use-child-theme.php' );
require_once( get_template_directory() . '/creative-works/inc/meta-boxes.php' );
require_once( get_template_directory() . '/creative-works/widgets/widgets.php' );

register_nav_menus( array(
	'primary' => __( 'Primary Menu', 'CreativeWorks' ),
) );

function CreativeWorks_hex2rgb( $hex ) {
	$hex = str_replace( "#", "", $hex );
	$o = '.7';

	if( strlen( $hex ) == 3 ) {
		$r = hexdec( substr( $hex, 0, 1 ).substr( $hex, 0, 1 ) );
		$g = hexdec( substr( $hex, 1, 1 ).substr( $hex, 1, 1 ) );
		$b = hexdec( substr( $hex, 2, 1 ).substr( $hex, 2, 1 ) );
	} else {
		$r = hexdec( substr( $hex, 0, 2 ) );
		$g = hexdec( substr( $hex, 2, 2 ) );
		$b = hexdec( substr( $hex, 4, 2 ) );
	}

	$empty_rgba = '%d,%d,%d,%.1f';
	$rgba = sprintf( $empty_rgba, $r, $g, $b, $o );
	return $rgba;
}
