import Player from '@vimeo/player';
import { addClass, removeClass, hasClass } from './modules/classlist';
import { dom, domAll } from './modules/dom';
import { wrapEvent, eventOn } from './modules/event';
import { compose } from './modules/compose';

const pauseLoop = (el) => () => el.pause();
const playLoop = (el) => () => el.play();

// Open Bio Video
const showVideo = wrapEvent(addClass, [ 'the-video--open', dom('.the-video') ]);
eventOn('click', compose(pauseLoop(dom('.promo-video__bg')), showVideo), domAll('.open-video'));

// Pause Bio Video
const pausePlayer = (el) => {
  const player = new Player(el);
  player.pause();
  return player;
};

// Close Bio Video
const hideVideo = (e) => {
  if (hasClass('the-video', e.target)) {
    removeClass('the-video--open', dom('.the-video'));
    pausePlayer(dom('.the-video__wrapper iframe'));
  }
  return e;
};

const theVideo = dom('.the-video');
if (theVideo) {
  eventOn('click', compose(playLoop(dom('.promo-video__bg')), hideVideo), theVideo);
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
