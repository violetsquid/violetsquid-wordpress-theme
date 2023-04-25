<?php

function require_theme_blocks() {
    require plugin_dir_path( __FILE__ ) . '10-dynamic-block/index.php';
    require plugin_dir_path( __FILE__ ) . 'animated-circles/index.php';
    require plugin_dir_path( __FILE__ ) . 'window-simulation-container/index.php';
    require plugin_dir_path( __FILE__ ) . 'nav-section/index.php';
}

require_theme_blocks();