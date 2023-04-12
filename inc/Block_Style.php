<?php
/**
 * Block Style Customize Class
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
 * MTA_Kit Block Style
 */
class Block_Style {
	/**
	 * Init
	 */
	public static function init() {
		add_action( 'after_setup_theme', array( get_called_class(), 'block_style_setup' ) );
	}

	/**
	 * Add block styles
	 */
	public static function block_style_setup() {
		// wp-block-button.
		register_block_style(
			'core/button',
			array(
				'name'  => 'arrow',
				'label' => '矢印付き',
			)
		);
		// wp-block-heading.
		register_block_style(
			'core/heading',
			array(
				'name'  => 'line',
				'label' => '線あり',
			)
		);
	}
}
