export default function slider() {
  const sliderWrappers = document.querySelectorAll(".bezimeni-slider-wrapper");

  if (!sliderWrappers.length) return;

  sliderWrappers.forEach((wrapper) => addSliderFunc(wrapper));

  function addSliderFunc(wrapper) {
    const btnNext = wrapper.querySelector(".bezimeni-slide-next");
    const btnPrev = wrapper.querySelector(".bezimeni-slide-prev");
    const sliderContainer = wrapper.querySelector(".bezimeni-slider-container");
    const sliderItem = wrapper.querySelector(".bezimeni-slider-item");

    if (!btnNext || !btnPrev || !sliderContainer || !sliderItem) return;

    const sliderContainerComputedStyle = getComputedStyle(sliderContainer);
    const sliderContainerGap = parseFloat(
      sliderContainerComputedStyle.getPropertyValue("gap")
    );

    btnNext.addEventListener("click", () =>
      sliderContainer.scrollBy({
        left: sliderItem.clientWidth + sliderContainerGap,
      })
    );
    btnPrev.addEventListener("click", () =>
      sliderContainer.scrollBy({
        left: -sliderItem.clientWidth - sliderContainerGap,
      })
    );

    sliderContainer.addEventListener("scroll", () =>
      disableBtns(sliderContainer, btnNext, btnPrev)
    );
  }

  function disableBtns(container, next, prev) {
    next.disabled =
      container.scrollLeft + container.clientWidth >= container.scrollWidth - 10
        ? true
        : false;

    prev.disabled = container.scrollLeft === 0 ? true : false;
  }
}
