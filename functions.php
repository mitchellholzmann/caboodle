<?php

/**
 * Exit if accessed directly.
 */
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Composer dependencies.
 */
if (is_readable(__DIR__ . '/vendor/autoload.php')) {
    require __DIR__ . '/vendor/autoload.php';
}

/**
 * Begins execution of the theme.
 */
function run_caboodle()
{
    $theme = new Caboodle\Theme();
    $theme->run();
}

run_caboodle();
