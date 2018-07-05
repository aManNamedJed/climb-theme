<?php
namespace Setup;

class ClimberProfile
{
    /**
     * Initialization
     * This method should be run from functions.php
     */
    public static function init()
    {
        add_action( 'init', [__CLASS__, 'climber_profile_rewrite_init'] );
        add_filter( 'query_vars', [__CLASS__, 'climber_profile_query_vars'] );
    }

    public static function climber_profile_rewrite_init()
    {
        add_rewrite_rule('climbers/([^/]*)','index.php?page_id=43&climber_username=$matches[1]','top');
    }

    public static function climber_profile_query_vars( $query_vars )
    {
        $query_vars[] = 'climber_username';
        return $query_vars;
    }

}