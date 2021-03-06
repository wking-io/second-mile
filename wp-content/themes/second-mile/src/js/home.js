import Player from '@vimeo/player';
import { dom, domAll } from './modules/dom';
import togglePopup from './modules/popup';

const theVideo = dom('[data-popup] iframe');
if (!theVideo.hasOwnProperty('error')) {
  const player = new Player(theVideo);
  const popupBtns = domAll('[data-popup-action]');

  popupBtns.forEach((btn) => {
    btn.addEventListener('click', (e) => {
      const state = togglePopup(e);
      if (state) {
        player.pause();
      } else {
        player.play();
      }
    });
  });
}

function countUp(el, total) {
  const regex = new RegExp('(\\$?)([0-9]*.?[0-9]*)([a-zA-z]?)');
  const original = el.innerHTML;

  const [ _, sign, amount, shorthand ] = original.match(regex); // eslint-disable-line no-unused-vars
  el.innerHTML = `${sign.length > 0 ? sign : ''}0${shorthand.length > 0 ? shorthand : ''}`;

  return function countIt(count, done = false) {
    if (done) {
      el.innerHTML = original;
      return true;
    } else {
      const percentage = count / total;
      const step = (amount * percentage).toFixed(1);
      el.innerHTML = `${sign.length > 0 ? sign : ''}${step}${shorthand.length > 0 ? shorthand : ''}`;
      return count + 1;
    }
  };
}

const counters = document.querySelectorAll('[data-count-up]');

counters.forEach((counter) => {
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
  return function() {
    if (box) {
      const { top } = box.getBoundingClientRect();
      if (window.innerHeight - top > 30) {
        box.classList.add('showing');
      }
    }
  };
}

const loadedStack = stack(stackBox);
window.addEventListener('scroll', loadedStack);
loadedStack();
