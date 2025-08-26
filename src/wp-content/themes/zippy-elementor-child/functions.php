<?php

/*
 * Define Variables
 */
if (!defined('THEME_DIR'))
    define('THEME_DIR', get_template_directory());
if (!defined('THEME_URL'))
    define('THEME_URL', get_template_directory_uri());

$myaccount_url = wc_get_page_permalink( 'myaccount' );



/*
 * Include framework files
 */
foreach (glob(THEME_DIR.'-child' . "/includes/*.php") as $file_name) {
    require_once ( $file_name );
}

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);