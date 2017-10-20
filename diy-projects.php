<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://endif.media
 * @since             1.0.0
 * @package           Diy_Projects
 *
 * @wordpress-plugin
 * Plugin Name:       DIY Projects (mediavine)
 * Plugin URI:        https://endif.media
 * Description:       Plugin that adds extra metaboxes to all posts for difficulty rating, completion time, and materials cost. To set background color go to Settings > DIY Projects.
 * Version:           1.0.0
 * Author:            Ethan Allen
 * Author URI:        https://endif.media
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       diy-projects
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'DIY_PROJECTS_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-diy-projects-activator.php
 */
function activate_diy_projects() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-diy-projects-activator.php';
	Diy_Projects_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-diy-projects-deactivator.php
 */
function deactivate_diy_projects() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-diy-projects-deactivator.php';
	Diy_Projects_Deactivator::deactivate();
}

//register_activation_hook( __FILE__, 'activate_diy_projects' );
//register_deactivation_hook( __FILE__, 'deactivate_diy_projects' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-diy-projects.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_diy_projects() {

	$plugin = new Diy_Projects();
	$plugin->run();

}
run_diy_projects();
