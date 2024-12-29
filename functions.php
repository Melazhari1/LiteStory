<?php
function lifeStory_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    register_nav_menus([
        'primary' => __('Primary Menu', 'my-theme'),
    ]);
}
add_action('after_setup_theme', 'lifeStory_setup');

function lifeStory_enqueue_styles() {
    // Enqueue the main stylesheet from the 'css' folder
    wp_enqueue_style(
        'lifeStory-style', // Handle name
        get_template_directory_uri() . '/css/style.css', // Path to the CSS file
        [], // Dependencies (none in this case)
        filemtime(get_template_directory() . '/css/style.css') // Cache-busting version based on file modification time
    );
}
add_action('wp_enqueue_scripts', 'lifeStory_enqueue_styles');


function add_custom_fields_to_customize_lifeStory($wp_customize) {
    // Add Title field
    $wp_customize->add_setting('title_home', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'type' => 'theme_mod',
    ));

    $wp_customize->add_control('title_home', array(
        'label' => __('Home title', 'lifeStory'),
        'section' => 'title_tagline',
        'settings' => 'title_home',
        'type' => 'text',
    ));

    // Add Description field
    $wp_customize->add_setting('description_home', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'type' => 'theme_mod',
    ));

    $wp_customize->add_control('description_home', array(
        'label' => __('Description home', 'lifeStory'),
        'section' => 'title_tagline',
        'settings' => 'description_home',
        'type' => 'textarea',
    ));
}
add_action('customize_register', 'add_custom_fields_to_customize_lifeStory');

function my_custom_block_assets() {
    wp_enqueue_script(
        'my-custom-block-script',
        get_template_directory_uri() . '/blocks/custom-summary-block.js',
        null,
        true // Load in footer
    );

    wp_enqueue_style(
        'my-custom-block-style',
        get_template_directory_uri() . '/blocks/custom-summary-block.css',
        null,
        true // Load in footer
    );
}
//add_action('enqueue_block_editor_assets', 'my_custom_block_assets');
add_action('wp_enqueue_scripts', 'my_custom_block_assets'); // Enqueue for front end


// functions.php or your plugin file

function register_summary_block() {
    wp_register_script(
        'summary-block',
        get_template_directory_uri() . '/blocks/summary-block.js',
        array('wp-blocks', 'wp-element', 'wp-editor')
    );

    register_block_type('blocks/summary-block', array(
        'editor_script' => 'summary-block',
    ));
}

add_action('init', 'register_summary_block');
