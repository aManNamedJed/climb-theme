<?php

/**
 * Autoload with Composer
 */
include_once(__DIR__.'/vendor/autoload.php');

Setup\Scripts::enqueue_all();

Setup\PostTypes\Climb::register();