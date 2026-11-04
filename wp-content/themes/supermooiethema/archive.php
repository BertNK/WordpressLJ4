<?php
get_header();
$filters = supermooiethema_archive_filters();
$archive_query = new WP_Query(supermooiethema_archive_query_args($filters));
?>
<main class="archive-page">
    <header class="archive-heading"><p class="eyebrow">Ontdek de website</p><h1><?php echo get_query_var('supermooiethema_archive') ? 'Berichtenarchief' : esc_html(get_the_archive_title()); ?></h1><?php the_archive_description('<div class="archive-description">', '</div>'); ?></header>
    <section class="archive-tools"><p>Filter berichten op zoekwoord, categorie, tag of auteur.</p><?php supermooiethema_archive_filter_form(get_pagenum_link(1)); ?></section>
    <?php require get_theme_file_path('/archive-results.php'); ?>
</main>
<?php get_footer(); ?>
