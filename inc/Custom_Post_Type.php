<?php
/**
 * Custom Post Type Class
 *
 * The file that defines the customized post type
 *
 * @since      0.0.2
 *
 * @package    my-tiny-adjustment-kit
 * @subpackage inc
 */

namespace MTA_Kit;

/**
 * MTA_Kit Custom Post Type
 */
class Custom_Post_Type {
	/**
	 * Init
	 */
	public static function init() {
        // カスタム投稿タイプの追加.
		add_action( 'init', array( get_called_class(), 'create_post_types' ) );
	}

	/**
	 * カスタム投稿タイプの設定.
	 */
	public static function create_post_types() {
		// Add course post type.
		$course_labels = array(
			'name'               => _x( 'コース', 'post type general name', 'mtakit' ),
			'singular_name'      => _x( 'Course', 'post type singular name', 'mtakit' ),
			'add_new'            => _x( '新規追加', 'course', 'mtakit' ),
			'add_new_item'       => __( '新規にコースを追加', 'mtakit' ),
			'edit_item'          => __( 'コースを編集', 'mtakit' ),
			'new_item'           => __( 'New Course', 'mtakit' ),
			'view_item'          => __( 'コースを見る', 'mtakit' ),
			'search_items'       => __( 'コースを検索', 'mtakit' ),
			'not_found'          => __( 'コースが見つかりません', 'mtakit' ),
			'not_found_in_trash' => __( 'No course found in Trash', 'mtakit' ),
			'parent_item_colon'  => '',
		);
		$course_args   = array(
			'labels'             => $course_labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_rest'       => true,
			'query_var'          => true,
			'rewrite'            => false,
			'hierarchical'       => true,
			'menu_position'      => null,
			'capability_type'    => 'post',
			'supports'           => array( 'title', 'excerpt', 'editor', 'thumbnail', 'revisions' ),
			'menu_icon'          => 'dashicons-format-gallery',
			'taxonomies'         => array( 'category', 'post_tag' ),
			'has_archive'        => false,
		);
		register_post_type( 'course', $course_args );
	}
}
