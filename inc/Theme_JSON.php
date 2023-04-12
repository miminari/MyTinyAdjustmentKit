<?php

/**
 * Theme.json Customize Class.
 *
 * @since      0.0.1
 *
 * @package    my-tiny-adustment-kit
 * @subpackage inc
 */

namespace MTA_Kit;

/**
 * MTA_Kit Theme.json
 */
class Theme_JSON
{
	/**
	 * construct
	 */
	public static function init()
	{
		add_filter('wp_theme_json_data_theme', array(get_called_class(), 'set_custom_theme_json'));
	}

	/**
	 * Set Custom Theme.json
	 */
	public static function set_custom_theme_json($theme_json)
	{
		$url  = MTA_KIT_PATH . '/custom-theme.json';
		$json = file_get_contents($url); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents
		$new_data = json_decode($json, true);
		return $theme_json->update_with($new_data);
	}
}
