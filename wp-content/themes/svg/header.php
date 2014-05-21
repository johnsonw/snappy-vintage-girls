<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Snappy Vintage Girls
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site aligncenter">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'snappy-vintage-girls' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<img class="alignleft" src= "<?php bloginfo( 'template_directory'); ?>/svglogo.png" alt="sitelogo">
			<div class="alignleft">
				<h1 class="site-title BlackJack"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			</div>
		</div>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle"><?php _e( 'Primary Menu', 'snappy-vintage-girls' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			<p class="alignright searchbar">
				<input type="text" name="searchbar" id="searchbar" placeholder="Search..."/>
			</p>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
