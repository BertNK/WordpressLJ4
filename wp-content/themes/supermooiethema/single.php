<?php
get_header();
?>
<main class="single-page">
    <?php if (have_posts()) : ?>
        <?php
        while (have_posts()) :
            the_post();
            $categories = get_the_category();
            ?>
            <article <?php post_class('single-article'); ?>>
                <a class="single-back-link" href="<?php echo esc_url(home_url('/')); ?>">← Terug naar home</a>

                <header class="single-header">
                    <?php if ($categories) : ?>
                        <p class="single-category"><?php echo esc_html($categories[0]->name); ?></p>
                    <?php endif; ?>
                    <h1><?php the_title(); ?></h1>
                    <p class="single-meta">
                        <time datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html(get_the_date()); ?></time>
                        <span aria-hidden="true">·</span>
                        <span>Door <?php echo esc_html(get_the_author()); ?></span>
                    </p>
                </header>

                <?php if (has_post_thumbnail()) : ?>
                    <figure class="single-featured-image">
                        <?php the_post_thumbnail('large'); ?>
                    </figure>
                <?php endif; ?>

                <div class="single-content">
                    <?php the_content(); ?>
                    <?php
                    wp_link_pages(
                        array(
                            'before' => '<nav class="single-page-links" aria-label="Pagina’s van dit bericht">',
                            'after'  => '</nav>',
                        )
                    );
                    ?>
                </div>
            </article>
        <?php endwhile; ?>
    <?php endif; ?>
</main>
<?php
get_footer();
