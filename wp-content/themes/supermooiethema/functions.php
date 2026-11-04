<?php
function supermooiethema_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script'));
    register_nav_menus(array('primary' => 'Hoofdnavigatie'));
}
add_action('after_setup_theme', 'supermooiethema_setup');

function supermooiethema_register_archive_route() {
    add_rewrite_rule('^archive/?$', 'index.php?supermooiethema_archive=1', 'top');
}
add_action('init', 'supermooiethema_register_archive_route');

function supermooiethema_archive_query_var($vars) {
    $vars[] = 'supermooiethema_archive';
    return $vars;
}
add_filter('query_vars', 'supermooiethema_archive_query_var');

function supermooiethema_prepare_archive_route($query) {
    if (!is_admin() && $query->is_main_query() && $query->get('supermooiethema_archive')) {
        $query->set('post_type', 'post');
        $query->set('posts_per_page', 10);
        $query->is_404 = false;
        $query->is_archive = true;
        $query->is_home = false;
    }
}
add_action('pre_get_posts', 'supermooiethema_prepare_archive_route');

function supermooiethema_archive_template($template) {
    if (get_query_var('supermooiethema_archive')) {
        return get_theme_file_path('/archive.php');
    }
    return $template;
}
add_filter('template_include', 'supermooiethema_archive_template');

function supermooiethema_refresh_archive_route() {
    if (get_option('supermooiethema_rewrite_version') !== '1') {
        flush_rewrite_rules(false);
        update_option('supermooiethema_rewrite_version', '1');
    }
}
add_action('init', 'supermooiethema_refresh_archive_route', 20);

function supermooiethema_enqueue_styles() {
    $files = array('style' => true, 'front-page' => is_front_page() || is_archive() || is_page('archive'), 'single' => is_singular('post'), '404' => is_404(), 'archive' => is_archive() || is_search() || is_page('archive'), 'page' => is_page());
    foreach ($files as $name => $load) {
        $path = get_theme_file_path('/' . $name . '.css');
        if ($load && file_exists($path)) {
            wp_enqueue_style('supermooiethema-' . $name, get_theme_file_uri('/' . $name . '.css'), array(), filemtime($path));
        }
    }
}
add_action('wp_enqueue_scripts', 'supermooiethema_enqueue_styles');

function supermooiethema_archive_filters() {
    return array(
        'category' => isset($_GET['filter_category']) ? absint(wp_unslash($_GET['filter_category'])) : 0,
        'tag'      => isset($_GET['filter_tag']) ? absint(wp_unslash($_GET['filter_tag'])) : 0,
        'author'   => isset($_GET['filter_author']) ? absint(wp_unslash($_GET['filter_author'])) : 0,
        'search'   => isset($_GET['filter_search']) ? sanitize_text_field(wp_unslash($_GET['filter_search'])) : '',
    );
}

function supermooiethema_archive_query_args($filters) {
    $args = array('post_type' => 'post', 'post_status' => 'publish', 'posts_per_page' => 10, 'paged' => max(1, get_query_var('paged') ? get_query_var('paged') : (isset($_GET['paged']) ? absint($_GET['paged']) : 1)));
    if (is_category()) $args['cat'] = get_queried_object_id();
    if (is_tag()) $args['tag_id'] = get_queried_object_id();
    if (is_author()) $args['author'] = get_queried_object_id();
    if (is_date()) { $args['year'] = get_query_var('year'); $args['monthnum'] = get_query_var('monthnum'); $args['day'] = get_query_var('day'); }
    if ($filters['category']) $args['cat'] = $filters['category'];
    if ($filters['tag']) $args['tag_id'] = $filters['tag'];
    if ($filters['author']) $args['author'] = $filters['author'];
    if ($filters['search'] !== '') $args['s'] = $filters['search'];
    return $args;
}

function supermooiethema_archive_filter_form($action_url) {
    $filters = supermooiethema_archive_filters();
    $categories = get_categories(array('hide_empty' => true));
    $tags = get_tags(array('hide_empty' => true));
    $authors = get_users(array('who' => 'authors', 'has_published_posts' => array('post')));
    ?>
    <form class="archive-filter-form" method="get" action="<?php echo esc_url($action_url); ?>">
        <label>Zoeken <input type="search" name="filter_search" value="<?php echo esc_attr($filters['search']); ?>" placeholder="Zoek berichten"></label>
        <label>Categorie <select name="filter_category"><option value="0">Alle categorieën</option><?php foreach ($categories as $category) : ?><option value="<?php echo esc_attr($category->term_id); ?>" <?php selected($filters['category'], $category->term_id); ?>><?php echo esc_html($category->name); ?></option><?php endforeach; ?></select></label>
        <label>Tag <select name="filter_tag"><option value="0">Alle tags</option><?php foreach ($tags as $tag) : ?><option value="<?php echo esc_attr($tag->term_id); ?>" <?php selected($filters['tag'], $tag->term_id); ?>><?php echo esc_html($tag->name); ?></option><?php endforeach; ?></select></label>
        <label>Auteur <select name="filter_author"><option value="0">Alle auteurs</option><?php foreach ($authors as $author) : ?><option value="<?php echo esc_attr($author->ID); ?>" <?php selected($filters['author'], $author->ID); ?>><?php echo esc_html($author->display_name); ?></option><?php endforeach; ?></select></label>
        <button type="submit">Filter berichten</button>
        <a class="filter-reset" href="<?php echo esc_url($action_url); ?>">Wis filters</a>
    </form>
    <?php
}
