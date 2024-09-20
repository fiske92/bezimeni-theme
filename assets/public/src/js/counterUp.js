export default function counterUp(counter) {
  const DURATION = 2000;

  const parsedCounterNumber = counter.innerText.match(/^(\d+)(\D*)$/);
  const target = parseFloat(parsedCounterNumber[1]);
  const updateInterval = DURATION / target;

  let current = 0;

  const interval = setInterval(() => {
    current += 1;

    if (current >= target) {
      current = target;
      clearInterval(interval);
    }

    counter.textContent = current + parsedCounterNumber[2];
  }, updateInterval);
}
