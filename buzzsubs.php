<?php

/**
 * @link              https://tkdigital.co.uk/
 * @since             1.0.0
 * @package           Buzzsubs
 *
 * @wordpress-plugin
 * Plugin Name:       BuzzSubs
 * Plugin URI:        https://wp.buzzsubs.com/plugins/buzzsubs/
 * Description:       Buzzsub’s cutting edge gamified email subscriber app gives you the ability to make your pop-ups truly interactive.
 * Version:           1.0.0
 * Author:            TkDigital
 * Author URI:        https://tkdigital.co.uk/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       buzzsubs
 */

if (!defined('WPINC')) {
    die;
}

function activate_buzzsubs()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class-buzzsubs-activator.php';
    Buzzsubs_Activator::activate();
}

function show_buzzsubs_menu()
{
    add_menu_page(
        'BuzzSubs', 'BuzzSubs', 'manage_options', 'buzzsubs',
        'redirect_to_buzzsubs_registration_or_login_page', 'dashicons-sos', 56
    );
}

function redirect_to_buzzsubs_registration_or_login_page()
{
    include_once plugin_dir_path(__FILE__) . 'views/registration-and-login.php';
}

require plugin_dir_path(__FILE__) . 'includes/class-buzzsubs.php';

function run_buzzsubs()
{
    (new Buzzsubs())->run();
}

run_buzzsubs();
register_activation_hook(__FILE__, 'activate_buzzsubs');
add_action('admin_menu', 'show_buzzsubs_menu');
