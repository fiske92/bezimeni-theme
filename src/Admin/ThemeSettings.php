<?php

namespace Bezimeniit\Admin;

class ThemeSettings
{
  public function __construct()
  {
    // Step 1: Add settings page under the Project CPT menu
    add_action('admin_menu', [$this, 'addProjectSettingsPage']);

    // Step 2: Register settings fields
    add_action('admin_init', [$this, 'registerProjectSettings']);
  }

  // Step 1: Add a settings page under the Project CPT
  public function addProjectSettingsPage()
  {
    add_submenu_page(
      'edit.php?post_type=project',    // Parent slug (Project CPT)
      'Project Settings',              // Page title
      'Project Settings',              // Menu title
      'manage_options',                // Capability
      'project-settings',              // Menu slug
      [$this, 'projectSettingsPageHtml'] // Callback to display content
    );
  }

  // Step 2: Register the setting for the page
  public function registerProjectSettings()
  {
    // Register a setting for the Project settings
    register_setting('project_settings_group', 'project_custom_option');

    // Add a section for the settings
    add_settings_section(
      'project_settings_section',      // Section ID
      'Project Settings',              // Title of the section
      null,                            // Callback (optional)
      'project-settings'               // Page slug (matches submenu slug)
    );

    // Add a settings field for the Project settings
    add_settings_field(
      'project_custom_option_field',   // Field ID
      'Custom Option',                 // Field label
      [$this, 'projectCustomFieldHtml'], // Callback to display the field
      'project-settings',              // Page slug
      'project_settings_section'       // Section ID
    );
  }

  // Step 3: Display the HTML for the custom field
  public function projectCustomFieldHtml()
  {
    // Get the current value from the database
    $value = get_option('project_custom_option');
    ?>
    <input type="text" name="project_custom_option" value="<?php echo esc_attr($value); ?>" />
    <?php
  }

  // Step 4: Output the HTML for the settings page
  public function projectSettingsPageHtml()
  {
    ?>
    <div class="wrap">
      <h1>Project Settings</h1>
      <form method="post" action="options.php">
        <?php
        // Output security fields for the registered setting
        settings_fields('project_settings_group');
        // Output settings sections and fields
        do_settings_sections('project-settings');
        // Submit button to save the changes
        submit_button();
        ?>
      </form>
    </div>
    <?php
  }
}