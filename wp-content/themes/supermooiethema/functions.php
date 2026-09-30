<?php
function supermooiethema_enqueue_styles() {
    $stylesheets = array(
        'front-page' => is_front_page(),
        'single'     => is_singular('post'),
        '404'        => is_404(),
    );

    foreach ($stylesheets as $stylesheet => $should_load) {
        if ($should_load) {
            $file = '/' . $stylesheet . '.css';

            wp_enqueue_style(
                'supermooiethema-' . $stylesheet,
                get_theme_file_uri($file),
                array(),
                filemtime(get_theme_file_path($file))
            );
        }
    }
}
add_action('wp_enqueue_scripts', 'supermooiethema_enqueue_styles');