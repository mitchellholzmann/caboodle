<?php

namespace Caboodle;

class Theme
{
    protected $loader;
    protected $theme_name;
    protected $version;

    public function __construct()
    {
        if (defined('CABOODLE_VERSION')) {
            $this->version = CABOODLE_VERSION;
        } else {
            $this->version = '1.0.0';
        }
        $this->theme_name = 'caboodle';

        $this->loader = new Loader();
        $this->set_locale();
        $this->define_admin_hooks();
        $this->define_public_hooks();
    }

    private function set_locale()
    {
        $plugin_i18n = new i18n();
        $this->loader->add_action('plugins_loaded', $plugin_i18n, 'load_plugin_textdomain');
    }

    /**
     * Register all of the hooks related to the admin area functionality of the theme.
     */
    private function define_admin_hooks()
    {
        $plugin_admin = new Backend($this->get_theme_name(), $this->get_version());
    }

    /**
     * Register all of the hooks related to the public-facing functionality of the theme.
     */
    private function define_public_hooks()
    {
        $plugin_public = new Frontend($this->get_theme_name(), $this->get_version());
    }

    public function run()
    {
        $this->loader->run();
    }

    /**
     * The name of the theme used to uniquely identify it within the context of
     * WordPress and to define internationalization functionality.
     */
    public function get_theme_name()
    {
        return $this->theme_name;
    }

    /**
     * The reference to the class that orchestrates the hooks with the theme.
     */
    public function get_loader()
    {
        return $this->loader;
    }

    /**
     * Retrieve the version number of the theme.
     */
    public function get_version()
    {
        return $this->version;
    }
}
