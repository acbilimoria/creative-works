<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CreativeWorks
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
	<script src="<?php echo ( get_template_directory_uri() . '/creative-works/js/html5shiv.js' ); ?>"></script>
	<script src="<?php echo ( get_template_directory_uri() . '/creative-works/js/respond.min.js' ); ?>"></script>
<![endif]-->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'CreativeWorks' ); ?></a>
	<nav id="mainNav" class="main-navigation navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand page-scroll" href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
			</div>
			<?php
				wp_nav_menu( array(
					'menu'			  => 'primary',
					'theme_location'	=> 'primary',
					'depth'			 => 2,
					'container'		 => 'div',
					'container_class'   => 'collapse navbar-collapse',
					'container_id'	  => 'bs-example-navbar-collapse-1',
					'menu_class'		=> 'nav navbar-nav navbar-right',
					'fallback_cb'	   => 'wp_bootstrap_navwalker::fallback',
					'walker'			=> new wp_bootstrap_navwalker())
				);
			?>
		</div>
	</nav><!-- #site-navigation -->
	<?php $bg_img = !empty( get_post_meta( get_the_ID(), 'image', true ) ) ? get_post_meta( get_the_ID(), 'image', true ) : get_template_directory_uri() . '/creative-works/img/header.jpg'; ?>
	<header id="masthead" class="site-header" role="banner" style="height:100vh;background-image:url(<?php echo esc_attr( $bg_img ); ?>);">
		 <div class="header-content">
			<div class="header-content-inner">
				<h1><?php echo esc_html( get_the_title() ); ?></h1>
				<hr>
				<?php if ( !empty( get_post_meta( get_the_ID(), 'subtitle', true ) ) ) { ?>
					<p><?php echo esc_html( get_post_meta( get_the_ID(), 'subtitle', true ) ); ?></p>
				<?php } ?>
				<?php if ( !empty( get_post_meta( get_the_ID(), 'body', true ) ) ) { ?>
					<?php echo wp_kses_post( get_post_meta( get_the_ID(), 'body', true ) ); ?>
				<?php } ?>
			</div>
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
