import header from './header';
import observerInit from './observerInit';
import setStarsHeight from './setStarsHeight';
import slider from './slider';
import themeSwitcher from './themeSwitcher';

(() => {
  document.addEventListener('DOMContentLoaded', () => {
    observerInit();
    slider();
    themeSwitcher();
    header();
    setStarsHeight();
  });
})();
