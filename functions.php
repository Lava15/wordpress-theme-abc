<?php
function retro_theme_files()
{
    wp_enqueue_style('font_awsome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css');
    wp_enqueue_style('custom_theme_fonts', '//fonts.googleapis.com/css2?family=Roboto:wght@300;700&display=swap');
    wp_enqueue_style('theme_main_style', get_theme_file_uri('/build/styles/main.min.css'));
    wp_enqueue_style('custom_google_fonst', get_theme_file_uri('/build/styles/main.css'));

    wp_enqueue_script('custom_main_script', get_theme_file_uri('/build/js/main.min.js'), array('jquery'), true);
//    wp_enqueue_style('theme_extra_style', get_theme_uri('/build/styles/main.css'));
}

add_action('wp_enqueue_scripts', 'retro_theme_files');

function global_features()
{
    add_theme_support('title-tag');
    register_nav_menu('header_menu_location', 'Header Menu Location');
    register_nav_menu('footer_menu_location', 'Footer  Menu Location');
}

add_action('after_setup_theme', 'global_features');