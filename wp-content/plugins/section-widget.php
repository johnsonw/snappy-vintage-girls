<?php
/**
 * Plugin Name: Section Widget
 * Plugin URI: http://snappyvintagegirls.com
 * Description: A widget that represents the block section on the home page.
 * Version: 0.1
 * Author: Nerissa Johnson
 * Author URI: http://snappyvintagegirls.com
 *
 */

/**
 * Add function to widgets_init that'll load our widget.
 * @since 0.1
 */
add_action( 'widgets_init', 'load_widget' );

/**
 * Register our widget.
 * 'Section_Widget' is the widget class used below.
 *
 * @since 0.1
 */
function load_widget() {
	register_widget( 'Section_Widget' );
}

/**
 * Section Widget class.
 * This class handles everything that needs to be handled with the widget:
 * the settings, form, display, and update. 
 *
 * @since 0.1
 */
class Section_Widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function Section_Widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'section_widget', 'description' => __('Section widget for the section blocks on the home page.') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'section-widget' );

		/* Create the widget. */
		$this->WP_Widget( 'section-widget', __('Section Widget', 'section'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$imgBackground = $instance['img_background'];
		$link = get_permalink($instance['page_link']);

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the container */
		echo "<a href='" . $link . "'>";
		echo "<div class='home-page-section {$imgBackground}'>";
		
		if ($title) {
			echo "<div class='teal-gradient'>" . $before_title . $title . $after_title . "</div>";
		}
		
		echo "</div>";
		echo "</a>";
		

		/* After widget (defined by themes). */
		echo $after_widget;
	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['img_background'] = $new_instance['img_background'];
		$instance['page_link'] = $new_instance['page_link'];

		return $instance;
	}

	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	function form( $instance ) {
		/* Set up some default widget settings. */
		$defaults = array( 
			'title' => __('Section Name', 'section_name'), 
			'img_background' => __('background_class', 'background_class'),
			'page_link' => __('page_link', 'page_link')
		);

		$instance = wp_parse_args( (array) $instance, $defaults ); 

		$postArgs = array( 'posts_per_page' => -1, 'post_type' => 'page' );
		$pages = get_posts( $postArgs );
		?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'hybrid'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>

		<!-- Background Image: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'img_background' ); ?>"><?php _e('Background Image:', 'img_background'); ?></label>
			<input id="<?php echo $this->get_field_id( 'img_background' ); ?>" name="<?php echo $this->get_field_name( 'img_background' ); ?>" value="<?php echo $instance['img_background']; ?>" style="width:100%;" />
		</p>

		<!-- Link -->
		<p>
			<label for="<?php echo $this->get_field_id( 'page_link' ); ?>"><?php _e('Page Link:', 'page_link'); ?></label>
			<br />
			<select type="select" id="<?php echo $this->get_field_id( 'page_link' ); ?>" name="<?php echo $this->get_field_name( 'page_link' ); ?>">
				<?php
					foreach($pages as $page) {
						$selected = "";
						if (!empty($instance['page_link']) && $instance['page_link'] == $page->ID) {
							$selected = " selected='selected'";
						}
						echo "<option value='" . $page->ID . "'" . $selected . ">" . $page->post_title . "</option>";
					}
				?>
			</select>
		</p>

	<?php
	}
}