<?php get_header(); ?>
<main class="content-page">
    <?php while (have_posts()) : the_post(); ?>
        <article <?php post_class(); ?>>
            <h1><?php the_title(); ?></h1>
            <?php if (has_post_thumbnail()) : ?><figure class="page-image"><?php the_post_thumbnail('large'); ?></figure><?php endif; ?>
            <div class="page-content"><?php the_content(); ?></div>
        </article>
    <?php endwhile; ?>
</main>
<?php get_footer(); ?>
