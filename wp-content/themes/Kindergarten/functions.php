<?php
require_once 'ajax/ajax.php';
require_once 'options/options.php';
require_once 'records/records.php';
require_once 'telegram_bot/bot.php';

// on thumbnails for post
add_theme_support('post-thumbnails');
//// on title tag
add_theme_support('title-tag');

function webp_upload_mimes($existing_mimes){
    $existing_mimes['webp'] = 'image/webp';
    return $existing_mimes;
}
add_filter('mime_types', 'webp_upload_mimes');

function disable_emojis() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
    add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
}
//add_action( 'init', 'disable_emojis' );
add_action(
    'after_setup_theme',
    function() {
        add_theme_support( 'html5', [ 'script', 'style' ] );
    }
);
// отключение ненужных теме стилей и скриптов begin
function my_deregister_styles_and_scripts() {
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
}
add_action( 'wp_print_styles', 'my_deregister_styles_and_scripts', 999 );

function register_styles(){
    wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/libs/Magnific-Popup-master/dist/magnific-popup.css' );
    wp_enqueue_style( 'style', get_template_directory_uri() . '/css/style.css' );
//    wp_enqueue_style( 'style', get_template_directory_uri() . '/css/style.min.css' );
    wp_enqueue_style( 'main', get_template_directory_uri() . '/css/main.css' );
//    wp_enqueue_style( 'main', get_template_directory_uri() . '/css/main.min.css' );

//    wp_enqueue_style( 'v_style', get_template_directory_uri() . '/css/v_style.css' );
}
add_action('wp_enqueue_scripts', 'register_styles');

function footer_style(){
    wp_deregister_script('jquery');

    wp_enqueue_script('slim', get_template_directory_uri() .'/libs/jquery/dist/jquery.slim.min.js');
    wp_enqueue_script('magnific', get_template_directory_uri() .'/libs/Magnific-Popup-master/dist/jquery.magnific-popup.min.js');
    wp_enqueue_script('maskedinput', get_template_directory_uri() .'/libs/maskedinput/jquery.maskedinput.min.js');
//    wp_enqueue_script('script', get_template_directory_uri() .'/js/script.js');
    wp_enqueue_script('script', get_template_directory_uri() .'/js/script.min.js');
//    wp_enqueue_script('main', get_template_directory_uri() .'/js/main.js');
    wp_enqueue_script('main', get_template_directory_uri() .'/js/main.min.js');
//    wp_enqueue_script('v_ajax', get_template_directory_uri() .'/js/v_ajax.js');
    wp_enqueue_script('v_ajax', get_template_directory_uri() .'/js/v_ajax.min.js');
}
add_action('get_footer', 'footer_style', 50);