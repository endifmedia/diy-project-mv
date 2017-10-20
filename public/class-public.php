<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://endif.media
 * @since      1.0.0
 *
 * @package    Diy_Projects
 * @subpackage Diy_Projects/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Diy_Projects
 * @subpackage Diy_Projects/public
 * @author     Ethan Allen <yourfriendethan@gmail.com>
 */
class Diy_Projects_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Add custom post meta to front end post page.
	 *
	 * @param $the_content
	 *
	 * @return string
	 */
	public function add_post_meta_to_the_content($the_content) {

		global $post;

		if (!empty($post->ID)) {

			//exit if not a single page
			if (!is_singular()) {
				return;
			}

			$post_meta = array();
			$post_meta = get_post_meta( $post->ID, 'diy_projects_post_meta', true );

			//if meta content is empty return content
			if (!array_filter($post_meta) ) {
				return;
			}

			if (!empty($post_meta['difficulty-level'])) {
				$difficulty = '<p>' . __( 'Difficulty Level: ', $this->plugin_name ) . esc_html( $post_meta['difficulty-level'] ) . '</p>';
			} else {
				$difficulty = '';
			}

			if (!empty($post_meta['time-to-complete'])) {
				$time = '<p>' . __( 'Time to Complete: ', $this->plugin_name ) . esc_html( $post_meta['time-to-complete'] ) . '</p>';
			} else {
				$time = '';
			}

			if (!empty($post_meta['materials-cost'])) {
				$cost = '<p>' . __( 'Materials Cost: ', $this->plugin_name ) . esc_html( $post_meta['materials-cost'] ) . '</p>';
			} else {
				$cost = '';
			}

			$the_content = '<div class="' . $this->plugin_name . '-display-container">' . $difficulty . $time . $cost .'</div>' . $the_content;

		}

		return $the_content;
	}

	/**
	 * Add CSS to page header.
	 */
	public function add_background_css() {

		$options = get_option('diy_projects_settings');

		if (!empty($options['background_color'])) {
			?>

				<style type="text/css">
					.<?php echo $this->plugin_name . '-display-container'; ?> {background-color: <?php echo esc_attr($options['background_color']); ?>}
				</style>

		    <?php }

	}

}
