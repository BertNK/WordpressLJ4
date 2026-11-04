<?php if ($archive_query->have_posts()) : ?>
    <div class="archive-list">
        <?php while ($archive_query->have_posts()) : $archive_query->the_post(); ?>
            <article <?php post_class('home-post archive-card'); ?>>
                <?php if (has_post_thumbnail()) : ?><a class="home-post__image" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium_large'); ?></a><?php endif; ?>
                <div class="home-post__content"><time datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html(get_the_date()); ?></time><p class="archive-meta"><?php the_category(', '); ?> · Door <?php echo esc_html(get_the_author()); ?></p><h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3><p><?php echo esc_html(wp_trim_words(get_the_excerpt(), 28)); ?></p><a class="home-post__link" href="<?php the_permalink(); ?>">Lees bericht</a></div>
            </article>
        <?php endwhile; ?>
    </div>
    <?php
    $filters = supermooiethema_archive_filters();
    $filter_args = array_filter(array('filter_category' => $filters['category'], 'filter_tag' => $filters['tag'], 'filter_author' => $filters['author'], 'filter_search' => $filters['search']));
    echo wp_kses_post(paginate_links(array('total' => $archive_query->max_num_pages, 'current' => max(1, get_query_var('paged')), 'format' => '?paged=%#%', 'add_args' => $filter_args, 'prev_text' => '← Vorige', 'next_text' => 'Volgende →')));
    wp_reset_postdata();
    ?>
<?php else : ?><p>Geen berichten gevonden. Probeer andere filters.</p><?php endif; ?>
