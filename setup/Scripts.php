<?php 
namespace Setup;

class Scripts
{
    public static function enqueue_all()
    {
        add_action('wp_enqueue_scripts', [__CLASS__, 'enqueue_main_stylesheet']);
        add_action('wp_enqueue_scripts', [__CLASS__, 'enqueue_main_script']);
    }

    public static function enqueue_main_stylesheet()
    {
        wp_enqueue_style('main-css', get_stylesheet_directory_uri().'/dist/css/style.css' );
    }

    public static function enqueue_main_script()
    {
        wp_enqueue_script('main-js', get_stylesheet_directory_uri().'/dist/js/app.js', [], false, true );
    }
}