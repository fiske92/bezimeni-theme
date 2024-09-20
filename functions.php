<?php
/**
 * Aleksa Fisic Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Aleksa Fisic
 * @since 1.0.0
 */

define('CHILD_THEME_URL', get_stylesheet_directory_uri());
define('CHILD_THEME_DIR', get_stylesheet_directory());
define('CHILD_THEME_DOMAIN', 'bezimeni-theme');
 
require_once('vendor/autoload.php');

use Bezimeniit\ChildThemeSetup;

new ChildThemeSetup();
