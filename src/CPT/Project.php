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
}