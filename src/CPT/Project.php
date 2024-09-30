<?php

namespace Bezimeniit\CPT;

class Project
{ 
  public const POST_TYPE = 'project';

  private $postTypeSingular = 'Project';
  private $postTypePlural   = 'Projects';

  public function __construct()
  {
    add_action('init', [$this, 'registerProjectPostType']);
    add_action('admin_menu', [$this, 'addProjectSettingsPage']);
    add_action('admin_init', [$this, 'registerProjectSettings']);
  }

  public function registerProjectPostType()
  { 
    $labels = [
      'name'               => $this->postTypePlural,
      'singular_name'      => $this->postTypeSingular,
      'edit_item'          => 'Edit ' . $this->postTypeSingular,
      'add_new'            => 'Add new ' . $this->postTypeSingular,
      'new_item'           => $this->postTypeSingular,
      'view_item'          => $this->postTypeSingular,
      'view_items'         => $this->postTypePlural,
      'all_items'          => $this->postTypePlural,
      'search_items'       => $this->postTypePlural,
      'not_found'          => $this->postTypeSingular,
      'not_found_in_trash' => $this->postTypeSingular,
    ];

    $supports = ['title', 'editor', 'excerpt', 'thumbnail'];

    $args = [
      'label'           => $this->postTypePlural,
      'labels'          => $labels,
      'public'          => true,
      'has_archive'     => true,
      'show_ui'         => true,
      'show_in_menu'    => true,
      'show_in_rest'    => true,
      'menu_position'   => 4,
      'menu_icon'       => 'dashicons-archive',
      'supports'        => $supports,
    ];

    register_post_type(self::POST_TYPE, $args);
  }

  public function addProjectSettingsPage()
  {
    add_submenu_page(
      'edit.php?post_type=project',
      'Project Settings',
      'Project Settings',
      'manage_options',
      'project-settings',
      [$this, 'projectSettingsPageHtml']
    );
  }

  public function registerProjectSettings()
  {
    register_setting('project_settings_group', 'project_archive_title');
    register_setting('project_settings_group', 'project_archive_description');

    add_settings_section(
      'project_settings_section',
      'Archive Settings',
      null,
      'project-settings'
    );

    add_settings_field(
      'project_archive_title_field',
      'Archive title',
      [$this, 'projectTitleFieldHtml'],
      'project-settings',
      'project_settings_section'
    );

    add_settings_field(
      'project_archive_description_field',
      'Archive description',
      [$this, 'projectDescriptionFieldHtml'],
      'project-settings',
      'project_settings_section'
    );
  }

  public function projectTitleFieldHtml()
  {
    $value = get_option('project_archive_title');
    ?>
    <input type="text" name="project_archive_title" value="<?php echo esc_attr($value); ?>" />
    <?php
  }

  public function projectDescriptionFieldHtml()
  {
    $value = get_option('project_archive_description');
    ?>
    <textarea name="project_archive_description" id="project_archive_description"><?php echo esc_html($value); ?></textarea>
    <?php
  }

  public function projectSettingsPageHtml()
  {
    ?>
    <div class="wrap">
      <h1>Project Settings</h1>
      <form method="post" action="options.php">
        <?php
        settings_fields('project_settings_group');
        do_settings_sections('project-settings');
        submit_button();
        ?>
      </form>
    </div>
    <?php
  }
}