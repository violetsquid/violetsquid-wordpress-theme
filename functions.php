<?php

function add_theme_scripts() {
	wp_enqueue_style( 'custom-classes', get_template_directory_uri() . '/stylesheets/custom-classes.css');
	wp_enqueue_style( 'navigation-submenu', get_template_directory_uri() . '/stylesheets/navigation-submenu.css');
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

/**
 * Enqueue theme block editor scripts.
 */
function rich_block_editor_scripts() {
	wp_enqueue_script( 'overlapping-columns', get_theme_file_uri( '/assets/js/overlapping-columns.js' ), array( 'wp-blocks', 'wp-dom' ), wp_get_theme()->get( 'Version' ), true );
}
add_action( 'enqueue_block_editor_assets', 'rich_block_editor_scripts' );
