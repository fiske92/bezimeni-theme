<?php

namespace Bezimeniit;

use Bezimeniit\Controller\ThemeMode;
use Bezimeniit\Controller\ThemeHooks;

use Bezimeniit\Admin\ThemeUpdateChecker;

class ChildThemeSetup
{
    public function __construct()
    {
        add_action('wp_enqueue_scripts', [$this, 'enqueueScriptAndStyle']);

        $this->controllerInit();
        $this->adminInit();
    }

    public function enqueueScriptAndStyle()
    {   
        $childThemeCSSURL  = CHILD_THEME_URL . '/assets/public/dist/css/child.min.css';
        $childThemeCSSPath = CHILD_THEME_DIR . '/assets/public/dist/css/child.min.css';
        $childThemeJSURL   = CHILD_THEME_URL . '/assets/public/dist/js/child.min.js';
        $childThemeJSPath  = CHILD_THEME_DIR . '/assets/public/dist/js/child.min.js';

        wp_enqueue_style('main-css', $childThemeCSSURL, [], filemtime($childThemeCSSPath));
        wp_enqueue_script('bootstrap-js', CHILD_THEME_URL . '/assets/public/dist/js/bootstrap.min.js', [], '1.0.0', true);
        wp_enqueue_script('main-js', $childThemeJSURL, [], filemtime($childThemeJSPath), true);
    }

    public function controllerInit()
    {
        new ThemeMode();
        new ThemeUpdateChecker();
    }

    public function adminInit()
    {
        new ThemeHooks();
    }
}