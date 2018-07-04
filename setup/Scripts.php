<?php 
namespace Setup;

class Scripts
{
    public static function enqueue_all()
    {
        add_action('wp_enqueue_scripts', [__CLASS__, 'enqueue_main_stylesheet']);
    }

    public static function enqueue_main_stylesheet()
    {
        wp_enqueue_style('main', get_stylesheet_directory_uri().'/dist/css/style.css' );
    }
}