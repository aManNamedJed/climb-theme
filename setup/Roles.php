<?php 
namespace Setup;

class Roles
{

    public static function add_roles()
    {
        add_action('init', [__CLASS__, 'add_climber_role']);
    }

    public static function add_climber_role()
    {
        add_role(
            'climber',
            __( 'Climber' ),
            [
                'read'          => true,
                'publish_posts' => false,
                'edit_posts'    => true,
                'delete_posts'  => false,
                'list_users'    => true,
            ]
        );
    }
}