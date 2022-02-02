<?php

namespace Caboodle;

class Frontend
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

    public function bladeify_templates($templates = [])
    {
        if (empty($templates) || !is_array($templates)) {
            return $templates;
        }

        $templates = array_map([$this, "remove_extension"], $templates);

        $wp_templates = [];
        foreach ($templates as $template) {
            $wp_templates[] = $template . ".php";
        }

        $blade_templates = [];
        foreach ($templates as $template) {
            $blade_templates[] = "resources/views/" . $template . ".blade.php";
        }

        $templates = array_merge($blade_templates, $wp_templates);

        // wp_die(json_encode($templates));

        return $templates;
    }

    public function remove_extension($file)
    {
        return preg_replace('#\.(blade\.?)?(php)?$#', "", ltrim($file));
    }

    public function is_blade_file($file)
    {
        return strpos($file, ".blade.php") !== false;
    }
}
