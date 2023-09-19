<?php
// Enqueue the main stylesheet
function enqueue_theme_styles() {
    wp_enqueue_style('main-style', get_stylesheet_uri());
}

// Register secondary menu
function register_secondary_menu() {
    register_nav_menu('secondary-menu', __('Secondary Menu', 'secondary-menu'));
}

// Register secondary menu
function register_club_menu() {
    register_nav_menu('club-menu', __('Club Menu', 'club-menu'));
}

// Enqueue default styles 
function enqueue_default_styles() {
    wp_enqueue_style('default-style', get_template_directory_uri() . '/assets/styles/css/index.css');
}

// Enqueue additional styles for the homepage
function enqueue_homepage_styles() {
    if (is_home() || is_front_page()) {
        // Load your homepage-specific stylesheet here
        wp_enqueue_style('homepage-style', get_template_directory_uri() . '/assets/styles/css/homepage.css');
    }
}

function custom_theme_customize_register($wp_customize) {
    // Add Footer Content section
    $wp_customize->add_section('footer_content_section', array(
        'title' => __('Footer Content', 'custom-theme'),
        'priority' => 30,
    ));

    // Add Image Upload Control
    $wp_customize->add_setting('footer_image', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw', // Sanitize the URL
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_image', array(
        'label' => __('Upload Footer Image', 'custom-theme'),
        'section' => 'footer_content_section',
        'settings' => 'footer_image',
    )));

    // Add Text Input Controls
    $wp_customize->add_setting('footer_name', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('footer_name', array(
        'label' => __('Name', 'custom-theme'),
        'section' => 'footer_content_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('footer_location', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('footer_location', array(
        'label' => __('Location', 'custom-theme'),
        'section' => 'footer_content_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('footer_arena', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('footer_arena', array(
        'label' => __('Arena', 'custom-theme'),
        'section' => 'footer_content_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('footer_town', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('footer_town', array(
        'label' => __('Town', 'custom-theme'),
        'section' => 'footer_content_section',
        'type' => 'text',
    ));
}

add_action('customize_register', 'custom_theme_customize_register');
add_action('wp_enqueue_scripts', 'enqueue_theme_styles');
add_action('after_setup_theme', 'register_secondary_menu');
add_action('after_setup_theme', 'register_club_menu');
add_action('wp_enqueue_scripts', 'enqueue_homepage_styles');
add_action('wp_enqueue_scripts', 'enqueue_default_styles');
?>
