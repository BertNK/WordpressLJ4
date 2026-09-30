<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
    <title>Document</title>
    <?php wp_head(); ?>
</head>
<body>
    <nav>
        <div class="nav_left">
            <a class="nav_a_link" href="<?php echo home_url(); ?>">Home</a>
            <a class="nav_a_link" href="<?php echo home_url('/about-me'); ?>">About Me</a>
        </div>

        <div class="nav_right">
            <?php
            if (is_user_logged_in()) {
                echo '<span class="nav_a_link" style="color: blue";">Welcome, ' . wp_get_current_user()->display_name . '</span>';
                echo '<a class="nav_a_link" href="' . wp_logout_url(home_url()) . '">Logout</a>';
            } else {
                echo '<a class="nav_a_link" href="' . wp_login_url() . '">Login</a>';
            }
            ?>
        </div>
    </nav>
</body>
</html>