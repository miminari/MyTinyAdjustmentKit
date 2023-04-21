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

/**
 * MTA_Kit Block Variation
 */
class Block_Variation {

	public static function init() {
		add_action( 'enqueue_block_editor_assets', array( get_called_class(), 'block_variation_assets' ) );

		// add_filter( 'rest_course_query', 'rest_course', 10, 2 );

		// function rest_course( $args, $request ) {

		// 	$price = $request->get_param( 'coursePrice' );

		// 	if ( $price ) {
		// 		$args['meta_key']   = 'price';
		// 		$args['meta_value'] = absint( $price );
		// 	}

		// 	return $args;
		// }

		// add_filter( 'pre_render_block', 'custom_pre_render_block', 10, 2 );

		// function custom_pre_render_block( $pre_render, $parsed_block ) {
		// 	// Determine if this is the custom block variation.
		// 	if ( 'mta-kit-course' === $parsed_block['attrs']['namespace'] ) {

		// 		add_filter(
		// 			'query_loop_block_query_vars',
		// 			function( $query, $block ) use ( $parsed_block ) {

		// 				// Add price meta key/value pair if queried.
		// 				if ( $parsed_block['attrs']['query']['coursePrice'] ) {
		// 					$query['meta_key']   = 'price';
		// 					$query['meta_value'] = absint( $parsed_block['attrs']['query']['coursePrice'] );
		// 				}

		// 				return $query;
		// 			},
		// 			10,
		// 			2
		// 		);
		// 	}

		// 	return $pre_render;
		// }
	}


	public static function block_variation_assets() {
		// Get auto-generated asset file.
		$asset_file = MTA_KIT_PATH . '/build/index.asset.php';
		// If the asset file exists, get its data and load the script.
		if ( file_exists( $asset_file ) ) {
			$asset = include $asset_file;

			wp_enqueue_script(
				'mta-kit-course-variation',
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
