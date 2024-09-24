export default function createObserver(
  elements,
  callback,
  delay = false,
  options = { threshold: 0.3 }
) {
  const observer = new IntersectionObserver((entries, observer) => {
    let timeout = 0;

    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        if (delay || entry.target.dataset.delay) {
          setTimeout(() => {
            callback(entry.target);
            observer.unobserve(entry.target);
          }, entry.target.dataset.delay ?? timeout);

          timeout += 500;
        } else {
          callback(entry.target);
          observer.unobserve(entry.target);
        }
      }
    });
  }, options);

  elements.forEach((element) => observer.observe(element));
}
