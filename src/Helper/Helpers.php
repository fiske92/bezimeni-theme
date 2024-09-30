<?php

namespace Bezimeniit\Helper;

class Helpers
{
  public function __construct()
  {
    add_filter('excerpt_more', [$this, 'removeDotsFromExcerpt']);
  }

  public function removeDotsFromExcerpt($excerpt)
  {
    $permalink = get_permalink();
    $readMoreBtnClasses = 'bg-primary text-black px-3 py-1 rounded-3 fw-medium mt-3 d-inline-block';
    
    return sprintf('<br><a href="%s" target="_blank" class="%s">Read more</a>', $permalink, $readMoreBtnClasses);
  }
}