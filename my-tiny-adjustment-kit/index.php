<?php
/**
 * Plugin Name:       My Tiniy Adustment Kit
 * Description:       theme.json, styles customize plugin
 * Version:           0.0.1
 * Author:            mimi@photosynthesic
 * Requires at least: 6.2
 * Requires PHP:      7.4
 * Text Domain:       mtakit
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 *
 * @package    my-tiny-adustment-kit
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! class_exists( '\MTAK_Kit\Block_Style' ) ) {

	define( 'MTA_KIT_URL', untrailingslashit( plugin_dir_url( __FILE__ ) ) );
	define( 'MTA_KIT_PATH', untrailingslashit( plugin_dir_path( __FILE__ ) ) );

	if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
		require_once __DIR__ . '/vendor/autoload.php';
		// Block Style
		\MTA_Kit\Block_Style::init();
		// Theme.json
		\MTA_Kit\Theme_JSON::init();
		// CSS
		\MTA_Kit\CSS::init();
	}
}

