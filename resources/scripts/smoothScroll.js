function smoothScroll(targetIncoming, duration) {
  const target = document.querySelector(targetIncoming);
  const targetPosition = target.getBoundingClientRect().top;
  const startPosition = window.pageYOffset;

  const distance = targetPosition - startPosition;
  let startTime = null;

  // http://www.gizma.com/easing/
  function ease(t, b, c, d) {
    t /= d / 2;
    if (t < 1) return (c / 2) * t * t + b;
    t--;
    return (-c / 2) * (t * (t - 2) - 1) + b;
  }

  function animation(currentTime) {
    if (startTime === null) {
      startTime = currentTime;
    }
    const timeElapse = currentTime - startTime;
    const run = ease(timeElapse, startPosition, distance, duration);
    window.scrollTo(0, run);
    if (timeElapse < duration) {
      requestAnimationFrame(animation);
    }
  }

  requestAnimationFrame(animation);
}

export default { smoothScroll };
