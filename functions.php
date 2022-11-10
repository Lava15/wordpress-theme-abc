<?php
function retro_theme_files()
{
//    wp_enque_style('theme_main_style', get_theme_uri('/build/main.css'));
    wp_enque_style('theme_main_script');
}

add_action('wp_enque_scripts', 'retro_theme_files');