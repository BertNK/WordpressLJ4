<?php get_header(); ?>
<main class="archive-page">
    <h1><?php esc_html_e('Berichten', 'supermooiethema'); ?></h1>
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
    <?php else : ?><p>Er zijn nog geen berichten.</p><?php endif; ?>
</main>
<?php get_footer(); ?>
