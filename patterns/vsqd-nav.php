<?php
/**
* Title: VioletSquid Navs
* Slug: violetsquid/vsqd-nav
*/

add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);
function my_wp_nav_menu_objects( $items, $args ) {
        foreach( $items as &$item ) {
            
                $item->title == " test";

        }
    // return
    return $items;
}
?>

    <?php wp_nav_menu(
        array(
            'container' => 'nav',
            'container_class' => 'vsqd-header-nav',
            'theme_location' => 'vsqd-header-menu',
            'menu_class' => 'vsqd-menu',
        )
    ); ?>
