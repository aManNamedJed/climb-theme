<?php
namespace Setup\Taxonomies;

class Location
{
    public static function register()
    {        
        register_taxonomy(
            'location',
            'climb',
            array(
                'label' => __( 'Location' ),
                'rewrite' => array( 'slug' => 'location' ),
                'hierarchical' => true,
            )
        );
    }
    
}
