<?php
namespace Setup;

class User
{
    public static function setup_json()
    {
        add_action('wp_head',[__CLASS__, 'create_current_user_json']);
    }

    public static function create_current_user_json()
    {
        if(is_user_logged_in()) {
            $output="<script> var currentUser = ".json_encode(get_current_user_id())."; </script>";
            echo $output;
        } else {
            $output="<script> var currentUser; </script>";
            echo $output;
        }
    }
}