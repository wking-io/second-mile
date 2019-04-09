function countUp(el, total) {
  const regex = new RegExp('[^$][0-9]*.?[0-9]*', 'g');
  const original = el.innerHTML;
  const [number, money] = original.match(regex);
  el.innerHTML = `$0${money}`;

  return function countIt(count, done = false) {
    if (done) {
      el.innerHTML = original;
      return true;
    } else {
      const percentage = count / total;
      const step = (number * percentage).toFixed(1);
      el.innerHTML = `$${step}${money}`;
      return count + 1;
    }
  };
}

const counters = document.querySelectorAll('[data-count-up]');

counters.forEach(counter => {
  const limit = 200;
  const loadedCount = countUp(counter, limit);
  let count = 0;
  const counting = setInterval(() => {
    if (count < limit) {
      count = loadedCount(count);
    } else {
      loadedCount(count, true);
      clearInterval(counting);
    }
  }, 10);
});

const stackBox = document.querySelector('.stack-box');
function stack(box) {
  return function(e) {
    if (box) {
      const { top } = box.getBoundingClientRect();
      if (window.innerHeight - top > 350) {
        box.classList.add('showing');
      }
    }
  };
}

const loadedStack = stack(stackBox);
window.addEventListener('scroll', loadedStack);
loadedStack();
