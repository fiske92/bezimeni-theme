<?php

namespace Bezimeniit\Controller;

class ThemeMode
{
	public const BEZIMENI_THEME_COOKIE = 'bezimeni-theme';

  public function __construct()
  {
      add_filter('get_custom_logo', [$this, 'setLogoBasedOnThemeMod']);
      add_filter('body_class', [$this, 'addThemeModeClassToBody']);
      $this->setThemeModCookie();
  }

  public function setThemeModCookie()
  {
      if (!isset($_COOKIE[self::BEZIMENI_THEME_COOKIE])) {
          setcookie(self::BEZIMENI_THEME_COOKIE, 'dark', 0, '/');
      }
  }

  public function setLogoBasedOnThemeMod($html)
  {
      $themeMode = $_COOKIE[self::BEZIMENI_THEME_COOKIE] ?? 'dark';

      $logoURL = CHILD_THEME_URL . "/assets/public/dist/img/bezimeni-logo-$themeMode.png";
      $html = '<a href="' . home_url() . '" class="bezimeni-logo-wrapper" rel="home"><img src="' . $logoURL . '" class="bezimeni-logo" alt="' . get_bloginfo('name') . '"></a>';
  
      return $html;
  }

  public function addThemeModeClassToBody($classes)
  {
      $themeModeClass = $_COOKIE[self::BEZIMENI_THEME_COOKIE] ?? 'dark';
      return array_merge($classes, [$themeModeClass . '-theme']);
  }
}