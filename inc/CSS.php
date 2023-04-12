<?php
/**
 * CSS Customize Class
 *
 * The file that defines the customized block style
 *
 * @since      0.0.1
 *
 * @package    my-tiny-adustment-kit
 * @subpackage inc
 */

namespace MTA_Kit;

/**
 * MTA_Kit CSS Customizer
 */
class CSS {
	/**
	 * Init
	 */
	public static function init() {
		add_action(
			'enqueue_block_editor_assets',
			array( get_called_class(), 'add_custom_editor_style' )
		);
		add_action(
			'wp_enqueue_scripts',
			array( get_called_class(), 'add_custom_front_style' ),
			12
		);
	}

	/**
	 * Add custom front style
	 * カスタムスタイルを反映.
	 *
	 * @return void
	 */
	public static function add_custom_front_style() {
		if ( WP_DEBUG ) {
			// Debug Mode.
			wp_enqueue_style( 'msm-style', MTA_KIT_URL . '/build/style.css', false, filemtime( MTA_KIT_PATH . '/build/style.css' ) );
		} else {
			// Release Mode.
			wp_enqueue_style( 'msm-style', MTA_KIT_URL . '/build/style.min.css', false, filemtime( MTA_KIT_PATH . '/build/style.min.css' ) );
		}
	}

	/**
	 * Add custom editor style
	 * カスタムエディタースタイルを反映.
	 *
	 * @return void
	 */
	public static function add_custom_editor_style() {
		add_theme_support( 'editor-styles' );
		wp_enqueue_style(
			'mta-kit-styles-for-editor',
			MTA_KIT_URL . '/build/editor-style.css',
			false,
			filemtime(MTA_KIT_PATH . '/build/editor-style.css')
		);
	}

}
