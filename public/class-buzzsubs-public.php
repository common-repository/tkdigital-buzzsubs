<?php

/**
 * @package    Buzzsubs
 * @subpackage Buzzsubs/public
 * @author     TkDigital <tomas@tkdigital.co.uk>
 */
class Buzzsubs_Public
{
    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $plugin_name The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $version The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string $plugin_name The name of the plugin.
     * @param      string $version The version of this plugin.
     */
    public function __construct($plugin_name, $version)
    {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    /**
     * Register the JavaScript for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {
        global $wpdb;
        $client = $wpdb->get_row("SELECT * FROM " . $wpdb->prefix . "buzzsubs WHERE id = 1");

        wp_enqueue_script($this->plugin_name . '-main', 'https://wp.buzzsubs.com/buzz/vendor/app.js', [], $this->version, true);
        wp_enqueue_script($this->plugin_name, 'https://wp.buzzsubs.com/buzz/scripts/buzz-' . $client->script_id . '-subs.js', [], $this->version, true);
    }
}
