<?php get_header(); ?>
<main class="archive-page">
    <header class="archive-heading">
        <p class="eyebrow">Ontdek de website</p>
        <h1><?php the_archive_title(); ?></h1>
        <?php the_archive_description('<div class="archive-description">', '</div>'); ?>
    </header>
    <div class="archive-tools">
        <p>Bekijk berichten op onderwerp of zoek iets specifieks.</p>
        <?php get_search_form(); ?>
        <nav class="topic-links" aria-label="Onderwerpen">
            <?php wp_list_categories(array('title_li' => '', 'show_count' => true, 'number' => 8)); ?>
        </nav>
    </div>
    <?php if (have_posts()) : ?>
        <div class="archive-list">
            <?php while (have_posts()) : the_post(); ?>
                <article <?php post_class('archive-card'); ?>>
                    <?php if (has_post_thumbnail()) : ?><a class="archive-card__image" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium_large'); ?></a><?php endif; ?>
                    <div><p class="archive-meta"><?php echo esc_html(get_the_date()); ?> · <?php the_category(', '); ?></p><h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2><p><?php echo esc_html(wp_trim_words(get_the_excerpt(), 28)); ?></p><a class="read-more" href="<?php the_permalink(); ?>">Lees bericht →</a></div>
                </article>
            <?php endwhile; ?>
        </div>
        <?php the_posts_pagination(); ?>
    <?php else : ?><p>Hier staan nog geen berichten.</p><?php endif; ?>
</main>
<?php get_footer(); ?>
