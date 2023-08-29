<?php

function add_theme_scripts() {
	wp_enqueue_style( 'vsqd-theme-core', get_template_directory_uri() . '/assets/css/vsqd-theme-core.css');
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

function register_vsqd_menus() {
    register_nav_menus(
        array(
        'vsqd-header-menu' => __( 'VioletSquid Header Menu' )
        )
    );
}
add_action( 'init', 'register_vsqd_menus' );
