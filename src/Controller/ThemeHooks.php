<?php

namespace Bezimeniit\Controller;

class ThemeHooks
{
  public function __construct()
  {
    add_action('wp_body_open', [$this, 'addStarsAnimationMarkup']);
  }

  public function addStarsAnimationMarkup()
  {
    if (!is_front_page()) {
      return;
    }

    $html = '<div class="stars-wrapper position-absolute top-0 start-0 overflow-y-hidden">
      <div id="stars"></div>
      <div id="stars2"></div>
      <div id="stars3"></div>
    </div>';

    echo $html;
  }
}