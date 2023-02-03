<?php

function add_theme_scripts() {
	wp_enqueue_style( 'navigation-submenu', get_template_directory_uri() . '/stylesheets/navigation-submenu.css');
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );
