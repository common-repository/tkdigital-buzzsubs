<?php

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Buzzsubs
 * @subpackage Buzzsubs/includes
 * @author     TkDigital <tomas@tkdigital.co.uk>
 */
class Buzzsubs_Activator
{

    /**
     * @since    1.0.0
     */
    public static function activate()
    {
        global $wpdb;

        $table_name = $wpdb->prefix . 'buzzsubs';

        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE IF NOT EXISTS $table_name (
                    id enum('1') NOT NULL,
                    email VARCHAR(255) NOT NULL,
                    script_id VARCHAR(255) NOT NULL,
                    url varchar(55) DEFAULT '' NOT NULL,
                    UNIQUE KEY id (id)
                ) $charset_collate;";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);

        $wpdb->replace($table_name, [
            'id' => 1,
            'email' => get_option('admin_email'),
            'script_id' => md5(microtime() . rand(1, 9999) . get_option('admin_email')),
            'url' => get_site_url()
        ]);
    }

}
