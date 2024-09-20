import { getCookie, setCookie } from './cookies';

export default function themeSwitcher() {
  const themeSwitcher = document.querySelector('.theme-switcher');

  if (!themeSwitcher) {
    return;
  }

  const logos = document.querySelectorAll('.bezimeni-logo');
  const COOKIE_NAME = 'bezimeni-theme';
  const themeModeCookie = getCookie(COOKIE_NAME);

  const themeModeLocalStorage = localStorage.getItem(COOKIE_NAME);
  if (!themeModeLocalStorage && themeModeCookie) {
    localStorage.setItem(COOKIE_NAME, themeModeCookie);
  }

  const currentTheme = themeModeLocalStorage || themeModeCookie || 'light';
  setTheme(currentTheme);

  themeSwitcher.addEventListener('click', changeThemeMod);

  function setTheme(theme) {
    document.body.classList.remove('dark-theme', 'light-theme');

    if (theme === 'dark') {
      document.body.classList.add('dark-theme');
      changeLogo(theme);
    } else {
      document.body.classList.add('light-theme');
      changeLogo(theme);
    }
  }

  function changeThemeMod() {
    const themeMode =
      localStorage.getItem(COOKIE_NAME) === 'dark' ? 'dark' : 'light';
    const newTheme = themeMode === 'dark' ? 'light' : 'dark';

    localStorage.setItem(COOKIE_NAME, newTheme);
    setCookie(COOKIE_NAME, newTheme, 365);

    setTheme(newTheme);
  }

  function changeLogo(theme) {
    logos.forEach((logo) => {
      if (theme === 'dark') {
        document.body.classList.add('dark-theme');
        logo.src = `${window.location.origin}/wp-content/themes/bezimeniIT/assets/public/dist/img/bezimeni-logo-dark.png`;
      } else {
        document.body.classList.add('light-theme');
        logo.src = `${window.location.origin}/wp-content/themes/bezimeniIT/assets/public/dist/img/bezimeni-logo-light.png`;
      }
    });
  }
}
