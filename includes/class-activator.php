<?php

/**
 * Fired during plugin activation
 *
 * @link       https://endif.media
 * @since      1.0.0
 *
 * @package    Diy_Projects
 * @subpackage Diy_Projects/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Diy_Projects
 * @subpackage Diy_Projects/includes
 * @author     Ethan Allen <yourfriendethan@gmail.com>
 */
class Diy_Projects_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

		$options = get_option('diy_projects_settings');

		if (empty($options)) {
			$options = array(
				'background_color' => __('', 'diy-projects')
			);
			update_option('diy_projects_settings', $options);
		}

	}

}
