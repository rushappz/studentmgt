<?php

// Theme logo
function themename_custom_logo_setup()
{
    $defaults = array(
        'flex-height' => true,
        'flex-width' => true,
        'header-text' => array('site-title', 'site-description'),
    );
    add_theme_support('custom-logo', $defaults);
}

add_action('after_setup_theme', 'themename_custom_logo_setup');


function redirect_to_custom_login_page()
{
    wp_redirect(site_url() . "/login");
    exit();
}

add_action("wp_logout", "redirect_to_custom_login_page");

//add_action("init", "fn_redirect_wp_admin");

function fn_redirect_wp_admin()
{
    global $pagenow;
    if ($pagenow == "wp-login.php" && $_GET['action'] == "login") {
        wp_redirect(site_url() . "/login");
        exit();
    }
}


// Restrict Subscribers from dashboard
add_action('init', 'blockusers_init');

function blockusers_init()
{

    if (
        is_admin() && !current_user_can('administrator') &&

        !(defined('DOING_AJAX') && DOING_AJAX)
    ) {

        wp_redirect(home_url());

        exit;
    }
}

// show admin bar only for admins
if (!current_user_can('manage_options')) {
    add_filter('show_admin_bar', '__return_false');
}
// End of Restrict Subscribers from dashboard



function student_create_db()
{
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

    $table_name = $wpdb->prefix . STDB_TABLE_NAME_POSTFIX;

    $query = $wpdb->prepare('SHOW TABLES LIKE %s', $wpdb->esc_like($table_name));

    if (!$wpdb->get_var($query) == $table_name) {
        //* Create the teams table
        $sql = "CREATE TABLE $table_name (
        student_id INTEGER NOT NULL AUTO_INCREMENT,
        stfullname TEXT NOT NULL,
        staddress TEXT NOT NULL,
        stnic TEXT NOT NULL,
        stdob TEXT NOT NULL,
        PRIMARY KEY (student_id)
        ) $charset_collate;";
        dbDelta($sql);

        return "Table created!";
    } else {
        return "Table exists!";
    }
}
