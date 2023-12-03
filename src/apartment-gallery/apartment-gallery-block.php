<?php
/**
 * Plugin Name:       Acf Apartment Gallery Block
 * Description:       Apartment Gallery block scaffolded with Create Block tool.
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            The WordPress Contributors
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       apartment-gallery-block
 *
 * @package           acf-apartment-gallery-block
 */

if ( ! defined( 'ABSPATH' ) ) {
	return;
}

const ACF_PRO_PLUGIN_NAME = 'advanced-custom-fields-pro/acf.php';
const THIS_PLUGIN_NAME    = 'apartment-gallery/apartment-gallery-block.php';
const ERROR_MESSAGE       = 'Acf Apartment Gallery Block Plugin requires ACF Pro, and has therefore been deactivated!';
const BUTTON              = '<a href="%s" rel="nofollow ugc">Return to Plugins</a>';

// Check if needed functions exists - if not, require them
if ( ! function_exists( 'get_plugins' ) || ! function_exists( 'is_plugin_active' ) ) {
	require_once ABSPATH . 'wp-admin/includes/plugin.php';
}

/**
 * Check if plugin is installed by getting all plugins from the plugins dir
 *
 * @param $plugin_slug
 *
 * @return bool
 */
function acf_apartment_gallery_block_check_plugin_installed( $plugin_slug ): bool {
	$installed_plugins = get_plugins();

	return array_key_exists( $plugin_slug, $installed_plugins ) || in_array( $plugin_slug, $installed_plugins, true );
}

/**
 * Check if plugin is installed
 *
 * @param string $plugin_slug
 *
 * @return bool
 */
function acf_apartment_gallery_block_check_plugin_active( $plugin_slug ): bool {
	if ( is_plugin_active( $plugin_slug ) ) {
		return true;
	}

	return false;
}

register_activation_hook( __FILE__, 'check_acf_pro_plugin_installation_and_activation' );
function check_acf_pro_plugin_installation_and_activation() {
	$is_acf_pro_installed = acf_apartment_gallery_block_check_plugin_installed( ACF_PRO_PLUGIN_NAME );
	$is_acf_pro_active    = acf_apartment_gallery_block_check_plugin_active( ACF_PRO_PLUGIN_NAME );

	if ( $is_acf_pro_installed && $is_acf_pro_active ) {
		require_once plugin_dir_path( __FILE__ ) . 'includes/acf/acf-functions.php';
		require_once plugin_dir_path( __FILE__ ) . 'includes/plugin-functions.php';
	} else {
		deactivate_plugins( THIS_PLUGIN_NAME );

		wp_die( ERROR_MESSAGE . ' ' . sprintf( BUTTON, esc_attr( network_admin_url( 'plugins.php' ) ) ) );
	}
}

add_action( 'admin_init', 'acf_apartment_gallery_block_check_plugin_dependency' );
function acf_apartment_gallery_block_check_plugin_dependency() {
	$is_acf_pro_installed = acf_apartment_gallery_block_check_plugin_installed( ACF_PRO_PLUGIN_NAME );
	$is_acf_pro_active    = acf_apartment_gallery_block_check_plugin_active( ACF_PRO_PLUGIN_NAME );

	// make sure to add your own plugin active check to stop looping over the wp_die call.
	if ( ( ! $is_acf_pro_installed || ! $is_acf_pro_active ) && is_plugin_active( THIS_PLUGIN_NAME ) ) {
		deactivate_plugins( THIS_PLUGIN_NAME );

		wp_die( ERROR_MESSAGE . ' ' . sprintf( BUTTON, esc_attr( network_admin_url( 'plugins.php' ) ) ) );
	}
}
