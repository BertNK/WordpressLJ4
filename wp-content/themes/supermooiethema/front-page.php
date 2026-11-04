<?php
get_header();

$latest_posts = new WP_Query(
    array(
        'posts_per_page'      => 3,
        'post_status'         => 'publish',
        'ignore_sticky_posts' => true,
    )
);
?>
<main class="home-page">
    <section class="home-intro">
        <p class="home-kicker">Persoonlijke website</p>
        <h1><?php echo esc_html(get_bloginfo('name')); ?></h1>
        <p><?php echo esc_html(get_bloginfo('description') ?: 'Welkom op mijn website. Hier deel ik mijn verhalen, projecten en interesses.'); ?></p>
    </section>

    <section class="home-posts" aria-labelledby="latest-posts-title">
        <h2 id="latest-posts-title">Nieuwste berichten</h2>

        <?php if ($latest_posts->have_posts()) : ?>
            <div class="home-post-list">
                <?php
                while ($latest_posts->have_posts()) :
                    $latest_posts->the_post();
                    ?>
                    <article class="home-post">
                        <?php if (has_post_thumbnail()) : ?>
                            <a class="home-post__image" href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
                                <?php the_post_thumbnail('medium_large'); ?>
                            </a>
                        <?php endif; ?>

                        <div class="home-post__content">
                            <time datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html(get_the_date()); ?></time>
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p><?php echo esc_html(wp_trim_words(get_the_excerpt(), 24)); ?></p>
                            <a class="home-post__link" href="<?php the_permalink(); ?>">Lees bericht</a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <p>Er zijn nog geen berichten.</p>
        <?php endif; ?>
    </section>
</main>
<?php
get_footer();
