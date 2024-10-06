export default function setStarsHeight() {
  const separatorElement = document.querySelector('.bezimeni-stars-separator');
  const stars = document.querySelector('.stars-wrapper');

  if (!separatorElement || !stars) {
    return;
  }

  const separatorOffsetTop = separatorElement.offsetTop;
  const separatorComputedStyle = getComputedStyle(separatorElement);
  const separatorSpacing = separatorComputedStyle
    .getPropertyValue('padding-top')
    .replace('px', '');

  stars.style.height = `${separatorOffsetTop + +separatorSpacing * 1.4}px`;
}
