<?php

if (!current_user_can('manage_options')) {
    wp_die(__('You do not have sufficient permissions to access this page.'));
}

global $wpdb;
$client = $wpdb->get_row("SELECT * FROM " . $wpdb->prefix . "buzzsubs WHERE id = 1");

?>

<div style="text-align: center; margin-top: 100px">
    <h1>Login to your BuzzSubs dashboard</h1>
    <h3>Login or create a new account and update your settings so it suites your needs</h3>
    <a href="https://wp.buzzsubs.com?email=<?= $client->email ?>&script_id=<?= $client->script_id ?>&url=<?= get_site_url() ?>&name=<?= get_option('blogname') ?>"
       class="button button-primary button-large" target="_blank">
        Login to BuzzSubs Dashboard
    </a>
</div>
