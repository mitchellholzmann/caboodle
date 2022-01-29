<?php

namespace Caboodle;

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 */
class i18n
{

    /**
     * Load the plugin text domain for translation.
     */
    public function load_plugin_textdomain()
    {
        load_plugin_textdomain(
            'caboodle',
            false,
            get_template_directory() . '/languages/'
        );
    }
}