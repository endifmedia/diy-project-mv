<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://endif.media
 * @since      1.0.0
 *
 * @package    Diy_Projects
 * @subpackage Diy_Projects/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Diy_Projects
 * @subpackage Diy_Projects/admin
 * @author     Ethan Allen <yourfriendethan@gmail.com>
 */
class Diy_Projects_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Diy_Projects_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Diy_Projects_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/diy-projects-admin.js', array( 'jquery', 'wp-color-picker' ), $this->version, false );

	}

	/**
	 * Add settings menu under Settings > DIY Projects.
	 *
	 * @since    1.0.0
	 */
	public function add_menu_link() {
		add_options_page( 'DIY Projects' , 'DIY Projects', 'manage_options', 'diy_projects_settings', array(&$this, 'options_page'));
	}

	/**
	 * Function that displays the options form.
	 *
	 * @since    1.0.0
	 */
	public function options_page() {

		$options = $this->option_fields();
		$other = new Diy_Projects_Plugin_Options('DIY Projects', 'diy_projects_settings', 'diy_projects_settings');

		if (isset($_GET['tab']) && !is_numeric($_GET['tab'])){
			$active_tab = sanitize_text_field($_GET['tab']);
		} else {
			$active_tab = 'general';
		}

		$other->render_form($options, $active_tab);

	}

	/**
	 * Function that builds the options array for Plugin_Settings class.
	 *
	 * @since    1.0.0
	 */
	public function option_fields() {

		$options = array(
			'general' => apply_filters('diy_projects_settings_general',
				array(
					'background_color' => array(
						'id'   => 'background_color',
						'label' => __('Background color:', $this->plugin_name),
						'type' => 'colorpicker',
						'desc' => __('Change the background color of the DIY Projects info.', $this->plugin_name)
					),
				)
			),
		);
		return apply_filters('diy_projects_settings_group', $options);

	}

	/**
	 * Setup meta boxes.
	 */
	public function setup_metaboxes() {
		add_meta_box('diy_project_details', __('Project Details', $this->plugin_name), array(&$this, 'project_details'), 'post', 'normal');
	}

	/**
	 * Save post meta.
	 *
	 * @param $post_id
	 * @param $post
	 */
	public function save_post_meta($post_id, $post) {

		if ( ! current_user_can( 'edit_plugins' ) ) {
			return;
		}

		if (isset($_REQUEST['diy-projects-post-meta'])) {
			$sanitized_meta = '';

			//sanitize first
			$sanitized_meta = array_map( 'sanitize_text_field', $_REQUEST['diy-projects-post-meta'] );
			update_post_meta( $post->ID, 'diy_projects_post_meta', $sanitized_meta );
		}

	}

	/**
	 * Meta box content and display.
	 */
	public function project_details() {

		global $post;

		$meta = get_post_meta($post->ID, 'diy_projects_post_meta', true);

		?>
		<table class="<?php $this->plugin_name; ?> form-table">
			<tbody>
			<tr class="">
				<th><label for=""><?php _e('Difficulty Level:', $this->plugin_name); ?></label></th>
				<td><input type="text" name="diy-projects-post-meta[difficulty-level]" id="difficulty-level" value="<?php echo (!empty($meta['difficulty-level']) ? esc_attr($meta['difficulty-level']) : ''); ?>" class="ltr">
				</td>
			</tr>
			<tr class="">
				<th><label for=""><?php _e('Time to Complete:', $this->plugin_name); ?></label></th>
				<td><input type="text" name="diy-projects-post-meta[time-to-complete]" id="time-to-complete" value="<?php echo (!empty($meta['time-to-complete']) ? esc_attr($meta['time-to-complete']) : ''); ?>" class="ltr">
				</td>
			</tr>
			<tr class="">
				<th><label for=""><?php _e('Materials Cost:', $this->plugin_name); ?></label></th>
				<td><input type="text" name="diy-projects-post-meta[materials-cost]" id="materials-cost" value="<?php echo (!empty($meta['materials-cost']) ? esc_attr($meta['materials-cost']) : ''); ?>" class="ltr">
				</td>
			</tr>
			</tbody>
		</table>

	<?php }

}
