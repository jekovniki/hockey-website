<?php
// Enqueue the main stylesheet
function enqueue_theme_styles() {
    wp_enqueue_style('main-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'enqueue_theme_styles');

// Enqueue additional styles for the homepage
function enqueue_homepage_styles() {
    if (is_home() || is_front_page()) {
        // Load your homepage-specific stylesheet here
        wp_enqueue_style('homepage-style', get_template_directory_uri() . '/assets/css/homepage.css');
    }
}
add_action('wp_enqueue_scripts', 'enqueue_homepage_styles');
?>