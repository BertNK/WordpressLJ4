<?php
function supermooiethema_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script'));
    register_nav_menus(array('primary' => 'Hoofdnavigatie'));
}
add_action('after_setup_theme', 'supermooiethema_setup');

function supermooiethema_enqueue_styles() {
    $files = array('style' => true, 'front-page' => is_front_page(), 'single' => is_singular('post'), '404' => is_404(), 'archive' => is_archive() || is_search(), 'page' => is_page());
    foreach ($files as $name => $load) {
        $path = get_theme_file_path('/' . $name . '.css');
        if ($load && file_exists($path)) {
            wp_enqueue_style('supermooiethema-' . $name, get_theme_file_uri('/' . $name . '.css'), array(), filemtime($path));
        }
    }
}
add_action('wp_enqueue_scripts', 'supermooiethema_enqueue_styles');
