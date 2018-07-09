<?php
namespace App;
use Carbon\Carbon;

class Climber
{
    public static function average_rating($climber)
    {
        $climb_ratings = [];

        $attempts = get_posts([
            'post_type' => 'attempt',
            'meta_key' => 'attempt_climber',
            'meta_value' => $climber->ID,
        ]);

        foreach( $attempts as $attempt ) {
            $climb = get_post( get_field('attempt_climb', $attempt) );
            $rating = get_field('climb_rating', $climb);
            array_push($climb_ratings, $rating);
        }

        $average = array_sum($climb_ratings) / count($climb_ratings);
        $average = round($average, 2);
        $average = number_format($average, 2);

        return Climb::convert_rating( $average );
    }

    public static function attempt_count($climber)
    {
        $attempts = get_posts([
            'post_type' => 'attempt',
            'meta_key' => 'attempt_climber',
            'meta_value' => $climber->ID,
        ]);

        return count($attempts);
    }

    public static function success_rate($climber)
    {
        $successful_attempts = get_posts([
            'post_type' => 'attempt',
            'meta_query' => [
                [
                    'key' => 'attempt_climber',
                    'value' => $climber->ID
                ],
                [
                    'key' => 'attempt_success',
                    'value' => true
                ]
            ],
        ]);

        $successful_attempt_count = count($successful_attempts);
        $total_attempt_count = self::attempt_count($climber);

        $success_rate = $successful_attempt_count / $total_attempt_count;

        $success_rate = round( (float) $success_rate * 100 ) . '%';

        return $success_rate;

    }

    public static function member_since($climber)
    {
        $date = Carbon::parse($climber->user_registered);
        return $date->diffForHumans();
    }
}