<?php
/**
 * Block Variation Customize Class.
 *
 * The file that defines the customized block variation
 *
 * @since      0.0.1
 *
 * @package    my-tiny-adjustment-kit
 * @subpackage inc
 */

namespace MTA_Kit;

class Block_Variation {

	public static function init() {
		add_action( 'enqueue_block_editor_assets', 'block_variation_assets' );
	}

	public static function block_variation_assets() {
		// Get auto-generated asset file.
		$asset_file = MTA_KIT_PATH . '/build/index.asset.php';
		// If the asset file exists, get its data and load the script.
		if ( file_exists( $asset_file ) ) {
			$asset = include $asset_file;

			wp_enqueue_script(
				'line-social-icon',
				MTA_KIT_URL . '/build/index.js',
				$asset['dependencies'],
				$asset['version'],
				true
			);
		}
	}
}

// function mtak_enqueue_line_icon_assets() {
// wp_enqueue_style(
// 'line-icon',
// get_stylesheet_directory_uri() . '/css/line-icon.css',
// array(),
// '1.0.0'
// );
// }
// add_action( 'enqueue_block_editor_assets', 'mtak_enqueue_line_icon_assets' );

// function mtak_register_line_social_icon_variation() {
// if ( function_exists( 'register_block_type_from_metadata' ) ) {
// wp_register_script(
// 'line-social-icon-variation',
// get_stylesheet_directory_uri() . '/js/line-social-icon-variation.js',
// array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' ),
// '1.0.0',
// true
// );

// register_block_type_from_metadata(
// __DIR__ . '/js/line-social-icon-variation',
// array( 'editor_script' => 'line-social-icon-variation' )
// );
// }
// }
// add_action( 'init', 'mtak_register_line_social_icon_variation' );
