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
				
					<?php 
					if (!is_user_logged_in()) {
						echo "<div id='loginbox'>";
							wp_login_form(); ?>
							<small class="i white">Not a member?<a href="<?php home_url(); ?>/wp-login.php?action=register">Register</a></small>
						</div>
					<?php } else {
						global $current_user;
						get_currentuserinfo();

						echo "<h2 class='white BlackJack user-label'>Welcome, $current_user->user_firstname</h2>";

					}?>
					
					
				
			</div>
			<div id="Elementbox">
				<?php 
				if ( dynamic_sidebar('Home Page Content') ) : else : endif; 
				?>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
