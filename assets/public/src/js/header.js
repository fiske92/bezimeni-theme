export default function header() {
  const header = document.querySelector('header.site-header');

  if (!header) {
    return;
  }

  window.addEventListener('scroll', () => {
    scrollY > 5
      ? header.classList.add('active')
      : header.classList.remove('active');
  });
}
