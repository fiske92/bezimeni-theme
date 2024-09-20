import header from './header';
import observerInit from './observerInit';
import slider from './slider';
import themeSwitcher from './themeSwitcher';

(() => {
  document.addEventListener('DOMContentLoaded', () => {
    observerInit();
    slider();
    themeSwitcher();
    header();
  });
})();
