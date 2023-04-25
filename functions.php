<?php

function add_theme_scripts() {
	wp_enqueue_style( 'custom-classes', get_template_directory_uri() . '/stylesheets/custom-classes.css');
	wp_enqueue_style( 'navigation-submenu', get_template_directory_uri() . '/stylesheets/navigation-submenu.css');
	wp_enqueue_style( 'overlapping-columns', get_template_directory_uri() . '/stylesheets/overlapping-columns.css');
	wp_enqueue_script( 'fancy-reveal', get_theme_file_uri( '/assets/js/fancy-reveal.js'), array( 'jquery' ), '1.0.0', true);
}

add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

/**
 * Enqueue theme block editor scripts.
 */
function rich_block_editor_scripts() {
	wp_enqueue_script( 'block-variations-styles', get_theme_file_uri( '/assets/js/block-variations-styles.js' ), array( 'wp-blocks', 'wp-dom' ), wp_get_theme()->get( 'Version' ), true );
}
add_action( 'enqueue_block_editor_assets', 'rich_block_editor_scripts' );

function theme_custom_blocks() {
	require get_theme_file_path( '/build/blocks/index.php' );
}
theme_custom_blocks();