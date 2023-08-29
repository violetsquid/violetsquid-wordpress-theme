<?php
/**
* Title: VioletSquid Navs
* Slug: violetsquid/vsqd-nav
*/

function register_vsqd_menus() {
    register_nav_menus(
        array(
        'vsqd-header-menu' => __( 'VioletSquid Header Menu' )
        )
    );
}
add_action( 'init', 'register_vsqd_menus' );

add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);
function my_wp_nav_menu_objects( $items, $args ) {
    if( $args->theme_location == 'vsqd-header-menu' ) {
        // loop
        foreach( $items as &$item ) {
            
            // vars
            $mytext = "content";

            // append
            if( $mytext ) {
                $item->title .= $mytext;
            }
        }
    }
    // return
    return $items;
}
?>

<nav class="vsqd-header-nav">
    <?php wp_nav_menu(
        array(
            'theme_location' => 'vsqd-header-menu',
            'menu_class' => 'vsqd_menu_default'
        )
    ); ?>
</nav>