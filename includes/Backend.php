<?php

namespace Caboodle;

class Backend
{
    /**
     * The ID of this theme.
     */
    private $theme_name;

    /**
     * The version of this theme.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     */
    public function __construct($theme_name, $version)
    {
        $this->theme_name = $theme_name;
        $this->version = $version;
    }
}