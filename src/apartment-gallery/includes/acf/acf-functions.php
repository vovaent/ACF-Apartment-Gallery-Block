<?php
/**
 * Include ACF PRO
 *
 * @package acf
 */

define( 'MY_ACF_JSON_PATH', plugin_dir_path( __FILE__ ) . '../../acf-json' );

// (Optional) Hide the ACF admin menu item.
add_filter( 'acf/settings/show_admin', '__return_false' );

// When including the PRO plugin, hide the ACF Updates menu.
add_filter( 'acf/settings/show_updates', '__return_false', 100 );

/**
 * Registration acf-json
 *
 * @param string $paths acf-json paths.
 */
function my_acf_json_load_point( $paths ) {
	// Append the new path and return it.
	$paths[] = MY_ACF_JSON_PATH . '/field-groups';
	$paths[] = MY_ACF_JSON_PATH . '/post-types';
	$paths[] = MY_ACF_JSON_PATH . '/taxonomies';

	return $paths;
}
add_filter( 'acf/settings/load_json', 'my_acf_json_load_point' );

/**
 * Registration acf-json path of acf-field-group
 */
function my_acf_groups_save_folder() {
	return MY_ACF_JSON_PATH . '/field-groups';
}
add_filter( 'acf/settings/save_json/type=acf-field-group', 'my_acf_groups_save_folder' );

/**
 * Registration acf-json path of acf-post-type
 */
function my_acf_cpt_save_folder() {
	return MY_ACF_JSON_PATH . '/post-types';
}
add_filter( 'acf/settings/save_json/type=acf-post-type', 'my_acf_cpt_save_folder' );

/**
 * Registration acf-json path of acf-taxonomy
 */
function my_acf_tax_save_folder() {
	return MY_ACF_JSON_PATH . '/taxonomies';
}
add_filter( 'acf/settings/save_json/type=acf-post-type', 'my_acf_tax_save_folder' );
