<?php

namespace Bezimeniit;

use Bezimeniit\Controller\ThemeMode;
use Bezimeniit\Admin\ThemeUpdateChecker;

class ChildThemeSetup
{
    public function __construct()
    {
        add_action('wp_enqueue_scripts', [$this, 'enqueueScriptAndStyle']);
        new ThemeMode();
        new ThemeUpdateChecker();
    }

    public function enqueueScriptAndStyle()
    {
        wp_enqueue_script('bootstrap-js', CHILD_THEME_URL . '/assets/public/dist/js/bootstrap.min.js', [], '1.0.0', true);
        wp_enqueue_style('main-css', CHILD_THEME_URL . '/assets/public/dist/css/child.min.css', [], '1.0.5');
        wp_enqueue_script('main-js', CHILD_THEME_URL . '/assets/public/dist/js/child.min.js', [], '1.2.1', true);
    }
}