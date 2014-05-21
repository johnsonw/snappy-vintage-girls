<?php
/**
 * Template Name: Home
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Snappy Vintage Girls
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div id="hometop"> 
				<div id="loginbox"></div>
			</div>
			<div id="Elementbox">
				<?php if ( dynamic_sidebar('Home Page Content') ) : else : endif; ?>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
