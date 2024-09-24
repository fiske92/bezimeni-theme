<?php

namespace Bezimeniit\Admin;

use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

class ThemeUpdateChecker
{ 
  private $myUpdateChecker;

  public function __construct()
  { 
    if (is_admin()) {
      $this->myUpdateChecker = PucFactory::buildUpdateChecker(
        'https://github.com/fiske92/bezimeniIT',
        CHILD_THEME_DIR . '/functions.php',
        CHILD_THEME_DOMAIN
      );
    }

    add_action('admin_notices', [$this, 'checkForUpdateBtn']);
    add_action('admin_init', [$this, 'checkForThemeUpdate']);
    add_action('admin_notices', [$this, 'showUpdateCheckedNotice']);
  }

  public function checkForThemeUpdate() 
  {
    if (isset($_GET['check-theme-update']) && $_GET['check-theme-update'] == '1') {
      $this->myUpdateChecker->setBranch('main');
      $this->myUpdateChecker->checkForUpdates();

      wp_redirect(admin_url('themes.php?update-checked=1'));
      exit;
    }
  }

  public function checkForUpdateBtn() 
  {
    $screen = get_current_screen();

    if ($screen->id !== 'themes') return;
    ?>

    <div class="notice notice-info">
      <p>
        <strong>Check for Bezimeni Theme Update:</strong>
        <a href="<?php echo esc_url(admin_url('themes.php?check-theme-update=1')); ?>" class="button-primary">
            Check for Updates
        </a>
      </p>
    </div>

    <?php
  }

  public function showUpdateCheckedNotice() 
  {
    if (isset($_GET['update-checked']) && $_GET['update-checked'] == '1') {
      ?>

      <div class="notice notice-success is-dismissible">
          <p>Theme update check completed.</p>
      </div>

      <?php
    }
  }
}