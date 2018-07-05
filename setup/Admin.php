<?php
namespace Setup;

class Admin
{
    public static function init()
    {
        add_filter( 'manage_attempt_posts_columns' , [ __CLASS__, 'customize_attempt_columns' ]);
        add_action( 'manage_posts_custom_column' , [ __CLASS__, 'display_attempt_columns' ], 10, 2 );
    }

    public static function customize_attempt_columns($columns) {
        unset($columns['author']);
        unset($columns['date']);
        unset($columns['title']);
        return array_merge( $columns, 
                  [
                    'attempt_climber' => __('Climber'),
                    'attempt_climb' =>__( 'Climb'),
                    'attempt_date' =>__( 'Date'),
                  ]
                );
    }

    public static function display_attempt_columns($column, $post_id)
    {
        switch ( $column ) {
            case 'attempt_climber':
                $climber = get_field('attempt_climber');
                $climber = get_user_by('id', $climber);
                echo $climber->display_name;
                break;

            case 'attempt_climb':
                $climb = get_field('attempt_climb');
                echo $climb->post_title;
                break;
            
            case 'attempt_date':
                $date = get_field('attempt_date');
                echo $date;
                break;
        }

    }
}