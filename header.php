<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset') ?>"/>
    <link rel="icon" type="image/svg+xml" href="/vite.svg"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <?php wp_head() ?>
</head>
<body <?php body_class(); ?>>
<a href="<?= site_url() ?>">
    <h1>Demo HEADER</h1>
</a>

<nav>
    <?php wp_nav_menu([
        'theme_location' => 'header_menu_location'
    ]) ?>
</nav>