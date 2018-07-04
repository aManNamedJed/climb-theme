<?php
namespace Setup\PostTypes;

class Climb
{
    public static function register()
    {
        $cpt_singluar = 'Climb';
        $cpt_plural = 'Climbs';
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
            'public'              => true,
            'exclude_from_search' => true,
            'publicly_queryable'  => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'menu_icon'           => $icon,
            'query_var'           => true,
            'rewrite'             => ['slug' => $plural_slug],
            'capability_type'     => 'post',
            'has_archive'         => true,
            'hierarchical'        => false,
            'menu_position'       => null,
            'supports'            => ['title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields']
        ]);
    }
}
