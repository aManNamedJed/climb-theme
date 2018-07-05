<?php
namespace App;

class Climb
{
    public static function convert_rating($rating)
    {
        $ratings = [
            '5.4' => '5.4',
            '5.5' => '5.5',
            '5.6' => '5.6',
            '5.7' => '5.7',
            '5.8' => '5.8',
            '5.9' => '5.9',
            '5.10' => '5.10a',
            '5.11' => '5.10b',
            '5.12' => '5.10c',
            '5.13' => '5.10d',
        ];

        return $ratings[$rating];
    }
}