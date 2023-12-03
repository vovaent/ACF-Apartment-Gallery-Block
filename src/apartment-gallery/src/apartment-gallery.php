<?php
/**
 * Block Apartment Gallery Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 *
 * @package acf
 */

// $data is what we're going to expose to our render template
$data = array(
	'benefits' => get_field( 'benefits' ),
);

// Dynamic block ID.
$block_id = 'apartment-gallery-' . $block['id'];

// Check if a custom ID is set in the block editor.
if ( ! empty( $block['anchor'] ) ) {
	$block_id = $block['anchor'];
}

// Block classes.
$class_name = 'wp-block-acf-apartment-gallery';
if ( ! empty( $block['class_name'] ) ) {
	$class_name .= ' ' . $block['class_name'];
}



require_once plugin_dir_path( __FILE__ ) . 'template.php';
