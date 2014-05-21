<?php
/**
 * Plugin Name: Sitemap Widget
 * Plugin URI: http://snappyvintagegirls.com
 * Description: A widget that writes out the sitemap
 * Version: 0.1
 * Author: Nerissa Johnson
 * Author URI: http://snappyvintagegirls.com
 *
 */

/**
 * Add function to widgets_init that'll load our widget.
 * @since 0.1
 */
add_action( 'widgets_init', 'load_sitemap_widget' );

/**
 * Register our widget.
 * 'Section_Widget' is the widget class used below.
 *
 * @since 0.1
 */
function load_sitemap_widget() {
	register_widget( 'Sitemap_Widget' );
}

/**
 * Sitemap Widget class.
 * This class displays the sitemap in any widget section.
 *
 * @since 0.1
 */
class Sitemap_Widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function  Sitemap_Widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'sitemap_widget', 'description' => __('Sitemap widget to display the sitemap.') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'sitemap-widget' );

		/* Create the widget. */
		$this->WP_Widget( 'sitemap-widget', __('Sitemap Widget', 'sitemap'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		//$title = apply_filters('widget_title', $instance['title'] );

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the sitemap */
		echo "<div class='sitemap'>";
		$args = array('posts_per_page' => -1, 'post_type' => 'page');
		$pages = get_posts($args);
		foreach ($pages as $page) {
			echo "<a class='purplelink' href='" . get_permalink($page->ID) . "'>" . $page->post_title . "</a>";
		}
		echo "</div>";
		

		/* After widget (defined by themes). */
		echo $after_widget;
	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		//$instance['title'] = strip_tags( $new_instance['title'] );

		return $instance;
	}

	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	function form( $instance ) {
		/* Set up some default widget settings. */
		$defaults = array();

		$instance = wp_parse_args( (array) $instance, $defaults );
	}
}