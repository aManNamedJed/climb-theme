<?php
namespace Setup\PostTypes;

class Attempt
{
    public static function register()
    {
        $cpt_singluar = 'Attempt';
        $cpt_plural = 'Attempts';
        $singular_slug = sanitize_title($cpt_singluar);
        $plural_slug = sanitize_title($cpt_plural);
        
        register_post_type($singular_slug, [
            'labels'              => [
                'name'               => $cpt_plural,
                'singular_name'      => $cpt_singluar,
                'add_new'            => "Add New",
                'add_new_item'       => "Add New $cpt_singluar",
                'edit_item'          => "Edit $cpt_singluar",
                'new_item'           => "New $cpt_singluar",
                'view_item'          => "View $cpt_singluar",
                'search_items'       => "Search $cpt_plural",
                'not_found'          => "No $cpt_plural found",
                'not_found_in_trash' => "No $cpt_plural found in trash",
                'parent_item_colon'  => "",
                'menu_name'          => $cpt_plural
            ],
            'public'                => false,
            'exclude_from_search'   => true,
            'publicly_queryable'    => false,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_icon'             => $icon,
            'query_var'             => true,
            'rewrite'               => ['slug' => $plural_slug],
            'capability_type'       => 'post',
            'has_archive'           => false,
            'hierarchical'          => false,
            'menu_position'         => null,
            'supports'              => ['custom-fields'],
            'show_in_rest'          => true,
            'rest_base'             => 'attempts',
  		    'rest_controller_class' => 'WP_REST_Posts_Controller',
        ]);
    }
    
}
