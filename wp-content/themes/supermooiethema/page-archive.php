<?php
get_header();
the_post();
$archive_page_title = get_the_title();
$archive_page_content = get_the_content();
$filters = supermooiethema_archive_filters();
$archive_query = new WP_Query(supermooiethema_archive_query_args($filters));
?>
<main class="archive-page">
    <header class="archive-heading"><p class="eyebrow">Berichten</p><h1><?php echo esc_html($archive_page_title ?: 'Archief'); ?></h1><?php if ($archive_page_content) : ?><div class="archive-description"><?php echo apply_filters('the_content', $archive_page_content); ?></div><?php endif; ?></header>
    <section class="archive-tools"><p>Filter berichten op zoekwoord, categorie, tag of auteur.</p><?php supermooiethema_archive_filter_form(get_permalink()); ?></section>
    <?php require get_theme_file_path('/archive-results.php'); ?>
</main>
<?php get_footer(); ?>
