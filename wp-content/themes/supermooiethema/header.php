<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="site-header">
    <a class="site-brand" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
    <a class="archive-button" href="<?php echo esc_url(home_url('/archive/')); ?>">Bekijk archief</a>
    <nav class="site-nav" aria-label="Hoofdnavigatie">
        <?php if (has_nav_menu('primary')) : ?>
            <?php wp_nav_menu(array('theme_location' => 'primary', 'container' => false, 'menu_class' => 'menu')); ?>
        <?php else : ?>
            <ul class="menu"><li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li><?php wp_list_pages(array('title_li' => '', 'depth' => 1)); ?></ul>
        <?php endif; ?>
    </nav>
</header>
