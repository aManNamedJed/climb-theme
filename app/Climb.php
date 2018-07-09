<?php
namespace App;

class Climb
{
    public static function convert_rating($rating)
    {
        $ratings = [
            '5.04' => '5.4',
            '5.05' => '5.5',
            '5.06' => '5.6',
            '5.07' => '5.7',
            '5.08' => '5.8',
            '5.09' => '5.9',
            '5.10' => '5.10a',
            '5.11' => '5.10b',
            '5.12' => '5.10c',
            '5.13' => '5.10d',
            '5.14' => '5.11a',
            '5.15' => '5.11b',
            '5.16' => '5.11c',
            '5.17' => '5.11d',
            '5.18' => '5.12a',
            '5.19' => '5.12b',
            '5.20' => '5.12c',
            '5.21' => '5.12d',
            '5.22' => '5.13a',
            '5.23' => '5.13b',
            '5.24' => '5.13c',
            '5.25' => '5.13d',
            '5.26' => '5.14a',
            '5.27' => '5.14b',
            '5.28' => '5.14c',
            '5.29' => '5.14d',
        ];

        return $ratings[$rating];
    }

    public static function attempt_count($climb)
    {
        $attempts = get_posts([
            'post_type' => 'attempt',
            'meta_key' => 'attempt_climb',
            'meta_value' => $climb->ID,
        ]);

        return count($attempts);
    }

    public static function success_rate($climb)
    {
        $successful_attempts = get_posts([
            'post_type' => 'attempt',
            'meta_query' => [
                [
                    'key' => 'attempt_climb',
                    'value' => $climb->ID
                ],
                [
                    'key' => 'attempt_success',
                    'value' => true
                ]
            ],
            'post_status' => 'publish'
        ]);

        $successful_attempt_count = count($successful_attempts);
        $total_attempt_count = self::attempt_count($climb);

        $success_rate = $successful_attempt_count / $total_attempt_count;

        $success_rate = round( (float) $success_rate * 100 ) . '%';

        return $success_rate;
    }
}