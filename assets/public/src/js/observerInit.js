import counterUp from "./counterUp";
import createObserver from "./createObserver";
import slideIn from "./slideIn";

export default function observerInit() {
  counters();
  slideInAnimation();
}

function counters() {
  const counters = document.querySelectorAll(".bezimeni-counter");

  if (counters.length) {
    createObserver(counters, counterUp);
  }
}

function slideInAnimation() {
  const slideItems = document.querySelectorAll(
    ".bezimeni-slide-left-item, .bezimeni-slide-right-item"
  );

  if (slideItems.length) {
    createObserver(slideItems, slideIn, true);
  }
}
